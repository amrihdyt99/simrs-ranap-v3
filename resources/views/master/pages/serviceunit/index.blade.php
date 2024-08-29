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
                            Service Unit Room
                            <a href="{{ route('master.serviceunit.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-2">
                        <button id="tarikDataServiceUnitRoom" class="btn btn-primary">
                            Tarik Data Service Unit Room
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
                                <table id="service_unit" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>RoomID</th>
                                            <th>ServiceUnitID</th>
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
            $('#service_unit').DataTable({
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
                        data: "RoomID",
                        name: "RoomID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ServiceUnitID",
                        name: "ServiceUnitID",
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
            $('#tarikDataServiceUnitRoom').click(function() {
                var $button = $(this);
                $button.prop('disabled', true); 

                $.ajax({
                    url: "{{ url('tarik/unit_room') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data berhasil ditarik!');
                        console.log(response);
                        $('#service_unit').DataTable().ajax.reload();
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
