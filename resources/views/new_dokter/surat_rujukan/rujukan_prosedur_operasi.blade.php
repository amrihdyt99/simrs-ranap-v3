<div class="row">
    <div class="col-lg-12">
        <h4>Prosedur/Operasi Yang Sudah Dilakukan</h4>
        <div class="row">
            <div class="col-sm-12 pb-3">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalProsedurOperasi">
                    Tambah Data Baru
                </button>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="tableProsedurOperasi" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Detail Prosedur/Operasi</th>
                                <th>Waktu Prosedur/Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalProsedurOperasi" tabindex="-1" role="dialog" aria-labelledby="modalProsedurOperasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProsedurOperasiLabel">Tambah Prosedur/Operasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formProsedurOperasi">
                    @csrf
                    <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg ?? '' }}">
                    <input type="hidden" id="med_rec" name="med_rec" value="{{ $med_rec ?? '' }}">
                    <input type="hidden" id="kode_surat_rujukan" name="kode_surat_rujukan" value="{{ $kode_surat_rujukan ?? '' }}">
                    <input type="hidden" name="username" value="{{auth()->user()->username}}">
                    <div class="form-group">
                        <label for="detailProsedurOperasi">Detail Prosedur/Operasi</label>
                        <input type="text" class="form-control" id="detailProsedurOperasi" name="detailProsedurOperasi" required>
                    </div>
                    <div class="form-group">
                        <label for="waktuProsedurOperasi">Waktu Prosedur/Operasi</label>
                        <input type="datetime-local" class="form-control" id="waktuProsedurOperasi" name="waktuProsedurOperasi" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanProsedurOperasi">Simpan</button>
            </div>
        </div>
    </div>
</div>

