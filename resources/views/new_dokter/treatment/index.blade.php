<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item font-weight-bold">
        <a class="nav-link active" id="konsultasi-tab" data-toggle="tab" href="#konsultasi" role="tab" aria-controls="konsultasi" aria-selected="true">KONSULTASI</a>
    </li>
    <li class="nav-item font-weight-bold">
        <a class="nav-link" id="cpoe-tab" data-toggle="tab" href="#cpoe" role="tab" aria-controls="cpoe" aria-selected="false">CPOE</a>
    </li>
    <li class="nav-item font-weight-bold">
        <a class="nav-link" id="prescribe-tab" data-toggle="tab" href="#prescribe" role="tab" aria-controls="prescribe" aria-selected="false">E-PRESCRIPTION</a>
    </li>
</ul>
<div class="tab-content" id="myTabContents">
    <div class="tab-pane fade show active" id="konsultasi" role="tabpanel" aria-labelledby="konsultasi-tab">
        <h3 class="text-uppercase">Konsultasi Dokter Antar Poliklinik</h3>
        @include('new_dokter.treatment.konsultasi')
    </div>
    <div class="tab-pane fade" id="cpoe" role="tabpanel" aria-labelledby="cpoe-tab">
        <h3 class="text-uppercase">Order Tindakan Layanan Penunjang</h3>
        @include('new_dokter.treatment.cpoe')
    </div>
    <div class="tab-pane fade" id="prescribe" role="tabpanel" aria-labelledby="prescribe-tab">
        <h3 class="text-uppercase">Order Obat</h3>
        @include('new_dokter.treatment.prescribe')
    </div>
</div>