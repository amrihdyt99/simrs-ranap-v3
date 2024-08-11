
    <input type="hidden" name="pdischarge_reg" value="{{$reg}}">
    @if (auth()->user()->level_user != 'dokter')
    <div class="row">
        <div class="col">
                <div class="float-right">
                    <label for="">Petugas Discharge: </label>
                    <input type="text" name="pdischarge_dokter_nama" class="terapis" placeholder="Nama Petugas Discharge">
                </div>
            </div>
        </div>
    @endif
    @php
        $cek = DB::connection('mysql')->table('rs_m_resume_pasien')->where('reg_no',$reg);
        $cek2 = DB::connection('mysql')->table('rs_pasien_discharge')->where('pdischarge_reg',$reg);
   
    @endphp
    @if ($cek->count()==0 && $cek2 ->count() == 0)
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-8 pr-0">
                        <div class="form-group">
                            <label for="">Tanggal Discharge</label>
                            <input type="date" name="pdischarge_tgl" id="pdischarge_tgl" value="{{date('Y-m-d')}}" class="form-control no-radius">
                        </div>
                    </div>
                    <div class="col-lg-4 pl-0">
                        <div class="form-group">
                            <label for="">Jam Discharge</label>
                            <input type="time" name="pdischarge_jam" id="pdischarge_jam" value="{{date('H:i:s')}}" class="form-control no-radius">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-8 pr-0">
                        <div class="form-group">
                            <label for="">Tgl Kematian</label>
                            <input type="date" name="pdischarge_tgl_mati" id="pdischarge_tgl_mati" class="form-control no-radius">
                        </div>
                    </div>
                    <div class="col-lg-4 pl-0">
                        <div class="form-group">
                            <label for="">Jam Kematian</label>
                            <input type="time" name="pdischarge_jam_mati" id="pdischarge_jam_mati" class="form-control no-radius">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <h5 class="text-danger">
                    * Discharge condition only apply for Inpatient or Emergency Registration
                </h5>
                <fieldset class="form-group">
                    <label class="label-admisi">Alasan Pulang</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-control" id="pdischarge_alasan" name="pdischarge_alasan">
                                <option value="Sembuh">Sembuh</option>
                                <option value="Dapat Berobat Jalan">Dapat Berobat Jalan</option>
                                <option value="Pulang Sendiri">Pulang Atas Permintaan Sendiri</option>
                                <option value="Pindah Ke RS Lain">Pindah Ke RS Lain</option>
                                <option value="Meninggal">Meninggal</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <label class="label-admisi">Kondisi Pulang</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-control" id="pdischarge_condition" name="pdischarge_condition">
                            <option value="mandiri">Mandiri</option>
                                <option value="cacat">Cacat</option>
                                <option value="dengan alat bantu">Tidak Mandiri Dengan Alat Bantu</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <label class="label-admisi">Terapi Yang Sudah Diberikan</label>
                    <div class="row">
                        <div class="col">
                        <textarea class="form-control" name="pdischarge_terapi" id="pdischarge_terapi" rows="4"></textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="label-admisi">Obat yang dibawa pulang</label>
                    <div class="row">
                        <div class="col">
                        <textarea class="form-control" name="pdischarge_obat" id="pdischarge_obat" rows="4"></textarea>
                        </div>
                    </div>
                </fieldset>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Catatan Medis</label>
                    <textarea name="pdischarge_med_notes" id="pdischarge_med_notes" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea name="pdischarge_notes" id="pdischarge_notes" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Terapi</label>
                    <input type="date" name="tanggal_tindakan" id="tanggal_tindakan" class="form-control" >
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">

                <fieldset class="form-group">
                    <label class="label-admisi">Nama Tindakan/Operasi</label>
                    <div class="row">
                        <div class="col">
                            <textarea class="form-control" name="pdischarge_tindakan_operasi" rows="4" id="pdischarge_tindakan_operasi"></textarea>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <label class="label-admisi">Penyebab Luar/Cidera/Kecelakaan (Bila Ada)</label>
                    <div class="row">
                        <div class="col">
                            <textarea class="form-control" name="pdischarge_penyebab_luar" rows="4" id="pdischarge_penyebab_luar"></textarea>
                        </div>
                    </div>
                </fieldset>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Kode ICD-9-CM</label>
                    <textarea name="pdischarge_icd_9" id="pdischarge_icd_9" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Kode ICD-10</label>
                    <textarea name="pdischarge_icd_10" id="pdischarge_icd_10" class="form-control" rows="4"></textarea>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">RESUME PASIEN</h3>
                </div>
                <div class="card-body">
                    <h4>Kontrol di RSUD Siti Fatimah</h4>
            
                    <div class="form-group">
                        <label class="control-label">Klinik</label>
                    <input type="text" name="klinik" id="klinik"placeholder=""class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Dokter</label>
                        <input type="text" name="dokter" id="dokter" placeholder="" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tanggal Kontrol</label>
                        <input type="date" name="tanggal_kontrol_rsud" id="tanggal_kontrol_rsud" class="form-control"/>
                    </div>
                    
                    <h4>Rujukan RS Lain</h4>
                    
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="date" name="tanggal_rs_lain" id="tanggal_rs_lain" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ke RS</label>
                        <input type="text" name="nama_rs_lain" id="nama_rs_lain" placeholder="" class="form-control" />
                    </div>
                    
                    
                    <h4>Rujuk Balik</h4>
                    
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="date" name="tanggal_rujuk_balik" id="tanggal_rujuk_balik" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ke RS</label>
                        <input type="text" name="nama_rs_rujuk_balik" id="nama_rs_rujuk_balik" placeholder="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Puskesmas</label>
                        <input type="text" name="puskesmas" id="puskesmas" placeholder="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dokter Praktek Pribadi</label>
                        <input type="text" name="dokter_pribadi" id="dokter_pribadi" placeholder="" class="form-control" />
                    </div>
                    
                    <h4>Edukasi Pasien</h4>
                    
                    <div class="form-group">
                        <label class="control-label">Penyakit</label>
                        <input type="text" name="edukasi_penyakit" id="edukasi_penyakit" placeholder="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Diet</label>
                        <input type="text" name="edukasi_diet" id="edukasi_diet" placeholder="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alat bantu bila ada</label>
                        <input type="text" name="edukasi_alat_bantu" id="edukasi_alat_bantu" placeholder="" class="form-control" />
                    </div>
                </div>        
            </div>
        </div>
        @include('new_dokter.modal.meninggal')
        <button type="button" class="btn btn-success float-right mt-2" id="btn-save-discharge" onclick="adddischarge()"><i class="fas fa-save"></i> Simpan</button>

    @else
    @php
        $resume = $cek->first();
        $discharge = $cek2->first();
    @endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <div class="form-group">
                        <label for="">Tanggal Discharge</label>
                        <input type="date"  value="{{$discharge->pdischarge_tgl ?? ''}}" readonly class="form-control no-radius">
                    </div>
                </div>
                <div class="col-lg-4 pl-0">
                    <div class="form-group">
                        <label for="">Jam Discharge</label>
                        <input type="time" value="{{$discharge->pdischarge_jam ?? ''}}" readonly  class="form-control no-radius">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <div class="form-group">
                        <label for="">Tgl Kematian</label>
                        <input type="date" value="{{$discharge->pdischarge_tgl_mati ?? ''}}" readonly class="form-control no-radius">
                    </div>
                </div>
                <div class="col-lg-4 pl-0">
                    <div class="form-group">
                        <label for="">Jam Kematian</label>
                        <input type="time" value="{{$discharge->pdischarge_jam_mati ?? ''}}" readonly class="form-control no-radius">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <h5 class="text-danger">
                * Discharge condition only apply for Inpatient or Emergency Registration
            </h5>
            <fieldset class="form-group">
                <label class="label-admisi">Alasan Pulang</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" readonly value="{{$discharge->pdischarge_method ?? ''}}">
                    </div>
                </div>
            </fieldset>

            @if ($discharge->pdischarge_method ?? '' == 'Meninggal')
            <div class="form-group">
                <label for="">Kelompok penyebab kematian</label>
                <select class="form-control" id="kelompok_penyebab_kematian">
                    <option value="Sakit Biasa/Tua">Sakit Biasa/Tua</option>
                    <option value="Wabah Penyakit">Wabah Penyakit</option>
                    <option value="Kecelakaan">Kecelakaan</option>
                    <option value="Kriminalitas">Kriminalitas</option>
                    <option value="Bunuh Diri">Bunuh Diri</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tempat Kejadian</label>
                <select class="form-control" id="tempat_kejadian_meninggal">
                    <option value="Rumah">Rumah</option>
                    <option value="Jalan dan Jalan Raya">Jalan dan Jalan raya</option>
                    <option value="Sekolahan/Kampus">Sekolahan/Kampus</option>
                    <option value="Daerah industri-kontruksi">Daerah indistru-kontruksi</option>
                    <option value="Tempat Umum">Tempat Umum</option>
                    <option value="Pertanian/Perkebunan">Pertanian/Perkebunan</option>
                    <option value="tidak tahu">Tidak tahu</option>
                </select>
            </div>
            @endif

            <fieldset class="form-group">
                <label class="label-admisi">Kondisi Pulang</label>
                <div class="row">
                    <div class="col">
                        <input type="text" value="{{$discharge->pdischarge_condition ?? ''}}" readonly class="form-control">
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group">
                <label class="label-admisi">Terapi Yang Sudah Diberikan</label>
                <div class="row">
                    <div class="col">
                       <textarea class="form-control" readonly rows="4">{{$resume->terapi_yang_diberikan ?? ''}}</textarea>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="label-admisi">Obat yang dibawa pulang</label>
                <div class="row">
                    <div class="col">
                       <textarea class="form-control" readonly rows="4">{{$resume->obat_dibawa ?? ''}}</textarea>
                    </div>
                </div>
            </fieldset>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Catatan Medis</label>
                <textarea readonly class="form-control" rows="4">{{$discharge->pdischarge_med_notes ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea readonly class="form-control" rows="4">{{$discharge->pdischarge_notes ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Tanggal Terapi</label>
                <input type="date" value="{{$resume->tanggal_tindakan ?? ''}}" readonly class="form-control" >
            </div>
        </div>
    </div>
    <hr>
<div class="row">
    <div class="col-lg-6">

        <fieldset class="form-group">
            <label class="label-admisi">Nama Tindakan/Operasi</label>
            <div class="row">
                <div class="col">
                    <textarea class="form-control" readonly rows="4">{{$resume->tindakan_atau_operasi ?? ''}}</textarea>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <label class="label-admisi">Penyebab Luar/Cidera/Kecelakaan (Bila Ada)</label>
            <div class="row">
                <div class="col">
                    <textarea class="form-control"  rows="4" readonly>{{$resume->penyebab_luar ?? ''}}</textarea>
                </div>
            </div>
        </fieldset>

    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Kode ICD-9-CM</label>
            <textarea readonly class="form-control" rows="4">{{$resume->icd_9_tindakan ?? ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Kode ICD-10</label>
            <textarea readonly class="form-control" rows="4">{{$resume->icd_10_penyebab ?? ''}}</textarea>
        </div>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">RESUME PASIEN</h3>
        </div>
        <div class="card-body">
            <h4>Kontrol di RSUD Siti Fatimah</h4>
    
            <div class="form-group">
                <label class="control-label">Klinik</label>
            <input type="text" value="{{$resume->klinik ?? ''}}" readonly class="form-control"/>
            </div>

            <div class="form-group">
                <label class="control-label">Dokter</label>
                <input type="text" value="{{$resume->dokter ?? ''}}" readonly class="form-control"/>
            </div>

            <div class="form-group">
                <label class="control-label">Tanggal Kontrol</label>
                <input type="date" value="{{$resume->tanggal_kontrol_rsud ?? ''}}" readonly class="form-control"/>
            </div>
            
            <h4>Rujukan RS Lain</h4>
            
            <div class="form-group">
                <label class="control-label">Tanggal</label>
                <input type="date"  value="{{$resume->tanggal_rs_lain ?? ''}}" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Ke RS</label>
                <input type="text"  value="{{$resume->nama_rs_lain ?? ''}}" readonly placeholder="" class="form-control" />
            </div>
            
            
            <h4>Rujuk Balik</h4>
            
            <div class="form-group">
                <label class="control-label">Tanggal</label>
                <input type="date"  value="{{$resume->tanggal_rujuk_balik ?? ''}}" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Ke RS</label>
                <input type="text"  value="{{$resume->nama_rs_rujuk_balik ?? ''}}" readonly placeholder="" class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Puskesmas</label>
                <input type="text"  value="{{$resume->puskesmas ?? ''}}" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Dokter Praktek Pribadi</label>
                <input type="text"  value="{{$resume->dokter_pribadi ?? ''}}" readonly class="form-control" />
            </div>
            
            <h4>Edukasi Pasien</h4>
            
            <div class="form-group">
                <label class="control-label">Penyakit</label>
                <input type="text"  value="{{$resume->edukasi_penyakit ?? ''}}" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Diet</label>
                <input type="text"  value="{{$resume->edukasi_diet ?? ''}}" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label class="control-label">Alat bantu bila ada</label>
                <input type="text"  value="{{$resume->edukasi_alat_bantu ?? ''}}" readonly class="form-control" />
            </div>
        </div>        
    </div>
</div>
<button type="button" class="btn btn-danger float-right mt-2"  onclick="delete_discharge('{{$reg}}')"><i class="fas fa-redo"></i> Reset</button>
        
    @endif
   

@push('myscripts')
    <script>
        function adddischarge(){
            $.ajax({
                url: "{{route('discharge.dokter')}}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'tindakan_atau_operasi': $('#pdischarge_tindakan_operasi').val(),
                    'obat_dibawa': $('#pdischarge_obat').val(),
                    'terapi_yang_diberikan': $('#pdischarge_terapi').val(),
                    'tanggal_tindakan': $('#tanggal_tindakan').val(),
                    'icd_9_tindakan': $('#pdischarge_icd_9').val(),
                    'icd_10_penyebab': $('#pdischarge_icd_10').val(),
                    'penyebab_luar': $('#pdischarge_penyebab_luar').val(),
                    'pdischarge_icd10': $('#pdischarge_icd10').val(),
                    'reg_no': regno,
                    'kode_dokter':'{{auth()->user()->dokter_id}}',
                    'alasan': $('#pdischarge_alasan').val(),
                    'condition': $('#pdischarge_condition').val(),
                    'tgl_mati': $('#pdischarge_tgl_mati').val(),
                    'tgl': $('#pdischarge_tgl').val(),
                    'jam_mati': $('#pdischarge_jam_mati').val(),
                    'jam': $('#pdischarge_jam').val(),
                    'med_note': $('#pdischarge_med_notes').val(),
                    'note': $('#pdischarge_notes').val(),

                    'klinik': $('#klinik').val(),
                    'dokter': $('#dokter').val(),
                    'tanggal_kontrol_rsud': $('#tanggal_kontrol_rsud').val(),
                    'tanggal_rs_lain': $('#tanggal_rs_lain').val(),
                    'nama_rs_lain': $('#nama_rs_lain').val(),
                    'tanggal_rujuk_balik': $('#tanggal_rujuk_balik').val(),
                    'nama_rs_rujuk_balik': $('#nama_rs_rujuk_balik').val(),
                    'edukasi_penyakit': $('#edukasi_penyakit').val(),
                    'edukasi_diet': $('#edukasi_diet').val(),
                    'puskesmas': $('#puskesmas').val(),
                    'edukasi_alat_bantu': $('#edukasi_alat_bantu').val(),
                    'dokter_pribadi': $('#dokter_pribadi').val(),
                    

                },
                success: function (data) {
                    console.log(data);
                    alert('Data berhasil disimpan');
                    //redirect to route dokter dashboard
                    window.location.href = "{{route('dokter.dashboard')}}";
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
        function delete_discharge(id){
            $.ajax({
                type: "get",
                url: "{{url('api/hapus/discharge')}}/"+id.replaceAll('/','_'),
                dataType: "json",
                success: function (r) {
                    if (r.success) {
                        location.reload()
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function(){
            //pdischarge_alasan on change event and show modal
            $('#pdischarge_alasan').on('change', function() {
                if ( this.value == 'Meninggal')
                {
                    $("#modalmeninggal").modal('show');
                }
            });

        })
    </script>

@endpush
