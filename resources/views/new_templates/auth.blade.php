<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIMRS RAWAT JALAN | RS. FATIMAH</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('')}}new_assets/css/style.css">
  <link rel="stylesheet" href="{{asset('')}}new_assets/css/select2.min.css">
  <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('')}}new_assets/images/icon.png" />
    <style>
      .auth-form-btn {
        border-radius: 50px !important;
      }
      
      .select2-hidden-accessible {
            border: 0 !important;
            clip: rect(0 0 0 0) !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            width: 1px !important
        }
      /* .form-control {
            display: block;
            width: 100%;
            height: 40px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 0px !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        } */

        .select2-container--default .select2-selection--single {
            background-color: rgb(229, 229, 229);
            border: 1px solid rgb(229, 229, 229);
            border-radius: 50px;
        }

        .select2-container .select2-selection--single {
            height: 48px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px;
            right: 10px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 16px;
        }

        body .main-panel {
            /* background: rgba(0, 0, 0, 0.836); */
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("{{asset('images/rsud.jpg')}}") !important;
            background-size:cover !important;
            background-repeat:no-repeat !important;
            background-position:center !important;
            object-fit: contain !important;
            min-height: calc(100vh) !important;
        }
        .auth .auth-form-light {
            border-radius: 10px !important;
        }
        .brand-logo img:nth-child(2){
            width: 40px !important;
        }
        #form_login .form-control {
            height: 45px !important; 
            border: 1px solid rgb(229, 229, 229) !important; 
            background: rgb(229, 229, 229) !important;
            border-radius: 50px !important;
        }
        #form_login .form-control:focus {
            border: 1.5px solid rgb(12, 192, 51) !important;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: rgb(147, 147, 147) !important;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: rgb(147, 147, 147);
        }
    </style>
    @yield('styles')
</head>

<body>
  @yield('auth')
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('')}}new_assets/js/template.js"></script>
  <script src="{{asset('')}}new_assets/js/select2.min.js"></script>
  <!-- endinject -->
  @yield('scripts')
  <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
  </script>
</body>

</html>
