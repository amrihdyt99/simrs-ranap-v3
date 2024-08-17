<div class="modal fade" id="modalConfirmDeleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Konfirmasi Pembatalan Item</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" id="itemCode">
            <input type="hidden" id="itemJenis">
          <h4 class="confirm-text"></h4>
          <div class="form-group-check mt-3">
              <div class="form-group">
                <label for="">Alasan Pembatalan <span class="text-danger">*</span></label>
                <input type="text" name="batal_alasan" class="form-control">
              </div>
              <input type="checkbox" style="transform: scale(1.5);" class="form-control-check mr-2" id="input-validation-delete" value="1">
              <label for="" style="font-size: 25px">Ya</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" id="btn-confirm-deleted" class="btn btn-primary">Ya</button>
        </div>
      </div>
    </div>
  </div>