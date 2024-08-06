@inject('nyaa_unv_function', 'App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController')
@extends($nyaa_unv_function->detect_component_user()->view->extends)

@push($nyaa_unv_function->detect_component_user()->view->pusher_styles)
@stack('nyaa_styles')
@endpush

@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        @yield('nyaa_content_header')
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-header">
                <a href="{{ url()->current() }}" class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-refresh"></i>Refresh</a>
                @if(url()->current()!==url()->previous())
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-arrow-left"></i>Kembali</a>
                @endif
            </div>
            <div class="card-body">
                @yield('nyaa_content_body')
            </div>
        </div>
    </div>
</section>
</div>
@endsection

@push($nyaa_unv_function->detect_component_user()->view->pusher_scripts)
@stack('nyaa_scripts')
@endpush
