@extends('register.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Pendaftaran</h1>
                    </div>
                </div>
            </div>


        </div>

        <div class="content">
            <div class="container-fluid">
                <form action="">
                    @include('assessment.components.header.pasien-resume',['title'=>"Pengkajian Awal Pasien Anak"])

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Alergi
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Alergi</label>
                                                <input id="" type="text" class="form-control" placeholder="Alergi" name="alergi">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Diberitahukan</label>
                                                <select name="diberitahukan" id="" class="form-control">
                                                    <option value="Dokter">Dokter</option>
                                                    <option value="Farmasi">Farmasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="bentuk_reaksi">Bentuk Reaksi</label>
                                                <textarea id="bentuk_reaksi" rows="4" name="bentuk_reaksi" placeholder="Bentuk Reaksi" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Keadaan Umum
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Kesadaran</label>
                                                <select class="form-control" name="kesadaran">
                                                    <option value="Compos Mentis">Compos Mentis</option>
                                                    <option value="Delirium">Delirium</option>
                                                    <option value="Somnolen">Somnolen</option>
                                                    <option value="Sopor">Sopor</option>
                                                    <option value="Koma">Koma</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="kondisi_umum">Kondisi Umum</label>
                                                <select id="kondisi_umum" name="kondisi_umum" id="kondisi_umum" class="form-control">
                                                    <option value="Baik">Baik</option>
                                                    <option value="Tampak Sakit">Tampak Sakit</option>
                                                    <option value="Sesak">Sesak</option>
                                                    <option value="Pucat">Pucat</option>
                                                    <option value="Lemah">Lemah</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="tekanan_darah">Tekanan Darah</label>
                                            <input id="tekanan_darah" name="tekanan_darah" placeholder="mmHg" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="nadi">Nadi</label>
                                            <input id="nadi" name="nadi" placeholder="x/menit" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="suhu">Suhu</label>
                                            <input id="suhu" name="suhu" placeholder="Celcius" type="text" class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="pernafasan">Pernafasan</label>
                                            <input id="pernafasan" name="pernafasan" placeholder="x/menit" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="tinggi_badan">Tinggi Badan</label>
                                            <input id="tinggi_badan" name="tinggi_badan" placeholder="x/menit" type="number" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="berat_badan">Tinggi Badan</label>
                                            <input id="berat_badan" name="berat_badan" placeholder="x/menit" type="number" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="kebutuhan_khusus">Kebutuhan Khusus</label>
                                                <input id="kebutuhan_khusus" type="text" class="form-control" placeholder="Kebutuhan Khusus" name="kebutuhan_khusus">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                        <div class="card">
                            <div class="card-header">
                                Anamnesis
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="keluhan_utama">Keluhan Utama</label>
                                            <textarea id="keluhan_utama" rows="4" name="keluhan_utama" placeholder="Keluhan Utama" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="riwayat_penyakit_dahulu">Riwayat Penyakit Dahulu</label>
                                            <textarea id="riwayat_penyakit_dahulu" rows="4" name="riwayat_penyakit_dahulu" placeholder="Riwayat Penyakit Dahulu" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="riwayat_penyakit_dalam_keluarga">Riwayat Penyakit Dalam Keluarga</label>
                                            <textarea id="riwayat_penyakit_dalam_keluarga" rows="4" name="riwayat_penyakit_dalam_keluarga" placeholder="Riwayat Penyakit Dalam Keluarga" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="riwayat_penyakit_sekarang">Riwayat Penyakit Sekarang</label>
                                            <textarea id="riwayat_penyakit_sekarang" rows="4" name="riwayat_penyakit_sekarang" placeholder="Riwayat Penyakit Sekarang" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="riwayat_pengobatan">Riwayat Pengobatan</label>
                                            <textarea id="riwayat_pengobatan" rows="4" name="riwayat_pengobatan" placeholder="Riwayat Pengobatan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('assessment.anak.form2') }}">
                                    <button type="button" class="btn btn-primary float-right">Next</button>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
