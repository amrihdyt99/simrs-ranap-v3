<div class="table-responsive">

    <table class="table table-bordered" style="border: #3F3F46">
        <caption style="margin-top: 10px; margin-bottom: 10px;">Rawat Inap</caption>
        <thead class="table-head">
            <tr style="background-color: #CBD5E1; height: 24px; color: #09090B;">
                <th>Reg No</th>
                <th>Asal</th>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->reg_no ?? "-" }}</td>
                    <td>{{ $item->asal_pasien ?? "-" }}</td>
                    <td>{{ $item->dokter ?? "-" }}</td>
                    <td>{{ $item->reg_tgl ?? "-" }}</td>
                    <td>{{ $item->reg_jam ?? "-" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>