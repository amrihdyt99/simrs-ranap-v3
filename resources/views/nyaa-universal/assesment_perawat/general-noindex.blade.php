<h2 class="text-black">{{ $dt_judul }}</h2>
<br>
<div class="row">
  <div class="col-sm-12 pb-3" style>
    <button type="button" class="protecc btn btn-sm btn-info" onclick="nyaa_act(this)" nyaa-mode="add">Tambah Data Baru</button>
  </div>
  <div class="col-sm-12">
    <div class="w-100">
      <table id="datatable1" nyaa-urldatatable="{{ $datatable_route }}" class="w-100 table table-sm table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Aksi</th>
            <th>Nama Dokumen</th>
            <th>File</th>
            <th>Catatan</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<div id="ModalBase_orig" style="display:none!important;">
  {!! $form_view !!}
</div>
<div class="modal fade" id="ModalBase" role="dialog" aria-labelledby="ModalBase" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $dt_judul }}</h5>
        <button type="button" class="protecc close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form id="dtf_i">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="protecc btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="protecc btn btn-info" id="simpan-entry-data" nyaa-urlsimpan="{{ $datatable_route }}" onclick="neko_post_ajax($(this).attr('nyaa-urlsimpan'))">Simpan</button>
      </div>
    </div>
  </div>
</div>