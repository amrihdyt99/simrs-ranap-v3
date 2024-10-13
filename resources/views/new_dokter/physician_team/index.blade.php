<h2 class="text-black">Physician Team Setting</h2>
<hr>
<form id="physician_team_dokter">
    <div class="text-black" style="font-size: 14px">
        <div class="form-group mt-3">
            <label for="" class="d-flex">
                <h4><b>Pilih Dokter</b></h4>
            </label>
            <select id="physician_kode_dokter" name="physician_kode_dokter" class="form-control">
                <option value="">-----Pilih Dokter-----</option>
                <option value="1">Dokter 1</option>
                <option value="2">Dokter 2</option>
                <option value="3">Dokter 3</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex">
                <h4><b>Pilih Kategori</b></h4>
            </label>
            <select id="physician_kategori" name="physician_kategori" class="form-control">
                <option value="Dokter Jaga">Dokter Jaga</option>
                <option value="Rawat Bersama">Rawat Bersama</option>
                <option value="Konsul">Konsul</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <button type="button" class="btn btn-primary" id="btn_tambah_team">Tambah</button>
        </div>
    </div>
    <br>
    <hr>
</form>

<h2 class="text-black">Physician Team</h2>
<hr>
<div class="form-group mt-3">
    <div class="">
        <table class="table1 table" id="list_physician_team_dokter">
            <thead class="bg-dark text-white">
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody id="table-physician-team-dokter">
            </tbody>
        </table>
    </div>
</div>

<h2 class="text-black mt-5">Konsul</h2>
<hr>
@php
$dokterKategori = DB::connection('mysql2')->table('m_physician_team')
    ->where('kode_dokter', auth()->user()->dokter_id)
    ->where('reg_no', $reg)
    ->pluck('kategori')
    ->toArray();
$isKonsul = in_array('Konsul', $dokterKategori);
@endphp

@if(!$isKonsul)
<div id="konsul-message" class="alert alert-info">
    Anda hanya dapat melihat data konsul. Untuk melakukan perubahan, silakan hubungi dokter konsul.
</div>
@endif

<table class="table table-bordered">
    <tr>
        <td><h4><b>Tanggal dan Isi Konsul</b></h4></td>
        <td>
            <input type="date" id="tanggal_konsul" name="tanggal_konsul" class="form-control mb-2" required {{ !$isKonsul ? 'readonly' : '' }}>
            <textarea id="isi_konsul" name="isi_konsul" class="form-control" rows="3" required {{ !$isKonsul ? 'readonly' : '' }}></textarea>
            @if($isKonsul)
            <button type="button" class="btn btn-primary mt-2" id="btn_simpan_isi_konsul">Simpan Konsul</button>
            @endif
        </td>
    </tr>
    <tr>
        <td><h4><b>Tanggal dan Jawaban Konsul</b></h4></td>
        <td>
            <input type="date" id="tanggal_jawaban_konsul" name="tanggal_jawaban_konsul" class="form-control mb-2" {{ !$isKonsul ? 'readonly' : '' }}>
            <textarea id="jawaban_konsul" name="jawaban_konsul" class="form-control" rows="3" {{ !$isKonsul ? 'readonly' : '' }}></textarea>
            @if($isKonsul)
            <button type="button" class="btn btn-primary mt-2" id="btn_simpan_jawaban_konsul">Simpan Jawaban Konsul</button>
            @endif
        </td>
    </tr>
</table>

<div class="modal fade" id="konsulModal" tabindex="-1" role="dialog" aria-labelledby="konsulModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="konsulModalLabel">Konsul Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="konsulDokterIdHidden">
        <div class="form-group">
          <label for="konsul_kode_dokter">Pilih Dokter Konsul</label>
          <select class="form-control" id="konsul_kode_dokter"></select>
        </div>
        <div class="form-group">
          <label for="konsul_catatan">Catatan</label>
          <textarea class="form-control" id="konsul_catatan" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="btn_simpan_konsul">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="catatanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="catatanModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="catatanModalBody">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

