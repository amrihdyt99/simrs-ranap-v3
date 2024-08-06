<div class="form-group">
    <div class="table-responsive">
    <table rules="all" class="table1" style="width:100%">
        <thead>
        <tr class="text-uppercase bg-warning">
            <th class="first-row text-center font-weight-bold" colspan="7">In-Take</th>
            <th class="text-center font-weight-bold" colspan="6">Output</th>
        </tr>
        </thead>
        <tbody id="table-fluid-balance">
        <tr class="text-uppercase bg-warning">
            <th class="first-row text-center font-weight-bold">Tanggal/Jam</th>
            <th class="text-center font-weight-bold">Cairan/Transfusi</th>
            <th class="text-center font-weight-bold">Jumlah</th>
            <th class="last-row text-center font-weight-bold">Minum</th>
            <th class="last-row text-center font-weight-bold">Sonde</th>
            <th class="last-row text-center font-weight-bold">Jumlah</th>
            <th class="last-row text-center font-weight-bold">Nama</th>
            <th class="last-row text-center font-weight-bold">Urine</th>
            <th class="last-row text-center font-weight-bold">Drain</th>
            <th class="last-row text-center font-weight-bold">IWL/Muntah</th>
            <th class="last-row text-center font-weight-bold">Jumlah</th>
            <th class="last-row text-center font-weight-bold">Nama</th>
            <th class="last-row text-center font-weight-bold">Balance</th>
        </tr>
        @foreach($dataFluidBalanceBaru as $data)
            <tr>
                <td class="text-center">{{$data->tanggal}}</td>
                <td class="text-center">{{$data->cairan_transfusi}}</td>
                <td class="text-center">{{$data->jumlah_cairan}}</td>
                <td class="text-center">{{$data->minum}}</td>
                <td class="text-center">{{$data->sonde}}</td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center">{{$data->urine}}</td>
                <td class="text-center">{{$data->drain}}</td>
                <td class="text-center">{{$data->iwl_muntah}}</td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center">{{$data->balance}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
<div class="header"><h4>Input</h4></div>
<div class="form-group row ">

    <label for="inputPassword3" class="col-sm-2 col-form-label">Pilih Cairan/Transfusi</label>
    <div class="input-group col-sm-10">
        <select class="form-control" id="cairan_transfusi" name="cairan_transfusi">
            <option value="">Pilih Cairan/Transfusi</option>
            @foreach($dataTransfusi as $transfusi)
                <option value="{{$transfusi->jenis}}">{{$transfusi->jenis}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Cairan/Transfusi (ml)</label>
    <div class="input-group col-sm-10">
        <input id="jumlah_transfusi" class="form-control" name="jumlah_transfusi"/>
    </div>
</div>


<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Minum</label>
    <div class="input-group col-sm-10">
        <input id="minum" class="form-control" name="minum"/>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Sonde</label>
    <div class="input-group col-sm-10">
        <input id="sonde" class="form-control" name="sonde"/>
    </div>
</div>


<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Urine</label>
    <div class="input-group col-sm-10">
        <input id="urine" class="form-control" name="urine"/>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Drain</label>
    <div class="input-group col-sm-10">
        <input id="drain" class="form-control" name="drain"/>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">IWL/Muntah</label>
    <div class="input-group col-sm-10">
        <input id="iwl_muntah" class="form-control" name="iwl_muntah"/>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="input-group col-sm-10">
        <input id="jumlah" class="form-control" name="jumlah"/>
    </div>
</div>

<div class="form-group row ">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Pemberian</label>
    <div class="input-group col-sm-10">
        <input type="datetime-local" id="tanggal_pemberian" class="form-control ui-datepicker" name="tanggal_pemberian"/>
    </div>
</div>

<div class="form-group row ">
    <button class="btn btn-primary" onclick="addFluidBalance()">Simpan</button>
</div>

