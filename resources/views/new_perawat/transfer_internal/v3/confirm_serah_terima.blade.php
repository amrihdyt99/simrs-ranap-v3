@php
$url_form = route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal',[5]);
@endphp

<div class="container">
  <div class="card">
    <div class="card-header container-fluid">
      <div class="row">
        <h3><b>SERAH TERIMA PASIEN</b></h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label>Tanggal dan waktu serah terima</label>
            <input type="datetime-local" class="form-control" name="transfer_terima_tanggal" value="{{$transfer_internal->transfer_terima_tanggal}}">
          </div>
          <div class="form-group">
            <label>Kondisi Saat Ini</label>
            <input type="text" class="form-control" name="transfer_terima_kondisi" value="{{$transfer_internal->transfer_terima_kondisi}}">
          </div>
          <div class="row">
            <h5 class="col-sm-12 pt-0">Saat Tba :</h5>
            <legend class="col-form-label col-sm-3 pt-0">GCS</legend>
            <div class="col-lg-3">
              <div class="form-group">
                <label>E</label>
                <input type="text" class="form-control" name="transfer_terima_gcs_e" value="{{$transfer_internal->transfer_terima_gcs_e}}">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label>M</label>
                <input type="text" class="form-control" name="transfer_terima_gcs_m" value="{{$transfer_internal->transfer_terima_gcs_m}}">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label>V</label>
                <input type="text" class="form-control" name="transfer_terima_gcs_v" value="{{$transfer_internal->transfer_terima_gcs_v}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label>TD</label>
                <input type="text" class="form-control" name="transfer_terima_td" value="{{$transfer_internal->transfer_terima_td}}">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>N</label>
                <input type="text" class="form-control" name="transfer_terima_n" value="{{$transfer_internal->transfer_terima_n}}">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>Suhu</label>
                <input type="text" class="form-control" name="transfer_terima_suhu" value="{{$transfer_internal->transfer_terima_suhu}}">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label>P</label>
                <input type="text" class="form-control" name="transfer_terima_p" value="{{$transfer_internal->transfer_terima_p}}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-3">
  <div class="card">
    <div class="card-header container-fluid">
      <div class="row">
        <h3><b>Hasil Pemeriksaan Diagnostik</b></h3>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        @if ($type == 'edit' || $type == 'terima' || 'intensif')
        <div class="col-sm-12 pb-3" style>
          <button type="button" class="protecc btn btn-sm btn-info" onclick="nyaa_act(this,'ModalBase_orig_transferinternal_diagnostik','ModalBase')" nyaa-mode="add">Tambah Data Diagnostik Baru</button>
        </div>
        <div class="col-sm-12">
          <div class="w-100">
            <table id="dttb_transfer_internal5" nyaa-urldatatable="{{ $url_form }}"
              nyaa-columns='[
                    {"data": "id", "name": "id"},
                    {"data": "aksi_data", "orderable": false, "searchable": false},
                    {"data": "lab", "name": "lab"},
                    {"data": "xray", "name": "xray"},
                    {"data": "mri", "name": "mri"},
                    {"data": "ct_scan", "name": "ct_scan"},
                    {"data": "ekg", "name": "ekg"},
                    {"data": "echo", "name": "echo"}
                ]'
              nyaa-kode_transfer_internal="{{ $transfer_internal->kode_transfer_internal }}"
              class="w-100 table table-sm table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Aksi</th>
                  <th>Lab (lembar)</th>
                  <th>X-Ray (lembar)</th>
                  <th>MRI (lembar)</th>
                  <th>CT Scan (lembar)</th>
                  <th>EKG (lembar)</th>
                  <th>Echo (lembar)</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        @else
        <div class="col-sm-12">
          <div class="w-100">
            <table id="dttb_transfer_internal5" nyaa-urldatatable="{{ $url_form }}"
              nyaa-columns='[
                    {"data": "id", "name": "id"},
                    {"data": "lab", "name": "lab"},
                    {"data": "xray", "name": "xray"},
                    {"data": "mri", "name": "mri"},
                    {"data": "ct_scan", "name": "ct_scan"},
                    {"data": "ekg", "name": "ekg"},
                    {"data": "echo", "name": "echo"}
                ]'
              nyaa-kode_transfer_internal="{{ $transfer_internal->kode_transfer_internal }}"
              class="w-100 table table-sm table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Lab (lembar)</th>
                  <th>X-Ray (lembar)</th>
                  <th>MRI (lembar)</th>
                  <th>CT Scan (lembar)</th>
                  <th>EKG (lembar)</th>
                  <th>Echo (lembar)</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@if ($type == 'terima' || $type == 'intensif')
<div class="container mt-3">
  <div class="card">
    <div class="card-header container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h3><b>KONFIRMASI TRANSFER INTERNAL</b></h3>
        </div>
        <div class="col-md-4 float-right">
          <button class="btn btn-info text-white" id="confirmTransfer" type="button">Konfirmasi Transfer Internal Pasien</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div id="ModalBase_orig_transferinternal_diagnostik" style="display:none!important;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pemeriksaan Diagnostik</h5>
        <button type="button" class="protecc close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <nyaatempform nyaatempid="dtf_i">

          <div class="row">
            <div class="col-sm-12">
              <div class="card-body pb-0">

                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Lab (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_lab" value="{{$transfer_internal->transfer_terima_lab}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>X-Ray (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_xray" value="{{$transfer_internal->transfer_terima_xray}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>MRI (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_mri" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>CT Scan (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_ct_scan" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group"><label>EKG (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_ekg" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Echo (lembar)</label>
                        <input type="text" class="form-control" nyaatempname="transfer_terima_echo" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <input nyaatempname="dt_mode" type="hidden">
                <input nyaatempname="dtid" type="hidden">

                <input nyaatempname="reg_no" value="{{ $reg }}" type="hidden">
                <input nyaatempname="med_rec" value="{{ $medrec }}" type="hidden">
                <input nyaatempname="kode_transfer_internal" value="{{ $transfer_internal->kode_transfer_internal }}" type="hidden">

              </div>
            </div>
          </div>

        </nyaatempform>
      </div>
      <div class="modal-footer">
        <button type="button" class="protecc btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="protecc btn btn-info" id="simpan-entry-data" nyaa-urlsimpan="{{ $url_form }}" onclick="neko_post_ajax($(this).attr('nyaa-urlsimpan'))">Simpan</button>
      </div>
    </div>
  </div>
</div>