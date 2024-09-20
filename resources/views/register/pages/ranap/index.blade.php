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
                  <h3 class="card-title">Pendaftaraan Rawat Inap </h3>
                </div>
                <div class="col d-flex justify-content-end gap-1">
                  <a href="{{ route('register.ranap.create') }}" class="btn btn-success btn-sm ml-auto">
                    Tambah Data
                  </a>
                  <a href="{{route('register.vclaim')}}">
                    <button onclick="{{ route('register.vclaim') }}" class="btn btn-warning radius ml-3"><i class="fas fa-user-check"></i> Vclaim Manual</button>
                  </a>
                  
                  {{-- <button onclick="tarik_regis()" class="btn btn-primary radius ml-3"><i class="fas fa-download"></i> Tarik Pendaftaran dari Sphaira</button> --}}
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
                    <th>Dokter</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                    <th>Status</th>
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
<div class="modal fade" id="modalAdmisi" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-width" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="resultModalLabel">Slip Admisi</h5>
        <div class="d-flex align-items-center">
          <button id="printButtonAdmisi" class="btn" style="border: 1px solid black; color: black; margin-right: 10px;">Cetak Halaman</button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="modal-body">
     <!-- <iframe id="iframe-admisi" style="width:100%; height:100%;" frameborder="0"></iframe> -->
     <iframe id="iframe-admisi" style="border:none; width: 100%; height: calc(100vh - 200px);"></iframe>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalGeneralConsent" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-width" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="resultModalLabel">General Consent</h5>
        <div class="d-flex align-items-center">
          <button id="printButtonGC" class="btn" style="border: 1px solid black; color: black; margin-right: 10px;">Cetak Halaman</button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="modal-body">
      <iframe id="iframe-generalConsent" style="border:none; width: 100%; height: calc(100vh - 200px);"></iframe> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalRawatIntensif" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-width" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h5 class="modal-title" id="resultModalLabel">Surat Rawat Intensif</h5>
        <div class="d-flex align-items-center">
          <button id="printButtonIntensif" class="btn" style="border: 1px solid black; color: black; margin-right: 10px;">Cetak Halaman</button>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <iframe id="iframe-rawatIntensif" style="border:none; width: 100%; height: calc(100vh - 200px);"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
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
      },
      error: function() {
        neko_d_custom_error('Gagal, Pasien Sudah Ada Tindakan');
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
          data: "reg_tgl",
          name: "m_registrasi.reg_tgl",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_no",
          name: "m_registrasi.reg_no",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_medrec",
          name: "m_registrasi.reg_medrec",
          orderable: true,
          searchable: true,
        },
        {
          data: "PatientName",
          name: "m_pasien.PatientName",
          orderable: true,
          searchable: true,
        },
        {
          data: "ParamedicName",
          name: "m_paramedis.ParamedicName",
          orderable: true,
          searchable: true,
        },
        {
          data: "reg_cara_bayar",
          name: "m_registrasi.reg_cara_bayar",
          orderable: true,
          searchable: true,
        },
        {
          data: "aksi_data",
          orderable: false,
          searchable: false,
        },
        // {
        //   data: "dok_data",
        //   orderable: false,
        //   searchable: false,
        // },
        {
          data: "status",
          orderable: false,
          searchable: false,
        },
      ],rowCallback: function(row, data) {
        let api = this.api();
       $(row).find('.print-admisi').click(function() {
          var reg = $(this).data('reg_no');
          let url = "{{ route('register.ranap.slipadmisi',':reg_no') }}"
          url = url.replace(':reg_no', reg)
          $.ajax({
            type: "get",
            url: url,
            success: function(data) {
              $('#report-admisi').empty().html(data);
              var iframe = document.getElementById('iframe-admisi');
              iframe.contentDocument.open();
              iframe.contentDocument.write(data);
              iframe.contentDocument.close();
              $('#modalAdmisi').modal('show').on('shown.bs.modal', function () {
                var modalDialog = $(this).find('.modal-dialog');
                modalDialog.css({
                  'max-width': '80%',
                  'width': '80%',
                  'max-height': '90%',
                  'height': '90%'
                });
              });
            },
            error: function() {
              neko_d_custom_error('Gagal, Memuat Slip Admisi');
            }
          });
        });
        $(row).find('.print-generalconsent').click(function() {
          var reg = $(this).data('reg_no');
          let url = "{{ route('register.ranap.gc1', ':reg_no') }}"
          url = url.replace(':reg_no', reg)
          $.ajax({
            type: "get",
            url: url,
            success: function(data) {
              $('#report-generalConsent').empty().html(data);
              var iframe = document.getElementById('iframe-generalConsent');
              iframe.contentDocument.open();
              iframe.contentDocument.write(data);
              iframe.contentDocument.close();
              $('#modalGeneralConsent').modal('show').on('shown.bs.modal', function () {
                var modalDialog = $(this).find('.modal-dialog');
                modalDialog.css({
                  'max-width': '80%',
                  'width': '80%',
                  'max-height': '90%',
                  'height': '90%'
                });
              });
            },
            error: function() {
              neko_d_custom_error('Gagal, Memuat General Consent');
            }
          });
        });
        $(row).find('.print-rawatintensif').click(function() {
          var reg = $(this).data('reg_no');
          let url = "{{ route('register.ranap.rawat-intensif', ':reg_no') }}"
          url = url.replace(':reg_no', reg)
          console.log(reg);
          $.ajax({
            type: "get",
            url,
            success: function(data) {
              console.log(data);
              $('#report-rawatIntensif').empty().html(data);
              var iframe = document.getElementById('iframe-rawatIntensif');
              iframe.contentDocument.open();
              iframe.contentDocument.write(data);
              iframe.contentDocument.close();
              $('#modalRawatIntensif').modal('show').on('shown.bs.modal', function () {
                var modalDialog = $(this).find('.modal-dialog');
                modalDialog.css({
                  'max-width': '80%',
                  'width': '80%',
                  'max-height': '90%',
                  'height': '90%'
                });
              });
            },
            error: function() {
              neko_d_custom_error('Gagal, Memuat Surat Rawat Intensif');
            }
          });
        });
      }
    });
  }
</script>
<script>
document.getElementById('printButtonAdmisi').addEventListener('click', function() {
  var iframe = document.getElementById('iframe-admisi');
  iframe.contentWindow.focus();
  iframe.contentWindow.print();
});
document.getElementById('printButtonGC').addEventListener('click', function() {
  var iframe = document.getElementById('iframe-generalConsent');
  iframe.contentWindow.focus();
  iframe.contentWindow.print();
});
document.getElementById('printButtonIntensif').addEventListener('click', function() {
  var iframe = document.getElementById('iframe-rawatIntensif');
  iframe.contentWindow.focus();
  iframe.contentWindow.print();
});
</script>
@endpush