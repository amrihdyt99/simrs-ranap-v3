<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Resume Pasien Pulang</title>

    <script type="text/javascript" src="{{ asset('new_assets/signature/signature.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    
    <style>
        body {
            padding: 15px;
        }
        #signature-pad, #signature-pad-pasien {
            border: 1px solid #000;
            width: 100%;
            height: 200px;
        }

        #note {
            position: absolute;
            left: 50%;
            top: 35px;
            padding: 0px;
            margin: 0px;
            cursor: default;
            transform: translateX(-50%);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .align-middle {
            vertical-align: middle;
        }
        
    </style>
    
</head>
<body>
    <tr>
        <td><img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="200" /></td>
    </tr>
    <table>
        <tbody>
            <tr>
                <td rowspan="9" class="text-center align-middle fs-6">RESUME PASIEN PULANG</td>
            </tr>
            <tr>
                <td>No Medrec</td>
                <td>: {{ $data->reg_medrec }}</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{ $data->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <!-- <td>: {{ $data->tanggal_lahir }}</td> -->
                <td>:{{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->formatter_dan_kalkulasi_umur( $data->tanggal_lahir) }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <!-- <td>: {{ $data->jenis_kelamin }}</td>->jenis_kelamin_sphaira -->
                <td>:{{ app(App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira( $data->jenis_kelamin)}}</td>
            </tr>
            <tr>
                <td colspan="2">(Mohon diisi atau tempelkan stiker jika ada)</td>
            </tr>
            <tr>
                <td>Ruang rawat</td>
                <td>: {{ $data->ruang_rawat }}</td>
            </tr>
            <tr>
                <td>Tgl Masuk Rawat Inap</td>
                <td>: {{ $data->tgl_masuk_rawat_inap }}</td>
            </tr>
            <tr>
                <td>Tgl Assesment</td>
                <!-- <td>: {{ now()->format('Y-m-d') }}</td> -->
                <td>: {{ isset($data->created_at) ? \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') : 'N/A' }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">RINGKASAN PERAWATAN PASIEN <br> (Tulislah dengan huruf cetak)</td>
            </tr>
            <tr>
                <td>Alergi :</td>
                <td><input type="checkbox" value="tidak" {{ isset($data->riwayat_alergi) && $data->riwayat_alergi === 'Tidak' ? 'checked' : '' }}> TIDAK</td>
                <td><input type="checkbox" value="ya" {{ isset($data->riwayat_alergi) && $data->riwayat_alergi === 'Ya' ? 'checked' : '' }}> YA, SEBUTKAN : {{ isset($data->riwayat_alergi_lain) ? $data->riwayat_alergi_lain : '' }}</td>
            </tr>
            <tr>
                <td colspan="3">ANAMNESIS</td>
            </tr>
            <tr>
                <td colspan="3">- KELUHAN UTAMA : {{ isset($data->keluhan_utama) ? $data->keluhan_utama : 'N/A' }}</td>
            </tr>
            <tr>
                <td colspan="3">- RIWAYAT PERJALANAN PENYAKIT : {{ isset($data->riwayat_penyakit) ? $data->riwayat_penyakit : 'N/A' }}</td>
            </tr>
            <tr>
                <td colspan="3">PEMERIKSAAN FISIK: {{ isset($data->pemeriksaan_fisik) ? $data->pemeriksaan_fisik : 'N/A' }}</td>
            </tr>
            <tr>
                <td colspan="3">TEMUAN KLINIK HASIL PEMERIKSAAN PENUNJANG:</td>
            </tr>
            <tr>
                <td>- Pemeriksaan Laboratorium yang mendukung diagnosis</td>
                <td colspan="2">: {{ isset($data->pemeriksaan_lab) ? $data->pemeriksaan_lab : 'N/A' }}</td>
            </tr>
            <tr>
                <td colspan="3">{{ isset($data->temuan_klinik) ? $data->temuan_klinik : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Pemeriksaan Radiologi</td>
                <td>
                    <input type="checkbox" name="pemeriksaan_radiologi" value="Ya" {{ isset($data->pemeriksaan_radiologi) && $data->pemeriksaan_radiologi === 'Ya' ? 'checked' : '' }}> YA, SEBUTKAN : {{ isset($data->radiologi_keterangan) ? $data->radiologi_keterangan : '' }}
                </td>
                <td>
                    <input type="checkbox" name="pemeriksaan_radiologi" value="Tidak" {{ isset($data->pemeriksaan_radiologi) && $data->pemeriksaan_radiologi === 'Tidak' ? 'checked' : '' }}> TIDAK
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan PA</td>
                <td>
                    <input type="checkbox" name="pemeriksaan_pa" value="Ya" {{ isset($data->pemeriksaan_pa) && $data->pemeriksaan_pa === 'Ya' ? 'checked' : '' }}> YA, SEBUTKAN (termasuk nomor PA) : {{ isset($data->pa_keterangan) ? $data->pa_keterangan : '' }}
                </td>
                <td>
                    <input type="checkbox" name="pemeriksaan_pa" value="Tidak" {{ isset($data->pemeriksaan_pa) && $data->pemeriksaan_pa === 'Tidak' ? 'checked' : '' }}> TIDAK
                </td>
            </tr>
            <tr>
                <td>Terpasang Implant</td>
                <td>
                    <input type="checkbox" name="terpasang_implant" value="Ya" {{ isset($data->terpasang_implant) && $data->terpasang_implant === 'Ya' ? 'checked' : '' }}> YA, SEBUTKAN jenis dan nomor registrasi: {{ isset($data->implant_keterangan) ? $data->implant_keterangan : '' }}
                </td>
                <td>
                    <input type="checkbox" name="terpasang_implant" value="Tidak" {{ isset($data->terpasang_implant) && $data->terpasang_implant === 'Tidak' ? 'checked' : '' }}> TIDAK
                </td>
            </tr>
            <tr>
                <td colspan="3">- Lain-lain (USG, ECG, Echocardiografi, EEG, Bronchoscopy, Endoscopy, dan lain-lain), sebutkan jika ada: {{ isset($data->lain_lain) ? $data->lain_lain : '' }}</td>
            </tr>
            <tr>
                <td>Pemeriksaan Penunjang yang Tertunda</td>
                <td>
                    <input type="checkbox" name="pemeriksaan_penunjang" value="Tidak" {{ isset($data->pemeriksaan_penunjang_yang_tertunda) && $data->pemeriksaan_penunjang_yang_tertunda === 'Tidak' ? 'checked' : '' }}> TIDAK ADA
                </td>
                <td>
                    <input type="checkbox" name="pemeriksaan_penunjang" value="Ada" {{ isset($data->pemeriksaan_penunjang_yang_tertunda) && $data->pemeriksaan_penunjang_yang_tertunda === 'Ada' ? 'checked' : '' }}> ADA, SEBUTKAN : {{ isset($data->penunjang_keterangan) ? $data->penunjang_keterangan : '' }}
                </td>
            </tr>
            <tr>
                <td>Alasan penundaan : {{ isset($data->alasan_penundaan) ? $data->alasan_penundaan : 'N/A' }}</td>
                <td>Tanggal Pengambilan : {{ isset($data->tanggal_pengembalian) ? $data->tanggal_pengembalian : 'N/A' }}</td>
                <td>di {{ isset($data->lokasi_pengembalian) ? $data->lokasi_pengembalian : 'N/A' }}</td>
            </tr>
            <tr>
                <td>INDIKASI RAWAT</td>
                <td colspan="2">{{ isset($data->indikasi_rawat) ? $data->indikasi_rawat : 'N/A' }}</td>
            </tr>
            <tr>
                <td>DIAGNOSIS MASUK</td>
                <td colspan="2">{{ isset($data->diagnosis_masuk) ? $data->diagnosis_masuk : 'N/A' }}</td>
            </tr>
            <tr id="diagnosis-utama">
    <td colspan="2">DIAGNOSIS UTAMA (Hanya ada Satu Diagnosis Utama) : {{ isset($data->diagnosis_utama->NM_ICD10) ? $data->diagnosis_utama->NM_ICD10 : 'N/A' }}</td>
    <td>KODE ICD-10: {{ isset($data->diagnosis_utama->ID_ICD10) ? $data->diagnosis_utama->ID_ICD10 : 'N/A' }}</td>
</tr>
        </tbody>
    </table>

    <table>
    <tbody>
        <tr>
            <th rowspan="2" class="align-middle text-center">No</th>
            <th rowspan="2" class="align-middle">DIAGNOSIS SEKUNDER <br>(Diagnosis Patologi Anatomi dicantumkan bila ada dan dituliskan kode morfologinya)</th>
            <th colspan="2" class="text-center">PENEGAK DIAGNOSA</th>
            <th rowspan="2" class="align-middle">Kode ICD-10</th>
        </tr>
        <tr>
            <td>DPJP UTAMA (dicontang jika ya)</td>
            <td>NAMA DPJP TAMBAHAN / YANG DIKONSUL</td>
        </tr>
        @php $sekunderIndex = 1; @endphp
        @foreach($data->diagnosis_sekunder as $diagnosis)
        <tr>
            <td>{{ $sekunderIndex++ }}</td>
            <td>{{ $diagnosis->NM_ICD10 }}</td>
            <td>{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($data->dokter_id) }}</td>
            <td></td>
            <td>{{ $diagnosis->ID_ICD10 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <tbody>
        <tr>
            <th rowspan="2" class="align-middle text-center">No</th>
            <th rowspan="2" class="align-middle">DIAGNOSIS KLAUSA</th>
            <th colspan="2" class="text-center">PENEGAK DIAGNOSA</th>
            <th rowspan="2" class="align-middle">Kode ICD-10</th>
        </tr>
        <tr>
            <td>DPJP UTAMA (dicontang jika ya)</td>
            <td>NAMA DPJP TAMBAHAN / YANG DIKONSUL</td>
        </tr>
        @php $klausaIndex = 1; @endphp
        @foreach($data->diagnosis_klausa as $diagnosis)
        <tr>
            <td>{{ $klausaIndex++ }}</td>
            <td>{{ $diagnosis->NM_ICD10 }}</td>
            <td>{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($data->dokter_id) }}</td>
            <td></td>
            <td>{{ $diagnosis->ID_ICD10 }}</td>
        </tr>
        @endforeach
    </tbody>

    <table>
        
    <tbody>
        <tr>
            <th rowspan="2" class="align-middle text-center">No</th>
            <th rowspan="2" class="align-middle">DIAGNOSIS ICD-O</th>
            <th colspan="2" class="text-center">PENEGAK DIAGNOSA</th>
            <th rowspan="2" class="align-middle">Kode ICD-O</th>
        </tr>
        <tr>
            <td>DPJP UTAMA (dicontang jika ya)</td>
            <td>NAMA DPJP TAMBAHAN / YANG DIKONSUL</td>
        </tr>
        @php 
            $icdOIndex = 1;
            $diagnosisIcdo = isset($data->diagnosa) ? collect(json_decode($data->diagnosa))->where('pdiag_kategori', 'icdo') : collect();
        @endphp
        @if($diagnosisIcdo->isNotEmpty())
            @foreach($diagnosisIcdo as $diagnosis)
            <tr>
                <td>{{ $icdOIndex++ }}</td>
                <td>{{ $diagnosis->NM_ICD10 }}</td>
                <td>{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($data->dokter_id) }}</td>
                <td></td>
                <td>{{ $diagnosis->ID_ICD10 }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No Diagnosis ICD-O Available</td>
            </tr>
        @endif
    </tbody>

    <table>
    <tbody>
        <tr>
            <th class="align-middle text-center">No</th>
            <th class="align-middle">Tindakan</th>
            <th class="align-middle">ICD-9</th>
        </tr>
        @php 
            $prosedurIndex = 1; 
            $prosedur = collect(json_decode($data->prosedur)); // Ensure $prosedur is defined
        @endphp
        @if($prosedur->isNotEmpty())
            @foreach($prosedur as $item)
            <tr>
                <td>{{ $prosedurIndex++ }}</td>
                <td>{{ $item->NM_TINDAKAN }}</td>
                <td>{{ $item->ID_TIND }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center">No Tindakan Available</td>
            </tr>
        @endif
    </tbody>
</table>
</table>
</table>
    <table>
        <tbody>
            <tr>
                <th class="align-middle text-center">No</th>
                <th class="align-middle">TERAPI YANG SUDAH DIBERIKAN</th>
            </tr>
            @if (isset($data->terapi) && $data->terapi)
                @foreach ($data->terapi as $item_terapi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item_terapi->nama}} {{$item_terapi->dosis}} {{$item_terapi->hari}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- <!-- <table>
        <tbody>
            <tr>
                <th class="align-middle text-center">No</th>
                <th class="align-middle">TERAPI YANG SUDAH DIBERIKAN</th>
                <th class="align-middle">TERAPI YANG SUDAH DIBERIKAN</th>
            </tr>
            @php $terapiIndex = 1; @endphp
            @foreach(json_decode($data->terapi) as $terapi)
            <tr>
                <td>{{ $terapiIndex++ }}</td>
                <td>{{ $terapi->terapi }}</td>
                <td>____________________</td>
            </tr>
            @endforeach
        </tbody>
    </table> --> --}}

    <table>
        <tbody>
            <tr>
                <th class="align-middle text-center">No</th>
                <th class="align-middle">NAMA TINDAKAN / OPERASI</th>
                <th class="align-middle">Tanggal Tindakan / Operasi</th>
                <th class="align-middle">KODE ICD-9-CM</th>
            </tr>
            @php 
            $tindakanIndex = 1; 
            @endphp
            @if($data->tindakan && $data->tindakan->isNotEmpty())
                @foreach($data->tindakan as $item)
                <tr>
                    <td style="font-size: smaller;">{{ $tindakanIndex++ }}</td>
                    <td>{{ explode(' -- ', $item->nama_tindakan_icd9)[1] ?? 'N/A' }}</td>
                    <td>{{ $item->tanggal_tindakan }}</td>
                    <td>{{ $item->kode_icd9 }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No Tindakan Available</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td>PENYEBAB LUAR / CIDERA / KECELAKAAN (BILA ADA)</td>
                <td>KODE ICD-10</td>
            </tr>
            @if($data->penyebab_luar && $data->penyebab_luar_icd)
                @foreach($data->penyebab_luar as $index => $penyebab)
                    @foreach(json_decode($penyebab) as $penyebabItem)
                    <tr>
                        <td>{{ $penyebabItem }}</td>
                        <td>{{ json_decode($data->penyebab_luar_icd[$index])[$loop->index] }}</td>
                    </tr>
                    @endforeach
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No Data Available</td>
                </tr>
            @endif
        </tbody>
    </table>

        <table>
            <thead>
                <tr>
                    <th colspan="2">ALASAN PULANG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" name="alasan_pulang[]" value="Sembuh" {{ isset($data->alasan_pulang) && is_array(json_decode($data->alasan_pulang)) && in_array('Sembuh', json_decode($data->alasan_pulang)) ? 'checked' : '' }}> SEMBUH
                    </td>
                    <td>
                        <input type="checkbox" name="alasan_pulang[]" value="Dapat berobat jalan" {{ isset($data->alasan_pulang) && is_array(json_decode($data->alasan_pulang)) && in_array('Dapat berobat jalan', json_decode($data->alasan_pulang)) ? 'checked' : '' }}> DAPAT BEROBAT JALAN
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="alasan_pulang[]" value="Pulang atas permintaan sendiri" {{ isset($data->alasan_pulang) && is_array(json_decode($data->alasan_pulang)) && in_array('Pulang atas permintaan sendiri', json_decode($data->alasan_pulang)) ? 'checked' : '' }}> PULANG ATAS PERMINTAAN SENDIRI
                    </td>
                    <td>
                        <input type="checkbox" name="alasan_pulang[]" value="Pindah ke RS lain" {{ isset($data->alasan_pulang) && is_array(json_decode($data->alasan_pulang)) && in_array('Pindah ke RS lain', json_decode($data->alasan_pulang)) ? 'checked' : '' }}> PINDAH KE RS LAIN {{ isset($data->rs_lain_ke) ? $data->rs_lain_ke : '' }}, ALASAN: {{ isset($data->rs_lain_alasan) ? $data->rs_lain_alasan : '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="alasan_pulang[]" value="Meninggal" {{ isset($data->alasan_pulang) && is_array(json_decode($data->alasan_pulang)) && in_array('Meninggal', json_decode($data->alasan_pulang)) ? 'checked' : '' }}> MENINGGAL
                    </td>
                </tr>
            </tbody>
        </table>

    <table>
        <tbody>
            <tr>
                <td rowspan="3" style="width: 30%;">KONDISI PASIEN PULANG <br>(tidak diisi bila pasien meninggal)</td>
                <td style="width: 10%;">KONDISI :</td>
                <td style="width: 10%;">
                    <input type="checkbox" name="kondisi_pulang[]" value="Mandiri" {{ isset($data->kondisi_pulang) && is_array(json_decode($data->kondisi_pulang)) && in_array('Mandiri', json_decode($data->kondisi_pulang)) ? 'checked' : '' }}> MANDIRI
                </td>
                <td style="width: 10%;">
                    <input type="checkbox" name="kondisi_pulang[]" value="Cacat" {{ isset($data->kondisi_pulang) && is_array(json_decode($data->kondisi_pulang)) && in_array('Cacat', json_decode($data->kondisi_pulang)) ? 'checked' : '' }}> CACAT
                </td>
                <td style="width: 10%;">TD :</td>
                <td style="width: 10%;">HR :</td>
                <td style="width: 10%;">RR :</td>
                <td style="width: 10%;">T :</td>
            </tr>
            <tr>
                <td colspan="3"> 
                    <input type="checkbox" name="kondisi_pulang[]" value="Tidak Mandiri" {{ isset($data->kondisi_pulang) && is_array(json_decode($data->kondisi_pulang)) && in_array('Tidak Mandiri', json_decode($data->kondisi_pulang)) ? 'checked' : '' }}> Tidak Mandiri, karena memakai alat bantu : Infus / OGT / NGT / WSD / Spalk / lain-lain : {{ isset($data->alat_bantu_sebutkan) ? $data->alat_bantu_sebutkan : '' }} (sebutkan)
                </td>
                <td>{{ isset($data->td) ? $data->td : '' }}</td>
                <td>{{ isset($data->hr) ? $data->hr : '' }}</td>
                <td>{{ isset($data->rr) ? $data->rr : '' }}</td>
                <td>{{ isset($data->t) ? $data->t : '' }}</td>
            </tr>
            <tr>
                <!-- <td colspan="7">/ Spalk / lain-lain : ....................................................(sebutkan)</td> -->
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>OBAT YANG DIBAWA PULANG (tidak diisi bila pasien meninggal)</th>
                <th>Jumlah</th>
                <th>Aturan Pakai / Minum</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($data->terapi) && $data->terapi)
                @foreach (json_decode($data->terapi) as $item_terapi)
                    <tr>
                        <td>{{$loop->iteration}}. {{$item_terapi->nama}}</td>
                        <td>{{$item_terapi->dosis}} {{$item_terapi->satuan}}</td>
                        <td>{{$item_terapi->dosis}}; {{$item_terapi->hari}} setiap {{$item_terapi->spesial_instruksi}} sekali</td>
                        <td>selama {{$item_terapi->durasi_hari}} hari</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data obat</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="4" style="text-align: center;">PERAWATAN SELANJUTNYA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 25%;">□ Kontrol di RSUD Siti Fatimah Prov. Sumsel</td>
                <td style="width: 25%;">□ Rujukan RS lain<br><br>Tanggal : {{ isset($data->tanggal_rs_lain) ? $data->tanggal_rs_lain : '' }}<br><br>□ ke RS : {{ isset($data->nama_rs_lain) ? $data->nama_rs_lain : '' }}</td>
                <td colspan="2" style="text-align: center;">□ HOME CARE</td>
            </tr>
            <tr>
                <td>Tanggal: {{ isset($data->tanggal_kontrol_rsud) ? $data->tanggal_kontrol_rsud : '' }}</td>
                <td>□ Rujuk Balik<br><br>Tanggal: {{ isset($data->tanggal_rujuk_balik) ? $data->tanggal_rujuk_balik : '' }}</td>
                <td colspan="1">Perawatan yang akan dilakukan</td>
                <td colspan="1">Tanggal</td>
            </tr>
            <tr>
                <td>□ Klinik: {{ isset($data->klinik) ? $data->klinik : '' }}</td>
                <td>□ RS: {{ isset($data->nama_rs_rujuk_balik) ? $data->nama_rs_rujuk_balik : '' }}</td>
                <td>□ Pergantian Dower Catheter, NGT, Double Lumen</td>
                <td>{{ isset($data->tanggal_pergantian_catheter) ? $data->tanggal_pergantian_catheter : '' }}</td>
            </tr>
            <tr>
                <td>□ Dokter: {{ isset($data->dokter) ? $data->dokter : '' }}</td>
                <td>□ Puskesmas: {{ isset($data->puskesmas) ? $data->puskesmas : '' }}</td>
                <td>□ Terapi Rehabilitasi</td>
                <td>{{ isset($data->tanggal_terapi_rehabilitan) ? $data->tanggal_terapi_rehabilitan : '' }}</td>
            </tr>
            <tr>
                <td></td>
                <td>□ Dokter Praktek Pribadi:</td>
                <td>□ Rawat Luka</td>
                <td>{{ isset($data->tanggal_rawat_luka) ? $data->tanggal_rawat_luka : '' }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>□ Lainnya: {{ isset($data->perawatan_lainnya_detail) ? $data->perawatan_lainnya_detail : '' }}</td>
                <!-- <td>□ Lainnya: </td> -->
                <td>{{ isset($data->tanggal_perawatan_lainnya) ? $data->tanggal_perawatan_lainnya : '' }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td>EDUKASI PASIEN</td>
                <td>
                    <input type="checkbox" name="edukasi_penyakit" value="1" {{ isset($data->edukasi_penyakit) && !empty($data->edukasi_penyakit) ? 'checked' : '' }}> Penyakit: {{ isset($data->edukasi_penyakit) ? $data->edukasi_penyakit : '' }}
                </td>
                <td>
                    <input type="checkbox" name="edukasi_diet" value="1" {{ isset($data->edukasi_diet) && !empty($data->edukasi_diet) ? 'checked' : '' }}> Diet: {{ isset($data->edukasi_diet) ? $data->edukasi_diet : '' }}
                </td>
                <td>
                    <input type="checkbox" name="edukasi_alat_bantu" value="1" {{ isset($data->edukasi_alat_bantu) && !empty($data->edukasi_alat_bantu) ? 'checked' : '' }}> Alat bantu bila ada: {{ isset($data->edukasi_alat_bantu) ? $data->edukasi_alat_bantu : '' }}
                </td>
            </tr>
        </tbody>
    </table>

    <p style="text-align: center;">
        "BILA TERJADI MASALAH KESEHATAN SEBELUM WAKTU KONTROL HUBUNGI SARANA KESEHATAN TERDEKAT ATAU CALL CENTRE RSUD SITI FATIMAH NOMOR TELEPHONE 0711-5718883/0711-5718889"
    </p>

    <table style="width: 100%;" border="1">
    <tbody>
        <tr >
            <td colspan="2" style="text-align: left; border: none;" >Palembang, {{ isset($data->created_at) ? \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') : '' }}</td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center; border: none;">
                Pasien/Keluarga<br><br>
                @if(isset($data->ttd_pasien) && $data->ttd_pasien)
                    <img src="{{ $data->ttd_pasien }}" alt="Signature Pasien" style="width: 100px; height: auto;">
                @else
                    <canvas id="signature-pad-pasien" style="border: 1px solid #000; width: 300px; height: 150px;"></canvas>
                    <button type="button" onclick="clearSignature('signature-pad-pasien')">Clear</button>
                @endif
                <br>(<input type="text" id="input-nama-pasien-keluarga" name="nama_pasien_keluarga" value="{{ isset($data->nama_pasien_keluarga) ? $data->nama_pasien_keluarga : '' }}" {{ !empty($data->nama_pasien_keluarga) ? 'style=display:none;' : '' }}> {{ isset($data->nama_pasien_keluarga) ? $data->nama_pasien_keluarga : '' }} )
            </td>
            <td style="width: 50%; text-align: center; border: none;">
                Dokter Penanggung Jawab Pelayanan (DPJP)<br><br>
                @if(isset($data->ttd_dokter) && $data->ttd_dokter)
                    <img src="{{ $data->ttd_dokter }}" alt="Signature Dokter" style="width: 100px; height: auto;">
                @else
                    <canvas id="signature-pad" style="border: 1px solid #000; width: 300px; height: 150px;"></canvas>
                    <button type="button" onclick="clearSignature('signature-pad')">Clear</button>
                @endif
                <br>( {{ isset($data->dokter_id) ? app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->get_paraedic_name($data->dokter_id) : '' }} )
            </td>
        </tr>
    </tbody>
</table>

<form id="signature-form" method="POST" action="{{ route('resume.saveSignature') }}">
    @csrf
    <input type="hidden" name="reg_no" value="{{ isset($data->reg_no) ? $data->reg_no : '' }}">
    <input type="hidden" name="ttd_dokter" id="ttd_dokter">
    <input type="hidden" name="ttd_pasien" id="ttd_pasien">
    <input type="hidden" name="nama_pasien_keluarga" id="nama_pasien_keluarga">
    @if (isset($data->signature_exists) && !$data->signature_exists)
        <button type="submit" id="save-button">Save Signature</button>
    @endif
</form>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var canvasDokter = document.getElementById('signature-pad');
        var signaturePadDokter = canvasDokter ? new SignaturePad(canvasDokter) : null;

        var canvasPasien = document.getElementById('signature-pad-pasien');
        var signaturePadPasien = canvasPasien ? new SignaturePad(canvasPasien) : null;

        document.getElementById('signature-form').addEventListener('submit', function (e) {
            e.preventDefault();
            var dataUrlDokter = signaturePadDokter ? signaturePadDokter.toDataURL() : null;
            var dataUrlPasien = signaturePadPasien ? signaturePadPasien.toDataURL() : null;
            var namaPasienKeluarga = document.getElementById('input-nama-pasien-keluarga').value;

            // if (!dataUrlDokter || !dataUrlPasien || !namaPasienKeluarga) {
            //     alert('Semua data harus diisi sebelum disimpan.');
            //     return;
            // }

            document.getElementById('ttd_dokter').value = dataUrlDokter;
            document.getElementById('ttd_pasien').value = dataUrlPasien;
            document.getElementById('nama_pasien_keluarga').value = namaPasienKeluarga;
            document.getElementById('save-button').style.display = 'none';

            this.submit(); 
        });

        window.clearSignature = function (padId) {
            if (padId === 'signature-pad' && signaturePadDokter) {
                signaturePadDokter.clear();
            } else if (padId === 'signature-pad-pasien' && signaturePadPasien) {
                signaturePadPasien.clear();
            }
        }

        // Enable canvas for patient signature if doctor's signature exists and patient's signature does not exist
        if (signaturePadDokter && !signaturePadDokter.isEmpty() && signaturePadPasien && signaturePadPasien.isEmpty()) {
            canvasPasien.style.display = 'block';
        }
    });
</script>
{{-- <!-- 
    @if($data->ttd_dokter)
        <img src="{{ $data->ttd_dokter }}" alt="Signature Dokter">
    @endif
    @if($data->ttd_pasien)
        <img src="{{ $data->ttd_pasien }}" alt="Signature Pasien">
    @endif --> --}}

</body>
</html>
