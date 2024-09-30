<table id="example1" class="w-100 table table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-sm">Reg No</th>
      <th class="text-sm">Tanggal Registrasi</th>
      <th class="text-sm">Patient's Name</th>
      <th class="text-sm">MRN</th>
      <th class="text-sm">Doctor's Name</th>
      <th class="text-sm">Loc</th>
      <th class="text-sm">Payer</th>
      <th class="text-sm">Action</th>
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
      <td class="text-sm">{{$item->reg_no}}</td>
      <td class="text-sm">{{$item->reg_tgl}}</td>
      <td class="text-sm">{{$item->PatientName}}</td>
      <td class="text-sm">{{$item->reg_medrec}}</td>
      <td class="text-sm">{{$item->ParamedicName}}</td>
      <td class="text-sm">{{$item->RoomName}}</td>
      <td class="text-sm">{{$item->reg_cara_bayar}}</td>
      <td class="text-sm">
      <a href="{{ route('perawat.patient.summary-v2', ['reg_no' => $item->reg_no]) }}" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>