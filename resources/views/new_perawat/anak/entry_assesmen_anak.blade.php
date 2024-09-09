@empty($assesment_awal_anak)
@php
$assesment_awal_anak = optional((object)[]);
@endphp
@endempty
<div class="text-black" style="font-size: 14px">
    <form id="entry-asessmen-anak">
        <input type="hidden" name="reg_no" value="{{$reg}}">
        <fieldset id="lin" class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Hospitalisasi</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="hospitalisasi" name="hospitalisasi">
                        <option value="riwayat sakit berat" {{$assesment_awal_anak->hospitalisasi=='riwayat sakit berat' ? 'selected' : ''}}>Riwayat sakit berat</option>
                        <option value="kejang" {{$assesment_awal_anak->hospitalisasi=='kejang' ? 'selected' : ''}}>Kejang</option>
                        <option value="trauma" {{$assesment_awal_anak->hospitalisasi=='trauma' ? 'selected' : ''}}>Trauma</option>
                        <option value="kelainan lain" {{$assesment_awal_anak->hospitalisasi=='kelainan lain' ? 'selected' : ''}}>Kelainan Lain</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1"></legend>
                <div class="col-sm-10">
                    <select class="form-control" id="jumlah_hospitalisasi" name="jumlah_hospitalisasi">
                        <option value="1" {{$assesment_awal_anak->jumlah_hospitalisasi=='1' ? 'selected' : ''}}>1 Kali</option>
                        <option value="2" {{$assesment_awal_anak->jumlah_hospitalisasi=='2' ? 'selected' : ''}}>2 Kali</option>
                        <option value="3" {{$assesment_awal_anak->jumlah_hospitalisasi=='3' ? 'selected' : ''}}>3 Kali</option>
                        <option value=">3" {{$assesment_awal_anak->jumlah_hospitalisasi=='>3' ? 'selected' : ''}}>Lebih dari 3 Kali</option>
                    </select>
                </div>
            </div>
            <div class="header">
                <h4>Lingkungan Keluarga</h4>
            </div>
            <div class="row">

                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pola asuh</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="pola_asuh" name="pola_asuh">
                        <option value="demokratis" {{$assesment_awal_anak->pola_asuh=='demokratis' ? 'selected' : ''}}>Demokratis</option>
                        <option value="otoriter" {{$assesment_awal_anak->pola_asuh=='otoriter' ? 'selected' : ''}}>Otoriter</option>
                        <option value="campuran" {{$assesment_awal_anak->pola_asuh=='campuran' ? 'selected' : ''}}>Campuran</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Orang terdekat dengan anak</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="orang_terdekat" name="orang_terdekat">
                        <option value="kedua orang tua" {{$assesment_awal_anak->orang_terdekat=='kedua orang tua' ? 'selected' : ''}}>Kedua orang tua</option>
                        <option value="ayah" {{$assesment_awal_anak->orang_terdekat=='ayah' ? 'selected' : ''}}>Ayah</option>
                        <option value="ibu" {{$assesment_awal_anak->orang_terdekat=='ibu' ? 'selected' : ''}}>Ibu</option>
                        <option value="kakek/nenek" {{$assesment_awal_anak->orang_terdekat=='kakek/nenek' ? 'selected' : ''}}>Kakek/Nenek</option>
                        <option value="saudara" {{$assesment_awal_anak->orang_terdekat=='saudara' ? 'selected' : ''}}>Saudara</option>
                        <option value="lainnya" {{$assesment_awal_anak->orang_terdekat=='lainnya' ? 'selected' : ''}}>Lainnya</option>

                    </select>
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tipe Anak</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="tipe_anak" name="tipe_anak">
                        <option value="periang" {{$assesment_awal_anak->tipe_anak=='periang' ? 'selected' : ''}}>Periang</option>
                        <option value="minta perhatian lebih" {{$assesment_awal_anak->tipe_anak=='minta perhatian lebih' ? 'selected' : ''}}>Minta perhatian lebih</option>
                        <option value="pemalu" {{$assesment_awal_anak->tipe_anak=='pemalu' ? 'selected' : ''}}>Pemalu</option>
                        <option value="pemberani" {{$assesment_awal_anak->tipe_anak=='pemberani' ? 'selected' : ''}}>Pemberani</option>
                        <option value="lainnya" {{$assesment_awal_anak->tipe_anak=='lainnya' ? 'selected' : ''}}>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kebiasaan perilaku unik</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="kebiasaan_perilaku_unik" name="kebiasaan_perilaku_unik">
                        <option value="tidak ada" {{$assesment_awal_anak->kebiasaan_perilaku_unik=='tidak ada' ? 'selected' : ''}}>Tidak ada</option>
                        <option value="ada" {{$assesment_awal_anak->kebiasaan_perilaku_unik=='ada' ? 'selected' : ''}}>Ada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pekerjaan Ayah</legend>
                <div class="col-sm-10">
                    <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" value="{{$assesment_awal_anak->pekerjaan_ayah}}" />
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Pekerjaan Ibu</legend>
                <div class="col-sm-10">
                    <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" value="{{$assesment_awal_anak->pekerjaan_ibu}}" />
                </div>
            </div>

        </fieldset>

        <fieldset class="form-group m-3">
            <div class="row">
                <div class="header">
                    <h4>SKRINNING NYERI</h4>
                </div>

            </div>
            <div class="row">
                <legend class="col-form-label ptx-0 pt-1">Pilihlah salah satu penilaian sesuai umur pasien</legend>

            </div>
            <div class="row">
                <div class="header">
                    <h5>Skala Wong Baker (anak>3 tahun)</h5>
                </div>

            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">O (Onset) Kapan terjadi,berapa lama, dan berapa sering</legend>
                <div class="col-sm-10">
                    <input type="text" id="onset" name="onset" class="form-control" value="{{$assesment_awal_anak->onset}}" />
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">P (Provocating/Palliating) Pencetus Nyeri</legend>
                <div class="col-sm-10">
                    <input type="text" id="provocating" name="provocating" class="form-control" value="{{$assesment_awal_anak->provocating}}" />
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Q (Quality) Tipe nyeri</legend>
                <div class="col-sm-10">
                    <select class="form-control" id="quality" name="quality">
                        <option value="Tekanan" {{$assesment_awal_anak->quality=='Tekanan' ? 'selected' : ''}}>Tekanana</option>
                        <option value="Tajam tusukan" {{$assesment_awal_anak->quality=='Tajam tusukan' ? 'selected' : ''}}>Tajam Tusukan</option>
                        <option value="Mencengkram" {{$assesment_awal_anak->quality=='Mencengkram' ? 'selected' : ''}}>Mencengkram</option>
                        <option value="Melilit" {{$assesment_awal_anak->quality=='Melilit' ? 'selected' : ''}}>Melilit</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">R (Region) Menjalar</legend>
                <div class="col-sm-10">
                    <input type="text" id="region" name="region" class="form-control" value="{{$assesment_awal_anak->region}}" />
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">S (Saverity)</legend>
                <div class="col-sm-10">
                    <input type="text" id="saverity" name="saverity" class="form-control" value="{{$assesment_awal_anak->saverity}}" />
                </div>
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">T (Treatment)</legend>
                <div class="col-sm-10">
                    <input type="text" id="treatment" name="treatment" class="form-control" value="{{$assesment_awal_anak->treatment}}" />
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">U (Understanding)</legend>
                <div class="col-sm-10">
                    <input type="text" id="understanding" name="understanding" class="form-control" value="{{$assesment_awal_anak->understanding}}" />
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">V (Value)</legend>
                <div class="col-sm-10">
                    <input type="text" id="value" name="value" class="form-control" value="{{$assesment_awal_anak->value}}" />
                </div>
            </div>


            <div class="row">
                <div class="header">
                    <h4>Skala FLACC</h4>
                </div>

            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ekspresi wajah:</legend>
                <div class="col-sm-10">
                    <select name="face" id="face" class="form-control">
                        <option value="0" {{$assesment_awal_anak->face=='0' ? 'selected' : ''}}>Tidak ada ekspresi</option>
                        <option value="1" {{$assesment_awal_anak->face=='1' ? 'selected' : ''}}>Meringis atau tegang</option>
                        <option value="2" {{$assesment_awal_anak->face=='2' ? 'selected' : ''}}>Sering/Terus menerus mengerutkan dahi</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ekstremitas</legend>
                <div class="col-sm-10">
                    <select name="legs" class="form-control">
                        <option value="0" {{$assesment_awal_anak->legs=='0' ? 'selected' : ''}}>Normal</option>
                        <option value="1" {{$assesment_awal_anak->legs=='1' ? 'selected' : ''}}>Gelisah atau tidak tenang</option>
                        <option value="2" {{$assesment_awal_anak->legs=='2' ? 'selected' : ''}}>Menendang atau menarik diri</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Gerakan</legend>
                <div class="col-sm-10">
                    <select name="activity" class="form-control">
                        <option value="0" {{$assesment_awal_anak->activity=='0' ? 'selected' : ''}}>Normal atau tenang</option>
                        <option value="1" {{$assesment_awal_anak->activity=='1' ? 'selected' : ''}}>Mengerang atau menghindar</option>
                        <option value="2" {{$assesment_awal_anak->activity=='2' ? 'selected' : ''}}>Tegang atau menggeliat</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tangisan:</legend>
                <div class="col-sm-10">
                    <select name="cry" class="form-control">
                        <option value="0" {{$assesment_awal_anak->cry=='0' ? 'selected' : ''}}>Tidak menangis</option>
                        <option value="1" {{$assesment_awal_anak->cry=='1' ? 'selected' : ''}}>Menangis sesekali</option>
                        <option value="2" {{$assesment_awal_anak->cry=='2' ? 'selected' : ''}}>Menangis terus-menerus</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kemampuan untuk dikonsolkan:</legend>
                <div class="col-sm-10">
                    <select name="consolability" class="form-control">
                        <option value="0" {{$assesment_awal_anak->consolability=='0' ? 'selected' : ''}}>Mudah dikonsolkan</option>
                        <option value="1" {{$assesment_awal_anak->consolability=='1' ? 'selected' : ''}}>Sulit dikonsolkan</option>
                        <option value="2" {{$assesment_awal_anak->consolability=='2' ? 'selected' : ''}}>Tidak bisa dikonsolkan</option>
                    </select>
                </div>
            </div>



        </fieldset>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-primary" type="button" onclick="simpanAssementAnak()">Simpan</button>
        </div>
    </div>
</div>
@push('myscripts')
<script>
    // function simpanAssesmenAnak(){
    //     // var data = $('#formAssesmenAnak').serialize();
    //     alert('Data berhasil disimpan');
    //     {{--$.ajax({--}}
    //     {{--    url: '{{url('assesmen-anak')}}',--}}
    //     {{--    method: 'POST',--}}
    //     {{--    data: data,--}}
    //     {{--    success: function (response) {--}}
    //     {{--        console.log(response);--}}
    //     {{--        if(response.status == 'success'){--}}
    //     {{--            alert('Data berhasil disimpan');--}}
    //     {{--            window.location.href = '{{url('assesmen-anak')}}';--}}
    //     {{--        }else{--}}
    //     {{--            alert('Data gagal disimpan');--}}
    //     {{--        }--}}
    //     {{--    },--}}
    //     {{--    error: function (response) {--}}
    //     {{--        console.log(response);--}}
    //     {{--        alert('Data gagal disimpan');--}}
    //     {{--    }--}}
    //     {{--});--}}
    // }
</script>
@endpush