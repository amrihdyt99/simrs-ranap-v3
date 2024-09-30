@extends('zxc-nyaa-universal.000_layout.nyaa_app_onlycontent_compat')

@section('nyaa_styles')

@php
function input($name, $title, $type = '') {
if ($type) {
$type = $type;
} else {
$type = 'text';
}

return '<div class="form-group"><label>'.$title.'</label><input type="'.$type.'" class="form-control" name="'.$name.'"></div>';
}
function radio($name, $title) {
return '<div class="custom-control custom-radio custom-control-inline">
    <input id="'.$name.'_'.$title.'" type="radio" class="custom-control-input" value="'.$title.'" name="'.$name.'">
    <label class="custom-control-label" for="'.$name.'_'.$title.'">'.$title.'</label>
</div>';
}
function checkbox($name, $title) {
return '<div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input Ada" id="'.$name.'_'.$title.'" value="'.$title.'" name="'.$name.'[]">
    <label class="custom-control-label" for="'.$name.'_'.$title.'">'.$title.'</label>
</div>';
}
$data_verifikasi_pasien = [
['item' => 'Periksa identitas pasien'],
['item' => 'Periksa gelang identitas/gelang alergi'],
['item' => 'Akses dan tindakan dipastikan bersama pasien'],
['item' => 'Periksa surat persetujuan tindakan'],
['item' => 'Persetujuan biaya tindakan'],
['item' => 'Periksa kelengkapan persetujuan anastesi (jika perlu)'],
['item' => 'Periksa kelengkapan rekam medis/file nama'],
['item' => 'Periksa kelengkapan x-ray/CT-Scan/MRI/EKG/Echo/Angiografi'],
];
$data_persiapan_pasien = [
['item' => 'Periksa lab: ureum, creatinin, darah rutin, PT/APTT, HBsAg**'],
['item' => 'Puasa/makan dan minum terakhir**'],
['item' => 'Gigi palsu/ kontak lensa dilepaskan*'],
['item' => 'Menggunakan pacemaker'],
['item' => 'Penjepit rambut/cat kuku/perhiasan dilepaskan*'],
['item' => 'Pasang pampers/ kondom kateter**'],
['item' => 'Cukur daerah inguinal kanan dan kiri/radialis kanan'],
['item' => 'Pasang IV lline di tangan kiri'],
['item' => 'Lakukan Allen test(tindakan dari arteri radialis)'],
['item' => 'Sedang menstruasi/ sedang hamil(wanita)'],
['item' => 'Obat DM dihentikan saat puasa**'],
['item' => 'Lain-lain**'],
];

$registrasi_data = DB::connection('mysql2')
->table('m_registrasi')
->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
@endphp

