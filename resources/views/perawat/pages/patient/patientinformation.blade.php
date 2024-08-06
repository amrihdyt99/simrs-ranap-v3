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
                            <li class="breadcrumb-item active">Patient Information</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
            @include('perawat.components.headpatientsummary')

            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Patient Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Medical No</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Patient Name</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Race</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Ocupation</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Marital</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Education</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>xxxxxxxxxx</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.card -->


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Allergies,Infectious,Problem</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>

                                <td>Problem (1)</td>
                            </tr>
                            <tr>

                                <td>Facture</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Payer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Payer</td>
                                <td>xxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>Document No</td>
                                <td>xxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>Coverage Type</td>
                                <td>xxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>Covered Class</td>
                                <td>xxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>Covered Class</td>
                                <td>xxxxxxxxxx</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Family Information</label>
                                <textarea name="familyinformation" id="familyinformation" class="form-control"></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>

                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Data Referal</label>
                                <textarea name="datareferal" id="datareferal" class="form-control"></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </section>
    </div>
@endsection
