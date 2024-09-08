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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
       getSoapDokter()
    });

    function updateverifikasi(id){
        Swal.fire({
            title:'Yakin ingin memverifikasi data ini?',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonText: 'Ya, Verifikasi',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
        $.ajax({
            url: "{{ route('dokter.verifikasicppt') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                "id": id,
                "nama_ppa":"{{ auth()->user()->name}}",
                "dpjp_utama":"{{ auth()->user()->dokter_id}}",
            },
            success: function(data) {
                    console.log(data);
                    var success = data.success;
                    if (success == true) {
                        Swal.fire('Berhasil!', 'Data berhasil diverifikasi.', 'success');
                        getSoapDokter(); // Memuat ulang tabel setelah verifikasi
                    } else {
                        Swal.fire('Gagal', data.msg, 'error');
                    }
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Dibatalkan', 'Verifikasi dibatalkan.', 'info');
        }
    });
}


</script>

@endpush

