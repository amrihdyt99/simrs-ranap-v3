{{-- <div class="modal fade" id="modalCPOE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Form Order Tindakan Layanan Penunjang
        </div>

      </div>
    </div>
  </div> --}}

  <form id="form-cpoe-dokter">
    @csrf
        <input type="hidden" name="cpoe_reg" value="{{$reg}}">
        <input type="hidden" name="kode_dokter" value="{{auth()->user()->dokter_id}}"/>
        <input type="hidden" name="cpoe_cppt" id="cpoe_cppt"/>
        <table class="table1 mb-2" width="100%">
            <thead class="text-uppercase bg-warning ">
                <tr>
                    <th class="first-row font-weight-bold" width="70">Kode Tindakan</th>
                    <th class="font-weight-bold">Nama Tindakan</th>
                    <th class="font-weight-bold">Harga</th>
                    <th class="font-weight-bold">Jenis Tindakan</th>
                    <th class="last-row font-weight-bold" width="50">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-item-cpoe">
            </tbody>
        </table>
        <div class="float-right mt-3 mb-2">
            <button type="button" class="btn btn-secondary btn-cpoe" id="tab-lab" onclick="clickTab('lab')">Batal</button>
            <button type="button" class="btn btn-primary" value="lab" id="btn-save-cpoe" onclick="addorder()">Simpan Tindakan</button>
        </div>
        <hr>
        <div class="form-group">
            <label>Jenis Tindakan : <span id="title-cpoe">Laboratorium</span></label>
        </div>
        <div class="form-group" id="group-tindakan">
            <label for="">Tindakan Penunjang</label>
            <select id="select-tindakan" name="select_tindakan" class="form-control select2" style="width: 100%">
                <option value="">Cari nama tindakan</option>
            </select>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="text-center mb-2 font-weight-bold" id="tindakan_load"></div>
                <div id="grid_item"></div>
                <div class="form-group" id="tindakan_combo">
                    <label>Nama Tindakan</label>
                    <select class="form-control select2 select2-hidden-accessible" id="cpoe_tindakan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option data-price="true" value="">-- Pilih nama tindakan --</option>
                    </select>
                    <strong><small class="mt-2">Jumlah data: <span id="total_tindakan">-</span></small></strong>
                </div>
            </div>
        </div>
    <div class="modal-footer">
    </div>
</form>

@push('myscripts')
{{--<script>
    function addorder(){

    }
</script>--}}
@endpush
