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
                                <h3 class="card-title">Data Pendaftaraan Rajal  </h3>
                                {{-- <a href="{{ route('register.igd.create') }}" class="btn btn-success btn-sm ml-auto">Tambah
                                    Data</a> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No. Registerasi</th>
                                            <th>MRN</th>
                                            <th>Nama Pasien</th>
                                            <th>Dokter</th>
                                            <th>Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row['ranap_tanggal'] ?? '-' }}</td>
                                                <td>{{ $row['ranap_reg'] ?? '-' }}</td>
                                                <td>{{ $row['reg_medrec'] ?? '-'}}</td>
                                                <td>{{ $row['nama_pasien'] ?? '-' }}</td>
                                                <td>{{ $row['ranap_dpjp'] ?? '-' }}</td>
                                                <td>-</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" onclick="handleGetSuratPernyataanRanap({{ json_encode($row['ranap_reg']) }})">
                                                        Slip Pernyataan
                                                      </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelRegModal" onclick="cancelRegistrationToRanap({{ json_encode($row) }})">
                                                        Batalkan
                                                    </button>
                                                    <button class="btn btn-sm btn-primary" onclick="handleRegistrasiRanap({{ json_encode($row) }})">
                                                        <i class="fa fa-plus"></i>
                                                        <span>Registrasi Ranap</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

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

        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Surat Pernyataan Rawat Inap</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="slip-pernyataan-ranap">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@push('nyaa_scripts')
    <script>
        let registration_number = ""
        let patient_name = ""
        let medrec_no = ""
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        const handleRegistrasiRanap = (data)=>{
            // show confirm dialog with SweetAlert
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin ingin mendaftarkan pasien ini ke rawat inap?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, daftarkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "{{ route('register.rajal.store') }}"
                    const payload = {
                        ...data,
                        _token: "{{ csrf_token() }}"
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: payload,
                        dataType: "json",
                        success: function (response) {
                            Swal.fire(
                                'Berhasil!',
                                'Pasien berhasil didaftarkan ke rawat inap.',
                                'success'
                            )
                            // reload the page
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat mendaftarkan pasien ke rawat inap.',
                                'error'
                            )
                        }
                    });
                }
            });
        }

        const formatRegNo = (reg_no)=>{
            return reg_no.split('/').join('_')
        }

        const cancelRegistrationToRanap = (data)=>{
            console.log(data)
            registration_number = formatRegNo(data.ranap_reg)
            $("#registration_number").text(`No. Registrasi: ${data.ranap_reg}`)
            patient_name = data.nama_pasien
            medrec_no = data.reg_medrec
        }
        const handleCancelRegistration = ()=>{
            const cancelation_reason = $("#cancelation_reason").val()
            const url = "{{ route('cancel_registration', ':id') }}"
            const formatted_url = url.replace(':id', registration_number)

            // trigger dismiss modal cancelRegModal
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: formatted_url,
                data: {
                    cancelation_reason,
                    patient_name,
                    medrec_no,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (response) {
                    Swal.fire(
                        'Berhasil!',
                        'Pendaftaran berhasil dibatalkan.',
                        'success'
                    )
                    // reload the page
                    location.reload();
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat membatalkan pendaftaran.',
                        'error'
                    )
                }
            });
            $('#closeModalCancel').trigger('click')
            resetFormCancelReg()
        }

        const resetFormCancelReg = ()=>{
            registration_number = ""
            $("#cancelation_reason").val("")
            patient_name = ""
            medrec_no = ""
        }

        const handleGetSuratPernyataanRanap = (ranap_reg)=>{
            const url = "{{ route('register.slip-register.rajal', ':id') }}"
            const formatted_url = url.replace(':id', ranap_reg)
            console.log(formatted_url)

            $.ajax({
                type: "GET",
                url: formatted_url,
                success: function (response) {
                    $("#slip-pernyataan-ranap").html(response)
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat mengambil data.',
                        'error'
                    )
                }
            });
        }
    </script>
@endpush
