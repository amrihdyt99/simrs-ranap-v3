@empty($assesment_bayi)
@php
   $assesment_bayi = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Assesment Bayi</h2>
    <form id="assesment_bayi">
        <h4>Anamnesa</h4>

        <h5>Identitas Biodata</h5>
        <div class="form-group">
            <label for="no_rm_bayi">No. RM Bayi:</label>
            <input type="text" class="form-control" id="no_rm_bayi" name="no_rm_bayi" value="{{$assesment_bayi->no_rm_bayi}}">
        </div>
        <div class="form-group">
            <label for="no_rm_ibu">No. RM Ibu:</label>
            <input type="text" class="form-control" id="no_rm_ibu" name="no_rm_ibu" value="{{$assesment_bayi->no_rm_ibu}}">
        </div>
        <div class="form-group">
            <label for="nama_bayi">Nama Bayi:</label>
            <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" value="{{$assesment_bayi->nama_bayi}}">
        </div>
        <div class="form-group">
            <label for="tempat_lahir_bayi">Tempat Lahir Bayi:</label>
            <input type="text" class="form-control" id="tempat_lahir_bayi" name="tempat_lahir_bayi" value="{{$assesment_bayi->tempat_lahir_bayi}}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir_bayi">Tanggal Lahir Bayi:</label>
            <input type="date" class="form-control" id="tanggal_lahir_bayi" name="tanggal_lahir_bayi" value="{{$assesment_bayi->tanggal_lahir_bayi}}">
        </div>
        <div class="form-group">
            <label for="jenis_kelamin_bayi">Jenis Kelamin Bayi:</label>
            <select class="form-control" id="jenis_kelamin_bayi" name="jenis_kelamin_bayi">
                <option value="Laki-laki" {{$assesment_bayi->jenis_kelamin_bayi=='Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                <option value="Perempuan" {{$assesment_bayi->jenis_kelamin_bayi=='Perempuan' ? 'selected' : ''}}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu:</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{$assesment_bayi->nama_ibu}}">
        </div>
        <div class="form-group">
            <label for="umur_ibu">Umur Ibu:</label>
            <input type="text" class="form-control" id="umur_ibu" name="umur_ibu" value="{{$assesment_bayi->umur_ibu}}">
        </div>
        <div class="form-group">
            <label for="agama_ibu">Agama Ibu:</label>
            <input type="text" class="form-control" id="agama_ibu" name="agama_ibu" value="{{$assesment_bayi->agama_ibu}}">
        </div>
        <div class="form-group">
            <label for="suku_bangsa_ibu">Suku Bangsa Ibu:</label>
            <input type="text" class="form-control" id="suku_bangsa_ibu" name="suku_bangsa_ibu" value="{{$assesment_bayi->suku_bangsa_ibu}}">
        </div>
        <div class="form-group">
            <label for="pendidikan_ibu">Pendidikan Ibu:</label>
            <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" value="{{$assesment_bayi->pendidikan_ibu}}">
        </div>
        <div class="form-group">
            <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{$assesment_bayi->pekerjaan_ibu}}">
        </div>
        <div class="form-group">
            <label for="alamat_ibu">Alamat Ibu:</label>
            <textarea class="form-control" id="alamat_ibu" name="alamat_ibu">{{$assesment_bayi->alamat_ibu}}</textarea>
        </div>
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah:</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{$assesment_bayi->nama_ayah}}">
        </div>
        <div class="form-group">
            <label for="umur_ayah">Umur Ayah:</label>
            <input type="text" class="form-control" id="umur_ayah" name="umur_ayah" value="{{$assesment_bayi->umur_ayah}}">
        </div>
        <div class="form-group">
            <label for="agama_ayah">Agama Ayah:</label>
            <input type="text" class="form-control" id="agama_ayah" name="agama_ayah" value="{{$assesment_bayi->agama_ayah}}">
        </div>
        <div class="form-group">
            <label for="suku_bangsa_ayah">Suku Bangsa Ayah:</label>
            <input type="text" class="form-control" id="suku_bangsa_ayah" name="suku_bangsa_ayah" value="{{$assesment_bayi->suku_bangsa_ayah}}">
        </div>
        <div class="form-group">
            <label for="pendidikan_ayah">Pendidikan Ayah:</label>
            <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" value="{{$assesment_bayi->pendidikan_ayah}}">
        </div>
        <div class="form-group">
            <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{$assesment_bayi->pekerjaan_ayah}}">
        </div>
        <div class="form-group">
            <label for="alamat_ayah">Alamat Ayah:</label>
            <textarea class="form-control" id="alamat_ayah" name="alamat_ayah">{{$assesment_bayi->alamat_ayah}}</textarea>
        </div>

        <h5>Riwayat Kehamilan</h5>
        <div class="form-group">
            <label for="pendarahan">Pendarahan:</label>
            <input type="text" class="form-control" id="pendarahan" name="pendarahan" value="{{$assesment_bayi->pendarahan}}">
        </div>
        <div class="form-group">
            <label for="pre_eklampsia">Pre Eklampsia:</label>
            <input type="text" class="form-control" id="pre_eklampsia" name="pre_eklampsia" value="{{$assesment_bayi->pre_eklampsia}}">
        </div>
        <div class="form-group">
            <label for="eklampsia">Eklampsia:</label>
            <input type="text" class="form-control" id="eklampsia" name="eklampsia" value="{{$assesment_bayi->eklampsia}}">
        </div>
        <div class="form-group">
            <label for="penyakit_kelamin">Penyakit Kelamin:</label>
            <input type="text" class="form-control" id="penyakit_kelamin" name="penyakit_kelamin" value="{{$assesment_bayi->penyakit_kelamin}}">
        </div>
        <div class="form-group">
            <label for="lain_lain_riwayat_kehamilan">Lain-lain Riwayat Kehamilan:</label>
            <input type="text" class="form-control" id="lain_lain_riwayat_kehamilan" name="lain_lain_riwayat_kehamilan" value="{{$assesment_bayi->lain_lain_riwayat_kehamilan}}">
        </div>

        <h5>Kebiasaan Waktu Hamil</h5>
        <div class="form-group">
            <label for="makanan">Makanan:</label>
            <input type="text" class="form-control" id="makanan" name="makanan" value="{{$assesment_bayi->makanan}}">
        </div>
        <div class="form-group">
            <label for="obat_obatan">Obat-Obatan:</label>
            <input type="text" class="form-control" id="obat_obatan" name="obat_obatan" value="{{$assesment_bayi->obat_obatan}}">
        </div>
        <div class="form-group">
            <label for="merokok">Merokok:</label>
            <input type="text" class="form-control" id="merokok" name="merokok" value="{{$assesment_bayi->merokok}}">
        </div>
        <div class="form-group">
            <label for="lain_lain_kebiasaan">Lain-lain Kebiasaan:</label>
            <input type="text" class="form-control" id="lain_lain_kebiasaan" name="lain_lain_kebiasaan" value="{{$assesment_bayi->lain_lain_kebiasaan}}">
        </div>

        <h5>Riwayat Persalinan Sekarang</h5>
        <div class="form-group">
            <label for="jenis_persalinan">Jenis Persalinan:</label>
            <input type="text" class="form-control" id="jenis_persalinan" name="jenis_persalinan" value="{{$assesment_bayi->jenis_persalinan}}">
        </div>
        <div class="form-group">
            <label for="ditolong_oleh">Ditolong Oleh:</label>
            <input type="text" class="form-control" id="ditolong_oleh" name="ditolong_oleh" value="{{$assesment_bayi->ditolong_oleh}}">
        </div>
        <div class="form-group">
            <label for="lama_persalinan">Lama Persalinan:</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="kala_satu" name="kala_satu" placeholder="Kala 1" value="{{$assesment_bayi->kala_satu}}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="kala_dua" name="kala_dua" placeholder="Kala 2" value="{{$assesment_bayi->kala_dua}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="ketuban_Pecah">Ketuban Pecah:</label>
            <select class="form-control" id="ketuban_Pecah" name="ketuban_Pecah">
                <option value="Spontan" {{$assesment_bayi->ketuban_Pecah=='Spontan' ? 'selected' : ''}}>Spontan</option>
                <option value="Amniotomi" {{$assesment_bayi->ketuban_Pecah=='Amniotomi' ? 'selected' : ''}}>Amniotomi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="warna">Warna:</label>
            <input type="text" class="form-control" id="warna" name="warna" value="{{$assesment_bayi->kala_dua}}">
        </div>
        <div class="form-group">
            <label for="bau">Bau:</label>
            <select class="form-control" id="bau" name="bau">
                <option value="Bau" {{$assesment_bayi->bau=='Bau' ? 'selected' : ''}}>Bau</option>
                <option value="Tidak" {{$assesment_bayi->bau=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="komplikasi_persalinan_ibu">Komplikasi Persalinan Ibu:</label>
            <input type="text" class="form-control" id="komplikasi_persalinan_ibu" name="komplikasi_persalinan_ibu" value="{{$assesment_bayi->komplikasi_persalinan_ibu}}">
        </div>
        <div class="form-group">
            <label for="komplikasi_persalinan_bayi">Komplikasi Persalinan Bayi:</label>
            <input type="text" class="form-control" id="komplikasi_persalinan_bayi" name="komplikasi_persalinan_bayi" value="{{$assesment_bayi->komplikasi_persalinan_bayi}}">
        </div>

        <h5>Keadaan Persalinan Sekarang</h5>
        <div class="form-group">
            <label class="font-weight-bold">Nilai Apgar</label>
            <div class="form-row">
                <div class="col">
                    <label for="warna_kulit_1_menit">0-1 Menit:</label>
                    <input type="text" class="form-control" id="warna_kulit_1_menit" name="warna_kulit_1_menit" value="{{$assesment_bayi->warna_kulit_1_menit}}">
                </div>
                <div class="col">
                    <label for="denyut_nadi_1_menit">Denyut Nadi:</label>
                    <input type="text" class="form-control" id="denyut_nadi_1_menit" name="denyut_nadi_1_menit" value="{{$assesment_bayi->warna_kulit_1_menit}}">
                </div>
                <div class="col">
                    <label for="reaksi_rangsangan_1_menit">Reaksi Rangsangan:</label>
                    <input type="text" class="form-control" id="reaksi_rangsangan_1_menit" name="reaksi_rangsangan_1_menit" value="{{$assesment_bayi->reaksi_rangsangan_1_menit}}">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <label for="warna_kulit_5_menit">5 Menit:</label>
                    <input type="text" class="form-control" id="warna_kulit_5_menit" name="warna_kulit_5_menit" value="{{$assesment_bayi->warna_kulit_5_menit}}">
                </div>
                <div class="col">
                    <label for="denyut_nadi_5_menit">Denyut Nadi:</label>
                    <input type="text" class="form-control" id="denyut_nadi_5_menit" name="denyut_nadi_5_menit" value="{{$assesment_bayi->denyut_nadi_5_menit}}">
                </div>
                <div class="col">
                    <label for="reaksi_rangsangan_5_menit">Reaksi Rangsangan:</label>
                    <input type="text" class="form-control" id="reaksi_rangsangan_5_menit" name="reaksi_rangsangan_5_menit" value="{{$assesment_bayi->reaksi_rangsangan_5_menit}}">
                </div>
            </div>
        </div>

        <h5>Resusitasi</h5>
        <div class="form-group">
            <label for="pengisapan_lendir">Pengisapan Lendir:</label>
            <select class="form-control" id="pengisapan_lendir" name="pengisapan_lendir">
                <option value="Ya" {{$assesment_bayi->pengisapan_lendir=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$assesment_bayi->pengisapan_lendir=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ambu">Ambu:</label>
            <select class="form-control" id="ambu" name="ambu">
                <option value="Ya" {{$assesment_bayi->ambu=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$assesment_bayi->ambu=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lama_ambu">Lama Ambu:</label>
            <input type="text" class="form-control" id="lama_ambu" name="lama_ambu" value="{{$assesment_bayi->reaksi_rangsangan_5_menit}}">
        </div>
        <div class="form-group">
            <label for="massage_jantung">Massage Jantung:</label>
            <select class="form-control" id="massage_jantung" name="massage_jantung" >
                <option value="Ya" {{$assesment_bayi->massage_jantung=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$assesment_bayi->massage_jantung=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lama_massage_jantung">Lama Massage Jantung:</label>
            <input type="text" class="form-control" id="lama_massage_jantung" name="lama_massage_jantung" value="{{$assesment_bayi->lama_massage_jantung}}">
        </div>
        <div class="form-group">
            <label for="intubasi">Intubasi:</label>
            <select class="form-control" id="intubasi" name="intubasi">
                <option value="Ya" {{$assesment_bayi->intubasi=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$assesment_bayi->intubasi=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lama_intubasi">Lama Intubasi:</label>
            <input type="text" class="form-control" id="lama_intubasi" name="lama_intubasi" value="{{$assesment_bayi->lama_intubasi}}">
        </div>
        <div class="form-group">
            <label for="pemakaian_oksigen">Pemakaian Oksigen:</label>
            <select class="form-control" id="pemakaian_oksigen" name="pemakaian_oksigen">
                <option value="Ya" {{$assesment_bayi->pemakaian_oksigen=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$assesment_bayi->pemakaian_oksigen=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lama_pemakaian_oksigen">Lama Pemakaian Oksigen:</label>
            <input type="text" class="form-control" id="lama_pemakaian_oksigen" name="lama_pemakaian_oksigen" value="{{$assesment_bayi->lama_pemakaian_oksigen}}">
        </div>

        <div class="form-group">
            <label for="therapy">Therapy:</label>
            <textarea class="form-control" id="therapy" name="therapy">{{$assesment_bayi->therapy}}</textarea>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan" >{{$assesment_bayi->therapy}}</textarea>
        </div>

        <button type="button" class="btn btn-primary" onclick="simpanAsesmentBayi()">Submit</button>
    </form>
</div>
