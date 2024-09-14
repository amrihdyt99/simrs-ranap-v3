@inject('nyaa_unv_function', 'App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController')
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SIMRS RAWAT INAP | {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->neko()->value->text_header }}</title>
  <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('')}}new_assets/css/style.css">
  <link rel="shortcut icon" href="{{asset('')}}new_assets/images/icon.png" />
  <link rel="stylesheet" href="{{ asset('neko/plugins/fontawesome-free-6.4.2-web/css/all.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('')}}new_assets/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/EasyAutocomplete-1.3.5/easy-autocomplete.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css') }}">
  <link rel="stylesheet" href="{{asset('new_assets/css/new_styles.css')}}">
  <link href="{{asset('new_assets/sign/css/jquery.signature.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('')}}new_assets/css-masonry/files/css/masonry.css">
  <link href="{{ asset('neko/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('neko/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
  <link href="{{ asset('neko/custom/nyaa.css') }}?v={{ $nyaa_unv_function->neko()->versi->assets }}" rel="stylesheet" />
  <style>
    .col-sm-2.col-form-label {
      text-align: right;
    }

    #ddx-utama {
      scroll-margin: 100px;
    }

    #data-master-dropdown {
      min-width: 400px;
    }

    #data-master-dropdown .row {
      margin: 0;
    }

    #data-master-dropdown .col-6 {
      padding: 0;
    }

    #data-master-dropdown .dropdown-item {
      white-space: nowrap;
    }
  </style>
  @yield('styles')
  @stack('nyaa_parent_styles')
</head>

<body>
  <div class="container-scroller" id="main-panel">
    @include('new_templates.navbar')
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        @if(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->neko()->config->display_menu)
        @include($nyaa_unv_function->detect_component_user()->view->menu_data)
        @endif
        <div id="pro-banner">
          <div class="alert alert-dismissible fade show m-0 p-0" role="alert">
            <div>
              @if (Session::has('success_message'))
              <div class="alert alert-info m-0">
                {!! Session::get('success_message') !!}
              </div>
              @endif
              @if (Session::has('error_message'))
              <div class="alert alert-danger m-0">
                {!! Session::get('error_message') !!}
              </div>
              @endif
            </div>
            <button type="button" class="close" id="bannerClose" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        @yield('content')
      </div>
    </div>
    <script type="text/javascript" src="{{asset('new_assets/signature/signature.js')}}"></script>
    <script src="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{asset('')}}new_assets/js/jquery-ui.js"></script>
    <script src="{{asset('')}}new_assets/js/template.js"></script>
    <script src="{{asset('')}}new_assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('')}}new_assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('')}}new_assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="{{asset('')}}new_assets/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="{{asset('')}}new_assets/vendors/justgage/justgage.js"></script>
    <script src="{{asset('')}}new_assets/js/dashboard.js"></script>
    <script src="{{asset('')}}new_assets/js/moment.min.js"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('neko/plugins/select2/js/i18n/id.js') }}"></script>
    <script src="{{ asset('neko/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('neko/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('neko/custom/nyaa.js') }}?v={{ $nyaa_unv_function->neko()->versi->assets }}"></script>
    @stack('nyaa_parent_scripts')
    <script src="{{ asset('neko/custom/nyaa-bottom.js') }}?v={{ $nyaa_unv_function->neko()->versi->assets }}"></script>

    <script>
      $level_ = "{{auth()->user()->level_user}}";
      $user_dokter_ = "{{auth()->user()->dokter_id}}";
      $user_ = "{{auth()->user()->id}}";
      $user_perawat_ = "{{auth()->user()->perawat_id}}";

      $host = location.hostname

      if ($host == '127.0.0.1' || $host == 'rj.id') {
        $dom = ''
      } else {
        $dom = '/simrs_ranap'
      }

      function addOption(elm, value, text) {
        var newOption = new Option(text, value, false, false);
        $(elm).append(newOption).trigger('change');
      }
    </script>

@if (auth()->user()->level_user == 'perawat')
<script>
  $(document).ready(function() {
    // Show the modal if shift is not selected
    if (!@json(session('user_shift'))) {
      $('#modal_shift').modal('show');
    } else {
      $('#trigger_shift_modal').text('SHIFT ' + @json(session('user_shift')).toUpperCase());
    }

    // Save shift selection
    $('#save_shift').on('click', function() {
      var selectedShift = $('#pilih_shift').val();
      if (selectedShift) {
        $.ajax({
          url: `{{ route('save.shift') }}`,
          type: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            shift: selectedShift
          },
          success: function(response) {
            $('.left-tab.active').click();
            neko_notify('success', 'Shift berhasil disimpan.')
            $('#modal_shift').modal('hide');
            $('#trigger_shift_modal').text('SHIFT ' + selectedShift.toUpperCase());
          },
          error: function(xhr) {
            neko_d_custom_error('Terjadi kesalahan! Mohon untuk me-refresh halaman ini.')
          }
        });
      }
    });

    // Show modal on trigger click
    $('#trigger_shift_modal').on('click', function() {
      $('#modal_shift').modal('show');
    });

  });
</script>
@endif


</body>

</html>
