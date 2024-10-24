@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Data Master - Bed Management</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
    <div class="col-sm-10">
        <a href="{{ route('master.bed.create') }}" class="protecc btn btn-sm btn-success">
            Tambah Data Baru
        </a>
    </div>
    <div class="col-sm-2">
        <button id="tarikDataBed" class="btn btn-primary">
            Tarik Data Bed
        </button>
    </div>
</div>

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
    <div class="col-2">
        <div class="form-group">
            <select id="status_temporary" class="form-control">
                <option value="">Semua</option>
                <option value="1">Temporary</option>
                <option value="0" selected>Tidak Temporary</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="bed_table" class="w-100 table table-bordered">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Service Unit</th>
                    <th>Room</th>
                    <th>Kelas</th>
                    <th>Bed Code</th>
                    <th>Type Bed</th>
                    <th>Temporary Bed</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('nyaa_scripts')
<script>
    $(function() {

        $('#status_hapus').change(function() {
            $('#bed_table').DataTable().draw();
        });
        $('#status_temporary').change(function() {
            $('#bed_table').DataTable().draw();
        });
        $('#status_active').change(function() {
            $('#bed_table').DataTable().draw();
        });
        // $('#status_bed').change(function() {
        //     $('#bed_table').DataTable().draw();
        // });
    });


    function confirmDelete(element) {
        const id = $(element).data('id');
        const url = `{{ route('master.bed.destroy', ':id') }}`.replace(':id', id);

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
                        $('#bed_table').DataTable().ajax.reload();
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
        const url = `{{ route('master.bed.changeStatusActive', ':id') }}`.replace(':id', id);

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
                        $('#bed_table').DataTable().ajax.reload();
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

        $('#bed_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            order: [
                [2, 'asc'],
                [4, 'asc']
            ],
            ajax: {
                url: "{{ url()->current() }}",
                type: "POST",
                headers: {
                    "X-HTTP-Method-Override": "GET",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: function(d) {
                    d.is_deleted = $('#status_hapus').val();
                    d.is_temporary = $('#status_temporary').val();
                    d.is_active = $('#status_active').val();
                    // d.bed_status = $('#status_bed').val();
                }
            },
            columns: [{
                    data: "aksi_data",
                    orderable: false,
                    searchable: false
                },
                {
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
                    data: "gc_type_of_bed",
                    name: "gc_type_of_bed",
                    render: function(columnData, type, rowData, meta) {
                        if (columnData == "1X0126^01") {
                            return `ISO BED`;
                        } else if (columnData == "X0126^02") {
                            return `SINGLE BED`;
                        } else if (columnData == "X0126^03") {
                            return `SHD BED`;
                        } else if (columnData == "X0126^04") {
                            return `MHO BED`;
                        } else if (columnData == "X0126^05") {
                            return `ICU BED`;
                        } else {
                            return ``;
                        }
                    }
                },
                {
                    data: "is_temporary",
                    name: "is_temporary",
                    render: function(columnData, type, rowData, meta) {
                        if (columnData == "1") {
                            return `<span class="badge badge-success text-white">Ya</span>`;
                        } else {
                            return `<span class="badge badge-danger">Tidak</span>`;
                        }
                    }
                },
                {
                    data: "is_active",
                    name: "is_active",
                    render: function(columnData, type, rowData, meta) {
                        if (columnData == "1") {
                            return `<span class="badge badge-success text-white">Aktif</span>`;
                        } else if (columnData == "0") {
                            return `<span class="badge badge-danger text-white">Tidak Aktif</span>`;
                        }
                    }
                },
            ],
        });

        $('#tarikDataBed').click(function() {
            Swal.fire({
                title: 'Tarik Data Bed ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tarik!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('tarik/bed') }}",
                        method: 'GET',
                        success: function(response) {
                            alert('Data bed berhasil ditarik!');
                            console.log(response);
                            $('#bed_table').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            alert(
                                'Terjadi kesalahan saat menarik data bed.');
                            console.log(error);
                        }
                    });
                }
            });
        });
    });
</script>

@if (session('success'))
<script>
    neko_notify('success', `{{ session('success') }}`);
</script>
@endif
@endpush