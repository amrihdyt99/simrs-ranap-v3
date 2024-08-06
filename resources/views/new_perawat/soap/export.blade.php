@extends('templates.export')

@section('title')
    CPPT_{{$reg}}
@endsection

@section('export')
    <style>
        .table-cppt td, .table-cppt th {
            padding-top: 0.1rem !important;
            border-top: none;
            text-align: top;
        }
        .popup:nth-of-type(2) {
            page-break-before: always;
            top: 100%;
        }
    </style>
    <div class="row mb-3" style="border-bottom: black 2px solid">
        <div class="col">
            <img src="{{asset('images/kop.png')}}" width="100%" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col -lg-6">
            <h4 class="text-center">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI</h4>
            <hr>
            <table class="table table-cppt">
                <tbody>
                    <tr>
                        <td>No. Registrasi</td>
                        <th>{{$reg}}</th>
                    </tr>
                    <tr>
                        <td>No. Medrec</td>
                        <th>{{$reg->reg_medrec}}</th>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <th>{{$reg->PatientName}}</th>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <th>{{$reg->DateofBirth}} ( {{\Carbon\Carbon::parse($reg->DateofBirth)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan %d hari')}} )</th>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <th>
                            @if ($reg->GCSex == '0001^F')
                                Perempuan
                            @else
                                Laki-laki
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>Poliklinik</td>
                        <th>{{$reg->RoomName}}</th>
                    </tr>
                    <tr>
                        <td>DPJP</td>
                        <th>{{$reg->ParamedicName}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table id="table-riwayat-soaper" class="tables table table-striped table-bordered dt-responsive nowrap mt-3 mb-3" style="width:100%">
                    <thead>
                        <tr>
                            <th class="first-row text-center font-weight-bold" width="80px">Tanggal</th>
                            <th class="text-center font-weight-bold" width="100px">PPA</th>
                            <th class="text-center font-weight-bold" width="200px">Hasil Assesment Pasien <br>Dan Pemberi Pelayanan</th>
                            <th class="last-row text-center font-weight-bold" width="300px">Instruksi PPA <br>Termasuk Pasca Bedah</th>
                            <th class="last-row text-center font-weight-bold" width="80px">Review Dan verifikasi DPJP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{date('d-m-Y H:m:s', strtotime($item['updated_at']))}}</td>
                                <td>{{$item['name']}}</td>
                                <td>
                                    <b>S</b> : {{$item['soapdok_subject']}} <br>
                                    <b>O</b> : {{$item['soapdok_object']}} <br>
                                    <b>A</b> : {{$item['soapdok_assesment']}} <br>
                                </td>
                                <td>
                                    <b>P</b> : {!!$item['soapdok_planning']!!} <br> <br>
                                    @if(count($item['tindakan']) > 0)
                                        <b>Tindakan Medis Keperawatan</b> <br>
                                        @foreach ($item['tindakan'] as $item_)
                                            - {{$item_->ItemName1}} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{$item['soapdok_verifikasi']}}</td>
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
        window.onafterprint = window.close;
        window.print();
    </script>
@endsection