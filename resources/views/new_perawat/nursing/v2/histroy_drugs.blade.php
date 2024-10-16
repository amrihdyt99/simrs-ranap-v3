<div class="table-responsive">
  <table class="table1 w-100" style="border-collapse: collapse; border: 1px solid black;">
    <thead>
      <tr>
        <th class="" style="border: 1px solid black;">Tanggal Pemberian</th>
        <th class="" style="border: 1px solid black;">List Obat</th>
        <th class="" style="border: 1px solid black;">Nama Perawat</th>
        @for ($i = 0; $i < 24; $i++)
          <th class=" text-center" style="border: 1px solid black;">{{ $i }}</th>
          @endfor
      </tr>
    </thead>
    <tbody>
      @foreach ($obat as $row)
      <tr>
        <td class="" style="border: 1px solid black;">
          {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_date_id($row->tgl_pemberian) }}
        </td>
        @php
        $list_obat = json_decode($row->item_obat);
        @endphp
        <td class="" style="border: 1px solid black;">
          <ol style="width: 800px;">
            @foreach ($list_obat as $obat)
            <li>{{$obat->nama_obat}}</li>
            <ul>
              <li>Cara Pemberian : {{ $obat->cara_pemberian }}</li>
              <li>Antibiotik : {{ $obat->antibiotik }}</li>
              <li>Dosis : {{ $obat->dosis }}</li>
              <li>Frekuensi : {{ $obat->frekuensi }}</li>
            </ul>
            @endforeach
          </ol>
        </td>
        <td class="" style="border: 1px solid black;">{{ $row->created_by_name }}</td>
        @php
        $detail_waktu = json_decode($row->waktu_pemberian, true);
        @endphp
        @for ($i = 0; $i < 24; $i++)
          <td class=" text-center" style="border: 1px solid black;">
          <p>{{ $detail_waktu[$i]['tipe_jam'] }}</p>
          <p>{{ $detail_waktu[$i]['aktual_jam'] }}</p>
          </td>
          @endfor
      </tr>
      @endforeach
  </table>
</div>