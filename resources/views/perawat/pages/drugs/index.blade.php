<a href="{{route('perawat.drugs.create', ['patient' => $registrationInap])}}"
   class="text-sm btn btn-sm btn-outline-primary mb-2">Tambah Pemberian Obat </a>
<table class="table table-bordered table-hover table-sm nursing">
    <thead>
    <tr>
        <th class="text-sm">Tanggal Order</th>
        <th class="text-sm">Kode Obat</th>
        <th class="text-sm">Nama Obat</th>
        <th class="text-sm">Dosis</th>
        <th class="text-sm">Frekuensi</th>
        <th class="text-sm">Cara Pemberian</th>
        <th class="text-sm">Antibiotik</th>
       {{-- <th class="text-sm">Nama Dokter</th>--}}
        <th class="text-sm">Nama Perawat</th>
        @for($i=0;$i<9;$i++)
            <th class="text-sm">{{$i}}</th>
        @endfor

        <th class="text-sm">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($obat as $row)
        <tr>
            <td class="text-sm">{{$row->created_at}}</td>
            <td class="text-sm">{{optional($row->medicine)->kode}}</td>
            <td class="text-sm">{{optional($row->medicine)->nama}}</td>
            <td class="text-sm">{{$row->dosis}}</td>
            <td class="text-sm">{{$row->frekuensi}}</td>
            <td class="text-sm">{{$row->cara_pemberian}}</td>
            <td class="text-sm">{{$row->antibiotik}}</td>
            {{--<td class="text-sm">{{$row->paramedic->ParamedicName}}</td>--}}
            <td class="text-sm">{{$row->nurse->name}}</td>
            @for($i=0;$i<9;$i++)
                @php
                    $kolom_tipe_jam="tipe_jam_".$i;
                @endphp
                <td class="text-sm">{{$row->$kolom_tipe_jam}}</td>
            @endfor

            <td class="text-sm">
                <a href="{{route('perawat.drugs.edit', ['id' => $row->id])}}"
                   class="btn btn-sm btn-outline-danger"><i
                        class="fa fa-pen"></i>
                </a>
            </td>
        </tr>
    @endforeach
</table>

