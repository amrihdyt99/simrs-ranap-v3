@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Location</h1>
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
                                <form action="{{ route('master.location.update', $location->LocationID) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>LocationID</label>
                                        <input type="number" class="form-control" id="LocationID" name="LocationID"
                                            value="{{ $location->LocationID }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>SiteCode</label>
                                        <input type="text" class="form-control" id="SiteCode" name="SiteCode"
                                            value="{{ $location->SiteCode }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>LocationCode</label>
                                        <input type="text" class="form-control" id="LocationCode" name="LocationCode"
                                            value="{{ $location->LocationCode }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>LocationName</label>
                                        <input type="text" class="form-control" id="LocationName" name="LocationName"
                                            value="{{ $location->LocationName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>ShortName</label>
                                        <input type="text" class="form-control" id="ShortName" name="ShortName"
                                            value="{{ $location->ShortName }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Initial</label>
                                        <input type="text" class="form-control" id="Initial" name="Initial"
                                            value="{{ $location->Initial }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>PermissionCode</label>
                                        <input type="text" class="form-control" id="PermissionCode" name="PermissionCode"
                                            value="{{ $location->PermissionCode }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>ParentID</label>
                                        <input type="text" class="form-control" id="ParentID" name="ParentID"
                                            value="{{ $location->ParentID }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" class="form-control" id="Remarks" name="Remarks"
                                            value="{{ $location->Remarks }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsAllowOverIssued</label>
                                        <input type="number" class="form-control" id="IsAllowOverIssued"
                                            name="IsAllowOverIssued" value="{{ $location->IsAllowOverIssued }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsNettable</label>
                                        <input type="number" class="form-control" id="IsNettable" name="IsNettable"
                                            value="{{ $location->IsNettable }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsHoldForTransaction</label>
                                        <input type="number" class="form-control" id="IsHoldForTransaction"
                                            name="IsHoldForTransaction" value="{{ $location->IsHoldForTransaction }}" />
                                    </div>
                                    <div class="form-group">
                                        <label>IsDisplayStock</label>
                                        <input type="number" class="form-control" id="IsDisplayStock" name="IsDisplayStock"
                                            value="{{ $location->IsDisplayStock }}" />
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
