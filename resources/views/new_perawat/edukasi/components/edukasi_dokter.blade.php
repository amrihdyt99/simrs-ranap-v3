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
                    <textarea class="form-control" rows="3" name="edukasi_diagnosa_penyebab_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_diagnosa_penyebab_dokter}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_diagnosa_penyebab_dokter" value="{{$edukasi_pasien_dokter->tgl_diagnosa_penyebab_dokter}}" disabled></td>
            <td>
                <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Mudah mengerti"
                    id="tingkat_paham_diagnosa_penyebab_mudah" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diagnosa_penyebab_mudah">Mudah mengerti</label><br>

                <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Edukasi Ulang"
                    id="tingkat_paham_diagnosa_penyebab_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diagnosa_penyebab_edukasi">Edukasi Ulang</label><br>

                <input type="radio" name="tingkat_paham_diagnosa_penyebab_dokter" value="Hal Baru"
                    id="tingkat_paham_diagnosa_penyebab_baru" {{$edukasi_pasien_dokter->tingkat_paham_diagnosa_penyebab_dokter=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diagnosa_penyebab_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="metode_edukasi_diagnosa_penyebab_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->metode_edukasi_diagnosa_penyebab_dokter}}</textarea>
                </div>
            </td>
        </tr>

        <!-- Penatalaksanaan Penyakit -->
        <tr>
            <td>Penatalaksanaan Penyakit</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_penatalaksanaan_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_penatalaksanaan_dokter}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_penatalaksanaan_dokter" value="{{$edukasi_pasien_dokter->tgl_penatalaksanaan_dokter}}" disabled></td>
            <td>
                <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Mudah mengerti"
                    id="tingkat_paham_penatalaksanaan_mudah" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_penatalaksanaan_mudah">Mudah mengerti</label><br>

                <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Edukasi Ulang"
                    id="tingkat_paham_penatalaksanaan_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_penatalaksanaan_edukasi">Edukasi Ulang</label><br>

                <input type="radio" name="tingkat_paham_penatalaksanaan_dokter" value="Hal Baru"
                    id="tingkat_paham_penatalaksanaan_baru" {{$edukasi_pasien_dokter->tingkat_paham_penatalaksanaan_dokter=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_penatalaksanaan_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="metode_edukasi_penatalaksanaan_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->metode_edukasi_penatalaksanaan_dokter}}</textarea>
                </div>
            </td>
        </tr>

        <!-- Prosedur / diagnostik yang dilakukan -->
        <tr>
            <td>Prosedur / diagnostik yang dilakukan</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_prosedur_diagnostik_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_prosedur_diagnostik_dokter}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_prosedur_diagnostik_dokter" value="{{$edukasi_pasien_dokter->tgl_prosedur_diagnostik_dokter}}" disabled></td>
            <td>
                <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Mudah mengerti"
                    id="tingkat_paham_prosedur_diagnostik_mudah" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_prosedur_diagnostik_mudah">Mudah mengerti</label><br>

                <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Edukasi Ulang"
                    id="tingkat_paham_prosedur_diagnostik_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_prosedur_diagnostik_edukasi">Edukasi Ulang</label><br>

                <input type="radio" name="tingkat_paham_prosedur_diagnostik_dokter" value="Hal Baru"
                    id="tingkat_paham_prosedur_diagnostik_baru" {{$edukasi_pasien_dokter->tingkat_paham_prosedur_diagnostik_dokter=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_prosedur_diagnostik_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="metode_edukasi_prosedur_diagnostik_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->metode_edukasi_prosedur_diagnostik_dokter}}</textarea>
                </div>
            </td>
        </tr>

        <!-- Manajemen nyeri -->
        <tr>
            <td>Manajemen nyeri<br>- Sedang<br>- Berat</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_manajemen_nyeri_dokter}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_manajemen_nyeri_dokter" value="{{$edukasi_pasien_dokter->tgl_manajemen_nyeri_dokter}}" disabled></td>
            <td>
                <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Mudah mengerti"
                    id="tingkat_paham_manajemen_nyeri_mudah" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_manajemen_nyeri_mudah">Mudah mengerti</label><br>

                <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Edukasi Ulang"
                    id="tingkat_paham_manajemen_nyeri_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_manajemen_nyeri_edukasi">Edukasi Ulang</label><br>

                <input type="radio" name="tingkat_paham_manajemen_nyeri_dokter" value="Hal Baru"
                    id="tingkat_paham_manajemen_nyeri_baru" {{$edukasi_pasien_dokter->tingkat_paham_manajemen_nyeri_dokter=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_manajemen_nyeri_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->metode_edukasi_manajemen_nyeri_dokter}}</textarea>
                </div>
            </td>
        </tr>

        <!-- Lain-lain -->
        <tr>
            <td>Lain-lain</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_lain_lain_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_lain_lain_dokter}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_lain_lain_dokter" value="{{$edukasi_pasien_dokter->tgl_lain_lain_dokter}}" disabled></td>
            <td>
                <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Mudah mengerti"
                    id="tingkat_paham_lain_lain_mudah" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_mudah">Mudah mengerti</label><br>

                <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Edukasi Ulang"
                    id="tingkat_paham_lain_lain_edukasi" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_edukasi">Edukasi Ulang</label><br>

                <input type="radio" name="tingkat_paham_lain_lain_dokter" value="Hal Baru"
                    id="tingkat_paham_lain_lain_baru" {{$edukasi_pasien_dokter->tingkat_paham_lain_lain_dokter=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_baru">Hal Baru</label><br>

                <input type="text" class="form-control" name="tingkat_paham_lain_lain_text_dokter" placeholder="Lain-lain" value="{{$edukasi_pasien_dokter->tingkat_paham_lain_lain_text_dokter}}" disabled>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_lain_lain_dokter" placeholder="Enter ..." disabled>{{$edukasi_pasien_dokter->edukasi_lain_lain_dokter}}</textarea>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<table class="table1" style="width: 95%;">
    <tr>
        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <div style="margin-bottom: 10px; font-weight: bold;">SASARAN</div>
                <div id="signature-pad-sasaran" style="display: inline-block;">
                    <div style="width: 460px; height: 210px; padding: 3px; position: relative;">
                        @if(isset($edukasi_pasien_dokter->ttd_pasien) && $edukasi_pasien_dokter->ttd_pasien)
                            <img src="{{ $edukasi_pasien_dokter->ttd_pasien }}" alt="Tanda Tangan Pasien" style="max-width: 100%; height: auto;">
                        @else
                            <canvas id="canvas_sasaran" width="450" height="200" disabled>Your browser does not support
                                the HTML canvas tag.</canvas>
                        @endif
                    </div>
                    <div style="margin: 10px; text-align: center;">
                        <input type="hidden" id="signature_sasaran" name="ttd_sasaran" value="{{$edukasi_pasien_dokter->ttd_pasien}}">
                    </div>
                </div>
            </div>
        </td>

        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
            <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                <div style="width: 460px; height: 210px; padding: 3px; position: relative;">
                    @if(isset($edukasi_pasien_dokter->ttd_dokter) && $edukasi_pasien_dokter->ttd_dokter)
                        <img src="{{ $edukasi_pasien_dokter->ttd_dokter }}" alt="Tanda Tangan Dokter" style="max-width: 100%; height: auto;">
                    @else
                        <canvas id="canvas_edukator" width="450" height="200" disabled>Your browser does not support the
                            HTML canvas tag.</canvas>
                    @endif
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="signature_edukator" name="ttd_edukator" value="{{$edukasi_pasien_dokter->ttd_dokter}}">
                </div>
            </div>
        </td>
    </tr>
</table>
