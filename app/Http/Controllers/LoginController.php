<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        \Log::info($request->all());
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|max:255',
        ]);
        $user = User::where('email', $validated['email'])->first();
        if(!$user || !Hash::check($validated['password'], $user->password) ) {
            return response()->json([
                'message' => '登録されていないユーザーである、またはメールアドレスかパスワードのどちらかが違います',
                'login' => false,
            ]);
        }

        $token = $user->createToken('studiu-u-sicilianu')->plainTextToken;


        return response()->json([
            'message' => 'ログインしました',
            'login' => true,
            'token' => $token,
        ]);
    }
}
