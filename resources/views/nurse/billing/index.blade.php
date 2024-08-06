@extends('nurse/layout/master')
@section('title', 'Billing')
@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-lg-4">
                    <label for="">Transaction No</label>
                    <input type="text">
                </div>
                <div class="col-lg-4">
                    <label for="">Date</label>
                    <input type="text">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-4">
                    <label for="">Personal Amount</label>
                    <input type="text">
                </div>
                <div class="col-lg-4">
                    <label for="">Corporate Amount</label>
                    <input type="text">
                </div>
                <div class="col-lg-4">
                    <label for="">Location</label>
                    <input type="text">
                </div>
            </div>

            <h4 class="card-title"><a href="" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add BOM
                    TEMPLATE</a></h4>
            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">All</button>
                <button class="tablinks" onclick="openCity(event, 'Service')">Service</button>
                <button class="tablinks" onclick="openCity(event, 'Medication')">Medication</button>
                <button class="tablinks" onclick="openCity(event, 'Medical_Supplies')">Medical Supplies</button>
                <button class="tablinks" onclick="openCity(event, 'Laboratory')">Laboratory</button>
                <button class="tablinks" onclick="openCity(event, 'Imaging')">Imaging</button>
                <button class="tablinks" onclick="openCity(event, 'Asset & Maintenance')">Asset & Maintenance</button>
                <button class="tablinks" onclick="openCity(event, 'Other Supplies')">Other Supplies</button>
                <button class="tablinks" onclick="openCity(event, 'Other Exam')">Other Exam</button>
            </div>

            <!-- Tab content -->
            <div id="All" class="tabcontent">
                <div class="table-responsive mt-1">
                    <table id="order-listing" class="table table-striped">
                        <thead class="table-dark">
                          {{--  <tr>
                                <th rowspan="2"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
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
                            </tr>--}}
                          <th>AKSI</th>
                          <th>JENIS TINDAKAN/ITEM</th>
                          <th>KODE TINDAKAN</th>
                          <th>NAMA TINDAKAN</th>
                          <th>HARGA</th>
                          <th>TANGGAL ORDER</th>
                          <th>USER ORDER</th>
                          <th>CLASS COVER</th>
                        </thead>
                        <tbody>
                        @php
                            $totaltagihan=0;
                        @endphp
                        @foreach($tagihan as $row)
                            @php
                                $totaltagihan=$totaltagihan+$row->price;
                            @endphp
                            <tr>
                                <td>
                                    <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                                <td>{{$row->kategori}}</td>
                                <td>{{$row->kode_tindakan}}</td>
                                <td>{{$row->order_name}}</td>
                                <td>Rp. {{$row->price}}</td>
                                <td>{{$row->tanggal_order}}</td>
                                <td>{{$row->ParamedicName}}</td>
                                <td>Personal</td>

                            </tr>
                        @endforeach
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


            </div>

            <div id="Service" class="tabcontent">
                <h3>Service</h3>
                <p>Paris is the capital of France.</p>
            </div>

            <div id="Medication" class="tabcontent">
                <h3>Medication</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div id="Medical_Supplies" class="tabcontent">
                <div class="table-responsive mt-1">
                    <table id="order-listing" class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">Transaction No</th>
                                <th rowspan="2">Item</th>
                                <th rowspan="2">Professional</th>
                                <th rowspan="2">Qty</th>
                                <th rowspan="2">Item Unit</th>
                                <th rowspan="2">location</th>
                                <th colspan="3" style="text-align: center">Qty</th>
                                <th colspan="3" style="text-align: center">Personal</th>
                                <th colspan="3" style="text-align: center">Corporate</th>

                            </tr>
                           {{-- <tr>
                                <th>Chargers</th>
                                <th>Dispenses</th>
                                <th>Unit</th>
                                <th>Amount</th>
                                <th>Additional</th>
                                <th>Tax</th>
                                <th>Amount</th>
                                <th>Additional</th>
                                <th>Tax</th>
                            </tr>--}}
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
            </div>

            <div class="text-center">

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Transaction Detail</h5>
                            <button type="button" class=" btn btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Item</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        variable
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        City
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Physician</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Physician</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Complation
                                    </label>
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Dispense City</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Dispense</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Charger City</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Dispense</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="">Remarks</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'Detail')"
                                    id="defaultOpen">Detail</button>
                                <button class="tablinks" onclick="openCity(event, 'Other')">Other</button>
                            </div>
                            <div id="Detail" class="tabcontent">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-striped">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th rowspan="2">Item
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
                                </div>
                            </div>
                            <div id="Other" class="tabcontent">
                                <h3>Service</h3>
                                <p>Paris is the capital of France.</p>
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
