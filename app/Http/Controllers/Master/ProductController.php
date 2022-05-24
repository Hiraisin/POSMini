<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->path = 'assets/img/product';
    }
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $data = DB::table('products')
                ->select('products.id', 'products.name', 'desc', 'category_id', 'categories.name as category_name')
                ->join('categories', 'products.category_id', 'categories.id')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns(['desc'])->make();
        }
        return view('master.product');
    }

    public function store(Request $req)
    {
        $rules['name']          = 'required|unique:products';
        $rules['harga']         = 'required';
        $rules['desc']          = 'required';
        $rules['category_id']   = 'required';
        $rules['foto']          = 'required|image|mimes:jpeg,jpg,png|max:2048';
        $messages = [
            'required'  => ':attribute wajib diisi',
            'unique'    => ':attribute telah digunakan',
        ];
        $names       =  [
            'name'      => 'Nama',
            'harga'     => 'Harga',
            'desc'      => 'Deskripsi',
            'foto'      => 'Foto',
        ];

        $req->validate($rules, $messages, $names);
        DB::beginTransaction();
        try {
            $data = new Product();
            $data->name = $req->name;
            $data->desc = $req->desc;
            $data->category_id = $req->category_id;
            $data->harga = convert_to_number($req->harga);
            $data->save();

            $foto = $req->foto;
            $ext = $foto->extension();
            $filename = 'product_' . date('Y-m-d H-i-s') . '.' . $ext;
            // return ['status' => false, 'message' => $this->path, 'info' => ''];
            if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
                return ['status' => false, 'message' => 'Format file harus dalam bentuk Gambar (PNG/jpg/jpeg)', 'info' => ''];
            }
            $path = $this->path;
            try {
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                } else {
                    chmod($path, 0777);
                }
                $foto->move($path, $filename);
                $data->foto = $filename;
                $data->save();
            } catch (Exception $e) {
                $msg = $e->getMessage() . ' File: ' . $e->getFile() . ' Line: ' . $e->getLine();
                return ['status' => false, 'message' => 'Upload Gagal', 'info' => $msg];
            }
            DB::commit();
            return ['status' => true, 'message' => 'Data Berhasil disimpan'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => 'Proses Gagal', 'error' => $e->getMessage()];
        }
    }
}
