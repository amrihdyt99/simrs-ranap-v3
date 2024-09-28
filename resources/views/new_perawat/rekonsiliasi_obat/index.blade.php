@empty($rekon_data)
@php
$rekon_data = optional((object)[]);
@endphp
@endempty

<h3 class="card-title">REKONSILIASI OBAT</h3>
<p>Diinformasi kepada farmasi saat pembuatan resep obat pertama</p>
<div class="container">
  <form id="formRekonsiliasiObat">
    <div class="card card-primary">
      <div class="card-header bg-secondary">
        <table class="w-100">
          <tbody>
            <tr>
              <td>
                <label class="card-title">Penggunaan obat sebelum admisi : </label>
              </td>
              <td>
                <input type="radio" id="rekon_penggunaan_obat_tidak" value="0" name="rekon_data[penggunaan_sebelum_admisi]" {{ $rekon_data->penggunaan_sebelum_admisi == 0 ? 'checked' : '' }}>
                <label for="rekon_penggunaan_obat_tidak">Tidak menggunakkan obat sebelum admisi</label>
              </td>
              <td>
                <input type="radio" id="rekon_penggunaan_obat_ya" value="1" name="rekon_data[penggunaan_sebelum_admisi]" {{ $rekon_data->penggunaan_sebelum_admisi == 1 ? 'checked' : '' }}>
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
            <table id="dt_rekonsiliasi_obat" class="table table-lg table-bordered nowrap" style="width:100%">
              <thead>
                <tr class="bg-primary text-white">
                  <th>Aksi</th>
                  <th>Nama Obat</th>
                  <th>Dosis</th>
                  <th>Frekuensi</th>
                  <th>Cara Pembelian</th>
                  <th>Waktu Pemberian Terakhir</th>
                  <th>Tindak Lanjut</th>
                  <th>Perubahan Aturan Pakai</th>
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
                    <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="rekon_data[time_ttd_dpjp]" value="">
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group row ">
                  <label for="inputPassword3" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                  <div class="input-group col-sm-8">
                    <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="rekon_data[time_ttd_farmasi]" value="">
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group row ">
                  <label for="inputPassword3" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                  <div class="input-group col-sm-8">
                    <input id="asper_khusus_abdomen" type="datetime-local" class="form-control text-sm" name="rekon_data[time_ttd_perawat]" value="{{ $rekon_data->time_ttd_perawat ?? '' }}">
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
                @if($rekon_data->ttd_dpjp != null)
                <div class="container">
                  <div class="row justify-content-center">
                    <img src="{{$rekon_data->ttd_dpjp}}" width="250" height="150" />
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
                    <input type="hidden" id="signature_dpjp" name="rekon_data[ttd_dpjp]">
                    <button type="button" id="clear_btn_dpjp" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                    <button type="button" id="save_ttd_dpjp" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                  </div>
                </div>
                @endif
              </td>
              <td>

                @if($rekon_data->ttd_farmasi != null)
                <div class="container">
                  <div class="row justify-content-center">
                    <img src="{{$rekon_data->ttd_farmasi}}" width="250" height="150" />
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
                    <input type="hidden" id="signature_ppds" name="rekon_data[ttd_farmasi]">
                    <button type="button" id="clear_btn_ppds" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                    <button type="button" id="save_ttd_ppds" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                  </div>
                </div>
                @endif
              </td>
              <td>
                @if ($rekon_data->ttd_perawat != null)
                <div class="container">
                  <div id="ttd_perawat_image" class="row justify-content-center">
                    <img id="perawat_signature_img" src="{{ $rekon_data->ttd_perawat }}" width="250" height="150" />
                    <p id="perawat_name">{{ $perawat->name }}</p>
                  </div>
                </div>
                @else
                @if (auth()->user()->level_user == 'perawat')
                <div class="container">
                  <div id="ttd_perawat_image" class="row justify-content-center d-none">
                    <input type="hidden" id="signature_perawat" name="rekon_data[ttd_perawat]">
                    <img id="perawat_signature_img" src="" width="250" height="150" />
                    <p id="perawat_name"></p>
                  </div>
                  <div id="signature_rekon_obat_perawat" class="text-center">
                    <button type="button" id="verif_perawat_btn" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Verifikasi</button>
                  </div>
                </div>
                @else
                <h6>Example heading <span class="badge bg-warning">Data belum diverifikasi oleh perawat</span></h6>
                @endif
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <div class="container mt-3">
          <button class="btn btn-primary" type="button" onclick="storeRekonsiliasiObat()">Simpan</button>
        </div>
      </div>
    </div>
  </form>



  <div class="modal" id="rekonModal" tabindex="-1" role="dialog">
    <form id="formRekonObatItem">
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
              <input type="text" class="form-control" name="obat[nama_obat]" id="nama_obat" required>
            </div>
            <div class="form-group">
              <label class="label-admisi">Dosis</label>
              <input type="text" class="form-control" name="obat[dosis]" id="dosis">
            </div>
            <div class="form-group">
              <label class="label-admisi">Frekuensi</label>
              <input type="text" class="form-control" name="obat[frekuensi]" id="frekuensi">
            </div>
            <div class="form-group">
              <label class="label-admisi">Cara Pemberian</label>
              <input type="text" class="form-control" name="obat[cara_beri]" id="cara_beri">
            </div>
            <div class="form-group">
              <label class="label-admisi">Waktu Pemberian Terakhir</label>
              <input type="datetime-local" class="form-control form-control-sm text-sm" name="obat[waktu_beri_terakhir]" id="waktu_beri_terakhir">
            </div>
            <div class="form-group">
              <label class="label-admisi">Tindak Lanjut</label><select name="obat[tindak_lanjut]" id="tindak_lanjut" class="form-control" required>
                <option value="">-- Pilih tindak lanjut --</option>
                <option value="Lanjut aturan pakai sama">Lanjut aturan pakai sama</option>
                <option value="Lanjut aturan pakai berubah">Lanjut aturan pakai berubah</option>
                <option value="Stop">Stop</option>
              </select>
            </div>
            <div class="form-group">
              <label class="label-admisi">Perubahan Aturan Pakai</label>
              <input type="text" class="form-control" name="obat[aturan_ubah_pakai]" id="aturan_ubah_pakai">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="newRekon" onclick="storeRekobObatItem()">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>