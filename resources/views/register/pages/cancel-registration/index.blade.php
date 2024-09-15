@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

@include('register.layouts.menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-12">
          <button type="button" onclick="sinkronregister()" class="btn btn-danger">Sinkron Register</button>
        </div> -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h3 class="card-title">Batal Registrasi </h3>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="w-100 table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>No. Registerasi</th>
                    <th>MRN</th>
                    <th>Nama Pasien</th>
                    <th>Alasan</th>
                    <th>Asal</th>
                  </tr>
                </thead>
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
  $(function() {
    load_data();
  });


  function tarik_regis() {
    $.ajax({
      type: "get",
      url: "{{url('tarik/regis')}}",
      dataType: "json",
      error: function() {
        neko_d_custom_error('Kesalahan Cek Lagi Koneksi');
      },
      success: function(r) {
        neko_d_custom_success('Berhasil')
        load_data()
      }
    });
  }

  function hapus_pasien(reg) {
    Swal.fire({
      title: 'Yakin ingin membatalkan pasien ini?',
      showDenyButton: true,
      confirmButtonText: 'Ya',
      denyButtonText: `Tidak`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        act_hapus(reg)
      }
    })
  }

  function act_hapus(reg) {
    $.ajax({
      type: "get",
      url: "{{url('ranap/batal')}}/" + reg,
      dataType: "json",
      success: function(r) {
        location.reload();
      }
    });
  }

  function load_data() {
    $('#example2').DataTable({
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
      columns: [{
          data: "cancelation_date",
          name: "cancelation_date",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_no",
          name: "reg_no",
          orderable: true,
          searchable: true,
        },
        {
          data: "medrec_no",
          name: "medrec_no",
          orderable: true,
          searchable: true,
        },
        {
          data: "patient_name",
          name: "patient_name",
          orderable: true,
          searchable: true,
        },
        {
          data: "cancelation_reason",
          name: "cancelation_reason",
        },
        {
          data: "asal",
          name: "asal",
        },
      ],
    });
  }
</script>
@endpush