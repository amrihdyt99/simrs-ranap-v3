<html>
<head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif; 
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            border: 1px solid black;
            padding: 0; 
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .header-table td, .header-table th {
            border: 1px solid black;
            padding: 8px;
        }
        .header-table .title {
            text-align: center;
            font-weight: bold;
        }
        .content {
            margin-left: 15px;
        }
        .checkbox {
            margin-left: 20px;
        }
        .footer {
            padding: 1px; 
        }
        .footer .signature {
            width: 45%;
            display: inline-block;
            text-align: center;
            margin-top: 11px;
        }
        .footer .signature .line {
            margin-top: 1px;
            border-top: 1px solid #000;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .footer .signature .label {
            margin-top: 10px;
        }
        .footer .witness {
            width: 45%;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
        }
        .footer .witness .line {
            margin-top: 1px;
            border-top: 1px solid #000;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .footer .witness .label {
            margin-top: 1px;
        }
        .note {
            background-color: #d3d3d3;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .keterangan {
            text-align: left;
        }
        .footer .date-time {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table width="893" align="center">
             <tr>
                <td><img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="100%" /></td>
            </tr>
    </table>
    <div class="container">
    <table style="width: 100%; margin-bottom: 1rem; border-bottom: 1px solid black; border-collapse: collapse; font-weight: normal;">
        <tr>
            <td style="text-align: center; font-weight: bold; border-bottom: 1px solid black; border-right: 1px solid black;">
                PERSETUJUAN PEMBUKAAN<br>
                INFORMASI MEDIS PASIEN
            </td>
            <td style="font-size: 0.875rem; border-bottom: 1px solid black; margin-left: 10px;">
                <div style="display: flex;">
                    <div style="width: 150px;">No Med.Rec</div>
                    <div>: {{ $data_pasien->no_medrec }}</div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Nama Lengkap</div>
                    <div>: {{ $data_pasien->nama_lengkap }}</div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Tgl Lahir</div>
                    <div>: {{ $data_pasien->tgl_lahir }}</div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Jenis Kelamin</div>
                    <div>: 
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
                    </div>
                </div>
                <div"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div style=" border-top: 1px solid black;"></div>
                <div style="display: flex; justify-content: space-between; ">
                    <div style="display: flex;">
                        <div style="width: 150px;">Ruang</div>
                        <div>: </div>
                        <div style="width: 150px;"></div>
                        <div>Kelas  : {{ $data_pasien->room_class }}</div>
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Tgl Masuk</div>
                    <div>: {{ $data_pasien->reg_tgl }}</div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">DPJP</div>
                    <div>: {{ $data_pasien->reg_dokter }}</div>
                </div>
            </td>
        </tr>
    </table>
    <form method="POST" action="{{ route('register.ranap.persetujuan-medis.store') }}" id="persetujuanMedisForm">
        @csrf
        <input type="hidden" name="reg_no" value="{{ $data_pasien->reg_no }}">
        <div class="content">
                Yang bertanda tangan dibawah ini saya :<br>
                <div style="display: flex;">
                    <div style="width: 150px;">Nama :</div>
                    <div>:</div>
                    <div>
                        @if(isset($data_pasien->surat_persetujuan_medis))
                            <div>{{ $data_pasien->surat_persetujuan_medis->penanggung_jawab ?? '' }}</div>
                        @else
                            <select id="penanggung_jawab" name="penanggung_jawab" onchange="updatePenanggungJawab()">
                                <option value="">Pilih Nama</option>
                                @foreach($data_pasien->penanggung_jawab as $pj)
                                    <option value="{{ $pj->familyname }}">{{ $pj->familyname }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Umur :</div>
                    <div>:</div>
                    <div id="umur_penanggung_jawab">{{ $data_pasien->surat_persetujuan_medis->umur_penanggung_jawab ?? '' }}</div>
                    <input type="hidden" name="umur_penanggung_jawab" id="umur_penanggung_jawab_input">
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Alamat :</div>
                    <div>:</div>
                    <div id="alamat_penanggung_jawab">{{ $data_pasien->surat_persetujuan_medis->alamat_penanggung_jawab ?? '' }}</div>
                    <input type="hidden" name="alamat_penanggung_jawab" id="alamat_penanggung_jawab_input">
                </div>
                <br>
                <div style="display: flex;">
                    <div style="width: 190px;">Hubungan dengan pasien</div>
                    <div>: </div>
                    <div id="hubungan_penanggung_jawab">{{ $data_pasien->surat_persetujuan_medis->hubungan_penanggung_jawab ?? '' }}</div>
                    <input type="hidden" name="hubungan_penanggung_jawab" id="hubungan_penanggung_jawab_input">
                </div>
                Menyatakan Persetujuan Pembukaan Informasi tentang kondisi medis pasien oleh Dokter PenanggungJawab Pelayanan atau Tim Pengelola Pasien RSUD Siti Fatimah Prov. Sumatera Selatan secara tertulis dan/atau tidak tertulis kepada :<br>
                <br>
                <div style="display: flex;">
                    <div style="width: 150px;">Nama </div>
                    <div>: </div>
                    <div>
                        @if(isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->penanggung_jawab_2)
                            <div>{{ $data_pasien->surat_persetujuan_medis->penanggung_jawab_2 ?? '' }}</div>
                        @else
                            <select id="penanggung_jawab_2" name="penanggung_jawab_2" onchange="updatePenanggungJawab2()">
                                <option value="">Pilih Nama</option>
                                @foreach($data_pasien->penanggung_jawab as $pj)
                                    <option value="{{ $pj->familyname }}">{{ $pj->familyname }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Umur </div>
                    <div>: </div>
                    <div id="umur_penanggung_jawab_2">
                        @if(isset($data_pasien->surat_persetujuan_medis))
                            {{ $data_pasien->surat_persetujuan_medis->umur_penanggung_jawab_2 ?? '' }}
                        @endif
                    </div>
                    <input type="hidden" name="umur_penanggung_jawab_2" id="umur_penanggung_jawab_2_input">
                </div>
                <div style="display: flex;">
                    <div style="width: 150px;">Alamat </div>
                    <div>: </div>
                    <div id="alamat_penanggung_jawab_2">
                        @if(isset($data_pasien->surat_persetujuan_medis))
                            {{ $data_pasien->surat_persetujuan_medis->alamat_penanggung_jawab_2 ?? '' }}
                        @endif
                    </div>
                    <input type="hidden" name="alamat_penanggung_jawab_2" id="alamat_penanggung_jawab_2_input">
                </div>
                <br>
                <div style="display: flex;">
                    <div style="width: 190px;">Hubungan dengan pasien</div>
                    <div>: </div>
                    <div id="hubungan_penanggung_jawab_2">
                        @if(isset($data_pasien->surat_persetujuan_medis))
                            {{ $data_pasien->surat_persetujuan_medis->hubungan_penanggung_jawab_2 ?? '' }}
                        @endif
                    </div>
                    <input type="hidden" name="hubungan_penanggung_jawab_2" id="hubungan_penanggung_jawab_2_input">
                </div>
                Informasi kondisi medis tersebut meliputi (beri tanda √) :<br>
                <div class="checkbox">
                    <input type="checkbox" name="kondisi_medis[]" value="diagnosis" 
                        @if(isset($data_pasien->surat_persetujuan_medis) && is_array(json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true)) && in_array('diagnosis', json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true))) checked @endif> Diagnosis<br>
                    <input type="checkbox" name="kondisi_medis[]" value="hasil_pemeriksaan" 
                        @if(isset($data_pasien->surat_persetujuan_medis) && is_array(json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true)) && in_array('hasil_pemeriksaan', json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true))) checked @endif> Hasil pemeriksaan penunjang<br>
                    <input type="checkbox" name="kondisi_medis[]" value="lain_lain" 
                        @if(isset($data_pasien->surat_persetujuan_medis) && is_array(json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true)) && in_array('lain_lain', json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true))) checked @endif> Lain-lain : 
                            <input type="text" name="kondisi_medis_lain_lain" style="width: 80%;" 
                        @if(isset($data_pasien->surat_persetujuan_medis) && is_array(json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true)) && in_array('lain_lain', json_decode($data_pasien->surat_persetujuan_medis->kondisi_medis, true))) value="{{ $data_pasien->surat_persetujuan_medis->kondisi_medis_lain_lain }}" @endif><br>
                </div>
                <br>
                Demikianlah surat Persetujuan Pembukaan Informasi Medis ini saya buat untuk dapat dipergunakan sebagaimana mestinya.<br>
                Palembang, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}
                <div class="footer">
                    <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                        <div class="signatureadmin" style="text-align: center; width: 48%; margin-bottom: 20px;">
                            <div style="margin-top: 20px;">
                                Petugas Pemberi Informasi<br>
                                @if(isset($data_pasien->ttd_user))
                                    <img style="margin-top: 20px;" src="{{ $data_pasien->ttd_user }}" width="150" height="100" /><br>
                                @endif
                                <div style="text-align: left; display: inline-block;">( {{ $data_pasien->nama_user ?? '' }} )</div>
                            </div>
                        </div>
                        <div class="signature" style="text-align: center; width: 48%; margin-bottom: 20px;">
                            Tanda tangan dan nama<br>
                            (wali jika pasien &lt; 18 tahun)<br>
                            <div style="width:150px;height:110px;padding:3px;position:relative; margin: 0 auto; {{ isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->signature1 ? '' : 'border:solid 1px teal;' }}">
                                @if(isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->signature1)
                                    <img src="{{ $data_pasien->surat_persetujuan_medis->signature1 }}" alt="Signature" style="width: 100%; height: 100%;">
                                @else
                                    <canvas id="signature1" width="140px" height="100px">Your browser does not support the HTML canvas tag.</canvas>
                                    <button type="button" id="clear_signature1">Clear</button>
                                @endif
                            </div>
                            <div>( <span id="nama_penanggung_jawab">{{ $data_pasien->surat_persetujuan_medis->penanggung_jawab ?? '' }}</span> )</div>
                        </div>
                        <div class="signature" style="text-align: center; width: 48%; margin-bottom: 20px;">
                            Saksi pertama<br>
                            <div style="width:150px;height:110px;padding:3px;position:relative; margin: 0 auto; {{ isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->witness1 ? '' : 'border:solid 1px teal;' }}">
                                @if(isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->witness1)
                                    <img src="{{ $data_pasien->surat_persetujuan_medis->witness1 }}" alt="Witness 1 Signature" style="width: 100%; height: 100%;">
                                @else
                                    <canvas id="witness1" width="140px" height="100px">Your browser does not support the HTML canvas tag.</canvas>
                                    <button type="button" id="clear_witness1">Clear</button>
                                @endif
                            </div>
                            <div>( <span id="nama_penanggung_jawab_2">{{ $data_pasien->surat_persetujuan_medis->penanggung_jawab_2 ?? '' }}</span><input type="text" id="nama_penanggung_jawab_2_input" style="display: none;"> )</div>
                            Tgl :{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}<br>
                            pukul :{{ \Carbon\Carbon::now()->locale('id')->isoFormat('HH:mm:ss') }}<br>
                        </div>
                        <div class="signature" style="text-align: center; width: 48%; margin-bottom: 20px;">
                            Saksi Kedua<br>
                            <div style="width:150px;height:110px;padding:3px;position:relative; margin: 0 auto; {{ isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->witness2 ? '' : 'border:solid 1px teal;' }}">
                                @if(isset($data_pasien->surat_persetujuan_medis) && $data_pasien->surat_persetujuan_medis->witness2)
                                    <img src="{{ $data_pasien->surat_persetujuan_medis->witness2 }}" alt="Witness 2 Signature" style="width: 100%; height: 100%;">
                                @else
                                    <canvas id="witness2" width="140px" height="100px">Your browser does not support the HTML canvas tag.</canvas>
                                    <button type="button" id="clear_witness2">Clear</button>
                                @endif
                            </div>
                            <div style="text-align: center;">( <input type="text" name="nama_witness2" style="border: none;  width: 150px; text-align: center;" value="{{ $data_pasien->surat_persetujuan_medis->nama_witness2 ?? '' }}"> )</div>
                            Tgl :{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}<br>
                            pukul :{{ \Carbon\Carbon::now()->locale('id')->isoFormat('HH:mm:ss') }}<br>
                        </div>
                    </div>
                </div>
                </div>
                <input type="hidden" name="signature1" id="signature1_data">
                <input type="hidden" name="witness1" id="witness1_data">
                <input type="hidden" name="witness2" id="witness2_data">
                @if(!isset($data_pasien->surat_persetujuan_medis))
                    <button type="button" id="main_save_button" class="btn btn-primary">Simpan</button>
                @endif
           
        </div>
    </form>
    <div class="footer" style="text-align: right;">
        <strong>RM RI 017/Rev.01</strong>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const penanggungJawabData = @json($data_pasien->penanggung_jawab);
            let isSubmitting = false; // Flag to prevent multiple submissions
            
            function updatePenanggungJawab() {
                const selectedName = document.getElementById('penanggung_jawab').value;
                const selectedData = penanggungJawabData.find(pj => pj.familyname === selectedName);

                document.getElementById('umur_penanggung_jawab').innerText = selectedData ? selectedData.umur_pj : '';
                document.getElementById('alamat_penanggung_jawab').innerText = selectedData ? selectedData.keluarga_alamat : '';
                document.getElementById('hubungan_penanggung_jawab').innerText = selectedData ? selectedData.gcrelationShip : '';
                document.getElementById('nama_penanggung_jawab').innerText = selectedData ? selectedData.familyname : '';

                document.getElementById('umur_penanggung_jawab_input').value = selectedData ? selectedData.umur_pj : '';
                document.getElementById('alamat_penanggung_jawab_input').value = selectedData ? selectedData.keluarga_alamat : '';
                document.getElementById('hubungan_penanggung_jawab_input').value = selectedData ? selectedData.gcrelationShip : '';
            }

            function updatePenanggungJawab2() {
                const selectedName2 = document.getElementById('penanggung_jawab_2').value;
                const selectedData2 = penanggungJawabData.find(pj => pj.familyname === selectedName2);

                document.getElementById('umur_penanggung_jawab_2').innerText = selectedData2 ? selectedData2.umur_pj : '';
                document.getElementById('alamat_penanggung_jawab_2').innerText = selectedData2 ? selectedData2.keluarga_alamat : '';
                document.getElementById('hubungan_penanggung_jawab_2').innerText = selectedData2 ? selectedData2.gcrelationShip : '';
                document.getElementById('nama_penanggung_jawab_2').innerText = selectedData2 ? selectedData2.familyname : '';

                document.getElementById('umur_penanggung_jawab_2_input').value = selectedData2 ? selectedData2.umur_pj : '';
                document.getElementById('alamat_penanggung_jawab_2_input').value = selectedData2 ? selectedData2.keluarga_alamat : '';
                document.getElementById('hubungan_penanggung_jawab_2_input').value = selectedData2 ? selectedData2.gcrelationShip : '';
            }

            document.getElementById('penanggung_jawab').addEventListener('change', updatePenanggungJawab);
            document.getElementById('penanggung_jawab_2').addEventListener('change', updatePenanggungJawab2);

            // Signature handling
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
                });

                const mainSaveButton = document.getElementById('main_save_button');
                if (mainSaveButton) {
                    mainSaveButton.addEventListener('click', handleSaveButtonClick);
                }

                function handleSaveButtonClick(e) {
                    e.preventDefault();
                    
                    // Prevent multiple submissions
                    if (isSubmitting) return;
                    isSubmitting = true;

                    // Periksa apakah setidaknya satu checkbox kondisi_medis dicentang
                    var kondisiMedisChecked = document.querySelectorAll('input[name="kondisi_medis[]"]:checked');
                    if (kondisiMedisChecked.length === 0) {
                        alert('Silakan pilih setidaknya satu kondisi medis.');
                        isSubmitting = false; // Reset flag
                        return;
                    }
                    
                    document.getElementById('signature1_data').value = document.getElementById('signature1').toDataURL();
                    document.getElementById('witness1_data').value = document.getElementById('witness1').toDataURL();
                    document.getElementById('witness2_data').value = document.getElementById('witness2').toDataURL();
                    
                    var form = document.getElementById('persetujuanMedisForm');
                    var formData = new FormData(form);
                    
                    fetch('{{ route('register.ranap.persetujuan-medis.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Data persetujuan medis berhasil disimpan.');
                            // Anda bisa menambahkan kode di sini untuk memperbarui tampilan jika diperlukan
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
                        // Reset flag and enable button after process is complete
                        isSubmitting = false;
                    });
                }
            }

            initSignaturePad('signature1', 'signature1_data', 'clear_signature1');
            initSignaturePad('witness1', 'witness1_data', 'clear_witness1');
            initSignaturePad('witness2', 'witness2_data', 'clear_witness2');
        });
    </script></body>
</html>
