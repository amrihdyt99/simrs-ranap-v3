@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            User Management
                            <a href="{{ route('master.user.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="row">
                          <table class="col-sm-12 col-md-6 col-lg-4">
                            <tr>
                            <td class="align-middle text-right">
                              <span>Status User</span>
                            </td>
                            <td class="align-middle" style="width:200px;position:relative">
                              <select id="is_deleted" class="deteksi_change form-control">
                                <option value="">-- SEMUA --</option>
                                <option value="0" selected>Tidak dihapus</option>
                                <option value="1">Dihapus</option>
                              </select>
                            </td>
                            <td class="align-middle">
                              <button type="button" id="refresh" class="btn btn-secondary btn-sm">Reset Filter</button>
                            </td>
                            </tr>
                          </table>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <table id="unit_table" class="w-100 table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    {{-- <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td></td>
                                            <td>{{$d->username}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->level_user}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('nyaa_scripts')
    <!-- Page specific script -->
    <script>

$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
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
        $('#is_deleted').val('').trigger('change');
      }
      neko_refresh_datatable('unit_table');
    }


  $('#unit_table').DataTable({
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
      },
      data: {
        'is_deleted': function(){return $("#is_deleted").val()},
      },
    },
    columns: [
      {
        data: "username",
        name: "username",
        orderable: true,
        searchable: true,
      },
      {
        data: "name",
        name: "name",
        orderable: true,
        searchable: true,
      },
      {
        data: "level_user",
        name: "level_user",
        orderable: true,
        searchable: true,
      },
      {
        data: "aksi_data",
        name: "aksi_data",
        orderable: false,
        searchable: false,
      },
    ],
  });



function dx_dt(komponen){
      var a_mode = $(komponen).text();
      var a_msgd = {
        title: 'Yakin?',
        text: 'Yakin ingin '+a_mode.toLowerCase()+'?',
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: "Ya.",
        cancelButtonText: "Tidak, batalkan!",
        reverseButtons: false,
      };
      if(a_mode=='Hapus'){
        a_msgd['text'] = a_msgd['text']+' Data yang telah dihapus tidak lagi dapat diaktifkan kembali!';
      }
      var xds = function() {
        return {
          fireConfigFail: {
            title: "Batalkan!",
            text: "Aksi dibatalkan.",
            icon: "error",
          },
          fireFunctionFail: function(uwu) {
            uwu.fire(xds.fireConfigFail)
          }
        }
      }();
      var c = Swal.mixin({
              buttonsStyling: !0
          });
      c.fire(a_msgd).then(function(f) {
        f.isConfirmed ?
        (sw_dx(komponen))
        : f.dismiss === Swal.DismissReason.cancel && xds.fireFunctionFail(c);
      })
    }

    function sw_dx(komponen) {
      var url = "{{route('master.user.processor')}}";
      var a_u_id = $(komponen).attr('nyaa-u-id');
      var a_mode = $(komponen).text();
      Swal.fire({
        title: 'Memproses...',
        text: "Sedang memproses. Harap tunggu...",
        icon: 'info',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        },
      });
      $.ajax({
        url: url,
        method: 'POST',
        data: {
          mode: a_mode,
          id: a_u_id,
        },
        success: function(res) {
          var msg = 'Data berhasil disimpan.';
          if (res.sukses_pesan) {
            msg = res.sukses_pesan;
          }else if (res.responseJSON) {
            msg = res.responseJSON.sukses_pesan;
          }
          Swal.fire({
            title: 'Sukses.',
            text: msg,
            icon: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
          }).then((result) => {
            if (result.isConfirmed) {
              neko_refresh_datatable('unit_table');
            }
          })
        },
        error: function(err) {
          var msg = 'Data berhasil disimpan.';
          if (err.error_pesan) {
            msg = err.error_pesan;
          }else if (err.responseJSON) {
            msg = err.responseJSON.error_pesan;
          }
          if (err.responseJSON) {
            Swal.fire({
              title: 'Gagal.',
              text: msg,
              icon: 'error',
              showCancelButton: false,
              confirmButtonText: 'OK',
            }).then((result) => {
              if (result.isConfirmed) {
                neko_refresh_datatable('unit_table');
              }
            })
          }
        }
      })
    }

    </script>
@endpush
