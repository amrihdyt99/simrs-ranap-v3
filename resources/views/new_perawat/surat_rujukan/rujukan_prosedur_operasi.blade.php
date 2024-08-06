@php
$judul_form = 'Prosedur/Operasi Yang Sudah Diakukan';
$url_form = route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan',[4]);
@endphp


<div class="row">
    <div class="col-lg-12">
        <h4>{{ $judul_form }}</h4>
        <div class="row">
            <div class="col-sm-12 pb-3" style>
                <button type="button" class="protecc btn btn-sm btn-info" onclick="nyaa_act(this,'ModalBase_orig_suratrujukan_prosedur','ModalBase')" nyaa-mode="add">Tambah Data Baru</button>
            </div>
            <div class="col-sm-12">
                <div class="w-100">
                <table id="dttb_surat_rujukan4" nyaa-urldatatable="{{ $url_form }}"
                nyaa-columns='[
                    {"data": "id", "name": "id"},
                    {"data": "aksi_data", "orderable": false, "searchable": false},
                    {"data": "detail_prosedur_operasi", "name": "detail_prosedur_operasi"},
                    {"data": "waktu_prosedur_operasi", "name": "waktu_prosedur_operasi"}
                ]'
                nyaa-kode_surat_rujukan="{{ $surat_rujukan->kode_surat_rujukan }}"
                class="w-100 table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aksi</th>
                            <th>Detail Prosedur/Operasi</th>
                            <th>Prosedur/Operasi</th>
                        </tr>
                    </thead>
                </table>
                </div>
            </div>
        </div>
        <div id="ModalBase_orig_suratrujukan_prosedur" style="display:none!important;">

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
                                        <input nyaatempname="kode_surat_rujukan" value="{{ $surat_rujukan->kode_surat_rujukan }}" type="hidden">

                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <p class="m-0">Detail Prosedur/Operasi</p>
                                                <input nyaatempname="detail_prosedur_operasi" autocomplete="off" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <p class="m-0">Prosedur/Operasi</p>
                                                <input nyaatempname="waktu_prosedur_operasi" autocomplete="off" type="datetime-local" class="form-control">
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
