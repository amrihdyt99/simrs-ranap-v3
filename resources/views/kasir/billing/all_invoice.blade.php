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
              <td>
                <ol>
                  @foreach ($multipayer as $name)
                  <li>{{ $name }}</li>
                  @endforeach
                </ol>
              </td>
            </tr>
            <tr>
              <td>Document Contract</td>
              <td>:</td>
              <td>
                <ol>
                  @foreach ($bill_detail as $bill)
                  <li>{{ $bill->pvalidation_code }}</li>
                  @endforeach
                </ol>
              </td>
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
          @isset($rj_item['Medication'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($rj_item['Medication'] as $item )
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
            <td class="text-right" colspan="4"><b>SUBTOTAL RAWAT JALAN</b></td>
            <td class="text-right"><b>{{ number_format($rj_item['subtotal'], 2)}}</b></td>
          </tr>
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
          @isset($igd_item['Laboratory'])
          <tr>
            <td colspan="5"><b>Laboratorium</b></td>
          </tr>
          @foreach ($igd_item['Laboratory'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($igd_item['Radiologi'])
          <tr>
            <td colspan="5"><b>Radiologi</b></td>
          </tr>
          @foreach ($igd_item['Radiologi'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($igd_item['Medication'])
          <tr>
            <td colspan="5"><b>Obat</b></td>
          </tr>
          @foreach ($igd_item['Medication'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($igd_item['Imaging'])
          <tr>
            <td colspan="5"><b>Imaging</b></td>
          </tr>
          @foreach ($igd_item['Imaging'] as $item )
          <tr>
            <td class="text-center">{{ $item['ItemTanggal'] }}</td>
            <td>{{ $item['ItemName1'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'],2) }}</td>
            <td class="text-center">{{ $item['ItemJumlah'] }}</td>
            <td class="text-right">{{ number_format($item['ItemTarif'] * $item['ItemJumlah'], 2)}}</td>
          </tr>
          @endforeach
          @endisset
          @isset($igd_item['lainnya'])
          <tr>
            <td colspan="5"><b>Lainnya</b></td>
          </tr>
          @foreach ($igd_item['lainnya'] as $item )
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
            <td class="text-right"><b>{{ number_format($igd_item['subtotal'], 2)}}</b></td>
          </tr>
          @php
          $total_tagihan = $rj_item['subtotal'] + $ri_item['subtotal'] + $igd_item['subtotal'];
          @endphp
          <tr>
            <td class="text-right" colspan="4"><b>TOTAL</b></td>
            <td class="text-right"><b>{{ number_format($total_tagihan, 2)}}</b></td>
          </tr>
        </tbody>
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
        <div class="col-sm-6">
          <table class="table">
            <tbody>
              <tr>
                <td>Total</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($total_tagihan, 2)}}</b></td>
              </tr>
              @php
              $disc = $payer['Discount Global'] ?? 0;
              @endphp
              @isset($payer['Discount Global'])
              <tr>
                <td>Diskon</td>
                <td>:</td>
                <td class="text-right">{{ number_format($payer['Discount Global'], 2) }}</td>
              </tr>
              @endisset
              <tr>
                <td>Total Tagihan</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format(($total_tagihan - $disc), 2)}}</b></td>
              </tr>
              <tr>
                <td colspan="3">Metode Pembayaran</td>
              </tr>
              @isset($payer['Multipayer'])
              <tr>
                <td>Multipayer</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Multipayer'], 2) }}</b></td>
              </tr>
              @endisset
              @isset($payer['Kredit'])
              <tr>
                <td>Kredit</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Kredit'], 2) }}</b></td>
              </tr>
              @endisset
              @isset($payer['Debit'])
              <tr>
                <td>Debit</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Debit'], 2) }}</b></td>
              </tr>
              @endisset
              @isset($payer['Virtual Account'])
              <tr>
                <td>Virtual Account</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Virtual Account'], 2) }}</b></td>
              </tr>
              @endisset
              @isset($payer['Transfer'])
              <tr>
                <td>Transfer</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Transfer'], 2) }}</b></td>
              </tr>
              @endisset
              @isset($payer['Cash'])
              <tr>
                <td>Cash</td>
                <td>:</td>
                <td class="text-right"><b>{{ number_format($payer['Cash'], 2) }}</b></td>
              </tr>
              @endisset
            </tbody>
          </table>
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