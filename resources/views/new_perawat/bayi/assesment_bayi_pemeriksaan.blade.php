@empty($pemeriksaan_bayi)
@php
   $pemeriksaan_bayi = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Pemeriksaan Bayi</h2>
    <form id="pemeriksaan_bayi">
        <h5>Pemeriksaan Umum</h5>
        <div class="form-group">
            <label for="keadaan_umum">Keadaan Umum:</label>
            <input type="text" class="form-control" id="keadaan_umum" name="keadaan_umum" value="{{$pemeriksaan_bayi->keadaan_umum}}">
        </div>
        <div class="form-group">
            <label for="suhu">Suhu:</label>
            <input type="text" class="form-control" id="suhu" name="suhu" value="{{$pemeriksaan_bayi->suhu}}">
        </div>
        <div class="form-group">
            <label for="pernafasan">Pernafasan:</label>
            <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{$pemeriksaan_bayi->pernafasan}}">
        </div>
        <div class="form-group">
            <label for="denyut_nadi">Denyut Nadi:</label>
            <input type="text" class="form-control" id="denyut_nadi" name="denyut_nadi" value="{{$pemeriksaan_bayi->denyut_nadi}}">
        </div>
        <div class="form-group">
            <label for="berat_badan">Berat Badan:</label>
            <input type="text" class="form-control" id="berat_badan" name="berat_badan" value="{{$pemeriksaan_bayi->berat_badan}}">
        </div>
        <div class="form-group">
            <label for="panjang_badan">Panjang Badan:</label>
            <input type="text" class="form-control" id="panjang_badan" name="panjang_badan" value="{{$pemeriksaan_bayi->panjang_badan}}">
        </div>
        <h5>Pemeriksaan Fisik</h5>
        <div class="form-group">
            <label for="bentuk_kepala">Bentuk Kepala:</label>
            <select class="form-control" id="bentuk_kepala" name="bentuk_kepala">
                <option value="Simetris" {{$pemeriksaan_bayi->bentuk_kepala=='Simetris' ? 'selected' : ''}}>Simetris</option>
                <option value="Tidak Simetris" {{$pemeriksaan_bayi->bentuk_kepala=='Tidak Simetris' ? 'selected' : ''}}>Tidak Simetris</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fontanel">Fontanel:</label>
            <input type="text" class="form-control" id="fontanel" name="fontanel" value="{{$pemeriksaan_bayi->fontanel}}">
        </div>
        <div class="form-group">
            <label for="molding">Molding:</label>
            <input type="text" class="form-control" id="molding" name="molding" value="{{$pemeriksaan_bayi->molding}}">
        </div>
        <div class="form-group">
            <label for="caput_succedaneum">Caput Succedaneum:</label>
            <select class="form-control" id="caput_succedaneum" name="caput_succedaneum">
                <option value="Ada" {{$pemeriksaan_bayi->caput_succedaneum=='Ada' ? 'selected' : ''}}>Ada</option>
                <option value="Tidak Ada" {{$pemeriksaan_bayi->caput_succedaneum=='Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="chepal_hematoom">Chepal Hematoom:</label>
            <select class="form-control" id="chepal_hematoom" name="chepal_hematoom">
                <option value="Ada" {{$pemeriksaan_bayi->chepal_hematoom=='Ada' ? 'selected' : ''}}>Ada</option>
                <option value="Tidak Ada" {{$pemeriksaan_bayi->chepal_hematoom=='Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="muka">Muka:</label>
            <input type="text" class="form-control" id="muka" name="muka" value="{{$pemeriksaan_bayi->muka}}">
        </div>
        <div class="form-group">
            <label for="conjungtiva">Conjungtiva:</label>
            <select class="form-control" id="conjungtiva" name="conjungtiva">
                <option value="Ikrus" {{$pemeriksaan_bayi->conjungtiva=='Ikrus' ? 'selected' : ''}}>Ikrus</option>
                <option value="Normal" {{$pemeriksaan_bayi->conjungtiva=='Normal' ? 'selected' : ''}}>Normal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sklera">Sklera:</label>
            <select class="form-control" id="sklera" name="sklera">
                <option value="Ikrus" {{$pemeriksaan_bayi->sklera=='Ikrus' ? 'selected' : ''}}>Ikrus</option>
                <option value="Normal" {{$pemeriksaan_bayi->sklera=='Normal' ? 'selected' : ''}}>Normal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bola_mata">Bola Mata:</label>
            <select class="form-control" id="bola_mata" name="bola_mata">
                <option value="Normal" {{$pemeriksaan_bayi->bola_mata=='Normal' ? 'selected' : ''}}>Normal</option>
                <option value="Juling" {{$pemeriksaan_bayi->bola_mata=='Juling' ? 'selected' : ''}}>Juling</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gerakan_bola_mata">Gerakan Bola Mata:</label>
            <input type="text" class="form-control" id="gerakan_bola_mata" name="gerakan_bola_mata" value="{{$pemeriksaan_bayi->gerakan_bola_mata}}">
        </div>
        <div class="form-group">
            <label for="bentuk_telinga">Bentuk Telinga:</label>
            <input type="text" class="form-control" id="bentuk_telinga" name="bentuk_telinga" value="{{$pemeriksaan_bayi->bentuk_telinga}}">
        </div>
        <div class="form-group">
            <label for="posisi_telinga">Posisi Telinga:</label>
            <input type="text" class="form-control" id="posisi_telinga" name="posisi_telinga" value="{{$pemeriksaan_bayi->posisi_telinga}}">
        </div>
        <div class="form-group">
            <label for="lobang_telinga">Lobang Telinga:</label>
            <select class="form-control" id="lobang_telinga" name="lobang_telinga">
                <option value="Ada" {{$pemeriksaan_bayi->lobang_telinga=='Ada' ? 'selected' : ''}}>Ada</option>
                <option value="Tidak Ada" {{$pemeriksaan_bayi->lobang_telinga=='Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bibir">Bibir:</label>
            <select class="form-control" id="bibir" name="bibir">
                <option value="Normal" {{$pemeriksaan_bayi->bibir=='Normal' ? 'selected' : ''}}>Normal</option>
                <option value="Hazelip" {{$pemeriksaan_bayi->bibir=='Hazelip' ? 'selected' : ''}}>Hazelip</option>
                <option value="Lain-lain" {{$pemeriksaan_bayi->bibir=='Lain-lain' ? 'selected' : ''}}>Lain-lain</option>
            </select>
        </div>
        <div class="form-group">
            <label for="leher">Leher:</label>
            <input type="text" class="form-control" id="leher" name="leher" value="{{$pemeriksaan_bayi->leher}}">
        </div>
        <div class="form-group">
            <label for="dada">Dada:</label>
            <select class="form-control" id="dada" name="dada">
                <option value="Simetris" {{$pemeriksaan_bayi->dada=='Simetris' ? 'selected' : ''}}>Simetris</option>
                <option value="Tidak Simetris" {{$pemeriksaan_bayi->dada=='Tidak Simetris' ? 'selected' : ''}}>Tidak Simetris</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tali_pusat">Tali Pusat:</label>
            <select class="form-control" id="tali_pusat" name="tali_pusat">
                <option value="Normal" {{$pemeriksaan_bayi->tali_pusat=='Normal' ? 'selected' : ''}}>Normal</option>
                <option value="Besar dan Rapuh" {{$pemeriksaan_bayi->tali_pusat=='Besar dan Rapuh' ? 'selected' : ''}}>Besar dan Rapuh</option>
            </select>
        </div>
        <div class="form-group">
            <label for="posisi_punggung">Posisi Punggung:</label>
            <input type="text" class="form-control" id="posisi_punggung" name="posisi_punggung" value="{{$pemeriksaan_bayi->posisi_punggung}}">
        </div>
        <div class="form-group">
            <label for="fleksibilitas_tulang_punggung">Fleksibilitas Tulang Punggung:</label>
            <input type="text" class="form-control" id="fleksibilitas_tulang_punggung" name="fleksibilitas_tulang_punggung" value="{{$pemeriksaan_bayi->fleksibilitas_tulang_punggung}}">
        </div>
        <div class="form-group">
            <label for="kelainan_punggung">Kelainan Punggung:</label>
            <input type="text" class="form-control" id="kelainan_punggung" name="kelainan_punggung" value="{{$pemeriksaan_bayi->kelainan_punggung}}">
        </div>
        <div class="form-group">
            <label for="ekstermitas_atas">Ekstermitas Atas:</label>
            <input type="text" class="form-control" id="ekstermitas_atas" name="ekstermitas_atas" value="{{$pemeriksaan_bayi->ekstermitas_atas}}">
        </div>
        <div class="form-group">
            <label for="ekstermitas_bawah">Ekstermitas Bawah:</label>
            <input type="text" class="form-control" id="ekstermitas_bawah" name="ekstermitas_bawah" value="{{$pemeriksaan_bayi->ekstermitas_bawah}}">
        </div>
        <div class="form-group">
            <label for="abdomen_bentuk">Abdomen Bentuk:</label>
            <input type="text" class="form-control" id="abdomen_bentuk" name="abdomen_bentuk" value="{{$pemeriksaan_bayi->abdomen_bentuk}}">
        </div>
        <div class="form-group">
            <label for="abdomen_palpasi">Abdomen Palpasi:</label>
            <input type="text" class="form-control" id="abdomen_palpasi" name="abdomen_palpasi" value="{{$pemeriksaan_bayi->abdomen_palpasi}}">
        </div>
        <div class="form-group">
            <label for="kelainan_abdomen">Kelainan Abdomen:</label>
            <input type="text" class="form-control" id="kelainan_abdomen" name="kelainan_abdomen" value="{{$pemeriksaan_bayi->kelainan_abdomen}}">
        </div>
        <div class="form-group">
            <label for="genetalia_jenis_kelamin">Genetalia Jenis Kelamin:</label>
            <input type="text" class="form-control" id="genetalia_jenis_kelamin" name="genetalia_jenis_kelamin" value="{{$pemeriksaan_bayi->genetalia_jenis_kelamin}}">
        </div>
        <div class="form-group">
            <label for="genetalia_kelainan">Genetalia Kelainan:</label>
            <input type="text" class="form-control" id="genetalia_kelainan" name="genetalia_kelainan" value="{{$pemeriksaan_bayi->genetalia_kelainan}}">
        </div>
        <div class="form-group">
            <label for="anus">Anus:</label>
            <select class="form-control" id="anus" name="anus">
                <option value="Ada Lobang" {{$pemeriksaan_bayi->anus=='Ada Lobang' ? 'selected' : ''}}>Ada Lobang</option>
                <option value="Atresia Ani" {{$pemeriksaan_bayi->anus=='Atresia Ani' ? 'selected' : ''}}>Atresia Ani</option>
            </select>
        </div>

        <h5>Refleks</h5>
        <div class="form-group">
            <label for="menghisap">Menghisap:</label>
            <input type="text" class="form-control" id="menghisap" name="menghisap" value="{{$pemeriksaan_bayi->menghisap}}">
        </div>
        <div class="form-group">
            <label for="menoleh">Menoleh:</label>
            <input type="text" class="form-control" id="menoleh" name="menoleh" value="{{$pemeriksaan_bayi->menoleh}}">
        </div>
        <div class="form-group">
            <label for="menggenggam">Menggenggam:</label>
            <input type="text" class="form-control" id="menggenggam" name="menggenggam" value="{{$pemeriksaan_bayi->menggenggam}}">
        </div>
        <div class="form-group">
            <label for="babinski">Babinski:</label>
            <input type="text" class="form-control" id="babinski" name="babinski" value="{{$pemeriksaan_bayi->babinski}}">
        </div>
        <div class="form-group">
            <label for="moro">Moro:</label>
            <input type="text" class="form-control" id="moro" name="moro" value="{{$pemeriksaan_bayi->moro}}">
        </div>
        <div class="form-group">
            <label for="tonic_nack">Tonic Nack:</label>
            <input type="text" class="form-control" id="tonic_nack" name="tonic_nack" value="{{$pemeriksaan_bayi->tonic_nack}}">
        </div>

        <h5>Antropometri</h5>
        <div class="form-group">
            <label for="lingkar_kepala">Lingkar Kepala:</label>
            <input type="text" class="form-control" id="lingkar_kepala" name="lingkar_kepala" value="{{$pemeriksaan_bayi->lingkar_kepala}}">
        </div>
        <div class="form-group">
            <label for="lingkar_dada">Lingkar Dada:</label>
            <input type="text" class="form-control" id="lingkar_dada" name="lingkar_dada" value="{{$pemeriksaan_bayi->lingkar_dada}}">
        </div>
        <div class="form-group">
            <label for="lingkar_lengan_atas">Lingkar Lengan Atas:</label>
            <input type="text" class="form-control" id="lingkar_lengan_atas" name="lingkar_lengan_atas" value="{{$pemeriksaan_bayi->lingkar_lengan_atas}}">
        </div>

        <h5>Eliminasi</h5>
        <div class="form-group">
            <label for="miksi">Miksi:</label>
            <select class="form-control" id="miksi" name="miksi">
                <option value="Sudah" {{$pemeriksaan_bayi->miksi=='Sudah' ? 'selected' : ''}}>Sudah</option>
                <option value="Belum" {{$pemeriksaan_bayi->miksi=='Belum' ? 'selected' : ''}}>Belum</option>
            </select>
        </div>
        <div class="form-group">
            <label for="meconeum">Meconeum:</label>
            <select class="form-control" id="meconeum" name="meconeum">
                <option value="Sudah" {{$pemeriksaan_bayi->meconeum=='Sudah' ? 'selected' : ''}}>Sudah</option>
                <option value="Belum" {{$pemeriksaan_bayi->meconeum=='Belum' ? 'selected' : ''}}>Belum</option>
            </select>
        </div>

        <h5>Pemeriksaan Laboratorium</h5>
        <div class="form-group">
            <label for="hb">Hb:</label>
            <input type="text" class="form-control" id="hb" name="hb" value="{{$pemeriksaan_bayi->hb}}">
        </div>
        <div class="form-group">
            <label for="golongan_darah">Golongan Darah:</label>
            <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" value="{{$pemeriksaan_bayi->golongan_darah}}">
        </div>
        <div class="form-group">
            <label for="ht">HT:</label>
            <input type="text" class="form-control" id="ht" name="ht" value="{{$pemeriksaan_bayi->ht}}">
        </div>

        <div class="form-group">
            <label for="pengobatan">Pengobatan:</label>
            <textarea class="form-control" id="pengobatan" name="pengobatan" rows="3">{{$pemeriksaan_bayi->pengobatan}}</textarea>
        </div>

        <button type="button" class="btn btn-primary" onclick="simpanPemeriksaanBayi()">Submit</button>
    </form>
</div>
