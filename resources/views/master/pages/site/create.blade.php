@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Site</h1>
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
                                <form action="{{ route('master.site.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>SiteCode</label>
                                        <input type="text" class="form-control @error('SiteCode') is-invalid @enderror"
                                        required id="SiteCode" name="SiteCode"/>
                                    </div>
                                    <div class="form-group">
                                        <label>SiteName</label>
                                        <input type="text" class="form-control @error('SiteName') is-invalid @enderror"
                                        required id="SiteName" name="SiteName"/>
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
                                        <label>TaxRegistrantNo</label>
                                        <input type="text" class="form-control @error('TaxRegistrantNo') is-invalid @enderror"
                                        required id="TaxRegistrantNo" name="TaxRegistrantNo"/>
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
