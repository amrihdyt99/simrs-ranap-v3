@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "ranap" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.ranap.index') }}>
          <span>Pendaftaran Rawat Inap</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "rajal" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.rajal.index') }}>
          <span>Data Pendaftaran Rajal</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "igd" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.igd.index') }}>
          <span>Data Pendaftaran IGD</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

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
                  <!-- <a href="{{ route('register.ranap.create') }}" class="btn btn-success btn-sm ml-auto">
                Tambah Data
                </a> -->
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
                    <th>Dok</th>
                    <th>Status</th>
                  </tr>
                </thead>
                {{-- <tbody>
                                        @foreach ($inap as $row)
                                            <tr>
                                                <td>{{ $row->reg_tgl }}</td>
                <td>{{ $row->reg_no }}</td>
                <td>{{ $row->reg_medrec }}</td>
                <td>{{ $row->PatientName }}</td>
                <td>{{ $row->ParamedicName }}</td>
                <td>{{ $row->reg_cara_bayar }}</td>
                <td> --}}
                  {{-- <a href="{{route('register.ranap.cetak',['reg_no'=>$row->reg_no])}}" class="btn btn-sm btn-info" target="_blank">
                  <i class="fa fa-print"></i>
                  </a>--}}

                  {{-- <a href="{{route('register.ranap.slipadmisi',['reg_no'=>$row->reg_no])}}" class="btn btn-sm btn-info" target="_blank">
                  <i class="fa fa-print">Admisi</i>
                  </a>
                </td>
                <td>
                  <a href="{{route('register.ranap.gc1',['reg_no'=>$row->reg_no])}}" class="btn btn-sm btn-info" target="_blank">
                    General Consent Hal 1
                  </a>
                  <a href="{{route('register.ranap.gc2',['reg_no'=>$row->reg_no])}}" class="btn btn-sm btn-info" target="_blank">
                    General Consent Hal 2
                  </a>


                </td>
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
        {
          data: "dok_data",
          orderable: false,
          searchable: false,
        },
        {
          data: "status",
          orderable: false,
          searchable: false,
        },
      ],
    });
  }
</script>
@endpush