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
  <div class="container">

    <div class="">
      <img src="{{asset('new_assets/images/kop.png')}}" width="100%" alt="logo-siti-fatimah">
    </div>
    <div class="text-center" style="border-bottom: 2px black solid; border-top: 2px black solid">
      <h5 class=""><b>INVOICE / PAYMENT RECEIPT</b></h5>
    </div>

    <div class="row m-3">
      <div class="col-sm-6">
        <table class="table w-100">
          <tbody>
            <tr>
              <td>Nama Pasien</td>
              <td>:</td>
              <td>{{ $patient->PatientName }}</td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>:</td>
              <td>{{ $patient->DateOfBirth }}</td>
            </tr>
            <tr>
              <td>Tanggal Registrasi</td>
              <td>:</td>
              <td>{{ $patient->reg_tgl }}</td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td>{{ $patient->ParamedicName }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">

        <table class="table w-100">
          <tbody>
            <tr>
              <td>MRN</td>
              <td>:</td>
              <td>{{ $patient->reg_medrec }}</td>
            </tr>
            <tr>
              <td>Servce Unit / Room</td>
              <td>:</td>
              <td>{{ $ruangan->kelompok . ' / ' . $ruangan->kelas }}</td>
            </tr>
            <tr>
              <td>Corporate</td>
              <td>:</td>
              <td>{{ $patient->BusinessPartnerName }}</td>
            </tr>
            <tr>
              <td>Document Contract</td>
              <td>:</td>
              <td>{{ $billing->pvalidation_code }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div class="m-3">
      <table class="table table-bordered w-100">
        <thead>
          <tr>
            <td class="text-center" colspan="5">
              <b>
                <h6>RAWAT INAP</h6>
              </b>
            </td>
          </tr>
          <tr>
            <td class="text-center">Tanggal</td>
            <td>Nama</td>
            <td class="text-right">Tarif</td>
            <td class="text-center">Jumlah</td>
            <td class="text-right">Total</td>
          </tr>
        </thead>
        <tbody>
          @isset($ri_item['Laboratorium'])
          <tr>
            <td colspan="5"><b>Laboratorium</b></td>
          </tr>
          @foreach ($ri_item['Laboratorium'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ri_item['Radiologi'])
          <tr>
            <td colspan="5"><b>Radiologi</b></td>
          </tr>
          @foreach ($ri_item['Radiologi'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ri_item['obat'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($ri_item['obat'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ri_item['lainnya'])
          <tr>
            <td colspan="5"><b>Lainnya</b></td>
          </tr>
          @foreach ($ri_item['lainnya'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          <tr>
            <td class="text-right" colspan="4"><b>SUBTOTAL</b></td>
            <td class="text-right"><b>{{ number_format($ri_item['subtotal'], 2)}}</b></td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <td class="text-center" colspan="5">
              <b>
                <h6>RAWAT JALAN</h6>
              </b>
            </td>
          </tr>
          <tr>
            <td class="text-center">Tanggal</td>
            <td>Nama</td>
            <td class="text-right">Tarif</td>
            <td class="text-center">Jumlah</td>
            <td class="text-right">Total</td>
          </tr>
        </thead>
        <tbody>
          @isset($rj_item['Laboratorium'])
          <tr>
            <td colspan="5"><b>Laboratorium</b></td>
          </tr>
          @foreach ($rj_item['Laboratorium'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($rj_item['Radiologi'])
          <tr>
            <td colspan="5"><b>Radiologi</b></td>
          </tr>
          @foreach ($rj_item['Radiologi'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($rj_item['obat'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($rj_item['obat'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($rj_item['lainnya'])
          <tr>
            <td colspan="5"><b>Lainnya</b></td>
          </tr>
          @foreach ($rj_item['lainnya'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          <tr>
            <td class="text-right" colspan="4"><b>SUBTOTAL</b></td>
            <td class="text-right"><b>{{ number_format($rj_item['subtotal'], 2)}}</b></td>
          </tr>

          <tr>
            <td class="text-right" colspan="4"><b>TOTAL</b></td>
            <td class="text-right"><b>{{ number_format($rj_item['subtotal'] + $ri_item['subtotal'], 2)}}</b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script src="{{asset('')}}vendors/base/vendor.bundle.base.js"></script>
  <script src="{{asset('')}}vendors/justgage/justgage.js"></script>
  <script src="{{asset('new_assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('new_assets/js/barcode/JsBarcode.all.min.js')}}"></script>

  <script>
  </script>
</body>

</html>