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

{{--@section('scripts')
<script>
    /*$(document).ready(function () {
        console.log('ready entry physician team');



    });*/




</script>
@endsection--}}
