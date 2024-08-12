@php 
    $cek = DB::connection('mysql')->table('assesment_awal_dokter')->where('no_reg',$reg); 
@endphp 
@if ($cek->count() == 0)
    <div class="text-black" style="font-size: 14px;">
        <h2 class="text-black">Pengkajian Awal Rawat Inap</h2>
        <hr />
        <form id="form-entry-assesment">
            @csrf
            <input type="hidden" name="asdok_reg" value="{{$reg}}" />
            <input type="hidden" name="asdok_poli" value="" />
            <h2 for="exampleFormControlTextarea1">Anamnesis</h2>
            <fieldset class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="ortu" name="asdok_amnesis" value="Orang tua" />
                            <label class="custom-control-label" for="ortu">Orang Tua</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pasien" name="asdok_amnesis" value="Pasien" />
                            <label class="custom-control-label" for="pasien">Pasien</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="lainnya" name="asdok_amnesis" value="orang lain hubungan dengan pasien" />
                            <label class="custom-control-label" for="lainnya">orang lain hubungan dengan pasien</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col">
                        <input id="amnesis_lain" type="text" class="form-control" name="asdok_amnesis_lain" readonly />
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="keluhan_utama">Keluhan Utama</label>
                <textarea class="form-control" id="keluhan_utama" rows="3" name="asdok_keluhan_utama"></textarea>
            </div>
            <div class="form-group">
                <label for="riwayat_penyakit_sekarang">Riwayat Perjalanan Penyakit Sekarang</label>
                <textarea class="form-control" id="riwayat_penyakit_sekarang" rows="3" name="asdok_penyakit_sekarang"></textarea>
            </div>
            <fieldset class="form-group">
                <label>Riwayat Penyakit Dahulu</label>
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pnyakit_dulu_tidak" name="asdok_penyakit_dahulu_ket[]" value="Tidak" />
                            <label class="custom-control-label" for="pnyakit_dulu_tidak">Tidak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pnyakit_dulu_ya" name="asdok_penyakit_dahulu_ket[]" value="Ya" />
                            <label class="custom-control-label" for="pnyakit_dulu_ya">Ya</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input id="asdok_penyakit_dahulu_ket" rows="3" class="form-control" name="asdok_penyakit_dahulu_ket[]" />
                </div>
            </div>

            <fieldset class="form-group">
                <label>Riwayat Pengobatan</label>
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pengobatan_tidak" name="asdok_pengobatan_ket[]" value="Tidak" />
                            <label class="custom-control-label" for="pengobatan_tidak">Tidak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pengobatan_ya" name="asdok_pengobatan_ket[]" value="Ya" />
                            <label class="custom-control-label" for="pengobatan_ya">Ya</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input id="asdok_pengobatan_ket" rows="3" class="form-control" name="asdok_pengobatan_ket[]" />
                </div>
            </div>

            <fieldset class="form-group">
                <label>Riwayat penyakit Dalam Keluarga</label>
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pengobatan_keluarga_tidak" name="asdok_penyakit_dlm_klrg_ket[]" value="Tidak" />
                            <label class="custom-control-label" for="pengobatan_keluarga_tidak">Tidak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pengobatan_keluarga_ya" name="asdok_penyakit_dlm_klrg_ket[]" value="Ya" />
                            <label class="custom-control-label" for="pengobatan_keluarga_ya">Ya</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input id="asdok_penyakit_dlm_klrg_ket" rows="3" class="form-control" name="asdok_penyakit_dlm_klrg_ket[]" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <h2 class="exampleFormControlTextarea1">Pemeriksaan Multi Organ</h2>
                    <input value=" " id="asdok_pemeriksaan_multiorgan" rows="3" class="form-control" name="asdok_pemeriksaan_multiorgan" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>Kepala Dan Leher</label>
                    <label>TORAKS:</label>
                    <label>Paru(inspeksi,palpasi,perkursi dan auskultasi)</label>
                    <textarea id="asdok_toraks" rows="3" class="form-control" name="asdok_toraks"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>Jantung(inspeksi,palpasi,perkursi dan auskultasi)</label>
                    <textarea id="asdok_jantung" rows="3" class="form-control" name="asdok_jantung"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label>ABDOMEN</label>
                    <textarea id="asdok_abdomen" rows="3" class="form-control" name="asdok_abdomen"></textarea>
                </div>
            </div>

            {{--
            <div class="form-group row">
                <div class="col-sm-12">
                    <label>EKTREMITAS ATAS DAN BAWAH</label>
                    <textarea id="asdok_ekstrimitas_atas_bawah" rows="3" class="form-control" name="asdok_ekstrimitas_atas_bawah"></textarea>
                </div>
            </div>
            --}}

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>GENITALIA DAN ANUS(diperiksa bila ada indikasi)</label>
                    <textarea id="asdok_genitalia_anus" rows="3" class="form-control" name="asdok_genitalia_anus"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>HASIL PEMERIKSAAN PENUNJANG</label>
                    <input id="asdok_pemeriksaan_penunjang" rows="3" class="form-control" name="asdok_pemeriksaan_penunjang" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>DAFTAR MASALAH/DIAGNOSIS MEDIK</label>
                    <textarea id="asdok_diagnosis_medik" rows="3" class="form-control" name="asdok_diagnosis_medik"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <label>TATA LAKSANA AWAL</label>
                    <textarea id="asdok_tata_laksana_awal" rows="3" class="form-control" name="asdok_tata_laksana_awal"></textarea>
                </div>
            </div>

            <hr />

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="date" id="ruang" class="form-control" name="asdok_rawat_inap_ket" />
                    </div>
                </div>
            </div>
            <div class="form-group" style="text-align: right;">
                <button type="button" class="btn btn-success" onclick="storeDoctor('assesment', '#form-entry-assesment')">Simpan</button>
            </div>
        </form>
    </div>
