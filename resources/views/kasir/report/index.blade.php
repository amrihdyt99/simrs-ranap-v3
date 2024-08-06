@extends('layout/master')
@section('title', 'Report Transaksi')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Data report transaksi</h5>
            <hr>
            <div class="row">
                <div class="col-2">
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-2">
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Cetak</a>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped center table-bordered" style="width:100%">
                    <thead class="text-center">
                        <tr class="table-warning">
                            <th>Petugas Kasir</th>
                            <th colspan="11">Era Venezuela</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">No Registrasi</th>
                            <th rowspan="2">No Transaksi</th>
                            <th rowspan="2">Nama Pasien</th>
                            <th rowspan="2">Total Tagihan</th>
                            <th colspan="5" style="text-align: center">Pembayaran</th>
                        </tr>
                        <tr>
                            <th>CASH</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                            <th>TRANSFER</th>
                            <th>DISKON</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
