<div id="panel-riwayat">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="baru-asper-tab" data-toggle="tab" href="#baru-asper" role="tab" aria-controls="baru-asper" aria-selected="false">Assesmen Klinik Hari Ini</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" id="riwayat-soapdok-tab" data-toggle="tab" href="#riwayat-soapdok" role="tab" aria-controls="riwayat-soapdok" aria-selected="false">Riwayat CPPT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-asdok-tab" data-toggle="tab" href="#riwayat-asdok" role="tab" aria-controls="riwayat-asdok" aria-selected="false">Riwayat Asesmen Klinik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-penunjang-tab" data-toggle="tab" href="#riwayat-penunjang" role="tab" aria-controls="riwayat-penunjang" aria-selected="false">Riwayat Penunjang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-resume-tab" data-toggle="tab" href="#riwayat-resume" role="tab" aria-controls="riwayat-resume" aria-selected="false">Riwayat Resume</a>
        </li> --}}
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="baru-asper" role="tabpanel" aria-labelledby="baru-asper-tab">
            @include('new_perawat.riwayat-v2.assesment_hari_ini')
        </div>
        {{-- <div class="tab-pane fade" id="riwayat-soapdok" role="tabpanel" aria-labelledby="riwayat-soapdok-tab">
            @include('new_perawat.riwayat-v2.riwayat_cppt')
        </div>
        <div class="tab-pane fade" id="riwayat-asdok" role="tabpanel" aria-labelledby="riwayat-asdok-tab">
            @include('new_perawat.riwayat-v2.assesment_klinik')
        </div>
        <div class="tab-pane fade" id="riwayat-penunjang" role="tabpanel" aria-labelledby="riwayat-penunjang-tab">
            @include('new_perawat.riwayat-v2.riwayat_penunjang')
        </div>
        <div class="tab-pane fade" id="riwayat-resume" role="tabpanel" aria-labelledby="riwayat-resume-tab">
            @include('new_perawat.riwayat-v2.riwayat_resume')
        </div> --}}
    </div>
    {{-- @include('new_perawat.riwayat-v2.detail_cppt') --}}
</div>
