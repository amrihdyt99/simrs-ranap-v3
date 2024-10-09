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

    <style>
        body{
            background-image: url("{{ asset('new_assets/images/rsud.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <img src="{{ asset('assets/dist/img/logo-siti-fatimah-no-bg.png') }}" alt="">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                
                @if (Session::has('success_message'))
                <div class="alert alert-info">
                  {!! Session::get('success_message') !!}
                </div>
                @endif
                @if (Session::has('error_message'))
                <div class="alert alert-danger">
                  {!! Session::get('error_message') !!}
                </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remeber">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>

        // sessionStorage.removeItem('notify');
        // sessionStorage.removeItem('notifyDate');

        let notify = sessionStorage.getItem("notify")
        let notifyDate = sessionStorage.getItem("notifyDate")

        if (notify == 1 && notifyDate == "{{date('Y-m-d')}}") {
            alert('Sebelum dimulai, pastikan telah pull dari github!. Atau pull setiap 20 menit sekali.')

            sessionStorage.setItem("notify", 0)
        } else {
            sessionStorage.setItem("notify", 1)
            sessionStorage.setItem("notifyDate", "{{date('Y-m-d')}}")
        }
    </script>
</body>

</html>
