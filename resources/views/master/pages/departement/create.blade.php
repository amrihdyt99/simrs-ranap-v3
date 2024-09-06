@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Service Unit</h1>
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
                                        <label>SiteDepartmentID</label>
                                        <input type="text" class="form-control" id="SiteDepartmentID" name="SiteDepartmentID"
                                            value="{{ old('SiteDepartmentID') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>ServiceUnitCode</label>
                                        <input type="text" class="form-control" id="ServiceUnitCode" name="ServiceUnitCode"
                                            value="{{ old('ServiceUnitCode') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person 1</label>
                                        <input type="text" class="form-control" id="ContactPerson1" name="ContactPerson1"
                                            value="{{ old('ContactPerson1') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person 2</label>
                                        <input type="text" class="form-control" id="ContactPerson2" name="ContactPerson2"
                                            value="{{ old('ContactPerson2') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>LocationID</label>
                                        <input type="text" class="form-control" id="LocationID" name="LocationID"
                                            value="{{ old('LocationID') }}" />
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
