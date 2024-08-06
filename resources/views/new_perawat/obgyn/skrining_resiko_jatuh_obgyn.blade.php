@empty($skrining_resiko_jatuh_obgyn)
@php
   $skrining_resiko_jatuh_obgyn = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Skrining Resiko Jatuh</h2>
    <form id="form-resiko-jatuh-obgyn">
        <div class="form-group">
            <label for="skor_riwayat_jatuh">Riwayat baru atau 3 bulan terakhir</label>
            <select class="form-control" id="skor_riwayat_jatuh" name="skor_riwayat_jatuh">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_riwayat_jatuh=='0' ? 'selected' : ''}}>Ya</option>
                <option value="25" {{$skrining_resiko_jatuh_obgyn->skor_riwayat_jatuh=='25' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_diagnosis_medis">Diagnosis Medis Sekunder:</label>
            <select class="form-control" id="skor_diagnosis_medis" name="skor_diagnosis_medis">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_diagnosis_medis=='0' ? 'selected' : ''}}>Ya</option>
                <option value="25" {{$skrining_resiko_jatuh_obgyn->skor_diagnosis_medis=='25' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_alat_bantu">Menggunakan Alat Bantu:</label>
            <select class="form-control" id="skor_alat_bantu" name="skor_alat_bantu">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_alat_bantu=='0' ? 'selected' : ''}}>Bed rest</option>
                <option value="15" {{$skrining_resiko_jatuh_obgyn->skor_alat_bantu=='15' ? 'selected' : ''}}>Penopang</option>
                <option value="30" {{$skrining_resiko_jatuh_obgyn->skor_alat_bantu=='30' ? 'selected' : ''}}>Furnitur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_infus">Dipasang Infus:</label>
            <select class="form-control" id="skor_infus" name="skor_infus">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_infus=='0' ? 'selected' : ''}}>Ya</option>
                <option value="25" {{$skrining_resiko_jatuh_obgyn->skor_infus=='25' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_cara_berjalan">Cara Berjalan:</label>
            <select class="form-control" id="skor_cara_berjalan" name="skor_cara_berjalan">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_cara_berjalan=='0' ? 'selected' : ''}}>Normal</option>
                <option value="15" {{$skrining_resiko_jatuh_obgyn->skor_cara_berjalan=='15' ? 'selected' : ''}}>Lemah</option>
                <option value="30" {{$skrining_resiko_jatuh_obgyn->skor_cara_berjalan=='30' ? 'selected' : ''}}>Terganggu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_mental">Status Mental:</label>
            <select class="form-control" id="skor_mental" name="skor_mental">
                <option value="0" {{$skrining_resiko_jatuh_obgyn->skor_mental=='0' ? 'selected' : ''}}>Orientasi dengan kemampuan sendiri</option>
                <option value="25" {{$skrining_resiko_jatuh_obgyn->skor_mental=='25' ? 'selected' : ''}}>Lupa keterbatasan diri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="diberitahukan_dokter">Diberitahukan Dokter:</label>
            <select class="form-control" id="diberitahukan_dokter" name="diberitahukan_dokter">
                <option value="tidak" {{$skrining_resiko_jatuh_obgyn->diberitahukan_dokter=='tidak' ? 'selected' : ''}}>Tidak</option>
                <option value="ya" {{$skrining_resiko_jatuh_obgyn->diberitahukan_dokter=='ya' ? 'selected' : ''}}>Ya</option>
            </select>
        </div>
        <button type="button" onclick="addresikojatuhobgyn()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_11', 'obgyn_10')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push('myscripts')
    <script>
        $(document).ready(function(){
           getresikojatuhobgyn()
        });
        function addresikojatuhobgyn(){
            $.ajax({
                url:"{{ route('add.skriningresikojatuhobgyn') }}",
                type:"POST",
                data:$('#form-resiko-jatuh-obgyn').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getresikojatuhobgyn()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getresikojatuhobgyn(){
            $.ajax({
                url:"{{route('get.skriningresikojatuhobgyn')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#skor_riwayat_jatuh').val(data.data.skor_riwayat_jatuh);
                        $('#skor_diagnosis_medis').val(data.data.skor_diagnosis_medis);
                        $('#skor_alat_bantu').val(data.data.skor_alat_bantu);
                        $('#skor_infus').val(data.data.skor_infus);
                        $('#skor_cara_berjalan').val(data.data.skor_cara_berjalan);
                        $('#skor_mental').val(data.data.skor_mental);
                        $('#diberitahukan_dokter').val(data.data.diberitahukan_dokter);

                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
