<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductPrice;

class ProductPriceController extends Controller
{
    public function getProductPrice($id){
        $productPrice = ProductPrice::where('product_id',$id)->get();
        $data = $this->productPriceColletion($productPrice);
        return response()->json([
            'product_name'      => $productPrice[0]->product->product_name,
            'prices'            => $data
        ],200);
    }
    public function productPriceColletion(object $productPrice){

        foreach($productPrice as $item){
            $price[] = [
                'id'            => $item->id,
                'ram_storage'   => $item->ramStorage->name,
                'price_normal'  => $item->price_normal,
                'price_sale'    => $item->price_sale,
                'created_at'    => $item->created_at,
                'updated_at'    => $item->updated_at
            ];
        }
        return $price;
       
    }
    
}
