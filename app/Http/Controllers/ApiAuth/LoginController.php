<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Api\User\UserResourceController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Sanctum;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = $request->all();
        $validator = $this->validator($data);
        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ],412);
        }
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
                $user = Auth::user();
                $token = $user->createToken('Api_Token');
                $token = $token->plainTextToken;
                $user = UserResourceController::user($user);
                return response()->json([
                    'user'      =>  $user,
                    'token'     => $token             
                    ],200);
        }
        return response()->json([
            'message' => 'error'
        ],412);
    }
    public function validator(array $data){
        return Validator::make($data,[
            'email'     => ['required', 'string', 'max:255','email'],
            'password'  => ['required', 'string', 'min:8', 'max:255']
        ]);
    }
    public function createTokenUser(User $user){

    }
    public function logout(Request $request){
       if($token = $request->bearerToken()){
           $model = Sanctum::$personalAccessTokenModel;
           $accessToken = $model::findToken($token);
           $accessToken->delete();
       }
       return response()
           ->json([
              'message'    => 'logout success'
           ],200);
      
       }
    
}
