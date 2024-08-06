@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Location</h1>
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
                                <form action="{{ route('master.location.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>LocationID</label>
                                        <input type="number" class="form-control @error('LocationID') is-invalid @enderror"
                                        required id="LocationID" name="LocationID"/>
                                    </div>
                                    <div class="form-group">
                                        <label>SiteCode</label>
                                        <input type="text" class="form-control @error('SiteCode') is-invalid @enderror"
                                        required id="SiteCode" name="SiteCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>LocationCode</label>
                                        <input type="text" class="form-control @error('LocationCode') is-invalid @enderror"
                                        required id="LocationCode" name="LocationCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>LocationName</label>
                                        <input type="text" class="form-control @error('LocationName') is-invalid @enderror"
                                        required id="LocationName" name="LocationName"/>
                                    </div>
                                    <div class="form-group">
                                        <label>ShortName</label>
                                        <input type="text" class="form-control @error('ShortName') is-invalid @enderror"
                                        required id="ShortName" name="ShortName"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Initial</label>
                                        <input class="form-control @error('Initial') is-invalid @enderror"
                                        required id="Initial" name="Initial"/>
                                    </div>
                                    <div class="form-group">
                                        <label>PermissionCode</label>
                                        <input type="text" class="form-control @error('PermissionCode') is-invalid @enderror"
                                        required id="PermissionCode" name="PermissionCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>ParentID</label>
                                        <input type="text" class="form-control @error('ParentID') is-invalid @enderror"
                                        required id="ParentID" name="ParentID"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" class="form-control @error('Remarks') is-invalid @enderror"
                                        required id="Remarks" name="Remarks"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsAllowOverIssued</label>
                                        <input type="number" class="form-control @error('IsAllowOverIssued') is-invalid @enderror"
                                        required id="IsAllowOverIssued" name="IsAllowOverIssued"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsNettable</label>
                                        <input type="number" class="form-control @error('IsNettable') is-invalid @enderror"
                                        required id="IsNettable" name="IsNettable"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsHoldForTransaction</label>
                                        <input type="number" class="form-control @error('IsHoldForTransaction') is-invalid @enderror"
                                        required id="IsHoldForTransaction" name="IsHoldForTransaction"/>
                                    </div>
                                    <div class="form-group">
                                        <label>IsDisplayStock</label>
                                        <input type="number" class="form-control @error('IsDisplayStock') is-invalid @enderror"
                                        required id="IsDisplayStock" name="IsDisplayStock"/>
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
