@empty($gizi)
@php
$gizi = optional((object)[]);
@endphp
@endempty

<form id="skrining_gizi_anak_form">
  <h4 class="mt-3"><b>SKRINING GIZI ANAK</b></h4>
  <input type="hidden" class="form-control" name="gizi[reg_no]" value="{{ $reg }}">
  <input type="hidden" class="form-control" name="gizi[med_rec]" value="{{ $medrec }}">
  <input type="hidden" class="form-control" name="username" value="{{ auth()->user()->username }}">
  <table class="table1 w-100">
    <thead>
      <tr>
        <th>Parameter</th>
        <th>Skor</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 800px;"><b>1. Apakah pasien tampak kurus ?</b></td>
        <td></td>
      </tr>
      <tr>
        <td>a. Tidak</td>
        <td>
          <input type="radio" id="tidak_1" name="gizi[tampak_kurus]" value="0" class="gizi_anak" {{ $gizi->tampak_kurus == 0 ? 'checked' : '' }}>
          <label for="tidak_1">0</label>
        </td>
      </tr>
      <tr>
        <td>b. Ya</td>
        <td>
          <input type="radio" id="ya_1" name="gizi[tampak_kurus]" value="1" class="gizi_anak" {{ $gizi->tampak_kurus == 1 ? 'checked' : '' }}>
          <label for="ya_1">1</label>
        </td>
      </tr>
      <tr>
        <td><b>2. Apakah terdapat penurunan BB selama satu bulan terakhir ? <br> (Berdasarkan penilaian objektif data BB bila ada atau penilaian subjektif orang tua pasien atau untuk bayi < 1 Tahun : BB tidak naik selama 3 bulan terakhir) </b>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>a. Tidak</td>
        <td>
          <input type="radio" id="tidak_2" name="gizi[penurunan_bb]" value="0" class="gizi_anak" {{ $gizi->penurunan_bb == 0 ? 'checked' : '' }}>
          <label for="tidak_2">0</label>
        </td>
      </tr>
      <tr>
        <td>b. Ya</td>
        <td>
          <input type="radio" id="ya_2" name="gizi[penurunan_bb]" value="1" class="gizi_anak" {{ $gizi->penurunan_bb == 1 ? 'checked' : '' }}>
          <label for="ya_2">1</label>
        </td>
      </tr>
      <tr>
        <td>
          <p><b>3. Apakah terdapat salah satu dari kondisi berikut ?</b></p>
          <p>
            <li>Diare &ge; 5 kali/hari atau muntah > 3 kali/hari dalam seminggu terakhir</li>
            <li>Asupan Makanan berkurang selama 1 minggu terakhir</li>
          </p>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>a. Tidak</td>
        <td>
          <input type="radio" id="tidak_3" name="gizi[kondisi_anak]" value="0" class="gizi_anak" {{ $gizi->kondisi_anak == 0 ? 'checked' : '' }}>
          <label for="tidak_3">0</label>
        </td>
      </tr>
      <tr>
        <td>b. Ya</td>
        <td>
          <input type="radio" id="ya_3" name="gizi[kondisi_anak]" value="1" class="gizi_anak" {{ $gizi->kondisi_anak == 1 ? 'checked' : '' }}>
          <label for="ya_3">1</label>
        </td>
      </tr>
      <tr>
        <td><b>4. Apakah terdapat penyakit atau keadaan yang mengakibatkan pasien beresiko mengalami malnutrisi ?</b>
        </td>
        <td></td>
      </tr>
      <tr>
        <td>a. Tidak</td>
        <td>
          <input type="radio" id="tidak_4" name="gizi[resiko_malnutrisi]" value="0" class="gizi_anak" {{ $gizi->resiko_malnutrisi == 0 ? 'checked' : '' }}>
          <label for="tidak_4">0</label>
        </td>
      </tr>
      <tr>
        <td>b. Ya</td>
        <td>
          <input type="radio" id="ya_4" name="gizi[resiko_malnutrisi]" value="1" class="gizi_anak" {{ $gizi->resiko_malnutrisi == 1 ? 'checked' : '' }}>
          <label for="ya_4">1</label>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="">
          <p class="text-right"><b>Total Skor :</b></p>
        </td>
        <td><input type="text" class="form-control" name="gizi[skor_gizi_anak]" id="total_skor_gizi_anak" value="{{ $gizi->skor_gizi_anak ?? 0 }}" readonly></td>
      </tr>
    </tfoot>
  </table>

  <div class="form-group row mt-3">
    <div class="col-sm-2">
      <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="a" name="gizi[kategori_gizi]" value="a" {{ $gizi->kategori_gizi == 'a' ? 'checked' : '' }}>
        <label class="custom-control-label" for="a">A : 0-1 = Status gizi baik</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="b" name="gizi[kategori_gizi]" value="b" {{ $gizi->kategori_gizi == 'b' ? 'checked' : '' }}>
        <label class="custom-control-label" for="b">B : 2-3 = beresiko malnutrisi</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="c" name="gizi[kategori_gizi]" value="c" {{ $gizi->kategori_gizi == 'c' ? 'checked' : '' }}>
        <label class="custom-control-label" for="c">C : 4 = Risiko malnutrisi Tinggi</label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-4">
      <label for="">Sudah dibaca dan diketahui oleh Dietisien</label>
    </div>
    <div class="col-sm-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="ya_dietisien" name="gizi[diketahui_dietisien]" value="1" {{ $gizi->diketahui_dietisien == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="ya_dietisien">Ya, pukul</label>
        <input type="time" class="form-control ml-2" name="gizi[diketahui_pukul]" style="width: 150px;" value="{{ $gizi->diketahui_pukul ?? '' }}">
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="tidak_dietisien" name="gizi[diketahui_dietisien]" value="0" {{ $gizi->diketahui_dietisien == 0 ? 'checked' : '' }}>
        <label class="custom-control-label" for="tidak_dietisien">Tidak</label>
      </div>
    </div>
    <label class="ml-3" for="">Catatan: Pasien dengan <b>B dan C</b> dilakukan Asesmen Lanjut oleh dietisien</label>
  </div>

  <hr style="border: rgb(90, 90, 90) 1px solid">
  <h4>Riwayat penyakit/ keadaan yang berisiko mengakibatkan malnutrisi :</h4>
  <hr>
  @php
  $data_malnutrisi=json_decode($gizi->sebab_malnutrisi)??[];
  @endphp
  <div class="row">
    <div class="col-lg-6">
      <ul style="list-style-type: none;">
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Diare Kronik (lebih dari 2 minggu)" {{ in_array('Diare Kronik (lebih dari 2 minggu)', $data_malnutrisi) ? 'checked' : '' }}> Diare Kronik (lebih dari 2 minggu)
        </li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="(Tersangka) Penyakit jantung bawaan" {{ in_array('(Tersangka) Penyakit jantung bawaan', $data_malnutrisi) ? 'checked' : '' }}> (Tersangka) Penyakit jantung
          bawaan
        </li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="(Tersangka) Infeksi Human Immunodeficiency Virus (HIV)" {{ in_array('(Tersangka) Infeksi Human Immunodeficiency Virus (HIV)', $data_malnutrisi) ? 'checked' : '' }}> (Tersangka)
          Infeksi
          Human
          Immunodeficiency Virus (HIV)</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="(Tersangka) Kanker" {{ in_array('(Tersangka) Kanker', $data_malnutrisi) ? 'checked' : '' }}>
          (Tersangka) Kanker</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="Penyakit hati kronik" {{ in_array('Penyakit hati kronik', $data_malnutrisi) ? 'checked' : '' }}>
          Penyakit
          hati kronik</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Penyakit ginjal kronik" {{ in_array('Penyakit ginjal kronik', $data_malnutrisi) ? 'checked' : '' }}>
          Penyakit ginjal kronik</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="TB Paru" {{ in_array('TB Paru', $data_malnutrisi) ? 'checked' : '' }}> TB Paru
        </li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="Luka bakar luas" {{ in_array('Luka bakar luas', $data_malnutrisi) ? 'checked' : '' }}>
          Luka
          bakar
          luas</li>
        <li><input type="text" name="gizi[sebab_malnutrisi_lain]" class="form-control"
            placeholder="Lain-lain (berdasarkan pertimbangan dokter)" value="{{$gizi->sebab_malnutrisi_lain}}"></li>
      </ul>
    </div>
    <div class="col-lg-6">
      <ul style="list-style-type: none;">
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir sumbing)" {{ in_array('Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir sumbing)', $data_malnutrisi) ? 'checked' : '' }}>
          Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir
          sumbing)
        </li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="Trauma" {{ in_array('Trauma', $data_malnutrisi) ? 'checked' : '' }}> Trauma
        </li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Kelainan metabolik bawaan (inborn error matabolism)" {{ in_array('Kelainan metabolik bawaan (inborn error matabolism)', $data_malnutrisi) ? 'checked' : '' }}> Kelainan metabolik
          bawaan
          (inborn error matabolism)</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="Retardasi mental" {{ in_array('Retardasi mental', $data_malnutrisi) ? 'checked' : '' }}>
          Retardasi
          mental</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Keterlambatan perkembangan" {{ in_array('Keterlambatan perkembangan', $data_malnutrisi) ? 'checked' : '' }}>
          Keterlambatan perkembangan</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Rencana/paska operasi mayor" {{ in_array('Rencana/paska operasi mayor', $data_malnutrisi) ? 'checked' : '' }}>
          Rencana/paska operasi mayor</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]" value="Terpasang stoma" {{ in_array('Terpasang stoma', $data_malnutrisi) ? 'checked' : '' }}>
          Terpasang
          stoma</li>
        <li><input type="checkbox" name="gizi[sebab_malnutrisi][]"
            value="Tidak ada riwayat penyakit" {{ in_array('Tidak ada riwayat penyakit', $data_malnutrisi) ? 'checked' : '' }}>
          Tidak ada riwayat penyakit</li>
      </ul>
    </div>
  </div>


  <hr>
  <div class="container mt-3">
    <button class="btn btn-primary" type="button" onclick="storeSkriningGiziAnak()">Simpan</button>
  </div>
</form>

<script>
  $('.gizi_anak').change(function() {
    let total_skor = 0
    // Iterate over each radio button group
    $('.gizi_anak:checked').each(function() {
      total_skor += parseInt($(this).val());
    });
    $('#total_skor_gizi_anak').val(total_skor);
  })
</script>