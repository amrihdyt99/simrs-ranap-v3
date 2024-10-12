<h4 class="text-black">CATATAN KEPERAWATAN PRA TINDAKAN KATERISASI/ANGIOGRAFI/ANGIOPLASTI</h4>
<hr>
<form id="form_pra_tindakan">
    <input type="hidden" name="_token" value="qLYsYhIlUBhlqm1BX1T4syJfmdTaYpfCWIc2eaCA">
    <div class="text-black" style="font-size: 14px">
        <h5 class="bg-warning p-2">CATATAN KEPERAWATAN PRA TINDAKAN (diisi oleh perawat ruangan)</h5>
        <ol>
            <li>
                Tanda-tanda Vital
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Suhu (Celcius)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_suhu" id="pra_suhu" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Nadi (x/mnt)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_nadi" id="pra_nadi" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>RR (x/mnt)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_rr" id="pra_rr" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>TD (mmHg)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_td" id="pra_td" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Skor Nyeri</label>
                            <input type="text" class="form-control" value=""
                                name="pra_skor_nyeri" id="pra_skor_nyeri" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>TB (cm)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_tb" id="pra_tb" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>BB (kg)</label>
                            <input type="text" class="form-control" value=""
                                name="pra_bb" id="pra_bb" disabled>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-2">
                        Status Mental
                    </div>

                    <div class="col-lg-10">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_status_mental_Sadar penuh"
                                value="Sadar penuh" name="pra_status_mental[]"
                                disabled>
                            <label class="custom-control-label" for="pra_status_mental_Sadar penuh">Sadar penuh</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_status_mental_Bingung"
                                value="Bingung" name="pra_status_mental[]"
                                disabled>
                            <label class="custom-control-label" for="pra_status_mental_Bingung">Bingung</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_status_mental_Agitasi"
                                value="Agitasi" name="pra_status_mental[]"
                                disabled>
                            <label class="custom-control-label" for="pra_status_mental_Agitasi">Agitasi</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_status_mental_Mengantuk"
                                value="Mengantuk" name="pra_status_mental[]"
                                disabled>
                            <label class="custom-control-label" for="pra_status_mental_Mengantuk">Mengantuk</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_status_mental_Koma"
                                value="Koma" name="pra_status_mental[]"
                                disabled>
                            <label class="custom-control-label" for="pra_status_mental_Koma">Koma</label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-2">
                        Riwayat Penyakit
                    </div>
                    <div class="col-lg-10">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_penyakit_dahulu_Hipertensi"
                                value="Hipertensi" name="pra_penyakit_dahulu[]"
                                disabled>
                            <label class="custom-control-label"
                                for="pra_penyakit_dahulu_Hipertensi">Hipertensi</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_penyakit_dahulu_Diabetes"
                                value="Diabetes" name="pra_penyakit_dahulu[]"
                                disabled>
                            <label class="custom-control-label" for="pra_penyakit_dahulu_Diabetes">Diabetes</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada"
                                id="pra_penyakit_dahulu_Hepatitis" value="Hepatitis" name="pra_penyakit_dahulu[]"
                                disabled>
                            <label class="custom-control-label" for="pra_penyakit_dahulu_Hepatitis">Hepatitis</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_penyakit_dahulu_Lainnya"
                                value="Lainnya" name="pra_penyakit_dahulu[]"
                                disabled>
                            <label class="custom-control-label" for="pra_penyakit_dahulu_Lainnya">Lainnya</label>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label>Pengobatan saat ini</label>
                    <input type="text" class="form-control" name="pra_pengobatan_saat_ini"
                        value="" id="pra_pengobatan_saat_ini" disabled>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Riwayat Katerisasi</label>
                            <input type="text" class="form-control" name="pra_katerisasi"
                                value="" id="pra_katerisasi" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        Pasang Stent
                    </div>
                    <div class="col-lg-2">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_stent_Ya" value="Ya"
                                name="pra_stent[]" disabled>
                            <label class="custom-control-label" for="pra_stent_Ya">Ya</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input Ada" id="pra_stent_Tidak"
                                value="Tidak" name="pra_stent[]" disabled>
                            <label class="custom-control-label" for="pra_stent_Tidak">Tidak</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"><label>Di..</label>
                            <input type="text" class="form-control" name="pra_stent_di"
                                value="" id="pra_stent_di" disabled>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                Riwayat Operasi
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text" class="form-control" name="pra_jenis"
                                value="" id="pra_jenis" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>kapan</label>
                            <input type="text" class="form-control" name="pra_kapan"
                                value="" id="pra_kapan" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>di</label>
                            <input type="text" class="form-control" name="pra_di"
                                value="" id="pra_di" disabled>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-2">
                        Alergi obat/kontras
                    </div>
                    <div class="col-lg-2">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="pra_alergi_Tidak diketahui" type="radio" class="custom-control-input"
                                value="Tidak diketahui" name="pra_alergi" disabled>
                            <label class="custom-control-label" for="pra_alergi_Tidak diketahui">Tidak
                                diketahui</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="pra_alergi_Tidak ada" type="radio" class="custom-control-input"
                                value="Tidak ada" name="pra_alergi" disabled>
                            <label class="custom-control-label" for="pra_alergi_Tidak ada">Tidak ada</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="pra_alergi_Ada" type="radio" class="custom-control-input"
                                        value="Ada" name="pra_alergi" disabled>
                                    <label class="custom-control-label" for="pra_alergi_Ada">Ada</label>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label>, Sebutkan</label>
                                    <input type="text" class="form-control" name="pra_alergi_text"
                                        value="" id="pra_alergi_text" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                Pemeriksaan Laboratorium
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>ureum</label>
                            <input type="text" class="form-control" name="cath_signin_ureum"
                                value="" id="cath_signin_ureum" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>creatinin</label>
                            <input type="text" class="form-control" name="cath_signin_creatinin"
                                value="" id="cath_signin_creatinin" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>hbsag</label>
                            <input type="text" class="form-control" name="cath_signin_hbsag"
                                value="" id="cath_signin_hbsag" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>gds</label>
                            <input type="text" class="form-control" name="cath_signin_gds"
                                value="" id="cath_signin_gds" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>hb</label><input type="text" class="form-control" name="cath_signin_hb"
                                value="" id="cath_signin_hb" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>trombosit</label>
                            <input type="text" class="form-control" name="cath_signin_trombosit"
                                value="" id="cath_signin_trombosit" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>pt</label>
                            <input type="text" class="form-control" name="cath_signin_pt"
                                value="" id="cath_signin_pt" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>aptt</label>
                            <input type="text" class="form-control" name="cath_signin_aptt"
                                value="" id="cath_signin_aptt" disabled>
                        </div>
                    </div>
                </div>
            </li>
        </ol>

        <br>
        <h3 class="bg-warning p-2">CEKLIST PERSIAPAN TINDAKAN (diisi oleh perawat ruangan dan perawat cath lab)</h3>

        <div class="row">
            <div class="col-lg-4">
                Beri tanda pada kolom Ruangan/cathlab
            </div>
            <div class="col-lg-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="ceklist_kesiapan_ruang_Ya" type="radio" class="custom-control-input" value="Ya"
                        name="ceklist_kesiapan_ruang" disabled>
                    <label class="custom-control-label" for="ceklist_kesiapan_ruang_Ya">Ya</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="ceklist_kesiapan_ruang_Tidak" type="radio" class="custom-control-input"
                        value="Tidak" name="ceklist_kesiapan_ruang" disabled>
                    <label class="custom-control-label" for="ceklist_kesiapan_ruang_Tidak">Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="ceklist_kesiapan_ruang_Tidak ada" type="radio" class="custom-control-input"
                        value="Tidak ada" name="ceklist_kesiapan_ruang" disabled>
                    <label class="custom-control-label" for="ceklist_kesiapan_ruang_Tidak ada">Tidak ada</label>
                </div>
            </div>
        </div>
        <br>
        <table class="table1 table w-100">
            <tbody>
                <tr>
                    <th style="width: 1px">No.</th>
                    <th>I. VERIFIKASI PASIEN</th>
                    <th>Ruangan</th>
                    <th>CathLab</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Periksa identitas pasien</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_1_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_1_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_1_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_1_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_1_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_1_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_1_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_1_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_1_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_1_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_1_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_1_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <input type="text" name="verif_keterangan_1" class="form-control"
                            value="" id="verif_keterangan_1" disabled>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Periksa gelang identitas/gelang alergi</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_2_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_2_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_2_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_2_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_2_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_2_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_2_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_2_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_2_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_2_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_2_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_2_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_2"
                            value="" class="form-control" id="verif_keterangan_2" disabled></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Akses dan tindakan dipastikan bersama pasien</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_3_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_3_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_3_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_3_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_3_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_3_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_3_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_3_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_3_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_3_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_3_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_3_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_3"
                            value="" class="form-control" id="verif_keterangan_3" disabled></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Periksa surat persetujuan tindakan</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_4_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_4_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_4_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_4_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_4_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_4_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_4_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_4_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_4_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_4_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_4_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_4_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_4"
                            value="" class="form-control" id="verif_keterangan_4" disabled></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Persetujuan biaya tindakan</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_5_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_5_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_5_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_5_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_5_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="verif_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_5_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_5_1" type="radio"
                                    class="custom-control-input" value="Ya" name="verif_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_5_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_5_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="verif_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_5_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_5_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="verif_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_5_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_5"
                            value="" class="form-control" id="verif_keterangan_5" disabled></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Periksa kelengkapan persetujuan anastesi (jika perlu)</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_6_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_6_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_6_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_6_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_6_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_6_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_6_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_6_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_6_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_6_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_6_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_6_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_6"
                            value="" class="form-control" id="verif_keterangan_6" disabled></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Periksa kelengkapan rekam medis/file nama</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_7_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_7_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_7_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_7_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_7_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_7_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_7_1" type="radio"
                                    class="custom-control-input" value="Ya" name="verif_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_7_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_7_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="verif_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_7_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_7_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="verif_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_7_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="verif_keterangan_7"
                            value="" class="form-control" id="verif_keterangan_7" disabled></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Periksa kelengkapan x-ray/CT-Scan/MRI/EKG/Echo/Angiografi</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_8_1" type="radio" class="custom-control-input"
                                    value="Ya" name="verif_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_8_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_8_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="verif_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_8_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_ruangan_8_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="verif_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_verif_ruangan_8_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_8_1" type="radio"
                                    class="custom-control-input" value="Ya" name="verif_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_8_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_8_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="verif_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_8_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_verif_cathlab_8_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="verif_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_verif_cathlab_8_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="verif_keterangan_8" class="form-control"
                            value="" id="verif_keterangan_8" disabled></td>
                </tr>
                <tr>
                    <th style="width: 1px">No.</th>
                    <th>II. PERSIAPAN FISIK PASIEN</th>
                    <th>Ruangan</th>
                    <th>CathLab</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Periksa lab: ureum, creatinin, darah rutin, PT/APTT, HBsAg**</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_1_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_1_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_1_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_1_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_1_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_ruangan_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_1_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_1_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_1_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_1_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_1_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_1_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_cathlab_1" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_1_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="persiapan_keterangan_1"
                            value="" class="form-control" id="persiapan_keterangan_1" disabled></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Puasa/makan dan minum terakhir**</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_2_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_2_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_2_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_2_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_2_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_ruangan_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_2_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_2_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_2_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_2_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_2_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_2_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_cathlab_2" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_2_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="persiapan_keterangan_2"
                            value="" class="form-control" id="persiapan_keterangan_2" disabled></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gigi palsu/ kontak lensa dilepaskan*</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_3_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_3_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_3_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_3_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_3_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_ruangan_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_3_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_3_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_3_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_3_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_3_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_3_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_cathlab_3" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_3_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="persiapan_keterangan_3"
                            value="" class="form-control" id="persiapan_keterangan_3" disabled></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Menggunakan pacemaker</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_4_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_4_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_4_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_4_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_4_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_ruangan_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_4_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_4_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_4_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_4_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_4_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_4_3" type="radio" class="custom-control-input"
                                    value="Tidak ada" name="persiapan_cathlab_4" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_4_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text" name="persiapan_keterangan_4"
                            value="" class="form-control" id="persiapan_keterangan_4" disabled></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Penjepit rambut/cat kuku/perhiasan dilepaskan*</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_5_1" type="radio" class="custom-control-input"
                                    value="Ya" name="persiapan_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_5_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_5_2" type="radio" class="custom-control-input"
                                    value="Tidak" name="persiapan_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_5_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_5_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_5_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_5_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_5_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_5_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_5_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_5_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_5" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_5_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="persiapan_keterangan_5" class="form-control" id="persiapan_keterangan_5" disabled></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Pasang pampers/ kondom kateter**</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_6_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_6_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_6_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_6_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_6_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_6_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_6_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_6_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_6_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_6_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_6_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_6" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_6_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <input type="text" name="persiapan_keterangan_6" class="form-control"
                            value="" id="persiapan_keterangan_6" disabled>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Cukur daerah inguinal kanan dan kiri/radialis kanan</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_7_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_7_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_7_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_7_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_7_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_7_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_7_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_7_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_7_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_7_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_7_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_7" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_7_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <input type="text" name="persiapan_keterangan_7" class="form-control"
                            value="" id="persiapan_keterangan_7" disabled>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Pasang IV lline di tangan kiri</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_8_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_8_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_8_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_8_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_8_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_8_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_8_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_8_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_8_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_8_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_8_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_8" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_8_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="persiapan_keterangan_8" class="form-control"
                            value="" id="persiapan_keterangan_8" disabled></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Lakukan Allen test(tindakan dari arteri radialis)</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_9_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_9_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_9_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_9_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_9_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_9_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_9_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_9_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_9_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_9_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_9_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_9" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_9_3">Tidak ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="persiapan_keterangan_9" class="form-control"
                            value="" id="persiapan_keterangan_9" disabled></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Sedang menstruasi/ sedang hamil(wanita)</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_10_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_10_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_10_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_10_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_10_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_10_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_10_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_10_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_10_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_10_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_10_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_10" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_10_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="persiapan_keterangan_10" class="form-control"
                            value="" id="persiapan_keterangan_10" disabled></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Obat DM dihentikan saat puasa**</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_11_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_11_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_11_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_11_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_11_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_11_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_11_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_11_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_11_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_11_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_11_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_11" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_11_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            name="persiapan_keterangan_11" id="persiapan_keterangan_11" class="form-control"
                            value="" disabled></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Lain-lain**</td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_12_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_ruangan_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_12_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_12_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_ruangan_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_12_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_ruangan_12_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_ruangan_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_ruangan_12_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black">
                        <div class="col-lg-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_12_1" type="radio"
                                    class="custom-control-input" value="Ya" name="persiapan_cathlab_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_12_1">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_12_2" type="radio"
                                    class="custom-control-input" value="Tidak" name="persiapan_cathlab_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_12_2">Tidak</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="input_persiapan_cathlab_12_3" type="radio"
                                    class="custom-control-input" value="Tidak ada" name="persiapan_cathlab_12" disabled>
                                <label class="custom-control-label" for="input_persiapan_cathlab_12_3">Tidak
                                    ada</label>
                            </div>
                        </div>
                    </td>
                    <td style="border-bottom: 1px solid black"> <input type="text"
                            id="persiapan_keterangan_12" name="persiapan_keterangan_12" class="form-control"
                            value="" disabled></td>
                </tr>
            </tbody>
        </table>
        <table class="table w-100">
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Tanggal dan Jam </label>
                            <input type="datetime-local" class="form-control" id="tgl_jam_ruangan" name="tgl_jam_ruangan"
                                value="" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label>Perawat Ruangan</label>
                            <input type="text" class="form-control" id="perawat_ruangan" name="perawat_ruangan"
                                value="" disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Tanggal dan Jam </label>
                            <input type="datetime-local" class="form-control" id="tgl_jam_cathlab" name="tgl_jam_cathlab"
                                value="" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label>Perawat Cathlab</label>
                            <input type="text" class="form-control" id="perawat_cathlab" name="perawat_cathlab"
                                value="" disabled>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</form>
