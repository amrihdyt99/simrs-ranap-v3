@extends('kasir/layout/master')
@section('title', 'Laporan Transaksi')

<style>
    .table1 td, .table1 th {
        padding: 5px;
        border: 0.5px solid black;
    }
    .table-header td img {
        width: 80px !important;
    }
    .table-header td span:first-child {
        font-size: 24px;
        font-weight: 500;
    }
    .fsmall {
        font-size: 14px !important
    }
</style>

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Report</a></li>
        <li class="breadcrumb-item active" aria-current="page">Report Transaksi</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="text-header-panel"><b>Data Report Transaksi</b></div>
                    <hr>
                    <form class="row">
                        <div class="form-group col-lg-3">
                            <label>Dari</label>
                            <input type="datetime-local" id="start" class="form-control">
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Sampai</label>
                            <input type="datetime-local" id="end" class="form-control">
                        </div>
                        <div class="col-lg-2">
                            <button type="button" id="findData" class="btn btn-primary mt-4"><i class="fas fa-search"></i> Cari</button>
                            <a target="_blank" class="btn btn-warning mt-4 btn_print_report_kasir"><i class="fas fa-print"></i> Cetak</a>
                        </div>
                    </form>
                    <hr>
                    <div class="table-responsive mt-4" id="panel-report-kasir">
                        <div id="report-title"></div>
                        <button id="exportBtn">Export to CSV</button>
                        <table class="table1 nowrap mt-3 mb-3 fsmall" style="width:100%">
                            <thead>
                                <tr class="bg-warning">
                                    <td>Petugas Kasir
                                    </td><th colspan="12" style="text-align: left">{{auth()->user()->name}}</th>
                                </tr>
                                <tr class="text-uppercase">
                                    <th style="text-align: left" rowspan="2">Tanggal</th>
                                    <th style="text-align: left" rowspan="2">No Registrasi</th>
                                    <th style="text-align: left" rowspan="2">No Transaksi</th>
                                    <th style="text-align: left" rowspan="2">Nama Pasien</th>
                                    <th style="text-align: left" rowspan="2">Poliklinik</th>
                                    <th style="text-align: left" rowspan="2">Total Tagihan</th>
                                    <th class="text-center" colspan="7">Pembayaran</th>
                                </tr>
                                <tr class="text-uppercase text-center">
                                    @foreach (paymentMethod() as $item)
                                        <th id="thMethod">{{$item}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody id="table-report-kasir">
                                <tr class="text-center">
                                    <td colspan="12">Tidak ada data yang ditampilkan</td>
                                </tr>
                            </tbody>
                            <tfoot id="table-report-kasir-footer">
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var baseUrl = '{{url("")}}'
    </script>
    <script src="{{asset('')}}cnvas/js/kasir.js"></script>
@endsection