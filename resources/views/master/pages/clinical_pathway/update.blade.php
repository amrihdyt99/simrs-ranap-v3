@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Clinical Pathway</h1>
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
                                <form action="{{ route('master.clinical_pathway.update', $clinicalPathway->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="kode_path">Kode Pathway</label>
                                        <input type="text" class="form-control @error('kode_path') is-invalid @enderror"
                                            value="{{ $clinicalPathway->kode_path }}" id="kode_path" name="kode_path"
                                            required>
                                    </div>
                                    @error('kode_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="nama_path">Nama Pathway</label>
                                        <input type="text" class="form-control @error('nama_path') is-invalid @enderror"
                                            value="{{ $clinicalPathway->nama_path }}" id="nama_path" name="nama_path"
                                            required>
                                    </div>
                                    @error('nama_path')
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
