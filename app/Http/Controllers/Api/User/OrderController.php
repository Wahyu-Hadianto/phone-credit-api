<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\StorageRam;
use App\Models\Tenor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function storeOrder(Request $request){
        $data = $request->all();
        $validator = $this->orderValidation($data);
        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'errors'    => $errors
            ],412);
        }
        $user  =  Auth::user();
        $tenor =  Tenor::find($request->tenor);
        $tenorValue = $tenor->tenor;
        $tenor = floatval($tenor->tenor);
        $dataPrice = $this->getPrice($request->product_id,$request->price_id);
        $price = $dataPrice['price'];
        $angsuran = ceil($price / $tenor);
        $ram_storage = $this->getRamStorage( $dataPrice['ram_storage']);

        $order = Order::create([
            'user_id'       => $user->id,
            'product_id'    => $request->product_id,
            'ram_storage'   => $ram_storage->name,
            'price'         => $price,
            'color_id'      => $request->color_id,
            'tenor'         => $tenorValue,
            'angsuran'      => $angsuran,
            'status'        => 'Pending',
            'name'          => $request->name,
            'telepon'       => $request->telepon,
            'address'       => $request->address
        ]);
        $order = OrderResourceController::order($order);
        return response()->json([
            'order' => $order
        ],201);
    }
    public function orderValidation(array $data){
      return  $validator = Validator::make($data,[
            'product_id'   => 'required',
            'price_id'     => 'required',
            'color_id'     => 'required',
            'tenor'        => 'required',
            'name'         => 'required',
            'telepon'         => 'required',
            'address'         => 'required',
        ]);
    }
    public function getPrice($id,$price_id){
        $product = Product::find($id);
         foreach($product->prices as $price){
            if($price->id == $price_id){
                $dataPrice = $price;
            }
         }
         if($dataPrice->price_sale){
             $price = $dataPrice->price_sale;
             $ram_storage = $dataPrice->ram_storage_id;
         }else{
            $price = $dataPrice->price_normal;
            $ram_storage = $dataPrice->ram_storage_id;
         }
         $data['ram_storage'] = $ram_storage;
         $data ['price'] = $price; 
         return $data;
    }
    public function getRamStorage($id){
             $ram_storage =  StorageRam::find($id);
             return $ram_storage;
    }

}
