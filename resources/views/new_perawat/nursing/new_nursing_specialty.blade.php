{{--
<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="" class="text-sm">Tanggal</label>
                <input type="datetime-local" class="form-control form-control-sm text-sm"
                       name="tgl_pemberian">

            </div>
            <div class="form-group">
                <button class="btn btn-primary">Cari</button>
            </div>
        </div>

    </div>
</div>
--}}
<div class="form-group">

    <table class="table1 w-100">
            <thead>
            <th>Kategori</th>
            <th>Value</th>
            <th>Tanggal</th>
            <th>Jam</th>
            </thead>
            <tbody>
            @foreach($vitaldata as $v)
                <tr>
                    <td>{{$v['kategori']}}</td>
                    <td>{{$v['data']}}</td>
                    <td>{{$v['tanggal_pemberian']}}</td>
                    <td>{{$v['jam_pemberian']}}</td>
                </tr>
            @endforeach

            </tbody>
    </table>
</div>
