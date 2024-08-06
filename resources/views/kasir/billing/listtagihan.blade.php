@extends('kasir/layout/master')
@section('title', 'List Tagihan')
@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <h5>List Tagihan pasien</h5>
                <div class="d-flex justify-content-end">
                    <h5><a href="" class="btn btn-primary mb-2 me-1"><i class="bi bi-arrow-clockwise"></i> Reload
                            table</a>
                    </h5>
                </div>
                <table id="example" class="table table-striped center" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STATUS PEMBAYARAN</th>
                            <th>TGL REGISTRASI</th>
                            <th>NO MEDREC</th>
                            <th>NO REGISTRASI</th>
                            <th>NAMA</th>
                            <th>PAYER</th>
                            <th>COVER CLASS</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pasien as $row)
                        <tr>
                            <td>
                                <a href="{{route('kasir.tagihan',["reg_no"=>$row->reg_no])}}"><span class="badge text teal px-4">Proses</span></a>
                            </td>
                            <td>
                                @if($row->reg_discharge!="3")
                                    <span class="badge text teal px-4">Belum Dibayar</span>
                                @else
                                    <span class="badge text teal px-4">Sudah Dibayar</span>
                                @endif
                            </td>
                            <td>{{$row->reg_tgl}}</td>
                            <td>{{$row->reg_medrec}}</td>
                            <td>{{$row->reg_no}}</td>
                            <td>{{$row->PatientName}}</td>
                            <td>{{$row->reg_cara_bayar}}</td>
                            <td>REHAP MEDIK</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
