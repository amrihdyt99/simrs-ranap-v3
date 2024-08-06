@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Departement</h1>
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
                                <form action="{{ route('master.departement.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>DepartmentCode</label>
                                        <input type="text" class="form-control @error('DepartmentCode') is-invalid @enderror"
                                        required id="DepartmentCode" name="DepartmentCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>DepartmentName</label>
                                        <input type="text" class="form-control @error('DepartmentName') is-invalid @enderror"
                                        required id="DepartmentName" name="DepartmentName"/>
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
                                        <label>IsHasRegistration</label>
                                        <input type="number" class="form-control @error('IsHasRegistration') is-invalid @enderror"
                                        required id="IsHasRegistration" name="IsHasRegistration"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsHasPrescription</label>
                                        <input class="form-control @error('IsHasPrescription') is-invalid @enderror"
                                        required id="IsHasPrescription" name="IsHasPrescription"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsGenerateMedicalNo</label>
                                        <input type="number" class="form-control @error('IsGenerateMedicalNo') is-invalid @enderror"
                                        required id="IsGenerateMedicalNo" name="IsGenerateMedicalNo"/>
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
