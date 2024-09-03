@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Location</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm-10 pb-3">
            <a href="{{ route('master.location.create') }}" class="protecc btn btn-sm btn-success">
                Tambah Data Baru
            </a>
        </div>
        <div class="col-sm-2">
            <button id="tarikDataLocation" class="btn btn-primary">
                Tarik Data Location
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

            <table id="location" class="w-100 table table-bordered">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>LocationID</th>
                        <th>SiteCode</th>
                        <th>LocationCode</th>
                        <th>LocationName</th>
                        <th>ShortName</th>
                        <th>Initial</th>
                        <th>PermissionCode</th>
                        <th>ParentID</th>
                        <th>Remarks</th>
                        <th>IsAllowOverIssued</th>
                        <th>IsNettable</th>
                        <th>IsHoldForTransaction</th>
                        <th>IsDisplayStock</th>
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
            $('#location').DataTable({
                processing: true,
                serverSide: true,
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
                        data: "LocationID",
                        name: "LocationID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "SiteCode",
                        name: "SiteCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "LocationCode",
                        name: "LocationCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "LocationName",
                        name: "LocationName",
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
                        data: "PermissionCode",
                        name: "PermissionCode",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "ParentID",
                        name: "ParentID",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "Remarks",
                        name: "Remarks",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsAllowOverIssued",
                        name: "IsAllowOverIssued",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsNettable",
                        name: "IsNettable",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsHoldForTransaction",
                        name: "IsHoldForTransaction",
                        orderable: true,
                        searchable: true,
                    },
                    {
                        data: "IsDisplayStock",
                        name: "IsDisplayStock",
                        orderable: true,
                        searchable: true,
                    },

                ],
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tarikDataLocation').click(function() {
                $.ajax({
                    url: "{{ url('tarik/location') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data location berhasil ditarik!');
                        console.log(response);
                        $('#location').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert(
                            'Terjadi kesalahan saat menarik data location.');
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
