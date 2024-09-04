@extends('new_templates.main')

@section('styles')
    <link rel="stylesheet" href="{{asset('new_assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('new_assets/css/new_styles.css')}}">

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
    @endphp

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Perawat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assesment</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-10 pr-0">
            <div class="row">
                <div class="col-lg-1">

                    @if(Auth::user()->level_user=="radiologi")
                        <div class="row">
                            <div class="left-tab active" id="tab-radiologi" onclick="clickTab('radiologi')">
                                Radiologi
                            </div>
                        </div>


                    @else
                        <div class="row">
                            <div class="left-tab active" id="tab-assesment" onclick="clickTab('assesment')">
                                Pengkajian Awal
                            </div>
                        </div>
                        <div class="row">
                            <div class="left-tab" id="tab-nyeri" onclick="clickTab('nyeri')">
                                Skrinning Nyeri
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

                        <div class="row">
                            <div class="left-tab" id="tab-resiko-jatuh" onclick="clickTab('resiko-jatuh')">
                                Resiko Jatuh
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-soap" onclick="clickTab('soap')">
                                CPPT
                            </div>
                        </div>
                        <div class="row">
                            <div class="left-tab" id="tab-assesment-dewasa" onclick="clickTab('assesment-dewasa')">
                                Pengkajian Awal Dewasa
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-assesment-anak" onclick="clickTab('assesment-anak')">
                                Pengkajian Awal Anak
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
                            <div class="left-tab" id="tab-nursing-note" onclick="clickTab('nursing-note')">
                                Nursing Note
                            </div>
                        </div>


                        <div class="row">
                            <div class="left-tab" id="tab-transfer-internal" onclick="clickTab('transfer-internal')">
                                Transfer Internal
                            </div>
                        </div>


                        <div class="row">
                            <div class="left-tab" id="tab-paska-tindakan" onclick="clickTab('paska-tindakan')">
                                Pemantauan Paska Tindakan
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-observasi-paska" onclick="clickTab('observasi-paska')">
                                Observasi Paska Tindakan
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-cathlab" onclick="clickTab('cathlab')">
                                Cath Lab
                            </div>
                        </div>



                        {{--<div class="row">
                        <div class="left-tab" id="tab-cathlab" onclick="clickTab('cathlab')">
                            Cath Lab
                        </div>
                    </div>
                    <div class="row">
                        <div class="left-tab" id="tab-pra-tindakan" onclick="clickTab('pra-tindakan')">
                            Catatan Keperawatan - Pra Tindakan
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-tab" id="tab-intra-tindakan" onclick="clickTab('intra-tindakan')">
                            Catatan Keperawatan - Intra Tindakan
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-tab" id="tab-intra-hemodinamik" onclick="clickTab('intra-hemodinamik')">
                           Pemantauan Hemodinamik - Intra Tindakan
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-tab" id="tab-paska-tindakan" onclick="clickTab('paska-tindakan')">
                            Pemantauan Paska Tindakan
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-tab" id="tab-observasi-paska" onclick="clickTab('observasi-paska')">
                            Observasi Paska Tindakan
                        </div>
                    </div>
                                        <div class="row">
                                            <div class="left-tab" id="tab-physician-team" onclick="clickTab('physician-team')">
                                                Physician Team
                                            </div>
                                        </div>--}}

                        <div class="row">
                            <div class="left-tab" id="tab-admin-nurse" onclick="clickTab('admin-nurse')">
                                Admin Nurse
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-obgyn" onclick="clickTab('obgyn')">
                                Obgyn
                            </div>
                        </div>
                        <div class="row">
                            <div class="left-tab" id="tab-bayi" onclick="clickTab('bayi')">
                                Bayi Baru Lahir
                            </div>
                        </div>
                        {{--   <div class="row">
                               <div class="left-tab" id="tab-bayi" onclick="clickTab('bayi')">
                                   Bayi Baru Lahir
                               </div>
                           </div>

                           <div class="row">
                               <div class="left-tab" id="tab-bedah" onclick="clickTab('bedah')">
                                   Bedah
                               </div>
                           </div>--}}
