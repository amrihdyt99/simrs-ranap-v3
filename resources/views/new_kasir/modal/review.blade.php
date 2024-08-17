<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Review Data Transaksi</h3>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table-r" width="100%">
              <thead>
                <tr class="text-uppercase">
                  <td class="font-weight-bold">Tanggal</td>
                  <td class="font-weight-bold">Nama Item</td>
                  <td class="font-weight-bold">Jumlah</td>
                  <td class="font-weight-bold text-right">Tarif</td>
                </tr>
              </thead>
              <tbody id="table-review-kasir">
              </tbody>
              <tfoot id="table-review-kasir-total">
              </tfoot>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" id="btn-confirm-review" class="btn btn-primary">Validasi</button> --}}
        </div>
      </div>
    </div>
  </div>