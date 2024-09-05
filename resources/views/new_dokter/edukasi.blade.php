
                                      
@php
    $cek = DB::connection('mysql')
            ->table('rs_edukasi_pasien_dokter')->where('reg_no',$reg)->whereNotNull('edukasi_diagnosa_penyebab_dokter');

@endphp
@if ($cek->count() == 0)
<h2 class="text-black">FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI</h2>
  <hr>
<form id="form-entry-edukasi">
    @csrf
    <input type="hidden" name="reg_no" value="{{$reg}}">
    <div id="form_1">
        <h3>Diagnosa penyebab Tanda dan Gejala Awal</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="edukasi_diagnosa_penyebab_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tgl_diagnosa_penyebab_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_paham_diagnosa_penyebab_dokter" class="form-control">
                <option value="Mudah mengerti">Mudah mengerti</option>
                <option value="Edukasi ulang">Edukasi ulang</option>
                <option value="Hal baru">Hal baru</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_diagnosa_penyebab_dokter" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_2">
        <h3>Penatalaksanaan penyakit</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="edukasi_penatalaksanaan_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tgl_penatalaksanaan_dokter" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_paham_penatalaksanaan_dokter" class="form-control">
                <option value="Mudah mengerti">Mudah mengerti</option>
                <option value="Edukasi ulang">Edukasi ulang</option>
                <option value="Hal baru">Hal baru</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_penatalaksanaan_dokter" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_3">
        <h3>Prosedur / diagnostik Yang dilakukan</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="edukasi_prosedur_diagnostik_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tgl_prosedur_diagnostik_dokter" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_paham_prosedur_diagnostik_dokter" class="form-control">
                <option value="Mudah mengerti">Mudah mengerti</option>
                <option value="Edukasi ulang">Edukasi ulang</option>
                <option value="Hal baru">Hal baru</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_prosedur_diagnostik_dokter" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_4">
        <h3>Manajemen nyeri - sedang - berat </h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="edukasi_manajemen_nyeri_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tgl_manajemen_nyeri_dokter" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_paham_manajemen_nyeri_dokter" class="form-control">
                <option value="Mudah mengerti">Mudah mengerti</option>
                <option value="Edukasi ulang">Edukasi ulang</option>
                <option value="Hal baru">Hal baru</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_manajemen_nyeri_dokter" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_5">
        <h3>Lain-lain </h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="edukasi_lain_lain_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tgl_lain_lain_dokter" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_paham_lain_lain_dokter" class="form-control">
                <option value="Mudah mengerti">Mudah mengerti</option>
                <option value="Edukasi ulang">Edukasi ulang</option>
                <option value="Hal baru">Hal baru</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_lain_lain_dokter" class="form-control">
            </div>
        </div>

    <div class="row">
        <div class="col-6">
            <div id="form_ttd_pasien">
                <h3>Tanda Tangan Pasien</h3>
                <div class="form-group">
                    <canvas id="signature-pad-pasien" class="signature-pad" width=400 height=200 style="border: 1px solid #000;"></canvas>
                    <input type="hidden" id="ttd_pasien" name="ttd_pasien">
                    <button type="button" class="btn btn-danger mt-2" onclick="clearSignature('pasien')">Hapus TTD</button>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div id="form_ttd_dokter">
                <h3>Tanda Tangan Dokter</h3>
                <div class="form-group">
                    <canvas id="signature-pad-dokter" class="signature-pad" width=400 height=200 style="border: 1px solid #000;"></canvas>
                    <input type="hidden" id="ttd_dokter" name="ttd_dokter">
                    <button type="button" class="btn btn-danger mt-2" onclick="clearSignature('dokter')">Hapus TTD</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
  <button type="button"  class="btn btn-success" onclick="storeDoctorEdukasi('assesment', '#form-entry-edukasi')">Simpan</button>
@else
<h2 class="text-black">FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI

    <button class="btn btn-info float-right" onclick="reset_edukasi('{{$cek->first()->id}}')"><i class="fas fa-redo"></i> Re-Edukasi</button>

</h2>