<div class="row">
                               <div class="left-tab" id="tab-bedah" onclick="clickTab('bedah')">
                                   Bedah
                               </div>
                           </div>
                        <div class="row">
                            <div class="left-tab" id="tab-transfusi" onclick="clickTab('transfusi')">
                                Transfusi Darah
                            </div>
                        </div>

                        <div class="row">
                            <div class="left-tab" id="tab-kelengkapan_pasien" onclick="clickTab('kelengkapan_pasien')">
                                Dokumen Kelengkapan Pasien
                            </div>
                        </div>

                    @endif





                    {{-- <div class="row">
                         <div class="left-tab" id="tab-riwayat" onclick="clickTab('riwayat')">
                             Riwayat
                         </div>
                     </div>--}}


                </div>
                @if(Auth::user()->level_user=="radiologi")
                    <div class="col-lg-11">
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
                    <div class="col-lg-11">
                        <div class="row">
                            <div class="col-lg-12 pl-0 pr-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="panel-assesment">
                                            <h2 class="text-black">Pengkajian Awal Pasien</h2>
                                            <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
                                            <hr>
                                            <div class="text-black" style="font-size: 14px">
                                                <form id="entry_asesmen">
                                                    @csrf
                                                    <div id="assesment_1">
                                                        @include('new_perawat.assesment.entry')
                                                    </div>
                                                    <div id="assesment_2">
                                                        @include('new_perawat.assesment.entry_intervensi')
                                                    </div>
                                                    <div id="assesment_3">
                                                        @include('new_perawat.assesment.entry_skrinning_gizi')
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="panel-soap">
                                            <h2 class="text-black">Catatan Perkembangan Pasien Terintegrasi</h2>
                                            <h6>SOAP terakhir : <span id="last-soap" class="font-weight-bold">-</span></h6>
                                            <hr>
                                            <div class="text-black" style="font-size: 14px">
                                                @include('new_perawat.soap.entry')
                                            </div>
                                        </div>
                                        <div id="panel-assesment-dewasa">
                                            <h2 class="text-black">Pengkajian Awal Pasien Dewasa</h2>
                                            <small class="text-danger">Harus dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap</small>
                                            <hr>
                                            {{--   <div class="text-black" style="font-size: 14px">
                                                   @include('new_perawat.assesment.entry_dewasa')
                                               </div>--}}
                                            <form id="form_assesment_dewasa">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.assesment.entry_dewasa')
                                                </div>
                                            </form>
                                        </div>

                                        <div id="panel-assesment-anak">
                                            <h2 class="text-black">Pengkajian Awal Pasien Anak</h2>
                                            <small class="text-danger">Harus dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap</small>
                                            <hr>
                                            <form id="form_assesment_anak">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.anak.entry_assesmen_anak')
                                                </div>
                                            </form>
                                        </div>

                                        <div id="panel-gizi-dewasa">
                                            <h2 class="text-black">Assesment Gizi Dewasa</h2>
                                            <hr>
                                            <form id="form_assesment_gizi_dewasa">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.gizi.entry_dewasa')
                                                </div>
                                                <br><hr>
                                                <h2 class="text-black">Asuhan Gizi Dewasa</h2>
                                                <hr>
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.gizi.entry_asuhan_dewasa')
                                                </div>
                                            </form>
                                        </div>
                                        <div id="panel-riwayat">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baru-asper-tab" data-toggle="tab" href="#baru-asper" role="tab" aria-controls="baru-asper" aria-selected="false">Assesmen Klinik Hari Ini</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="riwayat-soapdok-tab" data-toggle="tab" href="#riwayat-soapdok" role="tab" aria-controls="riwayat-soapdok" aria-selected="false">Riwayat CPPT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="riwayat-asdok-tab" data-toggle="tab" href="#riwayat-asdok" role="tab" aria-controls="riwayat-asdok" aria-selected="false">Riwayat Asesmen Klinik</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="riwayat-penunjang-tab" data-toggle="tab" href="#riwayat-penunjang" role="tab" aria-controls="riwayat-penunjang" aria-selected="false">Riwayat Penunjang</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="riwayat-resume-tab" data-toggle="tab" href="#riwayat-resume" role="tab" aria-controls="riwayat-resume" aria-selected="false">Riwayat Resume</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="baru-asper" role="tabpanel" aria-labelledby="baru-asper-tab">
                                                    @include('new_perawat.assesment.show')
                                                </div>
                                                <div class="tab-pane fade" id="riwayat-soapdok" role="tabpanel" aria-labelledby="riwayat-soapdok-tab">
                                                    @include('new_perawat.soap.riwayat')
                                                </div>
                                                <div class="tab-pane fade" id="riwayat-asdok" role="tabpanel" aria-labelledby="riwayat-asdok-tab">
                                                    @include('new_perawat.assesment.riwayat')
                                                </div>
                                                <div class="tab-pane fade" id="riwayat-penunjang" role="tabpanel" aria-labelledby="riwayat-penunjang-tab">
                                                    @include('new_dokter.penunjang.index')
                                                </div>
                                                <div class="tab-pane fade" id="riwayat-resume" role="tabpanel" aria-labelledby="riwayat-resume-tab">
                                                    @include('new_dokter.resume.riwayat')
                                                </div>
                                            </div>
                                            @include('new_perawat.soap.show')
                                        </div>

                                        <div id="panel-nursing">

                                        </div>

                                        <div id="panel-checklist">

                                        </div>

                                        <div id="panel-resiko-jatuh">
                                            @include('new_perawat.resiko_jatuh.form_resiko_jatuh')
                                        </div>


                                        <div id="panel-profile">
                                            <h2 class="text-black">Data Lengkap Pasien</h2>
                                            <hr>
                                            @include('new_perawat.profil.view')
                                        </div>

                                        <div id="panel-nyeri">
                                            @include('new_perawat.assesment.entry_skrinning_nyeri')
                                        </div>

                                        <div id="panel-edukasi">
                                            @include('new_perawat.edukasi.entry_edukasi_pasien')
                                        </div>

                                        <div id="panel-nursing-note">
                                            @include('new_perawat.nursing.nurse_note_new')
                                        </div>

                                        <div id="panel-physician-team">
                                            @include('new_perawat.physician_team.entry_physician_team')
                                        </div>

                                        <div id="panel-transfer-internal">
                                            <h2 class="text-black">Tranfer Internal Pasien</h2>
                                            <hr>
                                            <form id="form_transfer_internal">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.transfer_internal.entry')
                                                </div>
                                            </form>
                                        </div>
                                        <div id="panel-cathlab">
                                            <h2 class="text-black">Patient Safety Checklist Cath Lab</h2>
                                            <hr>
                                            <form id="form_cathlab">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.cath_lab.entry')
                                                </div>
                                            </form>
                                        </div>
                                        <div id="panel-pra-tindakan">
                                            <h2 class="text-black">CATATAN KEPERAWATAN PRA TINDAKAN KATERISASI/ANGIOGRAFI/ANGIOPLASTI</h2>
                                            <hr>
                                            <form id="form_pra_tindakan">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.catatan_keperawatan.entry_pra_tindakan')
                                                </div>
                                            </form>
                                        </div>

                                        <div id="panel-intra-tindakan">

                                            <form id="form_intra_tindakan">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.catatan_keperawatan_intra.entry_intra_kateterisasi')
                                                </div>
                                            </form>
                                        </div>

                                        <div id="panel-paska-tindakan">
                                            @include('new_perawat.catatan_keperawatan_intra.paska_kateterisasi_cathlab')
                                        </div>

                                        <div id="panel-observasi-paska">
                                            @include('new_perawat.catatan_keperawatan_intra.lembar_obvervasi_paska')
                                        </div>

                                        <div id="panel-intra-hemodinamik">

                                            <form id="form_intra_hemodinamik">
                                                @csrf
                                                <div class="text-black" style="font-size: 14px">
                                                    @include('new_perawat.catatan_keperawatan_intra.pemantauan_hemodinamik_intra')
                                                </div>
                                            </form>
                                        </div>


                                        <div id="panel-admin-nurse">
                                            @include('new_perawat.admin_nurse.order_admin_nurse')
                                        </div>
                                        <div id="panel-obgyn">
                                            <h2 class="text-black">Pengkajian Obgyn</h2>
                                            <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
                                            <hr>

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="obgyn_1-tab" data-toggle="tab" href="#obgyn_1" role="tab" aria-controls="obgyn_1-tab" aria-selected="false">
                                                        Assesment Awal</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="obgyn_2-tab" data-toggle="tab" href="#obgyn_2" role="tab" aria-controls="obgyn_2-tab" aria-selected="false">
                                                        Skor Sad Person</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_3-tab" data-toggle="tab" href="#obgyn_3" role="tab" aria-controls="obgyn_3-tab" aria-selected="false">
                                                        Riwayat Menstruasi</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_4-tab" data-toggle="tab" href="#obgyn_4" role="tab" aria-controls="obgyn_4-tab" aria-selected="false">
                                                        Riwayat Perkawinan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_5-tab" data-toggle="tab" href="#obgyn_5" role="tab" aria-controls="obgyn_5-tab" aria-selected="false">
                                                        Riwayat Kehamilan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_6-tab" data-toggle="tab" href="#obgyn_6" role="tab" aria-controls="obgyn_6-tab" aria-selected="false">
                                                        Skrinning Gizi</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_7-tab" data-toggle="tab" href="#obgyn_7" role="tab" aria-controls="obgyn_7-tab" aria-selected="false">
                                                        Skala Wong Beker</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_8-tab" data-toggle="tab" href="#obgyn_8" role="tab" aria-controls="obgyn_8-tab" aria-selected="false">
                                                        Behavior Pain Scale</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_9-tab" data-toggle="tab" href="#obgyn_9" role="tab" aria-controls="obgyn_9-tab" aria-selected="false">
                                                        ADL</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_10-tab" data-toggle="tab" href="#obgyn_10" role="tab" aria-controls="obgyn_10-tab" aria-selected="false">
                                                        Resiko Jatuh</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_11-tab" data-toggle="tab" href="#obgyn_11" role="tab" aria-controls="obgyn_11-tab" aria-selected="false">
                                                        Pengkajian Kulit</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_12-tab" data-toggle="tab" href="#obgyn_12" role="tab" aria-controls="obgyn_12-tab" aria-selected="false">
                                                        Kebutuhan Aktifitas</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_13-tab" data-toggle="tab" href="#obgyn_13" role="tab" aria-controls="obgyn_13-tab" aria-selected="false">
                                                        Nutrisi Cairan</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_14-tab" data-toggle="tab" href="#obgyn_14" role="tab" aria-controls="obgyn_14-tab" aria-selected="false">
                                                        Kebutuhan Eliminasi</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="obgyn_15-tab" data-toggle="tab" href="#obgyn_15" role="tab" aria-controls="obgyn_15-tab" aria-selected="false">
                                                        Laporan Persalinan</a>
                                                </li>
                                            </ul>

                                            <div class="text-black" style="font-size: 14px">
                                                <div class="tab-content" id="tabobgyn">
                                                    <div id="obgyn_1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="obgyn_1-tab">
                                                        @include('new_perawat.obgyn.pengkajian_awal_bidan')
                                                    </div>
                                                    <div id="obgyn_2" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_2-tab">
                                                        @include('new_perawat.obgyn.skor_sad_person')
                                                    </div>
                                                    <div id="obgyn_3" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_3-tab">
                                                        @include('new_perawat.obgyn.riwayat_menstruasi')
                                                    </div>
                                                    <div id="obgyn_4" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_4-tab">
                                                        @include('new_perawat.obgyn.status_perkawinan')
                                                    </div>
                                                    <div id="obgyn_5" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_5-tab">
                                                        @include('new_perawat.obgyn.riwayat_kehamilan')
                                                    </div>
                                                    <div id="obgyn_6" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_6-tab">
                                                        @include('new_perawat.obgyn.skrinning_gizi_obgyn')
                                                    </div>

                                                    <div id="obgyn_7" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_7-tab">
                                                        @include('new_perawat.obgyn.skala_wong_baker')
                                                    </div>

                                                    <div id="obgyn_8" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_8-tab">
                                                        @include('new_perawat.obgyn.behavior_pain_scale')
                                                    </div>

                                                    <div id="obgyn_9" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_9-tab">
                                                        @include('new_perawat.obgyn.form_adl')
                                                    </div>

                                                    <div id="obgyn_10" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_10-tab">
                                                        @include('new_perawat.obgyn.skrining_resiko_jatuh_obgyn')
                                                    </div>

                                                    <div id="obgyn_11" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_11-tab">
                                                        @include('new_perawat.obgyn.pengkajian_kulit')
                                                    </div>

                                                    <div id="obgyn_12" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_12-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_aktifitas')
                                                    </div>
                                                    <div id="obgyn_13" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_13-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_nutrisi_cairan')
                                                    </div>
                                                    <div id="obgyn_14" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_14-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_eliminasi')
                                                    </div>

                                                    <div id="obgyn_15" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_15-tab">
                                                        @include('new_perawat.obgyn.laporan_persalinan')
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="panel-bedah">
                                            <h2 class="text-black">Pengkajian Bedah</h2>
                                            <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
                                            <hr>

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="bedah_1-tab" data-toggle="tab" href="#bedah_1" role="tab" aria-controls="bedah_1-tab" aria-selected="false">
                                                        Assesment Awal</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="bedah_2-tab" data-toggle="tab" href="#bedah_2" role="tab" aria-controls="bedah_2-tab" aria-selected="false">
                                                        Skor Sad Person</a>
                                                </li>



                                                <li class="nav-item">
                                                    <a class="nav-link " id="bedah_6-tab" data-toggle="tab" href="#bedah_6" role="tab" aria-controls="bedah_6-tab" aria-selected="false">
                                                        Skrinning Gizi</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="bedah_7-tab" data-toggle="tab" href="#bedah_7" role="tab" aria-controls="bedah_7-tab" aria-selected="false">
                                                        Skala Wong Beker</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="bedah_8-tab" data-toggle="tab" href="#bedah_8" role="tab" aria-controls="bedah_8-tab" aria-selected="false">
                                                        Behavior Pain Scale</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="bedah_9-tab" data-toggle="tab" href="#bedah_9" role="tab" aria-controls="bedah_9-tab" aria-selected="false">
                                                        ADL</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="bedah_10-tab" data-toggle="tab" href="#bedah_10" role="tab" aria-controls="bedah_10-tab" aria-selected="false">
                                                        Resiko Jatuh</a>
                                                </li>


                                            </ul>

                                            <div class="text-black" style="font-size: 14px">
                                                <div class="tab-content" id="tabbedah">
                                                    <div id="bedah_1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="obgyn_1-tab">
                                                        @include('new_perawat.obgyn.pengkajian_awal_bidan')
                                                    </div>
                                                    <div id="bedah_2" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_2-tab">
                                                        @include('new_perawat.obgyn.skor_sad_person')
                                                    </div>
                                                    <div id="bedah_3" class="tab-pane fade" role="tabpanel" aria-labelledby="obgyn_3-tab">
                                                        @include('new_perawat.obgyn.riwayat_menstruasi')
                                                    </div>
                                                    <div id="bedah_4" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_4-tab">
                                                        @include('new_perawat.obgyn.status_perkawinan')
                                                    </div>
                                                    <div id="bedah_5" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_5-tab">
                                                        @include('new_perawat.obgyn.riwayat_kehamilan')
                                                    </div>
                                                    <div id="bedah_6" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_6-tab">
                                                        @include('new_perawat.obgyn.skrinning_gizi_obgyn')
                                                    </div>

                                                    <div id="bedah_7" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_7-tab">
                                                        @include('new_perawat.obgyn.skala_wong_baker')
                                                    </div>

                                                    <div id="bedah_8" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_8-tab">
                                                        @include('new_perawat.obgyn.behavior_pain_scale')
                                                    </div>

                                                    <div id="bedah_9" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_9-tab">
                                                        @include('new_perawat.obgyn.form_adl')
                                                    </div>

                                                    <div id="bedah_10" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_10-tab">
                                                        @include('new_perawat.obgyn.skrining_resiko_jatuh_obgyn')
                                                    </div>

                                                    <div id="bedah_11" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_11-tab">
                                                        @include('new_perawat.obgyn.pengkajian_kulit')
                                                    </div>

                                                    <div id="bedah_12" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_12-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_aktifitas')
                                                    </div>
                                                    <div id="bedah_13" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_13-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_nutrisi_cairan')
                                                    </div>
                                                    <div id="bedah_14" class="tab-pane fade " role="tabpanel" aria-labelledby="obgyn_14-tab">
                                                        @include('new_perawat.obgyn.form_kebutuhan_eliminasi')
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="panel-transfusi">
                                            <h2 class="text-black">Monitoring Transfusi Darah</h2>
                                            @include('new_perawat.transfusi_darah.montoring_transfusi')
                                        </div>

                                        <div id="panel-bayi">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="bayi_anamnesa-tab" data-toggle="tab" href="#bayi_anamnesa" role="tab" aria-controls="bayi_anamnesa-tab" aria-selected="false">
                                                        Anamnesa</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link " id="bayi_pemeriksaan-tab" data-toggle="tab" href="#bayi_pemeriksaan" role="tab" aria-controls="bayi_pemeriksaan-tab" aria-selected="false">
                                                        Pemeriksaan</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="tabbayi">
                                                <div id="bayi_anamnesa" class="tab-pane fade show active" role="tabpanel" aria-labelledby="bayi_anamnesa-tab">
                                                    @include('new_perawat.bayi.assesment_bayi_anamnesa')
                                                </div>

                                                <div id="bayi_pemeriksaan" class="tab-pane fade " role="tabpanel" aria-labelledby="bayi_pemeriksaan-tab">
                                                    @include('new_perawat.bayi.assesment_bayi_pemeriksaan')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    @include('new_perawat.modal.soap')
    @include('new_perawat.modal.draft')
    @include('new_perawat.modal.assesment')
