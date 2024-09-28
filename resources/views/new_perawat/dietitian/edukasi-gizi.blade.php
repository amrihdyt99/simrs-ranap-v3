<form id="formEdukasiGizi" method="POST" action="{{ route('add.edukasi_pasien_gizi') }}">
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
                <td>Pentingnya Nutrisi</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_pentingnya_nutrisi_gizi">{{ old('edukasi_pentingnya_nutrisi_gizi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_pentingnya_nutrisi_gizi" value="{{ old('tgl_pentingnya_nutrisi_gizi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Mudah mengerti" id="tingkat_paham_pentingnya_nutrisi_gizi_1" {{ old('tingkat_paham_pentingnya_nutrisi_gizi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_1">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Edukasi Ulang" id="tingkat_paham_pentingnya_nutrisi_gizi_2" {{ old('tingkat_paham_pentingnya_nutrisi_gizi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_2">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_pentingnya_nutrisi_gizi" value="Hal Baru" id="tingkat_paham_pentingnya_nutrisi_gizi_3" {{ old('tingkat_paham_pentingnya_nutrisi_gizi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_pentingnya_nutrisi_gizi_3">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_pentingnya_nutrisi_gizi">{{ old('metode_edukasi_pentingnya_nutrisi_gizi') }}</textarea>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Diet</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_diet_gizi">{{ old('edukasi_diet_gizi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_diet_gizi" value="{{ old('tgl_diet_gizi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Mudah mengerti" id="tingkat_paham_diet_gizi_1" {{ old('tingkat_paham_diet_gizi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_diet_gizi_1">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Edukasi Ulang" id="tingkat_paham_diet_gizi_2" {{ old('tingkat_paham_diet_gizi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_diet_gizi_2">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_diet_gizi" value="Hal Baru" id="tingkat_paham_diet_gizi_3" {{ old('tingkat_paham_diet_gizi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_diet_gizi_3">Hal Baru</label><br>
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_diet_gizi">{{ old('metode_edukasi_diet_gizi') }}</textarea>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Lain-lain</td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_gizi">{{ old('edukasi_lain_lain_gizi') }}</textarea>
                    </div>
                </td>
                <td><input type="date" class="form-control" name="tgl_lain_lain_gizi" value="{{ old('tgl_lain_lain_gizi') }}"></td>
                <td>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Mudah mengerti" id="tingkat_paham_lain_lain_gizi_1" {{ old('tingkat_paham_lain_lain_gizi') == 'Mudah mengerti' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_gizi_1">Mudah mengerti</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_gizi_2" {{ old('tingkat_paham_lain_lain_gizi') == 'Edukasi Ulang' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_gizi_2">Edukasi Ulang</label><br>
                    <input class="" type="radio" name="tingkat_paham_lain_lain_gizi" value="Hal Baru" id="tingkat_paham_lain_lain_gizi_3" {{ old('tingkat_paham_lain_lain_gizi') == 'Hal Baru' ? 'checked' : '' }}>
                    <label for="tingkat_paham_lain_lain_gizi_3">Hal Baru</label><br>
                    <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_gizi" value="{{ old('tingkat_paham_lain_lain_text_gizi') }}">
                </td>
                <td>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="metode_edukasi_lain_lain_gizi" placeholder="Enter ...">{{ old('metode_edukasi_lain_lain_gizi') }}</textarea>
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
                            <canvas id="canvas_sasaran" width="350" height="100" disabled>Your browser does not support
                                the HTML canvas tag.</canvas>
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
                        <canvas id="canvas_edukator" width="350" height="100" disabled>Your browser does not support the
                            HTML canvas tag.</canvas>
                    </div>
                    <div style="margin: 10px;">
                        <input type="hidden" id="signature_edukator" name="ttd_edukator" value="">
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <button type="button" id="submitEdukasiGizi" class="btn btn-primary">Simpan</button>
</form>


<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        // Function to load data
        function loadEdukasiGizi() {
        $.ajax({
            url: "{{ route('get.edukasigizi') }}",
            type: "POST",
            data: {

                reg_no: regno,
                med_rec: medrec
            },
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    $('textarea[name="edukasi_pentingnya_nutrisi_gizi"]').val(data.edukasi_pentingnya_nutrisi_gizi);
                    $('textarea[name="edukasi_diet_gizi"]').val(data.edukasi_diet_gizi);
                    $('textarea[name="edukasi_lain_lain_gizi"]').val(data.edukasi_lain_lain_gizi);
                    $('input[name="tgl_pentingnya_nutrisi_gizi"]').val(data.tgl_pentingnya_nutrisi_gizi);
                    $('input[name="tgl_diet_gizi"]').val(data.tgl_diet_gizi);
                    $('input[name="tgl_lain_lain_gizi"]').val(data.tgl_lain_lain_gizi);
                    $('input[name="tingkat_paham_pentingnya_nutrisi_gizi"][value="' + data.tingkat_paham_pentingnya_nutrisi_gizi + '"]').prop('checked', true);
                    $('input[name="tingkat_paham_diet_gizi"][value="' + data.tingkat_paham_diet_gizi + '"]').prop('checked', true);
                    $('input[name="tingkat_paham_lain_lain_gizi"][value="' + data.tingkat_paham_lain_lain_gizi + '"]').prop('checked', true);
                    $('textarea[name="tingkat_paham_lain_lain_text_gizi"]').val(data.tingkat_paham_lain_lain_text_gizi);
                    $('textarea[name="metode_edukasi_pentingnya_nutrisi_gizi"]').val(data.metode_edukasi_pentingnya_nutrisi_gizi);
                    $('textarea[name="metode_edukasi_diet_gizi"]').val(data.metode_edukasi_diet_gizi);
                    $('textarea[name="metode_edukasi_lain_lain_gizi"]').val(data.metode_edukasi_lain_lain_gizi);
                }
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    }

    loadEdukasiGizi();

    $('#submitEdukasiGizi').on('click', function() {
        neko_proses();

        var formData = new FormData($('#formEdukasiGizi')[0]);
        formData.append('reg_no', regno);
        formData.append('med_rec', medrec);
        formData.append('user_id', "{{auth()->user()->id}}");

        $.ajax({
            url: "{{route('add.edukasi_pasien_gizi')}}",
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