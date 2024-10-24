<style>
    .table_diagnosa tr td, .table_diagnosa tr th {
        padding: 2px
    }
</style>

<div class="modal fade" id="modalSOAP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
      <div class="modal-content">
        <form id="form-entry-soap">
            <div class="modal-header">
                <h3>Tambah Data CPPT</h3>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="soapdok_reg" value="{{$reg}}">
                <input type="hidden" name="soapdok_id" id="soapdok_id" value="{{$id_cppt}}">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="subject">SUBJECT</label>
                            <textarea class="form-control" id="subject" rows="8" name="soapdok_subject"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="object">OBJECT <small type="button" class="badge badge-info" onclick="getLatestAsper({{$subs}})">ambil dari pemeriksaan perawat</small></label>
                            <textarea class="form-control" id="object" rows="8" name="soapdok_object"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="assesment">ASSESMENT</label>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped table_diagnosa">
                                        <tbody>
                                            <tr>
                                                <th>Diagnosa Utama</th>
                                                <td>
                                                    <select name="pasien_diagnosis" id="select-diagnosa-utama" category="utama" onchange="pilih_diag($(this).attr('category'), this.value)" style="width: 100%" class="form-control select2">
                                                        <option value="">-- Pilih Diagnosa Utama --</option>
                                                    </select>
                                                    <div id="selected-diagnosa-utama" class="my-3 font-weight-bold"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Diagnosa Sekunder</th>
                                                <td>
                                                    <select name="pasien_diagnosis" id="select-diagnosa-sekunder" category="sekunder" onchange="pilih_diag($(this).attr('category'), this.value)" style="width: 100%" class="form-control select2">
                                                        <option value="">-- Pilih Diagnosa Sekunder --</option>
                                                    </select>
                                                    <div id="selected-diagnosa-sekunder" class="my-3 font-weight-bold"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Diagnosa Klausa</th>
                                                <td>
                                                    <select name="pasien_diagnosis" id="select-diagnosa-klausa" category="klausa" onchange="pilih_diag($(this).attr('category'), this.value)" style="width: 100%" class="form-control select2">
                                                        <option value="">-- Pilih Diagnosa Klausa --</option>
                                                    </select>
                                                    <div id="selected-diagnosa-klausa" class="my-3 font-weight-bold"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>ICD-O</th>
                                                <td>
                                                    <select name="pasien_icdo" id="select-icdo" category="icdo" onchange="pilih_diag($(this).attr('category'), this.value)" style="width: 100%" class="form-control select2">
                                                        <option value="">-- Pilih ICD-O --</option>
                                                    </select>
                                                    <div id="selected-diagnosa-icdo" class="my-3 font-weight-bold"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="planning">PLANNING</label>
                            <ul id="planning_" contenteditable="true"></ul>
                            {{-- <textarea class="form-control" id="planning" rows="8" name="soapdok_planning" readonly></textarea> --}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="font-weight-bold" for="instruksi">INSTRUKSI PPA</label>
                            <textarea class="form-control" id="instruksi" rows="8" name="soapdok_instruksi"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for="prosedur">PROSEDUR / ICD-9</label>
                            {{-- <textarea class="form-control" id="assesment" rows="8" name="soapdok_assesment"></textarea> --}}
                            <div class="row">
                                <div class="col">
                                    <select name="pasien_prosedur" onchange="pilih_pro()" id="select-prosedur" class="form-control select2" style="width: 100%">
                                        <option value="">-- Pilih prosedur --</option>
                                    </select>
                                    <hr>
                                    <h6>Prosedur dipilih :</h6>
                                    <ul id="selected_prosedur"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div id="panel_expertise_dokter" class="float-right">
                            <button type="button" class="btn btn-primary enlarge_signature" data-id="canvas_expertise_dokter" title="gambar eksepertise"><i class="fas fa-signature"></i> Gambar Ekspertise</button>
                            <div id="canvas_expertise_dokter" class="mb-2"></div>
                        </div>
                    </div> --}}
                </div>
                <h6 class="text-danger text-italic">* Pilih Tindakan/Obat/Layanan Penunjang sebelum menyimpan data CPPT</h6>
            </div>
        </form>
          @if(auth()->user()->level_user=="dokter")

        <div class="modal-body">
            <div class="row mr-0">
                <div class="col-lg-2 pr-0">
                    <div class="tab-button active" id="tab-lab" onclick="clickTab('lab', 'Laboratorium')">
                        Laboratorium
                    </div>
                    <div class="tab-button" id="tab-radiologi" onclick="clickTab('radiologi', 'Radiologi')">
                        Radiologi
                    </div>
                    <div class="tab-button" id="tab-prescribe" onclick="clickTab('prescribe', 'Prescribe')">
                        Prescribe
                    </div>
                    <div class="tab-button" id="tab-rehab" onclick="clickTab('rehab', 'Instruksi Rehab Medik')">
                        Rehab Medik
                    </div>
                    {{-- <div class="tab-button" id="tab-fisio" onclick="clickTab('fisio', 'Fisioterapis')">
                        Fisioterapis
                    </div> --}}
                    <div class="tab-button" id="tab-lainnya" onclick="clickTab('lainnya', 'Tindakan Lainnya')">
                        Tindakan Lainnya
                    </div>
                </div>
                <div class="col-lg-10 pl-0">
                    <h3><b>OBAT/TINDAKAN/LAYANAN PENUNJANG</b></h3>
                    <h3 id="title_cppt">Laboratorium</h3>
                    <div id="panel-lab">
                        @include('new_dokter.treatment.cpoe')
                    </div>
                    <div id="panel-radiologi">
{{--                        @include('new_dokter.treatment.cpoe')--}}

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-cpoe"><i class="fas fa-redo"></i> Reload</button>
                                <button type="button" class="btn btn-success mb-3 float-right tmbh_rad" id="tab-add-cpoe " onclick="clickTab('add-cpoe')"><i class="fas fa-plus"></i> Tambah Data Tindakan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table1" width="100%">
                                    <thead>
                                    <tr class="text-uppercase bg-warning">
                                        <th class="font-weight-bold">Tanggal Order</th>
                                        <th class="font-weight-bold">Jenis Tindakan</th>
                                        <th class="font-weight-bold">Kode Order</th>
                                        <th class="font-weight-bold">Nama Tindakan</th>
                                        <th class="font-weight-bold">Harga</th>
                                        <th class="font-weight-bold">Dokter Order</th>
                                        <th class="font-weight-bold">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-cpoe-radiologi">
                                    </tbody>
                                    <tfoot id="row_total_cpoe">
                                    <tr>
                                        <th colspan="5">TOTAL TARIF</th>
                                        <th id="total_tarif" class="text-right" colspan="2">-</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div id="panel-prescribe">
                        @include('new_dokter.treatment.prescribe')
                    </div>
                    <div id="panel-fisio">

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-cpoe"><i class="fas fa-redo"></i> Reload</button>
                                <button type="button" class="btn btn-success mb-3 float-right" id="tab-add-cpoe" onclick="clickTab('add-cpoe')"><i class="fas fa-plus"></i> Tambah Data Tindakan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table1" width="100%">
                                    <thead>
                                    <tr class="text-uppercase bg-warning">
                                        <th class="font-weight-bold">Tanggal Order</th>
                                        <th class="font-weight-bold">Jenis Tindakan</th>
                                        <th class="font-weight-bold">Kode Order</th>
                                        <th class="font-weight-bold">Nama Tindakan</th>
                                        <th class="font-weight-bold">Harga</th>
                                        <th class="font-weight-bold">Dokter Order</th>
                                        <th class="font-weight-bold">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-cpoe-fisio">
                                    </tbody>
                                    <tfoot id="row_total_cpoe">
                                    <tr>
                                        <th colspan="5">TOTAL TARIF</th>
                                        <th id="total_tarif" class="text-right" colspan="2">-</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="panel-rehab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="instruksi_rehab" class="form-control" cols="30" rows="15" placeholder="Tambahkan deskripsi instruksi ke Rehab Medik"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success float-right" onclick="sendOtherInstructions('rehab', this)"><i class="fas fa-check"></i> Kirim data</button>
                    </div>
                    <div id="panel-lainnya">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-info mb-3 float-right ml-1" id="btn-reload-cpoe"><i class="fas fa-redo"></i> Reload</button>
                                <button type="button" class="btn btn-success mb-3 float-right" id="tab-add-cpoe" onclick="clickTab('add-cpoe')"><i class="fas fa-plus"></i> Tambah Data Tindakan</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table1" width="100%">
                                    <thead>
                                        <tr class="text-uppercase bg-warning">
                                            <th class="font-weight-bold">Tanggal Orderr</th>
                                            <th class="font-weight-bold">Jenis Tindakan</th>
                                            <th class="font-weight-bold">Kode Order</th>
                                            <th class="font-weight-bold">Nama Tindakan</th>
                                            <th class="font-weight-bold">Harga</th>
                                            <th class="font-weight-bold">Dokter Order</th>
                                            <th class="font-weight-bold">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-cpoe-lainnya">
                                    </tbody>
                                    <tfoot id="row_total_cpoee">
                                        <tr>
                                            <th colspan="5">TOTAL TARIF</th>
                                            <th id="total_tarif" class="text-right" colspan="2">-</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="panel-add-cpoe">
                        @include('new_dokter.modal.cpoe')
                    </div>
                </div>
            </div>
        </div>
          @endif
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary float-right" onclick="clickTab('soap')" data-dismiss="modal">Tutup Panel CPPT</button>
            <div id="actionButtonCPPTDokter">
                <button type="button"  class="btn btn-success" id="btn-save-soapdok" onclick="simpanCppt()">Simpan CPPT</button>
            </div>
        </div>
      </div>
    </div>
  </div>

