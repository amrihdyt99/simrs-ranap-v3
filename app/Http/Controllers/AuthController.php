<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // $credentials['is_active'] = 1;

        try {


            if (Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->nyaa_default_redirect_index();
            }

            return back()->withErrors([
                'message' => 'Username atau password salah. Atau akun anda tidak aktif.',
            ]);
        } catch (\Exception $e) {
            $isdebug = env('APP_DEBUG', false);
            return back()->withErrors([
                'message' => 'Terjadi kesalahan! ' . ($isdebug ? ('Detail: ' . $e->getMessage()) : ''),
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
