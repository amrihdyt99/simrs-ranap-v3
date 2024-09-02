@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Departement</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm-10 pb-3">
            <a href="{{ route('master.departement.create') }}" class="protecc btn btn-sm btn-success">
                Tambah Data Baru
            </a>
        </div>
        <div class="col-sm-2">
            <button id="tarikDataDepartemen" class="btn btn-primary">
                Tarik Data Departemen
            </button>
        </div>
    </div>

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

            <table id="departement" class="w-100 table table-bordered">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>ServiceUnitID</th>
                        <th>SiteDepartmentID</th>
                        <th>ServiceUnitCode</th>
                        <th>ContactPerson1</th>
                        <th>ContactPerson2</th>
                        <th>LocationID</th>
                        <th>GcDefaultOrderType</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
                        data: "aksi_data",
                        orderable: false,
                        searchable: false,
                    },
                    {
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

                ],
            });
        }

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.departement.destroy', ':id') }}'.replace(':id', id);

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
                            $('#departement').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
            });
        }

        @if (session('success'))
            neko_notify('success', '{{ session('success') }}');
        @endif
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
