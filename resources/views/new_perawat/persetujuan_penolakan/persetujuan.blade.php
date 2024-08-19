@php
    $get_tindakan_medis_data_penolakan=DB::connection('mysql')
            ->table('rs_tindakan_medis_persetujuan')
            ->where('kode_tindakan_medis_setuju_tolak', $informasi->kode_tindakan_medis_setuju_tolak)
            ->first();
            if (!$get_tindakan_medis_data_penolakan) {
                $get_tindakan_medis_data_penolakan=optional((object)[]);
            }
@endphp
<form id="PersetujuanTindakanMedis">
<input type="hidden" name="kode_tindakan_medis_setuju_tolak" value="{{$informasi->kode_tindakan_medis_setuju_tolak}}">
    <div class="card">
        <div class="card-header">
            <h5><b>PERSETUJUAN TINDAKAN MEDIS</b></h5>
        </div>
        <div class="card-body">
            <p>Yang bertanda tangan dibawah ini saya, </p>
            <table class="table1" style="width: 100%;">
                <tr>
                    <td style="width: 300px;">
                        Nama
                    </td>
                    <td>
                        <input type="text" name="persetujuan_nama_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_nama_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="persetujuan_jenis_kelamin_1" id="persetujuan_jenis_kelamin_1_laki_laki" value="Laki-laki" {{$get_tindakan_medis_data_penolakan->persetujuan_jenis_kelamin_1 == 'Laki-laki' ? 'checked' : ''}}>
                        <label for="persetujuan_jenis_kelamin_1_laki_laki">Laki-laki</label>
                    
                        <input type="radio" name="persetujuan_jenis_kelamin_1" id="persetujuan_jenis_kelamin_1_perempuan" value="Perempuan" {{$get_tindakan_medis_data_penolakan->persetujuan_jenis_kelamin_1 == 'Perempuan' ? 'checked' : ''}}>
                        <label for="persetujuan_jenis_kelamin_1_perempuan">Perempuan</label>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="date" name="persetujuan_tanggal_lahir_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_tanggal_lahir_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="persetujuan_alamat_1" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_alamat_1}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Dengan ini menyatakan SETUJU untuk dilakukan tindakan.
                    </td>
                    <td>
                        <input type="text" name="persetujuan_pernyataan" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_pernyataan}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Terhadap
                    </td>
                    <td>
                        <input type="radio" name="persetujuan_terhadap" id="persetujuan_terhadap_1" value="Saya sendiri" {{$get_tindakan_medis_data_penolakan->persetujuan_terhadap=='Saya sendiri' ? 'checked' : ''}}>
                        <label for="persetujuan_terhadap_1">Saya sendiri</label>
                        <input type="radio" name="persetujuan_terhadap" id="persetujuan_terhadap_2" value="Anak" {{$get_tindakan_medis_data_penolakan->persetujuan_terhadap=='Anak' ? 'checked' : ''}}>
                        <label for="persetujuan_terhadap_2">Anak</label>
                        <input type="radio" name="persetujuan_terhadap" id="persetujuan_terhadap_3" value="Ayah" {{$get_tindakan_medis_data_penolakan->persetujuan_terhadap=='Ayah' ? 'checked' : ''}}>
                        <label for="persetujuan_terhadap_3">Ayah</label>
                        <input type="radio" name="persetujuan_terhadap" id="persetujuan_terhadap_4" value="Ibu" {{$get_tindakan_medis_data_penolakan->persetujuan_terhadap=='Ibu' ? 'checked' : ''}}>
                        <label for="persetujuan_terhadap_4">Ibu</label>
                        <input type="radio" name="persetujuan_terhadap" id="persetujuan_terhadap_5" value="Saudara" {{$get_tindakan_medis_data_penolakan->persetujuan_terhadap=='Saudara' ? 'checked' : ''}}>
                        <label for="persetujuan_terhadap_5">Saudara</label>
                    </td>
                </tr>
                <tr>
                    <td style="width: 300px;">
                        Nama
                    </td>
                    <td>
                        <input type="text" name="persetujuan_nama_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_nama_2}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        <input type="radio" name="persetujuan_jenis_kelamin_2" id="persetujuan_jenis_kelamin_2_laki_laki" value="Laki-laki" {{$get_tindakan_medis_data_penolakan->persetujuan_jenis_kelamin_2=='Laki-laki' ? 'checked' : ''}}>
                        <label for="persetujuan_jenis_kelamin_2_laki_laki">Laki-laki</label>
                        <input type="radio" name="persetujuan_jenis_kelamin_2" id="persetujuan_jenis_kelamin_2_perempuan" value="Perempuan" {{$get_tindakan_medis_data_penolakan->persetujuan_jenis_kelamin_2=='Perempuan' ? 'checked' : ''}}>
                        <label for="persetujuan_jenis_kelamin_2_perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        <input type="date" name="persetujuan_tanggal_lahir_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_tanggal_lahir_2}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <input type="text" name="persetujuan_alamat_2" id="" class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_alamat_2}}">
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
                            <input type="datetime-local" name="persetujuan_tanggal_waktu_ttd" id=""
                                class="form-control" value="{{$get_tindakan_medis_data_penolakan->persetujuan_tanggal_waktu_ttd}}">
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
    <button class="btn btn-success float-right mt-4" type="button"
        onclick="simpanPersetujuanTindakanMedis()">Simpan</button>
</form>
