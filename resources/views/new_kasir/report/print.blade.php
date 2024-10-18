<?php
    header("Content-type: text/css; charset: UTF-8");

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CETAK LAPORAN TRANSAKSI</title>
    <link rel="stylesheet" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <style>
        body {
            font-size: 10.5px;
        }
        .table1 td, .table1 th {
            padding: 0.2rem;
            border: 0.5px solid black;
        }
        .table-header td img {
            width: 80px !important;
        }
        .table-header td span:first-child {
            font-size: 24px;
            font-weight: 500;
        }
        .border-none tr {
            border: 0px !important;
        }
        .f-10 {
            font-size: 10px;
        }
        .f-12 {
            font-size: 10px;
        }
        .f-14 {
            font-size: 10px;
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
        .fsmall {
            font-size: 10px !important;
        }
        @media print {
            .btn_print {
                display: none !important;
            }
            body {
                margin: 0;
                padding: 0;
            }
        }
        @page { size: landscape; }
    </style>
</head>
<body>
    {{-- <div class="row mb-3">
        <div class="col">
            <svg class="float-right" id="p_barcode"></svg>
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <img src="{{asset('')}}cnvas/images/kop.png" width="60%" alt="logo-siti-fatimah">
                </div>
            </div>
        </div>
    </div>
    <hr style="border-bottom: 2px solid black">
    <h6>LAPORAN TRANSAKSI {{date('d-m-Y', strtotime($start))}} s/d {{date('d-m-Y', strtotime($end))}}</h6>
    <table rules="all" class="table1 dt-responsive nowrap mt-3 mb-3 fsmall" style="width:100%">
        <thead>
            <tr class="bg-warning">
                <td>Petugas Kasir</th>
                <th colspan="12" style="text-align: left">{{auth()->user()->name}}</th>
            </tr>
            <tr class="text-uppercase">
                <th style="text-align: left" rowspan="2">Tanggal</th>
                <th style="text-align: left" rowspan="2">No Registrasi</th>
                <th style="text-align: left" rowspan="2">No Transaksi</th>
                <th style="text-align: left" rowspan="2">Nama Pasien</th>
                <th style="text-align: left" rowspan="2">Poliklinik</th>
                <th style="text-align: left" rowspan="2">Total Tagihan</th>
                <th class="text-center" colspan="7">Pembayaran</th>
            </tr>
            <tr class="text-uppercase text-center">
                <th>Cash</th>
                {{-- <th>Debit</th>
                <th>Kredit</th> --}}
                <th>Transfer</th>
                <th>Discount</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>QRIS</th>
                <th>Multipayer</th>
            </tr>
        </thead>
        <tbody id="table-report-kasir">
            <tr class="text-center">
                <td colspan="12">Tidak ada data yang ditampilkan</td>
            </tr>
        </tbody>
        <tfoot id="table-report-kasir-footer">
        </tfoot>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $host = location.hostname

        if ($host == '127.0.0.1' || $host == 'rj.id') {
            $dom = ''
        } else {
            $dom = '/simrs-rajal'
        }
    </script>
    
    <script>
        var baseUrl = '{{url("")}}'

        $(document).ready(function(){
            getReportTransaction('{{$start}}', '{{$end}}', 1)
        })
    </script>
    <script src="{{asset('')}}cnvas/js/kasir.js"></script>
</body>
</html>