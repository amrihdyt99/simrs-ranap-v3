<table id="data_{{$type}}" class="w-100 table table-bordered table-hover table-sm">
    <thead class="w-100">
    <tr>
        <th class="text-sm">#</th>
        <th class="text-sm">No Registrasi</th>
        <th class="text-sm">Tanggal Registrasi</th>
        <th class="text-sm">Nama Pasien</th>
        <th class="text-sm">MRN</th>
        <th class="text-sm">Nama Dokter</th>
        <th class="text-sm">Loc</th>
        <th class="text-sm">Metode Pembayaran</th>
        <th class="text-sm">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>

            <td class="text-sm">{{$loop->iteration}}</td>
            <td class="text-sm">{{$row->reg_no}}</td>
            <td class="text-sm">{{$row->reg_tgl}}</td>
            <td class="text-sm">{{$row->PatientName}}</td>
            <td class="text-sm">{{$row->reg_medrec}}
            </td>
            <td class="text-sm">{{$row->ParamedicName}}</td>
            <td class="text-sm">{{$row->nama_ruangan}}</td>
            <td class="text-sm">{{$row->reg_cara_bayar}}</td>
            <td class="text-sm">
                <a href="{{route('dokter.patient.summary',['patient'=>$row->reg_no])}}"
                   class="btn btn-sm btn-outline-primary"><i
                        class="mr-2 fa fa-clipboard-check"></i>Periksa
                </a>
                <a href="{{route('dokter.patient.detail', $row->reg_no)}}" target="_blank"
                   class="btn btn-sm btn-outline-success"><i
                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
            </td>
        </tr>
    @endforeach
</table>