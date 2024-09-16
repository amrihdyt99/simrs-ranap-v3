 @php
    $dx_no_reg = $reg;
    $dx_med_no = $medrec;
    $nyaa = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class);

    // get order dengan kriteria:
    // jenis_order = lainnya
    $allorder_cr = \DB::connection('mysql')
                    ->table("monitoring_transfusi_darah")
                    ->where('reg_no', $dx_no_reg)
                    ->where('reg_medrec', $dx_med_no)
                    ->orderBy('waktu_transfusi','asc')
                    ->orderBy('id','asc')
                    ->get();
 @endphp

<div class="row">
@foreach ($allorder_cr as $list_transfusi)
    <div class="col-sm-12 col-md-6 p-3">
        <div class="card">
        <div class="card-header">
            <td><button type="button" class="btn btn-sm btn-danger" onclick="nyaa_delete_transfusidarah('{{$list_transfusi->id}}')">Hapus</button></td>
        </div>
        <table class="card-table table">
            <tbody>
            <tr>
                <td>Nomor Kantong</td>
                <td>{{ $list_transfusi->nomor_kantong }}</td>
            </tr>
            <tr>
                <td>Golongan Darah</td>
                <td>{{ $list_transfusi->golongan_darah }}</td>
            </tr>
            <tr>
                <td>Jenis Darah/Komponen</td>
                <td>{{ $list_transfusi->jenis_darah }}</td>
            </tr>
            <tr>
                <td>Tanggal Kadarluarsa</td>
                <td>{{ $list_transfusi->tanggal_kadarluarsa }}</td>
            </tr>
            <tr>
                <td>Nama Penerima Darah</td>
                <td>{{ $list_transfusi->penerima_darah }}</td>
            </tr>
            <tr>
                <td>Waktu Transfusi</td>
                <td>{{ $list_transfusi->waktu_transfusi }}</td>
            </tr>
            <tr>
                <td>Keadaan Umum</td>
                <td>{{ $list_transfusi->keadaan_umum }}</td>
            </tr>
            <tr>
                <td>Suhu Tubuh</td>
                <td>{{ $list_transfusi->suhu_tubuh }}</td>
            </tr>
            <tr>
                <td>Nadi</td>
                <td>{{ $list_transfusi->nadi }}</td>
            </tr>
            <tr>
                <td>Tekanan Darah</td>
                <td>{{ $list_transfusi->tekanan_darah }}</td>
            </tr>
            <tr>
                <td>Respiratory Rate</td>
                <td>{{ $list_transfusi->respiratory_rate }}</td>
            </tr>
            <tr>
                <td>Volume dan Warna Urin</td>
                <td>{{ $list_transfusi->volume_warna_urin }}</td>
            </tr>
            <tr>
                <td>Gejala Reaksi Transfusi</td>
                <td>{{ $list_transfusi->gejala_reaksi_transfusi }}</td>
            </tr>
            <tr>
                <td>Pilihan Menit</td>
                <td>{{ $list_transfusi->pilihan_menit }}</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
@endforeach
</div>