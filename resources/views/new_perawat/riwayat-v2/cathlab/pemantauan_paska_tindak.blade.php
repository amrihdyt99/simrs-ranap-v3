<div class="container">
    <h3>Catatan Keperawatan Paska Kateterisasi/ Angiiografi/Angioplasti</h3>
    <h6>*) diisi oleh perawat cathlab</h6>
    <h5>Serah Terima Antar Perawat</h5>
    <strong>Situation:</strong>
    <form id="paska_tindakan">
    <div class="form-group">
        <label for="dokter_yang_merawat">Dokter yang Merawat:</label>
        <input type="text" class="form-control" id="dokter_yang_merawat" name="dokter_yang_merawat" value="" disabled>
    </div>
    <div class="form-group">
        <label for="diagnosa_medis">Diagnosa Medis:</label>
        <input type="text" class="form-control" id="diagnosa_medis" name="diagnosa_medis" value="" disabled>
    </div>
    <div class="form-group">
        <label for="masalah_keperawatan">Masalah Keperawatan:</label>
        <input type="text" class="form-control" id="masalah_keperawatan" name="masalah_keperawatan" value="" disabled>
    </div>

    <h5>Background</h5>
    <div class="form-group">
        <label for="prosedur_yang_dilakukan">Prosedur yang Dilakukan:</label>
        <input type="text" class="form-control" id="prosedur_yang_dilakukan" name="prosedur_yang_dilakukan" value="" disabled>
    </div>
    <div class="form-group">
        <label for="hasil_prosedur">Hasil Prosedur:</label>
        <input type="text" class="form-control" id="hasil_prosedur" name="hasil_prosedur" value="" disabled>
    </div>
    <div class="form-group">
        <label for="keadaan_umum">Keadaan Umum:</label>
        <select class="form-control" id="keadaan_umum" name="keadaan_umum" disabled>
            <option value="Baik">Baik</option>
            <option value="Sedang">Sedang</option>
            <option value="Buruk">Buruk</option>
        </select>
    </div>
    <div class="form-group">
        <label for="gcs">GCS:</label>
        <input type="text" class="form-control" id="gcs" name="gcs" value="" disabled>
    </div>
    <div class="form-group">
        <label for="pupil_reaksi_kanan">Pupil Reaksi Kanan:</label>
        <input type="text" class="form-control" id="pupil_reaksi_kanan" name="pupil_reaksi_kanan" value="" disabled>
    </div>
    <div class="form-group">
        <label for="pupil_reaksi_kiri">Pupil Reaksi Kiri:</label>
        <input type="text" class="form-control" id="pupil_reaksi_kiri" name="pupil_reaksi_kiri" value="" disabled>
    </div>
    <div class="form-group">
        <label for="td">Tekanan Darah:</label>
        <input type="text" class="form-control" id="td" name="td" value="" disabled>
    </div>
    <div class="form-group">
        <label for="nadi">Nadi:</label>
        <input type="text" class="form-control" id="nadi_val" name="nadi" value="" disabled>
    </div>
    <div class="form-group">
        <label for="rr">Respiratory Rate:</label>
        <input type="text" class="form-control" id="rr" name="rr" value="" disabled>
    </div>
    <div class="form-group">
        <label for="suhu">Suhu:</label>
        <input type="text" class="form-control" id="suhu_val" name="suhu" value="" disabled>
    </div>
    <div class="form-group">
        <label for="spo2">SPO2:</label>
        <input type="text" class="form-control" id="spo2" name="spo2" value="" disabled>
    </div>
    <div class="form-group">
        <label for="skala_nyeri">Skala Nyeri:</label>
        <input type="text" class="form-control" id="skala_nyeri_val" name="skala_nyeri" value="" disabled>
    </div>
    <div class="form-group">
        <label for="akses">Akses:</label><br>
        <input type="checkbox" id="akses_radialis_kanan" name="akses[]" value="Radialis Kanan" disabled>
        <label for="akses_radialis_kanan">Radialis Kanan</label><br>
        <input type="checkbox" id="akses_radialis_kiri" name="akses[]" value="Radialis Kiri" disabled>
        <label for="akses_radialis_kiri">Radialis Kiri</label><br>
        <input type="checkbox" id="akses_femoralis_kanan" name="akses[]" value="Femoralis Kanan" disabled>
        <label for="akses_femoralis_kanan">Femoralis Kanan</label><br>
        <input type="checkbox" id="akses_femoralis_kiri" name="akses[]" value="Femoralis Kiri" disabled>
        <label for="akses_femoralis_kiri">Femoralis Kiri</label><br>
        <input type="checkbox" id="akses_femoralis_lainnya" name="akses[]" value="Femoralis Kanan" disabled>
        <label for="akses_femoralis_lainnya">Lainnya</label><br>
        <input type="text" id="akses_femoralis_lainnya_val" class="form-control" name="akses_femoralis_text" value="" disabled><br>
    </div>

    <div class="form-group">
        <label for="sheat_aff">Sheath Dilepas ?</label>
        <select class="form-control" id="sheat_aff" name="sheat_aff" disabled>
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
        </select>
    </div>

    <div class="form-group">
        <label for="teknik_hemostasis">Teknik Hemostasis:</label><br>
        <input type="checkbox" id="teknik_hemostasis_manual" name="teknik_hemostasis[]" value="Manual" disabled>
        <label for="teknik_hemostasis_manual">Manual</label><br>
        <input type="checkbox" id="teknik_hemostasis_radial_band" name="teknik_hemostasis[]" value="Radial Band" disabled>
        <label for="teknik_hemostasis_radial_band">Radial Band</label><br>
        <input type="checkbox" id="teknik_hemostasis_isi_balon" value="Isi Balon" name="teknik_hemostasis[]" disabled/>
        <label for="teknik_hemostasis_isi_balon">Isi Balon</label>
    </div>
    <div class="form-group">
        <label for="teknik_hemostasis_lainnya">Teknik Hemostasis Lainnya:</label>
        <input type="text" class="form-control" id="teknik_hemostasis_lainnya" name="teknik_hemostasis_text" value="" disabled>
    </div>

    <div class="form-group">
        <label for="komplikasi">Komplikasi:</label>
        <input type="text" class="form-control" id="komplikasi" name="komplikasi" value="" disabled>
    </div>

    <div class="form-group">
        <label for="total_kontras">Total Kontras:</label>
        <input type="text" class="form-control" id="total_kontras" name="total_kontras" value="" disabled>
    </div>

    <h5>Diet</h5>
    <div class="form-group">
        <input type="checkbox" id="diet_oral" name="diet[]" value="Oral" disabled>
        <label for="diet_oral">Oral</label><br>
        <input type="checkbox" id="diet_ngt" name="diet[]" value="NGT" disabled>
        <label for="diet_ngt">NGT</label><br>
        <input type="checkbox" id="diet_khusus" name="diet[]" value="Diet Khusus" disabled>
        <label for="diet_khusus">Diet Khusus</label><br>
        <input type="text" id="diet_khusus" name="diet_khusus_text" class="form-control" value="" disabled />
    </div>

    <div class="form-group">
        <label for="bab">BAB:</label>
        <input type="text" class="form-control" id="bab" name="bab" value="" disabled>
    </div>
    <div class="form-group">
        <label for="bak">BAK:</label>
        <input type="text" class="form-control" id="bak" name="bak" value="" disabled>
    </div>

    <h5>Mobilisasi</h5>
    <div class="form-group">
        <input type="checkbox" id="mobilisasi_jalan" name="mobilisasi[]" value="Jalan" disabled>
        <label for="mobilisasi_jalan">Jalan</label><br>
        <input type="checkbox" id="mobilisasi_duduk" name="mobilisasi[]" value="Duduk" disabled>
        <label for="mobilisasi_duduk">Duduk</label><br>
        <input type="checkbox" id="mobilisasi_tirah_baring" name="mobilisasi[]" value="Tirah Baring" disabled>
        <label for="mobilisasi_tirah_baring">Tirah Baring</label><br>
    </div>

    <div class="form-group">
        <label for="hal_istimewa_pasien">Hal Istimewa Pasien:</label>
        <textarea class="form-control" id="hal_istimewa_pasien" name="hal_istimewa_pasien" rows="3" disabled></textarea>
    </div>

    <div class="form-group">
        <label for="assessment">Assessment:</label>
        <textarea class="form-control" id="assessment" name="assessment" rows="3" disabled></textarea>
    </div>

    <div class="form-group">
        <label for="recommendations">Recommendations:</label><br>
        <input type="checkbox" id="recommendations_istirahat" name="recommendations[]" value="Istirahat" disabled>
        <label for="recommendations_istirahat">Istirahat</label><br>
        <input type="checkbox" id="recommendations_jangan_menekuk_kaki" name="recommendations[]" value="Jangan Menekuk Kaki Kanan" disabled>
        <label for="recommendations_jangan_menekuk_kaki">Jangan Menekuk Kaki Kanan</label><br>
        <input type="checkbox" id="recommendations_observasi_distal" name="recommendations[]" value="Observasi Distal" disabled>
        <label for="recommendations_observasi_distal">Observasi Distal</label><br>
        <input type="checkbox" id="recommendations_observasi_td" name="recommendations[]" value="Observasi Tekanan Darah" disabled>
        <label for="recommendations_observasi_td">Observasi Tekanan Darah</label><br>
    </div>
    </form>
</div>
