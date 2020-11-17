<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $creds = $request->only(['email', 'password']);

        $token = auth()->attempt($creds);

        if(!$token) {
            return response()->json(['message' => 'Incorrect Email or Password'], 401);
        }else {
            return response()->json(['token' => $token], 200);
        }
    }


    public function refresh_token(){
        try{
            $newToken = auth()->refresh();
        }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return response()->json(['token' => $newToken], 200);

    }
}
