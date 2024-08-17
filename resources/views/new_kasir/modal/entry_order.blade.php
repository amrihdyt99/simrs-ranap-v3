<div class="modal fade" id="modalEntryOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Form Tambah Item Tindakan
        </div>
        <form id="form-entry-order">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="cpoe_reg" value="{{$reg->reg_no}}">
                <input type="hidden" name="cpoe_nama">
                <div class="form-group"> 
                    <label>Jenis Item</label> 
                    <select class="form-control cpoe_type" style="width: 100%">
                        <option value="">-- Pilih jenis item --</option>
                        {{-- <option value="RAD">Radiologi</option>
                        <option value="LAB">Laboratorium</option> --}}
                        <option value="LAIN" selected>Biaya Administratif</option>
                    </select>
                </div>
                <div class="form-group"> 
                    <label>Nama Item</label> 
                    <select class="form-control cpoe_item" style="width: 100%">
                        <option value="">-- Pilih item tindakan --</option>
                    </select>
                </div>
                <div class="form-group"> 
                    <label>Tarif Item</label> 
                    <input type="text" class="form-control cpoe_tarif">
                </div>
                <div class="form-group"> 
                    <label>Tipe Item</label> 
                    <input type="text" class="form-control cpoe_types">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="btn-entry-order" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>