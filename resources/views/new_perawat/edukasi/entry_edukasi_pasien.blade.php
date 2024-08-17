@empty($edukasi_pasien)
@php
   $edukasi_pasien = optional((object)[]);
   $edukasi_pasien_dokter = optional((object)[]);
   $edukasi_pasien_perawat = optional((object)[]);
   $edukasi_pasien_gizi = optional((object)[]);
   $edukasi_pasien_farmasi = optional((object)[]);
   $edukasi_pasien_rehab = optional((object)[]);
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
                            $bahasa=explode(',',$edukasi_pasien->bahasa)??[];
                            @endphp
                        <tbody>
                        <tr>
                            <td>Bahasa</td>
                            <td>
                                <input type="checkbox" id="bahasa_indonesia" name="bahasa[]" value="Indonesia" {{in_array('Indonesia',$bahasa) ? 'checked' : ''}}>
                                <label for="bahasa_indonesia">Indonesia</label>
                            </td>
                            <td>
                                <input type="checkbox" id="bahasa_inggris" name="bahasa[]" value="Inggris" {{in_array('Inggris',$bahasa) ? 'checked' : ''}}>
                                <label for="bahasa_inggris">Inggris</label>
                            </td>
                            <td>
                                <input type="checkbox" id="bahasa_daerah" name="bahasa[]" value="Daerah" {{in_array('Daerah',$bahasa) ? 'checked' : ''}}>
                                <label for="bahasa_daerah">Daerah</label>
                            </td>
                            <td>
                                <input type="checkbox" id="bahasa_lain" name="bahasa[]" value="Lain-lainnya" {{in_array('Lain-lainnya',$bahasa) ? 'checked' : ''}}>
                                <label for="bahasa_lain">Lain-lainnya</label>
                            </td>

                        </tr>
                        <tr>
                            <td>Kebutuhan Penerjemah</td>
                            <td>
                                <input class="" type="radio" name="kebutuhan_penerjemah" value="Ya" id="kebutuhan_penerjemah_ya" {{$edukasi_pasien->kebutuhan_penerjemah=='Ya' ? 'checked' : ''}}>
                                <label for="kebutuhan_penerjemah_ya">Ya</label>
                            </td>
                            <td colspan="5">
                                <input class="" type="radio" name="kebutuhan_penerjemah" value="Tidak" id="kebutuhan_penerjemah_tidak" {{$edukasi_pasien->kebutuhan_penerjemah=='Tidak' ? 'checked' : ''}}>
                                <label for="kebutuhan_penerjemah_tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $pendidikan_pasien=explode(',',$edukasi_pasien->pendidikan_pasien)??[];
                            @endphp
                            <td>Pendidikan Pasien</td>
                            <td>
                                <input type="checkbox" id="pendidikan_sd" name="pendidikan_pasien[]" value="SD" {{in_array('SD',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label for="pendidikan_sd">SD</label>
                            </td>
                            <td>
                                <input type="checkbox" id="pendidikan_sltp" name="pendidikan_pasien[]" value="SLTP" {{in_array('SLTP',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label for="pendidikan_sltp">SLTP</label>
                            </td>
                            <td>
                                <input type="checkbox" id="pendidikan_sma" name="pendidikan_pasien[]" value="SMA" {{in_array('SMA',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label for="pendidikan_sma">SMA</label>
                            </td>
                            <td>
                                <input type="checkbox" id="pendidikan_d3" name="pendidikan_pasien[]" value="D3" {{in_array('D3',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label for="pendidikan_d3">D3</label>
                            </td>
                            <td>
                                <input type="checkbox" id="pendidikan_s1" name="pendidikan_pasien[]" value="S1" {{in_array('S1',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label for="pendidikan_s1">S1</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $baca_tulis=explode(',',$edukasi_pasien->baca_tulis)??[];
                            @endphp

                            <td>Baca dan tulis</td>
                            <td>
                                <input type="checkbox" id="baca_tulis_baik" name="baca_tulis[]" value="Baik" {{in_array('Baik',$baca_tulis) ? 'checked' : ''}}>
                                <label for="baca_tulis_baik">Baik</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="baca_tulis_kurang" name="baca_tulis[]" value="Kurang" {{in_array('Kurang',$baca_tulis) ? 'checked' : ''}}>
                                <label for="baca_tulis_kurang">Kurang</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $pilihan_tipe_belajar=explode(',',$edukasi_pasien->pilihan_tipe_belajar)??[];
                            @endphp

                            <td>Pilihan tipe belajar</td>
                            <td>
                                <input type="checkbox" id="tipe_belajar_verbal" name="pilihan_tipe_belajar[]" value="Verbal" {{in_array('Verbal',$pilihan_tipe_belajar) ? 'checked' : ''}}>
                                <label for="tipe_belajar_verbal">Verbal</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="tipe_belajar_tulisan" name="pilihan_tipe_belajar[]" value="Tulisan" {{in_array('Tulisan',$pilihan_tipe_belajar) ? 'checked' : ''}}>
                                <label for="tipe_belajar_tulisan">Tulisan</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $hambatan_belajar=explode(',',$edukasi_pasien->hambatan_belajar)??[];
                            @endphp

                            <td rowspan="5">Hambatan belajar</td>
                            <td>
                                <input type="checkbox" id="hambatan_tidak_ada" name="hambatan_belajar[]" value="Tidak ada" {{in_array('Tidak ada',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_tidak_ada">Tidak ada</label>
                            </td>
                            <td>
                                <input type="checkbox" id="hambatan_emosional" name="hambatan_belajar[]" value="Emosional" {{in_array('Emosional',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_emosional">Emosional</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="hambatan_motivasi_lemah" name="hambatan_belajar[]" value="Motivasi Lemah" {{in_array('Motivasi Lemah',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_motivasi_lemah">Motivasi Lemah</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="hambatan_penglihatan_terganggu" name="hambatan_belajar[]" value="Penglihatan Terganggu" {{in_array('Penglihatan Terganggu',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_penglihatan_terganggu">Penglihatan Terganggu</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="hambatan_pendengaran_terganggu" name="hambatan_belajar[]" value="Pendengaran terganggu" {{in_array('Pendengaran terganggu',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_pendengaran_terganggu">Pendengaran terganggu</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="hambatan_budaya_agama_spiritual" name="hambatan_belajar[]" value="Budaya / agama / spiritual" {{in_array('Budaya / agama / spiritual',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_budaya_agama_spiritual">Budaya / agama / spiritual</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="hambatan_kognitif_terbatas" name="hambatan_belajar[]" value="Kognitif terbatas" {{in_array('Kognitif terbatas',$hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_kognitif_terbatas">Kognitif terbatas</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="hambatan_belajar_gangguan_bicara" name="hambatan_belajar[]"
                                       class="" value="Gangguan bicara" {{in_array('Gangguan bicara', $hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_belajar_gangguan_bicara">Gangguan bicara</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="hambatan_belajar_lain" name="hambatan_belajar[]"
                                       class="" value="Lain-lain" {{in_array('Lain-lain', $hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_belajar_lain">Lain-lain</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="checkbox" id="hambatan_belajar_fisik_lemah" name="hambatan_belajar[]"
                                       class="" value="Fisik Lemah" {{in_array('Fisik Lemah', $hambatan_belajar) ? 'checked' : ''}}>
                                <label for="hambatan_belajar_fisik_lemah">Fisik Lemah</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $kebutuhan_belajar = explode(',', $edukasi_pasien->kebutuhan_belajar) ?? [];
                            @endphp
                            <td rowspan="4">Kebutuhan Belajar</td>
                            <td>
                                <input type="checkbox" id="kebutuhan_belajar_diagnosis" name="kebutuhan_belajar[]"
                                       class="" value="Diagnosis penyebab & gejala" {{in_array('Diagnosis penyebab & gejala', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_diagnosis">Diagnosis penyebab & gejala</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="kebutuhan_belajar_peralatan" name="kebutuhan_belajar[]"
                                       class="" value="Penggunaan peralatan medis yang aman & efektif" {{in_array('Penggunaan peralatan medis yang aman & efektif', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_peralatan">Penggunaan peralatan medis yang aman & efektif</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="kebutuhan_belajar_infeksi" name="kebutuhan_belajar[]"
                                       class="" value="Pencegahan & pengendalian Infeksi" {{in_array('Pencegahan & pengendalian Infeksi', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_infeksi">Pencegahan & pengendalian Infeksi</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="kebutuhan_belajar_diet" name="kebutuhan_belajar[]"
                                       class="" value="Diet" {{in_array('Diet', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_diet">Diet</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="kebutuhan_belajar_obat" name="kebutuhan_belajar[]"
                                       class="" value="Obat-obatan yang didapat" {{in_array('Obat-obatan yang didapat', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_obat">Obat-obatan yang didapat</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="kebutuhan_belajar_rehabilitasi" name="kebutuhan_belajar[]"
                                       class="" value="Rehabilitasi medis" {{in_array('Rehabilitasi medis', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_rehabilitasi">Rehabilitasi medis</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="kebutuhan_belajar_manajemen_nyeri" name="kebutuhan_belajar[]"
                                       class="" value="Manajemen nyeri" {{in_array('Manajemen nyeri', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_manajemen_nyeri">Manajemen nyeri</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="kebutuhan_belajar_lain" name="kebutuhan_belajar[]"
                                       class="" value="Lain-lain" {{in_array('Lain-lain', $kebutuhan_belajar) ? 'checked' : ''}}>
                                <label for="kebutuhan_belajar_lain">Lain-lain</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kesediaan pasien untuk di edukasi</td>
                            <td>
                                <input class="" type="radio" name="kesediaan_pasien" value="Bersedia"
                                       id="kesediaan_pasien_bersedia" {{$edukasi_pasien->kesediaan_pasien=='Bersedia' ? 'checked' : ''}}>
                                <label for="kesediaan_pasien_bersedia">Bersedia</label>
                            </td>
                            <td>
                                <input class="" type="radio" name="kesediaan_pasien" value="Tidak"
                                       id="kesediaan_pasien_tidak" {{$edukasi_pasien->kesediaan_pasien=='Tidak' ? 'checked' : ''}}>
                                <label for="kesediaan_pasien_tidak">Tidak</label>
                            </td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
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

    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#dokter" data-toggle="tab">Dokter</a></li>
                <li class="nav-item"><a class="nav-link" href="#perawat" data-toggle="tab">Perawat</a></li>
                <li class="nav-item"><a class="nav-link" href="#gizi" data-toggle="tab">Gizi</a></li>
                <li class="nav-item"><a class="nav-link" href="#farmasi" data-toggle="tab">Farmasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#rehab" data-toggle="tab">Rehab</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="dokter">
                    <table class="table1">
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
                                <td>Diagnoasa penyebab Tandak & gejala awal</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_diagnosa_penyebab_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_diagnosa_penyebab_dokter}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_diagnosa_penyebab_dokter" value="{{$edukasi_pasien_dokter->tgl_diagnosa_penyebab_dokter}}"></td>
                                <td>
                                    <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Mudah mengerti"
                                        id="tingkat_paham_diagnosa_penyebab_mudah" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diagnosa_penyebab_mudah">Mudah mengerti</label><br>
                    
                                    <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Edukasi Ulang"
                                        id="tingkat_paham_diagnosa_penyebab_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diagnosa_penyebab_edukasi">Edukasi Ulang</label><br>
                    
                                    <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Hal Baru"
                                        id="tingkat_paham_diagnosa_penyebab_baru" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diagnosa_penyebab_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_diagnosa_penyebab_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_diagnosa_penyebab_dokter}}</textarea>
                                    </div>
                                </td>
                            </tr>
                    
                            <!-- Penatalaksanaan Penyakit -->
                            <tr>
                                <td>Penatalaksanaan Penyakit</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_penatalaksanaan_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_penatalaksanaan_dokter}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_penatalaksanaan_dokter" value="{{$edukasi_pasien_dokter->tgl_penatalaksanaan_dokter}}"></td>
                                <td>
                                    <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Mudah mengerti"
                                        id="tingkat_paham_penatalaksanaan_mudah" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penatalaksanaan_mudah">Mudah mengerti</label><br>
                    
                                    <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Edukasi Ulang"
                                        id="tingkat_paham_penatalaksanaan_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penatalaksanaan_edukasi">Edukasi Ulang</label><br>
                    
                                    <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Hal Baru"
                                        id="tingkat_paham_penatalaksanaan_baru" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penatalaksanaan_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_penatalaksanaan_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_penatalaksanaan_dokter}}</textarea>
                                    </div>
                                </td>
                            </tr>
                    
                            <!-- Prosedur / diagnostik yang dilakukan -->
                            <tr>
                                <td>Prosedur / diagnostik yang dilakukan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_prosedur_diagnostik_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_prosedur_diagnostik_dokter}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_prosedur_diagnostik_dokter" value="{{$edukasi_pasien_dokter->tgl_prosedur_diagnostik_dokter}}"></td>
                                <td>
                                    <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Mudah mengerti"
                                        id="tingkat_paham_prosedur_diagnostik_mudah" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_prosedur_diagnostik_mudah">Mudah mengerti</label><br>
                    
                                    <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Edukasi Ulang"
                                        id="tingkat_paham_prosedur_diagnostik_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_prosedur_diagnostik_edukasi">Edukasi Ulang</label><br>
                    
                                    <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Hal Baru"
                                        id="tingkat_paham_prosedur_diagnostik_baru" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_prosedur_diagnostik_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_prosedur_diagnostik_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_prosedur_diagnostik_dokter}}</textarea>
                                    </div>
                                </td>
                            </tr>
                    
                            <!-- Manajemen nyeri -->
                            <tr>
                                <td>Manajemen nyeri<br>- Sedang<br>- Berat</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_manajemen_nyeri_dokter}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_manajemen_nyeri_dokter" value="{{$edukasi_pasien_dokter->tgl_manajemen_nyeri_dokter}}"></td>
                                <td>
                                    <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Mudah mengerti"
                                        id="tingkat_paham_manajemen_nyeri_mudah" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_mudah">Mudah mengerti</label><br>
                    
                                    <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Edukasi Ulang"
                                        id="tingkat_paham_manajemen_nyeri_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_edukasi">Edukasi Ulang</label><br>
                    
                                    <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Hal Baru"
                                        id="tingkat_paham_manajemen_nyeri_baru" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_manajemen_nyeri_dokter}}</textarea>
                                    </div>
                                </td>
                            </tr>
                    
                            <!-- Lain-lain -->
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_lain_lain_dokter}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain_dokter" value="{{$edukasi_pasien_dokter->tgl_lain_lain_dokter}}"></td>
                                <td>
                                    <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Mudah mengerti"
                                        id="tingkat_paham_lain_lain_mudah" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_mudah">Mudah mengerti</label><br>
                    
                                    <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Edukasi Ulang"
                                        id="tingkat_paham_lain_lain_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_edukasi">Edukasi Ulang</label><br>
                    
                                    <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Hal Baru"
                                        id="tingkat_paham_lain_lain_baru" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_baru">Hal Baru</label><br>
                    
                                    <input type="text" class="form-control" name="tingkat_paham_lain_lain_text_dokter" placeholder="Lain-lain" value="{{$edukasi_pasien_dokter->tingkat_paham_lain_lain_text_dokter}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain_dokter" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_lain_lain_dokter}}</textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="perawat">
                    <table class="table1">
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
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_penggunaan_peralatan_perawat">{{$edukasi_pasien_perawat->edukasi_penggunaan_peralatan_perawat}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_penggunaan_peralatan_perawat" value="{{$edukasi_pasien_perawat->tgl_penggunaan_peralatan_perawat}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat" value="Mudah mengerti"
                                        id="tingkat_paham_penggunaan_peralatan_perawat_mudah" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penggunaan_peralatan_perawat_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat" value="Edukasi Ulang"
                                        id="tingkat_paham_penggunaan_peralatan_perawat_edukasi" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penggunaan_peralatan_perawat_edukasi">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat" value="Hal Baru"
                                        id="tingkat_paham_penggunaan_peralatan_perawat_baru" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_penggunaan_peralatan_perawat_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_penggunaan_peralatan_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_penggunaan_peralatan_perawat}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pencegahan & Pengendalian Infeksi</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_pencegahan_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_pencegahan_perawat}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_pencegahan_perawat" value="{{$edukasi_pasien_perawat->tgl_pencegahan_perawat}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Mudah mengerti"
                                        id="tingkat_paham_pencegahan_perawat_mudah" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pencegahan_perawat_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Edukasi Ulang"
                                        id="tingkat_paham_pencegahan_perawat_edukasi" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pencegahan_perawat_edukasi">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Hal Baru"
                                        id="tingkat_paham_pencegahan_perawat_baru" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pencegahan_perawat_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_pencegahan_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_pencegahan_perawat}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Manajemen nyeri Ringan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri_ringan_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_manajemen_nyeri_ringan_perawat}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_manajemen_nyeri_ringan_perawat" value="{{$edukasi_pasien_perawat->tgl_manajemen_nyeri_ringan_perawat}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat" value="Mudah mengerti"
                                        id="tingkat_paham_manajemen_nyeri_ringan_perawat_mudah" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat" value="Edukasi Ulang"
                                        id="tingkat_paham_manajemen_nyeri_ringan_perawat_edukasi" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_edukasi">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat" value="Hal Baru"
                                        id="tingkat_paham_manajemen_nyeri_ringan_perawat_baru" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri_ringan_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_manajemen_nyeri_ringan_perawat}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_lain_lain_perawat}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain_perawat" value="{{$edukasi_pasien_perawat->tgl_lain_lain_perawat}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat" value="Mudah mengerti"
                                        id="tingkat_paham_lain_lain_perawat_mudah" {{$edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_perawat_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat" value="Edukasi Ulang"
                                        id="tingkat_paham_lain_lain_perawat_edukasi" {{$edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_perawat_edukasi">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat" value="Hal Baru"
                                        id="tingkat_paham_lain_lain_perawat_baru" {{$edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_perawat_baru">Hal Baru</label><br>
                                    <input type="text" class="form-control" name="tingkat_paham_lain_lain_text_perawat" placeholder="Lain-lain" value="{{$edukasi_pasien_perawat->tingkat_paham_lain_lain_text_perawat}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain_perawat" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_lain_lain_perawat}}</textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="gizi">
                    <table class="table1">
                        <thead>
                            <tr>
                                <th>Edukator / Topik</th>
                                <th>Edukasi</th>
                                <th>Tanggal Edukasi</th>
                                <th>Tingkat Pemahaman Awal</th>
                                <th>Metode Edukasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pentingnya Nutrisi</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_pentingnya_nutrisi_gizi">{{$edukasi_pasien_gizi->edukasi_pentingnya_nutrisi_gizi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_pentingnya_nutrisi_gizi" value="{{$edukasi_pasien_gizi->tgl_pentingnya_nutrisi_gizi}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Mudah mengerti"
                                        id="tingkat_paham_pentingnya_nutrisi_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_1">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Edukasi Ulang"
                                        id="tingkat_paham_pentingnya_nutrisi_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_2">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Hal Baru"
                                        id="tingkat_paham_pentingnya_nutrisi_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_3">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_pentingnya_nutrisi_gizi">{{$edukasi_pasien_gizi->metode_edukasi_pentingnya_nutrisi_gizi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Diet</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_diet_gizi">{{$edukasi_pasien_gizi->edukasi_diet_gizi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_diet_gizi" value="{{$edukasi_pasien_gizi->tgl_diet_gizi}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Mudah mengerti"
                                        id="tingkat_paham_diet_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diet_gizi_1">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Edukasi Ulang"
                                        id="tingkat_paham_diet_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diet_gizi_2">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Hal Baru"
                                        id="tingkat_paham_diet_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_diet_gizi_3">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_diet_gizi">{{$edukasi_pasien_gizi->metode_edukasi_diet_gizi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_gizi">{{$edukasi_pasien_gizi->edukasi_lain_lain_gizi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain_gizi" value="{{$edukasi_pasien_gizi->tgl_lain_lain_gizi}}"></td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Mudah mengerti"
                                        id="tingkat_paham_lain_lain_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_gizi_1">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Edukasi Ulang"
                                        id="tingkat_paham_lain_lain_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_gizi_2">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Hal Baru"
                                        id="tingkat_paham_lain_lain_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_gizi_3">Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_gizi" value="{{$edukasi_pasien_gizi->tingkat_paham_lain_lain_text_gizi}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain_gizi" placeholder="Enter ...">{{$edukasi_pasien_gizi->metode_edukasi_lain_lain_gizi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="farmasi">
                    <table class="table1">
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
                                <td>Obat-obatan yang diberikan, manfaat dan dosis</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_obat_diberikan_farmasi">{{$edukasi_pasien_farmasi->edukasi_obat_diberikan_farmasi}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tgl_obat_diberikan_farmasi" value="{{$edukasi_pasien_farmasi->tgl_obat_diberikan_farmasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Mudah mengerti" id="tingkat_paham_obat_diberikan_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_obat_diberikan_mudah_mengerti">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Edukasi Ulang" id="tingkat_paham_obat_diberikan_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_obat_diberikan_edukasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Hal Baru" id="tingkat_paham_obat_diberikan_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_obat_diberikan_hal_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_obat_diberikan_farmasi">{{$edukasi_pasien_farmasi->metode_edukasi_obat_diberikan_farmasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Efek samping obat-obatan yang diberikan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_efek_samping_farmasi">{{$edukasi_pasien_farmasi->edukasi_efek_samping_farmasi}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tgl_efek_samping_farmasi" value="{{$edukasi_pasien_farmasi->tgl_efek_samping_farmasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Mudah mengerti" id="tingkat_paham_efek_samping_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_efek_samping_mudah_mengerti">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Edukasi Ulang" id="tingkat_paham_efek_samping_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_efek_samping_edukasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Hal Baru" id="tingkat_paham_efek_samping_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_efek_samping_hal_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_efek_samping_farmasi">{{$edukasi_pasien_farmasi->metode_edukasi_efek_samping_farmasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Interaksi obat & makanan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_interaksi_farmasi">{{$edukasi_pasien_farmasi->edukasi_interaksi_farmasi}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tgl_interaksi_farmasi" value="{{$edukasi_pasien_farmasi->tgl_interaksi_farmasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Mudah mengerti" id="tingkat_paham_interaksi_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_interaksi_mudah_mengerti">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Edukasi Ulang" id="tingkat_paham_interaksi_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_interaksi_edukasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Hal Baru" id="tingkat_paham_interaksi_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_interaksi_hal_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_interaksi_farmasi">{{$edukasi_pasien_farmasi->metode_edukasi_interaksi_farmasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain_farmasi" placeholder="Enter ...">{{$edukasi_pasien_farmasi->edukasi_lain_lain_farmasi}}</textarea>
                                    </div>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tgl_lain_lain_farmasi" value="{{$edukasi_pasien_farmasi->tgl_lain_lain_farmasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_mudah_mengerti">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_edukasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Hal Baru" id="tingkat_paham_lain_lain_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_hal_baru">Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_farmasi" value="{{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_text_farmasi}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_farmasi">{{$edukasi_pasien_farmasi->metode_edukasi_lain_lain_farmasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="rehab">
                    <table class="table1">
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
                                <td>Teknik Rehabilitasi</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_tehnik_rehabilitasi">{{$edukasi_pasien_rehab->edukasi_tehnik_rehabilitasi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_tehnik_rehabilitasi" value="{{$edukasi_pasien_rehab->tgl_tehnik_rehabilitasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_tehnik_rehabilitasi_mudah" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_tehnik_rehabilitasi_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_tehnik_rehabilitasi_ulang" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_tehnik_rehabilitasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Hal Baru" id="tingkat_paham_tehnik_rehabilitasi_baru" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_tehnik_rehabilitasi_baru">Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_tehnik_rehabilitasi">{{$edukasi_pasien_rehab->metode_edukasi_tehnik_rehabilitasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_rehabilitasi">{{$edukasi_pasien_rehab->edukasi_lain_lain_rehabilitasi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain_rehabilitasi" value="{{$edukasi_pasien_rehab->tgl_lain_lain_rehabilitasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_rehabilitasi_mudah" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_rehabilitasi_mudah">Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_rehabilitasi_ulang" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_rehabilitasi_ulang">Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Hal Baru" id="tingkat_paham_lain_lain_rehabilitasi_baru" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label for="tingkat_paham_lain_lain_rehabilitasi_baru">Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_rehabilitasi" value="{{$edukasi_pasien_rehab->tingkat_paham_lain_lain_text_rehabilitasi}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_rehabilitasi">{{$edukasi_pasien_rehab->metode_edukasi_lain_lain_rehabilitasi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary" onclick="addedukasipasien()">Simpan</button>
    </div>
    <input type="text" name="reg_no" value="{{$reg}}" hidden>
</form>
</div>
</div>
