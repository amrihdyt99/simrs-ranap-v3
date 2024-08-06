@empty($pengkajian_kulit)
@php
   $pengkajian_kebutuhan_eliminasi = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Pengkajian Kebutuhan Eliminasi</h2>
    <form id="form-kebutuhan-eliminasi">
        <div class="form-group">
            <label for="frekuensi_bab">Frekuensi BAB:</label>
            <input type="text" class="form-control" id="frekuensi_bab" name="frekuensi_bab" value="{{$pengkajian_kebutuhan_eliminasi->frekuensi_bab}}">
        </div>
        <div class="form-group">
            <label for="keluhan_bab">Keluhan BAB:</label>
            <select class="form-control" id="keluhan_bab" name="keluhan_bab">
                <option value="tidak_ada" {{$pengkajian_kebutuhan_eliminasi->keluhan_bab=='tidak_ada' ? 'selected' : ''}}>Tidak Ada</option>
                <option value="pendaharan" {{$pengkajian_kebutuhan_eliminasi->keluhan_bab=='pendaharan' ? 'selected' : ''}}>Pendaharan</option>
                <option value="hemorroid" {{$pengkajian_kebutuhan_eliminasi->keluhan_bab=='hemorroid' ? 'selected' : ''}}>Hemorroid</option>
                <option value="konstipasi" {{$pengkajian_kebutuhan_eliminasi->keluhan_bab=='konstipasi' ? 'selected' : ''}}>Konstipasi</option>
                <option value="diare" {{$pengkajian_kebutuhan_eliminasi->keluhan_bab=='diare' ? 'selected' : ''}}>Diare</option>
            </select>
        </div>
        <div class="form-group">
            <label for="karakteristik_faces">Karakteristik Feces:</label>
            <select class="form-control" id="karakteristik_faces" name="karakteristik_faces">
                <option value="padat" {{$pengkajian_kebutuhan_eliminasi->karakteristik_faces=='padat' ? 'selected' : ''}}>Padat</option>
                <option value="lunak_dan_cair" {{$pengkajian_kebutuhan_eliminasi->karakteristik_faces=='lunak_dan_cair' ? 'selected' : ''}}>Lunak dan Cair</option>
            </select>
        </div>
        <div class="form-group">
            <label for="frekuensi_bak">Frekuensi BAK:</label>
            <input type="text" class="form-control" id="frekuensi_bak" name="frekuensi_bak" value="{{$pengkajian_kebutuhan_eliminasi->frekuensi_bak}}">
        </div>
        <div class="form-group">
            <label for="keluhan_bak">Keluhan BAK:</label>
            <select class="form-control" id="keluhan_bak" name="keluhan_bak">
                <option value="tidak_ada" {{$pengkajian_kebutuhan_eliminasi->keluhan_bak=='tidak_ada' ? 'selected' : ''}}>Tidak Ada</option>
                <option value="nyeri" {{$pengkajian_kebutuhan_eliminasi->keluhan_bak=='nyeri' ? 'selected' : ''}}>Nyeri</option>
                <option value="pendarahan" {{$pengkajian_kebutuhan_eliminasi->keluhan_bak=='pendarahan' ? 'selected' : ''}}>Pendarahan</option>
            </select>
        </div>
        <button type="button" onclick="addkebutuhaneliminasi()" class="btn btn-primary">Submit</button>
    </form>
</div>
@push('myscripts')
    <script>
        $(document).ready(function(){
            getkebutuhaneliminasi()
        });
        function addkebutuhaneliminasi(){
            $.ajax({
                url:"{{ route('add.pengkajiankebutuhaneliminasi') }}",
                type:"POST",
                data:$('#form-kebutuhan-eliminasi').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getkebutuhaneliminasi()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getkebutuhaneliminasi(){
            $.ajax({
                url:"{{route('get.pengkajiankebutuhaneliminasi')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#frekuensi_bab').val(data.data.frekuensi_bab)
                        $('#keluhan_bab').val(data.data.keluhan_bab)
                        $('#karakteristik_faces').val(data.data.karakteristik_faces)
                        $('#frekuensi_bak').val(data.data.frekuensi_bak)
                        $('#keluhan_bak').val(data.data.keluhan_bak)

                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
