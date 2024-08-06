<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSUD Siti Fatimah | Rawat Inap</title>

    @stack('prepend-style')
    @include('kasir.layouts.style')
    @stack('addon-style')

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
    @include('kasir.layouts.navbar')

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
    @include('kasir.layouts.footer')

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

{{-- Script --}}

@stack('prepend-script')
@include('kasir.layouts.script')
@stack('addon-script')

</body>
</html>
