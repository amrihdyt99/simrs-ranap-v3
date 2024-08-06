<div class="card">
    <div class="card-header">
        <div class="card-title">{{ $title }}</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <label for="no_medrec">No Med Rec</label>
                <select id="mrn" name="mrn" class="form-control">
                    <option></option>
                </select>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                    <option value="0001^M">Laki-laki</option>
                    <option value="0001^F">Perempuan</option>
                </select>
                <label for="tanggal_asesmen">Tanggal Asesmen</label>
                <input id='tanggal_asesmen' type="date" class="form-control" value="{{ date("Y-m-d") }}">
            </div>
            <div class="col-sm-4">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input id='nama_lengkap' type="text" class="form-control" disabled>
                <label for="ruang_rawat">Ruang Rawat</label>
                <input id='ruang_rawat' type="text" class="form-control" disabled>
            </div>
            <div class="col-sm-4">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id='tanggal_lahir' type="text" class="form-control" disabled>
                <label for="tanggal_masuk_rawat_inap">Tanggal Masuk Rawat Inap</label>
                <input id='tanggal_masuk_rawat_inap' type="text" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $("#mrn").select2({
                theme: "bootstrap4",
                placeholder: "Cari MRN",
                ajax: {
                    delay: 500,
                    url: "{{ url('api/get-registrasi-inap') }}",
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.map((d) => {
                                d.id = d.pasien.MedicalNo
                                d.text = d.pasien.MedicalNo
                                return d
                            })
                        }
                    },
                },
                templateResult: function(data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `${data.pasien.MedicalNo} ${data.pasien.PatientName}`
                },
                templateSelection: function(data) {
                    setDetailPasien(data)
                    return data.text
                }
            });

            function setDetailPasien(data) {
                if(data.pasien != undefined){
                    $("#nama_lengkap").val(data.pasien.PatientName)
                    $("#tanggal_lahir").val(data.pasien.DateOfBirth)
                    $("#jenis_kelamin").val(data.pasien.GCSex)
                    $("#ruang_rawat").val(data.service_unit)
                    $("#tanggal_masuk_rawat_inap").val(data.reg_tanggal)
                }
            }
        })
    </script>
@endpush
