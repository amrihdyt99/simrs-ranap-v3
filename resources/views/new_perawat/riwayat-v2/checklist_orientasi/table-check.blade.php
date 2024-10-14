<table class="table1" id="riwayat-checklist">
    <tbody>
        <tr>
            <td rowspan="9" class="text-center align-middle fs-5">CHECKLIST ORIENTASI PELAYANAN DAN
                <br>
                FASILITAS
                PASIEN
                RAWAT INAP
            </td>
        </tr>
        <tr>
            <td>No Medrec</td>
            <td width="300">: <label id="no_medrec"></label></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td width="200">: <label id="nama_lengkap"></label></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: <label id="tgl_lahir"></label></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <label id="jenis_kelamin"></label></td>
        </tr>
        <tr>
            <td colspan="2"><br><br>(Mohon diisi atau tempelkan stiker jika ada)</td>
        </tr>
        <tr>
            <td>Ruang rawat</td>
            <td>: <label id="lantai"></label> (<label id="bed_code"></label>)</td>
        </tr>
        <tr>
            <td>Tgl Masuk Rawat Inap </td>
            <td>: <label id="tgl_masuk"></label></td>
        </tr>
        <tr>
            <td>Tgl Assesment</td>
            <td>: <label id="tgl_assesment"></label></td>
        </tr>
        <tr>
            <td colspan="3">Disampaikan oleh
                <input type="text" style="width: 100px; display: inline-block; border: none;" name="sampai"
                    id="sampai" value="" disabled>kepada
                <input type="checkbox" name="kepada[]" id="disampaikan_oleh_1" value="pasien" disabled>Pasien
                <input type="checkbox" name="kepada[]" id="disampaikan_oleh_2" value="saudara" disabled>Saudara ,
                lainnya
                <input type="text" style="width: 100px; display: inline-block; border: none;" 
                    id="kepada_lain" value="" disabled>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <input type="checkbox" name="tidak" id="tidak_bisa" class="" value="Tidak dapat" disabled>
                        Tidak dapat dilakukan karena
                        <input type="text" style="width: 200px; display: inline-block; border: none;"
                            name="alasan_tidak" id="" value="" disabled>
                    </div>
                </div>

            </td>
        </tr>
        <tr>
            <td colspan="8">
                <input type="checkbox" name="checkAll" id="checkAll" disabled />
                <label for="checkAll"> Pilih Semua</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2" class="align-middle">1. Petugas Ruangan</td>
            <td colspan="2">
                <input type="checkbox" name="satu[]" id="Petugas_1" class="checkbox-checklist"
                    value="Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya" disabled>
                <label for="Petugas_1">Memperkenalkan kepada Perawat penanggung jawab dan petugas
                    lainnya</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="checkbox" name="satu[]" id="Petugas_2" class="checkbox-checklist"
                    value="Memperkenalkan kepada pasien sekamar atau sesama" disabled>
                <label for="Petugas_2">Memperkenalkan kepada pasien sekamar atau sesama</label>
            </td>
        </tr>
        <tr>
            <td rowspan="9" class="align-middle">2. Fasilitas Fisik</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_1" class="checkbox-checklist"
                    value="Lokasi ruangan dan tempat tidur" disabled>
                <label for="Fasilitas_1">Lokasi ruangan dan tempat tidur</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_2" class="checkbox-checklist"
                    value="Kamar mandi dan toilet" disabled>
                <label for="Fasilitas_2">Kamar mandi dan toilet</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_3" class="checkbox-checklist"
                    value="Nurse station" disabled>
                <label for="Fasilitas_3">Nurse station</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_4" class="checkbox-checklist"
                    value="Ruang publik" disabled>
                <label for="Fasilitas_4">Ruang publik</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="checkbox" name="dua[]" id="Fasilitas_5" class="checkbox-checklist"
                    value="Sistem Nurse Call" disabled>
                <label for="Fasilitas_5">Sistem Nurse Call</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_6" class="checkbox-checklist"
                    value="Penggunaan TV" disabled>
                <label for="Fasilitas_6">Penggunaan TV</label>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_7" class="checkbox-checklist"
                    value="Penggunaan Telepon" disabled> Penggunaan
                Telepon</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_8" class="checkbox-checklist"
                    value="Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien dll" disabled>
                Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien
                dll</td>
        </tr>
        <tr>
            <td rowspan="11" class="align-middle">3. Tata Laksana Pelayanan Rumah Sakit</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_1" class="checkbox-checklist"
                    value="Aktifitas harian pelayanan di ruangan" disabled>
                Aktifitas harian pelayanan di
                ruangan
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_2" class="checkbox-checklist"
                    value="Barang kebutuhan pribadi dan perlengkapan mandi" disabled>
                Barang kebutuhan
                pribadi
                dan perlengkapan mandi</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_3" class="checkbox-checklist"
                    value="Pengunjung dan jam berkunjung" disabled>
                Pengunjung dan jam berkunjung</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_4" class="checkbox-checklist"
                    value="Pemakaian pakaian pribadi pasien" disabled>
                Pemakaian pakaian pribadi pasien</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_5" class="checkbox-checklist"
                    value="Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)" disabled>
                Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana
                tindakan/operasi)</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_6" class="checkbox-checklist"
                    value="Pelayanan Makanan" disabled>
                Pelayanan Makanan</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_7" class="checkbox-checklist"
                    value="Nomer telepon ruangan/kamar" disabled> Nomer
                telepon ruangan/kamar</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_8" class="checkbox-checklist"
                    value="Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat" disabled>
                Tidak mengalihkan perhatian perawat saat
                perawat sedang memberikan obat
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_9" class="checkbox-checklist"
                    value="Prosedur visite dokter" disabled>
                Prosedur visite dokter
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_10" class="checkbox-checklist"
                    value="Hak Pasien dijelaskan / brosur diberikan" disabled>
                Hak Pasien dijelaskan / brosur
                diberikan
            </td>
        </tr>
        <tr>
            <td rowspan="7">4. Keselamatan</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_1" class="checkbox-checklist"
                    value="Bahaya kebakaran – dilarang merokok di area rumah sakit" disabled>
                Bahaya
                kebakaran – dilarang
                merokok di area rumah sakit</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_2" class="checkbox-checklist"
                    value="Lokasi pintu darurat kebakaran" disabled>
                Lokasi pintu darurat kebakaran
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_3" class="checkbox-checklist"
                    value="Penggunaan gelang identitas pasien" disabled>
                Penggunaan gelang identitas
                pasien</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_4" class="checkbox-checklist"
                    value="Pencegahan infeksi : cuci tangan" disabled>
                Pencegahan infeksi : cuci tangan
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_5" class="checkbox-checklist"
                    value="Pencegahan jatuh" disabled> Pencegahan jatuh
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_6" class="checkbox-checklist"
                    value="Peringatan tentang orang yang berbahaya (penipu)" disabled>
                Peringatan tentang
                orang yang
                berbahaya (penipu)</td>
        </tr>
        <tr>
            <td rowspan="5" class="align-middle">5. Barang milik pasien</td>
        </tr>
        <tr>
            <td class="align-middle">a. Gigi palsu</td>
            <td><input type="checkbox" name="gigi" id="" class="" value="Tidak" disabled>
                Tidak
                <input type="checkbox" name="gigi" id="" class="" value="Ya" disabled> Ya
                :
                <input type="checkbox" name="lokasi_gigi" id="" class="" value="Atas" disabled>
                Atas
                <input type="checkbox" name="lokasi_gigi" id="" class="" value="Bawah" disabled>
                Bawah <br>
                Dibawa oleh
                <input type="text" name="bawa_gigi" id="bawa_gigi" value="" style="width: 100px; display: inline-block; border: none;" disabled>
            </td>
        </tr>
        <tr>
            <td class="align-middle">b. Alat bantu dengar</td>
            <td>
                <input type="checkbox" name="alat" id="" class="" value="Tidak" disabled> Tidak
                <input type="checkbox" name="alat" id="" class="" value="Ya" disabled> Ya
                :
                <input type="checkbox" name="lokasi_alat" id="" class="" value="Kanan" disabled>
                Kanan
                <input type="checkbox" name="lokasi_alat" id="" class="" value="Kiri" disabled> Kiri <br> di
                bawa
                oleh
                <input type="text" name="bawa_alat" id="bawa_alat" value="" style="width: 100px; display: inline-block; border: none;" disabled>
            </td>
        </tr>
        <tr>
            <td class="align-middle">c. Uang tunai </td>
            <td>
                <input type="checkbox" name="uang" id="" class="" value="Tidak" disabled> Tidak
                <input type="checkbox" name="uang" id="" class="" value="Ya" disabled> Ya,
                disimpan di :
                <input type="checkbox" name="uang_bawa" id="" class="" value="Kasir" disabled>
                Kasir <br>
                <input type="checkbox" name="uang_bawa" id="" class=""
                    value="Dibawa pasien / keluarga" disabled>Dibawa pasien
                /
                keluarga
            </td>
        </tr>
        <tr>
            <td class="align-middle">d. Lainnya, sebutkan</td>
            <td> <input type="text" name="barang_lain" id="barang_lain" style="width: 100px; display: inline-block; border: none;"
                    id="" value="" disabled></td>
        </tr>
        <tr>
            <td colspan="4">
                Saya
                <input type="text" name="nama_pihak_pasien" id="nama_pihak_pasien" value=""
                    style="width: 100px; display: inline-block; border: none;" disabled>
                (nama) sebagai
                <input type="text" name="sebagai_pihak_pasien" id="sebagai_pihak_pasien" value="" style="width: 100px; display: inline-block; border: none;" disabled>
                apabila saya dan pasien memilih untuk menyimpan benda / uang dalam penyimpanan saya, maka
                saya atau pasien tidak
                akan melimpahkan tanggungjawab kepada RSUD Siti Fatimah Prov. Sumsel apabila terjadi
                kerusakan atau kehilangan benda / uang tersebut.
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered table-sm mt-3 border-dark" style="width: 100%; text-align: center;" id="ttd_riwayat_checklist">
    <tr>
        <td style="vertical-align: middle;">
            <p>Tanda Tangan Perawat</p>
            <div id="signature-pad-perawat" style="display: inline-block; margin: 0 auto;">
                <div style="border: solid 1px teal; width: 260px; height: 160px; padding: 3px; position: relative;">
                    <img id="signature_perawat_img" src="" alt="Tanda Tangan Perawat" style="width: 260px; height: 160px;">
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="signature_perawat" name="ttd_perawat" value="">
                </div>
                <input type="text" name="nama_perawat" value=""
                    placeholder="Nama Perawat"  class="form-control" id="nama_perawat" style="width: 280px; margin: 0 auto; border: none;" disabled>
            </div>
        </td>
        <td style="vertical-align: middle;">
            <p>Tanda Tangan Pasien/Keluarga</p>
            <div id="signature-pad-pasien" style="display: inline-block; margin: 0 auto;">
                <div style="border: solid 1px teal; width: 260px; height: 160px; padding: 3px; position: relative;">
                    <img id="signature_pasien_img" src="" alt="Tanda Tangan Pasien/Keluarga" style="width: 260px; height: 160px;">
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="signature_pasien" name="ttd_pasien" value="" >
                </div>
            </div>
            <input type="text" name="nama_keluarga_pasien" id="nama_keluarga_pasien" value="" 
                placeholder="Nama Keluarga" class="form-control"  style="margin: 0 auto; width: 280px; border: none;" disabled>
        </td>
    </tr>
</table>
