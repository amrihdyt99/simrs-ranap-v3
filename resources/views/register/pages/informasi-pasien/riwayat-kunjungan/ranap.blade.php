<div>
    <div class="row">
        <div class="col-sm-12 col-lg-2">
            <div class="form-group">
                <label for="start_date_ranap">Mulai Tanggal</label>
                <input type="date" class="form-control" id="start_date_ranap" placeholder="Mulai Tanggal">
            </div>
        </div>
        <div class="col-sm-12 col-lg-2" >
            <div class="form-group">
                <label for="end_date_ranap">Sampai Tanggal</label>
                <input type="date" class="form-control" id="end_date_ranap" placeholder="Sampai Tanggal">
            </div>
        </div>
        <div class="col-sm-12 col-lg-2 d-flex align-items-center">
            <button class="btn btn-primary" style="margin-top: 4px;" onclick="handleFilterDateRanap()">Filter</button>
        </div>
    </div>
</div>

<div>
    {{-- datatables --}}
    <table id="ranapTable" class="table table-bordered">
        <thead>
            <tr>
                <th>No. Reg</th>
                <th>Tanggal</th>
                <th>Asal</th>
                <th>Dokter</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
    </table>
</div>