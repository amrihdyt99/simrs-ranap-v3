@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item text-sm tombol-switch1"><a class="nav-link active" href="#my-area" data-toggle="tab">My Area</a>
                </li>
                <li class="nav-item text-sm tombol-switch2"><a class="nav-link" href="#my-patient" data-toggle="tab">My Patient</a>
                </li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body w-100">
            <div class="tab-content w-100">
                <div class="active tab-pane w-100" id="my-area">
                    <div class="card w-100">
                        <!-- /.card-header -->
                        <div class="card-body w-100">
                          <div id="sini_table_area"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="tab-pane w-100" id="my-patient">
                    <div class="card w-100">
                        <!-- /.card-header -->

                        <div class="card-body w-100">
                           <div id="sini_table_patient"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_pil" tabindex="-1" data-toggle="modal" data-backdrop="static" data-keyboard="false" >
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal Ruangan</h5>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Pilih Ruangan</label>
              <select name="pilru" id="pilru" class="form-control select2-mod" style="width: 100%" onchange="filter_ruang()"></select>
            </div>
            <button type="button" onclick="$('#modal_pil').modal('hide')" class="btn btn-secondary float-right" aria-label="Close">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('nyaa_scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
          if(sessionStorage.getItem('pilihruang')){
            const pilihruang =sessionStorage.getItem('pilihruang').split(',');
            load_data('area', pilihruang[0]);
            load_data('patient', pilihruang[0]);
            $('#title_ruang').text(pilihruang[1]);
          }else {
            mod_pilih_ruang()
          }

          $('.select2-mod').select2({
                dropdownParent: $("#modal_pil")
            });
            
          list_ruang()
          neko_datepicker("reg_tgl");

          $( ".tombol-switch1" ).on( "click", function() {
                setTimeout(load_data_refresh1, 500)
             });
            $( ".tombol-switch2" ).on( "click", function() {
                setTimeout(load_data_refresh2, 500)
             });

        });

        $(function () {
    neko_select2_init('{{ route('nyaa_universal.select2.m_ruangan_baru_all') }}','nama_ruangan');
    })

    $(function() {
      $(".deteksi_change").on("change", function() {
        dt_dst();
      });
      $("#refresh").on("click", function() {
        dt_dst('reset');
      });
    });
    function dt_dst(reset=null){
      if(reset==='reset'){
        $('#nama_ruangan').val('').trigger('change');
      }
      neko_refresh_datatable('example2');
    }

    function filter_ruang(){
      let isi = $('#pilru').val()
      const arr = isi.split(",")
      if (arr[1] == 'x') {
        alert('Pilih ruangan valid')
      }else{
        load_data('area',arr[0])
        load_data('patient',arr[0])
        $('#title_ruang').text(arr[1])
        $('#modal_pil').modal('hide')
        sessionStorage.setItem('pilihruang', isi);
      }
    }

    function list_ruang() {
      $.ajax({
        type: "get",
        url: "{{url('api/listruangranap')}}",
        dataType: "json",
        success: function (r) {
          var opt = '<option value="x,x" >Pilih Ruang</option>';
          $.each(r.data, function(index, row) {
              opt += '<option value="' + row.service_unit_id +','+row.kelompok +'">' + row.kelompok + '</option>';
          });
          $('#pilru').html(opt);
        }
      });
      }

function mod_pilih_ruang() {
  $('#modal_pil').modal('show')
  }
function load_data(tipe,ruang){
 $.ajax({
  type: "get",
  url: "{{url('dokter/data')}}/"+tipe+"/"+ruang,
  dataType: "html",
  success: function (r) {
    $('#sini_table_'+tipe).html(r)
    $('#data_'+tipe).DataTable({
    processing: true,
    responsive: true,
  });
    
  }
 });
}



function load_data_refresh1(){
  $('#example1').DataTable().columns.adjust();
}

function load_data_refresh2(){
  $('#example2').DataTable().columns.adjust();
}

    </script>
@endpush
