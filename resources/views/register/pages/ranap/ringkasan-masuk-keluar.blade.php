
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ringkasan Masuk dan Keluar Pasien</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <style>
        .container {
            /* width: 100%; */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: start;
            padding: 10px;
        }
        .wrapaper-content {
            /* min-width: 1024px; */
        }
        .font-inter {
            font-family: "Inter", system-ui;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
        .gap {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 2px 5px;
        }
        .flex {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }
        .flex-col {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .heading-content {
            border: 1px solid #000; 
            margin-bottom: 5px; 
            padding:0px 5px;
        }
        .italic {
            font-style: italic;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper-content font-inter">
            <img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="100%" />
            <hr/>
            <h2 style="text-align: center;">RINGKASAN MASUK DAN KELUAR</h2>
            <div class="gap"></div>
            <div class="flex heading-content">
                <h4>1. Identitas Pasien</h4>
                <h4>No. Rekam Medik: {{ $patient->MedicalNo ?? '-' }}</h4>
            </div>
            <table>
                <tr>
                    <td style="min-width:200px;">Nama Pasien</td>
                    <td style="width: 100%;">{{ $patient->PatientName ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $patient->DateOfBirth ? \Carbon\Carbon::parse($patient->DateOfBirth)->format('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td rowspan="4">Alamat Lengkap</td>
                    <td>Jalan : - </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex">
                            <div>Lorong : - </div>
                            <div class="flex">
                                <div>RT : - </div>
                                <div>RW : - </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex">
                            <div>Kelurahan/Desa : - </div>
                            <div class="flex">
                                <div>Kecamatan : - </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex">
                            <div>Kabuptaen/Kota : - </div>
                            <div class="flex">
                                <div>Provinsi : - </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="flex">
                            <span>No. Induk Kependudukan : {{ $patient->SSN ?? '-' }}</span>
                            <span>No. Telp/HP : {{ $patient->MobilePhoneNo1 ?? '-' }}</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $patient_education ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $patient_occupation ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Status Pernikahan</td>
                    <td>{{ $patient_marital_status->id ?? '-' }}</td>
                </tr>
            </table>

            <div class="gap"></div>
            <div class="heading-content">
                <h4>2. Identitas Penanggung Jawab</h4>
            </div>
            <table>
                <tr>
                    <td>
                        <div class="flex-col">
                            <span>Nama Penanggung Jawab : - </span>
                            <span>Hubungan dengan Pasien : - </span>
                            <span>No. Induk Kependudukan (NIK) : -</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-col">
                            <span>Alamat Lengkap : - </span>
                            <span>No.Telp/HP: - </span>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="gap"></div>
            <div class="heading-content">
                <div class="flex">
                    <h4>3. Masuk Rawat yang ke: {{ $count_visit ?? '-' }}</h4>
                    <h4>4. Cara Masuk Melalui : {{ $origin_care_service ?? '-' }}</h4>
                </div>
            </div>

            <div class="gap"></div>
            <div class="heading-content">
                <div class="flex">
                    <div class="flex-col">
                        <h4>5. Rujukan Dari : </h4>
                        <p>{{ $registration->asal_rujukan ?? '-' }}</p>
                    </div>
                    <div style="border-left:1px solid #000;"></div>
                    <h4>6. Cara Bayar : {{ $payment->BusinessPartnerName ?? '-' }}</h4>
                </div>
            </div>

            <div class="gap"></div>
            <div class="heading-content">
                <h4>7. Kasus Polisi/Hukum : 
                    @if ($registration->kasus_polisi == 1)
                        <span>Ya</span>
                    @elseif($registration->kasus_polisi == 0)
                        <span>Tidak</span>
                    @else
                        <span>-</span>
                    @endif
                </h4>
            </div>

            <div class="gap"></div>
            <div class="heading-content">
                <div class="flex">
                    <div class="flex-col" style="width: 100%;">
                        <h4>8. Diagonosa Pengirim (<span class="italic">Diisi oleh dokter</span>)</h4>
                    </div>
                    <div style="border-left:1px solid #000;"></div>
                    <div class="flex-col" style="width: 100%;">
                        <h4>9. Masuk Keluar Rawat Inap</h4>
                        <table style="margin-bottom: 5px;">
                            <tr>
                                <td colspan="2">Ruangan/Kelas : {{ $room->RoomName ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Tgl Masuk / Jam : </td>
                                <td>Tgl Keluar / Jam : </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="gap"></div>
            <table style="margin-bottom: 10px;">
                <tr>
                    <td colspan="3">
                        <h4>10. Diagonosa & Tindakan (<span class="italic">Diisi oleh dokter</span>)</h4>
                    </td>
                    <td>
                        <h4>11. Kode ICD-10 / ICD-9 (<span class="italic">Diisi oleh dokter</span>)</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Diagnosa Utama : </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;">Diagnosa Skunder:</td>
                    <td>1</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>2</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>3</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;">Penyebab Kematian :</td>
                    <td>1</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>2</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>3</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;">Tindakan/Prosedur :</td>
                    <td>1</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>2</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:40px;"></td>
                    <td>3</td>
                    <td style="min-width: 100px;"></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>