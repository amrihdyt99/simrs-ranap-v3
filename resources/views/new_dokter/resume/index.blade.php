<div class="row">
    <div class="col-lg-8">
        @if (auth()->user()->level_user != 'dokter')
            <div class="form-group float-left">
                <select id="select-dokter" class="form-control select2" style="width: 400px">
                    <option value="">-- Pilih Nama Dokter --</option>
                </select>
                <h6 class="alert-dokter-resume text-danger mt-1"></h6>
            </div>
        @endif
    </div>
    <div class="col-lg-4">
        <button class="btn btn-primary float-right ml-2 btn-export-resume"><i class="fas fa-file-excel"></i> Export Resume</button>
        <button class="btn btn-success float-right mb-3 reload-resume"><i class="fas fa-redo"></i> Reload Table</button>
    </div>
</div>
<div id="export-resume">
    <h3>RESUME PASIEN RAWAT JALAN | No Reg : {{$reg}}</h3>
    <div class="table table-responsive">
        <form action="form-add-resume">
            @csrf
            <table rules="all" class="table1 mt-3 mb-3" style="width:100%">
                <thead>
                    <tr class="bg-dark text-white" style="border: 0.5px solid black;">
                        <th style="border: 0.5px solid black;">Tgl Kunjungan</th>
                        <th style="border: 0.5px solid black;">Diagnosa</th>
                        <th style="border: 0.5px solid black;">ICD</th>
                        <th style="border: 0.5px solid black;">Obat/Tindakan</th>
                        <th style="border: 0.5px solid black;">Riwayat Rawat Inap</th>
                        {{-- <th style="border: 0.5px solid black;" class="text-center" colspan="3">Prosedur Bedah Operasi</th> --}}
                        <th style="border: 0.5px solid black;">Petugas Kesehatan (Dokter, Dietisian, Terapis, dll)</th>
                        <th style="border: 0.5px solid black;">Poliklinik</th>
                    </tr>
                </thead>
                <tbody id="table-resume"></tbody>
            </table>
            <button type="button" class="btn btn-success float-right" id="btn-save-resume">Simpan</button>
        </form>
    </div>
</div>