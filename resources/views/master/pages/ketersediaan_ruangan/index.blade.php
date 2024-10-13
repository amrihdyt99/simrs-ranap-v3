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
    <div class="col-md-4">
        <div class="form-group">
            <label for="service_unit_id">Service Unit</label>
            <select id="service_unit_id" name="service_unit_id" class="form-control select2bs4" required>
                <option value="">--Pilih Service Unit--</option>
                @foreach ($service_unit as $row)
                <option value="{{ $row->ServiceUnitID }}">{{ $row->ServiceUnitName }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="room_id">Ruangan</label>
            <select id="room_id" name="room_id" class="form-control select2bs4" required>
                <option value="">--Pilih Ruangan--</option>
                @foreach ($room as $row)
                <option value="{{ $row->RoomID }}">{{ $row->RoomName }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="class_code">Kelas</label>
            <select id="class_code" name="class_code" class="form-control select2bs4" required>
                <option value="">--Pilih Kelas--</option>
                @foreach ($class as $row)
                <option value="{{ $row->ClassCode }}">{{ $row->ClassName }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bed_status">Status</label>
            <select id="bed_status" name="bed_status" class="form-control select2bs4" required>
                <option value="">Semua</option>
                <option value="0116^R">Ready</option>
                <option value="0116^O">Sedang Dipakai</option>
                <option value="0116^C">Cleaning</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="ruangan_table" class="w-100 table table-bordered">
            <thead>
                <tr>
                    <th>Service Unit</th>
                    <th>Room</th>
                    <th>Kelas</th>
                    <th>Bed Code</th>
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
    $(document).ready(function() {

        $('#service_unit_id').change(function() {
            $('#ruangan_table').DataTable().draw();
        });
        $('#room_id').change(function() {
            $('#ruangan_table').DataTable().draw();
        });
        $('#class_code').change(function() {
            $('#ruangan_table').DataTable().draw();
        });
        $('#bed_status').change(function() {
            $('#ruangan_table').DataTable().draw();
        });

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
                },
                data: function(d) {
                    d.service_unit_id = $('#service_unit_id').val();
                    d.room_id = $('#room_id').val();
                    d.class_code = $('#class_code').val();
                    d.bed_status = $('#bed_status').val();
                }
            },
            columns: [{
                    data: "d_service_unit.unit.ServiceUnitName",
                    name: "d_service_unit.unit.ServiceUnitName",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "room.RoomName",
                    name: "room.RoomName",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "class.ClassName",
                    name: "class.ClassName",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "bed_code",
                    name: "bed_code",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "bed_status",
                    name: "bed_status",
                    render: function(columnData, type, rowData, meta) {
                        if (columnData == "0116^R") {
                            return `<span class="badge badge-success text-white">Ready</span>`;
                        } else if (columnData == "0116^O") {
                            return `<span class="badge badge-danger">Sedang Dipakai</span>`;
                        } else if (columnData == "0116^C") {
                            return `<span class="badge badge-warning">Cleaning</span>`;
                        }
                    }
                },
                {
                    data: "aksi_data",
                    name: "aksi_data",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    })

    // Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    function confirmDelete(element) {
        const id = $(element).data('id');
        const url = `{{ route('master.ketersediaanruangan.destroy', ':id') }}`.replace(':id', id);

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
    neko_notify('success', `{{ session('success') }}`);
</script>
@endif
@endpush