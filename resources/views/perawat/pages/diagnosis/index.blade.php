@extends('perawat.layouts.app')
@section('content')
    <section class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @include('dokter.components.head-patient-diagnosis')

            <div class="card m-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <p>Doctor's Name <br>
                                Date Time
                            </p>
                        </div>
                        <div class="col">
                            <a href="" class="btn btn-outline-success float-right">Click Here to Sign</a>
                            {{--                            <a href="{{route('diagnosis.create')}}" class="btn btn-outline-danger float-right mr-2">Add SOAP<i class="fa fa-plus ml-2"></i></a>--}}
                            <button type="button" class="btn btn-outline-danger float-right mr-2" data-toggle="modal"
                                    data-target="#add-soap">
                                Add SOAP
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-bold">SOAP</h5>
                    <p class="card-text">SUBJECTIVE :</p>
                    <p class="card-text">OBJECTIVE :</p>
                    <p class="card-text">ASSESSMENT :</p>
                    <p class="card-text">PLANNING :</p>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="add-soap" tabindex="-1" aria-labelledby="addSoapLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSoapLabel">SOAP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Subjective</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Objective</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Assessment</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Planning</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>



@endsection
