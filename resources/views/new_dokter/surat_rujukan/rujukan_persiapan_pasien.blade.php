@empty($surat_rujukan)
@php
$surat_rujukan = optional((object) []);
@endphp
@endempty<h4><b>Persiapan Pasien</b></h4>
<div class="card">
    <form id="rujukan_persiapan_pasien">
        <input type="hidden" name="kode_surat_rujukan" value="{{ $surat_rujukan->kode_surat_rujukan }}">
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
                    <select name="ParamedicCode" id="ParamedicCodeRujukan" class="form-control"></select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group"><label>RS tujuan</label>
                    <input type="text" class="form-control" name="rujukan_rs_tujuan" value="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Penerima Informasi</label>
                    <input type="text" class="form-control" name="rujukan_penerima_informasi" value="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"><label>Nama Petugas RS tujuan yang menyetujui rujukan :</label>
                    <input type="text" class="form-control" name="rujukan_nama_petugas" value="">
                </div>
            </div>
        </div>
        <h5><b>Waktu Menghubungi</b></h5>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal</label>
                    <input type="date" class="form-control" name="rujukan_hubungi_tanggal" value="">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_hubungi_jam" value="">
                </div>
            </div>
        </div>

        <h5><b>Transfer</b></h5>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group"><label>Alasan Transfer</label>
                    <textarea name="rujukan_alasan_transfer" id="" cols="60" rows="4"></textarea>
                </div>
            </div>
        </div>
        <h5><b>Waktu Transfer</b></h5>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal</label>
                    <input type="date" class="form-control" name="rujukan_transfer_tanggal" value="">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_transfer_jam" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Kategori Pasien</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 0" type="radio" class="custom-control-input" value="Level 0"
                        name="rujukan_kategori">
                    <label class="custom-control-label" for="rujukan_kategori_Level 0">Level 0</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 1" type="radio" class="custom-control-input" value="Level 1"
                        name="rujukan_kategori">
                    <label class="custom-control-label" for="rujukan_kategori_Level 1">Level 1</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 2" type="radio" class="custom-control-input" value="Level 2"
                        name="rujukan_kategori">
                    <label class="custom-control-label" for="rujukan_kategori_Level 2">Level 2</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kategori_Level 3" type="radio" class="custom-control-input" value="Level 3"
                        name="rujukan_kategori">
                    <label class="custom-control-label" for="rujukan_kategori_Level 3">Level 3</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-form-label col-sm-2 pt-0">
                <label for="">Transportasi</label>
            </div>
            <div class="col-lg-5">
                <input type="text" name="rujukan_transportasi" id="" class="form-control" value="">
            </div>
        </div>

        <br>
        <h3><b>RINGKASAN KONDISI PASIEN</b></h3>
        <br>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group"><label>Tanggal MRS</label>
                    <input type="date" class="form-control" name="rujukan_ringkasan_tanggal" value="">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group"><label>Jam</label>
                    <input type="time" class="form-control" name="rujukan_ringkasan_jam" value="">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group"><label>Keluhan</label>
                    <input type="text" class="form-control" name="rujukan_keluhan" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Alergi</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_alergi_Tidak" type="radio" class="custom-control-input" value="Tidak"
                        name="rujukan_alergi">
                    <label class="custom-control-label" for="rujukan_alergi_Tidak">Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_alergi_Ya" type="radio" class="custom-control-input" value="Ya"
                        name="rujukan_alergi">
                    <label class="custom-control-label" for="rujukan_alergi_Ya">Ya</label>
                </div>
            </div>
        </div>
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Kewaspadaan</legend>
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Standar" type="radio" class="custom-control-input"
                        value="Standar" name="rujukan_kewaspaan">
                    <label class="custom-control-label" for="rujukan_kewaspaan_Standar">Standar</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Contact" type="radio" class="custom-control-input"
                        value="Contact" name="rujukan_kewaspaan">
                    <label class="custom-control-label" for="rujukan_kewaspaan_Contact">Contact</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Airbone" type="radio" class="custom-control-input"
                        value="Airbone" name="rujukan_kewaspaan">
                    <label class="custom-control-label" for="rujukan_kewaspaan_Airbone">Airbone</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="rujukan_kewaspaan_Drole" type="radio" class="custom-control-input" value="Drole"
                        name="rujukan_kewaspaan">
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
                    <input type="text" class="form-control" value="" name="rujukan_gcs_e">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>M</label>
                    <input type="text" class="form-control" value="" name="rujukan_gcs_m">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>V</label>
                    <input type="text" class="form-control" value="" name="rujukan_gcs_v">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>TD</label>
                    <input type="text" class="form-control" value="" name="rujukan_td">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>N</label>
                    <input type="text" class="form-control" value="" name="rujukan_N">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Skala Nyeri</label>
                    <input type="text" value="" class="form-control" name="rujukan_skala_nyeri">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Suhu</label>
                    <input type="text" value="" class="form-control" name="rujukan_suhu">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>P</label>
                    <input type="text" value="" class="form-control" name="rujukan_p">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>SpO2</label>
                    <input type="text" value="" class="form-control" name="rujukan_spo2">
                </div>
            </div>
        </div>

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
                    <td>: {{ $dataPasien->reg_medrec }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: {{ $dataPasien->PatientName }}</td>
                </tr>
                <tr>
                    <td>Tgl. Lahir</td>
                    <td>:
                        {{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->formatter_dan_kalkulasi_umur($dataPasien->DateOfBirth) }}
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($dataPasien->GCSex) }}
                    </td>
                </tr>
                <tr>
                    <td class="noborder">RS Asal</td>
                    <td class="noborder">: <span id="rs_asal"></span></td>
                    <td rowspan="4">
                        Dokter Penanggung Jawab Pasien (DPJP) : <span id="dpjp"></span><br>
                        Nama Petugas RS tujuan yang menyetujui rujukan : <span id="petugas_rs_tujuan"></span>
                    </td>
                    <td rowspan="4">Waktu Menghubungi : <br> Tanggal : <span id="tanggal_menghubungi"></span><br>Jam: <span id="jam_menghubungi"></span>
                    </td>
                </tr>
                <tr>
                    <td class="noborder">RS Tujuan</td>
                    <td class="noborder">: <span id="rs_tujuan"></span></td>
                </tr>
                <tr>
                    <td class="noborder">Pemberi Informasi</td>
                    <td class="noborder">: <span id="pemberi_informasi"></span></td>
                </tr>
                <tr>
                    <td class="noborder">Penerima Informasi</td>
                    <td class="noborder">: <span id="penerima_informasi"></span></td>
                </tr>
                <tr>
                    <td colspan="3">
                        Alasan Transfer : <span id="alasan_transfer"></span>
                    </td>
                    <td>Waktu Transfer : <br> Tanggal : <span id="tanggal_transfer"></span><br>Jam: <span id="jam_transfer"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Kategori Pasien Transfer : <span id="kategori_pasien_transfer"></span></td>
                    <td colspan="2">Transportasi : <span id="transportasi"></span></td>
                </tr>
                <tr>
    <td colspan="4" class="tbold tcenter">RINGKASAN KONDISI PASIEN</td>
