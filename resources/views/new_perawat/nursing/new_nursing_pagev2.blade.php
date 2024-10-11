<ul class="nav nav-tabs" id="myTabNursing" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form-tab-pane" aria-selected="true">MONITORING NATIONAL EARLY WARNING SYSTEM (NEWS)</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history-tab-pane" aria-selected="false">History</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link active" id="baru-all-tab" data-toggle="tab" href="#baru-all" role="tab"
            aria-controls="baru-all" aria-selected="false">Specialty</a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" id="specialty-tab" data-toggle="tab" href="#specialty" role="tab"
            aria-controls="specialty" aria-selected="false">Specialty History</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" id="fluid-balance-tab" data-toggle="tab" href="#fluid-balance" role="tab"
            aria-controls="fluid-balance" aria-selected="false">Fluid Balance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="table-fluid-balance-tab" data-toggle="tab" href="#table-fluid-balance" role="tab"
            aria-controls="fluid-balance" aria-selected="false">Fluid Balance History</a>
    </li>
    <li class="nav-item">
        {{-- <a class="nav-link" id="oxygen-tab" data-toggle="tab" href="#oxygen" role="tab" aria-controls="oxygen" aria-selected="false">Oxygenation</a> --}}
    </li>
    <li class="nav-item">
        <a onclick="neko_refresh_datatable('dt_nursing_drugs')" class="nav-link" id="drugs-tab" data-toggle="tab" href="#drugs" role="tab" aria-controls="drugs"
            aria-selected="false">Drugs</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" id="drugs-old-tab" data-toggle="tab" href="#drugs-old" role="tab" aria-controls="drugs"
            aria-selected="false">Drugs</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" id="drugs-tab" data-toggle="tab" href="#drugstable" role="tab" aria-controls="drugs"
            aria-selected="false">Drugs History</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" id="drugs-tab" data-toggle="tab" href="#transfusi_darah_nursing" role="tab" aria-controls="drugs"
            aria-selected="false">Transfusi Darah</a>
    </li> --}}
</ul>
<div class="tab-content" id="myTabContentNursing">
    <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
        @include('new_perawat.monitoring_news.new_entry_news')
    </div>
    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
        @include('new_perawat.monitoring_news.history_entry_news')
    </div>
    <!-- <div class="tab-pane fade show active" id="baru-all" role="tabpanel" aria-labelledby="baru-all-tab">
        @include('new_perawat.nursing.new_allv2', ['reg_no' => $registrationInap->reg_no])
    </div>

    <div class="tab-pane fade" id="specialty" role="tabpanel" aria-labelledby="specialty-tab">
        @include('new_perawat.nursing.new_nursing_specialty', ['vitaldata' => $vitaldata])
    </div> -->
    <div class="tab-pane fade" id="fluid-balance" role="tabpanel" aria-labelledby="fluid-balance-tab">
        @include('new_perawat.nursing.fluid_balance_form_baru', [
        'dataTransfusi' => $dataTransfusi,
        'dataFluidBalanceBaru' => $dataFluidBalanceBaru,
        ])
    </div>
    <div class="tab-pane fade" id="table-fluid-balance" role="tabpanel" aria-labelledby="specialty-tab">
        @include('new_perawat.nursing.fluid_balance_table')
    </div>
    {{-- <div class="tab-pane fade" id="oxygen" role="tabpanel" aria-labelledby="oxygen-tab">
        @include('perawat.pages.patient.nursing.oxygen')
    </div> --}}
    <div class="tab-pane fade" id="drugs" role="tabpanel" aria-labelledby="drugs-tab">
        @include('new_perawat.nursing.v2.drugs', [
        'obat' => $obat,
        'obatdaridokter' => $obatdaridokter,
        'datamypatient' => $datamypatient,
        'reg_no' => $reg_no,
        ])
    </div>
    <!-- <div class="tab-pane fade" id="drugs-old" role="tabpanel" aria-labelledby="drugs-old-tab">
        @include('new_perawat.nursing.new_prescribe', [
        'obat' => $obat,
        'obatdaridokter' => $obatdaridokter,
        'datamypatient' => $datamypatient,
        ])
    </div> -->
    <div class="tab-pane fade" id="drugstable" role="tabpanel" aria-labelledby="drug-tab">
        @include('new_perawat.nursing.v2.histroy_drugs')
    </div>
    {{-- <div class="tab-pane fade" id="transfusi_darah_nursing" role="tabpanel" aria-labelledby="drug-tab">
        @include('new_perawat.nursing.transfusi_darah.index_transfusi_darah')
    </div> --}}

</div>

@include('new_perawat.monitoring_news.detail_news')
@include('new_perawat.nursing.v2.modal.add_drugs')
@include('new_perawat.nursing.v2.modal.add_drug_item')
@include('new_perawat.nursing.v2.modal.edit_drugs')
<script>
    $(document).ready(function() {
        function calculateTotalGCS() {
            var e = parseInt($('#data_e').val()) || 0;
            var v = parseInt($('#data_v').val()) || 0;
            var m = parseInt($('#data_m').val()) || 0;
            var total = e + v + m;
            $('#total_gcs').val(total);
        }

        $('#data_e, #data_v, #data_m').on('input', calculateTotalGCS);

        function calculateFluidBalance() {
            const transfusi = parseInt($('#jumlah_transfusi').val()) || 0;
            const minum = parseInt($('#minum').val()) || 0;
            const sonde = parseInt($('#sonde').val()) || 0;
            const urine = parseInt($('#urine').val()) || 0;
            const drain = parseInt($('#drain').val()) || 0;
            const iwlMuntah = parseInt($('#iwl_muntah').val()) || 0;

            const jumlahIntake = transfusi + minum + sonde;
            const jumlahOutput = urine + drain + iwlMuntah;
            const balance = jumlahIntake - jumlahOutput;

            $('#balance').val(balance);
        }

        $('#jumlah_transfusi, #minum, #sonde, #urine, #drain, #iwl_muntah').on('input', calculateFluidBalance);
    });
</script>