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
                            Organization
                            <a href="#" class="btn btn-success rounded-circle" data-toggle="modal"
                                data-target="#createOrganizationModal">
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
                                <table id="organization_table" class="w-100 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Organization Code</th>
                                            <th>Organization Name</th>
                                            <th>Organization Level</th>
                                            <th>Parent Organization</th>
                                            <th>Organization Percentage</th>
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

    @include('master.pages.organization.create')
    @include('master.pages.organization.update')
@endsection

@push('nyaa_scripts')
    <script>
        $(function() {
            load_data();

            $('#status_hapus').change(function() {
                $('#organization_table').DataTable().draw();
            });
            $('#status_active').change(function() {
                $('#organization_table').DataTable().draw();
            });
        });

        function load_data() {
            $('#organization_table').DataTable({
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
                        data: "OrganizationCode",
                        name: "OrganizationCode"
                    },
                    {
                        data: "OrganizationName",
                        name: "OrganizationName"
                    },
                    {
                        data: "OrganizationLevel",
                        name: "OrganizationLevel"
                    },
                    {
                        data: "ParentOrganization",
                        name: "ParentOrganization"
                    },
                    {
                        data: "OrganizationPercentage",
                        name: "OrganizationPercentage"
                    }
                ],
            });
        }


        $('#createOrganizationForm').submit(function(event) {
            event.preventDefault();

            let form = $(this);
            let url = form.attr('action');
            let formData = new FormData(form[0]);

            $('#createOrganizationButton').prop('disabled', true);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#createOrganizationModal').modal('hide');
                    $('#organization_table').DataTable().ajax.reload();
                    neko_d_custom_success(response.success);
                },
                error: function(response) {
                    neko_d_custom_error(response.responseJSON.error);
                },
                complete: function() {
                    $('#createOrganizationButton').prop('disabled', false);
                }

            });
        });

        $('#organization_table').on('click', '.edit-btn', function() {
            let row = $(this).closest('tr');
            let data = $('#organization_table').DataTable().row(row).data();

            $('#editOrganizationId').val(data.OrganizationCode);
            $('#editOrganizationCode').val(data.OrganizationCode);
            $('#editOrganizationName').val(data.OrganizationName);
            $('#editOrganizationLevel').val(data.OrganizationLevel);
            $('#editParentOrganization').val(data.ParentOrganization);
            $('#editOrganizationPercentage').val(data.OrganizationPercentage);

            $('#editOrganizationModal').modal('show');
        });

        $('#editOrganizationForm').submit(function(event) {
            event.preventDefault();

            let form = $(this);
            let url = "{{ route('master.organization.update', ':id') }}".replace(':id', $(
                '#editOrganizationId').val());
            let formData = new FormData(form[0]);

            $('#editOrganizationButton').prop('disabled', true);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                success: function(response) {
                    $('#editOrganizationModal').modal('hide');
                    $('#organization_table').DataTable().ajax.reload();
                    neko_d_custom_success(response.success);
                },
                error: function(response) {
                    neko_d_custom_error(response.responseJSON.error);
                },
                complete: function() {
                    $('#editOrganizationButton').prop('disabled', false);
                }
            });
        });



        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.organization.destroy', ':id') }}'.replace(':id', id);

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
                            $('#organization_table').DataTable().ajax.reload();
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
            const url = '{{ route('master.organization.changeStatusActive', ':id') }}'.replace(':id', id);

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
                            $('#organization_table').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
            });
        }
    </script>
@endpush
