<div>
    <h3 class="font-weight-bold">Operasi/Tindakan</h3>
    <br/>
    <form action="{{ route('dokter.laporan-operasistore.rencana-operasi-tindakan', $reg) }}" id="form-rencana-operasi-tindakan" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="tanggal_operasi">Tanggal</label>
                    <input type="date" name="tanggal_operasi" id="tanggal_operasi" class="form-control" value="{{ $data['operasi_tindakan']->tanggal_operasi ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="jam-mulai-tindakan-operasi">Jam Mulai Operasi/Tindakan</label>
                    <input type="time" name="mulai_jam_operasi" id="jam-mulai-operasi-tindakan" class="form-control" value="{{ $data['operasi_tindakan']->mulai_jam_operasi ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="jam-selesai-tindakan-operasi">Jam Seleasi Operasi/Tindakan</label>
                    <input type="time" name="selesai_jam_operasi" id="jam-selesai-operasi-tindakan" class="form-control" value="{{ $data['operasi_tindakan']->selesai_jam_operasi ?? '' }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="dokter_bedah">Dokter Bedah</label>
                    <input type="text" class="form-control" name="dokter_bedah" value="{{ $data['operasi_tindakan']->dokter_bedah ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="asisten_1">Asisten I</label>
                    <input type="text" class="form-control" name="asisten_1" value="{{ $data['operasi_tindakan']->asisten_1 ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="asisten_2">Asisten II</label>
                    <input type="text" class="form-control" name="asisten_2" value="{{ $data['operasi_tindakan']->asisten_2 ?? '' }}">
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="dokter_anestesi">Dokter Anestesi</label>
                    <input type="text" class="form-control" name="dokter_anestesi" value="{{ $data['operasi_tindakan']->dokter_anastesi ?? ''}}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="perawat_instrumen">Perawat Instrumen</label>
                    <input type="text" class="form-control" name="perawat_instrumen" value="{{ $data['operasi_tindakan']->perawat_instrumen  ?? ''}}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for="tipe_operas">Tipe Operasi</label>
                    <select name="tipe_operasi" id="tipe_operasi" class="form-control">
                        <option value="">Tipe Operasi</option>
                        <option value="Darurat" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_operasi == 'Daruat' ? 'selected':'' }}>Darurat</option>
                        <option value="Terencana"  {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_operasi == 'Terencana' ? 'selected':'' }}>Terencana</option>
                    </select>
                </div>
            </div>
        </div>
    
        <hr>
        
        <div class="form-group">
            <label for="diagnosa_pasca_bedah">Diagnosa Pasca Bedah</label>
            <textarea class="form-control" id="diagnosa_pasca_bedah" rows="4" name="diagnosa_pasca_bedah">{{ $data['operasi_tindakan']->diagnosa_pasca_bedah ?? '' }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="operasi_tindakan_bedah">Operasi Tindakan(<span style="font-style: italic;">Lakukan Pengisian Melalui CPPT</span>)</label>
            <ul class="list-group">
                @foreach ($data['pasien_prosedur'] as $item)
                    <li class="list-group-item">
                        <span>{{ $item->pprosedur_prosedur }} - </span>
                        <span>{{ $item->nama_tindakan }}</span>
                    </li>  
                @endforeach
            </ul>
        </div>
    
        <div class="form-group">
            <label for="tipe_anestesi">Tipe Anestesi</label>
            <select name="tipe_anestesi" id="tipe_anestesi" class="form-control">
                <option value="">Tipe Anestesi</option>
                <option value="Spinal" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_anestesi == 'Spinal' ? 'selected' : '' }}>Spinal</option>
                <option value="Epidural" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_anestesi == 'Epidural' ? 'selected': '' }}>Epidural</option>
                <option value="GA" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_anestesi == 'GA' ? 'selected': '' }}>GA</option>
                <option value="Peripheral" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_anestesi == 'Peripheral' ? 'selected': '' }}>Peripheral</option>
                <option value="Local" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->tipe_anestesi == 'Local' ? 'selected' : ''}}>Local</option>
            </select>
        </div>
        <hr/>
        <div class="form-group">
            <label for="pengirim-spesimen-klinik-patologi">Pengirim spesimen ke klilnik Patologi</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <select name="pengirim_spesimen_klinik_patologi" id="pengirim-spesimen-klinik-patologi" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->pengirim_spesimen_klinik_patologi == '1' ? 'selected': '' }}>Ya</option>
                        <option value="0" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->pengirim_spesimen_klinik_patologi == '0' ? 'selected': '' }}>Tidak</option>
                    </select>
                </div>
                <div class="col-sm-12 col-lg-10 row">
                    <div class="col-sm-12 col-lg-2">
                        <input type="radio" name="ket_spesimen_klinik_patologi" id="ket_spesimen_klinik_patologi1" 
                            value="Jaringan" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->ket_spesimen_klinik_patologi == 'Jaringan' ? 'checked':'' }}>
                        <label for="ket_spesimen_klinik_patologi1">Jaringan</label>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <input type="radio" name="ket_spesimen_klinik_patologi" id="ket_spesimen_klinik_patologi2" 
                            value="Batu" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->ket_spesimen_klinik_patologi == 'Batu' ? 'checked':'' }}>
                        <label for="ket_spesimen_klinik_patologi2">Batu</label>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <input type="radio" name="ket_spesimen_klinik_patologi" id="ket_spesimen_klinik_patologi3" 
                            value="Pus" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->ket_spesimen_klinik_patologi == 'Pus' ? 'checked':'' }}>
                        <label for="ket_spesimen_klinik_patologi3">Pus</label>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <input type="radio" name="ket_spesimen_klinik_patologi" id="ket_spesimen_klinik_patologi4" 
                            value="Lainnya" {{ isset($data['operasi_tindakan']) && $data['operasi_tindakan']->ket_spesimen_klinik_patologi == 'Lainnya' ? 'checked':'' }}>
                        <label for="ket_spesimen_klinik_patologi4">Lainnya</label>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <input type="text" name="ket_spesimen_klinik_patologi_lainnya" id="ket_spesimen_klinik_patologi_lainnya" placeholder="Lainnya" class="form-control" value="{{ $data['operasi_tindakan']->ket_spesimen_klinik_patologi_lainnya ?? ''}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="asal-spesimen">Asal Spesimen</label>
                    <input type="text" name="asal_spesimen" class="form-control" value="{{ $data['operasi_tindakan']->asal_spesimen ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="form-group">
                    <label for="kultur">Kultur</label>
                    <select name="kultur" id="kultur" class="form-control">
                        <option value="">Kultur</option>
                        <option value="1" {{ isset( $data['operasi_tindakan']) && $data['operasi_tindakan']->kultur == '1' ? 'selected':'' }}>Ya</option>
                        <option value="0" {{ isset( $data['operasi_tindakan']) && $data['operasi_tindakan']->kultur == '0' ? 'selected':'' }}>Tidak</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                    <label for="perkiraan_jumlah_pendarahan">Perkiraan Jumlah Pendarahan</label>
                    <input type="number" name="perkiraan_jumlah_pendarahan" class="form-control" placeholder="ml" value="{{ $data['operasi_tindakan']->perkiraan_jumlah_pendarahan ?? '' }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <label for="">Transfusi</label>
                <div class="form-group row">
                    <label for="" class="col-sm-12 col-lg-2">WB</label>
                    <input type="number" name="transfusi_wb" class="form-control col-sm-12 col-lg-10" placeholder="ml" value="{{ $data['operasi_tindakan']->jumlah_transfusi_wb ?? '' }}">
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-12 col-lg-2">FFP</label>
                    <input type="number" name="transfusi_ffp" class="form-control col-sm-12 col-lg-10" placeholder="ml" value="{{ $data['operasi_tindakan']->jumlah_transfusi_ffp ?? ''}}">
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-12 col-lg-2">PRC</label>
                    <input type="number" name="transfusi_prc" class="form-control col-sm-12 col-lg-10" placeholder="ml" value="{{ $data['operasi_tindakan']->jumlah_transfusi_prc ??'' }}">
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-12 col-lg-2">Cyro</label>
                    <input type="number" name="transfusi_cyro" class="form-control col-sm-12 col-lg-10" placeholder="ml" {{ $data['operasi_tindakan']->jumlah_transfusi_cyro ??'' }}>
                </div>
            </div>
        </div>
    
        <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
            <button class="btn btn-primary" onclick="handleSaveLaporanRencanaOperasiTindakan()">
                Simpan
            </button>
        </div>
    </form>
</div>

@push('myscripts')
<script>
    const handleSaveLaporanRencanaOperasiTindakan = ()=>{
        event.preventDefault()
        let form = $('#form-rencana-operasi-tindakan') 
        let data = form.serialize()
        let url = form.attr('action')
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
                            text: 'Terjadi kesalahan saat menyimpan data',
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