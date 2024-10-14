@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
  <div class="col-12">
    <p>Data Master - Item Group</p>
  </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
  <div class="col-sm-10 pb-3">
    <a href="{{ route('master.item-group.create') }}" class="protecc btn btn-sm btn-success">
      Tambah Data Baru
    </a>
  </div>
  <div class="col-sm-2">
    <button id="tarikDataItemGroup" class="btn btn-primary">
      Tarik Data Item Group
    </button>
  </div>
</div>

<div class="row">
  <div class="col-12">

    <table id="itemGroupDT" class="w-100 table table-bordered">
      <thead>
        <tr>
          <th>Item Group Code</th>
          <th>Item Group Name</th>
          <th>Item Group Type</th>
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
    const url = `{{ route('master.item-group.destroy', ':id') }}`.replace(':id', id);

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
            $('#itemGroupDT').DataTable().ajax.reload();
          },
          error: function(response) {
            neko_d_custom_error(response.responseJSON.error);
          }
        });
      }
    });
  }

  $(document).ready(function() {


    $('#itemGroupDT').DataTable({
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
          data: "ItemGroupCode",
          name: "ItemGroupCode",
          orderable: true,
          searchable: true,
        },
        {
          data: "ItemGroupName1",
          name: "ItemGroupName1",
          orderable: true,
          searchable: true,
        },
        {
          data: "GCItemType",
          name: "GCItemType",
          orderable: true,
          searchable: true,
          render: function(columnData, type, rowData, meta) {
            if (columnData == "X0001^01") {
              return `Service`;
            } else if (columnData == "X0001^02") {
              return `Medication`;
            } else if (columnData == "X0001^03") {
              return `Medical Supplies`;
            } else if (columnData == "X0001^04") {
              return `Laboratory`;
            } else if (columnData == "X0001^05") {
              return `Imaging`;
            } else if (columnData == "X0001^06") {
              return `Asset & Maintenance`;
            } else if (columnData == "X0001^07") {
              return `Other Supplies`;
            } else if (columnData == "X0001^08") {
              return `Other Exam`;
            } else if (columnData == "X0001^09") {
              return `Package`;
            } else {
              return ``;
            }
          }
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


    $('#tarikDataItemGroup').click(function() {
      Swal.fire({
        title: 'Tarik Data Item Group dari Rawat Jalan ?',
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
            url: "{{ url('tarik-rajal/item-group') }}",
            method: 'GET',
            success: function(response) {
              alert('Data berhasil ditarik!');
              $('#itemGroupDT').DataTable().ajax.reload();
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