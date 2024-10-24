@extends('new_templates.main')
@inject('nyaa_unv_function', 'App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController')

@section('styles')
<link rel="stylesheet" href="{{asset('new_assets/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('new_assets/css/new_styles.css')}}">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link href="{{asset('new_assets/sign/css/jquery.signature.css')}}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('')}}new_assetscss-masonry/files/css/labs.css"> --}}
<link rel="stylesheet" href="{{asset('')}}new_assets/css-masonry/files/css/masonry.css">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dokter</a></li>
        <li class="breadcrumb-item active" aria-current="page">Assesment</li>
    </ol>
</nav>

@if(isset($physician_team_role) && is_array($physician_team_role))
    @php
        $isKonsul = in_array('Konsul', $physician_team_role);
    @endphp

    @if ($isKonsul)
    <div class="alert alert-warning mb-3 blink" role="alert" onclick="clickTab('physician-team-dokter')">
        <i class="fa fa-exclamation-triangle mr-2"></i>Pasien memerlukan konsultasi, <span class="badge badge-info">Jawab Konsultasi</span> untuk menjawab permintaan konsultasi
    </div>
    @endif
@endif

@if (request()->has('tab') && request()->get('tab') == 'physician-team-dokter')
<script>
    $(document).ready(function() {
        clickTab('physician-team-dokter');
    });
</script>
@endif
<!-- <div class="row">
        <div class="col">
            <div class="tab-resume float-right" id="tab-resume" onclick="clickTab('resume')">
                Resume Pasien
            </div>
        </div>
    </div> -->
