 @php
    $dx_no_reg = $reg;
    $dx_med_no = $medrec;
    $nyaa = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class);

    // get order dengan kriteria:
    // jenis_order = lainnya
    $allorder_cr = \DB::connection('mysql')
                    ->table("job_orders_dt")
                    ->leftJoin('job_orders', function ($join) {
                        $join->on('job_orders.order_no', '=', 'job_orders_dt.order_no');
                    })
                    ->where('job_orders_dt.reg_no', $reg)
                    ->where('job_orders_dt.jenis_order', 'lainnya')
                    ->where('job_orders_dt.deleted', 0)
                    ->where('job_orders_dt.flag_billing_perawat', 1)
                    ->select([
                        'job_orders_dt.*',
                        'job_orders.waktu_order',
                    ])
                    ->orderBy('job_orders.waktu_order','asc')
                    ->orderBy('job_orders_dt.item_name','asc')
                    ->get();
    $jumlah_rp_all = 0;

 @endphp
 
 <div class="text-black" style="font-size: 14px">
     <div class="form-group">
         <table class="table1" style="width: 100%">
             <thead>
                 <tr>
                     <th>No.Order</th>
                     <th>Item Code</th>
                     <th>Nama Item</th>
                     <th>Jumlah</th>
                     <th>Harga</th>
                     <th>Total</th>
                     <th>Waktu Order</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
             <tbody id="body-table-order-nurse">

                @foreach ($allorder_cr as $allorder_cr_dx)
                 <tr>
                     <td>{{ $allorder_cr_dx->order_no }}</td>
                     <td>{{ $allorder_cr_dx->item_code }}</td>
                     <td>{{ $allorder_cr_dx->item_name }}</td>
                     <td>{{ $allorder_cr_dx->qty }}</td>
                     <td>{{ $nyaa->rupiah_formatter($allorder_cr_dx->harga_jual) }}</td>
                     <td>{{ $nyaa->rupiah_formatter($allorder_cr_dx->harga_jual*$allorder_cr_dx->qty) }}</td>
                     <td>{{ $nyaa->carbon_format_day_datetime_id($allorder_cr_dx->waktu_order) }}</td>
                     <td><button type="button" class="btn btn-sm btn-danger" onclick="nyaa_delete_joborderdt('{{$allorder_cr_dx->id}}')">Hapus</button></td>
                 </tr>

                 @php
                    $jumlah_rp_all = $jumlah_rp_all + ($allorder_cr_dx->harga_jual*$allorder_cr_dx->qty);
                 @endphp

                @endforeach
             </tbody>

             <tfoot>
                 <tr style="background: rgb(255, 234, 0) !important">
                     <td colspan="5" class="text-right">Grand Total</td>
                     <td>{{ $nyaa->rupiah_formatter($jumlah_rp_all) }}</td>
                     <td></td>
                     <td></td>
                 </tr>
             </tfoot>
         </table>
     </div>
 </div>