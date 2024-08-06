<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('admin1/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin1/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin1/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin1/css/style1.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin1/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            {{-- <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="index.html"><img
                                    src="{{ asset('admin1/images/logo1.png') }}" alt="logo" width="200px" /></a>
                            <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                    src="{{ asset('admin1/images/logo1.png') }}" alt="logo" /></a>
                        </div>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown d-lg-flex d-none">
                                <h6 class="nav-link active">INSTALASI RAWAT JALAN|KASIR</h6>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    id="profileDropdown">
                                    <span class="nav-profile-name">Era Venezuela | kasir</span>
                                    <span class="online-status"></span>
                                    <img src="{{ asset('admin1/images/faces/face28.png') }}" alt="profile" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                    aria-labelledby="profileDropdown">
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav> --}}
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container-fluid">
                    <a href="{{ route('admin_nurse/dashboard') }}" class="navbar-brand">
                        <img src="{{ asset('assets/dist/img/logo-siti-fatimah.svg') }}" alt="Logo Siti Fatimah"
                            class="brand-image" />
                    </a>

                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-user-alt mr-2"></i>
                                <span class="text-sm">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="{{ url('/logout') }}" class="dropdown-item text-sm">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item {{ request()->is('billing*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin_nurse/billing', $pasien->MedicalNo) }}">
                                <i class="mdi mdi-file-document-box menu-icon"></i>
                                <span class="menu-title">Billing</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('bed*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin_nurse/bed', $pasien->MedicalNo) }}">
                                <i class="mdi mdi-dropbox menu-icon"></i>
                                <span class="menu-title">Bed Management</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('physician*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('physician.index') }}">
                                <i class="mdi mdi-account menu-icon"></i>
                                <span class="menu-title">Physician</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                {{-- <footer class="footer">
                    <div class="footer-wrap">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                    href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com
                                </a>2021</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                                    href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                                templates</span>
                        </div>
                    </div>
                </footer> --}}
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('admin1/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin1/js/template.js') }}"></script>
    <script src="{{ asset('admin1/js/myjs.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ asset('admin1/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin1/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin1/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin1/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin1/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('admin1/vendors/justgage/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('admin1/vendors/justgage/justgage.js') }}"></script>
    <script src="{{ asset('admin1/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin1/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin1/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin1/js/data-table.js') }}"></script>
    <script src="{{ asset('admin1/js/modal-demo.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <!-- Custom js for this page-->
    <script src="{{ asset('admin1/js/dashboard.js') }}"></script>
    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <!-- End custom js for this page-->
</body>

</html>
