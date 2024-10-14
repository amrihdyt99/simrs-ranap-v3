@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Input Data DTD</h1>
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
              <form id="formDTD" action="{{route('master.dtd.update', $dtd->DTDNo)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="DTDNo">DTD NO</label>
                  <input type="text" class="form-control @error('DTDNo') is-invalid @enderror"
                    id="DTDNo" name="DTDNo" value="{{ $dtd->DTDNo }}" readonly required>
                </div>

                <div class="form-group">
                  <label for="DTDName">DTD Name</label>
                  <input type="text" class="form-control @error('DTDName') is-invalid @enderror"
                    id="DTDName" name="DTDName" value="{{ $dtd->DTDName }}">
                </div>

                <div class="form-group">
                  <label for="DTDLabel">DTD Label</label>
                  <input type="text" class="form-control @error('DTDLabel') is-invalid @enderror"
                    id="DTDLabel" name="DTDLabel" value="{{ $dtd->DTDLabel }}">
                </div>

                <div class="form-group">
                  <label for="IsActive">Status</label>
                  <select id="IsActive" name="IsActive" class="form-control select2bs4">
                    <option value="">Pilih Status</option>
                    <option value="1" {{ $dtd->IsActive == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $dtd->IsActive == '0' ? 'selected' : '' }}>Tidak Aktif</option>
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

  $("#formDTD").submit(function(e) {
    e.preventDefault();
    let form = $(this);
    let btnSubmit = form.find("[type='submit']");
    let btnSubmitHtml = btnSubmit.html();
    let url = form.attr("action");
    let data = new FormData(this);
    $.ajax({
      beforeSend: function() {
        btnSubmit.addClass("disabled").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...').prop("disabled", "disabled");
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      cache: false,
      processData: false,
      contentType: false,
      type: "POST",
      url: url,
      data: data,
      success: function(response) {
        btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
        if (response.status === "success") {
          neko_notify('success', `Data berhasil disimpan`);
          setTimeout(function() {
            location.href = "{{ route('master.dtd.index') }}";
          }, 1000)
        } else {
          neko_notify('error', response.message);
        }
      },
      error: function(response) {
        btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
        neko_notify('error', `Ups, something wrong !`);
      }
    });
  });
</script>
@endpush