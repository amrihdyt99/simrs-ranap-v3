@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Input Data Department Service Unit</h1>
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
              <form action="{{ route('master.departement-service-unit.update', $dsu->ServiceUnitID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="SiteDepartmentID">Site Departemen</label>
                  <select id="SiteDepartmentID" name="SiteDepartmentID" class="form-control select2bs4">
                    <option value="">Pilih Site Departemen</option>
                    @foreach ($siteDepartment as $cd)
                    <option value="{{ $cd->SiteDepartmentID }}" {{ $dsu->SiteDepartmentID == $cd->SiteDepartmentID ? 'selected' : '' }}>{{ $cd->DepartmentName }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="ServiceUnitCode">Service Unit</label>
                  <select id="ServiceUnitCode" name="ServiceUnitCode" class="form-control select2bs4">
                    <option value="">Pilih Service Unit</option>
                    @foreach ($serviceUnit as $cd)
                    <option value="{{ $cd->ServiceUnitCode }}" {{ $dsu->ServiceUnitCode == $cd->ServiceUnitCode ? 'selected' : '' }}>{{ $cd->ServiceUnitName }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="ContactPerson1">Contact Person 1</label>
                  <input type="number" class="form-control"
                    id="ContactPerson1" name="ContactPerson1" value="{{ $dsu->ContactPerson1 ?? '' }}">
                </div>

                <div class="form-group">
                  <label for="ContactPerson2">Contact Person 2</label>
                  <input type="number" class="form-control"
                    id="ContactPerson2" name="ContactPerson2" value="{{ $dsu->ContactPerson2 ?? '' }}">
                </div>

                <div class="form-group">
                  <label for="IsActive">Status</label>
                  <select id="IsActive" name="IsActive" class="form-control select2bs4">
                    <option value="">Pilih Status</option>
                    <option value="1" {{ $dsu->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $dsu->IsActive == '0' ? 'selected' : '' }}>Tidak Aktif</option>
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