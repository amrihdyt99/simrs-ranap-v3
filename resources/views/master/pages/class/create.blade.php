@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Kelas</h1>
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
                                <form action="{{ route('master.class.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ClassCode">Kode Kelas</label>
                                        <input type="text" class="form-control @error('ClassCode') is-invalid @enderror"
                                            id="ClassCode" name="ClassCode" required>
                                    </div>
                                    @error('ClassCode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="ClassName">Nama Kelas</label>
                                        <input type="text" class="form-control @error('ClassName') is-invalid @enderror"
                                            id="ClassName" name="ClassName" required>
                                    </div>
                                    @error('ClassName')
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
