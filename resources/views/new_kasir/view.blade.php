@extends('kasir/layout/master')
@section('title', 'List Tagihan')

<style>
    .table-r td {
        padding: 0.3rem 0.5rem !important;
        font-size: 15px !important;
        vertical-align: middle !important;
        white-space: nowrap;
    }

    .table-r th {
        padding: 0.3rem 2.5rem !important;
        font-size: 16px !important;
        vertical-align: middle !important;
        text-align: start !important;
    }

    .table-r thead,
    .table-r .r-service-cat {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    .table-r .r-subtotal {
        border-bottom: 1px solid black;
    }

    .form-group {
        border-bottom: 1px rgba(0, 0, 0, 0.418) solid !important;
        padding-bottom: 0px;
        margin-bottom: 14px !important;
    }

    .form-group h3 {
        color: black;
        font-size: 18px;
        font-weight: 600;
    }

    @-webkit-keyframes blinker {
        from {
            opacity: 1.0;
        }

        to {
            opacity: 0.0;
        }
    }

    .blink {
        text-decoration: blink;
        -webkit-animation-name: blinker;
        -webkit-animation-duration: 1s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-timing-function: ease-in-out;
        -webkit-animation-direction: alternate;
    }

    #pay-method input {
        border: none !important;
        border-bottom: black solid 1px !important;
    }

    #pay-method ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: rgb(102, 102, 102);
        opacity: 1;
        /* Firefox */
        text-transform: uppercase;
        font-style: italic;
    }

    .form-group {
        border: none !important;
    }

    .form-group input {
        border: none !important;
        border-bottom: 1px solid black !important;
    }

    .card {
        color: black !important
    }

    #selecting_items {
        width: 15px !important;
        height: 15px !important;
    }

    .card_order {
        height: fit-content !important;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 50px;
        height: 50px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #7a7a7a;
        border-color: #7a7a7a transparent #7a7a7a transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .tab-tagihan {
        width: fit-content;
        height: 40px;
        background-color: #fcd53b;
        padding: 8px;
        border-radius: 5px;
        color: black !important;
    }

    .equal-height {
        display: flex;
    }

    .equal-height>[class*='col-'] {
        display: flex;
        flex-direction: column;
    }
</style>

