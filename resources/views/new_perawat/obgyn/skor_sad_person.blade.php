@empty($skor_sad_person)
@php
   $skor_sad_person = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Skor Sad Person</h2>
    <form id="form_skor_sad_person">
        <div class="form-group">
            <label for="sex">Sex:</label>
            <select class="form-control" id="sex" name="sex">
                <option value="1" {{$skor_sad_person->sex=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->sex=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <select class="form-control" id="age" name="age">
                <option value="1" {{$skor_sad_person->age=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->age=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="depresi">Depresi:</label>
            <select class="form-control" id="depresi" name="depresi">
                <option value="1" {{$skor_sad_person->depresi=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->depresi=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="previous_suicide">Previous Suicide:</label>
            <select class="form-control" id="previous_suicide" name="previous_suicide">
                <option value="1" {{$skor_sad_person->previous_suicide=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->previous_suicide=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="excessive_alcohol">Excessive Alcohol:</label>
            <select class="form-control" id="excessive_alcohol" name="excessive_alcohol">
                <option value="1" {{$skor_sad_person->excessive_alcohol=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->excessive_alcohol=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rational_thingking_loss ">Rational Thinking Loss:</label>
            <select class="form-control" id="rational_thingking_loss" name="rational_thingking_loss">
                <option value="1" {{$skor_sad_person->rational_thingking_loss=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->rational_thingking_loss=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="separated">Separated:</label>
            <select class="form-control" id="separated" name="separated">
                <option value="1" {{$skor_sad_person->separated=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->separated=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="organized_plan">Organized Plan:</label>
            <select class="form-control" id="organized_plan" name="organized_plan">
                <option value="1" {{$skor_sad_person->organized_plan=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->organized_plan=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="no_social_support">No Social Support:</label>
            <select class="form-control" id="no_social_support" name="no_social_support">
                <option value="1" {{$skor_sad_person->no_social_support=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->no_social_support=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sickness">Sickness:</label>
            <select class="form-control" id="sickness" name="sickness">
                <option value="1" {{$skor_sad_person->sickness=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->sickness=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_sad_person">Skor Sad Person:</label>
            <select class="form-control" id="skor_sad_person" name="skor_sad_person">
                <option value="1" {{$skor_sad_person->skor_sad_person=='1' ? 'selected' : ''}}>Ya</option>
                <option value="0" {{$skor_sad_person->skor_sad_person=='0' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
       {{-- <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori">
        </div>--}}
        <div class="form-group">
            <label for="riwayat_trauma">Riwayat Trauma:</label>
            <select class="form-control" id="riwayat_trauma" name="riwayat_trauma">
                <option value="Tidak" {{$skor_sad_person->riwayat_trauma=='Tidak' ? 'selected' : ''}}>Tidak</option>
                <option value="Ada" {{$skor_sad_person->riwayat_trauma=='Ada' ? 'selected' : ''}}>Ada</option>

            </select>
        </div>
        <div class="form-group">
            <label for="hambatan_sosial_ekonomi">Hambatan Sosial Ekonomi:</label>
            <select class="form-control" id="hambatan_sosial_ekonomi" name="hambatan_sosial_ekonomi">
                <option value="Ya" {{$skor_sad_person->hambatan_sosial_ekonomi=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skor_sad_person->hambatan_sosial_ekonomi=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pasien_butuh_konseling">Pasien Butuh Konseling:</label>
            <select class="form-control" id="pasien_butuh_konseling" name="pasien_butuh_konseling">
                <option value="Ya" {{$skor_sad_person->pasien_butuh_konseling=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skor_sad_person->pasien_butuh_konseling=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pasien_butuh_bantuan_ibadah">Pasien Butuh Bantuan Ibadah:</label>
            <select class="form-control" id="pasien_butuh_bantuan_ibadah" name="pasien_butuh_bantuan_ibadah">
                <option value="Ya" {{$skor_sad_person->pasien_butuh_bantuan_ibadah=='Ya' ? 'selected' : ''}}>Ya</option>
                <option value="Tidak" {{$skor_sad_person->pasien_butuh_bantuan_ibadah=='Tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="addSkorSadPerson()">Submit</button>
    </form>

    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_3', 'obgyn_2')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push("myscripts")
    <script>
        $(document).ready(function () {
            getskorsadperson()
        })
        // obgyn
        function addSkorSadPerson(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.skorsadperson')}}",
                    type: "POST",
                    data: $('#form_skor_sad_person').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                    success: function(data){
                        if(data.success==true){
                            console.log(data);
                            alert('data telah disimpan')
                            //getPemantauanIntra()
                        }else{
                            alert('gagal menyimpan data')
                        }

                    }
                })
            }
        }
        function getskorsadperson(){
            $.ajax({
                url:"{{route('get.skorsadperson')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success:function (data) {
                    if(data.success==true){
                        console.log(data);
                        //$('#skor_sad_person').val(data.data.skor_sad_person);
                        $('#riwayat_trauma').val(data.data.riwayat_trauma);
                        $('#hambatan_sosial_ekonomi').val(data.data.hambatan_sosial_ekonomi);
                        $('#pasien_butuh_konseling').val(data.data.pasien_butuh_konseling);
                        $('#pasien_butuh_bantuan_ibadah').val(data.data.pasien_butuh_bantuan_ibadah);
                        $('#excessive_alcohol').val(data.data.excessive_alcohol);
                        $('#rational_thingking_loss').val(data.data.rational_thingking_loss);
                        $('#separated').val(data.data.separated);
                        $('#organized_plan').val(data.data.organized_plan);
                        $('#no_social_support').val(data.data.no_social_support);
                        $('#sickness').val(data.data.sickness);
                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
