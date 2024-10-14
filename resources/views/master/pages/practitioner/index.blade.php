@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Data Master - Practitioner</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
    <div class="col-sm-10 pb-3">
        <a href="{{ route('master.practitioner.create') }}" class="protecc btn btn-sm btn-success">
            Tambah Data Baru
        </a>
    </div>
    <div class="col-sm-2">
        <button id="tarikDataParamedic" class="btn btn-primary">
            Tarik Data Paramedic
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
        <table id="paramedic_table" class="w-100 table table-bordered">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Paramedic Name</th>
                    <th>SpecialtyCode</th>
                    <th>StartExperienceDate</th>
                    <th>LicenseExpiredDate</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('nyaa_scripts')
<script>
    $(function() {
        load_data();

        $('#status_hapus').change(function() {
            $('#paramedic_table').DataTable().draw();
        });
        $('#status_active').change(function() {
            $('#paramedic_table').DataTable().draw();
        });
    });

    function load_data() {
        $('#paramedic_table').DataTable({
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
                    data: "ParamedicName",
                    name: "ParamedicName"
                },
                {
                    data: "SpecialtyCode",
                    name: "SpecialtyCode"
                },
                {
                    data: "StartExperienceDate",
                    name: "StartExperienceDate"
                },
                {
                    data: "LicenseExpiredDate",
                    name: "LicenseExpiredDate"
                },

            ],
        });
    }

    function confirmDelete(element) {
        const id = $(element).data('id');
        const url = `{{ route('master.practitioner.destroy', ':id') }}`.replace(':id', id);

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
                        $('#paramedic_table').DataTable().ajax.reload();
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
        const url = `{{ route('master.practitioner.changeStatusActive', ':id') }}`.replace(':id', id);

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
                        $('#paramedic_table').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        neko_d_custom_error(response.responseJSON.error);
                    }
                });
            }
        });
    }

    $('#tarikDataParamedic').click(function() {
        var $button = $(this);
        $button.prop('disabled', true);

        Swal.fire({
            title: 'Tarik Data Paramedic ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('tarik/paramedic') }}",
                    method: 'GET',
                    success: function(response) {
                        alert('Data berhasil ditarik!');
                        $('#paramedic_table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat menarik data.');
                        console.log(error);
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                    }
                });
            }
        });


    });
</script>
@if (session('success'))
<script>
    neko_notify('success', `{{ session('success') }}`);
</script>
@endif
@endpush