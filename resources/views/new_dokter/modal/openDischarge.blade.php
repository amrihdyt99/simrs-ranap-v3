<div class="modal fade" id="modalOpenDischarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="formOpenDischarge">
            @csrf
            <input type="hidden" name="reg_no" value="{{$reg}}">
            <input type="hidden" name="name" value="{{auth()->user()->name}}">
            <input type="hidden" name="requester" value="{{auth()->user()->dokter_id}}">
            <div class="modal-header">
                <h3>Form Pengajuan Open Discharge</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Alasan Pengajuan</label>
                    <textarea name="reason" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="storeOpenDischarge()">Ya</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function storeOpenDischarge(){
        $.ajax({
            url: '{{url("")}}/api/openDischargeRequest',
            type: 'post',
            data: $('#formOpenDischarge').serialize(),
            success: function(resp){
                if (resp.success) {
                    alert(resp.msg)
                    $('#modalOpenDischarge').modal('hide')
                } else {
                    alert(resp.msg)
                }
            }
        })
    }
  </script>