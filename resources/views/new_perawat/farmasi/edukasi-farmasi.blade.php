<form id="formEdukasiFarmasi" method="POST" action="{{ route('add.edukasi_pasien_farmasi') }}">
    @csrf
    <table class="table1">
        <thead>
            <tr>
                <th>Edukator / Topik</th>
                <th>Edukasi</th>
                <th>Tanggal Edukasi</th>
                <th>Tingkat Pemahaman Awal</th>
                <th>Metode Edukasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Obat-obatan yang diberikan, manfaat dan dosis</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_obat_diberikan_farmasi">{{ old('edukasi_obat_diberikan_farmasi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_obat_diberikan_farmasi" value="{{ old('tgl_obat_diberikan_farmasi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Mudah mengerti" id="tingkat_paham_obat_diberikan_mudah_mengerti" {{ old('tingkat_paham_obat_diberikan_farmasi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_obat_diberikan_mudah_mengerti">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Edukasi Ulang" id="tingkat_paham_obat_diberikan_edukasi_ulang" {{ old('tingkat_paham_obat_diberikan_farmasi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_obat_diberikan_edukasi_ulang">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_obat_diberikan_farmasi" value="Hal Baru" id="tingkat_paham_obat_diberikan_hal_baru" {{ old('tingkat_paham_obat_diberikan_farmasi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_obat_diberikan_hal_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_obat_diberikan_farmasi">{{ old('metode_edukasi_obat_diberikan_farmasi') }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Efek samping obat-obatan yang diberikan</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_efek_samping_farmasi">{{ old('edukasi_efek_samping_farmasi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_efek_samping_farmasi" value="{{ old('tgl_efek_samping_farmasi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Mudah mengerti" id="tingkat_paham_efek_samping_mudah_mengerti" {{ old('tingkat_paham_efek_samping_farmasi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_efek_samping_mudah_mengerti">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Edukasi Ulang" id="tingkat_paham_efek_samping_edukasi_ulang" {{ old('tingkat_paham_efek_samping_farmasi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_efek_samping_edukasi_ulang">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_efek_samping_farmasi" value="Hal Baru" id="tingkat_paham_efek_samping_hal_baru" {{ old('tingkat_paham_efek_samping_farmasi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_efek_samping_hal_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_efek_samping_farmasi">{{ old('metode_edukasi_efek_samping_farmasi') }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Interaksi obat & makanan</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_interaksi_farmasi">{{ old('edukasi_interaksi_farmasi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_interaksi_farmasi" value="{{ old('tgl_interaksi_farmasi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Mudah mengerti" id="tingkat_paham_interaksi_mudah_mengerti" {{ old('tingkat_paham_interaksi_farmasi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_interaksi_mudah_mengerti">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Edukasi Ulang" id="tingkat_paham_interaksi_edukasi_ulang" {{ old('tingkat_paham_interaksi_farmasi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_interaksi_edukasi_ulang">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_interaksi_farmasi" value="Hal Baru" id="tingkat_paham_interaksi_hal_baru" {{ old('tingkat_paham_interaksi_farmasi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_interaksi_hal_baru">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_interaksi_farmasi">{{ old('metode_edukasi_interaksi_farmasi') }}</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Lain-lain</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_farmasi">{{ old('edukasi_lain_lain_farmasi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_lain_lain_farmasi" value="{{ old('tgl_lain_lain_farmasi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_mudah_mengerti" {{ old('tingkat_paham_lain_lain_farmasi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_mudah_mengerti">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_edukasi_ulang" {{ old('tingkat_paham_lain_lain_farmasi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_edukasi_ulang">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_farmasi" value="Hal Baru" id="tingkat_paham_lain_lain_hal_baru" {{ old('tingkat_paham_lain_lain_farmasi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_hal_baru">Hal Baru</label><br>
                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_farmasi" value="{{ old('tingkat_paham_lain_lain_text_farmasi') }}">
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_farmasi">{{ old('metode_edukasi_lain_lain_farmasi') }}</textarea>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table1" style="width: 95%;">
        <tr>
            <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <div style="margin-bottom: 10px; font-weight: bold;">SASARAN</div>
                    <div id="signature-pad-sasaran" style="display: inline-block;">
                        <div style="width: 360px; height: 110px; padding: 3px; position: relative;">
                            <canvas id="canvas_sasaran" width="350" height="100">Your browser does not support the HTML canvas tag.</canvas>
                        </div>
                        <div style="margin: 10px; text-align: center;">
                            <input type="hidden" id="signature_sasaran" name="ttd_sasaran" value="">
                        </div>
                    </div>
                </div>
            </td>

            <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
                <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
                <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                    <div style="width: 360px; height: 110px; padding: 3px; position: relative;">
                        <canvas id="canvas_edukator" width="350" height="100">Your browser does not support the HTML canvas tag.</canvas>
                    </div>
                    <div style="margin: 10px;">
                        <input type="hidden" id="signature_edukator" name="ttd_edukator" value="">
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <button type="button" id="submitEdukasiFarmasi" class="btn btn-primary">Simpan</button>
</form>


<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        // Function to load data
        function loadEdukasiFarmasi() {
        $.ajax({
            url: "{{ route('get.edukasifarmasi') }}",
            type: "POST",
            data: {

                reg_no: regno,
                med_rec: medrec
            },
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    $('textarea[name="edukasi_obat_diberikan_farmasi"]').val(data.edukasi_obat_diberikan_farmasi);
                    $('textarea[name="edukasi_efek_samping_farmasi"]').val(data.edukasi_efek_samping_farmasi);
                    $('textarea[name="edukasi_interaksi_farmasi"]').val(data.edukasi_interaksi_farmasi);
                    $('textarea[name="edukasi_lain_lain_farmasi"]').val(data.edukasi_lain_lain_farmasi);
                    $('input[name="tgl_obat_diberikan_farmasi"]').val(data.tgl_obat_diberikan_farmasi);
                    $('input[name="tgl_efek_samping_farmasi"]').val(data.tgl_efek_samping_farmasi);
                    $('input[name="tgl_interaksi_farmasi"]').val(data.tgl_interaksi_farmasi);
                    $('input[name="tgl_lain_lain_farmasi"]').val(data.tgl_lain_lain_farmasi);
                    $('input[name="tingkat_paham_obat_diberikan_farmasi"][value="' + data.tingkat_paham_obat_diberikan_farmasi + '"]').prop('checked', true);
                    $('input[name="tingkat_paham_efek_samping_farmasi"][value="' + data.tingkat_paham_efek_samping_farmasi + '"]').prop('checked', true);
                    $('input[name="tingkat_paham_interaksi_farmasi"][value="' + data.tingkat_paham_interaksi_farmasi + '"]').prop('checked', true);
                    $('input[name="tingkat_paham_lain_lain_farmasi"][value="' + data.tingkat_paham_lain_lain_farmasi + '"]').prop('checked', true);
                    $('textarea[name="tingkat_paham_lain_lain_text_farmasi"]').val(data.tingkat_paham_lain_lain_text_farmasi);
                    $('textarea[name="metode_edukasi_obat_diberikan_farmasi"]').val(data.metode_edukasi_obat_diberikan_farmasi);
                    $('textarea[name="metode_edukasi_efek_samping_farmasi"]').val(data.metode_edukasi_efek_samping_farmasi);
                    $('textarea[name="metode_edukasi_interaksi_farmasi"]').val(data.metode_edukasi_interaksi_farmasi);
                    $('textarea[name="metode_edukasi_lain_lain_farmasi"]').val(data.metode_edukasi_lain_lain_farmasi);
                }
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    }

    loadEdukasiFarmasi();

    $('#submitEdukasiFarmasi').on('click', function() {
        neko_proses();

        var formData = new FormData($('#formEdukasiFarmasi')[0]);
        formData.append('reg_no', regno);
        formData.append('med_rec', medrec);
        formData.append('user_id', "{{auth()->user()->id}}");

        $.ajax({
            url: "{{route('add.edukasi_pasien_farmasi')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    if (errors.med_rec) {
                        alert(errors.med_rec[0]);
                    }
                } else {
                    neko_simpan_error_noreq();
                }
            },
        });
    });


});
</script>