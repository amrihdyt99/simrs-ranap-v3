<div>
    <h3 class="font-weight-bold">Prosedur Penemuan Komplikasi</h3>
    <br/>
    <form action="{{ route('dokter.laporan-operasistore.prosedur-penemuan-komplikasi', $reg) }}" method="post" id="form-prosedur-penemuan-kompilasi">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Catatan Prosedur Penemuan Komplikasi</label>
            <textarea class="form-control" id="catatan_prosedur_penemuan_komplikasi" rows="6" name="catatan_prosedur_penemuan_komplikasi">{{ $data['penemuan_komplikasi']->catatan_prosedur ??'' }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="">Komplikasi</label>
            <div class="row">
                <div class="col-12 mb-2">
                    <select name="komplikasi" id="kompilasi" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ isset($data['penemuan_komplikasi']) && $data['penemuan_komplikasi']->is_komplikasi == '1' ? 'selected': '' }}>Ya</option>
                        <option value="0" {{ isset($data['penemuan_komplikasi']) && $data['penemuan_komplikasi']->is_komplikasi == '0' ? 'selected': '' }}>Tidak</option>
                    </select>
                </div>
                <div class="col-12">
                    <textarea class="form-control" id="catatan_kompilasi" rows="3" name="catatan_komplikasi" placeholder="Jenis dan penanganan">{{ $data['penemuan_komplikasi']->catatan_komplikasi ?? '' }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Implan</label>
            <div class="row">
                <div class="col-12 mb-2">
                    <select name="implant" id="implan" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ isset($data['penemuan_komplikasi']) && $data['penemuan_komplikasi']->is_implant == '1' ? 'selected': '' }}>Ya</option>
                        <option value="0" {{ isset($data['penemuan_komplikasi']) && $data['penemuan_komplikasi']->is_implant == '0' ? 'selected': '' }}>Tidak</option>
                    </select>
                </div>
                <div class="col-12">
                    <textarea class="form-control" id="catatan_implant" rows="3" name="catatan_implant" placeholder="Jenis dan jumlah">{{ $data['penemuan_komplikasi']->catatan_implant ?? '' }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="dokter_operator">Dokter Operator</label>
            <select id="kode_dokter_operator" name="kode_dokter_operator"
                class="form-control select2bs4 {{ $errors->has('reg_dokter') ? " is-invalid" : "" }}">
                <option value="">-</option>
                @foreach ($data['physician'] as $row)
                <option
                    value="{{ $row->ParamedicCode }}" {{ isset($data['penemuan_komplikasi']) && $row->ParamedicCode == $data['penemuan_komplikasi']->kode_dokter_operator ? 'selected':'' }}>
                    {{ $row->ParamedicName }}
                </option>
                @endforeach
            </select>
        </div>
    
        <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
            <button class="btn btn-primary" onclick="handleSaveLaporanPenemuanKompilasi()">
                Simpan
            </button>
        </div>
    </form>
</div>

@push('myscripts')
<script>
    
    $(document).ready(function(){
        $("#kode_dokter_operator").select2({
            placeholder: "Pilih Dokter Operator",
            allowClear: true
        });
    })
    const handleSaveLaporanPenemuanKompilasi = ()=>{
        event.preventDefault()
        let form = $("#form-prosedur-penemuan-kompilasi")
        let url = form.attr('action')
        let data = form.serialize()
        let method = form.attr('method')

        // show dialog confirmation
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
                    type: method,
                    data: data,
                    success: function(response){
                        console.log(response)
                        Swal.fire(
                            'Berhasil!',
                            'Berhasil disimpan.',
                            'success'
                        )
                    },
                    error: function(err){
                        console.log(err)
                        Swal.fire(
                            'Gagal!',
                            'Gagal disimpan.',
                            'error'
                        )
                    }
                })
            }
        })
    }
</script>
@endpush