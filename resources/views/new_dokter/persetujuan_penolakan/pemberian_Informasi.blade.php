<form id="InformasiTindakanMedis">
    <input type="hidden" name="kode_tindakan_medis_setuju_tolak" id="kode_tindakan_medis_setuju_tolak" value="">
    <div class="row">
        <div class="col-sm-3 ml-2">
            <label for="informasi_nama_tindakan">Nama tindakan :</label>
        </div>
        <div class="col-sm-5">
            <select name="informasi_nama_tindakan" id="informasi_nama_tindakan" class="form-control">
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
                    <label for="ParamedicCode">Dokter Pelaksana Tindakan :</label>
                </div>
                <div class="col-sm-9">
                    <select name="ParamedicCode" id="ParamedicCode" class="form-control">
                        <option value="">
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="informasi_pemberi_info">Pemberi Informasi :</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="informasi_pemberi_info" id="informasi_pemberi_info"
                        value="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="informasi_penerima_info">Penerima Informasi / Pemberi Persetujuann :</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="informasi_penerima_info" id="informasi_penerima_info"
                        value="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="informasi_diberikan_pada">Diberikan pada tanggal / jam :</label>
                </div>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" name="informasi_diberikan_pada" id="informasi_diberikan_pada"
                        value="">
                </div>
            </div>

            <table class="table1 mt-2 w-100">
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
                            <input type="text" class="form-control" name="informasi_diagnosis_text" id="informasi_diagnosis_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_dasar_diagnosis_text" id="informasi_dasar_diagnosis_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_tindakan_kedokteran_text" id="informasi_tindakan_kedokteran_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_indikasi_tindakan_text" id="informasi_indikasi_tindakan_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_tata_cara_text" id="informasi_tata_cara_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_tujuan_text" id="informasi_tujuan_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_risiko_text" id="informasi_risiko_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_komplikasi_text" id="informasi_komplikasi_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_prognosis_text" id="informasi_prognosis_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_alternatif_text" id="informasi_alternatif_text"
                                value="">
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
                            <input type="text" class="form-control" name="informasi_lain_lain_text" id="informasi_lain_lain_text"
                                value="">
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
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="margin-bottom: 10px; font-size:17px">Tanda tangan Dokter</div>
                        <div id="signature-pad-dokter" style="display: inline-block;">
                            <div
                                style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                <canvas id="canvas_dokter" width="260" height="160">Your browser does not support
                                    the HTML canvas tag.</canvas>
                            </div>
                            <div style="margin: 10px; text-align: center;">
                                <input type="hidden" id="signature_dokter" name="informasi_ttd_dokter" value="">
                                <button type="button" id="clear_btn_dokter" class="btn btn-danger"
                                    data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                                <input type="text" name="nama_dokter" id="nama_dokter" class="form-control mb-2 mt-2" value="" placeholder="Nama Dokter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-6">
                    <p>Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya beri
                        tanda/paraf di kolom kanannya, dan telah memahaminya</p>
                </div>
                <div class="col-sm-4">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="margin-bottom: 10px; font-size:17px">Tanda tangan penerima informasi</div>
                        <div id="signature-pad-penerima" style="display: inline-block;">
                            <div
                                style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                <canvas id="canvas_penerima" width="260" height="160">Your browser does not support
                                    the HTML canvas tag.</canvas>
                            </div>
                            <div style="margin: 10px; text-align: center;">
                                <input type="hidden" id="signature_penerima" name="informasi_ttd_penerima_informasi" value="">
                                <button type="button" id="clear_btn_penerima" class="btn btn-danger"
                                    data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                                <input type="text" name="nama_penerima_informasi" id="nama_penerima_informasi" class="form-control mb-2 mt-2" value="" placeholder="Nama Penerima Informasi">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="btn btn-success float-left mt-4" id="save-pemberian-infromasi-tindakan-medis" type="button">Simpan</button>
        </div>
    </div>

</form>