<div class="row">
    <div class="col-lg-10 pr-0">
        <div class="row">
            <div class="col-lg-2">
                @if(isset($myarea))
                <div class="row">
                    <div class="left-tab active" id="tab-soap" onclick="clickTab('soap')">
                        CPPT
                    </div>
                </div>

                @else
                <div class="row">
                    <div class="left-tab active" id="tab-assesment" onclick="clickTab('assesment')">
                        Pengkajian Awal
                    </div>
                </div>
                <div class="row">
                    <div class="left-tab" id="tab-edukasi" onclick="clickTab('edukasi')">
                        Edukasi
                    </div>
                </div>
                
                <div class="row">
                    <div class="left-tab" id="tab-soap" onclick="clickTab('soap')">
                        CPPT
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-pemeriksaan-penunjang" onclick="clickTab('pemeriksaan-penunjang')">
                        Hasil Pemeriksaan Penunjang
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-physician-team-dokter" onclick="clickTab('physician-team-dokter')">
                        Physician Team
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-persetujuan-penolakan" onclick="clickTab('persetujuan-penolakan')">
                        Persetujuan/Penolakan Tindakan Medis
                    </div>
                </div>
                
                <div class="row">
                    <div class="left-tab" id="tab-laporan-operasi" onclick="clickTab('laporan-operasi')">
                        Laporan Operasi
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-resume" onclick="clickTab('resume')">
                        Resume Pasien
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-pemulangan" onclick="clickTab('pemulangan')">
                        Discharge Planning
                    </div>
                </div>
                
                  
                
                {{-- <div class="row">--}}
                {{-- <div class="left-tab" id="tab-konsultasi" onclick="clickTab('konsultasi')">--}}
                {{-- Konsultasi--}}
                {{-- </div>--}}
                {{-- </div>--}}


                {{-- <div class="row">
                            <div class="left-tab" id="tab-tindakan" onclick="clickTab('tindakan')">
                                Tindakan/Operasi
                            </div>
                        </div>--}}

                

                

                <div class="row">
                    <div class="left-tab" id="tab-discharge" onclick="clickTab('discharge')">
                        Discharge
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-surat-rujukan" onclick="clickTab('surat-rujukan')">
                        Surat Rujukan
                    </div>
                </div>

                <div class="row">
                    <div class="left-tab" id="tab-riwayat" onclick="clickTab('riwayat')">
                        Riwayat
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-12 pl-0 pr-1">
                        <div class="card">
                            <div class="card-body">
                                {{-- <svg id="p_barcode" class="float-right"></svg> --}}
                                <div id="panel-assesment">


                                    @include('new_dokter.assesment.entry')
                                </div>
                                <div id="panel-soap">


                                    <h2 class="text-black">Catatan Perkembangan Pasien Terintegrasi</h2>
                                    <h6>SOAP terakhir : <span id="last-soap" class="font-weight-bold">-</span></h6>
                                    <hr>
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.soap.entry')
                                    </div>
                                    <hr />
                                    <div id="body-rekomendasi">
                                        <h2 class="text-black">Rekomendasi Paket</h2>
                                        <hr>
                                        <div class="text-black" style="font-size: 14px">
                                            @include('new_dokter.soap.rekomendasi')
                                        </div>
                                    </div>

                                </div>
                                <div id="panel-discharge">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.discharge.index')
                                    </div>
                                </div>
                                <div id="panel-edukasi">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_perawat.edukasi.components.edukasi_dokter')
                                        {{-- @include('new_dokter.edukasi') --}}
                                    </div>
                                </div>
                                <div id="panel-pemulangan">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.form.form_pemulangan_pasien')
                                    </div>
                                </div>

                                <div id="panel-pemeriksaan-penunjang">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.pemeriksaan_penunjang.index')
                                    </div>
                                </div>
                                <div id="panel-persetujuan-penolakan">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.persetujuan_penolakan.index')
                                    </div>
                                </div>

                                {{-- <div id="panel-pemulangan">
                                        <div class="text-black" style="font-size: 14px">
                                            @include('new_dokter.form.form_pemulangan_pasien')
                                        </div>
                                    </div>--}}
                                <div id="panel-resume">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.resume.index')
                                    </div>
                                </div>

                                <div id="panel-physician-team-dokter">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.physician_team.index')
                                    </div>
                                </div>

                                <div id="panel-surat-rujukan">
                                    <div class="text-black" style="font-size: 14px">
                                        @include('new_dokter.surat_rujukan.index')
                                    </div>
                                </div>

                                <div id="panel-riwayat">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="baru-asper-tab" data-toggle="tab" href="#baru-asper" role="tab" aria-controls="baru-asper" aria-selected="false">Assesmen Klinik Hari Ini</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="riwayat-edukasi-tab" data-toggle="tab" href="#riwayat-edukasi" role="tab" aria-controls="riwayat-edukasi" aria-selected="false">Riwayat Edukasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="riwayat-soapdok-tab" data-toggle="tab" href="#riwayat-soapdok" role="tab" aria-controls="riwayat-soapdok" aria-selected="false">Riwayat CPPT</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="riwayat-asdok-tab" data-toggle="tab" href="#riwayat-asdok" role="tab" aria-controls="riwayat-asdok" aria-selected="false">Riwayat Asesmen Klinik</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="riwayat-penunjang-tab" data-toggle="tab" href="#riwayat-penunjang" role="tab" aria-controls="riwayat-penunjang" aria-selected="false">Riwayat Penunjang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="riwayat-obat-tab" data-toggle="tab" href="#riwayat-obat" role="tab" aria-controls="riwayat-obat" aria-selected="false">Riwayat Obat</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="riwayat-resume-tab" data-toggle="tab" href="#riwayat-resume" role="tab" aria-controls="riwayat-resume" aria-selected="false">Riwayat Resume</a>
                                        </li> -->
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
                                        <div class="tab-pane fade" id="riwayat-obat" role="tabpanel" aria-labelledby="riwayat-obat-tab">
                                            @include('new_dokter.riwayat_dokter.riwayat_obat')
                                        </div>
                                        <div class="tab-pane fade" id="riwayat-resume" role="tabpanel" aria-labelledby="riwayat-resume-tab">
                                            @include('new_dokter.resume.riwayat')
                                        </div>
                                        <div class="tab-pane fade" id="riwayat-edukasi" role="tabpanel" aria-labelledby="riwayat-edukasi-tab">
                                            @include('new_dokter.riwayat_dokter.edukasi_dokter')
                                        </div>
                                    </div>
                                    @include('new_perawat.soap.show')
                                    @include('new_dokter.penunjang.show')
                                </div>
                                <div id="panel-profile">
                                    <h2 class="text-black">Data Lengkap Pasien</h2>
                                    <hr>
                                    @include('new_perawat.profil.view')
                                </div>

                                <div id="panel-laporan-operasi">
                                    <div class="d-flex justify-content-between">
                                        <h2>Laporan Operasi</h2>
                                        <a class="btn btn-sm btn-primary" href="{{ route('dokter.laporan-operasioutput', $reg) }}" target="_blank">Cetak Laporan</a>
                                    </div>
                                    <hr>
                                    @include('new_dokter.laporan-operasi.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
@include('new_dokter.modal.konsultasi')
@include('new_dokter.modal.hasil')
@include('new_dokter.modal.prescribe')
@include('new_dokter.modal.diagnosa')
@include('new_dokter.modal.billing')
@include('new_dokter.modal.resume')
@include('new_dokter.modal.soap')
@include('new_dokter.modal.multiorgan')
@include('new_dokter.modal.openDischarge')
@include('new_perawat.modal.assesment')
@include('new_dokter.modal.soap_history')
@endsection

@section('scripts')
<script src="{{asset('new_assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('new_assets/js/barcode/JsBarcode.all.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{asset('new_assets/sign/signature_pad.min.js')}}"></script>
@include('new_perawat-v2.assesment-js')
@include('new_perawat-v2.assesment-send-js')
<script>
    $reg = "{{$reg}}";
    $medrec = "{{$patient->reg_medrec}}";
    $subs = "";
    $hosted = '{{url("")}}'
    var $service_unit = '{{$dataPasien->currentLocation["ServiceUnitID"]}}'
    var $id_cppt = '{{$id_cppt}}'
    var selectedRoom = localStorage.getItem('pilihruang').split(',')
    var $id_dpjp = "{{$patient->reg_dokter}}"


    if (selectedRoom.length > 0) {
        getDetailRegistration(selectedRoom[0])
    }

    getAlertAlergi($reg)
    getAlertJatuh($reg)
    getAlertEWS($reg)

    getEdukasi('#formEdukasiDokter', 'dokter')

    $('#edukasi_anastesi_tab').on('click', function() {
        getEdukasiAnastesi();
    });

    function getEdukasiAnastesi(){
        $.ajax({
            url: $hosted + '/api/get-edukasi-anastesi',
            method: 'GET',
            data: {
                reg_no: $reg,
            },
            success: function(response) {
                // console.log(response);
                let edukasi = response.data_edukasi;
                let pasien = response.data_pasien;
                let ttd_dokter = ''; 
                let doktername = '{{auth()->user()->name}}';
                
                if (edukasi) { 
                    $('input[name="dilakukan_ke"][value="' + edukasi.dilakukan_ke + '"]').prop('checked', true);
                    $('input[name="tindakan"]').val(edukasi.tindakan);
                    $('input[name="jenis_anastesi"]').val(edukasi.jenis_anastesi);
                    $('input[name="tgl_ttd"]').val(edukasi.tgl_ttd);
                    $('input[name="nama_pihak_pasien"]').val(edukasi.nama_pihak_pasien);
                    $('input[name="nama_dokter"]').val(edukasi.nama_dokter);

                    let signaturePasienDataURL = edukasi.ttd_pihak_pasien;
                    $('#signature_pasien_anastesi').val(signaturePasienDataURL);
                    let $canvasPasien = $('[id*="signature-pad-pasien-anastesi"] canvas')[0];
                    if ($canvasPasien && signaturePasienDataURL) {
                        let signaturePadPasien = new SignaturePad($canvasPasien);
                        signaturePadPasien.fromDataURL(signaturePasienDataURL);
                    }

                    ttd_dokter = edukasi.ttd_dokter;

                }

                $('input[name="nama"]').val(pasien.PatientName);
                $('input[name="umur"]').val(pasien.DateOfBirth);
                $('input[name="jenis_kelamin"][value="' + pasien.GCSex + '"]').prop('checked', true);
                $('input[name="no_telp"]').val(pasien.MobilePhoneNo1);
                $('input[name="no_rekam_medis"]').val(pasien.reg_medrec);
                $('input[name="diagonsa"]').val(pasien.NM_ICD10);
                $('input[name="nama_dokter"]').val(doktername);


                let signatureDokterDataURL = ttd_dokter || "{{ auth()->user()->signature }}";
                $('#signature_dokter_anastesi').val(signatureDokterDataURL);
                let $canvasDokter = $('[id*="signature-pad-dokter-anastesi"] canvas')[0];
                if ($canvasDokter) {
                    let signaturePadDokter = new SignaturePad($canvasDokter);
                    signaturePadDokter.fromDataURL(signatureDokterDataURL);
                }
            },
        })
    }

    $('div[id*="panel-"]').hide();
    $('#panel-assesment').show();

    $('#odontogram_2').hide();

    $('#btn-reset-asses').click(function() {
        $('#form-entry-assesment textarea.form-control').val('');
        $('#form-entry-assesment input.form-control').val('');
        $('#form-entry-assesment input:checkbox').prop('checked', false);
        $('#form-entry-assesment input:radio').prop('checked', false);

        $('#last-asses').text('');
    });

    $('#btn-add-soap').click(function() {
        add_soap()
    });

    function getDetailRegistration(_room) {
        $.ajax({
            url: '{{url("")}}/dokter/data/patient/' + _room,
            dataType: 'json',
            data: {
                no_ajax: true,
                params: [{
                    key: 'm_registrasi.reg_no',
                    value: $reg
                }]
            },
            success: function(resp) {
                if (resp.length > 0) {
                    $.each(resp, function(i, item) {
                        let sessionData = {
                            reg_no: $reg,
                            roles: item.physician_team_role
                        }

                        sessionStorage.setItem('sessionData', JSON.stringify(sessionData))
                    })
                }
            }
        })
    }

    function add_soap() {
        const reg = '{{$dataPasien->reg_no}}';
        const rm = '{{$dataPasien->reg_medrec}}';
        const bed = '{{$dataPasien->currentLocation["BedID"]}}';
        const utama = '{{$dataPasien->reg_dokter}}';
        const soapdok_dokter = '{{ auth()->user()->dokter_id}}';
        const nama_ppa = '{{auth()->user()->name}}';

        let dataSession = JSON.parse(sessionStorage.getItem('sessionData'))

        if (!dataSession) {
            dataSession.roles = null
        }

        $.ajax({
            type: "post",
            url: "{{url('api/addSoap')}}",
            data: {
                "reg_no": reg,
                "dpjp_utama": utama,
                "med_rec": rm,
                "soapdok_dokter": soapdok_dokter,
                "nama_ppa": nama_ppa,
                "bed": bed,
                "bertindak_sebagai": dataSession.roles
            },
            dataType: "json",
            success: function(r) {
                if (r.success) {
                    $('#modalSOAP').modal('show');
                    clickTab('lab', 'Laboratorium')
                    //$('div[id*="panel-"]').hide();
                    $('div[id*="tab-"]').removeClass('active');

                    $('#panel-lab').show();
                    $('#tab-lab').addClass('active');
                    $('#soapdok_id').val(r.kode)
                    $('#cpoe_cppt').val(r.kode)

                    $('#title_cppt').text('Laboratorium');
                } else {
                    alert('Kesalahan Hubungi IT')
                }
            }
        });
    }

    $('[name="asdok_amnesis"]').change(function() {
        if (this.checked && this.value == 'orang lain hubungan dengan pasien') {
            $('[name="asdok_amnesis_lain"]').attr('readonly', false);
        } else {
            $('[name="asdok_amnesis_lain"]').attr('readonly', true);
        }
    });

    $('[name="asdok_multiorgan"]').change(function() {
        $val = $(this).val();

        if (this.checked) {
            $row_ = `
                    <div class="row mt-2" id="r_multiorgan_` + $val + `">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="multi_organ"><input type="text" name="multi_name[]" value="` + $val + `" style="border: none" readonly></label>
                                <textarea class="form-control" id="multi_organ" rows="4" name="multi_desc[]"></textarea>
                            </div>
                        </div>
                        ` + imageMultiOrgan($val) + `
                    </div>
                `;

            $('#desc-multiorgan').append($row_);
        } else {
            $('#r_multiorgan_' + $val).remove();
        }
    });

    $('body').on('click', '.img-multiorgan', function() {
        $('#modalMultiOrgan').modal('show');

        $img = $(this).attr('src')
        $('#v-img-multiorgan').attr('src', $img);
    })

    $(".btn-export-riwayat-resume").click(function(e) {
        let file = new Blob([$('#export-riwayat-resume').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "riwayat_resume_pasien_rj_" + $medrec + ".xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    $(".btn-export-resume").click(function(e) {
        let file = new Blob([$('#export-resume').html()], {
            type: "application/vnd.ms-excel"
        });
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "resume_pasien_rj_" + $reg + ".xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
    });

    function imageMultiOrgan($val) {
        if ($val == 'kepala') {
            $img = `
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_depan.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_samping.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                `;
        } else if ($val == 'leher') {
            $img = `
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_depan.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_samping.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                `;
        } else if ($val == 'ekstrimitas') {
            $img = `
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_atas.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `_bawah.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                `;
        } else if ($val == 'genitalia_{{$patient->pasien->GCSex == "0001^M" ? "pria" : "wanita"}}_anus') {
            $img = `
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/{{$patient->pasien->GCSex == "0001^M" ? "pria" : "wanita"}}_anus.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                `;
        } else {
            $img = `
                    <div class="col-lg-3">
                        <img class="img-multiorgan" style="cursor: pointer" src="{{asset('')}}new_assets/images/multi_organ/` + $val + `.jpg" alt="Gambar ` + $val + `" width="150px" height="130px">
                    </div>
                `;
        }

        return $img;
    }

    // function clickTab(tabId) {
    //     $('div[id*="panel-"]').hide();
    //     $('div[id*="tab-"]').removeClass('active');
        
    //     $('#panel-' + tabId).show();
    //     $('#tab-' + tabId).addClass('active');
    // }
</script>
<script>
    function addpemulanganpasien() {
        if (confirm('apakah anda ingin menyimpan data ini?')) {
            $.ajax({
                url: "{{route('add.pemulangan.pasien')}}",
                type: "POST",
                data: $('#entry-pemulangan').serialize() + "&medrec=" + medrec + "&regno=" + regno + "&user_id={{auth()->user()->id}}",
                success: function(data) {
                    if (data.success == true) {
                        alert('data berhasil disimpan');
                        //refresh page
                        location.reload();
                    } else {
                        alert('data gagal disimpan');
                    }
                }
            });
        }
    }
</script>

<!-- <script>
        //on load page
        $(document).ready(function(){
            //load data
            console.log("load pemeriksaan dokter")
            getPemeriksaanDokter();
        });

        function getPemeriksaanDokter(){
            $.ajax({
                url: "{{route('get.pemeriksaan.dokter')}}",
                type: "POST",
                data:{
                    reg_no:regno,

                },
                success: function(data){
                    if(data.success == true){
                        console.log(data);
                        var tablePemeriksaanDokter=document.getElementById('table-pemeriksaan-dokter')
                        tablePemeriksaanDokter.innerHTML="";
                        for(var i=0;i<data.data.length;i++){
                            var tr=document.createElement('tr');
                            var td=document.createElement('td');
                            td.innerHTML=data.data[i].created_at;
                            tr.appendChild(td);
                            var td2=document.createElement('td');
                            td2.innerHTML=data.data[i].item_code;
                            tr.appendChild(td2);
                            var td3=document.createElement('td');
                            td3.innerHTML=data.data[i].item_name;
                            tr.appendChild(td3);
                            var td4=document.createElement('td');
                            td4.innerHTML=data.data[i].jenis_order;
                            tr.appendChild(td4);
                            var td5=document.createElement('td');
                            var button=document.createElement('a');
                            button.setAttribute('class','btn btn-primary');
                            if(data.data[i].jenis_order=="lab") {
                                button.href="{{route('get.hasil.lab')}}";
                                button.target="_blank";

                            }else{
                                button.href="{{route('get.hasil.radiologi')}}";
                                button.target="_blank";
                            }
                            button.innerHTML='Hasil';
                            td5.appendChild(button);
                            tr.appendChild(td5);
                            tablePemeriksaanDokter.appendChild(tr);
                        }


                    }else{
                        $('#table-pemeriksaan-dokter').html('<td style="text-align:center" colspan="5">'+data.message.toUpperCase()+'</td>')
                    }
                    //$('#table-pemeriksaan-dokter').html(data);
                }
            });
        }
    </script> -->
<script>
    $(document).ready(function() {
        getPemeriksaanDokter();
    });
</script>
<script src="{{ asset('neko/custom/nyaa.js') }}?v={{ $nyaa_unv_function->neko()->versi->assets }}"></script>
<script src="{{asset('new_assets/js/cpoe.js')}}"></script>
<script src="{{asset('new_assets/js/prescribe.js')}}"></script>
<script src="{{asset('new_assets/js/resume_new.js')}}"></script>
<script src="{{asset('new_assets/js/discharge/diagnosa.js')}}"></script>
<script src="{{asset('new_assets/js/discharge/prosedur.js')}}"></script>
<script src="{{asset('new_assets/js/discharge/billing.js')}}"></script>
<script src="{{asset('new_assets/js/discharge/discharge.js')}}"></script>
<script src="{{asset('new_assets/js/physician_team.js')}}"></script>
<script src="{{asset('new_assets/js/persetujuan_penolakan.js')}}"></script>
<script src="{{asset('new_assets/js/surat_rujukan.js')}}"></script>
<script src="{{asset('new_assets/js/riwayat_dokter.js')}}"></script>
@endsection