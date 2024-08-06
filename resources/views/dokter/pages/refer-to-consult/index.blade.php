<a href="{{route('refer-to-consult.create',['patient' => $patient])}}"
   class="btn btn-sm btn-outline-primary mt-4 mb-2">Tambah
    Refer to Consult</a>
<table class="table table-bordered table-hover treatment table-sm">
    <thead>
    <tr>
        <th class="text-sm">Tanggal Konsultasi</th>
        <th class="text-sm">Dari Dokter</th>
        <th class="text-sm">Catatan Konsultasi</th>
        <th class="text-sm">Tanggal Response</th>
        <th class="text-sm">Kepada Dokter</th>
        <th class="text-sm">Catatan Response</th>
        <th class="text-sm">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($konsultasi as $row)
    <tr>
        <td class="text-sm">{{$row->created_at}}</td>
        <td class="text-sm">{{$row->dokter_kirim->ParamedicName}}</td>
        <td class="text-sm">{{$row->pkonsultasi_request}}</td>
        <td class="text-sm">{{$row->updated_at}}</td>
        <td class="text-sm">{{$row->dokter_tujuan->ParamedicName}}</td>
        <td class="text-sm">{{$row->pkonsultasi_response ? : '-'}}</td>
        <td class="text-sm">
            <a href=""
               class="btn btn-sm btn-outline-danger"><i
                    class="mr-1 fa fa-trash"></i>
                Hapus Refer To Consult
            </a>
        </td>
    </tr>
    @endforeach
</table>
