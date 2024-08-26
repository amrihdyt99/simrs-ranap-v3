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
                                <form action="{{ route('master.bed.store') }}" method="POST" id="bed_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="service_unit_id">Service Unit</label>
                                                <select id="service_unit_id" name="service_unit_id" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Service Unit--</option>
                                                    @foreach ($service_unit as $row)
                                                        <option value="{{ $row->ServiceUnitCode }}">{{ $row->ServiceUnitName }}</option>
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
                                                        <option value="{{ $row->RoomID }}">{{ $row->RoomName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
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
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gc_type_of_bed">Type Bed</label>
                                                <select id="gc_type_of_bed" name="gc_type_of_bed" class="form-control select2bs4" required>
                                                    <option value="">Pilih Type Bed</option>
                                                    <option value="ICU BED">ICU BED</option>
                                                    <option value="ISO BED">ISO BED</option>
                                                    <option value="MHO BED">MHO BED</option>
                                                    <option value="SHD BED">SHD BED</option>
                                                    <option value="SINGLE BED">SINGLE BED</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="site">Site</label>
                                                <select id="site" name="site_code" class="form-control select2bs4" required>
                                                    <option value="">--Pilih Site--</option>
                                                    @foreach ($site as $row)
                                                        <option value="{{ $row->SiteCode }}">{{ $row->SiteName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="submit_button">Simpan</button>
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

        document.getElementById('bed_form').addEventListener('submit', function() {
            let submitButton = document.getElementById('submit_button');
            submitButton.disabled = true;
            submitButton.innerHTML = 'Menyimpan...'; 
        });
    </script>
@endpush
