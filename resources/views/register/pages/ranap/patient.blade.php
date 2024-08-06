@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Data Pasien</h1>
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
                                <form action="{{ route('master.patient.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="MedicalNo">MRN</label>
                                        <input type="text" class="form-control @error('MedicalNo') is-invalid @enderror"
                                               id="MedicalNo" name="MedicalNo" required>
                                    </div>
                                    @error('MedicalNo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="SSN">SSN</label>
                                        <input type="number" class="form-control @error('SSN') is-invalid @enderror"
                                               id="SSN" name="SSN">
                                    </div>
                                    @error('SSN')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="FirstName">Nama Depan</label>
                                        <input type="text" class="form-control @error('FirstName') is-invalid @enderror"
                                               id="FirstName" name="FirstName" required>
                                    </div>
                                    @error('FirstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="MiddleName">Nama Tengah</label>
                                        <input type="text" class="form-control @error('MiddleName') is-invalid @enderror"
                                               id="MiddleName" name="MiddleName">
                                    </div>
                                    @error('MiddleName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="LastName">Nama Belakang</label>
                                        <input type="text" class="form-control @error('LastName') is-invalid @enderror"
                                               id="LastName" name="LastName">
                                    </div>
                                    @error('LastName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="PatientName">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('PatientName') is-invalid @enderror"
                                               id="PatientName" name="PatientName" required>
                                    </div>
                                    @error('PatientName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="PatientNameOnCard">Nama Pasien (Kartu)</label>
                                        <input type="text"
                                               class="form-control @error('PatientNameOnCard') is-invalid @enderror"
                                               id="PatientNameOnCard" name="PatientNameOnCard" required>
                                    </div>
                                    @error('PatientNameOnCard')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="CityOfBirth">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('CityOfBirth') is-invalid @enderror"
                                               id="CityOfBirth" name="CityOfBirth" required>
                                    </div>
                                    @error('CityOfBirth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="DateOfBirth">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('DateOfBirth') is-invalid @enderror"
                                               id="DateOfBirth" name="DateOfBirth" required>
                                    </div>
                                    @error('DateOfBirth')
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
@push('nyaa_scripts')
@endpush
