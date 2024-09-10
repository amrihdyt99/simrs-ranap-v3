<form id="neonatus_form">
  <h2 class="text-black">Pengkajian Awal Neonatus</h2>
  <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
  <hr>
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#pemeriksaan" role="tab"
        aria-controls="assesment_1" aria-selected="true">
        Pemeriksaan Fisik</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#daftar" role="tab"
        aria-controls="assesment_2" aria-selected="false">
        Skrinning Nyeri dan Kebutuhan Eliminasi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#skrinning" role="tab"
        aria-controls="assesment_3" aria-selected="false">
        Rekonsiliasi Obat</a>
    </li>
  </ul>

  <div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tab-assesment">
      <div id="pemeriksaan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="assesment_1_tab">
        @include('new_perawat.assesment.neonatus_tab.pemeriksaan_fisik')
      </div>
      <div id="daftar" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
        @include('new_perawat.assesment.neonatus_tab.skrinning_nyeri')
      </div>
      <div id="skrinning" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_3_tab">
        @include('new_perawat.assesment.neonatus_tab.rekonsiliasi_obat')
      </div>
    </div>
  </div>
</form>

<div class="modal" id="rekonModal" tabindex="-1" role="dialog">
  <form id="formRekonData">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Rekonsiliasi Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="label-admisi">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat" id="nama_obat" required>
          </div>
          <div class="form-group">
            <label class="label-admisi">Dosis</label>
            <input type="text" class="form-control" name="dosis" id="dosis">
          </div>
          <div class="form-group">
            <label class="label-admisi">Frekuensi</label>
            <input type="text" class="form-control" name="frekuensi" id="frekuensi">
          </div>
          <div class="form-group">
            <label class="label-admisi">Cara Pemberian</label>
            <input type="text" class="form-control" name="cara_beri" id="cara_beri">
          </div>
          <div class="form-group">
            <label class="label-admisi">Waktu Pemberian Terakhir</label>
            <input type="datetime-local" class="form-control form-control-sm text-sm" name="waktu_beri_terakhir" id="waktu_beri_terakhir">
          </div>
          <div class="form-group">
            <label class="label-admisi">Tindak Lanjut</label><select name="tindak_lanjut" id="tindak_lanjut" class="form-control" required>
              <option value="">-- Pilih tindak lanjut --</option>
              <option value="Lanjut aturan pakai sama">Lanjut aturan pakai sama</option>
              <option value="Lanjut aturan pakai berubah">Lanjut aturan pakai berubah</option>
              <option value="Stop">Stop</option>
            </select>
          </div>
          <div class="form-group">
            <label class="label-admisi">Perubahan Aturan Pakai</label>
            <input type="text" class="form-control" name="aturan_ubah_pakai" id="aturan_ubah_pakai">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="newRekon" onclick="submitFormRekonObat()">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>