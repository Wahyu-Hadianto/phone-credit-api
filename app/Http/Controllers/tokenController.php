<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class tokenController extends Controller
{
    public function setToken(){
        return view('auth.token');
    }
    public function getToken(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $token = $user->tokens;
        dd($token);
    }
}
