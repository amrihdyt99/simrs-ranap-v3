@extends('dokter.layouts.app')
@section('content')
    <div class="card card-default">
        <form action="{{route('dokter.available.physician.update', $availablePhysician->pkonsultasi_id)}}" method="POST">
            @method('put')
            @csrf
            <div class="card-header">
                <h3 class="card-title">Refer To Consult</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="text" name="pkonsultasi_reg" value="{{$availablePhysician->pkonsultasi_reg}}" hidden>
                    <input type="text" name="pkonsultasi_dokter_kirim"
                           value="{{$availablePhysician->pkonsultasi_dokter_kirim}}"
                           hidden>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="physician-from" style="width: 100%">Dari Dokter</label>
                            <input type="text" class="form-control text-sm form-control-sm" disabled
                                   value="{{$availablePhysician->dokter_kirim->ParamedicName}}">
                        </div>
                        <div class="form-group">
                            <label class="text-sm" style="width: 100%">Kepada Dokter</label>
                            <input type="text" class="form-control text-sm form-control-sm" disabled
                                   value="{{$availablePhysician->dokter_tujuan->ParamedicName}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="type" style="width: 100%">Tipe</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                   name="pkonsultasi_poli_tujuan"
                                   value="{{$availablePhysician->pkonsultasi_poli_tujuan ? : '-'}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm">Catatan</label>
                            <textarea id="" class="form-control text-sm" rows="4" name="pkonsultasi_request"
                                      readonly>{{$availablePhysician->pkonsultasi_request}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm">Response</label>
                            <textarea id="" class="form-control text-sm" rows="4" name="pkonsultasi_response"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
            </div>
        </form>
        @endsection

        @push('addon-script')
            <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
            <!-- dropzonejs -->
            <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
            <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
                })
            </script>
    @endpush
