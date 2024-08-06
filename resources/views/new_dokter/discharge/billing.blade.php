<div class="row">
    <div class="col">
        {{-- <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-billing"><i class="fas fa-redo"></i> Reload</button> --}}
        {{-- <button class="btn btn-success mb-3 float-right" id="btn-add-billing"><i class="fas fa-plus"></i> Tambah Data</button> --}}
    </div>
</div>
@php
$total = 0;
    $data = DB::connection('mysql')->table('job_orders_dt')
    ->join('job_orders','job_orders.order_no','=','job_orders_dt.order_no')
    ->where('job_orders_dt.reg_no',$reg)->select('job_orders_dt.created_at','jenis_order','item_code','item_name','qty','harga_jual','kode_dokter')->get();
@endphp
<div class="row">
    <div class="col">
        {{-- <h4><strong>PENAGIHAN</strong></h4> --}}
        <p class="text-danger">Input item tagihan di tab <strong>CPPT > Tambah CPPT > Tindakan Lainnya > Tambah Data Tindakan</strong></p>
        <table class="table1 table">
            <thead class="bg-dark text-white">
                {{-- <th></th> --}}
                <th>Tanggal</th>
                <th>DPJP Order</th>
                <th>Jenis Item</th>
                <th>Kode Item</th>
                <th>Nama Item</th>
                <th>Qty</th>
                <th>Harga</th>
            </thead>
            <tbody id="table-billing">
                @foreach ($data as $item)
                @php
                $total+= $item->harga_jual;
                    $dd = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode',$item->kode_dokter)->first();
                    if ($dd) {
                        $dokter = $dd->ParamedicName;
                    } else {
                        $dokter = 'Dokter Tidak Di Temukan';
                    }
                    
                @endphp
                <tr>
                <td>{{$item->created_at}}</td>
                <td>{{$dokter}}</td>
                <td>{{$item->jenis_order}}</td>
                <td>{{$item->item_code}}</td>
                <td>{{$item->item_name}}</td>
                <td>{{$item->qty}}</td>
                <td style="text-align: right">{{number_format($item->harga_jual,2)}}</td>
            </tr>
                @endforeach
            </tbody>
            <tfoot id="row_total_billing">
                <tr>
                    <th colspan="4">TOTAL TARIF</th>
                    <th id="total_tarif_bill" class="text-right" colspan="3">{{number_format($total,2)}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>