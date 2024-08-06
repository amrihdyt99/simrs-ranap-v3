<div class="row">
    <div class="col">
        <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-prescribe"><i class="fas fa-redo"></i> Reload</button>
        <button class="btn btn-success mb-3 float-right" id="btn-add-prescribe"><i class="fas fa-plus"></i> Tambah Data</button>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table1 table_detail_prescribe" width="100%">
                <thead>
                    <tr class="bg-warning text-uppercase">
                        <th class="text-center font-weight-bold">Jenis</th>
                        <th class="font-weight-bold">Kode Obat</th>
                        <th class="font-weight-bold">Nama Obat</th>
                        <th class="font-weight-bold">Qty</th>
                        <th class="font-weight-bold">Dosis</th>
                        <th class="font-weight-bold">Frekuensi</th>
                        <th class="font-weight-bold">Keterangan</th>
                        <th class="text-center font-weight-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-prescribe">
                </tbody>
                {{-- <tfoot id="row_total_prescribe">
                    <tr>
                        <th colspan="5">TOTAL TARIF</th>
                        <th id="total_tarif_prescribe" class="text-left" colspan="1">-</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
</div>

{{--@push('myscripts')
    <script>
        document.onload(function () {
            console.log('load data obat')
        })
    </script>
@endpush--}}
