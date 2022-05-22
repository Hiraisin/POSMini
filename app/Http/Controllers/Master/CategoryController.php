<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $data = DB::table('categories')
                ->select('id', 'name')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    return '<div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary btnUpdate" data-id="' . $row->id . '" href="#">Update</button>
                        <button type="button" class="btn btn-sm btn-danger btnHapus" data-id="' . encrypt($row->id) . '" href="#">Hapus</button>
                    </div>';
                })
                ->rawColumns(['aksi'])->make();
        }
        return view('master.category');
    }

    public function store(Request $req)
    {
        $id = $req->id;
        $rules['name']     = 'required|unique:categories';
        if ($id) {
            $rules['name']     = 'required|unique:categories,name,' . $id;
        }
        $messages = [
            'required'  => ':attribute wajib diisi',
            'unique'    => ':attribute telah digunakan',
        ];
        $names       =  [
            'name'      => 'Nama',
        ];

        $req->validate($rules, $messages, $names);
        DB::beginTransaction();
        try {
            $data = new Category();
            if ($id) {
                $data = Category::find($id);
                if (!$data) return ['status' => false, 'message' => 'Kategori tidak ditemukan'];
            }
            $data->name = $req->name;
            $data->save();
            DB::commit();
            return ['status' => true, 'message' => 'Data Berhasil disimpan'];
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => false, 'message' => 'Proses Gagal', 'error' => $e->getMessage()];
        }
    }

    public function show($id, Request $req)
    {
        if ($req->ajax()) {
            $data = Category::find($id);
            if (!$data) return ['status' => false, 'message' => 'Data tidak ditemukan'];

            return ['status' => true, 'message' => 'Data Kategori by Id', 'data' => $data];
        } else {
            // return abort(404);
        }
    }
    public function destroy($id)
    {
        $id = decrypt($id);
        if ($id === false) return ['status' => false, 'message' => 'id tidak sesuai'];;
        $data = Category::find($id);
        if (!$data) return ['status' => false, 'message' => 'Data tidak ditemukan'];
        $data->delete();
        return ['status' => true, 'message' => 'Data Berhasil dihapus'];
    }
}
