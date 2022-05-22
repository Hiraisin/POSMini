<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        if ($req->ajax()) {
            $data = DB::table('products')
                ->select('products.id', 'products.name', 'desc', 'category_id', 'categories.name as category_name')
                ->join('categories', 'products.category_id', 'categories.id')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->rawColumns([])->make();
        }
        return view('master.product');
    }
}
