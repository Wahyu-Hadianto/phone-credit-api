<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ProductsResourceController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderResourceController extends Controller
{
    public static function order(Order $order){
        $color_name = $order->color->color_name;
        $images = ProductsResourceController::getImages($order->color);
        return [
            'order_id'      => $order->id,
            'product_name'  => $order->product->product_name,
            'ram_storage'   => $order->ram_storage,
            'price'         => $order->price,
            'angsuran'      => $order->angsuran,
            'tenor'         => $order->tenor . 'Bulan',
            'color'         => [
                            'color_name'    => $color_name,
                            'images'        =>   $images
                            ]
        ];
    }
}
