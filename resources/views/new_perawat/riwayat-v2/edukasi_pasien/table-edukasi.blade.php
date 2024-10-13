<h3 class="card-title">FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI</h3>
<form id="entry-edukasi">
    <div class="table-responsive">
        <table class="table1 w-100" id="table-edukasi-riwayat">
            <thead>
                <tr>
                    {{-- <th></th>
                            <th colspan="5"></th> --}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bahasa</td>
                    <td>
                        <input type="checkbox" id="bahasa_indonesia" name="bahasa[]" value="Indonesia" disabled>
                        <label for="bahasa_indonesia">Indonesia</label>
                    </td>
                    <td>
                        <input type="checkbox" id="bahasa_inggris" name="bahasa[]" value="Inggris" disabled>
                        <label for="bahasa_inggris">Inggris</label>
                    </td>
                    <td>
                        <input type="checkbox" id="bahasa_daerah" name="bahasa[]" value="Daerah" disabled>
                        <label for="bahasa_daerah">Daerah</label>
                    </td>
                    <td>
                        <input type="checkbox" id="bahasa_lain" name="bahasa[]" value="Lain-lainnya" disabled>
                        <label for="bahasa_lain">Lain-lainnya</label>
                    </td>
                </tr>
                <tr>
                    <td>Kebutuhan Penerjemah</td>
                    <td>
                        <input class="" type="radio" name="kebutuhan_penerjemah" value="Ya" id="kebutuhan_penerjemah_ya" disabled>
                        <label for="kebutuhan_penerjemah_ya">Ya</label>
                    </td>
                    <td colspan="5">
                        <input class="" type="radio" name="kebutuhan_penerjemah" value="Tidak" id="kebutuhan_penerjemah_tidak" disabled>
                        <label for="kebutuhan_penerjemah_tidak">Tidak</label>
                    </td>
                </tr>
                <tr>
                    <td>Pendidikan Pasien</td>
                    <td>
                        <input type="checkbox" id="pendidikan_sd" name="pendidikan_pasien[]" value="SD" disabled>
                        <label for="pendidikan_sd">SD</label>
                    </td>
                    <td>
                        <input type="checkbox" id="pendidikan_sltp" name="pendidikan_pasien[]" value="SLTP" disabled>
                        <label for="pendidikan_sltp">SLTP</label>
                    </td>
                    <td>
                        <input type="checkbox" id="pendidikan_sma" name="pendidikan_pasien[]" value="SMA" disabled>
                        <label for="pendidikan_sma">SMA</label>
                    </td>
                    <td>
                        <input type="checkbox" id="pendidikan_d3" name="pendidikan_pasien[]" value="D3" disabled>
                        <label for="pendidikan_d3">D3</label>
                    </td>
                    <td>
                        <input type="checkbox" id="pendidikan_s1" name="pendidikan_pasien[]" value="S1" disabled>
                        <label for="pendidikan_s1">S1</label>
                    </td>
                </tr>
                <tr>
                    <td>Baca dan tulis</td>
                    <td>
                        <input type="checkbox" id="baca_tulis_baik" name="baca_tulis[]" value="Baik" disabled>
                        <label for="baca_tulis_baik">Baik</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="baca_tulis_kurang" name="baca_tulis[]" value="Kurang" disabled>
                        <label for="baca_tulis_kurang">Kurang</label>
                    </td>
                </tr>
                <tr>
                    <td>Pilihan tipe belajar</td>
                    <td>
                        <input type="checkbox" id="tipe_belajar_verbal" name="pilihan_tipe_belajar[]" value="Verbal" disabled>
                        <label for="tipe_belajar_verbal">Verbal</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="tipe_belajar_tulisan" name="pilihan_tipe_belajar[]" value="Tulisan" disabled>
                        <label for="tipe_belajar_tulisan">Tulisan</label>
                    </td>
                </tr>
                <tr>
                    <td rowspan="5">Hambatan belajar</td>
                    <td>
                        <input type="checkbox" id="hambatan_tidak_ada" name="hambatan_belajar[]" value="Tidak ada" disabled>
                        <label for="hambatan_tidak_ada">Tidak ada</label>
                    </td>
                    <td>
                        <input type="checkbox" id="hambatan_emosional" name="hambatan_belajar[]" value="Emosional" disabled>
                        <label for="hambatan_emosional">Emosional</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="hambatan_motivasi_lemah" name="hambatan_belajar[]" value="Motivasi Lemah" disabled>
                        <label for="hambatan_motivasi_lemah">Motivasi Lemah</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="hambatan_penglihatan_terganggu" name="hambatan_belajar[]" value="Penglihatan Terganggu" disabled>
                        <label for="hambatan_penglihatan_terganggu">Penglihatan Terganggu</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="hambatan_pendengaran_terganggu" name="hambatan_belajar[]" value="Pendengaran terganggu" disabled>
                        <label for="hambatan_pendengaran_terganggu">Pendengaran terganggu</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="hambatan_budaya_agama_spiritual" name="hambatan_belajar[]" value="Budaya / agama / spiritual" disabled>
                        <label for="hambatan_budaya_agama_spiritual">Budaya / agama / spiritual</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="hambatan_kognitif_terbatas" name="hambatan_belajar[]" value="Kognitif terbatas" disabled>
                        <label for="hambatan_kognitif_terbatas">Kognitif terbatas</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="hambatan_belajar_gangguan_bicara" name="hambatan_belajar[]" class="" value="Gangguan bicara" disabled>
                        <label for="hambatan_belajar_gangguan_bicara">Gangguan bicara</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="hambatan_belajar_lain" name="hambatan_belajar[]" class="" value="Lain-lain" disabled>
                        <label for="hambatan_belajar_lain">Lain-lain</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <input type="checkbox" id="hambatan_belajar_fisik_lemah" name="hambatan_belajar[]" class="" value="Fisik Lemah" disabled>
                        <label for="hambatan_belajar_fisik_lemah">Fisik Lemah</label>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4">Kebutuhan Belajar</td>
                    <td>
                        <input type="checkbox" id="kebutuhan_belajar_diagnosis" name="kebutuhan_belajar[]" class="" value="Diagnosis penyebab & gejala" disabled>
                        <label for="kebutuhan_belajar_diagnosis">Diagnosis penyebab & gejala</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="kebutuhan_belajar_peralatan" name="kebutuhan_belajar[]" class="" value="Penggunaan peralatan medis yang aman & efektif" disabled>
                        <label for="kebutuhan_belajar_peralatan">Penggunaan peralatan medis yang aman & efektif</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="kebutuhan_belajar_infeksi" name="kebutuhan_belajar[]" class="" value="Pencegahan & pengendalian Infeksi" disabled>
                        <label for="kebutuhan_belajar_infeksi">Pencegahan & pengendalian Infeksi</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="kebutuhan_belajar_diet" name="kebutuhan_belajar[]" class="" value="Diet" disabled>
                        <label for="kebutuhan_belajar_diet">Diet</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="kebutuhan_belajar_obat" name="kebutuhan_belajar[]" class="" value="Obat-obatan yang didapat" disabled>
                        <label for="kebutuhan_belajar_obat">Obat-obatan yang didapat</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="kebutuhan_belajar_rehabilitasi" name="kebutuhan_belajar[]" class="" value="Rehabilitasi medis" disabled>
                        <label for="kebutuhan_belajar_rehabilitasi">Rehabilitasi medis</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" id="kebutuhan_belajar_manajemen_nyeri" name="kebutuhan_belajar[]" class="" value="Manajemen nyeri" disabled>
                        <label for="kebutuhan_belajar_manajemen_nyeri">Manajemen nyeri</label>
                    </td>
                    <td colspan="5">
                        <input type="checkbox" id="kebutuhan_belajar_lain" name="kebutuhan_belajar[]" class="" value="Lain-lain" disabled>
                        <label for="kebutuhan_belajar_lain">Lain-lain</label>
                    </td>
                </tr>
                <tr>
                    <td>Kesediaan pasien untuk di edukasi</td>
                    <td>
                        <input class="" type="radio" name="kesediaan_pasien" value="Bersedia" id="kesediaan_pasien_bersedia" disabled>
                        <label for="kesediaan_pasien_bersedia">Bersedia</label>
                    </td>
                    <td>
                        <input class="" type="radio" name="kesediaan_pasien" value="Tidak" id="kesediaan_pasien_tidak" disabled>
                        <label for="kesediaan_pasien_tidak">Tidak</label>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <input type="text" name="reg_no" value="" hidden>
</form>

<div class="card mt-3">
    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#perawat" data-toggle="tab">Perawat</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#dokter" data-toggle="tab">Dokter</a></li>
            <li class="nav-item"><a class="nav-link" href="#gizi" data-toggle="tab">Gizi</a></li>
            <li class="nav-item"><a class="nav-link" href="#farmasi" data-toggle="tab">Farmasi</a></li>
            <li class="nav-item"><a class="nav-link" href="#rehab" data-toggle="tab">Rehab</a></li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="perawat">
                @include('new_perawat.riwayat-v2.edukasi_pasien.tab.perawat')
            </div>
            <div class="tab-pane" id="dokter">
                @include('new_perawat.riwayat-v2.edukasi_pasien.tab.dokter')
            </div>
            <div class="tab-pane" id="gizi">
                @include('new_perawat.riwayat-v2.edukasi_pasien.tab.gizi')
            </div>
            <div class="tab-pane" id="farmasi">
                @include('new_perawat.riwayat-v2.edukasi_pasien.tab.farmasi')
            </div>
            <div class="tab-pane" id="rehab">
                @include('new_perawat.riwayat-v2.edukasi_pasien.tab.rehab')
            </div>
        </div>
    </div>
</div>
