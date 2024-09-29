<table class="table1 w-100">
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
            <td>Teknik Rehabilitasi</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_tehnik_rehabilitasi" disabled>{{$edukasi_pasien_rehab->edukasi_tehnik_rehabilitasi}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_tehnik_rehabilitasi" value="{{$edukasi_pasien_rehab->tgl_tehnik_rehabilitasi}}" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_tehnik_rehabilitasi_mudah" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_mudah">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_tehnik_rehabilitasi_ulang" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Hal Baru" id="tingkat_paham_tehnik_rehabilitasi_baru" {{$edukasi_pasien_rehab->tingkat_paham_tehnik_rehabilitasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_tehnik_rehabilitasi" disabled>{{$edukasi_pasien_rehab->metode_edukasi_tehnik_rehabilitasi}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_rehabilitasi" disabled>{{$edukasi_pasien_rehab->edukasi_lain_lain_rehabilitasi}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_lain_lain_rehabilitasi" value="{{$edukasi_pasien_rehab->tgl_lain_lain_rehabilitasi}}" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_rehabilitasi_mudah" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_mudah">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_rehabilitasi_ulang" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Hal Baru" id="tingkat_paham_lain_lain_rehabilitasi_baru" {{$edukasi_pasien_rehab->tingkat_paham_lain_lain_rehabilitasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_baru">Hal Baru</label><br>
                <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_rehabilitasi" value="{{$edukasi_pasien_rehab->tingkat_paham_lain_lain_text_rehabilitasi}}" disabled>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_rehabilitasi" disabled>{{$edukasi_pasien_rehab->metode_edukasi_lain_lain_rehabilitasi}}</textarea>
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
                    <div style="width: 360px; height: 110px; padding: 3px; position: relative;">
                        <canvas id="canvas_sasaran" width="350" height="100" disabled>Your browser does not support
                            the HTML canvas tag.</canvas>
                    </div>
                    <div style="margin: 10px; text-align: center;">
                        <input type="hidden" id="signature_sasaran" name="ttd_sasaran" value="">
                    </div>
                </div>
            </div>
        </td>

        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
            <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                <div style="width: 360px; height: 110px; padding: 3px; position: relative;">
                    <canvas id="canvas_edukator" width="350" height="100" disabled>Your browser does not support the
                        HTML canvas tag.</canvas>
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="signature_edukator" name="ttd_edukator" value="">
                </div>
            </div>
        </td>
    </tr>
</table>