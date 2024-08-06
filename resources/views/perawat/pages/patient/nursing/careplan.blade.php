<div class="form-group">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control">Data Onset</label>
                            <select class="form-control">

                            </select>
                        </div>
                    </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label class="form-control">Physician Diagnosis</label>
                           <select class="form-control" id="dokter" name="dokter">
                               @foreach($dokter as $d)
                                   <option value="{{$d['ParamedicID']}}">{{$d['ParamedicName']}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-sm table-bordered table-hover">

        <thead>
        <th>Code</th>
        <th>Name</th>
        <th>Select</th>
        {{--<th>Date Time</th>
        <th>Date Time</th>
        <th>Date Time</th>--}}
        </thead>
        <tbody>
        @foreach($gejaladata as $v)
            @php
                $i=0;
            @endphp
            <tr>
                <td>{{$v['id']}}</td>
                <td>{{$v['gejala']}}</td>
                <td>
                    <input type="checkbox" id="ckGejala{{$i}}" class="ckGejala" data-kode="{{$v['id']}}"/>
                </td>
            </tr>
            @php
                $i=$i+1;
            @endphp
        @endforeach

        </tbody>

    </table>
    <button class="btn btn-primary" id="btn-diagnosa">Diagnosa</button>
</div>
@push('addon-script')
    <script>
        $(function () {
            $('#btn-diagnosa').on('click',function(){
                let kodeGejala=[];
                const promises = []
                $('.ckGejala').each(function (i,val) {
                    if($(val).is(':checked')){
                        kodeGejala.push($(val).data('kode'))
                    }


                })
                console.log(kodeGejala)
                let request = $.ajax({
                    url : "{{ route('perawat.careplan.diagnose') }}",
                    method : "POST",
                    data : {
                        'arrayGejala':kodeGejala,
                        _token : "{{ csrf_token() }}"
                    },
                    success:function(data){
                        //alert(data.data);
                        var jsonData=JSON.parse(data);
                        var arrayPenyakit=[];
                        for(var i=0;i<jsonData.data.length;i++){
                            var penyakit=jsonData.data[i];
                            if(arrayPenyakit.length>0){
                                if(arrayPenyakit[i-1]==penyakit.nama_penyakit){

                                }else{
                                    arrayPenyakit[i]=penyakit.nama_penyakit;
                                }
                            }else{
                                arrayPenyakit[i]=penyakit.nama_penyakit;
                            }

                        }

                        for(var j=0;j<arrayPenyakit.length;j++){
                           alert(arrayPenyakit[j]);
                        }

                    }
                })
                promises.push(request)
            })
        })
    </script>
@endpush
