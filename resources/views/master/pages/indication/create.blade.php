@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Gejala</h1>
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
                                <form action="{{ route('master.indication.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="kode">Kode Gejala</label>
                                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                            id="kode" name="kode" required>
                                    </div>
                                    @error('kode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="gejala">Gejala</label>
                                        <input type="text" class="form-control @error('gejala') is-invalid @enderror"
                                            id="gejala" name="gejala" required>
                                    </div>
                                    @error('gejala')
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
