<form id="formEdukasiAnastesi" class="form-group">
    <div class="table-responsive">
        <table class="table1">
            <tr>
                <td colspan="2" style="font-size: 16px;">Saya yang bertanda tangan di bawah ini telah membaca atau dibacakan keterangan
                    diatas dan telah dijelaskan terkait dengan prosedur anestesi dan sedasi yang akan dilakukan terhadap
                    <div class="d-flex flex-row align-items-center">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="dilakukan_ke" value="diri_sendiri" id="diri_sendiri" {{ isset($edukasi_pasien_anastesi->dilakukan_ke) && $edukasi_pasien_anastesi->dilakukan_ke == 'diri_sendiri' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="diri_sendiri">Diri saya sendiri</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="dilakukan_ke" value="istri_suami" id="istri_suami" {{ isset($edukasi_pasien_anastesi->dilakukan_ke) && $edukasi_pasien_anastesi->dilakukan_ke == 'istri_suami' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="istri_suami">Istri/Suami</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="dilakukan_ke" value="anak" id="anak" {{ isset($edukasi_pasien_anastesi->dilakukan_ke) && $edukasi_pasien_anastesi->dilakukan_ke == 'anak' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="anak">Anak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="dilakukan_ke" value="ayah" id="ayah" {{ isset($edukasi_pasien_anastesi->dilakukan_ke) && $edukasi_pasien_anastesi->dilakukan_ke == 'ayah' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="ayah">Ayah</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="dilakukan_ke" value="ibu" id="ibu" {{ isset($edukasi_pasien_anastesi->dilakukan_ke) && $edukasi_pasien_anastesi->dilakukan_ke == 'ibu' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="ibu">Ibu</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Nama :
                </td>
                <td>
                    <input type="text" class="form-control" name="nama" value="{{ $datamypatient->PatientName ?? '' }}" id="nama">
                </td>
            </tr>
            <tr>
                <td>
                    Umur/Jenis Kelamin :
                </td>
                <td>
                    <input type="text" class="form-control" name="umur" id="umur" value="{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->kalkulasi_umur($datamypatient->DateOfBirth ?? '','tahun')}}">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="jenis_kelamin" value="Laki Laki" id="laki_laki" {{ (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datamypatient->GCSex ?? '') == 'Laki-Laki') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="jenis_kelamin" value="Perempuan" id="perempuan" {{ (app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($datamypatient->GCSex ?? '') == 'Perempuan') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    No.Telp :
                </td>
                <td>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $datamypatient->MobilePhoneNo1 ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>
                    No. Rekam Medis :
                </td>
                <td>
                    <input type="text" class="form-control" name="no_rekam_medis" id="no_rekam_medis" value="{{ $datamypatient->reg_medrec ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>
                    Diagnosa :
                </td>
                <td>
                    <input type="text" class="form-control" name="diagonsa" id="diagonsa" value="{{ $datamypatient->NM_ICD10 ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>
                    Rencana tindakan :
                </td>
                <td>
                    <input type="text" class="form-control" name="tindakan" id="tindakan" value="{{ $edukasi_pasien_anastesi->tindakan ?? '' }}" >
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Anastesi :
                </td>
                <td>
                    <input type="text" class="form-control" name="jenis_anastesi" id="jenis_anastesi" value="{{ $edukasi_pasien_anastesi->jenis_anastesi ?? '' }}">
                </td>
            </tr>
        </table>

        <table class="table w-100">
            <tr>
                <td colspan="3" class="text-right">
                    <div class="d-flex align-items-center mb-2 justify-content-end">
                        <label for="tgl_ttd" class="font-weight-bold mr-2">Palembang</label>
                        <input type="datetime-local" class="form-control" name="tgl_ttd" id="tgl_ttd" style="width: 200px;" value="{{ $edukasi_pasien_anastesi->tgl_ttd ?? '' }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td style=" text-align: center;">
                    <p>Dokter yang menyatakan</p>
                    <div class="signature-pad mx-auto"
                        style="border: 1px solid #000; width: 450px; height: 210px;">
                        <canvas id="signature-pad-dokter_anastesi" width="450" height="200"></canvas>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                        data-pad="dokter_anastesi">Hapus</button>
                    <input type="hidden" name="ttd_dokter" id="ttd_dokter_anastesi" value="">
                </td>
    
                <td style=" text-align: center;">
                    <p>Pihak yang dijelaskan</p>
                    <div class="signature-pad mx-auto"
                        style="border: 1px solid #000; width: 450px; height: 210px;">
                        <canvas id="signature-pad-pasien_anastesi" width="450" height="200"></canvas>
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary clear-btn mt-2"
                        data-pad="pasien_anastesi">Hapus</button>
                    <input type="hidden" name="ttd_pihak_pasien" id="ttd_pasien_anastesi" value="">
                </td>
            </tr>
        </table>
        <button type="button" class="btn btn-primary mt-3 float-right" onclick="storeEdukasiAnastesi()">Simpan</button>
    </div>
</form>
