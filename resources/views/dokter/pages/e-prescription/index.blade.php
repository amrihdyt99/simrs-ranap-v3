<div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-sm" id="custom-tabs-obat-satuan-tab"
                   data-toggle="pill"
                   href="#custom-tabs-obat-satuan" role="tab"
                   aria-controls="custom-tabs-obat-satuan"
                   aria-selected="true">Obat Satuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-sm" id="custom-tabs-obat-racikan-tab"
                   data-toggle="pill"
                   href="#custom-tabs-obat-racikan" role="tab"
                   aria-controls="custom-tabs-obat-racikan"
                   aria-selected="false">Obat Racikan</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active"
                 id="custom-tabs-obat-satuan" role="tabpanel"
                 aria-labelledby="custom-tabs-obat-satuan-tab">
                <button class="btn btn-sm btn-outline-primary float-right mb-2" id="btn-tambah-obat-satuan"
                        disabled>Mohon
                    Tunggu...
                </button>
                <form action="{{route('dokter.obat.satuan.store')}}" method="post">
                    @csrf
                    <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
                    <input type="text" name="service_unit" value="{{$patient->service_unit}}" hidden>
                    <input type="text" name="kode_dokter" value="{{$patient->reg_dokter}}" hidden>
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            <th class="text-sm" style="width: 40%">Nama Obat</th>
                            <th class="text-sm" style="width: 10%">Quantity</th>
                            <th class="text-sm" style="width: 10%">Dosis</th>
                            <th class="text-sm" style="width: 10%">Hari</th>
                            <th class="text-sm" style="width: 10%">Durasi Hari</th>
                            <th class="text-sm" style="width: 10%">Keterangan Dosis</th>
                            <th class="text-sm" style="width: 10%">Harga Jual</th>
                        </tr>
                        </thead>
                        <tbody class="satuanListBody">

                        </tbody>
                    </table>
                    <button onclick="return confirm('Apakah data yang diinput sudah benar?')"
                            class="btn btn-sm btn-outline-primary float-right mb-2" id="">Kirim Obat
                    </button>
                </form>

            </div>
            <div class="tab-pane fade" id="custom-tabs-obat-racikan"
                 role="tabpanel"
                 aria-labelledby="custom-tabs-obat-racikan-tab">
                <button class="btn btn-sm btn-outline-primary float-right mb-2" id="btn-tambah-obat-racikan"
                        disabled>Mohon
                    Tunggu...
                </button>
                <form action="{{route('dokter.obat.racikan.store')}}" method="post">
                    @csrf
                    <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
                    <input type="text" name="service_unit" value="{{$patient->service_unit}}" hidden>
                    <input type="text" name="kode_dokter" value="{{$patient->dokter}}" hidden>
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                        <tr>
                            <th class="text-sm" style="width: 40%">Nama Obat</th>
                            <th class="text-sm" style="width: 10%">Quantity</th>
                            <th class="text-sm" style="width: 10%">Dosis</th>
                            <th class="text-sm" style="width: 10%">Hari</th>
                            <th class="text-sm" style="width: 10%">Durasi Hari</th>
                            <th class="text-sm" style="width: 10%">Keterangan Dosis</th>
                            <th class="text-sm" style="width: 10%">Harga Jual</th>
                        </tr>
                        </thead>
                        <tbody class="racikanListBody">

                        </tbody>
                    </table>
                    <button onclick="return confirm('Apakah data yang diinput sudah benar?')"
                            class="btn btn-sm btn-outline-primary float-right mb-2" id="">Kirim Obat
                    </button>
                </form>

            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
