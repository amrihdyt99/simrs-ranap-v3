@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Edit Data Pasien</h2>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('register.informasi-pasien.update', $pasien->MedicalNo) }}" method="POST"
                                onsubmit="return confirm('Pastikan data yang di input sudah benar!!!')">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 left-side">
                                        <div class="col-lg-12 mb-3">
                                            <h5><b>DATA PASIEN</b></h5>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="nama" class="label-admisi">Nama</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $pasien->PatientName }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="preferred_name" class="label-admisi">Nama Preferensi</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="text" name="preferred_name" id="preferred_name" class="form-control" value="{{ $pasien->PreferredName }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="name_on_card" class="label-admisi">Nama Di Kartu</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="text" name="name_on_card" id="name_on_card" class="form-control" value="{{ $pasien->PatientNameOnCard }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="tempat_lahir" class="label-admisi">TTL</label>
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $pasien->CityOfBirth }}">
                                            </div>
                                            <div class="col-lg-5">
                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $pasien->DateOfBirth }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="jenis_kelamin" class="label-admisi">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-lg-4 p">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0001^X" {{ $pasien->GCSex == '0001^X' ? 'selected' : '' }}>Tidak Diketahui</option>
                                                    <option value="0001^M" {{ $pasien->GCSex == '0001^M' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="0001^F" {{ $pasien->GCSex == '0001^F' ? 'selected' : '' }}>Perempuan</option>
                                                    <option value="0001^U" {{ $pasien->GCSex == '0001^U' ? 'selected' : '' }}>Tidak Dapat Ditentukan</option>
                                                    <option value="0001^N" {{ $pasien->GCSex == '0001^N' ? 'selected' : '' }}>Tidak Mengisi</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 mt-1">
                                                <label for="ssn" class="label-admisi">NIK</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="number" name="ssn" id="ssn" class="form-control" value="{{ $pasien->SSN }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="agama" class="label-admisi">Agama</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <select id="agama" name="agama" class="form-control">
                                                    <option value=""></option>
                                                    <option value="0006^BUD" {{ $pasien->GCReligion == '0006^BUD' ? 'selected' : '' }}>Buddhist</option>
                                                    <option value="0006^CHR" {{ $pasien->GCReligion == '0006^CHR' ? 'selected' : '' }}>Christian</option>
                                                    <option value="0006^CNF" {{ $pasien->GCReligion == '0006^CNF' ? 'selected' : '' }}>Confucian (Kong Fu Cu)</option>
                                                    <option value="0006^CTH" {{ $pasien->GCReligion == '0006^CTH' ? 'selected' : '' }}>Catholic</option>
                                                    <option value="0006^HIN" {{ $pasien->GCReligion == '0006^HIN' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="0006^MOS" {{ $pasien->GCReligion == '0006^MOS' ? 'selected' : '' }}>Muslim</option>
                                                    <option value="0006^OTH" {{ $pasien->GCReligion == '0006^OTH' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="age" class="label-admisi">Umur</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="number" name="age" id="age" class="form-control" value="{{ $pasien->Age }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="telepon_1" class="label-admisi">No. Telepon</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="number" name="telepon_1" id="telepon_1" class="form-control" value="{{ $pasien->MobilePhoneNo1 }}">
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="gol_darah" class="label-admisi">Gol. Darah</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <select id="gol_darah" name="gol_darah" class="form-control">
                                                    <option value="X0009^N/A">Pilih Gol. Darah</option>
                                                    <option value="X0009^A" {{ $pasien->GCBloodType == 'X0009^A' ? 'selected' : '' }}>A</option>
                                                    <option value="X0009^B" {{ $pasien->GCBloodType == 'X0009^B' ? 'selected' : '' }}>B</option>
                                                    <option value="X0009^O" {{ $pasien->GCBloodType == 'X0009^O' ? 'selected' : '' }}>O</option>
                                                    <option value="X0009^AB" {{ $pasien->GCBloodType == 'X0009^AB' ? 'selected' : '' }}>AB</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <select id="rhesus" name="rhesus" class="form-control">
                                                    <option value=""></option>
                                                    <option value="+" {{ $pasien->BloodRhesus == '+' ? 'selected' : '' }}>+</option>
                                                    <option value="-" {{ $pasien->BloodRhesus == '-' ? 'selected' : '' }}>-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2">
                                                <label for="alamat" class="label-admisi">Alamat Lengkap</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ $pasien->PatientAddress }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="readonly_">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <h5><b>DATA KELUARGA PASIEN</b></h5>
                                            </div>
                                            <div id="family-forms" class="col-lg-12">
                                                @forelse($keluarga as $key => $kel)
                                                <div class="family-form mb-3">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label class="label-admisi">Hubungan dengan pasien</label>
                                                            <select name="GCRelationShip[]" class="form-control">
                                                                <option value="">-- Pilih hubungan dengan pasien --</option>
                                                                <option value="Diri sendiri" {{ $kel->GCRelationShip == 'Diri sendiri' ? 'selected' : '' }}>Diri sendiri</option>
                                                                <option value="Orang tua" {{ $kel->GCRelationShip == 'Orang tua' ? 'selected' : '' }}>Orang tua</option>
                                                                <option value="Anak" {{ $kel->GCRelationShip == 'Anak' ? 'selected' : '' }}>Anak</option>
                                                                <option value="Suami/istri" {{ $kel->GCRelationShip == 'Suami/istri' ? 'selected' : '' }}>Suami/istri</option>
                                                                <option value="Kerabat/saudara" {{ $kel->GCRelationShip == 'Kerabat/saudara' ? 'selected' : '' }}>Kerabat/saudara</option>
                                                                <option value="Lain-lain" {{ $kel->GCRelationShip == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mt-2">
                                                            <label class="label-admisi">Nomor MRN</label>
                                                            <input type="text" class="form-control" name="MedicalNo[]" value="{{ $kel->MedicalNo }}">
                                                        </div>
                                                        <div class="col-lg-6 mt-2">
                                                            <label class="label-admisi">Nomor Telepon</label>
                                                            <input type="number" class="form-control" name="PhoneNo[]" value="{{ $kel->PhoneNo }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">NIK Keluarga Pasien</label>
                                                            <input type="number" class="form-control" name="SSN[]" value="{{ $kel->SSN }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Nama Keluarga Pasien</label>
                                                            <input type="text" class="form-control" name="FamilyName[]" value="{{ $kel->FamilyName }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="DateOfBirth[]" value="{{ $kel->DateOfBirth }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Pekerjaan</label>
                                                            <input type="text" class="form-control" name="Job[]" value="{{ $kel->Job }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Jenis Kelamin</label>
                                                            <select name="Sex[]" class="form-control">
                                                                <option value=""></option>
                                                                <option value="0001^X" {{ $kel->Sex == '0001^X' ? 'selected' : '' }}>Tidak Diketahui</option>
                                                                <option value="0001^M" {{ $kel->Sex == '0001^M' ? 'selected' : '' }}>Laki-laki</option>
                                                                <option value="0001^F" {{ $kel->Sex == '0001^F' ? 'selected' : '' }}>Perempuan</option>
                                                                <option value="0001^U" {{ $kel->Sex == '0001^U' ? 'selected' : '' }}>Tidak Dapat Ditentukan</option>
                                                                <option value="0001^N" {{ $kel->Sex == '0001^N' ? 'selected' : '' }}>Tidak Mengisi</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Alamat Keluarga Pasien</label>
                                                            <input type="text" class="form-control" name="Address[]" value="{{ $kel->Address }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-left">
                                                            <button type="button" class="btn btn-danger remove-family-form">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="family-form mb-3">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <label class="label-admisi">Hubungan dengan pasien</label>
                                                            <select name="GCRelationShip[]" class="form-control">
                                                                <option value="">-- Pilih hubungan dengan pasien --</option>
                                                                <option value="Diri sendiri">Diri sendiri</option>
                                                                <option value="Orang tua">Orang tua</option>
                                                                <option value="Anak">Anak</option>
                                                                <option value="Suami/istri">Suami/istri</option>
                                                                <option value="Kerabat/saudara">Kerabat/saudara</option>
                                                                <option value="Lain-lain">Lain-lain</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mt-2">
                                                            <label class="label-admisi">Nomor MRN</label>
                                                            <input type="text" class="form-control" name="MedicalNo[]">
                                                        </div>
                                                        <div class="col-lg-6 mt-2">
                                                            <label class="label-admisi">Nomor Telepon</label>
                                                            <input type="number" class="form-control" name="PhoneNo[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">NIK Keluarga Pasien</label>
                                                            <input type="number" class="form-control" name="SSN[]">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Nama Keluarga Pasien</label>
                                                            <input type="text" class="form-control" name="FamilyName[]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" name="DateOfBirth[]">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Jenis Kelamin</label>
                                                            <select name="Sex[]" class="form-control">
                                                                <option value=""></option>
                                                                <option value="0001^X">Tidak Diketahui</option>
                                                                <option value="0001^M">Laki-laki</option>
                                                                <option value="0001^F">Perempuan</option>
                                                                <option value="0001^U">Tidak Dapat Ditentukan</option>
                                                                <option value="0001^N">Tidak Mengisi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Pekerjaan</label>
                                                            <input type="text" class="form-control" name="Job[]">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="label-admisi">Alamat Keluarga Pasien</label>
                                                            <input type="text" class="form-control" name="Address[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-12 text-left">
                                                            <button type="button" class="btn btn-danger remove-family-form">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                            </div>
                                            <div class="col-lg-12 text-left">
                                                <button type="button" class="btn btn-primary" id="add-family-form">Tambah Keluarga Pasien</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right mt-3 mb-3">
                                    <button type="submit" class="btn btn-success" id="btn-save-admisi"><i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    let familyFormCount = '{{ count($keluarga) }}' || 1;

    function addFamilyForm() {
        if (familyFormCount < 3) {
            familyFormCount++;
            const newForm = document.querySelector('.family-form').cloneNode(true);
            newForm.querySelectorAll('input').forEach(input => input.value = '');
            newForm.querySelectorAll('.remove-family-form').forEach(button => button.remove());
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger remove-family-form';
            removeButton.textContent = 'Hapus';
            removeButton.style.display = 'block';
            removeButton.addEventListener('click', () => {
                newForm.remove();
                familyFormCount--;
                updateRemoveButtons();
            });

            newForm.querySelector('.col-lg-12.text-left').appendChild(removeButton);
            document.getElementById('family-forms').appendChild(newForm);

            updateRemoveButtons();
        } else {
            alert('Maksimal 3 form keluarga pasien sudah ditambahkan.');
        }
    }

    function updateRemoveButtons() {
        const familyForms = document.querySelectorAll('.family-form');
        familyForms.forEach((form, index) => {
            const removeButton = form.querySelector('.remove-family-form');
            if (index === 0 && familyForms.length === 1) {
                removeButton.style.display = 'none';
            } else {
                removeButton.style.display = 'block';
            }
        });
    }
    document.getElementById('add-family-form').addEventListener('click', addFamilyForm);
    document.getElementById('family-forms').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-family-form')) {
            e.target.closest('.family-form').remove();
            familyFormCount--;
            updateRemoveButtons();
        }
    });
    document.querySelectorAll('.family-form').forEach(form => {
        const existingRemoveButtons = form.querySelectorAll('.remove-family-form');
        if (existingRemoveButtons.length === 0) {
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger remove-family-form';
            removeButton.textContent = 'Hapus';
            removeButton.style.display = 'none';
            removeButton.addEventListener('click', () => {
                form.remove();
                familyFormCount--;
                updateRemoveButtons();
            });
            form.querySelector('.col-lg-12.text-left').appendChild(removeButton);
        }
    });
    updateRemoveButtons();

    function calculateAge() {
        const birthDate = new Date(document.getElementById('tanggal_lahir').value);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDifference = today.getMonth() - birthDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        document.getElementById('age').value = age;
    }
    document.getElementById('tanggal_lahir').addEventListener('change', calculateAge);

    // Autocomplete for MedicalNo
    $(document).ready(function() {
        $("input[name='MedicalNo[]']").autocomplete({
            source: async function(request, response) {
                const mrn = request.term;
                const res = await fetch(`{{ route('register.informasi-pasien.checkMRN') }}?mrn=` + mrn);
                const data = await res.json();
                response(data.map(item => ({
                    label: `${item.MedicalNo} - ${item.PatientName}`,
                    value: item.MedicalNo
                })));
            },
            minLength: 1,
            select: function(event, ui) {
                $(this).val(ui.item.value);
                return false;
            },
            focus: function(event, ui) {
                $(this).val(ui.item.value);
                return false;
            }
        });
    });
</script>
@endpush