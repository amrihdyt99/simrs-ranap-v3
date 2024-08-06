@extends('dokter.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <button class="btn btn-sm btn-outline-primary float-right ml-2" data-toggle="modal"
                            data-target="#add-soap"><i class="fa fa-plus mr-2"></i>Tambah SOAP
                    </button>
{{--                    <a href="" class="btn btn-sm btn-outline-primary float-right">Click Here to Sign</a>--}}
                    <strong class="text-sm text-primary">{{Auth::user()->name}}</strong><br>
                    <span class="text-sm text-muted">{{now()->toDateTimeString()}}</span>
                </div>
                <div class="p-2">
                    <table class="table table-sm table-bordered table-hover soap">
                        <thead>
                        <tr>
                            <th class="text-sm">Subject</th>
                            <th class="text-sm">Object</th>
                            <th class="text-sm">Assessment</th>
                            <th class="text-sm">Planning</th>
                            <th class="text-sm">Tanggal Diagnosa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($soap as $row)
                            <tr>
                                <td class="text-sm">{{$row->soapdok_subject}}</td>
                                <td class="text-sm">{{$row->soapdok_object}}</td>
                                <td class="text-sm">{{$row->soapdok_assesment}}</td>
                                <td class="text-sm">{{$row->soapdok_planning}}</td>
                                <td class="text-sm">{{$row->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                    <div class="card-body">--}}
                {{--                        <strong class="text-sm text-primary">SOAP</strong>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="" class="text-sm">SUBJECTIVE</label>--}}
                {{--                            <textarea id="" class="form-control text-sm" rows="4"--}}
                {{--                                      disabled>{{$soap->soapdok_subject}}</textarea>--}}
                {{--                        </div>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="" class="text-sm">OBJECTIVE</label>--}}
                {{--                            <textarea id="" class="form-control text-sm" rows="4"--}}
                {{--                                      disabled>{{$soap->soapdok_object}}</textarea>--}}
                {{--                        </div>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="" class="text-sm">ASSESSMENT</label>--}}
                {{--                            <textarea id="" class="form-control text-sm" rows="4"--}}
                {{--                                      disabled>{{$soap->soapdok_assesment}}</textarea>--}}
                {{--                        </div>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="" class="text-sm">PLANNING</label>--}}
                {{--                            <textarea id="" class="form-control text-sm" rows="4"--}}
                {{--                                      disabled>{{$soap->soapdok_planning}}</textarea>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
            </div>
        </div>
        <div class="col-md-2">
            @include('dokter.components.menu')
            @include('dokter.components.patient-resume')
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
                <form action="{{route('diagnose.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" name="soapdok_reg" value="{{$patient->reg_no}}" hidden>
                            <input type="number" name="soapdok_dokter" value="{{$patient->physician->ParamedicID}}"
                                   hidden>
                            <input type="text" name="soapdok_poli" value="{{$patient->ruangan}}" hidden>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Subjective</label>
                                    <textarea class="form-control text-sm" name="soapdok_subject"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Objective</label>
                                    <textarea class="form-control text-sm" name="soapdok_object"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Assessment</label>
                                    <textarea class="form-control text-sm" name="soapdok_assesment"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Planning</label>
                                    <textarea class="form-control text-sm" name="soapdok_planning"
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
