@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Bed</h1>
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
                                <form action="{{ route('master.bed.update', $bed->bed_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bed_id">Bed ID</label>
                                                <input type="text" class="form-control" id="bed_id" name="bed_id" 
                                                    value="{{ $bed->bed_id }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="service_unit_id">Service Unit</label>
                                                <select id="service_unit_id" name="service_unit_id" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Service Unit--</option>
                                                    @foreach ($service_unit as $row)
                                                        <option value="{{ $row->ServiceUnitCode }}" 
                                                            {{ $row->ServiceUnitCode == $bed->service_unit_id ? 'selected' : '' }}>
                                                            {{ $row->ServiceUnitName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="room_id">Ruangan</label>
                                                <select id="room_id" name="room_id" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Ruangan--</option>
                                                    @foreach ($room as $row)
                                                        <option value="{{ $row->RoomID }}" 
                                                            {{ $row->RoomID == $bed->room_id ? 'selected' : '' }}>
                                                            {{ $row->RoomName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="class_code">Kelas</label>
                                                <select id="class_code" name="class_code" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Kelas--</option>
                                                    @foreach ($class as $row)
                                                        <option value="{{ $row->ClassCode }}" 
                                                            {{ $row->ClassCode == $bed->class_code ? 'selected' : '' }}>
                                                            {{ $row->ClassName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bed_code">Type Bed</label>
                                                <select id="bed_code" name="bed_code" class="form-control select2bs4" required>
                                                    <option value="">Pilih Type Bed</option>
                                                    <option value="ICU BED" {{ $bed->bed_code == 'ICU BED' ? 'selected' : '' }}>ICU BED</option>
                                                    <option value="ISO BED" {{ $bed->bed_code == 'ISO BED' ? 'selected' : '' }}>ISO BED</option>
                                                    <option value="MHO BED" {{ $bed->bed_code == 'MHO BED' ? 'selected' : '' }}>MHO BED</option>
                                                    <option value="SHD BED" {{ $bed->bed_code == 'SHD BED' ? 'selected' : '' }}>SHD BED</option>
                                                    <option value="SINGLE BED" {{ $bed->bed_code == 'SINGLE BED' ? 'selected' : '' }}>SINGLE BED</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="site">Site</label>
                                                <select id="site" name="site_code" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Site--</option>
                                                    @foreach ($site as $row)
                                                        <option value="{{ $row->SiteCode }}" 
                                                            {{ $row->SiteCode == $bed->site_code ? 'selected' : '' }}>
                                                            {{ $row->SiteName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="is_temporary">Status Temporary</label>
                                                <select id="is_temporary" name="is_temporary" class="form-control select2bs4">
                                                    <option value="">Pilih Status Temporary</option>
                                                    <option value="1" {{ $bed->is_temporary == '1' ? 'selected' : '' }}>Ya</option>
                                                    <option value="0" {{ $bed->is_temporary == '0' ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
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
        // Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
