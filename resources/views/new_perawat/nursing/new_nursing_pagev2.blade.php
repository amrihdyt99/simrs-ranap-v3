<ul class="nav nav-tabs" id="myTabNursing" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="baru-all-tab" data-toggle="tab" href="#baru-all" role="tab" aria-controls="baru-all" aria-selected="false">All</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="specialty-tab" data-toggle="tab" href="#specialty" role="tab" aria-controls="specialty" aria-selected="false">Specialty</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="fluid-balance-tab" data-toggle="tab" href="#fluid-balance" role="tab" aria-controls="fluid-balance" aria-selected="false">Fluid Balance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="oxygen-tab" data-toggle="tab" href="#oxygen" role="tab" aria-controls="oxygen" aria-selected="false">Oxygenation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="drugs-tab" data-toggle="tab" href="#drugs" role="tab" aria-controls="drugs" aria-selected="false">Drugs</a>
    </li>
</ul>
<div class="tab-content" id="myTabContentNursing">
    <div class="tab-pane fade show active" id="baru-all" role="tabpanel" aria-labelledby="baru-all-tab">
        @include('new_perawat.nursing.new_allv2',['reg_no'=>$registrationInap->reg_no])
    </div>

    <div class="tab-pane fade" id="specialty" role="tabpanel" aria-labelledby="specialty-tab">
        @include('perawat.pages.patient.nursing.specialty',['vitaldata'=>$vitaldata])
    </div>
    <div class="tab-pane fade" id="fluid-balance" role="tabpanel" aria-labelledby="fluid-balance-tab">
        @include('new_perawat.nursing.fluid_balance_form_baru',['dataTransfusi'=>$dataTransfusi,'dataFluidBalanceBaru'=>$dataFluidBalanceBaru])
    </div>
    <div class="tab-pane fade" id="oxygen" role="tabpanel" aria-labelledby="oxygen-tab">
        @include('perawat.pages.patient.nursing.oxygen')
    </div>
    <div class="tab-pane fade" id="drugs" role="tabpanel" aria-labelledby="drugs-tab">
        @include('new_perawat.nursing.new_prescribe',['obat'=>$obat,'obatdaridokter'=>$obatdaridokter,'datamypatient'=>$datamypatient])
    </div>

</div>

