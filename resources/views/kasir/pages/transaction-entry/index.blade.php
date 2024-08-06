@extends('kasir.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Transaction Entry</h3>
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
                                <th>Transaction No</th>
                                <th>Registration Date Time</th>
                                <th>Registration No</th>
                                <th>Patient Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2022-03-13</td>
                                <td>0001</td>
                                <td>Regar</td>
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
        {{-- <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-angle-down"></i> Record List
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-hover mb-3" id="recordListTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Transaction No</th>
                                        <th>Registration Date Time</th>
                                        <th>Registration No</th>
                                        <th>Patient Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2022-03-13</td>
                                        <td>0001</td>
                                        <td>Regar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-angle-down"></i> Audit List
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
        </div> --}}
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