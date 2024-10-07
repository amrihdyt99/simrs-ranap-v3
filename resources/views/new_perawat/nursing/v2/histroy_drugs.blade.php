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
        <th class="text-sm" style="border: 1px solid black;">Nama Perawat</th>
        @for ($i = 0; $i < 24; $i++)
          <th class="text-sm text-center" style="border: 1px solid black;">{{ $i }}</th>
          @endfor
      </tr>
    </thead>
    <tbody>
      @foreach ($obat as $row)
      <tr>
        <td class="text-sm" style="border: 1px solid black;">
          {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_date_id($row->tgl_pemberian) }}
        </td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->nama_obat }}</td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->dosis }}</td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->frekuensi }}</td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->cara_pemberian }}</td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->antibiotik }}</td>
        <td class="text-sm" style="border: 1px solid black;">{{ $row->created_by_name }}</td>
        @php
        $detail_waktu = json_decode($row->waktu_pemberian, true);
        @endphp
        @for ($i = 0; $i < 24; $i++)
          <td class="text-sm text-center" style="border: 1px solid black;">
          <p>{{ $detail_waktu[$i]['tipe_jam'] }}</p>
          <p>{{ $detail_waktu[$i]['aktual_jam'] }}</p>
          </td>
          @endfor
      </tr>
      @endforeach
  </table>
</div>