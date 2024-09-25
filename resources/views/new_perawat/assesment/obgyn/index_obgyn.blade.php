<form id="obgyn_form">
    <h2 class="text-black">Pengkajian Awal Pasien Obstetri Ginekologi</h2>
    <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
    <hr>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#obgyn_pemeriksaan_fisik"
                role="tab" aria-controls="assesment_1" aria-selected="true">
                Pemeriksaan Fisik</a>
        </li>
        {{-- <li class="nav-item">
        <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#daftar" role="tab"
          aria-controls="assesment_2" aria-selected="false">
          Skrinning Nyeri dan Kebutuhan Eliminasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#skrinning" role="tab"
          aria-controls="assesment_3" aria-selected="false">
          Rekonsiliasi Obat</a>
      </li> --}}
    </ul>

    <div class="text-black" style="font-size: 14px">
        <div class="tab-content" id="tab-assesment">
            <div id="obgyn_pemeriksaan_fisik" class="tab-pane fade show active" role="tabpanel"
                aria-labelledby="assesment_1_tab">
                @include('new_perawat.assesment.obgyn.obgyn_tab.obgyn_pemeriksaan_fisik')
            </div>
            {{-- <div id="daftar" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
          @include('new_perawat.assesment.obgyn_tab.skrinning_nyeri')
        </div>
        <div id="skrinning" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_3_tab">
          @include('new_perawat.assesment.obgyn_tab.rekonsiliasi_obat')
        </div> --}}
        </div>
    </div>
</form>

<div class="modal" id="riwayat-kehamilan-modal" tabindex="-1" role="dialog">
    <form id="formRiwayatKehamilan">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Riwayat Kehamilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label-admisi">Tgl/Tahun Partus</label>
                        <input type="date" class="form-control" name="tgl_tahun_partus" id="tgl_tahun_partus"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Tempat Partus</label>
                        <input type="text" class="form-control" name="tempat_partus" id="tempat_partus" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Umur Hamil</label>
                        <input type="number" class="form-control" name="umur_hamil" id="umur_hamil" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Jenis Persalinan</label>
                        <input type="text" class="form-control" name="jenis_persalinan" id="jenis_persalinan"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Penolong Persalinan</label>
                        <input type="text" class="form-control" name="penolong_persalinan" id="penolong_persalinan"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Penyulit</label>
                        <input type="text" class="form-control" name="penyulit" id="penyulit" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">BB Anak</label>
                        <input type="number" class="form-control" name="bb_anak" id="bb_anak" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Keadaan Sekarang</label>
                        <input type="text" class="form-control" name="keadaan_sekarang" id="keadaan_sekarang"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="newRekon"
                        onclick="submitFormRiwayatKehamilan()">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

