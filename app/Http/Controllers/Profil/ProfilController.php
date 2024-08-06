<?php

namespace App\Http\Controllers\Profil;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfilController extends Controller
{
    public $judul_atas = "Profil";

    public function universal_function()
    {
        $x = new \App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController;
        return $x;
    }

    public function index(){
        $context = [
            'user_detail' => $this->universal_function()->detect_component_user()->user_detail,
        ];
        // dd($context);
        return view('profil-saya.index')
        ->with($context)
        ->with(get_object_vars($this));
    }

    public function update_password(Request $request)
    {
        $rules = [
            /*
            'password'            => 'required|min:6',
            */
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'konfirmasi_password' => 'required|same:password',
        ];
        $custom_message = [
            'password.required'            => 'Gagal. Silahkan isi Password. ',
            'password.min'                 => 'Gagal. Panjang Password minimal 8 karakter. ',
            'konfirmasi_password.required' => 'Gagal. Silahkan isi Konfirmasi Password. ',
            'konfirmasi_password.same'     => 'Gagal. Isian Password Baru dan Konfirmasi Password Baru harus sama. Silahkan coba lagi. ',
        ];
        $request->validate($rules, $custom_message);

        User::find(Auth::user()->id)->update([
            'password'=> Hash::make($request->konfirmasi_password),
        ]);

        return redirect()->route('profil_saya.index')
        ->with('success_message', 'Password / Kata Sandi baru berhasil disimpan.');
    }

}
