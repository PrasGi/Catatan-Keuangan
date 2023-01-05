<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $auth = User::where('email', $request->email)->first();
//            $request->session()->regenerate();
            return response()->json([
                'message' => 'Success login',
                'token' => $auth->createToken('api_token')->plainTextToken
            ]);
        }
        return response()->json(['message' => 'Failed login'], 401);
    }

    public function logout(Request $request){
        try {
            if ($request->user()){
                auth()->user()->tokens()->delete();

                return response()->json([
                    'message' => 'Sukses logout'
                ]);
            }

            return response()->json(['message' => 'Logout Eror'], 401);
        } catch (\Exception $e){
            return response()->json(['message' => 'LoginController expired'], 401); // 401 pesan eror
        }
    }
}
