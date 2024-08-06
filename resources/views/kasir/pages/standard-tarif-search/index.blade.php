@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Standard Tarif Search</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-sm treatment" id="standard-tarif-table">
            <thead>
                <tr>
                    <th class="text-sm">Item Name</th>
                    <th class="text-sm">Member</th>
                    <th class="text-sm">Class Category</th>
                    <th class="text-sm">Standard Price</th>
                    <th class="text-sm">Discount Price</th>
                    <th class="text-sm">Personal Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ABC</td>
                    <td>1</td>
                    <td>Special</td>
                    <td>Normal</td>
                    <td>-</td>
                    <td>Rp 200.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('addon-script')
    <script>
        $(function(){
            $("#standard-tarif-table").DataTable()
        })
    </script>
@endpush