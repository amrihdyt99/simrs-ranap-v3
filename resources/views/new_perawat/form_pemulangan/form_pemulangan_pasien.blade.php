@php

@endphp
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">PERENCANAAN PEMULANGAN PASIEN</h3>
        </div>
        <form id="entry-pemulangan">
            <div class="form-group">
                <label>Diagnosis Utama</label>
                <textarea class="form-control" id="diagnosis_utama" name="diagnosis_utama" rows="3">{{ $pemulangan_pasien->diagnosis_utama }}</textarea>
            </div>

            <div class="form-group">
                <label>Diagnosis Sekunder</label>
                <textarea class="form-control" id="diagnosis_sekunder" name="diagnosis_sekunder" rows="3">{{ $pemulangan_pasien->diagnosis_sekunder }}</textarea>
            </div>

            @csrf
            <div class="card-body">
                @php
                    $data_bantuan = json_decode($pemulangan_pasien->bantuan_dalam_aktifitas) ?? [];
                    $data_edukasi_gizi = json_decode($pemulangan_pasien->edukasi_gizi) ?? [];
                    $data_nyeri = json_decode($pemulangan_pasien->penanganan_nyeri_kronis) ?? [];
                    $data_lainnya_check = json_decode($pemulangan_pasien->kebutuhan_lainnya_check) ?? [];
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kebutuhan</th>
                            <th colspan="3">PEMENUHAN KEBUTUHAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Diperkirakan akan mebutuhkan bantuan dalam aktifitas sehari-hari selama di rumah</td>
                            <td colspan="3">
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                        value="Konsultasi Rehabilitasi"
                                        class="@error('bantuan_dalam_aktifitas') is-invalid @enderror"
                                        {{ in_array('Konsultasi Rehabilitasi', $data_bantuan) ? 'checked' : '' }}>
                                    Konsultasi Rehabilitasi
                                </label>

                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                        value="Membutuhkan alat bantu gerak"
                                        class="@error('bantuan_dalam_aktifitas') is-invalid @enderror"
                                        {{ in_array('Membutuhkan alat bantu gerak', $data_bantuan) ? 'checked' : '' }}>
                                    Membutuhkan alat bantu gerak
                                </label>

                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                        value="Membutuhkan anggota gerak palsu"
                                        class="@error('bantuan_dalam_aktifitas') is-invalid @enderror"
                                        {{ in_array('Membutuhkan anggota gerak palsu', $data_bantuan) ? 'checked' : '' }}>
                                    Membutuhkan anggota gerak palsu
                                </label>

                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                        value="Terapi Wicara"
                                        class="@error('bantuan_dalam_aktifitas') is-invalid @enderror"
                                        {{ in_array('Terapi Wicara', $data_bantuan) ? 'checked' : '' }}>
                                    Terapi Wicara
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Membutuhkan edukasi gizi yang kompleks terkait penyakitnya</td>
                            <td colspan="3">
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="edukasi_gizi[]"
                                        value="Konsultasi Gizi" class="@error('edukasi_gizi') is-invalid @enderror"
                                        {{ in_array('Konsultasi Gizi', $data_edukasi_gizi) ? 'checked' : '' }}>
                                    Konsultasi Gizi
                                </label>
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="edukasi_gizi[]"
                                        value="Penggunaan alat bantu makan khusus"
                                        class="@error('edukasi_gizi') is-invalid @enderror"
                                        {{ in_array('Penggunaan alat bantu makan khusus', $data_edukasi_gizi) ? 'checked' : '' }}>
                                    Penggunaan alat bantu makan khusus
                                </label>

                            </td>
                        </tr>
                        <tr>
                            <td>Membutuhkan penanganan nyeri kronis</td>
                            <td colspan="3">
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri_kronis[]"
                                        value="Konsultasi Kepada tim nyeri"
                                        class="@error('penanganan_nyeri_kronis') is-invalid @enderror"
                                        {{ in_array('Konsultasi Kepada tim nyeri', $data_nyeri) ? 'checked' : '' }}>
                                    Konsultasi Kepada tim nyeri
                                </label>
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri_kronis[]"
                                        value="Edukasi Tentang obat-obat nyeri"
                                        class="@error('penanganan_nyeri_kronis') is-invalid @enderror"
                                        {{ in_array('Edukasi Tentang obat-obat nyeri', $data_nyeri) ? 'checked' : '' }}>
                                    Edukasi Tentang obat-obat nyeri
                                </label>
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri_kronis[]"
                                        value="Penanganan nyeri secara mandiri"
                                        class="@error('penanganan_nyeri_kronis') is-invalid @enderror"
                                        {{ in_array('Penanganan nyeri secara mandiri', $data_nyeri) ? 'checked' : '' }}>
                                    Penanganan nyeri secara mandiri
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Diperkirakan akan mebutuhkan pengelolaan penyakit secara berkelanjutan di luat RSUD
                                Prov. Sumsel</td>
                            <td><input type="text"
                                    class="form-control @error('pengelolaan_penyakit_secara_berkelanjutan') is-invalid @enderror"
                                    id="exampleCheck1" name="ppsb_tujuan" value="{{ $pemulangan_pasien->ppsb_tujuan }}"
                                    placeholder="Tujuan">
                                @error('pengelolaan_penyakit_secara_berkelanjutan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td><input type="text"
                                    class="form-control @error('pengelolaan_penyakit_secara_berkelanjutan') is-invalid @enderror"
                                    id="exampleCheck1" name="ppsb_tempat" value="{{ $pemulangan_pasien->ppsb_tempat }}"
                                    placeholder="Tempat">
                                @error('pengelolaan_penyakit_secara_berkelanjutan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Kebutuhan Lainnya</td>
                            <td colspan="3">
                                <label>
                                    <input type="checkbox" id="exampleCheck1" name="kebutuhan_lainnya_check[]"
                                        value="Ya" {{ in_array('Ya', $data_lainnya_check) ? 'checked' : '' }}>
                                    Kosultasi Kepada :
                                </label>
                                <input class="form-control" type="text" id="kebutuhan_lainnya"
                                    name="kebutuhan_lainnya" value="{{ $pemulangan_pasien->kebutuhan_lainnya }}" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="date" class="form-control" name="tanggal"
                                    value="{{ $pemulangan_pasien->tanggal }}"></td>
                            <td><input type="time" class="form-control" name="waktu"
                                    value="{{ $pemulangan_pasien->waktu }}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{--            <input type="text" name="reg_no" value="{{ $datamypatient->reg_no }}" hidden> --}}
            <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="addpemulanganpasienperawat()">Simpan</button>
            </div>
            {{-- <input type="text" name="reg_medrec" value="{{ $data->reg_medrec }}" hidden>
            --}}
        </form>
    </div>
</div>
