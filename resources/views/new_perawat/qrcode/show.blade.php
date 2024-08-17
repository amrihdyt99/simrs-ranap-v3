<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card mx-auto">
      <div class="card-header">
        <label for="subject" class="font-weight-bold">Detail CPPT</label>
        <label id="soapdok_reg_qr" class="font-weight-bold">{{ $data->soapdok_reg }}</label>
      </div>
      <div class="card-body">
        <div class="text-center" id="QrCodeImage">
          {!! QrCode::size(300)->generate(route('perawat.patient_detail_qrcode', ['soap_id' => $data->soapdok_id,])) !!}
        </div>
      </div>
    </div>
  </div>
</div>