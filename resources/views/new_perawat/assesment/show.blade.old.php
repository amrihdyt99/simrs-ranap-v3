<div id="p_s_asper">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASSESMEN AWAL KLINIK (PERAWAT)</h3>
            <small>Diisi pada tanggal <span id="tgl-baru-asper"></span></small>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <button type="button" class="btn btn-warning" onclick="nextPage('#p_s_asdok', 'p_s_')"><i class="fas fa-arrow-right"></i> Assesmen Dokter</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <table id="t-baru-asper" class="table1" width="100%">
                <tbody>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">PEMERIKSAAN FISIK UMUM</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kesadaran</td>
                        <td class="data"></td>
                    </tr> 
                    <tr class="tr-title">
                        <td>Kondisi Umum</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Tekanan Darah</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Nadi</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Suhu</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pernapasan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Tinggi Badan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Berat Badan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kebutuhan Khusus</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Alergi</td>
                        <td class="data"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">SKRINNING NYERI</h4> </td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pasien Merasa Nyeri?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Durasi Waktu</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pencentus Nyeri</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Deskripsi Nyeri</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Lokasi dan Penjalaran</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Skala Nyeri</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kapan Terjadi Nyeri</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Frekuensi Nyeri</td>
                        <td class="data"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">PEMERIKSAAN RESIKO CEDERA / JATUH</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Gaya berjalan pasien tidak seimbang ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pasien butuh alat bantu duduk?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Hasil</td>
                        <td class="data"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">KEBUTUHAN NUTRISI DAN CAIRAN</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Keluhan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Rasa Haus Berlebihan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Mukosa Mulut</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Turgor Kulit</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Edema</td>
                        <td class="data"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">DATA PSIKOLOGIS, SOSIAL, EKONOMI, dan SPIRITUAL</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Status Emosional</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat trauma psikis</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Hambatan sosial, ekonomi</td>
                        <td class="data"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <table class="table1" width="100%">
                <tbody id="t-baru-diagnosa">
                </tbody>
                <tfoot id="t-f-baru-diagnosa"></tfoot>
            </table>
            <table class="table1 mt-3" width="100%">
                <tbody id="t-baru-intervensi">
                </tbody>
            </table>
            <table id="t-baru-skrinning-dewasa" class="table1 mt-3" width="100%">
                <tbody>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">SKRINNING GIZI <i>Malnutrisi Screening Test</i> (DEWASA)</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">1 Apakah pasien mengalami penurunan berat badan yag tidak direncanakan/tidak diinginkan dalam 6 bulan terakhir ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan /  kesulitan menerima makanan ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td class="font-weight-bold">Skor</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td class="font-weight-bold">Kategori</td>
                        <td class="data"></td>
                    </tr>
                </tbody>
            </table>
            <table id="t-baru-skrinning-anak" class="table1 mt-3" width="100%">
                <tbody>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">SKRINNING GIZI <i>STRONG-KIDS</i> (ANAK-ANAK)</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">1 Apakah pasien tampak kurus ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">2. Apakah terdapat penurunan BB selama satu bulan terakhir ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">3. Apakah terdapat salah satu dari kondisi berikut ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td width="50%">4. Apakah terdapat penyakit atau keadaan yang mengakibatkan pasien berisiko mengalami malnutrisi ?</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td class="font-weight-bold">Skor</td>
                        <td class="data"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="p_s_asdok">
    <div class="row">
        <div class="col-lg-6">
            <h3>ASSESMEN AWAL KLINIK (DOKTER)</h3>
            <small>Diisi pada tanggal <span id="tgl-baru-asdok"></span></small>
        </div>
        <div class="col-lg-6">
            <div class="float-right">
                <button type="button" class="btn btn-warning" onclick="prevPage('#p_s_asper', 'p_s_')"><i class="fas fa-arrow-left"></i> Assesmen Perawat</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="t-baru-asdok" class="table1" width="100%">
                <tbody>
                    <tr>
                        <td colspan="2"><h4 class="pt-2 font-weight-bold">ANAMNESIS</h4></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Diperoleh data dari</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Keluhan Utama</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Perjalanan Penyakit</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dahulu</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Pengobatan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Alat Implant</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Penyakit Dalam Keluarga</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Riwayat Pribadi (Personal, Sosial, Lingkungan) / Kebiasaan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Pemeriksaan Multi Organ</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Daftar Masalah</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Penatalaksanaan</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Kontrol Ulang</td>
                        <td class="data"></td>
                    </tr>
                    <tr class="tr-title">
                        <td>Masuk Rawat Inap</td>
                        <td class="data"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>