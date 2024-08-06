@extends('assessment.layouts.app')

@section('content')
    <div class="callout callout-info">
        <h5 class="text-sm text-bold">ASSESMEN KEPERAWATAN BAYI BARU LAHIR</h5>
    </div>

    <div class="card card-default">
        <form action="" id="form-bayi-lahir">
            <div>
                <div class="card-header">
                    <h3 class="card-title text-sm text-bold">A. ANAMNESA</h3>
                </div>
                <div class="card-body">
                    <div>
                        <h5 class="text-bold text-sm">1. IDENTITAS BIODATA</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Nama Bayi</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan nama bayi">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Tempat/ tanggal lahir</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan tempat dan tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Jenis Kelamin</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan jenis kelamin">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">No. RM Bayi</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan nomor rekam medis bayi">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">No. RM Ibu</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan nomor rekam medis ibu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Nama Ibu</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan nama ibu">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Umur</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Masukkan umur">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Agama</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan agama">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Suku Bangsa</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan suku bangsa">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Pendidikan</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan pendidikan">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Pekerjaan</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan pekerjaan">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Nama Ayah</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan nama ayah">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Umur</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Masukkan umur">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Agama</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan agama">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Suku Bangsa</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan suku bangsa">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Pendidikan</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan pendidikan">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Pekerjaan</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan pekerjaan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-sm">Alamat</label>
                                    <textarea name="" id="" cols="30" rows="10"
                                              class="text-sm form-control form-control-sm"
                                              placeholder="Masukkan alamat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">2. RIWAYAT KEHAMILAN</h5>
                        <div class="form-group">
                            <label class="text-sm">Pendarahan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan pendarahan">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Pre Eklampsia</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan pre eklampsia">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Eklampsia</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan eklampsia">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Penyakit Kelamin</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan penyakit kelamin">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Lain - lain</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan lain-lain">
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">2. KEBIASAAN WAKTU HAMIL</h5>
                        <div class="form-group">
                            <label class="text-sm">Makanan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan makanan">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Obat obatan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan obat-obatan">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Merokok</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan merokok">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Lain-lain</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan lain-lain">
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">3. RIWAYAT PERSALINAN SEKARANG</h5>
                        <div class="form-group">
                            <label class="text-sm">Jenis Persalinan</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan jenis persalinan">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Di Tolong Oleh</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan di tolong oleh">
                        </div>
                        <h5 class="text-bold text-sm">Lama Persalinan</h5>
                        <ul>
                            <li>
                                <div class="form-group">
                                    <label class="text-sm">Kala I</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan kala 1">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="text-sm">Kala II</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan kala 2">
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="text-sm">Ketuban Pecah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ketuban-opt-1">
                                        <label class="form-check-label text-sm" for="ketuban-opt-1">
                                            Spontan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ketuban-opt-2">
                                        <label class="form-check-label text-sm" for="ketuban-opt-2">
                                            Amniotomi
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="text-sm">Warna</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan warna">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="warna-opt-1">
                                        <label class="form-check-label  text-sm" for="warna-opt-1">
                                            Bau
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="warna-opt-2">
                                        <label class="form-check-label text-sm" for="warna-opt-2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="text-sm">Komplikasi Persalinan</label>
                                    <div class="form-check">
                                        <div class="row"></div>
                                        <input class="form-check-input" type="checkbox" value="" id="komplikasi-opt-1">
                                        <label class="form-check-label text-sm" for="komplikasi-opt-1">
                                            Ibu
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan komplikasi">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="komplikasi-opt-2">
                                        <label class="form-check-label text-sm" for="komplikasi-opt-2">
                                            Bayi
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan komplikasi">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">4. KEADAAN PERSALINAN SEKARANG</h5>
                        <div class="form-group">
                            <label class="text-sm">a. Nilai Apgar</label>
                            <table class="table table-sm table-bordered table-hover">
                                <tr>
                                    <th class="text-sm">Kriteria</th>
                                    <th class="text-sm">0 -1 Menit</th>
                                    <th class="text-sm">5 Menit</th>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        Aperance (Warna Kulit)
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan aperance">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan aperance">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        POLS (Denyut Nadi)
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan pols">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan pols">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        Grimace (Reaksi terhadap Rangsangan)
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan grimace">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan grimace">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        Activity (Lonus Otot)
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan activity">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan activity">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        Respiratory (Usaha Nafas)
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan respiratory">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan respiratory">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-sm">
                                        Total
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan total">
                                    </td>
                                    <td class="text-sm">
                                        <input type="text" class="form-control form-control-sm"
                                               placeholder="Masukkan total">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">b. Resusitasi</label>
                            <div class="form-group">
                                <label class="text-sm">Pengisapan Lendir</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="pengisapan-opt-1">
                                    <label class="form-check-label text-sm" for="pengisapan-opt-1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="pengisapan-opt-2">
                                    <label class="form-check-label text-sm" for="pengisapan-opt-2">
                                        Tidak Rangsangan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Ambu</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-1">
                                    <label class="form-check-label text-sm" for="ambu-opt-1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-2">
                                    <label class="form-check-label text-sm" for="ambu-opt-2">
                                        Tidak Lamanya
                                    </label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="Masukkan menit"></div>
                                        <div class="col-md-10"><span class="text-sm">Menit</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Massage Jantung</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-1">
                                    <label class="form-check-label text-sm" for="ambu-opt-1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-2">
                                    <label class="form-check-label text-sm" for="ambu-opt-2">
                                        Tidak Lamanya
                                    </label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="Masukkan menit"></div>
                                        <div class="col-md-10"><span class="text-sm">Menit</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Intubasi Endotracheal</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-1">
                                    <label class="form-check-label text-sm" for="ambu-opt-1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ambu-opt-2">
                                    <label class="form-check-label text-sm" for="ambu-opt-2">
                                        Tidak Lamanya
                                    </label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" class="form-control form-control-sm"
                                                   placeholder="Masukkan menit"></div>
                                        <div class="col-md-10"><span class="text-sm">Menit</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Therapy</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan therapy">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Keterangan</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan keterangan">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card-header">
                    <h3 class="card-title text-sm text-bold">B. PEMERIKSAAN</h3>
                </div>
                <div class="card-body">
                    <div>
                        <h5 class="text-bold text-sm">1. PEMERIKSAAN UMUM</h5>
                        <div class="form-group">
                            <label class="text-sm">Keadaan Umum</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan keadaan umum">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Suhu</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan temperature">
                                </div>
                                <div class="col">
                                    <span class="text-sm">&#8451;</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Pernafasan</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan pernafasan">
                                </div>
                                <div class="col-md-2">
                                    <span class="text-sm">x/mnt</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="pernafasan-opt-1">
                                        <label class="form-check-label text-sm" for="pernafasan-opt-1">
                                            Teratur
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="pernafasan-opt-2">
                                        <label class="form-check-label text-sm" for="pernafasan-opt-2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Denyut Nadi</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan denyut nadi">
                                </div>
                                <div class="col-md-2">
                                    <span class="text-sm">x/mnt</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="denyut-opt-1">
                                        <label class="form-check-label text-sm" for="denyut-opt-1">
                                            Teratur
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="denyut-opt-2">
                                        <label class="form-check-label text-sm" for="denyut-opt-2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Berat Badan</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan berat badan">
                                </div>
                                <div class="col-md-8">
                                    <span class="text-sm">gram</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">Panjang Badan</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan panjang badan">
                                </div>
                                <div class="col-md-8">
                                    <span class="text-sm">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">2. PEMERIKSAAN FISIK</h5>
                        <div>
                            <label class="text-sm">a. Kepala</label>
                            <div class="form-group">
                                <label class="text-sm">Bentuk Kepala</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bentuk-opt-1">
                                    <label class="form-check-label text-sm" for="bentuk-opt-1">
                                        Simetris
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bentuk-opt-2">
                                    <label class="form-check-label text-sm" for="bentuk-opt-2">
                                        Tidak Simetris
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Fontanel (ubun-ubun)</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan fontanel">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Molding</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan molding">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Caput Succedaneum</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="caput-opt-1">
                                    <label class="form-check-label text-sm" for="caput-opt-1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="caput-opt-2">
                                    <label class="form-check-label text-sm" for="caput-opt-2">
                                        Tidak ada
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Muka</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan muka">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">b. Mata</label>
                            <div class="form-group">
                                <label class="text-sm">Conjungtiva</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="conjungtiva-opt-1">
                                    <label class="form-check-label text-sm" for="conjungtiva-opt-1">
                                        Ikrus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="conjungtiva-opt-2">
                                    <label class="form-check-label text-sm" for="conjungtiva-opt-2">
                                        Normal
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Sklera</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="sklera-opt-1">
                                    <label class="form-check-label text-sm" for="sklera-opt-1">
                                        Ikrus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="sklera-opt-2">
                                    <label class="form-check-label text-sm" for="sklera-opt-2">
                                        Normal
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Bola Mata</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bola-opt-1">
                                    <label class="form-check-label text-sm" for="bola-opt-1">
                                        Normal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bola-opt-2">
                                    <label class="form-check-label text-sm" for="bola-opt-2">
                                        Juling
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Gerakan Bola Mata</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bola mata">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">c. Telinga</label>
                            <div class="form-group">
                                <label class="text-sm">Bentuk</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bentuk telinga">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Posisi</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan posisi telinga">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Lobang</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="lobang-opt-1">
                                    <label class="form-check-label text-sm" for="lobang-opt-1">
                                        Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="lobang-opt-2">
                                    <label class="form-check-label text-sm" for="lobang-opt-2">
                                        Tidak ada
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="text-sm">d. Bibir</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bibir-opt-1">
                                    <label class="form-check-label text-sm" for="bibir-opt-1">
                                        Normal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bibir-opt-2">
                                    <label class="form-check-label text-sm" for="bibir-opt-2">
                                        Hazelip (sumbing)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="bibir-opt-3">
                                    <label class="form-check-label text-sm" for="bibir-opt-3">
                                        Lain - lain
                                    </label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan lain-lain">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">e. Leher</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan leher">
                        </div>
                        <div class="form-group">
                            <label class="text-sm">f. Dada</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="dada-opt-1">
                                <label class="form-check-label text-sm" for="dada-opt-1">
                                    Simetris
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="dada-opt-2">
                                <label class="form-check-label text-sm" for="dada-opt-2">
                                    Tidak Simetris
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">g. Tali Pusat</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tali-opt-1">
                                <label class="form-check-label text-sm" for="tali-opt-1">
                                    Normal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tali-opt-2">
                                <label class="form-check-label text-sm" for="tali-opt-2">
                                    Besar dan Rapuh
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">h. Punggung</label>
                            <div class="form-group">
                                <label class="text-sm">Posisi</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan posisi">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Fleksibilitas Tulang Punggung</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan fleksibilitas tulang punggung">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Kelainan lain-lain</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan kelainan">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">i. Ekstermitas</label>
                            <div class="form-group">
                                <label class="text-sm">Atas</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan atas">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Bawah</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bawah">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">j. Abdomen</label>
                            <div class="form-group">
                                <label class="text-sm">Bentuk</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bentuk">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Palpasi</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan palpasi">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Kelainan-kelainan</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan kelainan">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">k. Genetalia</label>
                            <div class="form-group">
                                <label class="text-sm">Jenis Kelamin</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan jenis kelamin">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Kelainan-kelainan</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bawah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-sm">l. Anus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="anus-opt-1">
                                <label class="form-check-label text-sm" for="anus-opt-1">
                                    Ada Lobang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="anus-opt-2">
                                <label class="form-check-label text-sm" for="anus-opt-2">
                                    Atresia Ani
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">m. Refleks</label>
                            <div class="form-group">
                                <label class="text-sm">Sucking (Menghisap)</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Rooling (menoleh)</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Grasp (menggenggam)</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Babinski</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Moro</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Tonic Nack (Lonus Leher)</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan refleks">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">n. Antropometri</label>
                            <div class="form-group">
                                <label class="text-sm">Lingkar Kepala</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan antropometri">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Lingkar Dada</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan antropometri">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Lingkar Lengan Atas</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan antropometri">
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">o. Eliminasi</label>
                            <div class="form-group">
                                <label class="text-sm">Miksi</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="miksi-opt-1">
                                    <label class="form-check-label text-sm" for="miksi-opt-1">
                                        Sudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="miksi-opt-2">
                                    <label class="form-check-label text-sm" for="miksi-opt-2">
                                        Belum
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Meconeum</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="meconeum-opt-1">
                                    <label class="form-check-label text-sm" for="meconeum-opt-1">
                                        Sudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="meconeum-opt-2">
                                    <label class="form-check-label text-sm" for="meconeum-opt-2">
                                        Belum
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">3. PEMERIKSAAN LABORATORIUM</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Hb</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan Hb">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Golongan Darah</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan golongan darah">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Hb</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan Hb">
                                </div>
                                <div class="form-group">
                                    <label class="text-sm">Ht</label>
                                    <input type="text" class="form-control form-control-sm"
                                           placeholder="Masukkan Ht">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-bold text-sm">4. PENGOBATAN</h5>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan posisi" value="Vitamin K 1 mg Intra Muskuler" disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Masukkan pengobatan">
                        </div>
                    </div>

                </div>
            </div>
            <a href="{{route('assessment.bayi.identitas')}}" onclick="document.getElementById('form-bayi-lahir').submit()" class="btn btn-primary float-right m-4">Next</a>
        </form>
    </div>
@endsection
