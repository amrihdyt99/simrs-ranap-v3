<div class="modal fade" id="resikoJatuhDetailNeonatus" tabindex="-1" role="dialog"
    aria-labelledby="resikoJatuhDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resikoJatuhDetailModalLabelNeonatus">Detail Risiko Jatuh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3><b>Penilaian Risiko Jatuh Pasien Neonatus</b></h3>

                <!-- Table 1: Risiko Rendah, Edukasi, Evaluasi -->
                <table class="table1 w-100" id="resiko_jatuh_neonatus_table1">
                    <!-- Risiko Rendah -->
                    <tr>
                        <td rowspan="6">
                            <h4>INTERVENSI TIDAK BERESIKO</h4>
                        </td>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Orientasi ruangan pada orangtua atau keluarga" id="intervensi1">
                            <label for="intervensi1">Orientasi ruangan pada orangtua/keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Dekatkan box bayi dengan ibu" id="intervensi2">
                            <label for="intervensi2">Dekatkan box bayi dengan ibu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Pastikan selalu ada pendamping" id="intervensi3">
                            <label for="intervensi3">Pastikan selalu ada pendamping</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Pastikan lantai dan alas kaki tidak licin" id="intervensi4">
                            <label for="intervensi4">Pastikan lantai dan alas kaki tidak licin</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Kontrol rutin oleh perawat atau bidan Bila dirawat dalam incubator, pastikan semua jendela terkunci"
                                id="intervensi5">
                            <label for="intervensi5">Kontrol rutin oleh perawat/bidan Bila dirawat dalam incubator,
                                pastikan semua jendela terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="internvensi_tidak_beresiko_neonatus[]"
                                value="Edukasi orangtua atau keluarga" id="intervensi6">
                            <label for="intervensi6">Edukasi orangtua/keluarga</label>
                        </td>
                    </tr>

                    <!-- Edukasi -->
                    <tr>
                        <td rowspan="6">EDUKASI</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="edukasi[]" value="Tempatkan bayi pada tempat yang aman" id="edukasi1">
                            <label for="edukasi1">Tempatkan bayi pada tempat yang aman</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="edukasi[]" value="Teknik menggendong bayi" id="edukasi2">
                            <label for="edukasi2">Teknik menggendong bayi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="edukasi[]" value="cara membungkus bayi" id="edukasi3">
                            <label for="edukasi3">Cara membungkus bayi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="edukasi[]"
                                value="Segera istirahat apabila merasa lelah dan tempatkan bayi pada boxnya" id="edukasi4">
                            <label for="edukasi4">Segera istirahat apabila merasa lelah dan tempatkan bayi pada boxnya</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="edukasi[]"
                                value="Libatkan keluarga untuk mendampingi atau segera panggil perawat atau bidan jika membutuhkan"
                                id="edukasi5">
                            <label for="edukasi5">Libatkan keluarga untuk mendampingi atau segera panggil perawat/bidan
                                jika membutuhkan</label>
                        </td>
                    </tr>

                    <!-- Evaluasi -->
                    <tr>
                        <td rowspan="4">EVALUASI</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="evaluasi[]" value="Memahami dan mampu menjelaskan kembali" id="evaluasi1">
                            <label for="evaluasi1">Memahami dan mampu menjelaskan kembali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="evaluasi[]" value="Mampu mendemontrasikan" id="evaluasi2">
                            <label for="evaluasi2">Mampu mendemontrasikan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="evaluasi[]" value="Perlu edukasi ulang" id="evaluasi3">
                            <label for="evaluasi3">Perlu edukasi ulang</label>
                        </td>
                    </tr>
                </table>

                <!-- Table 2: Signatures -->
                <table class="table1 w-100" id="resiko_jatuh_neonatus_table2">
                    <tr>
                        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <div style="margin-bottom: 10px; font-weight: bold;">Keluarga</div>
                                <input type="datetime-local" disabled name="tgl_ttd_keluarga" id="tgl_ttd_keluarga_neonatus_detail" class="form-control mb-2"
                                    style="width: 180px;">
                                <div id="resiko_jatuh_neonatus_ttd_signature_pad_keluarga" style="display: inline-block;">
                                    <div style="border: solid 1px black; width: 260px; height: 160px; position: relative;">
                                        <canvas id="resiko_jatuh_neonatus_ttd_canvas_keluarga_detail" width="260px"
                                            height="160px">Your browser does not support the HTML canvas tag.</canvas>
                                    </div>
                                    <div style="margin: 10px; text-align: center;">
                                        <input type="hidden" id="resiko_jatuh_neonatus_ttd_signature_keluarga"
                                            name="ttd_keluarga" value="">
                                    </div>
                                </div>
                                <input type="text"  id="nama_keluarga_detail" class="form-control mt-2" disabled placeholder="Nama Keluarga" style="width: 180px;">
                            </div>
                        </td>

                        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <div style="margin-bottom: 10px; font-weight: bold;">Petugas</div>
                                <input type="datetime-local" disabled name="tgl_ttd_petugas" id="tgl_ttd_petugas_neonatus_detail" class="form-control mb-2"
                                    style="width: 180px;">
                                <div id="resiko_jatuh_neonatus_ttd_signature_pad_petugas" style="display: inline-block; margin: 0 auto;">
                                    <div style="border: solid 1px black; width: 260px; height: 160px; position: relative;">
                                        <canvas id="resiko_jatuh_neonatus_ttd_canvas_petugas_detail" width="260px"
                                            height="160px">Your browser does not support the HTML canvas tag.</canvas>
                                    </div>
                                    <div style="margin: 10px;">
                                        <input type="hidden" id="resiko_jatuh_neonatus_ttd_signature_petugas"
                                            name="resiko_jatuh_neonatus_ttd_ttd_petugasdt"
                                            value="{{ auth()->user()->signature }}">
                                    </div>
                                </div>
                                <input type="text"  id="nama_petugas_detail" class="form-control mt-2" disabled placeholder="Nama Petugas" style="width: 180px;">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
