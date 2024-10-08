@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Data Kelas</h1>
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
                            <form action="{{ route('master.class.update', $room_class->ClassCode) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="ClassCode">Class Code</label>
                                    <input type="text" class="form-control "
                                        value="{{ $room_class->ClassCode }}" id="ClassCode" name="ClassCode" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="ClassName">Class Name</label>
                                    <input type="text" class="form-control @error('ClassName') is-invalid @enderror"
                                        value="{{ $room_class->ClassName }}" id="ClassName" name="ClassName" required>
                                </div>
                                @error('ClassName')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="ShortName">Short Name</label>
                                    <input type="text" class="form-control"
                                        id="ShortName" name="ShortName" value="{{ $room_class->ShortName ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label for="Initial">Initial</label>
                                    <input type="text" class="form-control"
                                        id="Initial" name="Initial" value="{{ $room_class->Initial ?? '' }}">
                                </div>


                                <div class="form-group">
                                    <label for="ClassCategoryCode">Class Category</label>
                                    <select id="ClassCategoryCode" name="ClassCategoryCode" class="form-control select2bs4">
                                        <option value="">Pilih Class Category</option>
                                        @foreach ($classCategory as $cd)
                                        <option value="{{ $cd->ClassCategoryCode }}" {{ $room_class->ClassCategoryCode == $cd->ClassCategoryCode ? 'selected' : '' }}>{{ $cd->ClassCategoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="IsActive">Status</label>
                                    <select id="IsActive" name="IsActive" class="form-control select2bs4">
                                        <option value="">Pilih Status</option>
                                        <option value="1" {{ $room_class->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $room_class->IsActive == '1' ? 'selected' : '' }}>Tidak Aktif</option>
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