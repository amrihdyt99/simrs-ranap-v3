@empty($laporan_persalinan)
@php
   $laporan_persalinan = optional((object)[]);
@endphp
@endempty
<div class="container">
    <h2>Form Laporan Persalinan</h2>
    <form id="form_laporan_persalinan">
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$laporan_persalinan->tanggal}}">
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{$laporan_persalinan->jam_mulai}}">
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{$laporan_persalinan->jam_selesai}}">
        </div>
        <div class="form-group">
            <label for="tindakan">Tindakan:</label>
            <input type="text" class="form-control" id="tindakan" name="tindakan" value="{{$laporan_persalinan->tindakan}}">
        </div>
        <div class="form-group">
            <label for="diagnosa_pasca_persalinan">Diagnosa Pasca Persalinan:</label>
            <input type="text" class="form-control" id="diagnosa_pasca_persalinan" name="diagnosa_pasca_persalinan" value="{{$laporan_persalinan->diagnosa_pasca_persalinan}}">
        </div>
        <div class="form-group">
            <label for="perkiraan_jumlah_pendarahan">Perkiraan Jumlah Pendarahan:</label>
            <input type="text" class="form-control" id="perkiraan_jumlah_pendarahan" name="perkiraan_jumlah_pendarahan" value="{{$laporan_persalinan->perkiraan_jumlah_pendarahan}}">
        </div>
        <div class="form-group">
            <label for="transfusi_prc">Transfusi PRC:</label>
            <input type="text" class="form-control" id="transfusi_prc" name="transfusi_prc" value="{{$laporan_persalinan->transfusi_prc}}">
        </div>
        <div class="form-group">
            <label for="transfusi_wb">Transfusi WB:</label>
            <input type="text" class="form-control" id="transfusi_wb" name="transfusi_wb" value="{{$laporan_persalinan->transfusi_wb}}">
        </div>
        <div class="form-group">
            <label for="transfusi_ffp">Transfusi FFP:</label>
            <input type="text" class="form-control" id="transfusi_ffp" name="transfusi_ffp" value="{{$laporan_persalinan->transfusi_ffp}}">
        </div>
        <div class="form-group">
            <label for="transfusi_cryo">Transfusi Cryo:</label>
            <input type="text" class="form-control" id="transfusi_cryo" name="transfusi_cryo" value="{{$laporan_persalinan->transfusi_cryo}}">
        </div>
        <div class="form-group">
            <label for="laporan">Laporan:</label>
            <textarea class="form-control" id="laporan" name="laporan" rows="3">{{$laporan_persalinan->laporan}}</textarea>
        </div>
        <div class="form-group">
            <label for="keterangan_bayi_lahir">Keterangan Bayi Lahir:</label>
            <input type="text" class="form-control" id="keterangan_bayi_lahir" name="keterangan_bayi_lahir" value="{{$laporan_persalinan->keterangan_bayi_lahir}}">
        </div>
        <div class="form-group">
            <label for="jam_lahir">Jam Lahir:</label>
            <input type="time" class="form-control" id="jam_lahir" name="jam_lahir" value="{{$laporan_persalinan->jam_lahir}}">
        </div>
        <div class="form-group">
            <label for="bb_bayi">Berat Badan Bayi:</label>
            <input type="text" class="form-control" id="bb_bayi" name="bb_bayi" value="{{$laporan_persalinan->bb_bayi}}">
        </div>
        <div class="form-group">
            <label for="lk_bayi">Lingkar Kepala Bayi:</label>
            <input type="text" class="form-control" id="lk_bayi" name="lk_bayi" value="{{$laporan_persalinan->lk_bayi}}">
        </div>
        <div class="form-group">
            <label for="pb_bayi">Panjang Badan Bayi:</label>
            <input type="text" class="form-control" id="pb_bayi" name="pb_bayi" value="{{$laporan_persalinan->pb_bayi}}">
        </div>
        <div class="form-group">
            <label for="ld_bayi">Lingkar Dada Bayi:</label>
            <input type="text" class="form-control" id="ld_bayi" name="ld_bayi" value="{{$laporan_persalinan->ld_bayi}}">
        </div>
        <div class="form-group">
            <label for="as_bayi">Apgar Score Bayi:</label>
            <input type="text" class="form-control" id="as_bayi" name="as_bayi" value="{{$laporan_persalinan->as_bayi}}">
        </div>
        <div class="form-group">
            <label for="anus_bayi">Anus Imperforata Bayi:</label>
            <input type="text" class="form-control" id="anus_bayi" name="anus_bayi" value="{{$laporan_persalinan->anus_bayi}}">
        </div>
        <button type="button" class="btn btn-primary" onclick="addlaporanpersalinan()">Submit</button>
    </form>
</div>
@push("myscripts")
    <script>
        $(document).ready(function () {
            getlaporanpersalinan()
        })
        function addlaporanpersalinan(){
            $.ajax({
                url:"{{route('add.laporanpersalinanobgyn')}}",
                type:"POST",
                data: $("#form_laporan_persalinan").serialize()+"&reg_medrec="+medrec+"&user_id="+{{auth()->user()->id}}+"&reg_no="+regno,
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        alert('data telah disimpan')
                        getlaporanpersalinan()
                    }else{
                        alert('gagal menyimpan data')
                    }
                }
            })
        }

        function getlaporanpersalinan(){
            $.ajax({
                url:"{{route('get.laporanpersalinanobgyn')}}",
                type:"POST",
                data:{
                    reg_medrec:medrec,
                    regno:regno
                },
                success: function(data){
                    if(data.success==true){
                        console.log(data);
                        $("#tanggal").val(data.data.tanggal);
                        $("#jam_mulai").val(data.data.jam_mulai);
                        $("#jam_selesai").val(data.data.jam_selesai);
                        $("#tindakan").val(data.data.tindakan);
                        $("#diagnosa_pasca_persalinan").val(data.data.diagnosa_pasca_persalinan);
                        $("#perkiraan_jumlah_pendarahan").val(data.data.perkiraan_jumlah_pendarahan);
                        $("#transfusi_prc").val(data.data.transfusi_prc);
                        $("#transfusi_wb").val(data.data.transfusi_wb);
                        $("#transfusi_ffp").val(data.data.transfusi_ffp);
                        $("#transfusi_cryo").val(data.data.transfusi_cryo);
                        $("#laporan").val(data.data.laporan);
                        $("#keterangan_bayi_lahir").val(data.data.keterangan_bayi_lahir);
                        $("#jam_lahir").val(data.data.jam_lahir);
                        $("#bb_bayi").val(data.data.bb_bayi);
                        $("#lk_bayi").val(data.data.lk_bayi);
                        $("#pb_bayi").val(data.data.pb_bayi);
                        $("#ld_bayi").val(data.data.ld_bayi);
                        $("#as_bayi").val(data.data.as_bayi);
                        $("#anus_bayi").val(data.data.anus_bayi);
                    }else{
                        alert('gagal mengambil data')
                    }
                }
            })
        }
    </script>
@endpush
