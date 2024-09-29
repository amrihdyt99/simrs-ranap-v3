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
            <td>Pentingnya Nutrisi</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_pentingnya_nutrisi_gizi" disabled>{{$edukasi_pasien_gizi->edukasi_pentingnya_nutrisi_gizi}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_pentingnya_nutrisi_gizi" value="{{$edukasi_pasien_gizi->tgl_pentingnya_nutrisi_gizi}}" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Mudah mengerti"
                    id="tingkat_paham_pentingnya_nutrisi_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_pentingnya_nutrisi_gizi_1">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Edukasi Ulang"
                    id="tingkat_paham_pentingnya_nutrisi_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_pentingnya_nutrisi_gizi_2">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Hal Baru"
                    id="tingkat_paham_pentingnya_nutrisi_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_pentingnya_nutrisi_gizi == 'Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_pentingnya_nutrisi_gizi_3">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_pentingnya_nutrisi_gizi" disabled>{{$edukasi_pasien_gizi->metode_edukasi_pentingnya_nutrisi_gizi}}</textarea>
                </div>
            </td>
        </tr>
        
        <tr>
            <td>Diet</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_diet_gizi" disabled>{{$edukasi_pasien_gizi->edukasi_diet_gizi}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_diet_gizi" value="{{$edukasi_pasien_gizi->tgl_diet_gizi}}" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Mudah mengerti"
                    id="tingkat_paham_diet_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diet_gizi_1">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Edukasi Ulang"
                    id="tingkat_paham_diet_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diet_gizi_2">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Hal Baru"
                    id="tingkat_paham_diet_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_diet_gizi == 'Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_diet_gizi_3">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_diet_gizi" disabled>{{$edukasi_pasien_gizi->metode_edukasi_diet_gizi}}</textarea>
                </div>
            </td>
        </tr>
        
        <tr>
            <td>Lain-lain</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_gizi" disabled>{{$edukasi_pasien_gizi->edukasi_lain_lain_gizi}}</textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_lain_lain_gizi" value="{{$edukasi_pasien_gizi->tgl_lain_lain_gizi}}" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Mudah mengerti"
                    id="tingkat_paham_lain_lain_gizi_1" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_gizi_1">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Edukasi Ulang"
                    id="tingkat_paham_lain_lain_gizi_2" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_gizi_2">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Hal Baru"
                    id="tingkat_paham_lain_lain_gizi_3" {{$edukasi_pasien_gizi->tingkat_paham_lain_lain_gizi == 'Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_gizi_3">Hal Baru</label><br>
                <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_gizi" value="{{$edukasi_pasien_gizi->tingkat_paham_lain_lain_text_gizi}}" disabled>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain_gizi" placeholder="Enter ..." disabled>{{$edukasi_pasien_gizi->metode_edukasi_lain_lain_gizi}}</textarea>
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