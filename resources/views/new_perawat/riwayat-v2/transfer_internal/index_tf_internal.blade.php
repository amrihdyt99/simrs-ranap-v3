<h4><b>TRANSFER INTERNAL</b></h4>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="riwayat_transfer_tab" data-toggle="tab" href="#riwayat_transfer" role="tab" aria-controls="riwayat_transfer" aria-selected="true">
            Riwayat Transfer Internal</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="persiapan_pasien_tab" data-toggle="tab" href="#persiapan_pasien" role="tab" aria-controls="persiapan_pasien" aria-selected="false">
            Persiapan Pasien Pindah</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="alat_terpasang_tab" data-toggle="tab" href="#alat_terpasang" role="tab" aria-controls="alat_terpasang" aria-selected="false">
            Alat Alat Terpasang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="obat_cairan_tab" data-toggle="tab" href="#obat_cairan" role="tab" aria-controls="obat_cairan" aria-selected="false">
            Obat/Cairan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="status_pasien_tab" data-toggle="tab" href="#status_pasien" role="tab" aria-controls="status_pasien" aria-selected="false">
            Status Pasien</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="serah_terima_tab" data-toggle="tab" href="#serah_terima" role="tab" aria-controls="serah_terima" aria-selected="false">
            Serah Terima</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tab-tindakan-medis">
        <div id="riwayat_transfer" class="tab-pane fade show active" role="tabpanel" aria-labelledby="riwayat_transfer_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.riwayat_tf_internal')
        </div>
        <div id="persiapan_pasien" class="tab-pane fade" role="tabpanel" aria-labelledby="persiapan_pasien_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.persiapan_pindah')
        </div>
        <div id="alat_terpasang" class="tab-pane fade" role="tabpanel" aria-labelledby="alat_terpasang_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.alat_terpasang')
        </div>
        <div id="obat_cairan" class="tab-pane fade" role="tabpanel" aria-labelledby="obat_cairan_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.obat_cairan')
        </div>
        <div id="status_pasien" class="tab-pane fade" role="tabpanel" aria-labelledby="status_pasien_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.status_pasien')
        </div>
        <div id="serah_terima" class="tab-pane fade" role="tabpanel" aria-labelledby="serah_terima_tab">
            @include('new_perawat.riwayat-v2.transfer_internal.serah_terima')
        </div>
    </div>
</div>
