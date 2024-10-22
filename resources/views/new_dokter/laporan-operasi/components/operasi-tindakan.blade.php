<div>
    <h3 class="font-weight-bold">Operasi/Tindakan</h3>
    <br/>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="tanggal-tindakan-operasi">Tanggal</label>
                <input type="date" name="tanggal_tindakan_operasi" id="tanggal-tindakan-opeasi" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="jam-mulai-tindakan-operasi">Jam Mulai Operasi/Tindakan</label>
                <input type="time" name="jam_mulai_operasi_tindakan" id="jam-mulai-operasi-tindakan" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="jam-selesai-tindakan-operasi">Jam Seleasi Operasi/Tindakan</label>
                <input type="time" name="jam_selesai_operasi_tindakan" id="jam-selesai-operasi-tindakan" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="dokter_bedah">Dokter Bedah</label>
                <input type="text" class="form-control" name="dokter_bedah">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="asisten_1">Asisten I</label>
                <input type="text" class="form-control" name="asisten_1">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="asisten_2">Asisten II</label>
                <input type="text" class="form-control" name="asisten_2">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="dokter_anestesi">Dokter Anestesi</label>
                <input type="text" class="form-control" name="dokter_anestesi">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="perawat_instrumen">Perawat Instrumen</label>
                <input type="text" class="form-control" name="perawat_instrumen">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="tipe_operas">Tipe Operasi</label>
                <select name="tipe_operasi" id="tipe_operasi" class="form-control">
                    <option value="">Tipe Operasi</option>
                    <option value="Darurat">Darurat</option>
                    <option value="Terencana">Terencana</option>
                </select>
            </div>
        </div>
    </div>

    <hr>
    
    <div class="form-group">
        <label for="diagnosa_pasca_bedah">Diagnosa Pasca Bedah</label>
        <textarea class="form-control" id="diagnosa_pasca_bedah" rows="4" name="diagnosa_pasca_bedah"></textarea>
    </div>

    <div class="form-group">
        <label for="operasi_tindakan_bedah">Operasi Tindakan</label>
        <textarea class="form-control" id="operasi_tindakan_bedah" rows="4" name="operasi_tindakan_bedah"></textarea>
    </div>

    <div class="form-group">
        <label for="tipe_anestesi">Tipe Anestesi</label>
        <select name="tipe_anestesi" id="tipe_anestesi" class="form-control">
            <option value="">Tipe Anestesi</option>
            <option value="Spinal">Spinal</option>
            <option value="Epidural">Epidural</option>
            <option value="GA">GA</option>
            <option value="Peripheral">Peripheral</option>
            <option value="Local">Local</option>
        </select>
    </div>
    <hr/>
    <div class="form-group">
        <label for="pengirim-spesimen-klinik-patologi">Pengirim spesimen ke klilnik Patologi</label>
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <select name="pengirim_spesimen_klinik_patologi" id="pengirim-spesimen-klinik-patologi" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Ya</option>
                    <option value="2">Tidak</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="asal-spesimen">Asal Spesimen</label>
        <input type="text" name="asal-spesimen" class="form-control">
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group">
                <label for="perkiraan_jumlah_pendarahan">Perkiraan Jumlah Pendarahan</label>
               <input type="number" name="jumlah_pendarahan" class="form-control" placeholder="ml">
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <label for="">Transfusi</label>
            <div class="form-group row">
                <label for="" class="col-sm-12 col-lg-2">WB</label>
                <input type="number" name="transfusi_wb" class="form-control col-sm-12 col-lg-10" placeholder="ml">
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-12 col-lg-2">FFP</label>
                <input type="number" name="transfusi_ffp" class="form-control col-sm-12 col-lg-10" placeholder="ml">
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-12 col-lg-2">PRC</label>
                <input type="number" name="transfusi_prc" class="form-control col-sm-12 col-lg-10" placeholder="ml">
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-12 col-lg-2">Cyro</label>
                <input type="number" name="transfusi_cyro" class="form-control col-sm-12 col-lg-10" placeholder="ml">
            </div>
        </div>
    </div>

    <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
        <button class="btn btn-primary" onclick="handleSave()">
            Simpan
        </button>
    </div>
</div>

@push('myscripts')
<script></script>
@endpush