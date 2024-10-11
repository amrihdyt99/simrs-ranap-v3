<div class="modal fade" id="addNursingDrugModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Tambah Nursing Drugs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="modalDetailContent">
        <form id="formNursingDrugNew">
          <input id="nursing_drug_items" name="nursing_drug_items" type="hidden" value="[]">
          <div class="card-body">
            <button type="button" class="btn btn-success mb-3 float-right" id="btnTambahNursingItemDrugs" onclick="loadModalNursingDrugItem()"><i class="fas fa-plus "></i> Tambah Obat</button>
            <div class="table-responsive">
              <table id="dt_nursing_drugs_item" class="table table-lg table-bordered nowrap" style="width:100%">
                <thead>
                  <tr class="bg-warning text-black">
                    <th><b>Kode Obat</b></th>
                    <th><b>Nama Obat</b></th>
                    <th><b>Dosis</b></th>
                    <th><b>Frekuensi</b></th>
                    <th><b>Aksi</b></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
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
              <label for="" class="text-sm">Tanggal Pemberian</label>
              <input type="date" class="form-control" name="tgl_pemberian"
                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
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