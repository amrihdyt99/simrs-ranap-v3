@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-pills">
      <li class="nav-item text-sm"><a class="nav-link active" href="#my-patient" data-toggle="tab">My Patient</a></li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      <div class="form-row">
        <div class="form-group col-sm-12 col-md-6 col-lg-4">
          <p class="m-0">Filter Ruangan *</p>
          <select id="nama_ruangan" class="deteksi_change form-control">
            <option value="">-- SEMUA --</option>
          </select>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-4">
          <p class="m-0">Tanggal Registrasi *</p>
          <input name="reg_tgl" id="reg_tgl" autocomplete="off" type="text"
            class="deteksi_change_dp form-control" onchange="dt_dst()" data-toggle="datetimepicker">
        </div>
        <div class="form-group col-sm-12">
          <button type="button" id="refresh" class="btn btn-secondary btn-sm">Reset Filter</button>
        </div>
      </div>

      <div class="active tab-pane" id="my-patient">
        <div class="card">
          <div class="card-body">
            <div id="sini_table_patient"></div>
          </div>
        </div>
      </div>

      <!-- Add this button to trigger the modal -->
      <!-- <button class="btn btn-secondary" onclick="mod_pilih_ruang()" id="title_ruang">LANTAI PASIEN</button> -->

      <div class="modal" id="modal_pil" tabindex="-1" data-toggle="modal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal Lantai Pasien</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Pilih Lantai Pasien</label>
                <select name="pilru" id="pilru" class="form-control select2-mod" style="width: 100%;" onclick="list_ruang()" onchange="filter_ruang()"></select>
              </div>
              <button type="button" onclick="$('#modal_pil').modal('hide')" class="btn btn-secondary float-right" aria-label="Close">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('nyaa_scripts')
<!-- Page specific script -->
<script>
  $(function() {
    neko_datepicker("reg_tgl");
    neko_select2_init(`{{ route('nyaa_universal.select2.m_ruangan_baru_all') }}`, 'nama_ruangan');
    
    $(".deteksi_change").on("change", function() {
      dt_dst();
    });
    $("#refresh").on("click", function() {
      dt_dst('reset');
    });

    const storedUserId = localStorage.getItem('user_id');
    const currentUserId = '{{ auth()->id() }}';

    if (storedUserId === currentUserId && localStorage.getItem('pilihruang')) {
      const pilihruang = localStorage.getItem('pilihruang').split(',');
      load_data(pilihruang[0]);
      $('#title_ruang').text(pilihruang[1]);
    } else {
      // Clear localStorage if user changed
      localStorage.removeItem('pilihruang');
      localStorage.setItem('user_id', currentUserId);
      mod_pilih_ruang();
    }

    $('.select2-mod').select2({
      dropdownParent: $("#modal_pil")
    });

    list_ruang()
  });

  function dt_dst(reset = null) {
    if (reset === 'reset') {
      $('#nama_ruangan').val('').trigger('change');
      $('#reg_tgl').val('');
    }
    load_data($('#nama_ruangan').val());
  }

  function mod_pilih_ruang() {
    $('#modal_pil').modal('show')
    list_ruang()
  }

  function list_ruang() {
    $.ajax({
      url: "{{url('')}}/master/aksesRuangan/data",
      type: "get",
      data: {
        params: [
          {key: 'ParamedicCode', value: $user_perawat_}
        ]
      },
      success: function (r) {
        var opt = '<option value="x,x" >Pilih Ruang</option>'
        $.each(r, function(index, row) {
          $.each(row.ParamedicAccessRoom, function(sub_i, sub_item){
            opt += '<option value="' + sub_item.ServiceId +','+sub_item.ServiceName +'">' + sub_item.ServiceName + '</option>'
          })
        })
        $('#pilru').html(opt)
      }
    })
  }

  function filter_ruang(){
    let isi = $('#pilru').val()
    const arr = isi.split(",")
    if (arr[1] == 'x') {
      alert('Pilih ruangan valid')
    } else {
      load_data(arr[0])
      $('#title_ruang').text(arr[1])
      $('#modal_pil').modal('hide')
      localStorage.setItem('pilihruang', isi);
    }
  }

  function load_data(ruang){
    $.ajax({
      type: "get",
      url: "{{url('perawat/data')}}/" + ruang,
      data: {
        nama_ruangan: ruang,
        reg_tgl: $('#reg_tgl').val()
      },
      dataType: "html",
      success: function (r) {
        $('#sini_table_patient').html(r)
        $('#example1').DataTable({
          processing: true,
          responsive: true,
        });
      }
    });
  }

  function takeOver(_reg, _type = '', _room_id = '', _service_unit = ''){
      let selectedRoom = localStorage.getItem('pilihruang');
      if (selectedRoom) {
        selectedRoom = selectedRoom.split(',')[0];
      }
      
      if (selectedRoom && selectedRoom !== 'x') {
        Swal.fire({
          title: 'Konfirmasi',
          text: 'Apakah Anda yakin ingin mengambil alih pasien ini?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, ambil alih',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{url("")}}/perawat/takeOver',
              type: 'post',
              data: {
                _token: '{{csrf_token()}}',
                reg_no: _reg,
                type: _type,
                room_id: _room_id,
                service_unit: _service_unit,
                dokter_code: $user_perawat_
              },
              success: function(resp){
                if (resp.success) {
                  Swal.fire(
                    'Berhasil!',
                    resp.message,
                    'success'
                  )

                  load_data(selectedRoom)

                  $('a[href*="#my-"]').removeClass('active')
                  $('a[href="#my-patient"]').addClass('active')

                  $('div[class*="tab-pane"][id*="my-"]').removeClass('active')
                  $('div[class*="tab-pane"][id="my-patient"]').addClass('active')
                } else {
                  Swal.fire(
                    'Gagal!',
                    resp.message,
                    'error'
                  )
                }
              }
            })
          }
        })
      } else {
        Swal.fire(
          'Peringatan',
          'Mohon untuk pilih ruangan yang akan diakses',
          'warning'
        )
      }
    }
</script>
@endpush