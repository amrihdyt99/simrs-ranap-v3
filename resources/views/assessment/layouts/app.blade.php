<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSUD SITI FATIMAH</title>

    @stack('prepend-style')
    @include('assessment.layouts.style')
    @stack('addon-style')

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    {{-- Navbar --}}
    @include('assessment.layouts.navbar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-sm">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active text-capitalize">{{\Illuminate\Support\Facades\Request::segment(2)}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>

    {{-- Footer --}}
    @include('assessment.layouts.footer')

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

{{-- Script --}}

@stack('prepend-script')
@include('assessment.layouts.scipt')
@stack('addon-script')

</body>
</html>