</tr>
                <tr>
                    <td colspan="2">
                        Tanggal MRS : <span id="tanggal_mrs"></span><br>
                        Jam : <span id="jam_mrs"></span><br>
                        Keluhan : <span id="keluhan"></span><br>
                        Alergi : <span id="alergi"></span><br>
                        Kewaspadaan : <span id="kewaspadaan"></span>
                    </td>
                    <td class="noborder">
                        Tanda Vital Saat Pindah <br>
                        GCS <br>
                        TD : <span id="td_pindah"></span><br>
                        N : <span id="n_pindah"></span><br>
                        Skala Nyeri : <span id="skala_nyeri_pindah"></span>
                    </td>
                    <td class="noborder">
                        E : <span id="gcs_e_pindah"></span>, M : <span id="gcs_m_pindah"></span>, V : <span id="gcs_v_pindah"></span><br>
                        Suhu : <span id="suhu_pindah"></span><br>
                        P : <span id="p_pindah"></span><br>
                        SpO2 : <span id="spo2_pindah"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Anamnesis dan Pemeriksaan Fisik : <span id="anamnesis_pemeriksaan_fisik"></span></td>
                </tr>
                <tr>
                    <td colspan="4">Diagnosis : <span id="diagnosis"></span></td>
                </tr>
                <tr>
                    <td colspan="4">Pemeriksaan Penunjang Selama Pasien Di Rawat : <span id="pemeriksaan_penunjang"></span></td>
                </tr>
            </tbody>
        </table>

        <table border="1" style="width: 100%" id="tabelProsedurOperasi">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;">Prosedur/Operasi yang pernah di lakukan</th>
                </tr>
                <tr>
                    <th style="width: 50%">Detail Prosedur Operasi</th>
                    <th style="width: 50%">Waktu Operasi Dilakukan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>

        <table border="1" style="width: 100%" id="tabelAlatTerpasang">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center;">Alat-alat yang terpasang dan tanggal pemasangan</th>
                </tr>
                <tr>
                    <th style="width: 50%">Nama Alat</th>
                    <th style="width: 50%">Waktu Terpasang</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>

        <table border="1" style="width: 100%" id="tabelObatDiterima">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Obat/Cairan Yang Diterima Pada Saat Transfer</th>
                </tr>
                <tr>
                    <th style="width: 33%">Nama Obat</th>
                    <th style="width: 33%">Qty</th>
                    <th style="width: 33%">Satuan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>

        <table border="1" style="width: 100%" id="tabelObatDibawa">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Obat/Cairan Yang Dibawa Pada Saat Transfer</th>
                </tr>
                <tr>
                    <th style="width: 33%">Nama Obat</th>
                    <th style="width: 33%">Qty</th>
                    <th style="width: 33%">Satuan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>

        <table border="1" style="width: 100%" id="tabelStatusPasien">
            <thead>
                <tr>
                    <th colspan="5" style="text-align: center;">STATUS PASIEN SELAMA TRANSFER</th>
                </tr>
                <tr>
                    <th style="width: 20%">Tanggal</th>
                    <th style="width: 20%">Kesadaran</th>
                    <th style="width: 20%">TD (mmHg)</th>
                    <th style="width: 20%">HR (x/mnt)</th>
                    <th style="width: 20%">RR (x/mnt)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi oleh JavaScript -->
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
                        Tanggal : <span id="tanggal_serah_terima"></span><br>
                        Kondisi saat ini : <span id="kondisi_saat_ini"></span><br>
                        GCS : <span id="gcs_e"></span> E, <span id="gcs_m"></span> M, <span id="gcs_v"></span> V<br>
                        TD : <span id="td_serah_terima"></span><br>
                        N : <span id="n_serah_terima"></span><br>
                        Skala Nyeri : <span id="skala_nyeri_serah_terima"></span><br>
                    </td>
                    <td>
                        Jam : <span id="jam_serah_terima"></span><br>
                        Suhu : <span id="suhu_serah_terima"></span><br>
                        P : <span id="p_serah_terima"></span><br>
                        SpO2 : <span id="spo2_serah_terima"></span>
                    </td>
                    <td>
                        Hasil Pemeriksaan Diagnostik <br>
                        Lab : <span id="lab_serah_terima"></span> lembar <br>
                        X-Ray : <span id="xray_serah_terima"></span> lembar<br>
                        MRI : <span id="mri_serah_terima"></span> lembar <br>
                        CT Scan : <span id="ct_scan_serah_terima"></span> lembar
                    </td>
                    <td colspan="2">
                        EKG : <span id="ekg_serah_terima"></span> lembar <br>
                        Echo : <span id="echo_serah_terima"></span> lembar <br>
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

