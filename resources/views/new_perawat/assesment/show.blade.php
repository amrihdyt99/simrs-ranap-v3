<div id="p_s_asper">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASSESMEN AWAL KLINIK (PERAWAT)</h3>
            <small>Diisi pada tanggal <span id="tgl-baru-asper"></span></small>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <button type="button" class="btn btn-warning" onclick="nextPage('#p_s_asdok', 'p_s_')"><i class="fas fa-arrow-right"></i> Assesmen Dokter</button>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($dataPasien->kategori_pasien == 'dewasa')
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.assesment_awal.dewasa.table-awal')
            </div>
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.assesment_awal.dewasa.table-nyeri')
                @include('new_perawat.riwayat-v2.assesment_awal.dewasa.table-gizi')
            </div>
        @endif

        @if ($dataPasien->kategori_pasien == 'kebidanan')
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-awal')
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-kehamilan')
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-gizi')
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-nyeri')
            </div>
            <div class="col-lg-6">
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-fungsional')
                @include('new_perawat.riwayat-v2.assesment_awal.obgyn.table-kulit-kebutuhan')
            </div>
        @endif

        @if ($dataPasien->kategori_pasien == 'anak')
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.assesment_awal.anak.table-awal')
        </div>
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.assesment_awal.anak.table-gizi')
            @include('new_perawat.riwayat-v2.assesment_awal.anak.table-nyeri')
        </div>
        @endif

        @if ($dataPasien->kategori_pasien == 'bayi')
        <div class="col-lg-6">
            @include('new_perawat.riwayat-v2.assesment_awal.neonatus.table-awal')
            @include('new_perawat.riwayat-v2.assesment_awal.neonatus.table-nyeri-eliminasi')
        </div>
        <div class="col-lg-6">
        </div>
        @endif
    </div>
</div>
<div id="p_s_asdok">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASESMEN AWAL KLINIK (DOKTER)</h3>
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
                        <td>Data diperoleh dari</td>
                        <td class="data" id="data-diperoleh-dari"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Keluhan Utama</td>
                        <td class="data" id="keluhan-utama"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Perjalanan Penyakit</td>
                        <td class="data" id="riwayat-perjalanan-penyakit"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dahulu</td>
                        <td class="data" id="riwayat-penyakit-dahulu"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Pengobatan</td>
                        <td class="data" id="riwayat-pengobatan"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dalam Keluarga</td>
                        <td class="data" id="riwayat-penyakit-dalam-keluarga"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pemeriksaan Multi Organ</td>
                        <td class="data" id="pemeriksaan-multi-organ"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kepala Dan Leher TORAKS: Paru(inspeksi,palpasi,perkursi dan auskultasi)</td>
                        <td class="data" id="kepala-dan-leher-toraks"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Jantung(inspeksi,palpasi,perkursi dan auskultasi)</td>
                        <td class="data" id="jantung"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>ABDOMEN</td>
                        <td class="data" id="abdomen"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>GENITALIA DAN ANUS(diperiksa bila ada indikasi)</td>
                        <td class="data" id="genitalia-dan-anus"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>HASIL PEMERIKSAAN PENUNJANG</td>
                        <td class="data" id="hasil-pemeriksaan-penunjang"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>DAFTAR MASALAH/DIAGNOSIS MEDIK</td>
                        <td class="data" id="daftar-masalah-diagnosis-medik"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>TATA LAKSANA AWAL</td>
                        <td class="data" id="tata-laksana-awal"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Tanggal Pemberian</td>
                        <td class="data" id="tanggal-pemberian"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
