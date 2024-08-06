<h2 class="text-black">Pengkajian Obgyn</h2>
<h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
<hr>

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="obgyn_1-tab" data-toggle="tab" href="#obgyn_1" role="tab" aria-controls="obgyn_1-tab" aria-selected="false">
            Assesment Awal</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="obgyn_2-tab" data-toggle="tab" href="#obgyn_2" role="tab" aria-controls="obgyn_2-tab" aria-selected="false">
            Skor Sad Person</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_3-tab" data-toggle="tab" href="#obgyn_3" role="tab" aria-controls="obgyn_3-tab" aria-selected="false">
            Riwayat Menstruasi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_4-tab" data-toggle="tab" href="#obgyn_4" role="tab" aria-controls="obgyn_4-tab" aria-selected="false">
            Riwayat Perkawinan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_5-tab" data-toggle="tab" href="#obgyn_5" role="tab" aria-controls="obgyn_5-tab" aria-selected="false">
            Riwayat Kehamilan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_6-tab" data-toggle="tab" href="#obgyn_6" role="tab" aria-controls="obgyn_6-tab" aria-selected="false">
            Skrinning Gizi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_7-tab" data-toggle="tab" href="#obgyn_7" role="tab" aria-controls="obgyn_7-tab" aria-selected="false">
            Skala Wong Beker</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_8-tab" data-toggle="tab" href="#obgyn_8" role="tab" aria-controls="obgyn_8-tab" aria-selected="false">
            Behavior Pain Scale</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_9-tab" data-toggle="tab" href="#obgyn_9" role="tab" aria-controls="obgyn_9-tab" aria-selected="false">
            ADL</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_10-tab" data-toggle="tab" href="#obgyn_10" role="tab" aria-controls="obgyn_10-tab" aria-selected="false">
            Resiko Jatuh</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_11-tab" data-toggle="tab" href="#obgyn_11" role="tab" aria-controls="obgyn_11-tab" aria-selected="false">
            Pengkajian Kulit</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_12-tab" data-toggle="tab" href="#obgyn_12" role="tab" aria-controls="obgyn_12-tab" aria-selected="false">
            Kebutuhan Aktifitas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_13-tab" data-toggle="tab" href="#obgyn_13" role="tab" aria-controls="obgyn_13-tab" aria-selected="false">
            Nutrisi Cairan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_14-tab" data-toggle="tab" href="#obgyn_14" role="tab" aria-controls="obgyn_14-tab" aria-selected="false">
            Kebutuhan Eliminasi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link " id="obgyn_15-tab" data-toggle="tab" href="#obgyn_15" role="tab" aria-controls="obgyn_15-tab" aria-selected="false">
            Laporan Persalinan</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabobgyn">
        <div id="obgyn_1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="obgyn_1-tab">
            @include('new_perawat.obgyn.pengkajian_awal_bidan')
        </div>
        <div id="obgyn_2" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_2-tab">
            @include('new_perawat.obgyn.skor_sad_person')
        </div>
        <div id="obgyn_3" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_3-tab">
            @include('new_perawat.obgyn.riwayat_menstruasi')
        </div>
        <div id="obgyn_4" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_4-tab">
            @include('new_perawat.obgyn.status_perkawinan')
        </div>
        <div id="obgyn_5" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_5-tab">
            @include('new_perawat.obgyn.riwayat_kehamilan')
        </div>
        <div id="obgyn_6" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_6-tab">
            @include('new_perawat.obgyn.skrinning_gizi_obgyn')
        </div>
        <div id="obgyn_7" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_7-tab">
            @include('new_perawat.obgyn.skala_wong_baker')
        </div>
        <div id="obgyn_8" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_8-tab">
            @include('new_perawat.obgyn.behavior_pain_scale')
        </div>
        <div id="obgyn_9" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_9-tab">
            @include('new_perawat.obgyn.form_adl')
        </div>
        <div id="obgyn_10" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_10-tab">
            @include('new_perawat.obgyn.skrining_resiko_jatuh_obgyn')
        </div>
        <div id="obgyn_11" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_11-tab">
            @include('new_perawat.obgyn.pengkajian_kulit')
        </div>
        <div id="obgyn_12" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_12-tab">
            @include('new_perawat.obgyn.form_kebutuhan_aktifitas')
        </div>
        <div id="obgyn_13" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_13-tab">
            @include('new_perawat.obgyn.form_kebutuhan_nutrisi_cairan')
        </div>
        <div id="obgyn_14" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_14-tab">
            @include('new_perawat.obgyn.form_kebutuhan_eliminasi')
        </div>
        <div id="obgyn_15" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_15-tab">
            @include('new_perawat.obgyn.laporan_persalinan')
        </div>
    </div>

</div>
