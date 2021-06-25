<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductPrice;
use Hamcrest\Type\IsObject;
use Illuminate\Http\Request;

class ProductsResourceController extends Controller
{
    public static function productSpesification(Product $product){
        return [
            'brand'             => $product->brand->name,
            'product_id'        => $product->product_id,
            'product_name'      => $product->product_name,
            'slug'              => $product->slug,
            'spesifikasi'       => [
                'processor'     => $product->processor,
                'camera'        => $product->camera,
                'battery'       => $product->battery,
                'display'       => $product->display,
                'ram_storage'   => $product->storage_ram
            ],
            'created_at'        => $product->created_at,
            'updated_at'         => $product->updated_at
        ];
    }
    public static function getProductPrice(Product $product,$is_sale=false){
        $prices = [];
        // if request price only price sale
        if($is_sale){
            $productSale = ProductPrice::where('product_id',$product->id)
                                        ->where('is_sale',true)->get();
            foreach($productSale as $price){
                $prices[] = [
                    'id'                => $price->id,
                    'ram_storage'       => $price->ramStorage->name,
                    'price_promo'       => $price->price_sale,
                    'price_normal'      => $price->price_normal,
                ];
            }
            return $prices;
        }
        // jika request harga semua harga
        foreach($product->prices as $price){
            $prices[] = [
                'id'            => $price->id,
                'ram_storage'   => $price->ramStorage->name,
                'price_normal'  => $price->price_normal,
                'price_promo'   => $price->price_sale
            ];
        }
        return $prices;
    }
    public static function getImages(ProductColor $color){
        foreach($color->images as $image){
            $images[] = [
                'id'    => $image->id,
                'link'  => asset('/storage/'.$image->image) 
            ];
        }
        return $images;
    }
    public static function getProductImages(Product $product){
        $images = [];
        $colors = [];
        foreach($product->images as $color){
           $images = self::getImages($color);
           $colors[] = [
                'id'            => $color->id,
                'color_name'    => $color->color_name,
                'images'        => $images

           ];
        }
        return $colors;
    }
    public static function product(Product $product,$is_sale = false){
        $prices = [];
        $colors = self::getProductImages($product);
        $prices = self::getProductPrice($product,$is_sale);
        $data = [
        'product_name'      => $product->product_name,
        'product_id'        => $product->id,
        'merek'             => $product->brand->name,
        'slug'              => $product->slug,
        'spesifikasi'       => [
            'processor'     => $product->processor,
            'camera'        => $product->camera,
            'battery'       => $product->battery,
            'display'       => $product->display,
            'ram_storage'   => $product->storage_ram
        ],
        'created_at'        => $product->created_at,
        'updated_at'        => $product->updated_at,
        'prices'            => $prices,
        'colors'            => $colors,
       ];
       return $data;
    }
    public static function products(object $products,$is_sale=false){
        foreach($products as $product){
           $data[]  = self::product($product,$is_sale);
        }
        return $data;
    }
}
