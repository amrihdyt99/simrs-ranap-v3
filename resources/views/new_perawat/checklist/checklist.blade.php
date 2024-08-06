<div class="container">
        @if ($hitung == 0)
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
                                <td>:</td>
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
                            <tr>
                                <td colspan="3">Disampaikan oleh <input type="text" name="sampai" id="sampai">
                                    kepada <input type="checkbox" name="kepada[]" id="" value="pasien">Pasien <input
                                        type="checkbox" name="kepada[]" id="" value="saudara">Saudara , lainnya <input
                                        type="text" name="kepada[]" id="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6"><input type="checkbox" name="tidak" id="" class=""
                                                value="Tidak dapat">Tidak
                                            dapat dilakukan karena
                                            <input type="text" name="alasan_tidak" id="">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="align-middle">1. Petugas Ruangan</td>
                                <td colspan="2"><input type="checkbox" name="checkAll" id="checkAll" onchange="checkAllCheckList(this)"/>Pilih Semua<br/><br/>
                                    <input type="checkbox" name="satu[]" id="" class=""
                                        value="Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya">
                                    Memperkenalkan kepada Perawat penanggung jawab dan petugas lainnya</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="satu[]" id="" class=""
                                        value="Memperkenalkan kepada pasien sekamar atau sesama"> Memperkenalkan kepada
                                    pasien sekamar atau sesama</td>
                            </tr>
                            <tr>
                                <td rowspan="9" class="align-middle">2. Fasilitas Fisik</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class="" value="Lokasi ruangan dan tempat
                                    tidur"> Lokasi ruangan dan tempat
                                    tidur</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class=""
                                        value="Kamar mandi dan toilet"> Kamar mandi dan toilet</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class=""
                                        value="Nurse station">
                                    Nurse station</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class="" value="Ruang publik">
                                    Ruang publik</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class=""
                                        value="Sistem Nurse Call"> Sistem Nurse Call</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class=""
                                        value="Penggunaan TV">
                                    Penggunaan TV</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class=""
                                        value="Penggunaan Telepon"> Penggunaan Telepon</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="dua[]" id="" class="" value="Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien
                                dll"> Kegunaan Monitor bedside / ventilator / syringe pump yang digunakan pasien
                                    dll</td>
                            </tr>
                            <tr>
                                <td rowspan="11" class="align-middle">3. Tata Laksana Pelayanan Rumah Sakit</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Aktifitas harian pelayanan di ruangan"> Aktifitas harian pelayanan di
                                    ruangan
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Barang kebutuhan pribadi dan perlengkapan mandi"> Barang kebutuhan
                                    pribadi
                                    dan perlengkapan mandi</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Pengunjung dan jam berkunjung"> Pengunjung dan jam berkunjung</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Pemakaian pakaian pribadi pasien"> Pemakaian pakaian pribadi pasien</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Prosedur khusus pra dan post tindakan / operasi (untuk pasien dengan rencana tindakan/operasi)">
                                    Prosedur khusus pra dan post tindakan /
                                    operasi (untuk pasien dengan
                                    rencana
                                    tindakan/operasi)</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Pelayanan Makanan"> Pelayanan Makanan</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Nomer telepon ruangan/kamar"> Nomer telepon ruangan/kamar</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Tidak mengalihkan perhatian perawat saat perawat sedang memberikan obat">
                                    Tidak mengalihkan perhatian perawat saat
                                    perawat sedang memberikan obat
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Prosedur visite dokter"> Prosedur visite dokter</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="tiga[]" id="" class=""
                                        value="Hak Pasien dijelaskan / brosur diberikan"> Hak Pasien dijelaskan / brosur
                                    diberikan
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="7">4. Keselamatan</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Bahaya kebakaran – dilarang merokok di area rumah sakit"> Bahaya
                                    kebakaran – dilarang
                                    merokok di area rumah sakit</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Lokasi pintu darurat kebakaran"> Lokasi pintu darurat kebakaran
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Penggunaan gelang identitas pasien"> Penggunaan gelang identitas
                                    pasien</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Pencegahan infeksi : cuci tangan"> Pencegahan infeksi : cuci tangan
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Pencegahan jatuh"> Pencegahan jatuh</td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="empat[]" id="" class=""
                                        value="Peringatan tentang orang yang berbahaya (penipu)"> Peringatan tentang
                                    orang yang
                                    berbahaya (penipu)</td>
                            </tr>
                            <tr>
                                <td rowspan="5" class="align-middle">5. Barang milik pasien</td>
                            </tr>
                            <tr>
                                <td class="align-middle">a. Gigi palsu</td>
                                <td><input type="checkbox" name="gigi" id="" class="" value="Tidak"> Tidak <input
                                        type="checkbox" name="gigi" id="" class="" value="Ya"> Ya : <input
                                        type="checkbox" name="lokasi_gigi" id="" class="" value="Atas"> Atas <input
                                        type="checkbox" name="lokasi_gigi" id="" class="" value="Bawah"> Bawah Dibawa
                                    oleh <input type="text" name="bawa_gigi" id=""></td>
                            </tr>
                            <tr>
                                <td class="align-middle">b. Alat bantu dengar</td>
                                <td><input type="checkbox" name="alat" id="" class="" value="Tidak">Tidak <input
                                        type="checkbox" name="alat" id="" class="" value="Ya"> Ya : <input
                                        type="checkbox" name="lokasi_alat" id="" class="" value="Kanan"> Kanan <input
                                        type="checkbox" name="lokasi_alat" id="" class="" value="Kiri">
                                    Kiri Dibawa oleh <input type="text" name="bawa_alat" id=""></td>
                            </tr>
                            <tr>
                                <td class="align-middle">c. Uang tunai </td>
                                <td><input type="checkbox" name="uang" id="" class="" value="Tidak">Tidak <input
                                        type="checkbox" name="uang" id="" class="" value="Ya"> Ya, disimpan
                                    di : <input type="checkbox" name="uang_bawa" id="" class="" value="Kasir"> Kasir
                                    <input type="checkbox" name="uang_bawa" id="" class=""
                                        value="Dibawa pasien / keluarga">Dibawa pasien / keluarga
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">d. Lainnya, sebutkan</td>
                                <td> <input type="text" name="barang_lain" id="" class="form-control"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success float-right" type="button" onclick="simpanchecklist()">Simpan</button>
            </form>
        </div>
        @else
        <div class="card">
            <input type="hidden" name="id" value="{{ $datapasien->MedicalNo }}">
            <div class="card-body">
                <center><img src="{{ asset('admin1/images/logors.PNG') }}" /></center>
                <hr>
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
                            <td>:</td>
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
                        @if ($data->tidak == null)
                        <tr>
                            <td colspan="3">Disampaikan oleh {{$data->sampai}}
                                kepada @foreach (json_decode($data->kepada) as $item)
                                {{$item}}
                                @endforeach
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="3">Tidak di sampaikan oleh {{$data->sampai}}
                                karena {{$data->alasan_tidak}}
                            </td>
                        </tr>
                        @endif

                        @if (json_decode($data->satu))

                        <tr>
                            {{-- {{dd(json_decode($data->satu))}} --}}
                            <td rowspan="{{count(json_decode($data->satu))+1}}" class="align-middle">1. Petugas Ruangan
                            </td>

                        </tr>

                        @foreach (json_decode($data->satu,true) as $item)
                        <tr>
                            <td colspan="2">√ {{$item}}
                            </td>
                        </tr>
                        @endforeach
                        @endif

                        @if (json_decode($data->dua))

                        <tr>
                            <td rowspan="{{count(json_decode($data->dua))+1}}" class="align-middle">2. Fasilitas Fisik
                            </td>
                        </tr>
                        @foreach (json_decode($data->dua,true) as $item)
                        <tr>
                            <td colspan="2">√ {{$item}}
                            </td>
                        </tr>
                        @endforeach
                        @endif

                        @if (json_decode($data->tiga))

                        <tr>
                            <td rowspan="{{count(json_decode($data->tiga))+1}}" class="align-middle">3. Tata Laksana
                                Pelayanan Rumah Sakit</td>
                        </tr>
                        @foreach (json_decode($data->tiga,true) as $item)
                        <tr>
                            <td colspan="2">√ {{$item}}
                            </td>
                        </tr>
                        @endforeach
                        @endif

                        @if (json_decode($data->empat))

                        <tr>
                            <td rowspan="{{count(json_decode($data->empat))+1}}">4. Keselamatan</td>
                        </tr>
                        @foreach (json_decode($data->empat,true) as $item)
                        <tr>
                            <td colspan="2">√ {{$item}}
                            </td>
                        </tr>
                        @endforeach
                        @endif

                        <tr>
                            <td rowspan="5" class="align-middle">5. Barang milik pasien</td>
                        </tr>
                        <tr>
                            <td class="align-middle">a. Gigi palsu</td>
                            <td>
                                @if ($data->gigi =='Tidak')
                                Tidak Bawa
                                @else
                                Ya, Lokasi Gigi di {{$data->lokasi_gigi}} di bawah oleh {{$data->bawa_gigi}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">b. Alat bantu dengar</td>
                            <td>
                                @if ($data->alat =='Tidak')
                                Tidak Bawa
                                @else
                                Ya, Lokasi Alat di {{$data->lokasi_alat}} di bawah oleh {{$data->bawa_alat}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">c. Uang tunai </td>
                            <td>
                                @if ($data->uang =='Tidak')
                                Tidak Bawa
                                @else
                                Ya, di titipkan kepada {{$data->uang_bawa}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">d. Lainnya, sebutkan</td>
                            <td>
                                @if ($data->barang_lain == null)
                                Tidak ada
                                @else
                                {{$data->barang_lain}}
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
               {{-- <a href="{{url('').'/print/rm3/'.$datapasien->MedicalNo}}" class="btn btn-danger"
                    target="_blank">Print</a>--}}
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
              {{--  @if ($data->file == null)
                <form action="{{url('rm3/upload')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="hidden" name="id" value="{{$datapasien->MedicalNo}}">
                        <div class="row">
                            <div class="col-8"> <input type="file" name="file" id="" class="form-control"></div>
                            <div class="col-4"><button class="btn btn-success" type="submit">Simpan</button></div>
                        </div>
                    </div>
                </form>
                @else
                <a href="{{asset($data->file)}}" class="btn btn-success" target="_blank">Lihat
                    File</a>
                @endif--}}
            </div>
        </div>
        @endif
    </div>


