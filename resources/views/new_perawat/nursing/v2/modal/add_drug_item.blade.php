<div class="modal fade" id="addNursingDrugItemModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Tambah Obat yang Diberikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="modalDetailContent">
        <form id="formNursingDrugItemObat">
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
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitFormNursingDrugItems()">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>