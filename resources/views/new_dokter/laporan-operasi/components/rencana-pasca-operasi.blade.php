<div>
    <h3 class="font-weight-bold">Rencana Pasca Operasi/Tindakan</h3>
    <br/>
    <h4 class="font-weight-bold">Instruksi pasca operasi/tindakan</h4>
    <div class="form-group">
        <label for="">Rawat di</label>
        <select name="instruksi_rawat" id="instruksi_rawat" class="form-control">
            <option value="">Pilih</option>
            <option value="IPD">IPD</option>
            <option value="ODC">ODC</option>
            <option value="ICCU/HCU">ICCU/HCU</option>
            <option value="ICU">ICU</option>
            <option value="PICU">PICU</option>
            <option value="NICU">NICU</option>
        </select>
    </div>

    <div class="form-group">
        <label for="">Posisi</label>
        <div class="row gap-4">
            <div class="col-sm-12 col-lg-2">
                <select name="instruksi_posisi" id="instruksi_posisi" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Supine">Supine</option>
                    <option value="Head Up">Head Up</option>
                    <option value="Lateral Kiri/Kanan">Lateral Kiri/Kanan</option>
                    <option value="Posisi Lain">Posisi Lain</option>
                </select>
            </div>
            <div class="col-sm-12 col-lg-4">
                <input type="text" name="catatan_instruksi_posisi" class="form-control" placeholder="Posisi Lainnya...">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Diet</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="instruksi_diet" id="instruksi_diet" class="form-control">
                    <option value="">Pilih</option>
                    <option value="Puasa Total">Puasa Total</option>
                    <option value="Tidak Perlu Puasa">Tidak Perlu Puasa</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Infus</label>
        <div class="row ml-2">
            <div class="col-sm-12 col-lg-3">
                <input type="checkbox" name="sesuai_instruksi_dokter_anestesi" id="sesuai_instruksi_dokter_anestesi" value="1" class="form-check-input">
                <label for="sesuai_instruksi_dokter_anestesi">Sesuai Instruksi Dokter Anestesi</label>
            </div>
            <div class="col-sm-12 col-lg-3">
                <input type="checkbox" name="instruksi_cairan_infus" id="instruksi_cairan_infus" value="1" class="form-check-input">
                <label for="instruksi_cairan_infus">Cairan</label>
            </div>
            <div class="col-sm-12 col-lg-3 row">
                <input type="text" name="" id="catatan_instruksi_cairan_infus" class="form-control col-sm-12 col-lg-10" placeholder="Cairan..."/>
                <div class="col-sm-12 col-lg-2">
                    <button class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </div>
            <div class="col-12">
                <h5 class="font-weight-bold">Daftar Cairan Infus</h5>
                <div id="daftar-cairan-infus"></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Pemberian Obat</label>
        <textarea name="instruksi_pemberian_obat" id="instruksi_pemberian_obat" rows="10" placeholder="(Sesuai dengan IMR)" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="">Pemberian Tranfusi</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <input type="radio" name="instruksi_pemberian_tranfusi" id="instruksi_pemberian_tranfusi_1" value="Tidak Perlu">
                <label for="instruksi_pemberian_tranfusi_1">Tidak Perlu</label>
            </div>
            <div class="col-sm-12 col-lg-4">
                <input type="radio" name="instruksi_pemberian_tranfusi" id="instruksi_pemberian_tranfusi_2" value="Tidak Perlu">
                <label for="instruksi_pemberian_tranfusi_2">Menunggu Hasil Laboratorium</label>
            </div>
        </div>
        
    </div>

    <div class="form-group">
        <label for="">Drain</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="instruksi_drain" id="instruksi_drain" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Terpasang</option>
                    <option value="0">Tidak Terpasang</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Tampon</label>
        <div class="row ml-2">
            <div class="col-sm-12 col-lg-2">
                <input type="radio" name="instruksi_tampon" id="instruksi-tampon-1" class="form-check-input" value="0">
                <label for="instruksi-tampon-1">Tidak Terpasang</label>
            </div>
            <div class="col-sm-12 col-lg-10">
                <div class="row">
                    <div class="col-sm-12 col-lg-2">
                        <input type="radio" name="instruksi_tampon" id="instruksi-tampon-2" class="form-check-input" value="1">
                        <label for="instruksi-tampon-2">Terpasang</label>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <label for="">Letak</label>
                        <input type="text" name="instruksi_tampon_letak" id="instruksi_tampon_letak" class="form-control" placeholder="Letak Tampon...">
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <label for="">Selama</label>
                        <input type="number" name="durasi_hari_tampon" id="durasi-hari-tampon" class="form-control" placeholder="Hari">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">NGT</label>
        <div class="row ml-2">
            <div class="col-sm-12 col-lg-1">
                <input type="radio" name="ngt" id="ngt-y" class="form-check-input" value="0">
                <label for="ngt-y">Tidak Ada</label>
            </div>
            <div class="col-sm-12 col-lg-1">
                <input type="radio" name="ngt" id="ngt-t" class="form-check-input" value="1">
                <label for="ngt-t">Ada</label>
            </div>
            <div class="col-sm-12 col-lg-8 row">
                <label for="" class="col-sm-12 col-lg-2">Selama (hari)</label>
                <input type="text" name="catatan_ngt" id="catatan_ngt" class="form-control" placeholder="Isi jika memilih ada.">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Kateter Urin</label>
        <div class="row ml-2">
            <div class="col-sm-12 col-lg-2">
                <input type="radio" name="kateter_urin" id="kateter_urin-y" class="form-check-input" value="0">
                <label for="kateter_urin-y">Tidak Terpasang</label>
            </div>
            <div class="col-sm-12 col-lg-1">
                <input type="radio" name="kateter_urin" id="kateter_urin-t" class="form-check-input" value="1">
                <label for="kateter_urin-t">Terpasang</label>
            </div>
            <div class="col-sm-12 col-lg-8 row">
                <label for="" class="col-sm-12 col-lg-4">Monitor Urin(jam)</label>
                <input type="text" name="catatan_kateter_urin" id="catatan_kateter_urin" class="form-control" placeholder="Isi jika memilih terpasang">
            </div>
        </div>
    </div>

   <h5 class="font-weight-bold">Pemeriksaan Pasca</h5>
   <div class="form-group mt-2">
        <label for="">Laboratorium</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="pemeriksaan_pasca_laboratorium" id="pemeriksaan_pasca_laboratorium" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Perlu</option>
                    <option value="0">Tidak Perlu</option>
                </select>
            </div>
            <div class="col-sm-12 col-lg-6">
                <input type="text" name="catatan_pemeriksaan_pasca_laboratorium" id="" class="form-control" placeholder="Isi jika memilih perlu.">
            </div>
        </div>
   </div>
   <div class="form-group mt-2">
        <label for="">Laboratorium</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="pemeriksaan_pasca_radiologi" id="pemeriksaan_pasca_radiologi" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Perlu</option>
                    <option value="0">Tidak Perlu</option>
                </select>
            </div>
            <div class="col-sm-12 col-lg-6">
                <input type="text" name="catatan_pemeriksaan_pasca_radiologi" id="" class="form-control" placeholder="Isi jika memilih perlu.">
            </div>
        </div>
   </div>
   <div class="form-group mt-2">
        <label for="">Kebutuhan Terkait</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="kebutuhan_terkait" id="kebutuhan_terkait" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Ada</option>
                    <option value="0">Tidak Ada</option>
                </select>
            </div>
            <div class="col-sm-12 col-lg-6">
                <input type="text" name="catatan_kebutuhan_terkait" id="" class="form-control" placeholder="Isi jika memilih ada.">
            </div>
        </div>
   </div>
</div>

@push('myscripts')
<script></script>
@endpush