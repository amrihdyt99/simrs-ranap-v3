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
            font-size: 1rem
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
        td {
            font-size: 1rem;
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
                <table style="width: 100%; font-size: 1rem;">
                    <tr>
                        <td style="font-size: 1rem; min-width: 400px;">Nama Lengkap</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['nama_pasien'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Tanggal Lahir</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['pasien']['date_of_birth'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Diagnosa</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_diagnosa'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Tindakan</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_rekomendasi_tindakan'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Indikasi Rawat Inap</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_indikasi'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Dokter Yang Mengirim</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['dokter_poli'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">DPJP</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_dpjp'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Dirawat Tanggal</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_tanggal'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Status Jaminan</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">-</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Kelas Rawat</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_kelas'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Kebutuhan Pelayanan</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_layanan'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1rem;">Pasien Memerlukan Kamar Perawatan</td>
                        <td style="font-size: 1rem;">:</td>
                        <td style="font-size: 1rem;">{{ $data['ranap_kamar'] }}</td>
                    </tr>
                </table>
                <p style="margin-top: 10px;">Atas Perhatiannya saya ucapkan terima kasih.</p>
                <div class="grid" style="width: 100%">
                    <div class="flex-col" style="width: 100%">
                        <span>Palembang, {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                        <span>Petugas Admisi,</span>
                        <span style="margin-top: 60px;">(............................................)</span>
                    </div>
                    <div class="flex-col" style="width: 100%">
                        @if ($signature)
                            <img src="{{ $signature }}" alt="Doctor's Signature" style="width: 200px; height: 100px;">
                        @else
                            <canvas id="doctor-signature" style="border:1px solid #000; width: 200px; height: 100px;"></canvas>
                            <button type="button" id="save-doctor-signature" class="btn btn-sm btn-primary mt-2 no-print" style="width: 200px; margin-right: 10px;">Simpan Tanda Tangan</button>
                            <button type="button" id="clear-doctor-signature" class="btn btn-sm btn-secondary mt-2 no-print" style="width: 200px;">Hapus Tanda Tangan</button>
                            <input type="hidden" id="doctor-signature-input" name="signature_doctor" value="">
                            <input type="hidden" id="reg_no" name="reg_no" value="{{ $reg_no }}">
                            <input type="hidden" id="medrec" name="medrec" value="{{ $medrec }}">
                        @endif
                        <span style="margin-top: 10px;">({{ $data['dokter_poli'] }})</span>
                    </div>          
                </div>
            </div>
        </div>
    </div>
    <div style="page-break-after: always"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    const initializeCanvas = () => {
        const canvas = document.getElementById('doctor-signature');
        const ctx = canvas.getContext('2d');
        let drawing = false;
        canvas.width = 200;
        canvas.height = 100;
        const existingSignature = "{{ $signature }}";
        if (existingSignature) {
            const img = new Image();
            img.onload = () => {
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
            img.src = existingSignature;
        }
        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (!drawing) return;
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
        });

        canvas.addEventListener('mouseup', () => {
            drawing = false;
            ctx.closePath();
        });
        document.getElementById('clear-doctor-signature').addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
        document.getElementById('save-doctor-signature').addEventListener('click', () => {
            const signature = canvas.toDataURL('image/png');
            const reg_no = document.getElementById('reg_no').value;
            const medrec = document.getElementById('medrec').value;
            $.ajax({
                url: "{{ route('save_signature') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    ttd_dokter: signature,
                    reg_no: reg_no,
                    medrec: medrec
                },
                success: function(response) {
                    if (response.success) {
                        alert('Tanda tangan berhasil disimpan.');
                    } else {
                        alert('Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + error);
                }
            });
        });
    };
    initializeCanvas();
});
</script>

</body>
</html>