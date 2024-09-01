@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href={{ route('register.ranap.index') }}>
          <span>Pendaftaran Rawat Inap</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "rajal" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.rajal.index') }}>
          <span>Data Pendaftaran Rajal</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "igd" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.igd.index') }}>
          <span>Data Pendaftaran IGD</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "Informasi Pasien" ? "active text-bold text-primary" : "" }} nav-link" 
          href="{{ route('register.informasi-pasien.index') }}">
          <span>Data Pasien</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h3 class="card-title">Informasi Pasien</h3>
                </div>
                <div class="col d-flex justify-content-end gap-1">
                  <a href="{{ route('register.informasi-pasien.create') }}">
                    <button class="btn btn-info radius ml-3"><i class="fas fa-plus"></i> Tambah Data Pasien Baru</button>
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 ml-4 mt-4 mr-2 mb-3">
              <div class="table-responsive">
                <table id="pasienTable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>MRN</th>
                      <th>Nama Pasien</th>
                      <th>TTL</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat Pasien</th>
                      <th>No Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
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
  $(document).ready(function() {
    $('#pasienTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('register.informasi-pasien.getData') }}',
      columns: [
        { data: 'MedicalNo' },
        { data: 'PatientName' },
        { data: 'DateOfBirth' },
        { data: 'GCSex', render: function(data, type, row) {
            switch(data) {
              case '0001^X': return 'Tidak Diketahui';
              case '0001^M': return 'Laki-laki';
              case '0001^F': return 'Perempuan';
              case '0001^U': return 'Tidak Dapat Ditentukan';
              case '0001^N': return 'Tidak Mengisi';
              default: return data;
            }
          }
        },
        { data: 'PatientAddress' },
        { data: 'MobilePhoneNo1' },
        { data: 'action', orderable: false, searchable: false }
      ],
      scrollX: true,
      autoWidth: false 
    });

    $('#pasienTable').on('click', '.btn-delete', function() {
      var id = $(this).data('id');
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        $.ajax({
          url: '{{ url("/register/pages/informasi-pasien") }}/' + id,
          type: 'DELETE',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            if (response.status === 'success') {
              alert(response.message);
              $('#pasienTable').DataTable().ajax.reload();
            } else {
              alert(response.message);
            }
          },
          error: function(xhr) {
            alert('Terjadi kesalahan: ' + xhr.responseText);
          }
        });
      }
    });
  });
</script>
@endpush
