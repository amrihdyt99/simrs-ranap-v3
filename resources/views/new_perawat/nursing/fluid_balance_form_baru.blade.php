<div class="header">
    <h4>Input</h4>
</div>
<div class="form-group row">
    <label for="cairan_transfusi" class="col-sm-2 col-form-label">Pilih Cairan/Transfusi</label>
    <div class="input-group col-sm-10">
        <select class="form-control" id="cairan_transfusi" name="cairan_transfusi">
            <option value="">Pilih Cairan/Transfusi</option>
            @foreach ($dataTransfusi as $transfusi)
                <option value="{{ $transfusi->jenis }}">{{ $transfusi->jenis }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="jumlah_transfusi" class="col-sm-2 col-form-label">Jumlah Cairan/Transfusi (ml)</label>
    <div class="input-group col-sm-10">
        <input id="jumlah_transfusi" class="form-control" type="number" name="jumlah_transfusi" />
    </div>
</div>

<div class="form-group row">
    <label for="minum" class="col-sm-2 col-form-label">Minum</label>
    <div class="input-group col-sm-10">
        <input id="minum" class="form-control" type="number" name="minum" />
    </div>
</div>

<div class="form-group row">
    <label for="sonde" class="col-sm-2 col-form-label">Sonde</label>
    <div class="input-group col-sm-10">
        <input id="sonde" class="form-control" type="number" name="sonde" />
    </div>
</div>

<div class="form-group row">
    <label for="urine" class="col-sm-2 col-form-label">Urine</label>
    <div class="input-group col-sm-10">
        <input id="urine" class="form-control" type="number" name="urine" />
    </div>
</div>

<div class="form-group row">
    <label for="drain" class="col-sm-2 col-form-label">Drain</label>
    <div class="input-group col-sm-10">
        <input id="drain" class="form-control" type="number" name="drain" />
    </div>
</div>

<div class="form-group row">
    <label for="iwl_muntah" class="col-sm-2 col-form-label">IWL/Muntah</label>
    <div class="input-group col-sm-10">
        <input id="iwl_muntah" class="form-control" type="number" name="iwl_muntah" />
    </div>
</div>

<div class="form-group row">
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="input-group col-sm-10">
        <input id="jumlah" class="form-control" type="number" name="jumlah" />
    </div>
</div>

<div class="form-group row">
    <label for="tanggal_pemberian" class="col-sm-2 col-form-label">Tanggal Pemberian</label>
    <div class="input-group col-sm-10">
        <input type="datetime-local" id="tanggal_pemberian" class="datetime-auto form-control ui-datepicker"
            name="tanggal_pemberian" value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}" />
    </div>
</div>

<div class="form-group row">
    <button class="btn btn-primary" onclick="addFluidBalance()">Simpan</button>
</div>
