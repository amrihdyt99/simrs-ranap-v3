@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)



@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Data Ketersediaan Kamar</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('nyaa_content_body')

@section('nyaa_content_body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form id="formKetersediaanKamar" action="{{ route('master.ketersediaanruangan.update', $bed->bed_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Service Unit</label>
                                            <input class="form-control" id="" name="" value="{{ $bed->d_service_unit->unit->ServiceUnitName }}" disabled />
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Room</label>
                                            <input class="form-control" id="" name="" value="{{ $bed->room->RoomName }}" disabled />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <input class="form-control" id="" name="" value="{{ $bed->class->ClassName }}" disabled />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bed Code</label>
                                            <input class="form-control" id="" name="" value="{{ $bed->bed_code }}" disabled />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status Kamar</label>
                                            <select class="form-control select2bs4" name="bed_status" id="bed_status">
                                                <option value="0116^R" {{ $bed->bed_status === '0116^R' ? 'selected':'' }}>Ready</option>
                                                <option value="0116^O" {{ $bed->bed_status === '0116^O' ? 'selected':'' }}>Sedang Dipakai</option>
                                                <option value="0116^C" {{ $bed->bed_status === '0116^C' ? 'selected':'' }}>Cleaning</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Catatan :</label>
                                            <input class="form-control" id="desc" name="desc" value="" />
                                        </div>
                                    </div>

                                    @if ($pasien != null)

                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-header"><b>INFORMASI PASIEN</b></div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <input class="form-control" type="hidden" id="bed_history_id" name="bed_history_id" value="{{ $bed->bed_history->id }}" readonly />

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nomor Registrasi</label>
                                                            <input class="form-control" id="" name="" value="{{ $pasien->reg_no }}" readonly />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Medical Number</label>
                                                            <input class="form-control" id="" name="" value="{{ $pasien->MedicalNo }}" readonly />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama Pasien</label>
                                                            <input class="form-control" id="" name="" value="{{ $pasien->PatientName }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir Pasien</label>
                                                            <input class="form-control" id="" name="" value="{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($pasien->DateOfBirth) }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <input class="form-control" id="" name="" value="{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($pasien->GCSex) }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Umur</label>
                                                            <input class="form-control" id="" name="" value="{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->kalkulasi_umur($pasien->DateOfBirth) }}" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal Masuk Ruangan</label>
                                                            <input class="form-control" id="" name="" value="{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($bed->bed_history->ReceiveTransferDate) }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                @if ($bed->bed_status === '0116^O')
                                <button id="btnConfirmPulang" type="submit" class="btn btn-submit btn-warning mt-3">Konfirmasi Pasien Pulang</button>
                                @else
                                <button id="btnConfirmChange" type="submit" class="btn btn-submit btn-primary mt-3">Simpan</button>
                                @endif
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('nyaa_scripts')
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $("#formKetersediaanKamar").submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let btnSubmit = form.find("[type='submit']");
        let btnSubmitHtml = btnSubmit.html();
        let labelSweetAlert = (btnSubmitHtml == "Simpan") ? "Update status ruangan ?" : "Konfirmasi Pasien Pulang ?";
        let textSweetAlert = (btnSubmitHtml == "Simpan") ? "" : "Pasien tidak bisa dikembalikan ke ruangan !";
        let url = form.attr("action");
        let data = new FormData(this);
        Swal.fire({
            title: labelSweetAlert,
            text: textSweetAlert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, konfirmasi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    beforeSend: function() {
                        btnSubmit.addClass("disabled").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...').prop("disabled", "disabled");
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
                        if (response.status === "success") {
                            neko_notify('success', `Data berhasil disimpan`);
                            setTimeout(function() {
                                location.href = "{{ route('master.ketersediaanruangan.index') }}";
                            }, 1000)
                        } else {
                            neko_notify('error', response.message);
                        }
                    },
                    error: function(response) {
                        btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
                        neko_notify('error', `Ups, something wrong !`);
                    }
                });
            }
        });
    });
</script>
@endpush