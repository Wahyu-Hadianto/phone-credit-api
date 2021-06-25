<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(){
        $brands  = Brand::all();
        return view('admin.brand',[
            'brands'    => $brands
        ]);
    }
    protected function addBrand(Request $request){
        $brand = Brand::create([
            'name'  => $request->name_name,
            'slug'  => Str::slug($request->name_name,'-')
        ]);
        alert()->success('Data Berhasil Ditambahkan');
        return redirect()->back();
    }
    protected function delete($id){
        Brand::destroy($id);
        alert()->success('Data Berhasil Dihapus');
        return redirect()->back();
    }
    protected function edit($id){
        $brand = Brand::find($id);
        return response()->json([
            'brand' => $brand
        ],200);
    }
    protected function update(Request $request,$id){

    }
}
