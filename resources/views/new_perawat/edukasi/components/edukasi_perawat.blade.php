<form id="entry-edukasi-pasien-perawat">
    @csrf
    {{-- <input type="text" name="reg_no" value="{{ $reg }}" hidden> --}}
    <table class="table1 w-100">
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
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_penggunaan_peralatan_perawat">{{ $edukasi_pasien_perawat->edukasi_penggunaan_peralatan_perawat }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_penggunaan_peralatan_perawat"
                        value="{{ $edukasi_pasien_perawat->tgl_penggunaan_peralatan_perawat }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat"
                        value="Mudah mengerti" id="tingkat_paham_penggunaan_peralatan_perawat_mudah"
                        {{ $edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_penggunaan_peralatan_perawat_mudah">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat"
                        value="Edukasi Ulang" id="tingkat_paham_penggunaan_peralatan_perawat_edukasi"
                        {{ $edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_penggunaan_peralatan_perawat_edukasi">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_penggunaan_peralatan_perawat"
                        value="Hal Baru" id="tingkat_paham_penggunaan_peralatan_perawat_baru"
                        {{ $edukasi_pasien_perawat->tingkat_paham_penggunaan_peralatan_perawat == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_penggunaan_peralatan_perawat_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="metode_edukasi_penggunaan_peralatan_perawat"
                            placeholder="Enter ...">{{ $edukasi_pasien_perawat->metode_edukasi_penggunaan_peralatan_perawat }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Pencegahan & Pengendalian Infeksi</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="edukasi_pencegahan_perawat" placeholder="Enter ...">{{ $edukasi_pasien_perawat->edukasi_pencegahan_perawat }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_pencegahan_perawat"
                        value="{{ $edukasi_pasien_perawat->tgl_pencegahan_perawat }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Mudah mengerti"
                        id="tingkat_paham_pencegahan_perawat_mudah"
                        {{ $edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pencegahan_perawat_mudah">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Edukasi Ulang"
                        id="tingkat_paham_pencegahan_perawat_edukasi"
                        {{ $edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pencegahan_perawat_edukasi">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_pencegahan_perawat" value="Hal Baru"
                        id="tingkat_paham_pencegahan_perawat_baru"
                        {{ $edukasi_pasien_perawat->tingkat_paham_pencegahan_perawat == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pencegahan_perawat_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="metode_edukasi_pencegahan_perawat" placeholder="Enter ...">{{ $edukasi_pasien_perawat->metode_edukasi_pencegahan_perawat }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Manajemen nyeri Ringan</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="edukasi_manajemen_nyeri_ringan_perawat" placeholder="Enter ...">{{ $edukasi_pasien_perawat->edukasi_manajemen_nyeri_ringan_perawat }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_manajemen_nyeri_ringan_perawat"
                        value="{{ $edukasi_pasien_perawat->tgl_manajemen_nyeri_ringan_perawat }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat"
                        value="Mudah mengerti" id="tingkat_paham_manajemen_nyeri_ringan_perawat_mudah"
                        {{ $edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_mudah">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat"
                        value="Edukasi Ulang" id="tingkat_paham_manajemen_nyeri_ringan_perawat_edukasi"
                        {{ $edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_edukasi">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_manajemen_nyeri_ringan_perawat"
                        value="Hal Baru" id="tingkat_paham_manajemen_nyeri_ringan_perawat_baru"
                        {{ $edukasi_pasien_perawat->tingkat_paham_manajemen_nyeri_ringan_perawat == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_manajemen_nyeri_ringan_perawat_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="metode_edukasi_manajemen_nyeri_ringan_perawat"
                            placeholder="Enter ...">{{ $edukasi_pasien_perawat->metode_edukasi_manajemen_nyeri_ringan_perawat }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Lain-lain</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="edukasi_lain_lain_perawat" placeholder="Enter ...">{{ $edukasi_pasien_perawat->edukasi_lain_lain_perawat }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_lain_lain_perawat"
                        value="{{ $edukasi_pasien_perawat->tgl_lain_lain_perawat }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat"
                        value="Mudah mengerti" id="tingkat_paham_lain_lain_perawat_mudah"
                        {{ $edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_perawat_mudah">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat"
                        value="Edukasi Ulang" id="tingkat_paham_lain_lain_perawat_edukasi"
                        {{ $edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_perawat_edukasi">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_perawat" value="Hal Baru"
                        id="tingkat_paham_lain_lain_perawat_baru"
                        {{ $edukasi_pasien_perawat->tingkat_paham_lain_lain_perawat == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_perawat_baru">Hal Baru</label><br>
                    <input type="text" class="form-control" name="tingkat_paham_lain_lain_text_perawat"
                        placeholder="Lain-lain"
                        value="{{ $edukasi_pasien_perawat->tingkat_paham_lain_lain_text_perawat }}">
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain_perawat" placeholder="Enter ...">{{ $edukasi_pasien_perawat->metode_edukasi_lain_lain_perawat }}</textarea>
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
                        <div
                            style="border: solid 1px teal; width: 360px; height: 110px; padding: 3px; position: relative;">
                            <canvas id="canvas_sasaran" width="350" height="100">Your browser does not support
                                the HTML canvas tag.</canvas>
                        </div>
                        <div style="margin: 10px; text-align: center;">
                            <input type="hidden" id="signature_sasaran" name="ttd_sasaran" value="{{$edukasi_pasien_perawat->ttd_sasaran}}">
                            <button type="button" id="clear_btn_sasaran" class="btn btn-danger"
                                data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                        </div>
                    </div>
                </div>
            </td>

            <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
                <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                    <div
                        style="border: solid 1px teal; width: 360px; height: 110px; padding: 3px; position: relative;">
                        <canvas id="canvas_edukator" width="350" height="100">Your browser does not support the
                            HTML canvas tag.</canvas>
                    </div>
                    <div style="margin: 10px;">
                        <input type="hidden" id="signature_edukator" name="ttd_edukator" value="{{$edukasi_pasien_perawat->ttd_edukator ?? auth()->user()->signature}}">
                        <button type="button" id="clear_btn_edukator" class="btn btn-danger"
                            data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <button type="button" class="btn btn-primary mt-3" id="simpan-edukasi-pasien-perawat">Simpan</button>
</form>
