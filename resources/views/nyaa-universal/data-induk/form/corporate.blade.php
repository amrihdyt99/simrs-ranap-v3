<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $dt_judul }}</h5>
        <button type="button" class="protecc close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">

<form id="dtf_i">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-body pb-0">

        <input name="dt_mode" type="hidden">
        <input name="dtid" type="hidden">

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">BusinessPartner / PartnerBisnis *</p>
            <select name="businesspartner_id" id="businesspartner_id" class="form-control"></select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Tipe *</p>
            <select name="GCCustomerType" class="form-control">
              @foreach($nyaa_unfc->GCCustomerType('uwu_ReturnAll') as $GCCustomerType_key => $GCCustomerType_val)
              <option value="{{ $GCCustomerType_key }}" {{$loop->first?'selected':''}}>{{ $GCCustomerType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Credit Limit *</p>
            <input name="CreditLimit" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Credit Balance *</p>
            <input name="CreditBalance" autocomplete="off" type="number" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">BlackList *</p>
            <select name="IsBlackList" class="form-control">
              <option value="0" selected>Tidak</option>
              <option value="1">Ya</option>
            </select>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">BlackList Reason</p>
            <input name="BlackListReason" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Catatan</p>
            <input name="Remarks" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

      </div>
    </div>
  </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="protecc btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="protecc btn btn-info" id="simpan-entry-data">Simpan</button>
      </div>
    </div>
  </div>