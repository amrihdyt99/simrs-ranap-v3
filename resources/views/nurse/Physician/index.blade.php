@extends('nurse/layout/master')
@section('title', 'Physician')
@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <table class="table">
                <thead class="table-dark" style="text-align: center">
                    <th><i class="mdi mdi-plus"></i></th>
                    <th>Physician</th>
                    <th>Leader</th>
                    <th>Item</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Physician Type</th>
                    <th>Physician Team Type</th>
                    <th>Closed</th>
                </thead>
                <tbody style="text-align: center">
                    <td>
                        <a href="" class="btn btn-danger"><i class="mdi mdi-close"></i></a>
                        <a href="" class="btn btn-warning"><i class="mdi mdi-tooltip-edit"></i></a>
                    </td>
                    <td>
                        Dr. Maipe Aprianti Sp, An
                    </td>
                    <td>
                        <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>
                    <td></td>
                    <td>16-jun-2022</td>
                    <td></td>
                    <td></td>
                    <td>Physician Team</td>
                    <td>
                        <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </td>
                    <td></td>
                </tbody>
            </table>
        </div>
    </div>

@endsection
