<div class="modal fade" id="modalPayer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Ubah Data Payer</h3>
        </div>
        <form id="form-change-payer">
          @csrf
          <div class="modal-body">
            <input type="hidden" name="reg_no" value="{{$reg_no}}">
            <div class="form-group">
                <label class="label-admisi">Payer</label>
                <select name="reg_corporate" class="select2 form-control" style="width: 100%">
                    <option value="">-- Pilih payer --</option>
                    {{-- @foreach (DB::table('rs_m_business_partner')->get() as $item)
                        <option value="{{$item->BusinessPartnerID}}">{{$item->BusinessPartnerName}}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group">
                <label class="label-admisi">Cara Bayar</label>
                <input type="text" name="reg_cara_bayar" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btn-change-payer" class="btn btn-primary">Ubah Payer</button>
          </div>
        </form>
      </div>
    </div>
  </div>