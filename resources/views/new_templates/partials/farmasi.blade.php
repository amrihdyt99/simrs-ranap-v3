<li class="nav-item">
    <a href="{{url('/')}}" class="nav-link">
        <i class="mdi mdi-account-settings menu-icon"></i>
        <span class="menu-title">{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama(auth()->user()->level_user) }}</span>
        <i class="menu-arrow"></i>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('dietitian.detail_pasien_list')}}" class="nav-link">
        <i class="mdi mdi-account-settings menu-icon"></i>
        <span class="menu-title">Pasien Detail</span>
        <i class="menu-arrow"></i>
    </a>
</li>