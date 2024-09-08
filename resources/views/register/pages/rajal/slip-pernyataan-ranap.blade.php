<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Pernyataan Rawat Inap</title>
    <style>
        body {
            padding: 5px;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: start;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center
        }
        .flex-col {
            display: flex;
            flex-direction: column;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
           <div style="text-align: center">
                <img src="{{asset('new_assets/images/kop.png')}}" width="776" height="138" />
                <hr style="height: 4px; background-color: #000;"/>
                <h4 style="text-align: center">SURAT PERNYATAAN RAWAT INAP</h4>
            </div>
            <div style="display: flex; flex-direction: column;">
                <span>Kepada Yth,</span>
                <span>Unit Admisi</span>
                <span>Di -</span>
                <div style="margin-left: 20px;">Tempat</div>
            </div>
            <div style="margin-top: 10px;">
                <p>Mohon didaftar sebagai pasien rawat inap terhadap:</p>
                <table style="width: 100%">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $data['nama_pasien'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $data['pasien']['date_of_birth'] }}</td>
                    </tr>
                    <tr>
                        <td>Diagnosa</td>
                        <td>:</td>
                        <td>{{ $data['ranap_diagnosa'] }}</td>
                    </tr>
                    <tr>
                        <td>Indikasi Rawat Inap</td>
                        <td>:</td>
                        <td>{{ $data['ranap_indikasi'] }}</td>
                    </tr>
                    <tr>
                        <td>Dokter Yang Mengirim</td>
                        <td>:</td>
                        <td>{{ $data['dokter_poli'] }}</td>
                    </tr>
                    <tr>
                        <td>DPJP</td>
                        <td>:</td>
                        <td>{{ $data['ranap_dpjp'] }}</td>
                    </tr>
                    <tr>
                        <td>Dirawat Tanggal</td>
                        <td>:</td>
                        <td>{{ $data['ranap_tanggal'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Jaminan</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Kelas Rawat</td>
                        <td>:</td>
                        <td>{{ $data['ranap_kelas'] }}</td>
                    </tr>
                    <tr>
                        <td>Kebutuhan Pelayanan</td>
                        <td>:</td>
                        <td>{{ $data['ranap_layanan'] }}</td>
                    </tr>
                    <tr>
                        <td>Pasien Memerlukan Kamar Perawatan</td>
                        <td>:</td>
                        <td>{{ $data['ranap_kamar'] }}</td>
                    </tr>
                </table>
                <p>Atas Perhatiannya saya ucapkan terima kasih.</p>
                <div class="grid" style="width: 100%">
                    <div class="flex-col" style="width: 100%">
                        <span>Palembang, {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                        <span>Petugas Admisi,</span>
                        <span style="margin-top: 60px;">(............................................)</span>
                    </div>
                    <div class="flex-col" style="width: 100%">
                        <span>Palembang, {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                        <span>Dokter Yang Memeriksa,</span>
                        <span style="margin-top: 60px;">({{ $data['dokter_poli'] }})</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>