<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageRam;
use App\Models\Brand;
use App\Models\ProductColor;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    public function index(){
        $brands             =  Brand::all();
        $ramStorage         =  StorageRam::all();
        // prouct image list
        $colors             = ProductColor::all();
        return view('admin.product_image',compact('brands','ramStorage',));
    }
   
    protected function addImage(Request $request){
        $data       =  $request->all();
        $color      =  $this->insertColor($data);
        $images     = $request->file('product_images');
        $nameImages = $this->moveImages($images);
        foreach($nameImages as $image){
            $images     = ProductImage::create([
                'color_id'  => $color->id,
                'image'     => $image
            ]);
        }
        alert()->success("Data Berhasil DI tambahkan");
        return redirect()->back();
    }
    protected function insertColor(array $data){
     return  $color = ProductColor::create([
            'product_id'    => $data['product_id'],
            'color_name'    => $data['color_name']
        ]);
    }
    protected function moveImages(array $images){
            foreach($images as $image){
                $nameImages[] = $image->store('product','public');
            }
            return $nameImages;
    }
    public function editProductImage($id){
        $product = ProductColor::findOrFail($id);
        $images  = $product->images;
       
        return view('admin.edit.product_image',compact('product','images')); 
    }
    protected function updateProductImage(Request $request,$id){
        dd($request->all());
    }
}