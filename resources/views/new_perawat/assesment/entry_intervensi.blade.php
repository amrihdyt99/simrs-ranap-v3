@empty($asper_masalah)
@php
   $asper_masalah = optional((object)[]);
@endphp
@endempty
<div class="row">
    <div class="col-lg-5" style="border-right: 1px solid black">
        <h4>DAFTAR MASALAH KEPERAWATAN</h4>
        @php
        $pmasalah_masalah=json_decode($asper_masalah->pmasalah_masalah)??[];
        @endphp
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0001" {{in_array('D.0001',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0001 - Bersihan Jalan Napas Tidak Efektif</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0020" {{in_array('D.0020',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0020 - Diare</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0024" {{in_array('D.0024',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0024 - Ikterus Neonatus</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0029" {{in_array('D.0029',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0029 - Menyusui Tidak Efektif</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0040" {{in_array('D.0040',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0040 - Gangguan Eliminasi Urine</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0050" {{in_array('D.0050',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0050 - Retensi Urine</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0054" {{in_array('D.0054',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0054 - Gangguan Mobililtas Fisik</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0056" {{in_array('D.0056',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0056 - Intoleransi Aktivitas</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0074" {{in_array('D.0074',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0074 - Gangguan Rasa Nyaman</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0075" {{in_array('D.0075',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0075 - Ketidaknyamanan Pasca Partum</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0076" {{in_array('D.0076',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0076 - Nausea</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0077" {{in_array('D.0077',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0077 - Nyeri Akut</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0078" {{in_array('D.0078',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0078 - Nyeri Kronis</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0080" {{in_array('D.0080',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0080 - Ansietas</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0083" {{in_array('D.0083',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0083 - Gangguan Citra Tubuh</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0111" {{in_array('D.0111',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0111 - Defisit Pengetahuan</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0129" {{in_array('D.0129',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0129 - Gangguan Integristas Kulit/Jaringan</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0130" {{in_array('D.0130',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0130 - Hipertermia</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" class="form-control-check mr-2" name="pmasalah_masalah[]" value="D.0142" {{in_array('D.0142',$pmasalah_masalah) ? 'checked' : ''}}>
            <label for="">D.0142 - Risiko Infeksi</label>
        </div>
    </div>
    @empty($asper_masalah)
    @php
    $asper_masalah = optional((object)[]);
    @endphp
    @endempty

    @php
        $pintervensi_intervensi=json_decode($asper_masalah->pintervensi_intervensi)??[];
    @endphp
    <div class="col-lg-7">
        <h4>INTERVENSI KEPERAWATAN RAWAT JALAN</h4>
        <h5 class="font-weight-bold"><i>Observasi</i></h5>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="1" {{in_array('1',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Observasi adanya nyeri atau keluhan fisik lainnya</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="2" {{in_array('2',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ukur tanda vital bayi terutama suhu</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="3" {{in_array('3',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi gangguan fungsi tubuh yang mengakibatkan kelelahan</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="4" {{in_array('4',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi penyebab diare dan riwayat pemberian makan</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="5" {{in_array('5',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Periksa kondisi pasien (misal: kesadaran, tanda vital, distensi kandung kemihm inkontinensia urine, reflek berkemih)</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="6" {{in_array('6',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi faktor penyebab rentensi urine atau inkontinensia urine</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="7" {{in_array('7',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi faktor penyebab mual</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="8" {{in_array('8',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi faktor lokasi, karakteristik, durasi, frekuensi, kualitas, intensitas nyeri dan skala nyeri</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="9" {{in_array('9',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi karakteristik luka dan tanda-tanda infeksi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="10" {{in_array('10',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi penyebab hipertermia</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="11" {{in_array('11',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi tanda dan gejala indeksi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="12" {{in_array('12',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Identifikasi tanda-tanda ansietas dan informasikan secara faktual mengenai diagnosis, pengobatan dan prognosis</label>
        </div>
        <h5 class="font-weight-bold"><i>Teraupetik</i></h5>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="13" {{in_array('13',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Atur posisi pasien semi fowler atau fowler</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="14" {{in_array('14',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Libatkan keluarga untuk membantu pasien dalam meningkatkan ambulasi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="15" {{in_array('15',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ambil sample feses untuk kultur, jika perlu</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="16" {{in_array('16',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Pasang katerer urine</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="17" {{in_array('17',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Berikan teknik non farmakologis untuk mengurangi nyeri</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="18" {{in_array('18',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Berikan perawatan kulit pada area edema</label>
        </div>
        <h5 class="font-weight-bold"><i>Edukasi</i></h5>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="19" {{in_array('19',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan prosedur dan tujuan batuk efektif</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="20" {{in_array('20',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan latihan untuk batuk efektif</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="21" {{in_array('21',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan tujuan dan prosedur ambulasi, anjurkan ambulasi dini dan sederhana</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="22" {{in_array('22',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan ibu untuk menyusui bayi selama 20-30 menit</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="23" {{in_array('23',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan ibu cara merawat bayi dirumah</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="24" {{in_array('24',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan melakukan aktivitas bayi dirumah</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="25" {{in_array('25',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan melakukan aktivitas secara bertahap</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="26" {{in_array('26',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan makanan porsi kecil dan sering secara bertahap</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="27" {{in_array('27',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan untuk menghindari makan pembentuk gas, pedas, dan mengandung laktosa</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="28" {{in_array('28',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan teknik non farmakologis untuk mengatasi mual (mis: rekaksasi, terapi musik, biofeedback)</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="29" {{in_array('29',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan teknik non farmakologis untuk mengurangi rasa nyeri</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="30" {{in_array('30',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan minum air yang cukup dan meningkatkan asupan nutrisi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="31" {{in_array('31',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan mandi dan menggunakan sabun secukupnya</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="32" {{in_array('32',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan tirah baring</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="33" {{in_array('33',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Anjurkan makan/minum hangat</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="34" {{in_array('34',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan tanda dan gejala infeksi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="35" {{in_array('35',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan cara mencuci tangan dengan benar</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="36" {{in_array('36',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan tentang penyakit yang dialami</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="37" {{in_array('37',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan pentingnya memberikan vaksin dan imunisasi</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="38" {{in_array('38',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Jelaskan kepada keluarga tentang perawatan perubahan citra tubuh</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="39" {{in_array('39',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Berikan konseling menyusui</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="40" {{in_array('40',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan empat posisi menyusui dan perlekatan dengan benar</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="41" {{in_array('41',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Informasikan alternatif secara jelas, berikan informasi yang diminta pasien</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="42" {{in_array('42',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Ajarkan perawatan payudara post partum</label>
        </div>
        <h5 class="font-weight-bold"><i>Kolaborasi</i></h5>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="43" {{in_array('43',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Kolaborasi dalam pemberian obat pengeras feses dan obat antimotilitas</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="44" {{in_array('44',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Kolaborasi pemberian antiemetik, jika perlu</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="45" {{in_array(45,$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Kolaborasi pemberian analgetik jika perlu</label>
        </div>
        <div class="form-group-check">
            <input type="checkbox" name="pintervensi_intervensi[]" class="form-control-check mr-2" value="46" {{in_array('46',$pintervensi_intervensi) ? 'checked' : ''}}>
            <label for="">Kolaborasi pemberian cairan dan elektrolit intravena, jika perlu</label>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" onclick="addMasalah()">Simpan Data</button>

