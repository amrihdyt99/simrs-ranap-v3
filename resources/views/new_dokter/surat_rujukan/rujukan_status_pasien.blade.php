<div class="row">
    <div class="col-lg-12">
        <h4>Status Pasien</h4>
        <div class="row">
            <div class="col-sm-12 pb-3">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalStatusPasien">
                    Tambah Data Baru
                </button>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="tableStatusPasien" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Waktu</th>
                                <th>Kesadaran</th>
                                <th>TD (mmHg)</th>
                                <th>HR (x/mnt)</th>
                                <th>RR (x/mnt)</th>
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
<div class="modal fade" id="modalStatusPasien" tabindex="-1" role="dialog" aria-labelledby="modalStatusPasienLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusPasienLabel">Tambah Status Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formStatusPasien">
                    <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg ?? '' }}">
                    <input type="hidden" id="med_rec" name="med_rec" value="{{ $med_rec ?? '' }}">
                    <input type="hidden" id="kode_surat_rujukan" name="kode_surat_rujukan" value="{{ $kode_surat_rujukan ?? '' }}">
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                    </div>
                    <div class="form-group">
                        <label for="kesadaran">Kesadaran</label>
                        <input type="text" class="form-control" id="kesadaran" name="kesadaran">
                    </div>
                    <div class="form-group">
                        <label for="td">TD (mmHg)</label>
                        <input type="text" class="form-control" id="td" name="td">
                    </div>
                    <div class="form-group">
                        <label for="hr">HR (x/mnt)</label>
                        <input type="text" class="form-control" id="hr" name="hr">
                    </div>
                    <div class="form-group">
                        <label for="rr">RR (x/mnt)</label>
                        <input type="text" class="form-control" id="rr" name="rr">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanStatusPasien">Simpan</button>
            </div>
        </div>
    </div>
</div>


