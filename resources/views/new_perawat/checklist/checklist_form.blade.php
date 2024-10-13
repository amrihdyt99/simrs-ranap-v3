@empty($datapasien)
    @php
        $datapasien = optional((object) []);
    @endphp
@endempty
@php
    $ruang = DB::connection('mysql2')->table('m_bed')
    ->join('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
    ->join('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
    ->join('m_unit_departemen', 'm_unit_departemen.ServiceUnitID', '=', 'm_bed.service_unit_id')
    ->join('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
    ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
    ->where('bed_id',$datapasien->bed)->first();
    if(!$ruang){
    $ruang = optional((object)[]);
    }
@endphp
<div class="container">
    <form id="entry-checklist">
        @csrf
        <input type="hidden" name="id" value="{{ $datapasien->MedicalNo }}">
        <div class="card-body">
            <table class="table1 table-bordered table-sm mt-3 border-dark">
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
                        <td>: {{$ruang->kelompok}} [{{$ruang->bed_code}}]</td>
                    </tr>
                    <tr>
                        <td>Tgl Masuk Rawat Inap </td>
                        <td>: {{ $datapasien->reg_tgl }}
                        </td>
                        {{-- <td>: {{ app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($datapasien->reg_tgl) }}
                        </td> --}}
                    </tr>
                    <t>
                        <td>Tgl Assesment </td>
                        
                        <td>: 
                            <input type="text" name="tgl_assesment_awal" id="tgl_assesment" style="border: none" value="{{ $tgl_assesment->created_at ?? $data->tgl_assesment }}" readonly>
                        </td>
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
                            <input type="text" class="form-control" style="width: 100px; display: inline-block;" name="sampai" id="sampai" value="{{ $data->sampai }}">kepada
                            <input type="checkbox" name="kepada[]" id="disampaikan_oleh_1" value="pasien"
                                {{ in_array('pasien', $data_kepada) ? 'checked' : '' }}>Pasien
                            <input type="checkbox" name="kepada[]" id="disampaikan_oleh_2" value="saudara"
                                {{ in_array('saudara', $data_kepada) ? 'checked' : '' }}>Saudara , lainnya
                            <input type="text" class="form-control" style="width: 100px; display: inline-block;" name="kepada_lain" id=""
                                value="{{$data->kepada_lain}}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <input type="checkbox" name="tidak" id="" class=""
                                        value="Tidak dapat" {{ $data->tidak == 'Tidak dapat' ? 'checked' : '' }}>
                                    Tidak dapat dilakukan karena
                                    <input type="text" class="form-control" style="width: 200px; display: inline-block;" name="alasan_tidak" id=""
                                        value="{{ $data->alasan_tidak }}">
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <input type="checkbox" name="checkAll" id="checkAll"
                                onchange="checkAllCheckListv1(this)" />
                            <label for="checkAll"> Pilih Semua</label>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="align-middle">1. Petugas Ruangan</td>
                        <td colspan="2">
                            <input type="checkbox" name="satu[]" id="Petugas_1" class="checkbox-checklist"
                                value="Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya"
                                {{ in_array('Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya', $data_satu) ? 'checked' : '' }}>
                            <label for="Petugas_1">Memperkenalkan kepada Perawat penanggung jawab dan petugas
                                lainnya</label>
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
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_1"
                                class="checkbox-checklist" value="Lokasi ruangan dan tempat tidur"
                                {{ in_array('Lokasi ruangan dan tempat tidur', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_1">Lokasi ruangan dan tempat tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_2"
                                class="checkbox-checklist" value="Kamar mandi dan toilet"
                                {{ in_array('Kamar mandi dan toilet', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_2">Kamar mandi dan toilet</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_3"
                                class="checkbox-checklist" value="Nurse station"
                                {{ in_array('Nurse station', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_3">Nurse station</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_4"
                                class="checkbox-checklist" value="Ruang publik"
                                {{ in_array('Ruang publik', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_4">Ruang publik</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="dua[]" id="Fasilitas_5" class="checkbox-checklist"
                                value="Sistem Nurse Call"
                                {{ in_array('Sistem Nurse Call', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_5">Sistem Nurse Call</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_6"
                                class="checkbox-checklist" value="Penggunaan TV"
                                {{ in_array('Penggunaan TV', $data_dua) ? 'checked' : '' }}>
                            <label for="Fasilitas_6">Penggunaan TV</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_7"
                                class="checkbox-checklist" value="Penggunaan Telepon"
                                {{ in_array('Penggunaan Telepon', $data_dua) ? 'checked' : '' }}> Penggunaan
                            Telepon</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="dua[]" id="Fasilitas_8"
                                class="checkbox-checklist"
                                value="Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien dll"
                                {{ in_array('Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien dll', $data_dua) ? 'checked' : '' }}>
                            Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien
                            dll</td>
                    </tr>
                    <tr>
                        <td rowspan="11" class="align-middle">3. Tata Laksana Pelayanan Rumah Sakit</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_1"
                                class="checkbox-checklist" value="Aktifitas harian pelayanan di ruangan"
                                {{ in_array('Aktifitas harian pelayanan di ruangan', $data_tiga) ? 'checked' : '' }}>
                            Aktifitas harian pelayanan di
                            ruangan
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_2"
                                class="checkbox-checklist" value="Barang kebutuhan pribadi dan perlengkapan mandi"
                                {{ in_array('Barang kebutuhan pribadi dan perlengkapan mandi', $data_tiga) ? 'checked' : '' }}>
                            Barang kebutuhan
                            pribadi
                            dan perlengkapan mandi</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_3"
                                class="checkbox-checklist" value="Pengunjung dan jam berkunjung"
                                {{ in_array('Pengunjung dan jam berkunjung', $data_tiga) ? 'checked' : '' }}>
                            Pengunjung dan jam berkunjung</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_4"
                                class="checkbox-checklist" value="Pemakaian pakaian pribadi pasien"
                                {{ in_array('Pemakaian pakaian pribadi pasien', $data_tiga) ? 'checked' : '' }}>
                            Pemakaian pakaian pribadi pasien</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_5"
                                class="checkbox-checklist"
                                value="Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)"
                                {{ in_array('Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)', $data_tiga) ? 'checked' : '' }}>
                            Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana
                            tindakan/operasi)</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_6"
                                class="checkbox-checklist"
                                value="Pelayanan Makanan"{{ in_array('Pelayanan Makanan', $data_tiga) ? 'checked' : '' }}>
                            Pelayanan Makanan</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_7"
                                class="checkbox-checklist" value="Nomer telepon ruangan/kamar"
                                {{ in_array('Nomer telepon ruangan/kamar', $data_tiga) ? 'checked' : '' }}> Nomer
                            telepon ruangan/kamar</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_8"
                                class="checkbox-checklist"
                                value="Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat"
                                {{ in_array('Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat', $data_tiga) ? 'checked' : '' }}>
                            Tidak mengalihkan perhatian perawat saat
                            perawat sedang memberikan obat
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_9"
                                class="checkbox-checklist" value="Prosedur visite dokter"
                                {{ in_array('Prosedur visite dokter', $data_tiga) ? 'checked' : '' }}>
                            Prosedur visite dokter
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="tiga[]" id="Tata_10"
                                class="checkbox-checklist" value="Hak Pasien dijelaskan / brosur diberikan"
                                {{ in_array('Hak Pasien dijelaskan / brosur diberikan', $data_tiga) ? 'checked' : '' }}>
                            Hak Pasien dijelaskan / brosur
                            diberikan
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="7">4. Keselamatan</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_1"
                                class="checkbox-checklist"
                                value="Bahaya kebakaran – dilarang merokok di area rumah sakit"
                                {{ in_array('Bahaya kebakaran – dilarang merokok di area rumah sakit', $data_empat) ? 'checked' : '' }}>
                            Bahaya
                            kebakaran – dilarang
                            merokok di area rumah sakit</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_2"
                                class="checkbox-checklist" value="Lokasi pintu darurat kebakaran"
                                {{ in_array('Lokasi pintu darurat kebakaran', $data_empat) ? 'checked' : '' }}>
                            Lokasi pintu darurat kebakaran
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_3"
                                class="checkbox-checklist" value="Penggunaan gelang identitas pasien"
                                {{ in_array('Penggunaan gelang identitas pasien', $data_empat) ? 'checked' : '' }}>
                            Penggunaan gelang identitas
                            pasien</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_4"
                                class="checkbox-checklist" value="Pencegahan infeksi : cuci tangan"
                                {{ in_array('Pencegahan infeksi : cuci tangan', $data_empat) ? 'checked' : '' }}>
                            Pencegahan infeksi : cuci tangan
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_5"
                                class="checkbox-checklist" value="Pencegahan jatuh"
                                {{ in_array('Pencegahan jatuh', $data_empat) ? 'checked' : '' }}> Pencegahan jatuh
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="empat[]" id="Keselamatan_6"
                                class="checkbox-checklist" value="Peringatan tentang orang yang berbahaya (penipu)"
                                {{ in_array('Peringatan tentang orang yang berbahaya (penipu)', $data_empat) ? 'checked' : '' }}>
                            Peringatan tentang
                            orang yang
                            berbahaya (penipu)</td>
                    </tr>
                    <tr>
                        <td rowspan="5" class="align-middle">5. Barang milik pasien</td>
                    </tr>
                    <tr>
                        <td class="align-middle">a. Gigi palsu</td>
                        <td><input type="checkbox" name="gigi" id="" class="" value="Tidak"
                                {{ $data->gigi == 'Tidak' ? 'checked' : '' }}>
                            Tidak
                            <input type="checkbox" name="gigi" id="" class="" value="Ya"
                                {{ $data->gigi == 'Ya' ? 'checked' : '' }}> Ya :
                            <input type="checkbox" name="lokasi_gigi" id="" class="" value="Atas"
                                {{ $data->lokasi_gigi == 'Atas' ? 'checked' : '' }}> Atas
                            <input type="checkbox" name="lokasi_gigi" id="" class="" value="Bawah"
                                {{ $data->lokasi_gigi == 'Bawah' ? 'checked' : '' }}> Bawah <br>
                            Dibawa oleh
                            <input type="text" class="form-control" name="bawa_gigi" id="" value="{{ $data->bawa_gigi }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">b. Alat bantu dengar</td>
                        <td>
                            <input type="checkbox" name="alat" id="" class="" value="Tidak"
                                {{ $data->alat == 'Tidak' ? 'checked' : '' }}>Tidak
                            <input type="checkbox" name="alat" id="" class="" value="Ya"
                                {{ $data->alat == 'Ya' ? 'checked' : '' }}> Ya :
                            <input type="checkbox" name="lokasi_alat" id="" class="" value="Kanan"
                                {{ $data->lokasi_alat == 'Kanan' ? 'checked' : '' }}> Kanan
                            <input type="checkbox" name="lokasi_alat" id="" class="" value="Kiri"
                                {{ $data->lokasi_alat == 'Kiri' ? 'checked' : '' }}>Kiri <br> di
                            bawa
                            oleh
                            <input type="text" class="form-control" style="width: 100px; display: inline-block;" name="bawa_alat" id="" value="{{ $data->bawa_alat }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">c. Uang tunai </td>
                        <td>
                            <input type="checkbox" name="uang" id="" class="" value="Tidak"
                                {{ $data->uang == 'Tidak' ? 'checked' : '' }}>Tidak
                            <input type="checkbox" name="uang" id="" class="" value="Ya"
                                {{ $data->uang == 'Ya' ? 'checked' : '' }}> Ya, disimpan di :
                            <input type="checkbox" name="uang_bawa" id="" class="" value="Kasir"
                                {{ $data->uang_bawa == 'Kasir' ? 'checked' : '' }}> Kasir <br>
                            <input type="checkbox" name="uang_bawa" id="" class=""
                                value="Dibawa pasien / keluarga"
                                {{ $data->uang_bawa == 'Dibawa pasien / keluarga' ? 'checked' : '' }}>Dibawa pasien
                            /
                            keluarga
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">d. Lainnya, sebutkan</td>
                        <td> <input type="text" name="barang_lain" style="width: 100px; display: inline-block;" id="" class="form-control"
                                value="{{ $data->barang_lain }}"></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            Saya 
                            <input type="text" name="nama_pihak_pasien" id="" class="form-control" value="{{ $data->nama_pihak_pasien }}" style="width: 100px; display: inline-block;"> 
                            (nama) sebagai 
                            <input type="text" name="sebagai_pihak_pasien" id="" class="form-control" value="{{ $data->sebagai_pihak_pasien }}" style="width: 100px; display: inline-block;"> 
                            apabila saya dan pasien memilih untuk menyimpan benda / uang dalam penyimpanan saya, maka saya atau pasien tidak
                            akan melimpahkan tanggungjawab kepada RSUD Siti Fatimah Prov. Sumsel apabila terjadi kerusakan atau kehilangan benda / uang tersebut.
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-sm mt-3 border-dark" style="width: 100%; text-align: center;">
                <tr>
                    <td style="vertical-align: middle;">
                        <p>Tanda Tangan Perawat</p>
                        <div id="signature-pad-perawat" style="display: inline-block; margin: 0 auto;">
                            <div
                                style="border: solid 1px teal; width: 260px; height: 160px; padding: 3px; position: relative;">
                                <canvas id="the_canvas_perawat" width="260px" height="160px">Your browser does not
                                    support the HTML canvas tag.</canvas>
                            </div>
                            <div style="margin: 10px;">
                                <input type="hidden" id="signature_perawat" name="ttd_perawat"
                                    value=" {{$data->ttd_perawat ?? auth()->user()->signature }}">
                                <button type="button" id="clear_btn_perawat" class="btn btn-danger"
                                    data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                    Hapus</button>
                            </div>
                            <input type="text" name="nama_perawat" class="form-control mb-2" value="{{$data->nama_perawat ?? auth()->user()->name}}" placeholder="Nama Perawat" style="width: 280px; margin: 0 auto;">
                        </div>
                    </td>
                    <td style="vertical-align: middle;">
                        <input type="datetime-local" class="form-control float-end" style="width: 200px; display: inline-block; margin: 0 auto;" name="tgl_ttd" value="{{$data->tgl_ttd}}">
                        <p>Tanda Tangan Pasien/Keluarga</p>
                        <div id="signature-pad-pasien" style="display: inline-block; margin: 0 auto;">
                            <div
                                style="border: solid 1px teal; width: 260px; height: 160px; padding: 3px; position: relative;">
                                <canvas id="the_canvas_pasien" width="260px" height="160px">Your browser does not
                                    support the HTML canvas tag.</canvas>
                            </div>
                            <div style="margin: 10px;">
                                <input type="hidden" id="signature_pasien" name="ttd_pasien"
                                    value="{{ $data->ttd_pasien }}">
                                <button type="button" id="clear_btn_pasien" class="btn btn-danger"
                                    data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                    Hapus</button>
                            </div>
                        </div>
                        @if (count($registrasi_pj) > 0)
                            <select name="nama_keluarga_pasien" class="form-control mt-2" style="width: 180px; margin: 0 auto;">
                                <option value="">Pilih Keluarga</option>
                                @foreach($registrasi_pj as $pj)
                                    <option value="{{ $pj->reg_pjawab_nama }}" {{ $data->nama_keluarga_pasien == $pj->reg_pjawab_nama ? 'selected' : '' }}>{{ $pj->reg_pjawab_nama }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" name="nama_keluarga_pasien" value="{{$data->nama_keluarga_pasien}}" class="form-control mt-2" placeholder="Nama Keluarga" style="margin: 0 auto; width: 180px;">
                        @endif
                    </td>
                </tr>
            </table>

        </div>
        <button class="btn btn-success float-left" type="button" id="save-checklist-orientasi">Simpan</button>
    </form>
</div>
