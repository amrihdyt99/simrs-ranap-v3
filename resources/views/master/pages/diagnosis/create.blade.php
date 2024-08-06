@extends('master.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Diagnosis</h1>
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
                                <form
                                    action="{{ route('master.clinical_pathway.diagnosis.store', ['clinical_pathway' => $clinicalPathway->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_diagnosis">Nama Diagnosis</label>
                                        <input type="text"
                                            class="form-control @error('nama_diagnosis') is-invalid @enderror"
                                            id="nama_diagnosis" name="nama_diagnosis" required>
                                    </div>
                                    @error('nama_diagnosis')
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
