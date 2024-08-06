<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('mypatient')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Patient Summary
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('perawat.diagnosis')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Diagnosis
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('perawat.nursing')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Nursing
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Print Tools
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('mypatient')}}" class="nav-link">
                        <i class="nav-icon fas fa-backward"></i>
                        <p>
                            Back
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
