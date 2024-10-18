@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
<style>
    .table td {
        padding: 0.3rem 0.5rem !important;
        font-size: 15px !important;
        vertical-align: middle !important;
    }

    .table th {
        padding: 0.3rem 2.5rem !important;
        font-size: 16px !important;
        vertical-align: middle !important;
    }

    .label-admisi {
        font-size: 14px !important;
    }

    .left-side {
        border-right: 1px black solid;
        padding: 0px 30px 0px 10px;
    }

    input.form-control,
    select.form-control {
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

    select.form-control,
    select.typeahead,
    select.tt-query,
    select.tt-hint {
        color: #000000;
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('register.ranap.store') }}" method="POST"
                        onsubmit="return confirm('Pastikan data yang di input sudah benar!')">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 left-side">
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="mrn_category" class="label-admisi">Kategori MRN</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select id="mrn_category" name="mrn_category" class="form-control">
                                            <option value="existing">MRN Pasien</option>
                                            <option value="newborn">MRN Pasien Baru</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="reg_medrec" class="label-admisi">No. MRN</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select id="reg_medrec" name="reg_medrec" class="form-control {{ $errors->has('reg_medrec') ? ' is-invalid' : '' }}">
                                            <option>{{ old('reg_medrec') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="nama" class="label-admisi">Nama</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pasien">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="tempat_lahir" class="label-admisi">TTL</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="jenis_kelamin" class="label-admisi">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                                            <option value=""></option>
                                            <option value="0001^X">Tidak Diketahui</option>
                                            <option value="0001^M">Laki-laki</option>
                                            <option value="0001^F">Perempuan</option>
                                            <option value="0001^U">Tidak Dapat Ditentukan</option>
                                            <option value="0001^N">Tidak Mengisi</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="ssn" class="label-admisi">NIK</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="ssn" id="ssn" class="form-control" placeholder="Nomor SSN">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="pekerjaan" class="label-admisi">Pekerjaan</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="pekerjaan" name="pekerjaan" class="form-control">
                                            <option value="X0012^01">Karyawan Swasta</option>
                                            <option value="X0012^02">Pegawai Negeri</option>
                                            <option value="X0012^03">Lainnya</option>
                                            <option value="X0012^04">Tidak Kerja</option>
                                            <option value="X0012^06">Wiraswasta / Dagang / Jasa</option>
                                            <option value="X0012^07">Petani / Nelayan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="agama" class="label-admisi">Agama</label>
                                    </div>
                                    <div class="col-lg-4">
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
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="status_nikah" class="label-admisi">Status Nikah</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="status_nikah" name="status_nikah" class="form-control" disabled>
                                            <option value="0002^M">Menikah</option>
                                            <option value="0002^S">Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="pendidikan" class="label-admisi">Pendidikan</label>
                                    </div>
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-2">
                                        <label for="telepon_1" class="label-admisi">No. Telepon</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="telepon_1" id="telepon_1" class="form-control" placeholder="Nomor Telepon">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="gol_darah" class="label-admisi">Gol. Darah</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <select id="gol_darah" name="gol_darah" class="form-control" disabled>
                                            <option value="X0009^N/A">Pilih Gol. Darah</option>
                                            <option value="X0009^A">A</option>
                                            <option value="X0009^B">B</option>
                                            <option value="X0009^O">O</option>
                                            <option value="X0009^AB">AB</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <select id="rhesus" name="rhesus" class="form-control">
                                            <option value=""></option>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label for="alamat" class="label-admisi">Alamat Lengkap</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6" id="readonly_">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <h5><b>DATA PENDAFTARAN PASIEN</b></h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="label-admisi">Kategori Pasien </label>
                                            @php
                                            $kategori_pasien = [
                                                'bayi' => 'Bayi',
                                                'anak' => 'Anak',
                                                'dewasa' => 'Dewasa',
                                                'kebidanan' => 'Kebidanan',
                                            ];
                                            @endphp
                                            <select id="kategori_pasien" name="kategori_pasien" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($kategori_pasien as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Cara Bayar </label>
                                            <select id="reg_cara_bayar" name="reg_cara_bayar"
                                                class="form-control" onchange="cariDokumen()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">No Dokumen </label>
                                            <input type="text" class="form-control" id="reg_no_dokumen" ame="reg_no_dokumen" value="{{ $registration->reg_no_dokumen ?? '-' }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">No. Kartu</label>
                                            <input type="text" class="form-control" placeholder="Nomor Kartu" name="reg_no_kartu" id="reg_no_kartu" value="{{ $registration->reg_no_kartu ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">No. SEP</label>
                                            <input type="text" class="form-control" placeholder="Nomor SEP" name="reg_sep_no" id="reg_sep_no" value="{{ $registration->reg_sep_no ?? '-' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Cover Class</label>
                                            <select id="reg_class" name="reg_class" class="form-control select2bs4" onchange="handleChangeCoverClass()">
                                                <option value="">-</option>
                                                @foreach ($room_class as $row)
                                                <option value={{ $row->ClassCode }}>
                                                    {{ $row->ClassName ?? '-' }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Charge Class</label>
                                            <select id="charge_class_code" name="charge_class_code" class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($room_class as $row)
                                                <option value={{ $row->ClassCode }}>
                                                    {{ $row->ClassName ?? '-' }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Asal Pasien</label>
                                            <select id="departemen_asal" name="departemen_asal" onchange="asal_pasien()"
                                                class="form-control select2bs4 {{ $errors->has('departemen_asal') ? " is-invalid" : "" }}">
                                                <option
                                                    value="Directly To The Inpatient">
                                                    Directly To The Inpatient
                                                </option>
                                                <option
                                                    value="From Emergency">
                                                    From Emergency
                                                </option>
                                                <option
                                                    value="From Outpatient">
                                                    From Outpatient
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Purpose</label>
                                            <select id="purpose" name="purpose" class="form-control select2bs4">
                                                <option value="Treatment">Treatment</option>
                                                <option value="Parturition">Parturition</option>
                                                <option value="New Born Baby">New Born Baby</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Link Registration</label>
                                            <select id="link_regis" name="link_regis" class="form-control select2bs4">
                                                <option value="">-</option>
                                                @if($registration->reg_lama)
                                                <option value="{{ $registration->reg_lama }}" selected>{{ $registration->reg_lama }}</option>
                                                @elseif($registration->reg_lama_igd)
                                                <option value="{{ $registration->reg_lama_igd }}" selected>{{ $registration->reg_lama_igd }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 mb-2">
                                        <hr>
                                        <h5><b>DATA RAWAT INAP</b></h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="asal_rujukan">Asal Rujukan</label>
                                            <textarea name="asal_rujukan" id="asal_rujukan" cols="10" rows="3" class="form-control">{{ $registration->asal_rujukan??'-' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-admisi">Bed Ranap</label>
                                           
                                            <select name="bed_id" id="bed_id" class="select2bs4 form-control">
                                                <option value="">-- Pilih Bed --</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-admisi">Dokter </label>
                                            <select id="reg_dokter" name="reg_dokter"
                                                class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($physician as $row)
                                                <option
                                                    value="{{ $row->ParamedicCode }}">
                                                    {{ $row->ParamedicName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-admisi">Diagnosa Utama</label>
                                            <select id="reg_diagnosis" name="reg_diagnosis"
                                                class="form-control select2bs4">
                                                <option value="">-</option>
                                                {{--
                                    @foreach ($icd10 as $item)
                                        <option value="{{ $item->ID_ICD10 }}">{{ $item->NM_ICD10 }}</option>
                                                @endforeach
                                                --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <hr>
                                        <h5><b>DATA PENANGGUNG JAWAB PASIEN</b></h5>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="btn-group m-3">
                                            <button type="button" class="btn btn-warning btn-add-row" id="showModalPJ">
                                                <i class="fa fa-plus"></i>
                                                Tambah Penanggungjawab Pasien
                                            </button>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="dt-pj" class="table table-lg table-bordered nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Penanggungjawab</th>
                                                        <th>Hub dengan pasien</th>
                                                        <th>Nomor Telepon</th>
                                                        <th>NIK</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Penanggungjawab Pembayaran</th>
                                                        <th>Penanggungjawab Alamat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Informasi General Consent</label>
                                            <select class="form-control" id="reg_info_general_consent"
                                                name="reg_info_general_consent">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Informasi Ketersediaan Kamar</label>
                                            <select class="form-control" id="reg_ketersidaan_kamar"
                                                name="reg_ketersidaan_kamar">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Informasi Hak dan Kewajiban</label>
                                            <select class="form-control" id="reg_info_hak_kewajiban"
                                                name="reg_info_hak_kewajiban">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-admisi">Informasi Cara
                                                Bayar dan perlengkapan / persyaratan</label>
                                            <select class="form-control" id="reg_info_carabayar"
                                                name="reg_info_carabayar">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-admisi">Catatan Kunjungan</label>
                                            <textarea class="form-control" rows="3" name="reg_cttn_kunj" id="reg_cttn_kunj"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="label-admisi">Catatan Pasien</label>
                                            <textarea class="form-control w-100" rows="3" name="reg_cttn" id="reg_cttn"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="kasus_polisi">Kasus Polisi/Hukum</label>
                                            <select name="kasus_polisi" id="kasus_polisi" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right mt-3" id="btn-save-admisi"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<div class="modal" id="pjModal" tabindex="-1" role="dialog">
    <form method="" action="" id="requestpjdata">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penanggungjawab Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="label-admisi">Nama Penanggungjawab Pasien</label>
                        <input type="text" class="form-control" name="reg_pjawab_nama" id="reg_pjawab_nama" placeholder="Nama penanggungjawab pasien" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Hubungan dengan pasien</label>
                        @php
                        $hubungan_pasien = [
                        'Diri sendiri',
                        'Orang tua',
                        'Anak',
                        'Suami/istri',
                        'Kerabat/saudara',
                        'Lain-lain',
                        ];
                        @endphp
                        <select name="reg_hub_pasien" id="reg_hub_pasien" class="form-control" required>
                            <option value="">-- Pilih hubungan dengan pasien --</option>
                            @foreach ($hubungan_pasien as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Nomor Telepon</label>
                        <input type="text" class="form-control" name="reg_pjawab_nohp" id="reg_pjawab_nohp" placeholder="No. telpon penanggungjawab pasien" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">NIK Penanggungjawab</label>
                        <input type="text" class="form-control" name="reg_pjawab_nik" id="reg_pjawab_nik" placeholder="NIK penanggungjawab pasien" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih jenis kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan_keluarga" id="pekerjaan_keluarga" placeholder="Pekerjaan penanggungjawab pasien" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Penanggungjawab Pembayaran</label>
                        <input type="text" class="form-control" name="reg_pjawab_bayar" id="reg_pjawab_bayar" placeholder="Penanggungjawab pembayaran pasien" required>
                    </div>
                    <div class="form-group">
                        <label class="label-admisi">Penanggungjawab Alamat</label>
                        <input type="text" class="form-control" name="reg_pjawab_alamat" id="reg_pjawab_alamat" placeholder="Penanggungjawab Alamat pasien" required>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="newPJ">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.content-wrapper -->
@endsection

@push('nyaa_scripts')
@include('register.pages.ranap.components.scripts.form-create-register-ranap')
<script>
    const handleChangeCoverClass = async()=>{
        const reg_class = $('#reg_class').val()
        await getDataBedByClass(reg_class)
    }
    const getDataBedByClass = async(classCode)=>{
        try {
            let url = "{{ route('bed.class', ':class_code') }}"
            url = url.replace(':class_code', classCode)
            const response = await fetch(url)
            const {data:result} = await response.json()
            renderBed(result ?? [])
        } catch (error) {
            console.log(error)
        }
    }
    const renderBed = (data)=>{
        let html = ''
        data.forEach((item)=>{
            html += `<option value="${item.bed_id}">${item.bed_code ?? ''} ${item.ruang ?? ''} ${item.kelompok ?? ''} ${item.kelas ?? ''}</option>`
        })
        document.getElementById('bed_id').innerHTML = html
    }
</script>
@endpush