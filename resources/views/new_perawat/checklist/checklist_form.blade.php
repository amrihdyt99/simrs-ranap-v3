@empty($datapasien)
    @php
        $datapasien = optional((object) []);
    @endphp
@endempty
<div class="container">
    <div class="card">
        <form id="entry-checklist">
            @csrf
            <input type="hidden" name="id" value="{{ $datapasien->MedicalNo }}">
            <div class="card-body">
                <table class="table table-bordered table-sm mt-3 border-dark">
                    <tbody>
                        <tr>
                            <td rowspan="9" class="text-center align-middle fs-5">CHECKLISTORIENTASI PELAYANAN DAN
                                <br>
                                FASILITAS
                                PASIEN
                                RAWAT INAP
                            </td>
                        </tr>
                        <tr>
                            <td>No Medrec</td>
                            <td width="300">: {{ $datapasien->MedicalNo }}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td width="200">: {{ $datapasien->PatientName }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: {{ $datapasien->DateOfBirth }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:
                                {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datapasien->GCSex) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br><br>(Mohon diisi atau tempelkan stiker jika ada)</td>
                        </tr>
                        <tr>
                            <td>Ruang rawat</td>
                            <td>: {{ $datapasien->room_class }}</td>
                        </tr>
                        <tr>
                            <td>Tgl Masuk Rawat Inap</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Tgl Assesment</td>
                            <td>:</td>
                        </tr>
                        @php
                            $data_kepada = json_decode($data->kepada) ?? [];
                            $data_satu = json_decode($data->satu) ?? [];
                            $data_dua = json_decode($data->dua) ?? [];
                            $data_tiga = json_decode($data->tiga) ?? [];
                            $data_empat = json_decode($data->empat) ?? [];
                        @endphp
                        <tr>
                            <td colspan="3">Disampaikan oleh
                                <input type="text" name="sampai" id="sampai" value="{{ $data->sampai }}">kepada
                                <input type="checkbox" name="kepada[]" id="" value="pasien"
                                    {{ in_array('pasien', $data_kepada) ? 'checked' : '' }}>Pasien
                                <input type="checkbox" name="kepada[]" id="" value="saudara"
                                    {{ in_array('saudara', $data_kepada) ? 'checked' : '' }}>Saudara , lainnya
                                <input type="text" name="kepada[]" id=""
                                    value="@php
                                    $kepada_text = [];
                                    foreach($data_kepada as $data_kepada_x){
                                        if (!(
                                            $data_kepada_x=='pasien' || $data_kepada_x=='saudara'
                                        )) {
                                            $kepada_text[]=$data_kepada_x;
                                        }
                                    }
                                    echo e(implode(",", $kepada_text)); @endphp">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <input type="checkbox" name="tidak" id="" class="" value="Tidak dapat"
                                            {{ $data->tidak == 'Tidak dapat' ? 'checked' : '' }}>
                                            Tidak dapat dilakukan karena
                                        <input type="text" name="alasan_tidak" id=""
                                            value="{{ $data->alasan_tidak }}">
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <input type="checkbox" name="checkAll" id="checkAll" onchange="checkAllCheckListv1(this)" />
                                <label for="checkAll"> Pilih Semua</label>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="align-middle">1. Petugas Ruangan</td>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="Petugas_1" class="checkbox-checklist"
                                    value="Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya"
                                    {{ in_array('Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya', $data_satu) ? 'checked' : '' }}>
                                <label for="Petugas_1">Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="satu[]" id="Petugas_2" class="checkbox-checklist"
                                    value="Memperkenalkan kepada pasien sekamar atau sesama"
                                    {{ in_array('Memperkenalkan kepada pasien sekamar atau sesama', $data_satu) ? 'checked' : '' }}>
                                <label for="Petugas_2">Memperkenalkan kepada pasien sekamar atau sesama</label>
                                </td>
                        </tr>
                        <tr>
                            <td rowspan="9" class="align-middle">2. Fasilitas Fisik</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_1" class="checkbox-checklist"
                                    value="Lokasi ruangan dan tempat tidur" {{ in_array('Lokasi ruangan dan tempat tidur', $data_dua) ? 'checked' : '' }}>
                                <label for="Fasilitas_1">Lokasi ruangan dan tempat tidur</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_2" class="checkbox-checklist"
                                    value="Kamar mandi dan toilet" {{ in_array('Kamar mandi dan toilet', $data_dua) ? 'checked' : '' }}>
                                    <label for="Fasilitas_2">Kamar mandi dan toilet</label>
                                </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_3" class="checkbox-checklist"
                                    value="Nurse station" {{ in_array('Nurse station', $data_dua) ? 'checked' : '' }}>
                                <label for="Fasilitas_3">Nurse station</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_4" class="checkbox-checklist"
                                    value="Ruang publik" {{ in_array('Ruang publik', $data_dua) ? 'checked' : '' }}>
                                <label for="Fasilitas_4">Ruang publik</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="dua[]" id="Fasilitas_5" class="checkbox-checklist"
                                    value="Sistem Nurse Call" {{ in_array('Sistem Nurse Call', $data_dua) ? 'checked' : '' }}>
                                    <label for="Fasilitas_5">Sistem Nurse Call</label>
                                </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_6" class="checkbox-checklist"
                                    value="Penggunaan TV" {{ in_array('Penggunaan TV', $data_dua) ? 'checked' : '' }}>
                                <label for="Fasilitas_6">Penggunaan TV</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_7" class="checkbox-checklist"
                                    value="Penggunaan Telepon" {{ in_array('Penggunaan Telepon', $data_dua) ? 'checked' : '' }}> Penggunaan Telepon</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_8" class="checkbox-checklist"
                                    value="Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien dll"
                                    {{ in_array('Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien dll', $data_dua) ? 'checked' : '' }}>
                                Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien
                                dll</td>
                        </tr>
                        <tr>
                            <td rowspan="11" class="align-middle">3. Tata Laksana Pelayanan Rumah Sakit</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_1" class="checkbox-checklist"
                                    value="Aktifitas harian pelayanan di ruangan" {{ in_array('Aktifitas harian pelayanan di ruangan', $data_tiga) ? 'checked' : '' }}>
                                    Aktifitas harian pelayanan di
                                ruangan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_2" class="checkbox-checklist"
                                    value="Barang kebutuhan pribadi dan perlengkapan mandi" {{ in_array('Barang kebutuhan pribadi dan perlengkapan mandi', $data_tiga) ? 'checked' : '' }}> Barang kebutuhan
                                pribadi
                                dan perlengkapan mandi</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_3" class="checkbox-checklist"
                                    value="Pengunjung dan jam berkunjung" {{ in_array('Pengunjung dan jam berkunjung', $data_tiga) ? 'checked' : '' }}> Pengunjung dan jam berkunjung</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_4" class="checkbox-checklist"
                                    value="Pemakaian pakaian pribadi pasien" {{ in_array('Pemakaian pakaian pribadi pasien', $data_tiga) ? 'checked' : '' }}> Pemakaian pakaian pribadi pasien</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_5" class="checkbox-checklist"
                                    value="Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)"
                                    {{ in_array('Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)', $data_tiga) ? 'checked' : '' }}>
                                Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_6" class="checkbox-checklist"
                                    value="Pelayanan Makanan"{{ in_array('Pelayanan Makanan', $data_tiga) ? 'checked' : '' }}>
                                    Pelayanan Makanan</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_7" class="checkbox-checklist"
                                    value="Nomer telepon ruangan/kamar" {{ in_array('Nomer telepon ruangan/kamar', $data_tiga) ? 'checked' : '' }}
                                    > Nomer telepon ruangan/kamar</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_8" class="checkbox-checklist"
                                    value="Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat"
                                    {{ in_array('Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat', $data_tiga) ? 'checked' : '' }}>
                                Tidak mengalihkan perhatian perawat saat
                                perawat sedang memberikan obat
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_9" class="checkbox-checklist"
                                    value="Prosedur visite dokter"
                                    {{ in_array('Prosedur visite dokter', $data_tiga) ? 'checked' : '' }}>
                                     Prosedur visite dokter
                                    </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_10" class="checkbox-checklist"
                                    value="Hak Pasien dijelaskan / brosur diberikan"
                                    {{ in_array('Hak Pasien dijelaskan / brosur diberikan', $data_tiga) ? 'checked' : '' }}> Hak Pasien dijelaskan / brosur
                                diberikan
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="7">4. Keselamatan</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_1" class="checkbox-checklist"
                                    value="Bahaya kebakaran – dilarang merokok di area rumah sakit" {{ in_array('Bahaya kebakaran – dilarang merokok di area rumah sakit', $data_empat) ? 'checked' : '' }}> Bahaya
                                kebakaran – dilarang
                                merokok di area rumah sakit</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_2" class="checkbox-checklist"
                                    value="Lokasi pintu darurat kebakaran" {{ in_array('Lokasi pintu darurat kebakaran', $data_empat) ? 'checked' : '' }}> Lokasi pintu darurat kebakaran
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_3" class="checkbox-checklist"
                                    value="Penggunaan gelang identitas pasien" {{ in_array('Penggunaan gelang identitas pasien', $data_empat) ? 'checked' : '' }}> Penggunaan gelang identitas
                                pasien</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_4" class="checkbox-checklist"
                                    value="Pencegahan infeksi : cuci tangan" {{ in_array('Pencegahan infeksi : cuci tangan', $data_empat) ? 'checked' : '' }}> Pencegahan infeksi : cuci tangan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_5" class="checkbox-checklist"
                                    value="Pencegahan jatuh" {{ in_array('Pencegahan jatuh', $data_empat) ? 'checked' : '' }}> Pencegahan jatuh</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_6" class="checkbox-checklist"
                            value="Peringatan tentang orang yang berbahaya (penipu)"
                            {{ in_array('Peringatan tentang orang yang berbahaya (penipu)', $data_empat) ? 'checked' : '' }}> Peringatan tentang
                                orang yang
                                berbahaya (penipu)</td>
                        </tr>
                        <tr>
                            <td rowspan="5" class="align-middle">5. Barang milik pasien</td>
                        </tr>
                        <tr>
                            <td class="align-middle">a. Gigi palsu</td>
                            <td><input type="checkbox" name="gigi" id="" class="" value="Tidak" {{$data->gigi=='Tidak' ? 'checked' : ''}}>
                                Tidak
                                <input type="checkbox" name="gigi" id="" class="" value="Ya" {{$data->gigi=='Ya' ? 'checked' : ''}}> Ya :
                                <input type="checkbox" name="lokasi_gigi" id="" class="" value="Atas" {{$data->lokasi_gigi=='Atas' ? 'checked' : ''}}> Atas
                                <input type="checkbox" name="lokasi_gigi" id="" class="" value="Bawah" {{$data->lokasi_gigi=='Bawah' ? 'checked' : ''}}> Bawah <br> Dibawa oleh
                                <input type="text" name="bawa_gigi" id="" value="{{$data->bawa_gigi}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">b. Alat bantu dengar</td>
                            <td>
                                <input type="checkbox" name="alat" id="" class="" value="Tidak" {{$data->alat=='Tidak' ? 'checked' : ''}}>Tidak
                                <input type="checkbox" name="alat" id="" class="" value="Ya" {{$data->alat=='Ya' ? 'checked': ''}}> Ya :
                                <input type="checkbox" name="lokasi_alat" id="" class="" value="Kanan" {{$data->lokasi_alat=='Kanan' ? 'checked' : ''}}> Kanan
                                <input type="checkbox" name="lokasi_alat" id="" class="" value="Kiri" {{$data->lokasi_alat=='Kiri' ? 'checked' : ''}}>Kiri <br> di bawa oleh
                                <input type="text" name="bawa_alat" id=""></td>
                        </tr>
                        <tr>
                            <td class="align-middle">c. Uang tunai </td>
                            <td>
                                <input type="checkbox" name="uang" id="" class="" value="Tidak" {{$data->uang=='Tidak' ? 'checked' : ''}}>Tidak
                                <input type="checkbox" name="uang" id="" class="" value="Ya" {{$data->uang=='Ya' ? 'checked' : ''}}> Ya, disimpan di :
                                <input type="checkbox" name="uang_bawa" id="" class="" value="Kasir" {{$data->uang_bawa=='Kasir' ? 'checked' : ''}}> Kasir <br>
                                <input type="checkbox" name="uang_bawa" id="" class="" value="Dibawa pasien / keluarga" {{$data->uang_bawa=='Dibawa pasien / keluarga' ? 'checked' : ''}}>Dibawa pasien / keluarga
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">d. Lainnya, sebutkan</td>
                            <td> <input type="text" name="barang_lain" id="" class="form-control" value="{{$data->barang_lain}}"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <button class="btn btn-success float-right" type="button" onclick="simpanchecklist()">Simpan</button>
        </form>
    </div>
</div>
