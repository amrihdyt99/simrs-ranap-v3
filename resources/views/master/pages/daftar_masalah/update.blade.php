@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Update Data Daftar Masalah</h1>
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
              <form id="formDaftarMasalah" action="{{route('master.daftar-masalah.update', $daftarMasalah->masalah_kode)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="masalah_kode">Kode Masalah</label>
                  <input type="text" class="form-control @error('masalah_kode') is-invalid @enderror"
                    id="masalah_kode" name="masalah_kode" value="{{ $daftarMasalah->masalah_kode }}" readonly required>
                </div>
                @error('RoomCode')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                  <label for="masalah_nama">Nama Masalah</label>
                  <input type="text" class="form-control @error('masalah_nama') is-invalid @enderror"
                    id="masalah_nama" name="masalah_nama" value="{{ $daftarMasalah->masalah_nama }}" required>
                </div>
                @error('ClassCategoryName')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                  <label for="masalah_layanan">Layanan</label>
                  <select id="masalah_layanan" name="masalah_layanan" class="form-control select2bs4">
                    <option value="">Pilih</option>
                    <option value="1" {{ $daftarMasalah->masalah_layanan == '1' ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ $daftarMasalah->masalah_layanan == '0' ? 'selected' : '' }}>Tidak</option>
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

  $("#formDaftarMasalah").submit(function(e) {
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
            location.href = "{{ route('master.daftar-masalah.index') }}";
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