@endsection

@section('scripts')
    <script src="{{asset('new_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('new_assets/js/barcode/JsBarcode.all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('sign/new_assets/js/jquery.signature.js')}}"></script>
    <script>
        $reg = "{{$reg}}";
        $subs = '';

        $(document).ready(function(){

            // JsBarcode("#p_barcode", $reg, {
            //     width: 1.5,
            //     height: 60,
            //     background: "transparent",
            //     marginTop: 2,
            //     marginBottom: 30,
            //     fontSize: 14,
            //     displayValue: false,
            // });
            latestAsper();

            $('div[id*="panel-"]').hide();

            $('div[id*="assesment_"]').hide();
            $('#assesment_1').show();
            /*$('div[id*="obgyn_"]').hide();
            $('#obgyn_1').show();*/

            $('#tb_2').hide();

            $('#tab-assesment').addClass('active');
            $('#panel-assesment').show();
            // $('#panel-assesment-dewasa').show();

            $('#skrining-nyeri').hide();
            $('input[name="nyeri_status"]').change(function(){
                if (this.value == 'Ya') {
                    $('#skrining-nyeri').slideDown();
                }else {
                    $('#skrining-nyeri').slideUp();
                }
            });

            $('#btn-reset-asses').click(function(){
                $('#entry_asesmen')[0].reset();
            });

            $(".img_skala").click(function(e){
                value= $(this).data("value");
                $("#img_skala .img_skala").removeClass("active");
                $(this).addClass("active");

                $("#nyeri_skala").val(value);

                outputUpdateWithDesc(value);

            });


            $('#btn-add-soap').click(function(){
                $('#modalSOAP').modal('show');
                $('#panel-lainnya').show();
            });

            $('body').on('click', '.btn_diagper', function(){
                addRowDiagper();
            });

            $('body').on('click', '.btn_remove_diagper', function(){
                $id = $(this).data('id');
                $('.row_item_diagper_'+$id).remove();
            });

            $('body').on('click','.btn_interper',function(){
                $kode = $(this).data('id');

                addRowInterper($kode)
            });

            $('body').on('click', '.btn_remove_interper', function(){
                $id = $(this).data('id');
                $('.row_item_interper_'+$id).remove();
            });

            function latestAsper(){
                $.ajax({
                    url: '{{url("auth/api/perawat/assesment/latest")}}/'+$subs,
                    type: 'GET',
                    dataType: 'json',
                    success: function(resp){
                        if (resp[1] == 200) {
                            res = resp[0];
                            $tgl_assesment = moment(res.created_at).format('DD-MM-Y H:mm:ss');

                            $('#last-asses').text($tgl_assesment+' Oleh '+res.name);

                            if (res.nyeri_status == 'Ya') {
                                $('#skrining-nyeri').slideDown();
                            }else {
                                $('#skrining-nyeri').slideUp();
                            }

                            setChecked('asper_kesadaran', res.asper_kesadaran);
                            setChecked('asper_kondisi_umum', res.asper_kondisi_umum);
                            $('input[name="asper_kondisi_umum_lain"]').val(res.asper_kondisi_umum_lain);
                            $('input[name="asper_tekanan_darah"]').val(res.asper_tekanan_darah);
                            $('input[name="asper_nadi"]').val(res.asper_nadi);
                            $('input[name="asper_suhu"]').val(res.asper_suhu);
                            $('input[name="asper_pernapasan"]').val(res.asper_pernapasan);
                            $('input[name="asper_tinggi_bdn"]').val(res.asper_tinggi_bdn);
                            $('input[name="asper_berat_bdn"]').val(res.asper_berat_bdn);
                            $('input[name="asper_hpht"]').val(res.asper_hpht);
                            $('input[name="asper_tp"]').val(res.asper_tp);
                            checkbox('asper_kbthn_khusus[]', JSON.parse(res.asper_kbthn_khusus));
                            $('input[name="asper_kbthn_khusus_lain"]').val(res.asper_kbthn_khusus_lain);
                            setChecked('asper_riwayat_alergi', res.asper_riwayat_alergi);
                            setChecked('nyeri_status', res.nyeri_status);
                            setChecked('nyeri_durasi_waktu', res.nyeri_durasi_waktu);
                            $('input[name="nyeri_penyebab"]').val(res.nyeri_penyebab);
                            checkbox('nyeri_deskripsi[]', JSON.parse(res.nyeri_deskripsi));
                            $('input[name="nyeri_deskripsi_lain"]').val(res.nyeri_deskripsi_lain);
                            $('input[name="nyeri_penyebab_b"]').val(res.nyeri_penyebab_b);
                            setChecked('nyeri_skala_ukur', res.nyeri_skala_ukur);
                            $('input[name="nyeri_skala"]').val(res.nyeri_skala);
                            $('input[name="nyeri_waktu"]').val(res.nyeri_waktu);
                            setChecked('nyeri_frekuensi', res.nyeri_frekuensi);
                            $('input[name="asper_riwayat_alergi_lain"]').val(res.asper_riwayat_alergi_lain);
                            setChecked('asper_brjln_seimbang', res.asper_brjln_seimbang);
                            setChecked('asper_altban_duduk', res.asper_altban_duduk);
                            setChecked('asper_hasil', res.asper_hasil);
                            checkbox('asper_keluhan_nutrisi[]', JSON.parse(res.asper_keluhan_nutrisi));
                            $('input[name="asper_keluhan_nutrisi_lain"]').val(res.asper_keluhan_nutrisi_lain);
                            setChecked('asper_haus_berlebih', res.asper_haus_berlebih);
                            setChecked('asper_mukosa_mulut', res.asper_mukosa_mulut);
                            setChecked('asper_turgor_kulit', res.asper_turgor_kulit);
                            setChecked('asper_edema', res.asper_edema);
                            checkbox('asper_status_emosi[]', JSON.parse(res.asper_status_emosi))
                            $('input[name="asper_status_emosi_lain"]').val(res.asper_status_emosi_lain);
                            setChecked('asper_kondisi_umum_b', res.asper_kondisi_umum_b);
                            setChecked('asper_hambatan_ekonomi', res.asper_hambatan_ekonomi);
                            $('input[name="asper_hambatan_ekonomi_lain"]').val(res.asper_hambatan_ekonomi_lain);
                            setChecked('asper_penurunan_bb_dewasa', res.asper_penurunan_bb_dewasa);
                            setChecked('asper_penurunan_nafsu_dewasa', res.asper_penurunan_nafsu_dewasa);
                            $('input[name="asper_kategori_dewasa"]').val(res.asper_kategori_dewasa);
                            $('input[name="asper_skor_dewasa"]').val(res.asper_skor_dewasa);
                            setChecked('asper_kurus_anak', res.asper_kurus_anak);
                            setChecked('asper_penurunan_bb_anak', res.asper_penurunan_bb_anak);
                            setChecked('asper_kondisi_anak', res.asper_kondisi_anak);
                            setChecked('asper_penyakit_anak', res.asper_penyakit_anak);
                            $('input[name="asper_skor_anak"]').val(res.asper_skor_anak);
                            checkbox('asper_sebab_malnutrisi[]', JSON.parse(res.asper_sebab_malnutrisi));
                            $('input[name="asper_sebab_malnutrisi_lain"]').val(res.asper_sebab_malnutrisi_lain);

                            $('.table-kebidanan #hpht').text(res.asper_hpht);
                            $('.table-kebidanan #tp').text(res.asper_tp);

                            $('#form-entry-soap #assesment').html('');
                            $('#form-entry-soap #planning').html('');

                            $object = 'TD : '+res.asper_tekanan_darah+'\n'+
                                'Nadi : '+res.asper_nadi+'\n'+
                                'Suhu : '+res.asper_suhu+'\n'+
                                'Pernapasan : '+res.asper_pernapasan+'\n'+
                                'TB : '+res.asper_tinggi_bdn+'\n'+
                                'BB : '+res.asper_berat_bdn+'\n'+
                                res.kebidanan_gravida+'\n'+
                                res.kebidanan_partus+'\n'+
                                res.kebidanan_abortus+'\n';

                            $('#form-entry-soap #object').val($object);

                            $.each(res.intervensi, function(i, data){
                                checkbox('pintervensi_intervensi[]', data);

                                $('#form-entry-soap #planning').append('-  '+data.item_nama+' ('+data.intervensi_nama+') '+'\n');
                            });
                            $.each(res.masalah, function(i, data){
                                checkbox('pmasalah_masalah[]', data);

                                $('#form-entry-soap #assesment').append('-  '+data.masalah_nama+'\n');
                            });

                            $masalah = JSON.parse(res.asper_masalah);
                            $intervensi_edukasi = JSON.parse(res.asper_intervensi_edukasi);
                            $intervensi_observasi = JSON.parse(res.asper_intervensi_observasi);
                            $intervensi_kolaborasi = JSON.parse(res.asper_intervensi_kolaborasi);
                            $intervensi_teraupetik = JSON.parse(res.asper_intervensi_teraupetik);

                            if ($masalah) {
                                rowColumn($masalah, 'masalah', 'diagper');
                            }
                            if ($intervensi_edukasi) {
                                rowColumn($intervensi_edukasi, 'intervensi_Edukasi', 'interper', '_Edukasi');
                            }
                            if ($intervensi_observasi) {
                                rowColumn($intervensi_observasi, 'intervensi_Observasi', 'interper', '_Observasi');
                            }
                            if ($intervensi_kolaborasi) {
                                rowColumn($intervensi_kolaborasi, 'intervensi_Kolaborasi', 'interper', '_Kolaborasi');
                            }
                            if ($intervensi_teraupetik) {
                                rowColumn($intervensi_teraupetik, 'intervensi_Teraupetik', 'interper', '_Teraupetik');
                            }

                        }
                    }
                });
            }

            function rowColumn(data, field, classes, code = ''){
                $('.row_'+classes+''+code).html('');

                var newCode = code.replace(/_/g, "");

                $.each(data, function(i, item){

                    if (item != null) {
                        item_name = item;
                    } else {
                        item_name = '';
                    }

                    if (i == 0) {
                        $field = '<div class="input-group mb-3 item_row_'+classes+'">'+
                            '<input type="text" class="form-control" name="p'+field+'_lain[]" value="'+item_name+'">'+
                            '<span class="input-group-text bg-primary text-white btn_'+classes+'" data-id="'+newCode+'" style="cursor: pointer;" id="basic-addon2"><i class="fas fa-plus"></i></span>'+
                            '</div>';
                    } else {
                        $field = '<div class="row_item_'+classes+'_'+i+'">'+
                            '<div class="input-group mb-3">'+
                            '<input type="text" class="form-control" name="p'+field+'_lain[]" value="'+item_name+'">'+
                            '<span class="input-group-text bg-danger text-white btn_remove_'+classes+'" data-id="'+i+'" style="cursor: pointer;" id="basic-addon2"><i class="fas fa-times"></i></span>'+
                            '</div>'
                        '</div>';
                    }

                    $('.row_'+classes+''+code).append($field);

                    if (item != null) {
                        if (classes == 'diagper') {
                            $('#form-entry-soap #assesment').append('-  '+item+'\n');
                        } else {
                            $('#form-entry-soap #planning').append('-  '+item+'('+newCode+')\n');
                        }
                    }
                });
            }

            $.ajax({
                url: '{{url("auth/api/registrasi/data_perawat_care")}}',
                type: 'GET',
                dataType: 'json',
                data: {
                    reg_no: $reg,
                },
                success: function(resp){
                    $('.bubble-alergi').hide();
                    $('.bubble-resiko').hide();
                    $('.blink').hide();

                    console.log(resp)

                    $resp1 = resp[1];
                    var resp = resp[0];
                    if (resp != '') {
                        res = resp[0];

                        if (res.reg_jk == '0001^M') {
                            $jk = 'Laki-laki';
                        } else if (res.reg_jk == '0001^F') {
                            $jk = 'Perempuan';
                        }

                        $tgl_lahir = moment(res.reg_tgl_lahir).format('DD/MM/Y');
                        $umur = moment(res.reg_tgl_lahir).format('MM/DD/Y');

                        if ($resp1 != null) {
                            if ($resp1.p_alergi == 1) {
                                $('.bubble-alergi').show();
                                $('.blink').show();
                                $('.bubble-alergi').attr('title', 'alergi : '+$resp1.p_alergi_nama);
                            }
                            if ($resp1.p_resiko_jatuh == 1) {
                                $('.bubble-resiko').show();
                                $('.blink').show();
                                $('.bubble-resiko').attr('title', 'resiko jatuh : '+$resp1.p_resiko_nama);
                            }
                        }

                        $('#p_nama').text(res.reg_nama);
                        $('#p_medrec').text(res.reg_medrec);
                        $('#p_tgl_lahir').text($tgl_lahir);
                        $('#p_jk').text($jk);
                        $('#p_umur').text(getAge($umur));
                        $('#p_tgl_kunjungan').text(res.reg_tgl);
                        $('#p_dokter').text(res.reg_dokter);
                        $('#p_poli').text(res.poli_nama);

                        $('#profile_nama').text(res.reg_nama);
                        $('#profile_medrec').text(res.reg_medrec);
                        $('#profile_tgl_lahir').text($tgl_lahir);
                        $('#profile_jk').text($jk);
                        $('#profile_umur').text(getAge($umur));
                        $('#profile_tgl_kunjungan').text(res.reg_tgl);
                        $('#profile_dokter').text(res.reg_dokter);
                        $('#profile_poli').text(res.poli_nama);
                        $('#profile_pjawab').text(condition(res.reg_pjawab));
                        $('#profile_alamat').text(condition(res.alamat));
                        $('#profile_kota').text(condition(res.kota));
                        $('#profile_hp').text(condition(res.MobilePhoneNo1));
                        $('#profile_telp').text(condition(res.MobilePhoneNo2));
                        $('#profile_nik').text(condition(res.SSN));
                        $('#profile_ayah').text(condition(res.nama_ayah));
                        $('#profile_ibu').text(condition(res.nama_ibu));
                        $('#profile_keluarga').text(condition(res.nama_keluarga));
                    }
                }
            });

            $('#save_asesmen').click(function(){
                $skor_dewasa = $('#total_skor_dewasa').text();
                $kategori_dewasa = $('#kategori').text();
                $total_skor_anak = $('#total_skor_anak').text();
                $.ajax({
                    url: '{{url("auth/api/perawat/assesment/store")}}',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#entry_asesmen').serialize(),
                    success: function(resp){
                        if (resp == 404) {
                            alert('Anda tidak punya akses untuk menyimpan asesmen');
                        } else {
                            alert('Data asesmen berhasil disimpan');
                            latestAsper();
                        }
                    }
                });
            });

            $('body').on('click','#btn-save-verif', function(){
                $posisi = $(this).data('posisi');
                $id = $(this).data('id');
                $value = $('[name="soapdok_verifikasi_'+$posisi+'_'+$id+'"]').val();

                $.ajax({
                    url: '{{url("")}}/auth/api/dokter/soap/verif',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{csrf_token()}}",
                        soapdok_id: $id,
                        soapdok_posisi: $posisi,
                        soapdok_verifikasi: $value,
                    },
                    success: function(resp){
                        if (resp == 200) {
                            latestSoapdok($subs, '#table-cppt-perawat');
                        }
                    }
                });
            });

            $('body').on('click', '#draft_data', function(){

                if (this.checked) {

                    $jenis = $(this).data('jenis');
                    $name = $(this).data('name');
                    $kategori = $(this).data('kategori');

                    $data = [];

                    // Initializing array with Checkbox checked values
                    $("input[name='"+$name+"[]']").each(function(){
                        $data.push(this.value);
                    });

                    $.ajax({
                        url: '{{url("")}}/auth/api/perawat/assesment/store_draft',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            draft_nama: $data,
                            draft_jenis: $jenis,
                            draft_kategori: $kategori,
                        },
                        success: function(resp){
                            if (resp == 200) {
                                $('#text_draft_'+$name).text('Tersimpan di draft');
                            }
                        }
                    });
                }

            });

            $('body').on('click', '#draft_button', function(){
                $('#modalDraft').modal('show');

                $jenis = $(this).data('jenis');
                $kategori = $(this).data('kategori');

                $('.draft_title').text('Draft '+$jenis);

                var table_draft = $('#table-draft').DataTable( {
                    processing: false,
                    serverSide: false,
                    scrollX: false,
                    autoWidth: true,
                    pageLength: 10,
                    bDestroy: true,
                    ajax: {
                        url: "{{url('')}}/auth/api/perawat/assesment/data_draft",
                        type: "POST",
                        dataSrc:"",
                        data: {
                            draft_jenis: $jenis,
                            draft_kategori: $kategori,
                        },
                    },
                    columns:[
                        { data: "draft_nama",  class: 'text-center',render:function(data, type, row){
                                return '<input type="checkbox" style="zoom: 1.2" id="check-draft" class="check_draft_'+row['draft_id']+'" data-id="'+row['draft_id']+'" data-nama="'+data+'" data-jenis="'+row['draft_jenis']+'" data-kategori="'+row['draft_kategori']+'">';
                            }},
                        { data: 'draft_nama'},
                        { data: "draft_jenis" },
                        { data: "draft_kategori" },
                        { data: "name" },
                    ],
                    "order": [[0, 'asc']],
                });
            });

            $('body').on('click', '#check-draft', function(){
                $nama = $(this).data('nama');
                $id = $(this).data('id');
                $jenis = $(this).data('jenis');
                $kategori = $(this).data('kategori');

                if ($jenis == 'masalah') {

                    if (this.checked) {
                        addRowDiagper($id, $nama);
                    } else {
                        $('.row_item_diagper_'+$id).remove();
                    }

                } else if ($jenis == 'intervensi') {

                    if (this.checked) {
                        addRowInterper($kategori, $id, $nama);
                    } else {
                        $('.row_item_interper_'+$id).remove();
                    }

                }

            });

            $('#btn-save-soap').click(function(){
                $.ajax({
                    url: '{{route('add.soap.new.perawat')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form-entry-soap').serialize()+"&soaper_perawat="+"{{auth()->user()->perawat_id}}"+'&nama_ppa='+"{{auth()->user()->name}}&med_rec_no="+medrec,
                    success: function(resp){
                        if (resp == 404) {
                            alert('Anda tidak punya akses untuk menyimpan asesmen');
                        } else {
                            alert('Data SOAP berhasil disimpan');
                            $('#modalSOAP').modal('hide');
                            //latestSoapdok($subs, '#table-cppt-perawat');
                            //orderCPOE();
                            getSoapPerawat()
                        }
                    }
                });

                endServiceTime($subs);
            });

            function setSkala(e){value = $(e).val();

                $img = $(e).parent().parent().parent().parent().find(".img_skala");

                $.each($img, function(i,img){
                    $(img).removeClass("active");

                    val = $(img).data("value");
                    if (val==value){
                        $(img).addClass("active");
                    }
                })

                outputUpdateWithDesc(value);
            }});

        $('.reload-soap').click(function(){
            table_soaper.ajax.reload();
        });
        $('.reload-assesment').click(function(){
            table_asper.ajax.reload();
        });

        $('body').on('click','.gizi_dewasa',function(){


            var sum = 0;
            $('.gizi_dewasa:checked').each(function() {
                sum += 1*($(this).data('id'));
            });
            $('#total_skor_dewasa').val(sum);

            if (sum >= 0 && sum <= 1) {
                $('#kategori').val('A | Status Gizi Baik');
            } else if (sum >= 2 && sum <= 3) {
                $('#kategori').val('B | Beresiko Malnutrisi');
            } else if (sum >= 4 && sum <= 5) {
                $('#kategori').val('C | Risiko Malnutrisi Tinggi');
            }
        });

        $('body').on('click','.gizi_anak',function(){


            var sum = 0;
            $('.gizi_anak:checked').each(function() {
                sum += 1*($(this).data('id'));
            });
            $('#total_skor_anak').val(sum);
        });

        $(".btn-export-riwayat-resume").click(function(e) {
            let file = new Blob([$('#export-riwayat-resume').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "riwayat_resume_pasien_rj_"+$medrec+".xls"}).appendTo("body").get(0).click();
            e.preventDefault();
        });

        $(".btn-export-resume").click(function(e) {
            let file = new Blob([$('#export-resume').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "resume_pasien_rj_"+$reg+".xls"}).appendTo("body").get(0).click();
            e.preventDefault();
        });

        $('#r-monitoring-panel').hide();
        $('#s-monitoring-hd').hide();

        $('div[id*="table-r-"]').hide();

        $('#search-r-form').change(function(){
            $id = $(this).val();
            $text = $(this).find(':selected').text();

            $('div[id*="table-r-"]').hide();
            $('#table-r-'+$id).show();
            $('#title-r').text($text);

        });

    </script>
    {{-- <script src="{{asset('new_assets/js/soap.js')}}"></script>
    <script src="{{asset('new_assets/js/cpoe.js')}}"></script> --}}
    <script src="{{asset('new_assets/js/perawat.js')}}"></script>
    <script>
        //load document get fluid balance transfusi with ajax
        $(document).ready(function() {
            console.log('load fluid')
            getFluidBalanceBaru();


            {{--$.ajax({--}}
            {{--    url: "{{ route('get.transfusi') }}",--}}
            {{--    type: "GET",--}}
            {{--    dataType: "json",--}}
            {{--    success: function(data) {--}}
            {{--        console.log(data.data);--}}
            {{--        var html = '';--}}
            {{--        var selectCairan=document.getElementById("cairan_transfusi");--}}
            {{--        for (var i = 0; i < data.data.length; i++) {--}}
            {{--            console.log(data.data[i]['jenis'])--}}
            {{--            var option=document.createElement('option');--}}
            {{--            option.value=data.data[i]['jenis'];--}}
            {{--            option.innerText=data.data[i]['jenis'];--}}
            {{--            //html += '<option value="' + data.data[i]['jenis'] + '">' + data.data[i]['jenis'] + '</option>';--}}
            {{--            selectCairan.appendChild(option);--}}
            {{--        }--}}

            {{--    }--}}
            {{--});--}}
        })
        function getFluidBalanceBaru(){
            $.ajax({
                url:"{{route('get.fluidbalance.baru')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    reg_no:regno,
                },
                success:function(data){

                    var dataFluid=data.data
                    var table=document.getElementById('table-fluid-balance')
                    console.log(table)
                    // for(var i=0;i<dataFluid.length;i++){
                    //     var fluid=dataFluid[i];
                    //     console.log(fluid)
                    //     var html='<tr>';
                    //     html+='<td>'+fluid['cairan_transfusi']+'</td>';
                    //     html+='<td>'+fluid['jumlah_transfusi']+'</td>';
                    //     html+='<td>'+fluid['minum']+'</td>';
                    //     html+='<td>'+fluid['sonde']+'</td>';
                    //     html+='<td>'+fluid['urine']+'</td>';
                    //     html+='<td>'+fluid['drain']+'</td>';
                    //     html+='<td>'+fluid['iwl_muntah']+'</td>';
                    //     html+='<td>'+fluid['jumlah']+'</td>';
                    //     html+='<td>'+fluid['tanggal_pemberian']+'</td>';
                    //     html+='</tr>';
                    //     table.append(html);
                    //     //console.log(table)
                    // }
                }
            })
        }
    </script>
    <script>
        function addFluidBalance(){
            //ajax add fluid balance baru
            $.ajax({
                url: "{{route('add.fluidbalance.new.perawat')}}",
                type: "POST",
                data: {
                    cairan_transfusi: $('#cairan_transfusi').val(),
                    jumlah_transfusi: $('#jumlah_transfusi').val(),
                    minum: $('#minum').val(),
                    sonde: $('#sonde').val(),
                    urine: $('#urine').val(),
                    drain: $('#drain').val(),
                    iwl_muntah: $('#iwl_muntah').val(),
                    jumlah: $('#jumlah').val(),
                    tanggal_pemberian: $('#tanggal_pemberian').val(),
                    _token: "{{ csrf_token() }}",
                    reg_no:regno,
                    med_rec:medrec
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getFluidBalanceBaru()
                    }else{
                        alert('gagal menyimpan data')
                    }

                }
            });
        }


    </script>


    <script>
        function simpanAssementSatu(){
            $.ajax({
                url: "{{route('add.assesmentawal')}}",
                type: "POST",
                data: $('#entry_asesmen').serialize()+"&medrec="+medrec,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }
                }
            })
        }

        function simpanAssementAnak(){
            $.ajax({
                url: "{{route('add.assesmentawalanak')}}",
                type: "POST",
                data: $('#form_assesment_anak').serialize()+"&medrec="+medrec,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }
                }
            })
        }

        function simpanMonitoringDarah(){
            $.ajax({
                url: "{{route('add.monitoringtransfusidarah')}}",
                type: "POST",
                data: $('#form-transfusi').serialize()+"&medrec="+medrec,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }
                }
            })
        }


    </script>
    <script>
        function addskrinninggizi(){
            $.ajax({
                url: "{{route('add.skrinninggizi')}}",
                type: "POST",
                data: $('#entry_asesmen').serialize()+"&medrec="+medrec,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }

                }
            })
        }
    </script>

    <script>
        function addskrinningnyeri(){
            $.ajax({
                url: "{{route('add.skrinningnyeri')}}",
                type: "POST",
                data: $('#entry-nyeri').serialize()+"&medrec="+medrec,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }

                }
            })
        }
    </script>


    <script>
        function addedukasipasien(){
            $.ajax({
                url: "{{route('add.edukasipasien')}}",
                type: "POST",
                data: $('#entry-edukasi').serialize()+"&medrec="+medrec+"&user_id="+{{auth()->user()->id}},
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                    }else{
                        alert('gagal menyimpan data')
                    }

                }
            })
        }
    </script>

    <script>
        function addNursingNote(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.nursing.note')}}",
                    type: "POST",
                    data: $('#form-nursing-note').serialize()+"&medrec="+medrec +"&reg_no="+regno,
                    success: function(data){
                        if(data.success==true){
                            console.log(data);
                            alert('data telah disimpan')
                            getNursingNote()
                        }else{
                            alert('gagal menyimpan data')
                        }

                    }
                })
            }

        }
        function getNursingNote(){
            $.ajax({
                type: "POST",
                data:{
                    "reg_no": regno,
                    "medrec_no":medrec,
                },

                url: "{{route('get.nursing.note')}}",
                /* data: {
                     "reg_no": regno,
                 },*/

                success: function(data) {
                    //console.log(data);
                    var dataJSON=data.data;
                    var bodyTable=document.getElementById('body-tindakan-perawat')
                    bodyTable.innerHTML='';
                    for(var i=0;i<dataJSON.length;i++){
                        var tr=document.createElement('tr')
                        var col1=document.createElement('td')
                        var col2=document.createElement('td')
                        var col3=document.createElement('td')
                        var col4=document.createElement('td')

                        col1.innerHTML=dataJSON[i]['tgl_note']
                        col2.innerHTML=dataJSON[i]['jam_note']
                        col3.innerHTML=dataJSON[i]['catatan']
                        col4.innerHTML=dataJSON[i]['id_nurse']
                        tr.appendChild(col1)
                        tr.appendChild(col2)
                        tr.appendChild(col3)
                        tr.appendChild(col4)
                        bodyTable.appendChild(tr)
                    }


                },
            });
        }
    </script>

    <script>
        function simpanchecklist(){
            $.ajax({
                url: "{{route('add.checklist')}}",
                type: "POST",
                data: $('#entry-checklist').serialize()+"&medrec="+medrec +"&reg_no="+regno,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        //refresh page
                        location.reload();
                    }else{
                        alert('gagal menyimpan data')
                    }

                }
            })
        }
    </script>

    <script>
        function checkAllCheckList(ele) {
            var checkboxes = document.getElementsByName('satu[]');
            var checkboxes2 = document.getElementsByName('dua[]');
            var checkboxes3 = document.getElementsByName('tiga[]');
            var checkboxes4 = document.getElementsByName('empat[]');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox'  && !(checkboxes[i].disabled) ) {
                        checkboxes[i].checked = true;
                    }
                }

                for (var i = 0; i < checkboxes2.length; i++) {
                    if (checkboxes2[i].type == 'checkbox'  && !(checkboxes2[i].disabled) ) {
                        checkboxes2[i].checked = true;
                    }
                }

                for (var i = 0; i < checkboxes3.length; i++) {
                    if (checkboxes3[i].type == 'checkbox'  && !(checkboxes3[i].disabled) ) {
                        checkboxes3[i].checked = true;
                    }
                }

                for (var i = 0; i < checkboxes4.length; i++) {
                    if (checkboxes4[i].type == 'checkbox'  && !(checkboxes4[i].disabled) ) {
                        checkboxes4[i].checked = true;
                    }
                }

            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }

                for (var i = 0; i < checkboxes2.length; i++) {
                    if (checkboxes2[i].type == 'checkbox') {
                        checkboxes2[i].checked = false;
                    }
                }

                for (var i = 0; i < checkboxes3.length; i++) {
                    if (checkboxes3[i].type == 'checkbox') {
                        checkboxes3[i].checked = false;
                    }
                }

                for (var i = 0; i < checkboxes4.length; i++) {
                    if (checkboxes4[i].type == 'checkbox') {
                        checkboxes4[i].checked = false;
                    }
                }
            }
        }
    </script>


    <script>
        function addTindakanPerawatIntra(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.tindakan.intra')}}",
                    type: "POST",
                    data: $('#form_intra_tindakan').serialize()+"&medrec="+medrec+"&user_id="+{{auth()->user()->id}}+"&regno="+regno,
                    success: function(data){
                        if(data.success==true){
                            console.log(data);
                            alert('data telah disimpan')
                            getTindakanPerawatIntra()
                        }else{
                            alert('gagal menyimpan data')
                        }

                    }
                })
            }

        }
    </script>
    <script>
        function addPemantauanIntra(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.pemantauan.intra')}}",
                    type: "POST",
                    data: $('#form_intra_hemodinamik').serialize()+"&medrec="+medrec+"&user_id="+{{auth()->user()->id}}+"&regno="+regno,
                    success: function(data){
                        if(data.success==true){
                            console.log(data);
                            alert('data telah disimpan')
                            //getPemantauanIntra()
                        }else{
                            alert('gagal menyimpan data')
                        }

                    }
                })
            }

        }
    </script>



@endsection

