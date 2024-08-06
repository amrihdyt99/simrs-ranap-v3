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
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabobgyn">
        <div id="obgyn_1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="obgyn_1-tab">
            @include('new_perawat.obgyn.pengkajian_awal_bidan')
        </div>
        <div id="obgyn_2" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_2-tab">
            @include('new_perawat.obgyn.skor_sad_person')
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
    </div>

</div>
