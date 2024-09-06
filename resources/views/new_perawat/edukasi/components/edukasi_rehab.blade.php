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
