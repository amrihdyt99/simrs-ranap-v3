<form id="InformasiTindakanMedis">
    <div class="row">
        <div class="col-sm-3 ml-2">
            <label for="">Nama tindakan :</label>
        </div>
        <div class="col-sm-5">
            <input type="text" id="informasi_nama_tindakan" name="informasi_nama_tindakan" class="form-control" placeholder="Masukkan nama tindakan" disabled>
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
                <div class="col-sm-9">
                    <input type="text" id="informasi_ParamedicCode" name="ParamedicCode" class="form-control" placeholder="Masukkan kode paramedis" disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Pemberi Informasi :</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="informasi_pemberi_info" class="form-control" name="informasi_pemberi_info" value="" disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Penerima Informasi / Pemberi Persetujuann :</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="informasi_penerima_info" class="form-control" name="informasi_penerima_info" value="" disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-3">
                    <label for="">Diberikan pada tanggal / jam :</label>
                </div>
                <div class="col-sm-9">
                    <input type="datetime-local" id="informasi_diberikan_pada" class="form-control" name="informasi_diberikan_pada" value="" disabled>
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
                            <input type="text" id="informasi_diagnosis_text" class="form-control" name="informasi_diagnosis_text" value="" disabled>
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
                            <input type="text" id="informasi_dasar_diagnosis_text" class="form-control" name="informasi_dasar_diagnosis_text" value="" disabled>
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
                            <input type="text" id="informasi_tindakan_kedokteran_text" class="form-control" name="informasi_tindakan_kedokteran_text" value="" disabled>
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
                            <input type="text" id="informasi_indikasi_tindakan_text" class="form-control" name="informasi_indikasi_tindakan_text" value="" disabled>
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
                            <input type="text" id="informasi_tata_cara_text" class="form-control" name="informasi_tata_cara_text" value="" disabled>
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
                            <input type="text" id="informasi_tujuan_text" class="form-control" name="informasi_tujuan_text" value="" disabled>
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
                            <input type="text" id="informasi_risiko_text" class="form-control" name="informasi_risiko_text" value="" disabled>
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
                            <input type="text" id="informasi_komplikasi_text" class="form-control" name="informasi_komplikasi_text" value="" disabled>
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
                            <input type="text" id="informasi_prognosis_text" class="form-control" name="informasi_prognosis_text" value="" disabled>
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
                            <input type="text" id="informasi_alternatif_text" class="form-control" name="informasi_alternatif_text" value="" disabled>
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
                            <input type="text" id="informasi_lain_lain_text" class="form-control" name="informasi_lain_lain_text" value="" disabled>
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
                                <img src="" id="ttd_info_dokter" alt="">
                            </div>
                            <div style="margin: 10px; text-align: center;">
                                <input type="hidden" id="signature_dokter" name="informasi_ttd_dokter" value="">
                                <input type="text" id="nama_dokter" name="nama_dokter" class="form-control mb-2 mt-2" value="" placeholder="Nama Dokter" disabled>
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
                                <img src="" id="ttd_info_penerima" alt="">
                            </div>
                            <div style="margin: 10px; text-align: center;">
                                <input type="hidden" id="signature_penerima" name="informasi_ttd_penerima_informasi" value="">
                                
                                <input type="text" id="nama_penerima_informasi" name="nama_penerima_informasi" class="form-control mb-2 mt-2" value="" placeholder="Nama Penerima Informasi" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>