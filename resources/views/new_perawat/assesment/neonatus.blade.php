<form id="neonatus_form">
  <h2 class="text-black">Pengkajian Awal Neonatus</h2>
  <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
  <hr>
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    @if (Auth::user()->level_user == 'farmasi')
    <li class="nav-item">
      <a class="nav-link active" id="assesment_3_tab" data-toggle="tab" href="#skrinning" role="tab"
        aria-controls="assesment_3" aria-selected="true">
        Rekonsiliasi Obat</a>
    </li>
    @else
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
    @endif
  </ul>

  <div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tab-assesment">
      @if (Auth::user()->level_user != 'farmasi')
      <div id="pemeriksaan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="assesment_1_tab">
        @include('new_perawat.assesment.neonatus_tab.pemeriksaan_fisik')
      </div>
      <div id="daftar" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
        @include('new_perawat.assesment.neonatus_tab.skrinning_nyeri')
      </div>
      @endif
    </div>
  </div>
</form>