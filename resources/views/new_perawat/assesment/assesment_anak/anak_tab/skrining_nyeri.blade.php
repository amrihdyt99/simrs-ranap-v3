<h4 class="mt-3"><b>SKRINING NYERI</b></h4>
<h4>Pilihlah salah satu penilaian nyeri dibawah ini : </h4>


<div class="row m-3">
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="customCheck1">
    <label class="custom-control-label" for="customCheck1">
      <h5><b>Skala Wong Baker (Anak > 5 Tahun)</b></h5>
    </label>
  </div>
</div>

<div class="row">
  <div id="img_skala">
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/1.jpg') }}" class="img_skala"
        data-value="0" width="50px" height="55px" style="display: block;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
        class="img_skala" data-value="1" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
        class="img_skala" data-value="2" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}"
        class="img_skala" data-value="3" width="50px" height="55px" style="display: none;" />
    </label>

    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala"
        data-value="4" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala"
        data-value="5" width="50px" height="55px" style="display: none;" />
    </label>

    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/4.jpg') }}" class="img_skala"
        data-value="6" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
        data-value="7" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
        data-value="8" width="50px" height="55px" style="display: none;" />
    </label>
    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala"
        data-value="9" width="50px" height="55px" style="display: none;" />
    </label>

    <label>
      <img src="{{ asset('drawimage/ekspresi_nyeri/6.jpg') }}" class="img_skala"
        data-value="10" width="50px" height="55px" style="display: none;" />
    </label>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="range-wrap">
      <input type="range" class="range" id="nyeri_skala" name="nyeri_skala" min="0"
        max="10" value="0" step="1" oninput="setSkala(this)" />
      <br />
      <label for=""></label>
      <output class="bubble" for="fader" id="skala">0 TIDAK NYERI</output>
    </div>
  </div>
</div>

<div class="form-group row mt-3">
  <div class="col-sm-4">
    <label for="status_emosional">Apakah pasien merasakan nyeri ?</label>
  </div>
  <div class="col-sm-8">
    <div class=<div class="row">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="rasa_nyeri_none" name="rasa_nyeri">
        <label class="custom-control-label" for="rasa_nyeri_none">Tidak</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="rasa_nyeri_yes" name="rasa_nyeri">
          <label class="custom-control-label" for="rasa_nyeri_yes">Ya :</label>
        </div>
      </div>
      <div class="col-sm-9">
        <label for="postnatal_kongenital">Lokasi</label>
        <input type="text" name="lokasi_nyeri" class="form-control" placeholder="detail lokasi nyeri....">
        <label for="postnatal_kongenital">Skala Nyeri</label>
        <input type="text" name="skala_nyeri" class="form-control" placeholder="detail skala nyeri....">
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2">
    <label for="">Durasi</label>
  </div>
  <div class="col-sm-10">
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="durasi_nyeri_akut" name="durasi_nyeri">
      <label class="custom-control-label" for="durasi_nyeri_akut">Akut</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="durasi_nyeri_kronik" name="durasi_nyeri">
      <label class="custom-control-label" for="durasi_nyeri_kronik">Kronik</label>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2">
    <label for="">Frekuensi</label>
  </div>
  <div class="col-sm-10">
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="frekuensi_intermiten" name="frekuensi_nyeri">
      <label class="custom-control-label" for="frekuensi_intermiten">Intermiten</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="frekuensi_terus" name="frekuensi_nyeri">
      <label class="custom-control-label" for="frekuensi_terus">Kronik</label>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2 mt-2">
    <label for="alergi_obat">Pencetus Nyeri</label>
  </div>
  <div class="col-sm-10 mt-2">
    <input type="text" id="pencetus_nyeri" name="pencetus_nyeri" class="form-control" placeholder="">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2">
    <label for="">Tipe Nyeri</label>
  </div>
  <div class="col-sm-10">
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="tipe_nyeri_tekanan" name="tipe_nyeri">
      <label class="custom-control-label" for="tipe_nyeri_tekanan">Tekanan</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="tipe_nyeri_tajam" name="tipe_nyeri">
      <label class="custom-control-label" for="tipe_nyeri_tajam">Tajam Tusukan</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="tipe_nyeri_mencekeram" name="tipe_nyeri">
      <label class="custom-control-label" for="tipe_nyeri_mencekeram">Mencengkeram</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="tipe_nyeri_melilit" name="tipe_nyeri">
      <label class="custom-control-label" for="tipe_nyeri_melilit">Melilit</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="tipe_nyeri_menjalar" name="tipe_nyeri">
      <label class="custom-control-label" for="tipe_nyeri_menjalar">Menjalar</label>
    </div>
    <input type="text" id="kondisi_lainnya_text" name="menjalar_detail" placeholder="detail menjalar..." class="form-control">
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-2">
    <label for="">Ekspresi Wajah</label>
  </div>
  <div class="col-sm-10">
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="ekspresi_wajah_tenang" name="ekspresi_wajah">
      <label class="custom-control-label" for="ekspresi_wajah_tenang">Tenang</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="ekspresi_wajah_meringis" name="ekspresi_wajah">
      <label class="custom-control-label" for="ekspresi_wajah_meringis">Meringis</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="ekspresi_wajah_menangis" name="ekspresi_wajah">
      <label class="custom-control-label" for="ekspresi_wajah_menangis">Menangis</label>
    </div>
    <div class="custom-control custom-checkbox custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="ekspresi_wajah_menjerit" name="ekspresi_wajah">
      <label class="custom-control-label" for="ekspresi_wajah_menjerit">Menjerit-jerit</label>
    </div>
  </div>
