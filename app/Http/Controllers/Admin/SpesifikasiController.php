<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SpesifikasiProduct;
use App\Models\StorageRam;
use Illuminate\Http\Request;

class SpesifikasiController extends Controller
{
    public function index(){
        $brands  =  Brand::all();
        $ramStorage =  StorageRam::all();
        $listSpesifikasi = SpesifikasiProduct::all();
        return view('admin.spesifikasi',[
            'brands'            => $brands,
            'ramStorage'        => $ramStorage,
            'listSpesifikasi'   => $listSpesifikasi
        ]);
    }
    protected function addSpesifikasi(Request $request){
        $spesifikasi = SpesifikasiProduct::create([
            'product_id'    => $request->select_seri,
            'processor'     => $request->processor,
            'camera'        => $request->camera,
            'battery'       => $request->battery,
            'storage_ram'   => implode(",",$request->storage_ram) 
        ]);
        alert()->success("Data Berhasil Ditambahkan");
        return redirect()->back();
    }
}
