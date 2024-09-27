<h4 class="mt-3"><b>SKRINING GIZI</b></h4>
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
        <input type="radio" id="tidak_1" name="tampak_kurus" value="0" class="gizi_dewasa">
        <label for="tidak_1">0</label>
      </td>
    </tr>
    <tr>
      <td>b. Ya</td>
      <td>
        <input type="radio" id="ya_1" name="tampak_kurus" value="1" class="gizi_dewasa">
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
        <input type="radio" id="tidak_2" name="asper_penurunan_nafsu_dewasa" value="0" class="gizi_dewasa">
        <label for="tidak_2">0</label>
      </td>
    </tr>
    <tr>
      <td>b. Ya</td>
      <td>
        <input type="radio" id="ya_2" name="asper_penurunan_nafsu_dewasa" value="1" class="gizi_dewasa">
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
        <input type="radio" id="tidak_3" name="asper_pertambahan_bb_dewasa" value="0" class="gizi_dewasa">
        <label for="tidak_3">0</label>
      </td>
    </tr>
    <tr>
      <td>b. Ya</td>
      <td>
        <input type="radio" id="ya_3" name="asper_pertambahan_bb_dewasa" value="1" class="gizi_dewasa">
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
        <input type="radio" id="tidak_4" name="asper_nilai_hb_dewasa" value="0" class="gizi_dewasa">
        <label for="tidak_4">0</label>
      </td>
    </tr>
    <tr>
      <td>b. Ya</td>
      <td>
        <input type="radio" id="ya_4" name="asper_nilai_hb_dewasa" value="1" class="gizi_dewasa">
        <label for="ya_4">1</label>
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="">
        <p class="text-right"><b>Total Skor :</b></p>
      </td>
      <td><input type="text" class="form-control" name="asper_skor_dewasa" id="total_skor_dewasa" value="" readonly></td>
    </tr>
  </tfoot>
</table>

<div class="form-group row mt-3">
  <div class="col-sm-2">
    <label for="">Kategori</label>
  </div>
  <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="a" name="kategori_gizi">
      <label class="custom-control-label" for="a">A : 0-1 = Status gizi baik</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="b" name="kategori_gizi">
      <label class="custom-control-label" for="b">B : 2-3 = beresiko malnutrisi</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="c" name="kategori_gizi">
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
      <input type="radio" class="custom-control-input" id="ya_dietisien" name="dietisien">
      <label class="custom-control-label" for="ya_dietisien">Ya, pukul</label>
      <input type="time" class="form-control ml-2" name="tanggal_dietisien" style="width: 100px;">
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="tidak_dietisien" name="dietisien">
      <label class="custom-control-label" for="tidak_dietisien">Tidak</label>
    </div>
  </div>
  <label class="ml-3" for="">Catatan: Pasien dengan <b>B dan C</b> dilakukan Asesmen Lanjut oleh dietisien</label>
</div>