@section('content')
<div class="row">
    <div class="col-lg-2 pr-0">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <h6>No Rekam Medis</h6>
                    <h3>{{$pasien->reg_medrec}}</h3>
                </div>
                <div class="form-group">
                    <h6>Tanggal Kunjungan</h6>
                    <h3 id="bill_tgl_kunjungan">{{ Carbon\Carbon::parse($pasien->reg_tgl)->format('d/m/Y') }}</h3>
                </div>
                <div class="form-group">
                    <h6>Nama Pasien</h6>
                    <h3 id="bill_nama">{{ $pasien->PatientName }}</h3>
                </div>
                <div class="form-group">
                    <h6>Tanggal Lahir</h6>
                    <h3 id="bill_tgl_lahir">{{ $pasien->DateOfBirth }}</h3>
                </div>
                <div class="form-group">
                    <h6>Jenis Kelamin</h6>
                    <h3 id="bill_jk">{{ $pasien->GCSex == "0001^F" ? "Perempuan" : "Laki-Laki" }}</h3>
                </div>
                <div class="form-group">
                    <h6>DPJP Utama</h6>
                    <h3 id="bill_dpjp">{{ $pasien->ParamedicName }}</h3>
                </div>
                <div class="form-group">
                    <h6>Poliklinik</h6>
                    <h3 id="bill_poli">{{ $pasien->ServiceUnitName ?? '-' }}</h3>
                </div>
                <div class="form-group">
                    <h6>Diagnosa</h6>
                    <h3 id="bill_diagnosis">{{ $diagnosis->NM_ICD10 ?? '-' }}</h3>
                </div>
                <div class="form-group">
                    <h6>Jenis Kunjungan</h6>
                    <h3 id="bill_jenis_kunj">{{ $pasien->reg_status ?? '-' }}</h3>
                </div>
                <div class="form-group">
                    <h6>Payer</h6>
                    <h3 id="bill_payer">{{ $pasien->reg_corp ?? '-' }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10 pl-1">
        <div class="card">
            <div class="card-body">
                <div id="panel-ppoli">
                    <div class="row">
                        <div class="col">
                            <div class="text-header-panel">
                                List Tagihan Pasien |
                                No Registrasi : <strong>{{$reg_rj}}</strong> |
                                Status: <span class="font-weight-bold badge p-2 blink" id="status-tagihan">-</span> |
                                Kunjungan: <u><span class="font-weight-bold" id="bill_jenis_kunj">-</span></u>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="tab-tagihan text-left float-left mb-3">Tagihan : <b><span id="validasi-tagihan">Rp. 0</span></b></div>
                                </div>
                                <div class="col d-flex justify-content-end gap-1">
                                    <button class="btn btn-primary mb-3" id="btn-add-item"><i class="fas fa-plus"></i> Tambah Item</button>
                                    <button class="btn btn-info mb-3 mr-1" onclick="getDataOrder()"><i class="fas fa-redo"></i> Reload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="not_review bg-danger px-4 mr-2"></small> : Belum review | <i class="fas fa-check fa-lg text-success"></i> : Item ditagihkan
                            <span class="float-right"><input type="checkbox" id="selecting_items" data-category="all" data-source="all"> Pilih semua item</span>
                        </div>
                    </div>

                    <div class="table-responsive">
                        {{-- <div id="panel-order" class="row equal-height"></div> --}}
                        <table width="100%" class="table-r mt-5" id="panel-order">
                            <thead>
                                <tr class="float-left">
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Tarif Awal</th>
                                    <th>Tarif</th>
                                    <th>User Order</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center">Memuat data...</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="not_review_transactions"></div>
                        <br>
                        <div id="action_button">
                            <button id="btn_open_invoice" class="btn btn-danger float-right mb-3 mx-1">OPEN INVOICE</button>
                            <button id="btn-cetak-invoice" class="btn btn-success float-right mb-3 mx-1">CETAK INVOICE</button>
                            <button id="btn-cetak-summary" class="btn btn-secondary float-right mb-3 mx-1">CETAK SUMMARY</button>
                            <button id="btn-kwitansi" class="btn btn-warning float-right mb-3 mx-1">CETAK KWITANSI</button>
                            <button id="btn-validasi-billing" class="btn btn-info float-right mb-3">KONFIRMASI PEMBAYARAN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('new_kasir.modal.validasi')
@include('new_kasir.modal.konfirmasi_hapus')
@include('new_kasir.modal.review')
@include('new_kasir.modal.kwitansi')
@include('new_kasir.modal.payer')
@include('new_kasir.modal.entry_order')
@include('new_kasir.modal.open_invoice')
@include('new_kasir.modal.detail_invoice')
{{-- @include('dokter.modal.detail_tindakan') --}}

@endsection

@section('scripts')
<script>
    var $reg = "{{$reg_no}}";
    var $reg_RJ = "{{$reg_rj}}";
    var classcode = "{{$pasien->charge_class_code}}"
    var $reg_no = $reg.replace(/\//g, '_')
    var modal = '#modalEntryOrder'

    var orders = []
    var selected_orders = []
    var payment_method = []
    var reviews = []
    var selected_orders_radiology = []

    var total = 0
    var difference = 0
    var remain = 0
    var sum_nominal = 0

    var payer = ''

    $(document).ready(function() {
        getPayer()
    });

    $('body').on('click', '#btn-validasi-billing', function() {
        $('#modalValidasiBayar').modal('show');
        $('#input-validation-store').prop('checked', false);
        $('#btn-save-validasi').prop('disabled', true);
    })

    $('#btn-add-item').click(function() {
        $('#modalEntryOrder').modal('show');
    });

    $('#action_button').hide()
    $('#action_button button[id*="btn"]').hide()

    $(async function() {
        $.ajax({
            type: "POST",
            url: "{{ route('tarif.tindakanbaru') }}",
            data: {
                "type": "X0001^01",
                "class": classcode,
                "reg": $reg
            },
            beforeSend: function() {
                $('[id="select-tindakan-lain"]').hide()
                $('[id="loadTindakan"]').html('<br><br><i class="fas fa-spinner fa-spin"></i> Memuat data')
            },
            success: function(data) {

                $('[id="select-tindakan-lain"]').show()
                $('[id="loadTindakan"]').html('')
                var dataJSON = data.data;
                var opt = '<option value="" >Pilih tindakan</option>';
                $.each(dataJSON, function(index, row) {
                    opt += '<option value="' + row.ItemCode + '" data-id="' + row.ItemCode + '" data-type="lainnya" data-name="' + row.ItemName1 + '" data-price="' + row.PersonalPrice + '">' + row.ItemCode + ' - ' + row.ItemName1 + '</option>';
                });
                $('#select-tindakan-lain').html(opt);
                $('#select-tindakan-lain').select2({
                    dropdownParent: $('#modalEntryOrder')
                });

                // Initialize Select2 after populating options
                //console.log(data.data);
                //let html = document.getElementById("panel-nursing").innerHTML = data;
            },
        });
    });


    function getItem($type = '') {
        $.ajax({
            type: "POST",
            url: "{{ route('tarif.tindakanbaru') }}",
            data: {
                "type": "X0001^01",
                "class": classcode,
                "reg": regno
            },

            success: function(data) {
                console.log(data)
                if ($type == 'LAB') {
                    $sub_type = 'Laboraturium';
                } else if ($type == 'RAD') {
                    $sub_type = 'Radiologi';
                } else if ($type == 'LAIN') {
                    $sub_type = 'lainnya';
                }

                $('.cpoe_item').attr('id', 'cpoe_tindakan_' + $sub_type);
                $('#cpoe_tindakan_' + $sub_type).select2();

                $.each(resp, function(i, data) {
                    $opt = `
                            <option class="opt_cpoe" value="` + data.ItemUId + `" data-price="` + data.PersonalPrice + `" data-type="` + data.cpoe_jenis + `">` + data.ItemName1 + `</option>
                        `;

                    $('#cpoe_tindakan_' + $sub_type).append($opt).trigger('change');
                });
            },
        });
    }

    $('.cpoe_item').change(function() {
        $price = $(this).find(":selected").data('price');
        $type = $(this).find(":selected").data('type');
        $name = $(this).find(":selected").text();

        $('.cpoe_tarif').val('');
        $('.cpoe_tarif').val(parseFloat($price).toFixed(2));
        $('.cpoe_types').val('');
        $('.cpoe_types').val($type);
        $('[name="cpoe_nama"]').val('');
        $('[name="cpoe_nama"]').val($name);
    });

    $('#btn-entry-order').click(function() {
        $tindakan = $('[class="cpoe_item"]').val();

        if ($tindakan == '') {
            alert('Tidak ada order tindakan yang dipilih');
        } else {
            $.ajax({
                url: `{{route('order.tindakan')}}`,
                type: 'POST',
                dataType: 'json',
                data: $('#form-entry-order').serialize(),
                success: function(resp) {
                    if (resp.success == true) {
                        alert(resp.message)

                        $(modal).modal('hide')
                        getDataOrder()
                    } else {
                        alert(resp.message)
                    }
                    // if (resp == 404) {
                    //     alert('Anda tidak punya akses untuk menyimpan asesmen');
                    // } else {
                    //     //alert('Data SOAP berhasil disimpan');
                    //     //$('#modalSOAP').modal('hide');
                    //     //latestSoapdok($subs, '#table-cppt-perawat');
                    //     //orderCPOE();
                    // }
                }
            });
        }
    });

    function selectTindakan(_elm) {
        let value = $(_elm).find(':selected').attr('data-name')

        $('[name="cpoe_nama[]"]').val(value)
    }

    function getPayer(_elm = 'multi_payer') {
        $.ajax({
            url: '{{url("")}}/nyx-sistem/select2/businesspartner',
            success: function(resp) {
                $('[id="' + _elm + '"]' + ' [class="optPayer"]').remove()

                $.each(resp.results, function(i, item) {
                    $opt = `
                        <option class="optPayer" value="` + item.id + `">` + item.text + `</option>
                    `

                    $('[id="' + _elm + '"]').append($opt)
                })

                $('[id="' + _elm + '"]').select2({
                    dropdownParent: $('#modalValidasiBayar'),
                })
            }
        })
    }

    getDataOrder()

    function getDataOrder() {
        orders = []
        selected_orders = []
        payment_method = []
        reviews = []

        total = 0
        difference = 0
        remain = 0
        sum_nominal = 0

        // getItem('LAIN')

        $('[id*="selecting_items"]').prop('checked', false)

        $.ajax({
            url: "{{url('')}}/kasir/billing/detail_order",
            type: "get",
            data: {
                reg_ri: '{{$reg_no}}',
                reg_rj: '{{$reg_rj}}',
                class: classcode,
            },
            beforeSend: function() {
                $('[id="panel-order"] tbody').html(`
                    <tr>
                        <td colspan="7" class="text-center"><div class="lds-dual-ring"></div></td>    
                    </tr>
                `)
            },
            success: function(resp) {
                $('#load_action_button').hide()
                $('[id="panel-order"] tbody').html('')

                if (resp) {
                    $.each(resp.order, function(i, item) {
                        $('[id="panel-order"] tbody').append(`
                            <tr class="bg-warning">
                                <td colspan="7"><b>` + item.source + `</b></td>    
                            </tr>
                        `)

                        $.each(item.data, function(sub_i, sub_item) {
                            sub_item.ItemSource = item.source
                            orders.push(sub_item)

                            $tindakan = sub_item.ItemTindakan.replace(/ /g, '_')
                            $tindakan = $tindakan.toLowerCase()

                            $count_header = $(`[id="order_header_` + $tindakan + `"][data-source="` + item.source + `"]`).length

                            $row_header = `
                                ` + (i != 0 ? `<tr><td colspan="7"><br></td></tr>` : ``) + `
                                <tr id="order_header_` + $tindakan + `" data-source="` + item.source + `">
                                    <td class="text-capitalize"><b>` + sub_item.ItemTindakan + `</b></td> 
                                    <td><input type="checkbox" id="selecting_items" class="float-right" value="all" data-category="` + sub_item.ItemTindakan + `" data-source="` + item.source + `" style="transform: scale(1.2)"></td>   
                                </tr>
                            `

                            if ($count_header < 1) {
                                $('[id="panel-order"] tbody').append($row_header)
                            }

                            $review = ''
                            $class = ''
                            reviews = []
                            if (sub_item.ItemReview == 0) {
                                $class = 'bg-danger text-white p-2'

                                reviews.push({
                                    'name': data,
                                    'count': 1
                                })
                            }

                            $btn = ''
                            if (($level_ == 'admin' || $level_ == 'kasir') && sub_item.ItemTindakan == 'lainnya') {
                                $btn = `<span type="button" onclick="deleteItem('` + sub_item.ItemOrder + `')"><i class="fas fa-trash text-danger"></i></span>`
                            }

                            $row_detail = ` 
                                <tr class="` + $class + `" data-source="` + item.source + `">
                                    <td class="text-capitalize"></td>   
                                    <td>
                                        <span id="checked_status" style="margin-right: 10px" value="` + sub_item.ItemUId + `" data-code="` + sub_item.ItemCode + `" data-id="` + sub_item.ItemOrder + `">
                                            <input type="checkbox" id="selecting_items" class="float-right" value="` + sub_item.ItemUId + `" data-category="` + sub_item.ItemTindakan + `" data-source="` + item.source + `" style="transform: scale(1.2)">
                                        </span>
                                        ` + sub_item.ItemName1 + `
                                    </td>     
                                    <td>` + sub_item.ItemJumlah + `</td>     
                                    <td>Rp. ` + formatNumber(parseFloat(sub_item.ItemTarifAwal).toFixed(2)) + `</td>     
                                    <td>Rp. ` + formatNumber(parseFloat(sub_item.ItemTarif).toFixed(2)) + `</td>     
                                    <td>` + sub_item.ItemDokter + `</td>     
                                    <td class="p-3">
                                        ` + $btn + `    
                                    </td>
                                </tr>
                            `

                            $('[id="panel-order"] tbody').append($row_detail)
                        })
                    })

                    getStatusTagihan()

                    if (resp.validation) {
                        $('[id*="selecting_items"]').hide()
                        $.each(JSON.parse(resp.validation.pvalidation_selected), function(i, data_selected) {
                            console.log(data_selected)
                            $('[id="checked_status"][data-code="' + data_selected.ItemCode + '"][data-id="' + data_selected.ItemOrder + '"]').html('<i class="fas fa-check fa-lg float-right text-success"></i>')
                        })


                        total = resp.validation.pvalidation_total
                    } else {
                        $('[id*="selecting_items"]').show()
                    }

                    $('[id="validasi-tagihan"]').html('Rp. ' + formatNumber(formatNumber(parseFloat(total).toFixed(2))))
                } else {
                    $('[id="panel-order"] tbody').html(`
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data order</td>    
                        </tr>
                    `)
                }
            }
        })
    }

    function deleteItem(id_order) {

        if (confirm('Apakah anda yakin akan menghapus item ini ?')) {
            let inputCode = prompt("Peminta")
            let inputRequester = prompt("Alasan")

            if (inputCode && inputRequester) {
                $.ajax({
                    url: '{{url("kasir/billing/deleteItem")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: $('[name="_token"]').val(),
                        item_kode: id_order,
                        item_jenis: 'lainnya',
                        item_peminta: inputCode,
                        item_alasan: inputRequester,
                    },
                    success: function(resp) {
                        getDataOrder()
                        orders = []
                        selected_orders = []
                        payment_method = []
                        reviews = []
                        selected_orders_radiology = []

                        total = 0
                        difference = 0
                        remain = 0
                        sum_nominal = 0
                    }
                })
            } else {
                alert('Kolom inputan harus diisi')
            }
        }
    }

    $('body').on('change', '#selecting_items', function() {
        let category = $(this).data('category')
        let value = $(this).val()
        let source = $(this).data('source')

        $host = location.hostname

        if (this.checked == true) {
            if (category == 'all') {
                selected_orders = []
                $object = orders

                $('#selecting_items:not([data-category="all"])').prop('checked', true)
            } else {
                if (value == 'all') {
                    $('#selecting_items[data-category="' + category + '"][data-source="' + source + '"]').prop('checked', true)

                    $object = orders.filter(element => element.ItemTindakan == category && element.ItemSource == source)
                } else {
                    if ($host == '127.0.0.1' || $host == 'rj.id') {
                        // value = parseInt(value)
                    }

                    $object = orders.filter(element => element.ItemUId == value)
                }
            }

            $.each($object, function(i, data) {
                selected_orders = selected_orders.filter(function(item) {
                    return item.ItemUId !== data.ItemUId;
                });

                selected_orders.push(data)
            })
        } else {
            if (category == 'all') {
                selected_orders = []

                $('#selecting_items:not([data-category="all"])').prop('checked', false)
            } else {
                selected_orders = selected_orders.filter(function(item) {
                    if (value == 'all') {
                        $('[id="selecting_items"][data-category="' + category + '"][data-source="' + source + '"]').prop('checked', false)

                        return item.ItemTindakan !== category || item.ItemSource !== source;
                    } else {
                        $('[id="selecting_items"][value="all"][data-category="' + category + '"][data-source="' + source + '"]').prop('checked', false)

                        if ($host == '127.0.0.1' || $host == 'rj.id') {
                            // value = parseInt(value)
                        }

                        return item.ItemUId !== value;
                    }
                });
                $('[id*="selecting_items"][data-category="all"]').prop('checked', false)
            }
        }

        console.log(selected_orders)

        total = selected_orders.reduce((acc, o) => acc + (parseFloat(o.ItemTarif) * parseFloat(o.ItemJumlah)), 0)

        $('[id="validasi-tagihan"]').html('Rp. ' + formatNumber(formatNumber(parseFloat(total).toFixed(2))))
    })

    // getDataPasien();
    function getDataPasien() {
        $.ajax({
            url: '{{url("auth/api/kasir/data")}}',
            type: 'GET',
            dataType: 'json',
            data: {
                _token: "{{csrf_token()}}",
                reg_no: $reg,
            },
            success: function(resp) {
                if (Object.keys(resp).length > 0) {
                    var res = resp[0];

                    if (res.reg_jk == '0001^M') {
                        $jk = 'Laki-laki';
                    } else if (res.reg_jk == '0001^F') {
                        $jk = 'Perempuan';
                    }

                    $tgl_lahir = moment(res.reg_tgl_lahir).format('DD/MM/Y');

                    $('#bill_nama').text(res.reg_nama);
                    $('#bill_medrec').text(res.reg_medrec);
                    $('#bill_tgl_lahir').text($tgl_lahir);
                    $('#bill_jk').text($jk);
                    $('#bill_umur').text(getAge($tgl_lahir));
                    $('#bill_tgl_kunjungan').text(res.reg_tgl);
                    $('#bill_dpjp').text(res.reg_dokter_nama);
                    $('#bill_poli').text(res.reg_poli);
                    $('[id*="bill_jenis_kunj"]').text(res.reg_status);
                    $('#bill_payer').html(res.payer + ' <span class="badge badge-warning change_payer" style="cursor: pointer">ubah</span>');
                    $('#bill_diagnosis').text(res.id_diagnosa + ' - ' + res.diagnosa);

                    payer = res.payer
                }
            }
        });
    }

    $('body').on('click', '#btn-delete-item', function() {
        $kode = $(this).data('kode');
        $item = $(this).data('item');
        $jenis = $(this).data('jenis');
        $dokter = $(this).data('dokter');


        $('#btn-confirm-deleted').attr('data-kode', $kode);
        $('#btn-confirm-deleted').attr('data-jenis', $jenis);
        $('#btn-confirm-deleted').attr('data-item', $item);
        $('#input-validation-delete').prop('checked', false);
        $('#btn-confirm-deleted').prop('disabled', true);

        $('#modalConfirmDeleted').modal('show');
        $('.confirm-text').html('Apakah anda sudah mengkonfirmasi dengan dokter <b>' + $dokter + '</b> terkait pembatalan item <b>' + $item + '</b> ?');

    });

    $('#input-validation-store').change(function() {
        if (this.checked) {
            $('#btn-save-validasi').prop('disabled', false);
        } else {
            $('#btn-save-validasi').prop('disabled', true);
        }
    });

    // $('#btn-confirm-deleted').click(function(){
    //     $kode = $(this).data('kode');
    //     $item = $(this).data('item');
    //     $jenis = $(this).data('jenis');
    //     $alasan = $('[name="batal_alasan"]').val();

    //     if ($alasan == '') {
    //         alert('Alasan pembatalan harus diisi !')
    //     } else {
    //         $.ajax({
    //             url: '{{url("auth/api/kasir/delete_order")}}',
    //             type: 'POST',
    //             dataType: 'json',
    //             cache: false,
    //             data: {
    //                 _token: '{{csrf_token()}}',
    //                 reg_no: $reg,
    //                 item_kode: $kode,
    //                 item_nama: $item,
    //                 item_jenis: $jenis,
    //                 item_alasan: $alasan,
    //             },
    //             success: function(resp){
    //                 if (resp == 200) {
    //                     window.location.reload();
    //                 } else if (resp == 409) {
    //                     alert('Item tidak bisa dibatalkan karena tagihan sudah dibayarkan');
    //                 } else {
    //                     alert('Gagal membatalkan item');
    //                 }
    //             }
    //         });
    //         $('[name="batal_alasan"]').val('')
    //     }
    // });

    // $('#input-validation-delete').change(function(){
    //     if (this.checked) {
    //         $('#btn-confirm-deleted').prop('disabled', false);
    //     } else {
    //         $('#btn-confirm-deleted').prop('disabled', true);
    //     }
    // });

    $('#btn-review-billing').click(function() {
        $('#modalReview').modal('show');

        $.ajax({
            url: "{{url('auth/api/kasir/data_order')}}",
            type: "POST",
            dataSrc: "",
            data: {
                _token: "{{csrf_token()}}",
                reg_no: $reg,
                review: 1,
            },
            beforeSend: function() {
                $('#table-review-kasir').html('');
            },
            success: function(resp) {
                total = 0;
                $.each(resp, function(i, data) {

                    $row_review = `
                            <tr style="text-align: left" class="r-service-cat">
                                <td colspan="4"><b>Jenis Layanan : ` + data.ItemTindakan + `</b></td>
                            </tr>
                        `;
                    $('#table-review-kasir').append($row_review);

                    subtotal = 0;
                    $.each(data['data'], function(i, item) {
                        $sub_row_review = `
                                <tr style="text-align: left">
                                    <td>` + moment(item.ItemTanggal).format('DD/MM/Y') + `</td>
                                    <td>` + item.ItemName1 + `</td>
                                    <td>` + item.ItemJumlah + `</td>
                                    <td class="text-right">Rp. ` + formatNumber(item.ItemTarif) + `</td>
                                </tr>
                            `;
                        $('#table-review-kasir').append($sub_row_review);

                        subtotal += Number(item.ItemTarif);
                    });

                    $row_subtotal = `
                            <tr>
                                <td colspan="3" class="text-right">Sub Total</td>
                                <td class="text-right">Rp. ` + formatNumber(subtotal) + `</td>    
                            </tr>
                            <tr><td colspan="4"></td></tr>
                            <tr><td colspan="4"></td></tr>
                        `;
                    $('#table-review-kasir').append($row_subtotal);

                    total += subtotal;

                });

                $row_total = `
                        <tr class="text-uppercase font-weight-bold">
                            <td colspan="3">TOTAL</td>
                            <td class="text-right">Rp. ` + formatNumber(total) + `</td>
                        </tr>
                    `;
                $('#table-review-kasir-total').html($row_total);
            }
        });
    });

    $('#btn-save-validasi').click(function() {
        loadingButton('pending', '#btn-save-validasi')

        $check_ = $('body').find('.check_pay_method:checkbox:not(:checked)').length
        $check_amount_ = $('body').find('.amount').val()

        selected_orders_radiology = []

        $radiology = selected_orders.filter(element => element.ItemTindakan === 'Radiologi')

        $.each($radiology, function(i, data) {
            selected_orders_radiology.push(data)
        })

        if (selected_orders.length < 1) {
            alert('Tidak ada tindakan yang di pilih untuk di transaksikan')
        } else {
            if ($check_ > 6) {
                alert('Mohon untuk pilih metode pembayaran')
            } else {
                if ($check_amount_ == '') {
                    alert('Nominal pembayaran harus diisi !')
                } else {
                    $.ajax({
                        url: '{{url("")}}/kasir/billing/store_payment',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': $('[name="_token"]').val(),
                            'reg': $reg,
                            'total': total,
                            'payment_detail': JSON.stringify(payment_method),
                            'selected_orders': JSON.stringify(selected_orders),
                            'selected_radiology': selected_orders_radiology
                        },
                        success: function(resp) {
                            if (resp == 200) {
                                alert('Pembayaran pasien berhasil divalidasi')
                                $('#modalValidasiBayar').modal('hide')
                                getDataOrder()
                                getStatusTagihan()
                                $reg_split = $reg.split('/').join('')
                                // window.open("{{url('auth/billing/invoice')}}/"+$reg_no, '_blank')
                            } else if (resp.status == 500) {
                                alert('Data penunjang paket MCU gagal disimpan')
                            } else {
                                alert('Pembayaran pasien gagal divalidasi')
                            }

                            loadingButton('success', '#btn-save-validasi', 'Ya')
                        },
                        error: function(resp) {
                            console.log(resp);
                        }
                    });
                }
            }
        }
    });

    function getStatusTagihan() {
        $.ajax({
            url: '{{url("")}}/kasir/billing/status',
            type: 'get',
            data: {
                reg_no: $reg,
            },
            success: function(resp) {
                $('#action_button').show()
                $('#action_button button[id*="btn-"]').show()

                if (resp && resp.pvalidation_status && resp.pvalidation_status == 1) {
                    $('#status-tagihan').text('SUDAH DIBAYAR');
                    $('#status-tagihan').addClass('btn btn-success');
                    $('#status-tagihan').removeClass('btn btn-danger');

                    $('#btn-validasi-billing').hide();
                    $('#btn-cetak-invoice').show();
                    $('#btn-cetak-summary').show();
                    $('#btn-kwitansi').show();

                    if (resp.pvalidation_status == 1 && payer == 'BPJS' || $level_ == 'admin') {}
                    $('#btn_open_invoice').show()
                    $('[name="open_id"]').val(resp.id)

                    $('span[onclick*="deleteItem("]').hide()
                } else {
                    $('#status-tagihan').text('BELUM DIBAYAR');
                    $('#status-tagihan').addClass('btn btn-danger');
                    $('#status-tagihan').removeClass('btn btn-success');

                    $('#btn-validasi-billing').show();
                    $('#btn-cetak-invoice').hide();
                    $('#btn-cetak-summary').hide();
                    $('#btn_open_invoice').hide();
                    $('#btn-kwitansi').hide();

                    const sum = reviews.reduce((accumulator, object) => {
                        return accumulator + object.count;
                    }, 0);

                    if (sum > 0) {
                        $('#btn-validasi-billing').hide()
                        $('#not_review_transactions').html('<h5 class="float-left text-left text-danger mt-2">Pembayaran belum bisa diselesaikan, masih ada Item Laboratorium/Radiologi/Obat yang belum selesai <b>di Review</b></h5>')
                    } else {
                        $('#btn-validasi-billing').show()
                        $('#not_review_transactions').html('')
                    }

                    $('span[onclick*="deleteItem("]').show()
                }
            }
        });
    }

    $('body').on('change', '.check_pay_method', function() {

        $count = Math.random().toString(36).slice(2, 7)

        if (this.value == 'Cash') {
            if (this.value == 'Cash' && this.checked) {
                $row_method = '<div id="Cash" class="row_method row_no_' + $count + '">' +
                    '<h5>Metode Pembayaran dipilih : Cash <span id="formated_value" data-count="' + $count + '"></span></h5>' +
                    '<div class="form-group">' +
                    '<input type="text" name="pvalidation_cash" placeholder="Jumlah pembayaran cash" class="form-control amount" data-count="' + $count + '" data-method="' + this.value + '">' +
                    '<input type="hidden" name="pvalidation_cash_change" placeholder="Kembalian" class="form-control change">' +
                    '</div>' +
                    '<hr>' +
                    '</div>';

                $('#pay-method').append($row_method);

            } else {
                $('#Cash').remove();
                $('#row_payment_changes_' + $method).remove()

                removeFromArray($(this).val())
            }
        }

        if (this.value == 'Debit') {
            if (this.value == 'Debit' && this.checked) {
                $row_method = '<div id="Debit" class="row_method row_no_' + $count + '">' +
                    '<h5>Metode Pembayaran dipilih : Debit <span id="formated_value" data-count="' + $count + '"></span></h5>' +
                    '<div class="form-group">' +
                    '<input type="text" name="pvalidation_debit" placeholder="Jumlah pembayaran debit" class="form-control amount" data-count="' + $count + '" data-method="' + this.value + '">' +
                    '</div>' +
                    '<hr>' +
                    '</div>';

                $('#pay-method').append($row_method);

            } else {
                $('#Debit').remove();

                removeFromArray($(this).val())
            }
        }

        if (this.value == 'Virtual Account') {
            if (this.value == 'Virtual Account' && this.checked) {
                $row_method = `<div id="VirtualAccount" class="row_method row_no_` + $count + `">
                                    <h5>Metode Pembayaran dipilih : Virtual Account <span id="formated_value" data-count="` + $count + `"></span></h5>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <input type="text" name="pvalidation_virtual_account_number" placeholder="Nomor Virtual Account" class="form-control" data-count="` + $count + `" data-method="` + this.value + `">    
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="number" name="pvalidation_virtual_account" placeholder="Jumlah pembayaran Virtual Account" class="form-control amount" data-count="` + $count + `" data-method="` + this.value + `">    
                                        </div>
                                    </div>
                                    <hr>
                                </div>`;

                $('#pay-method').append($row_method);

            } else {
                $('#VirtualAccount').remove();

                removeFromArray($(this).val())
            }
        }

        if (this.value == 'Kredit') {
            if (this.value == 'Kredit' && this.checked) {
                $row_method = '<div id="Kredit" class="row_method row_no_' + $count + '">' +
                    '<h5>Metode Pembayaran dipilih : Kredit <span id="formated_value" data-count="' + $count + '"></span></h5>' +
                    '<div class="form-group">' +
                    '<input type="text" name="pvalidation_kredit" placeholder="Jumlah pembayaran kredit" class="form-control amount" data-count="' + $count + '" data-method="' + this.value + '">' +
                    '</div>' +
                    '<hr>' +
                    '</div>';

                $('#pay-method').append($row_method);

            } else {
                $('#Kredit').remove();

                removeFromArray($(this).val())
            }
        }

        if (this.value == 'Transfer') {
            if (this.value == 'Transfer' && this.checked) {
                $row_method = `
                        <div id="Transfer" class="row_method row_no_` + $count + `">
                            <h5>Metode Pembayaran dipilih : Transfer <span id="formated_value" data-count="` + $count + `"></span></h5>
                            <div class="row">
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_bank_pengirim" placeholder="Bank Pengirim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_no_rek_pengirim" placeholder="No Rekening Pengirim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_nama_pengirim" placeholder="Nama Pengirim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_no_referensi" placeholder="No Referensi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_bank_tujuan" placeholder="Bank Tujuan" value="BANK MANDIRI" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_no_rek_tujuan" value="1130044888844 A.n RSUD SITI FATIMAH PROV SUMSEL" placeholder="No Rekening Tujuan" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="date" name="pvalidation_tgl_transfer" placeholder="Tanggal Transfer" value="{{date('Y-m-d')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="form-group">
                                    <input type="text" name="pvalidation_transfer" placeholder="Jumlah pembayaran transfer" class="form-control amount" data-count="` + $count + `" data-method="` + this.value + `">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    `;

                $('#pay-method').append($row_method);

            } else {
                $('#Transfer').remove();

                removeFromArray($(this).val())
            }
        }

        if (this.value == 'Discount Global') {
            if (this.value == 'Discount Global' && this.checked) {
                $row_method = `
                        <div id="DiscountGlobal" class="row_method row_no_` + $count + `">
                            <h5>Metode Pembayaran dipilih : Discount Global <span id="formated_value" data-count="` + $count + `"></span></h5>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="pvalidation_discount" placeholder="Jumlah discount (%)" class="form-control disc" data-count="` + $count + `" data-method="` + this.value + `">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="pvalidation_discount_amount" placeholder="Tagihan Setelah discount" class="form-control amount" data-count="` + $count + `" data-method="` + this.value + `">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="pvalidation_discount_desc" placeholder="Keterangan discount global" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    `;

                $row_discount = `
                        <h6>Total Tagihan Setelah Diskon</h6>
                        <h3 class="font-weight-bold mb-3" id="validasi-tagihan-discount">Rp. 0</h3>
                    `

                $('#pay-method').append($row_method);
                $('#row_tagihan_discount').append($row_discount);

            } else {
                $('#DiscountGlobal').remove();

                removeFromArray($(this).val())
            }
        }

        sumAmount($(this).val())

        $count_checked_payment = $('[name="pvalidation_method[]"]:checked').length

        if ($count_checked_payment < 1) {
            $('[id*="row_payment_remain_"]').remove()
        }

    });

    $('body').on('keyup', '[name="pvalidation_discount"]', function() {
        $disc = $(this).val();

        if (difference > 0) {
            $total = difference
        } else {
            $total = total
        }


        $disc_amount = (parseFloat($disc) / 100) * parseFloat($total);
        $disc_amount = parseFloat($disc_amount).toFixed(2);

        $total_amount_after_discount = $total - $disc_amount

        if ($disc) {
            $total_amount_after_discount = Math.round(parseFloat($total_amount_after_discount))
            $disc_amount = $disc_amount
        } else {
            $total_amount_after_discount = 0
            $disc_amount = 0
        }

        $('[name="pvalidation_discount_amount"]').val($disc_amount)
    });

    $('#btn-cetak-invoice').click(function() {
        $.ajax({
            url: '{{ route("kasir.cetak.invoice") }}',
            type: 'GET',
            data: {
                reg_no: '{{ $reg_no }}',
            },
            success: function(data) {
                // Create a new window for printing
                var printWindow = window.open('', '', 'height=800,width=1000');

                // Add content to the new window
                printWindow.document.write(data);

                // Close the document to render the content
                printWindow.document.close();

                // Trigger the print dialog
                printWindow.print();

            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#btn-cetak-summary').click(function() {
        $.ajax({
            url: '{{ route("kasir.cetak.summary") }}',
            type: 'GET',
            data: {
                reg_no: '{{ $reg_no }}',
            },
            success: function(data) {
                // Create a new window for printing
                var printWindow = window.open('', '', 'height=800,width=1000');

                // Add content to the new window
                printWindow.document.write(data);

                // Close the document to render the content
                printWindow.document.close();

                // Trigger the print dialog
                printWindow.print();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // $('#btn-cetak-invoice').click(function() {
    //     $reg_split = $reg.split('/').join('');
    //     if (confirm('Pastikan komputer anda sudah terkoneksi dengan perangkat Printer')) {
    //         window.open("{{url('kasir/kasir/invoice')}}/" + $reg_no, '_blank');
    //     }
    // });


    $('#btn-kwitansi').click(function() {
        $('#modalKwitansi').modal('show');
    });

    $('[name="pic_pengesahan"]').change(function() {
        if (this.value == 'kasir') {
            $('[name="pvalidation_legitimate"]').val('{{auth()->user()->name}}');
        } else if (this.value == 'bendahara') {
            $('[name="pvalidation_legitimate"]').val('Mona Junita T, SE., MM');
        } else {
            $('[name="pvalidation_legitimate"]').val('');
        }
    });

    $('#btn-confirm-kwitansi').click(function() {
        $.ajax({
            url: '{{ route("kasir.cetak.kwitansi") }}',
            type: 'GET',
            data: $('#form-confirm-kwitansi').serialize(),
            success: function(data) {
                $('#printKwitansiContent').empty().html(data);
                $('#modalPrintKwitansi').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('body').on('click', '.change_payer', function() {
        $('#modalPayer').modal('show');
    });

    $('[name="reg_corporate"]').change(function() {
        if (this.value == 1) {
            $('[name="reg_cara_bayar"]').val('Personal');
        } else {
            $('[name="reg_cara_bayar"]').val('Corporate');
        }
    });

    $('#btn-change-payer').click(function() {
        $.ajax({
            url: '{{url("auth/api/kasir/payer")}}',
            type: 'POST',
            dataType: 'json',
            data: $('#form-change-payer').serialize(),
            success: function(resp) {
                if (resp == 200) {
                    $('#modalPayer').modal('hide');
                    getDataPasien();
                } else {
                    alert('Gagal mengubah payer');
                }
            },
            error: function(resp) {
                console.log(error);
            }
        });
    });

    function viewBundle(kode) {
        $('#row_d_tindakan').html('')
        $.ajax({
            url: '{{url("")}}/auth/api/cpoe/data_detail_paket/' + kode,
            dataType: 'json',
            success: function(resp) {
                if (resp.detail.length > 0) {
                    $('#modalDetailTindakan').modal('show')
                    $.each(resp.detail, function(i, data) {
                        $row = `
                                <li style="border-bottom: 1px solid rgb(204, 204, 204)">
                                    ` + data.ItemName1 + ` 
                                </li>
                            `
                        $('#row_d_tindakan').append($row)
                    })
                }
            }
        })
    }

    $('#multi_payer').change(function() {
        $('[name="pvalidation_method[]"]').prop('checked', false)
        $('#pay-method').html('')
        $('[id*="row_detail_payment"]').html('')

        payment_method = []
        difference = 0

        if (this.value == '') {
            $('#validasi-selisih').prop('checked', false)
            $('#panel-selisih').html('')
            $('#row_tagihan_multi_payer').html('')
        } else {
            $('#validasi-selisih').prop('checked', true)

            $input_selisih = `
                    <div class="form-group">
                        <h6 for="">Nominal pembayaran multi payer</h6>
                        <input type="number" class="form-group form-control" placeholder="Masukkan nominal pembayaran multi payer" name="pvalidation_multipayer_total">
                    </div>
                `;

            $('#panel-selisih').html($input_selisih);
        }

        updateMultiPayer()
    })

    // MULTI PAYMENT
    $('body').on('keyup', 'input[name="pvalidation_multipayer_total"]', function() {
        $value = parseFloat($(this).val()).toFixed(2)
        $method = 'Multipayer'

        if ($value == '') {
            $('#row_detail_payment').html('')
            difference = 0
        } else {
            $index = payment_method.findIndex(item => item.method === $method)

            if ($index < 0) {
                payment_method.push({
                    'method': $method,
                    'name': $('[name="pvalidation_multi_payer"]').val(),
                    'nominal_difference': $value,
                    'nominal': 0
                })
            } else {
                payment_method[$index].nominal_difference = $value
            }

            difference = parseFloat(total - payment_method[$index].nominal_difference).toFixed(2)

            $('#row_payment_' + $method).remove()

            $row = `
                    <div class="col-lg-4" id="row_payment_` + $method + `">
                        <h6>Selisih Bayar</h6>
                        <h3 class="font-weight-bold mb-3">Rp. ` + formatNumber(difference) + `</h3>
                    </div>
                `

            $('#row_detail_payment').append($row)
        }

        updateMultiPayer()
    })

    function updateMultiPayer() {
        $('[name="pvalidation_method[]"]:checked').each(function(i, item) {
            let value = $(item).val()

            removeFromArray(value)

            $('[id="pay-method"] [id="' + value.replace(' ', '') + '"]').remove()
            $(`#row_detail_payment [id="row_payment_changes_` + $method + `"]`).remove()

            $('[name*="pvalidation_method[]"]').prop('checked', false).removeAttr('checked')
        })
    }

    $('body').on('keyup keydown', '.amount, .disc', function() {
        $count = $(this).data('count')
        $method = $(this).data('method')
        $value = $('.row_no_' + $count).find('.amount').val()

        $('#formated_value[data-count="' + $count + '"]').html('<b>(Rp. ' + formatNumber(parseFloat($value).toFixed(2)) + ')</b>')

        if ($value != '') {
            // set object to each payment amount
            var values = {};
            $.each($('.row_no_' + $count + ' input').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            values['nominal'] = $value
            values['method'] = $method

            // find selecter amount's index
            $index_amount = payment_method.findIndex(item => item.method === $method)

            // check if index is exist
            if ($index_amount < 0) {
                payment_method.push(values)
            } else {
                payment_method[$index_amount].nominal = $value
            }

            // sum amount of payment
            sumAmount($method)
        } else {
            removeFromArray($method)

            // sum amount of payment
            sumAmount($method)
        }
    })

    $('body').on('keyup', '[name="pvalidation_cash"]', function() {
        let value = parseFloat($(this).val()).toFixed(2)
        let code = $(this).data('count')

        $method = 'Cash'

        $('#formated_value[data-count="' + code + '"]').html('<b>(Rp. ' + formatNumber(value) + ')</b>')

        if (value) {
            if (remain > 0) {
                $amount_to_count = parseFloat(remain).toFixed(0)
            } else if (difference > 0 && remain == 0) {
                $amount_to_count = parseFloat(difference).toFixed(0)
            } else(
                $amount_to_count = parseFloat(total).toFixed(0)
            )

            $total = parseFloat(value - $amount_to_count).toFixed(2)

            delay(function() {
                $('#row_payment_changes_' + $method).remove()

                $row = `
                        <div class="col-lg-4" id="row_payment_changes_` + $method + `">
                            <h6>Kembalian</h6>
                            <h3 class="font-weight-bold mb-3">Rp. ` + formatNumber($total) + `</h3>
                        </div>
                    `

                $('#row_detail_payment').append($row)

                $index = payment_method.findIndex(item => item.method === $method)

                if ($index >= 0) {
                    removeFromArray($method)
                }

                payment_method.push({
                    'method': $method,
                    'nominal': 0,
                    'amount_cash': value,
                    'amount_changes': $total
                })
                // if (value < $amount_to_count) {
                //     alert('Nominal pembayaran cash tidak boleh kurang dari jumlah yang harus dibayar')

                //     $('#row_payment_changes_'+$method).remove()

                //     removeFromArray($method)
                // } else {

                // }
            }, 1000)

        } else {
            $('#row_payment_changes_' + $method).remove()

            $(`#row_detail_payment [id="row_payment_changes_` + $method + `"]`).remove()

            removeFromArray($method)
        }
    })

    $('#btn_open_invoice').click(function() {
        $('#modalOpenInvoice').modal('show')
    })

    $('#btn_save_open_invoice').click(function() {
        if ($('[name="open_desc"]').val() == '') {
            alert('Alasan open invoice harus diisi')
        } else {
            $.ajax({
                url: '{{url("")}}/kasir/billing/storeCancelation',
                type: 'POST',
                dataType: 'json',
                data: $('#formOpenInvoice').serialize(),
                success: function(resp) {
                    if (resp.success) {
                        alert(resp.msg)
                        $('#modalOpenInvoice').modal('hide');
                        getDataOrder();
                    } else {
                        alert(resp.msg);
                    }
                },
                error: function(resp) {
                    console.log(error);
                }
            });
        }
    })

    function sumAmount($method) {
        if ($method != 'Cash') {
            delay(function() {
                sum_nominal = payment_method.reduce((acc, o) => acc + parseFloat(o.nominal), 0)

                if (difference > 0) {
                    remain = parseFloat(difference - sum_nominal).toFixed(2)
                } else {
                    remain = parseFloat(total - sum_nominal).toFixed(2)
                }

                $('[id*="row_payment_remain_"]').remove()

                $row = `
                        <div class="col-lg-4" id="row_payment_remain_` + $method + `">
                            <h6>Sisa Tagihan</h6>
                            <h3 class="font-weight-bold mb-3">Rp. ` + formatNumber(remain) + `</h3>
                        </div>
                    `

                if (difference == 0 && remain != total) {
                    $('#row_detail_payment').append($row)
                } else if (difference > 0 && difference != remain) {
                    $('#row_detail_payment').append($row)
                }
            }, 1000)
        }
    }

    function removeFromArray($method) {
        payment_method = payment_method.filter(function(item) {
            return item.method !== $method;
        });
    }

    var delay = (function() {
        var timer = 0;
        return function(callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(document).ready(function() {
        $('#btn-print-kwitansi').click(function() {
            $('#modalKwitansi').modal('hide');
            $('#modalPrintKwitansi').modal('hide');
            $('.modal-backdrop').remove();


            var modalContent = $('#printKwitansiContent').html(); // Get modal content

            // Create a new window for printing
            var printWindow = window.open('', '', 'height=500,width=800');

            // Add content to the new window
            printWindow.document.write(modalContent);

            // Close the document to render the content
            printWindow.document.close();

            // Trigger the print dialog
            printWindow.print();
        });

        $('#btn-print-invoice').click(function() {
            $('#modalInvoice').modal('hide');
            $('#modalPrintInvoice').modal('hide');
            $('.modal-backdrop').remove();


            var modalContent = $('#printInvoiceContent').html(); // Get modal content

            // Create a new window for printing
            var printWindow = window.open();

            // Add content to the new window
            printWindow.document.write(modalContent);

            // Close the document to render the content
            printWindow.document.close();

            // Trigger the print dialog
            printWindow.print();
        });
    });
</script>
@endsection