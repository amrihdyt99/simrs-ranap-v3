<div class="row">
    <div class="col-lg-12">
        <h4>Obat Atau Cairan Yang Dibawa</h4>
        <div class="row">
            <div class="col-sm-12 pb-3">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalObatDibawa">
                    Tambah Data Baru
                </button>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="tableObatDibawa" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Nama Obat/Cairan</th>
                                <th>Qty</th>
                                <th>Satuan</th>
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
<div class="modal fade" id="modalObatDibawa" tabindex="-1" role="dialog" aria-labelledby="modalObatDibawaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalObatDibawaLabel">Tambah Obat Atau Cairan Yang Dibawa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formObatDibawa">
                    <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg ?? '' }}">
                    <input type="hidden" id="med_rec" name="med_rec" value="{{ $med_rec ?? '' }}">
                    <input type="hidden" id="kode_surat_rujukan" name="kode_surat_rujukan" value="{{ $kode_surat_rujukan ?? '' }}">
                    <div class="form-group">
                        <label for="item_id">Nama Obat/Cairan</label>
                        <input type="text" class="form-control" id="item_id" name="item_id">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="quantity">Qty</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="item_unit_code">Satuan</label>
                            <input type="text" class="form-control" id="item_unit_code" name="item_unit_code">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanObatDibawa">Simpan</button>
            </div>
        </div>
    </div>
</div>

