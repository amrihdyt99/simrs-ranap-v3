@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
  <div class="col-12">
    <p>Data Master - Education</p>
  </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
  <div class="col-sm-10 pb-3">
    <a href="{{ route('master.education.create') }}" class="protecc btn btn-sm btn-success">
      Tambah Data Baru
    </a>
  </div>
  <div class="col-sm-2">
    <button id="tarikDataDraft" class="btn btn-primary">
      Tarik Data Education
    </button>
  </div>
</div>

<div class="row">
  <div class="col-12">

    <table id="educationDT" class="w-100 table table-bordered">
      <thead>
        <tr>
          <th>Education Code</th>
          <th>Education Name</th>
          <th>Effective Date</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection

@push('nyaa_scripts')
<!-- Page specific script -->
<script>
  function confirmDelete(element) {
    const id = $(element).data('id');
    const url = `{{ route('master.education.destroy', ':id') }}`.replace(':id', id);

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data ini akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: url,
          type: "POST",
          data: {
            _method: "DELETE",
            _token: $("meta[name='csrf-token']").attr('content')
          },
          success: function(response) {
            neko_d_custom_success(response.success);
            $('#educationDT').DataTable().ajax.reload();
          },
          error: function(response) {
            neko_d_custom_error(response.responseJSON.error);
          }
        });
      }
    });
  }

  $(document).ready(function() {


    $('#educationDT').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      scrollX: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      ajax: {
        url: "{{ url()->current() }}",
        type: "POST",
        headers: {
          "X-HTTP-Method-Override": "GET"
        }
      },
      columns: [{
          data: "EducationCode",
          name: "EducationCode",
          orderable: true,
          searchable: true,
        },
        {
          data: "EducationName",
          name: "EducationName",
          orderable: true,
          searchable: true,
        },
        {
          data: "EffectiveDate",
          name: "EffectiveDate",
          orderable: true,
          searchable: true,
        },
        {
          data: "action",
          orderable: false,
          searchable: false,
        },
      ],
    });


    $('#tarikDataDraft').click(function() {
      Swal.fire({
        title: 'Tarik Data Education dari Rawat Jalan ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          var $button = $(this);
          $button.prop('disabled', true);

          $.ajax({
            url: "{{ url('tarik-rajal/education') }}",
            method: 'GET',
            success: function(response) {
              alert('Data berhasil ditarik!');
              $('#educationDT').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
              alert('Terjadi kesalahan saat menarik data.');
              console.log(error);
            },
            complete: function() {
              $button.prop('disabled',
                false);
            }
          });
        }
      });


    });
  });
</script>

@endpush