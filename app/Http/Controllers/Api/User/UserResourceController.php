<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    public static function user(User $user ){
        return [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'avatar'        => asset('/storage/'.$user->avatar),
            'telepon'       => $user->telepon,
            'address'       => $user->address,
            'created_at'    => $user->created_at
        ];
    }
}
