<a href="{{route('create.icd10', ['patient' =>$patient->reg_no])}}"
   class="btn btn-sm btn-outline-primary mb-2">ICD</a>
<a href="{{route('create.icd9cm', ['patient' =>$patient->reg_no])}}"
   class="btn btn-sm btn-outline-primary mb-2">ICD-9CM</a>

<div>
    <label for="" class="text-sm">Diagnosis</label>
    <table class="table table-bordered table-hover discharge table-sm">
        <thead>
        <tr>
            <th class="text-sm">Tanggal</th>
            <th class="text-sm">Kode Diagnosa</th>
            <th class="text-sm">Nama Diagnosa</th>
            <th class="text-sm">Nama Dokter</th>
            <th class="text-sm">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($diagnoses as $row)
            <tr>
                <td class="text-sm">{{$row->created_at}}</td>
                <td class="text-sm">
                    {{$row->pdiag_diagnosa}}
                </td>
                <td class="text-sm">
                    {{$row->icd10->NM_ICD10}}
                </td>
                <td class="text-sm">{{$row->paramedic->ParamedicName}}</td>
                <td class="text-sm">
                    <form action="{{route('delete.icd10', $row->pdiag_id)}}" method="post">
                        @csrf
                        @method('put')
                        <button
                            onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                            class="btn btn-sm btn-outline-danger"><i
                                class="mr-1 fa fa-trash"
                            ></i>
                            Hapus Diagnosis
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div>
    <label for="" class="text-sm">Prosedur</label>
    <table class="table table-bordered table-hover discharge table-sm">
        <thead>
        <tr>
            <th class="text-sm">Tanggal</th>
            <th class="text-sm">Kode Prosedur</th>
            <th class="text-sm">Nama Prosedur</th>
            <th class="text-sm">Nama Dokter</th>
            <th class="text-sm">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($procedures as $p)
        <tr>
            <td class="text-sm">{{$p->created_at}}</td>
            <td class="text-sm">{{$p->pprosedur_prosedur}}</td>
            <td class="text-sm">{{$p->icd9->NM_TINDAKAN}}</td>
            <td class="text-sm">{{$p->paramedic->ParamedicName}}</td>
            <td class="text-sm">
                <form action="{{route('delete.icd9cm', $p->pprosedur_id)}}" method="post">
                    @csrf
                    @method('put')
                    <button
                        onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                        class="btn btn-sm btn-outline-danger"><i
                            class="mr-1 fa fa-trash"
                        ></i>
                        Hapus Prosedur
                    </button>
                </form>
        </tr>
        @endforeach
    </table>
</div>
