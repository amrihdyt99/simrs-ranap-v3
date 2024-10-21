<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            
        }
    </style>
</head>
<body class="p-8">
    @php
        $dataExists = isset($savedData) && $savedData;
    @endphp

    <tr>
        <td><img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="100%" /></td>
    </tr>
    <div class="card-header text-center">
        <h4 class="text-center" style="text-align: center;"><b>PERSETUJUAN PERAWATAN DI INSTALASI RAWAT INTENSIF</b></h4>
    </div>
    <div class="border border-black p-4">
        <p>Saya yang bertanda tangan di bawah ini:</p>
        <div style="display: flex;">
            <div style="width: 150px;">Nama</div>
            <div>:</div>
            <div style="margin-left: 28px;">
                @if(!$dataExists)
                    <select id="penanggung_jawab" name="penanggung_jawab" onchange="updatePenanggungJawab()">
                        <option value="">Pilih Nama</option>
                        @foreach($data_pasien->penanggung_jawab_list as $pj)
                            <option value="{{ $pj }}">{{ $pj }}</option>
                        @endforeach
                    </select>
                @else
                    <span>{{ $savedData->penanggung_jawab }}</span>
                @endif
            </div>
        </div>
        <div style="display: flex;">
            <div style="width: 150px;">Umur</div>
            <div>:</div>
            <div style="width: 150px; margin-left: 28px;" id="umur_penanggung_jawab">
                @if($dataExists)
                    {{ $savedData->umur_penanggung_jawab }}
                @endif
            </div>
        </div>
        <div style="display: flex;">
            <div style="width: 150px;">Jenis Kelamin</div>
            <div>:</div>
            <div style="margin-left: 28px;" id="jenis_kelamin">
                @if($dataExists)
                    {{ $savedData->jenis_kelamin }}
                @endif
            </div>
        </div>
        <div style="display: flex">
            <div style="width: 150px;">Alamat</div>
            <div>:</div>
            <div style="margin-left: 28px;" id="alamat_penanggung_jawab">
                @if($dataExists)
                    {{ $savedData->alamat_penanggung_jawab }}
                @endif
            </div>
        </div>
        <p>Dengan ini menyatakan SETUJU/MENOLAK perawatan di INSTALASI RAWAT INTENSIF</p>
        <p>Terhadap diri saya sendiri/*<span class="ml-2">:</span></p>
        <input type="hidden" name="reg_no" value="{{ $data_pasien->reg_no }}">
        <div style="display: flex;">
            <table class="w-full mt-1 mb-1 border-b border-black">
                <tr>
                    <td style="width: 150px;">Nama</td>
                    <td>:</td>
                    <td>{{ $data_pasien->nama }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Umur</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($data_pasien->tanggal_lahir)->age }} Tahun</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if($data_pasien->jenis_kelamin == '0001^M')
                            Laki-laki
                        @elseif($data_pasien->jenis_kelamin == '0001^F')
                            Perempuan
                        @elseif($data_pasien->jenis_kelamin == '0001^U')
                            Tidak Dapat Ditentukan
                        @elseif($data_pasien->jenis_kelamin == '0001^N')
                            Tidak Mengisi
                        @else
                            Tidak Diketahui
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat</td>
                    <td>:</td>
                    <td>{{ $data_pasien->alamat }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">No. RM</td>
                    <td>:</td>
                    <td>{{ $data_pasien->nomor_rm }}</td>
                </tr>
            </table>
        </div>
        <p>Saya menyatakan mengerti:</p>
        <ol class="list-decimal ml-8">
            <li>Bahwa berdasarkan penjelasan dokter, selama perawatan di Instalasi Rawat Intensif, dinyatakan tindakan apapun yang dilakukan selalu mengandung beberapa konsekuensi dari resiko. Resiko potensial yang terjadi termasuk perubahan tekanan darah, reaksi alergi, henti jantung, kerusakan otak, kelumpuhan, kerusakan saraf bahkan kematian. Saya menyadari hal ini dan resiko setiap komplikasi lain yang mungkin terjadi</li>
            <li>Bahwa dalam praktek ilmu kedokteran, bukan merupakan ilmu pengetahuan yang pasti (exact science) dan saya menyadari tidak seorangpun dapat menjanjikan atau menjamin sesuatu yang berhubungan dengan perawatan di Instalasi Rawat Intensif.</li>
            <li>Bahwa obat-obatan yang digunakan sebelum prosedur di Instalasi Rawat Intensif dapat saja menimbulkan komplikasi. Oleh karena itu *<span class="ml-2">:</span></p> saya gunakan, termasuk aspirin, kontrasepsi, obat-obatan flu, narkotik, marijuana, kokain, dan lain-lain.</li>
            <li>Bahwa selama perawatan di Instalasi Rawat Intensif, dapat dilakukan tindakan-tindakan medis sesuai kondisi pasien berdasarkan pertimbangan medis termasuk intubasi, pemakaian ventilator, kateter vena sentral, arteri line serta transfusi darah dan atau produk-produk darah.</li>
            <li>Bahwa Dokter di Instalasi Rawat Intensif yang bertugas dapat melakukan konsultasi atau mendapat bantuan dari dokter lain yang berkaitan jika dirasakan perlu.</li>
            <li>Bahwa selama perawatan di Instalasi Rawat Intensif keluarga harus mematuhi tata tertib perawatan dan administrasi sebagai berikut:</li>
        </ol>
        <p class="font-bold mt-4">TATA TERTIB PERAWATAN</p>
        <ol class="list-decimal ml-8">
            <li>Keluarga pasien tidak boleh menunggu pasien didalam ruang perawatan. Jam kunjungan pukul 11.30 - 11.30 dan pukul 16.30 - 17.30 , waktu kunjungan +10 menit, bagi yang berkunjung hanya diperbolehkan 1 (satu) orang dan memiliki kartu jaga. Untuk ruang NICU hanya diperbolehkan orang tua bayi.</li>
            <li>Petugas berhak melarang pasien untuk berkunjung bila kondisi pasien tidak memungkinkan atau permintaan pasien/keluarga pasien.</li>
            <li>Keluarga dapat dipanggil ke ruang perawatan intensif bila sewaktu-waktu dibutuhkan.</li>
            <li>Sebelum masuk ruang rawat intensif, keluarga harus mencuci tangan dengan cairan desinfektan yang disediakan disamping pintu masuk (tata cara cuci tangan lihat dipetunjuk yang tertera).</li>
            <li>Pengunjung harus menjaga ketenangan diruangan rawat.</li>
            <li>Seluruh keluarga pasien menunggu diruang tunggu yang telah disediakan.</li>
            <li>Dilarang mengambil, membawa, meminjam atau mengkopi dokumentasi pasien tanpa ijin dari pihak rumah sakit.</li>
            <li>Kebutuhan pribadi pasien seperti diapers, lotion, tissue, sikat gigi, pasta gigi dan lain-lain disediakan oleh keluarga pasien.</li>
        </ol>
        <p class="font-bold mt-4">TATA TERTIB ADMINISTRASI</p>
        <ol class="list-decimal ml-8">
            <li>Pasien Masuk
                <ol class="list-alpha ml-8">
                    <li>Pasien Swasta / Umum
                        <p>Seluruh pasien harus menandatangani surat pernyataan sanggup membayar seluruh biaya perawatan diruang intensif</p>
                    </li>
                    <li>Pasien BPJS / Jamsoskes / Jaminan Perusahaan
                        <p>Keluarga pasien harus mengurus surat jaminan perawatan dalam waktu 3 x 24 jam.</p>
                    </li>
                </ol>
            </li>
            <li>Pasien yang akan pulang diwajibkan menyelesaikan administrasi terlebih dahulu.</li>
        </ol>
        <p>Demikianlah pernyataan ini saya buat dengan penuh kesadaran tanpa paksaan.</p>
        <p>Palembang, Tanggal {{ \Carbon\Carbon::now()->format('d F Y') }}, Pukul {{ \Carbon\Carbon::now()->format('H:i') }}</p>
        <div class="flex justify-between mt-8">
            <div class="text-center">
                <p>Yang Menyatakan</p>
                @if(!$dataExists)
                    <div style="display: flex; justify-content: center;">
                        <canvas id="keluarga-signature" width="170" height="100" style="border:1px solid #000;"></canvas>
                    </div>
                    <button id="clear-keluarga-signature">Hapus</button>
                    <input type="hidden" id="keluarga-signature-input" name="keluarga_signature">
                @else
                    <img src="{{ $savedData->keluarga_signature }}" width="170" height="100" alt="Tanda tangan keluarga">
                @endif
                <p id="penanggung_jawab_display">
                    @if($dataExists)
                        {{ $savedData->penanggung_jawab }}
                    @else
                        (................................)
                    @endif
                </p>
            </div>
            <div class="text-center">
                <p>Dokter</p>
                @if(isset($data_pasien->dokter_signature))
                    <div style="display: flex; justify-content: center; margin-left: 20px;">
                        <img src="{{ $data_pasien->dokter_signature }}" width="170" height="100" alt="Tanda tangan dokter">
                    </div>
                    <p>{{ $data_pasien->dokter_name ?? '(................................)' }}</p>
                @else
                    <p>(................................)</p>
                @endif
            </div>
            <div class="text-center">
                <p>Keluarga</p>
                @if(!$dataExists)
                    <div style="display: flex; justify-content: center;">
                        <canvas id="keluarga-signature-2" width="170" height="100" style="border:1px solid #000;"></canvas>
                    </div>
                    <button class="btn btn-outline-danger" id="clear-keluarga-signature-2">Hapus</button>
                    <input type="hidden" id="keluarga-signature-input-2" name="keluarga_signature_2">
                    <p><input type="text" name="penanggung_jawab_2" id="penanggung_jawab_2" class="form-control" placeholder="Nama Keluarga"></p>
                @else
                    <img src="{{ $savedData->keluarga_signature_2 }}" width="170" height="100" alt="Tanda tangan keluarga 2">
                    <p>{{ $savedData->penanggung_jawab_2 }}</p>
                @endif
            </div>
            <div class="text-center">
                <p>Perawat</p>
                @if(isset($data_pasien->perawat_signature))
                    <img src="{{ $data_pasien->perawat_signature }}" width="170" height="100" alt="Tanda tangan perawat">
                    <p>{{ $data_pasien->perawat_name ?? '(................................)' }}</p>
                @else
                    <p>(................................)</p>
                @endif
            </div>
        </div>
    </div>
                <tr>
                    <td colspan="2">
                        <div style="display: flex; align-items: center; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
                            {!! $data_pasien->qrcode !!}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    @if(!$dataExists)
        <form id="signature-form" method="POST" action="{{ route('register.ranap.rawat-intensif.store') }}">
            @csrf
            <input type="hidden" name="reg_no" value="{{ $data_pasien->reg_no }}">
            <input type="hidden" name="penanggung_jawab" id="penanggung_jawab_hidden">
            <input type="hidden" name="umur_penanggung_jawab" id="umur_penanggung_jawab_hidden">
            <input type="hidden" name="jenis_kelamin" id="jenis_kelamin_hidden">
            <input type="hidden" name="alamat_penanggung_jawab" id="alamat_penanggung_jawab_hidden">
            <input type="hidden" name="keluarga_signature" id="keluarga-signature-input">
            <input type="hidden" name="keluarga_signature_2" id="keluarga-signature-input-2">
            <input type="hidden" name="penanggung_jawab_2" id="penanggung_jawab_2_hidden">
            <button type="submit" id="main_save_button">Submit</button>
        </form>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(!$dataExists)
                const penanggungJawabData = @json($data_pasien->penanggung_jawab);
                let isSubmitting = false;

                function updatePenanggungJawab() {
                    const selectedName = document.getElementById('penanggung_jawab').value;
                    const selectedData = penanggungJawabData.find(pj => pj.familyname === selectedName);

                    document.getElementById('umur_penanggung_jawab').innerText = selectedData ? selectedData.umur_pj : '';
                    document.getElementById('jenis_kelamin').innerText = selectedData ? selectedData.jenis_kelamin : '';
                    document.getElementById('alamat_penanggung_jawab').innerText = selectedData ? selectedData.keluarga_alamat : '';

                    document.getElementById('penanggung_jawab_hidden').value = selectedName;
                    document.getElementById('umur_penanggung_jawab_hidden').value = selectedData ? selectedData.umur_pj : '';
                    document.getElementById('jenis_kelamin_hidden').value = selectedData ? selectedData.jenis_kelamin : '';
                    document.getElementById('alamat_penanggung_jawab_hidden').value = selectedData ? selectedData.keluarga_alamat : '';
                }

                document.getElementById('penanggung_jawab').addEventListener('change', updatePenanggungJawab);

                function initSignaturePad(canvasId, hiddenInputId, clearButtonId) {
                    const canvas = document.getElementById(canvasId);
                    const ctx = canvas.getContext('2d');
                    let drawing = false;

                    canvas.addEventListener('mousedown', (event) => {
                        drawing = true;
                        ctx.beginPath();
                        ctx.moveTo(event.offsetX, event.offsetY);
                    });

                    canvas.addEventListener('mouseup', () => drawing = false);
                    canvas.addEventListener('mouseout', () => drawing = false);

                    canvas.addEventListener('mousemove', (event) => {
                        if (!drawing) return;
                        ctx.lineTo(event.offsetX, event.offsetY);
                        ctx.stroke();
                    });

                    document.getElementById(clearButtonId).addEventListener('click', () => {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        document.getElementById(hiddenInputId).value = '';
                    });

                    // Ensure the signature is saved to the hidden input
                    document.getElementById('main_save_button').addEventListener('click', () => {
                        document.getElementById(hiddenInputId).value = canvas.toDataURL();
                    });
                }

                initSignaturePad('keluarga-signature', 'keluarga-signature-input', 'clear-keluarga-signature');
                initSignaturePad('keluarga-signature-2', 'keluarga-signature-input-2', 'clear-keluarga-signature-2');

                const mainSaveButton = document.getElementById('main_save_button');
                if (mainSaveButton) {
                    mainSaveButton.addEventListener('click', function(e) {
                        e.preventDefault();

                        if (isSubmitting) return;
                        isSubmitting = true;

                        const form = document.getElementById('signature-form');
                        const formData = new FormData(form);

                        // Ensure the second signature and name are included in the form data
                        formData.append('keluarga_signature', document.getElementById('keluarga-signature-input').value);
                        formData.append('keluarga_signature_2', document.getElementById('keluarga-signature-input-2').value);
                        formData.append('penanggung_jawab_2', document.getElementById('penanggung_jawab_2').value);

                        fetch('{{ route('register.ranap.rawat-intensif.store') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                // Redirect to the provided URL
                                window.location.href = data.redirect;
                            } else {
                                let errorMessage = 'Terjadi kesalahan:';
                                for (let key in data.message) {
                                    errorMessage += '\n- ' + data.message[key];
                                }
                                alert(errorMessage);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Terjadi kesalahan saat menyimpan data.');
                        })
                        .finally(() => {
                            isSubmitting = false;
                        });
                    });
                }
            @endif
        });
    </script>

    @if($dataExists)
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Populate form fields with saved data
            document.getElementById('penanggung_jawab_display').innerText = '{{ $savedData->penanggung_jawab }}';
            document.getElementById('umur_penanggung_jawab').innerText = '{{ $savedData->umur_penanggung_jawab }}';
            document.getElementById('jenis_kelamin').innerText = '{{ $savedData->jenis_kelamin }}';
            document.getElementById('alamat_penanggung_jawab').innerText = '{{ $savedData->alamat_penanggung_jawab }}';
        });
        </script>
    @endif

</body>
</html>