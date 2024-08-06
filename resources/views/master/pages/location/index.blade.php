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
                            Location
                            <a href="{{ route('master.location.create') }}" class="btn btn-success rounded-circle">
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
                                <table id="location" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>LocationID</th>
                                            <th>SiteCode</th>
                                            <th>LocationCode</th>
                                            <th>LocationName</th>
                                            <th>ShortName</th>
                                            <th>Initial</th>
                                            <th>PermissionCode</th>
                                            <th>ParentID</th>
                                            <th>Remarks</th>
                                            <th>IsAllowOverIssued</th>
                                            <th>IsNettable</th>
                                            <th>IsHoldForTransaction</th>
                                            <th>IsDisplayStock</th>
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
            $('#location').DataTable({
                processing: true,
                serverSide: true,
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
                        data: "LocationID",
                        name: "LocationID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "SiteCode",
                        name: "SiteCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "LocationCode",
                        name: "LocationCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "LocationName",
                        name: "LocationName",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ShortName",
                        name: "ShortName",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "Initial",
                        name: "Initial",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "PermissionCode",
                        name: "PermissionCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ParentID",
                        name: "ParentID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "Remarks",
                        name: "Remarks",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsAllowOverIssued",
                        name: "IsAllowOverIssued",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsNettable",
                        name: "IsNettable",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsHoldForTransaction",
                        name: "IsHoldForTransaction",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsDisplayStock",
                        name: "IsDisplayStock",
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
@endpush
