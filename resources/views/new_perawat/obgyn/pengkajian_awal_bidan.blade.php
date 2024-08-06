@empty($pengkajian_awal_bidan)
@php
   $pengkajian_awal_bidan = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Data Pasien</h2>
    <form id="form_assesment_obgyn">
        <div class="form-group">
            <label for="alergi">Alergi:</label>
            <input type="text" class="form-control" id="alergi" name="alergi" value="{{$pengkajian_awal_bidan->alergi}}">
        </div>
        <div class="form-group">
            <label for="alergi_obat_nama">Nama Alergi Obat:</label>
            <input type="text" class="form-control" id="alergi_obat_nama" value="{{$pengkajian_awal_bidan->alergi_obat_nama}}" name="alergi_obat_nama">
        </div>
        <div class="form-group">
            <label for="alergi_obat_reaks">Reaksi Alergi Obat:</label>
            <input type="text" class="form-control" id="alergi_obat_rekasi" value="{{$pengkajian_awal_bidan->alergi_obat_nama}}" name="alergi_obat_rekasi">
        </div>
        <div class="form-group">
            <label for="alergi_makanan_nama">Nama Alergi Makanan:</label>
            <input type="text" class="form-control" id="alergi_makanan_nama" name="alergi_makanan_nama" value="{{$pengkajian_awal_bidan->alergi_makanan_nama}}">
        </div>
        <div class="form-group">
            <label for="alergi_makanan_rekasi">Reaksi Alergi Makanan:</label>
            <input type="text" class="form-control" id="alergi_makanan_reaksi" name="alergi_makanan_reaksi" value="{{$pengkajian_awal_bidan->alergi_makanan_reaksi}}">
        </div>
        <div class="form-group">
            <label for="alergi_lainnya_nama">Nama Alergi Lainnya:</label>
            <input type="text" class="form-control" id="alergi_lainnya_nama" name="alergi_lainnya_nama" value="{{$pengkajian_awal_bidan->alergi_lainnya_nama}}">
        </div>
        <div class="form-group">
            <label for="alergi_lainnya_reaksi">Reaksi Alergi Lainnya:</label>
            <input type="text" class="form-control" id="alergi_lainnya_rekasi" name="alergi_lainnya_rekasi" value="{{$pengkajian_awal_bidan->alergi_lainnya_rekasi}}">
        </div>
        <div class="form-group">
            <label for="kesadaran">Kesadaran:</label>
            <input type="text" class="form-control" id="kesadaran" name="kesadaran" value="{{$pengkajian_awal_bidan->kesadaran}}">
        </div>
        <div class="form-group">
            <label for="kondisi_umum">Kondisi Umum:</label>
            <input type="text" class="form-control" id="kondisi_umum" name="kondisi_umum" value="{{$pengkajian_awal_bidan->kondisi_umum}}">
        </div>
        <div class="form-group">
            <label for="tekanan_darah">Tekanan Darah:</label>
            <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" value="{{$pengkajian_awal_bidan->tekanan_darah}}">
        </div>
        <div class="form-group">
            <label for="tekanan_darah">Nadi:</label>
            <input type="text" class="form-control" id="nadi" name="nadi" value="{{$pengkajian_awal_bidan->nadi}}">
        </div>
        <div class="form-group">
            <label for="tekanan_darah">Suhu:</label>
            <input type="text" class="form-control" id="suhu" name="suhu" value="{{$pengkajian_awal_bidan->suhu}}">
        </div>
        <div class="form-group">
            <label for="tekanan_darah">Pernafasan:</label>
            <input type="text" class="form-control" id="pernafasan" name="pernafasan" value="{{$pengkajian_awal_bidan->pernafasan}}">
        </div>
        <div class="form-group">
            <label for="tinggi_badan">Tinggi Badan:</label>
            <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{$pengkajian_awal_bidan->tinggi_badan}}">
        </div>
        <div class="form-group">
            <label for="tinggi_badan">Berat Badan:</label>
            <input type="text" class="form-control" id="berat_badan" name="berat_badan" value="{{$pengkajian_awal_bidan->berat_badan}}">
        </div>
        <div class="form-group">
            <label for="kebutuhan_khusus">Kebutuhan Khusus:</label>
            <input type="text" class="form-control" id="kebutuhan_khusus" name="kebutuhan_khusus" value="{{$pengkajian_awal_bidan->kebutuhan_khusus}}">
        </div>
        <div class="form-group">
            <label for="status_emosional">Status Emosional:</label>
            <input type="text" class="form-control" id="status_emosional" name="status_emosional" value="{{$pengkajian_awal_bidan->status_emosional}}">
        </div>
        <div class="form-group">
            <label for="kebiasaan">Kebiasaan:</label>
            <input type="text" class="form-control" id="kebiasaan" name="kebiasaan" value="{{$pengkajian_awal_bidan->kebiasaan}}">
        </div>
        <div class="form-group">
            <label for="kebiasaan_frekuensi">Frekuensi Kebiasaan:</label>
            <input type="text" class="form-control" id="kebiasaan_frekuensi" name="kebiasaan_frekuensi" value="{{$pengkajian_awal_bidan->kebiasaan_frekuensi}}">
        </div>
        <div class="form-group">
            <label for="riwayat_gangguan_jiwa">Riwayat Gangguan Jiwa:</label>
            <input type="text" class="form-control" id="riwayat_gangguan_jiwa" name="riwayat_gangguan_jiwa" value="{{$pengkajian_awal_bidan->riwayat_gangguan_jiwa}}">
        </div>
        <button type="button" class="btn btn-primary" onclick="addAssesmentObgyn()">Submit</button>
    </form>
    <button type="button" class="btn btn-warning float-right" onclick="nextTab('#obgyn_2', 'obgyn_1')">Halaman Selanjutnya <i class="fas fa-arrow-right"></i></button>
