<div class="form-group">
    <div class="table-responsive">
        <table rules="all" class="table1" style="width:100%">
            <thead>
                <tr class="text-uppercase bg-warning">
                    <th class="first-row text-center font-weight-bold" colspan="5">In-Take</th>
                    <th class="text-center font-weight-bold" colspan="4">Output</th>
                </tr>
            </thead>
            <tbody id="table-fluid-balance">
                <tr class="text-uppercase bg-warning">
                    <th class="first-row text-center font-weight-bold">Tanggal/Jam</th>
                    <th class="text-center font-weight-bold">Cairan/Transfusi</th>
                    <th class="text-center font-weight-bold">Jumlah</th>
                    <th class="last-row text-center font-weight-bold">Minum</th>
                    <th class="last-row text-center font-weight-bold">Sonde</th>
                    {{-- <th class="last-row text-center font-weight-bold">Jumlah</th>
                    <th class="last-row text-center font-weight-bold">Nama</th> --}}
                    <th class="last-row text-center font-weight-bold">Urine</th>
                    <th class="last-row text-center font-weight-bold">Drain</th>
                    <th class="last-row text-center font-weight-bold">IWL/Muntah</th>
                    {{-- <th class="last-row text-center font-weight-bold">Jumlah</th>
                    <th class="last-row text-center font-weight-bold">Nama</th> --}}
                    <th class="last-row text-center font-weight-bold">Balance</th>
                </tr>
                @foreach ($dataFluidBalanceBaru as $data)
                    <tr>
                        <td class="text-center">{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_datetime_id($data->created_at) }}</td>
                        <td class="text-center">{{ $data->cairan_transfusi }}</td>
                        <td class="text-center">{{ $data->jumlah_cairan }}</td>
                        <td class="text-center">{{ $data->minum }}</td>
                        <td class="text-center">{{ $data->sonde }}</td>
                        {{-- <td class="text-center"></td>
                        <td class="text-center"></td> --}}
                        <td class="text-center">{{ $data->urine }}</td>
                        <td class="text-center">{{ $data->drain }}</td>
                        <td class="text-center">{{ $data->iwl_muntah }}</td>
                        {{-- <td class="text-center"></td>
                        <td class="text-center"></td> --}}
                        <td class="text-center">{{ $data->balance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
