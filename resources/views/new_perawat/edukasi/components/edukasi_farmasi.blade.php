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
