@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Data Master - Room</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
    <div class="col-sm-10 pb-3">
        <a href="{{ route('master.ruangan.create') }}" class="protecc btn btn-sm btn-success">
            Tambah Data Baru
        </a>
    </div>
    <div class="col-sm-2">
        <button id="tarikDataRoom" class="btn btn-primary">
            Tarik Data Room
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
</div>

<div class="row">
    <div class="col-12">
        <table id="ruangan_table" class="table w-100 table-bordered">
            <thead>
                <tr>
                    <th>Room Code</th>
                    <th>Room Name</th>
                    <th>IP</th>
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
                {
                    data: "IsActive",
                    name: "IsActive",
                    orderable: false,
                    searchable: false,
                    render: function(columnData, type, rowData, meta) {
                        if (columnData == "1") {
                            return `<span class="badge badge-success text-white">Aktif</span>`;
                        } else {
                            return `<span class="badge badge-danger">Tidak Aktif</span>`;
                        }
                    }
                },
                {
                    data: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    }

    function confirmDelete(element) {
        const id = $(element).data('id');
        const url = `{{ route('master.ruangan.destroy', ':id') }}`.replace(':id', id);

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
        const url = `{{ route('master.ruangan.changeStatusActive', ':id') }}`.replace(':id', id);

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
            Swal.fire({
                title: 'Tarik Data Room ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
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