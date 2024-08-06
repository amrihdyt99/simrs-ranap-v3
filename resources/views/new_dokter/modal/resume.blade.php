<div class="modal fade" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
      <div class="modal-content">
        <div class="modal-header text-uppercase">
            <h3><strong>Form Resume Pasien Rawat Jalan</strong></h3>
        </div>
        <form id="form-resume-dokter">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="presume_reg" value="{{$reg}}">
                <div class="form-group"> 
                    <label>Item Tindakan Dokter</label> 
                    <select class="form-control select2 select2-hidden-accessible" name="pbill_item" id="pbill_item" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option value="">-- Pilih item --</option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="">Dispense Qty</label>
                    <input type="number" min="1" value="1" name="pbill_dispense_qty" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-save-resume">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>