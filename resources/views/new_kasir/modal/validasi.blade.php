<div class="modal fade" id="modalValidasiBayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" style="color: black">
      <div class="modal-header">
        <h3>Konfirmasi Pembayaran</h3>
      </div>
      <form id="form-save-validasi">
        @csrf
        <input type="hidden" name="pvalidation_reg" value="{{$reg_no}}">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <h6>Total Tagihan</h6>
              <h3 class="font-weight-bold mb-3" id="validasi-tagihan">Rp. 0</h3>
            </div>
          </div>
          <div id="row_detail_payment" class="row"></div>

          <hr>
          <div class="form-group">
            <label for="">Multi jenis pembayaran</label>
            <select name="pvalidation_multi_payer" id="multi_payer" class="select2 form-control" width="100%">
              <option value="">-- Pilih jenis pembayaran lainnya --</option>
              {{-- @foreach (DB::table('rs_m_business_partner')->whereNotIn('BusinessPartnerID', [$reg->reg_corporate])->get() as $item)
                    <option value="{{$item->BusinessPartnerName}}">{{$item->BusinessPartnerName}}</option>
              @endforeach --}}
            </select>
          </div>
          {{-- <span><input type="checkbox" id="validasi-selisih"> Selisih</span> --}}
          <div id="panel-selisih" class="mt-3"></div>

          <label for="" class=" mt-3">Metode Pembayaran</label>
          <div class="form-group-check">
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Kredit">
            <label for="" class="mr-3">Kredit</label>
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Debit">
            <label for="" class="mr-3">Debit</label>
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Discount Global">
            <label for="" class="mr-3">Discount Global</label>
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Virtual Account">
            <label for="" class="mr-3">Virtual Account</label>
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Cash">
            <label for="" class="mr-3">Cash</label>
            <input type="checkbox" class="form-control-check check_pay_method mr-1" name="pvalidation_method[]" value="Transfer">
            <label for="" class="mr-3">Transfer</label>
          </div>

          <div id="pay-method" class="my-3"></div>

          <div class="form-group-check mt-3">
            <input type="checkbox" style="transform: scale(1.5);" class="form-control-check mr-2" id="input-validation-store" value="1">
            <label for="" style="font-size: 25px">Ya</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" id="btn-save-validasi" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>