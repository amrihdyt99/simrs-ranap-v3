<!-- Modal Diagnosa Gizi -->
<div class="modal fade" id="modalDiagnosaGizi" tabindex="-1" role="dialog" aria-labelledby="modalDiagnosaGiziLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDiagnosaGiziLabel">Tambah Diagnosa Gizi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formDiagnosaGizi">
                    <div class="form-group">
                        <label for="masalah">Masalah</label>
                        <input type="text" class="form-control" id="masalah" name="masalah" required>
                    </div>
                    <div class="form-group">
                        <label for="berkaitan_dengan">Berkaitan Dengan</label>
                        <input type="text" class="form-control" id="berkaitan_dengan" name="berkaitan_dengan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="ditandai_dengan">Ditandai Dengan</label>
                        <input type="text" class="form-control" id="ditandai_dengan" name="ditandai_dengan" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="submitFormDiagnosaGizi()">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
