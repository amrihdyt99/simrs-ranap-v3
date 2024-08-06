@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Invoicing And Confirmation</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-sm treatment" id="invoicing-table">
            <thead>
                <tr>
                    <th class="text-sm">Registration No</th>
                    <th class="text-sm">Patient Name</th>
                    <th class="text-sm">Service Unit</th>
                    <th class="text-sm">Payer</th>
                    <th class="text-sm">Payer Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>QREG/RI/202100000000</td>
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
            $("#invoicing-table").DataTable()
        })
    </script>
@endpush