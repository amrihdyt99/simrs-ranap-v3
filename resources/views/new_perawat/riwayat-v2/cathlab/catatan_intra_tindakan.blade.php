<h2 class="text-black">Catatan Keperawatan - Intra Tindakan</h2>
<br>
<form id="form_intra_tindakan">
    @csrf
    <div class="text-black" style="font-size: 14px">
        <div class="form-group">
            <label class="control-label">Pasien tiba di Cath Lab</label>
            <input type="text" class="form-control" name="pasien_tiba" id="pasien_tiba" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Time out</label>
            <input type="text" class="form-control" name="time_out" id="time_out" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Cek fungsi dan peralatan</label>
            <input type="text" class="form-control" name="cek_fungsi_peralatan" id="cek_fungsi_peralatan" disabled>
        </div>

        <div class="form-group">
            <label class="control-label">Preparasi di</label>
            <input type="text" class="form-control" name="preparasi_di" id="preparasi_di" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Desinfektan dengan</label>
            <input type="text" class="form-control" name="desinfektan_dengan" id="desinfektan_dengan" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Tipe Pembiusan</label>
            <input type="text" class="form-control" name="tipe_pembiusan" id="tipe_pembiusan" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Akses</label>
            <input type="text" class="form-control" name="akses" id="akses" disabled>
        </div>

        <div class="form-group">
            <label class="control-label">Chateter diagnostik</label>
            <input type="text" class="form-control" name="catheter_diagnostik" id="catheter_diagnostik" disabled>
        </div>
        <div class="form-group">
            <label class="control-label"></label>
            <input type="text" class="form-control" name="value_diagnostik" id="value_diagnostik" disabled>
        </div>

        <div class="form-group">
            <label class="control-label">Kontras</label>
            <input type="text" name="kontras" id="kontras" placeholder="" class="form-control" disabled />
        </div>
        <div class="form-group">
            <label class="control-label">Guiding Catheter</label>
            <input type="text" class="form-control" name="guiding_catheter" id="guiding_catheter" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Balon Ukuran</label>
            <textarea rows="5" name="balon_ukuran" id="balon_ukuran" placeholder="" class="form-control" disabled></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">Balon Jumlah</label>
            <textarea rows="5" name="balon_jumlah" id="balon_jumlah" placeholder="" class="form-control" disabled></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">Balon Jenis</label>
            <textarea rows="5" name="balon_jenis" id="balon_jenis" placeholder="" class="form-control" disabled></textarea>
        </div>

        <div class="form-group">
            <label class="control-label">Jumlah Stent/Implant</label>
            <input type="text" class="form-control" name="jumlah_stent" id="jumlah_stent" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Jenis Stent/Implant</label>
            <input type="text" class="form-control" name="jenis_stent" id="jenis_stent" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Lokasi Stent/Implant</label>
            <input type="text" class="form-control" name="lokasi_stent" id="lokasi_stent" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Pacing</label>
            <input type="text" class="form-control" name="pacing" id="pacing" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">IABP</label>
            <input type="text" class="form-control" name="iabp" id="iabp" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Kondisi Pasien Selama tindakan</label>
            <input type="text" class="form-control" name="kondisi_pasien" id="kondisi_pasien" disabled>
        </div>

        <div class="form-group">
            <label class="control-label">Pasien dan Keluarga Setuju untuk PCI</label>
            <input type="text" class="form-control" name="pasien_pci" id="pasien_pci" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">Obat obatan selama tindakan</label>
            <textarea rows="5" name="obat_obatan" id="obat_obatan" placeholder="" class="form-control" disabled></textarea>
        </div>
    </div>
</form>
