@if ($dataPasien->reg_discharge == 1)
    @if ($dataPasien->discharge)
        @if ($dataPasien->discharge->status == 'waiting')
            <p class="text-danger">Open discharge sedang diproses, mohon hubungi petugas rekam medis untuk approval permintaan</p>
        @else
            <button class="btn btn-info float-right mb-3" onclick="$('#modalOpenDischarge').modal('show')"><i class="fas fa-paper-plane"></i> Ajukan Open Discharge</button>
            <p class="text-danger">
                Open discharge tidak disetujui, <br> 
                <b>Alasan : {{$dataPasien->discharge->open_text}} - {{$dataPasien->discharge->open_at}}</b><br>
                Silahkan ajukan ulang open discharge dan hubungi petugas rekam medis untuk approval permintaan
            </p>
        @endif
    @else
        <button class="btn btn-info float-right mb-3" onclick="$('#modalOpenDischarge').modal('show')"><i class="fas fa-paper-plane"></i> Ajukan Open Discharge</button>
        <p class="text-danger">Pasien sudah discharge, CPPT dan tindakan tidak bisa ditambahkan, silahkan ajukan <b>Open Discharge</b> untuk mendapatkan akses.</p>
    @endif
@else
    <button class="btn btn-success float-right mb-3" id="btn-add-soap"><i class="fas fa-plus"></i> Tambah CPPT</button>
@endif

<button class="btn btn-primary float-right mb-3 mr-1" onclick="$('#modalViewHistorySoap').modal('show')"><i class="fas fa-history"></i> View History SOAP</button>
<button class="btn btn-info float-right mb-3 mr-1" onclick="getSoapDokter()"><i class="fas fa-redo"></i> Reload Data</button>


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

