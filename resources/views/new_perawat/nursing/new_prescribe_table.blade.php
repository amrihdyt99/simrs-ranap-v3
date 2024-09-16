<div class="table-responsive">
    <table class="table1 w-100" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
        <thead>
            <tr>
                <th class="text-sm" style="border: 1px solid black;">Tanggal Pemberian</th>
                <th class="text-sm" style="border: 1px solid black;">Nama Obat</th>
                <th class="text-sm" style="border: 1px solid black;">Dosis</th>
                <th class="text-sm" style="border: 1px solid black;">Frekuensi</th>
                <th class="text-sm" style="border: 1px solid black;">Cara Pemberian</th>
                <th class="text-sm" style="border: 1px solid black;">Antibiotik</th>
                {{-- <th class="text-sm" style="border: 1px solid black;">Nama Dokter</th> --}}
                <th class="text-sm" style="border: 1px solid black;">Nama Perawat</th>
                @for ($i = 0; $i < 24; $i++)
                    <th class="text-sm" style="border: 1px solid black;">{{ $i }}</th>
                @endfor
                <th class="text-sm" style="border: 1px solid black;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $row)
                <tr>
                    <td class="text-sm" style="border: 1px solid black;">
                        {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_datetime_id($row->tgl_pemberian_0) }}
                    </td>
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->nama_obat }}</td>
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->dosis }}</td>
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->frekuensi }}</td>
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->cara_pemberian }}</td>
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->antibiotik }}</td>
                    {{-- <td class="text-sm" style="border: 1px solid black;">{{$row->paramedic->ParamedicName}}</td> --}}
                    <td class="text-sm" style="border: 1px solid black;">{{ $row->nurse->name }}</td>
                    @for ($i = 0; $i < 24; $i++)
                        @php
                            $kolom_tipe_jam = 'tipe_jam_' . $i;
                        @endphp
                        <td class="text-sm" style="border: 1px solid black;">{{ $row->$kolom_tipe_jam }}</td>
                    @endfor
                    <td class="text-sm" style="border: 1px solid black;">
                        <a href="{{ route('perawat.drugs.edit', ['id' => $row->id]) }}"
                            class="btn btn-sm btn-outline-danger"><i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
