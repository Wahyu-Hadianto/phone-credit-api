<?php

namespace App\Http\Controllers\ApiAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;
    public function register(Request $request){
      $data = $request->all();
      $validator =  $this->validator($data);
      if($validator->fails()){
          return response()->json([
                'errors' => $validator->errors()
          ],412);
      }else{
        $user =  $this->createUser($data);
      }
        return response()->json([
            'status'    => 'ok',
            'data'      => $user
        ],201);
    }   
    public function validator(array $data){
    return  $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
      
    }
    protected function createUser(array $data){
          $user = User::create([
                 'name'         => $data["name"],
                 'email'        => $data["email"],
                 'password'    => bcrypt($data["password"]) 
             ]);   
          return $user;      
    }
}
