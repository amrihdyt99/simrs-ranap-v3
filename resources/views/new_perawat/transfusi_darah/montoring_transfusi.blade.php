<form id="form-transfusi">
    <div class="form-group"><label class="control-label">Nomor Kantong</label>
        <input type="text" name="nomor_kantong" placeholder="isi nomor kantong" class="form-control" />
    </div>
    <div class="form-group"><label class="control-label">Golongan Darah</label>
        <select class="form-control" name="golongan_darah">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Jenis Darah/Komponen</label>
        <input type="text" name="jenis_darah" placeholder="" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Tanggal Kadarluarsa</label>
        <input type="date" name="tanggal_kadarluarsa" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Nama Penerima Darah</label>
        <input type="text" name="penerima_darah" placeholder="" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Waktu Transfusi</label>
        <input type="date" name="waktu_transfusi" class="form-control" />
    </div>
    <div class="form-group">
        <label for="keadaan_umum">Keadaan Umum:</label>
        <input type="text" class="form-control" id="keadaan_umum" name="keadaan_umum">
    </div>
    <div class="form-group">
        <label for="suhu_tubuh">Suhu Tubuh:</label>
        <input type="text" class="form-control" id="suhu_tubuh" name="suhu_tubuh">
    </div>
    <div class="form-group">
        <label for="nadi">Nadi:</label>
        <input type="text" class="form-control" id="nadi" name="nadi">
    </div>
    <div class="form-group">
        <label for="tekanan_darah">Tekanan Darah:</label>
        <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah">
    </div>
    <div class="form-group">
        <label for="respiratory_rate">Respiratory Rate:</label>
        <input type="text" class="form-control" id="respiratory_rate" name="respiratory_rate">
    </div>
    <div class="form-group">
        <label for="volume_warna_urin">Volume dan Warna Urin:</label>
        <input type="text" class="form-control" id="volume_warna_urin" name="volume_warna_urin">
    </div>
    <div class="form-group">
        <label for="gejala_reaksi_transfusi">Gejala Reaksi Transfusi:</label>
        <select class="form-control" id="gejala_reaksi_transfusi" name="gejala_reaksi_transfusi">
            <option value="urtikaria">Urtikaria</option>
            <option value="nyeri dada">Nyeri Dada</option>
            <option value="demam">Demam</option>
            <option value="nyeri kepala">Nyeri Kepala</option>
            <option value="gatal">Gatal</option>
            <option value="syok">Syok</option>
            <option value="takikardi">Takikardi</option>
            <option value="sesak napas">Sesak Napas</option>
            <option value="hematuria">Hematuria</option>
            <option value="hemoglobinuria">Hemoglobinuria</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pilihan_menit">Pilihan Menit:</label>
        <select class="form-control" id="pilihan_menit" name="pilihan_menit">
            <option value="sebelum">Sebelum Transfusi</option>
            <option value="15 menit">15-30 Menit Transfusi</option>
            <option value="2 jam">2 Jam Transfusi</option>
            <option value="pasca">Pasca Transfusi</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" onclick="simpanMonitoringDarah()">Submit</button>

</form>
