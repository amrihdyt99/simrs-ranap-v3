@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>
                            Departement
                            <a href="{{ route('master.departement.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-2">
                        <button id="tarikDataDepartemen" class="btn btn-primary">
                            Tarik Data Departemen
                        </button>
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
                                <strong>Berhasil!</strong> {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <table id="departement" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ServiceUnitID</th>
                                            <th>SiteDepartmentID</th>
                                            <th>ServiceUnitCode</th>
                                            <th>ContactPerson1</th>
                                            <th>ContactPerson2</th>
                                            <th>LocationID</th>
                                            <th>GcDefaultOrderType</th>
                                            <th>Aksi</th>
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


        function load_data() {
            $('#departement').DataTable({
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
                        data: "ServiceUnitID",
                        name: "ServiceUnitID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "SiteDepartmentID",
                        name: "SiteDepartmentID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ServiceUnitCode",
                        name: "ServiceUnitCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ContactPerson1",
                        name: "ContactPerson1",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ContactPerson2",
                        name: "ContactPerson2",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "LocationID",
                        name: "LocationID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "GcDefaultOrderType",
                        name: "GcDefaultOrderType",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "aksi_data",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#tarikDataDepartemen').click(function() {
                var $button = $(this);
                $button.prop('disabled', true); 

                $.ajax({
                    url: "{{ url('tarik/departemen') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data departemen berhasil ditarik!');
                        console.log(response);
                        $('#departement').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat menarik data departemen.');
                        console.log(error);
                    },
                    complete: function() {
                        $button.prop('disabled',
                        false);
                    }
                });
            });
        });
    </script>
@endpush
