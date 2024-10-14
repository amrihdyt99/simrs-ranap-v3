<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Paramedic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function universal_function()
    {
        $x = new \App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController;
        return $x;
    }

    function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('master.pages.user.index');
    }

    public function ajax_index($request)
    {
        // $user = DB::connection('mysql2')->table("users");
        $user = DB::connection('mysql2')->table("users")
            ->when($request->is_deleted !== null, function ($query) use ($request) {
                return $query->where('is_deleted', $request->is_deleted);
            });

        return DataTables()
            ->of($user)
            ->editColumn('aksi_data', function ($query) use ($request) {
                if ($query->is_deleted == '1') {
                    return '';
                }

                // khusus switcher
                $swc_class = 'success';
                $swc_xtext = 'Aktifkan';
                if ($query->is_active == '1') {
                    $swc_class = 'warning';
                    $swc_xtext = 'Nonaktifkan';
                }

                return ('<a href="'
                    . route('master.user.edit', [$query->id])
                    . '" class="btn btn-primary btn-sm">Edit</a>')
                    .
                    ('<button type="button" onclick="dx_dt(this)" nyaa-u-id="'
                        . $query->id
                        . '" class="btn m-1 btn-danger btn-sm">Hapus</a>')
                    .
                    ('<button type="button" onclick="dx_dt(this)" nyaa-u-id="'
                        . $query->id
                        . '" class="btn m-1 btn-' . $swc_class . ' btn-sm">' . $swc_xtext . '</a>');
            })
            ->editColumn('name', function ($query) {
                if (
                    $query->is_deleted == '1'
                ) {
                    return '<span class="badge bg-danger text-white">Dihapus</span><br>' . $query->name;
                }
                if (
                    $query->is_active == '0'
                ) {
                    return '<span class="badge bg-warning">Nonaktif</span><br>' . $query->name;
                }
                return $query->name;
            })
            ->editColumn('level_user', function ($query) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama($query->level_user);
            })
            ->escapeColumns([])
            ->toJson();
    }

    function create()
    {

        $paramedic = DB::connection('mysql2')
            ->table("m_paramedis")
            ->where([
                ['IsActive', 1],
                ['IsDeleted', 0],
            ])
            ->get();


        return view('master.pages.user.create', compact('paramedic'));
    }


    function store(Request $request)
    {
        $dataparamedis = null;

        if ($request->userlevel == 'dokter' || $request->userlevel == 'perawat') {
            $dataparamedis = DB::connection('mysql2')
                ->table("m_paramedis")
                ->where(['ParamedicCode' => $request->ParamedicCode])
                ->first();

            $name = $dataparamedis->ParamedicName;
        } else {
            $name = $request->name;
        }

        $params = [
            'name' => $name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'dokter_id' => $request->userlevel == 'dokter' ? $dataparamedis ? $dataparamedis->ParamedicCode : null : null,
            'perawat_id' => $request->userlevel == 'perawat' ? $dataparamedis ? $dataparamedis->ParamedicCode : null : null,
            'level_user' => $request->userlevel,
            'is_active' => 1,
            'is_deleted' => 0,
            'created_at' => Carbon::now(),
            'signature' => $request->ttd_user,
        ];

        $simpan = DB::connection('mysql2')
            ->table('users')
            ->insert($params);

        return redirect()->route('master.user.index')->with("success", "Data User Berhasil Ditambah.");
    }


    public function edit(User $user)
    {
        $data['user'] = $user;
        // dd($user);
        // $data['m_paramedis']= Paramedic::all();
        return view('master.pages.user.update', $data);
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $rules = [
            'ParamedicCode' => 'required',
            'username' => 'required|string|max:255',
            'userlevel' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('master.user.edit', [$user->id])
                ->withErrors($validator)
                ->withInput();
        }

        $dataparamedis = DB::connection('mysql2')
            ->table("m_paramedis")
            ->where('ParamedicCode', $request->ParamedicCode)
            ->first();

        if (!$dataparamedis) {
            return redirect()->route('master.user.edit', [$user->id])
                ->with('error', 'Data paramedis tidak ditemukan.')
                ->withInput();
        }

        $params = [
            'name' => $dataparamedis->ParamedicName,
            'username' => $request->username,
            'dokter_id' => $dataparamedis->ParamedicCode,
            'perawat_id' => $dataparamedis->ParamedicCode,
            'level_user' => $request->userlevel,
        ];

        if ($request->password) {
            $params["password"] = Hash::make($request->password);
        }

        if ($request->ttd_user) {
            $params["signature"] = $request->ttd_user;
        }

        $user->update($params);

        return redirect()->route('master.user.index')->with("success", "Data User Berhasil Diperbarui.");
    }


    public function processor(Request $request)
    {
        if (!$request->mode) {
            return response()->json(
                array("error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan!'),
                422
            );
        }
        $nyaa = $this->universal_function();
        // proses
        if ($request->mode == 'Hapus') {
            return $nyaa->nyaa_hapus_flag_updater('users', $request, 'User');
        } else {
            return $nyaa->nyaa_aktif_nonaktif_switch('users', $request, 'User', true);
        }
    }
}
