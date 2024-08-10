<form id="InformasiTindakanMedis">
    <input type="hidden" name="kode_tindakan_medis_setuju_tolak" value="">
    <div class="row">
        <div class="col-sm-3 ml-2">
            <label for="">Nama tindakan :</label>
        </div>
        <div class="col-sm-5">
            <select name="informasi_nama_tindakan" id="" class="form-control">
                <option value=""></option>
                <option value="tes">tes</option>
            </select>
        </div>
    </div>
    <div class="card-header">
        <h5><b>PEMBERIAN INFORMASI</b></h5>
    </div>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label for="">Dokter Pelaksana Tindakan :</label>
                </div>
                <div class="col-sm-6">
                    <select name="ParamedicCode" id="ParamedicCode" class="form-control"></select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Pemberi Informasi :</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="informasi_pemberi_info"
                        value="{{ $informasi->informasi_pemberi_info }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Penerima Informasi / Pemberi Persetujuann :</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="informasi_penerima_info"
                        value="{{ $informasi->informasi_penerima_info }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Diberikan pada tanggal / jam :</label>
                </div>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" name="informasi_diberikan_pada"
                        value="{{ $informasi->informasi_diberikan_pada }}">
                </div>
            </div>

            <table class="table1 mt-2">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Jenis Informasi
                        </th>
                        <th>
                            Isi Informasi
                        </th>
                        <th>
                            Tanda (√)/paraf Penerima informasi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1.
                        </td>
                        <td>
                            Diagnosis (Diagnosis Kerja & Diagnosis Banding)
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_diagnosis_text"
                                value="{{ $informasi->informasi_diagnosis_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2.
                        </td>
                        <td>
                            Dasar Diagnosis
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_dasar_diagnosis_text"
                                value="{{ $informasi->informasi_dasar_diagnosis_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3.
                        </td>
                        <td>
                            Tindakan Kedokteran
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_tindakan_kedokteran_text"
                                value="{{ $informasi->informasi_tindakan_kedokteran_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4.
                        </td>
                        <td>
                            Indikasi Tindakan
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_indikasi_tindakan_text"
                                value="{{ $informasi->informasi_indikasi_tindakan_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            5.
                        </td>
                        <td>
                            Tata cara
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_tata_cara_text"
                                value="{{ $informasi->informasi_tata_cara_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6.
                        </td>
                        <td>
                            Tujuan
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_tujuan_text"
                                value="{{ $informasi->informasi_tujuan_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7.
                        </td>
                        <td>
                            Risiko
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_risiko_text"
                                value="{{ $informasi->informasi_risiko_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            8.
                        </td>
                        <td>
                            Komplikasi
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_komplikasi_text"
                                value="{{ $informasi->informasi_komplikasi_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            9.
                        </td>
                        <td>
                            Prognosis
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_prognosis_text"
                                value="{{ $informasi->informasi_prognosis_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            10.
                        </td>
                        <td>
                            Alternatif & Risiko
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_alternatif_text"
                                value="{{ $informasi->informasi_alternatif_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            11.
                        </td>
                        <td>
                            Lain-lain
                        </td>
                        <td>
                            <input type="text" class="form-control" name="informasi_lain_lain_text"
                                value="{{ $informasi->informasi_lain_lain_text }}">
                        </td>
                        <td>
                            {{-- <input type="checkbox" class="form-control"> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <p>Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar
                        dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskus</p>
                </div>
                <div class="col-sm-4">
                    <p>Tanda tangan Dokter<br><br><br>
                        ..........................</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <p>Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya beri
                        tanda/paraf di kolom kanannya, dan telah memahaminya</p>
                </div>
                <div class="col-sm-4">
                    <p>Tanda tangan penerima informasi<br><br><br>
                        .............................</p>
                </div>
            </div>
            <hr>
            <div>
                <h4 class="text-center"><b>Bila pasien tidak kompeten atau tidak mau menerima informasi,
                        maka penerima informasi adalah wali atau keluarga terdekat.</b></h4>
                <p>Keterangan : *) Pilih salah satu</p>
            </div>
            <button class="btn btn-success float-right mt-4" type="button"
                onclick="simpanInformasiTindakanMedis()">Simpan</button>
        </div>
    </div>

</form>

<div class="card mt-5">
    <div class="card-header">
        <h5><b>PEMBERIAN INFORMASI</b></h5>
    </div>
    <div class="card-body">
        @php
        $width_data = 50 / 2;
        @endphp
        <table style="width: 100%;">
            <tr>
                <td style="width: {{ $width_data }}%">Dokter Pelaksana Tindakan </td>
                <td>: </td>
            </tr>
            <tr>
                <td style="width: {{ $width_data }}%">Pemberi Informasi </td>
                <td>: {{ $informasi->informasi_pemberi_info }}</td>
            </tr>
            <tr>
                <td style="width: {{ $width_data }}%">Penerima Informasi / Pemberi Persetujuann </td>
                <td>: {{ $informasi->informasi_penerima_info }}</td>
            </tr>
            <tr>
                <td style="width: {{ $width_data }}%">Diberikan pada tanggal / jam</td>
                <td>: {{ $informasi->informasi_diberikan_pada }}</td>
            </tr>
        </table>

        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Jenis Informasi
                    </th>
                    <th>
                        Isi Informasi
                    </th>
                    <th>
                        Tanda (√)/paraf Penerima informasi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1.
                    </td>
                    <td>
                        Diagnosis (Diagnosis Kerja & Diagnosis Banding)
                    </td>
                    <td>
                        {{ $informasi->informasi_diagnosis_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        2.
                    </td>
                    <td>
                        Dasar Diagnosis
                    </td>
                    <td>
                        {{ $informasi->informasi_dasar_diagnosis_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        3.
                    </td>
                    <td>
                        Tindakan Kedokteran
                    </td>
                    <td>
                        {{ $informasi->informasi_tindakan_kedokteran_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        4.
                    </td>
                    <td>
                        Indikasi Tindakan
                    </td>
                    <td>
                        {{ $informasi->informasi_indikasi_tindakan_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        5.
                    </td>
                    <td>
                        Tata cara
                    </td>
                    <td>
                        {{ $informasi->informasi_tata_cara_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        6.
                    </td>
                    <td>
                        Tujuan
                    </td>
                    <td>
                        {{ $informasi->informasi_tujuan_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        7.
                    </td>
                    <td>
                        Risiko
                    </td>
                    <td>
                        {{ $informasi->informasi_risiko_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        8.
                    </td>
                    <td>
                        Komplikasi
                    </td>
                    <td>
                        {{ $informasi->informasi_komplikasi_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        9.
                    </td>
                    <td>
                        Prognosis
                    </td>
                    <td>
                        {{ $informasi->informasi_prognosis_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        10.
                    </td>
                    <td>
                        Alternatif & Risiko
                    </td>
                    <td>
                        {{ $informasi->informasi_alternatif_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        11.
                    </td>
                    <td>
                        Lain-lain
                    </td>
                    <td>
                        {{ $informasi->informasi_lain_lain_text }}
                    </td>
                    <td>
                        {{-- <input type="checkbox" class="form-control"> --}}
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100%;">
            <tr>
                <td>
                    Dengan ini menyatakan bahwa saya telah menerangkan hal-hal di atas secara benar
                    dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskus
                </td>
                <td>
                    Tanda tangan Dokter
                </td>
            </tr>
            <tr>
                <td></td>
                <td>.....................................</td>
            </tr>
            <tr>
                <td>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya beri
                    tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
                <td>
                    Tanda tangan penerima informasi
                </td>
            </tr>
            <tr>
                <td></td>
                <td>.......................................</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h6 style="margin: 0;"><b>Bila pasien tidak kompeten atau tidak mau menerima informasi,
                            maka penerima informasi adalah wali atau keluarga terdekat.</b></h6>
                    Keterangan : *) Pilih salah satu
                </td>
            </tr>
        </table>
    </div>
</div>

{{-- persetujuan tindakan medis --}}
@if (isset($persetujuan))
<div class="card mt-5">
    <div class="card-header">
        <h5><b>PERSETUJUAN TINDAKAN MEDIS</b></h5>
    </div>
    <div class="card-body">
        <table style="width: 100%;">
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    {{ $persetujuan->persetujuan_nama_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                    <input type="radio" name="persetujuan_jenis_kelamin_1" id="laki" value="Laki-laki"
                        {{ $persetujuan->persetujuan_jenis_kelamin_1 == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="laki">Laki-laki</label>
                    <input type="radio" name="persetujuan_jenis_kelamin_1" id="perempuan" value="Perempuan"
                        {{ $persetujuan->persetujuan_jenis_kelamin_1 == 'Perempuan' ? 'checked' : '' }}>
                    <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Lahir
                </td>
                <td>
                    {{ $persetujuan->persetujuan_tanggal_lahir_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    {{ $persetujuan->persetujuan_alamat_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Dengan ini menyatakan SETUJU untuk dilakukan tindakan.
                </td>
                <td>
                    {{ $persetujuan->persetujuan_pernyataan }}
                </td>
            </tr>
            <tr>
                <td>
                    Terhadap
                </td>
                <td>
                    <input type="radio" name="persetujuan_terhadap" id="saya" value="Saya sendiri"
                        {{ $persetujuan->persetujuan_terhadap == 'Saya sendiri' ? 'checked' : '' }}>
                    <label for="saya">Saya sendiri</label>
                    <input type="radio" name="persetujuan_terhadap" id="anak" value="Anak"
                        {{ $persetujuan->persetujuan_terhadap == 'Anak' ? 'checked' : '' }}>
                    <label for="anak">Anak</label>
                    <input type="radio" name="persetujuan_terhadap" id="ayah" value="Ayah"
                        {{ $persetujuan->persetujuan_terhadap == 'Ayah' ? 'checked' : '' }}>
                    <label for="ayah">Ayah</label>
                    <input type="radio" name="persetujuan_terhadap" id="ibu" value="Ibu"
                        {{ $persetujuan->persetujuan_terhadap == 'Ibu' ? 'checked' : '' }}>
                    <label for="ibu">Ibu</label>
                    <input type="radio" name="persetujuan_terhadap" id="saudara" value="Saudara"
                        {{ $persetujuan->persetujuan_terhadap == 'Saudara' ? 'checked' : '' }}>
                    <label for="saudara">Saudara</label>
                </td>
            </tr>
            <tr>
                <td style="width: 300px;">
                    Nama
                </td>
                <td>
                    {{ $persetujuan->persetujuan_nama_2 }}
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                    <input type="radio" name="persetujuan_jenis_kelamin_2" id="laki2" value="Laki-laki"
                        {{ $persetujuan->persetujuan_jenis_kelamin_2 == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="laki2">Laki-laki</label>
                    <input type="radio" name="persetujuan_jenis_kelamin_2" id="perempuan2" value="Perempuan"
                        {{ $persetujuan->persetujuan_jenis_kelamin_2 == 'Perempuan' ? 'checked' : '' }}>
                    <label for="perempuan2">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Lahir
                </td>
                <td>
                    <{{ $persetujuan->persetujuan_tanggal_lahir_2 }} </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    {{ $persetujuan->persetujuan_alamat_2 }}
                </td>
            </tr>
        </table>
        <p>Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas
            kepada
            saya, termasuk
            risiko dan komplikasi yang mungkin timbul.</p>
        <p>
            Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan
            tindakan
            medis bukanlah
            keniscayaan, melainkan sangat bergantung kepada Tuhan Yang Maha Esa.
        </p>

        <table style="width: 40%; float: right; border: none; margin-top: 30px">
            <tbody>
                <tr>
                    <td>
                        <h6>
                            Palembang, tanggal
                        </h6>
                    </td>
                    <td>
                        {{ $persetujuan->persetujuan_tanggal_waktu_ttd }}
                    </td>
                </tr>
            </tbody>
        </table>
        <p>Yang bertanda tangan dibawah ini saya, </p>
        <table style="width: 100%; border: none; text-align:center;">
            <tbody>
                <tr>
                    <td colspan="3" style="text-align: right;">
                        <h6>Saksi</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            Yang menyatakan
                        </h6>
                    </td>
                    <td>
                        <h6>Dokter</h6>
                    </td>
                    <td>
                        <h6>1. Keluarga</h6>
                    </td>
                    <td>
                        <h6>2. Perawat</h6>
                    </td>
                </tr>
                <tr>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@elseif (isset($penolakan))
<div class="card mt-5">
    <div class="card-header">
        <h5><b>PENOLAKAN TINDAKAN MEDIS</b></h5>
    </div>
    <div class="card-body">
        {{-- penolakan tindakan medis --}}
        <p>Yang bertanda tangan dibawah ini saya, </p>
        <table class="table1" style="width: 100%;">
            <tr>
                <td style="width: 300px;">
                    Nama
                </td>
                <td>
                    {{ $penolakan->penolakan_nama_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                    <input type="radio" name="penolakan_jenis_kelamin_1" id="laki3" value="Laki-laki"
                        {{ $penolakan->penolakan_jenis_kelamin_1 == 'Laki-laki' ? 'checked' : '' }}>
                    <label for="laki3">Laki-laki</label>
                    <input type="radio" name="penolakan_jenis_kelamin_1" id="perempuan3" value="Perempuan"
                        {{ $penolakan->penolakan_jenis_kelamin_1 == 'Perempuan' ? 'checked' : '' }}>
                    <label for="perempuan3">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Lahir
                </td>
                <td>
                    {{ $penolakan->penolakan_tanggal_lahir_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    {{ $penolakan->penolakan_alamat_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    Dengan ini menyatakan TIDAK SETUJU untuk dilakukan tindakan.
                </td>
                <td>
                    {{ $penolakan->penolakan_pernyataan }}
                </td>
            </tr>
            <tr>
                <td>
                    Terhadap
                </td>
                <td>
                    <input type="radio" name="penolakan_terhadap" id="saya3" value="Saya sendiri"
                        {{ $penolakan->penolakan_terhadap == 'Saya sendiri' ? 'checked' : '' }}>
                    <label for="saya3">Saya sendiri</label>
                    <input type="radio" name="penolakan_terhadap" id="anak3" value="Anak"
                        {{ $penolakan->penolakan_terhadap == 'Anak' ? 'checked' : '' }}>
                    <label for="anak3">Anak</label>
                    <input type="radio" name="penolakan_terhadap" id="ayah3" value="Ayah"
                        {{ $penolakan->penolakan_terhadap == 'Ayah' ? 'checked' : '' }}>
                    <label for="ayah3">Ayah</label>
                    <input type="radio" name="penolakan_terhadap" id="ibu3" value="Ibu"
                        {{ $penolakan->penolakan_terhadap == 'Ibu' ? 'checked' : '' }}>
                    <label for="ibu3">Ibu</label>
                    <input type="radio" name="penolakan_terhadap" id="saudara3" value="Saudara"
                        {{ $penolakan->penolakan_terhadap == 'Saudara' ? 'checked' : '' }}>
                    <label for="saudara3">Saudara</label>
                </td>
            </tr>
            <tr>
                <td style="width: 300px;">
                    Nama
                </td>
                <td>
                    {{ $penolakan->penolakan_nama_2 }}
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                    <input type="radio" name="penolakan_jenis_kelamin_2" id="laki4" value="Laki-laki"
                        {{ $penolakan->penolakan_jenis_kelamin_2 == 'Laki-laki' ?: '' }}>
                    <label for="laki4">Laki-laki</label>
                    <input type="radio" name="penolakan_jenis_kelamin_2" id="perempuan4" value="Perempuan"
                        {{ $penolakan->penolakan_jenis_kelamin_2 == 'Perempuan' ?: '' }}>
                    <label for="perempuan4">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Lahir
                </td>
                <td>
                    {{ $penolakan->penolakan_nama_2 }}
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    {{ $penolakan->penolakan_alamat_2 }}
                </td>
            </tr>
        </table>
        <p>Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas
            kepada
            saya, termasuk
            risiko dan komplikasi yang mungkin timbul.</p>
        <p>
            Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan
            tindakan
            medis bukanlah
            keniscayaan, melainkan sangat bergantung kepada Tuhan Yang Maha Esa.
        </p>

        <table style="width: 40%; float: right; border: none; margin-top: 30px">
            <tbody>
                <tr>
                    <td>
                        <h5>
                            Palembang, tanggal
                        </h5>
                    </td>
                    <td>
                        <input type="datetime-local" name="penolakan_tanggal_ttd" id=""
                            class="form-control" value="{{ $penolakan->penolakan_tanggal_ttd }}">
                    </td>
                </tr>
            </tbody>
        </table>


        <table style="width: 100%; border: none; text-align:center;">
            <tbody>
                <tr>
                    <td colspan="3" style="text-align: right;">
                        <h5>Saksi</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>
                            Yang menyatakan
                        </h5>
                    </td>
                    <td>
                        <h5>Dokter</h5>
                    </td>
                    <td>
                        <h5>1. Keluarga</h5>
                    </td>
                    <td>
                        <h5>2. Perawat</h5>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="laki4" value="Laki-laki"
                            {{ $penolakan->penolakan_jenis_kelamin_2 == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="laki4">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="perempuan4" value="Perempuan"
                            {{ $penolakan->penolakan_jenis_kelamin_2 == 'Perempuan' ? 'checked' : '' }}>
                        <label for="perempuan4">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@else
<p>tidak ada data persetujuan atau penolakan</p>
@endif


{{-- @push('nyaa_scripts') --}}
<script>
    $(function() {
        neko_select2_init(`{{ route('nyaa_universal.select2.m_paramedic')}}`, 'ParamedicCode');
    })
</script>
{{-- @endpush --}}