</div>

<hr>

<div class="row m-3">
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="customCheck1">
    <label class="custom-control-label" for="customCheck1">
      <h5><b>Skala FLACC (anak < 3 tahun dan / atau belum bisa bicara)</b>
      </h5>
    </label>
  </div>
</div>

<table class="table1 w-100 mt-3">
  <thead>
    <tr>
      <th colspan="2" width="700px" class="text-center">Kategori</th>
      <th>Skor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td rowspan="3">Wajah</td>
      <td>
        <li>Tidak ada ekspresi yang khusus (seperti tersenyum)</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="wajah_0" name="wajah" value="0" class="custom-control-input">
          <label class="custom-control-label" for="wajah_0">0</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Kadang meringis atau mengerutkan dahi, menarik diri</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="wajah_1" name="wajah" value="1" class="custom-control-input">
          <label class="custom-control-label" for="wajah_1">1</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Sering/terus-menerus mengerutkan dahi, rahang mengatup, dagu bergetar</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="wajah_2" name="wajah" value="2" class="custom-control-input">
          <label class="custom-control-label" for="wajah_2">2</label>
        </div>
      </td>
    </tr>
    <tr>
      <td rowspan="3">Ekstremitas</td>
      <td>
        <li>Posisi normal/rileks</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ekstremitas_0" name="ekstremitas" value="0" class="custom-control-input">
          <label class="custom-control-label" for="ekstremitas_0">0</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Tidak tenang, gelisah, tegang</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ekstremitas_1" name="ekstremitas" value="1" class="custom-control-input">
          <label class="custom-control-label" for="ekstremitas_1">1</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Menendang / menarik diri</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ekstremitas_2" name="ekstremitas" value="2" class="custom-control-input">
          <label class="custom-control-label" for="ekstremitas_2">2</label>
        </div>
      </td>
    </tr>
    <tr>
      <td rowspan="3">Gerakan</td>
      <td>
        <li>Berbaring tenang, posisi normal, bergerak mudah</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="gerakan_0" name="gerakan" value="0" class="custom-control-input">
          <label class="custom-control-label" for="gerakan_0">0</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Menggeliat-liat, bolak-balik, berpindah, tegang</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="gerakan_1" name="gerakan" value="1" class="custom-control-input">
          <label class="custom-control-label" for="gerakan_1">1</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Posisi tubuh meringkuk, kaku/spasme atau menyentak</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="gerakan_2" name="gerakan" value="2" class="custom-control-input">
          <label class="custom-control-label" for="gerakan_2">2</label>
        </div>
      </td>
    </tr>
    <tr>
      <td rowspan="3">Menangis</td>
      <td>
        <li>Tidak menangis</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="menangis_0" name="menangis" value="0" class="custom-control-input">
          <label class="custom-control-label" for="menangis_0">0</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Merintih, merengek, kadang mengeluh</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="menangis_1" name="menangis" value="1" class="custom-control-input">
          <label class="custom-control-label" for="menangis_1">1</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Menangis tersedu-sedu, terisak-isak, menjerit</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="menangis_2" name="menangis" value="2" class="custom-control-input">
          <label class="custom-control-label" for="menangis_2">2</label>
        </div>
      </td>
    </tr>
    <tr>
      <td rowspan="3">Kemampuan <br> ditenangkan</td>
      <td>
        <li>Senang, rileks</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ketenangan_0" name="ketenangan" value="0" class="custom-control-input">
          <label class="custom-control-label" for="ketenangan_0">0</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Dapat ditenangkan dengan sentuhan, pelukan, atau bicara, dapat dialihkan</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ketenangan_1" name="ketenangan" value="1" class="custom-control-input">
          <label class="custom-control-label" for="ketenangan_1">1</label>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <li>Sulit/tidak dapat ditenangkan dengan pelukan, sentuhan atau distraksi</li>
      </td>
      <td>
        <div class="custom-control custom-radio">
          <input type="radio" id="ketenangan_2" name="ketenangan" value="2" class="custom-control-input">
          <label class="custom-control-label" for="ketenangan_2">2</label>
        </div>
      </td>
    </tr>
  </tbody>
</table>

<div class="mt-2">
  <p>Interprestasi hasil skala FLACC adalah relaks dari nyaman (0), ketidaknyaman ringan (1-3), ketidaknyamanan sedang (4-6) dan ketidaknyamanan berat atau nyeri atau keduanya (7-10).</p>
</div>