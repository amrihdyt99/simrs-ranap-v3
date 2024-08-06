@extends('dokter.layouts.app')
@section('title', 'Form Resume Pasien')
@section('content')
    <style>
        .judul {
            text-align: center;
            position: relative;
            font-size: 150%;
        }
    </style>
    <div class="container">
        <div class="card">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th rowspan="4" class="judul">Resume Pasien</th>
                    </tr>
                    <tr>
                        <th>
                            No Med Reg : <br>
                            Nama Lengkap : <br>
                            Tanggal Lahir : <br>
                            Jenis Kelamin : <br>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Ruang rawat : <br>
                            Kelas : <br>
                            Tanggal Masuk Inap : <br>
                            Tanggal keluar rumah sakit : <br>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Terapi yang sudah diberikan</th>
                        <th scope="col">Terapi yang sudah dilakukan</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama tindakan/operasi </th>
                        <th scope="col">Tanggal tindakan Operasi</th>
                        <th scope="col">KODE ICD 9 CM</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <tr>
                    <th rowspan="2">Penyebab Luar / cedera / Kecelakan ( bila tidak meninggal kosongkan )</th>
                    <td></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th rowspan="2">ALASAN PULANG</th>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Sembuh </td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Dapat berobat jalan</td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Pulang atas permintaan
                        sendiri</td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Meninggal</td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th rowspan="2">kondisi Pasien Pulang</th>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Mandiri </td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Cacat</td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Tidak Mandiri</td>
                    <td><input class="form-check-input" type="checkbox" id="disabledFieldsetCheck"> Lain-lain nya</td>
                </tr>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aturan Pakai</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td colspan="2"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
