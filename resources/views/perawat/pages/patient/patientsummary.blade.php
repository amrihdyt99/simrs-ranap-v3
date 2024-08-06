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
                        <li class="breadcrumb-item active">Patient Summary</li>
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
            </div>
            <!-- /.card -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">CPOE-Laboratory</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
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
                        </tbody>
                    </table>
                </div>
            </div>

               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">CPOE-Imaging</h3>
                   </div>
                   <div class="card-body">
                        <input type="text" name="cpoeimaging" id="cpoeimaging" class="form-control"/>
                   </div>
               </div>

               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">CPOE-Other Exam</h3>
                   </div>
                   <div class="card-body">
                       <input type="text" name="cpoeexam" id="cpoeexam" class="form-control"/>
                   </div>
               </div>


               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">CPOE-Monitoring</h3>
                   </div>
                   <div class="card-body">
                       <input type="text" name="cpoemonitoring" id="cpoemonitoring" class="form-control"/>
                   </div>
               </div>

               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">Vital Sign</h3>
                   </div>
                   <div class="card-body">
                       <input type="text" name="vitalsign" id="vitalsign" class="form-control"/>
                   </div>
               </div>

               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">Nursing Assesment</h3>
                   </div>
                   <div class="card-body">
                       <input type="text" name="nursingassesment" id="nursingassesment" class="form-control"/>
                   </div>
               </div>


               <div class="card card-primary">
                   <div class="card-header">
                       <h3 class="card-title">Integrated Notes</h3>
                   </div>
                   <div class="card-body">
                       <textarea name="integratednotes" id="integratednotes" class="form-control"></textarea>
                   </div>
               </div>
        </div>
    </section>
</div>
@endsection
