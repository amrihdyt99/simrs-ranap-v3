@empty($paska_tindakan)
@php
   $paska_tindakan = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h3>Catatan Keperawatan Paska Kateterisasi/ Angiiografi/Angioplasti</h3>
    <h6>*) diisi oleh perawat cathlab</h6>
    <h5>Serah Terima Antar Perawat</h5>
    <strong>Situation:</strong>
    <form id="paska_tindakan">
    <div class="form-group">
        <label for="dokter_yang_merawat">Dokter yang Merawat:</label>
        <input type="text" class="form-control" id="dokter_yang_merawat" name="dokter_yang_merawat" value="{{$paska_tindakan->dokter_yang_merawat}}">
    </div>
    <div class="form-group">
        <label for="diagnosa_medis">Diagnosa Medis:</label>
        <input type="text" class="form-control" id="diagnosa_medis" name="diagnosa_medis" value="{{$paska_tindakan->dokter_yang_merawat}}">
    </div>
    <div class="form-group">
        <label for="masalah_keperawatan">Masalah Keperawatan:</label>
        <input type="text" class="form-control" id="masalah_keperawatan" name="masalah_keperawatan" value="{{$paska_tindakan->dokter_yang_merawat}}">
    </div>

    <h5>Background</h5>
    <div class="form-group">
        <label for="prosedur_yang_dilakukan">Prosedur yang Dilakukan:</label>
        <input type="text" class="form-control" id="prosedur_yang_dilakukan" name="prosedur_yang_dilakukan"value="{{$paska_tindakan->dokter_yang_merawat}}">
    </div>
    <div class="form-group">
        <label for="hasil_prosedur">Hasil Prosedur:</label>
        <input type="text" class="form-control" id="hasil_prosedur" name="hasil_prosedur" value="{{$paska_tindakan->dokter_yang_merawat}}">
    </div>
    <div class="form-group">
        <label for="keadaan_umum">Keadaan Umum:</label>
        <select class="form-control" id="keadaan_umum" name="keadaan_umum">
            <option value="Baik" {{$paska_tindakan->keadaan_umum=='Baik' ? 'selected' : ''}}>Baik</option>
            <option value="Sedang" {{$paska_tindakan->keadaan_umum=='Sedang' ? 'selected' : ''}}>Sedang</option>
            <option value="Buruk" {{$paska_tindakan->keadaan_umum=='Buruk' ? 'selected' : ''}}>Buruk</option>
        </select>
    </div>
    <div class="form-group">
        <label for="gcs">GCS:</label>
        <input type="text" class="form-control" id="gcs" name="gcs" value="{{$paska_tindakan->gcs}}">
    </div>
    <div class="form-group">
        <label for="pupil_reaksi_kanan">Pupil Reaksi Kanan:</label>
        <input type="text" class="form-control" id="pupil_reaksi_kanan" name="pupil_reaksi_kanan" value="{{$paska_tindakan->pupil_reaksi_kanan}}">
    </div>
    <div class="form-group">
        <label for="pupil_reaksi_kiri">Pupil Reaksi Kiri:</label>
        <input type="text" class="form-control" id="pupil_reaksi_kiri" name="pupil_reaksi_kiri" value="{{$paska_tindakan->pupil_reaksi_kiri}}">
    </div>
    <div class="form-group">
        <label for="td">Tekanan Darah:</label>
        <input type="text" class="form-control" id="td" name="td" value="{{$paska_tindakan->td}}">
    </div>
    <div class="form-group">
        <label for="nadi">Nadi:</label>
        <input type="text" class="form-control" id="nadi" name="nadi" value="{{$paska_tindakan->nadi}}">
    </div>
    <div class="form-group">
        <label for="rr">Respiratory Rate:</label>
        <input type="text" class="form-control" id="rr" name="rr" value="{{$paska_tindakan->rr}}">
    </div>
    <div class="form-group">
        <label for="suhu">Suhu:</label>
        <input type="text" class="form-control" id="suhu" name="suhu" value="{{$paska_tindakan->suhu}}">
    </div>
    <div class="form-group">
        <label for="spo2">SPO2:</label>
        <input type="text" class="form-control" id="spo2" name="spo2" value="{{$paska_tindakan->spo2}}">
    </div>
    <div class="form-group">
        <label for="skala_nyeri">Skala Nyeri:</label>
        <input type="text" class="form-control" id="skala_nyeri" name="skala_nyeri" value="{{$paska_tindakan->skala_nyeri}}">
    </div>
    @php
        $data_akses=json_decode($paska_tindakan->akses)??[];
        $data_hemostatis=json_decode($paska_tindakan->teknik_hemostasis)??[];
        $data_diet=json_decode($paska_tindakan->diet)??[];
        $data_mobilisasi=json_decode($paska_tindakan->mobilisasi)??[];
        $data_recommendations=json_decode($paska_tindakan->recommendations)??[];
    @endphp
    <div class="form-group">
        <label for="akses">Akses:</label><br>
        <input type="checkbox" id="akses_radialis_kanan" name="akses[]" value="Radialis Kanan" {{in_array('Radialis Kanan',$data_akses) ? 'checked' : ''}}>
        <label for="akses_radialis_kanan">Radialis Kanan</label><br>
        <input type="checkbox" id="akses_radialis_kiri" name="akses[]" value="Radialis Kiri" {{in_array('Radialis Kiri',$data_akses) ? 'checked' : ''}}>
        <label for="akses_radialis_kiri">Radialis Kiri</label><br>
        <input type="checkbox" id="akses_femoralis_kanan" name="akses[]" value="Femoralis Kanan" {{in_array('Femoralis Kanan',$data_akses) ? 'checked' : ''}}>
        <label for="akses_femoralis_kanan">Femoralis Kanan</label><br>
        <input type="checkbox" id="akses_femoralis_kiri" name="akses[]" value="Femoralis Kiri" {{in_array('Femoralis Kiri',$data_akses) ? 'checked' : ''}}>
        <label for="akses_femoralis_kiri">Femoralis Kiri</label><br>
        <input type="checkbox" id="akses_femoralis_lainnya" name="akses[]" value="Femoralis Kanan" {{in_array('Femoralis Kanan',$data_akses) ? 'checked' : ''}}>
        <label for="akses_femoralis_lainnya">Lainnya</label><br>
        <input type="text" id="akses_femoralis_lainnya" class="form-control" name="akses_femoralis_text" value="{{$paska_tindakan->akses_femoralis_text}}"><br>
    </div>

    <div class="form-group">
        <label for="sheat_aff">Sheath Dilepas ?</label>
        <select class="form-control" id="sheat_aff" name="sheat_aff">
            <option value="Sudah" {{$paska_tindakan->sheat_aff=='Sudah' ? 'selected' : ''}}>Sudah</option>
            <option value="Belum" {{$paska_tindakan->sheat_aff=='Belum' ? 'selected' : ''}}>Belum</option>
        </select>
    </div>

    <div class="form-group">
        <label for="teknik_hemostasis">Teknik Hemostasis:</label><br>
        <input type="checkbox" id="teknik_hemostasis_manual" name="teknik_hemostasis[]" value="Manual" {{in_array('Manual',$data_hemostatis) ? 'checked' : ''}}>
        <label for="teknik_hemostasis_manual">Manual</label><br>
        <input type="checkbox" id="teknik_hemostasis_radial_band" name="teknik_hemostasis[]" value="Radial Band" {{in_array('Radial Band',$data_hemostatis) ? 'checked' : ''}}>
        <label for="teknik_hemostasis_radial_band">Radial Band</label><br>
        <input type="checkbox" id="teknik_hemostasis_isi_balon" value="Isi Balon" name="teknik_hemostasis[]" {{in_array('Isi Balon',$data_hemostatis) ? 'checked' : ''}}/>
        <label for="teknik_hemostasis_isi_balon">Isi Balon</label>
    </div>
    <div class="form-group">
        <label for="teknik_hemostasis_lainnya">Teknik Hemostasis Lainnya:</label>
        <input type="text" class="form-control" id="teknik_hemostasis_lainnya" name="teknik_hemostasis_text" value="{{$paska_tindakan->teknik_hemostasis_text}}">
    </div>

    <div class="form-group">
        <label for="komplikasi">Komplikasi:</label>
        <input type="text" class="form-control" id="komplikasi" name="komplikasi" value="{{$paska_tindakan->komplikasi}}">
    </div>

    <div class="form-group">
        <label for="total_kontras">Total Kontras:</label>
        <input type="text" class="form-control" id="total_kontras" name="total_kontras" value="{{$paska_tindakan->total_kontras}}">
    </div>

    <h5>Diet</h5>
    <div class="form-group">
        <input type="checkbox" id="diet_oral" name="diet[]" value="Oral" {{in_array('Oral',$data_diet) ? 'checked' : ''}}>
        <label for="diet_oral">Oral</label><br>
        <input type="checkbox" id="diet_ngt" name="diet[]" value="NGT" {{in_array('NGT',$data_diet) ? 'checked' : ''}}>
        <label for="diet_ngt">NGT</label><br>
        <input type="checkbox" id="diet_khusus" name="diet[]" value="Diet Khusus" {{in_array('Diet Khusus',$data_diet) ? 'checked' : ''}}>
        <label for="diet_khusus">Diet Khusus</label><br>
        <input type="text" id="diet_khusus" name="diet_khusus_text" class="form-control" value="{{$paska_tindakan->diet_khusus_text}}" />
    </div>

    <div class="form-group">
        <label for="bab">BAB:</label>
        <input type="text" class="form-control" id="bab" name="bab" value="{{$paska_tindakan->bab}}">
    </div>
    <div class="form-group">
        <label for="bak">BAK:</label>
        <input type="text" class="form-control" id="bak" name="bak" value="{{$paska_tindakan->bak}}">
    </div>

    <h5>Mobilisasi</h5>
    <div class="form-group">
        <input type="checkbox" id="mobilisasi_jalan" name="mobilisasi[]" value="Jalan" {{in_array('Jalan',$data_mobilisasi) ? 'checked' : ''}}>
        <label for="mobilisasi_jalan">Jalan</label><br>
        <input type="checkbox" id="mobilisasi_duduk" name="mobilisasi[]" value="Duduk" {{in_array('Duduk',$data_mobilisasi) ? 'checked' : ''}}>
        <label for="mobilisasi_duduk">Duduk</label><br>
        <input type="checkbox" id="mobilisasi_tirah_baring" name="mobilisasi[]" value="Tirah Baring" {{in_array('Tirah Baring',$data_mobilisasi) ? 'checked' : ''}}>
        <label for="mobilisasi_tirah_baring">Tirah Baring</label><br>
    </div>

    <div class="form-group">
        <label for="hal_istimewa_pasien">Hal Istimewa Pasien:</label>
        <textarea class="form-control" id="hal_istimewa_pasien" name="hal_istimewa_pasien" rows="3">{{$paska_tindakan->hal_istimewa_pasien}}</textarea>
    </div>

    <div class="form-group">
        <label for="assessment">Assessment:</label>
        <textarea class="form-control" id="assessment" name="assessment" rows="3">{{$paska_tindakan->assessment}}</textarea>
    </div>

    <div class="form-group">
        <label for="recommendations">Recommendations:</label><br>
        <input type="checkbox" id="recommendations_istirahat" name="recommendations[]" value="Istirahat" {{in_array('Istirahat',$data_recommendations) ? 'checked' : ''}} >
        <label for="recommendations_istirahat">Istirahat</label><br>
        <input type="checkbox" id="recommendations_jangan_menekuk_kaki" name="recommendations[]" value="Jangan Menekuk Kaki Kanan" {{in_array('Istirahat',$data_recommendations) ? 'checked' : ''}}>
        <label for="recommendations_jangan_menekuk_kaki">Jangan Menekuk Kaki Kanan</label><br>
        <input type="checkbox" id="recommendations_observasi_distal" name="recommendations[]" value="Observasi Distal" {{in_array('Istirahat',$data_recommendations) ? 'checked' : ''}}>
        <label for="recommendations_observasi_distal">Observasi Distal</label><br>
        <input type="checkbox" id="recommendations_observasi_td" name="recommendations[]" value="Observasi Tekanan Darah" {{in_array('Istirahat',$data_recommendations) ? 'checked' : ''}}>
        <label for="recommendations_observasi_td">Observasi Tekanan Darah</label><br>
    </div>
        <button type="button" class="btn btn-primary" onclick="simpanPaskaTindakan()">Submit</button>
    </form>
</div>
