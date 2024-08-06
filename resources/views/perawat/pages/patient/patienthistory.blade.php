@extends('perawat.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Patient</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">History Patient</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- /.col -->
                <div class="col-md-8">
                        <div class="info-box">

                            <span class="info-box-icon bg-danger col-sm-2"><i class="far fa-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Patient Name</span>
                                <span class="info-box-number">Registration No./Departmen</span>
                                <span class="info-box-number">Form Emergency-Registration No</span>

                                <table border="1">
                                    <tr>
                                        <td>LOS</td>
                                        <td>Med</td>
                                        <td>Lab</td>
                                        <td>Img</td>
                                        <td>Exam</td>
                                        <td>Mon</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp; </td>
                                        <td>&nbsp; </td>
                                        <td>&nbsp; </td>
                                        <td>&nbsp; </td>
                                        <td>&nbsp; </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.info-box-content -->
                            <a href="{{route('patientsummary')}}"><button type="button" class="btn btn-primary">Patient Summary</button></a>
                        </div>


                    </a>
                </div>
                <!-- /.col -->

                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Diagnose</label>
                                <textarea name="diagnose" id="diagnose" class="form-control"></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- /.card -->
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CPOE-Medication</h3>
                    </div>
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td>R/</td>
                                    <td>Belcov (CITICONLINE) 250MG INJEKSI NO 2.00</td>
                                    <td>Date Time</td>
                                </tr>
                                <tr>
                                    <td>R/</td>
                                    <td>Belcov (CITICONLINE) 250MG INJEKSI NO 2.00</td>
                                    <td>Date Time</td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- /.card -->

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CPOE-Laboratory</h3>
                    </div>
                    <div class="card-body">
                        <table border="1" width="100%">
                            <thead>
                                <th>Item Name</th>
                                <th>Result Value</th>
                                <th>Unit</th>
                                <th>Time Process</th>
                                <th>Time Process</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Parent</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>APTT</td>
                                    <td></td>
                                    <td></td>
                                    <td>On Progress</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>D-Timer</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>On Progress</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
