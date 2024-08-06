<h3><b>Checklist Kepulangan</b></h3>
<p>(Diisi Pada Saat Persiapan Kepulangan Pasien)</p>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form id="checklist-kepulangan">
                <table class="table1 table-sm mt-3 border-dark">
                    <tbody>
                        <tr>
                            <td colspan="8">
                                <input type="checkbox" name="checkAll" id="checkAll" onchange="checkAllCheckListv2(this)" />
                                <label for="checkAll"> Pilih Semua</label>
                            </td>
                        </tr>
                        @php
                            $data_satu = json_decode($ceklis_pulang->satu) ?? [];
                            $data_dua = json_decode($ceklis_pulang->dua) ?? [];
                            $data_tiga = json_decode($ceklis_pulang->tiga) ?? [];
                            $data_empat = json_decode($ceklis_pulang->empat) ?? [];
                            $data_lima = json_decode($ceklis_pulang->lima) ?? [];
                        @endphp
                        <tr>
                            <td rowspan="7" class="align-middle">1. Umum</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_1" class="checkbox-kepulangan"
                                    value="Pasien dapat pulang dengan kendaraan sendiri / kendaraan umum" {{ in_array('Pasien dapat pulang dengan kendaraan sendiri / kendaraan umum', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_1">Pasien dapat pulang dengan kendaraan sendiri / kendaraan umum</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_2" class="checkbox-kepulangan"
                                    value="Pasien membutuhkan ambulance" {{ in_array('Pasien membutuhkan ambulance', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_2">Pasien membutuhkan ambulance</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_3" class="checkbox-kepulangan"
                                    value="Pasien / saudara dipersilakan ke KASIR untuk pembayaran rawat inap" {{ in_array('Pasien / saudara dipersilakan ke KASIR untuk pembayaran rawat inap', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_3">Pasien / saudara dipersilakan ke KASIR untuk pembayaran rawat inap</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_4" class="checkbox-kepulangan"
                                    value="Polisi diberitahu ( Bila kasus kepolisian)" {{ in_array('Polisi diberitahu ( Bila kasus kepolisian)', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_4">Polisi diberitahu ( Bila kasus kepolisian)</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_5" class="checkbox-kepulangan"
                                    value="Pasien / petugas ke bagian administrasi untuk pembayaran rawat inap" 
                                    {{ in_array('Pasien / petugas ke bagian administrasi untuk pembayaran rawat inap', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_5">Pasien / petugas ke bagian administrasi untuk pembayaran rawat inap</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="umum_6" class="checkbox-kepulangan"
                                    value="Gelang identitas pasien dilepas" {{ in_array('Gelang identitas pasien dilepas', $data_satu) ? 'checked' : '' }}>
                                <label for="umum_6">Gelang identitas pasien dilepas</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4" class="align-middle">2. Pemberian edukasi untuk melanjutkan pengobatan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="dua[]" id="Pemberian_1" class="checkbox-kepulangan"
                                    value="Pasien/keluarga pasien diberitahu tentang pembelian/penggunaan alat-alat yang digunakan untuk perawatan dirumah, misalnya : pispot, produk perawatan luka dan produk pemberian makanan enteral." 
                                    {{ in_array('Pasien/keluarga pasien diberitahu tentang pembelian/penggunaan alat-alat yang digunakan untuk perawatan dirumah, misalnya : pispot, produk perawatan luka dan produk pemberian makanan enteral.', $data_dua) ? 'checked' : '' }}>
                                <label for="Pemberian_1">Pasien/keluarga pasien diberitahu tentang pembelian/penggunaan alat-alat yang digunakan untuk perawatan dirumah, misalnya : pispot, produk perawatan luka dan produk pemberian makanan enteral.</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="dua[]" id="Pemberian_2" class="checkbox-kepulangan"
                                    value="Dibantu untuk mengajari cara perawatan pasien di rumah" 
                                    {{ in_array('Dibantu untuk mengajari cara perawatan pasien di rumah', $data_dua) ? 'checked' : '' }}>
                                <label for="Pemberian_2">Dibantu untuk mengajari cara perawatan pasien di rumah</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="dua[]" id="Pemberian_3" class="checkbox-kepulangan"
                                    value="Penyimpanan obat-obatan." {{ in_array('Penyimpanan obat-obatan.', $data_dua) ? 'checked' : '' }}>
                                <label for="Pemberian_3">Penyimpanan obat-obatan.</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4" class="align-middle">3. Pelayanan Luka</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="tiga[]" id="Pelayanan_1" class="checkbox-kepulangan"
                                    value="Drain dilepas sebelum pulang." {{ in_array('Drain dilepas sebelum pulang.', $data_tiga) ? 'checked' : '' }}>
                                <label for="Pelayanan_1">Drain dilepas sebelum pulang.</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="tiga[]" id="Pelayanan_2" class="checkbox-kepulangan"
                                    value="Jahitan dilepas" {{ in_array('Jahitan dilepas', $data_tiga) ? 'checked' : '' }}>
                                <label for="Pelayanan_2">Jahitan dilepas</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="tiga[]" id="Pelayanan_3" class="checkbox-kepulangan"
                                    value="Ganti balutan" {{ in_array('Ganti balutan', $data_tiga) ? 'checked' : '' }}>
                                <label for="Pelayanan_3">Ganti balutan</label>
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="3">4. Barang pribadi</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="empat[]" id="barang_1" class="checkbox-kepulangan"
                                    value="Barang milik pribadi/ form pengembalian barang milik pribadi dikembalikan kepada pasien/keluarga" 
                                    {{ in_array('Barang milik pribadi/ form pengembalian barang milik pribadi dikembalikan kepada pasien/keluarga', $data_empat) ? 'checked' : '' }}>
                                <label for="barang_1">Barang milik pribadi/ form pengembalian barang milik pribadi dikembalikan kepada pasien/keluarga</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="empat[]" id="barang_2" class="checkbox-kepulangan"
                                    value="Dokumen/hasil foto rontgen dari rumah sakit lain dikembalikan kepada pasien/keluarga." 
                                    {{ in_array('Dokumen/hasil foto rontgen dari rumah sakit lain dikembalikan kepada pasien/keluarga.', $data_empat) ? 'checked' : '' }}>
                                <label for="barang_2">Dokumen/hasil foto rontgen dari rumah sakit lain dikembalikan kepada pasien/keluarga.</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="align-middle">5. Dokumen</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="lima[]" id="dokumen_1" class="checkbox-kepulangan"
                                    value="Resume pasien pulang diberikan dan / atau rujukan" 
                                    {{ in_array('Resume pasien pulang diberikan dan / atau rujukan', $data_lima) ? 'checked' : '' }}>
                                <label for="dokumen_1">Resume pasien pulang diberikan dan / atau rujukan</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="lima[]" id="dokumen_2" class="checkbox-kepulangan"
                                    value="Surat-surat medis penting diberikan ke pasien? (Surat keterangan lahir, surat sakit, suratkematian)*" 
                                    {{ in_array('Surat-surat medis penting diberikan ke pasien? (Surat keterangan lahir, surat sakit, suratkematian)*', $data_lima) ? 'checked' : '' }}>
                                <label for="dokumen_2">Surat-surat medis penting diberikan ke pasien? (Surat keterangan lahir, surat sakit, suratkematian)*</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-success float-right mt-3" type="button"
                    onclick="simpanChecklistKepulangan()">Simpan</button>
            </form>
        </div>
    </div>
</div>
