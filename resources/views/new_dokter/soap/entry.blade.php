<button class="btn btn-success float-right mb-3" id="btn-add-soap"><i class="fas fa-plus"></i> Tambah CPPT</button>
<table class="table1" rules="all" style="width:100%">
    <thead>
        <tr class="text-uppercase bg-warning">
            <th class="first-row text-center font-weight-bold" width="80px">Tanggal</th>
            <th class="text-center font-weight-bold" width="80px">PPA</th>
            <th class="text-center font-weight-bold" width="300px">Pemeriksaan</th>
            <th class="last-row text-center font-weight-bold" width="150px">Instruksi PPA <br>Termasuk Pasca Bedah</th>
            <th class="last-row text-center font-weight-bold" width="30px">Review Dan verifikasi DPJP</th>
        </tr>
    </thead>
    <tbody id="table-cppt-dokter">
    </tbody>
</table>


@push('myscripts')
<script>
    $(document).ready(function() {
       getSoapDokter()

    });



    function updateverifikasi(id){
        //console.log(id)
        $.ajax({
            url: "{{ route('dokter.verifikasicppt') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                "id": id,
                "nama_ppa":"{{ auth()->user()->name}}",
                "dpjp_utama":"{{ auth()->user()->dokter_id}}",
            },
            success: function (data) {
                console.log(data)
                var success=data.success;
                if(success==true){
                    alert('Data Berhasil Di Verifikasi')
                    getSoapDokter()
                }else{
                    alert(data.msg)
                }
            }
        })
    }


</script>

@endpush

