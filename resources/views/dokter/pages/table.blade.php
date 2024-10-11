<div class="table-responsive">
    <table id="data_{{$type}}" class="w-100 table table-bordered table-hover" style="color: black">
        <thead class="w-100">
            <tr class="text-uppercase bg-warning">
                <th class="text-sm">#</th>
                <th class="text-sm">Data Pendaftaran</th>
                <th class="text-sm">Nama Pasien</th>
                <th class="text-sm">DPJP</th>
                <th class="text-sm">Physician Team</th>
                <th class="text-sm">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    No. RM : {{$row->reg_medrec}} <br><br>
                    No. Reg : <b>{{$row->reg_no}}</b> <br><br>
                    Tgl. Daftar : {{$row->reg_tgl}} {{$row->reg_jam}} <br><br>
                    Cara Bayar : {{$row->reg_cara_bayar}} <br><br>
                    Lokasi : <b>{{$row->RoomName}} / {{$row->ServiceUnitName}}</b> <br><br>
                    Role PPA :  
                    @if (isset($row->physician_team_role))
                        @foreach (json_decode($row->physician_team_role) as $item)
                            <div class="badge badge-info">{{$item}}</div>
                        @endforeach
                    @else
                        <div class="badge badge-info">DPJP</div>
                    @endif
                </td>
                <td><b>{{$row->PatientName}}</b></td>
                <td>{{$row->ParamedicName}}</td>
                <td>
                    @foreach(explode('|', $row->physician_team) as $team_member)
                        <span style="margin-right: 5px; margin-bottom: 5px; white-space: nowrap; font-size: 0.875rem;" class="badge badge-primary">{{ trim($team_member) }}</span><br>
                    @endforeach
                </td>
                <td>
                    @if ($type == 'area')
                        <button type="button" onclick="takeOver('{{$row->reg_no}}', '', {{$row->room_id}}, '{{$row->service_unit}}')" class="btn btn-sm btn-outline-primary">
                            <i class="mr-2 fa fa-share-square"></i>Ambil Alih
                        </button>
                    @else
                        @php
                            $isKonsul = isset($row->physician_team_role) && in_array('Konsul', json_decode($row->physician_team_role));
                        @endphp
                        
                        @if ($isKonsul)
                            <div class="alert alert-warning mb-2" role="alert">
                                <i class="fa fa-exclamation-triangle mr-2"></i>Pasien memerlukan konsultasi
                            </div>
                        @endif
                        
                        <a href="{{route('dokter.patient.summary',['patient'=>$row->reg_no])}}" class="mb-1 btn btn-sm btn-outline-primary">
                            <i class="mr-2 fa fa-clipboard-check"></i>Periksa
                        </a><br>
                        <a href="{{route('dokter.patient.detail', $row->reg_no)}}" target="_blank" class="mb-1 btn btn-sm btn-outline-success">
                            <i class="mr-2 fa fa-list"></i>Detail
                        </a><br>
                        <button type="button" onclick="takeOver('{{$row->reg_no}}', 'cancel')" class="btn btn-sm btn-outline-danger">
                            <i class="mr-2 fa fa-times"></i>Batal
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<style>
.alert {
    padding: 0.5rem;
    font-size: 0.875rem;
}
</style>