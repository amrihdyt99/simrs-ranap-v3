@extends('perawat.layouts.app')
@section('content')
    <section class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @include('perawat.components.headnursingpatient')
            @include('perawat.components.submenunursing')
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <label>Weight(kg)</label>
                            </div>
                        </div>
                        <form>
                            <div class="card-body">
                                <textarea name="weight" id="weight" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <label>Blood Pressure(mmHg)</label>
                            </div>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <input type="number" id="blood1" name="blood1" class="form-control col-sm-4"/>
                                    <label class="col-sm-2 col-form-label">/</label>
                                    <input type="number" id="blood1" name="blood1" class="form-control col-sm-4"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <label>Height(cm)</label>
                            </div>
                        </div>
                        <form>
                            <div class="card-body">
                                <textarea name="height" id="height" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <label>Temperature(Timpanic)(C)</label>
                            </div>
                        </div>
                        <form>
                            <div class="card-body">
                                <textarea name="temperature" id="temperature" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title">
                                <label>Pulse(x/minute)</label>
                            </div>
                        </div>
                        <form>
                            <div class="card-body">
                                <textarea name="pulse" id="pulse" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