<h6>Telah diinput : <span id="last-soap" class="font-weight-bold">{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($cek->first()->created_at)}} [ {{date('H:i:s',strtotime($cek->first()->created_at))}} ]</span></h6>
<hr>

   @php
       $data = $cek->first();
   @endphp
    <div id="form_1">
        <h3>Diagnosa penyebab Tanda dan Gejala Awal</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->edukasi_diagnosa_penyebab_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tgl_diagnosa_penyebab_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_paham_diagnosa_penyebab_dokter}}" class="form-control">
              
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_diagnosa_penyebab_dokter}}" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_2">
        <h3>Penatalaksanaan penyakit</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->edukasi_penatalaksanaan_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tgl_penatalaksanaan_dokter}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_paham_penatalaksanaan_dokter}}" class="form-control">
            
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_penatalaksanaan_dokter}}" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_3">
        <h3>Prosedur / diagnostik Yang dilakukan</h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->edukasi_prosedur_diagnostik_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tgl_prosedur_diagnostik_dokter}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_paham_prosedur_diagnostik_dokter}}" class="form-control">
              
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_prosedur_diagnostik_dokter	}}" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_4">
        <h3>Manajemen nyeri - sedang - berat </h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->edukasi_manajemen_nyeri_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tgl_manajemen_nyeri_dokter}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_paham_manajemen_nyeri_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_manajemen_nyeri_dokter}}" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_5">
        <h3>Lain-lain </h3>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->edukasi_lain_lain_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tgl_lain_lain_dokter}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->tingkat_paham_lain_lain_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_lain_lain_dokter}}" class="form-control">
            </div>
        </div>
    </div>
    <div id="form_5">
        <h3>Tanda tangan</h3>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tanda Tangan Pasien</label>
                    <div class="border border-dark p-2">
                        @if(isset($data->ttd_pasien) && $data->ttd_pasien)
                            <img src="{!! $data->ttd_pasien !!}" alt="Tanda Tangan Pasien" style="max-width: 100%; height: auto;">
                        @else
                            <p>Tidak ada tanda tangan pasien</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tanda Tangan Dokter</label>
                    <div class="border border-dark p-2">
                        @if(isset($data->ttd_dokter) && $data->ttd_dokter)
                            <img src="{{ $data->ttd_dokter }}" alt="Tanda Tangan Dokter" style="max-width: 100%; height: auto;">
                        @else
                            <p>Tidak ada tanda tangan dokter</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endif



@push('myscripts')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script> 
<!-- <script type="text/javascript" src="{{ asset('new_assets/signature/signature.js') }}"></script> -->

    <script>
    function saveSignature() {
    var canvasPasien = document.getElementById('signature-pad-pasien');
    var canvasDokter = document.getElementById('signature-pad-dokter');
    var ttdPasien = document.getElementById('ttd_pasien');
    var ttdDokter = document.getElementById('ttd_dokter');
    
    ttdPasien.value = canvasPasien.toDataURL('image/png');
    ttdDokter.value = canvasDokter.toDataURL('image/png');
}

        function storeDoctorEdukasi(title,idform){
            saveSignature();
            var queryString = $(idform).serialize()+'&user_id='+$user_+'&med_rec='+$medrec;
            //alert(queryString[0]);

            $.ajax({
                type: "POST",
                url: "{{ route('edukasi.dokter') }}",
                 data: queryString,

                success: function(data) {
                    //console.log(data);
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                    alert('berhasil')
                    location.reload()
                },
            });
        }

        function reset_edukasi(id) {
            $.ajax({
                type: "get",
                url: "{{url('api/reset_edukasi_dokter')}}/"+id,
                dataType: "json",
                success: function (r) {
                    alert('berhasil Hapus')
                    location.reload()
                    
                }
            });
        }
    </script>
    <script>
    let signaturePadPasien, signaturePadDokter;

    // Inisialisasi Signature Pad
    window.onload = function() {
        let canvasPasien = document.getElementById('signature-pad-pasien');
        let canvasDokter = document.getElementById('signature-pad-dokter');
        
        signaturePadPasien = new SignaturePad(canvasPasien, {
            backgroundColor: 'rgba(255, 255, 255, 0)', 
            penColor: 'black' 
        });

        signaturePadDokter = new SignaturePad(canvasDokter, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'black'
        });
    }

    function clearSignature(type) {
        if (type === 'pasien') {
            signaturePadPasien.clear();
        } else if (type === 'dokter') {
            signaturePadDokter.clear();
        }
    }

    function saveSignature() {
        let ttdPasien = document.getElementById('ttd_pasien');
        let ttdDokter = document.getElementById('ttd_dokter');

        if (!signaturePadPasien.isEmpty()) {
            ttdPasien.value = signaturePadPasien.toDataURL();
        }

        if (!signaturePadDokter.isEmpty()) {
            ttdDokter.value = signaturePadDokter.toDataURL();
        }
    }
</script>

@endpush
