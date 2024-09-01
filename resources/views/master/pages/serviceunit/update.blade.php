@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Unit</h1>
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
                                <form action="{{ route('master.serviceunit.update', $serviceunit->ServiceUnitCode) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Service Unit Code</label>
                                        <input type="text" class="form-control" id="ServiceUnitName" name="ServiceUnitCode"
                                            value="{{ $serviceunit->ServiceUnitCode }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Service Unit Name</label>
                                        <input type="text" class="form-control" id="ServiceUnitName" name="ServiceUnitName"
                                            value="{{ $serviceunit->ServiceUnitName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Short Name</label>
                                        <input type="text" class="form-control" id="ShortName" name="ShortName"
                                            value="{{ $serviceunit->ShortName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Initial</label>
                                        <input  type="text" class="form-control" id="Initial" name="Initial"
                                            value="{{ $serviceunit->Initial }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsUsingJobOrder</label>
                                        <input type="number" class="form-control" id="IsUsingJobOrder" name="IsUsingJobOrder"
                                            value="{{ $serviceunit->IsUsingJobOrder }}" />
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>PatientServiceInterval</label>
                                        <input class="form-control" id="PatientServiceInterval"
                                            name="PatientServiceInterval"
                                            value="{{ $serviceunit->PatientServiceInterval }}" />
                                    </div> --}}
                                    <div class="form-group">
                                        <label>IsBor</label>
                                        <input type="number" class="form-control" id="IsBor" name="IsBor"
                                            value="{{ $serviceunit->IsBor }}" />
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
