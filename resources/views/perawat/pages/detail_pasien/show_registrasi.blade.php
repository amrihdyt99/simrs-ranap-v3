@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Registrasi</h5>
                </div>
                <div class="card-body">
                    {{-- <h5><b>DATA PENDAFTARAN PASIEN</b></h5>
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
                </div> --}}


                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5><b>DATA PENDAFTARAN PASIEN</b></h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Cara Bayar </label>
                                <input type="text" id="reg_cara_bayar" name="reg_cara_bayar" class="form-control"
                                    value="{{ $registrasi->reg_cara_bayar }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">No Dokumen </label>
                                <input type="text" class="form-control" id="reg_no_dokumen" name="reg_no_dokumen"
                                    {{ $registrasi->reg_no_dokumen }} />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">No. Kartu</label>
                                <input type="text" class="form-control" placeholder="Nomor Kartu" name="reg_no_kartu"
                                    id="reg_no_kartu" value="{{ $registrasi->reg_no_kartu }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Cover Class</label>
                                <input type="text" id="reg_class" name="reg_class" class="form-control select2bs4"
                                    value="{{$kelas->ClassCategoryName}}">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Asal Pasien</label>
                                <input type="text" id="departemen_asal" name="departemen_asal" onchange="asal_pasien()"
                                    class="form-control select2bs4" value="{{ $registrasi->departemen_asal }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Link Registration</label>
                                <select id="link_regis" name="link_regis" class="form-control select2bs4">
                                    <option value="">-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <hr>
                            <h5><b>DATA RAWAT INAP</b></h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="label-admisi">Bed Ranap </label>
                                <select name="bed_id" id="bed_id" class="select2bs4 form-control">
                                    <option value="">-- Pilih Bed --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="label-admisi">Dokter </label>
                                <input type="text" id="reg_dokter" name="reg_dokter" class="form-control select2bs4"
                                    value="{{ $registrasi->nama_dokter_registrasi }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="label-admisi">Diagnosa Utama</label>
                                <input type="text" id="reg_diagnosis" name="reg_diagnosis"
                                    class="form-control select2bs4" value="{{ $registrasi->reg_diagnosis }}">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <hr>
                            <h5><b>DATA PENANGGUNG JAWAB PASIEN</b></h5>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="label-admisi">Hubungan dengan pasien</label>
                                <input type="text" name="reg_hub_pasien" id="reg_hub_pasien" class="form-control"
                                    value="{{ $registrasi->reg_pjawab_hub }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Nomor Telepon</label>
                                <input type="text" class="form-control" name="reg_pjawab_nohp" id="reg_pjawab_nohp"
                                    value="{{ $registrasi->reg_pjawab_nohp }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">NIK Penanggungjawab</label>
                                <input type="text" class="form-control" name="reg_pjawab_nik" id="reg_pjawab_nik"
                                    placeholder="NIK penanggungjawab pasien">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Penanggungjawab Pembayaran</label>
                                <input type="text" class="form-control" name="reg_pjawab" id="reg_pjawab"
                                    placeholder="Penanggungjawab pembayaran pasien">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Informasi General Consent</label>
                                <select class="form-control" id="reg_info_general_consent"
                                    name="reg_info_general_consent">
                                    <option value=""></option>
                                    <option value="1"
                                        {{ $registrasi->reg_info_general_consent === '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0"
                                        {{ $registrasi->reg_info_general_consent === '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Informasi Ketersediaan Kamar</label>
                                <select class="form-control" id="reg_ketersidaan_kamar" name="reg_ketersidaan_kamar">
                                    <option value=""></option>
                                    <option value="1" {{ $registrasi->reg_ketersidaan_kamar === '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $registrasi->reg_ketersidaan_kamar === '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Informasi Hak dan Kewajiban</label>
                                <select class="form-control" id="reg_info_hak_kewajiban" name="reg_info_hak_kewajiban">
                                    <option value=""></option>
                                        {{-- <option value="1" {{ $registrasi->reg_info_hak_kewajiban === '1' ? 'selected' : '' }}>Ya</option>
                                        <option value="0" {{ $registrasi->reg_info_hak_kewajiban === '1' ? 'selected' : '' }}>Tidak</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="label-admisi">Informasi Cara
                                    Bayar dan perlengkapan / persyaratan</label>
                                <select class="form-control" id="reg_info_carabayar" name="reg_info_carabayar">
                                    <option value=""></option>
                                    <option value="1" {{ $registrasi->reg_info_carabayar === '1' ? 'selected' : '' }}>Ya</option>
                                    <option value="0" {{ $registrasi->reg_info_carabayar === '0' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label-admisi">Catatan
                                    Kunjungan</label>
                                <textarea class="form-control" rows="3" name="reg_cttn_kunj" id="reg_cttn_kunj"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label-admisi">Catatan
                                    Pasien</label>
                                <textarea class="form-control" rows="3" name="reg_cttn" id="reg_cttn"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
