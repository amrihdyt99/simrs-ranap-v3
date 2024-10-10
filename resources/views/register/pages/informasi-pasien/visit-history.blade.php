@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

@include('register.layouts.menu')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">Riwayat Kunjungan Pasien</h3>
                  </div>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 ml-4 mt-4 mr-2 mb-3">
                @empty($data_pasien)
                    <div class="alert alert-danger" role="alert">
                        Data pasien tidak ditemukan
                    </div>
                @else
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 d-flex justify-content-between">
                                <span>MRN</span>
                                <h5 class="font-weight-bold">{{ $data_pasien->MedicalNo }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 d-flex justify-content-between">
                                <span>Nama Pasien</span>
                                <h5 class="font-weight-bold">{{ $data_pasien->PatientName }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 d-flex justify-content-between">
                                <span>Tempat, Tanggal Lahir</span>
                                <h5 class="font-weight-bold">{{ $data_pasien->CityOfBirth }}, {{ \Carbon\Carbon::parse($data_pasien->DateOfBirth)->format('d F Y') }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 d-flex justify-content-between">
                                <span>Jenis Kelamin</span>
                                <h5 class="font-weight-bold">
                                    @if ($data_pasien->GCSex=== '0001^M')
                                        Laki-Laki
                                    @elseif($data_pasien->GCSex=== '0001^F')
                                        Perempuan
                                    @else
                                        -
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#ranap" type="button" role="tab" aria-controls="home" aria-selected="true">Ranap</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#rajal" type="button" role="tab" aria-controls="profile" aria-selected="false">Rajal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#igd" type="button" role="tab" aria-controls="contact" aria-selected="false">IGD</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="ranap" role="tabpanel" aria-labelledby="home-tab">
                            @include('register.pages.informasi-pasien.riwayat-kunjungan.ranap')
                        </div>
                        <div class="tab-pane fade" id="rajal" role="tabpanel" aria-labelledby="profile-tab">
                            @include('register.pages.informasi-pasien.riwayat-kunjungan.rajal')
                        </div>
                        <div class="tab-pane fade" id="igd" role="tabpanel" aria-labelledby="contact-tab">
                            @include('register.pages.informasi-pasien.riwayat-kunjungan.igd')
                        </div>
                    </div>
                @endempty
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@push('nyaa_scripts')
<script>
    const medrec = '{{ $data_pasien->MedicalNo ?? '' }}';    
    
    $(document).ready(function() {
        let urlHistoryRanap = '{{ route("pasien.visit.history.ranap", ":med") }}';
        let urlHistoryRajal = '{{ route("pasien.visit.history.rajal", ":med") }}';
        let urlHistoryIgd = '{{ route("pasien.visit.history.igd", ":med") }}';
        urlHistoryRanap = urlHistoryRanap.replace(':med', medrec);
        urlHistoryRajal = urlHistoryRajal.replace(':med', medrec);
        urlHistoryIgd = urlHistoryIgd.replace(':med', medrec);
        $('#ranapTable').DataTable({
            processing: true,
            ajax: {
                url: urlHistoryRanap,
            },
            columns: [
                {data: 'reg_no', name: 'reg_no', orderable: true, searchable: true},
                {data: 'reg_tgl', name: 'reg_tgl', orderable: true, searchable: true},
                {data: 'asal_pasien', name: 'asal_pasien', orderable: true, searchable: true},
                {data: 'dokter', name: 'dokter', orderable: true, searchable: true},
                {data: 'kelas', name: 'kelas', orderable: true, searchable: true},
                {data: 'ruangan', name: 'ruangan', orderable: true, searchable: true},
                {data: 'cara_bayar', name: 'cara_bayar', orderable: true, searchable: true},
            ]
        });
        $("#rajalTable").DataTable({
            processing:true,
            ajax: {
                url: urlHistoryRajal,
            },
            columns: [
                {data: 'reg_no', name: 'reg_no', orderable: true, searchable: true},
                {data: 'reg_date', name: 'reg_date', orderable: true, searchable: true},
                {data: 'reg_time', name: 'reg_time', orderable: true, searchable: true},
                {data: 'reg_poly', name: 'reg_poly', orderable: true, searchable: true},
                {data: 'reg_doctor', name: 'reg_doctor', orderable: true, searchable: true},
            ]
        })
        $("#igdTable").DataTable({
            processing:true,
            ajax: {
                url: urlHistoryIgd,
            },
            columns:[
                {data: 'reg_no', name: 'reg_no', orderable: true, searchable: true},
                {data: 'tanggal', name: 'tanggal', orderable: true, searchable: true},
                {data: 'poli', name: 'poli', orderable: true, searchable: true},
                {data: 'dokter', name: 'dokter', orderable: true, searchable: true},
                {data: 'kelas', name: 'kelas', orderable: true, searchable: true},
                {data: 'kelas_bayar', name: 'kelas_bayar', orderable: true, searchable: true},
                {data: 'cara_bayar', name: 'cara_bayar', orderable: true, searchable: true},
            ]
        })
    });

    const handleFilterDateRanap = async()=>{
        const startDate = $('#start_date_ranap').val();
        const endDate = $('#end_date_ranap').val();
        const limit = $('#limit').val();
        const urlHistoryRanap = '{{ route("pasien.visit.history.ranap", ":med") }}';
        const url = urlHistoryRanap.replace(':med', medrec) + `?start=${startDate}&end=${endDate}&limit=${limit}`;
        $('#ranapTable').DataTable().ajax.url(url).load();
    }

    const handleFilterDateRajal = async()=>{
        const startDate = $('#start_date_rajal').val();
        const endDate = $('#end_date_rajal').val();
        const urlHistoryRajal = '{{ route("pasien.visit.history.rajal", ":med") }}';
        const url = urlHistoryRajal.replace(':med', medrec) + `?start=${startDate}&end=${endDate}`;
        $('#rajalTable').DataTable().ajax.url(url).load();
    }
</script>
@endpush