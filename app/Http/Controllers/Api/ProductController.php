<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

use function App\helper\getProductText;

class ProductController extends Controller
{
    public function getProductsByBrand($slug){
        $brands = Brand::where('slug',$slug)->first();
        $products = $brands->products;
        $products = ProductsResourceController::products($products);
        return response()->json([
            'brand'     => $brands,
            'products'  => $products
        ],200);
    }
    public function getBrands(){
        $brands = Brand::all();
        return response()->json([
            'mereks'    => $brands
        ]);
    }
    public function getProducts(){
        $products   = Product::all();
        $products = ProductsResourceController::products($products);
        return response()->json([
            'products' => $products
        ],200);
    }
    public function getProductSpesifikasi($id){
        $product = Product::find($id);
        $product = ProductsResourceController::productSpesification($product);
        return response()->json([
            'product'  => $product 
        ],200);

    }
    protected function takeProduct($take){
        $products = Product::all()
                    ->sortDesc()
                    ->take($take);
        $products = ProductsResourceController::products($products);
        return response()->json([
            'products'   => $products
        ]);
    }
    protected function getProductsPromo(){
        $prices     = ProductPrice::where('is_sale',true)->get();
        $products = ProductsResourceController::productsPromo($prices);
        return response()->json([
            'products'  => $products
        ],200);
    }
    public function getProduct($slug){
        $product = Product::where('slug',$slug)->first();
        $product = ProductsResourceController::product($product);
        return response()->json([
            'product'   => $product
        ],200);
    }
    public function test(Request $request){
        if($request->has('take')){
            $products = $this->takeProduct($request->query('take'));
            return response()->json([
                'query'      => [
                    'take'  => $request->query('take')
                ],
                'products'   => $products->original['products']   
            ]);
        }
        return response()->json([
            'message' => 'Not params'  
        ]);
    }
}
