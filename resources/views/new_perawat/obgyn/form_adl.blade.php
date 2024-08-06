@empty($adl_obgyn)
@php
   $adl_obgyn = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Activity Daily Living</h2>
    <form id="form-adl">
        <div class="form-group">
            <label for="skor_bab">Skor BAB:</label>
            <select class="form-control" id="skor_bab" name="skor_bab">
                <option value="0" {{$adl_obgyn->skor_bab=='0' ? 'selected' : ''}}>Tidak terkendali/tak teratur (perlu pencahar)</option>
                <option value="1" {{$adl_obgyn->skor_bab=='1' ? 'selected' : ''}}>Kadang-kadang tak terkendali (1 x / minggu</option>
                <option value="2" {{$adl_obgyn->skor_bab=='2' ? 'selected' : ''}}>Terkendali teratur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_bak">Skor BAK:</label>
            <select class="form-control" id="skor_bak" name="skor_bak">
                <option value="0" {{$adl_obgyn->skor_bak=='0' ? 'selected' : ''}}>Tak terkendali atau pakai kateter</option>
                <option value="1" {{$adl_obgyn->skor_bak=='1' ? 'selected' : ''}}>Kadang-kadang tak terkendali (hanya 1x/24 jam)</option>
                <option value="2" {{$adl_obgyn->skor_bak=='2' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_membersihkan_diri">Skor Membersihkan Diri:</label>
            <select class="form-control" id="skor_membersihkan_diri" name="skor_membersihkan_diri">
                <option value="0" {{$adl_obgyn->skor_membersihkan_diri=='0' ? 'selected' : ''}}>Butuh bantuan orang lain</option>
                <option value="1" {{$adl_obgyn->skor_membersihkan_diri=='1' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_penggunaan_wc">Skor Penggunaan WC:</label>
            <select class="form-control" id="skor_penggunaan_wc" name="skor_penggunaan_wc">
                <option value="0" {{$adl_obgyn->skor_penggunaan_wc=='0' ? 'selected' : ''}}>Tergantung pertolongan orang lain</option>
                <option value="1" {{$adl_obgyn->skor_penggunaan_wc=='1' ? 'selected' : ''}}>Perlu pertolongan pada beberapa kegiatan tetapi dapat mengerjakan sendiri beberapa kegiatan yang lain </option>
                <option value="2" {{$adl_obgyn->skor_penggunaan_wc=='2' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_makan_minum">Skor Makan Minum:</label>
            <select class="form-control" id="skor_makan_minum" name="skor_makan_minum">
                <option value="0" {{$adl_obgyn->skor_makan_minum=='0' ? 'selected' : ''}}>Tidak mampu</option>
                <option value="1" {{$adl_obgyn->skor_makan_minum=='1' ? 'selected' : ''}}>Perlu ditolong memotong makanan</option>
                <option value="2" {{$adl_obgyn->skor_makan_minum=='2' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_bergerak_kursi_roda">Skor Bergerak dengan Kursi Roda:</label>
            <select class="form-control" id="skor_bergerak_kursi_roda" name="skor_bergerak_kursi_roda">
                <option value="0" {{$adl_obgyn->skor_bergerak_kursi_roda=='0' ? 'selected' : ''}}>Tidak mampu</option>
                <option value="1" {{$adl_obgyn->skor_bergerak_kursi_roda=='1' ? 'selected' : ''}}>Perlu banyak bantuan untuk bisa duduk</option>
                <option value="2" {{$adl_obgyn->skor_bergerak_kursi_roda=='2' ? 'selected' : ''}}>Bantuan minimal 1 orang</option>
                <option value="3" {{$adl_obgyn->skor_bergerak_kursi_roda=='3' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_berjalan">Skor Berjalan:</label>
            <select class="form-control" id="skor_berjalan" name="skor_berjalan">
                <option value="0" {{$adl_obgyn->skor_berjalan=='0' ? 'selected' : ''}}>Tidak mampu</option>
                <option value="1" {{$adl_obgyn->skor_berjalan=='1' ? 'selected' : ''}}>Bisa (pindah) dengan kursi roda</option>
                <option value="2" {{$adl_obgyn->skor_berjalan=='2' ? 'selected' : ''}}>Berjalan dengan bantuan 1 orang</option>
                <option value="3" {{$adl_obgyn->skor_berjalan=='3' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_berpakaian">Skor Berpakaian:</label>
            <select class="form-control" id="skor_berpakaian" name="skor_berpakaian">
                <option value="0" {{$adl_obgyn->skor_berpakaian=='0' ? 'selected' : ''}}>Tergantung orang lain</option>
                <option value="1" {{$adl_obgyn->skor_berpakaian=='1' ? 'selected' : ''}}>Sebagian dibantu</option>
                <option value="2" {{$adl_obgyn->skor_berpakaian=='2' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_naik_turun_tangga">Skor Naik Turun Tangga:</label>
            <select class="form-control" id="skor_naik_turun_tangga" name="skor_naik_turun_tangga">
                <option value="0" {{$adl_obgyn->skor_naik_turun_tangga=='0' ? 'selected' : ''}}>Tidak mampu</option>
                <option value="1" {{$adl_obgyn->skor_naik_turun_tangga=='1' ? 'selected' : ''}}>Butuh pertolongan</option>
                <option value="2" {{$adl_obgyn->skor_naik_turun_tangga=='2' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <div class="form-group">
            <label for="skor_mandi">Skor Mandi:</label>
            <select class="form-control" id="skor_mandi" name="skor_mandi">
                <option value="0" {{$adl_obgyn->skor_mandi=='0' ? 'selected' : ''}}>Tergantung orang lain</option>
                <option value="1" {{$adl_obgyn->skor_mandi=='1' ? 'selected' : ''}}>Mandiri</option>
            </select>
        </div>
        <button type="button" onclick="addadl()" class="btn btn-primary">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_10', 'obgyn_9')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push('myscripts')
    <script>
        $(document).ready(function(){
            getadl()
        });
        function addadl(){
            $.ajax({
                url:"{{ route('add.adlobgyn') }}",
                type:"POST",
                data:$('#form-adl').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
                success:function(data){
                    console.log(data);
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getadl()
                    }else{
                        alert('gagal menyimpan data')
                    }
                },
            })
        }

        function getadl(){
            $.ajax({
                url:"{{route('get.adlobgyn')}}",
                type:"POST",
                data:{
                    med_rec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $('#skor_mengontrol_bab').val(data.data.skor_mengontrol_bab);
                        $('#skor_mengontrol_bak').val(data.data.skor_mengontrol_bak);
                        $('#skor_membersihkan_diri').val(data.data.skor_membersihkan_diri);
                        $('#skor_penggunaan_wc').val(data.data.skor_penggunaan_wc);
                        $('#skor_makan_minum').val(data.data.skor_makan_minum);
                        $('#skor_bergerak_kursi_roda').val(data.data.skor_bergerak_kursi_roda);
                        $('#skor_berjalan').val(data.data.skor_berjalan);
                        $('#skor_berpakaian').val(data.data.skor_berpakaian);
                        $('#skor_naik_turun_tangga').val(data.data.skor_naik_turun_tangga);
                        $('#skor_mandi').val(data.data.skor_mandi);


                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
