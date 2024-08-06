@empty($skrining_nyeri)
@php
   $skrining_nyeri = optional((object)[]);
@endphp
@endempty
<h2 class="text-black">Pengkajian Awal Pasien</h2>
<h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
<hr>
<div class="text-black" style="font-size: 14px">
    <form id="entry-nyeri">
        <input type="hidden" name="reg_no" value="{{$reg}}">
        <fieldset id="nyeri-sadar" class="form-group">
            <div class="header"><h4>Skrinning Nyeri</h4>
                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Apakah Pasien Merasakan Nyeri?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="merasakan_nyeri" name="merasakan_nyeri">
                            <option value="tidak" {{$skrining_nyeri->merasakan_nyeri=='tidak' ? 'selected' : ''}}>Tidak</option>
                            <option value="Ya" {{$skrining_nyeri->merasakan_nyeri=='Ya' ? 'selected' : ''}}>Ya</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Durasi Nyeri?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="durasi" name="durasi">
                            <option value="Akut" {{$skrining_nyeri->durasi=='Akut' ? 'selected' : ''}}>Akut</option>
                            <option value="Kronis" {{$skrining_nyeri->durasi=='Kronis' ? 'selected' : ''}}>Kronis</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Frekuensi Nyeri?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="frekuensi" name="frekuensi">
                            <option value="Intermiten" {{$skrining_nyeri->frekuensi=='Intermiten' ? 'selected' : ''}}>Intermiten</option>
                            <option value="Terus Menerus" {{$skrining_nyeri->frekuensi=='Terus Menerus' ? 'selected' : ''}}>Terus-Menerus</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pencetus Nyeri?</legend>
                    <div class="col-sm-10">
                      <input type="text" name="pencetus_nyeri" id="pencetus_nyeri" class="form-control" value="{{$skrining_nyeri->pencetus_nyeri}}"/>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kepan Terjadinya Nyeri?</legend>
                    <div class="col-sm-10">
                        <input type="text" name="kapan_terjadi_nyeri" id="kapan_terjadi_nyeri" class="form-control" value="{{$skrining_nyeri->kapan_terjadi_nyeri}}"/>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tipe Nyeri?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="tipe_nyeri" name="tipe_nyeri">
                            <option value="Tekanan" {{$skrining_nyeri->tipe_nyeri=='Tekanan' ? 'selected' : ''}}>Tekanan</option>
                            <option value="Tajam Tusukan" {{$skrining_nyeri->tipe_nyeri=='Tajam Tusukan' ? 'selected' : ''}}>Tajam Tusukan</option>
                            <option value="Mencengkram" {{$skrining_nyeri->tipe_nyeri=='Tajam Tusukan' ? 'selected' : ''}}>Mencengkram</option>
                            <option value="Melilit" {{$skrining_nyeri->tipe_nyeri=='Intermiten' ? 'Melilit' : ''}}>Melilit</option>
                            <option value="Menjalar" {{$skrining_nyeri->tipe_nyeri=='Menjalar' ? 'selected' : ''}}>Menjalar</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ekspresi Wajah?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="ekspresi_wajah" name="ekspresi_wajah">
                            <option value="Tenang" {{$skrining_nyeri->ekspresi_wajah=='Tenang' ? 'selected' : ''}}>Tenang</option>
                            <option value="Meringis" {{$skrining_nyeri->ekspresi_wajah=='Meringis' ? 'selected' : ''}}>Meringis</option>
                            <option value="Menangis" {{$skrining_nyeri->ekspresi_wajah=='Menangis' ? 'selected' : ''}}>Menangis</option>
                            <option value="menjerit-jerit" {{$skrining_nyeri->ekspresi_wajah=='menjerit-jerit' ? 'selected' : ''}}>Menjerit-Jerit</option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>
     {{--   <div class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Skala Nyeri</legend>
                <div class="col-sm-10" id="img_skala">
                    <label>
                        <img src="{{asset('new_assets/images/1.jpg')}}" class="img_skala" data-value="1" width="50px">
                    </label>
                    <label>
                        <img src="{{asset('new_assets/images/2.jpg')}}" class="img_skala" data-value="2" width="50px">
                    </label>
                    <label>
                        <img src="{{asset('new_assets/images/3.jpg')}}" class="img_skala" data-value="3" width="50px">
                    </label>
                    <label>
                        <img src="{{asset('new_assets/images/4.jpg')}}" class="img_skala" data-value="4" width="50px">
                    </label>
                    <label>
                        <img src="{{asset('new_assets/images/5.jpg')}}" class="img_skala" data-value="5" width="50px">
                    </label>
                    <label>
                        <img src="{{asset('new_assets/images/6.jpg')}}" class="img_skala" data-value="6" width="50px">
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
        </div>--}}

        <fieldset id="nyeri-tidaksadar" class="form-group">
            <div class="header"><h4>Bila pasien tidak sadar maka gunakan formulir penilaian nyeri dengan skala BPS (Behavior Pain Scale)</h4>
                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ekspresi Wajah?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="bps_wajah" name="bps_wajah">
                            <option value="tidak isi"></option>
                            <option value="1" {{$skrining_nyeri->bps_wajah=='1' ? 'selected' : ''}}>Normal</option>
                            <option value="2" {{$skrining_nyeri->bps_wajah=='2' ? 'selected' : ''}}>Mengencang sebagian (alis mengerut)</option>
                            <option value="3" {{$skrining_nyeri->bps_wajah=='3' ? 'selected' : ''}}>Mengencangkan total (kelopak mata mengatup rapat)</option>
                            <option value="4" {{$skrining_nyeri->bps_wajah=='4' ? 'selected' : ''}}>Meringis</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ekstremitas Atas?</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="bps_ekstremitas_atas" name="bps_ekstremitas_atas">
                            <option value="tidak isi"></option>
                            <option value="1" {{$skrining_nyeri->bps_ekstremitas_atas=='1' ? 'selected' : ''}}>Tidak ada pergerakan</option>
                            <option value="2" {{$skrining_nyeri->bps_ekstremitas_atas=='2' ? 'selected' : ''}}>Tertekan Sebagian</option>
                            <option value="3" {{$skrining_nyeri->bps_ekstremitas_atas=='3' ? 'selected' : ''}}>Tertekuk total dengan fleksi jari</option>
                            <option value="4" {{$skrining_nyeri->bps_ekstremitas_atas=='4' ? 'selected' : ''}}>Retraksi permanen</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Compleance terhadap ventilator</legend>
                    <div class="col-sm-10">
                        <select class="form-control" id="bps_compleance_atas" name="bps_compleance_atas">
                            <option value="tidak isi"></option>
                            <option value="1" {{$skrining_nyeri->bps_compleance_atas=='1' ? 'selected' : ''}}>Toleransi terhadap ventilator</option>
                            <option value="2" {{$skrining_nyeri->bps_compleance_atas=='2' ? 'selected' : ''}}>Sesekali terbatuk, Namun masih toleransi Terhadap ventilator</option>
                            <option value="3" {{$skrining_nyeri->bps_compleance_atas=='3' ? 'selected' : ''}}>Melawan ventilator</option>
                            <option value="4" {{$skrining_nyeri->bps_compleance_atas=='4' ? 'selected' : ''}}>Tidak dapat mengendalikan pola napas</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="addskrinningnyeri()">Simpan Skrinning Nyeri</button>
            </div>
        </fieldset>
    </form>
</div>
