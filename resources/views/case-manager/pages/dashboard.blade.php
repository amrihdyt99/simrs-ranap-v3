@extends('case-manager.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        List Dokter
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover" id="example2">
            <thead>
                <tr>
                    <th>Kode Dokter</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paramedics as $paramedic)
                <tr>
                    <td>{{ $paramedic->ParamedicCode }}</td>
                    <td>{{ $paramedic->ParamedicName }}</td>
                    <td>{{ $paramedic->GCSex == "0001^M" ? "Male" : "Female" }}</td>
                    <td>
                        <a href="{{route('casemanager.patientList',['paramedic'=>$paramedic->ParamedicCode])}}" target="_blank" class="btn btn-sm btn-outline-success">
                            <i class="mr-2 fa fa-users"></i> Pasien
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(function () {
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