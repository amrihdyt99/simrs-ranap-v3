<?php
header("Content-type: text/css; charset: UTF-8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('new_assets/css/jquery.dataTables.min.css')}}">
    <style>
        .table td,
        .table th {
            padding: 0.25rem;
            border-top: transparent;
            font-size: 12px;
        }

        .table-header td {
            padding-right: 20px;
        }

        .table-header td span:first-child {
            font-size: 25px;
            font-weight: 600;
        }

        .table-header td img {
            width: 80px !important;
        }

        #table-billing td,
        #table-billing th {
            border-bottom: 1px solid black;
            font-size: 10px;
        }

        .table-metode td,
        .table-metode th {
            padding: 0rem;
            border: none;
            font-size: 12px;
        }

        .border-none tr {
            border: 0px !important;
        }

        .f-10 {
            font-size: 12px;
        }

        .f-12 {
            font-size: 12px;
        }

        .f-14 {
            font-size: 14px;
        }

        .text-right {
            text-align: right
        }

        .text-left {
            text-align: left
        }

        .text-center {
            text-align: center
        }

        .float-right {
            float: right;
        }

        .text-capitalize {
            text-transform: capitalize !important;
        }

        .text-bold {
            font-weight: 600;
        }

        @media print {
            .btn_print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col text-center">
            <img src="{{asset('new_assets/images/kop.png')}}" width="90%" alt="logo-siti-fatimah">
        </div>
    </div>
    <div class="row" style="border-bottom: 2px black solid; border-top: 2px black solid">
        <div class="col-lg-6">
            <table class="table table-bio">
                <tbody>
                    <tr>
                        <td width="250px">No Reg / No Rekam Medis</td>
                        <td>{{$pasien->reg_no}} <b>|</b> {{$pasien->reg_medrec}}</td>
                    </tr>
                    <tr>
                        <td width="250px">Nama Pasien</td>
                        <td><b>{{$pasien->PatientName}}</b></td>
                    </tr>
                    <tr>
                        <td width="250px">Tgl. Kunjungan</td>
                        <td>{{$pasien->reg_tgl}}</td>
                    </tr>
                    <tr>
                        <td width="250px">Penjamin</td>
                        <td>{{$pasien->reg_cara_bayar}}</td>
                    </tr>
                    <tr>
                        <td width="250px">No SJP</td>
                        <td>{{$pasien->reg_no_kartu}}</td>
                    </tr>
                    <tr>
                        <td width="250px">Ruangan</td>
                        <td>{{$pasien->nama_ruangan}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="text-center">RINCIAN BIAYA RAWAT INAP</h6>

    <table id="example" class="table dt-responsive nowrap mt-3 mb-3" style="width:100%">
        <thead>
            <tr>
                <th>JENIS TINDAKAN/ITEM</th>
                <th>KODE TINDAKAN</th>
                <th>NAMA TINDAKAN</th>
                <th>HARGA</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totaltagihanpaket=0;
            @endphp
            @foreach($paket as $rowpaket)

            @php
            $totaltagihanpaket=$totaltagihanpaket+$rowpaket->price;
            @endphp
            <tr>
                <td>Paket</td>
                <td>{{$rowpaket->item_code}}</td>
                <td>{{$rowpaket->item_name}}<br />
                    @php
                    echo "<ul>".$rowpaket->rincian_paket."</ul>";
                    @endphp
                </td>

                <td>Rp. {{number_format($rowpaket->price,2)}}</td>
            </tr>

            @endforeach


        </tbody>
        <tr>
            <th colspan="1">Total Tagihan</th>
            <td></td>
            <td></td>
            <td>Rp.{{number_format($totaltagihanpaket,2)}}</td>
        </tr>
    </table>

    <table id="table-billing" class="table dt-responsive nowrap mt-3 mb-3" style="width:100%">
        <thead>
            <tr class="text-uppercase">
                <th class="text-left">Jenis Tindakan/Item</th>
                <th class="text-left">Nama Tindakan</th>
                <th class="text-right">Harga Satuan</th>
                <th>Qty</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
            @php
            $totaltagihan=0;
            $total = $item->harga_jual * $item->qty;
            $totaltagihan = $totaltagihan+$total;
            @endphp
            @if($item->jenis_order!="paket")
            <tr>
                <td>{{$item->item_code}}</td>
                <td>{{$item->item_name}}</td>
                <td class="text-right">{{number_format($item->harga_jual, 2)}}</td>
                <td class="text-center">{{$item->qty}}</td>
                <td class="text-right">{{number_format($total, 2)}}</td>
            </tr>
            @endif

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan='3' class="font-weight-bold">TOTAL TAGIHAN</td>
                <td colspan='2' class="font-weight-bold"><span style="float:right;" id='total-tagihan'>{{number_format($transaksi->tanggungan_asuransi, 2)}}</span></td>
            </tr>
            <tr>
                <td colspan='3' class="font-weight-bold">SELISIH</td>
                <td colspan='2' class="font-weight-bold"><span style="float:right;" id='total-tagihan'>{{number_format($transaksi->selisih_bayar, 2)}}</span></td>
            </tr>
            <tr>
                <td colspan='2' class="font-weight-bold">TERBILANG</td>
                <td colspan='3'><span class="font-weight-bold float-right text-capitalize" id="terbilang"></span></td>
            </tr>
        </tfoot>
    </table>
    <table id="table-billing" class="table dt-responsive nowrap mt-3 mb-3" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Transaksi</th>
                <th class="text-right">Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$transaksi->tgl_bayar}}</td>
                <td>{{$transaksi->no_faktur}}</td>
                <td class="text-right">{{number_format($transaksi->tanggungan_asuransi+$transaksi->selisih_bayar, 2)}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table-metode dt-responsive nowrap mt-3 mb-3" style="width:30%">
        <thead>
            <tr>
                <th colspan="2">Metode Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$transaksi->cara_bayar}}</td>
                <th class="text-right">{{number_format($transaksi->selisih_bayar, 2)}}</th>
            </tr>
            {{--<tr>
                <td>Kredit</td>
                <th class="text-right">{{number_format($metode->kredit, 2)}}</th>
            </tr>
            <tr>
                <td>Debit</td>
                <th class="text-right">{{number_format($metode->debit, 2)}}</th>
            </tr>
            <tr>
                <td>Transfer</td>
                <th class="text-right">{{number_format($metode->transfer, 2)}}</th>
            </tr>
            <tr>
                <td>Discount</td>
                <th class="text-right">{{number_format($metode->discount, 2)}}</th>
            </tr>--}}
        </tbody>
    </table>
    <table class="table-metode border-none" style="float: right">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th width="200px">Operator</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <p style="margin-top: 100px; border-top: 1px black solid;">Kasir : {{auth()->user()->user_name}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="text-right mr-0" style="font-size: 8px; position: fixed; bottom: 0">Tanggal Cetak : <b>{{date('Y/m/d H:m:s')}}</b> oleh : <b>{{auth()->user()->name}}</b></p>

    <script src="{{asset('')}}vendors/base/vendor.bundle.base.js"></script>
    <script src="{{asset('')}}vendors/justgage/justgage.js"></script>
    <script src="{{asset('new_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('new_assets/js/barcode/JsBarcode.all.min.js')}}"></script>

    <script>
    </script>
</body>

</html>