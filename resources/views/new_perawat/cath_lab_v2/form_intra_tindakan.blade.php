@empty($rs_pasien_intra_tindakan)
    @php
        $rs_pasien_intra_tindakan = optional((object) []);
    @endphp
@endempty
<h2 class="text-black">Catatan Keperawatan - Intra Tindakan</h2>
<br>
<form id="form_intra_tindakan">
    @csrf
    <div class="text-black" style="font-size: 14px">
        <div class="form-group"><label class="control-label">Pasien tiba di Cath Lab</label>
            <select class="form-control" name="pasien_tiba">
                <option value="Kursi Roda" {{ $rs_pasien_intra_tindakan->pasien_tiba == 'Kursi Roda' ? 'selected' : '' }}>
                    Kursi Roda</option>
                <option value="Tempat Tidur"
                    {{ $rs_pasien_intra_tindakan->pasien_tiba == 'Tempat Tidur' ? 'selected' : '' }}>Tempat Tidur</option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Time out</label>
            <select class="form-control" name="time_out">
                <option value="Ya" {{ $rs_pasien_intra_tindakan->time_out == 'Ya' ? 'selected' : '' }}>Ya</option>
                <option value="tidak" {{ $rs_pasien_intra_tindakan->time_out == 'tidak' ? 'selected' : '' }}>Tidak
                </option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Cek fungsi dan peralatan</label>
            <select class="form-control" name="cek_fungsi_peralatan">
                <option value="Ya" {{ $rs_pasien_intra_tindakan->cek_fungsi_peralatan == 'Ya' ? 'selected' : '' }}>Ya
                </option>
                <option value="tidak" {{ $rs_pasien_intra_tindakan->cek_fungsi_peralatan == 'tidak' ? 'selected' : '' }}>
                    Tidak</option>
            </select>
        </div>


        <div class="form-group"><label class="control-label">Preparasi di</label>
            <select class="form-control" name="preparasi_di">
                <option value="Inguinal Kanan/Kiri"
                    {{ $rs_pasien_intra_tindakan->preparasi_di == 'Inguinal Kanan/Kiri' ? 'selected' : '' }}>Inguinal
                    Kanan/Kiri</option>
                <option value="Radial Kanan/Kiri"
                    {{ $rs_pasien_intra_tindakan->preparasi_di == 'Radial Kanan/Kiri' ? 'selected' : '' }}>Radial
                    Kanan/Kiri</option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Desinfektan dengan</label>
            <select class="form-control" name="desinfektan_dengan">
                <option value="Alkohol 70%"
                    {{ $rs_pasien_intra_tindakan->desinfektan_dengan == 'Alkohol 70%' ? 'selected' : '' }}>Alkohol 70%
                </option>
                <option value="Iodine" {{ $rs_pasien_intra_tindakan->desinfektan_dengan == 'Iodine' ? 'selected' : '' }}>
                    Iodine</option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Tipe Pembiusan</label>
            <select class="form-control" name="tipe_pembiusan">
                <option value="Lokal" {{ $rs_pasien_intra_tindakan->tipe_pembiusan == 'Lokal' ? 'selected' : '' }}>Lokal
                </option>
                <option value="Umum" {{ $rs_pasien_intra_tindakan->tipe_pembiusan == 'Umum' ? 'selected' : '' }}>Umum
                </option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Akses</label>
            <select class="form-control" name="akses">
                <option value="Sheat 5 Fr" {{ $rs_pasien_intra_tindakan->akses == 'Sheat 5 Fr' ? 'selected' : '' }}>Sheat
                    5 Fr</option>
                <option value="Sheat 6 Fr" {{ $rs_pasien_intra_tindakan->akses == 'Sheat 6 Fr' ? 'selected' : '' }}>Sheat
                    6 Fr</option>
            </select>
        </div>


        <div class="form-group">
            <label class="control-label">Chateter diagnostik</label>
            <select class="form-control" name="catheter_diagnostik">
                <option value="JR" {{ $rs_pasien_intra_tindakan->catheter_diagnostik == 'JR' ? 'selected' : '' }}>JR
                </option>
                <option value="JL" {{ $rs_pasien_intra_tindakan->catheter_diagnostik == 'JL' ? 'selected' : '' }}>JL
                </option>
                <option value="Radial Catheter"
                    {{ $rs_pasien_intra_tindakan->catheter_diagnostik == 'Radial Catheter' ? 'selected' : '' }}>Radial
                    Catheter</option>
                <option value="Vertebra"
                    {{ $rs_pasien_intra_tindakan->catheter_diagnostik == 'Vertebra' ? 'selected' : '' }}>Vertebra
                </option>
                <option value="Pig tail"
                    {{ $rs_pasien_intra_tindakan->catheter_diagnostik == 'Pig tail' ? 'selected' : '' }}>Pig tail
                </option>
            </select>
        </div>
        <div class="form-group"><label class="control-label"></label>
            <select class="form-control" name="value_diagnostik">
                <option value="3,5-5 Fr"
                    {{ $rs_pasien_intra_tindakan->value_diagnostik == '3,5-5 Fr' ? 'selected' : '' }}>3,5-5 Fr</option>
                <option value="3,5-6 Fr"
                    {{ $rs_pasien_intra_tindakan->value_diagnostik == '3,5-6 Fr' ? 'selected' : '' }}>3,5-6 Fr</option>
                <option value="4,0-5 Fr"
                    {{ $rs_pasien_intra_tindakan->value_diagnostik == '4,0-5 Fr' ? 'selected' : '' }}>4,0-5 Fr</option>
                <option value="4,0- 6Fr"
                    {{ $rs_pasien_intra_tindakan->value_diagnostik == '4,0- 6Fr' ? 'selected' : '' }}>4,0-6 Fr</option>
                <option value="5 Fr" {{ $rs_pasien_intra_tindakan->value_diagnostik == '5 Fr' ? 'selected' : '' }}>5 Fr
                </option>
                <option value="6 Fr" {{ $rs_pasien_intra_tindakan->value_diagnostik == '6 Fr' ? 'selected' : '' }}>6 Fr
                </option>
            </select>
        </div>

        <div class="form-group"><label class="control-label">Kontras</label>
            <input type="text" name="kontras" placeholder="" class="form-control"
                value="{{ $rs_pasien_intra_tindakan->kontras }}" />
        </div>
        <div class="form-group"><label class="control-label">Guiding Catheter</label>
            <select class="form-control" name="guiding_catheter">
                <option value="JR 3,5" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'JR 3,5' ? 'selected' : '' }}>JR
                    3,5</option>
                <option value="JR 4,0" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'JR 4,0' ? 'selected' : '' }}>JR
                    4,0</option>
                <option value="JL 3,5" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'JL 3,5' ? 'selected' : '' }}>JL
                    3,5</option>
                <option value="BL 3,5" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'BL 3,5' ? 'selected' : '' }}>BL
                    3,5</option>
                <option value="BL 4,0" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'BL 4,0' ? 'selected' : '' }}>BL
                    4,0</option>
                <option value="5 Fr" {{ $rs_pasien_intra_tindakan->guiding_chateter == '5 Fr' ? 'selected' : '' }}>5 FR
                </option>
                <option value="AL 0,75" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'AL 0,75' ? 'selected' : '' }}>
                    AL 0,75</option>
                <option value="MP" {{ $rs_pasien_intra_tindakan->guiding_chateter == 'MP' ? 'selected' : '' }}>MP
                </option>
                <option value="6 Fr" {{ $rs_pasien_intra_tindakan->guiding_chateter == '6 Fr' ? 'selected' : '' }}>6 Fr
                </option>
                <option value="7 Fr" {{ $rs_pasien_intra_tindakan->guiding_chateter == '7 Fr' ? 'selected' : '' }}>7 Fr
                </option>
            </select>
        </div>
        <div class="form-group"><label class="control-label">Balon Ukuran</label>
            <textarea rows="5" name="balon_ukuran" placeholder="" class="form-control">{{ $rs_pasien_intra_tindakan->balon_ukuran }}</textarea>
        </div>
        <div class="form-group"><label class="control-label">Balon Jumlah</label>
            <textarea rows="5" name="balon_jumlah" placeholder="" class="form-control">{{ $rs_pasien_intra_tindakan->balon_jumlah }}</textarea>
        </div>
        <div class="form-group"><label class="control-label">Balon Jenis</label>
            <textarea rows="5" name="balon_jenis" placeholder="" class="form-control">{{ $rs_pasien_intra_tindakan->balon_jenis }}</textarea>
        </div>

        <div class="form-group"><label class="control-label">Jumlah Stent/Implant</label><select class="form-control"
                name="jumlah_stent">
                <option value="1 Buah" {{ $rs_pasien_intra_tindakan->stent_jumlah == '1 Buah' ? 'selected' : '' }}>1
                    Buah</option>
                <option value="2 Buah" {{ $rs_pasien_intra_tindakan->stent_jumlah == '2 Buah' ? 'selected' : '' }}>2
                    Buah</option>
                <option value="3 Buah" {{ $rs_pasien_intra_tindakan->stent_jumlah == '3 Buah' ? 'selected' : '' }}>3
                    Buah</option>
                <option value="4 Buah" {{ $rs_pasien_intra_tindakan->stent_jumlah == '4 Buah' ? 'selected' : '' }}>4
                    Buah</option>
            </select></div>
        <div class="form-group"><label class="control-label">Jenis Stent/Implant</label><select class="form-control"
                name="jenis_stent">
                <option value="DES" {{ $rs_pasien_intra_tindakan->stent_jenis == 'DES' ? 'selected' : '' }}>DES
                </option>
                <option value="BMS" {{ $rs_pasien_intra_tindakan->stent_jenis == 'BMS' ? 'selected' : '' }}>BMS
                </option>
                <option value="BVS" {{ $rs_pasien_intra_tindakan->stent_jenis == 'BVS' ? 'selected' : '' }}>BVS
                </option>
                <option value="Lainnya" {{ $rs_pasien_intra_tindakan->stent_jenis == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya</option>
            </select></div>
        <div class="form-group"><label class="control-label">Lokasi Stent/Implant</label><select class="form-control"
                name="lokasi_stent">
                <option value="LM" {{ $rs_pasien_intra_tindakan->stent_lokasi == 'LM' ? 'selected' : '' }}>LM
                </option>
                <option value="LAD" {{ $rs_pasien_intra_tindakan->stent_lokasi == 'LAD' ? 'selected' : '' }}>LAD
                </option>
                <option value="RCA" {{ $rs_pasien_intra_tindakan->stent_lokasi == 'RCA' ? 'selected' : '' }}>RCA
                </option>
                <option value="LCX" {{ $rs_pasien_intra_tindakan->stent_lokasi == 'LCX' ? 'selected' : '' }}>LCX
                </option>
                <option value="Lainnya" {{ $rs_pasien_intra_tindakan->stent_lokasi == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya</option>
            </select></div>
        <div class="form-group"><label class="control-label">Pacing</label><select class="form-control"
                name="pacing">
                <option value="Ya" {{ $rs_pasien_intra_tindakan->pacing == 'Ya' ? 'selected' : '' }}>Ya</option>
                <option value="Tidak" {{ $rs_pasien_intra_tindakan->pacing == 'Tidak' ? 'selected' : '' }}>Tidak
                </option>
            </select></div>
        <div class="form-group"><label class="control-label">IABP</label><select class="form-control"
                name="iabp">
                <option value="Ya 35 ml" {{ $rs_pasien_intra_tindakan->iabp == 'Ya 35 ml' ? 'selected' : '' }}>Ya 35 ml
                </option>
                <option value="Ya 40 ml" {{ $rs_pasien_intra_tindakan->iabp == 'Ya 40 ml' ? 'selected' : '' }}>Ya 40 ml
                </option>
                <option value="Tidak" {{ $rs_pasien_intra_tindakan->iabp == 'Tidak' ? 'selected' : '' }}>Tidak</option>
            </select></div>
        <div class="form-group"><label class="control-label">Kondisi Pasien Selama tindakan</label><select
                class="form-control" name="kondisi_pasien">
                <option value="Tidak ada keluhan"
                    {{ $rs_pasien_intra_tindakan->kondisi_pasien == 'Tidak ada keluhan' ? 'selected' : '' }}>Tidak ada
                    keluhan</option>
                <option value="Keluhan" {{ $rs_pasien_intra_tindakan->kondisi_pasien == 'Keluhan' ? 'selected' : '' }}>
                    Keluhan</option>
            </select></div>

        <div class="form-group"><label class="control-label">Pasien dan Keluarga Setuju untuk PCI</label><select
                class="form-control" name="pasien_pci">
                <option value="Ya" {{ $rs_pasien_intra_tindakan->pasien_pci == 'Ya' ? 'selected' : '' }}>Ya</option>
                <option value="Tidak" {{ $rs_pasien_intra_tindakan->pasien_pci == 'Tidak' ? 'selected' : '' }}>Tidak
                </option>
            </select></div>
        <div class="form-group"><label class="control-label">Obat obatan selama tindakan</label>
            <textarea rows="5" name="obat_obatan" placeholder="" class="form-control">{{ $rs_pasien_intra_tindakan->obat_obatan }}</textarea>

        </div>

        <button name="button" type="button" onclick="addTindakanPerawatIntra()"
            class="btn btn-primary">Simpan</button>
    </div>
</form>
