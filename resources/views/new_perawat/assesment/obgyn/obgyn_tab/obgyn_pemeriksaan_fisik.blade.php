<div class="form-group row">
    <div class="col-sm-2">
        <h4><b>ALERGI</b></h4>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak" name="alergi">
            <label class="custom-control-label" for="alergi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_ya" name="alergi">
            <label class="custom-control-label" for="alergi_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak_tahu" name="alergi">
            <label class="custom-control-label" for="alergi_tidak_tahu">Tidak tahu</label>
        </div>
    </div>
</div>
 

<h5>Bila ya :</h5>
<div class="form-group row">
    <div class="col-sm-2 mt-2">
        <label for="alergi_obat">Alergi obat</label>
    </div>
    <div class="col-sm-10 mt-2">
        <input type="text" id="alergi_obat" name="alergi_obat" class="form-control" placeholder="Nama obat..">
    </div>
    <div class="col-sm-2 mt-2">
        <label for="bentuk_reaksi_obat">Bentuk reaksi</label>
    </div>
    <div class="col-sm-10 mt-2">
        <input type="text" id="bentuk_reaksi_obat" name="bentuk_reaksi_obat" class="form-control" placeholder="Bentuk reaksi..">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">
        <label for="alergi_makanan">Alergi makanan</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_makanan" name="alergi_makanan" class="form-control" placeholder="Nama makanan..">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_makanan">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_makanan" name="bentuk_reaksi_makanan" class="form-control" placeholder="Bentuk reaksi..">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">  
        <label for="alergi_lainnya">Alergi lainnya</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_lainnya" name="alergi_lainnya" class="form-control" placeholder="Nama lainnya..">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_lainnya">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_lainnya" name="bentuk_reaksi_lainnya" class="form-control" placeholder="Bentuk reaksi lainnya..">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Diberitahukan kepada</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dokter" name="diberitahukan" value="dokter">
            <label class="custom-control-label" for="diberitahukan_dokter">Dokter</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_farmasis" name="diberitahukan" value="farmasis">
            <label class="custom-control-label" for="diberitahukan_farmasis">Farmasis (apoteker)</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dietisien" name="diberitahukan" value="dietisien">
            <label class="custom-control-label" for="diberitahukan_dietisien">Dietisien</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_ya" name="diberitahukan" value="ya">
            <label class="custom-control-label" for="diberitahukan_ya">Ya, Pukul</label>
        </div>
        <input type="time" id="diberitahukan_pukul" name="diberitahukan_pukul" class="form-control mr-3" style="width: 100px;">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_tidak" name="diberitahukan" value="tidak">
            <label class="custom-control-label" for="diberitahukan_tidak">Tidak</label>
        </div>
    </div>
</div>

<h4><b>KEADAAN UMUM</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Kesadaran</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_compos_mentis" name="kesadaran">
            <label class="custom-control-label" for="kesadaran_compos_mentis">Compos mentis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_delirium" name="kesadaran">
            <label class="custom-control-label" for="kesadaran_delirium">Delirium</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_somnolen" name="kesadaran">
            <label class="custom-control-label" for="kesadaran_somnolen">Somnolen</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_sopor" name="kesadaran">
            <label class="custom-control-label" for="kesadaran_sopor">Sopor</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_koma" name="kesadaran">
            <label class="custom-control-label" for="kesadaran_koma">Koma</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Kondisi Umum</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_baik" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_baik">Baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_tampak_sakit" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_tampak_sakit">Tampak sakit</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_sesak" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_sesak">Sesak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_pucat" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_pucat">Pucat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lemah" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_lemah">Lemah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lainnya" name="kondisi_umum">
            <label class="custom-control-label" for="kondisi_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kondisi_lainnya_text" name="kondisi_lainnya_text" placeholder="lainnya.." class="form-control">
    </div>
</div>

<div class="form-group mt-3 row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <label for="tekanan_darah">Tekanan Darah</label>
        <div class="input-group">
            <input type="number" id="tekanan_darah" name="tekanan_darah" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">mmHg</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="nadi">Nadi</label>
        <div class="input-group">
            <input type="number" id="nadi" name="nadi" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="suhu">Suhu</label>
        <div class="input-group">
            <input type="number" id="suhu" name="suhu" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">°C</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="pernafasan">Pernafasan</label>
        <div class="input-group">
            <input type="number" id="pernafasan" name="pernafasan" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group mt-3 row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <label for="tinggi_badan">Tinggi badan</label>
        <div class="input-group">
            <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">cm</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="berat_badan">Berat badan</label>
        <div class="input-group">
            <input type="number" id="berat_badan" name="berat_badan" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">kg</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kebutuhan Khusus</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tidak_ada" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_alat_bantu_dengar" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_alat_bantu_dengar">Alat bantu dengar</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_kaca_mata" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_kaca_mata">Kaca mata</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tongkat" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_tongkat">Tongkat</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_gigi_palsu" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_gigi_palsu">Gigi palsu</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_lainnya" name="kebutuhan_khusus">
            <label class="custom-control-label" for="kebutuhan_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kebutuhan_lainnya_text" name="kebutuhan_lainnya_text" placeholder="lainnya.." class="form-control">
    </div>
</div>

