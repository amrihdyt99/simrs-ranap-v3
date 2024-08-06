@extends('register.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                {{-- <input type="hidden" name="asper_reg" value="{{$reg->reg_no}}">
    <input type="hidden" name="asper_poli" value="{{$reg->reg_poli}}">--}}
                <fieldset id="kesadaran" class="form-group">
                    <div class="header"><h4>Pemeriksaan Fisik Umum</h4>
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kesadaran</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="compos" type="radio" class="custom-control-input" id="compos" value="Compos Mentis" name="asper_kesadaran" >
                                    <label class="custom-control-label" for="compos">Compos Mentis</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="somnolen" type="radio" class="custom-control-input" id="somnolen" value="Somnolen" name="asper_kesadaran" >
                                    <label class="custom-control-label" for="somnolen">Somnolen</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input koma type="radio" class="custom-control-input" id="koma" value="Koma" name="asper_kesadaran" >
                                    <label class="custom-control-label" for="koma">Koma</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="derilium" type="radio" class="custom-control-input" id="derilium" value="Derilium" name="asper_kesadaran" >
                                    <label  class="custom-control-label" for="derilium">Derilium</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="sopor" type="radio" class="custom-control-input" id="sopor" value="Sopor" name="asper_kesadaran" >
                                    <label class="custom-control-label" for="sopor">Sopor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kondisi Umum</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="baik" value="Baik" name="asper_kondisi_umum" >
                                <label class="custom-control-label" for="baik">Baik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="sesak" value="Sesak" name="asper_kondisi_umum" >
                                <label class="custom-control-label" for="sesak">Sesak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="lemah" value="Lemah" name="asper_kondisi_umum" >
                                <label class="custom-control-label" for="lemah">Lemah</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tampak_sakit" value="Tampak Sakit" name="asper_kondisi_umum" >
                                <label class="custom-control-label" for="tampak_sakit">Tampak Sakit</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="pucat" value="Pucat" name="asper_kondisi_umum">
                                <label class="custom-control-label" for="pucat">Pucat</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1"></legend>
                        <div class="col-lg-10">
                            <input id="kondisi_lain" type="text" class="form-control" name="asper_kondisi_umum_lain">
                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tekanan Darah</label>
                    <div class="input-group col-sm-10">
                        <input id="darah" type="text" class="form-control" name="asper_tekanan_darah">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nadi</label>
                    <div class="input-group col-sm-10">
                        <input id="nadi" type="text" class="form-control" name="asper_nadi">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Suhu</label>
                    <div class="input-group col-sm-10">
                        <input id="suhu" type="text" class="form-control" name="asper_suhu">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Pernapasan</label>
                    <div class="input-group col-sm-10">
                        <input id="napas" type="text" class="form-control" name="asper_pernapasan">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tinggi Badan</label>
                    <div class="input-group col-sm-10">
                        <input id="t-badan" type="text" class="form-control" name="asper_tinggi_bdn">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Berat Badan</label>
                    <div class="input-group col-sm-10">
                        <input id="b-badan" type="text" class="form-control" name="asper_berat_bdn">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">HPHT</label>
                    <div class="input-group col-sm-10">
                        <input id="hpht" type="text" class="form-control" name="asper_hpht">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">TP</label>
                    <div class="input-group col-sm-10">
                        <input id="tp" type="text" class="form-control" name="asper_tp">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kebutuhan Khusus</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input Ada" id="tidak_ada" value="Tidak Ada" name="asper_kbthn_khusus[]" >
                                <label class="custom-control-label" for="tidak_ada">Tidak Ada</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="kaca_mata" value="Kaca Mata" name="asper_kbthn_khusus[]" >
                                <label class="custom-control-label" for="kaca_mata">Kaca Mata</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input test" id="gigi_palsu" value="Gigi Palsu" name="asper_kbthn_khusus[]">
                                <label class="custom-control-label" for="gigi_palsu">Gigi Palsu</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="alat_dengar" value="Alat Bantu Dengar" name="asper_kbthn_khusus[]">
                                <label class="custom-control-label" for="alat_dengar">Alat Bantu Dengar</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="tongkat" value="Tongkat" name="asper_kbthn_khusus[]">
                                <label class="custom-control-label" for="tongkat">Tongkat</label>
                            </div>
                            <div class="form-group row mt-2">
                                <div class="col">
                                    <input id="khusus_lain" type="text" class="form-control" name="asper_kbthn_khusus_lain">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Riwayat Alergi</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="alergi_tidak" value="Tidak"  name="asper_riwayat_alergi">
                                <label class="custom-control-label" for="alergi_tidak">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="alergi_ya" value="Ya" name="asper_riwayat_alergi">
                                <label class="custom-control-label" for="alergi_ya">Ya</label>
                            </div>
                            <div class="form-group row mt-2">
                                <div class="col">
                                    <input id="alergi_lain" type="text" class="form-control" name="asper_riwayat_alergi_lain">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="header"><h4>Skrinning Nyeri</h4>
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pasien Merasa Nyeri?</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nyeri_ya" value="Ya" name="nyeri_status">
                                    <label class="custom-control-label" for="nyeri_ya">Ya</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nyeri_tidak" value="Tidak"  name="nyeri_status">
                                    <label class="custom-control-label" for="nyeri_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div id="skrining-nyeri">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Durasi Waktu</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="akut" value="Akut" name="nyeri_durasi_waktu">
                                    <label class="custom-control-label" for="akut">Akut</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="kronik" value="Kronik" name="nyeri_durasi_waktu">
                                    <label class="custom-control-label" for="kronik">Kronik</label>
                                </div>
                            </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Pencetus Nyeri</label>
                        <div class="col-lg-10">
                            <input id="pencetus-nyeri" type="text" class="form-control" name="nyeri_penyebab">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Deskripsi Nyeri</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="nyeri_status" value="ditekan" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="nyeri_status">Ditekan</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="tajam" value="tajam" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="tajam">Tajam</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="disayat" value="disayat" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="disayat">Disayat</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="tumpul" value="tumpul" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="tumpul">Nyeri Tumpul</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="perih" value="perih" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="perih">Perih</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="ngilu" value="ngilu" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="ngilu">Ngilu</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="panas" value="panas" name="nyeri_deskripsi[]">
                                    <label class="custom-control-label" for="panas">Rasa Panas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1"></legend>
                        <div class="col-lg-10">
                            <input id="nyeri_lain" type="text" class="form-control" name="nyeri_deskripsi_lain">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Lokasi dan Penjalaran</label>
                        <div class="col-lg-10">
                            <input id="lokasi-penjalaran" type="text" class="form-control" name="nyeri_penyebab_b">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Skala Ukur</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nips" value="nips" name="nyeri_skala_ukur">
                                    <label class="custom-control-label" for="nips">NIPS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="flacc" value="flacc" name="nyeri_skala_ukur">
                                    <label class="custom-control-label" for="flacc">FLACC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="cpot" value="cpot" name="nyeri_skala_ukur">
                                    <label class="custom-control-label" for="cpot">CPOT</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="nrs" value="nrs" name="nyeri_skala_ukur">
                                    <label class="custom-control-label" for="nrs">NRS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="wong" value="Wong Baker" name="nyeri_skala_ukur">
                                    <label class="custom-control-label" for="wong">Wong Baker</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Skala Nyeri</legend>
                            <div class="col-sm-10" id="img_skala">
                                <label>
                                    <img src="{{asset('images/1.jpg')}}" class="img_skala" data-value="1" width="50px">
                                </label>
                                <label>
                                    <img src="{{asset('images/2.jpg')}}" class="img_skala" data-value="2" width="50px">
                                </label>
                                <label>
                                    <img src="{{asset('images/3.jpg')}}" class="img_skala" data-value="3" width="50px">
                                </label>
                                <label>
                                    <img src="{{asset('images/4.jpg')}}" class="img_skala" data-value="4" width="50px">
                                </label>
                                <label>
                                    <img src="{{asset('images/5.jpg')}}" class="img_skala" data-value="5" width="50px">
                                </label>
                                <label>
                                    <img src="{{asset('images/6.jpg')}}" class="img_skala" data-value="6" width="50px">
                                </label>
                                <div class="row">
                                    <div class="col">
                                        <div class="range-wrap" style="width:300px;margin-left:0">
                                            <input type="range" class="range" id="nyeri_skala" name="nyeri_skala" min="1" max="6" value="1" id="fader"
                                                   step="1" oninput="setSkala(this)" >
                                            <br>
                                            <output class="bubble" for="fader" id="skala" >1 Tidak Nyeri</output>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtext3" class="col-sm-2 col-form-label">Kapan terjadi nyeri?</label>
                        <div class="col-lg-10">
                            <input id="waktu-nyeri" type="text" class="form-control" name="nyeri_waktu">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Frekuensi Nyeri</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="interminten" value="Interminten" name="nyeri_frekuensi">
                                    <label class="custom-control-label" for="interminten">Interminten</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="terus" value="Terus menerus" name="nyeri_frekuensi">
                                    <label class="custom-control-label" for="terus">Terus menerus</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <fieldset class="form-group">
                    <div class="header"><h4>Skrining Risiko Cedera / Jatuh</h4>
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Gaya berjalan pasien tidak seimbang ?</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="berjalan_ya" value="Ya" name="asper_brjln_seimbang">
                                    <label class="custom-control-label" for="berjalan_ya">Ya</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="berjalan_tidak" value="Tidak" name="asper_brjln_seimbang">
                                    <label class="custom-control-label" for="berjalan_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pasien butuh alat bantu duduk?</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="alat_ya" value="Ya" name="asper_altban_duduk">
                                <label class="custom-control-label" for="alat_ya">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="alat_tidak" value="Tidak" name="asper_altban_duduk">
                                <label class="custom-control-label" for="alat_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Hasil</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="t_beresiko" value="Tidak berisiko (a dan b, tidak)" name="asper_hasil">
                                <label class="custom-control-label" for="t_beresiko">Tidak berisiko (a dan b, tidak)</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="r_sedang" value="Risiko sedang (a atau b, Ya)" name="asper_hasil">
                                <label class="custom-control-label" for="r_sedang">Risiko sedang (a atau b, Ya)</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="r_tinggi" value="Risiko Tinggi ( a dan b Ya, tempelkan stiker risiko pasien jatuh bila tersedia)" name="asper_hasil">
                                <label class="custom-control-label" for="r_tinggi">Risiko Tinggi ( a dan b Ya, tempelkan stiker risiko pasien jatuh bila tersedia)</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="header"><h4>Kebutuhan Nutrisi dan Cairan</h4>
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Keluhan </legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="mengunyah" value="mengunyah" name="asper_keluhan_nutrisi[]">
                                    <label class="custom-control-label" for="mengunyah">Gangguan Mengunyah</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="mual" value="mual" name="asper_keluhan_nutrisi[]">
                                    <label class="custom-control-label" for="mual">Mual Muntah</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="menelan" value="menelan" name="asper_keluhan_nutrisi[]">
                                    <label class="custom-control-label" for="menelan">Gangguan Menelan</label>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col">
                                        <input id="nutrisi_lain" type="text" class="form-control" name="asper_keluhan_nutrisi_lain">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Rasa Haus Berlebihan</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="haus_ya" value="Ya" name="asper_haus_berlebih">
                                <label class="custom-control-label" for="haus_ya">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="haus_tidak" value="Tidak" name="asper_haus_berlebih">
                                <label class="custom-control-label" for="haus_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Mukosa Mulut</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="kering" value="kering" name="asper_mukosa_mulut">
                                <label class="custom-control-label" for="kering">Kering</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="lembab" value="lembab" name="asper_mukosa_mulut">
                                <label class="custom-control-label" for="lembab">Lembab</label>
                            </div>
                        </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Turgor Kulit</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="elastis" value="elastis" name="asper_turgor_kulit">
                                <label class="custom-control-label" for="elastis">Elastis</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="tidak_elastis" value="tidak elastis" name="asper_turgor_kulit">
                                <label class="custom-control-label" for="tidak_elastis">Tidak Elastis</label>
                            </div>
                        </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Edema</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="edema_ya" value="Ya" name="asper_edema">
                                <label class="custom-control-label" for="edema_ya">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="edema_tidak" value="Tidak" name="asper_edema">
                                <label class="custom-control-label" for="edema_tidak">Tidak</label>
                            </div>
                        </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="header"><h4>Data Psikologis, Sosial, Ekonomi dan Spiritual</h4>
                        <div class="row">
                            <legend class="col-form-label col-sm-2 ptx-0 pt-1">Status Emosional</legend>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="stabil" value="stabil" name="asper_status_emosi[]">
                                    <label class="custom-control-label" for="stabil">Stabil</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="cemas" value="cemas" name="asper_status_emosi[]">
                                    <label class="custom-control-label" for="cemas">Cemas</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="marah" value="marah" name="asper_status_emosi[]">
                                    <label class="custom-control-label" for="marah">Marah</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="takut" value="takut" name="asper_status_emosi[]">
                                    <label class="custom-control-label" for="takut">Takut</label>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col">
                                        <input id="psikologis_lain" type="text" class="form-control" name="asper_status_emosi_lain">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Riwayat trauma psikis</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="trauma_tidak" value="Tidak Ada" name="asper_kondisi_umum_b">
                                <label class="custom-control-label" for="trauma_tidak">Tidak Ada</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="kdrt_ya" value="Aniaya Fisik/Psikologis/KDRT" name="asper_kondisi_umum_b">
                                <label class="custom-control-label" for="kdrt_ya">Aniaya Fisik/Psikologis/KDRT</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="aniaya" value="Aniaya Seksual" name="asper_kondisi_umum_b">
                                <label class="custom-control-label" for="aniaya">Aniaya Seksual/Perkosaan</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="kriminal" value="Tindakan Kriminal" name="asper_kondisi_umum_b">
                                <label class="custom-control-label" for="kriminal">Tindakan Kriminal</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                {{-- <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Diagnosa Keperawatan</legend>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="asper_diagnosa_kprwtn" value="" name="asper_diagnosa_kprwtn">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="jalan_nafas" value="Jalan Nafas Tidak Efektif" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="jalan_nafas">Jalan Nafas Tidak efektif</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="pola_nafas" value="Pola Nafas Tidak Efektif" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="pola_nafas">Pola Nafas Tidak Efektif </label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="nutrisi_seimbang" value="Ketidakseimbangan Nutrisi" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="nutrisi_seimbang">Ketidakseimbangan Nutrisi </label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="kerusakan_kulit" value="Kerusakan Integritas Kulit" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="kerusakan_kulit">Kerusakan Integritas Kulit </label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="nyeri_akut" value="Nyeri Akut" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="nyeri_akut">Nyeri Akut</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="nyeri_kronik" value="Nyeri Kronik" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="nyeri_kronik">Nyeri Kronik</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="diare" value="Diare" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="diare">Diare</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="konstipasi" value="Konstipasi" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="konstipasi">Konstipasi </label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="urine" value="Retensi Urine" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="urine">Retensi Urine </label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="kecemasan" value="Kecemasan" name="asper_diagnosa_kprwtn">
                                <label class="custom-control-label" for="kecemasan">Kecemasan </label>
                            </div>
                        </div>
                    </div>
                </fieldset> --}}
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 ptx-0 pt-1">Hambatan sosial, ekonomi</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ekonomi_tidak" value="Tidak"  name="asper_hambatan_ekonomi">
                                <label class="custom-control-label" for="ekonomi_tidak">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="ekonomi_ya" value="Ya" name="asper_hambatan_ekonomi">
                                <label class="custom-control-label" for="ekonomi_ya">Ya</label>
                            </div>
                            <div class="form-group row mt-2">
                                <div class="col">
                                    <input id="ekonomi_lain" type="text" class="form-control" name="asper_hambatan_ekonomi_lain">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <button type="button" class="btn btn-warning float-right" onclick="nextPage('#assesment_2', 'assesment_')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>

            </div>
        </div>
    </div>


@endsection
