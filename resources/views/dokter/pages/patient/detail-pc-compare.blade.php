@extends('dokter.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="text-sm">Diagnose</label>
                        <table class="table table-bordered table-hover table-sm dt">
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
                                    <td class="text-sm">{{$row->soapdok_reg}}</td>
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
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="" class="text-sm">CPOE - Medication</label>--}}
                    {{--                                <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>--}}
                    {{--                            </div>--}}
                    <div class="form-group">
                        <label for="" class="text-sm">CPOE - Laboratory</label>
                        <table class="table table-sm table-bordered table-hover dt">
                            <thead>
                            <tr>
                                <th class="text-sm">Nama</th>
                                <th class="text-sm">Diorder Oleh</th>
                                <th class="text-sm">Tanggal</th>
                                <th class="text-sm">Catatan</th>
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
                        <label for="" class="text-sm">CPOE - Imaging</label>
                        <table class="table table-sm table-bordered table-hover dt">
                            <thead>
                            <tr>
                                <th class="text-sm">Nama</th>
                                <th class="text-sm">Diorder Oleh</th>
                                <th class="text-sm">Tanggal</th>
                                <th class="text-sm">Catatan</th>
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
