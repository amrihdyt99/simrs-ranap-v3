@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_header')
<div class="row">
  <div class="col-12">
    <p>Data Master - Tarif Item</p>
  </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row mb-2">
  <div class="col-sm-10 pb-3">
    <!-- <a href="{{ route('master.item-tarif.create') }}" class="protecc btn btn-sm btn-success">
      Tambah Data Baru
    </a> -->
  </div>
  <div class="col-sm-2">
    <button id="tarikDataItemTarif" class="btn btn-primary">
      Tarik Data Tarif Item
    </button>
  </div>
</div>

<!-- <div class="row mb-2">
  <div class="col-12">
    <label for="">Filter Status:</label>
  </div>
  <div class="col-2">
    <div class="form-group">
      <select id="status_hapus" class="form-control">
        <option value="">Semua</option>
        <option value="1">Dihapus</option>
        <option value="0" selected>Tidak dihapus</option>
      </select>
    </div>
  </div>
  <div class="col-2">
    <div class="form-group">
      <select id="status_active" class="form-control">
        <option value="">Semua</option>
        <option value="1" selected>Aktif</option>
        <option value="0">Tidak Aktif</option>
      </select>
    </div>
  </div>
</div> -->

<div class="row">
  <div class="col-12">
    <table id="itemTarifDT" class="table w-100 table-bordered">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Tipe Item</th>
          <th>Item Group</th>
          <th>Class Category</th>
          <th>Standard Price</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@endsection

@push('nyaa_scripts')
<!-- Page specific script -->
<script>
  $(function() {
    load_data();
    $('#status_hapus').change(function() {
      $('#itemTarifDT').DataTable().draw();
    });
    $('#status_active').change(function() {
      $('#itemTarifDT').DataTable().draw();
    });
  });

  function load_data() {
    $('#itemTarifDT').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      scrollX: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      ajax: {
        url: "{{ url()->current() }}",
        type: "POST",
        headers: {
          "X-HTTP-Method-Override": "GET",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        data: function(d) {
          // d.IsDeleted = $('#status_hapus').val();
          // d.IsActive = $('#status_active').val();
        }
      },
      columns: [{
          data: "ItemName1",
          name: "ItemName1"
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
          data: "ItemGroupName1",
          name: "ItemGroupName1"
        },
        {
          data: "ClassCategoryName",
          name: "ClassCategoryName"
        },
        {
          className: 'text-right',
          data: 'StandardPrice',
          name: 'StandardPrice',
          render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
        },
        {
          data: "action",
          orderable: false,
          searchable: false
        },
      ],
    });
  }

  function confirmDelete(element) {
    const id = $(element).data('id');
    const url = `{{ route('master.item-tarif.destroy', ':id') }}`.replace(':id', id);

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data ini akan dihapus dan tidak bisa di aktifkan lagi!",
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
            $('#itemTarifDT').DataTable().ajax.reload();
          },
          error: function(response) {
            neko_d_custom_error(response.responseJSON.error);
          }
        });
      }
    });
  }
</script>

<script>
  $(document).ready(function() {
    $('#tarikDataItemTarif').click(function() {
      Swal.fire({
        title: 'Tarik Data Item Tarif dari Rajal ?',
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
            url: "{{ url('tarik-rajal/item-tarif') }}",
            method: 'GET',
            success: function(response) {
              alert('Data item tarif berhasil ditarik!');
              console.log(response);
              $('#itemTarifDT').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
              alert('Terjadi kesalahan saat menarik data room.');
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

@if (session('success'))
<script>
  neko_notify('success', `{{ session('success') }}`);
</script>
@endif
@endpush