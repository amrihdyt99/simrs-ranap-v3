<table id="example1" class="w-100 table table-bordered table-hover" style="color: black">
  <thead>
    <tr class="text-uppercase bg-warning">
      <th class="text-sm">Data pendaftaran</th>
      <th class="text-sm">Nama pasien</th>
      <th class="text-sm">Dpjp</th>
      <th class="text-sm">Physician Team</th>
      <th class="text-sm">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @if ($noData)
    <tr>
      <td colspan="8" class="text-center">Tidak ada data yang tersedia pada tabel ini</td>
    </tr>
    @else
    @foreach ($datamypatient as $item)
    <tr>
      <td class="text-sm">
        No. RM : {{$item->reg_medrec}} <br><br>
        No. Reg : <b>{{$item->reg_no}}</b> <br><br>
        Tgl. Daftar : {{$item->reg_tgl}} / {{$item->reg_jam}} <br><br>
        Cara Bayar : {{$item->reg_cara_bayar}} <br><br>
        Lokasi : <b>{{$item->ServiceUnitName}} / {{$item->RoomName}}</b> <br><br>
      </td>
      <td class="text-sm"><b>{{$item->PatientName}}</b></td>
      <td class="text-sm">{{$item->ParamedicName}}</td>
      <td>
        @foreach($item->physicianTeam as $team_member)
        <span style="margin-right: 5px; margin-bottom: 5px; white-space: nowrap; font-size: 0.875rem;" class="badge badge-primary">{{ trim($team_member->ParamedicName) }}</span><br>
        @endforeach
      </td>
      <td class="text-sm">
        @if ($item->reg_perawat_care == null)
        <button type="button" onclick="takeOver('{{$item->reg_no}}', '', {{$item->room_id}}, '{{$item->service_unit}}')" class="btn btn-sm btn-outline-primary">
          <i class="mr-2 fa fa-share-square"></i>Ambil Alih
        </button>
        @else
        <a href="{{ route('perawat.patient.summary-v2', ['reg_no' => $item->reg_no]) }}" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a><br>
        @endif
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>