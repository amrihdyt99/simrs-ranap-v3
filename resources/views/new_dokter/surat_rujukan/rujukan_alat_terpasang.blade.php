<div class="row">
    <div class="col-lg-12">
        <h4>Alat Terpasang</h4>
        <div class="row">
            <div class="col-sm-12 pb-3">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalAlatTerpasang">
                    Tambah Data Baru
                </button>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="tableAlatTerpasang" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Nama Alat</th>
                                <th>Waktu Terpasang</th>
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
<div class="modal fade" id="modalAlatTerpasang" tabindex="-1" role="dialog" aria-labelledby="modalAlatTerpasangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAlatTerpasangLabel">Tambah Alat Terpasang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <form id="formAlatTerpasang">
                    <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg ?? '' }}">
                    <input type="hidden" id="med_rec" name="med_rec" value="{{ $med_rec ?? '' }}">
                    <input type="hidden" id="kode_surat_rujukan" name="kode_surat_rujukan" value="{{ $kode_surat_rujukan ?? '' }}">
                    <input type="hidden" name="username" value="{{auth()->user()->username}}">
                    <div class="form-group">
                        <label for="nama_alat_terpasang">Nama Alat Terpasang</label>
                        <input type="text" class="form-control" id="nama_alat_terpasang" name="nama_alat_terpasang" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_alat_terpasang">Waktu Terpasang</label>
                        <input type="datetime-local" class="form-control" id="waktu_alat_terpasang" name="waktu_alat_terpasang" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanAlatTerpasang">Simpan</button>
            </div>
        </div>
    </div>
</div>
