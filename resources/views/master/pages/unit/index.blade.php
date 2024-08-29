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
                            Unit Management
                            <a href="{{ route('master.unit.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-2">
                        <button id="tarikDataUnit" class="btn btn-primary">
                            Tarik Data Unit
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
                        <div class="card">
                            <div class="card-body">
                                <table id="unit_table" class="table w-100 table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Service Unit Code</th>
                                        <th>Service Unit Name</th>
                                        <th>Short Name</th>
                                        <th>Initial</th>
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
                    }
                },
                columns: [{
                        data: "ServiceUnitCode",
                        name: "ServiceUnitCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ServiceUnitName",
                        name: "ServiceUnitName",
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
                        data: "aksi_data",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }

        $(document).ready(function() {
            $('#tarikDataUnit').click(function() {
                var $button = $(this);
                $button.prop('disabled', true); 

                $.ajax({
                    url: "{{ url('tarik/unit') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data berhasil ditarik!');
                        console.log(response);
                        $('#unit_table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat menarik data.');
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
