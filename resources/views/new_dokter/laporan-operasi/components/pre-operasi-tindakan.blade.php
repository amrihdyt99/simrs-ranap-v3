<div>
    <h3 class="font-weight-bold">Rencana Pre Operasi/Tindakan</h3>
    <br/>
    <div class="form-group">
        <label for="anamnesis-singkat">Anamnesis Singkat</label>
        <textarea class="form-control" id="anamnesis-singkat" rows="4" name="anamnesis_singkat"></textarea>
    </div>

    <div class="form-group">
        <label for="alergi">Alergi</label>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <select name="" id="alergi" class="form-control">
                    <option value="">Alergi</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="col-sm-12 col-lg-4">
                <input type="text" name="catatan_alergi" id="catatan_alergi" class="form-control" placeholder="Isi jika ada">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="pemeriksaan-fisik">Pemeriksaan Fisik</label>
        <textarea class="form-control" id="pemeriksaan-fisik" rows="4" name="pemeriksaan_fisik"></textarea>
    </div>

    <div class="form-group">
        <label for="diagnosa-pre-operasi">Diagnosa Pre Operasi/Tindakan</label>
        <textarea class="form-control" id="diagnosa-pre-operasi" rows="4" name="diagnosa_pre_operasi"></textarea>
    </div>

    <div class="form-group">
        <label>Operasi/Tindakan</label>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Operasi</th>
                    <th>Persiapan Alat Khusus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nama_operasi" id="nama_operasi" class="form-control"></td>
                    <td>
                        <div class="row">
                            <div class="cols-sm-12 col-lg-2">
                                <select name="persiapan_alat_khusus" id="persiapan_alat_khusus" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg-10">
                                <textarea name="catatan_operasi_tindakan" id="" cols="32" rows="1" class="form-control" placeholder="Isi jika ada"></textarea>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
        <button class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>

@push('myscripts')
<script></script>
@endpush