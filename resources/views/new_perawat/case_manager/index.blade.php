<h2 class="mb-4">CASE MANAGER</h2>

<form id="case_manager_form">
    <input type="hidden" class="form-control" name="case[reg_no]" value="{{ $reg }}">
    <input type="hidden" class="form-control" name="case[med_rec]" value="{{ $medrec }}">
    <input type="hidden" class="form-control" name="username" value="{{ auth()->user()->username }}">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">I. Identifikasi Masalah/Resiko dan Skrining Pasien</h5>
            <div class="form-group">
                @php
                    $identifikasi_items = [
                        'Usia neonatus (0-28 hari)/lansia (60 tahun keatas)',
                        'Fungsi kognitif rendah/riwayat gangguan mental',
                        'Status fungsional/kemandirian hidup rendah',
                        'Isu sosial seperti terlantar/narapidana/NAPZA/upaya bunuh diri/tinggal sendiri/kurang support sistem',
                        'Potensi kendala biaya/perkiraan biaya tinggi/LOS lama/over utilization pelayanan terhadap dasar panduan',
                        'Penyakit terminal/ratalaksana oleh >1 DPJP',
                        'Riwayat readmisi/medical shopping',
                        'Potensi penggunaan alat medis menetap jangka lama/Discharge planning',
                        'Potensi penundaan pelayanan/tingkat asuhan tidak sesuai panduan',
                        'Potensi komplain tinggi/ketidakpatuhan tinggi',
                    ];
                    $selected_identifikasi = explode(', ', $case_manager->identifikasi_masalah ?? '');
                @endphp

                @foreach ($identifikasi_items as $index => $item)
                    <div class="custom-control custom-checkbox mb-3 ml-3">
                        <input type="checkbox" class="custom-control-input" id="identifikasi_{{ $index + 1 }}"
                            name="case[identifikasi_masalah][]" value="{{ $index + 1 }}"
                            {{ in_array($index + 1, $selected_identifikasi) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="identifikasi_{{ $index + 1 }}">
                            {{ $item }}
                        </label>
                    </div>
                @endforeach
            </div>

            <h5 class="card-title mb-3">II. Assesment untuk management pelayanan pasien</h5>
            <div class="form-group">
                <label class="ml-3" for="keadaan_fungsional">1. Keadaan fungsional, kemandirian, kognitif</label>
                <input type="text" class="form-control ml-4" id="keadaan_fungsional" name="case[keadaan_fungsional]" value="{{ $case_manager->keadaan_fungsional ?? '' }}">
                <label class="ml-3" for="riwayat_kesehatan">2. Riwayat Kesehatan</label>
                <input type="text" class="form-control ml-4" id="riwayat_kesehatan" name="case[riwayat_kesehatan]" value="{{ $case_manager->riwayat_kesehatan ?? '' }}">
                <label class="ml-3" for="perilaku_psiko_sosial">3. Perilaku psiko sosial kultural</label>
                <input type="text" class="form-control ml-4" id="perilaku_psiko_sosial"
                    name="case[perilaku_psiko_sosial]" value="{{ $case_manager->perilaku_psiko_sosial ?? '' }}">
                <label class="ml-3" for="masalah_isu_sosial">4. Masalah isu sosial</label>
                <input type="text" class="form-control ml-4" id="masalah_isu_sosial" name="case[masalah_isu_sosial]" value="{{ $case_manager->masalah_isu_sosial ?? '' }}">
                <label class="ml-3" for="kendala_pembiayaan">5. Kendala pembiayaan</label>
                <input type="text" class="form-control ml-4" id="kendala_pembiayaan" name="case[kendala_pembiayaan]" value="{{ $case_manager->kendala_pembiayaan ?? '' }}">
                <label class="ml-3" for="kebutuhan_discharge">6. Kebutuhan Discharge Planning</label>
                <input type="text" class="form-control ml-4" id="kebutuhan_discharge"
                    name="case[kebutuhan_discharge]" value="{{ $case_manager->kebutuhan_discharge ?? '' }}">
                <label class="ml-3" for="potensi_penundaan">7. Potensi penundaan pelayanan/tingkat asuhan tidak sesuai
                    panduan</label>
                <input type="text" class="form-control ml-4" id="potensi_penundaan" name="case[potensi_penundaan]" value="{{ $case_manager->potensi_penundaan ?? '' }}">
                <label class="ml-3" for="potensi_komplain">8. Potensi komplain tinggi/ketidakpatuhan tinggi</label>
                <input type="text" class="form-control ml-4" id="potensi_komplain" name="case[potensi_komplain]" value="{{ $case_manager->potensi_komplain ?? '' }}">
            </div>

            <h5 class="card-title mb-3">III. Perencanaan managemen pelayanan pasien</h5>
            <div class="form-group">
                <input type="text" class="form-control ml-4" id="" name="case[perencanaan_manegemen]" value="{{ $case_manager->perencanaan_manegemen ?? '' }}">
            </div>
            <h5 class="card-title mb-3">IV. Target hasil</h5>
            <div class="form-group">
                <input type="text" class="form-control ml-4" id="" name="case[target_hasil]" value="{{ $case_manager->target_hasil ?? '' }}">
            </div>

            <h5>Note :</h5>
            <label for="">> Point I Diisi dengan CheckList, apabila terdapat =5 kriteria terpenuhi, masuk ke
                pengelolaan case manager selanjutnya(Point II dan Form B) </label>


            <div class="form-group">
                <table class="w-100" style="border: 1px solid #000;">
                    <tr>
                        <td colspan="3" class="text-right" style="border: 1px solid #000;">
                            <div class="form-inline justify-content-end">
                                <label for="tanggal_ttd" class="mr-2">Tanggal:</label>
                                <input type="datetime-local" class="form-control form-control-sm" id="tanggal_ttd"
                                    name="case[tanggal_ttd]" value="{{ $case_manager->tanggal_ttd ?? '' }}">
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td style="border: 1px solid #000;">
                            <p>Perawat</p>
                            <div class="signature-pad mx-auto"
                                style="border: 1px solid #000; width: 260px; height: 160px;">
                                <canvas id="signature-pad-perawat" width="260" height="160"></canvas>
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                                data-pad="perawat">Hapus</button>
                            <input type="hidden" name="case[ttd_perawat]" id="ttd_perawat" value="{{ $case_manager->ttd_perawat ?? auth()->user()->signature }}">
                        </td>
                        <td style="border: 1px solid #000;">
                            <p>Pasien</p>
                            <div class="signature-pad mx-auto"
                                style="border: 1px solid #000; width: 260px; height: 160px;">
                                <canvas id="signature-pad-pasien" width="260" height="160"></canvas>
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                                data-pad="pasien">Hapus</button>
                            <input type="hidden" name="case[ttd_pasien]" id="ttd_pasien" value="{{ $case_manager->ttd_pasien}}">
                        </td>
                        <td style="border: 1px solid #000;">
                            <p>Saksi/Wali</p>
                            <div class="signature-pad mx-auto"
                                style="border: 1px solid #000; width: 260px; height: 160px;">
                                <canvas id="signature-pad-saksi" width="260" height="160"></canvas>
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                                data-pad="saksi">Hapus</button>
                            <input type="hidden" name="case[ttd_saksi]" id="ttd_saksi" value="{{ $case_manager->ttd_saksi}}">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;"
                                name="case[perawat_name]" id="nama_perawat" placeholder="Nama Perawat"
                                value="{{ $case_manager->perawat_name ?? Auth::user()->name }}">
                        </td>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;"
                                name="case[pasien_name]" id="nama_pasien" placeholder="Nama Pasien"
                                value="{{ $case_manager->pasien_name ?? ($datamypatient->PatientName ?? '') }}">
                        </td>
                        <td style="border: 1px solid #000;">
                            <input type="text" class="form-control mx-auto" style="width: 250px;"
                                name="case[saksi_name]" id="nama_saksi" placeholder="Nama Saksi/Wali"
                                value="{{ $case_manager->saksi_name ?? '' }}">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="storeCaseManager()">Simpan</button>
            </div>
        </div>
    </div>
</form>
