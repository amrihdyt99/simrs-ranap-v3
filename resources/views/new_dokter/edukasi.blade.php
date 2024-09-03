
                                      
@php
    $cek = DB::connection('mysql')
            ->table('rs_edukasi_pasien')->where('reg_no',$reg)->whereNotNull('topik_dianogsa');

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
                <input type="text" name="topik_dianogsa" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tanggal_edukasi_diagnosa" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_pemahaman_diagnosa" class="form-control">
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
                <input type="text" name="metode_edukasi_diagnosa" class="form-control">
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
                <input type="text" name="topik_penyakit" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tanggal_edukasi_penyakit" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_pemahaman_penyakit" class="form-control">
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
                <input type="text" name="metode_edukasi_penyakit" class="form-control">
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
                <input type="text" name="topik_prosedur" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tanggal_edukasi_prosedur" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_pemahaman_prosedur" class="form-control">
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
                <input type="text" name="metode_edukasi_prosedur" class="form-control">
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
                <input type="text" name="topik_manajemen_nyeri" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tanggal_edukasi_nyeri" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <select name="tingkat_pemahaman_nyeri" class="form-control">
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
                <input type="text" name="metode_edukasi_nyeri" class="form-control">
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
                <input type="text" name="topik_lain_lain_dokter" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" value="{{date('Y-m-d')}}" readonly name="tanggal_edukasi_lain_lain" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
                <input type="text" name="tingkat_pemahaman_lain_lain" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" name="metode_edukasi_lain_lain" class="form-control">
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
                <input type="text" readonly value = "{{$data->topik_dianogsa}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tanggal_edukasi_diagnosa}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_pemahaman_diagnosa}}" class="form-control">
              
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_diagnosa}}" class="form-control">
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
                <input type="text" readonly value = "{{$data->topik_penyakit}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tanggal_edukasi_penyakit}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_pemahaman_penyakit}}" class="form-control">
            
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_penyakit}}" class="form-control">
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
                <input type="text" readonly value = "{{$data->topik_prosedur}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tanggal_edukasi_prosedur}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_pemahaman_prosedur}}" class="form-control">
              
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_prosedur}}" class="form-control">
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
                <input type="text" readonly value = "{{$data->topik_manajemen_nyeri}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tanggal_edukasi_nyeri}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
               <input type="text" readonly value = "{{$data->tingkat_pemahaman_nyeri}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_nyeri}}" class="form-control">
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
                <input type="text" readonly value = "{{$data->topik_lain_lain_dokter}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tanggal Edukasi</label>
            </div>
            <div class="col-8">
                <input type="date" readonly readonly value = "{{$data->tanggal_edukasi_lain_lain}}" class="form-control">
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-4">
                <label for="">Tingkat Pemahaman Awal</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->tingkat_pemahaman_lain_lain}}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="">Metode Edukasi</label>
            </div>
            <div class="col-8">
                <input type="text" readonly value = "{{$data->metode_edukasi_lain_lain}}" class="form-control">
            </div>
        </div>
    </div>
    
@endif



@push('myscripts')
    <script>
        function storeDoctorEdukasi(title,idform){
            var queryString = $(idform).serialize()+'&user_id='+$user_+'&reg_medrec='+$medrec;
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
@endpush