<h4 class="mt-3"><b>DATA PSIKOLOGIS, SOSIAL, EKONOMI DAN SPIRITUAL</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="status_emosional">Status emosional</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_stabil" name="status_emosional">
            <label class="custom-control-label" for="status_stabil">Stabil/tenang</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_cemas" name="status_emosional">
            <label class="custom-control-label" for="status_cemas">Cemas/Takut</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_marah" name="status_emosional">
            <label class="custom-control-label" for="status_marah">Marah</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_sedih" name="status_emosional">
            <label class="custom-control-label" for="status_sedih">Sedih</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_lainnya" name="status_emosional">
            <label class="custom-control-label" for="status_lainnya">Lainnya</label>
        </div>
        <input type="text" id="status_lainnya_text" name="status_lainnya_text" placeholder="lainnya.." class="form-control">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1">
        <label for="kebiasaan">Kebiasaan</label>
    </div>
    <div class="col-sm-1">
        <label for="merokok">Merokok</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="merokok_tidak" name="merokok" value="Tidak">
            <label class="custom-control-label" for="merokok_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="merokok_ya" name="merokok" value="Ya">
            <label class="custom-control-label" for="merokok_ya">Ya</label>
            <div class="input-group ml-2">
                <input type="text" id="frekuensi_merokok" name="frekuensi_merokok" class="form-control" style="width: 60px;">
                <div class="input-group-append">
                    <span class="input-group-text bg-primary text-white" style="padding: 5px;">batang/hari</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1">
        <label for=""></label>
    </div>
    <div class="col-sm-1">
        <label for="minuman_alkohol">Minuman Alkohol</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="alkohol_tidak" name="minuman_alkohol" value="Tidak">
            <label class="custom-control-label" for="alkohol_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="alkohol_ya" name="minuman_alkohol" value="Ya">
            <label class="custom-control-label" for="alkohol_ya">Ya</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <label for="riwayat_gangguan_jiwa">Riwayat pernah mengalami gangguan jiwa di masa lalu</label>
    </div>
    <div class="col-sm-5">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="gangguan_jiwa_tidak" name="riwayat_gangguan_jiwa" value="Tidak">
            <label class="custom-control-label" for="gangguan_jiwa_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="gangguan_jiwa_ya" name="riwayat_gangguan_jiwa" value="Ya">
            <label class="custom-control-label" for="gangguan_jiwa_ya">Ya</label>
        </div>
    </div>
</div>

