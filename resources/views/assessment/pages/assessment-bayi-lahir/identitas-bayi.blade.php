@extends('assessment.layouts.app')

@section('content')
    <div class="callout callout-info">
        <h5 class="text-sm text-bold">IDENTITAS BAYI</h5>
    </div>

    <div class="card card-default">
        <form action="" id="form-identitas-bayi">
            <div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Nama Bayi</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Tanggal Lahir</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Nama Ibu</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Dokter Penolong</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Masukkan dokter penolong">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Tanggal Lahir </label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">BB</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Jenis Kelamin</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Nilai Apgar</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Anus</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">No. RM</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Ruangan</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Nama Ayah</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Dokter Anak</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan dokter anak">
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Jam Lahir</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">PB</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Lingkar Kepala</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="text-sm">Warna Kulit</label>
                                <input type="text" class="form-control form-control-sm"
                                       disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Bidan Kamar Bersalin</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan bidan kamar bersalin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm">Perawat Ruang Bayi</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan perawat ruang bayi">
                            </div>
                        </div>
                    </div>
                    <span>
                        Waktu pulang <br>
                        Menyatakan bahwa pada saat pulang telah menerima bayi saya, memeriksa dan menyatkan bahwa bayi tersebut adalah betul-betul anak saya. <br>
                    </span>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="text-sm">Perawat/Saksi</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan perawat/saksi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="text-sm">Ibu</label>
                                <input type="text" class="form-control form-control-sm"
                                       placeholder="Masukkan ibu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" onclick="document.getElementById('form-bayi-lahir').submit()" class="btn btn-primary float-right m-4">Next</a>
        </form>
    </div>
@endsection
