<div class="modal fade" id="addNursingDrugModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Tambah Nursing Drugs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="modalDetailContent">
        <form id="formNursingDrugNew">
          <div class="card-body">
            <div class="form-group">
              <label class="text-sm">Nama Obat</label>
              <select id="obat" name="kode_obat" class="form-control select2bs4">
                <option value="">-</option>
                @foreach ($obatdaridokter as $row)
                <option value="{{ $row->item_code . ', ' . $row->item_name}}">
                  {{ $row->item_name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="text-sm">Nama Dokter</label>
              <input class="form-control" id="kode_dokter" name="kode_dokter"
                value="{{ $datamypatient[0]->reg_dokter }}" hidden />
              <input class="form-control" id="nama_dokter" name="nama_dokter"
                value="{{ $datamypatient[0]->ParamedicName }}" readonly />
            </div>
            <div class="form-group">
              <label for="" class="text-sm">Cara Pemberian</label>
              <select class="custom-select custom-select-sm" name="cara_pemberian">
                <option value="" selected>-- Pilih --</option>
                <option value="IV">IV</option>
                <option value="IM">IM</option>
                <option value="IC">IC</option>
                <option value="SC">SC</option>
                <option value="PO">PO</option>
                <option value="Topical">Topical</option>
                <option value="Suppos">Suppos</option>
              </select>
            </div>
            <div class="form-group">
              <label for="" class="text-sm">Anti Biotik</label>
              <select class="custom-select custom-select-sm" name="antibiotik">
                <option value="" selected>-- Pilih --</option>
                <option value="P">P</option>
                <option value="E">E</option>
                <option value="D">D</option>
              </select>
            </div>
            <div class="form-group">
              <table class="table table-bordered table-hover treatment table-sm">
                <thead>
                  <tr>
                    <th class="text-sm">Dosis<code>*</code></th>
                    <th class="text-sm">Frekuensi<code>*</code></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-sm">
                      <input type="number" class="text-sm form-control form-control-sm" name="dosis">
                    </td>
                    <td class="text-sm">
                      <input type="number" class="text-sm form-control form-control-sm" name="frekuensi">
                    </td>
                  </tr>
              </table>
            </div>
            <div class="form-group">
              <label for="" class="text-sm">Tanggal Pemberian</label>
              <input type="date" class="form-control" name="tgl_pemberian"
                value="">
            </div>
            <div class="row">
              @for ($i = 0; $i<24 ; $i++)

                <div class="col-md-2" style="border: 1px solid #000; border-radius: 15px; padding : 10px;">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="data_perjam[{{$i}}][rentang_jam]"
                    value="1">
                  @if ($i<10)

                    <label class="form-check-label"><b>0{{$i}}</b></label>
                    @else

                    <label class="form-check-label"><b>{{$i}}</b></label>
                    @endif
                </div>
                <select class="custom-select custom-select-sm" name="data_perjam[{{$i}}][tipe_jam]">
                  <option value="" selected>-- Pilih --</option>
                  <option value="O">O</option>
                  <option value="T">T</option>
                  <option value="K">K</option>
                  <option value="A">A</option>
                  <option value="ESO">ESO</option>
                  <option value="TAP">TAP</option>
                </select>
                <input type="time" class="text-sm form-control form-control-sm mt-2" name="data_perjam[{{$i}}][aktual_jam]">
            </div>
            @endfor
          </div>
      </div>
      </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" onclick="storeNursingDrug()">Simpan</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>