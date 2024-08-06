<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/master') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo-siti-fatimah.svg') }}" alt="Siti Fatimah Logo" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-light">TEST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('master.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>User Management</p>
                    </a>
                </li>
               <li class="nav-item">
                    <a href="{{ route('master.ketersediaanruangan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Ketersediaan Ruangan</p>
                    </a>
                </li>

               {{-- <li class="nav-item">
                    <a href="{{ route('master.unit.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Unit Management</p>
                    </a>
                </li>--}}

               {{-- <li class="nav-item">
                    <a href="{{ route('master.class.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Room Class Management</p>
                    </a>
                </li>--}}
{{--
                <li class="nav-item">
                    <a href="{{ route('master.bed.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Bed Management</p>
                    </a>
                </li>--}}
{{--
                <li class="nav-item">
                    <a href="{{ route('master.patient.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Patient Management</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{ route('master.medicine.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Medicine Management</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('master.indication.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Indication Management</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('master.clinical_pathway.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Clinical Pathway</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('master.tarif.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Master Tarif</p>
                    </a>
                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
