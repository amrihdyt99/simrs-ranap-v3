<div class="modal fade" id="modalmeninggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Form Penyataan Meninggal
            </div>
            <form id="form-billing-dokter">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="regno" value="{{$reg}}">
                    <div class="form-group">
                        <label for="">Kelompok penyebab kematian</label>
                        <select class="form-control" id="kelompok_penyebab_kematian">
                            <option value="Sakit Biasa/Tua">Sakit Biasa/Tua</option>
                            <option value="Wabah Penyakit">Wabah Penyakit</option>
                            <option value="Kecelakaan">Kecelakaan</option>
                            <option value="Kriminalitas">Kriminalitas</option>
                            <option value="Bunuh Diri">Bunuh Diri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat Kejadian</label>
                        <select class="form-control" id="tempat_kejadian_meninggal">
                            <option value="Rumah">Rumah</option>
                            <option value="Jalan dan Jalan Raya">Jalan dan Jalan raya</option>
                            <option value="Sekolahan/Kampus">Sekolahan/Kampus</option>
                            <option value="Daerah industri-kontruksi">Daerah indistru-kontruksi</option>
                            <option value="Tempat Umum">Tempat Umum</option>
                            <option value="Pertanian/Perkebunan">Pertanian/Perkebunan</option>
                            <option value="tidak tahu">Tidak tahu</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-save-billing">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

