@php
    $get_tindakan_medis_data_penolakan=DB::connection('mysql')
            ->table('rs_tindakan_medis_penolakan')
            ->where('kode_tindakan_medis_setuju_tolak', $informasi->kode_tindakan_medis_setuju_tolak)
            ->first();
            if (!$get_tindakan_medis_data_penolakan) {
                $get_tindakan_medis_data_penolakan=optional((object)[]);
            }
@endphp
<form id="PenolakanTindakanMedis">
<input type="hidden" name="kode_tindakan_medis_setuju_tolak" value="{{$informasi->kode_tindakan_medis_setuju_tolak}}">
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
                        <input type="text" name="penolakan_nama_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_nama_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="laki3" value="Laki-laki" {{$get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_1=='Laki-laki' ? 'checked' : ''}}>
                        <label for="laki3">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_1" id="perempuan3" value="Perempuan" {{$get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_1=='Perempuan' ? 'checked' : ''}}>
                        <label for="perempuan3">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="date" name="penolakan_tanggal_lahir_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_tanggal_lahir_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="penolakan_alamat_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_alamat_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Dengan ini menyatakan TIDAK SETUJU untuk dilakukan tindakan.
                    </td>
                    <td>
                        <input type="text" name="penolakan_pernyataan" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_pernyataan}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Terhadap
                    </td>
                    <td>
                        <input type="radio" name="penolakan_terhadap" id="saya3" value="Saya sendiri" {{$get_tindakan_medis_data_penolakan->penolakan_terhadap=='Saya sendiri' ? 'checked' : ''}}>
                        <label for="saya3">Saya sendiri</label>
                        <input type="radio" name="penolakan_terhadap" id="anak3" value="Anak" {{$get_tindakan_medis_data_penolakan->penolakan_terhadap=='Anak' ? 'checked' : ''}}>
                        <label for="anak3">Anak</label>
                        <input type="radio" name="penolakan_terhadap" id="ayah3" value="Ayah" {{$get_tindakan_medis_data_penolakan->penolakan_terhadap=='Ayah' ? 'checked' : ''}}>
                        <label for="ayah3">Ayah</label>
                        <input type="radio" name="penolakan_terhadap" id="ibu3" value="Ibu" {{$get_tindakan_medis_data_penolakan->penolakan_terhadap=='Ibu' ? 'checked' : ''}}>
                        <label for="ibu3">Ibu</label>
                        <input type="radio" name="penolakan_terhadap" id="saudara3" value="Saudara" {{$get_tindakan_medis_data_penolakan->penolakan_terhadap=='Saudara' ? 'checked' : ''}}>
                        <label for="saudara3">Saudara</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 300px;">
                        Nama
                    </td>
                    <td>
                        <input type="text" name="penolakan_nama_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_nama_2}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="laki5" value="Laki-laki" {{$get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_2=='Laki-laki' ? : ''}}>
                        <label for="laki5">Laki-laki</label>
                        <input type="radio" name="penolakan_jenis_kelamin_2" id="perempuan5" value="Perempuan" {{$get_tindakan_medis_data_penolakan->penolakan_jenis_kelamin_2=='Perempuan' ? : ''}}>
                        <label for="perempuan5">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="text" name="penolakan_tanggal_lahir_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_nama_2}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="penolakan_alamat_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_alamat_2}}">
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
                                class="form-control" value="{{$get_tindakan_medis_data_penolakan->penolakan_tanggal_ttd}}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table style="width: 100%; border: none; text-align:center;">
            <tbody>
                <tr>
                    <td colspan="3" style="text-align: right;">
                        <h5>Saksi</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>
                            Yang menyatakan
                        </h5>
                    </td>
                    <td>
                        <h5>Dokter</h5>
                    </td>
                    <td>
                        <h5>1. Keluarga</h5>
                    </td>
                    <td>
                        <h5>2. Perawat</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                    <td>
                        (..................)
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <button class="btn btn-success float-right mt-4" type="button" onclick="simpanPenolakanTindakanMedis()">Simpan</button>
</form>
