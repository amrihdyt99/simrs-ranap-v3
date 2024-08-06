@extends('dokter.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="text-sm">Diagnose</label>
                        <textarea id="" class="form-control text-sm" rows="4"></textarea>
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
            </div>
        </div>
        <div class="col-md-2">
                <table class="table table-sm table-bordered table-hover table-info" style="width: 100%">
                    <tr>
                        <th class="text-sm">LOS</th>
                        <th class="text-sm">Med</th>
                        <th class="text-sm">Lab</th>
                        <th class="text-sm">Img</th>
                        <th class="text-sm">Exam</th>
                        <th class="text-sm">Mon</th>
                    </tr>
                    <tr>
                        <td class="text-sm text-center">&nbsp; </td>
                        <td class="text-sm text-center">&nbsp; </td>
                        <td class="text-sm text-center">&nbsp; </td>
                        <td class="text-sm text-center">&nbsp; </td>
                        <td class="text-sm text-center">&nbsp; </td>
                        <td class="text-sm text-center">&nbsp; </td>
                    </tr>
                </table>
            @include('dokter.components.patient-resume')
        </div>
    </div>
@endsection
