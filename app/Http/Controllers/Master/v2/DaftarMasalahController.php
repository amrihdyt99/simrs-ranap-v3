<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\DaftarMasalah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarMasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_daftar_masalah")->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.daftar-masalah.edit', [$row->masalah_kode]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->masalah_kode'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.daftar_masalah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.daftar_masalah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'masalah_kode' => ['required', 'string'],
            'masalah_nama' => ['required', 'string'],
            'masalah_layanan'  => ['numeric'],
        ]);

        $cek = DaftarMasalah::find($request->masalah_kode);
        if ($cek) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kode Masalah sudah digunakan !',
            ]);
        }

        $validation['updated_by'] = auth()->user()->username;
        $validation['created_at'] = Carbon::now();

        DaftarMasalah::create($validation);
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan !',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $daftarMasalah = DaftarMasalah::find($id);
        return view('master.pages.daftar_masalah.update', compact('daftarMasalah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $daftarMasalah = DaftarMasalah::find($id);
        $validation = $request->validate([
            'masalah_kode' => ['required', 'string'],
            'masalah_nama' => ['required', 'string'],
            'masalah_layanan'  => ['numeric'],
        ]);

        $validation['updated_by'] = auth()->user()->username;
        $validation['updated_at'] = Carbon::now();
        $daftarMasalah->update($validation);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $daftarMasalah = DaftarMasalah::find($id);
        $daftarMasalah->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
