@extends('case-manager.layouts.app')
@section('content')
    <div class="card">
        <form action="{{route('casemanager.store.icd10')}}" method="POST">
            @csrf
            <div class="card-header">
                <label for="" class="card-title text-sm">Diagnosis</label>
            </div>
            <div class="card-body">
                <div>
                    <input type="text" name="pdiag_dokter" value="{{$patient->physician->ParamedicID}}" hidden>
                    <input type="text" name="pdiag_reg" value="{{$patient->reg_no}}" hidden>
                    <table class="table table-bordered table-hover icd table-sm">
                        <thead>
                        <tr>
                            <th class="text-sm">Kode Diagnosa</th>
                            <th class="text-sm">Nama Diagnosa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($icd10 as $row)
                            <tr>
                                <td class="text-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pdiag_diagnosa[]"
                                               value="{{$row->ID_ICD10}}"
                                               id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{$row->ID_ICD10}}
                                        </label>
                                    </div>
                                </td>
                                <td class="text-sm">{{$row->NM_ICD10}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
            <div class="card-footer bg-transparent border">
                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
            </div>
        </form>
    </div>

@endsection
@push('addon-script')
    <script>
        $('.icd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    </script>
@endpush
