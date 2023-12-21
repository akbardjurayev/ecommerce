<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request){

        $user = User::where('phone', $request->phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'data' => 'Token is incorrect'
            ]);
        }

        return $user->createToken($user->name)->plainTextToken;
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
              'data'=>'User logged out'
        ]);
    }
}
