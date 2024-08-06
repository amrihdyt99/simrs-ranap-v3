@extends('perawat.layouts.app')
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
                                <table class="table table-sm table-bordered table-hover dt">
                                    <thead>
                                    <tr>
                                        <th class="text-sm">No Registrasi</th>
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
                                            <td class="text-sm">{{$row->soaper_reg}}</td>
                                            <td class="text-sm">{{$row->soaper_subject}}</td>
                                            <td class="text-sm">{{$row->soaper_object}}</td>
                                            <td class="text-sm">{{$row->soaper_assesment}}</td>
                                            <td class="text-sm">{{$row->soaper_planning}}</td>
                                            <td class="text-sm">{{$row->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
                                        <th class="text-sm">Item Name</th>
                                        <th class="text-sm">Result Value</th>
                                        <th class="text-sm">Unit</th>
                                        <th class="text-sm">Time Process</th>
                                        <th class="text-sm">Time Process</th>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">No Parent</td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">CPOE - Imaging</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
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
                        <div class="tab-pane" id="patient-info">
                            <div class="form-group">
                                <label for="" class="text-sm">Patient Data</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <td class="text-sm">Medical No</td>
                                        <td class="text-sm">{{ $registrationInap->med_rec }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Patient Name</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->PatientName }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Religion</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCReligion }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Race</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCRace }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Occupation</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCOccupation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Marital</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCMaritalStatus }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Education</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCEducation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">Nationality</td>
                                        <td class="text-sm">{{ $registrationInap->pasien->GCNationality }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Allergies, Infectious, Problem</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Payer</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Family Information</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">Data Referral</label>
                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-sm">History of Visits</label>
                                <table class="table table-sm table-bordered table-hover">
                                    <tr>
                                        <th class="text-sm">Registration No</th>
                                        <th class="text-sm">Registration Date</th>
                                        <th class="text-sm">LOS</th>
                                        <th class="text-sm">Discharge Date</th>
                                        <th class="text-sm">Registered Physician</th>
                                        <th class="text-sm">Diagnose</th>
                                        <th class="text-sm">Procedure</th>
                                    </tr>
                                    <tr>
                                        <td class="text-sm">No Parent</td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                    </tr>
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
                                    <tr>
                                        <td class="text-sm">No Parent</td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm"></td>
                                        <td class="text-sm">
                                            <a href="{{route('perawat.patient.detail.prev.episode',['reg_no'=>$registrationInap->reg_no])}}"
                                               target="_blank" class="btn btn-sm btn-success"><i
                                                    class="mr-2 fa fa-clipboard-check"></i>Detail</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('perawat.components.menu')
            @include('perawat.components.patient-resume')
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
