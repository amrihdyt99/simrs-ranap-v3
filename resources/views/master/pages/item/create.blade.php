@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Input Data Item</h1>
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
              <form id="formItem" action="{{ route('master.item.store') }}" method="POST">
                @csrf

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ItemCode">Item Code</label>
                      <input type="text" class="form-control @error('ItemCode') is-invalid @enderror"
                        id="ItemCode" name="ItemCode" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GCItemType">Item Type</label>
                      <select id="GCItemType" name="GCItemType" class="form-control select2bs4" required>
                        <option value="">Pilih Type</option>
                        <option value="X0001^01">Service</option>
                        <option value="X0001^02">Medication</option>
                        <option value="X0001^03">Medical Supplies</option>
                        <option value="X0001^04">Laboratory</option>
                        <option value="X0001^05">Imaging</option>
                        <option value="X0001^06">Asset & Maintenance</option>
                        <option value="X0001^07">Other Supplies</option>
                        <option value="X0001^08">Other Exam</option>
                        <option value="X0001^09">Package</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ItemGroupCode">Item Type</label>
                      <select id="ItemGroupCode" name="ItemGroupCode" class="form-control select2bs4" required>
                        <option value="">Pilih Group Item</option>
                        @foreach ($itemGroup as $cd)
                        <option value="{{ $cd->ItemGroupCode }}">{{ $cd->ItemGroupName1 }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ItemName1">Item Name 1</label>
                      <input type="text" class="form-control @error('ItemName1') is-invalid @enderror"
                        id="ItemName1" name="ItemName1" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ItemName2">Item Name 2</label>
                      <input type="text" class="form-control @error('ItemName2') is-invalid @enderror"
                        id="ItemName2" name="ItemName2">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="IsActive">Status</label>
                      <select id="IsActive" name="IsActive" class="form-control select2bs4" required>
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                    </div>
                  </div>

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

  $("#formItem").submit(function(e) {
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
            location.href = "{{ route('master.item.index') }}";
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