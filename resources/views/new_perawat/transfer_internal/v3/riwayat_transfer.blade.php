<div class="container">
  <div class="card">
    <div class="card-header container-fluid">
      <div class="row">
        @if ($cek_transfer_ongoing > 0)
        <div class="col-md-9">
          <h3><b>TRANSFER INTERNAL</b></h3>
        </div>
        <div class="col-md-3 float-right">
          <button class="btn btn-success" id="btnSerahTerimaTfInternal"><i class="fas fa-user-check"></i> Terima Transfer Pasien</button>
        </div>
        @else
        <div class="col-md-7">
          <h3><b>TRANSFER INTERNAL</b></h3>
        </div>
        <div class="col-md-5 float-right">
          <div class="btn-group" role="group">
            <button class="btn btn-primary" id="btnCreateTfInternal"><i class="fas fa-user-plus"></i> Lakukan Transfer Internal</button>
            <button class="btn btn-success" id="btnSerahTerimaTfInternal"><i class="fas fa-user-check"></i> Terima Transfer Pasien</button>
          </div>
        </div>
        @endif
      </div>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="card-header container-fluid">
          <h5><b>RIWAYAT TRANSFER INTERNAL</b></h5>
        </div>
        <div class=" card-body">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table id="dt_riwayat_transfer" class="table table-lg table-bordered nowrap" style="width:100%">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>No. Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>No. Rekam Medis</th>
                    <th>Unit Asal</th>
                    <th>Unit Tujuan</th>
                    <th>Waktu Menghubungi</th>
                    <th>Waktu Transfer</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>