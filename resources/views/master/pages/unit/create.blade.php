@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Unit</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('master.unit.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ServiceUnitCode">Service Unit Code</label>
                                        <input type="text" class="form-control @error('ServiceUnitCode') is-invalid @enderror"
                                               id="ServiceUnitCode" name="ServiceUnitCode" required>
                                    </div>
                                    @error('RoomCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="ServiceUnitName">Service Unit Name</label>
                                        <input type="text" class="form-control @error('ServiceUnitName') is-invalid @enderror"
                                               id="ServiceUnitName" name="ServiceUnitName" required>
                                    </div>
                                    @error('ServiceUnitName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="ShortName">Short Name</label>
                                        <input type="text" class="form-control @error('ShortName') is-invalid @enderror"
                                               id="ShortName" name="ShortName">
                                    </div>
                                    @error('ShortName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="Initial">Initial</label>
                                        <input type="text" class="form-control @error('Initial') is-invalid @enderror"
                                               id="Initial" name="Initial">
                                    </div>
                                    @error('Initial')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
