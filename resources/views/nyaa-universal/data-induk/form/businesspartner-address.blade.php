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
            <p class="m-0">Tipe Alamat *</p>
            <select name="GCAddressType" class="form-control">
              @foreach($nyaa_unfc->GCAddressType('uwu_ReturnAll') as $GCAddressType_key => $GCAddressType_val)
              <option value="{{ $GCAddressType_key }}" {{$loop->first?'selected':''}}>{{ $GCAddressType_val }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Jalan 1 *</p>
            <input name="Line1" autocomplete="off" type="text" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Desa/Kelurahan</p>
            <input name="Line2" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kecamatan</p>
            <input name="District" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kabupaten/Kota *</p>
            <input name="City" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Provinsi *</p>
            <input name="Province" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Negara *</p>
            <input name="Country" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">ZipCode</p>
            <input name="ZipCode" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak Telp.1</p>
            <input name="PhoneNo1" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak Telp.2</p>
            <input name="PhoneNo2" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak FAX.1</p>
            <input name="FaxNo1" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak FAX.2</p>
            <input name="FaxNo2" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak Email.1</p>
            <input name="Email1" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak Email.2</p>
            <input name="Email2" autocomplete="off" type="text" class="form-control">
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