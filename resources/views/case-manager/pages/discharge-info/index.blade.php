<a href="{{route('casemanager.create.discharge.info',['patient' =>$patient->reg_no])}}"
   class="text-sm btn btn-sm btn-outline-primary mb-2">Tambah Discharge Info</a>
<table class="table table-bordered table-hover table-sm discharge">
    <thead>
    <tr>
        <th class="text-sm">No Registrasi</th>
        <th class="text-sm">Nama Dokter</th>
        <th class="text-sm">Discharge Kondisi</th>
        <th class="text-sm">Discharge Method</th>
        <th class="text-sm">Discharge Medical Note</th>
        <th class="text-sm">Discharge Note</th>
        <th class="text-sm">Tanggal Meninggal</th>
        <th class="text-sm">Jam Meninggal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($discharge as $row)
        <tr>
            <td class="text-sm">{{$row->pdischarge_reg}}</td>
            <td class="text-sm">{{$row->paramedic->ParamedicName}}</td>
            <td class="text-sm text-capitalize">{{$row->pdischarge_condition}}</td>
            <td class="text-sm text-capitalize">{{$row->pdischarge_method}}</td>
            <td class="text-sm">{{$row->pdischarge_med_notes}}</td>
            <td class="text-sm">{{$row->pdischarge_notes}}</td>
            <td class="text-sm">{{$row->pdischarge_tgl_mati ? : '-'}}</td>
            <td class="text-sm">{{$row->pdischarge_jam_mati ? : '-'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
