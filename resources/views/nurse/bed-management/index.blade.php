@extends('nurse/layout/master')
@section('title', 'Bed Management')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Patient information</h4>
                    {{-- @foreach ($myArea as $item)
                        <p>Registration No {{ $item->reg_no }}</p>
                    @endforeach --}}
                    <p>Registration No {{ $myArea->reg_no }}</p>

                    <h1 style="color: black ">{{ $pasien->PatientName }}</h1>
                    <p>Preferred Name</p>
                </div>
                <div class="col-lg-4">
                    <p>Born <span>{{ $pasien->DateOfBirth }}</span> Gender Male
                        MRN 00-04-22-93
                        location RAWAT INAP LT 5 Cover class KELAS 3 Charger Class KELAS 3
                        <span> Payer Jasa Rahaja - QCDN/201913131093(plafon)</span><br>
                        Patient Origin From Emergency
                    </p>
                </div>
                <div class="col-lg-4">
                    <p>Registration Date 16-jun-2022<br>
                        Length of stay 14 days 10 hours 50 minutes<br>
                        Physician Dr. Rahmadhan Ananditia<br>
                        Descharge date -
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive mt-1">
                <table id="order-listing" class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th rowspan="2"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z">
                                    </svg></button>
                            </th>
                            <th rowspan="2">Order By</th>
                            <th colspan="3" style="text-align: center">Qty</th>
                            <th colspan="3" style="text-align: center">Personal</th>
                            <th colspan="3" style="text-align: center">Corporate</th>

                        </tr>
                        <tr>
                            <th>Chargers</th>
                            <th>Dispenses</th>
                            <th>Unit</th>
                            <th>Amount</th>
                            <th>Additional</th>
                            <th>Tax</th>
                            <th>Amount</th>
                            <th>Additional</th>
                            <th>Tax</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Bed Transaction</h5>
                            <button type="button" class=" btn btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Transfer Information</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Transfer No</td>
                                                    <th colspan="3">QBT/202206300000003</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Transfer Date</td>
                                                    <th colspan="2">30-June-2022 11:42:12</th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Site</td>
                                                    <th colspan="3">RSUD SITI FATIMAH PROVINSI SUMSEL</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Transfer Date</td>
                                                    <th colspan="2">30-June-2022 11:42:12</th>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <h4 class="card-title">Form</h4>
                                            <label for="" class="form-label">Service Unit(Ward)</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Room</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Bed No</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Specialty</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Class</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Charger</label>
                                            <input type="text" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <h4 class="card-title">To</h4>
                                            <label for="" class="form-label">Service Unit(Ward)</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Room</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Bed No</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Specialty</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Class</label>
                                            <input type="text" class="form-control">
                                            <label for="" class="form-label">Charger</label>
                                            <input type="text" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Ok</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
