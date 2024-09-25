<div class="modal fade" id="modalEntryOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Form Tambah Item Tindakan
            </div>
            <form id="form-entry-order">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="cpoe_reg" value="{{$reg_no}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="name" value="{{auth()->user()->name}}">
                    <!-- <div class="form-group"> 
                        <label>Jenis Item</label> 
                        <select class="form-control cpoe_type" style="width: 100%">
                            <option value="">-- Pilih jenis item --</option>
                            {{-- <option value="RAD">Radiologi</option>
                            <option value="LAB">Laboratorium</option> --}}
                            <option value="LAIN" selected>Biaya Administratif</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Nama Item</label>
                        <span id="loadTindakan"></span>
                        <select id="select-tindakan-lain" name="cpoe_tindakan[]" onchange="selectTindakan(this)" class="form-control cpoe_item select2" style="width: 100%">
                            <option value="">Cari nama tindakan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tarif Item</label>
                        <input type="text" class="form-control cpoe_name" name="cpoe_nama[]" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tarif Item</label>
                        <input type="text" class="form-control cpoe_tarif" name="cpoe_tarif[]" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tipe Item</label>
                        <input type="text" class="form-control cpoe_types" name="jenisorder" value="lainnya" readonly>
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