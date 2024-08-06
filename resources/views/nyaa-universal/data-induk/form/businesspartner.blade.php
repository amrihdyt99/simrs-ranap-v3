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
            <p class="m-0">Kode *</p>
            <input name="BusinessPartnerCode" autocomplete="off" type="text" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Nama *</p>
            <input name="BusinessPartnerName" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Nama Singkat</p>
            <input name="ShortName" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Inisial</p>
            <input name="Initial" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak 1 Nama *</p>
            <input name="ContactPerson1Name" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak 1 No.HP *</p>
            <input name="ContactPerson1PhoneNo" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak 2 Nama</p>
            <input name="ContactPerson2Name" autocomplete="off" type="text" class="form-control">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">Kontak 2 No.HP</p>
            <input name="ContactPerson2PhoneNo" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">TaxRegistrant *</p>
            <select name="IsTaxRegistrant" class="form-control">
              <option value="0" selected>Tidak</option>
              <option value="1">Ya</option>
            </select>
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">TaxRegistrant No.</p>
            <input name="TaxRegistrantNo" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <p class="m-0">TermCode</p>
            <input name="TermCode" autocomplete="off" type="text" class="form-control">
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