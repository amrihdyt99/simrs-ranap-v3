@extends('dokter.layouts.app')
@section('content')
    <div class="card card-default">
        <form action="{{route('store.discharge.info')}}" method="POST">
            @csrf
            <div class="card-header">
                <strong class="text-sm">Dishcarge Info</strong>
            </div>
            <div class="card-body">
                <input type="text" name="pdischarge_dokter" value="{{$patient->physician->ParamedicID}}" hidden>
                <input type="text" name="pdischarge_reg" value="{{$patient->reg_no}}" hidden>
                <div class="form-group">
                    <label for="" class="text-sm">Discharge Condition</label>
                    <select class="custom-select custom-select-sm" name="pdischarge_condition">
                        <option selected disabled>Open this select menu</option>
                        <option value="recovery">Recovery</option>
                        <option value="improvement">Improvement</option>
                        <option value="not cured">Not Cured</option>
                        <option value="dead in less than 48 hour">Dead in Less Than 48 Hour</option>
                        <option value="dead in more than or requal to 48 hour">Dead in More Than or Equal to 48 Hour
                        </option>
                        <option value="healthy">Healthy</option>
                    </select>

                    @error('pdischarge_condition')
                    <span class="text-danger text-sm">This field is required!</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="" class="text-sm">Discharge Method</label>
                    <select class="custom-select custom-select-sm" name="pdischarge_method">
                        <option selected disabled>Open this select menu</option>
                        <option value="atas persetujuan dokter">Atas Persetujuan Dokter</option>
                        <option value="pindah ke rs lain">Pindah ke RS Lain</option>
                        <option value="atas permintaan sendiri">Atas Permintaan Sendiri</option>
                        <option value="dirujuk">Dirujuk</option>
                        <option value="lain-lain">Lain-lain</option>
                    </select>
                    @error('pdischarge_method')
                    <span class="text-danger text-sm">This field is required!</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="" class="text-sm">Medical Notes</label>
                    <textarea name="pdischarge_med_notes" id="" cols="30" rows="4"
                              class="form-control-sm form-control"></textarea>
                    @error('pdischarge_med_notes')
                    <span class="text-danger text-sm">This field is required!</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="" class="text-sm">Notes</label>
                    <textarea name="pdischarge_notes" id="" cols="30" rows="4"
                              class="form-control-sm form-control"></textarea>
                    @error('pdischarge_notes')
                    <span class="text-danger text-sm">This field is required!</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="text-sm">Death of Death</label>
                            <input type="date" class="form-control form-control-sm text-sm" name="pdischarge_tgl_mati">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="text-sm">Time of Death</label>
                            <input type="time" class="form-control form-control-sm text-sm" name="pdischarge_jam_mati">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-transparent border">
                <button type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection
