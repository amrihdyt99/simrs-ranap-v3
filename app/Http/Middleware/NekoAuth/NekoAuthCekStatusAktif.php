<?php

namespace App\Http\Middleware\NekoAuth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class NekoAuthCekStatusAktif
{
    public function handle(Request $request, Closure $next)
    {
        // cek user aktif
        if(Auth::check() && (
            Auth::user()->is_active != '1'
            || Auth::user()->is_deleted == '1'
        )){
            try {
                $dx_mode_text = 'dinonaktifkan';
                if(Auth::user()->is_deleted == '1'){
                    $dx_mode_text = 'telah dihapus';
                }

                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                if($request->ajax()){
                    return response()->json([
                        'success' => false,
                        'message' => 'Akun '.$dx_mode_text.'. Mohon Hubungi pihak terkait untuk informasi lebih lanjut.',
                        'data' => null,
                    ],403);
                };
                return redirect()->route('login')
                     ->with('error_message', 'Akun '.$dx_mode_text.'. Mohon Hubungi pihak terkait untuk informasi lebih lanjut.');
            } catch (Exception $e) {
                // $e->getMessage()
                if($request->ajax()){
                    return response()->json([
                        'success' => false,
                        'message' => 'Terjadi kesalahan sistem! Mohon untuk mencoba kembali beberapa saat lagi.',
                        'data' => null,
                    ],500);
                };
                return redirect()->route('login')
                     ->with('error_message', 'Terjadi kesalahan sistem! Mohon untuk mencoba kembali beberapa saat lagi.');
            }
        }
        return $next($request);
    }
}
