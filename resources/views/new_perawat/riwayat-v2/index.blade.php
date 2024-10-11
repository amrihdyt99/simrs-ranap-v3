<div id="panel-riwayat">
    <ul class="nav nav-tabs border" id="myTab" role="tablist">
        <li class="nav-item" style="border: 1px solid;">
            <a class="nav-link active" id="riwayat-assesment-awal-tab" data-toggle="tab" href="#riwayat-assesment-awal" role="tab" aria-controls="riwayat-assesment-awal" aria-selected="true">Assesment Awal</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-edukasi-pasien-tab" data-toggle="tab" href="#riwayat-edukasi-pasien" role="tab" aria-controls="riwayat-edukasi-pasien" aria-selected="false">Edukasi Pasien</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-rekonsiliasi-obat-tab" data-toggle="tab" href="#riwayat-rekonsilasi-obat" role="tab" aria-controls="riwayat-rekonsilasi-obat" aria-selected="false">Rekonsiliasi Obat</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-checklist-orientasi-tab" data-toggle="tab" href="#riwayat-checklist-orientasi" role="tab" aria-controls="riwayat-checklist-orientasi" aria-selected="false">Checklist Orientasi</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-resiko-jatuh-tab" data-toggle="tab" href="#riwayat-resiko-jatuh" role="tab" aria-controls="riwayat-resiko-jatuh" aria-selected="false">Resiko Jatuh</a>
        </li>
        
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-nurse-note-tab" data-toggle="tab" href="#riwayat-nurse-note" role="tab" aria-controls="riwayat-nurse-note" aria-selected="false">Nurse Note</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-monitoring-news-tab" data-toggle="tab" href="#riwayat-monitoring-news" role="tab" aria-controls="riwayat-monitoring-news" aria-selected="false">Monitoring (NEWS)</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-fluid-balance-tab" data-toggle="tab" href="#riwayat-fluid-balance" role="tab" aria-controls="riwayat-fluid-balance" aria-selected="false">Fluid Balance</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-drug-tab" data-toggle="tab" href="#riwayat-drug" role="tab" aria-controls="riwayat-drug" aria-selected="false">Drug</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-transfusi-darah-tab" data-toggle="tab" href="#riwayat-transfusi-darah" role="tab" aria-controls="riwayat-transfusi-darah" aria-selected="false">Transfusi Darah</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-persetujuan-tab" data-toggle="tab" href="#riwayat-persetujuan" role="tab" aria-controls="riwayat-persetujuan" aria-selected="false">Persetujuan / Penolakan Tindakan Medis</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-case-manager-tab" data-toggle="tab" href="#riwayat-case-manager" role="tab" aria-controls="riwayat-case-manager" aria-selected="false">Case Manager</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-tf-internal-tab" data-toggle="tab" href="#riwayat-tf-internal" role="tab" aria-controls="riwayat-tf-internal" aria-selected="false">Transfer Internal</a>
        </li>
        <li class="nav-item" style="border: 1px solid;">
            <a class="nav-link" id="riwayat-cathlab-tab" data-toggle="tab" href="#riwayat-cathlab" role="tab" aria-controls="riwayat-cathlab" aria-selected="false">Cathlab</a>
        </li>
        {{-- <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-soapdok-tab" data-toggle="tab" href="#riwayat-soapdok" role="tab" aria-controls="riwayat-soapdok" aria-selected="false">Riwayat CPPT</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-asdok-tab" data-toggle="tab" href="#riwayat-asdok" role="tab" aria-controls="riwayat-asdok" aria-selected="false">Riwayat Asesmen Klinik</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-penunjang-tab" data-toggle="tab" href="#riwayat-penunjang" role="tab" aria-controls="riwayat-penunjang" aria-selected="false">Riwayat Penunjang</a>
        </li>
        <li class="nav-item"  style="border: 1px solid;">
            <a class="nav-link" id="riwayat-resume-tab" data-toggle="tab" href="#riwayat-resume" role="tab" aria-controls="riwayat-resume" aria-selected="false">Riwayat Resume</a>
        </li> --}}
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
        <div class="tab-pane fade" id="riwayat-nurse-note" role="tabpanel" aria-labelledby="riwayat-nurse-note-tab">
            @include('new_perawat.riwayat-v2.nursing_note.index_nurse_note')
        </div>
        <div class="tab-pane fade" id="riwayat-monitoring-news" role="tabpanel" aria-labelledby="riwayat-monitoring-news-tab">
            @include('new_perawat.riwayat-v2.moni-news.index_moni_news')
            @include('new_perawat.riwayat-v2.moni-news.detail_moni_news')
        </div>
        <div class="tab-pane fade" id="riwayat-fluid-balance" role="tabpanel" aria-labelledby="riwayat-fluid-balance-tab">
            @include('new_perawat.riwayat-v2.fluid_balance.index_fluid')
        </div>
        <div class="tab-pane fade" id="riwayat-drug" role="tabpanel" aria-labelledby="riwayat-drug-tab">
            @include('new_perawat.riwayat-v2.drug.index_drug')
        </div>
        <div class="tab-pane fade" id="riwayat-transfusi-darah" role="tabpanel" aria-labelledby="riwayat-transfusi-darah-tab">
            @include('new_perawat.riwayat-v2.monitoring_tranfusi_darah.index_moni_darah')
        </div>
        <div class="tab-pane fade" id="riwayat-persetujuan" role="tabpanel" aria-labelledby="riwayat-persetujuan-tab">
            @include('new_perawat.riwayat-v2.setuju_tolak_tindakan.index_setuju_tolak')
        </div>
        <div class="tab-pane fade" id="riwayat-case-manager" role="tabpanel" aria-labelledby="riwayat-case-manager-tab">
            @include('new_perawat.riwayat-v2.case_manager.index_case_m')
        </div>
        <div class="tab-pane fade" id="riwayat-tf-internal" role="tabpanel" aria-labelledby="riwayat-tf-internal-tab">
            @include('new_perawat.riwayat-v2.transfer_internal.index_tf_internal')
        </div>
        <div class="tab-pane fade" id="riwayat-cathlab" role="tabpanel" aria-labelledby="riwayat-cathlab-tab">
            @include('new_perawat.riwayat-v2.cathlab.index_cathlab')
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
    @include('new_perawat.riwayat-v2.detail_cppt')
</div>
