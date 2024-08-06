@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Ruangan</h1>
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
                                <form action="{{ route('master.ruangan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="RoomCode">Room Code</label>
                                        <input type="text" class="form-control @error('RoomCode') is-invalid @enderror"
                                               id="RoomCode" name="RoomCode" required>
                                    </div>
                                    @error('RoomCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="RoomName">RoomName</label>
                                        <input type="text" class="form-control @error('RoomName') is-invalid @enderror"
                                               id="RoomName" name="RoomName" required>
                                    </div>
                                    @error('RoomName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="IP">IP</label>
                                        <input type="text" class="form-control @error('IP') is-invalid @enderror"
                                               id="IP" name="IP">
                                    </div>
                                    @error('IP')
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
