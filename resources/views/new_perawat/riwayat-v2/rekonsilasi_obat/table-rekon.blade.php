<input id="rekon_obat_data" type="hidden">
<h3 class="card-title">Rekonsiliasi Obat (diisi oleh dokter)</h3>
<p>Diinformasi kepada farmasi saat pembuatan resep obat pertama</p>
<div class="container">
    <div class="card card-primary">
        <div class="card-header bg-secondary">
            <table class="w-100">
                <tbody>
                    <tr>
                        <td>
                            <label class="card-title">Penggunaan obat sebelum admisi : </label>
                        </td>
                        <td>
                            <input type="radio" id="penggunaan_sebelum_admisi_tidak" value="0"
                                name="penggunaan_sebelum_admisi" disabled>
                            <label for="penggunaan_sebelum_admisi_tidak">Tidak menggunakan obat sebelum admisi</label>
                        </td>
                        <td>
                            <input type="radio" id="penggunaan_sebelum_admisi_ya" value="1"
                                name="penggunaan_sebelum_admisi" disabled>
                            <label for="penggunaan_sebelum_admisi_ya">Ya, dengan rincian sebagai berikut</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-header bg-secondary text-center">
            <h3 class="card-title">REKONSILIASI OBAT SAAT ADMISI</h3>
            <p>Daftar obat dibawah ini meliputi obat Resep dan Non Resep <br> yang digunakan sebulan terakhir dan masih
                dipakai saat masuk rumah sakit</p>
            <p>Instruksi obat baru dituliskan pada instruksi farmakologis</p>
            <br>
            <p>Review kembali saat pasien pulang</p>
        </div>
        <div class="card-body">
            <div class="col-lg-12 mb-3">
                <div class="table-responsive">
                    <table id="riwayat-rekonsiliasi-obat" class="table table-lg table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Dosis</th>
                                <th>Frekuensi</th>
                                <th>Cara Pembelian</th>
                                <th>Waktu Pemberian Terakhir</th>
                                <th>Tindak Lanjut</th>
                                <th>Perubahan Aturan Pakai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan diisi melalui Ajax -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <table class="w-100 mt-5" border="1">
            <tbody>
                <tr>
                    <td>
                        <div class="form-group row ">
                            <label for="time_ttd_dpjp" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                            <div class="input-group col-sm-8">
                                <input id="time_ttd_dpjp" type="datetime-local" class="form-control text-sm"
                                    name="time_ttd_dpjp" readonly>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row ">
                            <label for="time_ttd_farmasi" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                            <div class="input-group col-sm-8">
                                <input id="time_ttd_farmasi" type="datetime-local" class="form-control text-sm"
                                    name="time_ttd_farmasi" readonly>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group row ">
                            <label for="time_ttd_perawat" class="col-sm-4 text-sm">Tanggal / Pukul</label>
                            <div class="input-group col-sm-8">
                                <input id="time_ttd_perawat" type="datetime-local" class="form-control text-sm"
                                    name="time_ttd_perawat" readonly>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="container text-center">
                            <p>DPJP yang melakukan pengkajian</p>
                        </div>
                    </td>
                    <td>
                        <div class="container text-center">
                            <p>Farmasi yang melakukan pengkajian</p>
                        </div>
                    </td>
                    <td>
                        <div class="container text-center">
                            <p>Perawat yang melakukan pengkajian</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="container">
                            <div class="row justify-content-center">
                                <img id="ttd_dpjp" src="" width="250" height="150" />
                            </div>
                        </div>
                        <input type="hidden" id="dokter_username" name="dokter_username" readonly>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row justify-content-center">
                                <img id="ttd_farmasi" src="" width="250" height="150" />
                            </div>
                        </div>
                        <input type="hidden" id="farmasi_username" name="farmasi_username" readonly>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row justify-content-center">
                                <img id="ttd_perawat" src="" width="250" height="150" />
                            </div>
                        </div>
                        <input type="hidden" id="perawat_username" name="perawat_username" readonly>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

