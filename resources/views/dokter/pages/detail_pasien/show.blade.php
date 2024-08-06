@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
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
                </div>
                {{-- <form action="#" method="POST"
                      onsubmit="return confirm('Pastikan data yang di input sudah benar!')">
                    @csrf --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Pasien</h5>

                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="MedicalNo"
                                               class="col-sm-2 col-form-label">MRN<code>*</code></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="MedicalNo" name="MedicalNo" value="{{$pasien->MedicalNo}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{$pasien->PatientName}}"/>
                                        </div>
                                        <label for="catatan_khusus" class="col-sm-2 col-form-label">Catatan Khusus</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="catatan_khusus"
                                                   name="catatan_khusus"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempat_lahir"
                                                   name="tempat_lahir" value="{{$pasien->CityOfBirth}}"/>
                                        </div>
                                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input autocomplete="off" type="text" class="form-control"
                                                   name="tanggal_lahir" id="tanggal_lahir" value="{{$pasien->DateOfBirth}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-4">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                <option value=""></option>
                                                <option value="0001^M" {{ $pasien->GCSex === '0001^M' ? 'selected':'' }}>Laki-laki</option>
                                                <option value="0001^F" {{ $pasien->GCSex === '0001^F' ? 'selected':'' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <label for="GCBloodType" class="col-sm-2 col-form-label">Gol. Darah</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="GCBloodType"
                                                   name="GCBloodType" value="{{$pasien->GCBloodType}}"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="BloodRhesus"
                                                   name="BloodRhesus" value="{{$pasien->BloodRhesus}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="GCReligion" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-4">
                                            <select id="GCReligion" name="GCReligion" class="form-control">
                                                <option value=""></option>
                                                <option value="0006^BUD" {{ $pasien->GCReligion === '0006^BUD' ? 'selected':'' }}>Buddhist</option>
                                                <option value="0006^CHR" {{ $pasien->GCReligion === '0006^CHR' ? 'selected':'' }}>Christian</option>
                                                <option value="0006^CNF" {{ $pasien->GCReligion === '0006^CNF' ? 'selected':'' }}>Confucian (Kong Fu Cu)</option>
                                                <option value="0006^CTH" {{ $pasien->GCReligion === '0006^CTH' ? 'selected':'' }}>Catholic</option>
                                                <option value="0006^HIN" {{ $pasien->GCReligion === '0006^HIN' ? 'selected':'' }}>Hindu</option>
                                                <option value="0006^MOS" {{ $pasien->GCReligion === '0006^MOS' ? 'selected':'' }}>Muslim</option>
                                                <option value="0006^OTH" {{ $pasien->GCReligion === '0006^OTH' ? 'selected':'' }}>Other</option>
                                            </select>
                                        </div>
                                        <label for="GCNationality" class="col-sm-2 col-form-label">Kebangsaan</label>
                                        <div class="col-sm-4">
                                            <select id="GCNationality" name="GCNationality" class="form-control">
                                                <option value=""></option>
                                                <option>Indonesia</option>
                                                <option>Amerika</option>
                                                <option value="X0014^001" {{ $pasien->GCNationality === 'X0014^001' ? 'selected':'' }}>Indonesian</option>
                                                <option value="X0014^002" {{ $pasien->GCNationality === 'X0014^002' ? 'selected':'' }}>China</option>
                                                <option value="X0014^003" {{ $pasien->GCNationality === 'X0014^003' ? 'selected':'' }}>England</option>
                                                <option value="X0014^004" {{ $pasien->GCNationality === 'X0014^004' ? 'selected':'' }}>French</option>
                                                <option value="X0014^005" {{ $pasien->GCNationality === 'X0014^005' ? 'selected':'' }}>Japan</option>
                                                <option value="X0014^006" {{ $pasien->GCNationality === 'X0014^006' ? 'selected':'' }}>Korea</option>
                                                <option value="X0014^007" {{ $pasien->GCNationality === 'X0014^007' ? 'selected':'' }}>Malaysia</option>
                                                <option value="X0014^008" {{ $pasien->GCNationality === 'X0014^008' ? 'selected':'' }}>New Zealand</option>
                                                <option value="X0014^009" {{ $pasien->GCNationality === 'X0014^009' ? 'selected':'' }}>Philippine</option>
                                                <option value="X0014^010" {{ $pasien->GCNationality === 'X0014^010' ? 'selected':'' }}>Singapore</option>
                                                <option value="X0014^011" {{ $pasien->GCNationality === 'X0014^011' ? 'selected':'' }}>Taiwan</option>
                                                <option value="X0014^012" {{ $pasien->GCNationality === 'X0014^012' ? 'selected':'' }}>Thailand</option>
                                                <option value="X0014^013" {{ $pasien->GCNationality === 'X0014^013' ? 'selected':'' }}>America</option>
                                                <option value="X0014^014" {{ $pasien->GCNationality === 'X0014^014' ? 'selected':'' }}>Other</option>
                                                <option value="X0014^015" {{ $pasien->GCNationality === 'X0014^015' ? 'selected':'' }}>India</option>
                                                <option value="X0014^016" {{ $pasien->GCNationality === 'X0014^016' ? 'selected':'' }}>Australia</option>
                                                <option value="X0014^018" {{ $pasien->GCNationality === 'X0014^018' ? 'selected':'' }}>HONG KONG</option>
                                                <option value="X0014^999" {{ $pasien->GCNationality === 'X0014^999' ? 'selected':'' }}>Unknown</option>
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
                                            <select id="status_nikah" name="status_nikah" class="form-control">
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

                                                <option value="X0012^01" {{ $pasien->GCOccupation === 'X0012^01' ? 'selected':'' }}>Karyawan Swasta</option>
                                                <option value="X0012^02" {{ $pasien->GCOccupation === 'X0012^02' ? 'selected':'' }}>Pegawai Negeri</option>
                                                <option value="X0012^03" {{ $pasien->GCOccupation === 'X0012^03' ? 'selected':'' }}>Other</option>
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
                                                   value="{{$pasien->MobilePhoneNo1}}"/>
                                        </div>
                                        <label for="telepon_2" class="col-sm-2 col-form-label">No. Telepon 2</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="telepon_2" name="telepon_2" {{$pasien->MobilePhoneNo2}}/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="provinsi" class="col-sm-2 col-form-label ">Provinsi</label>
                                        <div class="col-sm-4">
                                            <select id="provinsi" name="provinsi" class="form-control select2bs4"
                                                    onchange="getKotaKabupaten()">
                                                <option value=""></option>

                                            </select>
                                        </div>
                                        <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                        <div class="col-sm-4">
                                            <select id="kota" name="kota" class="form-control select2bs4" onchange="getDistricts()">
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
                                            <input type="text" class="form-control" id="PatientAddress"
                                                   name="PatientAddress" value="{{$pasien->PatientAddress}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <!-- /.col-md-6 -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header d-flex">
                                    <h5 class="card-title">Data Registrasi</h5>
                                </div>
                                <div class="card-body">
                                                <!-- /.card-header -->
                                    <table id="detailtable" class="w-100 table table-bordered table-hover">
                                        <thead>
                                                <tr>
                                                    <th class="text-sm">Aksi</th>
                                                    <th class="text-sm">No Registrasi</th>
                                                    <th class="text-sm">Tanggal Registrasi</th>
                                                    <th class="text-sm">Nama Pasien</th>
                                                    <th class="text-sm">MRN</th>
                                                    <th class="text-sm">Nama Dokter</th>
                                                    <th class="text-sm">Loc</th>
                                                    <th class="text-sm">Metode Pembayaran</th>

                                                 </tr>
                                        </thead>
                                    </table>
                                                <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
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
@push('nyaa_scripts')
    <!-- Page specific script -->
    <script>
        $(function() {
          load_data();
        });


function load_data(){
  $('#detailtable').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100, 200, 500],
    ajax: {
      url: "{{ url()->current() }}",
      type: "POST",
      headers: {
        "X-HTTP-Method-Override": "GET"
      }
    },
    columns: [
      {
        data: "aksi_data",
        orderable: false,
        searchable: false,
      },
      {
        data: "reg_no",
        name: "m_registrasi.reg_no",
        orderable: true,
        searchable: true,
      },
      {
        data: "reg_tgl",
        name: "m_registrasi.reg_tgl",
        orderable: true,
        searchable: true,
      },
      {
        data: "PatientName",
        name: "m_pasien.PatientName",
        orderable: true,
        searchable: true,
      },
      {
        data: "reg_medrec",
        name: "m_registrasi.reg_medrec",
        orderable: true,
        searchable: true,
      },
      {
        data: "ParamedicName",
        name: "m_paramedis.ParamedicName",
        orderable: true,
        searchable: true,
      },
      {
        data: "nama_ruangan",
        name: "m_ruangan_baru.nama_ruangan",
        orderable: true,
        searchable: true,
      },
      {
        data: "reg_cara_bayar",
        name: "m_registrasi.reg_cara_bayar",
        orderable: true,
        searchable: true,
      },
    ],
  });
}
    </script>
@endpush

