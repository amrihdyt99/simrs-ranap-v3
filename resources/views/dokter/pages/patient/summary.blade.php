@extends('dokter.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item text-sm"><a class="nav-link active" href="#patient-summary"
                                                        data-toggle="tab">Patient Summary</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#patient-info"
                                                        data-toggle="tab">Patient Information</a>
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
                                <label for="" class="text-sm">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI (DOKTER)</label>
                                <table class="table table-bordered table-hover table-sm dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">TANGGAL</th>
                                        <th class="text-sm">PPA</th>
                                        <th class="text-sm">HASIL ASSESMENT PASIEN DAN PEMBERI LAYANAN</th>
                                        <th class="text-sm">INSTRUKSI PPA TERMASUK PASCA BEDAH</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($soap_dok as $row)
                                        <tr>
                                            <td class="text-sm">{{$row->created_at}}</td>
                                            <td class="text-sm">{{$row->paramedic->ParamedicName}}</td>
                                            <td class="text-sm">
                                                <table>
                                                    <tr>
                                                        <td class="text-sm">S</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soapdok_subject}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">O</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soapdok_object}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">A</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soapdok_assesment}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="text-sm">
                                                <table>
                                                    <tr>
                                                        <td class="text-sm">P</td>
                                                        <td class="text-sm" style="width: 100%">
                                                            <ul class="pl-3">
                                                                <li>{{$row->soapdok_planning}}</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI (PERAWAT)</label>
                                <table class="table table-bordered table-hover table-sm dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">TANGGAL</th>
                                        <th class="text-sm">PPA</th>
                                        <th class="text-sm">HASIL ASSESMENT PASIEN DAN PEMBERI LAYANAN</th>
                                        <th class="text-sm">INSTRUKSI PPA TERMASUK PASCA BEDAH</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($soap_per as $row)
                                        <tr>
                                            <td class="text-sm">{{$row->created_at}}</td>
                                            <td class="text-sm"></td>
                                            <td class="text-sm">
                                                <table>
                                                    <tr>
                                                        <td class="text-sm">S</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soaper_subject}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">O</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soaper_object}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">A</td>
                                                        <td class="text-sm" style="width: 100%">{{$row->soaper_assesment}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="text-sm">
                                                <table>
                                                    <tr>
                                                        <td class="text-sm">P</td>
                                                        <td class="text-sm" style="width: 100%">
                                                            <ul class="pl-3">
                                                                <li>{{$row->soaper_planning}}</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">CPOE - Medication</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - LABORATORY</label>
                                <table class="table table-sm table-bordered table-hover dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">NAMA</th>
                                        <th class="text-sm">PPA</th>
                                        <th class="text-sm">TANGGAL</th>
                                        <th class="text-sm">CATATAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpoe_labor as $l)
                                        <tr>
                                            <td class="text-sm">{{$l->laboratory->nama}}</td>
                                            <td class="text-sm">{{$l->paramedic->ParamedicName}}</td>
                                            <td class="text-sm">{{$l->planing_start_date}}</td>
                                            <td class="text-sm">{{$l->notes ? : '-'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - IMAGING</label>
                                <table class="table table-sm table-bordered table-hover dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">NAMA</th>
                                        <th class="text-sm">PPA</th>
                                        <th class="text-sm">TANGGAL</th>
                                        <th class="text-sm">CATATAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpoe_imaging as $i)
                                        <tr>
                                            <td class="text-sm">{{$i->imaging->nama}}</td>
                                            <td class="text-sm">{{$i->paramedic->ParamedicName}}</td>
                                            <td class="text-sm">{{$i->planing_start_date}}</td>
                                            <td class="text-sm">{{$i->notes ? : '-'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">CPOE - Other Exam</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">CPOE - Monitoring</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Vital Sign</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Nursing Assessment</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Integrated Notes</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="tab-pane" id="patient-info">
                            <div class="form-group">
                                <label for="" class="text-sm">DATA PASIEN</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <td class="text-sm">Medical No</td>
                                        <td class="text-sm">{{ $patient->pasien->MedicalNo ? $patient->pasien->MedicalNo : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Patient Name</td>
                                        <td class="text-sm">{{ $patient->pasien->PatientName ? $patient->pasien->PatientName : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Religion</td>
                                        <td class="text-sm">{{ $patient->pasien->GCReligion ? $patient->pasien->GCReligion : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Race</td>
                                        <td class="text-sm">{{ $patient->pasien->GCRace ? $patient->pasien->GCRace : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Occupation</td>
                                        <td class="text-sm">{{ $patient->pasien->GCOccupation ? $patient->pasien->GCOccupation : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Marital</td>
                                        <td class="text-sm">{{ $patient->pasien->GCMaritalStatus ? $patient->pasien->GCMaritalStatus : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Education</td>
                                        <td class="text-sm">{{ $patient->pasien->GCEducation ? $patient->pasien->GCEducation : "-" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Nationality</td>
                                        <td class="text-sm">{{ $patient->pasien->GCNationality ? $patient->pasien->GCNationality : "-" }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="text-sm">Address</td>
                                        <td class="text-sm">{{ $patient->pasien->GCAddress }}</td>
                                    </tr> --}}
                                </table>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Allergies, Infectious, Problem</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Payer</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Family Information</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">Data Referral</label>--}}
                            {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="" class="text-sm">History of Visits</label>--}}
                            {{--                                <table class="table table-sm table-bordered table-hover">--}}
                            {{--                                    <tr>--}}
                            {{--                                        <th class="text-sm">Registration No</th>--}}
                            {{--                                        <th class="text-sm">Registration Date</th>--}}
                            {{--                                        <th class="text-sm">LOS</th>--}}
                            {{--                                        <th class="text-sm">Discharge Date</th>--}}
                            {{--                                        <th class="text-sm">Registered Physician</th>--}}
                            {{--                                        <th class="text-sm">Diagnose</th>--}}
                            {{--                                        <th class="text-sm">Procedure</th>--}}
                            {{--                                    </tr>--}}
                            {{--                                    <tr>--}}
                            {{--                                        <td class="text-sm">No Parent</td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                        <td class="text-sm"></td>--}}
                            {{--                                    </tr>--}}
                            {{--                                </table>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="tab-pane" id="pc-compare">
                            <div class="form-group">
                                <table class="table table-sm table-bordered table-hover dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">No Registrasi</th>
                                        <th class="text-sm">Nama Dokter</th>
                                        <th class="text-sm">Tanggal Registrasi</th>
                                        <th class="text-sm">Service Unit</th>
                                        <th class="text-sm">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($previous_episode as $row)
                                        <tr>
                                            <td class="text-sm">{{$row->reg_no}}</td>
                                            <td class="text-sm">{{$row->physician->ParamedicName}}</td>
                                            <td class="text-sm">{{$row->reg_tgl}}</td>
                                            <td class="text-sm">{{$row->serviceUnit->ServiceUnitName}}</td>
                                            <td class="text-sm">
                                                <a href="{{route('dokter.patient.detail.pc.compare',['patient'=>$row->reg_no])}}"
                                                   target="_blank" class="btn btn-sm btn-outline-success"><i
                                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="prev-episode">
                            <div class="form-group">
                                <table class="table table-sm table-bordered table-hover dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">No Registrasi</th>
                                        <th class="text-sm">Nama Dokter</th>
                                        <th class="text-sm">Tanggal Registrasi</th>
                                        <th class="text-sm">Service Unit</th>
                                        <th class="text-sm">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($previous_episode as $row)
                                        <tr>
                                            <td class="text-sm">{{$row->reg_no}}</td>
                                            <td class="text-sm">{{$row->physician->ParamedicName}}</td>
                                            <td class="text-sm">{{$row->reg_tgl}}</td>
                                            <td class="text-sm">{{$row->serviceUnit->ServiceUnitName}}</td>
                                            <td class="text-sm">
                                                <a href="{{route('dokter.patient.detail.prev.episode',['patient'=>$row->reg_no])}}"
                                                   target="_blank" class="btn btn-sm btn-outline-success"><i
                                                        class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('dokter.components.menu')
            @include('dokter.components.patient-resume')
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        $(function () {
            $('.dt').DataTable({
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
