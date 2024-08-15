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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">Data Pendaftaraan Rajal  </h3>
                                {{-- <a href="{{ route('register.igd.create') }}" class="btn btn-success btn-sm ml-auto">Tambah
                                    Data</a> --}}
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
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row['ranap_tanggal'] ?? '-' }}</td>
                                                <td>{{ $row['ranap_reg'] ?? '-' }}</td>
                                                <td>{{ $row['reg_medrec'] ?? '-'}}</td>
                                                <td>{{ $row['nama_pasien'] ?? '-' }}</td>
                                                <td>{{ $row['ranap_dpjp'] ?? '-' }}</td>
                                                <td>-</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" onclick="handleRegistrasiRanap({{ json_encode($row) }})">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Registrasi Ranap</span>
                                                    </button>
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

        const handleRegistrasiRanap = (data)=>{
            // show confirm dialog with SweetAlert
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin ingin mendaftarkan pasien ini ke rawat inap?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, daftarkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "{{ route('register.rajal.store') }}"
                    const payload = {
                        ...data,
                        _token: "{{ csrf_token() }}"
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: payload,
                        dataType: "json",
                        success: function (response) {
                            Swal.fire(
                                'Berhasil!',
                                'Pasien berhasil didaftarkan ke rawat inap.',
                                'success'
                            )
                            // reload the page
                            // location.reload()
                            console.log({response})
                        },
                        error: function (xhr, status, error) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat mendaftarkan pasien ke rawat inap.',
                                'error'
                            )
                        }
                    });
                }
            });
        }
    </script>
@endpush
