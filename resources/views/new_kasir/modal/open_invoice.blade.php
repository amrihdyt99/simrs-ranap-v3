<div class="modal fade" id="modalOpenInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Open Invoice</h3>
        </div>
        <form id="formOpenInvoice">
          @csrf
          <div class="modal-body">
            <input type="hidden" name="open_id">
            <h4 class="confirm-text"></h4>
            <div class="form-group-check">
              <label for="">Alasan Open Invoice <span class="text-danger">*</span></label>
              <textarea name="open_desc" class="form-control" cols="30" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" id="btn_save_open_invoice" class="btn btn-primary">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalOpenInvoiceList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Daftar Transaksi</h3>
        </div>
        <div class="modal-body">
            <table class="table table-striped" id="tableListTransaksi">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Kode Transaksi</th>
                  <th>Petugas Kasir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>