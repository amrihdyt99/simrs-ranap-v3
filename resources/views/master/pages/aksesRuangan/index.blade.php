@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

<style>
    .new_table tr th{
        padding: 10px !important;
    }
    .new_table tr td{
        padding: 5px !important;
    }
    .new_table {
        color: black !important
    }
</style>

@section('nyaa_content_header')
    <div class="row">
        <div class="col-12">
            <p>Data Master - Manajemen Ruangan</p>
        </div>
    </div>
@endsection

@section('nyaa_content_body')
    <div class="row mb-2">
        <div class="col-sm pb-3">
            <button type="button" class="protecc btn btn-sm btn-success float-right" onclick="tambahData()">
                <i class="fas fa-plus"></i> Tambah Data Baru
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table id="tableData" class="table w-100 table-striped new_table">
                <thead class="font-weight-bold">
                    <tr class="bg-warning">
                        <th>No</th>
                        <th>Nama PPA</th>
                        <th>Kategori</th>
                        <th>Akses Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @include('master.pages.aksesRuangan.create')
@endsection

@push('nyaa_scripts')
    <script>
        var modal = '#modalData'
        var table = '[id="tableData"]'
        var form = '#f-data'
        var dataArray = []
        var idGlobal = ''
        var mainUri = '{{url("")}}/master/aksesRuangan'

        load_data()
        getRuangan()

        $('[id="mainAksesRuangan"]').hide()

        function getRuangan(){
            $.ajax({
                url: '{{url("")}}/api/getserviceunitlantai',
                type: 'get',
                success: function(resp){
                    $('[name="ruangan"]').html('')

                    $.each(resp, function(i, item){
                        $opt_header = ''

                        if (i == 0) {
                            $opt_header = '<option value="">-- Pilih nama ruangan/lantai --</option>'
                        }

                        $opt = $opt_header+`
                            <option value="`+item.ServiceUnitCode+`">`+item.ServiceUnitName+`</option>
                        `

                        $('[name="ruangan"]').append($opt)
                    })
                }
            })
        }

        function load_data() {
            $.ajax({
                url: mainUri+'/data',
                type: 'get',
                beforeSend: function(){
                    $(table+' tbody').html(`
                        <tr>
                            <td colspan="5" class="text-center">Memuat data...</td>    
                        </tr>
                    `)
                },
                success: function(resp){
                    if (resp.length > 0) {
                        let content = ''

                        dataArray = resp

                        $.each(resp, function(i, item){
                            let access_room = ''

                            $.each(item.ParamedicAccessRoom, function(sub_i, sub_item){
                                access_room += `
                                    <span class="badge badge-primary badge-lg">`+sub_item.ServiceId+` - `+sub_item.ServiceName+`</span>
                                    <br><br>
                                `
                            })
                            
                            content += `
                                <tr>
                                    <td>`+(i + 1)+`</td>
                                    <td>`+item.ParamedicName+`</td>
                                    <td>`+item.ParamedicTypeName+`</td>
                                    <td>`+access_room+`</td>
                                    <td>
                                        `+actionButton(item.id)+`   
                                    </td>
                                </tr>
                            `
                        })

                        $(table+' tbody').html(content)
                    } else {
                        $(table+' tbody').html(`
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>    
                            </tr>
                        `)
                    }

                    $(table).dataTable()
                }
            })
        }

        function actionButton(_id){
            return `
                <button type="button" class="btn btn-warning btn-sm" onclick="editData(`+_id+`)"><i class="fas fa-edit"></i></button>    
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusData(`+_id+`)"><i class="fas fa-trash"></i></button> 
            `
        }

        function tambahData(){
            $(modal).modal('show')
            emptyForms()

            idGlobal = ''
        }

        function editData(_id){
            idGlobal = _id

            let data = dataArray.find(obj => obj.id == _id)

            $(modal).modal('show')

            $('[id="mainAksesRuangan"]').show()

            $('[name="paramedic_type"][value="'+data.ParamedicType+'"]').attr('checked', true)
            
            $(document).ready(function(){
                getParamedis('[name="paramedis"]', '{{url("")}}/master/base/paramedic', {paramedic_type: data.ParamedicType})

                addOption('[name="paramedis"]', data.ParamedicCode, data.ParamedicName)
            })

            let access_room = ''

            $.each(data.ParamedicAccessRoom, function(i, item){
                access_room += templateTakeRuangan(item.ServiceId, item.ServiceName)
            })

            $('[id="tableSelectedRuangan"] tbody').html(access_room)
        }

        function hapusData(_id){
            if (confirm('Apakah anda yakin akan menghapus data ini ?')) {
                $.ajax({
                    url: mainUri+'/delete',
                    type: 'post',
                    data: {
                        _token: $('[name="_token"]').val(),
                        params: [
                            {key: 'id', value: _id}
                        ]
                    },
                    success: function(resp){
                        if (resp.code == 200) {
                            alert(resp.message)
                            load_data()
                            emptyForms()
                        } else {
                            alert(resp.message)
                        }
                    }
                })
            }
        }

        function simpanData(){
            $.ajax({
                url: mainUri+'/store',
                type: 'post',
                data: $(form).serialize()+'&idGlobal='+idGlobal,
                success: function(resp){
                    if (resp.code == 200) {
                        alert(resp.message)
                        load_data()
                        emptyForms()
                        $(modal).modal('hide')
                    } else {
                        alert(resp.message)
                    }
                }
            })
        }

        function emptyForms(){
            $(form+' input[type="radio"]').attr('checked', false).change()
            $(form+' input[cases="admit"]').val('')
            $(form+' [name="paramedis"]').val('').trigger('change')
            $(form+' [id="tableSelectedRuangan"] tbody').html('')
            $('[id="mainAksesRuangan"]').hide()
        }

        $('[name="paramedic_type"]').change(function(){
            let type = $(this).val()

            $(document).ready(function(){
                getParamedis('[name="paramedis"]', '{{url("")}}/master/base/paramedic', {paramedic_type: type})
            })

            $('[id="mainAksesRuangan"]').show()
        })

        function getParamedis(_elm, _url, _data){
            $(_elm).select2({
                placeholder: 'Pilih nama paramedis',
                ajax: {
                    url: _url,
                    dataType: 'json',
                    delay: 250,
                    data: function (q) {
                        return $.extend({}, _data, {
                            params: q.term // istilah pencarian dari pengguna
                        })
                    },
                    processResults: function (data) {
                        // Memproses hasil yang diterima dari API
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.ParamedicCode,
                                    text: item.ParamedicName // Sesuaikan dengan struktur datamu
                                };
                            })
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2, // Jumlah karakter minimal sebelum pencarian dilakukan
            });
        }

        function takeRuangan(_elm){
            let value = $(_elm).val()
            let text = $(_elm).find(':selected').text()
            let check = $('[id="rowSelectedRuangan"][data-code="'+value+'"]').length

            if (check < 1) {
                $('[id="tableSelectedRuangan"] tbody').append(templateTakeRuangan(value, text))
            }
        }

        function templateTakeRuangan(_value, _text){
            return `
                <tr id="rowSelectedRuangan" data-code="`+_value+`">
                    <td>
                        <input type="hidden" value="`+_value+`" name="selected_ruangan[]">
                        `+_text+`    
                    </td> 
                    <td>
                        <span type="button" onclick="removeRuangan('`+_value+`')"><i class="fas fa-trash text-danger"></i></span>    
                    </td>   
                </tr>
            `
        }

        function removeRuangan(_code){
            $('[id="rowSelectedRuangan"][data-code="'+_code+'"]').remove()
        }
    </script>
@endpush
