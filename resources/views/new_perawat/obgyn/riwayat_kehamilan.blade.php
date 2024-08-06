@empty($riwayat_kehamilan)
@php
   $riwayat_kehamilan = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Riwayat Kehamilan</h2>
    <form id="form-riwayat-kehamilan">
        <div class="form-group">
            <label for="tanggal_tahun_partus">Tanggal Tahun Partus:</label>
            <input type="text" class="form-control" id="tanggal_tahun_partus" name="tanggal_tahun_partus" value="{{$riwayat_kehamilan->tanggal_tahun_partus}}">
        </div>
        <div class="form-group">
            <label for="tempat_partus">Tempat Partus:</label>
            <input type="text" class="form-control" id="tempat_partus" name="tempat_partus" value="{{$riwayat_kehamilan->tempat_partus}}">
        </div>
        <div class="form-group">
            <label for="umur_hamil">Umur Hamil:</label>
            <input type="text" class="form-control" id="umur_hamil" name="umur_hamil" value="{{$riwayat_kehamilan->umur_hamil}}">
        </div>
        <div class="form-group">
            <label for="jenis_persalinan">Jenis Persalinan:</label>
            <input type="text" class="form-control" id="jenis_persalinan" name="jenis_persalinan" value="{{$riwayat_kehamilan->jenis_persalinan}}">
        </div>
        <div class="form-group">
            <label for="penolong_persalinan">Penolong Persalinan:</label>
            <input type="text" class="form-control" id="penolong_persalinan" name="penolong_persalinan" value="{{$riwayat_kehamilan->penolong_persalinan}}">
        </div>
        <div class="form-group">
            <label for="penyulit">Penyulit:</label>
            <input type="text" class="form-control" id="penyulit" name="penyulit" value="{{$riwayat_kehamilan->penyulit}}">
        </div>
        <div class="form-group">
            <label for="bb_anak">Berat Badan Anak:</label>
            <input type="text" class="form-control" id="bb_anak" name="bb_anak" value="{{$riwayat_kehamilan->bb_anak}}">
        </div>
        <div class="form-group">
            <label for="keadaan_sekarang">Keadaan Sekarang:</label>
            <input type="text" class="form-control" id="keadaan_sekarang" name="keadaan_sekarang" value="{{$riwayat_kehamilan->keadaan_sekarang}}">
        </div>
        <button type="button"  class="btn btn-primary" onclick="addriwayatkehamilan()">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_6', 'obgyn_5')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push('myscripts')
<script>
    $(document).ready(function(){
        $('#tanggal_tahun_partus').datepicker({
            format: 'dd-mm-yyyy'
        });
        getriwayatkehamilan()
    });
    function addriwayatkehamilan(){
        $.ajax({
            url:"{{ route('add.riwayatkehamilan') }}",
            type:"POST",
            data:$('#form-riwayat-kehamilan').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
            success:function(data){
                console.log(data);
                if(data.success==true){
                    console.log(data);
                    alert('data telah disimpan')
                    getriwayatkehamilan()
                }else{
                    alert('gagal menyimpan data')
                }
            },
        })
    }

    function getriwayatkehamilan(){
        $.ajax({
            url:"{{route('get.riwayatkehamilan')}}",
            type:"POST",
            data:{
                med_rec:medrec,
                regno:regno
            },
            success: function(data){
                if(data.success==true){
                    console.log(data);
                    $('#tanggal_tahun_partus').val(data.data.tanggal_tahun_partus);
                    $('#tempat_partus').val(data.data.tempat_partus);
                    $('#umur_hamil').val(data.data.umur_hamil);
                    $('#jenis_persalinan').val(data.data.jenis_persalinan);
                    $('#penolong_persalinan').val(data.data.penolong_persalinan);
                    $('#penyulit').val(data.data.penyulit);
                    $('#bb_anak').val(data.data.bb_anak);
                    $('#keadaan_sekarang').val(data.data.keadaan_sekarang);

                }else{
                    alert('gagal mengambil data')
                }
            }
        })
    }
</script>
@endpush
