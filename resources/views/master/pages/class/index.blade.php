@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Data Master - Class Management</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
    <div class="col-sm-10 pb-3">
        <a href="{{ route('master.class.create') }}" class="protecc btn btn-sm btn-success">
            Tambah Data Baru
        </a>
    </div>
    <div class="col-sm-2">
        <button id="tarikDataClass" class="btn btn-primary">
            Tarik Data Class
        </button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="class_table" class="table w-100 table-bordered">
            <thead>
                <tr>
                    <th>Class Code</th>
                    <th>Class Name</th>
                    <th>Initial</th>
                    <th>Class Category</th>
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

    function confirmDelete(element) {
        const id = $(element).data('id');
        const url = `{{ route('master.class.destroy', ':id') }}`.replace(':id', id);

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
                        $('#class_table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        neko_d_custom_error(response.responseJSON.error);
                    }
                });
            }
        });
    }

    function load_data() {
        $('#class_table').DataTable({
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
            },
            columns: [{
                    data: "ClassCode",
                    name: "ClassCode",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "ClassName",
                    name: "ClassName",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "Initial",
                    name: "Initial",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "ClassCategoryName",
                    name: "ClassCategoryName",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "IsActive",
                    name: "IsActive",
                    orderable: false,
                    searchable: false,
                    render: function(columnData, type, rowData, meta) {
                        if (columnData) {
                            return `<span class="badge badge-success text-white">Aktif</span>`;
                        } else {
                            return `<span class="badge badge-danger">Tidak Aktif</span>`;
                        }
                    }
                },
                {
                    data: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#tarikDataClass').click(function() {
            var $button = $(this);
            $button.prop('disabled', true);
            Swal.fire({
                title: 'Tarik Data Class ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('tarik/kelas') }}",
                        method: 'GET',
                        success: function(response) {
                            alert('Data class berhasil ditarik!');
                            console.log(response);
                            $('#class_table').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            alert('Terjadi kesalahan saat menarik data class.');
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
@endpush