@extends('case-manager.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        List Pasien
    </div>
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
            @foreach($myPatient as $row)
                <tr>
                    <td class="text-sm">{{$row->reg_no}}</td>
                    <td class="text-sm">{{$row->pasien?$row->pasien->PatientName:''}}</td>
                    <td class="text-sm">{{$row->medrec}}
                    </td>
                    <td class="text-sm">{{$row->physician?$row->physician->ParamedicName:''}}</td>
                    <td class="text-sm">{{$row->serviceUnit?$row->serviceUnit->ShortName:''}}</td>
                    <td class="text-sm">{{$row->metode_bayar}}</td>
                    <td class="text-sm">
                        <a href="{{route('casemanager.patient.summary',['patient'=>$row->reg_no])}}"
                           class="btn btn-sm btn-outline-primary"><i
                                class="mr-2 fa fa-clipboard-check"></i>Periksa
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(function () {
            $("#example1").DataTable({
                "ordering": false,
                "responsive": true, "lengthChange": true, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)').addClass('text-sm');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endpush