</div>

@push("myscripts")
    <script>
        $(document).ready(function(){
            getAssesmentObgyn()
        })

        function getAssesmentObgyn(){
            $.ajax({
                url:"{{route('get.assesmentobgyn')}}",
                type:"POST",
                data:{
                    medrec:medrec,
                    regno:regno
                },
                success:function (data){
                    console.log(data)
                    $("#alergi").val(data.data.alergi)
                    $("#alergi_obat_nama").val(data.data.alergi_obat_nama)
                    $("#alergi_obat_rekasi").val(data.data.alergi_obat_rekasi)
                    $("#alergi_makanan_nama").val(data.data.alergi_makanan_nama)
                    $("#alergi_makanan_reaksi").val(data.data.alergi_makanan_reaksi)
                    $("#alergi_lainnya_nama").val(data.data.alergi_lainnya_nama)
                    $("#alergi_lainnya_rekasi").val(data.data.alergi_lainnya_rekasi)
                    $("#kesadaran").val(data.data.kesadaran)
                    $("#kondisi_umum").val(data.data.kondisi_umum)
                    $("#tekanan_darah").val(data.data.tekanan_darah)
                    $("#tinggi_badan").val(data.data.tinggi_badan)
                    $("#kebutuhan_khusus").val(data.data.kebutuhan_khusus)
                    $("#status_emosional").val(data.data.status_emosional)
                    $("#kebiasaan").val(data.data.kebiasaan)
                    $("#kebiasaan_frekuensi").val(data.data.kebiasaan_frekuensi)
                    $("#riwayat_gangguan_jiwa").val(data.data.riwayat_gangguan_jiwa)
                }
            })
        }
        function addAssesmentObgyn(){
            //confirm before excute
            if(confirm("Apakah anda yakin akan menyimpan data ini?")){
                $.ajax({
                    url: "{{route('add.assesmentobgyn')}}",
                    type: "POST",
                    data: $('#form_assesment_obgyn').serialize()+"&med_rec="+medrec+"&user_id="+{{auth()->user()->id}}+"&no_reg="+regno,
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

    </script>
@endpush

