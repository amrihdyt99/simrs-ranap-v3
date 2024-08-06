@extends('perawat.layouts.app')
@section('content')
    <section class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @include('perawat.components.headnursingpatient')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <label>Systolic Blood Pressure Diastolic Blood Pressure</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <label>Temperature</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <label>Pulse</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">SP02</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
