@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail Registrasi</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="reg_no"
                           class="col-sm-2 col-form-label">Registration Number<code>*</code></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_no" name="reg_no" value="{{$registrasi->reg_no }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_medrec" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_medrec" name="reg_medrec" value="{{$registrasi->nama_pasien_registrasi}}"/>
                    </div>
                    <label for="reg_medrec" class="col-sm-2 col-form-label">MRN</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_medrec" name="reg_medrec" value="{{$registrasi->reg_medrec}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_tgl" class="col-sm-2 col-form-label">Tanggal Registrasi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_tgl" name="reg_tgl" value="{{$registrasi->reg_tgl}}"/>
                    </div>
                    <label for="reg_jam" class="col-sm-2 col-form-label">Jam Registrasi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_jam" name="reg_jam" value="{{$registrasi->reg_jam}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_dokter" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_dokter" name="reg_dokter" value="{{$registrasi->nama_dokter_registrasi}}"/>
                    </div>
                    <label for="reg_ruangan" class="col-sm-2 col-form-label">Ruangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_ruangan" name="reg_ruangan" value="{{$registrasi->nama_ruangan_registrasi}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_dokter" class="col-sm-2 col-form-label">Cara Bayar</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_dokter" name="reg_dokter" value="{{$registrasi->reg_cara_bayar}}"/>
                    </div>
                    <label for="reg_ruangan" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_ruangan" name="reg_ruangan" value="{{$registrasi->nama_kelas_registrasi}}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reg_dokter" class="col-sm-2 col-form-label">Nama Penanggung Jawab</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_dokter" name="reg_dokter" value="{{$registrasi->reg_pjawab}}"/>
                    </div>
                    <label for="reg_ruangan" class="col-sm-2 col-form-label">Nomor Handphone Penanggung Jawab</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reg_ruangan" name="reg_ruangan" value="{{$registrasi->reg_pjawab_nohp}}"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    @endsection
