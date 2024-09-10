@empty($skrinning)
@php
$ttd = optional((object)[]);
@endphp
@endempty

<input id="rekon_obat_data" type="hidden" value="{{ $rekon_obat }}">
<h3 class="card-title">Rekonsiliasi Obat (diisi oleh dokter)</h3>
<p>Diinformasi kepada farmasi saat pembuatan resep obat pertama</p>
<div class="container">
  <div class="card card-primary">
    <div class="card-header bg-secondary">
      <table class="w-100">
        <tbody>
          <tr>
            <td>
              <label class="card-title">Penggunaan obat sebelum admisi : </label>
            </td>
            <td>
              <input type="radio" id="rekon_penggunaan_obat_tidak" value="0" name="ttd[penggunaan_sebelum_admisi]" {{ $ttd->penggunaan_sebelum_admisi==0 ? 'checked' : '' }}>
              <label for="rekon_penggunaan_obat_tidak">Tidak menggunakkan obat sebelum admisi</label>
            </td>
            <td>
              <input type="radio" id="rekon_penggunaan_obat_ya" value="1" name="ttd[penggunaan_sebelum_admisi]" {{ $ttd->penggunaan_sebelum_admisi==1 ? 'checked' : '' }}>
              <label for="rekon_penggunaan_obat_ya">Ya, dengan rincian sebagai berikut</label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-header bg-secondary text-center">
      <h3 class="card-title">REKONSILIASI OBAT SAAT ADMISI</h3>
      <p>Daftar obat dibawah ini meliputi obat Resep dan Non Resep <br> yang digunakan sebulan terakhir dan masih dipakai saat masuk rumah sakit</p>
      <p>Instruksi obat baru dituliskan pada instruksi farmakologis</p>
      <br>
      <p>Review kembali saat pasien pulang</p>
    </div>
    <div class="card-body">
      <div class="col-lg-12 mb-3">
        <div class="btn-group mb-3">
          <button type="button" class="btn btn-warning btn-add-row" data-toggle="modal" data-target="#rekonModal">
            <i class="fa fa-plus"></i>
            Tambah Rekonsiliasi Obat
          </button>
        </div>
        <div class="table-responsive">
          <table id="dt-rekon-obat" class="table table-lg table-bordered nowrap w-100">
            <thead>
              <tr>
                <th>Nama Obat &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</th>
                <th>Dosis &emsp; &emsp; &emsp; &emsp; &emsp;</th>
                <th>Frekuensi &emsp; &emsp; &emsp; &emsp; </th>
                <th>Cara Pembelian &emsp; &emsp;</th>
                <th>Waktu Pemberian Terakhir &emsp; &emsp; &emsp;</th>
                <th>Tindak Lanjut &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;</th>
                <th>Perubahan Aturan Pakai &emsp; &emsp; &emsp;</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>

      <table class="w-100 mt-5" border="1">
        <tbody>
          <tr>
            <td>
              <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                <div class="input-group col-sm-8">
                  <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="ttd[time_ttd_dpjp]" value="{{ $ttd->time_ttd_dpjp }}">
                </div>
              </div>
            </td>
            <td>
              <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                <div class="input-group col-sm-8">
                  <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="ttd[time_ttd_ppds]" value="{{ $ttd->time_ttd_ppds }}">
                </div>
              </div>
            </td>
            <td>
              <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                <div class="input-group col-sm-8">
                  <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="ttd[time_ttd_perawat]" value="{{ $ttd->time_ttd_perawat }}">
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="container text-center">
                <p>DPJP yang melakukan pengkajian</p>
              </div>
            </td>
            <td>
              <div class="container text-center">
                <p>PPDS yang melakukan pengkajian</p>
              </div>
            </td>
            <td>
              <div class="container text-center">
                <p>Perawat yang melakukan pengkajian</p>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              @if($ttd->ttd_dpjp != null)
              <div class="container">
                <div class="row justify-content-center">
                  <img src="{{$ttd->ttd_dpjp}}" width="250" height="150" />
                </div>
              </div>
              @else

              <div id="signature_rekon_obat_dpjp" class="text-center">
                <div class="container">
                  <div class="row justify-content-center">
                    <div style="border:solid 1px teal; width:260px;height:160px;padding:3px;position:relative;">
                      <canvas id="the_canvas" width="250px" height="150px">Your browser does not support the HTML canvas tag.</canvas>
                    </div>
                  </div>
                </div>
                <div style="margin:10px;">
                  <input type="hidden" id="signature_dpjp" name="ttd[ttd_dpjp]">
                  <button type="button" id="clear_btn_dpjp" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                  <button type="button" id="save_ttd_dpjp" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                </div>
              </div>
              @endif
            </td>
            <td>

              @if($ttd->ttd_ppds != null)
              <div class="container">
                <div class="row justify-content-center">
                  <img src="{{$ttd->ttd_ppds}}" width="250" height="150" />
                </div>
              </div>
              @else
              <div id="signature_rekon_obat_ppds" class="text-center">
                <div class="container">
                  <div class="row justify-content-center">
                    <div style="border:solid 1px teal; width:260px;height:160px;padding:3px;position:relative;">
                      <canvas id="the_canvas_ppds" width="250px" height="150px">Your browser does not support the HTML canvas tag.</canvas>
                    </div>
                  </div>
                </div>
                <div style="margin:10px;">
                  <input type="hidden" id="signature_ppds" name="ttd[ttd_ppds]">
                  <button type="button" id="clear_btn_ppds" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                  <button type="button" id="save_ttd_ppds" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                </div>
              </div>
              @endif
            </td>
            <td>
              @if($ttd->ttd_perawat != null)
              <div class="container">
                <div class="row justify-content-center">
                  <img src="{{$ttd->ttd_perawat}}" width="250" height="150" />
                </div>
              </div>
              @else
              <div id="signature_rekon_obat_perawat" class="text-center">
                <div class="container">
                  <div class="row justify-content-center">
                    <div style="border:solid 1px teal; width:260px;height:160px;padding:3px;position:relative;">
                      <canvas id="the_canvas_perawat" width="250px" height="150px">Your browser does not support the HTML canvas tag.</canvas>
                    </div>
                  </div>
                </div>
                <div style="margin:10px;">
                  <input type="hidden" id="signature_perawat" name="ttd[ttd_perawat]">
                  <button type="button" id="clear_btn_perawat" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                  <button type="button" id="save_ttd_perawat" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                </div>
              </div>
              @endif
            </td>
          </tr>
        </tbody>
      </table>

      <div class="container mt-3">
        <button class="btn btn-primary" type="button" onclick="storeNeonatus()">Simpan</button>
      </div>
    </div>
  </div>
</div>