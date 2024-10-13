<div class="modal fade" id="modalListBilling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Riwayat Pembayaran</h3>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table-r" width="100%">
            <thead>
              <tr class="text-uppercase">
                <td class="font-weight-bold" class="text-center">Tanggal</td>
                <td class="font-weight-bold" class="text-center">Kode Pembayaran</td>
                <td class="font-weight-bold" class="text-center">No Registrasi</td>
                <td class="font-weight-bold" class="text-center">Jumlah</td>
                <td class="font-weight-bold" class="text-center">Cetak Invoice</td>
              </tr>
            </thead>
            <tbody id="table_body_billing">
            </tbody>
            <tfoot id="table-review-kasir-total">
            </tfoot>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cetak-all-invoice" class="btn btn-primary">Print Semua</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>