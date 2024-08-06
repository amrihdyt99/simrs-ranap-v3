<h3 class="bg-warning p-2">CATATAN KEPERAWATAN PRA TINDAKAN (diisi oleh perawat ruangan)</h3>
<ol>
    <li>
        Tanda-tanda Vital
        <div class="row">
            <div class="col-lg-2">
                {!!input('pra_suhu', 'Suhu (Celcius)')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_nadi', 'Nadi (x/mnt)')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_rr', 'RR (x/mnt)')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_td', 'TD (mmHg)')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_skor_nyeri', 'Skor Nyeri')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_tb', 'TB (cm)')!!}
            </div>
            <div class="col-lg-2">
                {!!input('pra_bb', 'BB (kg)')!!}
            </div>
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-lg-2">
                Status Mental
            </div>
            <div class="col-lg-10">
                {!!checkbox('pra_status_mental', 'Sadar penuh')!!}
                {!!checkbox('pra_status_mental', 'Bingung')!!}
                {!!checkbox('pra_status_mental', 'Agitasi')!!}
                {!!checkbox('pra_status_mental', 'Mengantuk')!!}
                {!!checkbox('pra_status_mental', 'Koma')!!}
            </div>
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-lg-2">
                Riwayat Penyakit
            </div>
            <div class="col-lg-10">
                {!!checkbox('pra_penyakit_dahulu', 'Hipertensi')!!}
                {!!checkbox('pra_penyakit_dahulu', 'Diabetes')!!}
                {!!checkbox('pra_penyakit_dahulu', 'Hepatitis')!!}
                {!!checkbox('pra_penyakit_dahulu', 'Lainnya')!!}
            </div>
        </div>
    </li>
    <li>
        {!!input('pra_pengobatan_sekarang', 'Pengobatan saat ini')!!}
    </li>
    <li>
        <div class="row">
            <div class="col-lg-4">
                {!!input('pra_katerisasi', 'Riwayat Katerisasi')!!}
            </div>
            <div class="col-lg-2">
                Pasang Stent
            </div>
            <div class="col-lg-2">
                {!!checkbox('pra_stent', 'Ya')!!}
                {!!checkbox('pra_stent', 'Tidak')!!}
            </div>
            <div class="col-lg-4">
                {!!input('pra_stent_di', 'Di..')!!}
            </div>
        </div>
    </li>
    <li>
        Riwayat Operasi
        <div class="row">
            <div class="col-lg-4">
                {!!input('pra_jenis', 'Jenis')!!}
            </div>
            <div class="col-lg-4">
                {!!input('pra_kapan', 'kapan')!!}
            </div>
            <div class="col-lg-4">
                {!!input('pra_di', 'di')!!}
            </div>
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-lg-2">
                Alergi obat/kontras
            </div>
            <div class="col-lg-2">
                {!!radio('pra_alergi', 'Tidak diketahui')!!}
            </div>
            <div class="col-lg-2">
                {!!radio('pra_alergi', 'Tidak ada')!!}
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-2">
                        {!!radio('pra_alergi', 'Ada')!!}
                    </div>
                    <div class="col-lg-10">
                        {!!input('pra_alergi_ada', ', Sebutkan')!!}
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li>
        Pemeriksaan Laboratorium
        <div class="row">
            <div class="col-lg-2">
                {!!input('cath_signin_ureum', 'ureum')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_creatinin', 'creatinin')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_hbsag', 'hbsag')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_gds', 'gds')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_hb', 'hb')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_trombosit', 'trombosit')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_pt', 'pt')!!}
            </div>
            <div class="col-lg-2">
                {!!input('cath_signin_aptt', 'aptt')!!}
            </div>
        </div>
    </li>
</ol>

<br>
<h3 class="bg-warning p-2">CEKLIST PERSIAPAN TINDAKAN (diisi oleh perawat ruangan dan perawat cath lab)</h3>

<div class="row">
    <div class="col-lg-4">
        Beri tanda pada kolom Ruangan/cathlab
    </div>
    <div class="col-lg-8">
        {!!radio('ceklist_kesiapan_ruang', 'Ya')!!}
        {!!radio('ceklist_kesiapan_ruang', 'Tidak')!!}
        {!!radio('ceklist_kesiapan_ruang', 'Tidak ada')!!}
    </div>
</div>
<br>
<table class="table table-striped">
    <tbody>
        <tr>
            <th colspan="2">I. VERIFIKASI PASIEN</th>
            <th>Ruangan</th>
            <th>CathLab</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($data_verifikasi_pasien as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item['item']}}</td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
            </tr>
        @endforeach
        <tr>
            <th colspan="2">II. PERSIAPAN FISIK PASIEN</th>
            <th>Ruangan</th>
            <th>CathLab</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($data_persiapan_pasien as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item['item']}}</td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
                <td style="border-bottom: 1px solid black" contenteditable="true"></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                {!!input('ceklist_tanggal_1', 'Tanggal dan Jam ', 'datetime-local')!!}
            </td>
            <td>
                {!!input('ceklist_perawat_ruangan', 'Perawat Ruangan')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!!input('ceklist_tanggal_1', 'Tanggal dan Jam ', 'datetime-local')!!}
            </td>
            <td>
                {!!input('ceklist_perawat_cathlab', 'Perawat Cathlab')!!}
            </td>
        </tr>
    </tfoot>
</table>

<button type="button" id="btn_pra_tindakan" class="btn btn-success float-right">Simpan</button>