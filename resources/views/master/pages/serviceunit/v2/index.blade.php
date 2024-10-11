@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
  <div class="col-12">
    <p>Data Master - Service Unit Room</p>
  </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
  <div class="col-sm-10 pb-3">
    <a href="{{ route('master.serviceunit.create') }}" class="protecc btn btn-sm btn-success">
      Tambah Data Baru
    </a>
  </div>
  <div class="col-sm-2">
    <button id="tarikDataUnit" class="btn btn-primary">
      Tarik Data Service Unit
    </button>
  </div>
</div>

<div class="row">
  <div class="col-12">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Gagal!</strong> {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <table id="service_unit_dt" class="w-100 table table-bordered">
      <thead>
        <tr>
          <th>Kode Service Unit</th>
          <th>Nama Service Unit</th>
          <th>Initial</th>
          <th>Status</th>
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
    const url = `{{ route('master.serviceunit.destroy', ':id') }}`.replace(':id', id);

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
            $('#service_unit_dt').DataTable().ajax.reload();
          },
          error: function(response) {
            neko_d_custom_error(response.responseJSON.error);
          }
        });
      }
    });
  }

  $('#service_unit_dt').DataTable({
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
        data: "ServiceUnitCode",
        name: "ServiceUnitCode",
        orderable: true,
        searchable: true,
      },
      {
        data: "ServiceUnitName",
        name: "ServiceUnitName",
        orderable: true,
        searchable: true,
      },
      {
        data: "Initial",
        name: "Initial",
        orderable: true,
        searchable: true,
        classNames: 'text-center',
      },
      {
        data: "IsActive",
        name: "IsActive",
        orderable: false,
        searchable: false,
        render: function(columnData, type, rowData, meta) {
          if (columnData) {
            return `<span class="badge badge-success text-white">Aktif</span>`;
          } else {
            return `<span class="badge badge-danger">Tidak Aktif</span>`;
          }
        }
      },
      {
        data: "action",
        orderable: false,
        searchable: false,
      },
    ],
  });

  $(document).ready(function() {
    $('#tarikDataUnit').click(function() {
      var $button = $(this);
      $button.prop('disabled', true);

      Swal.fire({
        title: 'Tarik Data Service Unit ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "{{ url('tarik/unit') }}",
            method: 'GET',
            success: function(response) {
              alert('Data berhasil ditarik!');
              $('#service_unit_dt').DataTable().ajax.reload();
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