<style>
    .nav-tabs .nav-link.active,
    .nav-tabs .nav-item.show .nav-link {
        background: linear-gradient(to right, #2ad727, #0ede50) !important;
        color: #fff !important;
    }

    .card-table.table td {
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>

<style>
    .custom-border {
        border: 1px solid rgb(66, 66, 66) !important;
    }

    .cb-non-top {
        border-top: 0px !important;
    }

    .cb-non-bottom {
        border-bottom: 0px !important;
    }

    .cb-non-left {
        border-left: 0px !important;
    }

    .cb-non-right {
        border-right: 0px !important;
    }

    .cb-top {
        border-top: 1px solid rgb(66, 66, 66) !important;
    }

    .cb-bottom {
        border-bottom: 1px solid rgb(66, 66, 66) !important;
    }

    .cb-left {
        border-left: 1px solid rgb(66, 66, 66) !important;
    }

    .cb-right {
        border-right: 1px solid rgb(66, 66, 66) !important;
    }

    .cb-color-orange {
        border-color: #002b3b !important;
    }

    .triangle-down {
        width: 0;
        height: 0;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-top: 50px solid #ffffff;
    }
</style>

@endsection

@section('nyaa_content_body')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">[{{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->role_mapping_nama(auth()->user()->level_user) }}]</a></li>
        <li class="breadcrumb-item active" aria-current="page">Assesment</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-10 pr-0">
        <div class="row">

            <div class="col" style="max-width: 15%;">
                @if (Auth::user()->level_user == 'farmasi')
                <div class="row">
                    <div class="left-tab active" id="tab-edukasi" onclick="clickTab('edukasi')">
                        Edukasi
                    </div>
                </div>
                <div class="row">
                    <div class="left-tab" id="tab-soap" onclick="clickTab('soap')">
                        CPPT
                    </div>
                </div>
                <div class="row">
                    <div class="left-tab" id="tab-rekonsiliasi-obat" onclick="clickTab('rekonsiliasi-obat')">
                        Rekonsiliasi
                    </div>
                </div>
                @else
                @if (Auth::user()->level_user == 'dietitian')
                <div class="row">
                    <div class="left-tab active" id="tab-edukasi" onclick="clickTab('edukasi')">
                        Edukasi
                    </div>
                </div>
                <div class="row">
                    <div class="left-tab" id="tab-soap" onclick="clickTab('soap')">
                        CPPT
                    </div>
                </div>
                @else
                @if(Auth::user()->level_user=="radiologi")
                <div class="row">
                    <div class="left-tab active" id="tab-radiologi" onclick="clickTab('radiologi')">
                        Radiologi
                    </div>
                </div>
                @else
                @if (Auth::user()->room != null)
                @if (Str::contains(Auth::user()->room->RoomName, 'ICU'))
                <div class="row">
                    <div class="left-tab" id="tab-intruksi-harian-icupanel" onclick="clickTab('intruksi-harian-icupanel')">
                        Intruksi Harian
                    </div>
                </div>
                @endif
                @endif

                <div class="row">
                    <div class="left-tab active" id="tab-assesment" onclick="clickTab('assesment')">
                        Pengkajian Awal
                    </div>
                </div>

                @if ($dataPasien->kategori_pasien == 'dewasa')
                <div class="row">
                    <div class="left-tab" id="tab-assesment-dewasa" onclick="clickTab('assesment-dewasa')">
                        Pengkajian Awal Dewasa
                    </div>
                </div>
                @endif

                @if ($dataPasien->kategori_pasien == 'anak')
                <div class="row">
                    <div class="left-tab" id="tab-assesment-anak" onclick="clickTab('assesment-anak')">
                        Pengkajian Awal Anak
                    </div>
                </div>
                @endif

                @if ($dataPasien->kategori_pasien == 'bayi')
                <div class="row">
                    <div class="left-tab" id="tab-assesment-neonatus" onclick="clickTab('assesment-neonatus')">
                        Pengkajian Awal (Neonatus)
                    </div>
                </div>
                @endif

                @if ($dataPasien->kategori_pasien == 'kebidanan')
                <div class="row">
                    <div class="left-tab" id="tab-obgyn" onclick="clickTab('obgyn')">
                        Pengkajian Awal (Obstetri Ginekologi)
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="left-tab" id="tab-nyeri" onclick="clickTab('nyeri')">
                        Skrinning Nyeri
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-rekonsiliasi-obat" onclick="clickTab('rekonsiliasi-obat')">
                        Rekonsiliasi Obat
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-edukasi" onclick="clickTab('edukasi')">
                        Edukasi Pasien
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-checklist" onclick="clickTab('checklist')">
                        Checklist
                    </div>
                </div>

                @if ($age == 'geriatri')
                <div class="row">
                    <div class="left-tab" id="tab-resiko-jatuh-geriatri" onclick="clickTab('resiko-jatuh-geriatri')">
                        Resiko Jatuh Geriatri
                    </div>
                </div>
                @endif

                @if ($age == 'humpty dumpty')
                <div class="row">
                    <div class="left-tab" id="tab-resiko-jatuh-humpty-dumpty" onclick="clickTab('resiko-jatuh-humpty-dumpty')">
                        Resiko Jatuh Humpty Dumpty
                    </div>
                </div>
                @endif

                @if ($dataPasien->kategori_pasien == 'bayi')
                <div class="row">
                    <div class="left-tab" id="tab-resiko-jatuh-neonatus" onclick="clickTab('resiko-jatuh-neonatus')">
                        Resiko Jatuh Neonatus
                    </div>
                </div>
                @endif

                @if ($dataPasien->kategori_pasien == 'dewasa' || $dataPasien->kategori_pasien == 'kebidanan')
                <div class="row">
                    <div class="left-tab" id="tab-resiko-jatuh-skala-morse" onclick="clickTab('resiko-jatuh-skala-morse')">
                        Resiko Jatuh Skala Morse
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="left-tab" id="tab-monitoring_news" onclick="clickTab('monitoring_news')">
                        Monitoring NEWS
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-soap" onclick="clickTab('soap')">
                        CPPT
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-case_manager" onclick="clickTab('case_manager')">
                        Case Manager
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-gizi-dewasa" onclick="clickTab('gizi-dewasa')">
                        Asuhan Gizi Dewasa
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-nursing" onclick="clickTab('nursing')">
                        Nursing
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-transfusi" onclick="clickTab('transfusi')">
                        Transfusi Darah
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-nursing-note" onclick="clickTab('nursing-note')">
                        Nursing Note
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-persetujuan_penolakan" onclick="clickTab('persetujuan_penolakan')">
                        Persetujuan / Penolakan Tindakan Medis
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-transfer-internal" onclick="clickTab('transfer-internal')">
                        Transfer Internal
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="left-tab" id="tab-pra-tindakan" onclick="clickTab('pra-tindakan')">
                        Catatan Keperawatan - Pra Tindakan
                    </div>
                </div> --}}

                {{-- <div class="row">
                    <div class="left-tab" id="tab-intra-tindakan" onclick="clickTab('intra-tindakan')">
                        Catatan Keperawatan - Intra Tindakan
                    </div>
                </div> --}}

                <div class="row">
                    <div class="left-tab" id="tab-intra-hemodinamik" onclick="clickTab('intra-hemodinamik')">
                        Pemantauan Hemodinamik - Intra Tindakan
                    </div>
                </div>


                {{-- <div class="row">
                            <div class="left-tab" id="tab-cathlab" onclick="clickTab('cathlab')">
                                Cath Lab
                            </div>
                        </div> --}}

                <div class="row">
                    <div class="left-tab" id="tab-cathlab-V2" onclick="clickTab('cathlab-V2')">
                        Cath Lab
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="left-tab" id="tab-paska-tindakan" onclick="clickTab('paska-tindakan')">
                        Pemantauan Paska Tindakan
                    </div>
                </div> --}}


                {{-- <div class="row">
                    <div class="left-tab" id="tab-observasi-paska" onclick="clickTab('observasi-paska')">
                        Observasi Paska Tindakan
                    </div>
                </div> --}}



                <div class="row">
                    <div class="left-tab" id="tab-physician-team" onclick="clickTab('physician-team')">
                        Physician Team
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-admin-nurse" onclick="clickTab('admin-nurse')">
                        Admin Nurse
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-bedah" onclick="clickTab('bedah')">
                        Bedah
                    </div>
                </div>



                <div class="row">
                    <div class="left-tab" id="tab-bayi" onclick="clickTab('bayi')">
                        Bayi Baru Lahir
                    </div>
                </div>

                {{-- <div class="row">
                            <div class="left-tab" id="tab-nyaa_dokumen_kelengkapan_pasien" onclick="clickTab('nyaa_dokumen_kelengkapan_pasien')">
                                Dokumen Kelengkapan Pasien
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-nyaa_dokumen_tindakan" onclick="clickTab('nyaa_dokumen_tindakan')">
                                Dokumen Tindakan
                            </div>
                        </div> --}}

                <div class="row">
                    <div class="left-tab" id="tab-checklist_kepulangan" onclick="clickTab('checklist_kepulangan')">
                        Checklist Kepulangan
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-pemulangan" onclick="clickTab('pemulangan')">
                        Discharge Planning
                    </div>
                </div>
                <div class="row">
                    <div class="left-tab" id="tab-surat_rujukan" onclick="clickTab('surat_rujukan')">
                        Surat Rujukan
                    </div>
                </div>

                @endif
                @endif
                @endif

                <div class="row">
                    <div class="left-tab" id="tab-riwayat" onclick="clickTab('riwayat')">
                        Riwayat
                    </div>
                </div>




            </div>
            @if(Auth::user()->level_user=="radiologi")
            <div class="col" style="max-width: 85%;">
                <div class="row">
                    <div class="col-lg-12 pl-0 pr-1">
                        <div class="card">
                            <div class="card-body">
                                <div id="panel-radiologi">
                                    <h2 class="text-black">Order Radiologi</h2>
                                    @include('new_perawat.radiologi.pesanan_radiologi')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col" style="max-width: 85%;">
                <div class="row">
                    <div class="col-lg-12 pl-0 pr-1">

                        <div id="ddx-utama" class="p-3">
                        </div>

                    </div>
                </div>
            </div>
            @endif



        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body">
                @include('new_perawat.profil.index')
            </div>
        </div>
    </div>
</div>
@endsection

@section('nyaa_scripts')

@include('new_perawat-v2.assesment-send-js')
@include('new_perawat-v2.assesment-js')
@include('new_perawat-v2.intruksi-harian.js')
@endsection