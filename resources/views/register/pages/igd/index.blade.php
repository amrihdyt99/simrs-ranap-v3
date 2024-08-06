@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="{{ Request::segment(1) == "ranap" ? "active text-bold" : "" }} nav-link " href={{ route('register.ranap.index') }}>
                <span>Pendaftaran Inap</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ Request::segment(1) == "igd" ? "active text-bold" : "" }} nav-link " href={{ route('register.igd.index') }}>
                <span>Pendaftaran IGD</span>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">Pendaftaraan Rawat IGD </h3>
                                <a href="{{ route('register.igd.create') }}" class="btn btn-success btn-sm ml-auto">Tambah
                                    Data</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No. Registerasi</th>
                                            <th>MRN</th>
                                            <th>Nama Pasien</th>
                                            <th>Dokter</th>
                                            <th>Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($igd as $row)
                                            <tr>
                                                <td>{{ $row->reg_tgl }}</td>
                                                <td>{{ $row->reg_no }}</td>
                                                <td>{{ $row->reg_medrec }}</td>
                                                <td>{{ $row->pasien->PatientName }}</td>
                                                <td>{{ $row->physician->ParamedicName }}</td>
                                                <td>{{ $row->reg_cara_bayar }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info">
                                                        <i class="fa fa-list"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
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
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
