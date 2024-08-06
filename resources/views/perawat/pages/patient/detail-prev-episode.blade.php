@extends('perawat.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="text-sm">Diagnose</label>
                        <table class="table table-sm table-bordered table-hover">
                            <tr>
                                <td class="text-sm">Primary</td>
                                <td class="text-sm">S42.0</td>
                                <td class="text-sm">Fracture of Clavicle</td>
                                <td class="text-sm">Date Time</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Laboratory CPOE</label>
                        <table class="table table-sm table-bordered table-hover">
                            <tr>
                                <td class="text-sm">Hematology Rutin (HR)</td>
                                <td class="text-sm">Status</td>
                                <td class="text-sm">Date Time</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Imaging Exam CPOE</label>
                        <table class="table table-sm table-bordered table-hover">
                            <tr>
                                <td class="text-sm">Thorax AP</td>
                                <td class="text-sm">Status</td>
                                <td class="text-sm">Date Time</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Other Exam CPOE</label>
                        <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Medication CPOE</label>
                        <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Integrated Notes</label>
                        <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">Nursing Notes</label>
                        <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm">e-Doc Management</label>
                        <textarea id="" class="form-control text-sm" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
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
