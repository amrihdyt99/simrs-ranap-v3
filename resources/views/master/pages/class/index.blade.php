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
                            Class Management
                            <a href="{{ route('master.class.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-2">
                        <button id="tarikDataClass" class="btn btn-primary">
                            Tarik Data Class Management
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
                                <table id="class_table" class="table w-100 table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 250px">Action</th>
                                            <th>ClassCode</th>
                                            <th>ClassName</th>
                                            <th>Initial</th>
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
            $('#class_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: true,
                lengthMenu: [10, 25, 50, 100, 200, 500],
                ajax: {
                    url: "{{ url()->current() }}",
                    type: "POST",
                    headers: {
                        "X-HTTP-Method-Override": "GET",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    },
                },
                columns: [{
                        data: "aksi_data",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "ClassCode",
                        name: "ClassCode"
                    },
                    {
                        data: "ClassName",
                        name: "ClassName"
                    },
                    {
                        data: "Initial",
                        name: "Initial"
                    },
                ],
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#tarikDataClass').click(function() {
                var $button = $(this);
                $button.prop('disabled', true); 

                $.ajax({
                    url: "{{ url('tarik/kelas') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data class berhasil ditarik!');
                        console.log(response);
                        $('#class_table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat menarik data class.');
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
