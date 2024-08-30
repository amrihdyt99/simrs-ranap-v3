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
                            Room
                            <a href="{{ route('master.ruangan.create') }}" class="btn btn-success rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-2">
                        <button id="tarikDataRoom" class="btn btn-primary">
                            Tarik Data Room
                        </button>
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
                                <table id="ruangan_table" class="table w-100 table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 250px">Aksi</th>
                                            <th>Room Code</th>
                                            <th>Room Name</th>
                                            <th>IP</th>
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
            $('#status_hapus').change(function() {
                $('#ruangan_table').DataTable().draw();
            });
            $('#status_active').change(function() {
                $('#ruangan_table').DataTable().draw();
            });
        });

        function load_data() {
            $('#ruangan_table').DataTable({
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
                        data: "RoomCode",
                        name: "RoomCode"
                    },
                    {
                        data: "RoomName",
                        name: "RoomName"
                    },
                    {
                        data: "IP",
                        name: "IP"
                    },
                ],
            });
        }

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.ruangan.destroy', ':id') }}'.replace(':id', id);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus dan tidak bisa di aktifkan lagi!",
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
                            $('#ruangan_table').DataTable().ajax.reload();
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
            const url = '{{ route('master.ruangan.changeStatusActive', ':id') }}'.replace(':id', id);

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
                            $('#ruangan_table').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#tarikDataRoom').click(function() {
                var $button = $(this);
                $button.prop('disabled', true);

                $.ajax({
                    url: "{{ url('tarik/room') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data room berhasil ditarik!');
                        console.log(response);
                        $('#ruangan_table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat menarik data room.');
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

    @if (session('success'))
        <script>
            neko_notify('success', '{{ session('success') }}');
        </script>
    @endif
@endpush
