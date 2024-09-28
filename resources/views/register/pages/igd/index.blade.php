@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')

@include('register.layouts.menu')

    <!-- Content Wrapper. Contains page content -->
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
                            <div class="card-header d-flex">
                                <h3 class="card-title">Pendaftaraan Rawat IGD </h3>
                                <a href="{{ route('register.igd.create') }}" class="btn btn-success btn-sm ml-auto">Tambah
                                    Data</a>
                                </div>
                                <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-4">
                                                <label for="tgl_awal">Tanggal Awal</label>
                                                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                                            </div>
                                            <div class="col-sm-12 col-lg-4">
                                                <label for="tgl_akhir">Tanggal Akhir</label>
                                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                                            </div>
                                            <div class="col-sm-12 col-lg-4" style="position: relative;">
                                                <button class="btn btn-primary" onclick="filterRegistration()" style="position: absolute; bottom:0;">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. Registerasi</th>
                                            <th>MRN</th>
                                            <th>Nama Pasien</th>
                                            <th>Dokter DPJP</th>
                                            <th>Kelas Ruang</th>
                                            <th>Kelas Bayar</th>
                                            <th>Req Ruangan</th>
                                            <th>Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
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

            <div class="modal fade" id="cancelRegModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title" id="exampleModalLabel">Cancel Registration</h5>
                            <h6 id="registration_number"></h6>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alasan Pembatalan</label>
                            <textarea class="form-control" id="cancelation_reason" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModalCancel">Close</button>
                      <button type="button" class="btn btn-danger" onclick="handleCancelRegistration()">Ya, Batalkan</button>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('nyaa_scripts')
    <script>

        let data_igd;

        $('#example2').DataTable({
            responsive: true,
            ajax: {
                url: '{{ route("register.igd.index") }}',
                type: 'GET',
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'reg_tgl',
                    name: 'reg_tgl',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_reg',
                    name: 'ranap_reg',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'reg_medrec',
                    name: 'reg_medrec',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'nama_pasien',
                    name: 'nama_pasien',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_dpjp',
                    name: 'ranap_dpjp',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_class',
                    name: 'ranap_class',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_charge_class',
                    name: 'ranap_charge_class',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_room',
                    name: 'ranap_room',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ranap_business_partner',
                    name: 'ranap_business_partner',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
        });

        const filterRegistration = ()=>{
            let tgl_awal = $('#tgl_awal').val();
            let tgl_akhir = $('#tgl_akhir').val();
            $('#example2').DataTable().destroy();
            $('#example2').DataTable({
                responsive: true,
                ajax: {
                    url: '{{ route("register.igd.index") }}',
                    type: 'GET',
                    data: {
                        start: tgl_awal,
                        end: tgl_akhir
                    }
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'reg_tgl',
                        name: 'reg_tgl',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_reg',
                        name: 'ranap_reg',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'reg_medrec',
                        name: 'reg_medrec',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'nama_pasien',
                        name: 'nama_pasien',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_dpjp',
                        name: 'ranap_dpjp',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_class',
                        name: 'ranap_class',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_charge_class',
                        name: 'ranap_charge_class',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_room',
                        name: 'ranap_room',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'ranap_business_partner',
                        name: 'ranap_business_partner',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
            });
        }

        const registerIGD = async(reg_medrec)=>{
            
            // konfirmasi simpan data
            Swal.fire({
                title: 'Yakin ingin menyimpan data ini?',
                showDenyButton: true,
                confirmButtonText: 'Ya',
                denyButtonText: `Tidak`,
            }).then(async (result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    const data = await getDataPendaftaranIgd(reg_medrec);
                    if(!data || !data.length) return;
                    // get last index
                    const lastIndex = data.length - 1;
                    const lastData = data[lastIndex];

                    // simpan data
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route("register.igd.store-registration") }}',
                        type: 'POST',
                        data: {
                            ...lastData,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response){
                            console.log(response);
                            Swal.fire('Data berhasil disimpan!', '', 'success');
                            $('#example2').DataTable().ajax.reload();
                        },
                        error: function(err){
                            console.log(err);
                            Swal.fire('Data gagal disimpan!', '', 'error');
                        }
                    });
                }
            });
        }

        const getDataPendaftaranIgd = async(reg_medrec)=>{
            const url = `https://rsud.sumselprov.go.id/simrs-rajal/api/igd/pendaftaran?medrec=${reg_medrec}`;
            try {
                const response = await fetch(url);
                const data = await response.json();
                return data;
            } catch (error) {}
        }

        const cancelRegistration = async(reg_medrec)=>{
            const data = await getDataPendaftaranIgd(reg_medrec);
            if(!data || !data.length) return;
            // get last index
            const lastIndex = data.length - 1;
            const lastData = data[lastIndex];
            data_igd = lastData;

            $('#registration_number').text(`No. Registerasi: ${lastData.ranap_reg}`);
        }

        const handleCancelRegistration = ()=>{
            const cancelation_reason = $('#cancelation_reason').val();
            if(!cancelation_reason){
                Swal.fire('Alasan pembatalan harus diisi!', '', 'error');
                return;
            }

            let url = "{{  route('cancel_registration', ':reg_no') }}"
            url = url.replace(':reg_no', data_igd.ranap_reg);


            // simpan data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url,
                type: 'POST',
                data: {
                    medrec_no: data_igd.reg_medrec,
                    patient_name: data_igd.nama_pasien,
                    cancelation_reason,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response){
                    console.log(response);
                    Swal.fire('Data berhasil dibatalkan!', '', 'success');
                    $('#example2').DataTable().ajax.reload();
                    $('#cancelRegModal').modal('hide');
                },
                error: function(err){
                    console.log(err);
                    Swal.fire('Data gagal dibatalkan!', '', 'error');
                }
            });
        }
    </script>
@endpush
