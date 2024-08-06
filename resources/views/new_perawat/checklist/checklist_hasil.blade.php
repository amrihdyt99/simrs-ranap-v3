@empty($datapasien)
@php
   $datapasien = optional((object)[]);
@endphp
@endempty
<div class="container">
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
                        <td>: {{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datapasien->GCSex)}}</td>
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
                    $data_kepada=json_decode($data->kepada)??[];
                    @endphp
                    @if ($data->tidak == null)
                        <tr>
                            <td colspan="3">Disampaikan oleh {{ $data->sampai }}
                                kepada @foreach ($data_kepada as $item)
                                    {{ $item }}
                                @endforeach
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3">Tidak di sampaikan oleh {{ $data->sampai }}
                                karena {{ $data->alasan_tidak }}
                            </td>
                        </tr>
                    @endif

                    @if (json_decode($data->satu))

                        <tr>
                            {{-- {{dd(json_decode($data->satu))}} --}}
                            <td rowspan="{{ count(json_decode($data->satu)) + 1 }}" class="align-middle">1. Petugas
                                Ruangan
                            </td>

                        </tr>

                        @foreach (json_decode($data->satu, true) as $item)
                            <tr>
                                <td colspan="2">√ {{ $item }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    @if (json_decode($data->dua))

                        <tr>
                            <td rowspan="{{ count(json_decode($data->dua)) + 1 }}" class="align-middle">2. Fasilitas
                                Fisik
                            </td>
                        </tr>
                        @foreach (json_decode($data->dua, true) as $item)
                            <tr>
                                <td colspan="2">√ {{ $item }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    @if (json_decode($data->tiga))

                        <tr>
                            <td rowspan="{{ count(json_decode($data->tiga)) + 1 }}" class="align-middle">3. Tata
                                Laksana
                                Pelayanan Rumah Sakit</td>
                        </tr>
                        @foreach (json_decode($data->tiga, true) as $item)
                            <tr>
                                <td colspan="2">√ {{ $item }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    @if (json_decode($data->empat))

                        <tr>
                            <td rowspan="{{ count(json_decode($data->empat)) + 1 }}">4. Keselamatan</td>
                        </tr>
                        @foreach (json_decode($data->empat, true) as $item)
                            <tr>
                                <td colspan="2">√ {{ $item }}
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
                            @if ($data->gigi == 'Tidak')
                                Tidak Bawa
                            @else
                                Ya, Lokasi Gigi di {{ $data->lokasi_gigi }} di bawah oleh {{ $data->bawa_gigi }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">b. Alat bantu dengar</td>
                        <td>
                            @if ($data->alat == 'Tidak')
                                Tidak Bawa
                            @else
                                Ya, Lokasi Alat di {{ $data->lokasi_alat }} di bawah oleh {{ $data->bawa_alat }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">c. Uang tunai </td>
                        <td>
                            @if ($data->uang == 'Tidak')
                                Tidak Bawa
                            @else
                                Ya, di titipkan kepada {{ $data->uang_bawa }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">d. Lainnya, sebutkan</td>
                        <td>
                            @if ($data->barang_lain == null)
                                Tidak ada
                            @else
                                {{ $data->barang_lain }}
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
            {{-- <a href="{{url('').'/print/rm3/'.$datapasien->MedicalNo}}" class="btn btn-danger"
                    target="_blank">Print</a> --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ $message }}
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
                @endif --}}
        </div>
    </div>
</div>
