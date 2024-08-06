<div class="modal fade" id="modalBilling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Form Penagihan
        </div>
        <form id="form-billing-dokter">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="pbill_reg" value="{{$reg}}">
                <div class="form-group"> 
                    <label>Item Tindakan Dokter</label> 
                    <select class="form-control select2 select2-hidden-accessible" name="pbill_item" id="pbills_item" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option value="">-- Pilih item --</option>
                    </select>
                </div>
                <div id="detail_billing">
                    <div class="form-group">
                        <label for="">Dispense Qty</label>
                        <input type="number" min="1" value="1" name="pbill_dispense_qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Charges Qty</label>
                        <input type="number" min="1" value="1" name="pbill_charges_qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Charges Price</label>
                        <input type="text" name="pbill_charges_price" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Asset Control</label>
                        <input type="text" name="pbill_asset" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-save-billing">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>