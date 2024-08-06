@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Payment Cashier</h3>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Record List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="recordListTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Payment No</th>
                                <th>Date</th>
                                <th>Corporate</th>
                                <th>Payment Amount</th>
                                <th>Payment No Behalf</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2022-03-13</td>
                                <td>Y</td>
                                <td>Rp 1.000.000</td>
                                <td>-</td>
                                <td>Kasir 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Audit List</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="auditListTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>User</th>
                                <th>Host</th>
                                <th>Time</th>
                                <th>Log</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A</td>
                                <td>Regar</td>
                                <td>Rudi</td>
                                <td>20:00</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(function(){
            $("#auditListTable").DataTable()
            $("#recordListTable").DataTable()
        })
    </script>
@endpush