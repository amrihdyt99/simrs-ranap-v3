<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ServiceRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }

        return view('master.pages.ruangan.index');
    }

    public function ajax_index(Request $request)
    {
        $ruangan = DB::connection('mysql2')->table('m_ruangan');

        if ($request->has('IsDeleted') && $request->IsDeleted !== '') {
            if ($request->IsDeleted == '1') {
                $ruangan->where('IsDeleted', 1);
            } else if ($request->IsDeleted == '0') {
                $ruangan->where('IsDeleted', 0);
            }
        }

        if ($request->has('IsActive') && $request->IsActive !== '') {
            if ($request->IsActive == '1') {
                $ruangan->where('IsActive', 1);
            } else if ($request->IsActive == '0') {
                $ruangan->where('IsActive', 0);
            }
        }

        return DataTables()
            ->of($ruangan)
            ->addColumn('action', function ($row) {
                $editUrl = route('master.ruangan.edit', [$row->RoomID]);

                $actionBtn = '<div class="btn-group" role="group">';
                $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->RoomID'><i class='fas fa-trash'></i> Hapus</button>";
                $actionBtn .= '</div>';

                return $actionBtn;
            })
            ->escapeColumns([])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $params=$request->all();
        // unset($params['_token']);
        // $nama_kelas="";
        // if($request->id_kelas=="1"){
        //     $nama_kelas="Kelas I";
        // }else if($request->id_kelas="2"){
        //     $nama_kelas="Kelas II";
        // }else if($request->id_kelas="3"){
        //     $nama_kelas="Kelas III";
        // }else if($request->id_kelas="4"){
        //     $nama_kelas="VIP";
        // }else if($request->id_kelas="5"){
        //     $nama_kelas="VVIP";
        // }
        // $params['nama_kelas']=$nama_kelas;
        // $simpan=DB::connection('mysql2')->table('ketersediaan_ruangan')
        //     ->insert($params);

        $validation = $request->validate([
            'RoomCode' => ['required'],
            'RoomName' => ['required'],
            'IP' => ['string', 'nullable'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['IsDeleted'] = $request->input('IsDeleted', 0);
        $validation['LastUpdatedBy'] = Auth::user()->id;
        $validation['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        DB::connection('mysql2')->table('m_ruangan')->insert($validation);

        return redirect()->route('master.ruangan.index')->with("success", "Data Room Berhasil Ditambah.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRoom $serviceRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRoom $ruangan)
    {
        return view('master.pages.ruangan.update', ['ruangan' => $ruangan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'RoomCode' => ['required'],
            'IP' => ['string', 'nullable'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = Auth::user()->id;
        $validation['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        DB::connection('mysql2')->table('m_ruangan')->where('RoomID', $id)->update($validation);

        return redirect()->route('master.ruangan.index')->with("success", "Data Ruangan Berhasil Diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ruangan = DB::connection('mysql2')->table('m_ruangan')->where('RoomID', $id)->first();

            if (!$ruangan) {
                return response()->json(['error' => 'Ruangan tidak ditemukan.'], 404);
            }

            $validation['IsDeleted'] = 1;
            $validation['IsActive'] = 0;
            $validation['LastUpdatedBy'] = Auth::user()->id;
            $validation['LastUpdatedDateTime'] = Carbon::now();

            DB::connection('mysql2')->table('m_ruangan')->where('RoomID', $id)->update($validation);

            return response()->json(['success' => 'Data Berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus data.'], 500);
        }
    }

    public function changeStatusActive(Request $request, $id)
    {
        try {
            $ruangan = DB::connection('mysql2')->table('m_ruangan')->where('RoomID', $id)->first();

            if (!$ruangan) {
                return response()->json(['error' => 'Ruangan tidak ditemukan.'], 404);
            }

            if ($ruangan->IsDeleted == 1) {
                return response()->json(['error' => 'Data sudah dihapus dan tidak bisa diaktifkan.'], 400);
            }

            $statusBaru = $ruangan->IsActive == 1 ? 0 : 1;

            DB::connection('mysql2')->table('m_ruangan')
                ->where('RoomID', $id)
                ->update([
                    'IsActive' => $statusBaru,
                    'LastUpdatedBy' => auth()->user()->id,
                    'LastUpdatedDateTime' => Carbon::now()
                ]);

            $statusText = $statusBaru == 1 ? 'Aktif' : 'Nonaktif';

            return response()->json(['success' => "Status telah diubah menjadi $statusText."]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengubah status. Silakan coba lagi nanti.'], 500);
        }
    }
}
