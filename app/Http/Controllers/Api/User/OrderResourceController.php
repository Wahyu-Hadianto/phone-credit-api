<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ProductsResourceController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderResourceController extends Controller
{
    public static function order(Order $order){
        $product = $order->product;
        // MENDAPATKAN WARNA PRODUCT YANG DI PILIH
        foreach($product->images as $color){
            if($color->id == $order->color_id){
                $colorSelect = $color;
            }
        }
        // mendapatkan Gambar dari warna yang dipilih
        foreach($colorSelect->images as $image){
                $images[] = [
                    'links' => asset($image->image) 
                ];
        }
        return [
            'order_id'      => $order->id,
            'product_name'  => $order->product->product_name,
            'ram_storage'   => $order->ram_storage,
            'price'         => $order->price,
            'angsuran'      => $order->angsuran,
            'tenor'         => $order->tenor,
            'status'        => $order->status,
            'order_name'    => $order->name,
            'telepon'       => $order->telepon,
            'address'       => $order->address,
            'created_at'    => $order->created_at,
            'color'         => [
                'color_name' => $colorSelect->color_name,
                'images'     => $images
            ],
            
        ];
    }
    public static function orders(object $orders){
        $result = [];
        foreach($orders as $order){
            $result[] =  self::order($order);
        }
        return $result;
    }
}
