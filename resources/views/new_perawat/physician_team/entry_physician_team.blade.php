@if (Auth::user()->level_user == 'perawat')
<h2 class="text-black">Physician Team Setting</h2>
<hr>
<form id="entry-setting-physician">
    @csrf
    <div class="text-black" style="font-size: 14px">
        <div class="form-group mt-3">
            <label for="" class="d-flex"><h4><b>Pilih Dokter</b></h4></label>
            <select id="physician_kode_dokter" name="physician_kode_dokter" class="form-control">
                <option value="">-----Pilih Dokter-----</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex">
                <h4><b>Pilih PPA Lainnya</b></h4>
            </label>
            <select id="physician_kode_lainnya" name="physician_kode_lainnya" class="form-control">
                <option value="">-----Pilih PPA Lainnya-----</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex"><h4><b>Pilih Kategori</b></h4></label>
            <select id="physician_kategori" name="physician_kategori" class="form-control">
                <option value="Dokter Jaga">Dokter Jaga</option>
                <option value="Rawat Bersama">Rawat Bersama</option>
                <option value="Konsul">Konsul</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <button type="button" class="btn btn-primary" onclick="addPhysicianTeam()">Tambah</button>
        </div>
    </div>
    <br><hr>
</form>

<h2 class="text-black">Physician Team</h2>
<hr>
<div class="form-group mt-3">
    <div class="">
        <table class="table1 table">
            <thead class="bg-dark text-white">
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
                <tbody id="table-physician-team">
            </tbody>
        </table>
    </div>
</div>
@endif

@if (Auth::user()->level_user == 'radiologi' || Auth::user()->level_user == 'lab' || Auth::user()->level_user == 'perawat' || Auth::user()->level_user == 'dietitian')
    <h2 class="text-black mt-5">Konsul</h2>
    <hr>
    @php
    $currentDokter = auth()->user()->dokter_id ?? auth()->user()->perawat_id;

    $registrasi = DB::connection('mysql2')->table('m_registrasi')
        ->where('reg_no', $reg)
        ->first();
    $isDPJP = $currentDokter == $registrasi->reg_dokter;

    $isKonsulDokter = DB::connection('mysql2')->table('m_physician_team')
        ->where('kode_dokter', $currentDokter)
        ->where('reg_no', $reg)
        ->where('kategori', 'Konsul')
        ->exists();
    @endphp

    <table class="table table-bordered">
        <tr>
            <td><h4><b>Tanggal dan Isi Konsul</b></h4></td>
            <td>
                <input type="date" id="tanggal_konsul" name="tanggal_konsul" class="form-control mb-2" required {{ !$isDPJP ? 'readonly' : '' }}>
                <textarea id="isi_konsul" name="isi_konsul" class="form-control" rows="3" required {{ !$isDPJP ? 'readonly' : '' }}></textarea>
                @if($isDPJP)
                <button type="button" class="btn btn-primary mt-2" id="btn_simpan_isi_konsul">Simpan Konsul</button>
                @endif
            </td>
        </tr>
        <tr>
            <td><h4><b>Tanggal dan Jawaban Konsul</b></h4></td>
            <td>
                <input type="date" id="tanggal_jawaban_konsul" name="tanggal_jawaban_konsul" class="form-control mb-2" {{ !$isKonsulDokter ? 'readonly' : '' }}>
                <textarea id="jawaban_konsul" name="jawaban_konsul" class="form-control" rows="3" {{ !$isKonsulDokter ? 'readonly' : '' }}></textarea>
                @if($isKonsulDokter)
                <button type="button" class="btn btn-primary mt-2" id="btn_simpan_jawaban_konsul">Simpan Jawaban Konsul</button>
                @endif
            </td>
        </tr>
    </table>
@endif

