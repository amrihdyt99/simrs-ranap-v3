<table class="table1" rules="all" style="width:100%" id="table-body-rekomendasi">
    <thead>
    <tr class="text-uppercase bg-warning">
        <th class="first-row text-center font-weight-bold" width="80px">Tanggal</th>
        <th class="text-center font-weight-bold" width="80px">PPA</th>
        <th class="text-center font-weight-bold" width="300px">Rekomendasi</th>
        <th class="last-row text-center font-weight-bold" width="30px">Aksi</th>
    </tr>
    </thead>
    <tbody id="table-rekomendasi">
    </tbody>
</table>

@push('myscripts')
    <script>
        $(document).ready(function() {

            getRekomendasiRajal();
        });
    </script>
@endpush
