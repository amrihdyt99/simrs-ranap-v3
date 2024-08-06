<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="z-index: 1035">
    <div class="container-fluid">
        {{-- <a href="{{ url('/ranap') }}" class="navbar-brand"> --}}
            <img src="{{ asset('assets/dist/img/logo-siti-fatimah.svg') }}" alt="Logo Siti Fatimah"
                class="brand-image" />
        {{-- </a> --}}

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-alt mr-2"></i>
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{url('logout')}}" class="dropdown-itemx">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class="nav-item">
            <a class="{{ Request::segment(1) == "ranap" ? "active text-bold" : "" }} nav-link " href={{ route('register.ranap.index') }}>
                <span>Pendaftaran Inap</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="{{ Request::segment(1) == "igd" ? "active text-bold" : "" }} nav-link " href={{ route('register.igd.index') }}>
                <span>Pendaftaran IGD</span>
            </a>
        </li>
      </ul>
    </div>
  </nav>
<!-- /.navbar -->
