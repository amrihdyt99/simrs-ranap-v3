@extends('dokter.layouts.app')
@section('content')
    <div class="card card-default">
        <form action="{{route('refer-to-consult.store')}}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Refer To Consult</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="text" name="pkonsultasi_reg" value="{{$patient->reg_no}}" hidden>
                    <input type="text" name="pkonsultasi_dokter_kirim" value="{{$patient->physician->ParamedicID}}"
                           hidden>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="physician-from" style="width: 100%">Dari Dokter</label>
                            <input type="text" class="form-control text-sm form-control-sm" disabled
                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label class="text-sm" style="width: 100%">Kepada Dokter</label>
                            <select id="dokter" name="pkonsultasi_dokter_tujuan" class="form-control select2bs4">
                                <option value="">-</option>
                                @foreach ($physician as $row)
                                    <option
                                        value="{{ $row->ParamedicCode }}" {{ $row->ParamedicCode == old("dokter") ? "selected" : ""}}>
                                        {{ $row->ParamedicName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pkonsultasi_dokter_tujuan')
                            <span class="text-danger text-sm">This field is required!</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm" for="type" style="width: 100%">Tipe</label>
                            <input type="text" class="form-control form-control-sm text-sm"
                                   name="pkonsultasi_poli_tujuan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm">Catatan</label>
                            <textarea id="" class="form-control text-sm" rows="4" name="pkonsultasi_request"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm">Response</label>
                            <textarea id="" class="form-control text-sm" rows="4" name="pkonsultasi_response"
                                      disabled></textarea>
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
