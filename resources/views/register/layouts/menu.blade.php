
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
              <a class="{{ Request::segment(1) == "register" && Request::segment(2) == "informasi-pasien" ? "active text-bold text-primary" : "" }} nav-link" 
              href="{{ route('register.informasi-pasien.index') }}">
              <span>Data Pasien</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="{{ Request::segment(1) == "register" && Request::segment(2) == "cancelation" ? "active text-bold text-primary" : "" }} nav-link"  href="{{ route('cancelation.index') }}">
                  <span>Batal Instruksi Ranap</span>
              </a>
          </li>
      </ul>
    </div>
    {{-- {{ dd(Request::segment(2)) }} --}}
</nav>
