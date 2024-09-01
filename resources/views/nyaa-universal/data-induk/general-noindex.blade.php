@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>{{ $dt_judul }}</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row">
  @if($add_button)
  <div class="col-sm-10 pb-3" style>
    <button type="button" class="protecc btn btn-sm btn-info" onclick="nyaa_act(this)" nyaa-mode="add">Tambah Data Baru</button>
  </div>
  @endif
  @if ($business_partner)
  <div class="col-sm-2">
    <button id="tarikDataBusiness" class="btn btn-primary">
        Tarik Data Business Partner
    </button>
  </div>
  @endif
  <div class="col-sm-12">
    <div class="w-100">
      <table id="datatable1" class="w-100 table table-sm table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Aksi</th>
            @foreach($datatable_list as $datatable_list_dt)
            <th>{{ $datatable_list_dt['nama'] }}</th>
            @endforeach
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalBase" role="dialog" aria-labelledby="ModalBase" aria-hidden="true"></div>
@endsection

@push('nyaa_scripts')
@if($form_js)
@include($form_js)
@endif
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr("content"),
  }
})
$(function() {
  load_data();
  $('#ModalBase').on('hidden.bs.modal', function () {
    $('.protecc').removeAttr('disabled');
    $(this).html('');
    neko_refresh_datatable('datatable1');
  });
});

function load_data(){
  $('#datatable1').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100, 200, 500],
    ajax: {
      url: "{{ url()->current() }}",
      type: "POST",
      headers: {
        "X-HTTP-Method-Override": "GET"
      }
    },
    columns: [
      {data: "{{ $datatable_sort['data'] }}", name: "{{ $datatable_sort['tb_query'] }}", searchable: false},
      {data: "aksi_data", orderable: false, searchable: false},
      // data
      @foreach($datatable_list as $datatable_list_dt)
      {data: "{{ $datatable_list_dt['data'] }}", name: "{{ $datatable_list_dt['tb_query'] }}"},
      @endforeach
    ],
    "order": [ 0, '{{ $datatable_sort['order_by'] }}' ],
    "columnDefs": [
      {
        "targets": [0],
        "visible": false,
      },
    ],
  });
}

function neko_post_ajax(){
  neko_d_custom_warning('Sedang memproses data, harap tunggu...');
  $('.protecc').attr('disabled','disabled');
  $.ajax({
    url: '{{ url()->current() }}',
    method: "POST",
    data: $('#dtf_i').serialize(),
    success: function(res_s) {
      if(res_s.sukses_pesan){
        neko_d_custom_success(res_s.sukses_pesan);
        $('#ModalBase').modal('hide');
        return null;
      };
      if(res_s.responseJSON){
        if(res_s.responseJSON.sukses_pesan){
          neko_d_custom_success(res_s.responseJSON.sukses_pesan);
          $('#ModalBase').modal('hide');
          return null;
        };
      };
      neko_d_custom_success('Berhasil.');
      $('#ModalBase').modal('hide');
      return null;
    },
    error: function(res_e) {
      if(res_e.error_pesan){
        neko_d_custom_error(res_e.error_pesan);
        $('.protecc').removeAttr('disabled');
        return null;
      };
      if(res_e.responseJSON){
        if(res_e.responseJSON.error_pesan){
          neko_d_custom_error(res_e.responseJSON.error_pesan);
          $('.protecc').removeAttr('disabled');
          return null;
        };
      };
      neko_d_custom_error('Gagal diproses. Mohon untuk me-refresh halaman ini.');
      $('.protecc').removeAttr('disabled');
      return null;
    }
  })
}

function nyaa_act(komponen){
  var neko_ed_HTML=`@include($form_view)`,
      mode = $(komponen).attr('nyaa-mode'),
      dtid = $(komponen).attr('nyaa-dtid');
  $('#ModalBase').html('').append(neko_ed_HTML);
  $('#simpan-entry-data').off('click').on('click',function(){
    $(this).attr('disabled','disabled');
    neko_post_ajax();
  });
  $('[name="dt_mode"]').val(mode);
  $('[name="dtid"]').val(dtid);
  $('#ModalBase').modal('show');
  @if($form_js_act)
  @include($form_js_act)
  @endif
  if(mode==='edit'){
    @foreach($form_list as $form_list_dt)
    $('[name="{{ $form_list_dt['data'] }}"]').val($(komponen).attr('nyaa-{{ $form_list_dt['data'] }}')).change();
    @endforeach
  }
  $('[type="number"]').each(function () {
    var targetValue = parseFloat($(this).val());
    $(this).val(+targetValue);
  });
}

function nyaa_dlt(komponen){
  var mode = $(komponen).attr('nyaa-mode'),
      dtid = $(komponen).attr('nyaa-dtid');
  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang dihapus tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "POST",
        url: "{{ url()->current() }}",
        data: {dt_mode:mode,dtid:dtid},
        success: function(data) {
          if(data.sukses_pesan) {
            Swal.fire(
              'Berhasil.',
              data.sukses_pesan,
              'success'
            )
            neko_refresh_datatable('datatable1');
          } else {
            Swal.fire(
              'Gagal!',
              'Data gagal dihapus. Mohon coba kembali beberapa saat lagi.',
              'error'
            )
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire(
            'Gagal!',
            'Data gagal dihapus. Mohon coba kembali beberapa saat lagi.',
            'error'
          )
        }
      });
    }
  });
}
</script>
<script>
  $(document).ready(function() {
      $('#tarikDataBusiness').click(function() {
          $.ajax({
              url: "{{ url('tarik/bisnis') }}", 
              method: 'GET', 
              success: function(response) {
                  alert('Data berhasil ditarik!'); 
                  console.log(response); 
                  $('#datatable1').DataTable().ajax.reload();
              },
              error: function(xhr, status, error) {
                  alert(
                  'Terjadi kesalahan saat menarik data location.'); 
                  console.log(error); 
              }
          });
      });
  });
</script>
@endpush