@extends('dokter.layouts.app')
@section('content')
    <div class="card">
        <form action="{{route('store.icd9cm')}}" method="POST">
            @csrf
            <div class="card-header">
                <label for="" class="card-title text-sm">Prosedur</label>
            </div>
            <div class="card-body">
                <div>
                    <input type="text" name="pprosedur_dokter" value="{{$patient->physician->ParamedicID}}" hidden>
                    <input type="text" name="pprosedur_reg" value="{{$patient->reg_no}}" hidden>
                    <table class="table table-bordered table-hover icd table-sm">
                        <thead>
                        <tr>
                            <th class="text-sm">Kode Prosedur</th>
                            <th class="text-sm">Nama Prosedur</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($icd9cm->chunk(5) as $chunk)
                            @foreach($chunk as $row)
                                <tr>
                                    <td class="text-sm">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="pprosedur_prosedur[]"
                                                   value="{{$row->ID_TIND}}"
                                                   id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$row->ID_TIND}}
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-sm">{{$row->NM_TINDAKAN}}</td>
                                </tr>
                        @endforeach
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