<table class="table1 w-100">
    <thead>
        <tr>
            <th>No</th>
            <th width="700px" class="text-center">Parameter</th>
            <th>Skor: Ya(1) tidak(0)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sex ( laki-laki )</td>
            <td>
                <input type="radio" id="sex_ya" name="sex" value="1">
                <label for="sex_ya">Ya</label>
                <input type="radio" id="sex_tidak" name="sex" value="0">
                <label for="sex_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Age ( < 19 th atau > 45 th )</td>
            <td>
                <input type="radio" id="age_ya" name="age" value="1">
                <label for="age_ya">Ya</label>
                <input type="radio" id="age_tidak" name="age" value="0">
                <label for="age_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Depresi ( pasien MRS dengan depresi atau penurunan konsentrasi, gangguan tidur, gangguan pola makan, dan gangguan libido )</td>
            <td>
                <input type="radio" id="depresi_ya" name="depresi" value="1">
                <label for="depresi_ya">Ya</label>
                <input type="radio" id="depresi_tidak" name="depresi" value="0">
                <label for="depresi_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Previous Suicide ( riwayat bunuh diri atau perawatan psikiatri )</td>
            <td>
                <input type="radio" id="suicide_ya" name="suicide" value="1">
                <label for="suicide_ya">Ya</label>
                <input type="radio" id="suicide_tidak" name="suicide" value="0">
                <label for="suicide_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Excessive alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
            <td>
                <input type="radio" id="alcohol_ya" name="alcohol" value="1">
                <label for="alcohol_ya">Ya</label>
                <input type="radio" id="alcohol_tidak" name="alcohol" value="0">
                <label for="alcohol_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Rational thinking loss ( kehilangan pikiran rasional, psikosis, organic brain syndrome )</td>
            <td>
                <input type="radio" id="thinking_loss_ya" name="thinking_loss" value="1">
                <label for="thinking_loss_ya">Ya</label>
                <input type="radio" id="thinking_loss_tidak" name="thinking_loss" value="0">
                <label for="thinking_loss_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Separated ( bercerai / janda )</td>
            <td>
                <input type="radio" id="separated_ya" name="separated" value="1">
                <label for="separated_ya">Ya</label>
                <input type="radio" id="separated_tidak" name="separated" value="0">
                <label for="separated_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Organized plan ( menunjukan rencana bunuh diri yang terorganisir / niat serius )</td>
            <td>
                <input type="radio" id="organized_plan_ya" name="organized_plan" value="1">
                <label for="organized_plan_ya">Ya</label>
                <input type="radio" id="organized_plan_tidak" name="organized_plan" value="0">
                <label for="organized_plan_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>No Social Support ( tidak ada pendukung )</td>
            <td>
                <input type="radio" id="no_support_ya" name="no_support" value="1">
                <label for="no_support_ya">Ya</label>
                <input type="radio" id="no_support_tidak" name="no_support" value="0">
                <label for="no_support_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Sickness ( menderita penyakit kronis )</td>
            <td>
                <input type="radio" id="sickness_ya" name="sickness" value="1">
                <label for="sickness_ya">Ya</label>
                <input type="radio" id="sickness_tidak" name="sickness" value="0">
                <label for="sickness_tidak">Tidak</label>
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Skor Sad Person</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="skor_sad_person" readonly>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_rendah" name="kategori">
            <label class="custom-control-label" for="kategori_rendah">Rendah ( 1-2 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_sedang" name="kategori">
            <label class="custom-control-label" for="kategori_sedang">Sedang ( 3-6 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_tinggi" name="kategori">
            <label class="custom-control-label" for="kategori_tinggi">Tinggi ( 7 - 10 )</label>
        </div>
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Riwayat Keinginan dan Percobaan Bunuh Diri</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_tidak" name="riwayat_bunuh_diri">
            <label class="custom-control-label" for="riwayat_bunuh_diri_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_ya" name="riwayat_bunuh_diri">
            <label class="custom-control-label" for="riwayat_bunuh_diri_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="riwayat_bunuh_diri_text" placeholder="jika ya,jelaskan...">
    </div>
</div>

<div class="form-group row" style="margin-bottom: 0;">
    <div class="col-sm-2">
        <label for="">Riwayat Trauma psikis</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_tidak" name="riwayat_trauma_psikis">
            <label class="custom-control-label" for="riwayat_trauma_psikis_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_ya" name="riwayat_trauma_psikis">
            <label class="custom-control-label" for="riwayat_trauma_psikis_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_ada" name="riwayat_trauma_psikis">
            <label class="custom-control-label" for="riwayat_trauma_psikis_ada">Ada</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_fisik_psikologis_kdr" name="anayaa_fisik_psikologis_kdr">
            <label class="custom-control-label" for="anayaa_fisik_psikologis_kdr">Aniaya fisik / psikologis/ KDRT</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_seksual_perkosaan" name="anayaa_seksual_perkosaan">
            <label class="custom-control-label" for="anayaa_seksual_perkosaan">Aniaya Seksual/Perkosaan</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="tindakan_kriminal" name="tindakan_kriminal">
            <label class="custom-control-label" for="tindakan_kriminal">Tindakan Kriminal</label>
        </div>
        <input type="text" name="tindakan_kriminal_text" class="form-control" placeholder="tindakan kriminal....">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="lainnya" name="lainnya">
            <label class="custom-control-label" for="lainnya">Lainnya</label>
        </div>
        <input type="text" name="lainnya_text" class="form-control" placeholder="lainnya....">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Hambatan sosial dan ekonomi</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_tidak" name="hambatan_sosial_ekonomi">
            <label class="custom-control-label" for="hambatan_sosial_ekonomi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_ada" name="hambatan_sosial_ekonomi">
            <label class="custom-control-label" for="hambatan_sosial_ekonomi_ada">Ada</label>
        </div>
    </div>
</div>

<h5 class="mt-3">Kebutuhan spiritual pasien dalam perawatan di rumah sakit :</h5>
<div class="form-group row">
    <div class="col-sm-3">
        <label for="">Pasien membutuhkan konseling spiritual/agama :</label>
    </div>
    <div class="col-sm-7">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="konseling_spiritual_tidak" name="konseling_spiritual">
            <label class="custom-control-label" for="konseling_spiritual_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="konseling_spiritual_ya" name="konseling_spiritual">
            <label class="custom-control-label" for="konseling_spiritual_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="konseling_spiritual_text" placeholder="jika ya, jelaskan...">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="">Pasien membutuhkan bantuan dalam menjalankan ibadah dan menyetujuinya :</label>
    </div>
    <div class="col-sm-7">
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="bantuan_ibadah_tidak" name="bantuan_ibadah">
            <label class="custom-control-label" for="bantuan_ibadah_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="bantuan_ibadah_ya" name="bantuan_ibadah">
            <label class="custom-control-label" for="bantuan_ibadah_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="bantuan_ibadah_text" placeholder="jika ya, jelaskan...">
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT MENSTRUASI</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Umur menarche</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <input type="text" class="form-control mr-2" style="width: 100px;">
        <label for="" class="mr-2">tahun,</label>
        <input type="text" class="form-control mr-2" style="width: 100px;">
        <label for="" class="mr-2">lamanya haid</label>
        <input type="text" class="form-control mr-2" style="width: 100px;">
        <label for="" class="mr-2">hari, jumlah darah haid</label>
        <input type="text" class="form-control mr-2" style="width: 100px;">
        <label for="" class="mr-2">kali ganti pembalut</label>
    </div>
    <div class="col-sm-10">
        
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="">HPHT</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <input type="date" class="form-control mr-2" style="width: 130px;">
        <label for="">TP</label>
        <input type="date" class="form-control mr-2 ml-2" style="width: 130px;">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="">Gangguan Haid</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="dismenorhoe" name="dismenorhoe">
            <label class="custom-control-label" for="dismenorhoe">Dismenorhoe</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="spotting" name="spotting">
            <label class="custom-control-label" for="spotting">Spotting</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="menorragia" name="menorragia">
            <label class="custom-control-label" for="menorragia">Menorragia</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="metrorhagia" name="metrorhagia">
            <label class="custom-control-label" for="metrorhagia">Metrorhagia</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="pre_menstruasi_syndrome" name="pre_menstruasi_syndrome">
            <label class="custom-control-label" for="pre_menstruasi_syndrome">Pre menstruasi syndrome</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="lainnya" name="lainnya">
            <label class="custom-control-label" for="lainnya">Lainnya</label>
        </div>
        <input type="text" class="form-control" name="lainnya_text" placeholder="lainnya....">
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT PERKAWINAN</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Status Perkawinan</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kawin" name="status_kawin">
            <label class="custom-control-label" for="kawin">Kawin, usia perkawinan</label>
            <input type="text" class="form-control ml-2" name="usia_perkawinan" placeholder="usia perkawinan...." style="width: 100px;">
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="belum_kawin" name="status_kawin">
            <label class="custom-control-label" for="belum_kawin">Belum Kawin</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="janda" name="status_kawin">
            <label class="custom-control-label" for="janda">Janda</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Jumlah Perkawinan</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="1x" name="jumlah_perkawinan">
            <label class="custom-control-label" for="1x">1x</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="2x" name="jumlah_perkawinan">
            <label class="custom-control-label" for="2x">2x</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id=">2x" name="jumlah_perkawinan">
            <label class="custom-control-label" for=">2x">>2x</label>
        </div>
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT KEHAMILAN, PERSALINAN DAN NIFAS YANG LALU</b></h4>
<input type="hidden" id="riwayat_kehamilan_data" value="">
<div class="btn-group mb-3">
    <button type="button" class="btn btn-warning btn-add-row" data-toggle="modal" data-target="#riwayat-kehamilan-modal">
        <i class="fa fa-plus"></i>
        Tambah Riwayat Kehamilan
    </button>
</div>
<div class="table-responsive">
    <table id="riwayat-kehamilan-table" class="w-100 table table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>Tgl/Tahun Partus</th>
            <th>Tempat Partus</th>
            <th>Umur Hamil</th>
            <th>Jenis Persalinan</th>
            <th>Penolong Persalinan</th>
            <th>Penyulit</th>
            <th>BB Anak</th>
            <th>Keadaan Sekarang</th>
        </tr>
    </thead>
        <tbody></tbody>
    </table>
</div>

<h4 class="mt-3"><b>SKRINING GIZI</b></h4>
<table class="table1 w-100">
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Skor</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 800px;"><b>1. Apakah asupan makan berkurang karena tidak nafsu makan ?</b></td>
            <td></td>
        </tr>
        <tr>
            <td>a. Tidak</td>
            <td>
                <input type="radio" id="tidak_1" name="asper_penurunan_bb_dewasa" value="0" class="gizi_dewasa">
                <label for="tidak_1">0</label>
            </td>
        </tr>
        <tr>
            <td>b. Ya</td>
            <td>
                <input type="radio" id="ya_1" name="asper_penurunan_bb_dewasa" value="1" class="gizi_dewasa">
                <label for="ya_1">1</label>
            </td>
        </tr>
        <tr>
            <td><b>2. Ada gangguan metabolisme ( DM, gangguan fungsi tiroid, infeksi kronis spt HIV/AIDS, TB, Lupus ), preeklamsia berat, eklampsia, hiperemesis ?</b></td>
            <td></td>
        </tr>
        <tr>
            <td>a. Tidak</td>
            <td>
                <input type="radio" id="tidak_2" name="asper_penurunan_nafsu_dewasa" value="0" class="gizi_dewasa">
                <label for="tidak_2">0</label>
            </td>
        </tr>
        <tr>
            <td>b. Ya</td>
            <td>
                <input type="radio" id="ya_2" name="asper_penurunan_nafsu_dewasa" value="1" class="gizi_dewasa">
                <label for="ya_2">1</label>
            </td>
        </tr>
        <tr>
            <td><b>3. Ada pertambahan BB yang kurang atau lebih selama kehamilan ?</b></td>
            <td></td>
        </tr>
        <tr>
            <td>a. Tidak</td>
            <td>
                <input type="radio" id="tidak_3" name="asper_pertambahan_bb_dewasa" value="0" class="gizi_dewasa">
                <label for="tidak_3">0</label>
            </td>
        </tr>
        <tr>
            <td>b. Ya</td>
            <td>
                <input type="radio" id="ya_3" name="asper_pertambahan_bb_dewasa" value="1" class="gizi_dewasa">
                <label for="ya_3">1</label>
            </td>
        </tr>
        <tr>
            <td><b>4. Nilai HB < 10 g/dl atau HCT < 30 % ?</b></td>
            <td></td>
        </tr>
        <tr>
            <td>a. Tidak</td>
            <td>
                <input type="radio" id="tidak_4" name="asper_nilai_hb_dewasa" value="0" class="gizi_dewasa">
                <label for="tidak_4">0</label>
            </td>
        </tr>
        <tr>
            <td>b. Ya</td>
            <td>
                <input type="radio" id="ya_4" name="asper_nilai_hb_dewasa" value="1" class="gizi_dewasa">
                <label for="ya_4">1</label>
            </td>
        </tr>
        <tr>
            <td class="float-left">Total Skor : <input type="text" name="asper_skor_dewasa" id="total_skor_dewasa" style="border: none" value="-" readonly></td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="a" name="kategori_gizi">
            <label class="custom-control-label" for="a">A : 0-1 = Status gizi baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="b" name="kategori_gizi">
            <label class="custom-control-label" for="b">B : 2-3 = beresiko malnutrisi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="c" name="kategori_gizi">
            <label class="custom-control-label" for="c">C : 4 = Risiko malnutrisi Tinggi</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Sudah dibaca dan diketahui oleh Dietisien</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="ya_dietisien" name="dietisien">
            <label class="custom-control-label" for="ya_dietisien">Ya, pukul</label>
            <input type="time" class="form-control ml-2" name="tanggal_dietisien" style="width: 100px;">
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="tidak_dietisien" name="dietisien">
            <label class="custom-control-label" for="tidak_dietisien">Tidak</label>
        </div>
    </div>
    <label class="ml-3" for="">Catatan: Pasien dengan <b>B dan C</b> dilakukan Asesmen Lanjut oleh dietisien</label>
</div>

<h4 class="mt-3"><b>SKRINING NYERI</b></h4>
<label for="">Skala Wong Baker</label>
<div class="row">

    <div class="col-sm-10" id="img_skala">
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/1.jpg') }}" class="img_skala"
                data-value="0" width="50px" height="55px" style="display: block;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
                class="img_skala" data-value="1" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
                class="img_skala" data-value="2" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
                class="img_skala" data-value="3" width="50px" height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala"
                data-value="4" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala"
                data-value="5" width="50px" height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/4.jpg') }}" class="img_skala"
                data-value="6" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
                data-value="7" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
                data-value="8" width="50px" height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
                data-value="9" width="50px" height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/6.jpg') }}" class="img_skala"
                data-value="10" width="50px" height="55px" style="display: none;" />
        </label>

        <div class="row">
            <div class="col">
                <div class="range-wrap" style="width: 300px; margin-left: 0">
                    <input type="range" class="range" id="nyeri_skala" name="nyeri_skala" min="0"
                        max="10" value="0" step="1" oninput="setSkala(this)" />
                    <br />
                    <label for=""></label>
                    <output class="bubble" for="fader" id="skala">0 TIDAK NYERI</output>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-sm-12">
            <table class="table1 w-100">
                <tbody>
                    <tr>
                        <td>O</td>
                        <td style="width: 200px;">(Onset) Kapan terjadi, berapa lama, dan berapa sering :
                        </td>
                        <td>
                        <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>P</td>
                        <td>(Provocating / Palliating) Pencetus nyeri:
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Q</td>
                        <td>(Quality) Tipe nyeri : 
                        </td>
                        <td>
                            <input type="checkbox" id="tekanan" name="skala_wong_baker">
                            <label for="tekanan">Tekanan</label>
                            <input type="checkbox" id="tajam_tusukan" name="skala_wong_baker">
                            <label for="tajam_tusukan">Tajam tusukan</label>
                            <input type="checkbox" id="mencengkeram" name="skala_wong_baker">
                            <label for="mencengkeram">Mencengkeram</label>
                            <input type="checkbox" id="melilit" name="skala_wong_baker">
                            <label for="melilit">Melilit</label>
                        </td>
                    </tr>
                    <tr>
                        <td>R</td>
                        <td>(Region) Menjalar :
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td>(Severity) skala nyeri :
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>T</td>
                        <td>(Treatment) :
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>U</td>
                        <td>(Understanding) :
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>V</td>
                        <td>(Value) :
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                </tbody>
            </table>
            <label for="">*) Catatan: Bila pasien tidak sadar maka gunakan formulir penilaian nyeri dengan Skala BPS ( Behavior Pain Scale )</label>
        </div>
    </div>
</div>

<h6 class="text-center"><b>Behavior Pain Scale</b></h6>
<table class="table1 w-100">
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Score 1</th>
            <th>Score 2</th>
            <th>Score 3</th>
            <th>Score 4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ekspresi wajah</td>
            <td>
                <input type="radio" id="ekspresi_wajah_1" name="ekspresi_wajah" value="1">
                <label for="ekspresi_wajah_1">Normal</label>
            </td>
            <td>
                <input type="radio" id="ekspresi_wajah_2" name="ekspresi_wajah" value="2">
                <label for="ekspresi_wajah_2">Mengencang sebagian (alis mengerut)</label>
            </td>
            <td>
                <input type="radio" id="ekspresi_wajah_3" name="ekspresi_wajah" value="3">
                <label for="ekspresi_wajah_3">Mengencang total (kelopak mata mengatup rapat)</label>
            </td>
            <td>
                <input type="radio" id="ekspresi_wajah_4" name="ekspresi_wajah" value="4">
                <label for="ekspresi_wajah_4">Meringis</label>
            </td>
        </tr>
        <tr>
            <td>Ekstremitas atas</td>
            <td>
                <input type="radio" id="ekstremitas_atas_1" name="ekstremitas_atas" value="1">
                <label for="ekstremitas_atas_1">Tidak ada pergerakan</label>
            </td>
            <td>
                <input type="radio" id="ekstremitas_atas_2" name="ekstremitas_atas" value="2">
                <label for="ekstremitas_atas_2">Tertekuk sebagian</label>
            </td>
            <td>
                <input type="radio" id="ekstremitas_atas_3" name="ekstremitas_atas" value="3">
                <label for="ekstremitas_atas_3">Tertekuk total dengan fleksi jari</label>
            </td>
            <td>
                <input type="radio" id="ekstremitas_atas_4" name="ekstremitas_atas" value="4">
                <label for="ekstremitas_atas_4">Retraksi permanen</label>
            </td>
        </tr>
        <tr>
            <td>Compliance terhadap ventilator</td>
            <td>
                <input type="radio" id="compliance_ventilator_1" name="compliance_ventilator" value="1">
                <label for="compliance_ventilator_1">Toleransi terhadap ventilator</label>
            </td>
            <td>
                <input type="radio" id="compliance_ventilator_2" name="compliance_ventilator" value="2">
                <label for="compliance_ventilator_2">Sesekali terbatuk, namun masih toleransi terhadap ventilator</label>
            </td>
            <td>
                <input type="radio" id="compliance_ventilator_3" name="compliance_ventilator" value="3">
                <label for="compliance_ventilator_3">Melawan ventilator</label>
            </td>
            <td>
                <input type="radio" id="compliance_ventilator_4" name="compliance_ventilator" value="4">
                <label for="compliance_ventilator_4">Tidak dapat mengendalikan pola napas</label>
            </td>
        </tr>
    </tbody>
</table>
<div class="form-group row">   
    <div class="col-sm-12 d-flex align-items-center">
        <label>Skor Total Behavior Pain Scale : </label><input type="text" class="form-control ml-2" style="width: 100px;" name="skor_total_bps" id="skor_total_bps" value="-" readonly>
    </div>
</div>

<h4 class="mt-5"><b>SKRINING STATUS FUNGSIONAL</b></h4>
<label class="text-center">PENILAIAN ACTIVITY OF DAILY LIVING (ADL) DENGAN INSTRUMENT INDEKS BATHEL MODIFIKASI</label>
<<table class="table1 w-100">
    <thead>
        <tr>
            <th>NO</th>
            <th>FUNGSI</th>
            <th>SKOR</th>
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">1</td>
            <td rowspan="3">Mengendalikan rangsang BAB</td>
            <td>0</td>
            <td>
                <input type="radio" id="bab_0" name="bab" value="0">
                <label for="bab_0">Tidak terkendali/tak teratur (perlu pencahar)</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bab_1" name="bab" value="1">
                <label for="bab_1">Kadang-kadang tak terkendali (1 x / minggu)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bab_2" name="bab" value="2">
                <label for="bab_2">Terkendali teratur</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">2</td>
            <td rowspan="3">Mengendalikan rangsang BAK</td>
            <td>0</td>
            <td>
                <input type="radio" id="bak_0" name="bak" value="0">
                <label for="bak_0">Tak terkendali atau pakai kateter</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bak_1" name="bak" value="1">
                <label for="bak_1">Kadang-kadang tak terkendali (hanya 1 x / 24 jam)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bak_2" name="bak" value="2">
                <label for="bak_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">Membersihkan diri (seka, sisir, sikat gigi)</td>
            <td>0</td>
            <td>
                <input type="radio" id="membersihkan_diri_0" name="membersihkan_diri" value="0">
                <label for="membersihkan_diri_0">Butuh pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="membersihkan_diri_1" name="membersihkan_diri" value="1">
                <label for="membersihkan_diri_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">4</td>
            <td rowspan="3">Penggunaan WC (in/out, lepas/pakai celana, siram)</td>
            <td>0</td>
            <td>
                <input type="radio" id="wc_0" name="wc" value="0">
                <label for="wc_0">Tergantung pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="wc_1" name="wc" value="1">
                <label for="wc_1">Perlu pertolongan pada beberapa kegiatan tetapi dapat mengerjakan sendiri beberapa kegiatan yang lain</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="wc_2" name="wc" value="2">
                <label for="wc_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">5</td>
            <td rowspan="3">Makan minum (jika makan harus berupa potongan, dianggap dibantu)</td>
            <td>0</td>
            <td>
                <input type="radio" id="makan_minum_0" name="makan_minum" value="0">
                <label for="makan_minum_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="makan_minum_1" name="makan_minum" value="1">
                <label for="makan_minum_1">Perlu ditolong memotong makanan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="makan_minum_2" name="makan_minum" value="2">
                <label for="makan_minum_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">6</td>
            <td rowspan="4">Bergerak dari kursi roda ke tempat tidur dan sebaliknya (termasuk duduk di tempat tidur)</td>
            <td>0</td>
            <td>
                <input type="radio" id="bergerak_0" name="bergerak" value="0">
                <label for="bergerak_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bergerak_1" name="bergerak" value="1">
                <label for="bergerak_1">Perlu banyak bantuan untuk bisa duduk (2 orang)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bergerak_2" name="bergerak" value="2">
                <label for="bergerak_2">Bantuan minimal 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="bergerak_3" name="bergerak" value="3">
                <label for="bergerak_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">7</td>
            <td rowspan="4">Berjalan di tempat rata (atau jika tidak bisa berjalan, menjalankan kursi roda)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berjalan_0" name="berjalan" value="0">
                <label for="berjalan_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berjalan_1" name="berjalan" value="1">
                <label for="berjalan_1">Bisa (pindah) dengan kursi roda</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berjalan_2" name="berjalan" value="2">
                <label for="berjalan_2">Berjalan dengan bantuan 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="berjalan_3" name="berjalan" value="3">
                <label for="berjalan_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">8</td>
            <td rowspan="3">Berpakaian (termasuk memasang tali sepatu, mengencangkan sabuk)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berpakaian_0" name="berpakaian" value="0">
                <label for="berpakaian_0">Tergantung orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berpakaian_1" name="berpakaian" value="1">
                <label for="berpakaian_1">Sebagian dibantu (mis: mengancing baju)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berpakaian_2" name="berpakaian" value="2">
                <label for="berpakaian_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">9</td>
            <td rowspan="3">Naik turun tangga</td>
            <td>0</td>
            <td>
                <input type="radio" id="tangga_0" name="tangga" value="0">
                <label for="tangga_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="tangga_1" name="tangga" value="1">
                <label for="tangga_1">Butuh pertolongan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="tangga_2" name="tangga" value="2">
                <label for="tangga_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">10</td>
            <td rowspan="2">Mandi</td>
            <td>0</td>
            <td>
                <input type="radio" id="mandi_0" name="mandi" value="0">
                <label for="mandi_0">Tergantung orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="mandi_1" name="mandi" value="1">
                <label for="mandi_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4" class="d-flex align-items-center">
                <label for="total_adl" class="mr-2">Total Skor ADL</label>
                <input type="text" id="total_adl" class="form-control" name="total_skor_adl" value="0" readonly style="width: 100px;">
            </td>
        </tr>
    </tbody>
</table>

<div class="row mt-3">
    <div class="col-sm-4">
        <table class="table1">
            <thead>
                <tr>
                    <th colspan="2">Skor Modifikasi Barthel Indeks (Nilai AKS):</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>20</td>
                    <td>Mandiri (A)</td>
                </tr>
                <tr>
                    <td>12-19</td>
                    <td>Ketergantungan ringan (B)</td>
                </tr>
                <tr>
                    <td>9-11 </td>
                    <td>Ketergantungan sedang (B)</td>
                </tr>
                <tr>
                    <td>5-8</td>
                    <td>Ketergantungan berat (C)</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-8">
        <label for="">Kategori I : Perawatan Minimal (self care), memerlukan waktu 1 - 2 jam / 24
            jam</label>
        <label for="">Kategori II : Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu
            3 - 4 jam / 24 jam</label>
        <label for="">Kategori III : Kriteria Perawatan Maksimal ( Total Care / Intensif Care),
            memerlukan waktu 5 - 6 jam / 24 jam</label>
    </div>
</div>

<h4 class="mt-5"><b>PENGKAJIAN KULIT</b></h4>
<table class="table1 w-100">
    <thead>
        <tr>
            <th class="text-center" width="20">No</th>
            <th class="text-center">Parameter</th>
            <th class="text-center">Skor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><b>PERSEPSI SENSORI</b><br>Kemampuan untuk merespon ketidaknyamanan tekanan</td>
            <td>
                <input type="radio" name="persepsi_sensori" value="1" id="persepsi_sensori_1">
                <label for="persepsi_sensori_1">(1) Tidak berespon</label><br>
                <input type="radio" name="persepsi_sensori" value="2" id="persepsi_sensori_2">
                <label for="persepsi_sensori_2">(2) Sangat terbatas</label><br>
                <input type="radio" name="persepsi_sensori" value="3" id="persepsi_sensori_3">
                <label for="persepsi_sensori_3">(3) Sedikit terbatas</label><br>
                <input type="radio" name="persepsi_sensori" value="4" id="persepsi_sensori_4">
                <label for="persepsi_sensori_4">(4) Tidak ada gangguan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>KELEMBABAN</b><br>Sejauh mana kulit terpapar kelembaban</td>
            <td>
                <input type="radio" name="kelembaban" value="1" id="kelembaban_1">
                <label for="kelembaban_1">(1) Kelembaban konstan</label><br>
                <input type="radio" name="kelembaban" value="2" id="kelembaban_2">
                <label for="kelembaban_2">(2) Sering lembab</label><br>
                <input type="radio" name="kelembaban" value="3" id="kelembaban_3">
                <label for="kelembaban_3">(3) Kadang lembab</label><br>
                <input type="radio" name="kelembaban" value="4" id="kelembaban_4">
                <label for="kelembaban_4">(4) Jarang lembab</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>AKTIVITAS</b><br>Tingkat aktivitas fisik</td>
            <td>
                <input type="radio" name="aktivitas" value="1" id="aktivitas_1">
                <label for="aktivitas_1">(1) Tergeletak di tempat tidur</label><br>
                <input type="radio" name="aktivitas" value="2" id="aktivitas_2">
                <label for="aktivitas_2">(2) Tidak bisa berjalan</label><br>
                <input type="radio" name="aktivitas" value="3" id="aktivitas_3">
                <label for="aktivitas_3">(3) Berjalan pada jarak terbatas</label><br>
                <input type="radio" name="aktivitas" value="4" id="aktivitas_4">
                <label for="aktivitas_4">(4) Berjalan di sekitar ruangan</label>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>MOBILITAS</b><br>Kemampuan untuk mengubah dan mengontrol posisi tubuh</td>
            <td>
                <input type="radio" name="mobilitas" value="1" id="mobilitas_1">
                <label for="mobilitas_1">(1) Tidak bisa bergerak</label><br>
                <input type="radio" name="mobilitas" value="2" id="mobilitas_2">
                <label for="mobilitas_2">(2) Sangat terbatas</label><br>
                <input type="radio" name="mobilitas" value="3" id="mobilitas_3">
                <label for="mobilitas_3">(3) Sedikit terbatas</label><br>
                <input type="radio" name="mobilitas" value="4" id="mobilitas_4">
                <label for="mobilitas_4">(4) Tidak ada batasan</label>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>NUTRISI</b><br>Pola asupan makanan</td>
            <td>
                <input type="radio" name="nutrisi" value="1" id="nutrisi_1">
                <label for="nutrisi_1">(1) Sangat buruk</label><br>
                <input type="radio" name="nutrisi" value="2" id="nutrisi_2">
                <label for="nutrisi_2">(2) Kurang adekuat</label><br>
                <input type="radio" name="nutrisi" value="3" id="nutrisi_3">
                <label for="nutrisi_3">(3) Adekuat</label><br>
                <input type="radio" name="nutrisi" value="4" id="nutrisi_4">
                <label for="nutrisi_4">(4) Sangat baik</label>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>FRIKSI DAN GESEKAN</b></td>
            <td>
                <input type="radio" name="friksi_gesekan" value="1" id="friksi_gesekan_1">
                <label for="friksi_gesekan_1">(1) Masalah</label><br>
                <input type="radio" name="friksi_gesekan" value="2" id="friksi_gesekan_2">
                <label for="friksi_gesekan_2">(2) Potensi Masalah</label><br>
                <input type="radio" name="friksi_gesekan" value="3" id="friksi_gesekan_3">
                <label for="friksi_gesekan_3">(3) Tidak ada masalah</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="total_skor">Total Skor Parameter:</label>
                <input type="text" name="total_skor_kulit" id="total_skor_kulit" style="border: none" value="-" readonly>
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-3 d-flex align-items-center">
        <label for="">Skor Braden</label>
        <input type="text" class="form-control ml-3"><br>
    </div>
    <div class="col-sm-9">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_rendah" name="resiko_braden" value="rendah">
            <label class="custom-control-label" for="resiko_rendah">Resiko Rendah (Skor 20 - 23)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_sedang" name="resiko_braden" value="sedang">
            <label class="custom-control-label" for="resiko_sedang">Resiko Sedang (Skor 15 - 19)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_tinggi" name="resiko_braden" value="tinggi">
            <label class="custom-control-label" for="resiko_tinggi">Resiko Tinggi (Skor 10 - 14)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_sangat_tinggi" name="resiko_braden" value="sangat_tinggi">
            <label class="custom-control-label" for="resiko_sangat_tinggi">Sangat Tinggi (Skor 6-9)</label>
        </div>
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Terdapat luka</label>
    </div>
    <div class="col-sm-5">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" id="terdapat_luka_tidak" name="terdapat_luka" value="tidak" type="checkbox">
            <label class="custom-control-label" for="terdapat_luka_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" id="terdapat_luka_ya" name="terdapat_luka" value="ya" type="checkbox">
            <label class="custom-control-label" for="terdapat_luka_ya">Ya</label>
        </div>
    </div>
    <div class="col-sm-12">
        <label for="" class="text-danger">(berikan tanda X / arsiran pada lokasi luka di tubuh pasien pada gambar)</label>
        <div id="signature-pad" class="signature-pad">
            <div class="signature-pad--body">
                <canvas id="signature-image" name="lokasi_luka" style="width: 400px; height: 400px; background: url('{{ asset('drawimage/gambar_orang.jpg') }}') no-repeat center center; background-size: cover;"></canvas>
            </div>
            <button type="button" id="clear-signature" class="btn btn-danger mt-2">Hapus</button>
        </div>
    </div>
</div>

<h4><b>PENGKAJIAN KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Rentang Gerak (ROM)</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_aktif" name="rentang_gerak" value="aktif">
            <label class="custom-control-label" for="rentang_gerak_aktif">Aktif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_pasif" name="rentang_gerak" value="pasif">
            <label class="custom-control-label" for="rentang_gerak_pasif">Pasif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_tidak_dapat_dinilai" name="rentang_gerak" value="tidak_dapat_dinilai">
            <label class="custom-control-label" for="rentang_gerak_tidak_dapat_dinilai">Tidak dapat dinilai</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Deformitas</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="deformitas_tidak_ada" name="deformitas" value="tidak_ada">
            <label class="custom-control-label" for="deformitas_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="deformitas_ada_regio" name="deformitas" value="ada_regio">
            <label class="custom-control-label" for="deformitas_ada_regio">Ada regio</label>
        </div>
        <input type="text" class="form-control" name="deformitas_text" placeholder="jika ada, jelaskan...">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Gangguan Tidur</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_tidak" name="gangguan_tidur" value="tidak">
            <label class="custom-control-label" for="gangguan_tidur_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_ya" name="gangguan_tidur" value="ya">
            <label class="custom-control-label" for="gangguan_tidur_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="gangguan_tidur_text" placeholder="jika ya, jelaskan...">
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN NUTRISI DAN CAIRAN</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Keluhan</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_tidak_ada" name="keluhan_nutrisi" value="tidak_ada">
            <label class="custom-control-label" for="keluhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_mual_muntah" name="keluhan_nutrisi" value="mual_muntah">
            <label class="custom-control-label" for="keluhan_mual_muntah">Mual / muntah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_mengunyah" name="keluhan_nutrisi" value="gangguan_mengunyah">
            <label class="custom-control-label" for="keluhan_gangguan_mengunyah">Gangguan mengunyah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_menelan" name="keluhan_nutrisi" value="gangguan_menelan">
            <label class="custom-control-label" for="keluhan_gangguan_menelan">Gangguan menelan</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Rasa haus berlebihan</label>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_ya" name="rasa_haus_berlebih" value="ya">
            <label class="custom-control-label" for="rasa_haus_berlebih_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_tidak" name="rasa_haus_berlebih" value="tidak">
            <label class="custom-control-label" for="rasa_haus_berlebih_tidak">Tidak</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Mukosa Mulut</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="mukosa_mulut_kering" name="mukosa_mulut" value="kering">
            <label class="custom-control-label" for="mukosa_mulut_kering">Kering</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="mukosa_mulut_lembab" name="mukosa_mulut" value="lembab">
            <label class="custom-control-label" for="mukosa_mulut_lembab">Lembab</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Turgor Kulit</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="turgor_kulit_elastis" name="turgor_kulit" value="elastis">
            <label class="custom-control-label" for="turgor_kulit_elastis">Elastis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="turgor_kulit_tidak_elastis" name="turgor_kulit" value="tidak_elastis">
            <label class="custom-control-label" for="turgor_kulit_tidak_elastis">Tidak Elastis</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Endema</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="endema_ya" name="endema" value="ya">
            <label class="custom-control-label" for="endema_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="endema_tidak" name="endema" value="tidak">
            <label class="custom-control-label" for="endema_tidak">Tidak</label>
        </div>
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN ELIMINASI</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="frekuensi_bab">Frekuensi BAB</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="frekuensi_bab" name="frekuensi_bab" class="form-control" style="width: 30px;">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/hari</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="frekuensi_bab_tidak_dapat_dikaji" name="frekuensi_bab" value="tidak_dapat_dikaji">
            <label class="custom-control-label" for="frekuensi_bab_tidak_dapat_dikaji">Tidak dapat dikaji</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="keluhan_bab">Keluhan BAB</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_tidak_ada" name="keluhan_bab" value="tidak_ada">
            <label class="custom-control-label" for="keluhan_bab_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_perdarahan" name="keluhan_bab" value="perdarahan">
            <label class="custom-control-label" for="keluhan_bab_perdarahan">Perdarahan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_hemorroid" name="keluhan_bab" value="hemorroid">
            <label class="custom-control-label" for="keluhan_bab_hemorroid">Hemorroid</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_konstipasi" name="keluhan_bab" value="konstipasi">
            <label class="custom-control-label" for="keluhan_bab_konstipasi">Konstipasi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_diare" name="keluhan_bab" value="diare">
            <label class="custom-control-label" for="keluhan_bab_diare">Diare</label>
        </div>
        <input type="text" id="keluhan_bab_lainnya" name="keluhan_bab_text" class="form-control" placeholder="Lainnya...">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="karakteristik_feces">Karakteristik feces</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_padat" name="karakteristik_feces" value="padat">
            <label class="custom-control-label" for="karakteristik_feces_padat">Padat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_lunak" name="karakteristik_feces" value="lunak">
            <label class="custom-control-label" for="karakteristik_feces_lunak">Lunak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_cair" name="karakteristik_feces" value="cair">
            <label class="custom-control-label" for="karakteristik_feces_cair">Cair</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="warna_feces">Warna Feces</label>
    </div>
    <div class="col-sm-6">
        <input type="text" id="warna_feces" name="warna_feces" class="form-control" placeholder="Warna...">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="frekuensi_bak">Frekuensi BAK</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="frekuensi_bab" name="frekuensi_bab" class="form-control" style="width: 30px;">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/hari</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="jumlah_bak">Jumlah BAK</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="jumlah_bak" name="jumlah_bak" class="form-control" style="width: 30px;">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">cc/jam</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="warna_urin">Warna Urin</label>
    </div>
    <div class="col-sm-6">
        <input type="text" id="warna_urin" name="warna_urin" class="form-control" placeholder="Warna...">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="keluhan_bak">Keluhan BAK</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_tidak_ada" name="keluhan_bak" value="tidak_ada">
            <label class="custom-control-label" for="keluhan_bak_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_nyeri" name="keluhan_bak" value="nyeri">
            <label class="custom-control-label" for="keluhan_bak_nyeri">Nyeri</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_perdarahan" name="keluhan_bak" value="perdarahan">
            <label class="custom-control-label" for="keluhan_bak_perdarahan">Perdarahan</label>
        </div>
        <input type="text" id="keluhan_bak_lainnya" name="keluhan_bak_lainnya" class="form-control" placeholder="Lainnya...">
    </div>
</div>