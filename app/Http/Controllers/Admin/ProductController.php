<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\StorageRam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products =  Product::all();
        $ramStorage = StorageRam::all();
        return view('admin.product',compact('brands','products','ramStorage'));
    }
    public function listProducts(){
        $products   = Product::all();
        $colspan    = count(StorageRam::all()) ;
        return view("admin.products",compact("products","colspan"));
    }
    public function getProductByBrand($brandId){
        $products = Product::where('brand_id',$brandId)->get();
        return response()->json([
            'products'  => $products
        ],200);
    }
    protected function addProduct(Request $request){
            $product = $request->all();
            $validateData = $this->validateProduct($product);
            if($validateData->fails()){
                return redirect()
                        ->back()
                        ->withErrors($validateData)
                        ->withInput();
            }
            $product = Product::create([
                'brand_id'      => $request->brand,
                'product_name'  => $request->product_name,
                'slug'          => Str::slug($request->product_name),
                'processor'     => $request->processor,
                'camera'        => $request->camera,
                'battery'       => $request->battery,
                'display'       => $request->display,
                'storage_ram'   => implode(",",$request->storage_ram) 
            ]);
            alert()->success('Data Berhasil Ditambahkan');
            return redirect()->back();
    }
    protected function validateProduct(array $product){
       return $validate = Validator::make($product,[
            'brand'         => 'required|integer',
            'product_name'  => 'required|max:255',
            'processor'     => 'required|max:255',
            'camera'        => 'required|max:255',
            'battery'       => 'required|max:255',
            'display'       => 'required|max:255',
            'storage_ram'   => 'required',
       ]);
    }
    protected function delete($id){
        $product = Product::destroy($id);
        alert()->success('Data Berhasil Dihapus');
        return redirect()->back();
    }
    protected function editProduct($id){
        $product =Product::findOrFail($id);
    
        $ramStorage = StorageRam::all();
        return view('admin.edit.product',compact('product','ramStorage'));
    }
    protected function updateProduct(Request $request,$id){
        $product = $request->all();
        $validator = $this->validateProduct($product);
        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $product = Product::find($id);
            $product->brand_id      = $request->brand;
            $product->product_name  = $request->product_name;
            $product->slug          = Str::slug($request->product_name);
            $product->processor     = $request->processor;
            $product->camera        = $request->camera;
            $product->battery       = $request->battery;
            $product->display       = $request->display;
            $product->storage_ram   = implode(",",$request->storage_ram);
            
        $product->save();
        alert()->success('Data Berhasil DiUpdate');
        return redirect()->back();
    }
}
