<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Operasi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            padding: 10px;
        }
        .divider {
            margin-top:10px;
            margin-bottom:10px;
        }
        hr {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            border: 0;
            border-top: 4px solid #000;
        }
        .mytable {
            border:1px solid #000;
        }
        .mytable  td {
            padding: 5px;
            border:1px solid #000;
        }
       
    </style>
</head>


<body>
    <div class="container">
        <table class="w-100">
            <tr>
                <td>
                    <div>
                        <img src="{{ asset('logo_sumsel.png') }}" alt="" style="width: 84px;">
                    </div>
                </td>
                <td>
                    <h3 class="text-center">Laporan Operasi</h3>
                    <div>
                        <h5 class="text-center">RSUD SITI FATIMAH</h5>
                        <H6 class="text-center">Provinsi Sumatera Selatan</H6>
                    </div>
                </td>
                <td>
                    <div>
                        <h6>NO. RM : {{ $pasien->MedicalNo ?? '' }}</h6>
                        <h6>Nama : {{ $pasien->PatientName ?? '' }}</h6>
                        <h6>Tanggal Lahir : {{ \Carbon\Carbon::parse( $pasien->DateOfBirth)->format('d F Y')??'' }}</h6>
                        <h6>Jenis Kelamin : {{ $pasien->GCSex === '0001^M' ? 'Male' : 'Female' }}</h6>
                    </div>
                </td>
            </tr>
        </table>
        <hr/>
            
       
        <div class="divider" style=""></div>
        <h4 class="text-center" style="background-color: #ddd;">Rencana Pre Operasi / Tindakan</h4>
        <table class="w-100 mytable">
            <tr>
                <td width="300px">
                    1. Anamnesis Singkat
                </td>
                <td width="20px">:</td>
                <td>
                    {{ $laporan_operasi['assesment_awal']->keluhan_utama ?? '' }}
                </td>
            </tr>
            <tr>
                <td width="300px">
                    2. Alergi
                </td>
                <td width="20px">:</td>
                <td>
                    {{isset($laporan_operasi['rencana_pre_operasi']) && $laporan_operasi['rencana_pre_operasi']->alergi ? 'Ya' : 'Tidak' }},
                    {{ $laporan_operasi['rencana_pre_operasi']->catatan_alergi ?? '' }}
                </td>
            </tr>
            <tr>
                <td width="300px">
                    3. Pemeriksaan Fisik
                </td>
                <td width="20px">:</td>
                <td>
                    {{ $laporan_operasi['rencana_pre_operasi']->pemeriksaan_fisik ?? '' }}
                </td>
            </tr>
            <tr>
                <td width="300px">
                    4. Diagnosa Pre Operasi Tindakan
                </td>
                <td width="20px">:</td>
                <td>
                    {{ $laporan_operasi['rencana_pre_operasi']->diagnosa_pre_operasi ?? '' }}
                </td>
            </tr>
            <tr>
                <td width="300px" class="align-top">
                    5. Operasi / Tindakan
                </td>
                <td width="20px">:</td>
                <td>
                    <table class="w-100">
                        <thead class="">
                            <tr style="background-color: #ddd">
                                <td>Nama Operasi</td>
                                <td>Persiapan Alat Khusus</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_operasi['pasien_prosedur'] as $item)
                            <tr>
                                <td>{{ $item->nama_tindakan }}</td>
                                <td>
                                    {{ $item->persiapan_alat_khusus ? 'Ya': 'Tidak' }}
                                    {{ $item->catatan_persiapan_alat_khusus ?? '' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>

        </table>
        <div class="divider" style="margin-top: 30px;"></div>
        <h4 class="text-center" style="background-color: #ddd;">Laporan Operasi / Tindakan</h4>
        <table class="w-100 mytable">
            <tbody>
                <tr>
                    <td>Tanggal : {{ $laporan_operasi['operasi_tindakan']->tanggal_operasi ?? '' }}</td>
                    <td>Jam Mulai Operasi / Tindakan : {{ $laporan_operasi['operasi_tindakan']->mulai_jam_operasi ?? '' }}</td>
                    <td>Jam Selesai Operasi / Tindakan : {{ $laporan_operasi['operasi_tindakan']->selesai_jam_operasi ?? '' }}</td>
                </tr>
                <tr>
                    <td>Dokter Bedah : {{ $laporan_operasi['operasi_tindakan']->dokter_bedah ?? '' }}</td>
                    <td>Asisten I : {{ $laporan_operasi['operasi_tindakan']->asisten_1 ?? '' }}</td>
                    <td>Asisten II : {{ $laporan_operasi['operasi_tindakan']->asisten_2 ?? '' }}</td>
                </tr>
                <tr>
                    <td>Dokter Anestesi : {{ $laporan_operasi['operasi_tindakan']->dokter_anastesi ?? '' }}</td>
                    <td>Perawat Instrumen : {{ $laporan_operasi['operasi_tindakan']->perawat_instrumen ?? '' }}</td>
                    <td>Tipe Operasi : {{ $laporan_operasi['operasi_tindakan']->tipe_operasi ?? '' }}</td>
                </tr>
                <tr>
                    <td colspan="3">
                        Diagnosa Pasca Bedah : 
                        <p style="min-height: 124px;">
                            {{ $laporan_operasi['operasi_tindakan']->diagnosa_pasca_bedah ?? '' }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Operasi / Tindakan : 
                        <div>
                            <ul class="list-group">
                                @foreach ($laporan_operasi['pasien_prosedur'] as $item)
                                 <li class="list-group-item">{{ $loop->iteration. '.' }} {{ $item->nama_tindakan }}</li> 
                                @endforeach
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                       Tipe Anestesi : {{ $laporan_operasi['operasi_tindakan']->tipe_anestesi ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                      Pengirim Spesimen ke Klinik Patologi : {{ isset($laporan_operasi['operasi_tindakan']) && $laporan_operasi['operasi_tindakan']->pengirim_spesimen_klinik_patologi ? 'Ya': 'Tidak' }},
                      <input type="checkbox" name="ket_spesimen" id=""@readonly(true) checked>
                      <label for="ket_spesimen">{{ $laporan_operasi['operasi_tindakan']->ket_spesimen_klinik_patologi ?? '' }}</label>
                      &nbsp;{{ $laporan_operasi['operasi_tindakan']->ket_spesimen_klinik_patologi_lainnya ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                     Asal Spesimen : {{ $laporan_operasi['operasi_tindakan']->asal_spesimen ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Kultur : {{ isset($laporan_operasi['operasi_tindakan']) && $laporan_operasi['operasi_tindakan']->kultur ? 'Ya': 'Tidak' }},
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                Perkiraan Jumlah Pendarahan : {{ $laporan_operasi['operasi_tindakan']->perkiraan_jumlah_pendarahan ?? '' }} ml
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                Transfusi :
                                <div>
                                    WB : {{ $laporan_operasi['operasi_tindakan']->jumlah_transfusi_wb ?? '' }} ml
                                </div>
                                <div>
                                    FFP : {{ $laporan_operasi['operasi_tindakan']->jumlah_transfusi_ffp ??'' }} ml
                                </div>
                                <div>
                                    PRC : {{ $laporan_operasi['operasi_tindakan']->jumlah_transfusi_prc ?? '' }} ml
                                </div>
                                <div>
                                    Cyrco : {{ $laporan_operasi['operasi_tindakan']->jumlah_transfusi_cyro ?? '' }} ml
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            </tbody>
        </table>

        <div class="divider" style="margin-top: 30px;"></div>
        <h4 class="text-center" style="background-color: #ddd;">Laporan Prosedur Penemuan Komplikasi</h4>
        <table class="w-100 mytable">
            <tr>
                <td>
                    Catatan Prosedur Penemuan Komplikasi :
                    <p style="min-height: 400px;">
                        {{ $laporan_operasi['penemuan_komplikasi']->catatan_prosedur ?? '' }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    Komplikasi : {{ isset($laporan_operasi['penemuan_komplikasi']) && $laporan_operasi['penemuan_komplikasi']->is_komplikasi ?'Ya':'Tidak' }},
                    <p style="min-height: 100px;">
                        {{ $laporan_operasi['penemuan_komplikasi']->catatan_komplikasi ?? '' }}
                    </p>
                </td>
                
            </tr>
            <tr>
                <td>
                    Komplikasi : {{ isset($laporan_operasi['penemuan_komplikasi']) && $laporan_operasi['penemuan_komplikasi']->is_implant ?'Ya':'Tidak' }},
                    <p style="min-height: 100px;">
                        {{ $laporan_operasi['penemuan_komplikasi']->catatan_implant ?? '' }}
                    </p>

                </td>
                
            </tr>
            <tr>
                <td>
                    <div class="text-center">
                        <h5>Dokter Operator</h5>
                        <div style="min-height: 100px;">
                            <img src="{{ $laporan_operasi['dokter_operator_penemuan_komplikasi']->signature ?? '' }}" alt="">
                        </div>
                        <h6>
                            {{ $laporan_operasi['dokter_operator_penemuan_komplikasi']->ParamedicName ?? '' }}
                        </h6>
                        <p>
                            {{ \Carbon\Carbon::parse($laporan_operasi['penemuan_komplikasi']->created_at ?? '')->format('d F Y') }}
                        </p>
                    </div>
                </td>
            </tr>
        </table>

        <div class="divider" style="margin-top: 30px;"></div>
        <h4 class="text-center" style="background-color: #ddd;">Laporan Pasca Operasi / Tindakan</h4>
        <table class="w-100 mytable">
            <tr>
                <td>
                    1. Instruksi pasca operasi / tindakan
                    <div class="ml-3">
                        <div class="row">
                            <div class="col-sm-12 col-lg-2">a. Rawat di</div>
                            <div class="col-sm-12 col-lg-10">: {{ $laporan_operasi['pasca_operasi']['data_pasca']->instruksi_rawat ?? '' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-2">b. Posisi</div>
                            <div class="col-sm-12 col-lg-10">: {{ $laporan_operasi['pasca_operasi']['data_pasca']->instruksi_posisi ?? '' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-2">c. Diet</div>
                            <div class="col-sm-12 col-lg-10">:
                                {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->diet == 0  ? ' Tidak Perlu Puasa' : 'Puasa Total'  }},

                                @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->diet == 1)
                                    {{ $laporan_operasi['pasca_operasi']['data_pasca']->lama_hari_diet_total ?? '' }}
                                @else
                                    Boleh diet {{ $laporan_operasi['pasca_operasi']['data_pasca']->ket_boleh_diet ??''}} setelah {{ $laporan_operasi['pasca_operasi']['data_pasca']->ket_setelah_diet ?? ''}}
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-2">d. Infus</div>
                            <div class="col-sm-12 col-lg-10 ">:
                                <div class="col-sm-12 col-lg-4">
                                    @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->infus_sesuai_instruksi == 1)
                                        <input type="checkbox" checked readonly></input>
                                        <span>Sesuai instruksi dokter anestesi</span>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->infus_cairan == 1)
                                        <input type="checkbox" checked readonly></input>
                                        <span>Cairan</span>
                                    @endif
                                </div>
                                <div class="mt-2 ml-2">
                                    <table class="mytable w-100">
                                        <thead>
                                            <tr>
                                                <th>Cairan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @empty($laporan_operasi['pasca_operasi']['data_pasca']->infus_cairan_data)
                                            <tr>
                                                <td>Belum ada data</td>
                                            </tr>
                                            @else
                                            @foreach (json_decode($laporan_operasi['pasca_operasi']['data_pasca']->infus_cairan_data) as $item)
                                                <tr>
                                                    <td>{{ $item }}</td>
                                                </tr>
                                            @endforeach
                                            @endempty
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">2. Pemberian Obat</div>
                        <div class="col-sm-12 col-lg-10">: {{ $laporan_operasi['pasca_operasi']['data_pasca']->instruksi_pemberian_obat  ?? ''}}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">3. Pemberian Transfusi</div>
                        <div class="col-sm-12 col-lg-10">: {{ $laporan_operasi['pasca_operasi']['data_pasca']->instruksi_pemberian_tranfusi  ?? ''}}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">4. Drain</div>
                        <div class="col-sm-12 col-lg-10">:
                            {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->instruksi_drain == '1' ? 'Terpasang' : 'Tidak Terpasang' }}
                            <div class="mt-2 ml-2">
                                <table class="mytable w-100">
                                    <thead>
                                        <tr style="background-color: #ddd;">
                                            <td>Terpasang</td>
                                            <td>Jenis</td>
                                            <td>Letak</td>
                                            <td>Lama Pemasangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @empty($laporan_operasi['pasca_operasi']['data_drain'])
                                        <tr>
                                            <td colspan="4">Belum ada data</td>
                                        </tr>
                                        @else
                                        @foreach (json_decode($laporan_operasi['pasca_operasi']['data_drain']) as $item)
                                        <tr>
                                            <td>{{ $loop->iteration.'.' }} Drain</td>
                                            <td>{{ $item->jenis_drain }}</td>
                                            <td>{{ $item->letak_pemasangan }}</td>
                                            <td>{{ $item->lama_pemasangan }}</td>
                                        </tr>
                                        @endforeach
                                        @endempty
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </td>
            </tr>
           
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">5. Tampon</div>
                        <div class="col-sm-12 col-lg-10">: 
                            {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->tampon == '1' ? 'Terpasang' : 'Tidak Terpasang' }},
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->tampon == '1')
                                Letak {{ $laporan_operasi['pasca_operasi']['data_pasca']->tampon_letak ?? '' }}  Selama {{ $laporan_operasi['pasca_operasi']['data_pasca']->durasi_hari_tampon ?? '' }} Hari
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">6. NGT</div>
                        <div class="col-sm-12 col-lg-10">: 
                            {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->ngt == '1' ? 'Ada' : 'Tidak Ada' }},
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->ngt == '1')
                                Selama {{ $laporan_operasi['pasca_operasi']['data_pasca']->catatan_ngt ?? '' }} Hari
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">7. Kateter Urin</div>
                        <div class="col-sm-12 col-lg-10">: 
                            {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->kateter_urin == '1' ? 'Terpasang' : 'Tidak Terpasang' }},
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->kateter_urin == '1')
                                Monitor urin tiap {{ $laporan_operasi['pasca_operasi']['data_pasca']->catatan_kateter_urin ?? '' }} jam
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">8. Pemeriksaan Pasca</div>
                        <div class="col-sm-12 col-lg-10">: 
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->pemeriksaan_pasca_laboratorium == '1')
                               <div>
                                <input type="checkbox" checked readonly></input>
                                <span>Laboratorium</span>. Perlu {{ $laporan_operasi['pasca_operasi']['data_pasca']->catatan_pemeriksaan_pasca_laboratorium ?? '' }}
                               </div>
    
                            @endif
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->pemeriksaan_pasca_radiologi == '1')
                               <div>
                                <input type="checkbox" checked readonly></input>
                                <span>Radiologi</span>. Perlu {{ $laporan_operasi['pasca_operasi']['data_pasca']->catatan_pemeriksaan_pasca_radiologi ?? '' }}
                               </div>
    
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12 col-lg-3">9. Kebutuhan khusus terkait pemulangan pasien</div>
                        <div class="col-sm-12 col-lg-9">: 
                            {{ isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->kebutuhan_terkait ==1 ? 'Ada' : 'Tidak Ada' }}
                            @if (isset($laporan_operasi['pasca_operasi']['data_pasca']) && $laporan_operasi['pasca_operasi']['data_pasca']->kebutuhan_terkait ==1)
                                {{ $laporan_operasi['pasca_operasi']['data_pasca']->catatan_kebutuhan_terkait ?? '' }}
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="text-center">
                        <h5>Dokter Operator</h5>
                        <div style="min-height: 100px;">
                            <img src="{{ $laporan_operasi['dokter_operator_pasca_operasi']->signature ?? '' }}" alt="">
                        </div>
                        <h6 class="text-center">
                            {{ $laporan_operasi['dokter_operator_pasca_operasi']->ParamedicName ?? '' }}
                        </h6>
                        <p>
                            {{ \Carbon\Carbon::parse($laporan_operasi['pasca_operasi']['data_pasca']->created_at ?? '')->format('d F Y') }}
                        </p>
                    </div>
                </td>
            </tr>
        </table>

        
    </div>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>