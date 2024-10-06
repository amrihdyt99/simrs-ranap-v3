<div id="p_s_asper">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASSESMEN AWAL KLINIK (PERAWAT)</h3>
            <small>Diisi pada tanggal <span id="tgl-assesment"></span></small>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <button type="button" class="btn btn-warning" onclick="nextPage('#p_s_asdok', 'p_s_')"><i class="fas fa-arrow-right"></i> Assesmen Dokter</button>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($data_pasien->kategori_pasien == 'dewasa')
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.dewasa.table-awal')
            </div>
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.dewasa.table-nyeri')
                @include('new_perawat.riwayat-v2.dewasa.table-gizi')
            </div>
        @endif

        @if ($data_pasien->kategori_pasien == 'kebidanan')
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.obgyn.table-awal')
                @include('new_perawat.riwayat-v2.obgyn.table-kehamilan')
                @include('new_perawat.riwayat-v2.obgyn.table-gizi')
                @include('new_perawat.riwayat-v2.obgyn.table-nyeri')
            </div>
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.obgyn.table-fungsional')
                @include('new_perawat.riwayat-v2.obgyn.table-kulit-kebutuhan')
            </div>
        @endif

        @if ($data_pasien->kategori_pasien == 'anak')
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.anak.table-awal')
        </div>
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.anak.table-gizi')
            @include('new_perawat.riwayat-v2.anak.table-nyeri')
        </div>
        @endif

        @if ($data_pasien->kategori_pasien == 'bayi')
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.neonatus.table-awal')
            @include('new_perawat.riwayat-v2.neonatus.table-nyeri-eliminasi')
        </div>
        <div class="col-lg-6">
        </div>
        @endif
    </div>
</div>
<div id="p_s_asdok" style="display: none">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASSESMEN AWAL KLINIK (DOKTER)</h3>
            <small>Diisi pada tanggal <span id="tgl-baru-asdok"></span></small>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <button type="button" class="btn btn-warning" onclick="prevPage('#p_s_asper', 'p_s_')"><i class="fas fa-arrow-left"></i> Assesmen Perawat</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="t-baru-asdok" class="table1" width="100%">
                <tbody>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">ANAMNESIS</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Diperoleh data dari</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Keluhan Utama</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Perjalanan Penyakit</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dahulu</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Pengobatan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Alat Implant</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dalam Keluarga</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Pribadi (Personal, Sosial, Lingkungan) / Kebiasaan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pemeriksaan Multi Organ</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Daftar Masalah</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Penatalaksanaan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kontrol Ulang</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Masuk Rawat Inap</td>
                        <td class="data"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
