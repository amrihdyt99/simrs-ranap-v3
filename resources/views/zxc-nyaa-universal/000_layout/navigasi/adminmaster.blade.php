<nav class="navbar navbar-white bg-white navbar-expand-sm" style="border-top: 1px solid #f1f6f8;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-uwu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="mdi mdi-menu"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbar-list-uwu">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Navigasi
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ url('/') }}">Halaman Utama</a>
          <a class="dropdown-item" href="{{ route('profil_saya.index') }}">Profil dan Password</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Master
        </a>
        <div class="dropdown-menu dropdown-menu-lg" id="data-master-dropdown">
          <div class="row">
            <div class="col-6">
              {{-- <label class="font-weight-bold text-center d-block">Business Unit</label> --}}
              <a class="dropdown-item" href="{{ route('master.site.index') }}">Site</a>
              <a class="dropdown-item" href="{{ route('master.departement.index') }}">Departement</a>
              <a class="dropdown-item" href="{{ route('master.site-departement.index') }}">Site Departement</a>
              <a class="dropdown-item" href="{{ route('master.departement-service-unit.index') }}">Departement Service Unit</a>
              <!-- <a class="dropdown-item" href="{{ route('master.unit.index') }}">Service Unit Room</a> -->
              <a class="dropdown-item" href="{{ route('master.serviceunit.index') }}">Service Unit</a>
              <a class="dropdown-item" href="{{ route('master.location.index') }}">Location</a>
              <a class="dropdown-item" href="{{ route('master.class-category.index') }}">Class Category</a>
              <a class="dropdown-item" href="{{ route('master.class.index') }}">Class</a>
              <a class="dropdown-item" href="{{ route('master.ruangan.index') }}">Room</a>
              <a class="dropdown-item" href="{{ route('master.bed.index') }}">Bed</a>
            </div>

            <div class="col-6">
              <a class="dropdown-item" href="{{ route('master.ketersediaanruangan.index') }}">Ketersediaan Ruangan</a>
              <a class="dropdown-item" href="{{ route('master.practitioner.index') }}">Practitioner</a>
              {{-- <a class="dropdown-item" href="{{ route('master.organization.index') }}">Organization</a> --}}
              <a class="dropdown-item" href="{{ route('master.medicine.index') }}">Medicine</a>
              <a class="dropdown-item" href="{{ route('nyaa_universal.data_master.businesspartner.get_handler') }}">Business Partner</a>
              {{-- <a class="dropdown-item" href="{{ route('nyaa_universal.data_master.corporate.get_handler') }}">Corporate</a> --}}
              <a class="dropdown-item" href="{{ route('nyaa_universal.data_master.customercontract.get_handler') }}">Contract Management</a>
              <a class="dropdown-item" href="{{ route('master.user.index') }}">Manajemen User</a>
              <a class="dropdown-item" href="{{ url('') }}/master/aksesRuangan">Manajemen Akses Ruangan</a>
            </div>
          </div>
        </div>
      </li>

    </ul>
  </div>
</nav>