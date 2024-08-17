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
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Detail Pasien</h5>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="MedicalNo"
                  class="col-sm-2 form-label">Nama Pasien</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="med_rec" name="med_rec" value="{{$patient->PatientName}}" disabled />
                </div>
              </div>
              <div class="form-group row">
                <label for="MedicalNo"
                  class="col-sm-2 form-label">MRN</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="med_rec" name="med_rec" value="{{$cpptData->med_rec}}" disabled />
                </div>
              </div>
              <div class="form-group row">
                <label for="MedicalNo"
                  class="col-sm-2 form-label">Nomor Registrasi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="med_rec" name="med_rec" value="{{$cpptData->soapdok_reg}}" disabled />
                </div>
              </div>
              <div class="form-group row">
                <label for="MedicalNo"
                  class="col-sm-2 form-label">Dokter</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="med_rec" name="med_rec" value="{{$cpptData->nama_verifikasi}}" disabled />
                </div>
              </div>
              <div class="form-group row">
                <label for="MedicalNo"
                  class="col-sm-2 form-label">Tanggal Pengisian</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="med_rec" name="med_rec" value="{{$cpptData->soap_tanggal}}" disabled />
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>

      <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @push('nyaa_scripts')
  <!-- Page specific script -->
  <script>
    $(function() {
      load_data();
    });


    function load_data() {
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
        columns: [{
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