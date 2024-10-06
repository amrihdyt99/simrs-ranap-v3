@empty($skrinning)
@php
$skrinning = optional((object)[]);
@endphp
@endempty

<div class="container">
  <div class="card card-primary">
    <div class="card-header bg-secondary">
      <h3 class="card-title">SKRINING NYERI (diisi oleh perawat / bidan)</h3>
      <div class="form-check">
        <input type="checkbox" id="bahasa_indonesia" name="skrinning[skala_nips]" value="1" {{ $skrinning->skala_nips==1 ? 'checked' : '' }}>
        <label for="bahasa_indonesia">Skala NIPS (Neonatus Infants Pain Scale)</label>
      </div>
    </div>
    <div class="card-body">
      <table class="table1 w-100">
        <thead>
          <tr>
            <th scope=" col" colspan="2">Parameter</th>
            <th scope="col">Points</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="2">Ekspresi Wajah</td>
            <td>Santai</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_ekspresi" value="0" name="skrinning[ekspresi]" {{ $skrinning->ekspresi==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_ekspresi">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Meringis</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_ekspresi" value="1" name="skrinning[ekspresi]" {{ $skrinning->ekspresi==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_ekspresi">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="3">Menangis</td>
            <td>Tidak Menangis</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_menangis" value="0" name="skrinning[menangis]" {{ $skrinning->menangis==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_menangis">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Merengek</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_merengek" value="1" name="skrinning[menangis]" {{ $skrinning->menangis==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_merengek">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Menangis Kuat</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="dua_merengek" value="2" name="skrinning[menangis]" {{ $skrinning->menangis==2 ? 'checked' : '' }}>
                <label class="custom-control-label" for="dua_merengek">2</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="2">Pola Bernafas</td>
            <td>Santai</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_pola_nafas" value="0" name="skrinning[pola_nafas]" {{ $skrinning->pola_nafas==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_pola_nafas">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Perubahan bernafas</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_pola_nafas" value="1" name="skrinning[pola_nafas]" {{ $skrinning->pola_nafas==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_pola_nafas">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="2">Lengan</td>
            <td>Santai</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_lengan" value="0" name="skrinning[lengan]" {{ $skrinning->lengan==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_lengan">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Fleksi / Extensi</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_lengan" value="1" name="skrinning[lengan]" {{ $skrinning->lengan==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_lengan">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="2">Kaki</td>
            <td>Santai</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_kaki" value="0" name="skrinning[kaki]" {{ $skrinning->kaki==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_kaki">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Fleksi / Extensi</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_kaki" value="1" name="skrinning[kaki]" {{ $skrinning->kaki==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_kaki">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="2">Keadaan rangsangan</td>
            <td>Tertidur / bangun</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_rangsangan_1" value="0" name="skrinning[rangsangan]" {{ $skrinning->rangsangan==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_rangsangan_1">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Rewel</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_rangsangan_2" value="1" name="skrinning[rangsangan]" {{ $skrinning->rangsangan==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_rangsangan_2">1</label>
              </div>
            </td>
          </tr>
      </table>
      <h5 class="m-2">Pada bayi prematur, ditambahkan dua parameter lagi yaitu heart rate dan saturasi oksigen</h5>
      <table class="table1 w-100" border="1">
        <tbody>
          <tr>
            <td rowspan="3">Heart Rate</td>
            <td>10% dari baseline</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_heart_rate" value="0" name="skrinning[heart_rate]" {{ $skrinning->heart_rate==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_heart_rate">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>11-20% dari baseline</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_heart_rate" value="1" name="skrinning[heart_rate]" {{ $skrinning->heart_rate==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_heart_rate">1</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>>20% dari baseline</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="dua_heart_rate" value="2" name="skrinning[heart_rate]" {{ $skrinning->heart_rate==2 ? 'checked' : '' }}>
                <label class="custom-control-label" for="dua_heart_rate">2</label>
              </div>
            </td>
          </tr>
          <tr>
            <td rowspan="2">Saturasi Oksigen</td>
            <td>Tidak diperlukan oksigen tambahan</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="nol_saturasi" value="0" name="skrinning[saturasi_oksigen]" {{ $skrinning->saturasi_oksigen==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="nol_saturasi">0</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Penambahan oksigen diperlukan</td>
            <td>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="satu_saturasi" value="1" name="skrinning[saturasi_oksigen]" {{ $skrinning->saturasi_oksigen==1 ? 'checked' : '' }}>
                <label class="custom-control-label" for="satu_saturasi">1</label>
              </div>
            </td>
          </tr>
          <tr>
        </tbody>
      </table>
      <h5 class="">Pengkajian Kebutuhan Eliminasi (Diisi oleh perawat / bidan)</h5>
      <div class="form-group row ">
        <label for="inputPassword3" class="col-sm-4 col-form-label">Frekuensi BAB</label>
        <div class="col-sm-5">
          <div class="form-group">
            <div class="input-group input-group-sm">
              <input type="number" name="skrinning[frekuensi_bab]" class="form-control" value="{{ $skrinning->frekuensi_bab }}">
              <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">/hari</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <input type="checkbox" id="bahasa_indonesia" name="skrinning[frekuensi_bab_no]" value="Tidak dapat dikaji" {{ $skrinning->saturasi_oksigen=="Tidak dapat dikaji" ? 'checked' : '' }}>
          <label for="bahasa_indonesia">Tidak dapat dikaji</label>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-form-label col-sm-4 ptx-0 pt-1">Gangguan BAB</label>
          <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="gangguan_bab_no" value="Tidak ada" name="skrinning[gangguan_bab]" {{ $skrinning->gangguan_bab=="Tidak ada" ? 'checked' : '' }}>
              <label class="custom-control-label" for="gangguan_bab_no">Tidak ada</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="gangguan_bab_pendarahan" value="Pendarahan" name="skrinning[gangguan_bab]" {{ $skrinning->gangguan_bab=="Pendarahan" ? 'checked' : '' }}>
              <label class="custom-control-label" for="gangguan_bab_pendarahan">Pendarahan</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="gangguang_bab_diare" value="Diare" name="skrinning[gangguan_bab]" {{ $skrinning->gangguan_bab=="Diare" ? 'checked' : '' }}>
              <label class="custom-control-label" for="gangguang_bab_diare">Diare</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="gangguan_bab_lainnya" value="Lainnya" name="skrinning[gangguan_bab]" {{ $skrinning->gangguan_bab=="Lainnya" ? 'checked' : '' }}>
              <label class="custom-control-label" for="gangguan_bab_lainnya">Lainnya</label>
            </div>
            <input type="text" class="form-control" name="skrinning[gangguan_bab_ket]" value="{{ $skrinning->gangguan_bab_ket }}" placeholder="Lainnya...">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-form-label col-sm-4 ptx-0 pt-1">Karakteristik BAB</label>
          <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="karakter_bab_kuat" value="Kuat" name="skrinning[karakter_bab]" {{ $skrinning->karakter_bab=="Kuat" ? 'checked' : '' }}>
              <label class="custom-control-label" for="karakter_bab_kuat">Padat</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="karakter_bab_sedang" value="Lunak" name="skrinning[karakter_bab]" {{ $skrinning->karakter_bab=="Lunak" ? 'checked' : '' }}>
              <label class="custom-control-label" for="karakter_bab_sedang">Lunak</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="karakter_bab_cair" value="Cair" name="skrinning[karakter_bab]" {{ $skrinning->karakter_bab=="Cair" ? 'checked' : '' }}>
              <label class="custom-control-label" for="karakter_bab_cair">Cair</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-form-label col-sm-4 ptx-0 pt-1">Frekuensi BAB</label>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <input type="number" class="form-control" name="skrinning[frekuensi_bab_hari]" value="{{ $skrinning->frekuensi_bab_hari }}" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                  <span class="input-group-text bg-primary text-white" style="padding: 5px;">/hari</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary text-white" style="padding: 5px;">Jumlah</span>
                </div>
                <input type="number" class="form-control" name="skrinning[frekuensi_bab_jumlah]" value="{{ $skrinning->frekuensi_bab_jumlah }}" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                  <span class="input-group-text bg-primary text-white" style="padding: 5px;">Cc/Jam</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-4 col-form-label">Warna feces</label>
        <div class="input-group col-sm-8">
          <input id="warna_feces" type="text" class="form-control" name="skrinning[warna_feces]" value="{{ $skrinning->warna_feces }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-4 col-form-label">Warna urin</label>
        <div class="input-group col-sm-8">
          <input id="warna_urin" type="text" class="form-control" name="skrinning[warna_urin]" value="{{ $skrinning->warna_urin }}">
        </div>
      </div>
      <h5 class="mb-3">Pengkajian Kebutuhan Informasi Dan Edukasi (diisi oleh perawat / bidan)</h5>
      <div class="form-group row">
        <label class="col-form-label col-sm-4">Bahasa yang digunakan orang tua : </label>
        @php
        $bahasa=explode(', ',$skrinning->bahasa)??[];
        @endphp
        <div class="col-sm-8">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="indonesia" value="Indonesia" name="skrinning[bahasa][]" {{in_array('Indonesia',$bahasa) ? 'checked' : ''}}>
            <label class="custom-control-label" for="indonesia">Indonesia</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="inggris" value="Inggris" name="skrinning[bahasa][]" {{in_array('Inggris',$bahasa) ? 'checked' : ''}}>
            <label class="custom-control-label" for="inggris">Inggris</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="daerah" value="Daerah" name="skrinning[bahasa][]" {{in_array('Daerah',$bahasa) ? 'checked' : ''}}>
            <label class="custom-control-label" for="daerah">Daerah</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="bahasa_lain" value="Lain-lain" name="skrinning[bahasa][]" {{in_array('Lain-lain',$bahasa) ? 'checked' : ''}}>
            <label class="custom-control-label" for="bahasa_lain">Lain-lain</label>
          </div>
          <input id="bahasa_lain" type="text" class="form-control" name="skrinning[bahasa_lain]" placeholder="Lainnya..." value="{{ $skrinning->bahasa_lain }}">
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-form-label col-sm-4 ptx-0 pt-1">Kebutuhan penjermah</label>
          <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="penerjemah_ya" value="Ya" name="skrinning[penerjemah_ortu]" {{ $skrinning->penerjemah_ortu=="Ya" ? 'checked' : '' }}>
              <label class="custom-control-label" for="penerjemah_ya">Ya</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="penerjemah_tidak" value="Tidak" name="skrinning[penerjemah_ortu]" {{ $skrinning->penerjemah_ortu=="Tidak" ? 'checked' : '' }}>
              <label class="custom-control-label" for="penerjemah_tidak">Tidak</label>
            </div>
          </div>
        </div>
      </div>
      <h5 class="mb-3">Hambatan orang tua pasien : </h5>
      @php
      $hambatan=explode(', ',$skrinning->hambatan_ortu)??[];
      @endphp
      <div class="form-group">
      <div class="col-sm-12">
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_tidak_ada" value="Tidak Ada" name="skrinning[hambatan_ortu][]" {{in_array('Tidak Ada',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_tidak_ada">Tidak Ada</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_bahasa" value="Bahasa" name="skrinning[hambatan_ortu][]" {{in_array('Bahasa',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_bahasa">Bahasa</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_kognitif" value="Kognitif terbatas" name="skrinning[hambatan_ortu][]" {{in_array('Kognitif terbatas',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_kognitif">Kognitif terbatas</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_penglihatan" value="Penglihatan terganggu" name="skrinning[hambatan_ortu][]" {{in_array('Penglihatan terganggu',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_penglihatan">Penglihatan terganggu</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_budaya" value="Budaya/agama/spiritual" name="skrinning[hambatan_ortu][]" {{in_array('Budaya/agama/spiritual',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_budaya">Budaya/agama/spiritual</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="hambatan_emosional" value="Emosional" name="skrinning[hambatan_ortu][]" {{in_array('Emosional',$hambatan) ? 'checked' : ''}}>
          <label class="custom-control-label" for="hambatan_emosional">Emosional</label>
        </div>
        <div class="col-sm-12">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_pendengaran" value="Pendengaran terganggu" name="skrinning[hambatan_ortu][]" {{in_array('Pendengaran terganggu',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_pendengaran">Pendengaran terganggu</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_fisik" value="Fisik lemah" name="skrinning[hambatan_ortu][]" {{in_array('Fisik lemah',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_fisik">Fisik lemah</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_bicara" value="Gangguan bicara" name="skrinning[hambatan_ortu][]" {{in_array('Gangguan bicara',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_bicara">Gangguan bicara</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_motivasi" value="Motivasi kurang" name="skrinning[hambatan_ortu][]" {{in_array('Motivasi kurang',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_motivasi">Motivasi kurang</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_keyakinan" value="Keyakinan/mitos" name="skrinning[hambatan_ortu][]" {{in_array('Keyakinan/mitos',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_keyakinan">Keyakinan/mitos</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hambatan_lain" value="Lain-lain" name="skrinning[hambatan_ortu][]" {{in_array('Lain-lain',$hambatan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_lain">Lain-lain</label>
          </div>
        </div>
        <input id="[hambatan_ket]" type="text" class="form-control" name="skrinning[hambatan_ortu_lain]" value="{{ $skrinning->hambatan_ortu_lain }}" placeholder="Lainnya...">
      </div>
    </div>
      <h5 class="mt-3 mb-3">Kebutuhan edukasi orang tua pasien : (pilih topik perawat / bidan)</h5>
      @php
      $edukasi=explode(', ',$skrinning->edukasi_ortu)??[];
      @endphp
      <div class="form-group">
      <table class="w-100">
        <tbody>
          <tr>
            <td>
              <input type="checkbox" id="proses_penyakit" value="Proses penyakit" name="skrinning[edukasi_ortu][]" {{in_array('Proses penyakit',$edukasi) ? 'checked' : ''}}>
              <label for="proses_penyakit">Proses penyakit</label>
            </td>
            <td>
              <input type="checkbox" id="obat-obatan" value="Obat-obatan" name="skrinning[edukasi_ortu][]" {{in_array('Obat-obatan',$edukasi) ? 'checked' : ''}}>
              <label for="obat-obatan">Obat-obatan</label>
            </td>
            <td>
              <input type="checkbox" id="prosedur" value="Prosedur" name="skrinning[edukasi_ortu][]" {{in_array('Prosedur',$edukasi) ? 'checked' : ''}}>
              <label for="prosedur">Prosedur (contoh : cara perawatan luka)</label>
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" id="edukasi_pencegahan" value="Pencegahan faktor resiko" name="skrinning[edukasi_ortu][]" {{in_array('Pencegahan faktor resiko',$edukasi) ? 'checked' : ''}}>
              <label for="edukasi_pencegahan">Pencegahan faktor resiko</label>
            </td>
            <td>
              <input type="checkbox" id="manajemen_nyeri" value="Manajemen nyeri" name="skrinning[edukasi_ortu][]" {{in_array('Manajemen nyeri',$edukasi) ? 'checked' : ''}}>
              <label for="manajemen_nyeri">Manajemen nyeri</label>
            </td>
            <td>
              <input type="checkbox" id="diet_dan_nutrisi" value="Diet dan nutrisi" name="skrinning[edukasi_ortu][]" {{in_array('Diet dan nutrisi',$edukasi) ? 'checked' : ''}}>
              <label for="diet_dan_nutrisi">Diet dan nutrisi</label>
            </td>
          </tr>
          <tr>
            <td>
              <input type="checkbox" id="edukasi_lingkungan" value="Lingkungan yang perlu disiapkan pasca rawat" name="skrinning[edukasi_ortu][]" {{in_array('Lingkungan yang perlu disiapkan pasca rawat',$edukasi) ? 'checked' : ''}}>
              <label for="edukasi_lingkungan">Lingkungan yang perlu disiapkan pasca rawat</label>
            </td>
            <td>
              <input type="checkbox" id="edukasi_rehabilitasi" value="Rehabilitasi" name="skrinning[edukasi_ortu][]" {{in_array('Rehabilitasi',$edukasi) ? 'checked' : ''}}>
              <label for="edukasi_rehabilitasi">Rehabilitasi</label>
            </td>
            <td>
              <input type="checkbox" id="edukasi_lain" value="Lain-lain" name="skrinning[edukasi_ortu][]" {{in_array('Lain-lain',$edukasi) ? 'checked' : ''}}>
              <label for="edukasi_lain">Lain-lain</label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      <input id="edukasi_ket" type="text" class="form-control" name="skrinning[edukasi_ortu_ket]" placeholder="Lainnya..." value="{{ $skrinning->edukasi_ortu_ket }}">
      <hr>
      <div class="container mt-3">
        <button class="btn btn-primary" type="button" onclick="storeNeonatus()">Simpan</button>
      </div>
      <!-- <table class="w-100 mt-3" border="1">
        <tbody>
          <tr>
            <td>
              <div class="container">
                <p><b>Identitas orang tua/ Keluarga : </b></p>
                <p>Nama :</p>
                <p>Hubungan dengan pasien :</p>
              </div>
            </td>
            <td>
              <p><b>Tanda tangan persetujuan pernyataan</b></p>
              <p>Tanggal : <br><br><br><br></p>
              <p class="text-center">(.....................................................................)</p>
            </td>
          </tr>
        </tbody>
      </table> -->
    </div>
  </div>
</div>