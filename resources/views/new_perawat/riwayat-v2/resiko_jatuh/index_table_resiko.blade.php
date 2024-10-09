@if ($data_pasien->kategori_pasien == 'dewasa')
<ul class="nav nav-tabs" id="kategoriPasienTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#dewasa" role="tab">Resiko Jatuh Dewasa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#geriatri" role="tab">Resiko Jatuh Geriatri</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="dewasa" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.morse.table_morse')
        @include('new_perawat.riwayat-v2.resiko_jatuh.morse.show-morse')
    </div>
    <div class="tab-pane fade" id="geriatri" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.geriatri.table_geriatri')
    </div>
</div>
@endif

@if ($data_pasien->kategori_pasien == 'kebidanan')
<ul class="nav nav-tabs" id="kategoriPasienTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#dewasa" role="tab">Resiko Jatuh Dewasa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#geriatri" role="tab">Resiko Jatuh Geriatri</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="dewasa" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.morse.table_morse')
        @include('new_perawat.riwayat-v2.resiko_jatuh.morse.show-morse')
    </div>
    <div class="tab-pane fade" id="geriatri" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.geriatri.table_geriatri')
    </div>
</div>
@endif

@if ($data_pasien->kategori_pasien == 'anak')
<ul class="nav nav-tabs" id="kategoriPasienTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#humpty" role="tab">Resiko Jatuh Humpty Dumpty</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#geriatri" role="tab">Resiko Jatuh Geriatri</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="humpty" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.humpty.table_humpty')
    </div>
    <div class="tab-pane fade" id="geriatri" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.geriatri.table_geriatri')
    </div>
</div>
@endif

@if ($data_pasien->kategori_pasien == 'bayi')
<ul class="nav nav-tabs" id="kategoriPasienTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#bayi" role="tab">Resiko Jatuh Neonatus</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade" id="bayi" role="tabpanel">
        @include('new_perawat.riwayat-v2.resiko_jatuh.neonatus.table_neonatus')
    </div>
</div>
@endif

