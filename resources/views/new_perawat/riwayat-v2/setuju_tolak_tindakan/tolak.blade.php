<form id="PenolakanTindakanMedis">
    <input type="hidden" name="kode_tindakan_medis_setuju_tolak" id="kode_tindakan_medis_setuju_tolak" value="">
    <div class="card">
        <div class="card-header">
            <h5><b>PENOLAKAN TINDAKAN MEDIS</b></h5>
        </div>
        <div class="card-body">
            <p>Yang bertanda tangan dibawah ini saya, </p>
            <table class="table1" id="riwayat_tolak_tindakan" style="width: 100%;">
                <tr>
                    <td style="width: 300px;">Nama</td>
                    <td>
                        <input type="text" name="penolakan_nama_1" id="penolakan_nama_1" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="penolakan_jenis_kelamin_1_laki" value="Laki-laki" disabled>
                        <label for="penolakan_jenis_kelamin_1_laki">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="penolakan_jenis_kelamin_1_perempuan" value="Perempuan" disabled>
                        <label for="penolakan_jenis_kelamin_1_perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>
                        <input type="date" name="penolakan_tanggal_lahir_1" id="penolakan_tanggal_lahir_1" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="penolakan_alamat_1" id="penolakan_alamat_1" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Dengan ini menyatakan TIDAK SETUJU untuk dilakukan tindakan.</td>
                    <td>
                        <input type="text" name="penolakan_pernyataan" id="penolakan_pernyataan" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Terhadap</td>
                    <td>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_1" value="Saya sendiri" disabled>
                        <label for="penolakan_terhadap_1">Saya sendiri</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_2" value="Anak" disabled>
                        <label for="penolakan_terhadap_2">Anak</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_3" value="Ayah" disabled>
                        <label for="penolakan_terhadap_3">Ayah</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_4" value="Ibu" disabled>
                        <label for="penolakan_terhadap_4">Ibu</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_5" value="Saudara" disabled>
                        <label for="penolakan_terhadap_5">Saudara</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 300px;">Nama</td>
                    <td>
                        <input type="text" name="penolakan_nama_2" id="penolakan_nama_2" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="penolakan_jenis_kelamin_2_laki" value="Laki-laki" disabled>
                        <label for="penolakan_jenis_kelamin_2_laki">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="penolakan_jenis_kelamin_2_perempuan" value="Perempuan" disabled>
                        <label for="penolakan_jenis_kelamin_2_perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>
                        <input type="date" name="penolakan_tanggal_lahir_2" id="penolakan_tanggal_lahir_2" class="form-control" value="" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="penolakan_alamat_2" id="penolakan_alamat_2" class="form-control" value="" disabled>
                    </td>
                </tr>
            </table>
            <p>Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada saya, termasuk risiko dan komplikasi yang mungkin timbul.</p>
            <p>Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan tindakan medis bukanlah keniscayaan, melainkan sangat bergantung kepada Tuhan Yang Maha Esa.</p>

            <table style="width: 40%; float: right; border: none; margin-top: 30px">
                <tbody>
                    <tr>
                        <td>
                            <h5>Palembang, tanggal</h5>
                        </td>
                        <td>
                            <input type="datetime-local" name="penolakan_tanggal_ttd" id="penolakan_tanggal_ttd" class="form-control" value="" disabled>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table style="width: 100%; border: none; text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">Yang menyatakan</div>
                            <div id="signature-pad-penolakan-penerima" style="display: inline-block;">
                                <div style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <img src="" id="ttd_penolakan_menyatakan">
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_penerima" name="penolakan_ttd_yg_menyatakan" value="">
                                    <input type="text" name="nama_penolakan_penerima" id="nama_penolakan_penerima" class="form-control mt-2" placeholder="Nama Yang Menyatakan" disabled>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">Dokter</div>
                            <div id="signature-pad-penolakan-dokter" style="display: inline-block;">
                                <div style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <img src="" id="ttd_penolakan_dokter">
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_dokter" name="penolakan_ttd_dokter" value="">
                                    <input type="text" name="nama_penolakan_dokter" id="nama_penolakan_dokter" class="form-control mt-2" placeholder="Nama Dokter" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:17px">SAKSI</td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">1. Keluarga</div>
                            <div id="signature-pad-penolakan-keluarga" style="display: inline-block;">
                                <div style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <img src="" id="ttd_penolakan_keluarga">
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_keluarga" name="penolakan_ttd_keluarga" value="">
                                    <input type="text" name="nama_penolakan_keluarga" id="nama_penolakan_keluarga" class="form-control mt-2" placeholder="Nama Keluarga" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">2. Perawat</div>
                            <div id="signature-pad-penolakan-perawat" style="display: inline-block;">
                                <div style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <img src="" id="ttd_penolakan_perawat">
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_perawat" name="penolakan_ttd_perawat" value="">
                                    <input type="text" name="nama_penolakan_perawat" id="nama_penolakan_perawat" class="form-control mt-2" placeholder="Nama Perawat" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
