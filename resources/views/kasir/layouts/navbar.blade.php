<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
        <a href="{{route('dokter.dashboard')}}" class="navbar-brand">
            <img src="{{ asset('assets/dist/img/logo-siti-fatimah.svg') }}" alt="Logo Siti Fatimah"
                 class="brand-image" />
        </a>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-alt mr-2"></i>
                    <span class="text-sm">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{url('logout')}}" class="dropdown-item text-sm">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
