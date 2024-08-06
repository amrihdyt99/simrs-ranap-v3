<form id="entry-resiko-jatuh">
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">LEMBAR MONITORING PENCEGAHAN PASIEN JATUH</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Riwayat Jatuh</td>
                        <td><input class="" type="radio" value="Ya" id="riwayat_jatuh" name="riwayat_jatuh">
                            <label for="">Ya</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="riwayat_jatuh" name="riwayat_jatuh">
                            <label for="">Tidak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Diagnosa Sekunder</td>
                        <td><input class="" type="radio" value="Ya" id="diagnosa_sekunder"
                                   name="diagnosa_sekunder">
                            <label for="">Ya</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="diagnosa_sekunder"
                                   name="diagnosa_sekunder">
                            <label for="">Tidak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Bantuan Ambulasi</td>
                        <td><input class="" type="radio" value="Ya" id="bantuan_ambulasi"
                                   name="bantuan_ambulasi">
                            <label for="">Tidak ada/ bed rest/ bantuan perawat</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="bantuan_ambulasi"
                                   name="bantuan_ambulasi">
                            <label for=""> Kruk/ tongkat/ alat bantu berjalan</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="bantuan_ambulasi"
                                   name="bantuan_ambulasi">
                            <label for=""> Meja/ kursi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Terpasang Infus</td>
                        <td><input class="" type="radio" value="Ya" id="terpasang_infus"
                                   name="terpasang_infus">
                            <label for="">Ya</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="terpasang_infus"
                                   name="terpasang_infus">
                            <label for="">Tidak</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Cara/ gaya berjalan</td>
                        <td><input class="" type="radio" value="Ya" id="cara_berjalan" name="cara_berjalan">
                            <label for="">Normal/ bed rest/ kursi roda</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="cara_berjalan" name="cara_berjalan">
                            <label for="">Lemah</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="cara_berjalan" name="cara_berjalan">
                            <label for="">Terganggu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Mental</td>
                        <td><input class="" type="radio" value="Ya" id="status_mental" name="status_mental">
                            <label for="">Berorientasi pada kemampuannya</label>
                        </td>
                        <td><input class="" type="radio" value="Ya" id="status_mental" name="status_mental">
                            <label for=""> Lupa akan keterbatasannya</label>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="addresikojatuh()">Simpan</button>
            </div>
        </div>
    </div>
</form>
