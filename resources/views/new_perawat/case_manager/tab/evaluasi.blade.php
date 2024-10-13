<form id="case_manager_2">
    <input type="hidden" class="form-control" name="akumulasi[reg_no]" value="{{ $reg }}">
    <input type="hidden" class="form-control" name="akumulasi[med_rec]" value="{{ $medrec }}">
    <input type="hidden" class="form-control" name="username" value="{{ auth()->user()->username }}">

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tanggal/Jam</label>
                <input type="datetime-local" class="form-control" style="width: 200px" name="akumulasi[tgl_akumulasi]" value="{{ $case_manager_akumulasi->tgl_akumulasi ?? now()->format('Y-m-d\TH:i') }}">
                <h5 class="mt-3">Catatan Implementasi Manajer Pelayanan Pasien</h5>
                <label for="">Pelaksanaan MPP(Monitoring, Fasilitas, Koordinasi, dan Komunikasi, Kolaborasi, Advokasi)</label>
                <textarea class="form-control" name="akumulasi[pelaksanaan]" rows="4">{{ $case_manager_akumulasi->pelaksanaan ?? '' }}</textarea>
                <label for="">Hasil Pelayanan</label>
                <textarea class="form-control" name="akumulasi[hasil]" rows="3">{{ $case_manager_akumulasi->hasil ?? '' }}</textarea>
                <label for="">Terminasi MPP</label>
                <input type="text" class="form-control" name="akumulasi[terminasi]" value="{{ $case_manager_akumulasi->terminasi ?? '' }}">
            </div>
        </div>
        <div class="form-group">
            <table class="w-100" style="border: 1px solid #000;">
                <tr>
                    <td colspan="3" class="text-right" style="border: 1px solid #000;">
                        <div class="form-inline justify-content-end">
                            <label for="tanggal_ttd" class="mr-2">Tanggal:</label>
                            <input type="datetime-local" class="form-control form-control-sm" id="tanggal_ttd"
                                name="akumulasi[tgl_ttd]" value="{{ $case_manager_akumulasi->tgl_ttd ?? '' }}">
                        </div>
                    </td>
                </tr>
                <tr class="text-center">
                    <td style="border: 1px solid #000;">
                        <p>Perawat</p>
                        <div class="signature-pad mx-auto"
                            style="border: 1px solid #000; width: 260px; height: 160px;">
                            <canvas id="signature-pad-perawat2" width="260" height="160"></canvas>
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                            data-pad="perawat2">Hapus</button>
                        <input type="hidden" name="akumulasi[ttd_perawat]" id="ttd_perawat2" value="{{ $case_manager_akumulasi->ttd_perawat ?? auth()->user()->signature }}">
                    </td>
                    <td style="border: 1px solid #000;">
                        <p>Pasien</p>
                        <div class="signature-pad mx-auto"
                            style="border: 1px solid #000; width: 260px; height: 160px;">
                            <canvas id="signature-pad-pasien2" width="260" height="160"></canvas>
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                            data-pad="pasien2">Hapus</button>
                        <input type="hidden" name="akumulasi[ttd_pasien]" id="ttd_pasien2" value="{{ $case_manager_akumulasi->ttd_pasien ?? '' }}">
                    </td>
                    <td style="border: 1px solid #000;">
                        <p>Saksi/Wali</p>
                        <div class="signature-pad mx-auto"
                            style="border: 1px solid #000; width: 260px; height: 160px;">
                            <canvas id="signature-pad-saksi2" width="260" height="160"></canvas>
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                            data-pad="saksi2">Hapus</button>
                        <input type="hidden" name="akumulasi[ttd_saksi]" id="ttd_saksi2" value="{{ $case_manager_akumulasi->ttd_saksi ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="akumulasi[perawat_name]" id="nama_perawat" value="{{ $case_manager_akumulasi->perawat_name ?? Auth::user()->name }}" placeholder="Nama Perawat">
                    </td>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="akumulasi[pasien_name]" id="nama_pasien" value="{{ $case_manager_akumulasi->pasien_name ?? $datamypatient->PatientName ?? '' }}" placeholder="Nama Pasien">
                    </td>
                    <td style="border: 1px solid #000;">
                        <input type="text" class="form-control mx-auto" style="width: 250px;"
                            name="akumulasi[saksi_name]" id="nama_saksi" value="{{ $case_manager_akumulasi->saksi_name ?? '' }}" placeholder="Nama Saksi/Wali">
                    </td>
                </tr>
            </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="storeCaseManagerAkumulasi()">Simpan</button>
            </div>
        </div>
    </div>
</form>