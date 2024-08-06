@empty($skrining_gizi_obgyn)
@php
   $skrining_gizi_obgyn = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Skrining Gizi OBGYN</h2>
    <form id="form-skrining-gizi-obgyn">
        <div class="form-group">
            <label for="skor_asupan">Skor Asupan:</label>
            <select class="form-control" id="skor_asupan" name="skor_asupan">
                <option value="Ya" {{$skrining_gizi_obgyn->skor_asupan=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skrining_gizi_obgyn->skor_asupan=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_metabolisme">Skor Metabolisme:</label>
            <select class="form-control" id="skor_metabolisme" name="skor_metabolisme">
                <option value="Ya" {{$skrining_gizi_obgyn->skor_metabolisme=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skrining_gizi_obgyn->skor_metabolisme=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_tambah_bb">Skor Penambahan Berat Badan:</label>
            <select class="form-control" id="skor_tambah_bb" name="skor_tambah_bb">
                <option value="Ya" {{$skrining_gizi_obgyn->skor_tambah_bb=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skrining_gizi_obgyn->skor_tambah_bb=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_nilai_hb">Skor Nilai Hemoglobin:</label>
            <select class="form-control" id="skor_nilai_hb" name="skor_nilai_hb">
                <option value="Ya" {{$skrining_gizi_obgyn->skor_nilai_hb=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skrining_gizi_obgyn->skor_nilai_hb=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <button type="button" onclick="addskrininggiziobgyn()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_7', 'obgyn_6')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push('myscripts')
<script>
    $(document).ready(function(){
        getskrininggiziobgyn()
    });
    function addskrininggiziobgyn(){
        $.ajax({
            url:"{{ route('add.skrininggiziobgyn') }}",
            type:"POST",
            data:$('#form-skrining-gizi-obgyn').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
            success:function(data){
                console.log(data);
                if(data.success==true){
                    console.log(data);
                    alert('data telah disimpan')
                    getskrininggiziobgyn()
                }else{
                    alert('gagal menyimpan data')
                }
            },
        })
    }

    function getskrininggiziobgyn(){
        $.ajax({
            url:"{{route('get.skrininggiziobgyn')}}",
            type:"POST",
            data:{
                med_rec:medrec,
                regno:regno
            },
            success: function(data){
                if(data.success==true){
                    console.log(data);
                    $('#skor_asupan').val(data.data.skor_asupan);
                    $('#skor_metabolisme').val(data.data.skor_metabolisme);
                    $('#skor_tambah_bb').val(data.data.skor_tambah_bb);
                    $('#skor_nilai_hb').val(data.data.skor_nilai_hb);


                }else{
                    alert('gagal mengambil data')
                }
            }
        })
    }
</script>
@endpush
