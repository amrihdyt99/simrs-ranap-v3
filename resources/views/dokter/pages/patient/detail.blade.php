@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="text-sm">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI</label>
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
                            @foreach($soap as $row)
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
            </div>
        </div>
        <div class="col-md-2">
{{--                <table class="table table-sm table-bordered table-hover table-info" style="width: 100%">--}}
{{--                    <tr>--}}
{{--                        <th class="text-sm">LOS</th>--}}
{{--                        <th class="text-sm">Med</th>--}}
{{--                        <th class="text-sm">Lab</th>--}}
{{--                        <th class="text-sm">Img</th>--}}
{{--                        <th class="text-sm">Exam</th>--}}
{{--                        <th class="text-sm">Mon</th>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                        <td class="text-sm text-center">&nbsp; </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
            @include('dokter.components.patient-resume', ['patient' => $patient])
        </div>
    </div>
@endsection