@push('myscripts')
    <script>
        $(document).ready(function () {
            loadCPOE();
            icd9()
            icd10('#select-diagnosa-utama')
            icd10('#select-diagnosa-sekunder')
            icd10('#select-diagnosa-klausa', 'X') 
            icd10('#select-icdo', 'C');
            get_diag()
            get_pro()
        })
    </script>
    <script>

        function neko_d_custom_error(msg) {
            alert(msg)
        }

        function hapus_item(id){
        $.ajax({
            type: "get",
            url: "{{url('api/hapus/tindakan')}}/"+id,
            dataType: "json",
            success: function (r) {
                if (r.success) {
                    clickTab('radiologi', 'Radiologi')
                }else{
                    alert(r.message)
                }
            }
        });
        }

        function hapus_diag(id) {
           $.ajax({
            type: "get",
            url: "{{url('api/delDiagnosa')}}/"+id,
            dataType: "json",
            error: function(){
                neko_d_custom_error('Kesalahan Gagal Dihapus')
            },
            success: function (r) {
                get_diag()
            }
           });
        }
        function hapus_prosedur(id) {
           $.ajax({
            type: "get",
            url: "{{url('api/delProsedur')}}/"+id,
            dataType: "json",
            error: function(){
                neko_d_custom_error('Kesalahan Gagal Dihapus')
            },
            success: function (r) {
                get_pro()
            }
           });
        }

        function get_diag(){
            const reg = $("[name='soapdok_reg']").val()

            $('[id*="selected-diagnosa-"]').html('')
            
            $.ajax({
                type: "get",
                url: "{{url('api/getDiagnosa')}}/"+ reg.replaceAll("/","_"),
                dataType: "json",
                success: function (r) {
					$.each(r, function(index, row) {
                        $('[id="selected-diagnosa-'+row.pdiag_kategori+'"]').append(`
                            `+row.ID_ICD10+` | `+row.NM_ICD10+` 
                            `+($user_dokter_ == $id_dpjp ? '<div type="button" class="badge badge-danger" onclick="hapus_diag('+row.pdiag_id+')">X</div>' : '')+`
                            <br>
                        `)
					});
                }
            });
        }
        function get_pro(){
            const reg = $("[name='soapdok_reg']").val()
            $.ajax({
                type: "get",
                url: "{{url('api/getProsedur')}}/"+ reg.replaceAll("/","_"),
                dataType: "json",
                success: function (r) {
                    var opt = '';
                    let idx = 1;
					$.each(r, function(index, row) {
                        let txt = idx++
                        if (txt == 1) {
                            opt += '<li>[' + row.ID_TIND + '] ' + row.NM_TINDAKAN + '<span class="badge badge-danger" onclick="hapus_prosedur('+row.pprosedur_id+')" style="cursor:pointer">X</span></li>';
                        }else{
                            opt += '<li>[' + row.ID_TIND + '] ' + row.NM_TINDAKAN + ' <span class="badge badge-danger" onclick="hapus_prosedur('+row.pprosedur_id+')" style="cursor:pointer">X</span></li>';
                        }
						
					});
					$('#selected_prosedur').html(opt);
                }
            });
        }

        function pilih_diag(category = '', value = '') {
            const id = value
            const reg = $("[name='soapdok_reg']").val()
            const dokter = "{{ auth()->user()->dokter_id}}";
            $.ajax({
                type: "post",
                url: "{{url('api/addDiagnosa')}}",
                data: {
                    "reg": reg.replaceAll("/","_"),
                    "diagnosa": id,
                    "pdiag_dokter":dokter,
                    'pdiag_kategori': category,
                    'dpjp_utama': $id_dpjp,
                },
                dataType: "json",
                error:function(){
                    neko_d_custom_error('Kesalahan Gagal Ditambah')
                },
                success: function (r) {
                    if(r.success == true){
                        get_diag()
                    } else if (r.message) {
                        neko_d_custom_error(r.message)
                    } else{
                        neko_d_custom_error('Diagnosa '+category+' Sudah Ada')
                    }
                }
            });
        }
        function pilih_pro() {
            const id = $('#select-prosedur').val()
            const reg = $("[name='soapdok_reg']").val()
            $.ajax({
                type: "post",
                url: "{{url('api/addProsedur')}}",
                data: {
                        "reg": reg.replaceAll("/","_"),
                        "prosedur": id,
                        "pprosedur_dokter":"{{ auth()->user()->dokter_id}}",
                    },
                dataType: "json",
                error:function(){
                    neko_d_custom_error('Kesalahan Gagal Ditambah')
                },
                success: function (r) {
                    if(r.success == true){
                        get_pro()
                    }else{
                        neko_d_custom_error('Diagnosa Sudah Ada')
                    }
                }
            });
        }
        
        function icd10(_id = '', category = '') {
            $(_id).select2({
                ajax: {
                    url: "{{url('api/sphaira/icd10')}}",
                    type: 'GET',
                    data: function(params){
                        return {
                            searchParams: params.term,
                            category: category 
                        }
                    },
                    processResults: function(resp){
                        return {
                            results:  $.map(resp.data, function (data) {
                                return {
                                    text: data.ID_ICD10+ ' -- ' +data.NM_ICD10,
                                    id: data.ID_ICD10
                                }
                            })
                        }
                    },
                }
            })
        }
        function icd9(_id = '#select-prosedur') {
            $(_id).select2({
                ajax: {
                    url: "{{url('api/sphaira/icd9')}}",
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
                                    text: data.ID_TIND+ ' -- ' +data.NM_TINDAKAN,
                                    id: data.ID_TIND
                                }
                            })
                        }
                    },
                }
            })
        }
        function loadCPOE(){
            var levelUser="{{Auth::user()->level_user}}";
            var id_cppt = $('#soapdok_id').val()
            if(levelUser=="dokter"){
                $.ajax({
                    url: "{{ route('get.cpoe.dokter') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        "id_cppt": id_cppt,
                    },
                    success: function (data) {
                        var dataLab= data.dataLab
                        var dataradiologi = data.dataradiologi
                        var datafisio=data.datafisio
                        var dataobat=data.dataobat
                        var planning=""
                        for(var i=0; i<dataLab.length; i++){
                            planning +="<div> <b>(Lab)</b> "+dataLab[i].item_name+"\n"+"</div>"
                        }

                        for(var i=0; i<dataradiologi.length; i++){
                            planning +="<div> <b>(Rad)</b> "+dataradiologi[i].item_name+"\n"+"</div>"
                        }

                        for(var i=0; i<datafisio.length; i++){
                            planning +="<div><b >(Fisio)</b> "+datafisio[i].item_name+"\n"+"</div>"
                        }

                        for(var i=0; i<dataobat.length; i++){
                            planning +="<div>< b>(Obat)</> "+dataobat[i].item_name+"\n"+"</div>"
                        }

                        $('#planning_').html(planning).val(planning)
                    }
                })
            }
        }
    </script>
    <script>
        function simpanCppt(){
            var form = $('#form-cppt')[0];

            let assesment_to_store = ''

            $('[id*="selected-diagnosa-"]').each(function(i, item){
                let assesment_text =  $(item).clone()  // Clone the element
                    .children('span').remove()          // Remove the <span>
                    .end()                              // Return to the cloned element
                    .text()                             // Get the text content
                    .trim()

                if (assesment_text) {
                    assesment_to_store += assesment_text +' <br>'
                }
            })
            
            // var data = new FormData(form);

            $.ajax({
                url: "{{ route('add.soap.dokter') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "soapdok_id": $('#soapdok_id').val(),
                    "soapdok_subject": $('#subject').val(),
                    "soapdok_object": $('#object').val(),
                    "soapdok_assesment": assesment_to_store,
                    "soapdok_planning": $('#planning_').html(),
                    "soapdok_instruksi": $('#instruksi').val(),
                    "soapdok_dokter":"{{ auth()->user()->dokter_id}}",
                    "nama_ppa":"{{ auth()->user()->name}}",
                    "id":"{{ auth()->user()->id}}",

                },
                beforeSend: function(){
                    $('[id="actionButtonCPPTDokter"]').html(`
                        <button type="button" class="btn btn-warning" disabled><i class="fas fa-spinner fa-spin"></i> Proses data</button>
                    `)
                },
                success: function (data) {
                    $('[id="actionButtonCPPTDokter"]').html(`
                        <button type="button"  class="btn btn-success" id="btn-save-soapdok" onclick="simpanCppt()">Simpan CPPT</button>
                    `)
                    if(data.success == true){
                        $('#modalSOAP').modal('hide');
                        getSoapDokter()
                        clickTab('soap')
                    } else if (!data.lab.success) {
                        Swal.fire({
                            title: 'Gagal kirim order lab',
                            text: data.lab.message+', mohon hubungi Tim Administrator',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    } else if (!data.rad.success) {
                        Swal.fire({
                            title: 'Gagal kirim order radiologi',
                            text: data.rad.message+', mohon hubungi Tim Administrator',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    } else{
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Data CPPT gagal disimpan',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                }
            })
        }

        function getOtherInstructions(_type, _elm){
            $.ajax({
                url: '{{url("")}}/api/getOtherInstructions',
                type: 'get',
                data: {
                    params: [
                        {key: 'reg_no', value: $reg},
                        {key: 'id_cppt', value: $id_cppt},
                    ]
                },
                success: function(resp){
                    $.each(resp, function(i, item){
                        $('[id="panel-'+_type+'"] textarea').val(item.instruksi)
                    })
                }
            })
        }

        function sendOtherInstructions(_type, _elm){
            let instruksi = $('[id="panel-'+_type+'"] textarea').val()

            $.ajax({
                url: '{{url("")}}/api/sendOtherInstructions',
                type: 'post',
                beforeSend: function(){
                    $(_elm).html(`
                        <i class="fas fa-spinner fa-spin"></i> Memproses data
                    `).attr('disabled', true)
                },
                data: {
                    _token: '{{csrf_token()}}',
                    reg_no: $reg,
                    dokter_code: $user_dokter_,
                    type: _type,
                    instruksi: instruksi,
                    id_cppt: $id_cppt
                },
                success: function(resp){
                    if (resp.success) {
                        alert(resp.message)

                        getOtherInstructions(_type, _elm)
                    } else {
                        alert(resp.message)
                    }

                    $(_elm).html(`
                        <i class="fas fa-check"></i> Kirim data
                    `).attr('disabled', false)
                }
            })
        }
    </script>

@endpush
