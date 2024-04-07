<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\key;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $valider = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $valider['name'];
        $user->email = $valider['email'];
        $user->password = Hash::make($valider['password']);
        $user->save();

        return response()->json(['message' => 'good response']);
    }


    public function login(Request $request)
    {
        $retrieve = $request->only('password','email');

        if(Auth::attempt($retrieve))
        {
            $user = Auth::User();
            $token =$this->GenererToken($user);

            return response()->json(['token'=>$token,'message'=>'success']);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }



    public function GenererToken($user)
    {
        $payload =[
            'id'=> $user->id,
            'email'=> $user->email,
        ];

        return JWT::encode($payload, env('JWT_SECRET'),'HS256');
    }
}
