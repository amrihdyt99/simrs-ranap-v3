<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rawat Inap | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('siti_fatimah.ico') }}">

</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-logo">
                <img src="{{ asset('assets/dist/img/logo-siti-fatimah-no-bg.png') }}" alt="">
            </div>

            <div class="row">
                <div class="col">
                    <a href="{{route('dokter.dashboard')}}" class="btn btn-outline-primary d-block">Aplikasi Dokter</a>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <a href="{{route('casemanager.dashboard')}}" class="btn btn-outline-success d-block mt-2">Aplikasi Case Manager</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
