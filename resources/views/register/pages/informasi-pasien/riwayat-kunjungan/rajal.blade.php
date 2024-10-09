<div>
    <div class="row">
        <div class="col-sm-12 col-lg-2">
            <div class="form-group">
                <label for="start_date_rajal">Mulai Tanggal</label>
                <input type="date" class="form-control" id="start_date_rajal" placeholder="Mulai Tanggal">
            </div>
        </div>
        <div class="col-sm-12 col-lg-2" >
            <div class="form-group">
                <label for="end_date_rajal">Sampai Tanggal</label>
                <input type="date" class="form-control" id="end_date_rajal" placeholder="Sampai Tanggal">
            </div>
        </div>
        <div class="col-sm-12 col-lg-2 d-flex align-items-center">
            <button class="btn btn-primary" style="margin-top: 4px;" onclick="handleFilterDateRajal()">Filter</button>
        </div>
    </div>
</div>
<div>
    <table id="rajalTable" class="table table-bordered w-100">
        <thead>
            <tr>
                <th>No. Reg</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Poli</th>
                <th>Dokter</th>
            </tr>
        </thead>
    </table>
</div>