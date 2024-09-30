<h3><b>TRANSFER INTERNAL</b></h3>
<form id="form_transfer_internal">
    <div>
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="persiapan-tab" data-toggle="tab" href="#persiapan" role="tab" aria-controls="persiapan-tab" aria-selected="false">
                    Persiapan pasien pindah</a>
            </li>

            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_transfer_internal1')" class="nav-link " id="alat_terpasang-tab" data-toggle="tab" href="#alat_terpasang" role="tab" aria-controls="alat_terpasang-tab" aria-selected="false">
                    Alat-alat yang terpasang</a>
            </li>
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_transfer_internal2')" class="nav-link" id="obat_cairan-tab" data-toggle="tab" href="#obat_cairan" role="tab" aria-controls="obat_cairan-tab" aria-selected="false">
                    Obat/cairan</a>
            </li>

            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_transfer_internal3')" class="nav-link " id="status_pasien-tab" data-toggle="tab" href="#status_pasien" role="tab" aria-controls="status_pasien-tab" aria-selected="false">
                    Status pasien</a>
            </li>
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_transfer_internal4')" class="nav-link" id="kejadian-tab" data-toggle="tab" href="#kejadian" role="tab" aria-controls="kejadian-tab" aria-selected="false">
                    Kejadian dan tindakan</a>
            </li>
            @if ($type == 'terima' || $type == 'detail' || $type == 'intensif')
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_transfer_internal5')" class="nav-link " id="serah_terima-tab" data-toggle="tab" href="#serah_terima" role="tab" aria-controls="serah_terima-tab" aria-selected="false">
                    Serah terima</a>
            </li>
            @endif
        </ul>
        <div class="tab-content" id="tab_transfer">
            <div id="persiapan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="persiapan-tab">
                @include('new_perawat.transfer_internal.v3.persiapan_pasien')
            </div>

            <div id="alat_terpasang" class="tab-pane fade " role="tabpanel" aria-labelledby="alat_terpasang-tab">
                @include('new_perawat.transfer_internal.v3.alat_terpasang')
            </div>

            <div id="obat_cairan" class="tab-pane fade " role="tabpanel" aria-labelledby="obat_cairan-tab">
                @include('new_perawat.transfer_internal.v3.obat_cairan')
            </div>

            <div id="status_pasien" class="tab-pane fade " role="tabpanel" aria-labelledby="status_pasien-tab">
                @include('new_perawat.transfer_internal.v3.status_pasien')
            </div>

            <div id="kejadian" class="tab-pane fade " role="tabpanel" aria-labelledby="kejadian-tab">
                @include('new_perawat.transfer_internal.v3.kejadian')
            </div>
            @if ($type == 'terima' || $type == 'detail' || $type == 'intensif')
            <div id="serah_terima" class="tab-pane fade " role="tabpanel" aria-labelledby="serah_terima-tab">
                @include('new_perawat.transfer_internal.v3.confirm_serah_terima')
            </div>
            @endif
        </div>
    </div>
</form>

<div class="modal fade" id="ModalBase" role="dialog" aria-labelledby="ModalBase" aria-hidden="true"></div>






{{-- <h2 class="text-black">Tranfer Internal Pasien</h2>
<hr>
<form id="form_transfer_internal">
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.transfer_internal.entry')
    </div>
</form> --}}