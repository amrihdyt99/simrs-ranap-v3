<div>
    <h3 class="font-weight-bold">Rencana Pre Operasi/Tindakan</h3>
    <br/>
    <form method="post" id="form-rencana-pre-operasi" action="{{ route('dokter.laporan-operasistore.rencana-pre-operasi', $reg) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="anamnesis-singkat">Anamnesis Singkat</label>
            <textarea class="form-control" id="anamnesis-singkat" rows="4" name="anamnesis_singkat" readonly>{{ $data['assesment_awal_dokter']->keluhan_utama ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="alergi">Alergi</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2 row">
                    <div class="col-sm-12 col-lg-6">
                        <input type="radio" name="alergi" value="0" id="alergi_n" {{ isset($data['rencana_pre_operasi']) && $data['rencana_pre_operasi']->alergi==0 ? 'checked':'' }}>
                        <label for="alergi_n">Tidak</label>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <input type="radio" name="alergi" value="1" id="alergi_y"  {{ isset($data['rencana_pre_operasi']) && $data['rencana_pre_operasi']->alergi==1 ? 'checked':'' }}>
                        <label for="alergi_y">Ya</label>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <input type="text" name="catatan_alergi" id="catatan_alergi" class="form-control" placeholder="Isi jika ada" value="{{ $data['rencana_pre_operasi']->catatan_alergi ?? '' }}">
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="pemeriksaan-fisik">Pemeriksaan Fisik</label>
            <textarea class="form-control" id="pemeriksaan-fisik" rows="4" name="pemeriksaan_fisik">{{ $data['rencana_pre_operasi']->pemeriksaan_fisik ?? '' }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="diagnosa-pre-operasi">Diagnosa Pre Operasi/Tindakan</label>
            <textarea class="form-control" id="diagnosa-pre-operasi" rows="4" name="diagnosa_pre_operasi">{{ $data['rencana_pre_operasi']->diagnosa_pre_operasi ?? '' }}</textarea>
        </div>
    
        <div class="form-group">
            <label>Operasi/Tindakan</label>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Operasi</th>
                        <th>Persiapan Alat Khusus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['pasien_prosedur'] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <input type="hidden" name="operasi[{{ $item->pprosedur_prosedur }}][kode]" class="form-control" value="{{ $item->pprosedur_prosedur }}">
                            <span>{{ $item->pprosedur_prosedur }}</span>&nbsp; <span>{{ $item->nama_tindakan }}</span>
                        </td>
                        <td>
                            <div class="row">
                                <div class="cols-sm-12 col-lg-3">
                                    <select name="operasi[{{ $item->pprosedur_prosedur }}][persiapan]" id="persiapan_alat_khusus" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1" {{ $item->persiapan_alat_khusus==1 ? 'selected':''}}>Ya</option>
                                        <option value="0" {{ $item->persiapan_alat_khusus==0 ? 'selected':''}}>Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-9">
                                    <textarea name="operasi[{{ $item->pprosedur_prosedur }}][catatan_persiapan]" id="" cols="32" rows="1" class="form-control" placeholder="Isi jika ada">{{ $item->catatan_persiapan_alat_khusus??'' }}</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
            <button type="button" class="btn btn-primary" onclick="handleSaveLaporanRencanaPreOperasi()">
                Simpan
            </button>
        </div>
    </form>
</div>

@push('myscripts')
<script>
    const handleSaveLaporanRencanaPreOperasi =()=>{
        event.preventDefault()
        let form = $('#form-rencana-pre-operasi')
        let data = form.serialize()
        let url = form.attr('action')
        let method = form.attr('method')
        //show confirm dialog
        Swal.fire({
            title: 'Simpan Laporan Operasi',
            text: "Apakah anda yakin ingin menyimpan laporan operasi ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // do save operation
                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    success: function(response){
                        console.log(response)
                        if(response){
                            Swal.fire({
                                title: 'Berhasil',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                        }else{
                            Swal.fire({
                                title: 'Gagal',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    },
                    error: function(error){
                        console.log(error)
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Terjadi kesalahan, silahkan coba lagi',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                })
            }
        })

    }
</script>
@endpush