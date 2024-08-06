<form id="entry_asesmen">
    <h2 class="text-black">Pengkajian Awal Pasien</h2>
    <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
    <hr>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#pemeriksaan" role="tab"
                aria-controls="assesment_1" aria-selected="true">
                Pemeriksaan Fisik Umum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#daftar" role="tab"
                aria-controls="assesment_2" aria-selected="false">
                Daftar Masalah Keperawatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#skrinning" role="tab"
                aria-controls="assesment_3" aria-selected="false">
                Skrinning Gizi</a>
        </li>
    </ul>

    <div class="text-black" style="font-size: 14px">
        <div class="tab-content" id="tab-assesment">
            <div id="pemeriksaan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="assesment_1_tab">
                @include('new_perawat.assesment.entry_unhide')
            </div>
            <div id="daftar" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
                @include('new_perawat.assesment.entry_intervensi')
            </div>
            <div id="skrinning" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_3_tab">
                @include('new_perawat.assesment.entry_skrinning_gizi')
            </div>
        </div>
    </div>
</form>


{{-- <h2 class="text-black">Pengkajian Awal Pasien</h2>
<h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
<hr>
<div class="text-black" style="font-size: 14px">
    <form id="entry_asesmen">
        @csrf
        <div id="assesment_1">
            @include('new_perawat.assesment.entry_unhide')
        </div>
        <div id="assesment_2">
            @include('new_perawat.assesment.entry_intervensi')
        </div>
        <div id="assesment_3">
            @include('new_perawat.assesment.entry_skrinning_gizi')
        </div>
    </form>
</div> --}}
