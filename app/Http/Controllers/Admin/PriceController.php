<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StorageRam;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function index(){
        $brands             =  Brand::all();
        $ramStorage         =  StorageRam::all();
        $products           =  Product::all();
        return view('admin.product_price',compact('brands','ramStorage','products'));
    }
    protected function addProductPrice(Request $request){
        $price     = $request->all();
        $validator = $this->validatorProductPrice($price);
        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        }
        $is_sale = false;
        if($request->price_sale){
            $is_sale = true;
        }
        $productPrice = ProductPrice::create([
            'product_id'        => $request->product_id,
            'ram_storage_id'    => $request->ram_storage,
            'price_normal'      => $request->price_normal,
            'price_sale'        => $request->price_sale,
            'expired_sale'      => $request->exp_sale,
            'is_sale'           => $is_sale
        ]);
        if($is_sale){
            $product = Product::find($productPrice->product_id);
            $product->is_sale = true;
            $product->save();
        }
        alert()->success("Data Berhasil Ditambahkan");
        return redirect()->back();
    }
    protected function validatorProductPrice(array $price){
        return $validator = Validator::make($price,[
            'product_id'    => 'required',
            'ram_storage'       => 'required',
            'price_normal'      => 'required|integer',
            'price_sale'        => 'nullable|integer',
            'exp_sale'          => 'nullable|date'
        ]);
    }
    public function editProductPrice($id){
        $product            = ProductPrice::findOrFail($id);
        $ramStorage         =  StorageRam::all();
        return view('admin.edit.product_price',compact('product','ramStorage'));
    }
    protected function updateProductPrice(Request $request,$id){
        $productPrice = ProductPrice::find($id);
        $validator = $this->validatorProductPrice($request->all());
        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } 
         // Inser product price if validaot success
        $productPrice->product_id        = $request->product_id;
        $productPrice->ram_storage_id    = $request->ram_storage;
        $productPrice->price_normal      = $request->price_normal;
        $productPrice->price_sale        = $request->price_sale;
        $productPrice->expired_sale      = $request->exp_sale;
        if($request->price_sale){
            $productPrice->is_sale       = true;
        }
        $productPrice->save();
        if($request->price_sale){
            $product = Product::find($productPrice->product_id);
            $product->is_sale = true;
            $product->save();
        }
        alert()->success('Data Berhasil disimpan');
        return redirect()->back();
    }
   
    
}