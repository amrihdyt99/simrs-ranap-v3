@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Unit</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

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
                            <form action="{{ route('master.serviceunit.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="ServiceUnitCode">Service Unit Code</label>
                                    <input type="text" class="form-control @error('ServiceUnitCode') is-invalid @enderror"
                                        id="ServiceUnitCode" name="ServiceUnitCode" required>
                                </div>
                                @error('RoomCode')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="ServiceUnitName">Service Unit Name</label>
                                    <input type="text" class="form-control @error('ServiceUnitName') is-invalid @enderror"
                                        id="ServiceUnitName" name="ServiceUnitName" required>
                                </div>
                                @error('ServiceUnitName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="ShortName">Short Name</label>
                                    <input type="text" class="form-control @error('ShortName') is-invalid @enderror"
                                        id="ShortName" name="ShortName">
                                </div>
                                @error('ShortName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="Initial">Initial</label>
                                    <input type="text" class="form-control @error('Initial') is-invalid @enderror"
                                        id="Initial" name="Initial">
                                </div>
                                @error('Initial')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="IsActive">Status</label>
                                    <select id="IsActive" name="IsActive" class="form-control select2bs4">
                                        <option value="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
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