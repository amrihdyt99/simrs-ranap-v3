@extends('register.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Form Pendaftaran</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Psikologis, Sosial, Ekonomi Dan Spiritual
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status_emosional">Status Emosional</label>
                                                <select name="status_emosional" id="status_emosional" class="form-control">
                                                    <option value="Stabil/Tenang">Stabil/Tenang</option>
                                                    <option value="Cemas/Takut">Cemas/Takut</option>
                                                    <option value="Marah">Marah</option>
                                                    <option value="Sedih">Sedih</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kebiasaan_merokok">Kebiasaan Merokok</label>
                                                <select name="kebiasaan_merokok" id="kebiasaan_merokok" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="frekuensi_merkok">Frekuensi</label>
                                                <input type="text" id="frekuensi_merkok" class="form-control" placeholder="Batang/Hari">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kebiasaan_minum_alkohol">Kebiasaan Minum Alkohol</label>
                                                <select name="kebiasaan_minum_alkohol" id="kebiasaan_minum_alkohol" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="riwayat_pernah_gangguan_jiwa">Riwayat Pernah Gangguan Jiwa</label>
                                                <select name="riwayat_pernah_gangguan_jiwa" id="riwayat_pernah_gangguan_jiwa" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="riwayat_percobaan_bunuh_diri">Riwayat Percobaan Bunuh Diri</label>
                                                <select name="riwayat_percobaan_bunuh_diri" id="riwayat_percobaan_bunuh_diri" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="skor_sad_person">Skor Sad Person</label>
                                                <input type="text" id="skor_sad_person" name="skor_sad_person" class="form-control" placeholder="Skor Sad Person">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategori" id="kategori" class="form-control">
                                                    <option value="rendah">Rendah(1-2)</option>
                                                    <option value="sedang">Sedang(3-6)</option>
                                                    <option value="Tinggi">Tinggi(7-10)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Parameter</th>
                                                    <th>Skor : Ya/Tidak</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Sex ( laki-laki )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Age ( < 19 th atau > 45 th )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Depression ( pasien MRS dengan depresi atau penurunan konsentrasi, gangguan tidur, gangguan pola makan, dan gangguan lipido )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Previous Suicide ( riwayat bunuh diri atau perawat psikiatri )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5.</td>
                                                    <td>Excessive Alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6.</td>
                                                    <td>Excessive Alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7.</td>
                                                    <td>Separated ( bercerai / janda )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8.</td>
                                                    <td>Organized plan ( menunjukan rencana bunuh diri yang terorganisir / niat serius )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9.</td>
                                                    <td>No Social Support ( tidak ada pendukung )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10.</td>
                                                    <td>Sickness ( menderita penyakit kronis )</td>
                                                    <td>
                                                        <input type="checkbox" value="1" name="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="riwayat_trauma_psikis">Riwayat Trauma Psikis</label>
                                                <select name="riwayat_trauma_psikis" id="riwayat_trauma_psikis" class="form-control">
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                    <option value="Aniaya fisik / psikologis / KDRT">Aniaya fisik / psikologis / KDRT</option>
                                                    <option value="Aniaya Seksual/Perkosaan">Aniaya Seksual/Perkosaan</option>
                                                    <option value="Tindakan Kriminal">Tindakan Kriminal</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="konseling_spiritual_agama">Pasien Membutuhkan Konseling Spiritual/Agama</label>
                                                <select name="konseling_spiritual_agama" id="konseling_spiritual_agama" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hambatan_sosial">Hambatan Sosial, Ekonomi</label>
                                                <select name="hambatan_sosial" id="hambatan_sosial" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bantuan_ibadah">Pasien Membutuhkan Bantuan dalam menjalankan ibadah dan menyetujuinya</label>
                                                <select name="bantuan_ibadah" id="bantuan_ibadah" class="form-control">
                                                    <option value="Tidak">Tidak</option>
                                                    <option value="Ya">Ya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kebutuhan_spiritual">Kebutuhan Spiritual Pasien Dalam Perawatan Di Rumah Sakit</label>
                                                <input type="text" id="kebutuhan_spiritual" name="kebutuhan_spiritual" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
