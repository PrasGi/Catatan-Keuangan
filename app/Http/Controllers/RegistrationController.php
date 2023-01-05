<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        if ($user = User::create($validateData)) return response()->json(['message' => 'Success register account']);

        return response()->json(['message' => 'Failed register account']);
    }
}
