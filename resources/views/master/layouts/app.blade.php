<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSUD SITI FATIMAH</title>

    @include('master.layouts.style')
    @stack('addon-style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('master.layouts.navbar')

        @include('master.layouts.sidebar')

        @yield('content')

        @include('master.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('master.layouts.script')
    @stack('addon-script')
</body>

</html>
