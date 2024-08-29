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
      body {
        color: black !important;
      }
      .col-sm-2.col-form-label{
        text-align: right;
      }
      .select2-container {
          width: 100% !important; /* or any other value */
      }
      #modalPrescribeNew .modal-dialog{
          overflow-y: initial !important
      }
      #modalPrescribeNew .modal-body{
          height: 90vh;
          overflow-y: scroll;
      }
      .modal-tab {
        background-color: rgb(145, 145, 145);
        padding: 10px;
        width: 150px;
        color: aliceblue;
        margin-bottom: 3px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
      }
      .modal-tab.active{
        background: #24db51 !important;
        background: -webkit-linear-gradient(to right, #2ad727, #0ede50) !important; 
        background: linear-gradient(to right, #2ad727, #0ede50) !important; 
        color: aliceblue;
      }
      .modal-tab.first-tab{
        border-radius: 50px 0px 0px 50px;
      }
      .modal-tab.last-tab{
        border-radius: 0px 50px 50px 0px;
      }
      .new_loader {
          width: 48px;
          height: 48px;
          border: 5px solid grey;
          border-bottom-color: transparent;
          border-radius: 50%;
          display: inline-block;
          box-sizing: border-box;
          animation: rotation 1s linear infinite;
          z-index: 999999;
        }

        @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
      } 
    </style>
    @yield('styles')

  </head>
