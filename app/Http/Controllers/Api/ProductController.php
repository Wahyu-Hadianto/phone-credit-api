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
    public function getProducts(Request $request){
        if($request->query()){
            switch ($request) {
                case $request->has('take'):
                  return  $this->productTake($request->query('take'));
                case $request->has('merek'):
                  return $this->productsMerek($request->query('merek'));
                case $request->has('search');
                  return $this->productSearch($request->query('search'));
                default:
                return response()->json([
                    'query'     => $request->all(),
                    'message'   => 'parameter does not match'
                ]);
                    break;
            }
        }else{
            $products   = Product::all();
            $products = ProductsResourceController::products($products);
            return response()->json([
                'products' => $products
            ],200);
        }
    }
    public function getProduct(Request $request){
        switch ($request) {
            case $request->has('slug'):
              return  $this->productSlug($request->query('slug'));
            case $request->has('merek'):
              return $this->productId($request->query('id'));
              default:
            return response()->json([
                'query'     => $request->all(),
                'message'   => 'parameter does not match'
            ]);
                break;
        }
    }
    public function productSearch($name){
        $products = Product::where('product_name','like','%'.$name.'%')->get();
      
        if(count($products) > 0 ){
            $products = ProductsResourceController::products($products);
        }
        return response()->json([
            'query'    => [
                'search'    => $name
            ],
            'products' => $products
        ],200);
    }
    public function productSlug($slug){
        $product = Product::where('slug',$slug)->firstOrFail();
        $product = ProductsResourceController::product($product);
        return response()->json([
            'query'     => [
                'slug'  => $slug
            ],
            'product'   => $product
        ],200);
    }
    public function productId($id){
        $product = Product::findOrFail($id);
        $product = ProductsResourceController::product($product);
        return response()->json([
            'query'     => [
                'id'    => $id
            ],
            'product'   => $product
        ],200);
    }
    public function productsMerek($merek){
        $products = Brand::where('name',$merek)->firstOrFail();
        $products = $products->products;
        $products = ProductsResourceController::products($products);
            return response()->json([
                'merek'    => $merek,
                'products' => $products
            ],200);
    }
    public function getBrands(){
        $brands = Brand::all();
        return response()->json([
            'mereks'    => $brands
        ]);
    }

    protected function productTake($take){
        $products = Product::all()
                    ->sortDesc()
                    ->take($take);
        $products = ProductsResourceController::products($products);
        return response()->json([
            'query'      => [
                'take'    => $take
            ],
            'products'   => $products
        ],200);
    }
    protected function getProductsPromo(){
        $prices     = ProductPrice::where('is_sale',true)->get();
        $products = ProductsResourceController::productsPromo($prices);
        return response()->json([
            'products'  => $products
        ],200);
    }
    
    public function test(Request $request){
        if($request->has('take')){
            $products = $this->takeProduct($request->query('take'));
            return response()->json([
                'query'      => [
                    'take'  => $request->query('take')
                ],
                'products'   => $products->original['products'],
               
            ]);
        }
        return response()->json([
            'message' => 'Not params'  
        ]);
    }
}
