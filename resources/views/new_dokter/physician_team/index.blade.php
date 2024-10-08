<h2 class="text-black">Physician Team Setting</h2>
<hr>
<form id="physician_team_dokter">
    <div class="text-black" style="font-size: 14px">
        <div class="form-group mt-3">
            <label for="" class="d-flex">
                <h4><b>Pilih Dokter</b></h4>
            </label>
            <select id="physician_kode_dokter" name="physician_kode_dokter" class="form-control">
                <option value="">-----Pilih Dokter-----</option>
                <option value="1">Dokter 1</option>
                <option value="2">Dokter 2</option>
                <option value="3">Dokter 3</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="" class="d-flex">
                <h4><b>Pilih Kategori</b></h4>
            </label>
            <select id="physician_kategori" name="physician_kategori" class="form-control">
                <option value="Dokter Jaga">Dokter Jaga</option>
                <option value="Rawat Bersama">Rawat Bersama</option>
                <option value="Konsul">Konsul</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <button type="button" class="btn btn-primary" id="btn_tambah_team">Tambah</button>
        </div>
    </div>
    <br>
    <hr>
</form>

<h2 class="text-black">Physician Team</h2>
<hr>
<div class="form-group mt-3">
    <div class="">
        <table class="table1 table" id="list_physician_team_dokter">
            <thead class="bg-dark text-white">
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
            <tbody id="table-physician-team-dokter">
            </tbody>
        </table>
    </div>
</div>
