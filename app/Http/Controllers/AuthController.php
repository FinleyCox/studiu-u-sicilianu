<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        \Log::info($request->all());
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|max:255',
        ]);
        User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return response()->json([
            'message' => '登録が完了しました',
            'register' => true,
        ]);
    }
}
