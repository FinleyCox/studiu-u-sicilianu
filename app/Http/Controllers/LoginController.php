<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
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
        $username = $user['name'];

        return response()->json([
            'message' => 'ログインしました',
            'login' => true,
            'token' => $token,
            'username' => $username,
            'userId' => $user->id,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        if($user) {
            $user->tokens()->delete();
            return response()->json([
                'message' => 'ログアウトしました',
                'logout' => true,
            ]);
        }
        return response()->json([
            'message' => '未認証のユーザーです',
            'logout' => false,
        ], 401);

    }

    // パスワード再設定
    public function resetPassword(Request $request)
    {
        // メールアドレスと新しいパスワードを受け取る
        $email = $request->input('email');
        $newPassword = $request->input('password');
        try {
            // email, パスワードの形式が正しいかどうか
            $validated = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|max:255',
            ]);
            if(!$validated) {
                $response = [
                    'success' => false,
                    'message' => 'メールアドレスまたはパスワードの形式が違います'
                ];
            }
            // ユーザーの特定
            $user = User::where('email', '=', $email)->first();
            if($user) {
                // パスワードの更新
                $user->password = Hash::make($newPassword);
                $user->save();
                $response = [
                    'success' => true,
                    'message' => 'パスワードの更新に成功しました'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => '登録されていないユーザーです'
                ];
            }
        } catch(\Exception $e) {
            \Log::debug($e);
            $response = [
                'success' => false,
                'message' => 'パスワードの更新に失敗しました'
            ];
        }

        // 結果を返す
        return response()->json($response);
    }
}
