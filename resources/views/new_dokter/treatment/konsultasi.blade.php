<div class="row">
    <div class="col">
        <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-konsultasi"><i class="fas fa-redo"></i> Reload</button>
        <button class="btn btn-success mb-3 float-right" id="btn-add-konsultasi"><i class="fas fa-plus"></i> Tambah Data Konsultasi</button>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table1" width="100%">
            <thead class="text-uppercase bg-warning">
                {{-- <th class="font-weight-bold"></th> --}}
                <th class="font-weight-bold">Tanggal Konsultasi</th>
                <th class="font-weight-bold">Dokter/Poli Pengirim</th>
                <th class="font-weight-bold">Dokter/Poli Tujuan</th>
                <th class="font-weight-bold">Permintaan Konsultasi</th>
                <th class="font-weight-bold">Jawaban Konsultasi</th>
            </thead>
            <tbody id="table-konsultasi">
            </tbody>
        </table>
    </div>
</div>