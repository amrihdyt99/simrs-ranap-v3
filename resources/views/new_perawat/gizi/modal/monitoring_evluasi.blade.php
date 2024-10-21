<!-- Modal Monitoring dan Evaluasi Gizi -->
<div class="modal fade" id="modalMonitoringEvaluasiGizi" tabindex="-1" role="dialog" aria-labelledby="modalMonitoringEvaluasiGiziLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMonitoringEvaluasiGiziLabel">Tambah Monitoring dan Evaluasi Gizi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formMonitoringEvaluasiGizi">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="monitoring_evaluasi">Monitoring dan Evaluasi Gizi</label>
                        <textarea class="form-control" id="monitoring_evaluasi" name="monitoring_evaluasi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="terapi_diet">Terapi Diet</label>
                        <textarea class="form-control" id="terapi_diet" name="terapi_diet" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_paraf_dietisien">Nama dan Paraf Dietisien</label>
                        <input type="text" class="form-control" id="nama_paraf_dietisien" name="nama_dietisien" value="{{auth()->user()->name}}" readonly required>
                        <img src="{{ auth()->user()->signature ?? '' }}" alt="Paraf Dietisien" id="paraf_dietisien" style="width: 100px; height: 100px;">
                        <input type="hidden" class="form-control" id="nama_paraf_dietisien" name="paraf_dietisien" value="{{ auth()->user()->signature ?? '' }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="submitFormMonitoringAsuhanGizi()">Simpan</button>
            </div>
        </div>
    </div>
</div>
