<h4 class="mt-3"><b>SKRINING NYERI</b></h4>

<div class="row mb-3">
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="skala_wong_baker" name="nyeri[skala_wong_baker]" value="ya" {{ $nyeri->skala_wong_baker == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="skala_wong_baker"><b>Skala Wong Baker</b></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10" id="img_skala">
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/1.jpg') }}" class="img_skala" data-value="0" width="50px"
                height="55px" style="display: block;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="1" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="2" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="3" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala" data-value="4" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala" data-value="5" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/4.jpg') }}" class="img_skala" data-value="6" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="7" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="8" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="9" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/6.jpg') }}" class="img_skala" data-value="10"
                width="50px" height="55px" style="display: none;" />
        </label>

        <div class="row">
            <div class="col">
                <div class="range-wrap" style="width: 300px; margin-left: 0">
                    <input type="range" class="range" id="nyeri_skala" name="nyeri[nyeri_skala]" min="0"
                        max="10" value="{{ $nyeri->nyeri_skala ?? 0 }}" step="1" oninput="setSkala(this)" />
                    <br />
                    <label for=""></label>
                    <output class="bubble" for="fader" id="skala">{{ $nyeri->nyeri_skala ?? 0 }} TIDAK NYERI</output>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <table class="table1 w-100">
            <tbody>
                <tr>
                    <td>O</td>
                    <td style="width: 200px;">(Onset) Kapan terjadi, berapa lama, dan berapa sering :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[onset]" value="{{ $nyeri->onset }}">
                    </td>
                </tr>
                <tr>
                    <td>P</td>
                    <td>(Provocating / Palliating) Pencetus nyeri:
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[pencetus_nyeri]" value="{{ $nyeri->pencetus_nyeri }}">
                    </td>
                </tr>
                <tr>
                    <td>Q</td>
                    <td>(Quality) Tipe nyeri :
                    </td>
                    <td>
                        @php
                            $tipe_nyeri = explode(',', $nyeri->tipe_nyeri ?? '');
                        @endphp
                        <input type="checkbox" id="tekanan" name="nyeri[tipe_nyeri][]" value="Tekanan" {{ in_array('Tekanan', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="tekanan">Tekanan</label>
                        <input type="checkbox" id="tajam_tusukan" name="nyeri[tipe_nyeri][]" value="Tajam tusukan" {{ in_array(' Tajam tusukan', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="tajam_tusukan">Tajam tusukan</label>
                        <input type="checkbox" id="mencengkeram" name="nyeri[tipe_nyeri][]" value="Mencengkeram" {{ in_array(' Mencengkeram', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="mencengkeram">Mencengkeram</label>
                        <input type="checkbox" id="melilit" name="nyeri[tipe_nyeri][]" value="Melilit" {{ in_array(' Melilit', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="melilit">Melilit</label>
                    </td>
                </tr>
                <tr>
                    <td>R</td>
                    <td>(Region) Menjalar :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[menjalar]" value="{{ $nyeri->menjalar }}">
                    </td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>(Severity) skala nyeri :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[skala_nyeri]" value="{{ $nyeri->skala_nyeri }}">
                    </td>
                </tr>
                <tr>
                    <td>T</td>
                    <td>(Treatment) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[treatment]" value="{{ $nyeri->treatment }}">
                    </td>
                </tr>
                <tr>
                    <td>U</td>
                    <td>(Understanding) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[understanding]" value="{{ $nyeri->understanding }}">
                    </td>
                </tr>
                <tr>
                    <td>V</td>
                    <td>(Value) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nyeri[value]" value="{{ $nyeri->value }}">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bps" name="nyeri[bps]" value="ya" {{ $nyeri->bps == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="bps"><b>*) Catatan: Bila pasien tidak sadar maka gunakan formulir penilaian nyeri dengan Skala BPS (Behavior Pain Scale)</b></label>
        </div>
    </div>
</div>

<h5 class="text-center mt-2"><b>Behavior Pain Scale</b></h5>
<table class="table1 w-100" id="bps_table">
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Score 1</th>
            <th>Score 2</th>
            <th>Score 3</th>
            <th>Score 4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ekspresi wajah</td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_1" name="nyeri[ekspresi_wajah]" value="1" {{ $nyeri->ekspresi_wajah == '1' ? 'checked' : '' }}> Normal</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_2" name="nyeri[ekspresi_wajah]" value="2" {{ $nyeri->ekspresi_wajah == '2' ? 'checked' : '' }}> Mengencang sebagian (alis mengerut)</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_3" name="nyeri[ekspresi_wajah]" value="3" {{ $nyeri->ekspresi_wajah == '3' ? 'checked' : '' }}> Mengencang total (kelopak mata mengatup rapat)</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_4" name="nyeri[ekspresi_wajah]" value="4" {{ $nyeri->ekspresi_wajah == '4' ? 'checked' : '' }}> Meringis</label>
            </td>
        </tr>
        <tr>
            <td>Ekstremitas atas</td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_1" name="nyeri[ekstremitas_atas]" value="1" {{ $nyeri->ekstremitas_atas == '1' ? 'checked' : '' }}> Tidak ada pergerakan</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_2" name="nyeri[ekstremitas_atas]" value="2" {{ $nyeri->ekstremitas_atas == '2' ? 'checked' : '' }}> Tertekuk sebagian</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_3" name="nyeri[ekstremitas_atas]" value="3" {{ $nyeri->ekstremitas_atas == '3' ? 'checked' : '' }}> Tertekuk total dengan fleksi jari</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_4" name="nyeri[ekstremitas_atas]" value="4" {{ $nyeri->ekstremitas_atas == '4' ? 'checked' : '' }}> Retraksi permanen</label>
            </td>
        </tr>
        <tr>
            <td>Compliance terhadap ventilator</td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_1" name="nyeri[compliance_ventilator]" value="1" {{ $nyeri->compliance_ventilator == '1' ? 'checked' : '' }}> Toleransi terhadap ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_2" name="nyeri[compliance_ventilator]" value="2" {{ $nyeri->compliance_ventilator == '2' ? 'checked' : '' }}> Sesekali terbatuk, namun masih toleransi terhadap ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_3" name="nyeri[compliance_ventilator]" value="3" {{ $nyeri->compliance_ventilator == '3' ? 'checked' : '' }}> Melawan ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_4" name="nyeri[compliance_ventilator]" value="4" {{ $nyeri->compliance_ventilator == '4' ? 'checked' : '' }}> Tidak dapat mengendalikan pola napas</label>
            </td>
        </tr>
        <tr>
            <td colspan="3"> <label>Skor Total Behavior Pain Scale : </label><input type="text" class="ml-2"
                style="width: 100px; border: none;" name="nyeri[skor_total_bps]" id="skor_total_bps" value="{{ $nyeri->skor_total_bps ?? '-' }}" readonly></td>
        </tr>
    </tbody>
</table>

<div class="container mt-3">
    <button class="btn btn-primary" type="button" onclick="storeAssesmentDewasaNyeri()">Simpan</button>
</div>