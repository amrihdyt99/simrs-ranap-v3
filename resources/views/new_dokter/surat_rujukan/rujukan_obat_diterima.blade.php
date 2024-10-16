<div class="row">
    <div class="col-lg-12">
        <h4>Obat Yang Diterima</h4>
        <div class="row">
            <div class="col-sm-12 pb-3">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalObatDiterima">
                    Tambah Data Baru
                </button>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="tableObatDiterima" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Nama Obat</th>
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
<div class="modal fade" id="modalObatDiterima" tabindex="-1" role="dialog" aria-labelledby="modalObatDiterimaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalObatDiterimaLabel">Tambah Obat Yang Diterima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formObatDiterima">
                    <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg ?? '' }}">
                    <input type="hidden" id="med_rec" name="med_rec" value="{{ $med_rec ?? '' }}">
                    <input type="hidden" id="kode_surat_rujukan" name="kode_surat_rujukan" value="{{ $kode_surat_rujukan ?? '' }}">
                    <div class="form-group">
                        <label for="item_id_terima">Nama Obat/cairan</label>
                        <input type="text" class="form-control" id="item_id_terima" name="item_id_terima">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="quantity_terima">Qty</label>
                            <input type="number" class="form-control" id="quantity_terima" name="quantity_terima">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="item_unit_code_terima">Satuan</label>
                            <input type="text" class="form-control" id="item_unit_code_terima" name="item_unit_code_terima">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanObatDiterima">Simpan</button>
            </div>
        </div>
    </div>
</div>
