<div class="modal fade" id="modalKwitansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Input Data Kwitansi</h3>
        </div>
        <form id="form-confirm-kwitansi">
          @csrf
          <div class="modal-body">
            <input type="hidden" name="pvalidation_reg" value="{{$reg_no}}">
            <div class="form-group">
              <label for="">PIC Pengesahan</label>
              <select name="pic_pengesahan" class="form-control">
                <option value="">-- Pilih PIC Pengesahan --</option>
                <option value="kasir">Kasir</option>
                <option value="bendahara">Bendahara Penerimaan RSUD Siti Fatimah Provinsi Sumsel</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Nama PIC Pengesahan</label>
              <input type="text" name="pvalidation_legitimate" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Keperluan Pembayaran</label>
              <textarea name="pvalidation_notes" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btn-confirm-kwitansi" class="btn btn-primary">Cetak Kwitansi</button>
          </div>
        </form>
      </div>
    </div>
  </div>