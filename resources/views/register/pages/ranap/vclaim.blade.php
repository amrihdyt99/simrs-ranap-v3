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
        <!-- <div class="col-12">
          <button type="button" onclick="sinkronregister()" class="btn btn-danger">Sinkron Register</button>
        </div> -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h3 class="card-title">List VClaim Manual </h3>
                </div>
                <div class="col d-flex justify-content-end gap-1">
                  <!-- <a href="{{ route('register.ranap.create') }}" class="btn btn-success btn-sm ml-auto">
                Tambah Data
                </a> -->
                  <a href="{{route('register.vclaim.form')}}">
                    <button class="btn btn-info radius ml-3"><i class="fas fa-plus"></i> Tambah Vclaim Manual</button>
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt-vclaim" class="w-100 table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No. Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>Business Partner</th>
                    <th>No. Card</th>
                    <th>No. SEP</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
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
<!-- Page specific script -->
<script>
  $(document).ready(function() {
    $('#dt-vclaim').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      scrollX: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      ajax: {
        url: "{{ url()->current() }}",
      },
      columns: [{
          data: "reg_no",
          name: "reg_no",
          orderable: true,
          searchable: true,
        },
        {
          data: "PatientName",
          name: "PatientName",
          orderable: true,
          searchable: true,
        },
        {
          data: "business_partner",
          name: "business_partner",
          orderable: true,
          searchable: true,
        }, {
          data: "card_no",
          name: "card_no",
          orderable: true,
          searchable: true,
        }, {
          data: "sep_no",
          name: "sep_no",
          orderable: true,
          searchable: true,
        },
      ],
    });
  });
</script>
@endpush