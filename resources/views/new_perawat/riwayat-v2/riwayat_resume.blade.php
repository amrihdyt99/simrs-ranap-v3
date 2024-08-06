<button class="btn btn-primary float-right ml-2 btn-export-riwayat-resume"><i class="fas fa-file-excel"></i> Export Resume</button>
<button class="btn btn-success float-right mb-3 reload-riwayat-resume"><i class="fas fa-redo"></i> Reload Table</button>
<div id="export-riwayat-resume">
    <h3>RIWAYAT RESUME PASIEN RAWAT JALAN</h3>
    <br>
    <div class="table-responsive">
        <table rules="all" class="table dt-responsive nowrap mt-3 mb-3" style="width:100%; border: 0.5px black solid">
            <thead>
                <tr class="bg-dark text-white" style="border: 0.5px solid black;">
                    <th style="border: 0.5px solid black;">Tgl Kunjungan</th>
                    <th style="border: 0.5px solid black;" width="100">No. Reg</th>
                    <th style="border: 0.5px solid black;">Diagnosa</th>
                    <th style="border: 0.5px solid black;">ICD</th>
                    <th style="border: 0.5px solid black;">Obat/Tindakan</th>
                    <th style="border: 0.5px solid black;">Riwayat Rawat Inap</th>
                    {{-- <th style="border: 0.5px solid black;" class="text-center" colspan="3">Prosedur Bedah Operasi</th> --}}
                    <th style="border: 0.5px solid black;">Petugas Kesehatan (Dokter, Dietisian, Terapis, dll)</th>
                    <th style="border: 0.5px solid black;">Poliklinik</th>
                </tr>
            </thead>
            <tbody id="table-riwayat-resume"></tbody>
        </table>
    </div>
</div>