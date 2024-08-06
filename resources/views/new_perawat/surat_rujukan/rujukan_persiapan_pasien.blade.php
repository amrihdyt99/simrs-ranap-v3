@empty($surat_rujukan)
    @php
        $surat_rujukan = optional((object) []);
    @endphp
@endempty
<h4><b>Persiapan Pasien</b></h4>
<div class="card">
    <form id="rujukan_persiapan_pasien">
        <input type="hidden" name="kode_surat_rujukan" value="">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group"><label>RS asal</label>
                    <input type="text" class="form-control" name="rujukan_rs_asal"
                        value="{{ $surat_rujukan->rujukan_rs_asal }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Pemberi Infromasi</label>
                    <input type="text" class="form-control" name="rujukan_pemberi_informasi"
                        value="{{ $surat_rujukan->rujukan_pemberi_informasi }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Dokter Penanggung Jawab Pasien (DPJP)</label>
                    <select name="ParamedicCode" id="ParamedicCode" class="form-control"></select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"><label>RS tujuan</label>
                    <input type="text" class="form-control" name="rujukan_rs_tujuan"
                        value="{{ $surat_rujukan->rujukan_rs_tujuan }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Penerima Informasi</label>
                    <input type="text" class="form-control" name="rujukan_penerima_informasi"
                        value="{{ $surat_rujukan->rujukan_penerima_informasi }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Nama Petugas RS tujuan yang menyetujui rujukan :</label>
                    <input type="text" class="form-control" name="rujukan_nama_petugas"
                        value="{{ $surat_rujukan->rujukan_nama_petugas }}">
                </div>
            </div>
        </div>
        <h5><b>Waktu Menghubungi</b></h5>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal</label>
                    <input type="date" class="form-control" name="rujukan_hubungi_tanggal"
                        value="{{ $surat_rujukan->rujukan_hubungi_tanggal }}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_hubungi_jam"
                        value="{{ $surat_rujukan->rujukan_hubungi_jam }}">
                </div>
            </div>
        </div>

        <h5><b>Transfer</b></h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group"><label>Alasan Transfer</label>
                    <textarea name="rujukan_alasan_transfer" id="" cols="60" rows="4">{{ $surat_rujukan->rujukan_alasan_transfer }}</textarea>
                </div>
            </div>
        </div>
        <h5><b>Waktu Transfer</b></h5>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal</label>
                    <input type="date" class="form-control" name="rujukan_transfer_tanggal"
                        value="{{ $surat_rujukan->rujukan_transfer_tanggal }}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_transfer_jam"
                        value="{{ $surat_rujukan->rujukan_transfer_jam }}">
                </div>
            </div>
        </div>

        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Kategori Pasien</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 0" type="radio" class="custom-control-input" value="Level 0"
                        name="rujukan_kategori" {{ $surat_rujukan->rujukan_kategori == 'Level 0' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kategori_Level 0">Level 0</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 1" type="radio" class="custom-control-input" value="Level 1"
                        name="rujukan_kategori" {{ $surat_rujukan->rujukan_kategori == 'Level 1' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kategori_Level 1">Level 1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 2" type="radio" class="custom-control-input" value="Level 2"
                        name="rujukan_kategori" {{ $surat_rujukan->rujukan_kategori == 'Level 2' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kategori_Level 2">Level 2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 3" type="radio" class="custom-control-input" value="Level 3"
                        name="rujukan_kategori" {{ $surat_rujukan->rujukan_kategori == 'Level 3' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kategori_Level 3">Level 3</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-form-label col-sm-2 pt-0">
                <label for="">Transportasi</label>
            </div>
            <div class="col-lg-5">
                <input type="text" name="rujukan_transportasi" id="" class="form-control"
                    value="{{ $surat_rujukan->rujukan_transportasi }}">
            </div>
        </div>

        <br>
        <h3><b>RINGKASAN KONDISI PASIEN</b></h3>
        <br>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal MRS</label>
                    <input type="date" class="form-control" name="rujukan_ringkasan_tanggal"
                        value="{{ $surat_rujukan->rujukan_ringkasan_tanggal }}">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_ringkasan_jam"
                        value="{{ $surat_rujukan->rujukan_ringkasan_jam }}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group"><label>Keluhan</label>
                    <input type="text" class="form-control" name="rujukan_keluhan"
                        value="{{ $surat_rujukan->rujukan_keluhan }}">
                </div>
            </div>
        </div>

        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Alergi</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_alergi_Tidak" type="radio" class="custom-control-input" value="Tidak"
                        name="rujukan_alergi" {{ $surat_rujukan->rujukan_alergi == 'Tidak' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_alergi_Tidak">Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_alergi_Ya" type="radio" class="custom-control-input" value="Ya"
                        name="rujukan_alergi" {{ $surat_rujukan->rujukan_alergi == 'Ya' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_alergi_Ya">Ya</label>
                </div>
            </div>
        </div>
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Kewaspadaan</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Standar" type="radio" class="custom-control-input"
                        value="Standar" name="rujukan_kewaspaan"
                        {{ $surat_rujukan->rujukan_kewaspaan == 'Standar' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kewaspaan_Standar">Standar</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Contact" type="radio" class="custom-control-input"
                        value="Contact" name="rujukan_kewaspaan"
                        {{ $surat_rujukan->rujukan_kewaspaan == 'Contact' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kewaspaan_Contact">Contact</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Airbone" type="radio" class="custom-control-input"
                        value="Airbone" name="rujukan_kewaspaan"
                        {{ $surat_rujukan->rujukan_kewaspaan == 'Airbone' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kewaspaan_Airbone">Airbone</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Drole" type="radio" class="custom-control-input" value="Drole"
                        name="rujukan_kewaspaan" {{ $surat_rujukan->rujukan_kewaspaan == 'Drole' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="rujukan_kewaspaan_Drole">Drole</label>
                </div>
            </div>
        </div>

        <div class="row">
            <h5 class="col-sm-12 pt-0 mt-3">Tanda Vital Saat Pindah:</h5>
            <legend class="col-form-label col-sm-2 pt-0">GCS</legend>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>E</label>
                    <input type="text" class="form-control" value="{{ $surat_rujukan->rujukan_gcs_e }}"
                        name="rujukan_gcs_e">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>M</label>
                    <input type="text" class="form-control" value="{{ $surat_rujukan->rujukan_gcs_m }}"
                        name="rujukan_gcs_m">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>V</label>
                    <input type="text" class="form-control" value="{{ $surat_rujukan->rujukan_gcs_v }}"
                        name="rujukan_gcs_v">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>TD</label>
                    <input type="text" class="form-control" value="{{ $surat_rujukan->rujukan_td }}"
                        name="rujukan_td">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>N</label>
                    <input type="text" class="form-control" value="{{ $surat_rujukan->rujukan_N }}"
                        name="rujukan_N">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Skala Nyeri</label>
                    <input type="text" value="{{ $surat_rujukan->rujukan_skala_nyeri }}" class="form-control"
                        name="rujukan_skala_nyeri">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Suhu</label>
                    <input type="text" value="{{ $surat_rujukan->rujukan_suhu }}" class="form-control"
                        name="rujukan_suhu">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>P</label>
                    <input type="text" value="{{ $surat_rujukan->rujukan_p }}" class="form-control"
                        name="rujukan_p">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>SpO2</label>
                    <input type="text" value="{{ $surat_rujukan->rujukan_spo2 }}" class="form-control"
                        name="rujukan_spo2">
                </div>
            </div>
        </div>


        {{-- 
    @php
        $rujukan_dokumen_yang_disertakan = json_decode($rujukan_internal->rujukan_dokumen_yang_disertakan) ?? [];
    @endphp

    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Dokumen yang disertakan</legend>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="rujukan_dokumen_a" type="checkbox" class="custom-control-input" value="Rekam Medik"
                    name="rujukan_dokumen_yang_disertakan[]">
                <label class="custom-control-label" for="rujukan_dokumen_a">Rekam Medik</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="rujukan_dokumen_b" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Laboratorium" name="rujukan_dokumen_yang_disertakan[]">
                <label class="custom-control-label" for="rujukan_dokumen_b">Hasil Pemeriksaan Laboratorium</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="rujukan_dokumen_c" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Radiologi" name="rujukan_dokumen_yang_disertakan[]">
                <label class="custom-control-label" for="rujukan_dokumen_c">Hasil Pemeriksaan Radiologi</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="rujukan_dokumen_d" type="checkbox" class="custom-control-input" value="Lainnya"
                    name="rujukan_dokumen_yang_disertakan[]">
                <label class="custom-control-label" for="rujukan_dokumen_d">Lainnya</label>
            </div>
        </div>
    </div> --}}

        <div class="float-left">
            <button class="btn btn-success btn_rujukan_internal" type="button"
                onclick="simpanRujukanPersiapanPasien()">Simpan</button>
        </div>
    </form>
</div>

<div class="card mt-5">
    <div class="card-header">
        <h5><b>RIWAYAT SURAT RUJUKAN</b></h5>
    </div>
    <div class="card-body">
        <table style="width: 100%;" border="1">
            <tbody>
                <tr>
                    <td rowspan="5" colspan="2" class="tbold tcenter">SURAT RUJUKAN</td>
                </tr>
                <tr>
                    <td>No. Medrec</td>
                    <td>: {{ $datapasien->reg_medrec }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: {{ $datapasien->PatientName }}</td>
                </tr>
                <tr>
                    <td>Tgl. Lahir</td>
                    <td>:
                        {{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->formatter_dan_kalkulasi_umur($datapasien->DateOfBirth) }}
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datapasien->GCSex) }}
                    </td>
                </tr>
                <tr>
                    <td class="noborder">RS Asal</td>
                    <td class="noborder">: {{ $surat_rujukan->rujukan_rs_asal }}</td>
                    <td rowspan="4">
                        Dokter Penanggung Jawab Pasien (DPJP) : {{ $surat_rujukan->ParamedicCode }}<br>
                        Nama Petugas RS tujuan yang menyetujui rujukan :
                        {{ $surat_rujukan->rujukan_nama_petugas }}
                    </td>
                    <td rowspan="4">Waktu Menghubungi : <br> Tanggal
                        :{{ $surat_rujukan->rujukan_hubungi_tanggal }} <br>Jam:
                        {{ $surat_rujukan->rujukan_hubungi_jam }}</td>
                </tr>
                <tr>
                    <td class="noborder">RS Tujuan</td>
                    <td class="noborder">{{ $surat_rujukan->rujukan_rs_tujuan }}</td>
                </tr>
                <tr>
                    <td class="noborder">Pemberi Informasi</td>
                    <td class="noborder">: {{ $surat_rujukan->rujukan_pemberi_informasi }}</td>
                </tr>
                <tr>
                    <td class="noborder">Penerima Informasi</td>
                    <td class="noborder">: {{ $surat_rujukan->rujukan_penerima_informasi }}</td>
                </tr>
                <tr>
                    <td colspan="3">
                        Alasan Transfer : {{ $surat_rujukan->rujukan_alasan_transfer }}
                    </td>
                    <td>Waktu Transfer : <br> Tanggal :{{ $surat_rujukan->rujukan_transfer_tanggal }} <br>Jam:
                        {{ $surat_rujukan->rujukan_transfer_jam }}</td>
                </tr>
                <tr>
                    <td colspan="2">Kategori Pasien Transfer : {{ $surat_rujukan->rujukan_kategori }}</td>
                    <td colspan="2">Transportasi : {{ $surat_rujukan->rujukan_transportasi }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="tbold tcenter">RINGKASAN KONDISI PASIEN</td>
                </tr>
                <tr>
                    <td colspan="2">
                        Tanggal MRS : {{ $surat_rujukan->rujukan_ringkasan_tanggal }} <br>
                        Jam : {{ $surat_rujukan->rujukan_ringkasan_jam }} <br>
                        Keluhan : {{ $surat_rujukan->rujukan_keluhan }} <br>
                        Alergi : {{ $surat_rujukan->rujukan_alergi }} <br>
                        Kewaspadaan : {{ $surat_rujukan->rujukan_kewaspaan }}
                    </td>
                    <td class="noborder">
                        Tanda Vital Saat Pindah <br>
                        GCS <br>
                        TD : {{ $surat_rujukan->rujukan_td }} <br>
                        N : {{ $surat_rujukan->rujukan_N }} <br>
                        Skala Nyeri : {{ $surat_rujukan->rujukan_skala_nyeri }}
                    </td>
                    <td class="noborder">
                        E :{{ $surat_rujukan->rujukan_gcs_e }} , M :
                        {{ $surat_rujukan->rujukan_gcs_m }} , V :
                        {{ $surat_rujukan->rujukan_gcs_v }}<br>
                        Suhu : {{ $surat_rujukan->rujukan_suhu }} <br>
                        P : {{ $surat_rujukan->rujukan_p }} <br>
                        SpO2 : {{ $surat_rujukan->rujukan_spo2 }}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Anamnesis dan Pemeriksaan Fisik : </td>
                </tr>
                <tr>
                    <td colspan="4">Diagnosis : </td>
                </tr>
                <tr>
                    <td colspan="4">Pemeriksaan Penunjang Selama Pasien Di Rawat :
                    </td>
                </tr>

            </tbody>
        </table>

        @php
            $width_data = 100 / 2;
        @endphp
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;">Prosedur/Operasi yang pernah di lakukan</th>
                </tr>
                <tr>
                    <th style="width: {{ $width_data }}%">Detail Prosedur Operasi</th>
                    <th style="width: {{ $width_data }}%">Waktu Operasi Dilakukan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat_rujukan_prosedur_operasi as $data_operasi)
                    <tr>
                        <td>{{ $data_operasi->detail_prosedur_operasi }}</td>
                        <td>{{ $data_operasi->waktu_prosedur_operasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
            $width_data = 100 / 2;
        @endphp
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Alat-alat yang terpasang dan tanggal pemasangan
                    </th>
                </tr>
                <tr>
                    <th style="width: {{ $width_data }}%">Nama Alat</th>
                    <th style="width: {{ $width_data }}%">Waktu Terpasang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat_rujukan_alat_terpasang as $data_alat)
                    <tr>
                        <td>{{ $data_alat->nama_alat_terpasang }}</td>
                        <td>{{ $data_alat->waktu_alat_terpasang }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        @php
            $width_data = 100 / 3;
        @endphp
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Obat/Cairan Yang Diterima Pada Saat Transfer</th>
                </tr>
                <tr>
                    <th style="width: {{ $width_data }}%">Nama Obat</th>
                    <th style="width: {{ $width_data }}%">Qty</th>
                    <th style="width: {{ $width_data }}%">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat_rujukan_obat_diterima as $data_obat_diterima)
                    <tr>
                        <td>{{ $data_obat_diterima->item_id_terima }}</td>
                        <td>{{ $data_obat_diterima->quantity_terima }}</td>
                        <td>{{ $data_obat_diterima->item_unit_code_terima }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        @php
            $width_data = 100 / 3;
        @endphp
        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Obat/Cairan Yang Dibawa Pada Saat Transfer</th>
                </tr>
                <tr>
                    <th style="width: {{ $width_data }}%">Nama Obat</th>
                    <th style="width: {{ $width_data }}%">Qty</th>
                    <th style="width: {{ $width_data }}%">Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surat_rujukan_obat_dibawa as $data_obat_dibawa)
                    <tr>
                        <td>{{ $data_obat_dibawa->item_id_bawa }}</td>
                        <td>{{ $data_obat_dibawa->quantity_bawa }}</td>
                        <td>{{ $data_obat_dibawa->item_unit_code_bawa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @php
            $width_data = 100 / 5;
        @endphp
        <table border="1" style="width: 100%">
            <tbody>
                <tr>
                    <th colspan="5" style="text-align: center;">STATUS PASIEN SELAMA TRANSFER</th>
                </tr>
                <tr>
                    <th style="width: {{ $width_data }}%">Tanggal</th>
                    <th style="width: {{ $width_data }}%">Kesadaran</th>
                    <th style="width: {{ $width_data }}%">th (mmHg)</th>
                    <th style="width: {{ $width_data }}%">HR (x/mnt)</th>
                    <th style="width: {{ $width_data }}%">RR (x/mnt)</th>
                </tr>
                @foreach ($surat_rujukan_status_pasien as $data_status_pasien)
                    <tr>
                        <td>{{ $data_status_pasien->waktu }}</td>
                        <td>{{ $data_status_pasien->kesadaran }}</td>
                        <td>{{ $data_status_pasien->td }}</td>
                        <td>{{ $data_status_pasien->hr }}</td>
                        <td>{{ $data_status_pasien->rr }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td colspan="5" class="tbold tcenter">SERAH TERIMA PASIEN</td>
                </tr>
                <tr>
                    <td>
                        <b>Waktu Serah Terima</b><br>
                        Tanggal :{{ $surat_rujukan_terima->rujukan_terima_tanggal }} <br>
                        Kondisi saat ini :{{ $surat_rujukan_terima->rujukan_terima_kondisi }} <br>
                        GCS :{{ $surat_rujukan_terima->rujukan_terima_gcs_e }} <br>
                        TD :{{ $surat_rujukan_terima->rujukan_terima_td }} mmHg<br>
                        N :{{ $surat_rujukan_terima->rujukan_terima_n }} x/mnt<br>
                        Skala Nyeri :{{ $surat_rujukan_terima->rujukan_terima_skala_nyeri }} <br>
                    </td>
                    <td>
                        Jam :{{ $surat_rujukan_terima->rujukan_terima_jam }} <br>
                        E :{{ $surat_rujukan_terima->rujukan_terima_gcs_e }} , M
                        :{{ $surat_rujukan_terima->rujukan_terima_gcs_m }} , V
                        :{{ $surat_rujukan_terima->rujukan_terima_gcs_v }} <br>
                        Suhu :{{ $surat_rujukan_terima->rujukan_terima_suhu }} ,<br>
                        P :{{ $surat_rujukan_terima->rujukan_terima_p }} x/mnt <br>
                        SpO2 :{{ $surat_rujukan_terima->rujukan_terima_sp02 }}
                    </td>
                    <td>
                        Hasil Pemeriksaan Diagnostik <br>
                        Lab :{{ $surat_rujukan_terima->rujukan_terima_lab }} lembar <br>
                        X-Ray :{{ $surat_rujukan_terima->rujukan_terima_xray }} lembar<br>
                        MRI :{{ $surat_rujukan_terima->rujukan_terima_mri }} lembar <br>
                        CT Scan :{{ $surat_rujukan_terima->rujukan_terima_ct_scan }} lembar
                    </td>
                    <td colspan="2">
                        EKG :{{ $surat_rujukan_terima->rujukan_terima_ekg }} lembar <br>
                        Echo :{{ $surat_rujukan_terima->rujukan_terima_echo }} lembar <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="tcenter noborder">Petugas Yang Menyerahkan</td>
                    <td class="noborder"></td>
                    <td colspan="2" class="tcenter noborder">Petugas Yang Menerima</td>
                </tr>
                <tr class="noborder">
                    <td>
                        <br><br><br><br><br>
                        Nama dan tanda tangan dokter
                    </td>
                    <td>
                        <br><br><br><br><br>
                        Nama dan tanda tangan perawat
                    </td>
                    <td></td>
                    <td>
                        <br><br><br><br><br>
                        Nama dan tanda tangan dokter
                    </td>
                    <td>
                        <br><br><br><br><br>
                        Nama dan tanda tangan perawat
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- @push('nyaa_scripts') --}}
<script>
    $(function() {
        neko_select2_init('{{ route('nyaa_universal.select2.m_paramedic') }}', 'ParamedicCode');
    })
</script>
{{-- @endpush --}}
