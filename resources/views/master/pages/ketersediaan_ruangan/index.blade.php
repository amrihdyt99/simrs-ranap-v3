@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Ketersediaan Ruangan</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm-6 pb-3">
            <a href="{{ route('master.ketersediaanruangan.create') }}" class="protecc btn btn-sm btn-success">
                Tambah Data Baru
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table id="ruangan_table" class="w-100 table table-bordered">
                <thead>
                    <tr>
                        <th>ID Paviliun</th>
                        <th>Nama Paviliun</th>
                        <th>Room Code</th>
                        <th>Nama Ruangan</th>
                        <th>Nomor Bed</th>
                        <th>Kelas</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('nyaa_scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
            load_data();
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
                        "X-HTTP-Method-Override": "GET"
                    }
                },
                columns: [{
                        data: "id_paviliun",
                        name: "id_paviliun",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "nama_pavilun",
                        name: "nama_pavilun",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "room_code",
                        name: "room_code",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "nama_ruangan",
                        name: "nama_ruangan",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "nomor_bed",
                        name: "nomor_bed",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "nama_kelas",
                        name: "nama_kelas",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "harga_perhari",
                        name: "harga_perhari",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "status_ketersediaan",
                        name: "status_ketersediaan",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "aksi_data",
                        name: "aksi_data",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        }

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.ketersediaanruangan.destroy', ':id') }}'.replace(':id', id);

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
    @if (session('success'))
        <script>
            neko_notify('success', '{{ session('success') }}');
        </script>
    @endif
@endpush
