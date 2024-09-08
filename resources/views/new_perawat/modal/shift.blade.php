<!-- Modal untuk memilih shift -->
<div class="modal" id="modal_shift" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Shift</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pilih_shift">Shift</label>
                    <select name="shift" id="pilih_shift" class="form-control select2-mod" style="width: 100%">
                        @if (session('shift_options'))
                            <option value="">--Pilih shift--</option>
                            @foreach (session('shift_options') as $shift)
                                <option value="{{ $shift }}">{{ ucfirst($shift) }}</option>
                            @endforeach
                        @else
                            <option value="">Shift tidak tersedia</option>
                        @endif
                    </select>
                </div>
                <button type="button" class="btn btn-secondary float-right mr-3" aria-label="Close" onclick="$('#modal_shift').modal('hide')">Close</button>
                <button type="button" class="btn btn-primary float-right mr-3" id="save_shift">Simpan Shift</button>
            </div>
        </div>
    </div>
</div>
