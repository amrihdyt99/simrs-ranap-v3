<form id="case_manager_form">
    <input type="hidden" class="form-control" name="reg_no" value="" disabled>
    <input type="hidden" class="form-control" name="med_rec" value="" disabled>
    <input type="hidden" class="form-control" name="username" value="" disabled>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">I. Identifikasi Masalah/Resiko dan Skrining Pasien</h5>
            <div class="form-group">
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_1" name="identifikasi_masalah[]" value="1" disabled>
                    <label class="custom-control-label" for="identifikasi_1">
                        Usia neonatus (0-28 hari)/lansia (60 tahun keatas)
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_2" name="identifikasi_masalah[]" value="2" disabled>
                    <label class="custom-control-label" for="identifikasi_2">
                        Fungsi kognitif rendah/riwayat gangguan mental
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_3" name="identifikasi_masalah[]" value="3" disabled>
                    <label class="custom-control-label" for="identifikasi_3">
                        Status fungsional/kemandirian hidup rendah
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_4" name="identifikasi_masalah[]" value="4" disabled>
                    <label class="custom-control-label" for="identifikasi_4">
                        Isu sosial seperti terlantar/narapidana/NAPZA/upaya bunuh diri/tinggal sendiri/kurang support sistem
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_5" name="identifikasi_masalah[]" value="5" disabled>
                    <label class="custom-control-label" for="identifikasi_5">
                        Potensi kendala biaya/perkiraan biaya tinggi/LOS lama/over utilization pelayanan terhadap dasar panduan
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_6" name="identifikasi_masalah[]" value="6" disabled>
                    <label class="custom-control-label" for="identifikasi_6">
                        Penyakit terminal/ratalaksana oleh >1 DPJP
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_7" name="identifikasi_masalah[]" value="7" disabled>
                    <label class="custom-control-label" for="identifikasi_7">
                        Riwayat readmisi/medical shopping
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_8" name="identifikasi_masalah[]" value="8" disabled>
                    <label class="custom-control-label" for="identifikasi_8">
                        Potensi penggunaan alat medis menetap jangka lama/Discharge planning
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_9" name="identifikasi_masalah[]" value="9" disabled>
                    <label class="custom-control-label" for="identifikasi_9">
                        Potensi penundaan pelayanan/tingkat asuhan tidak sesuai panduan
                    </label>
                </div>
                <div class="custom-control custom-checkbox mb-3 ml-3">
                    <input type="checkbox" class="custom-control-input" id="identifikasi_10" name="identifikasi_masalah[]" value="10" disabled>
                    <label class="custom-control-label" for="identifikasi_10">
                        Potensi komplain tinggi/ketidakpatuhan tinggi
                    </label>
                </div>
            </div>

            <h5 class="card-title mb-3">II. Assesment untuk management pelayanan pasien</h5>
            <div class="form-group">
                <label class="ml-3" for="keadaan_fungsional">1. Keadaan fungsional, kemandirian, kognitif</label>
                <input type="text" class="form-control ml-4" id="keadaan_fungsional" name="keadaan_fungsional" value="" disabled>
                <label class="ml-3" for="riwayat_kesehatan">2. Riwayat Kesehatan</label>
                <input type="text" class="form-control ml-4" id="riwayat_kesehatan" name="riwayat_kesehatan" value="" disabled>
                <label class="ml-3" for="perilaku_psiko_sosial">3. Perilaku psiko sosial kultural</label>
                <input type="text" class="form-control ml-4" id="perilaku_psiko_sosial" name="perilaku_psiko_sosial" value="" disabled>
                <label class="ml-3" for="masalah_isu_sosial">4. Masalah isu sosial</label>
                <input type="text" class="form-control ml-4" id="masalah_isu_sosial" name="masalah_isu_sosial" value="" disabled>
                <label class="ml-3" for="kendala_pembiayaan">5. Kendala pembiayaan</label>
                <input type="text" class="form-control ml-4" id="kendala_pembiayaan" name="kendala_pembiayaan" value="" disabled>
                <label class="ml-3" for="kebutuhan_discharge">6. Kebutuhan Discharge Planning</label>
                <input type="text" class="form-control ml-4" id="kebutuhan_discharge" name="kebutuhan_discharge" value="" disabled>
                <label class="ml-3" for="potensi_penundaan">7. Potensi penundaan pelayanan/tingkat asuhan tidak sesuai panduan</label>
                <input type="text" class="form-control ml-4" id="potensi_penundaan" name="potensi_penundaan" value="" disabled>
                <label class="ml-3" for="potensi_komplain">8. Potensi komplain tinggi/ketidakpatuhan tinggi</label>
                <input type="text" class="form-control ml-4" id="potensi_komplain" name="potensi_komplain" value="" disabled>
            </div>

            <h5 class="card-title mb-3">III. Perencanaan managemen pelayanan pasien</h5>
            <div class="form-group">
                <input type="text" class="form-control ml-4" id="perencanaan_manegemen" name="perencanaan_manegemen" value="" disabled>
            </div>
            <h5 class="card-title mb-3">IV. Target hasil</h5>
            <div class="form-group">
                <input type="text" class="form-control ml-4" id="target_hasil" name="target_hasil" value="" disabled>
            </div>

            <h5>Note :</h5>
            <label for="">> Point I Diisi dengan CheckList, apabila terdapat =5 kriteria terpenuhi, masuk ke pengelolaan case manager selanjutnya(Point II dan Form B) </label>

            <div class="form-group">
                <table class="w-100" id="riwayatcase_manager_ttd" style="border: 1px solid #000;">
                    <tr>
                        <td colspan="3" class="text-right" style="border: 1px solid #000;">
                            <div class="form-inline justify-content-end">
                                <label for="tanggal_ttd" class="mr-2">Tanggal:</label>
                                <input type="datetime-local" class="form-control form-control-sm" id="tanggal_ttd_asses" name="tanggal_ttd" value="" disabled>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td style="border: 1px solid #000;">
                            <p>Perawat</p>
                            <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                                <img id="riwayat_case_ttd_perawat" width="260" height="160" src="" alt="Tanda Tangan Perawat">
                            </div>
                            <input type="hidden" name="ttd_perawat" id="ttd_perawat" value="">
                        </td>
                        <td style="border: 1px solid #000;">
                            <p>Pasien</p>
                            <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                                <img id="riwayat_case_ttd_pasien" width="260" height="160" src="" alt="Tanda Tangan Pasien">
                            </div>
                            <input type="hidden" name="ttd_pasien" id="ttd_pasien" value="">
                        </td>
                        <td style="border: 1px solid #000;">
                            <p>Saksi/Wali</p>
                            <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                                <img id="riwayat_case_ttd_saksi" width="260" height="160" src="" alt="Tanda Tangan Saksi/Wali">
                            </div>
                            <input type="hidden" name="ttd_saksi" id="ttd_saksi" value="">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;" name="perawat_name" id="nama_perawat_asses" placeholder="Nama Perawat" value="" disabled>
                        </td>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;" name="pasien_name" id="nama_pasien_asses" placeholder="Nama Pasien" value="" disabled>
                        </td>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;" name="saksi_name" id="nama_saksi_asses" placeholder="Nama Saksi/Wali" value="" disabled>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
