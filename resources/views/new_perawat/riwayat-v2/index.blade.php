<div id="panel-riwayat">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="riwayat-assesment-awal-tab" data-toggle="tab" href="#riwayat-assesment-awal" role="tab" aria-controls="riwayat-assesment-awal" aria-selected="true">Assesment Awal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-edukasi-pasien-tab" data-toggle="tab" href="#riwayat-edukasi-pasien" role="tab" aria-controls="riwayat-edukasi-pasien" aria-selected="false">Edukasi Pasien</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-rekonsiliasi-obat-tab" data-toggle="tab" href="#riwayat-rekonsilasi-obat" role="tab" aria-controls="riwayat-rekonsilasi-obat" aria-selected="false">Rekonsiliasi Obat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-checklist-orientasi-tab" data-toggle="tab" href="#riwayat-checklist-orientasi" role="tab" aria-controls="riwayat-checklist-orientasi" aria-selected="false">Checklist Orientasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="riwayat-resiko-jatuh-tab" data-toggle="tab" href="#riwayat-resiko-jatuh" role="tab" aria-controls="riwayat-resiko-jatuh" aria-selected="false">Resiko Jatuh</a>
        </li>
        <li class="nav-item">
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
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="riwayat-assesment-awal" role="tabpanel" aria-labelledby="riwayat-assesment-awal-tab">
            @include('new_perawat.riwayat-v2.assesment_hari_ini')
        </div>
        <div class="tab-pane fade" id="riwayat-edukasi-pasien" role="tabpanel" aria-labelledby="riwayat-edukasi-pasien-tab">
            @include('new_perawat.riwayat-v2.edukasi_pasien.table-edukasi')
        </div>
        <div class="tab-pane fade" id="riwayat-rekonsilasi-obat" role="tabpanel" aria-labelledby="riwayat-rekonsilasi-obat-tab">
            @include('new_perawat.riwayat-v2.rekonsilasi_obat.table-rekon')
        </div>
        <div class="tab-pane fade" id="riwayat-checklist-orientasi" role="tabpanel" aria-labelledby="riwayat-checklist-orientasi-tab">
            @include('new_perawat.riwayat-v2.checklist_orientasi.table-check')
        </div>
        <div class="tab-pane fade" id="riwayat-resiko-jatuh" role="tabpanel" aria-labelledby="riwayat-resiko-jatuh-tab">
            @include('new_perawat.riwayat-v2.resiko_jatuh.index_table_resiko')
        </div>
        <div class="tab-pane fade" id="riwayat-soapdok" role="tabpanel" aria-labelledby="riwayat-soapdok-tab">
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
        </div>
    </div>
    @include('new_perawat.riwayat-v2.detail_cppt')
</div>
