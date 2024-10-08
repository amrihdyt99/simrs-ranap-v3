@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Data Ruangan</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('nyaa_content_body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('master.departement.update', $department->DepartmentCode)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="DeparmentCode">Department Code</label>
                                    <input type="text" value="{{$department->DepartmentCode}}" class="form-control @error('DeparmentCode') is-invalid @enderror"
                                        id="DeparmentCode" name="DeparmentCode" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="DepartmentName">Department Name</label>
                                    <input type="text" value="{{$department->DepartmentName}}" class="form-control @error('DepartmentName') is-invalid @enderror"
                                        id="DepartmentName" name="DepartmentName" required>
                                </div>
                                @error('DepartmentName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="ShortName">Short Name</label>
                                    <input type="text" value="{{$department->ShortName}}" class="form-control @error('ShortName') is-invalid @enderror"
                                        id="ShortName" name="ShortName">
                                </div>
                                @error('ShortName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="Initial">Initial</label>
                                    <input type="text" value="{{$department->Initial}}" class="form-control @error('Initial') is-invalid @enderror"
                                        id="Initial" name="Initial">
                                </div>

                                @error('Initial')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="IsActive">Status</label>
                                    <select id="IsActive" name="IsActive" class="form-control select2bs4">
                                        <option value="">Pilih Status</option>
                                        <option value="1" {{ $department->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $department->IsActive == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
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
    // Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
</script>
@endpush