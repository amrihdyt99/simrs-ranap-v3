@empty($riwayat_menstruasi)
@php
   $riwayat_menstruasi = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Riwayat Menstruasi</h2>
    <form id="form_riwayat_menstruasi">
        <div class="form-group">
            <label for="umur_menarche_tahun">Umur Menarche (tahun):</label>
            <input type="text" class="form-control" id="umur_menarche_tahun" name="umur_menarche_tahun" value="{{$riwayat_menstruasi->umur_menarche_tahun}}">
        </div>
        <div class="form-group">
            <label for="umur_menarche_lama_haid">Lama Haid saat Menarche:</label>
            <input type="text" class="form-control" id="umur_menarche_lama_haid" name="umur_menarche_lama_haid" value="{{$riwayat_menstruasi->umur_menarche_lama_haid}}">
        </div>
        <div class="form-group">
            <label for="umur_menarche_jumlah_darah_haid">Jumlah Darah saat Haid:</label>
            <input type="text" class="form-control" id="umur_menarche_jumlah_darah_haid" name="umur_menarche_jumlah_darah_haid" value="{{$riwayat_menstruasi->umur_menarche_jumlah_darah_haid}}">
        </div>
        <div class="form-group">
            <label for="umur_menarche_ganti_pembalut">Pergantian Pembalut saat Haid:</label>
            <input type="text" class="form-control" id="umur_menarche_ganti_pembalut" name="umur_menarche_ganti_pembalut" value="{{$riwayat_menstruasi->umur_menarche_ganti_pembalut}}">
        </div>
        <div class="form-group">
            <label for="hpht">HPHT (Hari Pertama Haid Terakhir):</label>
            <input type="text" class="form-control" id="hpht" name="hpht" value="{{$riwayat_menstruasi->hpht}}">
        </div>
        <div class="form-group">
            <label for="tp">TP (Taksiran Partus):</label>
            <input type="text" class="form-control" id="tp" name="tp" value="{{$riwayat_menstruasi->tp}}">
        </div>
        <div class="form-group">
            <label for="gangguan_haid">Gangguan Haid:</label>
            <select class="form-control" id="gangguan_haid" name="gangguan_haid">
                <option value="Dismenorhoe" {{$riwayat_menstruasi->gangguan_haid=='Dismenorhoe' ? 'selected' : ''}}>Dismenorhoe</option>
                <option value="Spotting" {{$riwayat_menstruasi->gangguan_haid=='Spotting' ? 'selected' : ''}}>Spotting</option>
                <option value="Menorragia" {{$riwayat_menstruasi->gangguan_haid=='Menorragia' ? 'selected' : ''}}>Menorragia</option>
                <option value="Metrorhagia" {{$riwayat_menstruasi->gangguan_haid=='Metrorhagia' ? 'selected' : ''}}>Metrorhagia</option>
            </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="addRiwayatMenstruasi()">Submit</button>
    </form>

    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_4', 'obgyn_3')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push('myscripts')
    <script>
        //load document
        $(document).ready(function(){
            getRiwayatMenstruasi();
        })

        function addRiwayatMenstruasi(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.riwayatmenstruasi')}}",
                    type: "POST",
                    data: $('#form_riwayat_menstruasi').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                    success: function(data){
                        if(data.success==true){
                            console.log(data);
                            alert('data telah disimpan')
                            getRiwayatMenstruasi()
                        }else{
                            alert('gagal menyimpan data')
                        }

                    }
                })
            }
        }

        function getRiwayatMenstruasi(){
            $.ajax({
                url: "{{route('get.riwayatmenstruasi')}}",
                type: "POST",
                data: {
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#umur_menarche_tahun').val(data.data.umur_menarche_tahun);
                        $('#umur_menarche_lama_haid').val(data.data.umur_menarche_lama_haid);
                        $('#umur_menarche_jumlah_darah_haid').val(data.data.umur_menarche_jumlah_darah_haid);
                        $('#umur_menarche_ganti_pembalut').val(data.data.umur_menarche_ganti_pembalut);
                        $('#hpht').val(data.data.hpht);
                        $('#tp').val(data.data.tp);
                        $('#gangguan_haid').val(data.data.gangguan_haid);
                    }else{
                        alert('gagal mengambil data')
                    }

                }
            })
        }
    </script>
@endpush
