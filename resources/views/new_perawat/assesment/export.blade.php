@extends('templates.export')

@section('title')
    Pengkajian_Awal_{{$reg}}
@endsection

@section('export')
<style>
    .table td, .table th {
        padding: 0.2rem;
        border-top: none;
        text-align: top;
    }
    .popup {
        pagebreak-before: always;
        top: 100%;
    }
</style>
    <div class="row mb-3" style="border-bottom: black 2px solid">
        <div class="col">
            <img src="{{asset('images/kop.png')}}" width="100%" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col -lg-6">
            <h4 class="text-center text-uppercase">Pengkajian Awal Pasien Rawat Jalan</h4>
            <hr>
            <table class="table table-cppt">
                <tbody>
                    <tr style="font-size: 14px">
                        <td>No. Registrasi</td>
                        <th>{{$reg}}</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>No. Medrec</td>
                        <th>{{$reg->reg_medrec}}</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>Nama Pasien</td>
                        <th>{{$reg->PatientName}}</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>Tanggal Lahir</td>
                        <th>{{$reg->DateofBirth}} ( {{\Carbon\Carbon::parse($reg->DateofBirth)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan %d hari')}} )</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>Jenis Kelamin</td>
                        <th>
                            @if ($reg->GCSex == '0001^F')
                                Perempuan
                            @else
                                Laki-laki
                            @endif
                        </th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>Poliklinik</td>
                        <th>{{$reg->RoomName}}</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td>DPJP</td>
                        <th>{{$reg->ParamedicName}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <h4 style="font-size: 16px">PERAWAT</h4>
    <div class="row">
        <div class="col">
            <table class="table">
                <tbody>
                    <tr class="bg-secondary text-dark subtitle">
                        <th colspan="2" style="font-size: 14px">Pemeriksaan Fisik Umum</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kesadaran</td>
                        <td>: {{($data->asper_kesadaran) ? $data->asper_kesadaran : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kondisi Umum</td>
                        <td>: {{($data->asper_kondisi_umum) ? $data->asper_kondisi_umum : '-'}} | Lainnya : {{($data->asper_kondisi_umum_lain) ? $data->asper_kondisi_umum_lain : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Tekanan Darah</td>
                        <td>: {{($data->asper_tekanan_darah) ? $data->asper_tekanan_darah : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Nadi</td>
                        <td>: {{($data->asper_nadi) ? $data->asper_nadi : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Suhu</td>
                        <td>: {{($data->asper_suhu) ? $data->asper_suhu : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Pernapasan</td>
                        <td>: {{($data->asper_pernapasan) ? $data->asper_pernapasan : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Tinggi Badan</td>
                        <td>: {{($data->asper_tinggi_bdn) ? $data->asper_tinggi_bdn : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Berat Badan</td>
                        <td>: {{($data->asper_berat_bdn) ? $data->asper_berat_bdn : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kebutuhan Khusus</td>
                        <td>: {{str_replace( array('[',']') , ''  , str_replace('"', ' ',  $data->asper_kbthn_khusus) )}} <br>
                            Lainnya  : {{($data->asper_kbthn_khusus_lain) ? $data->asper_kbthn_khusus_lain : '-'}}
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Riwayat Alergi</td>
                        <td>: {{($data->asper_riwayat_alergi) ? $data->asper_riwayat_alergi : '-'}} <br>
                            Lainnya : {{($data->asper_riwayat_alergi_lain) ? $data->asper_riwayat_alergi_lain : '-'}}
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" style="font-size: 14px">Skrinning Nyeri</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Pasien Nyeri</td>
                        <td>: {{$data->nyeri_status}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Durasi Waktu</td>
                        <td>: {{$data->nyeri_durasi_waktu}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Pencetus Nyeri</td>
                        <td>: {{$data->nyeri_penyebab}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Deskripsi Nyeri</td>
                        <td>
                            {{$data->nyeri_deskripsi}} <br>
                            Lainnya : {{$data->nyeri_deskripsi_lain}}
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Lokasi dan Penjalaran</td>
                        <td>: {{$data->nyeri_penyebab_b}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Skala Ukur</td>
                        <td>: {{$data->nyeri_skala_ukur}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kapan Terjadi Nyeri</td>
                        <td>: {{$data->nyeri_waktu}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Frekuensi Nyeri</td>
                        <td>: {{$data->nyeri_frekuensi}}</td>
                    </tr>
                    <tr class="bg-secondary text-dark subtitle">
                        <th colspan="2" style="font-size: 14px">Skrinning Risiko Cedera / Jatuh</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Gaya berjalan tidak seimbang</td>
                        <td>: {{($data->asper_brjln_seimbang) ? $data->asper_brjln_seimbang : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Alat Bantu Duduk</td>
                        <td>: {{($data->asper_altban_duduk) ? $data->asper_altban_duduk : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Hasil</td>
                        <td>: {{($data->asper_hasil) ? $data->asper_hasil : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kebutuhan Nutrisi/Cairan</td>
                        <td>: {{str_replace( array('[',']') , ''  , str_replace('"', ' ',  $data->asper_keluhan_nutrisi) )}}<br>
                            Lainnya : {{($data->asper_keluhan_nutrisi_lain) ? $data->asper_keluhan_nutrisi_lain : '-'}}
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Rasa Haus Berlebih</td>
                        <td>: {{($data->asper_haus_berlebih) ? $data->asper_haus_berlebih : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Mukosa Mulut</td>
                        <td>: {{($data->asper_mukosa_mulut) ? $data->asper_mukosa_mulut : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Turgor Kulit</td>
                        <td>: {{($data->asper_turgor_kulit) ? $data->asper_turgor_kulit : '-'}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 14px;">
                        <td width="400px">Edema</td>
                        <td>: {{($data->asper_edema) ? $data->asper_edema : '-'}}</td>
                    </tr>
                    <tr class="bg-secondary text-dark subtitle">
                        <th colspan="2" style="font-size: 14px">Data Psikologis, Sosial, Ekonomi dan Spiritual</th>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Status Emosional</td>
                        <td>: {{str_replace( array('[',']') , ''  , str_replace('"', ' ',  $data->asper_status_emosi) )}}<br>
                            Lainnya : {{($data->asper_status_emosi_lain) ? $data->asper_status_emosi_lain : '-'}}    
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Trauma Psikis</td>
                        <td>: {{($data->asper_kondisi_umum_b) ? $data->asper_kondisi_umum_b : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Hambatan Sosial Ekonomi</td>
                        <td>: {{($data->asper_hambatan_ekonomi) ? $data->asper_hambatan_ekonomi : '-'}} <br>
                            Lainnya : {{($data->asper_hambatan_ekonomi_lain) ? $data->asper_hambatan_ekonomi_lain : '-'}}
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="subtitle">Daftar Masalah Keperawatan</div>
            <table width="100%" height="100px" class="table">
                <thead>
                    <tr>
                        <th style="font-size: 14px">No</th>
                        <th style="font-size: 14px">Kode Masalah</th>
                        <th style="font-size: 14px">Masalah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['masalah'] as $item)
                        <tr>
                            <td style="font-size: 14px">{{$loop->iteration}}</td>
                            <td style="font-size: 14px">{{$item->pmasalah_masalah}}</td>
                            <td style="font-size: 14px">{{$item->masalah_nama}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="subtitle">Intervensi Keperawatan</div>
            <table width="100%" height="100px" class="table">
                <thead>
                    <tr>
                        <th style="font-size: 14px">No</th>
                        <th style="font-size: 14px">Intervensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['intervensi'] as $item)
                        <tr>
                            <td style="font-size: 14px">{{$loop->iteration}}</td>
                            <td style="font-size: 14px">{{$item->item_nama}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h4 style="font-size: 16px">DOKTER</h4>
    <div class="row">
        <div class="col">
            <table class="table">
                <tbody>
                    <tr style="font-size: 14px">
                        <td width="400px">Anamnesis</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_amnesis : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Keluhan utama</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_keluhan_utama : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Riwayat penyakit sekarang</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_penyakit_sekarang : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Riwayat penyakit dahulu</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_penyakit_dahulu : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_penyakit_dahulu == 'Ya')
                                ( {{$data['asdok']->asdok_penyakit_dahulu_ket}} )
                            @endif
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Riwayat pengobatan</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_pengobatan : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_pengobatan == 'Ya')
                                ( {{$data['asdok']->asdok_pengobatan_ket}} )
                            @endif
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Alat implant</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_implant : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_implant == 'Ya')
                                ( {{$data['asdok']->asdok_implant_lain}} )
                            @endif
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Riwayat penyakit menular keluarga</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_penyakit_dlm_klrg : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_penyakit_dlm_klrg == 'Ya')
                                ( {{$data['asdok']->asdok_penyakit_dlm_klrg_ket}} )
                            @endif
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Pemeriksaan organ yang terkait dengan keluahan saat ini</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_penyakit_multiorgan : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Daftar masalah/Diagnostik medik</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_diagnosis_medik : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Instruksi awal</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_instruksi_awal : '-'}}</td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Kontrol ulang</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_kontrol_ulang : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_kontrol_ulang == 'Ya')
                                ( Tanggal : {{($data['asdok']) ? $data['asdok']->asdok_kontrol_ulang_tgl : '-'}} )
                            @endif
                        </td>
                    </tr>
                    <tr style="font-size: 14px">
                        <td width="400px">Rawat inap</td>
                        <td>: {{($data['asdok']) ? $data['asdok']->asdok_rawat_inap : '-'}}
                            @if ($data['asdok'] && $data['asdok']->asdok_rawat_inap == 'Ya')
                                ( Tanggal : {{($data['asdok']) ? $data['asdok']->asdok_rawat_inap_ket : '-'}} )
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.onafterprint = window.close;
        window.print();
    </script>
@endsection