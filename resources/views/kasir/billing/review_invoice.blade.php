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
              <td>{{ $patient->PatientName ?? '' }}</td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>:</td>
              <td>{{ $patient->DateOfBirth ?? '' }}</td>
            </tr>
            <tr>
              <td>Tanggal Registrasi</td>
              <td>:</td>
              <td>{{ $patient->reg_tgl ?? '' }}</td>
            </tr>
            <tr>
              <td>Dokter</td>
              <td>:</td>
              <td>{{ $patient->ParamedicName ?? '' }}</td>
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
              <td>{{ $patient->reg_medrec ?? '' }}</td>
            </tr>
            <tr>
              <td>Servce Unit / Room</td>
              <td>:</td>
              <td>{{ $ruangan->kelompok ?? '' . ' / ' . $ruangan->kelas ?? '' }}</td>
            </tr>
            <tr>
              <td>Corporate</td>
              <td>:</td>
              <td>{{ $patient->BusinessPartnerName ?? '' }}</td>
            </tr>
            <tr>
              <td>Document Contract</td>
              <td>:</td>
              <td>{{ $billing->pvalidation_code ?? '' }}</td>
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
            <td class="text-right" colspan="4"><b>SUBTOTAL RAWAT INAP</b></td>
            <td class="text-right"><b>{{ number_format($data_ri['total_all'], 2)}}</b></td>
          </tr>
        </tbody>
        @if (isset($data_luar))
        @if ($data_luar['source'] === "IGD")
        <thead>
          <tr>
            <td class="text-center" colspan="5">
              <b>
                <h6>IGD</h6>
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
          @isset($ex_item['Laboratory'])
          <tr>
            <td colspan="5"><b>Laboratorium</b></td>
          </tr>
          @foreach ($ex_item['Laboratory'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['Radiologi'])
          <tr>
            <td colspan="5"><b>Radiologi</b></td>
          </tr>
          @foreach ($ex_item['Radiologi'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['Medication'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($ex_item['Medication'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['Imaging'])
          <tr>
            <td colspan="5"><b>Imaging</b></td>
          </tr>
          @foreach ($ex_item['Imaging'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['lainnya'])
          <tr>
            <td colspan="5"><b>Lainnya</b></td>
          </tr>
          @foreach ($ex_item['lainnya'] as $item )
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
            <td class="text-right" colspan="4"><b>SUBTOTAL IGD</b></td>
            <td class="text-right"><b>{{ number_format($data_luar['total_all'], 2)}}</b></td>
          </tr>
        </tbody>
        @elseif ($data_luar['source'] === "Rawat Jalan")
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
          @isset($ex_item['Laboratorium'])
          <tr>
            <td colspan="5"><b>Laboratorium</b></td>
          </tr>
          @foreach ($ex_item['Laboratorium'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['Radiologi'])
          <tr>
            <td colspan="5"><b>Radiologi</b></td>
          </tr>
          @foreach ($ex_item['Radiologi'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['Medication'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($ex_item['Medication'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($ex_item['lainnya'])
          <tr>
            <td colspan="5"><b>Lainnya</b></td>
          </tr>
          @foreach ($ex_item['lainnya'] as $item )
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
            <td class="text-right" colspan="4"><b>SUBTOTAL RAWAT JALAN</b></td>
            <td class="text-right"><b>{{ number_format($data_luar['total_all'], 2)}}</b></td>
          </tr>
        </tbody>
        @endif
        @endif
        <tfoot>
          @php
          $total_tagihan = $data_ri['total_all'] + $data_luar['total_all'];
          @endphp
          <tr>
            <td class="text-right" colspan="4"><b>TOTAL</b></td>
            <td class="text-right"><b>{{ number_format($total_tagihan, 2)}}</b></td>
          </tr>
        </tfoot>
      </table>
    </div>


    <div class="m-3">
      <div class="row">
        <div class="col-sm-6">
          <div class="row mt-5">
            <table class="table-ttd border-none text-center" style="float: right">
              <thead>
                <tr>
                  <td width="300px">Palembang, {{date('d/m/Y H:i:s')}}</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="row justify-content-center">
                      <img width="200" height="200" src="{{ $user->signature }}" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mt-2" style="border-bottom: 1px black solid;">({{ $user->name }})</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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