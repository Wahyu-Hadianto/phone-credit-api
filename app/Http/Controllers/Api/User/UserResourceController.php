<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    public static function user(User $user ){
        $orders = [];
        $orders = OrderResourceController::orders($user->orders);
        return [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'avatar'        => asset($user->avatar),
            'telepon'       => $user->telepon,
            'address'       => $user->address,
            'order'         => $orders,
            'created_at'    => $user->created_at
        ];
    }
}