@else
    <button class="btn btn-info float-right" id="btn-reset-asses" onclick="reset_assement('{{$cek->first()->id ?? ''}}')"><i class="fas fa-redo"></i> Re-Assesment</button>
    <div class="text-black" style="font-size: 14px;">
        <h2 class="text-black">Pengkajian Awal Rawat Inap</h2>
        <h6>
            assesment terakhir :
            <span id="last-asses" class="font-weight-bold">
                {{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($cek->first()->created_at ?? '')}} [ {{date('H:i:s',strtotime($cek->first()->created_at ?? ''))}} ]
            </span>
        </h6>
        <hr />
        @php $data = $cek->first(); @endphp
        <h2 for="exampleFormControlTextarea1">Anamnesis</h2>
        <fieldset class="form-group">
            <div class="form-group row mt-2">
                <div class="col">
                    <input id="amnesis_lain" type="text" class="form-control" value="{{$data->anamnesis}}" readonly />
                </div>
            </div>
        </fieldset>
        <div class="form-group">
            <label for="keluhan_utama">Keluhan Utama</label>
            <textarea class="form-control" id="keluhan_utama" rows="3" readonly>{{$data->keluhan_utama}}</textarea>
        </div>
        <div class="form-group">
            <label for="riwayat_penyakit_sekarang">Riwayat Perjalanan Penyakit Sekarang</label>
            <textarea class="form-control" id="riwayat_penyakit_sekarang" rows="3" readonly>{{$data->riwayat_penyakit_sekarang}}</textarea>
        </div>
        <fieldset class="form-group">
            <label>Riwayat Penyakit Dahulu</label>
            <input id="amnesis_lain" type="text" class="form-control" value="{{$data->riwayat_penyakit_dahulu}}" readonly />
        </fieldset>

        <fieldset class="form-group">
            <label>Riwayat Pengobatan</label>
            <input type="text" class="form-control" value="{{$data->riwayat_pengobatan}}" readonly />
        </fieldset>

        <fieldset class="form-group">
            <label>Riwayat penyakit Dalam Keluarga</label>
            <input type="text" class="form-control" value="{{$data->riwayat_penyakit_keluarga}}" readonly />
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-12">
                <h2 class="exampleFormControlTextarea1">Pemeriksaan Multi Organ</h2>
                <input value="{{$data->pemeriksaan_multi_organ}}" readonly rows="3" class="form-control" />
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label>Kepala Dan Leher</label>
                <label>TORAKS:</label>
                <label>Paru(inspeksi,palpasi,perkursi dan auskultasi)</label>
                <textarea id="asdok_toraks" rows="3" class="form-control" readonly>{{$data->toraks}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label>Jantung(inspeksi,palpasi,perkursi dan auskultasi)</label>
                <textarea id="asdok_jantung" rows="3" class="form-control" readonly>{{$data->jantung}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <label>ABDOMEN</label>
                <textarea id="asdok_abdomen" rows="3" class="form-control" readonly>{{$data->abdomen}}</textarea>
            </div>
        </div>

        {{--
        <div class="form-group row">
            <div class="col-sm-12">
                <label>EKTREMITAS ATAS DAN BAWAH</label>
                <textarea id="asdok_ekstrimitas_atas_bawah" rows="3" class="form-control" value="{{$data->ekstrimitas_atas_bawah}}" readonly></textarea>
            </div>
        </div>
        --}}

        <div class="form-group row">
            <div class="col-sm-12">
                <label>GENITALIA DAN ANUS(diperiksa bila ada indikasi)</label>
                <textarea id="asdok_genitalia_anus" rows="3" class="form-control" readonly>{{$data->genetalia_dan_anus}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label>HASIL PEMERIKSAAN PENUNJANG</label>
                <input id="asdok_pemeriksaan_penunjang" rows="3" class="form-control" value="{{$data->hasil_pemeriksaan_penunjang}}" readonly />
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label>DAFTAR MASALAH/DIAGNOSIS MEDIK</label>
                <textarea id="asdok_diagnosis_medik" rows="3" class="form-control" readonly>{{$data->daftar_masalah_medik}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label>TATA LAKSANA AWAL</label>
                <textarea id="asdok_tata_laksana_awal" rows="3" class="form-control" readonly>{{$data->tata_laksana_awal}}</textarea>
            </div>
        </div>

        <hr />

        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label>Tanggal Pemberian</label>
                    <input type="date" id="ruang" class="form-control" value="{{$data->tanggal_pemberian}}" readonly />
                </div>
            </div>
        </div>
    </div>
@endif 

@push('myscripts')
<script>
    function storeDoctor(title, idform) {
        var queryString = $(idform).serialize();
        //alert(queryString[0]);

        $.ajax({
            type: "POST",
            url: "{{ route('assesment.dokter') }}",
            data: queryString,

            success: function (data) {
                //console.log(data);
                //let html = document.getElementById("panel-nursing").innerHTML = data;
                alert("berhasil");
                location.reload();
            },
        });
    }

    function reset_assement(id) {
        $.ajax({
            type: "get",
            url: "{{ url('api/reset_asessment_dokter')}}/" + id,
            dataType: "json",
            success: function (r) {
                alert("Berhasil");
                location.reload();
            },
        });
    }
</script>
@endpush
