@extends('case-manager.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item text-sm"><a class="nav-link active" href="#my-area" data-toggle="tab">My Area</a>
                </li>
                <li class="nav-item text-sm"><a class="nav-link" href="#my-patient" data-toggle="tab">My Patient</a>
                </li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="my-area">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-sm">Reg No</th>
                                    <th class="text-sm">Patient's Name</th>
                                    <th class="text-sm">MRN</th>
                                    <th class="text-sm">Doctor's Name</th>
                                    <th class="text-sm">Loc</th>
                                    <th class="text-sm">Payer</th>
                                    <th class="text-sm">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myArea as $row)
                                    <tr>
                                        <td class="text-sm">{{$row->reg_no}}</td>
                                        <td class="text-sm">{{$row->pasien->PatientName}}</td>
                                        <td class="text-sm">{{$row->medrec}}
                                        </td>
                                        <td class="text-sm">{{$row->physician->ParamedicName}}</td>
                                        <td class="text-sm">{{$row->serviceUnit->ShortName}}</td>
                                        <td class="text-sm">{{$row->metode_bayar}}</td>
                                        <td class="text-sm">
                                            <form action="" method="">
                                                <a href="{{route('casemanager.patient.detail',$row->reg_no)}}" target="_blank"
                                                   class="btn btn-sm btn-outline-success"><i
                                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="tab-pane" id="my-patient">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-sm">Reg No</th>
                                    <th class="text-sm">Patient's Name</th>
                                    <th class="text-sm">MRN</th>
                                    <th class="text-sm">Doctor's Name</th>
                                    <th class="text-sm">Loc</th>
                                    <th class="text-sm">Payer</th>
                                    <th class="text-sm">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myPatient as $row)
                                    <tr>
                                        <td class="text-sm">{{$row->reg_no}}</td>
                                        <td class="text-sm">{{$row->pasien->PatientName}}</td>
                                        <td class="text-sm">{{$row->medrec}}
                                        </td>
                                        <td class="text-sm">{{$row->physician->ParamedicName}}</td>
                                        <td class="text-sm">{{$row->serviceUnit->ShortName}}</td>
                                        <td class="text-sm">{{$row->metode_bayar}}</td>
                                        <td class="text-sm">
                                            <a href="{{route('casemanager.patient.summary',['patient'=>$row->reg_no])}}"
                                               class="btn btn-sm btn-outline-primary"><i
                                                    class="mr-2 fa fa-clipboard-check"></i>Periksa
                                            </a>
                                            <a href="{{route('casemanager.patient.detail', $row->reg_no)}}" target="_blank"
                                               class="btn btn-sm btn-outline-success"><i
                                                    class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)').addClass('text-sm');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
