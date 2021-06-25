<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StorageRam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user(){
        $user =  Auth::user();
        $user = UserResourceController::user($user);
        return response()->json([
            'user'  => $user
        ],200);
    }
   
    protected function updateAvatar(Request $request){
        $validator = Validator::make($request->all(),[
            'avatar'    => 'required|mimes:jpg,png,jpeg|max:2056'
        ]);
        if($validator->fails()){
            $errors  = $validator->errors();
            return response()->json([
                'errors'    => $errors
            ],412);
        }
        $user = Auth::user();
        $avatar = $request->file('avatar');
        $avatar =  $avatar->store('user','public');
        $user->avatar = $avatar;
        $user->save();
        $user = UserResourceController::user($user);
        return response()->json([
            'user'  => $user
        ],200);

    }
    public function updateUser(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->telepon = $request->telepon;
        $user->address = $request->address;
        $user->save();
        return response()->json([
            'user'  => $user
        ],200);
    }
    protected function postOrder(Request $request){
        return response()->json([
            'order'     => $request->all()
        ]);
    }
    public function upload(Request $request){


       $avatar = $request->file('avatar');
       $avatar = $avatar->store('user','public');
       return response()->json([
           'avatar' => $avatar
       ]);
    }
   
}
