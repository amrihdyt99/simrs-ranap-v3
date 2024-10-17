<div>
    <h3 class="font-weight-bold">Prosedur Penemuan Komplikasi</h3>
    <br/>
    <div class="form-group">
        <label for="">Catatan Prosedur Penemuan Komplikasi</label>
        <textarea class="form-control" id="catatan_prosedur_penemuan_komplikasi" rows="6" name="catatan_prosedur_penemuan_komplikasi"></textarea>
    </div>

    <div class="form-group">
        <label for="">Kompilasi</label>
        <div class="row">
            <div class="col-12 mb-2">
                <select name="kompilasi" id="kompilasi" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="col-12">
                <textarea class="form-control" id="catatan_kompilasi" rows="3" name="catatan_kompilasi" placeholder="Jenis dan penanganan"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Implan</label>
        <div class="row">
            <div class="col-12 mb-2">
                <select name="implant" id="implan" class="form-control">
                    <option value="">Pilih</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="col-12">
                <textarea class="form-control" id="catatan_kompilasi" rows="3" name="catatan_kompilasi" placeholder="Jenis dan jumlah"></textarea>
            </div>
        </div>
    </div>
</div>

@push('myscripts')
<script></script>
@endpush