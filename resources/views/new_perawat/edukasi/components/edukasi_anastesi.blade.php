<form id="formEdukasiAnastesi" class="form-group">
    <input type="hidden" name="username" value="{{auth()->user()->username}}">
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
                <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                    <div style="margin-bottom: 10px; font-weight: bold;">Dokter yang menyatakan</div>
                    <div id="signature-pad-dokter-anastesi" style="display: inline-block; margin: 0 auto;">
                        <div
                            style="border: solid 1px teal; width: 450px; height: 210px; position: relative;">
                            <canvas id="canvas_dokter_anastesi" width="450" height="200">Your browser does not support the
                                HTML canvas tag.</canvas>
                        </div>
                        <div style="margin: 10px;">
                            <input type="hidden" id="signature_dokter_anastesi" name="ttd_dokter" value="{{$edukasi_pasien_anastesi->ttd_dokter ?? ''}}">
                            <button type="button" id="clear_btn_dokter_anastesi" class="btn btn-danger"
                                data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                            <input type="text" class="form-control mt-2" name="nama_pihak_pasien" value="{{$datamypatient->PatientName ?? ''}}" placeholder="Nama Edukator">
                        </div>
                    </div>
                </td>

                <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div style="margin-bottom: 10px; font-weight: bold;">Pihak yang dijelaskan</div>
                        <div id="signature-pad-pasien-anastesi" style="display: inline-block;">
                            <div
                                style="border: solid 1px teal; width: 450px; height: 210px; position: relative;">
                                <canvas id="canvas_pasien_anastesi" width="450" height="200">Your browser does not support
                                    the HTML canvas tag.</canvas>
                            </div>
                            <div style="margin: 10px; text-align: center;">
                                <input type="hidden" id="signature_pasien_anastesi" name="ttd_pihak_pasien" value="{{$edukasi_pasien_anastesi->ttd_pihak_pasien ?? ''}}">
                                <button type="button" id="clear_btn_pasien_anastesi" class="btn btn-danger"
                                    data-action="clear"><span class="glyphicon glyphicon-remove"></span> Hapus</button>
                                <input type="text" class="form-control mt-2" name="nama_dokter" value="{{$datamypatient->ParamedicName ?? ''}}" placeholder="Nama Sasaran">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <button type="button" class="btn btn-primary mt-3 float-right" onclick="addedukasipasienperawat('#formEdukasiAnastesi', 'anastesi')">Simpan</button>
    </div>
</form>