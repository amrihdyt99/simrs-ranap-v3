@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="{{ Request::segment(1) == "ranap" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.ranap.index') }}>
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
        <a class="{{ Request::segment(1) == "Informasi Pasien" ? "active text-bold text-primary" : "" }} nav-link " href={{ route('register.pages.informasi-pasien.index') }}>
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
        <!-- <div class="col-12">
          <button type="button" onclick="sinkronregister()" class="btn btn-danger">Sinkron Register</button>
        </div> -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col">
                  <h3 class="card-title">Informasi Pasien</h3>
                </div>
                  <a href="{{ route('register.pages.informasi-pasien.create') }}">
                    <button class="btn btn-success radius ml-3"><i class="fas fa-add"></i>Tambah Data Pasien Baru</button>
                  </a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="w-100 table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>MRN</th>
                    <th>Nama Lengkap</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
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