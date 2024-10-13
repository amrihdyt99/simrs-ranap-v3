@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)


@section('nyaa_content_header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Paramedic</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('nyaa_content_body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('master.practitioner.store') }}" method="POST" id="practitioner_form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ParamedicCode">Paramedic Code</label>
                                            <input type="text" class="form-control" id="ParamedicCode" name="ParamedicCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SiteCode">Site Code</label>
                                            <select id="SiteCode" name="SiteCode" class="form-control select2bs4">
                                                <option value="">--Pilih Site--</option>
                                                @foreach ($sites as $site)
                                                <option value="{{ $site->SiteCode }}">{{ $site->SiteName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FirstName">First Name</label>
                                            <input type="text" class="form-control" id="FirstName" name="FirstName">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="MiddleName">Middle Name</label>
                                            <input type="text" class="form-control" id="MiddleName" name="MiddleName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="LastName">Last Name</label>
                                            <input type="text" class="form-control" id="LastName" name="LastName">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ParamedicName">Paramedic Name</label>
                                            <input type="text" class="form-control" id="ParamedicName" name="ParamedicName">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ParamedicInitial">Paramedic Initial</label>
                                            <input type="text" class="form-control" id="ParamedicInitial" name="ParamedicInitial">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DateOfBirth">Date of Birth</label>
                                            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="GCSex">Gender</label>
                                            <select id="GCSex" name="GCSex" class="form-control select2bs4">
                                                <option value="">--Pilih Gender--</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="GCParamedicType">Paramedic Type</label>
                                            <select id="GCParamedicType" name="GCParamedicType" class="form-control select2bs4">
                                                <option value="">--Pilih Type--</option>
                                                <option value="X0055^001">Physician</option>
                                                <option value="X0055^002">Midwife</option>
                                                <option value="X0055^003">Nurse</option>
                                                <option value="X0055^004">Dental Nurse</option>
                                                <option value="X0055^005">Physical Therapist</option>
                                                <option value="X0055^006">Anaesthetist</option>
                                                <option value="X0055^007">Laboratory Analyst</option>
                                                <option value="X0055^008">Radiographer</option>
                                                <option value="X0055^009">Pharmacist</option>
                                                <option value="X0055^010">Assistant Pharmacist</option>
                                                <option value="X0055^011">Medical Record Officer</option>
                                                <option value="X0055^012">Physiotherapist</option>
                                                <option value="X0055^013">Nutritionist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="GCEmploymentStatus">Employment Status</label>
                                            <select id="GCEmploymentStatus" name="GCEmploymentStatus" class="form-control select2bs4">
                                                <option value="">--Pilih Status--</option>
                                                <option value="X0020^001">Contract</option>
                                                <option value="X0020^002">Permanent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="GCReligion">Religion</label>
                                            <select id="GCReligion" name="GCReligion" class="form-control select2bs4">
                                                <option value="">--Pilih Religion--</option>
                                                <option value="0006^MOS">Muslim</option>
                                                <option value="0006^BUD">Buddhist</option>
                                                <option value="0006^CHR">Christian</option>
                                                <option value="0006^CNF">Confucian (Kong Fu Cu)</option>
                                                <option value="0006^CTH">Catholic</option>
                                                <option value="0006^HIN">Hindu</option>
                                                <option value="0006^OTH">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="GCNationality">Nationality</label>
                                            <select id="GCNationality" name="GCNationality" class="form-control select2bs4">
                                                <option value="">--Pilih Nationality--</option>
                                                {{-- @foreach ($nationalities as $nationality)
                                                        <option value="{{ $nationality->NationalityCode }}">{{ $nationality->NationalityName }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Title">Title</label>
                                            <input type="text" class="form-control" id="Title" name="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Suffix">Suffix</label>
                                            <input type="text" class="form-control" id="Suffix" name="Suffix">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SpecialtyCode">Specialty</label>
                                            <select id="SpecialtyCode" name="SpecialtyCode" class="form-control select2bs4">
                                                <option value="">--Pilih Specialty--</option>
                                                {{-- @foreach ($specialties as $specialty)
                                                        <option value="{{ $specialty->SpecialtyCode }}">{{ $specialty->SpecialtyName }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="HiredDate">Hired Date</label>
                                            <input type="date" class="form-control" id="HiredDate" name="HiredDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="StartExperienceDate">Start Experience Date</label>
                                            <input type="date" class="form-control" id="StartExperienceDate" name="StartExperienceDate">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="IsTaxRegistrant">Is Tax Registrant</label>
                                            <select id="IsTaxRegistrant" name="IsTaxRegistrant" class="form-control select2bs4">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="TaxRegistrantNo">Tax Registrant No</label>
                                            <input type="text" class="form-control" id="TaxRegistrantNo" name="TaxRegistrantNo">
                                        </div>
                                    </div>
                                </div>

                                <!-- Add remaining fields in similar manner -->

                                <button type="submit" id="submit_button" class="btn btn-primary">Simpan</button>
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
<script>
    // Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    document.getElementById('practitioner_form').addEventListener('submit', function() {
        let submitButton = document.getElementById('submit_button');
        submitButton.disabled = true;
        submitButton.innerHTML = 'Menyimpan...';
    });
</script>
@endpush