<li class="nav-item {{Request::is('dokter') ? ' active' : null}}" >
    <a href="{{ url('dokter') }}" class="nav-link ">
        <i class="mdi mdi mdi-stethoscope menu-icon"></i>
        <span class="menu-title">Beranda</span>
        <i class="menu-arrow"></i>
    </a>
</li>
<li class="nav-item {{Request::is('dokter/detail_pasien') ? ' active' : null}}">
    <a href="{{url('dokter/detail_pasien')}}" class="nav-link ">
        <i class="mdi mdi mdi-stethoscope menu-icon"></i>
        <span class="menu-title">Pasien detail</span>
        <i class="menu-arrow"></i>
    </a>
</li>
