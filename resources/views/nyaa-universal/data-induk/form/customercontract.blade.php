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
          <div class="form-group col-sm-12">
            <h4 class="mt-4 text-center">Informasi Contract</h4>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">No.Document *</p>
            <input name="DocumentNo" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Document Date</p>
            <input name="DocumentDate" id="DocumentDate" autocomplete="off" type="text" class="dtx_cc form-control" data-toggle="datetimepicker">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">No.Contract *</p>
            <input name="ContractNo" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">No.Revision</p>
            <input name="RevisionNo" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Summary of the Contract *</p>
            <textarea rows="4" name="ContractSummary" autocomplete="off" type="text" class="form-control"></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Starting Date *</p>
            <input name="StartingDate" id="StartingDate" autocomplete="off" type="text" class="dtx_cc form-control" data-toggle="datetimepicker">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Ending Date *</p>
            <input name="EndingDate" id="EndingDate" autocomplete="off" type="text" class="dtx_cc form-control" data-toggle="datetimepicker">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Coverage Type *</p>
            <select name="GCCoverageType" class="form-control">
              @foreach($nyaa_unfc->GCCoverageType('uwu_ReturnAll') as $GCCoverageType_key => $GCCoverageType_val)
              <option value="{{ $GCCoverageType_key }}" {{$loop->first?'selected':''}}>{{ $GCCoverageType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">BusinessPartner *</p>
            <select name="businesspartner_id" id="businesspartner_id" class="businesspartner form-control"></select>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Bill to BusinessPartner *</p>
            <select name="billto_businesspartner_id" id="billto_businesspartner_id" class="businesspartner form-control"></select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Hospital Signed *</p>
            <select name="HospitalSigned_id" id="HospitalSigned_id" class="businesspartner form-control"></select>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Corporate Signed *</p>
            <select name="CorporateSigned_id" id="CorporateSigned_id" class="corporate form-control"></select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12">
            <h4 class="mt-4 text-center">Administration</h4>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Administration (%) *</p>
            <input name="AdministrationFeePercentage" value="0" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cover Administration *</p>
            <select name="GCCoverAdministrationType" class="form-control">
              @foreach($nyaa_unfc->GCCoverAdministrationType('uwu_ReturnAll') as $GCCoverAdministrationType_key => $GCCoverAdministrationType_val)
              <option value="{{ $GCCoverAdministrationType_key }}" {{$loop->first?'selected':''}}>{{ $GCCoverAdministrationType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Administration Charges By Class *</p>
            <select name="IsAdministrationChargesByClass" class="form-control">
              <option value="0" selected>Tidak</option>
              <option value="1">Ya</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Min.Administration</p>
            <input name="MinAdministration" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Max.Administration</p>
            <input name="MaxAdministration" autocomplete="off" type="number" class="form-control">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12">
            <h4 class="mt-4 text-center">Cito &amp; Complication</h4>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cito (%) *</p>
            <input name="CitoPercentage" value="0" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cover Cito *</p>
            <select name="GCCoverCitoType" class="form-control">
              @foreach($nyaa_unfc->GCCoverCitoType('uwu_ReturnAll') as $GCCoverCitoType_key => $GCCoverCitoType_val)
              <option value="{{ $GCCoverCitoType_key }}" {{$loop->first?'selected':''}}>{{ $GCCoverCitoType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Complication (%) *</p>
            <input name="ComplicationPercentage" value="0" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cover Complication *</p>
            <select name="GCCoverComplicationType" class="form-control">
              @foreach($nyaa_unfc->GCCoverComplicationType('uwu_ReturnAll') as $GCCoverComplicationType_key => $GCCoverComplicationType_val)
              <option value="{{ $GCCoverComplicationType_key }}" {{$loop->first?'selected':''}}>{{ $GCCoverComplicationType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cito + Complication (%) *</p>
            <input name="CitoComplicationPercentage" value="0" autocomplete="off" type="number" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Cover Cito + Complication *</p>
            <select name="GCCoverCitoComplicationType" class="form-control">
              @foreach($nyaa_unfc->GCCoverCitoComplicationType('uwu_ReturnAll') as $GCCoverCitoComplicationType_key => $GCCoverCitoComplicationType_val)
              <option value="{{ $GCCoverCitoComplicationType_key }}" {{$loop->first?'selected':''}}>{{ $GCCoverCitoComplicationType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-sm-12">
            <h4 class="mt-4 text-center">Discount</h4>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Discount In Corporate Invoice *</p>
            <select name="IsDiscountInCorporateInvoice" class="form-control">
              <option value="0" selected>Discount In Transaction</option>
              <option value="1">Discount In Corporate Invoice</option>
            </select>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Discount In Corporate Invoice (%) *</p>
            <input name="DiscountCorporateInvoice" value="0" autocomplete="off" type="number" class="form-control">
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