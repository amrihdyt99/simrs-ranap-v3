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
    $cek = DB::connection('mysql')->table('rs_pasien_resume')->where('reg_no',$reg)->get();
    $cek2 = DB::connection('mysql')->table('rs_pasien_discharge')->where('pdischarge_reg',$reg)->get();
@endphp
@if (count($cek)==0 && $cek2 ->count() == 0)
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
                            <option value="Pemulihan">Pemulihan</option>
                            <option value="Perbaikan">Perbaikan</option>
                            <option value="Tidak Sembuh">Tidak Sembuh</option>
                            <option value="Meninggal dalam Waktu Kurang dari 48 Jam">Meninggal dalam Waktu Kurang dari 48 Jam</option>
                            <option value="Meninggal dalam Waktu Lebih dari atau Sama dengan 48 Jam">Meninggal dalam Waktu Lebih dari atau Sama dengan 48 Jam</option>
                            <option value="Sehat">Sehat</option>
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
                        <input type="date" name="pdischarge_tgl" id="pdischarge_tgl" value="{{ $discharge ? $discharge->pdischarge_tgl : date('Y-m-d') }}" class="form-control no-radius" {{ $discharge && $discharge->pdischarge_tgl ? 'readonly' : '' }}>
                    </div>
                </div>
                <div class="col-lg-4 pl-0">
                    <div class="form-group">
                        <label for="">Jam Discharge</label>
                        <input type="time" name="pdischarge_jam" id="pdischarge_jam" value="{{ $discharge ? $discharge->pdischarge_jam : date('H:i:s') }}" class="form-control no-radius" {{ $discharge && $discharge->pdischarge_jam ? 'readonly' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-8 pr-0">
                    <div class="form-group">
                        <label for="">Tgl Kematian</label>
                        <input type="date" name="pdischarge_tgl_mati" id="pdischarge_tgl_mati" value="{{ $discharge ? $discharge->pdischarge_tgl_mati : '' }}" class="form-control no-radius" {{ $discharge && $discharge->pdischarge_tgl_mati ? 'readonly' : '' }}>
                    </div>
                </div>
                <div class="col-lg-4 pl-0">
                    <div class="form-group">
                        <label for="">Jam Kematian</label>
                        <input type="time" name="pdischarge_jam_mati" id="pdischarge_jam_mati" value="{{ $discharge ? $discharge->pdischarge_jam_mati : '' }}" class="form-control no-radius" {{ $discharge && $discharge->pdischarge_jam_mati ? 'readonly' : '' }}>
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
                        <input type="text" class="form-control" name="pdischarge_alasan" id="pdischarge_alasan" readonly value="{{ is_array(json_decode($resume->alasan_pulang ?? '[]')) ? implode(', ', json_decode($resume->alasan_pulang ?? '[]')) : '' }}">
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group">
                <label class="label-admisi">Kondisi Pulang</label>
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="pdischarge_condition" name="pdischarge_condition" {{ isset($discharge->pdischarge_condition) ? 'disabled' : '' }}>
                            <option value="Pemulihan" {{ ($discharge->pdischarge_condition ?? '') == 'Pemulihan' ? 'selected' : '' }}>Pemulihan</option>
                            <option value="Perbaikan" {{ ($discharge->pdischarge_condition ?? '') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            <option value="Tidak Sembuh" {{ ($discharge->pdischarge_condition ?? '') == 'Tidak Sembuh' ? 'selected' : '' }}>Tidak Sembuh</option>
                            <option value="Meninggal dalam Waktu Kurang dari 48 Jam" {{ ($discharge->pdischarge_condition ?? '') == 'Meninggal dalam Waktu Kurang dari 48 Jam' ? 'selected' : '' }}>Meninggal dalam Waktu Kurang dari 48 Jam</option>
                            <option value="Meninggal dalam Waktu Lebih dari atau Sama dengan 48 Jam" {{ ($discharge->pdischarge_condition ?? '') == 'Meninggal dalam Waktu Lebih dari atau Sama dengan 48 Jam' ? 'selected' : '' }}>Meninggal dalam Waktu Lebih dari atau Sama dengan 48 Jam</option>
                            <option value="Sehat" {{ ($discharge->pdischarge_condition ?? '') == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group">
                <label class="label-admisi">Terapi Yang Sudah Diberikan</label>
                <div class="row">
                    <div class="col">
                        @php
                            $terapi = json_decode($resume->terapi ?? '[]', true);
                        @endphp
                        <textarea class="form-control" name="pdischarge_terapi" id="pdischarge_terapi" rows="4" {{ isset($resume->terapi) ? 'readonly' : '' }}>
@if(is_array($terapi) && count($terapi) > 0)
@foreach ($terapi as $item)
Nama: {{ $item['nama'] ?? '' }} Dosis: {{ $item['dosis'] ?? '' }} Hari: {{ $item['hari'] ?? '' }} Satuan: {{ $item['satuan'] ?? '' }}
Spesial Instruksi: {{ $item['spesial_instruksi'] ?? '' }}
Durasi Hari: {{ $item['durasi_hari'] ?? '' }}
@if (!$loop->last)

@endif
@endforeach
@endif
                        </textarea>
                    </div>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label class="label-admisi">Obat yang dibawa pulang</label>
                <div class="row">
                    <div class="col">
                        <textarea class="form-control" name="pdischarge_obat" id="pdischarge_obat" rows="4" readonly>{{ $discharge->pdischarge_obat ?? '' }}</textarea>
                    </div>
                </div>
            </fieldset>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Catatan Medis</label>
                <textarea name="pdischarge_med_notes" id="pdischarge_med_notes" class="form-control" rows="4" {{ isset($discharge->pdischarge_med_notes) ? 'readonly' : '' }}>
{{ $discharge->pdischarge_med_notes ?? '' }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea name="pdischarge_notes" id="pdischarge_notes" class="form-control" rows="4" {{ isset($discharge->pdischarge_notes) ? 'readonly' : '' }}>
{{ $discharge->pdischarge_notes ?? '' }}
                </textarea>
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
                        @php
                            $tindakan = isset($resume) ? json_decode($resume->tindakan ?? '[]', true) : [];
                        @endphp
                        <textarea class="form-control" name="pdischarge_tindakan" id="pdischarge_tindakan" rows="4" {{ isset($resume->tindakan) ? 'readonly' : '' }}>
@if(is_array($tindakan) && count($tindakan) > 0)
@foreach ($tindakan as $item)
{{ explode(' -- ', $item['nama_tindakan_icd9'])[1] ?? 'N/A' }}
@endforeach
@else
Tidak ada data tindakan
@endif
                        </textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset class="form-group">
                <label class="label-admisi">Penyebab Luar/Cidera/Kecelakaan (Bila Ada)</label>
                <div class="row">
                    <div class="col">
                        <textarea class="form-control" name="pdischarge_penyebab_luar" id="pdischarge_penyebab_luar" rows="4" {{ isset($resume->penyebab_luar) ? 'readonly' : '' }}>
@php
$penyebabLuarArray = isset($resume->penyebab_luar) ? json_decode(json_decode($resume->penyebab_luar ?? '[]', true), true) : [];
$penyebabLuarString = is_array($penyebabLuarArray) && !empty($penyebabLuarArray) 
    ? implode("\n", $penyebabLuarArray) 
    : 'Data tidak valid atau kosong';
@endphp
{{ trim($penyebabLuarString) }}
                        </textarea>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pdischarge_icd_9">Kode ICD-9-CM</label>
                @php
                    $tindakan = isset($resume) ? json_decode($resume->tindakan ?? '[]', true) : [];
                @endphp
                <textarea class="form-control" name="pdischarge_icd_9" id="pdischarge_icd_9" rows="4" {{ isset($resume->tindakan) ? 'readonly' : '' }}>
@if(is_array($tindakan) && count($tindakan) > 0)
@foreach ($tindakan as $item)
{{ $item['kode_icd9'] ?? '' }}
@endforeach
@else
Tidak ada data ICD-9
@endif
                </textarea>
            </div>
            <div class="form-group">
                <label for="pdischarge_icd_10">Kode ICD-10</label>
                @php
                    $firstDecode = isset($resume) && !empty($resume->penyebab_luar_icd) ? json_decode($resume->penyebab_luar_icd, true) : '';
                    $penyebabLuarIcdArray = is_string($firstDecode) ? json_decode($firstDecode, true) : $firstDecode;
                    $penyebabLuarIcdString = is_array($penyebabLuarIcdArray) 
                        ? implode(', ', $penyebabLuarIcdArray) 
                        : 'Data tidak valid atau kosong';
                @endphp
                <textarea name="pdischarge_icd_10" id="pdischarge_icd_10" class="form-control" rows="4" {{ isset($resume->penyebab_luar_icd) ? 'readonly' : '' }}>{{ trim($penyebabLuarIcdString) }}</textarea>
            </div>
        </div>
    </div>
    @php
        $discharge = DB::connection('mysql')->table('rs_pasien_discharge')->where('pdischarge_reg', $reg)->first();
    @endphp

    @if (!$discharge)
        <button type="button" class="btn btn-success float-right mt-2" id="btn-save-discharge" onclick="adddischarge()">
            <i class="fas fa-save"></i> Simpan
        </button>
    @else
        <button type="button" class="btn btn-danger float-right mt-2" id="btn-reset-discharge" onclick="delete_discharge('{{$reg}}')">
            <i class="fas fa-redo"></i> Reset
        </button>
    @endif
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