<div class="modal fade" id="modalDiagnosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
      <div class="modal-content">
        <ul class="nav nav-tabs mx-2" id="myTab" role="tablist">
            <li class="nav-item font-weight-bold">
                <a class="nav-link active" id="icd10-tab" data-toggle="tab" href="#icd10" role="tab" aria-controls="icd10" aria-selected="true"><h3><strong>ICD 10</strong></h3></a>
            </li>
            <li class="nav-item font-weight-bold">
                <a class="nav-link" id="icd9-tab" data-toggle="tab" href="#icd9" role="tab" aria-controls="icd9" aria-selected="false"><h3><strong>ICD 9</strong></h3></a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContents">
            <div class="tab-pane fade show active" id="icd10" role="tabpanel" aria-labelledby="icd10-tab">
                <h4>DIAGNOSA - ICD 10</h4>
                <form id="form-diagnosa-dokter" method="post" action="{{route('newstore.diagnosa')}}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="pdiag_reg" value="{{$reg}}">
                        <input type="hidden" name="pdiag_dokter" value="{{auth()->user()->dokter_id}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <table id="table-icd10" class="table table-striped table-bordered dt-responsive nowrap mt-3 mb-3" style="width:100%">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th></th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($icd10->chunk(5) as $chunk)
                                        @foreach($chunk as $row)
                                            <tr>
                                                <td class="text-sm">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="pdiag_diagnosa[]"
                                                               value="{{$row->ID_ICD10}}"
                                                               id="defaultCheck1">

                                                    </div>

                                                </td>
                                                <td> <label class="form-check-label" for="defaultCheck1">
                                                        {{$row->ID_ICD10}}
                                                    </label></td>
                                                <td class="text-sm">{{$row->NM_ICD10}}</td>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div id="diagnosa_detail">
                                    <fieldset class="form-group">
                                        <label class="label-admisi">Diagnosis Status</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="ds1" name="pdiag_status" value="Under Investigation">
                                                    <label class="custom-control-label" for="ds1" >Under Investigation</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="ds2" name="pdiag_status" value="Confirmed" >
                                                    <label class="custom-control-label" for="ds2">Confirmed</label>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="label-admisi">Diagnosis Type</label>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="dt1" name="pdiag_tipe" value="Primary Discharge Diagnosis">
                                                    <label class="custom-control-label" for="dt1" >Primary Discharge Diagnosis</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="dt2" name="pdiag_tipe" value="Secondary Discharge Diagnosis" >
                                                    <label class="custom-control-label" for="dt2">Secondary Discharge Diagnosis</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="custom-control custom-check custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" id="oc1" name="pdiag_old_case" value="Old Case (Related RL)">
                                                    <label class="custom-control-label" for="oc1" >Old Case (Related RL)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="card mt-0">
                                        <div class="card-header">
                                            Include To Problem
                                        </div>
                                        <div class="card-body">
                                            <fieldset class="form-group">
                                                <label class="label-admisi">Chronicity</label>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="c1" name="pdiag_chronicity" value="Acute">
                                                            <label class="custom-control-label" for="c1" >Acute</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="c2" name="pdiag_chronicity" value="Self Limiting" >
                                                            <label class="custom-control-label" for="c2">Self Limiting</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="c3" name="pdiag_chronicity" value="Chronic" >
                                                            <label class="custom-control-label" for="c3">Chronic</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="label-admisi">Problem Status</label>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="ps1" name="pdiag_masalah" value="Active">
                                                            <label class="custom-control-label" for="ps1" >Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="ps2" name="pdiag_masalah" value="Passive" >
                                                            <label class="custom-control-label" for="ps2">Passive</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="ps3" name="pdiag_masalah" value="Resolved" >
                                                            <label class="custom-control-label" for="ps3">Resolved</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="">Notes</label>
                                                        <textarea name="pdiag_catatan" class="form-control" cols="30" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btn-save-diagnosa" onclick="addIcd('diagnose')">Simpan</button>
                    </div>
                </form>

            </div>
            <div class="tab-pane fade" id="icd9" role="tabpanel" aria-labelledby="icd9-tab">
                <h4>PROSEDUR/TINDAKAN - ICD 9</h4>
                <form id="form-prosedur-dokter" method="post" action="{{route('newstore.prosedur')}}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="pprosedur_reg" value="{{$reg}}">
                        <input type="hidden" name="pprosedur_dokter" value="{{auth()->user()->dokter_id}}">
                        {{-- <div class="form-group">
                            <label>Prosedur</label>
                            <select class="form-control select2 select2-hidden-accessible" name="pprosedur_prosedur" id="pprosedur_prosedur" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">-- Pilih prosedur --</option>
                            </select>
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <table id="table-icd9" class="table table-striped table-bordered dt-responsive nowrap mt-3 mb-3" style="width:100%">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th></th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody id="row-icd9">

                                    @foreach($icd9cm->chunk(5) as $chunk)
                                        @foreach($chunk as $row)
                                            <tr>

                                                <td class="text-sm">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="pprosedur_prosedur[]"
                                                               value="{{$row->ID_TIND}}"
                                                               id="defaultCheck1">

                                                    </div>
                                                </td>
                                                <td><label class="form-check-label" for="defaultCheck1">
                                                        {{$row->ID_TIND}}
                                                    </label></td>
                                                <td class="text-sm">{{$row->NM_TINDAKAN}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Specialty</label>
                                    {{-- <input type="text" class="form-control" name="pprosedur_specialty" value="@if(auth()->user()->level_user == 'dokter') {{auth()->user()->dokter->specialty->SpecialtyName1}} @endif"> --}}
                                    <input type="text" class="form-control" name="pprosedur_specialty">
                                </div>
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <textarea name="pprosedur_remark" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btn-save-prosedur" onclick="addIcd('prosedur')">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </div>

@push('myscripts')
    <script>
        $(function() {
            console.log( "ready!" );
        });
    </script>
    <script>
        function addIcd(kategori){
            console.log('tes')

            var user_dokter_ = "{{auth()->user()->dokter_id}}";
            if(kategori=='diagnose'){
                document.getElementById('form-diagnosa-dokter').submit();
                /*var input = document.getElementsByName('pdiag_diagnosa[]');
                var arrayDataDiagnosa=[];
                for (var i = 0; i < input.length; i++) {
                    var a = input[i].value;
                    arrayDataDiagnosa.push(a)
                }
                console.log(arrayDataDiagnosa.length)
                $.ajax({
                    type: "POST",
                    url: "{{ route('newstore.diagnosa') }}",
                    data: {
                        "pddiag_reg": regno,
                        "pddiag_diagnosa[]":arrayDataDiagnosa,
                        "pddiag_dokter":user_dokter_,

                    },

                    success: function(data) {
                        console.log(data);
                        window.location.replace("{{route('dokter.patient.summary',['patient'=>$patient])}}");
                        //let html = document.getElementById("panel-nursing").innerHTML = data;
                    },
                });*/
            }else if(kategori=="prosedur"){
                document.getElementById('form-prosedur-dokter').submit();
            }
        }
    </script>
@endpush
