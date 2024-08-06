@empty($behavior_pain_scale_obgyn)
@php
   $behavior_pain_scale_obgyn = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Behavior Pain Scale</h2>
    <form id="form-behavior-pain-scale">
        <div class="form-group">
            <label for="skor_ekspresi_wajah">Skor Ekspresi Wajah:</label>
            <select class="form-control" id="skor_ekspresi_wajah" name="skor_ekspresi_wajah">
                <option value="1" {{$behavior_pain_scale_obgyn->skor_ekspresi_wajah=='1' ? 'selected' : ''}}>Normal</option>
                <option value="2" {{$behavior_pain_scale_obgyn->skor_ekspresi_wajah=='2' ? 'selected' : ''}}>Mengencang sebagian (alis mengerut )</option>
                <option value="3" {{$behavior_pain_scale_obgyn->skor_ekspresi_wajah=='3' ? 'selected' : ''}}>Mengencang total (kelopak mata mengatup rapat)</option>
                <option value="4" {{$behavior_pain_scale_obgyn->skor_ekspresi_wajah=='4' ? 'selected' : ''}}>Meringis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_ekstremitas_atas">Skor Ekstremitas Atas:</label>
            <select class="form-control" id="skor_ekstremitas_atas" name="skor_ekstremitas_atas">
                <option value="1" {{$behavior_pain_scale_obgyn->skor_ekstremitas_atas=='1' ? 'selected' : ''}}>Tidak ada pergerakan</option>
                <option value="2" {{$behavior_pain_scale_obgyn->skor_ekstremitas_atas=='2' ? 'selected' : ''}}>Tertekuk Sebagian</option>
                <option value="3" {{$behavior_pain_scale_obgyn->skor_ekstremitas_atas=='3' ? 'selected' : ''}}>Tertekuk Total</option>
                <option value="4" {{$behavior_pain_scale_obgyn->skor_ekstremitas_atas=='4' ? 'selected' : ''}}>Retraksi permanen</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_compliance">Skor Compliance:</label>
            <select class="form-control" id="skor_compliance" name="skor_compliance">
                <option value="1" {{$behavior_pain_scale_obgyn->skor_compliance=='1' ? 'selected' : ''}}>Tolrenasi terhadap ventilator</option>
                <option value="2" {{$behavior_pain_scale_obgyn->skor_compliance=='2' ? 'selected' : ''}}>Sesekali terbatuk namun toleransi terhadap ventilator</option>
                <option value="3" {{$behavior_pain_scale_obgyn->skor_compliance=='3' ? 'selected' : ''}}>Melawan ventilator</option>
                <option value="4" {{$behavior_pain_scale_obgyn->skor_compliance=='4' ? 'selected' : ''}}>Tidak dapat mengendalikan pola nafas</option>
            </select>
        </div>
        <button type="button" onclick="addbehaviorscaleobgyn()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_9', 'obgyn_8')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push('myscripts')
    <script>
        $(document).ready(function(){
            getbehaviorscaleobgyn()
        });
        function addbehaviorscaleobgyn(){
            $.ajax({
                url:"{{ route('add.behaviorscaleobgyn') }}",
                type:"POST",
                data:$('#form-behavior-pain-scale').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                       getbehaviorscaleobgyn()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getbehaviorscaleobgyn(){
            $.ajax({
                url:"{{route('get.behaviorscaleobgyn')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#skor_ekspresi_wajah').val(data.data.skor_ekspresi_wajah);
                        $('#skor_ekstremitas_atas').val(data.data.skor_ekstremitas_atas);
                        $('#skor_compliance').val(data.data.skor_compliance);


                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
