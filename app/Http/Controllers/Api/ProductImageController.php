<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductImage;
use App\Http\Resources\ProductImageCollection;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ProductImageController extends Controller
{
    public function getImages(){
            $colors = ProductColor::where('product_id',1)->get();
            foreach($colors as $color){
                $data[] =[
                    'color'         => $color->color_name,
                    'color_id'      => $color->id,
                    'images'        => $color->images
                ];
            }
            return response()->json([
                'data'  => $data
            ],200);
    }

}
