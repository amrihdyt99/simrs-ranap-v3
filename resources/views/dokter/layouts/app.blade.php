<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSUD Siti Fatimah | Rawat Inap</title>

    @stack('prepend-style')
    @include('dokter.layouts.style')
    @stack('addon-style')

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
    @include('dokter.layouts.navbar')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

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
    @include('dokter.layouts.footer')

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

{{-- Script --}}

@stack('prepend-script')
@include('dokter.layouts.script')
@stack('addon-script')

</body>
</html>
