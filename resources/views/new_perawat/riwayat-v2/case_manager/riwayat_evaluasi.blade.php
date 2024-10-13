<form id="case_manager_2">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tanggal/Jam</label>
                <input type="datetime-local" class="form-control" style="width: 200px" name="tgl_akumulasi" id="tgl_evaluasi" disabled>
                <h5 class="mt-3">Catatan Implementasi Manajer Pelayanan Pasien</h5>
                <label for="">Pelaksanaan MPP(Monitoring, Fasilitas, Koordinasi, dan Komunikasi, Kolaborasi, Advokasi)</label>
                <textarea class="form-control" name="pelaksanaan" rows="4" disabled></textarea>
                <label for="">Hasil Pelayanan</label>
                <textarea class="form-control" name="hasil" rows="3" disabled></textarea>
                <label for="">Terminasi MPP</label>
                <input type="text" class="form-control" name="terminasi" disabled>
            </div>
        </div>
        <div class="form-group">
            <table class="w-100" style="border: 1px solid #000;">
                <tr>
                    <td colspan="3" class="text-right" style="border: 1px solid #000;">
                        <div class="form-inline justify-content-end">
                            <label for="tanggal_ttd" class="mr-2">Tanggal:</label>
                            <input type="datetime-local" class="form-control form-control-sm" id="tanggal_ttd_eval"
                                name="tgl_ttd" disabled>
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="border: 1px solid #000;">
                        <p>Perawat</p>
                        <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                            <img id="riwayat_eval_ttd_perawat" width="260" height="160" src="" alt="Tanda Tangan Perawat">
                        </div>
                        <input type="hidden" name="ttd_perawat" id="ttd_perawat" value="">
                    </td>
                    <td style="border: 1px solid #000;">
                        <p>Pasien</p>
                        <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                            <img id="riwayat_eval_ttd_pasien" width="260" height="160" src="" alt="Tanda Tangan Pasien">
                        </div>
                        <input type="hidden" name="ttd_pasien" id="ttd_pasien" value="">
                    </td>
                    <td style="border: 1px solid #000;">
                        <p>Saksi/Wali</p>
                        <div class="signature-pad mx-auto" style="border: 1px solid #000; width: 260px; height: 160px;">
                            <img id="riwayat_eval_ttd_saksi" width="260" height="160" src="" alt="Tanda Tangan Saksi/Wali">
                        </div>
                        <input type="hidden" name="ttd_saksi" id="ttd_saksi" value="">
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="perawat_name" id="nama_perawat_eval" placeholder="Nama Perawat" disabled>
                    </td>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="pasien_name" id="nama_pasien_eval" placeholder="Nama Pasien" disabled>
                    </td>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="saksi_name" id="nama_saksi_eval" placeholder="Nama Saksi/Wali" disabled>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>