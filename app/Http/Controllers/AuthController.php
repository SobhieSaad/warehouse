<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields=$request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string|confirmed'
        ]);

        $user=User::create([
            'first_name'=>$fields['first_name'],
            'last_name'=>$fields['last_name'],
            'phone'=>$fields['phone'],
            'email'=>$fields['email'],
            'password'=>bcrypt( $fields['password']),
        ]);

        $token=$user->createToken($fields['first_name'])->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=> $token
        ];

        return response($response,201);

    }
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
