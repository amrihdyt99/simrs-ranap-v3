<li class="nav-item">
    <a class="nav-link" href="{{url('auth/dashboard')}}">
    <i class="mdi mdi-view-dashboard menu-icon"></i>
    <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="mdi mdi-cube-outline menu-icon"></i>
        <span class="menu-title">Masterdata</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="submenu">
        <ul>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/jadwal_dokter')}}">Jadwal Dokter</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/poli')}}">Poli</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/tindakan')}}">Tindakan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/dokter')}}">Dokter</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/perawat')}}">Perawat</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/master_data/operator')}}">Operator</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('auth/admisi')}}">
    <i class="mdi mdi-file-document-box menu-icon"></i>
    <span class="menu-title">Pendaftaran Rawat Jalan</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('auth/dokter')}}" class="nav-link">
        <i class="mdi mdi mdi-stethoscope menu-icon"></i>
        <span class="menu-title">Dokter</span>
        <i class="menu-arrow"></i>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('auth/perawat')}}" class="nav-link">
        <i class="mdi mdi mdi-hospital menu-icon"></i>
        <span class="menu-title">Perawat</span>
        <i class="menu-arrow"></i>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="mdi mdi-clipboard-text menu-icon"></i>
        <span class="menu-title">Penunjang</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="submenu">
        <ul>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/lab')}}">Laboraturium</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/radiologi')}}">Radiologi</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/rehab')}}">Fisioterapi</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="#">Farmasi</a></li> --}}
        </ul>
    </div>
</li>
<li class="nav-item">
    <a href="{{url('auth/billing')}}" class="nav-link">
        <i class="mdi mdi mdi-dropbox menu-icon"></i>
        <span class="menu-title">Billing</span>
        <i class="menu-arrow"></i>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="mdi mdi-cube-outline menu-icon"></i>
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="submenu">
        <ul>
            <li class="font-weight-bold">Report Kunjungan Pasien</li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/report/konsultasi')}}">Semua Data</a></li>
        </ul>
        <ul>
            <li class="font-weight-bold">Report Pemeriksaan</li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/report/tanggal')}}">Pemeriksaan per Tanggal</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/report/poli')}}">Pemeriksaan per Poli</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/report/dokter')}}">Pemeriksaan Dokter</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('auth/report/perawat')}}">Pemeriksaan Perawat</a></li>
        </ul>
    </div>
</li>