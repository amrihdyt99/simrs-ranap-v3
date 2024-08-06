<div class="card">
    {{--<form action="{{route('store.cpoe.laboratory')}}" method="POST">
        @csrf--}}
        <input type="text" name="order_by" value="{{$patient->physician->ParamedicID}}" hidden>
        <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
        <input type="text" class="form-control-sm form-control" name="planing_start_date" value="{{now()}}" hidden>

        <div class="card-header">
            <label for="" class="card-title text-sm">Laboratory</label>
        </div>
        <div class="card-body">
           {{-- <button onclick="return confirm('Apakah data yang diinput sudah benar?')"
                    class="btn btn-sm btn-outline-primary float-right" type="submit"><i
                    class="fa fa-save mr-2"></i>Save
            </button>--}}
            <table class="table table-bordered table-hover table-sm" id="tablelabor">
                <thead>
                <tr>
                    <th class="text-sm">Item Code</th>
                    <th class="text-sm">Nama</th>
                    <th class="text-sm">Price</th>
                    <th class="text-sm">Aksi</th>
                </tr>
                </thead>
                <tbody>
                {{--@php
                $iterasi=0;
                @endphp
                @foreach($cpoe_labor as $row)
                    <tr>
                        <td class="text-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cpoe_laboratory_id[]"
                                       value="{{$row->id}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1" id="laborname_{{$iterasi}}">
                                    {{$row->nama}}
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="LaborPilih({{$iterasi}})">Pilih</button>
                        </td>
                    </tr>
                    @php
                        $iterasi=$iterasi+1;
                    @endphp
                @endforeach--}}
            </table>
        </div>
       {{-- <div class="card-footer bg-transparent border">
            <button onclick="return confirm('Apakah data yang diinput sudah benar?')"  type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>
        </div>--}}
    {{--</form>--}}
</div>

<div class="card mt-4">

        <input type="text" name="order_by" value="{{$patient->physician->ParamedicID}}" hidden>
        <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
        <input type="text" class="form-control-sm form-control" name="planing_start_date" value="{{now()}}" hidden>

        <div class="card-header">
            <label for="" class="card-title text-sm">Imaging</label>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm" id="tableimaging">
                <thead>
                <tr>
                    <th class="text-sm">Item Code</th>
                    <th class="text-sm">Nama</th>
                    <th class="text-sm">Price</th>
                    <th class="text-sm">Aksi</th>
                </tr>
                </thead>
                <tbody id="bodyimaging">
                {{--@foreach($cpoe_img as $row)
                    <tr>
                        <td class="text-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cpoe_imaging_id[]"
                                       value="{{$row->id}}"
                                       id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{$row->nama}}
                                </label>
                            </div>
                        </td>
                    </tr>
                @endforeach--}}
                </tbody>
            </table>
        </div>
{{--        <div class="card-footer bg-transparent border">--}}
{{--            <button onclick="return confirm('Apakah data yang diinput sudah benar?')" type="submit" class="btn btn-sm btn-outline-primary float-right">Submit</button>--}}
{{--        </div>--}}

</div>

@push('addon-script')

    <script>
        var arrayPlaning=[];
        var arrayImaging=[];
        var arrayLabor=[];
        $(function(){
            const bodyImaging=document.getElementById("bodyimaging")
            var tableimaging= $('#tableimaging').DataTable();
            //imaging atau radiologi
            const ajax = new XMLHttpRequest();
            ajax.open("POST", "{{route('tarif.tindakan')}}",true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.addEventListener("load",function () {
                var jsonArray=JSON.parse(ajax.responseText)
                for(var i=0;i<jsonArray.length;i++){

                    // const tr=document.createElement("tr")
                    // const tdNama=document.createElement("td")
                    // const tdPrice=document.createElement("td")
                    var itemgrupname=jsonArray[i]['ItemGroupName1']
                    var arrayTindakan=jsonArray[i]['item_tindakan'];
                    var itemGroupCode=jsonArray[i]['ItemGroupCode']
                    var harga=0;
                    if(arrayTindakan.length>0){

                        for(var j=0;j<arrayTindakan.length;j++){
                            var ItemCode=arrayTindakan[j]['ItemCode']
                            var namatindakan=arrayTindakan[j]['ItemName1']
                            var standarprice=arrayTindakan[j]['StandardPrice']
                            tableimaging.row.add([ItemCode,namatindakan,standarprice,"<button class='btn btn-primary' >Pilih</button>"])

                        }
                    }else{

                        tableimaging.row.add([itemGroupCode,itemgrupname,harga,"<button class='btn btn-primary'>Pilih</button>"]).draw(false)


                    }

                }

            })
            ajax.send("type=X0001^05&class=5");

            tableimaging.on('click','button',function (){
                var data=tableimaging.row($(this).parents('tr')).data()
                var itemcode=data[0]
                var nama=data[1]
                var price=data[2]
                const etPlaning=document.getElementById('soapdok_planning');
                let planning=etPlaning.value;
                if(planning.length>0){
                    planning=planning+"\n"+nama;
                }else{
                    planning=nama;
                }

                etPlaning.innerHTML=planning;
                arrayImaging.push({"namaimaging":nama,"priceimaging":price,"kodeimaging":itemcode})
            })
        })

        //koding get data labor
        $(function(){
            var tablelabor= $('#tablelabor').DataTable();
            //imaging atau radiologi
            const ajax = new XMLHttpRequest();
            ajax.open("POST", "{{route('tarif.tindakan')}}",true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.addEventListener("load",function () {
                var jsonArrayLabor=JSON.parse(ajax.responseText)
                for(var i=0;i<jsonArrayLabor.length;i++){

                    var itemgrupname=jsonArrayLabor[i]['ItemGroupName1']
                    var arrayTindakanLabor=jsonArrayLabor[i]['item_tindakan'];
                    var itemGroupCode=jsonArrayLabor[i]['ItemGroupCode']
                    var harga=0;

                    if(arrayTindakanLabor.length>0){

                        for(var j=0;j<arrayTindakanLabor.length;j++){
                            var namatindakan=arrayTindakanLabor[j]['ItemName1']
                            var standarprice=arrayTindakanLabor[j]['StandardPrice']
                            var ItemCode=arrayTindakanLabor[j]['ItemCode']
                            tablelabor.row.add([ItemCode,namatindakan,standarprice,"<button class='btn btn-primary' >Pilih</button>"])
                            console.log(namatindakan)
                        }
                    }else{
                        tablelabor.row.add([itemGroupCode,itemgrupname,harga,"<button class='btn btn-primary'>Pilih</button>"]).draw(false)

                    }


                    //console.log(jsonArrayLabor[i]);

                }

            })
            ajax.send("type=X0001^04&class=5");

            tablelabor.on('click','button',function (){
                var data=tablelabor.row($(this).parents('tr')).data()
                var kode=data[0]
                var nama=data[1]
                var price=data[2]
                const etPlaning=document.getElementById('soapdok_planning');
                let planning=etPlaning.value;
                if(planning.length>0){
                    planning=planning+"\n"+nama;
                }else{
                    planning=nama;
                }

                etPlaning.innerHTML=planning;
                arrayLabor.push({"namalabor":nama,"pricelabor":price,"kodelabor":kode})
            })
        })
    </script>


@endpush

