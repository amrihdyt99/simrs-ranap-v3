@extends('perawat.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <button class="btn btn-sm btn-outline-primary float-right ml-2" data-toggle="modal"
                            data-target="#add-soap"><i class="fa fa-plus mr-2"></i>Tambah SOAP
                    </button>
                    <a href="" class="btn btn-sm btn-outline-primary float-right">Click Here to Sign</a>
                    <strong class="text-sm text-primary">Doctor's Name</strong><br>
                    <span class="text-sm text-muted">Date Time</span>
                </div>
                <div class="p-2">
                    <table class="table table-sm table-bordered table-hover soap">
                        <thead>
                        <tr>
                            <th class="text-sm">Subject</th>
                            <th class="text-sm">Object</th>
                            <th class="text-sm">Assessment</th>
                            <th class="text-sm">Planning</th>
                            <th class="text-sm">Perawat</th>
                            <th class="text-sm">Tanggal Diagnosa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($soap as $row)
                            <tr>
                                <td class="text-sm">{{$row->soaper_subject}}</td>
                                <td class="text-sm">{{$row->soaper_object}}</td>
                                <td class="text-sm">{{$row->soaper_assesment}}</td>
                                <td class="text-sm">{{$row->soaper_planning}}</td>
                                <td class="text-sm">{{$row->soaper_perawat}}</td>
                                <td class="text-sm">{{$row->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('perawat.components.menu')
            @include('perawat.components.patient-resume')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-soap" tabindex="-1" aria-labelledby="addSoapLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title" id="addSoapLabel">SOAP</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('perawat.diagnose.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" name="soaper_reg" value="{{$registrationInap->reg_no}}" hidden>
                            <input type="number" name="soaper_dokter" value="{{\Illuminate\Support\Facades\Auth::user()->perawat_idD}}"
                                   hidden>
                            <input type="text" name="soaper_poli" value="{{$registrationInap->ruangan}}" hidden>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Subjective</label>
                                    <textarea class="form-control text-sm" name="soaper_subject"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Objective</label>
                                    <textarea class="form-control text-sm" name="soaper_object"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Assessment</label>
                                    <textarea class="form-control text-sm" name="soaper_assesment"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Planning</label>
                                    <textarea class="form-control text-sm" name="soaper_planning"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-danger " data-dismiss="modal"><i
                                class="fa fa-times mr-2"></i>Close
                        </button>
                        <button class="btn btn-sm btn-outline-primary" type="submit"><i class="fa fa-save mr-2"></i>Save
                        </button>
                    </div>
                </form>


                <div class="card card-default">
                    <div class="card-header">
                        <strong class="text-sm">Note</strong>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <input type="text" name="reg_no" value="{{$registrationInap->reg_no}}" hidden>
                        <input type="text" name="verifikasi_nurse" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="text-sm">Tanggal Note</label>
                                        <input type="datetime-local" class="form-control form-control-sm text-sm"
                                               name="tgl_pemberian">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="ketuban-opt-1">
                                            <label class="form-check-label text-sm" for="">
                                                Need Approval
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="text-sm">Catatan Nurse</label>
                                        <textarea class="form-control form-control-sm text-sm"
                                                  name="catatan"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>

                        </div>
                    </form>

                    @push('addon-script')
                        <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
                        <!-- dropzonejs -->
                        <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
                        <script>
                            $(function () {
                                //Initialize Select2 Elements
                                $('.select2').select2()

                                //Initialize Select2 Elements
                                $('.select2bs4').select2({
                                    theme: 'bootstrap4'
                                })
                            })
                        </script>
                    @endpush
                </div>

            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        $(function () {
            $('.soap').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
@endpush
