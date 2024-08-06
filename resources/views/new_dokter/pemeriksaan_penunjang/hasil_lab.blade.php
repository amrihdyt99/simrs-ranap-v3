<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hasil Lab</title>
</head>

<body>


@php
    $jsonDecode = json_decode($response)

@endphp
<table width="100%">
    <tr>
        <td align="center">
            <img src="{{ asset('new_assets/images/kop.png') }}" width="776" height="138" /><br/>
        </td>
    </tr>
</table>
<h4 align="center">Formulir Hasil Pemeriksaaan Laboratorium Patologi Klinik</h4>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="15%">No. Rekam Medis</td>
      <td width="2%">:</td>
      <td width="32%">&nbsp;<label id="norm">{{$jsonDecode->data->header->pid}}</label></td>
      <td width="19%">No. Laboratorium</td>
      <td width="2%">:</td>
      <td width="30%">&nbsp;<label id="nolab">{{$jsonDecode->data->header->lno}}</label></td>
    </tr>
    <tr>
      <td>Nama Pasien</td>
      <td>:</td>
      <td>&nbsp;<label id="namapasien">{{$jsonDecode->data->header->pname}}</label></td>
      <td>Tanggal Order</td>
      <td>:</td>
      <td>&nbsp;<label id="tanggalorder">{{$jsonDecode->data->header->request_dt_text}}</label></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td>:</td>
      <td>&nbsp;<label id="tanggallahir">{{$jsonDecode->data->header->pbirth_text}}</label></td>
      <td>Tanggal Bhn Diterima</td>
      <td>:</td>
      <td>&nbsp;<label id="tanggalditerima">{{$jsonDecode->data->header->request_dt_text}}</label></td>
    </tr>
    <tr>
      <td>Asal Pasien</td>
      <td>:</td>
      <td>&nbsp;<label id="asalpasien">{{$jsonDecode->data->header->source_nm}}</label></td>
      <td>Tanggal Hsl Selesai</td>
      <td>:</td>
      <td>&nbsp;<label id="tanggalselesai">{{$jsonDecode->data->header->request_dt_text}}</label></td>
    </tr>
    <tr>
      <td>Diagnosa</td>
      <td>:</td>
      <td>&nbsp;<label id="diagnosa">{{$jsonDecode->data->header->cmt_order}}</label></td>
      <td>Dokter Pengirim</td>
      <td>:</td>
      <td>&nbsp;<label id="dokterpengirim">{{$jsonDecode->data->header->clinician_nm}}</label></td>
    </tr>
    <tr>
      <td>Alamat Pasien</td>
      <td>:</td>
      <td>&nbsp;<label id="alamatpasien">{{$jsonDecode->data->header->address1}}</label></td>
      <td>Status Pembayaran</td>
      <td>:</td>
      <td>&nbsp;<label id="statuspembayaran">{{$jsonDecode->data->header->payment}}</label></td>
    </tr>
  </tbody>
</table>
<br/>
<table width="100%" border="0">
    <thead>
        <th width="29%" style="text-align: left">Nama Pemeriksaan</th>
        <th width="20%" style="text-align: left">Hasil</th>
        <th width="19%" style="text-align: left">Satuan</th>
        <th width="32%" style="text-align: left">Nilai Normal</th>
    </thead>
  <tbody id="table-lab">
  @foreach($jsonDecode->data->detail as $key => $value)
    <tr>
       <td>
          <label style="text-align: left; font-weight: bold"> {{$key}}</label>
           <br/>
           <br/>
           <br/>
       </td>
    </tr>
      @foreach($value as $key2 => $value2)
        <tr>
            <td>
                <label style="text-align: left; font-weight: bold">{{$key2}}</label>


            </td>
        </tr>
        @foreach($value2 as $item)
            <tr>
                <td>{{$item->test_nm}}</td>
                <td>{{$item->result_value}}</td>
                <td>{{$item->unit}}</td>
                <td>{{$item->ref_range}}

                </td>
            </tr>
        @endforeach
      @endforeach
  @endforeach
  </tbody>
</table>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

</script>
</html>
