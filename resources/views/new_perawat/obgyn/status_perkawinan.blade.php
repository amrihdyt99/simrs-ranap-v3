@empty($riwayat_perkawinan)
@php
   $riwayat_perkawinan = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Riwayat Perkawinan</h2>
    <form id="form-riwayat-perkawinan">
        <div class="form-group">
            <label for="status_perkawinan">Status Perkawinan:</label>
            <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                <option value="Kawin" {{$riwayat_perkawinan->status_perkawinan=='Kawin' ? 'selected' : ''}}>Kawin</option>
                <option value="Belum kawin" {{$riwayat_perkawinan->status_perkawinan=='Belum kawin' ? 'selected' : ''}}>Belum Kawin</option>
                <option value="Janda" {{$riwayat_perkawinan->status_perkawinan=='Janda' ? 'selected' : ''}}>Janda</option>
            </select>
        </div>
        <div class="form-group">
            <label for="usia_perkawinan">Usia Perkawinan:</label>
            <input type="text" class="form-control" id="usia_perkawinan" name="usia_perkawinan" value="{{$riwayat_perkawinan->usia_perkawinan}}">
        </div>
        <div class="form-group">
            <label for="jumlah_perkawinan">Jumlah Perkawinan:</label>
            <select class="form-control" id="jumlah_perkawinan" name="jumlah_perkawinan">
                <option value="1x" {{$riwayat_perkawinan->jumlah_perkawinan=='1x' ? 'selected' : ''}}>1x</option>
                <option value="2x" {{$riwayat_perkawinan->jumlah_perkawinan=='2x' ? 'selected' : ''}}>2x</option>
                <option value=">2x" {{$riwayat_perkawinan->jumlah_perkawinan=='>2x' ? 'selected' : ''}}>>2x</option>
            </select>
        </div>
        <button type="button" onclick="addstatusperkawinan()" class="btn btn-primary">Submit</button>
    </form>

    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_5', 'obgyn_4')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>
@push("myscripts")
    <script>
        $(document).ready(function () {
            getstatusperkawinan()
        })
        function addstatusperkawinan(){
            $.ajax({
                url:"{{route('add.statusperkawinan')}}",
                type:"POST",
                data: $("#form-riwayat-perkawinan").serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getstatusperkawinan()
                    }else{
                        alert('gagal menyimpan data')
                    }
                }
            })
        }

        function getstatusperkawinan(){
            $.ajax({
                url:"{{route('get.statusperkawinan')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $("#status_perkawinan").val(data.data.status_perkawinan);
                        $("#usia_perkawinan").val(data.data.usia_perkawinan);
                        $("#jumlah_perkawinan").val(data.data.jumlah_perkawinan);
                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
