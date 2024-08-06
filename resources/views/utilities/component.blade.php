@extends('dokter.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-outline-primary">My Patient</button>
                            <button class="btn btn-outline-danger">My Area</button>
                            <button class="btn btn-outline-info">Referral</button>
                        </div>
                        <div class="mt-2 ml-3">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                       aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                Rawat Inap Lt. 7
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul style="list-style-type: none;padding: 0">
                                                <li>
                                                    <div class="info-box">
                                                <span class="info-box-icon bg-info"><i
                                                        class="far fa-user"></i></span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Patient's Name</span>
                                                            <span class="info-box-text">MRN</span>
                                                            <span class="info-box-text">Doctor's Name</span>
                                                            <span class="info-box-text">Location</span>
                                                            <span class="info-box-text">Status Pembiayaan</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="info-box">
                                                <span class="info-box-icon bg-info"><i
                                                        class="far fa-user"></i></span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">Patient's Name</span>
                                                            <span class="info-box-text">MRN</span>
                                                            <span class="info-box-text">Doctor's Name</span>
                                                            <span class="info-box-text">Location</span>
                                                            <span class="info-box-text">Status Pembiayaan</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>

                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Featured</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>

                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
