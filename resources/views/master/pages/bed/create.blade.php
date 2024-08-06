@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Bed</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('master.bed.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="bed_id">Bed ID</label>
                                        <input type="text" class="form-control @error('bed_id') is-invalid @enderror"
                                            id="bed_id" name="bed_id" required>
                                    </div>
                                    @error('bed_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="service_unit_id">Service Unit</label>
                                        <select id="service_unit_id" name="service_unit_id"
                                            class="form-control select2bs4 @error('service_unit_id') is-invalid @enderror"
                                            required>
                                            <option value="">Pilih Service Unit</option>
                                            @foreach ($service_unit as $row)
                                                <option value="{{ $row->ServiceUnitCode }}">
                                                    {{ $row->ServiceUnitName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('service_unit_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="room_id">Ruangan</label>
                                        <select id="room_id" name="room_id"
                                            class="form-control select2bs4 @error('room_id') is-invalid @enderror" required>
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($room as $row)
                                                <option value="{{ $row->RoomID }}">
                                                    {{ $row->RoomName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('room_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="class_code">Kelas</label>
                                        <select id="class_code" name="class_code"
                                            class="form-control select2bs4 @error('class_code') is-invalid @enderror"
                                            required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($class as $row)
                                                <option value="{{ $row->ClassCode }}">
                                                    {{ $row->ClassName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('class_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="typebed">Type Bed</label>
                                        <select id="bed_code" name="bed_code"
                                                class="form-control select2bs4 @error('bed_code') is-invalid @enderror"
                                                required>
                                            <option value="">Pilih Type Bed</option>
                                            <option value="ICU BED">ICU BED</option>
                                            <option value="ISO BED">ISO BED</option>
                                            <option value="MHO BED">MHO BED</option>
                                            <option value="SHD BED">SHD BED</option>
                                            <option value="SINGLE BED">SINGLE BED</option>
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

@push('nyaa_scripts')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
