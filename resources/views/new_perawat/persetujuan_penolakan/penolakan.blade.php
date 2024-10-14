@php
    $get_tindakan_medis_data_penolakan = DB::connection('mysql')
        ->table('rs_tindakan_medis_penolakan')
        ->where('kode_tindakan_medis_setuju_tolak', $informasi->kode_tindakan_medis_setuju_tolak)
        ->first();
    if (!$get_tindakan_medis_data_penolakan) {
        $get_tindakan_medis_data_penolakan = optional((object) []);
    }
@endphp
<form id="PenolakanTindakanMedis">
    <input type="hidden" name="kode_tindakan_medis_setuju_tolak"
        value="{{ $informasi->kode_tindakan_medis_setuju_tolak }}">
    <div class="card">
        <div class="card-header">
            <h5><b>PENOLAKAN TINDAKAN MEDIS</b></h5>
        </div>
        <div class="card-body">
            <p>Yang bertanda tangan dibawah ini saya, </p>
            <table class="table1" style="width: 100%;">
                <tr>
                    <td style="width: 300px;">
                        Nama
                    </td>
                    <td>
                        <input type="text" name="penolakan_nama_1" id="" class="form-control"
                            value="{{ $get_tindakan_medis_data_penolakan->penolakan_nama_1 }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="penolakan_jenis_kelamin_1_laki"
                            value="Laki-laki"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_1 == 'Laki-laki' ? 'checked' : '' }}>
                        <label for="penolakan_jenis_kelamin_1_laki">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="penolakan_jenis_kelamin_1_perempuan"
                            value="Perempuan"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_1 == 'Perempuan' ? 'checked' : '' }}>
                        <label for="penolakan_jenis_kelamin_1_perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="date" name="penolakan_tanggal_lahir_1" id="" class="form-control"
                            value="{{ $get_tindakan_medis_data_penolakan->penolakan_tanggal_lahir_1 }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="penolakan_alamat_1" id="" class="form-control"
                            value="{{ $get_tindakan_medis_data_penolakan->penolakan_alamat_1 }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Dengan ini menyatakan TIDAK SETUJU untuk dilakukan tindakan.
                    </td>
                    <td>
                        <input type="text" name="penolakan_pernyataan" id="" class="form-control"
                            value="{{ $get_tindakan_medis_data_penolakan->penolakan_pernyataan }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Terhadap
                    </td>
                    <td>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_1" value="Saya sendiri"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_terhadap == 'Saya sendiri' ? 'checked' : '' }}>
                        <label for="penolakan_terhadap_1">Saya sendiri</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_2" value="Anak"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_terhadap == 'Anak' ? 'checked' : '' }}>
                        <label for="penolakan_terhadap_2">Anak</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_3" value="Ayah"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_terhadap == 'Ayah' ? 'checked' : '' }}>
                        <label for="penolakan_terhadap_3">Ayah</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_4" value="Ibu"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_terhadap == 'Ibu' ? 'checked' : '' }}>
                        <label for="penolakan_terhadap_4">Ibu</label>
                        <input type="radio" name="penolakan_terhadap" id="penolakan_terhadap_5" value="Saudara"
                            {{ $get_tindakan_medis_data_penolakan->penolakan_terhadap == 'Saudara' ? 'checked' : '' }}>
                        <label for="penolakan_terhadap_5">Saudara</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 300px;">
                        Nama
                    </td>
                    <td>
                        <input type="text" name="penolakan_nama_2" id="" class="form-control"
                            value="{{ $dataPasien->PatientName }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="penolakan_jenis_kelamin_2_laki"
                            value="Laki-laki"
                            {{ $dataPasien->GCSex == '0001^M' ? 'checked' : '' }}>
                        <label for="penolakan_jenis_kelamin_2_laki">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="penolakan_jenis_kelamin_2_perempuan"
                            value="Perempuan"
                            {{ $dataPasien->GCSex == '0001^F' ? 'checked' : '' }}>
                        <label for="penolakan_jenis_kelamin_2_perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="date" name="penolakan_tanggal_lahir_2" id="" class="form-control"
                            value="{{ $dataPasien->DateOfBirth }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="penolakan_alamat_2" id="" class="form-control"
                            value="{{ $dataPasien->PatientAddress }}">
                    </td>
                </tr>
            </table>
            <p>Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti di atas kepada
                saya, termasuk
                risiko dan komplikasi yang mungkin timbul.</p>
            <p>
                Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan tindakan
                medis bukanlah
                keniscayaan, melainkan sangat bergantung kepada Tuhan Yang Maha Esa.
            </p>

            <table style="width: 40%; float: right; border: none; margin-top: 30px">
                <tbody>
                    <tr>
                        <td>
                            <h5>
                                Palembang, tanggal
                            </h5>
                        </td>
                        <td>
                            <input type="datetime-local" name="penolakan_tanggal_ttd" id=""
                                class="form-control"
                                value="{{ $get_tindakan_medis_data_penolakan->penolakan_tanggal_ttd }}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table style="width: 100%; border: none; text-align:center;">
            <tbody>
                <tr>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">Yang menyatakan</div>
                            <div id="signature-pad-penolakan-penerima" style="display: inline-block;">
                                <div
                                    style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <canvas id="canvas_penolakan_penerima" width="260" height="160">Your browser does not
                                        support
                                        the HTML canvas tag.</canvas>
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_penerima" name="penolakan_ttd_yg_menyatakan" value="{{$get_tindakan_medis_data_penolakan->penolakan_ttd_yg_menyatakan}}">
                                    <button type="button" id="clear_btn_penolakan_penerima" class="btn btn-danger"
                                        data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                        Hapus</button>
                                    <input type="text" name="nama_penolakan_penerima" value="{{$get_tindakan_medis_data_penolakan->nama_penolakan_penerima}}" class="form-control mt-2" placeholder="Nama Yang Menyatakan">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">Dokter</div>
                            <div id="signature-pad-penolakan-dokter" style="display: inline-block;">
                                <div
                                    style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <canvas id="canvas_penolakan_dokter" width="260" height="160">Your browser does not
                                        support
                                        the HTML canvas tag.</canvas>
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_dokter" name="penolakan_ttd_dokter" value="{{$get_tindakan_medis_data_penolakan->penolakan_ttd_dokter}}">
                                    <button type="button" id="clear_btn_penolakan_dokter" class="btn btn-danger"
                                        data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                        Hapus</button>
                                    <input type="text" name="nama_penolakan_dokter" class="form-control mt-2" placeholder="Nama Dokter" value="{{$get_tindakan_medis_data_penolakan->nama_dokter ?? $dataPasien->ParamedicName}}">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:17px">SAKSI</td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">1. Keluarga</div>
                            <div id="signature-pad-penolakan-keluarga" style="display: inline-block;">
                                <div
                                    style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <canvas id="canvas_penolakan_keluarga" width="260" height="160">Your browser does not
                                        support
                                        the HTML canvas tag.</canvas>
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_keluarga" name="penolakan_ttd_keluarga" value="{{$get_tindakan_medis_data_penolakan->penolakan_ttd_keluarga}}">
                                    <button type="button" id="clear_btn_penolakan_keluarga" class="btn btn-danger"
                                        data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                        Hapus</button>
                                    @if($registrasi_pj->isNotEmpty())
                                        <select name="nama_penolakan_keluarga" class="form-control mt-2">
                                            <option value="">Pilih Nama Keluarga</option>
                                            @foreach($registrasi_pj as $pj)
                                                <option value="{{ $pj->reg_pjawab_nama }}" {{ $get_tindakan_medis_data_penolakan->nama_penolakan_keluarga == $pj->reg_pjawab_nama ? 'selected' : '' }}>{{ $pj->reg_pjawab_nama }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" name="nama_penolakan_keluarga" class="form-control mt-2" placeholder="Nama Keluarga" value="{{ $get_tindakan_medis_data_penolakan->nama_penolakan_keluarga ?? '' }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div style="margin-bottom: 10px; font-size:17px">2. Perawat</div>
                            <div id="signature-pad-penolakan-perawat" style="display: inline-block;">
                                <div
                                    style="border: solid 1px teal; width: 260px; height: 160px; position: relative;">
                                    <canvas id="canvas_penolakan_perawat" width="260" height="160">Your browser does not
                                        support
                                        the HTML canvas tag.</canvas>
                                </div>
                                <div style="margin: 10px; text-align: center;">
                                    <input type="hidden" id="signature_penolakan_perawat" name="penolakan_ttd_perawat" value="{{$get_tindakan_medis_data_penolakan->penolakan_ttd_perawat ?? auth()->user()->signature}}">
                                    <button type="button" id="clear_btn_penolakan_perawat" class="btn btn-danger"
                                        data-action="clear"><span class="glyphicon glyphicon-remove"></span>
                                        Hapus</button>
                                    <input type="text" name="nama_penolakan_perawat" class="form-control mt-2" placeholder="Nama Perawat" value="{{$get_tindakan_medis_data_penolakan->nama_penolakan_perawat ?? auth()->user()->name}}">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    <button class="btn btn-success float-left mt-4" id="save-penolakan-tindakan-medis" type="button" >Simpan</button>
</form>
