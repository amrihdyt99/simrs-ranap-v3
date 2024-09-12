@php
$judul_form = 'Obat/cairan yang dibawa pada saat transfer';
$url_form = route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal',[2]);
@endphp


<div class="row">
    <div class="col-lg-12">
        <h4>{{ $judul_form }}</h4>
        <div class="row">
            <div class="col-sm-12 pb-3" style>
                <button type="button" class="protecc btn btn-sm btn-info" onclick="nyaa_act(this,'ModalBase_orig_transferinternal_obtcr','ModalBase')" nyaa-mode="add">Tambah Data Baru</button>
            </div>
            <div class="col-sm-12">
                <div class="w-100">
                    <table id="dttb_transfer_internal2" nyaa-urldatatable="{{ $url_form }}"
                        nyaa-columns='[
                    {"data": "id", "name": "id"},
                    {"data": "aksi_data", "orderable": false, "searchable": false},
                    {"data": "nama_obat", "name": "nama_obat"},
                    {"data": "quantity", "name": "quantity"},
                    {"data": "item_unit_code", "name": "item_unit_code"}
                ]'
                        nyaa-kode_transfer_internal="{{ $transfer_internal->kode_transfer_internal }}"
                        class="w-100 table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Aksi</th>
                                <th>Nama Obat/cairan</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div id="ModalBase_orig_transferinternal_obtcr" style="display:none!important;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $judul_form }}</h5>
                        <button type="button" class="protecc close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <nyaatempform nyaatempid="dtf_i">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-body pb-0">

                                        <input nyaatempname="dt_mode" type="hidden">
                                        <input nyaatempname="dtid" type="hidden">

                                        <input nyaatempname="reg_no" value="{{ $reg }}" type="hidden">
                                        <input nyaatempname="med_rec" value="{{ $medrec }}" type="hidden">
                                        <input nyaatempname="kode_transfer_internal" value="{{ $transfer_internal->kode_transfer_internal }}" type="hidden">

                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <p class="m-0">Nama Obat/cairan *</p>
                                                <input nyaatempname="item_id" autocomplete="off" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-5">
                                                <p class="m-0">Qty *</p>
                                                <input nyaatempname="quantity" autocomplete="off" type="text" class="form-control">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-7">
                                                <p class="m-0">Satuan *</p>
                                                <input nyaatempname="item_unit_code" autocomplete="off" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </nyaatempform>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="protecc btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="protecc btn btn-info" id="simpan-entry-data" nyaa-urlsimpan="{{ $url_form }}" onclick="neko_post_ajax($(this).attr('nyaa-urlsimpan'))">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>