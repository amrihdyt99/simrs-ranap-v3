@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Data Paramedic</h1>
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
                                <form action="{{ route('master.practitioner.update', $paramedic->ParamedicID) }}" method="POST" id="practitioner_form">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ParamedicCode">Paramedic Code</label>
                                                <input type="text" class="form-control" id="ParamedicCode" name="ParamedicCode" value="{{ $paramedic->ParamedicCode }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="SiteCode">Site Code</label>
                                                <select id="SiteCode" name="SiteCode" class="form-control select2bs4">
                                                    <option value="">--Pilih Site--</option>
                                                    @foreach ($sites as $site)
                                                        <option value="{{ $site->SiteCode }}" {{ $site->SiteCode == $paramedic->SiteCode ? 'selected' : '' }}>
                                                            {{ $site->SiteName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="FirstName">First Name</label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{ $paramedic->FirstName }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="MiddleName">Middle Name</label>
                                                <input type="text" class="form-control" id="MiddleName" name="MiddleName" value="{{ $paramedic->MiddleName }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="LastName">Last Name</label>
                                                <input type="text" class="form-control" id="LastName" name="LastName" value="{{ $paramedic->LastName }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ParamedicName">Paramedic Name</label>
                                                <input type="text" class="form-control" id="ParamedicName" name="ParamedicName" value="{{ $paramedic->ParamedicName }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ParamedicInitial">Paramedic Initial</label>
                                                <input type="text" class="form-control" id="ParamedicInitial" name="ParamedicInitial" value="{{ $paramedic->ParamedicInitial }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="DateOfBirth">Date of Birth</label>
                                                <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" value="{{ $paramedic->DateOfBirth }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="GCSex">Gender</label>
                                                <select id="GCSex" name="GCSex" class="form-control select2bs4">
                                                    <option value="">--Pilih Gender--</option>
                                                    <option value="M" {{ $paramedic->GCSex == 'M' ? 'selected' : '' }}>Male</option>
                                                    <option value="F" {{ $paramedic->GCSex == 'F' ? 'selected' : '' }}>Female</option>
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
                                                    {{-- @foreach ($paramedicTypes as $type)
                                                        <option value="{{ $type->TypeCode }}" {{ $type->TypeCode == $paramedic->GCParamedicType ? 'selected' : '' }}>
                                                            {{ $type->TypeName }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="GCEmploymentStatus">Employment Status</label>
                                                <select id="GCEmploymentStatus" name="GCEmploymentStatus" class="form-control select2bs4">
                                                    <option value="">--Pilih Status--</option>
                                                    {{-- @foreach ($employmentStatuses as $status)
                                                        <option value="{{ $status->StatusCode }}" {{ $status->StatusCode == $paramedic->GCEmploymentStatus ? 'selected' : '' }}>
                                                            {{ $status->StatusName }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="GCReligion">Religion</label>
                                                <select id="GCReligion" name="GCReligion" class="form-control select2bs4">
                                                    <option value="">--Pilih Religion--</option>
                                                    {{-- @foreach ($religions as $religion)
                                                        <option value="{{ $religion->ReligionCode }}" {{ $religion->ReligionCode == $paramedic->GCReligion ? 'selected' : '' }}>
                                                            {{ $religion->ReligionName }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="GCNationality">Nationality</label>
                                                <select id="GCNationality" name="GCNationality" class="form-control select2bs4">
                                                    <option value="">--Pilih Nationality--</option>
                                                    {{-- @foreach ($nationalities as $nationality)
                                                        <option value="{{ $nationality->NationalityCode }}" {{ $nationality->NationalityCode == $paramedic->GCNationality ? 'selected' : '' }}>
                                                            {{ $nationality->NationalityName }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Title">Title</label>
                                                <input type="text" class="form-control" id="Title" name="Title" value="{{ $paramedic->Title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Suffix">Suffix</label>
                                                <input type="text" class="form-control" id="Suffix" name="Suffix" value="{{ $paramedic->Suffix }}">
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
                                                        <option value="{{ $specialty->SpecialtyCode }}" {{ $specialty->SpecialtyCode == $paramedic->SpecialtyCode ? 'selected' : '' }}>
                                                            {{ $specialty->SpecialtyName }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="HiredDate">Hired Date</label>
                                                <input type="date" class="form-control" id="HiredDate" name="HiredDate" value="{{ $paramedic->HiredDate }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="StartExperienceDate">Start Experience Date</label>
                                                <input type="date" class="form-control" id="StartExperienceDate" name="StartExperienceDate" value="{{ $paramedic->StartExperienceDate }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="IsTaxRegistrant">Is Tax Registrant</label>
                                                <select id="IsTaxRegistrant" name="IsTaxRegistrant" class="form-control select2bs4">
                                                    <option value="1" {{ $paramedic->IsTaxRegistrant == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ $paramedic->IsTaxRegistrant == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="TaxRegistrantNo">Tax Registrant No</label>
                                                <input type="text" class="form-control" id="TaxRegistrantNo" name="TaxRegistrantNo" value="{{ $paramedic->TaxRegistrantNo }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add remaining fields in similar manner -->
                                    
                                    <button type="submit" id="submit_button" class="btn btn-primary">Update</button>
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
            submitButton.innerHTML = 'Update...'; 
        });
    </script>
@endpush
