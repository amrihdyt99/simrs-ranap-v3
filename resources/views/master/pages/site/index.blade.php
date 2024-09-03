@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Site</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm-6 pb-3">
            <a href="{{ route('master.site.create') }}" class="protecc btn btn-sm btn-success">
                Tambah Data Baru
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table id="site" class="w-100 table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>SiteCode</th>
                        <th>SiteName</th>
                        <th>ShortName</th>
                        <th>Initial</th>
                        <th>TaxRegistrantNo</th>
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
            $('#site').DataTable({
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
                        data: "SiteCode",
                        name: "SiteCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "SiteName",
                        name: "SiteName",
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
                        data: "TaxRegistrantNo",
                        name: "TaxRegistrantNo",
                        orderable: true,
                        searchable: true,
                    },
                ],
            });
        }

        function confirmDelete(element) {
            const id = $(element).data('id');
            const url = '{{ route('master.site.destroy', ':id') }}'.replace(':id', id);

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
    </script>
    

    @if (session('success'))
        <script>
            neko_notify('success', '{{ session('success') }}');
        </script>
    @endif
@endpush
