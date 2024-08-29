@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-12">
          <button type="button" onclick="sinkronregister()" class="btn btn-danger">Sinkron Register</button>
        </div> -->
        <div class="col">
          <form id="formStore" action="{{ $config['form']->action }}" method="POST"
            onsubmit="return confirm('Pastikan data yang di input sudah benar!')">
            @csrf
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">VClaim Manual </h3>
                  </div>
                  <div class="col d-flex justify-content-end gap-1">
                    <button type="submit" class="btn btn-success radius ml-3">SIMPAN</button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="container">
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Business Partner</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="BPJS Kesehatan" disabled>
                      <input type="text" class="form-control" value="2" name="business_partner_id" hidden>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Registration No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="reg_no" value="{{ $data->reg_no ?? '' }}" {{ isset($data) ? 'readonly' : '' }}>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Card No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="card_no" value="{{ $data->card_no ?? '' }}">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">SEP No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sep_no" value="{{ $data->sep_no ?? '' }}">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </form>
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
<!-- Page specific script -->
<script>
  $(document).ready(function() {
    let select2BusinessPartner = $('#reg_cara_bayar');

    select2BusinessPartner.select2({
      placeholder: "Cari Business Partner",
      allowClear: true,
      ajax: {
        url: "{{ route('get.bussinesspartner') }}",
        dataType: "json",
        cache: true,
        processResults: function(data) {
          return {
            results: data.data.map(function(item) {
              return {
                id: item.BusinessPartnerID,
                text: item.BusinessPartnerName
              }
            })
          }
        },
        data: function(e) {
          return {
            q: e.term || '',
            page: e.page || 1
          }
        },
      },
    });

    $("#formStore").submit(function(e) {
      e.stopPropagation();
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
        cache: false,
        processData: false,
        contentType: false,
        type: "POST",
        url: url,
        data: data,
        success: function(response) {
          btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
          if (response.status == 'success') {
            neko_simpan_success();
            setTimeout(function() {
              location.href = "{{ route('register.vclaim') }}";
            }, 1500)
          } else {
            alert("Nomor Registrasi Telah Digunakan !");
          }

        },
        error: function(response) {
          btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
          neko_simpan_error_noreq();
        }
      });
    });

  });
</script>
@endpush