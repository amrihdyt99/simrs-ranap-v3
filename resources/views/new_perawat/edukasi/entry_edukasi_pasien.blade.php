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
                                <input type="checkbox" id="exampleCheck1" name="bahasa[]" class=""
                                       value="Indonesia" {{in_array('Indonesia',$bahasa) ? 'checked' : ''}}>
                                <label>Indonesia</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="bahasa[]" class=""
                                       value="Inggris" {{in_array('Inggris',$bahasa) ? 'checked' : ''}}>
                                <label>Inggris</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="bahasa[]" class=""
                                       value="Daerah" {{in_array('Daerah',$bahasa) ? 'checked' : ''}}>
                                <label>Daerah</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="bahasa[]" class=""
                                       value="Lain-lainnya" {{in_array('Lain-lainnya',$bahasa) ? 'checked' : ''}}>
                                <label>Lain-lainnya</label>
                            </td>

                        </tr>
                        <tr>
                            <td>Kebutuhan Penerjemah</td>
                            <td>
                                <input class="" type="radio" name="kebutuhan_penerjemah" value="Ya"
                                       id="flexRadioDefault1" {{$edukasi_pasien->kebutuhan_penerjemah=='Ya' ? 'checked' : ''}}>
                                <label for="">Ya</label>

                            </td>
                            <td colspan="5">
                                <input class="" type="radio" name="kebutuhan_penerjemah" value="Tidak"
                                       id="flexRadioDefault1" {{$edukasi_pasien->kebutuhan_penerjemah=='Tidak' ? 'checked' : ''}}>
                                <label for="">Tidak</label>

                            </td>
                        </tr>
                        <tr>
                            @php
                            $pendidikan_pasien=explode(',',$edukasi_pasien->pendidikan_pasien)??[];
                            @endphp
                            <td>Pendidikan Pasien</td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pendidikan_pasien[]" class=""
                                       value="SD" {{in_array('SD',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label>SD</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pendidikan_pasien[]" class=""
                                       value="SLTP" {{in_array('SLTP',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label>SLTP</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pendidikan_pasien[]" class=""
                                       value="SMA" {{in_array('SMA',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label>SMA</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pendidikan_pasien[]" class=""
                                       value="D3" {{in_array('D3',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label>D3</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pendidikan_pasien[]" class=""
                                       value="S1" {{in_array('S1',$pendidikan_pasien) ? 'checked' : ''}}>
                                <label>S1</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $baca_tulis=explode(',',$edukasi_pasien->baca_tulis)??[];
                            @endphp

                            <td>Baca dan tulis</td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="baca_tulis[]" class=""
                                       value="Baik" {{in_array('Baik',$baca_tulis) ? 'checked' : ''}}>
                                <label>Baik</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="baca_tulis[]" class=""
                                       value="Kurang" {{in_array('Kurang',$baca_tulis) ? 'checked' : ''}}>
                                <label>Kurang</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $pilihan_tipe_belajar=explode(',',$edukasi_pasien->pilihan_tipe_belajar)??[];
                            @endphp

                            <td>Pilihan tipe belajar</td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="pilihan_tipe_belajar[]"
                                       class="" value="Verbal" {{in_array('Verbal',$pilihan_tipe_belajar) ? 'checked' : ''}}>
                                <label>Verbal</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="pilihan_tipe_belajar[]"
                                       class="" value="Tulisan" {{in_array('Tulisan',$pilihan_tipe_belajar) ? 'checked' : ''}}>
                                <label>Tulisan</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $hambatan_belajar=explode(',',$edukasi_pasien->hambatan_belajar)??[];
                            @endphp

                            <td rowspan="5">Hambatan belajar</td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]" class=""
                                       value="Tidak ada" {{in_array('Tidak ada',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Tidak ada</label>
                            </td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]" class=""
                                       value="Emosional" {{in_array('Emosional',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Emosional</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Motivasi Lemah" {{in_array('Motivasi Lemah',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Motivasi Lemah</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Penglihatan Terganggu" {{in_array('Penglihatan Terganggu',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Penglihatan Terganggu</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Pendengaran terganggu" {{in_array('Pendengaran terganggu',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Pendengaran terganggu</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Budaya / agama / spiritual" {{in_array('Budaya / agama / spiritual',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Budaya / agama / spiritual</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Kognitif terbatas" {{in_array('Kognitif terbatas',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Kognitif terbatas</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Gangguan bicara" {{in_array('Gangguan bicara',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Gangguan bicara</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Lain-lain" {{in_array('Lain-lain',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Lain-lain</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="hambatan_belajar[]"
                                       class="" value="Fisik Lemah" {{in_array('Fisik Lemah',$hambatan_belajar) ? 'checked' : ''}}>
                                <label>Fisik Lemah</label>
                            </td>
                        </tr>
                        <tr>
                            @php
                            $kebutuhan_belajar=explode(',',$edukasi_pasien->kebutuhan_belajar)??[];
                            @endphp
                            <td rowspan="4">Kebutuhan Belajar</td>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Diagnosis penyebab & gejala" {{in_array('Diagnosis penyebab & gejala',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Diagnosis penyebab & gejala</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Penggunaan peralatan medis yang aman & efektif" {{in_array('Penggunaan peralatan medis yang aman & efektif',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Penggunaan peralatan medis yang aman & efektif</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Pencegahan & pengendalian Infeksi" {{in_array('Pencegahan & pengendalian Infeksi',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Pencegahan & pengendalian Infeksi</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Diet" {{in_array('Diet',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Diet</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Obat-obatan yang didapat" {{in_array('Obat-obatan yang didapat',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Obat-obatan yang didapat</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Rehabilitasi medis" {{in_array('Rehabilitasi medis',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Rehabilitasi medis</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Manajemen nyeri" {{in_array('Manajemen nyeri',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Manajemen nyeri</label>
                            </td>
                            <td colspan="5">
                                <input type="checkbox" id="exampleCheck1" name="kebutuhan_belajar[]"
                                       class="" value="Lain-lain" {{in_array('Lain-lain',$kebutuhan_belajar) ? 'checked' : ''}}>
                                <label>Lain-lain</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kesediaan pasien untuk di edukasi</td>
                            <td>
                                <input class="" type="radio" name="kesediaan_pasien" value="Bersedia"
                                       id="flexRadioDefault1" {{$edukasi_pasien->kesediaan_pasien=='Bersedia' ? 'checked' : ''}}>
                                <label for="">Bersedia</label>

                            </td>
                            <td>
                                <input class="" type="radio" name="kesediaan_pasien" value="Tidak"
                                       id="flexRadioDefault1" {{$edukasi_pasien->kesediaan_pasien=='Tidak' ? 'checked' : ''}}>
                                <label for="">Tidak</label>

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
                                        <textarea class="form-control" rows="3" name="edukasi_diagnosa_penyebab" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_diagnosa_penyebab}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_diagnosa_penyebab" value="{{$edukasi_pasien_dokter->tgl_diagnosa_penyebab}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_diagnosa_penyebab" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diagnosa_penyebab" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diagnosa_penyebab" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_diagnosa_penyebab" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_diagnosa_penyebab}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Penatalaksanaan Penyakit</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_penatalaksanaan" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_penatalaksanaan}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_penatalaksanaan" value="{{$edukasi_pasien_dokter->tgl_penatalaksanaan}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_penatalaksanaan" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penatalaksanaan" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penatalaksanaan" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_penatalaksanaan" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_penatalaksanaan}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Prosedur / diagnostik yang dilakukan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_prosedur_diagnostik" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_prosedur_diagnostik}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_prosedur_diagnostik" value="{{$edukasi_pasien_dokter->tgl_prosedur_diagnostik}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_prosedur_diagnostik" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_prosedur_diagnostik" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_prosedur_diagnostik" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_prosedur_diagnostik" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_prosedur_diagnostik}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Manajemen nyeri<br>
                                    - Sedang<br>
                                    - Berat</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_manajemen_nyeri}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_manajemen_nyeri" value="{{$edukasi_pasien_dokter->tgl_manajemen_nyeri}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri"
                                        value="Mudah mengerti" id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri"
                                        value="Edukasi Ulang" id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_manajemen_nyeri}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain" placeholder="Enter ...">{{$edukasi_pasien_dokter->edukasi_lain_lain}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain" value="{{$edukasi_pasien_dokter->tgl_lain_lain}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                    <input type="text" class="form-control" name="tingkat_paham_lain_lain_text" placeholder="Lain-lain" value="{{$edukasi_pasien_dokter->tingkat_paham_lain_lain_text}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain" placeholder="Enter ...">{{$edukasi_pasien_dokter->metode_edukasi_lain_lain}}</textarea>
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
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_penggunaan_peralatan">{{$edukasi_pasien_perawat->edukasi_penggunaan_peralatan}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_penggunaan_peralatan" value="{{$edukasi_pasien_perawat->tgl_penggunaan_peralatan}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_penggunaan_peralatan" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_penggunaan_peralatan}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pencegahan & Pengendalian Infeksi</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_pencegahan" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_pencegahan}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_pencegahan" value="{{$edukasi_pasien_perawat->tgl_pencegahan}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pencegahan" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_pencegahan=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_pencegahan" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_pencegahan}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Manajemen nyeri Ringan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_manajemen_nyeri}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_manajemen_nyeri" value="{{$edukasi_pasien_perawat->tgl_manajemen_nyeri}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri"
                                        value="Mudah mengerti" id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri"
                                        value="Edukasi Ulang" id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri"
                                        value="Hal Baru" id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_manajemen_nyeri}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="edukasi_lain_lain" placeholder="Enter ...">{{$edukasi_pasien_perawat->edukasi_lain_lain}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain" value="{{$edukasi_pasien_perawat->tgl_lain_lain}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Mudah mengerti"
                                        id="flexRadioDefault1"  {{$edukasi_pasien_perawat->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_lain_lain=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_perawat->tingkat_paham_lain_lain=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" value="{{$edukasi_pasien_perawat->tingkat_paham_lain_lain_text}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain" placeholder="Enter ...">{{$edukasi_pasien_perawat->metode_edukasi_lain_lain}}</textarea>
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
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_pentingnya_nutrisi">{{$edukasi_pasien_gizi->edukasi_pentingnya_nutrisi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_pentingnya_nutrisi" value="{{$edukasi_pasien_gizi->tgl_pentingnya_nutrisi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_pentingnya_nutrisi">{{$edukasi_pasien_gizi->metode_edukasi_pentingnya_nutrisi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Diet</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_diet">{{$edukasi_pasien_gizi->edukasi_diet}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_diet" value="{{$edukasi_pasien_gizi->tgl_diet}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_diet" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_diet=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diet" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_diet=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_diet" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_diet=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_diet">{{$edukasi_pasien_gizi->metode_edukasi_diet}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain">{{$edukasi_pasien_gizi->edukasi_lain_lain}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain" value="{{$edukasi_pasien_gizi->tgl_lain_lain}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text" value="{{$edukasi_pasien_gizi->tingkat_paham_lain_lain_text}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain" placeholder="Enter ...">{{$edukasi_pasien_gizi->metode_edukasi_lain_lain}}</textarea>
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
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_obat_diberikan">{{$edukasi_pasien_farmasi->edukasi_obat_diberikan}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_obat_diberikan" value="{{$edukasi_pasien_farmasi->tgl_obat_diberikan}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_obat_diberikan" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_obat_diberikan">{{$edukasi_pasien_farmasi->metode_edukasi_obat_diberikan}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Efek samping obat-obatan yang diberikan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_efek_samping">{{$edukasi_pasien_farmasi->edukasi_efek_samping}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_efek_samping" value="{{$edukasi_pasien_farmasi->tgl_efek_samping}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_efek_samping" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_efek_samping">{{$edukasi_pasien_farmasi->metode_edukasi_efek_samping}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Interaksi obat & makanan</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_interaksi">{{$edukasi_pasien_farmasi->edukasi_interaksi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_interaksi" value="{{$edukasi_pasien_farmasi->tgl_interaksi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_interaksi" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_interaksi" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_interaksi" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_interaksi">{{$edukasi_pasien_farmasi->metode_edukasi_interaksi}}</textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ...">{{$edukasi_pasien_farmasi->edukasi_lain_lain}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tanggal" value="{{$edukasi_pasien_farmasi->tgl_lain_lain}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="" value="{{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_text}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain">{{$edukasi_pasien_farmasi->metode_edukasi_lain_lain}}</textarea>
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
                                <td>Tehknik Rehabilitasi</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_tehnik_rehabilitasi">{{$edukasi_pasien_rehab->edukasi_tehnik_rehabilitasi}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_tehnik_rehabilitasi" value="{{$edukasi_pasien_rehab->tgl_tehnik_rehabilitasi}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Edukasi Ulang' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Hal Baru' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
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
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain">{{$edukasi_pasien_rehab->edukasi_lain_lain}}</textarea>
                                    </div>
                                </td>
                                <td><input type="date" class="form-control" name="tgl_lain_lain" value="{{$edukasi_pasien_rehab->tgl_lain_lain}}">
                                </td>
                                <td>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Mudah mengerti"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Mudah mengerti</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Edukasi Ulang"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Edukasi Ulang</label><br>
                                    <input class="" type="radio" name="tingkat_paham_lain_lain" value="Hal Baru"
                                        id="flexRadioDefault1" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain=='Mudah mengerti' ? 'checked' : ''}}>
                                    <label>Hal Baru</label><br>
                                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text" value="{{$edukasi_pasien_rehab->tingkat_paham_lain_lain_text}}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Enter ...">{{$edukasi_pasien_rehab->metode_edukasi_lain_lain}}</textarea>
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
