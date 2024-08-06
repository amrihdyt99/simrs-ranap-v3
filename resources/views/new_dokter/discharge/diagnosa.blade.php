<div class="row">
    <div class="col">
        {{-- <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-diagnosa"><i class="fas fa-redo"></i> Reload</button>
        <button class="btn btn-success mb-3 float-right" id="btn-add-diagnosa"><i class="fas fa-plus"></i> Tambah Data</button> --}}
    </div>
</div>
<div class="row">
    <div class="col">
        <h4><strong>Diagnosis</strong></h4>
        <table class="table1 table">
            <thead class="bg-dark text-white">
                {{-- <th></th> --}}
                <th>Tanggal</th>
                <th>Kode Diagnosa</th>
                <th>Nama Diagnosa</th>
                <th>DPJP</th>
            </thead>
            <tbody id="table-diagnosa">
                @php
                // $columns = DB::connection('mysql')->getSchemaBuilder()->getColumnListing('icd10_bpjs');
                // dd($columns)
                    $diagnosa = DB::connection('mysql')
            ->table('rs_pasien_diagnosa')
            ->join('icd10_bpjs','icd10_bpjs.ID_ICD10','=','rs_pasien_diagnosa.pdiag_diagnosa')
            ->where('pdiag_reg',$reg)->where('pdiag_deleted',0)->orderBy('pdiag_id','asc')->select('rs_pasien_diagnosa.created_at','pdiag_diagnosa','pdiag_dokter','NM_ICD10')->get();
                @endphp
                @if ($diagnosa)
                    @foreach($diagnosa as $d)
                    <tr>
                        <td>{{$d->created_at}}</td>
                        <td>{{$d->pdiag_diagnosa}}</td>
                        <td>{{$d->NM_ICD10}}</td>
                        @php
                            $dokter = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode',$d->pdiag_dokter)->first();
                        @endphp
                        @if ($dokter)
                        <td>{{$dokter->ParamedicName}}</td>
                        @else
                            <td>Nama Dokter Tidak Ditemukan</td>
                        @endif
                    </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">Data Belum Input</td>
                </tr>
                    
                @endif
                
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <h4><strong>Prosedur</strong></h4>
        <table class="table1 table">
            <thead class="bg-dark text-white">
                {{-- <th></th> --}}
                <th>Tanggal</th>
                <th>Kode Prosedur</th>
                <th>Nama Prosedur</th>
                <th>DPJP</th>
            </thead>
            <tbody id="table-prosedur">
            @php
            $prosedur = DB::connection('mysql')
            ->table('rs_pasien_prosedur')
            ->join('icd9cm_bpjs','icd9cm_bpjs.ID_TIND','=','rs_pasien_prosedur.pprosedur_prosedur')
            ->where('pprosedur_reg',$reg)->where('pprosedur_deleted',0)->orderBy('pprosedur_id','asc')
            ->select('created_at','pprosedur_prosedur','NM_TINDAKAN','pprosedur_dokter')->get();
        @endphp
        @if ($prosedur)
            @foreach($prosedur as $p)
            <tr>
                <td>{{$p->created_at}}</td>
                <td>{{$p->pprosedur_prosedur}}</td>
                <td>{{$p->NM_TINDAKAN}}</td>
                @php
                    $dokter = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode',$p->pprosedur_dokter)->first();
                @endphp
                @if ($dokter)
                <td>{{$dokter->ParamedicName}}</td>
                @else
                    <td>Nama Dokter Tidak Ditemukan</td>
                @endif
            </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4">Data Belum Input</td>
        </tr>
            
        @endif
            </tbody>
        </table>
    </div>
</div>
