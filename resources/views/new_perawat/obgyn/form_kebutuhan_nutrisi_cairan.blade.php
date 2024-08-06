@empty($pengkajian_kebutuhan_nutrisi)
@php
   $pengkajian_kebutuhan_nutrisi = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Kebutuhan Nutrisi dan Cairan</h2>
    <form id="form-kebutuhan-nutrisi-cairan">
        <div class="form-group">
            <label for="keluhan">Keluhan:</label>
            <select class="form-control" id="keluhan" name="keluhan">
                <option value="tidak_ada" {{$pengkajian_kebutuhan_nutrisi->keluhan=='tidak_ada' ? 'selected' : ''}}>Tidak Ada</option>
                <option value="mual" {{$pengkajian_kebutuhan_nutrisi->keluhan=='mual' ? 'selected' : ''}}>Mual</option>
                <option value="gangguan_mengunyah" {{$pengkajian_kebutuhan_nutrisi->keluhan=='gangguan_mengunyah' ? 'selected' : ''}}>Gangguan Mengunyah</option>
                <option value="gangguan_menelan" {{$pengkajian_kebutuhan_nutrisi->keluhan=='gangguan_menelan' ? 'selected' : ''}}>Gangguan Menelan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rasa_haus_berlebihan">Rasa Haus Berlebihan:</label>
            <select class="form-control" id="rasa_haus_berlebihan" name="rasa_haus_berlebihan">
                <option value="ya" {{$pengkajian_kebutuhan_nutrisi->rasa_haus_berlebihan=='ya' ? 'selected' : ''}}>Ya</option>
                <option value="tidak" {{$pengkajian_kebutuhan_nutrisi->rasa_haus_berlebihan=='tidak' ? 'selected' : ''}}>Tidak</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mukosa_mulut">Mukosa Mulut:</label>
            <select class="form-control" id="mukosa_mulut" name="mukosa_mulut">
                <option value="kering" {{$pengkajian_kebutuhan_nutrisi->mukosa_mulut=='kering' ? 'selected' : ''}}>Kering</option>
                <option value="lembab" {{$pengkajian_kebutuhan_nutrisi->mukosa_mulut=='lembab' ? 'selected' : ''}}>Lembab</option>
            </select>
        </div>
        <div class="form-group">
            <label for="turgor_kulit">Turgor Kulit:</label>
            <select class="form-control" id="turgor_kulit" name="turgor_kulit">
                <option value="elastis" {{$pengkajian_kebutuhan_nutrisi->turgor_kulit=='elastis' ? 'selected' : ''}}>Elastis</option>
                <option value="tidak_elastis" {{$pengkajian_kebutuhan_nutrisi->turgor_kulit=='tidak_elastis' ? 'selected' : ''}}>Tidak Elastis</option>
            </select>
        </div>
        <button type="button" onclick="addpengkajiankebutuhannutrisi()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_14', 'obgyn_13')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push('myscripts')
    <script>
        $(document).ready(function(){
            getpengkajiankebutuhannutrisi()
        });
        function addpengkajiankebutuhannutrisi(){
            $.ajax({
                url:"{{ route('add.pengkajiankebutuhannutrisi') }}",
                type:"POST",
                data:$('#form-kebutuhan-nutrisi-cairan').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getpengkajiankebutuhannutrisi()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getpengkajiankebutuhannutrisi(){
            $.ajax({
                url:"{{route('get.pengkajiankebutuhannutrisi')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#keluhan').val(data.data.keluhan);
                        $('#rasa_haus_berlebihan').val(data.data.rasa_haus_berlebihan);
                        $('#mukosa_mulut').val(data.data.mukosa_mulut);
                        $('#turgor_kulit').val(data.data.turgor_kulit);

                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
