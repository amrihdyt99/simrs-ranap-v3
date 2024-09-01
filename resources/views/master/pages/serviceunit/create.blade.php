@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
                                        <label>ServiceUnitCode</label>
                                        <input type="text" class="form-control @error('ServiceUnitCode') is-invalid @enderror"
                                        required id="ServiceUnitCode" name="ServiceUnitCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>ServiceUnitName</label>
                                        <input type="text" class="form-control @error('ServiceUnitName') is-invalid @enderror"
                                        required id="ServiceUnitName" name="ServiceUnitName"/>
                                    </div>
                                    <div class="form-group">
                                        <label>ShortName</label>
                                        <input type="text" class="form-control @error('ShortName') is-invalid @enderror"
                                        required id="ShortName" name="ShortName"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Initial</label>
                                        <input type="text" class="form-control @error('Initial') is-invalid @enderror"
                                        required id="Initial" name="Initial"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsUsingJobOrder</label>
                                        <input type="number" class="form-control @error('IsUsingJobOrder') is-invalid @enderror"
                                        required id="IsUsingJobOrder" name="IsUsingJobOrder"/>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>PatientServiceInterval</label>
                                        <input class="form-control @error('PatientServiceInterval') is-invalid @enderror"
                                        required id="PatientServiceInterval" name="PatientServiceInterval"/>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>IsBor</label>
                                        <input type="number" class="form-control @error('IsBor') is-invalid @enderror"
                                        required id="IsBor" name="IsBor"/>
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
