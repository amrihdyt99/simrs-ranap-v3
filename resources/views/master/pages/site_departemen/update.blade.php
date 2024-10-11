@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Data Site Departemen</h1>
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
              <form action="{{ route('master.site-departement.update', $siteDepartment->SiteDepartmentID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="SiteCode">Site</label>
                  <select id="SiteCode" name="SiteCode" class="form-control select2bs4">
                    <option value="">Pilih Site</option>
                    @foreach ($site as $cd)
                    <option value="{{ $cd->SiteCode }}" {{ $siteDepartment->SiteCode == $cd->SiteCode ? 'selected' : '' }}>{{ $cd->SiteName }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="DepartmentCode">Departemen</label>
                  <select id="DepartmentCode" name="DepartmentCode" class="form-control select2bs4">
                    <option value="">Pilih Departemen</option>
                    @foreach ($department as $cd)
                    <option value="{{ $cd->DepartmentCode }}" {{ $siteDepartment->DepartmentCode == $cd->DepartmentCode ? 'selected' : '' }}>{{ $cd->DepartmentName }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="OfficerName">Officer Name</label>
                  <input type="text" class="form-control"
                    id="OfficerName" name="OfficerName" value="{{ $siteDepartment->OfficerName ?? '' }}">
                </div>

                <div class="form-group">
                  <label for="IsActive">Status</label>
                  <select id="IsActive" name="IsActive" class="form-control select2bs4">
                    <option value="">Pilih Status</option>
                    <option value="1" {{ $siteDepartment->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $siteDepartment->IsActive == '0' ? 'selected' : '' }}>Tidak Aktif</option>
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