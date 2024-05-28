<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginApi(Request $request)
    {
      try {
        $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
          return response()->json([
            'message' => 'Invalid login credentials',
          ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
          'message' => 'Login success',
          'user' => $user,
          'token' => $token,
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
          'message' => 'Login failed',
          'error' => $e->getMessage(),
        ], 500);
      }     
    }

    public function logoutApi(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Berhasil logout',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal logout',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
