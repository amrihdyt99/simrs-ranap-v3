<h2 class="text-black">Pengkajian Awal Pasien Anak</h2>
<small class="text-danger">Harus dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap</small>
<hr>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#pemeriksaan" role="tab"
      aria-controls="assesment_1" aria-selected="true">
      Pengkajian Awal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#skrining_gizi" role="tab"
      aria-controls="assesment_2" aria-selected="true">
      Skrinning Gizi
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#skrining_nyeri" role="tab"
      aria-controls="assesment_3" aria-selected="true">
      Skrinning Nyeri</a>
  </li>
</ul>

<div class="text-black" style="font-size: 14px">
  <div class="tab-content" id="tab-assesment">
    <div id="pemeriksaan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="assesment_1_tab">
      @include('new_perawat.assesment.assesment_anak.anak_tab.pengkajian_awal')
    </div>
    <div id="skrining_gizi" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
      @include('new_perawat.assesment.assesment_anak.anak_tab.skrinning_gizi')
    </div>
    <div id="skrining_nyeri" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_3_tab">
      @include('new_perawat.assesment.assesment_anak.anak_tab.skrining_nyeri')
    </div>
  </div>
</div>