<div class="card-columns">
    @foreach (DB::table('rs_m_item_tipe')->select('tipe_id', 'tipe_name')->where('tipe_jenis', 'LIKE', '%'.$type.'%')->get() as $tipe)
        <div class="card">
            <div class="card-header text-uppercase" style="background-color: green">
                <h6 class="text-center text-white font-weight-bold">{{$tipe->tipe_name}}</h6>
            </div>
            <div class="card-body px-0">
                @foreach (DB::table('rs_m_item')->leftjoin('rs_m_item_tarif', 'rs_m_item.ItemID', 'rs_m_item_tarif.ItemID')->where('ItemCategory', $tipe->tipe_id)->where($where_class)->select('rs_m_item.ItemID', 'rs_m_item.ItemCode', 'ItemName1', 'PersonalPrice')->get()->unique('ItemID') as $item)
                    <table class="table1 table table-bordered my-0 mx-0">
                        <tbody>
                            <tr class="data_items">
                                <td width="20"><input type="checkbox" id="grid_tindakan" data-id="{{$item->ItemID}}" data-type="{{$cpoe}}" data-name="{{$item->ItemName1}}" data-price="{{$item->PersonalPrice}}" value="{{$item->ItemCode}}"></td>
                                <td style="font-size: 14px">{{$item->ItemName1}}</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    @endforeach
</div>