<table class="table1 w-100`">
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
            <td>Obat-obatan yang diberikan, manfaat dan dosis</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_obat_diberikan_farmasi" disabled>{{$edukasi_pasien_farmasi->edukasi_obat_diberikan_farmasi}}</textarea>
                </div>
            </td>
            <td>
                <input type="date" class="form-control" name="tgl_obat_diberikan_farmasi" value="{{$edukasi_pasien_farmasi->tgl_obat_diberikan_farmasi}}" disabled>
            </td>
            <td>
                <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Mudah mengerti" id="tingkat_paham_obat_diberikan_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_obat_diberikan_mudah_mengerti">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Edukasi Ulang" id="tingkat_paham_obat_diberikan_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_obat_diberikan_edukasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Hal Baru" id="tingkat_paham_obat_diberikan_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_obat_diberikan_farmasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_obat_diberikan_hal_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_obat_diberikan_farmasi" disabled>{{$edukasi_pasien_farmasi->metode_edukasi_obat_diberikan_farmasi}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>Efek samping obat-obatan yang diberikan</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_efek_samping_farmasi" disabled>{{$edukasi_pasien_farmasi->edukasi_efek_samping_farmasi}}</textarea>
                </div>
            </td>
            <td>
                <input type="date" class="form-control" name="tgl_efek_samping_farmasi" value="{{$edukasi_pasien_farmasi->tgl_efek_samping_farmasi}}" disabled>
            </td>
            <td>
                <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Mudah mengerti" id="tingkat_paham_efek_samping_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_efek_samping_mudah_mengerti">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Edukasi Ulang" id="tingkat_paham_efek_samping_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_efek_samping_edukasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Hal Baru" id="tingkat_paham_efek_samping_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_efek_samping_farmasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_efek_samping_hal_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_efek_samping_farmasi" disabled>{{$edukasi_pasien_farmasi->metode_edukasi_efek_samping_farmasi}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>Interaksi obat & makanan</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_interaksi_farmasi" disabled>{{$edukasi_pasien_farmasi->edukasi_interaksi_farmasi}}</textarea>
                </div>
            </td>
            <td>
                <input type="date" class="form-control" name="tgl_interaksi_farmasi" value="{{$edukasi_pasien_farmasi->tgl_interaksi_farmasi}}" disabled>
            </td>
            <td>
                <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Mudah mengerti" id="tingkat_paham_interaksi_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_interaksi_mudah_mengerti">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Edukasi Ulang" id="tingkat_paham_interaksi_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_interaksi_edukasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Hal Baru" id="tingkat_paham_interaksi_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_interaksi_farmasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_interaksi_hal_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_interaksi_farmasi" disabled>{{$edukasi_pasien_farmasi->metode_edukasi_interaksi_farmasi}}</textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="edukasi_lain_lain_farmasi" placeholder="Enter ..." disabled>{{$edukasi_pasien_farmasi->edukasi_lain_lain_farmasi}}</textarea>
                </div>
            </td>
            <td>
                <input type="date" class="form-control" name="tgl_lain_lain_farmasi" value="{{$edukasi_pasien_farmasi->tgl_lain_lain_farmasi}}" disabled>
            </td>
            <td>
                <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_mudah_mengerti" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Mudah mengerti' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_mudah_mengerti">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_edukasi_ulang" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Edukasi Ulang' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_edukasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Hal Baru" id="tingkat_paham_lain_lain_hal_baru" {{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_farmasi=='Hal Baru' ? 'checked' : ''}} disabled>
                <label for="tingkat_paham_lain_lain_hal_baru">Hal Baru</label><br>
                <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_farmasi" value="{{$edukasi_pasien_farmasi->tingkat_paham_lain_lain_text_farmasi}}" disabled>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_farmasi" disabled>{{$edukasi_pasien_farmasi->metode_edukasi_lain_lain_farmasi}}</textarea>
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
                    <div style="width: 450px; height: 210px; padding: 3px; position: relative; border: 1px solid #000;">
                        <canvas id="signature-farmasi-sasaran" width="450" height="200" style="pointer-events: none;">Your browser does not support the HTML canvas tag.</canvas>
                    </div>
                    <div style="margin: 10px; text-align: center;">
                        <input type="hidden" id="ttd_sasaran_farmasi" name="ttd_sasaran" value="{{ $edukasi_pasien_farmasi->ttd_sasaran }}">
                        <input type="text" class="form-control" name="nama_sasaran" disabled placeholder="Nama Sasaran" value="{{ $edukasi_pasien_farmasi->nama_sasaran ?? $datamypatient->PatientName}}">
                    </div>
                </div>
            </div>
        </td>

        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
            <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                <div style="width: 450px; height: 210px; padding: 3px; position: relative; border: 1px solid #000;">
                    <canvas id="signature-farmasi-edukator" width="450" height="200" style="pointer-events: none;">Your browser does not support the HTML canvas tag.</canvas>
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="ttd_edukator_farmasi" name="ttd_edukator" value="{{ $edukasi_pasien_farmasi->ttd_edukator ?? auth()->user()->signature }}">
                    <input type="text" class="form-control" name="nama_edukator"  disabled placeholder="Nama Edukator" value="{{ $edukasi_pasien_farmasi->nama_edukator ?? auth()->user()->name }}">
                </div>
            </div>
        </td>
    </tr>
</table>