@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Data Class Category</h1>
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
              <form action="{{route('master.class-category.update', $classCategory->ClassCategoryCode)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="ClassCategoryCode">Class Category Code</label>
                  <input type="text" value="{{$classCategory->ClassCategoryCode}}" class="form-control @error('ClassCategoryCode') is-invalid @enderror"
                    id="ClassCategoryCode" name="ClassCategoryCode" disabled>
                </div>

                <div class="form-group">
                  <label for="ClassCategoryName">Class Category Name</label>
                  <input type="text" value="{{$classCategory->ClassCategoryName}}" class="form-control @error('ClassCategoryName') is-invalid @enderror"
                    id="ClassCategoryName" name="ClassCategoryName" required>
                </div>
                @error('ClassCategoryName')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                  <label for="Remarks">Remarks</label>
                  <input type="text" value="{{$classCategory->Remarks}}" class="form-control @error('Remarks') is-invalid @enderror"
                    id="Remarks" name="Remarks">
                </div>

                @error('Remarks')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                  <label for="IsActive">Status</label>
                  <select id="IsActive" name="IsActive" class="form-control select2bs4">
                    <option value="">Pilih Status</option>
                    <option value="1" {{ $classCategory->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $classCategory->IsActive == '0' ? 'selected' : '' }}>Tidak Aktif</option>
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