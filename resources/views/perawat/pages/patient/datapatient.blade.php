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
                            <li class="breadcrumb-item active">Data Patient</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Patient Lt7</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @for($i=0;$i<10;$i++)

                            <!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="{{route('patienthistory')}}">
                                        <div class="info-box bg-success">
                                            <span class="info-box-icon"><i class="far fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Patient Name</span>
                                                <span class="info-box-text">Refaldy Bhagas</span>
                                                <span class="info-box-text">MRN</span>
                                                <span class="info-box-text">Location</span>
                                                <span class="info-box-text">Status Pembiayaan</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </a>
                                </div>
                                <!-- /.col -->

                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
