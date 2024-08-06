@empty($pengkajian_kebutuhan_aktifitas)
@php
   $pengkajian_kebutuhan_aktifitas = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Kebutuhan Aktivitas</h2>
    <form id="form-kebutuhan-aktifitas">
        <div class="form-group">
            <label for="rentang_gerak">Rentang Gerak:</label>
            <select class="form-control" id="rentang_gerak" name="rentang_gerak">
                <option value="aktif" {{$pengkajian_kebutuhan_aktifitas->rentang_gerak=='aktif' ? 'selected' : ''}}>Aktif</option>
                <option value="pasif" {{$pengkajian_kebutuhan_aktifitas->rentang_gerak=='pasif' ? 'selected' : ''}}>Pasif</option>
                <option value="tidak_dapat_dinilai" {{$pengkajian_kebutuhan_aktifitas->rentang_gerak=='tidak_dapat_dinilai' ? 'selected' : ''}}>Tidak Dapat Dinilai</option>
            </select>
        </div>
        <div class="form-group">
            <label for="deformitas">Deformitas:</label>
            <select class="form-control" id="deformitas" name="deformitas">
                <option value="tidak_ada" {{$pengkajian_kebutuhan_aktifitas->deformitas=='tidak_ada' ? 'selected' : ''}}>Tidak Ada</option>
                <option value="ada" {{$pengkajian_kebutuhan_aktifitas->deformitas=='ada' ? 'selected' : ''}}>Ada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gangguan_tidur">Gangguan Tidur:</label>
            <select class="form-control" id="gangguan_tidur" name="gangguan_tidur">
                <option value="tidak" {{$pengkajian_kebutuhan_aktifitas->gangguan_tidur=='tidak' ? 'selected' : ''}}>Tidak</option>
                <option value="ya" {{$pengkajian_kebutuhan_aktifitas->gangguan_tidur=='ya' ? 'selected' : ''}}>Ya</option>
            </select>
        </div>
        <button type="button" onclick="addpengkajiankebutuhanaktifitas()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_13', 'obgyn_12')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push('myscripts')
    <script>
        $(document).ready(function(){
            getpengkajiankebutuhanaktifitas()
        });
        function addpengkajiankebutuhanaktifitas(){
            $.ajax({
                url:"{{ route('add.pengkajiankebutuhanaktifitas') }}",
                type:"POST",
                data:$('#form-kebutuhan-aktifitas').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getpengkajiankebutuhanaktifitas()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getpengkajiankebutuhanaktifitas(){
            $.ajax({
                url:"{{route('get.pengkaiankebutuhanaktifitas')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#rentang_gerak').val(data.data.rentang_gerak);
                        $('#deformitas').val(data.data.deformitas);
                        $('#gangguan_tidur').val(data.data.gangguan_tidur);

                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
