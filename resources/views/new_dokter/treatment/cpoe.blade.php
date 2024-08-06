<div class="row">
    <div class="col">
        <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-cpoe"><i class="fas fa-redo"></i> Reload</button>
        <button type="button" class="btn btn-success mb-3 float-right" id="tab-add-cpoe" onclick="clickTab('add-cpoe')"><i class="fas fa-plus"></i> Tambah Data Tindakan</button>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table1" width="100%">
            <thead>
                <tr class="text-uppercase bg-warning">
                    <th class="font-weight-bold">Tanggal Order</th>
                    <th class="font-weight-bold">Jenis Tindakan</th>
                    <th class="font-weight-bold">Kode Order</th>
                    <th class="font-weight-bold">Nama Tindakan</th>
                    <th class="font-weight-bold">Harga</th>
                    <th class="font-weight-bold">Dokter Order</th>
                    <th class="font-weight-bold">Aksi</th>
                </tr>
            </thead>
            <tbody id="table-cpoe">
            </tbody>
            <tfoot id="row_total_cpoe">
                <tr>
                    <th colspan="5">TOTAL TARIF</th>
                    <th id="total_tarif" class="text-right" colspan="2">-</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>