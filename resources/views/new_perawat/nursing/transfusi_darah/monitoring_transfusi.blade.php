@empty($nurse_transfusi_darah)
@php
   $nurse_transfusi_darah = optional((object)[]);
@endphp
@endempty
<form id="form-transfusi">
    <div class="form-group"><label class="control-label">Nomor Kantong</label>
        <input type="text" name="nomor_kantong" placeholder="isi nomor kantong" class="form-control" value="{{$nurse_transfusi_darah->nomor_kantong}}" />
    </div>
    <div class="form-group"><label class="control-label">Golongan Darah</label>
        <select class="form-control" name="golongan_darah">
            <option value="A" {{$nurse_transfusi_darah->golongan_darah=='A' ? 'selected' : ''}}>A</option>
            <option value="B" {{$nurse_transfusi_darah->golongan_darah=='B' ? 'selected' : ''}}>B</option>
            <option value="AB" {{$nurse_transfusi_darah->golongan_darah=='AB' ? 'selected' : ''}}>AB</option>
            <option value="O" {{$nurse_transfusi_darah->golongan_darah=='O' ? 'selected' : ''}}>O</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Jenis Darah/Komponen</label>
        <input type="text" name="jenis_darah" value="{{$nurse_transfusi_darah->jenis_darah}}" placeholder="" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Tanggal Kadarluarsa</label>
        <input type="date" name="tanggal_kadarluarsa" value="{{$nurse_transfusi_darah->tanggal_kadarluarsa}}" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Nama Penerima Darah</label>
        <input type="text" name="penerima_darah" value="{{$nurse_transfusi_darah->penerima_darah}}" placeholder="" class="form-control" />
    </div>
    <div class="form-group">
        <label class="control-label">Waktu Transfusi</label>
        <input type="date" name="waktu_transfusi" value="{{$nurse_transfusi_darah->waktu_transfusi}}" class="form-control" />
    </div>
    <div class="form-group">
        <label for="keadaan_umum">Keadaan Umum:</label>
        <input type="text" class="form-control" value="{{$nurse_transfusi_darah->keadaan_umum}}" id="keadaan_umum" name="keadaan_umum">
    </div>
    <div class="form-group">
        <label for="suhu_tubuh">Suhu Tubuh:</label>
        <input type="text" class="form-control" id="suhu_tubuh" name="suhu_tubuh" value="{{$nurse_transfusi_darah->suhu_tubuh}}">
    </div>
    <div class="form-group">
        <label for="nadi">Nadi:</label>
        <input type="text" class="form-control" id="nadi" name="nadi" value="{{$nurse_transfusi_darah->nadi}}">
    </div>
    <div class="form-group">
        <label for="tekanan_darah">Tekanan Darah:</label>
        <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" value="{{$nurse_transfusi_darah->tekanan_darah}}">
    </div>
    <div class="form-group">
        <label for="respiratory_rate">Respiratory Rate:</label>
        <input type="text" class="form-control" id="respiratory_rate" name="respiratory_rate" value="{{$nurse_transfusi_darah->respiratory_rate}}">
    </div>
    <div class="form-group">
        <label for="volume_warna_urin">Volume dan Warna Urin:</label>
        <input type="text" class="form-control" id="volume_warna_urin" name="volume_warna_urin" value="{{$nurse_transfusi_darah->volume_warna_urin}}">
    </div>
    <div class="form-group">
        <label for="gejala_reaksi_transfusi">Gejala Reaksi Transfusi:</label>
        <select class="form-control" id="gejala_reaksi_transfusi" name="gejala_reaksi_transfusi">
            <option value="urtikaria" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='urtikaria' ? 'selected' : ''}}>Urtikaria</option>
            <option value="nyeri dada" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='nyeri dada' ? 'selected' : ''}}>Nyeri Dada</option>
            <option value="demam" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='demam' ? 'selected' : ''}}>Demam</option>
            <option value="nyeri kepala" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='nyeri kepala' ? 'selected' : ''}}>Nyeri Kepala</option>
            <option value="gatal" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='gatal' ? 'selected' : ''}}>Gatal</option>
            <option value="syok" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='syok' ? 'selected' : ''}}>Syok</option>
            <option value="takikardi" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='takikardi' ? 'selected' : ''}}>Takikardi</option>
            <option value="sesak napas" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='sesak napas' ? 'selected' : ''}}>Sesak Napas</option>
            <option value="hematuria" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='hematuria' ? 'selected' : ''}}>Hematuria</option>
            <option value="hemoglobinuria" {{$nurse_transfusi_darah->gejala_reaksi_transfusi=='hemoglobinuria' ? 'selected' : ''}}>Hemoglobinuria</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pilihan_menit">Pilihan Menit:</label>
        <select class="form-control" id="pilihan_menit" name="pilihan_menit">
            <option value="sebelum" {{$nurse_transfusi_darah->pilihan_menit=='sebelum' ? 'selected' : ''}}>Sebelum Transfusi</option>
            <option value="15 menit" {{$nurse_transfusi_darah->pilihan_menit=='15 menit' ? 'selected' : ''}}>15-30 Menit Transfusi</option>
            <option value="2 jam" {{$nurse_transfusi_darah->pilihan_menit=='2 jam' ? 'selected' : ''}}>2 Jam Transfusi</option>
            <option value="pasca" {{$nurse_transfusi_darah->pilihan_menit=='pasca' ? 'selected' : ''}}>Pasca Transfusi</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" onclick="simpanMonitoringDarah()">Submit</button>

</form>