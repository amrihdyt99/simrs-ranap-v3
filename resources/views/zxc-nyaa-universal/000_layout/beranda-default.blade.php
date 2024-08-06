@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)
@inject('nyaa_unv_function', 'App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController')

@php
    $dtx_user_now = $nyaa_unv_function->detect_component_user();
    $dtx_user_detail = $dtx_user_now->user_detail;
@endphp

@push('nyaa_styles')
@endpush

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Halaman Utama</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row">
    <div class="col-lg-8">
        <h3 class="font-weight-bold text-dark">Selamat Datang, {{ $dtx_user_detail->nama }}</h3>
        <p class="text-dark">Anda memiliki akses data dan perizinan sistem sebagai {{ $dtx_user_detail->role->nama_role_formal }}.</p>
    </div>
</div>
@endsection

@push('nyaa_scripts')
@endpush
