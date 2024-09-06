@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Unit Management</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm-10 pb-3">
            <a href="{{ route('master.unit.create') }}" class="protecc btn btn-sm btn-success">
                Tambah Data Baru
            </a>
        </div>
        <div class="col-sm-2">
            <button id="tarikDataUnit" class="btn btn-primary">
                Tarik Data Unit
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

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

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.unit.destroy', ':id') }}'.replace(':id', id);

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
                            $('#site').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            neko_d_custom_error(response.responseJSON.error);
                        }
                    });
                }
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

    @if (session('success'))
        <script>
            neko_notify('success', '{{ session('success') }}');
        </script>
    @endif
@endpush
