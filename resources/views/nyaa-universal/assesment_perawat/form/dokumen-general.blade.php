
  <div class="row">
    <div class="col-sm-12">
      <div class="card-body pb-0">

        <input name="dt_mode" type="hidden">
        <input name="dtid" type="hidden">

        <input name="reg_no" value="{{ $reg }}" type="hidden">
        <input name="med_rec" value="{{ $medrec }}" type="hidden">

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Nama Dokumen *</p>
            <input name="nama_dokumen" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">File *</p>
            <input name="file_path" autocomplete="off" type="file" class="form-control">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-sm-12">
            <p class="m-0">Catatan</p>
            <input name="catatan" autocomplete="off" type="text" class="form-control">
          </div>
        </div>

      </div>
    </div>
  </div>