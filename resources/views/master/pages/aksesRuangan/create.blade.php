<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akses Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="f-data">
                @csrf
                <div class="modal-body">
                    <fieldset class="form-group">
                        <label>Kategori</label>
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="X0055^001" name="paramedic_type" value="X0055^001" />
                                    <label class="custom-control-label" for="X0055^001">Dokter</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="X0055^003" name="paramedic_type" value="X0055^003" />
                                    <label class="custom-control-label" for="X0055^003">Perawat</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div id="mainAksesRuangan">
                        <div class="form-group">
                            <label for="">Nama Paramedis</label>
                            <select name="paramedis" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select name="ruangan" cases="admit" class="form-control" onchange="takeRuangan(this)"></select>
                        </div>
                        <table width="100%" class="table table-striped new_table" id="tableSelectedRuangan">
                            <thead>
                                <tr>
                                    <th>Ruangan yang dipilih</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpanData()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>