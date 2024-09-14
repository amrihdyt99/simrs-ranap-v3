<!-- <div class="row">
    <div class="col-lg-8">
        @if (auth()->user()->level_user != 'dokter')
            <div class="form-group float-left">
                <select id="select-dokter" class="form-control select2" style="width: 400px">
                    <option value="">-- Pilih Nama Dokter --</option>
                </select>
                <h6 class="alert-dokter-resume text-danger mt-1"></h6>
            </div>
        @endif
    </div>
    <div class="col-lg-4">
        <button class="btn btn-primary float-right ml-2 btn-export-resume">
            <i class="fas fa-file-excel"></i> Export Resume
        </button>
        <button class="btn btn-secondary float-right ml-2 btn-refresh-page" onclick="window.location.href=window.location.href;">
            <i class="fas fa-sync-alt"></i> Refresh
        </button>
    </div>
</div> -->

<style>
    .table_resume tr td{
        padding: 5px !important;
    }
    .table_resume {
        color: black !important
    }
</style>

<div id="export-resume">
    <div class="float-right">
        <button type="button" class="btn btn-success" onclick="getResumeBaseData()"><i class="fas fa-redo"></i> Muat ulang</button>
    </div>
    <button class="btn btn-info float-right mr-2" onclick="viewResume('{{ $reg }}')">
        <i class="fas fa-file-alt"></i> View Resume
    </button>
    <h3>RESUME PASIEN RAWAT JALAN | No Reg: {{$reg}}</h3>
    <div class="table-responsive">
        <form action="form-add-resume" id="form-add-resume">
            @csrf
            <h4 class="mb-4">Ringkasan Perawatan Pasien</h4>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Riwayat Alergi</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="alergi_tidak" value="Tidak" name="riwayat_alergi">
                        <label class="custom-control-label" for="alergi_tidak">Tidak</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="alergi_ya" value="Ya" name="riwayat_alergi">
                        <label class="custom-control-label" for="alergi_ya">Ya</label>
                    </div>
                    <input id="alergi_lain" type="text" class="form-control mt-2" name="riwayat_alergi_lain" placeholder="Sebutkan alergi jika Ya">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Anamnesis</label>
                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="keluhan_utama">Keluhan Utama:</label>
                        <textarea class="form-control" id="keluhan_utama" name="keluhan_utama" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="riwayat_penyakit">Riwayat Perjalanan Penyakit:</label>
                        <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="pemeriksaan_fisik" class="col-sm-3 col-form-label">Pemeriksaan Fisik:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="pemeriksaan_fisik" name="pemeriksaan_fisik" rows="5"></textarea>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Temuan Klinik Pemeriksaan Penunjang</h4>

            <div class="form-group row">
                <label for="temuan_klinik" class="col-sm-3 col-form-label">Temuan Klinik Pemeriksaan Penunjang:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="temuan_klinik" name="temuan_klinik" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="pemeriksaan_lab" class="col-sm-3 col-form-label">Pemeriksaan Laboratorium yang mendukung diagnosis:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="pemeriksaan_lab" name="pemeriksaan_lab" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Pemeriksaan Radiologi:</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="radiologi_tidak" value="Tidak" name="pemeriksaan_radiologi">
                        <label class="custom-control-label" for="radiologi_tidak">Tidak</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="radiologi_ya" value="Ya" name="pemeriksaan_radiologi">
                        <label class="custom-control-label" for="radiologi_ya">Ya</label>
                    </div>
                    <textarea class="form-control mt-2" id="radiologi_keterangan" name="radiologi_keterangan" rows="2" placeholder="Keterangan jika Ya"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="pemeriksaan_pa" class="col-sm-3 col-form-label">Pemeriksaan PA:</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="pa_tidak" value="Tidak" name="pemeriksaan_pa">
                        <label class="custom-control-label" for="pa_tidak">Tidak</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="pa_ya" value="Ya" name="pemeriksaan_pa">
                        <label class="custom-control-label" for="pa_ya">Ya</label>
                    </div>
                    <textarea class="form-control mt-2" id="pa_keterangan" name="pa_keterangan" rows="2" placeholder="Sebutkan (termasuk nomor PA)"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="terpasang_implant" class="col-sm-3 col-form-label">Terpasang Implant:</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="implant_tidak" value="Tidak" name="terpasang_implant">
                        <label class="custom-control-label" for="implant_tidak">Tidak</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="implant_ya" value="Ya" name="terpasang_implant">
                        <label class="custom-control-label" for="implant_ya">Ya</label>
                    </div>
                    <textarea class="form-control mt-2" id="implant_keterangan" name="implant_keterangan" rows="2" placeholder="Sebutkan jenis dan nomor registrasi"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="lain_lain" class="col-sm-3 col-form-label">Lain-lain (USG, ECG, Echocardiografi, EEG, Bronchoscopy, dll) Sebutkan Jika Ada:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="lain_lain" name="lain_lain" rows="2"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="pemeriksaan_penunjang_yang_tertunda" class="col-sm-3 col-form-label">Pemeriksaan Penunjang yang Tertunda</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="penunjang_tidak" value="Tidak" name="pemeriksaan_penunjang_yang_tertunda">
                        <label class="custom-control-label" for="penunjang_tidak">Tidak ada</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="penunjang_ya" value="Ya" name="pemeriksaan_penunjang_yang_tertunda">
                        <label class="custom-control-label" for="penunjang_ya">Ada, Sebutkan</label>
                    </div>
                    <textarea class="form-control mt-2" id="penunjang_keterangan" name="penunjang_keterangan" rows="2" placeholder="Ada, Sebutkan"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="alasan_penundaan" class="col-sm-3 col-form-label">Alasan Penundaan:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="alasan_penundaan" name="alasan_penundaan" rows="2"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal pengembalian:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian">
                </div>
                <label class="col-sm-1 col-form-label text-right">di:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="lokasi_pengembalian" name="lokasi_pengembalian">
                </div>
            </div>

            <div class="form-group row">
                <label for="indikasi_rawat" class="col-sm-3 col-form-label">Indikasi Rawat:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="indikasi_rawat" name="indikasi_rawat" rows="2"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="diagnosis_masuk" class="col-sm-3 col-form-label">Diagnosis Masuk:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="diagnosis_masuk" name="diagnosis_masuk" rows="2"></textarea>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Diagnosa</h4>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">ICD-10:</label>
                <div class="col-sm-9">
                    {{-- <button type="button" class="btn btn-primary mb-2" onclick="addDiagnosaICD10()">Tambah Diagnosa ICD-10</button> --}}
                    <table class="table table-striped table_resume">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Diagnosa Utama</th>
                                <th class="font-weight-bold">Diagnosa Sekunder</th>
                                <th class="font-weight-bold">Diagnosa Klausa</th>
                            </tr>
                        </thead>
                        <tbody id="icd10-table-body">
                            <!-- Data Diagnosa -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">ICD-9:</label>
                <div class="col-sm-9">
                    {{-- <button type="button" class="btn btn-primary mb-2" onclick="addDiagnosaICD9()">Tambah Diagnosa ICD-9</button> --}}
                    <table class="table table-striped table_resume">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody id="icd9-table-body">
                            <!-- Data Tindakan -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">ICD-O:</label>
                <div class="col-sm-9">
                    {{-- <button type="button" class="btn btn-primary mb-2" onclick="addDiagnosaICDO()">Tambah Diagnosa ICD-O</button> --}}
                    <table class="table table-striped table_resume">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Diagnosa Utama/Tindakan</th>
                            </tr>
                        </thead>
                        <tbody id="icdo-table-body">
                            <!-- Data Tindakan -->
                        </tbody>
                    </table>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Terapi Yang Sudah Diberikan 
                {{-- <button type="button" class="btn btn-primary btn-sm ml-2" id="add-terapi">Tambah Terapi</button> --}}
            </h4>
            <div class="form-group row">
                <div class="col-sm-12">
                    <table class="table table-striped table_resume">
                        <tbody id="terapi-container"></tbody>
                    </table>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Obat Yang Dibawa Pulang <button type="button" class="btn btn-primary mt-2 float-right" id="tambah-obat"><i class="fas fa-capsules"></i> Tambah Obat Pulang</button></h4>
            <div class="table-responsive">
                <table class="table table-striped table_resume" id="obat-pulang-table">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Jumlah</th>
                            <th>Aturan Pakai/Minum</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Nama Tindakan/Operasi <button type="button" class="btn btn-primary btn-sm ml-2 float-right" id="add-tindakan"><i class="fas fa-notes-medical"></i> Tambah Tindakan/Operasi</button></h4>
            <div class="form-group row">
                <div class="col-sm-12">
                    <div id="tindakan-container">
                        <!-- Data Tindakan/Operasi -->
                    </div>
                </div>
            </div>

            <table class="table table-striped table_resume">
                <thead>
                    <tr>
                        <th>Penyebab Luar/Cidera/Kecelakaan (Bila Ada)</th>
                        <th>Kode ICD-10</th>
                    </tr>
                </thead>
                <tbody id="penyebab-luar-tbody">

                </tbody>
                <input type="hidden" name="penyebab_luar" id="penyebab_luar">
                <input type="hidden" name="penyebab_luar_icd" id="penyebab_luar_icd">
            </table>

            <h4 class="mb-3 mt-4 font-weight-bold">Alasan Pulang</h4>
            <div class="form-group row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alasan_pulang_sembuh" name="alasan_pulang[]" value="Sembuh">
                                <label class="custom-control-label" for="alasan_pulang_sembuh">Sembuh</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alasan_pulang_berobat_jalan" name="alasan_pulang[]" value="Dapat berobat jalan">
                                <label class="custom-control-label" for="alasan_pulang_berobat_jalan">Dapat berobat jalan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alasan_pulang_permintaan_sendiri" name="alasan_pulang[]" value="Pulang atas permintaan sendiri">
                                <label class="custom-control-label" for="alasan_pulang_permintaan_sendiri">Pulang atas permintaan sendiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alasan_pulang_pindah_rs" name="alasan_pulang[]" value="Pindah ke RS lain">
                                <label class="custom-control-label" for="alasan_pulang_pindah_rs">Pindah ke RS lain</label>
                                <input type="text" class="form-control d-inline-block ml-2" id="rs_lain_ke" name="rs_lain_ke" placeholder="Ke" style="width: auto;">
                                <input type="text" class="form-control d-inline-block ml-2" id="rs_lain_alasan" name="rs_lain_alasan" placeholder="Alasan" style="width: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alasan_pulang_meninggal" name="alasan_pulang[]" value="Meninggal">
                                <label class="custom-control-label" for="alasan_pulang_meninggal">Meninggal</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">Kondisi Pasien Pulang</h4>
            <div class="form-group row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kondisi_pulang_mandiri" name="kondisi_pulang[]" value="Mandiri">
                                <label class="custom-control-label" for="kondisi_pulang_mandiri">Mandiri</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kondisi_pulang_cacat" name="kondisi_pulang[]" value="Cacat">
                                <label class="custom-control-label" for="kondisi_pulang_cacat">Cacat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kondisi_pulang_tidak_mandiri" name="kondisi_pulang[]" value="Tidak Mandiri">
                                <label class="custom-control-label" for="kondisi_pulang_tidak_mandiri">Tidak Mandiri, karena memakai alat bantu: Infus/OGT/NGT/WSD/Spalk/Lain-lain:</label>
                                <input type="text" class="form-control d-inline-block ml-2" id="alat_bantu_sebutkan" name="alat_bantu_sebutkan" placeholder="Sebutkan" style="width: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="td">TD:</label>
                            <input type="text" class="form-control" id="td" name="td">
                        </div>
                        <div class="col-md-3">
                            <label for="hr">HR:</label>
                            <input type="text" class="form-control" id="hr" name="hr">
                        </div>
                        <div class="col-md-3">
                            <label for="rr">RR:</label>
                            <input type="text" class="form-control" id="rr" name="rr">
                        </div>
                        <div class="col-md-3">
                            <label for="t">T:</label>
                            <input type="text" class="form-control" id="t" name="t">
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="mb-3 mt-4 font-weight-bold">PERAWATAN SELANJUTNYA</h4>
            @php
                $perawatan_lanjutan = [
                    'Kontrol di RSUD Siti Fatimah',
                    'Rujukan RS Lain',
                    'Rujuk Balik',
                ];
            @endphp

            <div class="row">
                @foreach ($perawatan_lanjutan as $item_p)
                    <div class="col-md-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" onchange="perawatanLanjutan(this.id)" id="{{strtolower(str_replace(' ', '_', $item_p))}}" name="tipe_perawatan_lanjutan" value="{{$item_p}}">
                            <label class="custom-control-label" for="{{strtolower(str_replace(' ', '_', $item_p))}}">{{$item_p}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            
            
            <div id="lanjutan_kontrol_di_rsud_siti_fatimah">
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
            </div>

            <div id="lanjutan_rujukan_rs_lain">
                <div class="form-group">
                    <label class="control-label">Tanggal</label>
                    <input type="date" name="tanggal_rs_lain" id="tanggal_rs_lain" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label">Ke RS</label>
                    <input type="text" name="nama_rs_lain" id="nama_rs_lain" placeholder="" class="form-control" />
                </div>
            </div>
            
            <div id="lanjutan_rujuk_balik">
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
            </div>
                
                <h4 class="mb-3 mt-4 font-weight-bold">HOME CARE</h4>
                <h4 class="mb-3">PERAWATAN YANG AKAN DILAKUKAN</h4>
            <div class="form-group">
                <label for="pergantian_catheter">Pergantian Dower Catheter, NGT, Double Lumen</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="pergantian_catheter_detail" placeholder="Detail">
                    <input type="date" class="form-control" name="tanggal_pergantian_catheter">
                </div>
            </div>
            <div class="form-group">
                <label for="terapi_rehabilitan">Terapi Rehabilitasi:</label>
                <div class="input-group">
                    <input type="text" class="form-control mt-1" name="terapi_rehabilitan_detail" placeholder="Detail">
                    <input type="date" class="form-control mt-1" name="tanggal_terapi_rehabilitan">
                </div>
            </div>
            <div class="form-group">
                <label for="rawat_luka">Rawat Luka:</label>
                <div class="input-group">
                    <input type="text" class="form-control mt-1" name="rawat_luka_detail" placeholder="Detail">
                    <input type="date" class="form-control mt-1" name="tanggal_rawat_luka">
                </div>
            </div>
            <div class="form-group">
                <label for="perawatan_lainnya">Lainnya:</label>
                <div class="input-group">
                    <input type="text" class="form-control mt-1" name="perawatan_lainnya_detail" placeholder="Detail">
                    <input type="date" class="form-control mt-1" name="tanggal_perawatan_lainnya">
                </div>
            </div>

            <div class="form-group">
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

            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3 text-right">
                    <button type="button" onclick="simpanResume()" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
    $('[id*="lanjutan_"]').hide()

    function perawatanLanjutan(_id){
        $('[id*="lanjutan_"]').hide()

        // $('[id*="lanjutan_"] input').val('')

        $('[id="lanjutan_'+_id+'"]').show()
    }
    
    $(document).ready(function() {
        function initializeSelect2(selector, url, placeholder) {
            $(selector).select2({
                placeholder: placeholder,
                allowClear: true,
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.code + ' - ' + item.name,
                                    id: item.code
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function addDiagnosaICD10() {
            var icd10TableBody = document.getElementById('icd10-table-body');
            var newRow = icd10TableBody.insertRow();
            var cellContent = `
                <td><select class="form-control icd10-select-utama" name="diagnosa_utama[]"></select></td>
                <td><select class="form-control icd10-select-sekunder" name="diagnosa_sekunder[]"></select></td>
                <td><select class="form-control icd10-select-klausa" name="diagnosa_klausa[]"></select></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
            `;
            newRow.innerHTML = cellContent;
            initializeSelect2('.icd10-select-utama', '/api/icd10', 'Pilih untuk diagnosa utama');
            initializeSelect2('.icd10-select-sekunder', '/api/icd10', 'Pilih untuk diagnosa sekunder');
            initializeSelect2('.icd10-select-klausa', '/api/icd10', 'Pilih untuk diagnosa klausa');
        }

        function addDiagnosaICD9() {
            var icd9TableBody = document.getElementById('icd9-table-body');
            var newRow = icd9TableBody.insertRow();
            var cellContent = `
                <td><select class="form-control icd9-select" name="tindakan[]"></select></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
            `;
            newRow.innerHTML = cellContent;
            initializeSelect2('.icd9-select', '/api/icd9', 'Pilih ICD-9');
        }

        function addDiagnosaICDO() {
            var icdoTableBody = document.getElementById('icdo-table-body');
            var newRow = icdoTableBody.insertRow();
            var cellContent = `
                <td><select class="form-control icdO-select" name="tindakan[]"></select></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
            `;
            newRow.innerHTML = cellContent;
            initializeSelect2(newRow.querySelector('.icdO-select'), '/api/icdO', 'Pilih ICD-O');
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Expose functions to global scope
        // window.addDiagnosaICD10 = addDiagnosaICD10;
        window.addDiagnosaICD9 = addDiagnosaICD9;
        window.addDiagnosaICDO = addDiagnosaICDO;
        window.removeRow = removeRow;
    });

    $(document).ready(function() {
        let terapiInputs = [];
        let nextTerapiId = 1;

        function addTerapiInput() {
            const newInput = `
                <div class="form-group terapi-input" data-terapi-id="${nextTerapiId}">
                    <label for="terapi_${nextTerapiId}">Terapi ${terapiInputs.length + 1}:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="terapi_${nextTerapiId}">
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-terapi" type="button">Hapus</button>
                        </div>
                    </div>
                </div>
            `;
            $('#terapi-container').append(newInput);
            terapiInputs.push(nextTerapiId);
            nextTerapiId++;
            updateTerapiLabels();
        }

        $('#add-terapi').click(function() {
            addTerapiInput();
        });

        $(document).on('click', '.remove-terapi', function() {
            const terapiId = $(this).closest('.terapi-input').data('terapi-id');
            terapiInputs = terapiInputs.filter(id => id !== terapiId);
            $(this).closest('.terapi-input').remove();
            updateTerapiLabels();
        });

        function updateTerapiLabels() {
            $('.terapi-input').each(function(index) {
                $(this).find('label').text(`Terapi ${index + 1}:`);
                $(this).find('input').attr('name', 'terapi['+(index)+'][nama]')
            });
        }

        addTerapiInput();
    });

    var tindakanInputs = [];
    var nextTindakanId = 1;
    
    function addTindakanInput(data = {}) {
        let random = randomString(5)

        const newInput = `
            <div class="form-group tindakan-input" data-tindakan-id="${nextTindakanId}" data-tindakan-kode="`+random+`">
                <label>Tindakan ${tindakanInputs.length + 1}:</label>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control nama_tindakan" id="resume-tindakan-`+random+`" onchange="getResumeTindakan(this.id, '`+random+`')"></select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control tanggal_tindakan" value="`+(data.tanggal_tindakan ?? '')+`">
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="form-control nama_tindakan_icd9" value="`+(data.nama_tindakan_icd9 ?? '')+`" placeholder="Kode ICD-9-CM">
                        <input type="text" class="form-control kode_icd9" value="`+(data.kode_icd9 ?? '')+`" placeholder="Kode ICD-9-CM">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger remove-tindakan" type="button"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        `;

        $('#tindakan-container').append(newInput);

        tindakanInputs.push(nextTindakanId);
        nextTindakanId++;
        updateTindakanLabels();
        
        $(document).ready(function(){
            icd9('[id="resume-tindakan-'+random+'"]')
        })

        if (data.nama_tindakan_icd9 != undefined) {
            addOption('[id="resume-tindakan-'+random+'"]', data.kode_icd9, data.nama_tindakan_icd9)
        }
    }

    $('#add-tindakan').click(function() {
        addTindakanInput();
    });

    $(document).on('click', '.remove-tindakan', function() {
        const tindakanId = $(this).closest('.tindakan-input').data('tindakan-id');
        tindakanInputs = tindakanInputs.filter(id => id !== tindakanId);
        $(this).closest('.tindakan-input').remove();
        updateTindakanLabels();
    });

    function updateTindakanLabels() {
        $('.tindakan-input').each(function(index) {
            $(this).find('label').text(`Tindakan ${index + 1}:`);
            $(this).find('input[class*="nama_tindakan"]').attr('name', 'tindakan['+index+'][nama_tindakan]')
            $(this).find('input[class*="nama_tindakan_icd9"]').attr('name', 'tindakan['+index+'][nama_tindakan_icd9]')
            $(this).find('input[class*="tanggal_tindakan"]').attr('name', 'tindakan['+index+'][tanggal_tindakan]')
            $(this).find('input[class*="kode_icd9"]').attr('name', 'tindakan['+index+'][kode_icd9]')
        });
    }

    $('#tambah-obat').click(function() {
        openPanelObatPulang()
        // var newRow = `
        //     <tr>
        //         <td><input type="text" class="form-control" name="nama_obat[]"></td>
        //         <td><input type="text" class="form-control" name="jumlah_obat[]" placeholder="Contoh: 1x30 mg"></td>
        //         <td><input type="text" class="form-control" name="aturan_pakai[]"></td>
        //         <td><input type="text" class="form-control" name="keterangan_obat[]"></td>
        //         <td><button type="button" class="btn btn-danger btn-sm hapus-obat">Hapus</button></td>
        //     </tr>
        // `;
        // $('#obat-pulang-table tbody').append(newRow);
    });

    function openPanelObatPulang(){
        $('#modalPrescribeNew').modal('show')
        getPrescribeFormSelect('satuan')
        orderPrescribeTemp()
        additionalPrescribeButton()
    }

    function additionalPrescribeButton(){
        $('[id="modalPrescribeNew"]').attr('obat-pulang', 1)

        $('[id="modalPrescribeNew"]').append(`
            <input type="hidden" name="obat_pulang" value="1">
        `)

        $('[id="modalPrescribeNew"] [id="prescribeAdditionalButton"]').html(`
            <span type="button" class="btn btn-primary" onclick="copyPreviousPrescribe()"><i class="fas fa-copy"></i> Copy resep</span>
        `)
    }

    $(document).on('click', '.hapus-obat', function() {
        $(this).closest('tr').remove();
    });
</script>
<script>
    function viewResume(regNo) {
        const url = `{{url("")}}/resume/dokumen?reg_no=${regNo}`;
        window.open(url, '_blank');
    }
</script>