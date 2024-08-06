@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Service Unit</h1>
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
                                <form action="{{ route('master.departement.update', $departement->DepartmentCode) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>DepartmentCode</label>
                                        <input type="text" class="form-control" id="DepartmentCode" name="DepartmentCode"
                                            value="{{ $departement->DepartmentCode }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>DepartmentName</label>
                                        <input type="text" class="form-control" id="DepartmentName" name="DepartmentName"
                                            value="{{ $departement->DepartmentName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Short Name</label>
                                        <input type="text" class="form-control" id="ShortName" name="ShortName"
                                            value="{{ $departement->ShortName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Initial</label>
                                        <input  type="text" class="form-control" id="Initial" name="Initial"
                                            value="{{ $departement->Initial }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsHasRegistration</label>
                                        <input type="number" class="form-control" id="IsHasRegistration" name="IsHasRegistration"
                                            value="{{ $departement->IsHasRegistration }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsHasPrescription</label>
                                        <input class="form-control" id="IsHasPrescription"
                                            name="IsHasPrescription"
                                            value="{{ $departement->IsHasPrescription }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsGenerateMedicalNo</label>
                                        <input type="number" class="form-control" id="IsGenerateMedicalNo" name="IsGenerateMedicalNo"
                                            value="{{ $departement->IsGenerateMedicalNo }}" />
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
