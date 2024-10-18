@extends('kasir/layout/master')
@section('title', 'List Tagihan')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-12 row">
                <div class="col-lg-3 pr-0">
                    <h6>Status Pembayaran</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input dataToFilter" type="radio" id="inlineradio1" name="statusPayment" value="all">
                        <label class="form-check-label" for="inlineradio1">Semua</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input dataToFilter" type="radio" id="inlineradio2" name="statusPayment" value="validated">
                        <label class="form-check-label" for="inlineradio2">Sudah Bayar</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input dataToFilter" type="radio" id="inlineradio3" name="statusPayment" value="unvalidated">
                        <label class="form-check-label" for="inlineradio3">Belum Bayar</label>
                    </div>
                </div>
                <div class="col-lg-4 pl-0">
                    <div class="row" style="font-size: 15px">
                        <div class="form-group col-lg-6">
                            <label for="">Tanggal Awal</label>
                            <input type="date" class="form-control dataToFilter" name="start">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control dataToFilter" name="end">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-info btn-sm mt-4" onclick="filterData()"><i class="fas fa-check"></i> Filter Data</button>
                    <a class="btn btn-warning btn-sm mt-4" href="{{url()->current()}}"><i class="fas fa-redo"></i> Semua Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <h5>List Tagihan pasien</h5>
            <div class="d-flex justify-content-end">
                <h5><a href="" class="btn btn-primary mb-2 me-1"><i class="bi bi-arrow-clockwise"></i> Reload table</a></h5>
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
                        <th>RUANGAN</th>
                        {{-- <th>COVER CLASS</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasien as $row)
                    <tr>
                        <td>
                            <a href="{{route('kasir.tagihan',["reg_no"=>$row->reg_no])}}"><span class="badge text teal px-4">Proses</span></a>
                        </td>
                        <td>
                            @if($row->pvalidation_status == 1)
                                <span class="badge text px-4" style="background-color: green">Sudah Dibayar</span>
                            @else
                                <span class="badge text px-4" style="background-color: red">Belum Dibayar</span>
                            @endif
                        </td>
                        <td>{{$row->reg_tgl}} {{$row->reg_jam}}</td>
                        <td>{{$row->reg_medrec}}</td>
                        <td>{{$row->reg_no}}</td>
                        <td>{{$row->PatientName}}</td>
                        <td>{{$row->Payer}}</td>
                        <td>
                            @if ($row->CurrentLocation)
                                {{$row->CurrentLocation['RoomName'] ?? '-'}} <br> 
                                {{$row->CurrentLocation['ServiceUnitName'] ?? '-'}} <br> 
                                {{$row->CurrentLocation['ChargeClassCode'] ? 'Kelas '.$row->CurrentLocation['ChargeClassCode'] : '-'}} <br>
                                {{$row->CurrentLocation['BedCode'] ? 'Bed '.$row->CurrentLocation['BedCode'] : '-'}} <br>
                            @else
                                {{$row->RoomName ?? '-'}} <br> {{$row->ServiceUnitName ?? '-'}} <br> {{$row->charge_class_code ? 'Kelas '.$row->charge_class_code : '-'}}
                            @endif
                        </td>
                        {{-- <td>{{$row->charge_class_code}}</td> --}}
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var baseUrl = '{{url("")}}'
        var statusPayment = '{{$status}}'
        var start = '{{$start}}'
        var end = '{{$end}}'

        if (statusPayment) {
            $('[name="statusPayment"][value="'+statusPayment+'"]').attr('checked', true)
        }
        if (start) {
            $('[name="start"]').val(start)
        }
        if (end) {
            $('[name="end"]').val(end)
        }
    </script>
    <script src="{{asset('')}}cnvas/js/kasir.js"></script>
@endsection