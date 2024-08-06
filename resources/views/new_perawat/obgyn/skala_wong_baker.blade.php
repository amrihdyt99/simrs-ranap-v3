@empty($skala_wong_baker)
@php
   $skala_wong_baker = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Skala Wong-Baker</h2>
    <form id="form-skala-wong-baker">
        <div class="form-group">
            <label for="onset">Onset:</label>
            <input type="text" class="form-control" id="onset" name="onset" value="{{$skala_wong_baker->onset}}">
        </div>
        <div class="form-group">
            <label for="provocating">Provocating Factors:</label>
            <input type="text" class="form-control" id="provocating" name="provocating" value="{{$skala_wong_baker->provocating}}">
        </div>
        <div class="form-group">
            <label for="quality">Quality:</label>
            <select class="form-control" id="quality" name="quality">
                <option value="Tekanan" {{$skala_wong_baker->quality=='Tekanan' ? 'selected' : ''}}>Tekanan</option>
                <option value="Tajam Tusukan" {{$skala_wong_baker->quality=='Tajam Tusukan' ? 'selected' : ''}}>Tajam Tusukan</option>
                <option value="Mencengkram dan Melilit" {{$skala_wong_baker->quality=='Mencengkram dan Melilit' ? 'selected' : ''}}>Mencengkram dan Melilit</option>
            </select>
        </div>
        <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" class="form-control" id="region" name="region" value="{{$skala_wong_baker->region}}">
        </div>
        <div class="form-group">
            <label for="severity">Severity:</label>
            <input type="text" class="form-control" id="saverity" name="saverity" value="{{$skala_wong_baker->saverity}}">
        </div>
        <div class="form-group">
            <label for="treatment">Treatment:</label>
            <input type="text" class="form-control" id="treatment" name="treatment" value="{{$skala_wong_baker->treatment}}">
        </div>
        <div class="form-group">
            <label for="understanding">Patient Understanding:</label>
            <input type="text" class="form-control" id="understanding" name="understanding" value="{{$skala_wong_baker->understanding}}">
        </div>
        <div class="form-group">
            <label for="value">Pain Value:</label>
            <input type="text" class="form-control" id="value" name="value" value="{{$skala_wong_baker->value}}">
        </div>
        <button type="button" onclick="addskalawongbaker()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_8', 'obgyn_7')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push('myscripts')
    <script>
        $(document).ready(function(){
            getskalawongbaker()
        });
        function addskalawongbaker(){
            $.ajax({
                url:"{{ route('add.skalawongbeker') }}",
                type:"POST",
                data:$('#form-skala-wong-baker').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getskalawongbaker()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getskalawongbaker(){
            $.ajax({
                url:"{{route('get.skalawongbeker')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                           $('#onset').val(data.data.onset);
                            $('#provocating').val(data.data.provocating);
                            $('#quality').val(data.data.quality);
                            $('#region').val(data.data.region);
                            $('#severity').val(data.data.severity);
                            $('#treatment').val(data.data.treatment);
                            $('#understanding').val(data.data.understanding);
                            $('#value').val(data.data.value);


                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
