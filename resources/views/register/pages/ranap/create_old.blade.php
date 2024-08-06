@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
<style>
    .label-admisi {
        font-size: 14px !important;
        color: black;
        /* margin-top: 8px !important; */
    }
    .left-side {
        border-right: 1px black solid;
        padding: 0px 30px 0px 10px;
    }
    input.form-control, select.form-control {
        height: 40px !important;
        border: none !important;
        border-bottom: 1px black solid !important;
    }
    textarea.form-control {
        border: none !important;
        border-bottom: 1px black solid !important;
    }
    .select2-container .select2-selection--single {
        height: 40px !important;
        border: none !important;
        border-bottom: 1px black solid !important;
    }
    select.form-control, select.typeahead, select.tt-query, select.tt-hint {
        color: #000000;
    }
    .sig-canvas {
        border: 2px dotted #CCCCCC;
        border-radius: 15px;
        cursor: crosshair;
        /* height: 500px;
        width: 500px; */
    }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="form-group row">
                    {{-- <label for="reg_medrec" class="col-sm-2 col-form-label">Pasien Baru</label>
                     <input type="checkbox" name="ckBaru" id="ckBaru" value="Baru" class="btn-check">--}}
                    <a href="{{ route('patient.create') }}">
                        <button  class="btn btn-primary" >Daftar Pasien Baru</button>
                        <div id="loading"></div>
                    </a>
                </div>
                <form action="{{ route('register.ranap.store') }}" method="POST"
                      onsubmit="return confirm('Pastikan data yang di input sudah benar!')">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Pasien</h5>

                                </div>
                                <div class="card-body">
                                  {{--  <div class="form-group row">
                                        <button type="button" class="btn btn-primary" onclick="cariRMMaster()">Sinkron Data Pasien</button>
                                    </div>--}}
                                   {{-- <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Cari Nama Atau RM Pasien</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="cari_rm" id="cari_rm"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary" onclick="cariRMMaster()">Cari</button>
                                        </div>
                                    </div>--}}
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <label for="col-form-label" class="label-admisi">No. Medrec </label>
                                        </div>
                                        <select id="reg_medrec" name="reg_medrec"
                                        class="form-control {{ $errors->has('reg_medrec') ? " is-invalid" : "" }}">
                                    <option>{{ old('reg_medrec') }}</option>
                                </select>
                                <small class="text-danger">{{ $errors->first('reg_medrec') }}</small>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama" name="nama" disabled/>
                                        </div>
                                        <label for="catatan_khusus" class="col-sm-2 col-form-label">Cat. Khusus</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="catatan_khusus"
                                                   name="catatan_khusus" disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <label for="medrec_lama" class="col-sm-2 col-form-label">Medrec Lama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="medrec_lama" name="medrec_lama"
                                                   disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir"
                                                   name="tempat_lahir" disabled/>
                                        </div>
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input autocomplete="off" type="text" class="form-control"
                                                   name="tanggal_lahir" id="tanggal_lahir" disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                                                    disabled>
                                                <option value=""></option>
                                                <option value="0001^M">Laki-laki</option>
                                                <option value="0001^F">Perempuan</option>
                                            </select>
                                        </div>
                                        <label for="gol_darah" class="col-sm-2 col-form-label">Gol. Darah</label>
                                        <div class="col-sm-2">
                                            <select id="gol_darah" name="gol_darah" class="form-control" disabled>
                                                {{--  <option value="X0009^N/A"></option>
                                                  <option value="X0009^A">A</option>
                                                  <option value="X0009^B">B</option>
                                                  <option value="X0009^O">O</option>
                                                  <option value="X0009^AB">AB</option>--}}
                                                <option value=""></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                                <option value="AB">AB</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="rhesus" name="rhesus" class="form-control">
                                                <option value=""></option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-4">
                                            <select id="kategori" name="kategori" class="form-control"  onchange="checkWNI()" disabled>
                                                <option value=""></option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                        <label for="ssn" class="col-sm-2 col-form-label" id="labelktp">KTP</label>
                                        <div class="col-sm-4" id="colktp">
                                            <input type="text" class="form-control" id="ssn" name="ssn" disabled/>
                                        </div>


                                        <label for="ssn" class="col-sm-2 col-form-label" id="labelkitas">Passport/KITAS</label>
                                        <div class="col-sm-4" id="colkitas">
                                            <input type="text" class="form-control" id="kitas" name="kitas"/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-4">
                                            <select id="agama" name="agama" class="form-control">
                                                <option value=""></option>
                                                <option value="0006^BUD">Buddhist</option>
                                                <option value="0006^CHR">Christian</option>
                                                <option value="0006^CNF">Confucian (Kong Fu Cu)</option>
                                                <option value="0006^CTH">Catholic</option>
                                                <option value="0006^HIN">Hindu</option>
                                                <option value="0006^MOS">Muslim</option>
                                                <option value="0006^OTH">Other</option>
                                            </select>
                                        </div>
                                        <label for="kebangsaan" class="col-sm-2 col-form-label">Kebangsaan</label>
                                        <div class="col-sm-4">
                                            <select id="kebangsaan" name="kebangsaan" class="form-control">
                                                <option value=""></option>
                                                <option>Indonesia</option>
                                                <option>Amerika</option>
                                                <option value="X0014^001">Indonesian</option>
                                                <option value="X0014^002">China</option>
                                                <option value="X0014^003">England</option>
                                                <option value="X0014^004">French</option>
                                                <option value="X0014^005">Japan</option>
                                                <option value="X0014^006">Korea</option>
                                                <option value="X0014^007">Malaysia</option>
                                                <option value="X0014^008">New Zealand</option>
                                                <option value="X0014^009">Philippine</option>
                                                <option value="X0014^010">Singapore</option>
                                                <option value="X0014^011">Taiwan</option>
                                                <option value="X0014^012">Thailand</option>
                                                <option value="X0014^013">America</option>
                                                <option value="X0014^014">Other</option>
                                                <option value="X0014^015">India</option>
                                                <option value="X0014^016">Australia</option>
                                                <option value="X0014^018">HONG KONG</option>
                                                <option value="X0014^999">Unknown</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                                        <div class="col-sm-4">
                                            <select id="suku" name="suku" class="form-control">
                                                <option value=""></option>
                                                <option>Palembang</option>
                                                <option>Batak</option>
                                                <option value="0005^001">Aceh</option>
                                                <option value="0005^002">Batak</option>
                                                <option value="0005^003">Minang</option>
                                                <option value="0005^004">Sunda</option>
                                                <option value="0005^005">Jawa</option>
                                                <option value="0005^006">Madura</option>
                                                <option value="0005^007">Bali</option>
                                                <option value="0005^008">Sasak</option>
                                                <option value="0005^009">Timor</option>
                                                <option value="0005^010">Dayak</option>
                                                <option value="0005^011">Minahasa</option>
                                                <option value="0005^012">Toraja</option>
                                                <option value="0005^013">Makassar</option>
                                                <option value="0005^014">Bugis</option>
                                                <option value="0005^015">Chinese</option>
                                                <option value="0005^016">Ambon</option>
                                                <option value="0005^017">Palembang</option>
                                                <option value="0005^018">Bangka</option>
                                            </select>
                                        </div>
                                        <label for="status_nikah" class="col-sm-2 col-form-label">Status Nikah</label>
                                        <div class="col-sm-4">
                                            <select id="status_nikah" name="status_nikah" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Menikah</option>
                                                <option>Belum Menikah</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-4">
                                            <select id="pekerjaan" name="pekerjaan" class="form-control">

                                                <option value="X0012^01">Karyawan Swasta</option>
                                                <option value="X0012^02">Pegawai Negeri</option>
                                                <option value="X0012^03">Other</option>
                                            </select>
                                        </div>
                                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-4">
                                            <select id="pendidikan" name="pendidikan" class="form-control">
                                                <option value=""></option>

                                                <option value="X0013^01">TK</option>
                                                <option value="X0013^02">SD</option>
                                                <option value="X0013^03">SMP</option>
                                                <option value="X0013^04">SMA</option>
                                                <option value="X0013^05">D-1</option>
                                                <option value="X0013^06">D-3</option>
                                                <option value="X0013^07">S-1</option>
                                                <option value="X0013^08">S-2</option>
                                                <option value="X0013^09">S-3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telepon_1" class="col-sm-2 col-form-label">No. Telepon 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="telepon_1" name="telepon_1"
                                                   disabled/>
                                        </div>
                                        <label for="telepon_2" class="col-sm-2 col-form-label">No. Telepon 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="telepon_2" name="telepon_2"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provinsi" class="col-sm-2 col-form-label ">Provinsi</label>
                                        <div class="col-sm-4">
                                            <select id="provinsi" name="provinsi" class="form-control select2bs4"
                                                    onchange="getKotaKabupaten()" disabled>
                                                <option value=""></option>

                                            </select>
                                        </div>
                                        <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                        <div class="col-sm-4">
                                            <select id="kota" name="kota" class="form-control select2bs4" onchange="getDistricts()"  disabled>
                                                <option value="" ></option>

                                            </select>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-2 col-form-label ">Kecamatan</label>
                                    <div class="col-sm-4">
                                        <select id="kecamatan" name="kecamatan" class="form-control select2bs4"
                                                onchange="getVillage()" >
                                            <option value=""></option>

                                        </select>
                                    </div>
                                    <label for="kota" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-4">
                                        <select id="desa" name="desa" class="form-control select2bs4"  >
                                            <option value="" ></option>

                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="alamat" id="alamat"
                                                      disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header d-flex">
                                    <h5 class="card-title">Rawat Inap</h5>
                                    <button type="submit" class="btn btn-success btn-sm ml-auto">Submit</button>
                                </div>
                                <div class="card-body">
                                    {{--                                    <div class="form-group row">--}}
                                    {{--                                        <label for="bed" class="col-sm-2 col-form-label">Kode Bed<code>*</code></label>--}}
                                    {{--                                        <div class="col-sm-4">--}}
                                    {{--                                            <select id="bed" name="bed"--}}
                                    {{--                                                    class="form-control {{ $errors->has('bed') ? " is-invalid" : "" }}">--}}
                                    {{--                                                <option value="">Pilih Bed</option>--}}

                                    {{--                                                @foreach ($bed as $row)--}}
                                    {{--                                                    <option value="{{ $row->bed_id }}"--}}
                                    {{--                                                            data-bed='{{ json_encode($row) }}' {{ $row->bed_id == old('bed') ? "selected" : "" }}>{{ $row->bed_code }}</option>--}}
                                    {{--                                                @endforeach--}}
                                    {{--                                            </select>--}}
                                    {{--                                            <small class="text-danger">{{ $errors->first('bed') }}</small>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <label for="service_unit" class="col-sm-2 col-form-label">Service--}}
                                    {{--                                            Unit<code>*</code></label>--}}
                                    {{--                                        <div class="col-sm-4">--}}
                                    {{--                                            <select id="service_unit" name="service_unit"--}}
                                    {{--                                                    class="form-control select2bs4 {{ $errors->has('service_unit') ? " is-invalid" : "" }}">--}}
                                    {{--                                                <option value="">-</option>--}}
                                    {{--                                                @foreach ($service_unit as $row)--}}
                                    {{--                                                    <option--}}
                                    {{--                                                        value="{{ $row->ServiceUnitCode }}" {{ $row->ServiceUnitCode == old("service_unit") ? "selected" : ""}}>--}}
                                    {{--                                                        {{ $row->ServiceUnitName }}--}}
                                    {{--                                                    </option>--}}
                                    {{--                                                @endforeach--}}
                                    {{--                                            </select>--}}
                                    {{--                                            <small class="text-danger">{{ $errors->first('service_unit') }}</small>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="form-group row">
                                        <label for="reg_ruangan"
                                               class="col-sm-2 col-form-label">Ruangan<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_ruangan" name="reg_ruangan"
                                                    class="form-control {{ $errors->has('reg_ruangan') ? " is-invalid" : "" }}">
                                                <option value="">-</option>
                                                @foreach ($ruangan_baru as $row)
                                                    <option
                                                        value={{ $row->id }} {{ $row->id == old("id") ? "selected" : ""}}>{{ $row->nama_ruangan }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_ruangan') }}</small>
                                        </div>

                                        <label for="room_class"
                                               class="col-sm-2 col-form-label">Class Room<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="room_class" name="room_class"
                                                    class="form-control select2bs4 {{ $errors->has('room_class') ? " is-invalid" : "" }}">
                                                <option value="">-</option>
                                                @foreach ($kelas_baru as $row)
                                                    <option
                                                        value={{ $row->id }} {{ $row->id == old("room_class") ? "selected" : ""}}>
                                                        {{ $row->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('room_class') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="reg_tarif_kamar"
                                               class="col-sm-2 col-form-label">Tarif
                                            Ruangan<code>(Perhari)</code></label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" id="tarif_ruangan"
                                                   name="tarif_ruangan" readonly/>
                                        </div>

                                      <div class="col-sm-4">
                                          {{-- <a onclick="cekruangan()">
                                              <label for="room_class"
                                                     class="col-sm-2 col-form-label">
                                                  Bed<code>*</code></label></a> --}}
                                                  <button type="button" class="btn btn-primary" onclick="cekruangan()">Pilih Bed</button>
                                      </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_dokter"
                                               class="col-sm-2 col-form-label">Dokter<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_dokter" name="reg_dokter"
                                                    class="form-control select2bs4 {{ $errors->has('reg_dokter') ? " is-invalid" : "" }}">
                                                <option value="">-</option>
                                                @foreach ($physician as $row)
                                                    <option
                                                        value="{{ $row->ParamedicCode }}" {{ $row->ParamedicCode == old("reg_dokter") ? "selected" : ""}}>
                                                        {{ $row->ParamedicName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_dokter') }}</small>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="departemen_asal" class="col-sm-2 col-form-label">Asal Pasien<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="departemen_asal" name="departemen_asal" onchange="asal_pasien()"
                                                    class="form-control select2bs4 {{ $errors->has('departemen_asal') ? " is-invalid" : "" }}">
                                                <option
                                                    value="Directly To The Inpatient" {{ "Directly To The Inpatient"==old("departemen_asal") ? "selected" : "" }}>
                                                    Directly To The Inpatient
                                                </option>
                                                <option
                                                    value="From Emergency" {{ "From Emergency"==old("departemen_asal") ? "selected" : "" }}>
                                                    From Emergency
                                                </option>
                                                <option
                                                    value="From Outpatient" {{ "From Outpatient"==old("departemen_asal") ? "selected" : "" }}>
                                                    From Outpatient
                                                </option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('departemen_asal') }}</small>
                                        </div>
                                        <label for="link_regis" class="col-sm-2 col-form-label">Link
                                            Registration</label>
                                        <div class="col-sm-4">
                                            <select id="link_regis" name="link_regis" class="form-control select2bs4">
                                                <option value="">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <label for="reg_cara_bayar" class="col-sm-2 col-form-label">Cara
                                            Bayar<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_cara_bayar" name="reg_cara_bayar"
                                                    class="form-control {{ $errors->has('reg_cara_bayar') ? " is-invalid" : "" }}" onchange="cariDokumen()">
                                           
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_cara_bayar') }}</small>
                                        </div>
                                        <label for="reg_referal" class="col-sm-2 col-form-label">No. Referal</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_referal"
                                                   name="reg_referal"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_no_dokumen" class="col-sm-2 col-form-label">No. Dokumen</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_no_dokumen"
                                                   name="reg_no_dokumen"/>
                                        </div>
                                        <label for="reg_diagnosis" class="col-sm-2 col-form-label">Dianogsis
                                            Utama</label>
                                        <div class="col-sm-4">
                                            <select id="reg_diagnosis" name="reg_diagnosis"
                                                    class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($icd10 as $item)
                                                    <option value="{{ $item->ID_ICD10 }}">{{ $item->NM_ICD10 }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_class" class="col-sm-2 col-form-label">Cover Class</label>
                                        <div class="col-sm-4">
                                            <select id="reg_class" name="reg_class" class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($cover_class as $row)
                                                    <option value={{ $row->ClassCategoryCode }}>
                                                        {{ $row->ClassCategoryName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="reg_corp" class="col-sm-2 col-form-label">Reference
                                            Corporate</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="reg_corp" name="reg_corp" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_no_kartu" class="col-sm-2 col-form-label">No. Kartu</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_no_kartu"
                                                   name="reg_no_kartu"/>
                                        </div>
                                        <label for="reg_pjawab" class="col-sm-2 col-form-label">Penanggungjawab
                                            Pembayaran</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_pjawab" name="reg_pjawab"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_pjawab_hub" class="col-sm-2 col-form-label">Hubungan Dengan
                                            Pasien</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_hub_pasien"
                                                   name="reg_hub_pasien"/>
                                        </div>
                                        <label for="reg_pjawab_alamat" class="col-sm-2 col-form-label">Alamat Lengkap
                                            Penanggung Jawab</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_pjawab_alamat"
                                                   name="reg_pjawab_alamat"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_pjawab_nohp" class="col-sm-2 col-form-label">Nomor
                                            Telepon/Hp</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_pjawab_nohp"
                                                   name="reg_pjawab_nohp"/>
                                        </div>

                                        <label for="reg_nik_penanggung_jawab" class="col-sm-2 col-form-label">NIK Penanggung Jawab</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_pjawab_nik"
                                                   name="reg_pjawab_nik"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_ketersidaan_kamar" class="col-sm-2 col-form-label">Informasi
                                            Ketersiadaan Kamar</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="reg_ketersidaan_kamar"
                                                    name="reg_ketersidaan_kamar">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                        <label for="reg_info_hak_kewajiban" class="col-sm-2 col-form-label">Informasi
                                            Hak Dan Kewajiban</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="reg_info_hak_kewajiban"
                                                    name="reg_info_hak_kewajiban">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_info_general_consent" class="col-sm-2 col-form-label">Informasi
                                            General Consent</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="reg_info_general_consent"
                                                    name="reg_info_general_consent">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                        <label for="reg_info_carabayar" class="col-sm-2 col-form-label">Informasi Cara
                                            Bayar dan perlengkapan / persyaratan</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="reg_info_carabayar"
                                                    name="reg_info_carabayar">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_cttn_kunj" class="col-sm-2 col-form-label">Catatan
                                            Kunjungan</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn_kunj"
                                                      id="reg_cttn_kunj"></textarea>
                                        </div>
                                        <label for="reg_cttn" class="col-sm-2 col-form-label">Catatan Pasien</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn"
                                                      id="reg_cttn"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <input id="id_ketersediaan" name="id_ketersediaan" hidden/>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>


        <div class="modal fade" id="ruangan-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Data Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body Modal -->
                    <div class="modal-body">
                        <!-- Tabel -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Bed</th>
                                <th>Nama Paviliun</th>
                                <th>Ruangan</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="body-ketersediaan">

                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('nyaa_scripts')

    <script>
        function checkWNI(){
            var kategori = $('#kategori').val()
            console.log(kategori)
            if(kategori=="WNI"){
                $('#labelkitas').hide()
                $('#kitas').hide()
                $('#colkitas').hide()

                $('#labelktp').show()
                $('#ssn').show()
                $('#colktp').show()
            }else{
                $('#labelktp').hide()
                $('#ssn').hide()
                $('#colktp').hide()
                $('#labelkitas').show()
                $('#kitas').show()
                $('#colkitas').hide()
            }
        }
    </script>
    <script>
        $(async function () {
            $('#labelkitas').hide()
            $('#kitas').hide()
            $.ajax({
                url: '{{route('get.bussinesspartner')}}',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    data.data.forEach(function (item) {
                        $("#reg_cara_bayar")
                            .append($("<option></option>")
                                .attr("value", item.BusinessPartnerID)
                                .text(item.BusinessPartnerName));

                        $("#reg_cara_bayar").select2({
                            placeholder: "Pilih Cara Bayar",
                            allowClear: true,
                        });
                    })

                }
            });

            $.ajax({
                url: '{{route('get.provinsi')}}',
                type: 'get',
                dataType: 'json',
                success:function(data){
                    data.data.forEach(function (item) {
                        $("#provinsi")
                            .append($("<option></option>")
                                .attr("value", item.kode)
                                .text(item.nama));
                    })
                }
            })

            $('#nama').prop('disabled', false);
            $('#tempat_lahir').prop('disabled', false);
            $('#tanggal_lahir').prop('disabled', false);
            $('#jenis_kelamin').prop('disabled', false);
            $('#kategori').prop('disabled', false);
            $('#gol_darah').prop('disabled', false);
            $('#ssn').prop('disabled', false);
            $('#agama').prop('disabled', false);
            $('#kebangsaan').prop('disabled', false);
            $('#suku').prop('disabled', false);
            $('#status_nikah').prop('disabled', false);
            $('#pekerjaan').prop('disabled', false);
            $('#pendidikan').prop('disabled', false);
            $('#telepon_1').prop('disabled', false);
            $('#provinsi').prop('disabled', false);
            $('#kota').prop('disabled', false);
            $('#alamat').prop('disabled', false);
            // $("#tanggal_lahir").datepicker()

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4",
            });



            $("#reg_diagnosis").select2({
                theme: "bootstrap4",
                placeholder: "Cari Diagnosis",
                ajax: {
                    delay: 500,
                    url: "{{ url('api/get-icd10') }}",
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map((d) => {
                                d.id = d.ID_ICD10
                                d.text = d.NM_ICD10
                                return d
                            })
                        }
                    }
                },
                templateResult: function (data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `(${data.ID_ICD10}) ${data.NM_ICD10}`
                },
                templateSelection: function (data) {
                    return data.text
                }
            });

            $("#reg_medrec").select2({
                theme: "bootstrap4",
                placeholder: "Cari MRN",
                ajax: {
                    delay: 500,
                    url: "{{ url('api/get-pasien') }}",
                    //type:"POST",
                    // url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/data",
                    // headers: {
                    //     "x-username" : "rsud_fatimah",
                    //     "x-password" : "RsUdF4T!mah"
                    // },
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map((d) => {
                                d.id = d.MedicalNo
                                d.text = d.MedicalNo
                                return d
                            })
                        }
                    },
                    // success:function(r){
                    //     console.log("{{ old('medrec') }}")
                    //     console.log(r)
                    //     $("#medrec").val("{{ old('medrec') }}").trigger('change')
                    // }
                },
                templateResult: function (data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `${data.MedicalNo} ${data.PatientName}`
                },
                templateSelection: function (data) {
                    setDetailPasien(data)
                    return data.text
                }
            });

            @if(old('reg_medrec'))
            $.ajax({
                url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
                success: function (result) {
                    setDetailPasien(result[0])
                }
            })
            @endif


            function setDetailPasien(data) {
                $("#nama").val(data.PatientName)
                $("#catatan_khusus").val(data.Notes)
                $("#medrec_lama").val(data.OldMedicalNo)
                $("#tempat_lahir").val(data.CityOfBirth)
                $("#tanggal_lahir").val(data.DateOfBirth ? moment(data.DateOfBirth).format("YYYY-MM-DD") : "")
                $("#jenis_kelamin").val(data.GCSex)
                $("#gol_darah").val(data.GCBloodType)
                $("#rhesus").val(data.BloodRhesus)
                $("#kategori").val(data.Nationality)
                $("#ssn").val(data.SSN)
                $("#agama").val(data.GCReligion)
                $("#kebangsaan").val(data.GCReligion)
                $("#suku").val(data.GCReligion)
                $("#status_nikah").val(data.GCReligion)
                $("#pekerjaan").val(data.GCReligion)
                $("#pendidikan").val(data.GCReligion)
                $("#telepon_1").val(data.MobilePhoneNo1)
                $("#telepon_2").val(data.MobilePhoneNo2)
                $("#provinsi").val(data.MobilePhoneNo2)
                $("#kota").val(data.MobilePhoneNo2)
                $("#alamat").val(data.PatientAddress)
            }

            // $("#bed").on('change', function () {
            //     const bed = $(this).find("option:selected").data('bed')
            //     if (bed) {
            //         console.log(bed)
            //         $("#service_unit").val(bed.service_unit_id).trigger('change')
            //         $("#reg_ruangan").val(bed.room_id).trigger('change')
            //         $("#room_class").val(bed.class_code).trigger('change')
            //     } else {
            //         $("#service_unit").val("").trigger('change')
            //         $("#reg_ruangan").val("").trigger('change')
            //         $("#room_class").val("").trigger('change')
            //     }
            // })

            $("#room_class").on('change', function () {
                var tarif_ruangan = document.getElementById('tarif_ruangan')
                console.log(tarif_ruangan)
                $.ajax({
                    url: "{{route('cek.tarif.ruangan.baru')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "idruangan": $(this).val()
                    },
                    success: function (r) {
                        console.log(r.data.kelas_baru[0]['tarif_kelas'])
                        tarif_ruangan.value = r.data.kelas_baru[0]['tarif_kelas']
                    }
                })
                //tarif_ruangan.value=$(this).find("option:selected").data('room_class')
            })

           

        $('#ckBaru').click(function () {
            if (this.checked) {
                $('#nama').prop('disabled', false);
                $('#tempat_lahir').prop('disabled', false);
                $('#tanggal_lahir').prop('disabled', false);
                $('#jenis_kelamin').prop('disabled', false);
                $('#kategori').prop('disabled', false);
                $('#gol_darah').prop('disabled', false);
                $('#ssn').prop('disabled', false);
                $('#agama').prop('disabled', false);
                $('#kebangsaan').prop('disabled', false);
                $('#suku').prop('disabled', false);
                $('#status_nikah').prop('disabled', false);
                $('#pekerjaan').prop('disabled', false);
                $('#pendidikan').prop('disabled', false);
                $('#telepon_1').prop('disabled', false);
                $('#provinsi').prop('disabled', false);
                $('#kota').prop('disabled', false);
                $('#alamat').prop('disabled', false);// If checked enable item
            } else {
                $('#nama').prop('disabled', true);
                $('#tempat_lahir').prop('disabled', true);
                $('#tanggal_lahir').prop('disabled', true);
                $('#jenis_kelamin').prop('disabled', true);
                $('#kategori').prop('disabled', true);
                $('#gol_darah').prop('disabled', true);
                $('#ssn').prop('disabled', true);
                $('#agama').prop('disabled', true);
                $('#kebangsaan').prop('disabled', true);
                $('#suku').prop('disabled', true);
                $('#status_nikah').prop('disabled', true);
                $('#pekerjaan').prop('disabled', true);
                $('#pendidikan').prop('disabled', true);
                $('#telepon_1').prop('disabled', true);
                $('#provinsi').prop('disabled', true);
                $('#kota').prop('disabled', true);
                $('#alamat').prop('disabled', true);// If checked disable item
            }
        });
    })
    </script>

    <script>
         function asal_pasien() {
                //get value departemen asal
                var departemen_asal = document.getElementById('departemen_asal')
                var departemen_asal_value = departemen_asal.value
                const nomed = $('#reg_medrec').val()

                if(departemen_asal_value=='From Outpatient'){
                    $.ajax({
                        url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/"+nomed,
                        type: "GET",
                        success: function (r) {
                            console.log(r)
                            //check r is empty or not
                            var link_regis = document.getElementById('link_regis')
                            link_regis.innerHTML = ''
                            var option = document.createElement('option')
                            option.value = r.ranap_reg;
                            option.innerHTML = r.ranap_reg;
                            link_regis.appendChild(option)

                        }
                    })
                }
            }
        function cariRMMaster(){
            sinkronData("tester")
            //ajax with header to get data from http://rsud.sumselprov.go.id/master-simrs/api/pasien/detail,
            // for(i=4;i<=59;i++){
            //     var loading = document.getElementById('loading')
            //     loading.innerHTML = '<div class="spinner-border text-primary" role="status">\n' +
            //         '  <span class="sr-only">Loading...</span>\n' +
            //         '</div>'
            //     $.ajax({
            //         url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/data?page="+i,
            //         type:"POST",
            //         headers: { 'x-username': 'rsud_fatimah' , 'x-password': 'RsUdF4T!mah'},
            //         data:{
            //             "no_rm":$('#reg_medrec').val()
            //         },
            //         success:function(r){
            //             var data=r.metadata.data.data
            //
            //         }
            //     })
            //
            // }
        }

        function sinkronData(data){
            //create loading
            //console.log(data)


            $.ajax({
                url:"{{route('pasien.spaira')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "data":JSON.stringify(data)
                },
                success:function(r){
                    console.log(r)
                    if(r.status=="success"){
                        alert('Data Berhasil Disinkronisasi')
                    }else{
                        alert('Data Gagal Disinkronisasi')
                    }
                    loading.innerHTML = ''
                }
            })
        }
    </script>
    <script>
        function cekruangan(){
            //load ruangan from api
            $.ajax( {
                url: "{{route('ketersediaan.ruangan')}}",
                type: "GET",
                success: function (r) {
                    console.log(r)
                    //append to row table in modal ketersediaan ruangan
                    var tbody = document.getElementById('body-ketersediaan')
                    tbody.innerHTML = ''
                    for(var i=0;i<r.data.length;i++) {
                        var tr = document.createElement('tr')
                        var td1 = document.createElement('td')
                        td1.innerHTML = r.data[i].nomor_bed
                        tr.appendChild(td1)
                        var td2 = document.createElement('td')
                        td2.innerHTML = r.data[i].nama_pavilun
                        tr.appendChild(td2)
                        var td3 = document.createElement('td')
                        td3.innerHTML = r.data[i].nama_ruangan
                        tr.appendChild(td3)
                        var td5=document.createElement('td')
                        td5.innerHTML=r.data[i].nama_kelas
                        tr.appendChild(td5)
                        var td6=document.createElement('td')
                        if(r.data[i].status_ketersediaan==1){
                            td6.innerHTML="ready"
                        }else if(r.data[i].status_ketersediaan==2){
                            td6.innerHTML="Dipakai"
                        }else if(r.data[i].status_ketersediaan==3){
                            td6.innerHTML="Cleaning"
                        }
                        tr.appendChild(td6)

                       /* var td7=document.createElement('td')
                        if(r.data[i].is_temporary==0){
                            td7.innerHTML="Bukan Temporary"
                        }else{
                            td7.innerHTML="Temporary"
                        }

                        tr.appendChild(td7)*/
                        if(r.data[i].status_ketersediaan==1){
                            var td4 = document.createElement('td')
                            var buttonpilih= document.createElement('button')
                            buttonpilih.setAttribute('class','btn btn-primary')
                            buttonpilih.setAttribute('onclick','pilihRuangan('+r.data[i].id_paviliun+','+r.data[i].id+')')
                            buttonpilih.innerHTML = 'Pilih'
                            td4.appendChild(buttonpilih)
                            tr.appendChild(td4)
                        }

                        tbody.appendChild(tr)
                    }


                    //show modal ruangan-modal
                    $('#ruangan-modal').modal('show')
                }
            })


        }

        function pilihRuangan(id_paviliun,id_ruangan){
            // set select option ruangan
            $('#reg_ruangan').val(id_paviliun)
            var fieldIdKetersediaan=document.getElementById('id_ketersediaan')
            fieldIdKetersediaan.value = id_ruangan
            $('#ruangan-modal').modal('hide')

        }
    </script>

    <script>
        function cariDokumen(){
            const idbussiness = $('#reg_cara_bayar').val()
            $.ajax({
                url:"{{route('get.document')}}",
                type:"POST",
                data:{
                    "id_bussines":idbussiness
                },
                beforeSend : function(){
                    $('#reg_no_dokumen').val('Loading')
                },
                error : function () {
                    $('#reg_no_dokumen').val('')
                  },
                success:function(r){
                    if (r.data[0]) {
                        $('#reg_no_dokumen').val(r.data[0].DocumentNo)
                    }else{
                        $('#reg_no_dokumen').val('')
                    }
                }
            })
        }

        function getKotaKabupaten(){
            var id_provinsi = $('#provinsi').val()
            $.ajax({
                url:"{{route('get.regency')}}",
                type:"POST",
                data:{
                    "id_provinsi":id_provinsi
                },
                success:function(r){
                    var kota = document.getElementById('kota')
                    kota.innerHTML = ''
                    for(var i=0;i<r.data.length;i++){
                        var option = document.createElement('option')
                        option.setAttribute('value',r.data[i].kode)
                        option.innerHTML = r.data[i].nama
                        kota.appendChild(option)
                    }
                }
            })
        }

        function getDistricts(){
            var id_kota = $('#kota').val()
            $.ajax({
                url:"{{route('get.district')}}",
                type:"POST",
                data:{
                    "id_kota":id_kota
                },
                success:function(r){
                    var kecamatan = document.getElementById('kecamatan')
                    kecamatan.innerHTML = ''
                    for(var i=0;i<r.data.length;i++){
                        var option = document.createElement('option')
                        option.setAttribute('value',r.data[i].kode)
                        option.innerHTML = r.data[i].nama
                        kecamatan.appendChild(option)
                    }
                }
            })
        }

        function getVillage(){
            var id_kecamatan = $('#kecamatan').val()
            $.ajax({
                url:"{{route('get.village')}}",
                type:"POST",
                data:{
                    "id_kecamatan":id_kecamatan
                },
                success:function(r){
                    var kelurahan = document.getElementById('desa')
                    kelurahan.innerHTML = ''
                    for(var i=0;i<r.data.length;i++){
                        var option = document.createElement('option')
                        option.setAttribute('value',r.data[i].kode)
                        option.innerHTML = r.data[i].nama
                        kelurahan.appendChild(option)
                    }
                }
            })
        }


    </script>
@endpush
