@extends('case-manager.layouts.app')
@push('addon-style')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item text-sm"><a class="nav-link active" href="#diagnose-procedure"
                                                        data-toggle="tab">Diagnose & Procedure</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#physician-billing"
                                                        data-toggle="tab">Physician Billing / Discount</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#discharge"
                                                        data-toggle="tab">Discharge</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="diagnose-procedure">
                            @include('case-manager.pages.diagnose-procedure.index', ['diagnoses' => $diagnoses, 'procedures' => $procedures])
                        </div>
                        <div class="tab-pane" id="physician-billing">
                        </div>
                        <div class="tab-pane" id="discharge">
                            @include('case-manager.pages.discharge-info.index', ['discharge' => $discharge])
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('case-manager.components.menu')
            @include('case-manager.components.patient-resume')
        </div>
    </div>

@endsection

@push('addon-script')
    <script>
        $(function () {
            $('.discharge').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
