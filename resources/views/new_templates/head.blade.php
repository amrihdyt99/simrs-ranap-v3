<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
    <title>{{config('app.nama_aplikasi')}}</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('')}}new_assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('')}}new_assets/images/icon.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <link rel="stylesheet" href="{{asset('')}}new_assets/css/select2.min.css">
    <style>
    .col-sm-2.col-form-label{
      text-align: right;
    }
    </style>
    @yield('styles')

  </head>
