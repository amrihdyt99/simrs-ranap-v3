<div class="modal fade" id="modalSOAP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <form id="form-entry-soap">
                <div class="modal-header">
                    <h3>Tambah Data CPPT</h3>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="soaper_reg" value="{{$reg}}">
                    @if (session()->get('poli_kode') == 'RJ')
                        <input type="hidden" name="soaper_poli" value="">
                    @else
                        <input type="hidden" name="soaper_poli" value="{{session()->get('poli_kode')}}">
                    @endif
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="subject" class="font-weight-bold">SUBJECT
                                    @if(auth()->user()->level_user == 'dietitian' || auth()->user()->level_user == 'farmasi')
                                        <small type="button" class="badge badge-info" id="btn-fetch-subject">ambil dari pemeriksaan perawat</small>
                                    @endif
                                </label>
                                <textarea class="form-control" id="subject" rows="10" name="soaper_subject"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="object" class="font-weight-bold">OBJECT
                                @if(auth()->user()->level_user == 'dietitian' || auth()->user()->level_user == 'farmasi')
                                        <small type="button" class="badge badge-info" id="btn-fetch-object">ambil dari pemeriksaan perawat</small>
                                @endif
                                </label>
                                <textarea class="form-control" id="object" rows="10" name="soaper_object"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="assesment">ASSESMENT</label>
                                @if(auth()->user()->level_user == 'dietitian' || auth()->user()->level_user == 'farmasi')
                                    <textarea class="form-control" id="assesment" rows="10" name="soaper_assesment[]"></textarea>
                                @else
                                    <select id="soaper_assesment_select" class="form-control select2" style="width: 100%">
                                        <option value="">-- Pilih Assesment --</option>
                                    </select>
                                    <hr>
                                    <h6>Assesment dipilih :</h6>
                                    <ul id="soaper_assesment_list"></ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="planning" class="font-weight-bold">PLANNING</label>
                                <textarea class="form-control" id="planning" rows="10" name="soaper_planning"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" id="btn-save-soap">Simpan</button>    
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function daftarmasalah(_id = '#soaper_assesment_select') {
        $(_id).select2({
            ajax: {
                url: "{{url('api/sphaira/daftarmasalah')}}",
                type: 'GET',
                data: function(params){
                    return {
                        searchParams: params.term
                    }
                },
                processResults: function(resp){
                    return {
                        results:  $.map(resp.data, function (data) {
                            return {
                                text: data.kode + ' -- ' + data.diagnosa_keperawatan,
                                id: data.kode + ' -- ' + data.diagnosa_keperawatan
                            }
                        })
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            var existingValues = $('#soaper_assesment_list input[name="soaper_assesment[]"]').map(function() {
                return $(this).val();
            }).get();

        
            if (existingValues.includes(data.id)) {
                alert('Data sudah dipilih!');
                $(_id).val(null).trigger('change');
            } else {
                $('#soaper_assesment_list').append('<li>' + data.text + ' <span class="remove-assessment" style="cursor: pointer; color: red;">&times;</span><input type="hidden" name="soaper_assesment[]" value="' + data.id + '"></li>');
            }
        }).on('select2:unselect', function (e) {
            var data = e.params.data;
            $('#soaper_assesment_list input[name="soaper_assesment[]"][value="' + data.id + '"]').parent().remove();
        });

        $('#soaper_assesment_list').on('DOMSubtreeModified', function() {
            var uniqueValues = [];
            $('#soaper_assesment_list input[name="soaper_assesment[]"]').each(function() {
                var value = $(this).val();
                if (!uniqueValues.includes(value)) {
                    uniqueValues.push(value);
                } else {
                    $(this).parent().remove();
                }
            });
        });

        $('#soaper_assesment_list').on('click', '.remove-assessment', function() {
            $(this).parent().remove();
        });
    }
    $(document).ready(function() {
        daftarmasalah();
        
        $('#btn-fetch-subject').click(function() {
            fetchLastCpptData('subject');
        });

        $('#btn-fetch-object').click(function() {
            fetchLastCpptData('object');
        });

        function fetchLastCpptData(field) {
            $.ajax({
                url: "{{ url('') }}/api/getLastCpptData",
                type: 'GET',
                data: { regno: "{{ $reg }}" },
                success: function(response) {
                    if (response.success) {
                        $('#' + field).val(response.data['soaper_' + field]);
                        neko_notify('success', 'Berhasil mengambil pemeriksaan perawat');
                    } else {
                        neko_notify('info', 'Belum ada pemeriksaan dari perawat');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    });
</script>

