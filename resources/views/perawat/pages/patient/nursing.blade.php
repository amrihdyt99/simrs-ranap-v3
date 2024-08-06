@extends('perawat.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item text-sm"><a class="nav-link active" href="#indicators" data-toggle="tab">Vital Sign and Indicators</a>
                    </li>
                    <li class="nav-item text-sm"><a class="nav-link" href="#chart" data-toggle="tab">Vital Sign Chart</a>
                    </li>
                    <li class="nav-item text-sm"><a class="nav-link" href="#drug-admin" data-toggle="tab">Drug Admin & Administration Here</a>
                    </li>
                    <li class="nav-item text-sm"><a class="nav-link" href="#assessment" data-toggle="tab">Nursing Assessment</a>
                    </li>

                    <li class="nav-item text-sm"><a class="nav-link" href="#care-plan" data-toggle="tab">Nursing Care Plan</a>
                    </li>
                    <li class="nav-item text-sm"><a class="nav-link" href="#notes" data-toggle="tab">Nursing Notes</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="indicators">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item text-sm"><a class="nav-link active" href="#specialty" data-toggle="tab">Specialty</a>
                                    </li>
                                    <li class="nav-item text-sm"><a class="nav-link" href="#all" data-toggle="tab">All</a>
                                    </li>
                                    <li class="nav-item text-sm"><a class="nav-link" href="#fluid-balance" data-toggle="tab">Fluid Balance</a>
                                    </li>
                                    <li class="nav-item text-sm"><a class="nav-link" href="#oxygen" data-toggle="tab">Oxygenation</a>
                                    </li>
                                    <li class="nav-item text-sm"><a class="nav-link" href="#drugs" data-toggle="tab">Drugs</a>
                                    </li>
                                   {{-- <li class="nav-item text-sm"><a class="nav-link" href="#special-indicator" data-toggle="tab">Special Indicator</a>
                                    </li>
                                    <li class="nav-item text-sm"><a class="nav-link" href="#calculated" data-toggle="tab">Calculated</a>
                                    </li>--}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="specialty">
                                        @include('perawat.pages.patient.nursing.specialty',['vitaldata'=>$vitaldata])
                                    </div>
                                    <div class="tab-pane" id="all">
                                        @include('perawat.pages.patient.nursing.all',['reg_no'=>$registrationInap->reg_no])
                                    </div>
                                    <div class="tab-pane" id="fluid-balance">
                                        @include('perawat.pages.patient.nursing.fluidbalance')
                                    </div>
                                    <div class="tab-pane" id="oxygen">
                                        @include('perawat.pages.patient.nursing.oxygen')
                                    </div>
                                    <div class="tab-pane" id="drugs">
                                        @include('perawat.pages.drugs.index',['obat'=>$obat])
                                    </div>
                                    <div class="tab-pane" id="special-indicator">

                                    </div>
                                    <div class="tab-pane" id="calculated">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="chart">
                        <button class="btn btn-sm btn-outline-primary mb-4"><i class="fa fa-plus mr-2"></i>Add
                        </button>
                        <div class="card card-info">
                            <div class="card-header">
                                <span class="card-title text-sm">Systolic Blood Pressure Diastolic Blood Pressure</span>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="blood" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <span class="card-title text-sm">Temperature</span>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="temperature" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <span class="card-title text-sm">Pulse</span>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="pulse" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <span class="card-title text-sm">SPO2</span>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="spo2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="tab-pane" id="drug-admin">

                    </div>
                    <div class="tab-pane" id="assessment">

                        <a class="btn btn-primary" href="{{ route('assessment.awal.form') }}" target="_blank">Assessment Awal</a>
                        <a class="btn btn-primary" href="{{ route('assessment.anak.form1') }}">Assessment Anak</a>
                        <a class="btn btn-primary" href="{{ route('assessment.bayi.dashboard') }}">Assessment Bayi</a>

                    </div>
                    <div class="tab-pane" id="care-plan">
                        <!-- disini meletakkan tampilan care plan-->
                        @include('perawat.pages.patient.nursing.careplan',['gejaladata'=>$gejaladata,'dokter'=>$dokter])
                    </div>
                    <div class="tab-pane" id="notes">
                        @include('perawat.pages.nursing.nursenote')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        @include('perawat.components.menu')
        @include('perawat.components.patient-resume')
    </div>
</div>
@endsection

@push('addon-script')
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    $(function () {
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                    {
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            var bloodChartCanvas = $('#blood').get(0).getContext('2d')
            var bloodChartOptions = $.extend(true, {}, areaChartOptions)
            var bloodChartData = $.extend(true, {}, areaChartData)
            bloodChartData.datasets[0].fill = false;
            bloodChartData.datasets[1].fill = false;
            bloodChartOptions.datasetFill = false

            var bloodChart = new Chart(bloodChartCanvas, {
                type: 'line',
                data: bloodChartData,
                options: bloodChartOptions
            })

            var temperatureChartCanvas = $('#temperature').get(0).getContext('2d')
            var temperatureChartOptions = $.extend(true, {}, areaChartOptions)
            var temperatureChartData = $.extend(true, {}, areaChartData)
            temperatureChartData.datasets[0].fill = false;
            temperatureChartData.datasets[1].fill = false;
            temperatureChartOptions.datasetFill = false

            var temperatureChart = new Chart(temperatureChartCanvas, {
                type: 'line',
                data: temperatureChartData,
                options: temperatureChartOptions
            })

            var pulseChartCanvas = $('#pulse').get(0).getContext('2d')
            var pulseChartOptions = $.extend(true, {}, areaChartOptions)
            var pulseChartData = $.extend(true, {}, areaChartData)
            pulseChartData.datasets[0].fill = false;
            pulseChartData.datasets[1].fill = false;
            pulseChartOptions.datasetFill = false

            var pulseChart = new Chart(pulseChartCanvas, {
                type: 'line',
                data: pulseChartData,
                options: pulseChartOptions
            })

            var spo2ChartCanvas = $('#spo2').get(0).getContext('2d')
            var spo2ChartOptions = $.extend(true, {}, areaChartOptions)
            var spo2ChartData = $.extend(true, {}, areaChartData)
            spo2ChartData.datasets[0].fill = false;
            spo2ChartData.datasets[1].fill = false;
            spo2ChartOptions.datasetFill = false

            var spo2Chart = new Chart(spo2ChartCanvas, {
                type: 'line',
                data: spo2ChartData,
                options: spo2ChartOptions
            })
        })
</script>
<script>
    $(function () {
        $('.nursing').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush
