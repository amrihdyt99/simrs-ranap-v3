@extends('perawat.layouts.app')
@section('content')
    <section class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            @include('perawat.components.headnursingpatient')
            @include('perawat.components.submenunursing')
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('perawat.nursing.speciality')}}">Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <th>Vital Sign</th>
                        <th>Date Time</th>
                        <th>Date Time</th>
                        <th>Date Time</th>
                        <th>Date Time</th>
                        <th>Date Time</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>SOP2(%)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>GCS</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
@endsection
