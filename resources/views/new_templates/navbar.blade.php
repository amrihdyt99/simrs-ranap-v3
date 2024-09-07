<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <ul class="navbar-nav navbar-nav-left">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo mr-3" href="{{ url('/') }}">
                            <img src="{{asset('')}}new_assets/images/logo.jpg" style="height: 50px;" alt="RSUD Siti Fatimah" />
                            <img src="{{asset('')}}new_assets/images/sumsel.png" style="height: 50px;" alt="SumSel" />
                        </a>
                        {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> --}}
                    </div>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    @if (auth()->user()->level_user == 'dokter' && Request::is('dokter'))
                    <button class="btn btn-secondary" onclick="mod_pilih_ruang()" id="title_ruang">RUANG RAWAT</button>
                    @endif
                    @if (auth()->user()->level_user == 'perawat')
                        <button class="btn btn-secondary" id="trigger_shift_modal">SHIFT PERAWAT</button>
                    @endif
                    <li class="nav-item dropdown" title="Ubah pengaturan akun">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="fas fa-cogs mx-0 text-dark"></i>
                            {{-- <span class="count bg-success">2</span> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="font-weight-normal float-left dropdown-header">Pengaturan</p>
                            <a class="dropdown-item" id="btn-setting-user" href="{{ route('profil_saya.index') }}">
                                <div class="preview-thumbnail pt-0">
                                    <i class="fas fa-users text-success mx-0"></i>
                                </div>
                                <div class="preview-item-content mt-2 ml-2">
                                    <h6 class="preview-subject font-weight-normal">Edit Akun</h6>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown">
                            <span class="nav-profile-name text-uppercase">INSTALASI RAWAT INAP | {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama(auth()->user()->level_user) }}</span>
                        </a>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <span class="nav-link">
                            <span class="nav-profile-name">{{auth()->user()->name}}</span>
                            @if(session()->get('poli'))
                            <br>
                            <span class="nav-profile-name">{{session()->get('poli')}}</span>
                            @endif
                        </span>
                    </li>
                    <a class="dropdown-itemx" href="{{ url('/logout') }}" id="user_logout" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>


    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                @if (auth()->user()->level_user == 'admin')
                @include('new_templates.partials.admin')
                @elseif (auth()->user()->level_user == 'dokter')
                @include('new_templates.partials.dokter')
                @elseif (auth()->user()->level_user == 'perawat')
                @include('new_templates.partials.perawat')
                @elseif (auth()->user()->level_user == 'fisioterapis' || auth()->user()->level_user == 'terapi wicara' || auth()->user()->level_user == 'okupasi terapi' || auth()->user()->level_user == 'orthotic prosthetic')
                @include('new_templates.partials.fisioterapis')
                @elseif (auth()->user()->level_user == 'kasir')
                @include('new_templates.partials.kasir')
                @elseif (auth()->user()->level_user == 'pendaftaran')
                @include('new_templates.partials.pendaftaran')
                @elseif (auth()->user()->level_user == 'lab')
                @include('new_templates.partials.lab')
                @elseif (auth()->user()->level_user == 'radiologi')
                @include('new_templates.partials.radiologi')
                @elseif (auth()->user()->level_user == 'dietitian')
                @include('new_templates.partials.dietitian')
                @endif
                <li class="nav-item">
                    <a href="{{asset('files/pdf_tes.pdf')}}" target="_blank" class="nav-link">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Dokumentasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
@include('new_perawat.modal.shift')

{{-- @include('auth.modal.pengaturan_akun') --}}