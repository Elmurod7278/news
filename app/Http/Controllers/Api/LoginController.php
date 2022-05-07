<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(['email' => $request['email']])->first();
        if ($user && Hash::check($request['password'], $user['password'])) {
            $token = $user->createToken('userToken')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ]);
        }
        return response([], 404);

    }
}
