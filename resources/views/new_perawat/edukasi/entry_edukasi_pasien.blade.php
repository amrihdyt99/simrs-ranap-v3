@empty($edukasi_pasien)
    @php
        $edukasi_pasien = optional((object) []);
        $edukasi_pasien_dokter = optional((object) []);
        $edukasi_pasien_perawat = optional((object) []);
        $edukasi_pasien_gizi = optional((object) []);
        $edukasi_pasien_farmasi = optional((object) []);
        $edukasi_pasien_rehab = optional((object) []);
    @endphp
@endempty

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI</h3>
        </div>
        <form id="entry-edukasi">
            @csrf
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table1">
                        <thead>
                            <tr>
                                {{-- <th></th>
                            <th colspan="5"></th> --}}
                            </tr>
                        </thead>
                        @php
                            $bahasa = explode(',', $edukasi_pasien->bahasa) ?? [];
                        @endphp
                        <tbody>
                            <tr>
                                <td>Bahasa</td>
                                <td>
                                    <input type="checkbox" id="bahasa_indonesia" name="bahasa[]" value="Indonesia"
                                        {{ in_array('Indonesia', $bahasa) ? 'checked' : '' }}>
                                    <label for="bahasa_indonesia">Indonesia</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="bahasa_inggris" name="bahasa[]" value="Inggris"
                                        {{ in_array('Inggris', $bahasa) ? 'checked' : '' }}>
                                    <label for="bahasa_inggris">Inggris</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="bahasa_daerah" name="bahasa[]" value="Daerah"
                                        {{ in_array('Daerah', $bahasa) ? 'checked' : '' }}>
                                    <label for="bahasa_daerah">Daerah</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="bahasa_lain" name="bahasa[]" value="Lain-lainnya"
                                        {{ in_array('Lain-lainnya', $bahasa) ? 'checked' : '' }}>
                                    <label for="bahasa_lain">Lain-lainnya</label>
                                </td>

                            </tr>
                            <tr>
                                <td>Kebutuhan Penerjemah</td>
                                <td>
                                    <input class="" type="radio" name="kebutuhan_penerjemah" value="Ya"
                                        id="kebutuhan_penerjemah_ya"
                                        {{ $edukasi_pasien->kebutuhan_penerjemah == 'Ya' ? 'checked' : '' }}>
                                    <label for="kebutuhan_penerjemah_ya">Ya</label>
                                </td>
                                <td colspan="5">
                                    <input class="" type="radio" name="kebutuhan_penerjemah" value="Tidak"
                                        id="kebutuhan_penerjemah_tidak"
                                        {{ $edukasi_pasien->kebutuhan_penerjemah == 'Tidak' ? 'checked' : '' }}>
                                    <label for="kebutuhan_penerjemah_tidak">Tidak</label>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $pendidikan_pasien = explode(',', $edukasi_pasien->pendidikan_pasien) ?? [];
                                @endphp
                                <td>Pendidikan Pasien</td>
                                <td>
                                    <input type="checkbox" id="pendidikan_sd" name="pendidikan_pasien[]" value="SD"
                                        {{ in_array('SD', $pendidikan_pasien) ? 'checked' : '' }}>
                                    <label for="pendidikan_sd">SD</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="pendidikan_sltp" name="pendidikan_pasien[]"
                                        value="SLTP" {{ in_array('SLTP', $pendidikan_pasien) ? 'checked' : '' }}>
                                    <label for="pendidikan_sltp">SLTP</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="pendidikan_sma" name="pendidikan_pasien[]" value="SMA"
                                        {{ in_array('SMA', $pendidikan_pasien) ? 'checked' : '' }}>
                                    <label for="pendidikan_sma">SMA</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="pendidikan_d3" name="pendidikan_pasien[]" value="D3"
                                        {{ in_array('D3', $pendidikan_pasien) ? 'checked' : '' }}>
                                    <label for="pendidikan_d3">D3</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="pendidikan_s1" name="pendidikan_pasien[]" value="S1"
                                        {{ in_array('S1', $pendidikan_pasien) ? 'checked' : '' }}>
                                    <label for="pendidikan_s1">S1</label>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $baca_tulis = explode(',', $edukasi_pasien->baca_tulis) ?? [];
                                @endphp

                                <td>Baca dan tulis</td>
                                <td>
                                    <input type="checkbox" id="baca_tulis_baik" name="baca_tulis[]" value="Baik"
                                        {{ in_array('Baik', $baca_tulis) ? 'checked' : '' }}>
                                    <label for="baca_tulis_baik">Baik</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="baca_tulis_kurang" name="baca_tulis[]" value="Kurang"
                                        {{ in_array('Kurang', $baca_tulis) ? 'checked' : '' }}>
                                    <label for="baca_tulis_kurang">Kurang</label>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $pilihan_tipe_belajar = explode(',', $edukasi_pasien->pilihan_tipe_belajar) ?? [];
                                @endphp

                                <td>Pilihan tipe belajar</td>
                                <td>
                                    <input type="checkbox" id="tipe_belajar_verbal" name="pilihan_tipe_belajar[]"
                                        value="Verbal"
                                        {{ in_array('Verbal', $pilihan_tipe_belajar) ? 'checked' : '' }}>
                                    <label for="tipe_belajar_verbal">Verbal</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="tipe_belajar_tulisan" name="pilihan_tipe_belajar[]"
                                        value="Tulisan"
                                        {{ in_array('Tulisan', $pilihan_tipe_belajar) ? 'checked' : '' }}>
                                    <label for="tipe_belajar_tulisan">Tulisan</label>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $hambatan_belajar = explode(',', $edukasi_pasien->hambatan_belajar) ?? [];
                                @endphp

                                <td rowspan="5">Hambatan belajar</td>
                                <td>
                                    <input type="checkbox" id="hambatan_tidak_ada" name="hambatan_belajar[]"
                                        value="Tidak ada"
                                        {{ in_array('Tidak ada', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_tidak_ada">Tidak ada</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="hambatan_emosional" name="hambatan_belajar[]"
                                        value="Emosional"
                                        {{ in_array('Emosional', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_emosional">Emosional</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="hambatan_motivasi_lemah" name="hambatan_belajar[]"
                                        value="Motivasi Lemah"
                                        {{ in_array('Motivasi Lemah', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_motivasi_lemah">Motivasi Lemah</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="hambatan_penglihatan_terganggu"
                                        name="hambatan_belajar[]" value="Penglihatan Terganggu"
                                        {{ in_array('Penglihatan Terganggu', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_penglihatan_terganggu">Penglihatan Terganggu</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="hambatan_pendengaran_terganggu"
                                        name="hambatan_belajar[]" value="Pendengaran terganggu"
                                        {{ in_array('Pendengaran terganggu', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_pendengaran_terganggu">Pendengaran terganggu</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="hambatan_budaya_agama_spiritual"
                                        name="hambatan_belajar[]" value="Budaya / agama / spiritual"
                                        {{ in_array('Budaya / agama / spiritual', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_budaya_agama_spiritual">Budaya / agama / spiritual</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="hambatan_kognitif_terbatas" name="hambatan_belajar[]"
                                        value="Kognitif terbatas"
                                        {{ in_array('Kognitif terbatas', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_kognitif_terbatas">Kognitif terbatas</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="hambatan_belajar_gangguan_bicara"
                                        name="hambatan_belajar[]" class="" value="Gangguan bicara"
                                        {{ in_array('Gangguan bicara', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_belajar_gangguan_bicara">Gangguan bicara</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="hambatan_belajar_lain" name="hambatan_belajar[]"
                                        class="" value="Lain-lain"
                                        {{ in_array('Lain-lain', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_belajar_lain">Lain-lain</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <input type="checkbox" id="hambatan_belajar_fisik_lemah"
                                        name="hambatan_belajar[]" class="" value="Fisik Lemah"
                                        {{ in_array('Fisik Lemah', $hambatan_belajar) ? 'checked' : '' }}>
                                    <label for="hambatan_belajar_fisik_lemah">Fisik Lemah</label>
                                </td>
                            </tr>
                            <tr>
                                @php
                                    $kebutuhan_belajar = explode(',', $edukasi_pasien->kebutuhan_belajar) ?? [];
                                @endphp
                                <td rowspan="4">Kebutuhan Belajar</td>
                                <td>
                                    <input type="checkbox" id="kebutuhan_belajar_diagnosis"
                                        name="kebutuhan_belajar[]" class="" value="Diagnosis penyebab & gejala"
                                        {{ in_array('Diagnosis penyebab & gejala', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_diagnosis">Diagnosis penyebab & gejala</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="kebutuhan_belajar_peralatan"
                                        name="kebutuhan_belajar[]" class=""
                                        value="Penggunaan peralatan medis yang aman & efektif"
                                        {{ in_array('Penggunaan peralatan medis yang aman & efektif', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_peralatan">Penggunaan peralatan medis yang aman &
                                        efektif</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="kebutuhan_belajar_infeksi" name="kebutuhan_belajar[]"
                                        class="" value="Pencegahan & pengendalian Infeksi"
                                        {{ in_array('Pencegahan & pengendalian Infeksi', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_infeksi">Pencegahan & pengendalian Infeksi</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="kebutuhan_belajar_diet" name="kebutuhan_belajar[]"
                                        class="" value="Diet"
                                        {{ in_array('Diet', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_diet">Diet</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="kebutuhan_belajar_obat" name="kebutuhan_belajar[]"
                                        class="" value="Obat-obatan yang didapat"
                                        {{ in_array('Obat-obatan yang didapat', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_obat">Obat-obatan yang didapat</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="kebutuhan_belajar_rehabilitasi"
                                        name="kebutuhan_belajar[]" class="" value="Rehabilitasi medis"
                                        {{ in_array('Rehabilitasi medis', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_rehabilitasi">Rehabilitasi medis</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="kebutuhan_belajar_manajemen_nyeri"
                                        name="kebutuhan_belajar[]" class="" value="Manajemen nyeri"
                                        {{ in_array('Manajemen nyeri', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_manajemen_nyeri">Manajemen nyeri</label>
                                </td>
                                <td colspan="5">
                                    <input type="checkbox" id="kebutuhan_belajar_lain" name="kebutuhan_belajar[]"
                                        class="" value="Lain-lain"
                                        {{ in_array('Lain-lain', $kebutuhan_belajar) ? 'checked' : '' }}>
                                    <label for="kebutuhan_belajar_lain">Lain-lain</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Kesediaan pasien untuk di edukasi</td>
                                <td>
                                    <input class="" type="radio" name="kesediaan_pasien" value="Bersedia"
                                        id="kesediaan_pasien_bersedia"
                                        {{ $edukasi_pasien->kesediaan_pasien == 'Bersedia' ? 'checked' : '' }}>
                                    <label for="kesediaan_pasien_bersedia">Bersedia</label>
                                </td>
                                <td>
                                    <input class="" type="radio" name="kesediaan_pasien" value="Tidak"
                                        id="kesediaan_pasien_tidak"
                                        {{ $edukasi_pasien->kesediaan_pasien == 'Tidak' ? 'checked' : '' }}>
                                    <label for="kesediaan_pasien_tidak">Tidak</label>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" onclick="addedukasipasien()">Simpan</button>

            </div>

            {{-- <table class="table1">
                <thead>
                <tr>
                    <th>Edukator / Topik</th>
                    <th>Edukasi</th>
                    <th>Tanggal Edukasi</th>
                    <th>Tingkat Pemahaman Awal </th>
                    <th>Metode Edukasi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Penggunaan Peralatan yang Aman dan Efektif</td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                    <td><input type="date" class="form-control" name="tanggal">
                    </td>
                    <td>
                        <input class="" type="radio" name="peralatan" value="Mudah mengerti"
                               id="flexRadioDefault1">
                        <label>Mudah mengerti</label><br>
                        <input class="" type="radio" name="peralatan" value="Edukasi Ulang"
                               id="flexRadioDefault1">
                        <label>Edukasi Ulang</label><br>
                        <input class="" type="radio" name="peralatan" value="Hal Baru"
                               id="flexRadioDefault1">
                        <label>Hal Baru</label><br>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Pencegahan & Pengendalian Infeksi</td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                    <td><input type="date" class="form-control" name="tanggal">
                    </td>
                    <td>
                        <input class="" type="radio" name="pencegahan" value="Mudah mengerti"
                               id="flexRadioDefault1">
                        <label>Mudah mengerti</label><br>
                        <input class="" type="radio" name="pencegahan" value="Edukasi Ulang"
                               id="flexRadioDefault1">
                        <label>Edukasi Ulang</label><br>
                        <input class="" type="radio" name="pencegahan" value="Hal Baru"
                               id="flexRadioDefault1">
                        <label>Hal Baru</label><br>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Manajemen nyeri Ringan</td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                    <td><input type="date" class="form-control" name="tanggal">
                    </td>
                    <td>
                        <input class="" type="radio" name="manajemen_nyeri_ringan"
                               value="Mudah mengerti" id="flexRadioDefault1">
                        <label>Mudah mengerti</label><br>
                        <input class="" type="radio" name="manajemen_nyeri_ringan" value="Edukasi Ulang"
                               id="flexRadioDefault1">
                        <label>Edukasi Ulang</label><br>
                        <input class="" type="radio" name="manajemen_nyeri_ringan" value="Hal Baru"
                               id="flexRadioDefault1">
                        <label>Hal Baru</label><br>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Lain-lain</td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                    <td><input type="date" class="form-control" name="tanggal">
                    </td>
                    <td>
                        <input class="" type="radio" name="lain_lain" value="Mudah mengerti"
                               id="flexRadioDefault1">
                        <label>Mudah mengerti</label><br>
                        <input class="" type="radio" name="lain_lain" value="Edukasi Ulang"
                               id="flexRadioDefault1">
                        <label>Edukasi Ulang</label><br>
                        <input class="" type="radio" name="lain_lain" value="Hal Baru"
                               id="flexRadioDefault1">
                        <label>Hal Baru</label><br>
                        <input type="text" class="form-control" placeholder="Lain-lain">
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table> --}}
            <input type="text" name="reg_no" value="{{ $reg }}" hidden>
        </form>

        <div class="card">
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
                        @include('new_perawat.edukasi.components.edukasi_perawat')
                    </div>
                    <div class="tab-pane" id="dokter">
                        @include('new_perawat.edukasi.components.edukasi_dokter')
                    </div>
                    <div class="tab-pane" id="gizi">
                        @include('new_perawat.edukasi.components.edukasi_gizi')
                    </div>
                    <div class="tab-pane" id="farmasi">
                        @include('new_perawat.edukasi.components.edukasi_farmasi')
                    </div>
                    <div class="tab-pane" id="rehab">
                        @include('new_perawat.edukasi.components.edukasi_rehab')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