<div class="card mt-5" id="print-section">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5><b>PEMBERIAN INFORMASI</b></h5>
        <button class="btn btn-primary d-print-none" onclick="printSection()">Cetak</button>
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
                <td>: </td>
            </tr>
            <tr>
                <td style="width: {{ $width_data }}%">Penerima Informasi / Pemberi Persetujuann </td>
                <td>: </td>
            </tr>
            <tr>
                <td style="width: {{ $width_data }}%">Diberikan pada tanggal / jam</td>
                <td>: </td>
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
                    dan jelas dan memberikan kesempatan untuk bertanya dan/atau berdiskusi
                </td>
            </tr>
            <tr>
                <td>
                    Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana di atas yang saya beri
                    tanda/paraf di kolom kanannya, dan telah memahaminya
                </td>
            </tr>
        </table>

        <div style="display: flex; justify-content: space-between; margin-top: 50px;">
            <div style="text-align: center;">
                Tanda tangan Dokter
                <br><br><br>
                .....................................
            </div>
            <div style="text-align: center;">
                Tanda tangan penerima informasi
                <br><br><br>
                .......................................
            </div>
        </div>

        <table style="width: 100%; margin-top: 50px;">
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
<script>
    function printSection() {
        var printContents = document.getElementById('print-section').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>

{{-- persetujuan tindakan medis --}}
@if (isset($persetujuan))
    <div class="card mt-5" id="print-section-persetujuan">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><b>PERSETUJUAN TINDAKAN MEDIS</b></h5>
            <button class="btn btn-primary d-print-none" onclick="printSectionPersetujuan()">Cetak</button>
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
                        {{ $persetujuan->persetujuan_tanggal_lahir_2 }} </td>
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
    <script>
        function printSectionPersetujuan() {
            var printContents = document.getElementById('print-section-persetujuan').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endif
@if (isset($penolakan))
    <div class="card mt-5" id="print-section-penolakan">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><b>PENOLAKAN TINDAKAN MEDIS</b></h5>
            <button class="btn btn-primary d-print-none" onclick="printSectionPenolakan()">Cetak</button>
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
                            {{ $penolakan->penolakan_jenis_kelamin_2 == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="laki4">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="perempuan4" value="Perempuan"
                            {{ $penolakan->penolakan_jenis_kelamin_2 == 'Perempuan' ? 'checked' : '' }}>
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
    <script>
        $(document).ready(function() {
            // Assuming you have the data in a variable called `informasi`
            var informasi = {
                informasi_ttd_dokter: "data:image/png;base64,...", // Example data
                informasi_ttd_penerima_informasi: "data:image/png;base64,..."
            };

            console.log("Dokter Signature Data:", informasi.informasi_ttd_dokter);
            console.log("Penerima Signature Data:", informasi.informasi_ttd_penerima_informasi);

            // Set the value of the hidden input fields
            $('#signature_dokter').val(informasi.informasi_ttd_dokter);
            $('#signature_penerima').val(informasi.informasi_ttd_penerima_informasi);

            // Display the signature on a canvas
            var canvasDokter = document.getElementById('canvas_dokter');
            var contextDokter = canvasDokter.getContext('2d');
            var imageDokter = new Image();
            imageDokter.src = informasi.informasi_ttd_dokter;
            imageDokter.onload = function() {
                contextDokter.drawImage(imageDokter, 0, 0);
            };
            imageDokter.onerror = function() {
                console.error("Failed to load dokter signature image.");
            };

            var canvasPenerima = document.getElementById('canvas_penerima');
            var contextPenerima = canvasPenerima.getContext('2d');
            var imagePenerima = new Image();
            imagePenerima.src = informasi.informasi_ttd_penerima_informasi;
            imagePenerima.onload = function() {
                contextPenerima.drawImage(imagePenerima, 0, 0);
            };
            imagePenerima.onerror = function() {
                console.error("Failed to load penerima signature image.");
            };
        });
        function printSectionPenolakan() {
            var printContents = document.getElementById('print-section-penolakan').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endif


{{-- @push('nyaa_scripts') --}}
{{-- <script>
    $(function() {
        neko_select2_init(`{{ route('nyaa_universal.select2.m_paramedic') }}`, 'ParamedicCode');
    });
</script> --}}
{{-- @endpush --}}
