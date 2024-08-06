@extends('case-manager.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Form B
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal / Jam</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Pelaksanaan MPP</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Monitoring</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Identifikasi Masalah dan Risiko Kesempatan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Fasilitasi, Koordinasi, dan Komunikasi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kolaborasi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Advokasi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Hasil Pelayanan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Terminasi MPP</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success float-right">Simpan</button>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        @include('case-manager.components.menu')
        @include('case-manager.components.patient-resume')
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
            <form action="{{route('casemanager.diagnose.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="soapdok_reg" value="{{$patient->reg_no}}" hidden>
                        <input type="number" name="soapdok_dokter" value="{{$patient->physician->ParamedicID}}" hidden>
                        <input type="text" name="soapdok_poli" value="{{$patient->ruangan}}" hidden>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Subjective</label>
                                <textarea class="form-control text-sm" name="soapdok_subject" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Objective</label>
                                <textarea class="form-control text-sm" name="soapdok_object" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Assessment</label>
                                <textarea class="form-control text-sm" name="soapdok_assesment" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Planning</label>
                                <textarea class="form-control text-sm" name="soapdok_planning" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-danger " data-dismiss="modal"><i class="fa fa-times mr-2"></i>Close
                    </button>
                    <button class="btn btn-sm btn-outline-primary" type="submit"><i class="fa fa-save mr-2"></i>Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection