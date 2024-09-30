<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .no-border {
            border: none;
        }
        .full-width {
            width: 100%;
        }
        @media print {
            .no-print {
                display: none;
            }
            canvas {
                border: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- <h1>Surat Rawat Intensif</h1>
    <p>Nama Lengkap: {{ $data_pasien['nama_lengkap'] }}</p>
    <p>Medical No: {{ $data_pasien['medical_no'] }}</p>
    <p>Tanggal Lahir: {{ $data_pasien['tgl_lahir'] }}</p>
    <p>Jenis Kelamin: {{ $data_pasien['jenis_kelamin'] }}</p>
    <p>Usia: {{ $data_pasien['usia'] }}</p>
    <p>Alamat: {{ $data_pasien['alamat'] }}</p> Menambahkan alamat pasien -->
    <!-- <p>Tanggal Registrasi: {{ $data_pasien['tgl_registrasi'] }}</p> -->
    <tr>
                    <td><img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="100%" /></td>
                </tr>
        <div class="card-header text-center">
            <h4 class="text-center" style="text-align: center;"><b>PERSETUJUAN PERAWATAN DI INSTALASI RAWAT INTENSIF</b></h4>
        </div>
    <div class="card mt-5">
        
        <div class="card-body">
            <table class="full-width" border="1">
                <tbody>
                    <tr>
                        <td class="no-border" colspan="2">Saya yang bertanda tangan di bawah ini:</td>
                    </tr>
                    <tr>
                        <td class="no-border">Nama</td>
                        <td class="no-border">: </td>
                    </tr>
                    <tr>
                        <td class="no-border">Umur</td>
                        <td class="no-border">: </td>
                    </tr>
                    <tr>
                        <td class="no-border">Jenis Kelamin</td>
                        <td class="no-border">: </td>
                    </tr>
                    <tr>
                        <td class="no-border">Alamat</td>
                        <td class="no-border">: </td>
                    </tr>
                    <tr>
                        <td class="no-border" colspan="2">Dengan ini menyatakan SETUJU/MENOLAK perawatan di INSTALASI RAWAT INTENSIF</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="no-border" colspan="2">Terhadap diri saya sendiri/*_________________ saya :</td>
                    </tr>
                    <tr>
                        <td class="no-border">Nama</td>
                        <td class="no-border">:{{ $data_pasien['nama_lengkap']}}</td>
                    </tr>
                    <tr>
                        <td class="no-border">Umur</td>
                        <td class="no-border">:{{ $data_pasien['usia'] }}</td>
                    </tr>
                    <tr>
                        <td class="no-border">Jenis Kelamin</td>
                        <td class="no-border">:{{ $data_pasien['jenis_kelamin'] }}</td>
                    </tr>
                    <tr>
                        <td class="no-border">Alamat</td>
                        <td class="no-border">:{{ $data_pasien['alamat']}}</td>
                    </tr>
                    <tr>
                        <td class="no-border">No. RM</td>
                        <td class="no-border">:{{ $data_pasien['medical_no'] }}</td>
                    </tr>
                    <!-- <tr>
                        <td colspan="2">Saya menyatakan mengerti:</td>
                    </tr> -->
                    <tr>
                        <td colspan="2">Saya menyatakan mengerti:
                            <ol>
                                <li>Bahwa berdasarkan penjelasan dokter, selama perawatan di Instalasi Rawat Intensif, dinyatakan tindakan apapun yang dilakukan selalu mengandung beberapa konsekuensi dari resiko. 
                                    Resiko potensial yang terjadi termasuk peruabahan tekanan darah, reaksi alergi, 
                                    henti jantung, kerusakan otak, kelumpuhan, kerusakan saraf bahkan kematian. Saya menyadari hal ini dan resiko setiap komplikasi lain yang mungkin terjadi</li>
                                <li>Bahwa dalam praktek ilmu kedokteran, bukan merupakan ilmu pengetahuan yang pasti (exact science) dan saya menyadari tidak seorangpun dapat menjanjikan atau menjamin
                                    sesuatu yang berhubungan dengan perawatan di Intalasi Rawat Intensif.</li>
                                <li>Bahwa obat-obatan yang digunakan sebelum prosedur di Instalasi Rawat Intensif dapat saja menimbulkan komplikasi. Oleh karena itu *_________ saya gunakan, termasuk aspirin,
                                    kontrasepsi, obat-obatan flu, narkotik, marijuana, kokain, dan lain-lain.</li>
                                <li>Bahwa selama perawatan di Instalasi Rawat Intensif, dapat dilakukan tindakan-tindakan medis sesuai kondisi pasien berdasarkan pertimbangan medis 
                                    termasuk intubasi, pemakaian ventilator, kateter vena sentral, arteri line serta transfusi darah dan atau produk-produk darah.</li>
                                <li>Bahwa Dokter di Intalasi Rawat Intensif yang bertugas dapat melakukan konsultasi atau mendapat bantuan dari dokter lain yang berkaitan jika dirasakan perlu.</li>
                                <li>Bahwa selama perawatan di Intalasi Rawat Intensif keluarga harus mematuhi tata tertib perawatn dan administrasi sebagai berikut:</li>
                            </ol>
                            <h5>TATA TERTIB PERAWATAN</h5>
                            <ol>
                                <li>Keluarga pasien tidak boleh menunggu pasien didalam ruang perawatan. <br> Jam kunjungan pukul 11.30 - 11.30 dan pukul 16.30 - 17.30, waktu kunjungan +10 menit, bagi yang berkunjung hanya diperbolehkan 1 (satu) orang dan memiliki kartu jaga. 
                                    Untuk ruang NICU hanya diperbolehkan orang tua bayi.</li>
                                <li>Petugas berhak melarang pasien untuk berkunjung bila kondisi pasien tidak memungkinkan atau permintaan pasien/keluarga pasien.</li>
                                <li>Keluarga dapat dipanggil ke ruang perawatan intensif bila sewaktu-waktu dibutuhkan.</li>
                                <li>Sebelum masuk ruang rawat intensif, keluarga harus mencuci tangan dengan cairan desinfektan yang disediakan disamping pintu masuk (tata cara cuci tangan lihat dipetunjuk yang tertera). </li>
                                <li>Pengunjung harus menjaga ketenangan diruangan rawat.</li>
                                <li>Seluruh keluarga pasien menunggu diruang tunggu yang telah disediakan.</li>
                                <li>Dilarang mengambil, membawa, meminjam atau mengkopi dokumentasi pasien tanpa izin dari pihak rumah sakit.</li>
                                <li>Kebuthan pribadi pasien seperti diapers, lotion, tissue, sikat gigi, pasta gigi dan lain-lain disediakan olehb keluarga pasien.</li>
                            </ol>
                            <h5>TATA TERTIB ADMINISTRASI</h5>
                            <ol>
                                <li>Pasien Masuk</li>
                                <ol type="a">
                                    <li>Pasien Swasta / Umum <br> Seluruh pasien harus menandatangani surat pernyataan sanggup membayar seluruh biaya perawatan diruang intensif</li>
                                    <li>Pasien BPJS / Jamsoskes / Jaminan Perusahaan <br> Keluarga pasien harus mengurus surat jaminan perawatan dalam waktu 3 x 24 jam.</li>
                                 </ol>
                                <li>Pasien yang akan pulang diwajibkan menyelsaikan administrasi terlebih dahulu.</li>
                            </ol>
                            <p>Demikianlah pernyataan ini saya buat dengan penuh kesadarandan tanpa paksaan.</p>
                            <p>Palembang, Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}, Pukul {{ \Carbon\Carbon::now()->format('H:i') }}</p>
                            
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center"></td>
                        <td class="border-0"></td>
                        <td colspan="2" class="text-center">Saksi</td>
                    </tr>
                    <tr>
                        <td style="padding: 30px 50px;">
                            <p>Yang menyatakan</p>
                            <canvas id="declarant-signature" width="220" height="120" style="border:1px solid #000; margin-top: 20px;"></canvas>
                            <button type="button" id="clear-declarant-signature" class="btn btn-sm btn-secondary mt-4 no-print">Hapus Tanda Tangan</button>
                            <input type="hidden" id="declarant-signature-input" name="signature_declarant" value="">
                        </td>
                        <td style="padding: 30px 50px;">
                            <p>Dokter</p>
                            <canvas id="doctor-signature" width="220" height="120" style="border:1px solid #000; margin-top: 20px;"></canvas>
                            <button type="button" id="clear-doctor-signature" class="btn btn-sm btn-secondary mt-4 no-print">Hapus Tanda Tangan</button>
                            <input type="hidden" id="doctor-signature-input" name="signature_doctor" value="">
                        </td>
                        <td class="border-0" style="width: 40px;"></td>
                        <td style="padding: 30px 50px;">
                            <p>Keluarga</p>
                            <canvas id="family-signature" width="220" height="120" style="border:1px solid #000; margin-top: 20px;"></canvas>
                            <button type="button" id="clear-family-signature" class="btn btn-sm btn-secondary mt-4 no-print">Hapus Tanda Tangan</button>
                            <input type="hidden" id="family-signature-input" name="signature_family" value="">
                        </td>
                        <td style="padding: 30px 50px;">
                            <p>Perawat</p>
                            <canvas id="nurse-signature" width="220" height="120" style="border:1px solid #000; margin-top: 20px;"></canvas>
                            <button type="button" id="clear-nurse-signature" class="btn btn-sm btn-secondary mt-4 no-print">Hapus Tanda Tangan</button>
                            <input type="hidden" id="nurse-signature-input" name="signature_nurse" value="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center no-print">
                            <button type="button" id="btn_save_signature" class="btn btn-primary mt-3">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
                        </td>
                    </tr>
                </tbody>
                <tr>
                    <td colspan="2">
                        <div style="display: flex; align-items: center; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
                            {{ $data_pasien['qrcode'] }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        function initSignaturePad(canvasId, inputId, clearButtonId) {
            const canvas = document.getElementById(canvasId);
            const ctx = canvas.getContext('2d');
            let drawing = false;

            canvas.addEventListener('mousedown', (e) => {
                drawing = true;
                ctx.beginPath();
                ctx.moveTo(e.offsetX, e.offsetY);
            });

            canvas.addEventListener('mousemove', (e) => {
                if (drawing) {
                    ctx.lineTo(e.offsetX, e.offsetY);
                    ctx.stroke();
                }
            });

            canvas.addEventListener('mouseup', () => {
                drawing = false;
                document.getElementById(inputId).value = canvas.toDataURL();
            });

            canvas.addEventListener('mouseout', () => {
                drawing = false;
            });

            document.getElementById(clearButtonId).addEventListener('click', () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                document.getElementById(inputId).value = '';
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            initSignaturePad('doctor-signature', 'doctor-signature-input', 'clear-doctor-signature');
            initSignaturePad('nurse-signature', 'nurse-signature-input', 'clear-nurse-signature');
        });
    </script>

</body>
</html>