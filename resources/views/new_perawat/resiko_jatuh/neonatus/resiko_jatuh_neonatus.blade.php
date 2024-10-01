<div class="container">
    <div class="card card-primary">
        <h3 class="card-title mt-3 ml-3">PENGKAJIAN RESIKO JATUH NEONATUS</h3>
        <p class="ml-3">*Semua Neonatus dikategorikan beresiko jatuh</p>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info mr-5" data-toggle="modal"
                data-target="#resikoJatuhModalNeonatus">
                History
            </button>
        </div>

        <form id="entry-resiko-jatuh-neonatus">
            @csrf
            <div id="body-form" class="card-body">
                <div class="card-header">
                    <h3 class="text-black">INTERVENSI PENCEGAHAN PASIEN JATUH</h3>
                </div>
                <table class="table1 w-100">
                    <!-- Risiko Rendah -->
                    <tr>
                        <td rowspan="6">
                            <h4>INTERVENSI TIDAK BERESIKO</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Orientasi ruangan pada orangtua atau keluarga" id="intervensi1">
                            <label for="intervensi1">Orientasi ruangan pada orangtua/keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Dekatkan box bayi dengan ibu" id="intervensi2">
                            <label for="intervensi2">Dekatkan box bayi dengan ibu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Pastikan selalu ada pendamping" id="intervensi3">
                            <label for="intervensi3">Pastikan selalu ada pendamping</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Pastikan lantai dan alas kaki tidak licin" id="intervensi4">
                            <label for="intervensi4">Pastikan lantai dan alas kaki tidak licin</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Kontrol rutin oleh perawat atau bidan Bila dirawat dalam incubator, pastikan semua jendela terkunci"
                                id="intervensi5">
                            <label for="intervensi5">Kontrol rutin oleh perawat/bidan Bila dirawat dalam incubator,
                                pastikan semua jendela terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="internvensi_tidak_beresiko_neonatus[]"
                                value="Edukasi orangtua atau keluarga" id="intervensi6">
                            <label for="intervensi6">Edukasi orangtua/keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="6">EDUKASI</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="edukasi[]" value="Tempatkan bayi pada tempat yang aman"
                                id="edukasi1">
                            <label for="edukasi1">Tempatkan bayi pada tempat yang aman</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="edukasi[]" value="Teknik menggendong bayi" id="edukasi2">
                            <label for="edukasi2">Teknik menggendong bayi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="edukasi[]" value="cara membungkus bayi" id="edukasi3">
                            <label for="edukasi3">cara membungkus bayi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="edukasi[]"
                                value="segera istirahat apabila merasa lelah dan tempatkan bayi pada boxnya"
                                id="edukasi4">
                            <label for="edukasi4">segera istirahat apabila merasa lelah dan tempatkan bayi pada
                                boxnya</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="edukasi[]"
                                value="Libatkan keluarga untuk mendampingi atau segera panggil perawat atau bidan jika membutuhkan"
                                id="edukasi5">
                            <label for="edukasi5">Libatkan keluarga untuk mendampingi atau segera panggil perawat/ bidan
                                jika membutuhkan</label>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4">EVALUASI</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="evaluasi[]" value="Memahami dan mampu menjelaskan kembali"
                                id="evaluasi1">
                            <label for="evaluasi1">Memahami dan mampu menjelaskan kembali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="evaluasi[]" value="Mampu mendemontrasikan" id="evaluasi2">
                            <label for="evaluasi2">Mampu mendemontrasikan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="evaluasi[]" value="Perlu edukasi ulang" id="evaluasi3">
                            <label for="evaluasi3">Perlu edukasi ulang</label>
                        </td>
                    </tr>
                </table>
                <table class="table1 w-100">
                    <tr>
                        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <div style="margin-bottom: 10px; font-weight: bold;">Keluarga</div>
                                <input type="datetime-local" name="tgl_ttd_keluarga" class="form-control mb-2"
                                    style="width: 180px;">
                                <div id="resiko_jatuh_neonatus_ttd_signature_pad_keluarga"
                                    style="display: inline-block;">
                                    <div
                                        style="border: solid 1px black; width: 260px; height: 160px; position: relative;">
                                        <canvas id="resiko_jatuh_neonatus_ttd_canvas_keluarga" width="260px"
                                            height="160px">Your browser does not support the HTML canvas tag.</canvas>
                                    </div>
                                    <div style="margin: 10px; text-align: center;">
                                        <input type="hidden" id="resiko_jatuh_neonatus_ttd_signature_keluarga"
                                            name="ttd_keluarga" value="">
                                        <button type="button" id="resiko_jatuh_neonatus_ttd_clear_btn_keluarga"
                                            class="btn btn-danger" data-action="clear">
                                            <span class="glyphicon glyphicon-remove"></span> Hapus
                                        </button>
                                    </div>
                                </div>
                                @if ($registrasi_pj)
                                    <select name="nama_keluarga" class="form-control mt-2" style="width: 180px;">
                                        <option value="">Pilih Keluarga</option>
                                        @foreach($registrasi_pj as $pj)
                                            <option value="{{ $pj->reg_pjawab_nama }}">{{ $pj->reg_pjawab_nama }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="text" name="nama_keluarga" class="form-control mt-2" placeholder="Nama Keluarga" style="width: 180px;">
                                @endif
                            </div>
                        </td>

                        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <div style="margin-bottom: 10px; font-weight: bold;">Petugas</div>
                                <input type="datetime-local" name="tgl_ttd_petugas" class="form-control mb-2"
                                    style="width: 180px;">
                                <div id="resiko_jatuh_neonatus_ttd_signature_pad_petugas"
                                    style="display: inline-block; margin: 0 auto;">
                                    <div
                                        style="border: solid 1px black; width: 260px; height: 160px; position: relative;">
                                        <canvas id="resiko_jatuh_neonatus_ttd_canvas_petugas" width="260px"
                                            height="160px">Your browser does not support the HTML canvas tag.</canvas>
                                    </div>
                                    <div style="margin: 10px;">
                                        <input type="hidden" id="resiko_jatuh_neonatus_ttd_signature_petugas"
                                            name="ttd_petugas"
                                            value="{{ auth()->user()->signature }}">
                                        <button type="button" id="resiko_jatuh_neonatus_ttd_clear_btn_petugas"
                                            class="btn btn-danger" data-action="clear">
                                            <span class="glyphicon glyphicon-remove"></span> Hapus
                                        </button>
                                    </div>
                                </div>
                                <input type="text" name="nama_petugas" class="form-control mt-2" placeholder="Nama Petugas" style="width: 180px;">
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="addresikojatuhNeonatus()">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('new_perawat.resiko_jatuh.neonatus.history_resiko_jatuh_neonatus')
@include('new_perawat.resiko_jatuh.neonatus.detail_history_resiko_jatuh_neonatus')
