@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recalculation Transaction ( Class Charge )</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-sm treatment" id="recalculation-transaction-class-table">
            <thead>
                <tr>
                    <th class="text-sm">Recalculation No</th>
                    <th class="text-sm">Registration No</th>
                    <th class="text-sm">Patient Name</th>
                    <th class="text-sm">Service Unit</th>
                    <th class="text-sm">Room</th>
                    <th class="text-sm">Bad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>QREG/RI/202100000000</td>
                    <td>Regar</td>
                    <td>R002</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(function(){
            $("#recalculation-transaction-class-table").DataTable()
        })
    </script>
@endpush