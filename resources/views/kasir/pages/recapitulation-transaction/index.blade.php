@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recapitulation Transaction</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-sm treatment" id="recapitulation-transaction-table">
            <thead>
                <tr>
                    <th class="text-sm">Registration No</th>
                    <th class="text-sm">MRN</th>
                    <th class="text-sm">Registration Date Time</th>
                    <th class="text-sm">Patient Name</th>
                    <th class="text-sm">Service Unit</th>
                    <th class="text-sm">Physician</th>
                    <th class="text-sm">Room Name</th>
                    <th class="text-sm">Player</th>
                    <th class="text-sm">Reviewed By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>QREG/RI/202100000000</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>QREG/RI/202100000000</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(function(){
            $("#recapitulation-transaction-table").DataTable()
        })
    </script>
@endpush