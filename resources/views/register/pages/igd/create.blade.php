@extends('register.layouts.app')

@section('content')
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
                <form action="{{ route('register.igd.store') }}" method="POST"
                    onsubmit="return confirm('Pastikan data yang di input sudah benar!')">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Pasien</h5>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="reg_medrec" class="col-sm-2 col-form-label">MRN<code>*</code></label>
                                        <div class="col-sm-10">
                                            <select id="reg_medrec" name="reg_medrec"
                                                class="form-control {{ $errors->has('reg_medrec') ? ' is-invalid' : '' }}">
                                                <option>{{ old('reg_medrec') }}</option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_medrec') }}</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama" name="nama" disabled />
                                        </div>
                                        <label for="catatan_khusus" class="col-sm-2 col-form-label">Cat. Khusus</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="catatan_khusus"
                                                name="catatan_khusus" disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <label for="medrec_lama" class="col-sm-2 col-form-label">Medrec Lama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="medrec_lama" name="medrec_lama"
                                                disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                                disabled />
                                        </div>
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input autocomplete="off" type="text" class="form-control"
                                                name="tanggal_lahir" id="tanggal_lahir" disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="0001^M">Laki-laki</option>
                                                <option value="0001^F">Perempuan</option>
                                            </select>
                                        </div>
                                        <label for="gol_darah" class="col-sm-2 col-form-label">Gol. Darah</label>
                                        <div class="col-sm-2">
                                            <select id="gol_darah" name="gol_darah" class="form-control" disabled>
                                                <option value="X0009^N/A"></option>
                                                <option value="X0009^A">A</option>
                                                <option value="X0009^B">B</option>
                                                <option value="X0009^O">O</option>
                                                <option value="X0009^AB">AB</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select id="rhesus" name="rhesus" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="+">+</option>
                                                <option value="-">-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-4">
                                            <select id="kategori" name="kategori" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>WNI</option>
                                                <option>WNA</option>
                                            </select>
                                        </div>
                                        <label for="ssn" class="col-sm-2 col-form-label">SSN</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="ssn" name="ssn" disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-4">
                                            <select id="agama" name="agama" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="0006^MOS">Islam</option>
                                                <option value="0006^CHR">Kristen</option>
                                                <option value="0006^CTH">Katolik</option>
                                                <option value="0006^BUD">Buddha</option>
                                                <option value="0006^HIN">Hindu</option>
                                                <option value="0006^CNF">Kong Hu Cu</option>
                                                <option value="0006^OTH">Other</option>
                                            </select>
                                        </div>
                                        <label for="kebangsaan" class="col-sm-2 col-form-label">Kebangsaan</label>
                                        <div class="col-sm-4">
                                            <select id="kebangsaan" name="kebangsaan" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Indonesia</option>
                                                <option>Amerika</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                                        <div class="col-sm-4">
                                            <select id="suku" name="suku" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Palembang</option>
                                                <option>Batak</option>
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
                                            <select id="pekerjaan" name="pekerjaan" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Wiraswasta</option>
                                                <option>BUMN</option>
                                            </select>
                                        </div>
                                        <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-4">
                                            <select id="pendidikan" name="pendidikan" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>SD</option>
                                                <option>SMP</option>
                                                <option>SMA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telepon_1" class="col-sm-2 col-form-label">No. Telepon 1</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="telepon_1" name="telepon_1"
                                                disabled />
                                        </div>
                                        <label for="telepon_2" class="col-sm-2 col-form-label">No. Telepon 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="telepon_2" name="telepon_2"
                                                disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-4">
                                            <select id="provinsi" name="provinsi" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Sumatera Selatan</option>
                                                <option>Sumatera Utara</option>
                                            </select>
                                        </div>
                                        <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                        <div class="col-sm-4">
                                            <select id="kota" name="kota" class="form-control" disabled>
                                                <option value=""></option>
                                                <option>Palembang</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="alamat" id="alamat" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header d-flex">
                                    <h5 class="card-title">Rawat IGD</h5>
                                    <button type="submit" class="btn btn-success btn-sm ml-auto">Submit</button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="service_unit" class="col-sm-2 col-form-label">Service
                                            Unit<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="service_unit" name="service_unit"
                                                class="form-control select2bs4 {{ $errors->has('service_unit') ? ' is-invalid' : '' }}">
                                                <option value="">-</option>
                                                @foreach ($service_unit as $row)
                                                    <option value="{{ $row->ServiceUnitCode }}"
                                                        {{ $row->ServiceUnitCode == old('service_unit') || $row->ServiceUnitCode == 'ER' ? 'selected' : '' }}>
                                                        {{ $row->ServiceUnitName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('service_unit') }}</small>
                                        </div>
                                        <label for="reg_ruangan"
                                            class="col-sm-2 col-form-label">Ruangan<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_ruangan" name="reg_ruangan"
                                                class="form-control select2bs4 {{ $errors->has('reg_ruangan') ? ' is-invalid' : '' }}">
                                                <option value="">-</option>
                                                @foreach ($service_room as $row)
                                                    <option value={{ $row->RoomID }}
                                                        {{ $row->RoomID == old('reg_ruangan') || $row->RoomCode == 'ER' ? 'selected' : '' }}>
                                                        {{ $row->RoomName }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_ruangan') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="reg_dokter"
                                            class="col-sm-2 col-form-label">Dokter<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_dokter" name="reg_dokter"
                                                class="form-control select2bs4 {{ $errors->has('reg_dokter') ? ' is-invalid' : '' }}">
                                                <option value="">-</option>
                                                @foreach ($physician as $row)
                                                    <option value="{{ $row->ParamedicCode }}"
                                                        {{ $row->ParamedicCode == old('reg_dokter') ? 'selected' : '' }}>
                                                        {{ $row->ParamedicName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_dokter') }}</small>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-5">
                                        <label for="reg_cara_bayar" class="col-sm-2 col-form-label">Cara
                                            Bayar<code>*</code></label>
                                        <div class="col-sm-4">
                                            <select id="reg_cara_bayar" name="reg_cara_bayar"
                                                class="form-control {{ $errors->has('reg_cara_bayar') ? ' is-invalid' : '' }}">
                                                <option value="Personal"
                                                    {{ 'Personal' == old('reg_cara_bayar') ? 'selected' : '' }}>Personal
                                                </option>
                                                <option value="BPJS"
                                                    {{ 'BPJS' == old('reg_cara_bayar') ? 'selected' : '' }}>BPJS</option>
                                                <option value="Admedika"
                                                    {{ 'Admedika' == old('reg_cara_bayar') ? 'selected' : '' }}>Admedika
                                                </option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('reg_cara_bayar') }}</small>
                                        </div>
                                        <label for="reg_referal" class="col-sm-2 col-form-label">No. Referal</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_referal"
                                                name="reg_referal" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_no_dokumen" class="col-sm-2 col-form-label">No. Dokumen</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_no_dokumen"
                                                name="reg_no_dokumen" />
                                        </div>
                                        <label for="reg_diagnosis" class="col-sm-2 col-form-label">Dianogsis
                                            Utama</label>
                                        <div class="col-sm-4">
                                            <select id="reg_diagnosis" name="reg_diagnosis"
                                                class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($icd10 as $item)
                                                    <option value="{{ $item->ID_ICD10 }}">{{ $item->NM_ICD10 }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_class" class="col-sm-2 col-form-label">Cover Class</label>
                                        <div class="col-sm-4">
                                            <select id="reg_class" name="reg_class" class="form-control select2bs4">
                                                <option value="">-</option>
                                                @foreach ($room_class as $row)
                                                    <option value={{ $row->ClassCategoryCode }}>
                                                        {{ $row->ClassCategoryName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="reg_referal" class="col-sm-2 col-form-label">Reference
                                            Corporate</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="reg_referal" name="reg_referal"
                                                class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_no_kartu" class="col-sm-2 col-form-label">No. Kartu</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_no_kartu"
                                                name="reg_no_kartu" />
                                        </div>
                                        <label for="reg_pjawab" class="col-sm-2 col-form-label">Penanggungjawab
                                            Pembayaran</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="reg_pjawab" name="reg_pjawab" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="reg_cttn_kunj" class="col-sm-2 col-form-label">Catatan
                                            Kunjungan</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn_kunj" id="reg_cttn_kunj"></textarea>
                                        </div>
                                        <label for="reg_cttn" class="col-sm-2 col-form-label">Catatan Pasien</label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn" id="reg_cttn"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('scripts')
    <script>
        $(async function() {
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
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map((d) => {
                                d.id = d.ID_ICD10
                                d.text = d.NM_ICD10
                                return d
                            })
                        }
                    }
                },
                templateResult: function(data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `(${data.ID_ICD10}) ${data.NM_ICD10}`
                },
                templateSelection: function(data) {
                    return data.text
                }
            });

            $("#reg_medrec").select2({
                theme: "bootstrap4",
                placeholder: "Cari MRN",
                ajax: {
                    delay: 500,
                    url: "{{ url('api/get-pasien') }}",
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
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
                templateResult: function(data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `${data.MedicalNo} ${data.PatientName}`
                },
                templateSelection: function(data) {
                    setDetailPasien(data)
                    return data.text
                }
            });

            @if (old('reg_medrec'))
                $.ajax({
                    url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
                    success: function(result) {
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
                // $("#kategori").val(data.Nationality)
                $("#ssn").val(data.SSN)
                $("#agama").val(data.GCReligion)
                // $("#kebangsaan").val(data.GCReligion)
                // $("#suku").val(data.GCReligion)
                // $("#status_nikah").val(data.GCReligion)
                // $("#pekerjaan").val(data.GCReligion)
                // $("#pendidikan").val(data.GCReligion)
                $("#telepon_1").val(data.MobilePhoneNo1)
                $("#telepon_2").val(data.MobilePhoneNo2)
                // $("#provinsi").val(data.MobilePhoneNo2)
                // $("#kota").val(data.MobilePhoneNo2)
                // $("#alamat").val(data.MobilePhoneNo2)
            }

        })
    </script>
@endpush
