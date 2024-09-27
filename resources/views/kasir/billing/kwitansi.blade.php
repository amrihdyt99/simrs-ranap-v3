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
      <img src="{{asset('new_assets/images/kop.png')}}" width="100%" alt="logo-siti-fatimah">
    </div>
  </div>
  <div class="row mt-2" style="border-bottom: 2px black solid; border-top: 2px black solid">
    <h6 class="text-center pt-2">KWITANSI</h6>
  </div>


  <div class="row mt-2">
    <table class="table-informasi border-none w-100" style="float: right">
      <tr>
        <td>Sudah Terima Dari</td>
        <td>:</td>
        <td>{{ $patient->PatientName }}</td>
      </tr>
      <tr>
        <td>Banyaknya Uang</td>
        <td>:</td>
        <td><b>Rp. {{ number_format($billing->pvalidation_total,2) }}</b></td>
      </tr>
      <tr>
        <td>Terbilang Untuk Pembayaran</td>
        <td>:</td>
        <td>{{ $terbilang }}</td>
      </tr>
    </table>
  </div>

  <div class="row mt-5">
    <table class="table-ttd border-none" style="float: right">
      <thead>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td width="300px">Palembang, {{date('d/m/Y')}}</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <p style="margin-top: 100px; border-top: 1px black solid;">{{ $pic }} : {{ $pic_name }}</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="{{asset('')}}vendors/base/vendor.bundle.base.js"></script>
  <script src="{{asset('')}}vendors/justgage/justgage.js"></script>
  <script src="{{asset('new_assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('new_assets/js/barcode/JsBarcode.all.min.js')}}"></script>

  <script>
  </script>
</body>

</html>