<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StorageRam;
use Illuminate\Http\Request;

class StorageRamController extends Controller
{
    public function index(){
        $ramStorage =  StorageRam::all();
        return view('admin.storage_ram',[
            'ramStorage'    => $ramStorage
        ]);
    }
    protected function addStorageRam(Request $request){
        $storageRam = StorageRam::create([
            'name'  => $request->storage_ram 
        ]);
        alert()->success("Data Berhasil Ditambahkan");
        return redirect()->back();
    }
}
