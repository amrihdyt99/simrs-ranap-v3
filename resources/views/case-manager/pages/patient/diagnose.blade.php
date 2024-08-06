@extends('case-manager.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <strong class="text-sm text-primary">Identifikasi / Skripsi Pasien</strong><br>
                            </div>
                            @csrf
                            <div class="card-body">
                                <table border="1" style="width: 100%" id="section_1">
                                    <tbody>
                                        @foreach ($m_section_1 as $item)
                                        @php
                                            $checked = false;
                                            foreach($section_1 as $s){
                                                if($s->m_form_a_id == $item->id){
                                                    $checked = true;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td width="40px" style="text-align: center">
                                                <input id="{{ $item->id }}" name="{{ $item->id }}" {{ $checked ? "checked" : "" }} type="checkbox" />
                                            </td>
                                            <td>
                                                <label for="{{ $item->id }}">{{ $item->category }}</label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <strong class="text-sm text-primary">Assessment untuk Manajemen Pelayanan Pasien</strong><br>
                            </div>
                            @csrf
                            <div class="card-body">
                                <table border="1" style="width: 100%" id="section_2">
                                    <tbody>
                                        @foreach ($m_section_2 as $item)
                                        @php
                                            $checked = false;
                                            foreach($section_2 as $s){
                                                if($s->m_form_a_id == $item->id){
                                                    $checked = true;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td width="40px" style="text-align: center">
                                                <input id="{{ $item->id }}" name="{{ $item->id }}" {{ $checked ? "checked" : "" }}  type="checkbox" />
                                            </td>
                                            <td>
                                                <label for="{{ $item->id }}">{{ $item->category }}</label>
                                            </td>
                                        </tr>
                                        @endforeach</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <strong class="text-sm text-primary">Identifikasi Masalah Resiko Kesempatan</strong><br>
                            </div>
                            @csrf
                            <div class="card-body">
                                <table border="1" style="width: 100%" id="section_3">
                                    <tbody>
                                        @foreach ($m_section_3 as $item)
                                        @php
                                            $checked = false;
                                            foreach($section_3 as $s){
                                                if($s->m_form_a_id == $item->id){
                                                    $checked = true;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td width="40px" style="text-align: center">
                                                <input id="{{ $item->id }}" name="{{ $item->id }}" {{ $checked ? "checked" : "" }}  type="checkbox" />
                                            </td>
                                            <td>
                                                <label for="{{ $item->id }}">{{ $item->category }}</label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="perencanaan_manajemen_pelayanan">Perencanaan Manajemen Pelayanan Pasien</label>
                                    <textarea name="perencanaan_manajemen_pelayanan" id="perencanaan_manajemen_pelayanan" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-success" style="width: 100%" id="submit_btn">Simpan semua data</button>
                            </div>
                        </div>
                    </div>
                </div>
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

@push('addon-script')
    <script>
        $(function(){
            $("#submit_btn").on('click',()=>{
                let section_1 = []
                $("#section_1 > tbody > tr").each((i,val)=>{
                    let item = $(val).find("input")[0]
                    if(item.checked){
                        section_1.push(item.id)
                    }
                }).get()
                let section_2 = []
                $("#section_2 > tbody > tr").each((i,val)=>{
                    let item = $(val).find("input")[0]
                    if(item.checked){
                        section_2.push(item.id)
                    }
                }).get()
                let section_3 = []
                $("#section_3 > tbody > tr").each((i,val)=>{
                    let item = $(val).find("input")[0]
                    if(item.checked){
                        section_3.push(item.id)
                    }
                }).get()
                $.ajax({
                    url : "{{ route('casemanager.forma.store',['reg_no'=>$patient->reg_no]) }}",
                    type : "POST",
                    data : {
                        section_1 : section_1,
                        section_2 : section_2,
                        section_3 : section_3,
                        _token : "{{ csrf_token() }}"
                    },
                    success : function(res){
                        if(res.message == "success"){
                            alert("Data berhasil disimpan!")
                        }
                    }
                })
            })
        })
    </script>
@endpush