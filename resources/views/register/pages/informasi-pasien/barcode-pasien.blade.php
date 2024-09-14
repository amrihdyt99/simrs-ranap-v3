<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode </title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: start;
            height: 100vh;
        }
        .barcode {
            text-align: left;
            width: auto;
            height: 100px;
            margin: 0 auto;
            font-family: "Arial", sans-serif;
            font-size: .8rem;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="barcode">
            <div>
                <span>{{$data_pasien['medical_no']}} </span> <span>({{ $data_pasien['jenis_kelamin'] }})</span>
            </div>
            <div>{{ $data_pasien['nama_lengkap'] }}</div>
            <div>{{ $data_pasien['tgl_lahir'] }} ({{ $data_pasien['usia'] }})</div>
            <div>
                {{-- svg element --}}
                {!! $data_pasien['barcode'] !!}
            </div>
        </div>
    </div>
</body>
</html>