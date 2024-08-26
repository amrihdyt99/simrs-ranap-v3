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
                            Practitioner
                            <a href="{{ route('master.practitioner.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="">Filter Status:</label>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <select id="status_hapus" class="form-control">
                                <option value="">Semua</option>
                                <option value="1">Dihapus</option>
                                <option value="0" selected>Tidak dihapus</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <select id="status_active" class="form-control">
                                <option value="">Semua</option>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="paramedic_table" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Paramedic Name</th>
                                            <th>SpecialtyCode</th>
                                            <th>StartExperienceDate</th>
                                            <th>LicenseExpiredDate</th>
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
    <script>
        $(function() {
            load_data();

            $('#status_hapus').change(function() {
                $('#paramedic_table').DataTable().draw();
            });
            $('#status_active').change(function() {
                $('#paramedic_table').DataTable().draw();
            });
        });

        function load_data() {
            $('#paramedic_table').DataTable({
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
                    data: function(d) {
                        d.IsDeleted = $('#status_hapus').val();
                        d.IsActive = $('#status_active').val();
                    }
                },
                columns: [{
                        data: "aksi_data",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "ParamedicName",
                        name: "ParamedicName"
                    },
                    {
                        data: "SpecialtyCode",
                        name: "SpecialtyCode"
                    },
                    {
                        data: "StartExperienceDate",
                        name: "StartExperienceDate"
                    },
                    {
                        data: "LicenseExpiredDate",
                        name: "LicenseExpiredDate"
                    },

                ],
            });
        }

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.practitioner.destroy', ':id') }}'.replace(':id', id);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: $("meta[name='csrf-token']").attr('content')
                        },
                        success: function(response) {
                            neko_d_custom_success(response.success);
                            $('#paramedic_table').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
            });
        }

        function changeStatus(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.practitioner.changeStatusActive', ':id') }}'.replace(':id', id);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Status akan diubah.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "PATCH",
                        data: {
                            _token: $("meta[name='csrf-token']").attr('content')
                        },
                        success: function(response) {
                            neko_d_custom_success(response.success);
                            $('#paramedic_table').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
            });
        }
    </script>
    @if (session('success'))
        <script>
            neko_notify('success', '{{ session('success') }}');
        </script>
    @endif
@endpush
