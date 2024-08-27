@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
<style>
    .table td{
    padding: 0.3rem 0.5rem !important;
    font-size: 15px !important;
    vertical-align: middle !important;
    }
    .table th{
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
                                          <input type="text" class="form-control" id="reg_no_dokumen"
                                                   name="reg_no_dokumen"/>
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="label-admisi">No. Kartu</label>
                                        <input type="text" class="form-control" placeholder="Nomor Kartu" name="reg_no_kartu" id="reg_no_kartu">
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-group">
                                          <label class="label-admisi">Cover Class</label>
                                          <select id="reg_class" name="reg_class" class="form-control select2bs4">
                                              <option value="">-</option>
                                              @foreach ($cover_class as $row)
                                                  <option value={{ $row->ClassCategoryCode }}>
                                                      {{ $row->ClassCategoryName }}</option>
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
                                    </div>
                                  </div>

                                  <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="label-admisi">Purpose</label>
                                        <select id="purpose" name="purpose" class="form-control select2bs4 {{ $errors->has('purpose') ? 'is-invalid' : '' }}">
                                            <option value="Treatment" {{ "Treatment" == old("purpose") ? 'selected' : '' }}>
                                                Treatment
                                            </option>
                                            <option value="Parturition" {{ "Parturition" == old("purpose") ? 'selected' : '' }}>
                                                Parturition
                                            </option>
                                            <option value="New Born Baby" {{ "New Born Baby" == old("purpose") ? 'selected' : '' }}>
                                                New Born Baby
                                            </option>
                                        </select>
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
                                  <div class="col-lg-8">
                                      <div class="form-group">
                                          <label class="label-admisi">Hubungan dengan pasien</label>
                                          <select name="reg_hub_pasien" id="reg_hub_pasien" class="form-control">
                                              <option value="">-- Pilih hubungan dengan pasien --</option>
                                              <option value="Diri sendiri">Diri sendiri</option>
                                              <option value="Orang tua">Orang tua</option>
                                              <option value="Anak">Anak</option>
                                              <option value="Suami/istri">Suami/istri</option>
                                              <option value="Kerabat/saudara">Kerabat/saudara</option>
                                              <option value="Lain-lain">Lain-lain</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-group">
                                          <label class="label-admisi">Nomor Telepon</label>
                                          <input type="text" class="form-control" name="reg_pjawab_nohp" id="reg_pjawab_nohp" placeholder="No. telpon penanggungjawab pasien">
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-group">
                                          <label class="label-admisi">NIK Penanggungjawab</label>
                                          <input type="text" class="form-control" name="reg_pjawab_nik" id="reg_pjawab_nik" placeholder="NIK penanggungjawab pasien">
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-group">
                                          <label class="label-admisi">Penanggungjawab Pembayaran</label>
                                          <input type="text" class="form-control" name="reg_pjawab" id="reg_pjawab" placeholder="Penanggungjawab pembayaran pasien">
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="label-admisi">Penanggungjawab Alamat</label>
                                        <input type="text" class="form-control" name="reg_pjawab_alamat" id="reg_pjawab_alamat" placeholder="Penanggungjawab Alamat pasien">
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
                                        <label class="label-admisi">Catatan
                                            Kunjungan</label>
                                            <textarea class="form-control" rows="3" name="reg_cttn_kunj"
                                            id="reg_cttn_kunj"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="label-admisi">Catatan
                                            Pasien</label>
                                            <textarea class="form-control" rows="3" name="reg_cttn"
                                            id="reg_cttn"></textarea>
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
            $.ajax({
				type: "get",
				url: "{{url('api/cekketersediaanruangan')}}",
				dataType: "json",
				success: function(r) {
					var opt = '<option value="" disabled>Pilih Bed</option>';
					$.each(r.data, function(index, row) {
						opt += '<option value="' + row.bed_id+'">' + row.bed_code +' - '+row.ruang+' - '+row.kelompok+' - '+row.kelas+ '</option>';
					});
					$('#bed_id').html(opt);
				}
			});

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
                            // allowClear: true,
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
                };
            }
        },
        templateResult: function (data) {
            if (data.loading) {
                return data.text;
            }
            return `${data.MedicalNo} ${data.PatientName}`;
        },
        templateSelection: function (data) {
            setDetailPasien(data);
            return data.text;
        }
    });

    // Mengatur ulang Select2 berdasarkan kategori MRN
    $("#mrn_category").change(function () {
        const selectedCategory = $(this).val();

        if (selectedCategory === 'existing') {
            $("#reg_medrec").prop("disabled", false);
            $("#reg_medrec").select2('open');
        } else if (selectedCategory === 'newborn') {
            $("#reg_medrec").prop("disabled", true);
            // Handle MRN bayi baru lahir logic here
            $.ajax({
                url: "{{ url('api/generate-newborn-mrn') }}",
                success: function (result) {
                    $("#reg_medrec").val(result).trigger('change');
                }
            });
        }
    });

    @if(old('reg_medrec'))
    $.ajax({
        url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
        success: function (result) {
            setDetailPasien(result[0]);
        }
    });
    @endif


            // $("#reg_medrec").select2({
            //     theme: "bootstrap4",
            //     placeholder: "Cari MRN",
            //     ajax: {
            //         delay: 500,
            //         url: "{{ url('api/get-pasien') }}",
            //         //type:"POST",
            //         // url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/data",
            //         // headers: {
            //         //     "x-username" : "rsud_fatimah",
            //         //     "x-password" : "RsUdF4T!mah"
            //         // },
            //         data: function (params) {
            //             return {
            //                 search: params.term
            //             };
            //         },
            //         processResults: function (data) {
            //             return {
            //                 results: data.map((d) => {
            //                     d.id = d.MedicalNo
            //                     d.text = d.MedicalNo
            //                     return d
            //                 })
            //             }
            //         },
            //         // success:function(r){
            //         //     console.log("{{ old('medrec') }}")
            //         //     console.log(r)
            //         //     $("#medrec").val("{{ old('medrec') }}").trigger('change')
            //         // }
            //     },
            //     templateResult: function (data) {
            //         if (data.loading) {
            //             return data.text;
            //         }
            //         return `${data.MedicalNo} ${data.PatientName}`
            //     },
            //     templateSelection: function (data) {
            //         setDetailPasien(data)
            //         return data.text
            //     }
            // });

            // @if(old('reg_medrec'))
            // $.ajax({
            //     url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
            //     success: function (result) {
            //         setDetailPasien(result[0])
            //     }
            // })
            // @endif


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
                $("#kebangsaan").val(data.GCNationality)
                $("#suku").val(data.GCRace)
                $("#status_nikah").val(data.GCMaritalStatus)
                $("#pekerjaan").val(data.GCOccupation)
                $("#pendidikan").val(data.GCEducation)
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
                            if (r == 'Tidak ada instruksi ke rawat inap') {
                            } else {
                            //check r is empty or not
                            var link_regis = document.getElementById('link_regis')
                            link_regis.innerHTML = ''
                            var option = document.createElement('option')
                            option.value = r.ranap_reg;
                            option.innerHTML = r.ranap_reg;
                            link_regis.appendChild(option)
                            }
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
