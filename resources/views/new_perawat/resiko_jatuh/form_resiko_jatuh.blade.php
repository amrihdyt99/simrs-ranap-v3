@empty($skrining_resiko_jatuh)
    @php
        $skrining_resiko_jatuh = optional((object) []);
    @endphp
@endempty
<div class="container">
    <div class="card card-primary">
        <h3 class="card-title mt-3 ml-3">LEMBAR MONITORING PENCEGAHAN PASIEN JATUH</h3>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info mr-5" data-toggle="modal" data-target="#resikoJatuhModal">
                History
            </button>
            <button type="button" class="btn btn-danger mr-3" id="reassesment-button" onclick="resetFormResikoJatuh()">
                <i class="fa-solid fa-rotate-right"></i> Reassesment
            </button>
        </div>

        <form id="entry-resiko-jatuh">
            @csrf
            <div id="body-form" class="card-body">
                <div class="card-header">
                    <h3>Penilaian Risiko Jatuh Pasien Dewasa Hall Morse Scale</h3>
                </div>

                <table class="table1">
                    <tbody>
                        <tr>
                            <td>Riwayat Jatuh</td>
                            <td><input class="" type="radio" value="25" id="riwayat_jatuh_ya"
                                    name="resiko_jatuh_bulan_terakhir"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_bulan_terakhir == '25' ? 'checked' : '' }}>
                                <label for="riwayat_jatuh_ya">Ya</label>
                            </td>
                            <td><input class="" type="radio" value="0" id="riwayat_jatuh_tidak"
                                    name="resiko_jatuh_bulan_terakhir"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_bulan_terakhir == '0' ? 'checked' : '' }}>
                                <label for="riwayat_jatuh_tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Diagnosa Sekunder</td>
                            <td><input class="" type="radio" value="15" id="diagnosa_sekunder_ya"
                                    name="resiko_jatuh_medis_sekunder"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_medis_sekunder == '15' ? 'checked' : '' }}>
                                <label for="diagnosa_sekunder_ya">Ya</label>
                            </td>
                            <td><input class="" type="radio" value="0" id="diagnosa_sekunder_tidak"
                                    name="resiko_jatuh_medis_sekunder"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_medis_sekunder == '0' ? 'checked' : '' }}>
                                <label for="diagnosa_sekunder_tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Bantuan Ambulasi</td>
                            <td><input class="" type="radio" value="0" id="bantuan_ambulasi_tidak"
                                    name="resiko_jatuh_alat_bantu_jalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_alat_bantu_jalan == '0' ? 'checked' : '' }}>
                                <label for="bantuan_ambulasi_tidak">Tidak ada/ bed rest/ bantuan perawat</label>
                            </td>
                            <td><input class="" type="radio" value="15" id="bantuan_ambulasi_kruk"
                                    name="resiko_jatuh_alat_bantu_jalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_alat_bantu_jalan == '15' ? 'checked' : '' }}>
                                <label for="bantuan_ambulasi_kruk">Kruk/ tongkat/ alat bantu berjalan</label>
                            </td>
                            <td><input class="" type="radio" value="30" id="bantuan_ambulasi_meja"
                                    name="resiko_jatuh_alat_bantu_jalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_alat_bantu_jalan == '30' ? 'checked' : '' }}>
                                <label for="bantuan_ambulasi_meja">Meja/ kursi</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Terpasang Infus</td>
                            <td><input class="" type="radio" value="25" id="terpasang_infus_ya"
                                    name="resiko_jatuh_infus"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_infus == '25' ? 'checked' : '' }}>
                                <label for="terpasang_infus_ya">Ya</label>
                            </td>
                            <td><input class="" type="radio" value="0" id="terpasang_infus_tidak"
                                    name="resiko_jatuh_infus"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_infus == '0' ? 'checked' : '' }}>
                                <label for="terpasang_infus_tidak">Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Cara/ gaya berjalan</td>
                            <td><input class="" type="radio" value="0" id="cara_berjalan_normal"
                                    name="resiko_jatuh_berjalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_berjalan == '0' ? 'checked' : '' }}>
                                <label for="cara_berjalan_normal">Normal/ bed rest/ kursi roda</label>
                            </td>
                            <td><input class="" type="radio" value="15" id="cara_berjalan_lemah"
                                    name="resiko_jatuh_berjalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_berjalan == '15' ? 'checked' : '' }}>
                                <label for="cara_berjalan_lemah">Lemah</label>
                            </td>
                            <td><input class="" type="radio" value="30" id="cara_berjalan_terganggu"
                                    name="resiko_jatuh_berjalan"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_berjalan == '30' ? 'checked' : '' }}>
                                <label for="cara_berjalan_terganggu">Terganggu</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Mental</td>
                            <td><input class="" type="radio" value="0" id="status_mental_berorientasi"
                                    name="resiko_jatuh_mental"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_mental == '0' ? 'checked' : '' }}>
                                <label for="status_mental_berorientasi">Berorientasi pada kemampuannya</label>
                            </td>
                            <td><input class="" type="radio" value="15" id="status_mental_lupa"
                                    name="resiko_jatuh_mental"
                                    {{ $skrining_resiko_jatuh->resiko_jatuh_mental == '15' ? 'checked' : '' }}>
                                <label for="status_mental_lupa">Lupa akan keterbatasannya</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Total Skor Risiko Jatuh Pasien Dewasa Hall Morse Scale : <label>{{ $skrining_resiko_jatuh->total_resiko_jatuh_dewasa}}</label></b></td>
                        </tr>


                    </tbody>
                </table>

                <div class="card-header mt-5">
                    <h3>Penilaian Risiko Jatuh Pasien Geriatri > 60 Tahun</h3>
                </div>
                <table class="table1">
                    <tbody>
                        <tr>
                            <td>Gangguan gaya berjalan (diseret, menghentak, berayun)</td>
                            <td>
                                <input class="form-control" type="text"
                                    id="resiko_jatuh_geriatri_gangguan_gaya_berjalan"
                                    name="resiko_jatuh_geriatri_gangguan_gaya_berjalan"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_gangguan_gaya_berjalan }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Pusing / pingsan pada posisi tegak</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_pusing"
                                    name="resiko_jatuh_geriatri_pusing"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_pusing }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan setiap saat</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_kebingungan"
                                    name="resiko_jatuh_geriatri_kebingungan"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kebingungan }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Nokturia / Inkontinen</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_nokturia"
                                    name="resiko_jatuh_geriatri_nokturia"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_nokturia }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan Intermiten</td>
                            <td>
                                <input class="form-control" type="text"
                                    id="resiko_jatuh_geriatri_kebingungan_intermiten"
                                    name="resiko_jatuh_geriatri_kebingungan_intermiten"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kebingungan_intermiten }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Kelemahan Umum</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_kelemahan_umum"
                                    name="resiko_jatuh_geriatri_kelemahan_umum"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kelemahan_umum }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="700px">Obat-obat berisiko tinggi (diuretik, narkotik, sedatif, anti psikotik,
                                laksatif,
                                vasodilator, antiaritmia, anti hypertensi, obat hypoglikemik, entidepresan, neuroleptik,
                                NSAID)
                            </td>
                            <td>
                                <input class="form-control" type="text"
                                    id="resiko_jatuh_geriatri_obat_beresiko_tinggi"
                                    name="resiko_jatuh_geriatri_obat_beresiko_tinggi"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_obat_beresiko_tinggi }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Riwayat jatuh dalam waktu 12 bulan sebelumnya</td>
                            <td>
                                <input class="form-control" type="text"
                                    id="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan"
                                    name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_riwayat_jatuh_12_bulan }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Osteoporosis</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_osteoporosis"
                                    name="resiko_jatuh_geriatri_osteoporosis"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_osteoporosis }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Gangguan pendengaran dan atau penglihatan</td>
                            <td>
                                <input class="form-control" type="text"
                                    id="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan"
                                    name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_pendengaran_dan_pengeliatan }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Usia 70 tahun keatas</td>
                            <td>
                                <input class="form-control" type="text" id="resiko_jatuh_geriatri_70_tahun_keatas"
                                    name="resiko_jatuh_geriatri_70_tahun_keatas"
                                    value="{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_70_tahun_keatas }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Total Skor Risiko Jatuh Pasien Geriatri > 60 Tahun : <label>{{ $skrining_resiko_jatuh->total_resiko_jatuh_geriatri }}</label></b> </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="addresikojatuh()">Simpan</button>
                </div>
            </div>
        </form>


        {{-- <div id="body-table" class="card-body">
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                    <td align="center">Penilaian Risiko Jatuh Pasien Dewasa Hall Morse Scale</td>
                    <td align="center">Penilaian Risiko Jatuh Pasien Geriatri &gt; 60 Tahun </td>
                </tr>
                <tr>
                    <td width="50%" valign="top">
                        <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0">
                            <tr>
                                <td width="7%" align="center"><strong>No</strong></td>
                                <td width="70%" align="center"><strong>RISIKO</strong></td>
                                <td width="23%" align="center"><strong>Skor</strong></td>
                            </tr>
                            <tr>
                                <td align="center"><strong>1</strong></td>
                                <td>Riwayat jatuh, yang baru atau dalam 3 bulan terakhir<br />
                                    Tidak = 0<br />
                                    Ya = 25</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_bulan_terakhir">{{ $skrining_resiko_jatuh->resiko_jatuh_bulan_terakhir ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>2</strong></td>
                                <td>Diagnosis Medis Sekunder &gt; 1<br />
                                    Tidak = 0<br />
                                    Ya = 15</td>
                                <td>&nbsp;<label
                                        id="resiko_jatuh_medis_sekunder">{{ $skrining_resiko_jatuh->resiko_jatuh_medis_sekunder ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>3</strong></td>
                                <td>Menggunakan Alat bantu jalan :<br />
                                    - Bed rest / dibantu perawat = 0<br />
                                    - Penopang / tongkat / walker = 15<br />
                                    - Furnitur = 30</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_alat_bantu_jalan">{{ $skrining_resiko_jatuh->resiko_jatuh_alat_bantu_jalan ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>4</strong></td>
                                <td>Menggunakan Infus<br />
                                    Tidak = 0<br />
                                    Ya = 25</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_infus">{{ $skrining_resiko_jatuh->resiko_jatuh_infus ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>5</strong></td>
                                <td>Cara berjalan / berpindah<br />
                                    - Normal / bed rest / imonilisasi = 0<br />
                                    - Lemah = 15<br />
                                    - Terganggu = 30</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_berjalan">{{ $skrining_resiko_jatuh->resiko_jatuh_berjalan ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>6</strong></td>
                                <td>Status Mental<br />
                                    - Orientasi sesuai kemampuan diri = 0<br />
                                    - Lupa keterbatasan diri = 15</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_mental">{{ $skrining_resiko_jatuh->resiko_jatuh_mental ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><strong>TOTAL SKOR </strong></td>
                                <td>&nbsp; {{ $skrining_resiko_jatuh->total_resiko_jatuh_dewasa }}</td>
                            </tr>
                        </table>
                    </td>
                    <td width="50%" valign="top">
                        <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0">
                            <tr>
                                <td width="7%" align="center"><strong>No</strong></td>
                                <td width="59%" align="center"><strong>RISIKO</strong></td>
                                <td width="17%" align="center"><strong>Skala</strong></td>
                                <td width="17%" align="center"><strong>Skor</strong></td>
                            </tr>
                            <tr>
                                <td align="center"><strong>1</strong></td>
                                <td>Gangguan gaya berjalan (diseret, menghentak, berayun)</td>
                                <td align="center">4</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_gangguan_gaya_berjalan">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_gangguan_gaya_berjalan ?? 0 }}</label>
                                </td>
                            </tr>
                           
                            <tr>
                                <td align="center"><strong>2</strong></td>
                                <td>Pusing / pingsan pada posisi tegak</td>
                                <td align="center">3</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_pusing">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_pusing ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>3</strong></td>
                                <td>Kebingungan setiap saat</td>
                                <td align="center">3</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_kebingungan">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kebingungan ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>4</strong></td>
                                <td>Nokturia / Inkontinen</td>
                                <td align="center">3</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_nokturia">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_nokturia ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>5</strong></td>
                                <td>Kebingungan Intermiten</td>
                                <td align="center">2</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_kebingungan_intermiten">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kebingungan_intermiten ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>6</strong></td>
                                <td>Kelemahan Umum</td>
                                <td align="center">2</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_kelemahan_umum">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_kelemahan_umum ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>7</strong></td>
                                <td>Obat-obat berisiko tinggi (diuretik, narkotik, sedatif, anti
                                    psikotik, laksatif, vasodilator, antiaritmia, anti hypertensi, obat
                                    hypoglikemik, entidepresan, neuroleptik, NSAID)</td>
                                <td align="center">2</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_obat_berisiko_tinggi">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_obat_beresiko_tinggi ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>8</strong></td>
                                <td>Riwayat jatuh dalam waktu 12 bulan sebelumnya</td>
                                <td align="center">2</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_riwayat_jatuh_12_bulan ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>9</strong></td>
                                <td>Osteoporosis</td>
                                <td align="center">1</td>
                                <td>&nbsp;
                                    <label id="resiko_jatuh_geriatri_osteoporosis"></label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>10</strong></td>
                                <td>Gangguan pendengaran dan atau penglihatan </td>
                                <td align="center">1</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_pendengaran_dan_pengeliatan ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>11</strong></td>
                                <td>Usia 70 tahun keatas</td>
                                <td align="center">1</td>
                                <td>&nbsp;
                                    <label
                                        id="resiko_jatuh_geriatri_70_tahun_keatas">{{ $skrining_resiko_jatuh->resiko_jatuh_geriatri_70_tahun_keatas ?? 0 }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><strong>TOTAL SKOR</strong></td>
                                <td>&nbsp;{{ $skrining_resiko_jatuh->total_resiko_jatuh_geriatri }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div> --}}
    </div>
</div>
@include('new_perawat.resiko_jatuh.history_resiko_jatuh')
@include('new_perawat.resiko_jatuh.detail_history_resiko_jatuh')