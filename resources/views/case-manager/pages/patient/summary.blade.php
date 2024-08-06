@extends('case-manager.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item text-sm"><a class="nav-link active" href="#patient-summary"
                                                        data-toggle="tab">Patient Summary</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#pc-compare"
                                                        data-toggle="tab">PC Compare</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#prev-episode"
                                                        data-toggle="tab">Previous Episode</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="patient-summary">
                            <div class="form-group">
                                <label for="" class="text-sm">Diagnose</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">No Registrasi</th>
                                        <th class="text-sm">Subject</th>
                                        <th class="text-sm">Object</th>
                                        <th class="text-sm">Assessment</th>
                                        <th class="text-sm">Planning</th>
                                        <th class="text-sm">Tanggal Diagnosa</th>
                                    </tr>
                                    @if($soap)
                                        <tr>
                                            <td class="text-sm">{{$soap->soapdok_reg}}</td>
                                            <td class="text-sm">{{$soap->soapdok_subject}}</td>
                                            <td class="text-sm">{{$soap->soapdok_object}}</td>
                                            <td class="text-sm">{{$soap->soapdok_assesment}}</td>
                                            <td class="text-sm">{{$soap->soapdok_planning}}</td>
                                            <td class="text-sm">{{$soap->created_at}}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Medication</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Laboratory</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">Nama</th>
                                        <th class="text-sm">Diorder Oleh</th>
                                        <th class="text-sm">Tanggal</th>
                                        <th class="text-sm">Catatan</th>
                                    </tr>
                                    @foreach($cpoe_labor as $l)
                                        <tr>
                                            <td class="text-sm">{{$l->laboratory->nama}}</td>
                                            <td class="text-sm">{{$l->paramedic->ParamedicName}}</td>
                                            <td class="text-sm">{{$l->planing_start_date}}</td>
                                            <td class="text-sm">{{$l->notes ? : '-'}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Imaging</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">Nama</th>
                                        <th class="text-sm">Diorder Oleh</th>
                                        <th class="text-sm">Tanggal</th>
                                        <th class="text-sm">Catatan</th>
                                    </tr>
                                    @foreach($cpoe_imaging as $i)
                                        <tr>
                                            <td class="text-sm">{{$i->imaging->nama}}</td>
                                            <td class="text-sm">{{$i->paramedic->ParamedicName}}</td>
                                            <td class="text-sm">{{$i->planing_start_date}}</td>
                                            <td class="text-sm">{{$i->notes ? : '-'}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Other Exam</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Monitoring</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Vital Sign</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Nursing Assessment</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Integrated Notes</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="pc-compare">
                            <div class="form-group">
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">Registration No</th>
                                        <th class="text-sm">Physician</th>
                                        <th class="text-sm">Registration Date</th>
                                        <th class="text-sm">Service Unit</th>
                                        <th class="text-sm">Action</th>
                                    </tr>
                                    @foreach($previous_episode as $data)
                                        <tr>
                                            <td class="text-sm">{{$data->reg_no}}</td>
                                            <td class="text-sm">{{$data->physician->ParamedicName}}</td>
                                            <td class="text-sm">{{$data->reg_tanggal}}</td>
                                            <td class="text-sm">{{$data->serviceUnit->ServiceUnitName}}</td>
                                            <td class="text-sm">
                                                <a href="{{route('dokter.patient.detail.pc.compare',['patient'=>$patient->reg_no])}}"
                                                   target="_blank" class="btn btn-sm btn-outline-success"><i
                                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="prev-episode">
                            <div class="form-group">
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">Registration No</th>
                                        <th class="text-sm">Physician</th>
                                        <th class="text-sm">Registration Date</th>
                                        <th class="text-sm">Service Unit</th>
                                        <th class="text-sm">Action</th>

                                    </tr>
                                    @foreach($previous_episode as $row)
                                        <tr>
                                            <td class="text-sm">{{$row->reg_no}}</td>
                                            <td class="text-sm">{{$row->physician->ParamedicName}}</td>
                                            <td class="text-sm">{{$row->reg_tanggal}}</td>
                                            <td class="text-sm">{{$row->serviceUnit->ServiceUnitName}}</td>
                                            <td class="text-sm">
                                                <a href="{{route('dokter.patient.detail.prev.episode',['patient'=>$patient->reg_no])}}"
                                                   target="_blank" class="btn btn-sm btn-outline-success"><i
                                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('case-manager.components.menu')
            @include('case-manager.components.patient-resume')
        </div>
    </div>
@endsection
