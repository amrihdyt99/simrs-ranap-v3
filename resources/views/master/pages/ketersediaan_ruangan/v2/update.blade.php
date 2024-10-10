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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('master.ketersediaanruangan.update', $bed->bed_id) }}" method="POST">
                                @csrf
                                @method('PUT')
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
                                                <option value="0116^R" {{ $bed->status_ketersediaan === '0116^R' ? 'selected':'' }}>Ready</option>
                                                <option value="0116^O" {{ $bed->status_ketersediaan === '0116^O' ? 'selected':'' }}>Sedang Dipakai</option>
                                                <option value="0116^C" {{ $bed->status_ketersediaan === '0116^C' ? 'selected':'' }}>Cleaning</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Catatan :</label>
                                            <input class="form-control" id="desc" name="desc" value="" />
                                        </div>
                                    </div>


                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-header">Informasi Pasien</div>
                                            <div class="card-body">
                                                <div class="row">

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
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
</script>
@endpush