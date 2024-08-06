<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">PERENCANAAN PEMULANGAN</h3>
        </div>
        @php
            $utama = DB::connection('mysql')
            ->table('rs_pasien_diagnosa')
            ->join('icd10_bpjs','icd10_bpjs.ID_ICD10','=','rs_pasien_diagnosa.pdiag_diagnosa')
            ->where('pdiag_reg',$reg)->where('pdiag_deleted',0)->orderBy('pdiag_id','asc')->select('pdiag_id','NM_ICD10')->first();
        @endphp
        @if ($utama)
        <div class="form-group">
            <label>Diagnosis Utama</label>
            <textarea class="form-control" id="diagnosis_utama" name="diagnosis_utama" rows="3" readonly>{{$utama->NM_ICD10}}</textarea>
        </div>
        @php
             $sekunder = DB::connection('mysql')
            ->table('rs_pasien_diagnosa')
            ->join('icd10_bpjs','icd10_bpjs.ID_ICD10','=','rs_pasien_diagnosa.pdiag_diagnosa')
            ->where('pdiag_reg',$reg)->where('pdiag_deleted',0)->where('pdiag_id','!=',$utama->pdiag_id)->orderBy('pdiag_id','asc')->select('NM_ICD10')->get();
            if (!$sekunder) {
                $txt = 'Tidak Ada Data';
            } else {
                $arr = [];
                foreach ($sekunder as $e) {
                    $a = $e->NM_ICD10;
                    array_push($arr,$a);
                }
                $txt = implode(" ,",$arr);
            }
        @endphp
        
        <div class="form-group">
            <label>Diagnosis Sekunder</label>
            <textarea class="form-control" id="diagnosis_sekunder" name="diagnosis_sekunder" rows="3" readonly>{{$txt}}</textarea>
        </div>
        @else
        <div class="form-group">
            <label>Diagnosis Utama</label>
            <textarea class="form-control" id="diagnosis_utama" name="diagnosis_utama" rows="3"  readonly >Belum Input</textarea>
        </div>
        
        <div class="form-group">
            <label>Diagnosis Sekunder</label>
            <textarea class="form-control" id="diagnosis_sekunder" name="diagnosis_sekunder" rows="3" readonly >Belum Input</textarea>
        </div>
        @endif
       @php
              $data = DB::connection('mysql')
            ->table('rs_pemulangan_pasien')->where('reg_no',$reg)->first();
       @endphp

       @if ($data)

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Kebutuhan</th>
                    <th colspan="3">PEMENUHAN KEBUTUHAN</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Diperkirakan akan mebutuhkan bantuan dalam aktifitas sehari-hari selama di rumah</td>
                    <td colspan="3">
                       <textarea class="form-control" readonly>{{$data->bantuan_dalam_aktifitas}} </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Membutuhkan edukasi gizi yang kompleks terkait penyakitnya</td>
                    <td colspan="3">
                        <textarea class="form-control" readonly>{{$data->edukasi_gizi}} </textarea>
                     </td>
                </tr>
                <tr>
                    <td>Membutuhkan penanganan nyeri kronis</td>
                    <td colspan="3">
                        <textarea class="form-control" readonly>{{$data->penanganan_nyeri_kronis}} </textarea>
                     </td>
                </tr>
                <tr>
                    <td>Diperkirakan akan mebutuhkan pengelolaan penyakit secara berkelanjutan di luar RSUD
                        Prov. Sumsel</td>
                    <td colspan="2"> <textarea class="form-control" readonly>{{$data->pengelolaan_penyakit_secara_berkelanjutan}} </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Kebutuhan Lainnya</td>
                    <td colspan="3">
                        <textarea class="form-control" readonly>{{$data->kebutuhan_lainnya}} </textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="date" class="form-control datetimepicker-input" name="tanggal" value="{{$data->tanggal}}" readonly></td>
                    <td><input type="time" class="form-control datetimepicker-input" name="waktu" value="{{$data->waktu}}" readonly></td>
                </tr>
                </tbody>
            </table>
        </div>
       @else
       <form id="entry-pemulangan">

        @csrf
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Kebutuhan</th>
                    <th colspan="3">PEMENUHAN KEBUTUHAN</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Diperkirakan akan mebutuhkan bantuan dalam aktifitas sehari-hari selama di rumah</td>
                    <td colspan="3">
                       <label>
                           <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]" value="Konsultasi Rehabilitasi"
                                  class="@error('bantuan_dalam_aktifitas') is-invalid @enderror">
                           Konsultasi Rehabilitasi
                       </label>

                        <label>
                            <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                   class="@error('bantuan_dalam_aktifitas') is-invalid @enderror" value="Membutuhkan alat bantu gerak">
                            Membutuhkan alat bantu gerak
                        </label>

                        <label>
                            <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                   class="@error('bantuan_dalam_aktifitas') is-invalid @enderror" value="Membutuhkan anggota gerak palsu">
                            Membutuhkan anggota gerak palsu
                        </label>

                        <label>
                            <input type="checkbox" id="exampleCheck1" name="bantuan_dalam_aktifitas[]"
                                   class="@error('bantuan_dalam_aktifitas') is-invalid @enderror" value="Terapi Wicara">
                            Terapi Wicara
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Membutuhkan edukasi gizi yang kompleks terkait penyakitnya</td>
                    <td colspan="3">
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="edukasi_gizi[]"
                                   class="@error('edukasi_gizi') is-invalid @enderror" value="Konsultasi Gizi">
                            Konsultasi Gizi
                        </label>
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="edukasi_gizi[]"
                                   class="@error('edukasi_gizi') is-invalid @enderror" value="Penggunaan alat bantu makan khusus">
                            Penggunaan alat bantu makan khusus
                        </label>

                    </td>
                </tr>
                <tr>
                    <td>Membutuhkan penanganan nyeri kronis</td>
                    <td colspan="3">
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri[]"
                                   class="@error('penanganan_nyeri') is-invalid @enderror" value="Konsultasi Kepada tim nyeri">
                            Konsultasi Kepada tim nyeri
                        </label>
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri[]"
                                   class="@error('penanganan_nyeri') is-invalid @enderror" value="Edukasi Tentang obat-obat nyeri">
                            Edukasi Tentang obat-obat nyeri
                        </label>
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="penanganan_nyeri[]"
                                   class="@error('penanganan_nyeri') is-invalid @enderror" value="Penanganan nyeri secara mandiri">
                            Penanganan nyeri secara mandiri
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Diperkirakan akan mebutuhkan pengelolaan penyakit secara berkelanjutan di luar RSUD
                        Prov. Sumsel</td>
                    <td><input type="text"
                               class="form-control @error('pengelolaan_penyakit_secara_berkelanjutan') is-invalid @enderror"
                               id="exampleCheck1" name="pengelolaan_penyakit_secara_berkelanjutan[]"
                               placeholder="Tujuan">
                        @error('pengelolaan_penyakit_secara_berkelanjutan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </td>
                    <td><input type="text"
                               class="form-control @error('pengelolaan_penyakit_secara_berkelanjutan') is-invalid @enderror"
                               id="exampleCheck1" name="pengelolaan_penyakit_secara_berkelanjutan[]"
                               placeholder="Tempat">
                        @error('pengelolaan_penyakit_secara_berkelanjutan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Kebutuhan Lainnya</td>
                    <td colspan="3">
                        <label>
                            <input type="checkbox" id="exampleCheck1" name="kebutuhan_lainnya[]" value="Ya">
                            Kosultasi Kepada :
                        </label>
                        <input class="form-control" type="text" id="kebutuhan_lainnya" name="kebutuhan_lainnya[]"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="date" class="form-control datetimepicker-input" name="tanggal"></td>
                    <td><input type="time" class="form-control datetimepicker-input" name="waktu"></td>
                </tr>
                </tbody>
            </table>
        </div>

{{--            <input type="text" name="reg_no" value="{{ $datamypatient->reg_no }}" hidden>--}}
        <div class="card-footer">
            <button type="button" class="btn btn-primary" onclick="addpemulanganpasien()">Simpan</button>
        </div>
        {{--<input type="text" name="reg_medrec" value="{{ $data->reg_medrec }}" hidden>
        --}}
    </form>
       @endif
       
    </div>
</div>
