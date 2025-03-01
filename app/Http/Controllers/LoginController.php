<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $userName = $request->get('username');
        $password = $request->get('password');
        // \Log::info($userName . ':' . $password);

        // TODO:登録ユーザーと合致したらtrue


        return response()->json([
            'username' => $userName,
            'password' => $password,
            'login' => true,
        ]);
    }

    // public function register(Request $request)
    // {
    //     // TODO:Usersに登録をする
    // }
}
