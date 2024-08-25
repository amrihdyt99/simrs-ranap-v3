$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var req = '<span class="text-danger"> *<span>';
var dataArrayTemp = []
var dataArrayFinal = []

// vendors = [{
//     Name: 'Magenic',
//     ID: 'ABC'
//   },
//   {
//     Name: 'Microsoft',
//     ID: 'DEF'
//   } // and so on... 
// ];

// if (vendors.some(e => e.Name === 'Magenic')) {
//     /* vendors contains the element we're looking for */
//     console.log('array yes')
// }

$('body').on('click', '#prescribe-tab', function(){
    let category = $(this).data('category')

    getPrescribeFormSelect(category)
})

$('#btn-add-prescribe, #tab-prescribe').click(function(){
    $('#modalSOAP').modal('hide')
    $('#modalPrescribeNew').modal('show')
    getPrescribeFormSelect('satuan')
    orderPrescribeTemp();
});

orderPrescribe();


$('#btn-reload-prescribe').click(function(){
    orderPrescribe();
});

$("#modalPrescribeNew").on("hidden.bs.modal", function(){
    resetSelect2('#prescribe_item');
    $('#modalSOAP').modal('show');
    $('#tab-prescribe').addClass('active');
    $('#panel-prescribe').show();
});

$("#modalEditPrescribe").on("hidden.bs.modal", function(){
    resetSelect2('#prescribe_item');
    $('#modalSOAP').modal('show');
    $('#tab-prescribe').addClass('active');
    $('#panel-prescribe').show();
});

function getObat($id = '', $category = ''){
    $('#'+$id).select2({
        minimumInputLength: 2,
        ajax: {
            url: $dom+'/api/getDataObat',
            type: 'GET',
            delay: 500,
            data: function(params){
                var searchData = {
                    params: params.term
                };
                return searchData;
            },
            processResults: function(resp){
                return {
                    results:  $.map(resp, function (data) {
                        return {
                            text: data.item_id+ ' -- '+data.item_name+' (stok : '+data.total+')',
                            id: data.item_id,
                            'id_': data.item_id,
                            'item_': data.item_name,
                            'stock_': data.total,
                            'price_': data.harga_jual,
                            'komposisi_': data.komposisi,
                            'sediaan_': data.dosis,
                            'category_': $category,
                            'satuan_dasar_': data.satuan_dasar,
                            'satuan_dosis_': data.satuan_dosis_nama,
                            'list_dosis_': data.listdosis
                        }
                    })
                };
            },
        },
    });
}

// PRESCRIBING TEMPORARY
$(document).ready(function(){
    getPrescribeFormSelect('satuan')
})

function getPrescribeFormSelect(category) {
    let category_value = 1

    if (category == 'satuan') {
        category_value = 0
    }

    $('[id*="prescribe-tab"]').removeClass('active')
    $('[id*="prescribe-tab"][data-category="'+category+'"]').addClass('active')

    let form = `
        <form id="temp-form-obat-`+category+`">
            <input type="hidden" name="_token" value="`+$('[name="_token"]').val()+`">
            <input type="hidden" name="prescribe_reg" value="`+$reg+`">
            <input type="hidden" name="prescribe_flag" value="`+category_value+`">
            <input type="hidden" name="prescribe_flag_racikan">
            <div class="row row_header_`+category+` d-flex justify-content-end"></div>
            <div id="row_select_prescribe"></div>
            <button class="btn btn-success float-right" id="store-row-prescribe" data-category="`+category+`" type="button"><i class="fas fa-arrow-down"></i> Simpan ke tabel</button>
            <button class="btn btn-secondary float-right mr-1" id="cancel-row-prescribe" data-category="`+category+`" type="button">batal</button>
        </form>
    `

    $('#form_select_prescribe').html(form)
    
    getPrescribeRowSelect(null, category, 0)

    if (category == 'racikan') {
        $row_header = `
            <div class="col-lg-2 pr-0 mb-3">
                <label class="text-capitalize">Bentuk sediaan obat `+category+`</label>
                <select class="form-control" name="prescribe_form" id="prescribe_item_form_`+category+`">
                    <option val="">-- Pilih sediaan obat `+category+` --</option>
                </select>
            </div>
            <div class="col-lg-2 pr-0 mb-3">
                <label class="text-capitalize">Rute obat `+category+`</label>
                <select class="form-control" name="prescribe_route" id="prescribe_item_route_`+category+`">
                    <option val="">-- Pilih rute obat `+category+` --</option>
                </select>
            </div>
        `

        $('.row_header_'+category).html($row_header)

        getPrescribeHeader(category)
    }
}

function getPrescribeRowSelect(data, category, serial, update = 0) {
    if (serial == 0) {
        $('#row_select_prescribe').html('')
    }
    $('#add-row-prescribe').attr('data-update', '')

    $div = '#row_select_prescribe'
    if (update == 1) {
        $div = '#row_edit_prescribe'
        update = 1
    }

    if (!data) {
        data = {
            'temp_kode' : '',
            'temp_id' : '',
            'temp_order' : '',
            'temp_reg' : '',
            'temp_name' : '',
            'temp_quantity' : '',
            'temp_dosis' : '0',
            'temp_hari' : 'x 1',
            'temp_durasi_hari' : '',
            'temp_ket_dosis' : '',
            'temp_harga_jual' : '',
            'temp_flag' : '',
            'temp_flag_racikan' : '',
            'temp_dokter' : '',
            'temp_poli' : '',
            'temp_deleted' : '',
            'temp_sent' : '',
            'temp_special_instruction' : 'Sesudah Makan, Habiskan',
            'created_at' : '',
            'updated_at' : '',
            'ItemName1' : '-- Pilih nama obat --',
            'ItemPrice' : '',
            'ItemStock' : '',
            'ItemUnit' : '0',
            'ItemDosageUnit' : '',
            'ItemBasicUnit' : '',
            'ItemNotes' : '',
        }
    }

    $row_prescribe = ` <div class="row row_`+category+`_`+serial+` my-3 mx-3">
                            <div class="col-lg-12 px-0 mb-3">
                                <label class="text-capitalize">Nama Obat `+category+`</label>
                                <select class="form-control" name="prescribe_item[]" id="prescribe_item_`+category+`_`+serial+`" data-id="`+serial+`" onchange="prescribeItem(this.id)">
                                    <option value="`+data.temp_kode+`">`+data.ItemName1+`</option>
                                </select>
                                <small id="empty_stock_prescribe_item_`+category+`_`+serial+`"></small>
                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi">Aturan Pakai `+req+`</label>
                                <input type="number" name="prescribe_jumlah_perhari[]" value="`+parseInt(data.temp_per_hari)+`" id="prescribe_jumlah_perhari_`+category+`_`+serial+`" onkeyup="accumulateFrequency('`+category+`', '`+serial+`'); accumulateItemAmount('`+category+`', '`+serial+`')" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 3">
                            </div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi">-</label>
                                <input type="text" name="prescribe_hari[]" value="x 1" id="prescribe_hari_`+category+`_`+serial+`" onkeyup="accumulateItemAmount('`+category+`', '`+serial+`')" class="form-control no-radius mt-1" style="height: 40px;">
                            </div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi">Dosis `+req+`</label>
                                <input type="text" name="prescribe_dosis[]" value="`+data.temp_dosis+`" id="prescribe_dosis_`+category+`_`+serial+`" onkeyup="accumulateItemAmount('`+category+`', '`+serial+`')" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 250">
                                <select name="prescribe_dosis_satuan[]" id="prescribe_satuan_dosis_`+category+`_`+serial+`" style="height: 40px;" onchange="accumulateItemAmount('`+category+`', '`+serial+`')" class="form-control no-radius">
                                    <option value="`+data.ItemDosageUnit+`" selected>`+data.ItemDosageUnit+`</option>
                                </select>
                            </div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi">Durasi Hari `+req+`</label>
                                <input type="number" name="prescribe_durasi_hari[]" value="`+parseInt(data.temp_durasi_hari)+`" id="prescribe_durasi_hari_`+category+`_`+serial+`" onkeyup="accumulateItemAmount('`+category+`', '`+serial+`')" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh : 5">
                                <input type="hidden" value="`+parseFloat(data.ItemUnit)+`" id="prescribe_sediaan_`+category+`_`+serial+`" style="height: 40px;" class="form-control no-radius" placeholder="Sediaan dosis" readonly>
                            </div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi">Jumlah Obat `+req+`</label>
                                <input type="number" name="prescribe_quantity[]" value="`+Math.round(parseFloat(data.temp_quantity).toFixed(2))+`" step="any" id="prescribe_quantity_`+category+`_`+serial+`" onkeyup="accumulatePricePerItem(prescribe_harga_jual_`+category+`_`+serial+`, this.value, prescribe_item_`+category+`_`+serial+`)" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Jumlah obat">
                                <input type="text" id="prescribe_satuan_dasar_`+category+`_`+serial+`" value="`+data.ItemBasicUnit+`" class="form-control no-radius" style="height: 40px;" placeholder="Satuan dasar" readonly>
                            </div>
                            <div class="col-lg-2 px-0">
                                <label for="" class="label-admisi">Frekuensi</label>
                                <input type="text" name="prescribe_ket_dosis[]" value="`+data.temp_ket_dosis+`" id="prescribe_ket_dosis_`+category+`_`+serial+`" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Frekuensi">
                                <select name="prescribe_special_instruction[]" id="prescribe_special_instruction_`+category+`_`+serial+`" class="form-control no-radius" style="height: 40px;">
                                    <option value="`+data.temp_special_instruction+`">`+data.temp_special_instruction+`</option>
                                    <option value="Sesudah Makan, Habiskan">Sesudah Makan, Habiskan</option>
                                    <option value="Sebelum Makan">Sebelum Makan</option>
                                    <option value="Diminum Malam Hari">Diminum Malam Hari</option>
                                    <option value="1 Kali Order">1 Kali Order</option>
                                    <option value="1 Jam Sebelum Makan atau 2 Jam Sesudah Makan">1 Jam Sebelum Makan atau 2 Jam Sesudah Makan</option>
                                    <option value="Melalui Dubur">Melalui Dubur</option>
                                    <option value="Oleskan Tipis">Oleskan Tipis</option>
                                    <option value="Pada Mata Kiri">Pada Mata Kiri</option>
                                    <option value="Pada Mata Kanan">Pada Mata Kanan</option>
                                    <option value="Pada Kedua Mata">Pada Kedua Mata</option>
                                    <option value="Pada Telinga Kiri">Pada Telinga Kiri</option>
                                    <option value="Pada Telinga Kanan">Pada Telinga Kanan</option>
                                    <option value="Pada Kedua Telinga">Pada Kedua Telinga</option>
                                    <option value="Tafering Off">Tafering Off</option>
                                    <option value="Dibawah lidah bila nyeri dada">Dibawah lidah bila nyeri dada</option>
                                    <option value="Saat dibutuhkan">Saat dibutuhkan</option>
                                    <option value="Intranasal">Intranasal</option>
                                </select>
                            </div>
                            <div class="col-lg-1 px-0 d-none">
                                <label for="" class="label-admisi">Harga Satuan</label>
                                <input type="number" readonly value="`+data.ItemPrice+`" name="prescribe_harga_awal[]" id="prescribe_harga_awal_`+category+`_`+serial+`" class="form-control no-radius mt-1" style="height: 40px;">
                            </div>
                            <div class="col-lg-1 px-0">
                                <label for="" class="label-admisi ml-4 text-white">Stok</label>
                                <div class="input-group mx-0">
                                    <input type="hidden" name="prescribe_harga_jual[]" value="`+parseFloat(data.ItemPrice) * parseFloat(data.temp_quantity)+`" id="prescribe_harga_jual_`+category+`_`+serial+`" class="form-control no-radius mt-1" style="height: 40px;" readonly>
                                    <input type="hidden" value="`+data.ItemStock+`" id="prescribe_stock_`+category+`_`+serial+`" class="form-control no-radius mt-1" style="height: 40px;" readonly>
                                    <div class="input-group-append no-radius mt-1" id="add-row-prescribe" data-category="`+category+`" data-update="`+update+`">
                                        <span class="input-group-text bg-primary text-white" style="height: 42px; cursor: pointer"><i class="fas fa-plus"></i></span>
                                    </div>
                                    <div class="input-group-append no-radius mt-1" id="remove-row-prescribe" data-category="`+category+`" data-serial="`+serial+`">
                                        <span class="input-group-text bg-danger text-white" style="height: 42px; cursor: pointer"><i class="fas fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>`
                                
            $($div).append($row_prescribe)
    
            getObat('prescribe_item_'+category+'_'+serial, category)

            $(`#prescribe_special_instruction_`+category+`_`+serial).select2({
                tags: true,
            })
}

function getPrescribeHeader(category, data = '') {
    var baseurl = 'http://rsud.sumselprov.go.id/farmasi/web-apis/';

    var med_form = baseurl + 'data-induk/select2/bentukan-sediaan';

    $('[id*="prescribe_item_form_'+category+'"]').select2({width:'100%',ajax:{delay:0,url:med_form,dataType:'json'}});

    var med_route = baseurl + 'data-induk/select2/medication-route';

   $('[id*="prescribe_item_route_'+category+'"]').select2({width:'100%',ajax:{delay:0,url:med_route,dataType:'json'}});

   if (data.length > 0) {
        form_ = data[0].temp_form ?? data[0].prescribe_form
        route_ = data[0].temp_route ?? data[0].prescribe_route

        $('[id*="prescribe_item_form_'+category+'"]').html('<option value="'+form_+'">'+form_+'</option>')
        $('[id*="prescribe_item_route_'+category+'"]').html('<option value="'+route_+'">'+route_+'</option>')
   }
}

function accumulateItemAmount(category, serial) {
    let amount_per_day = parseFloat($('[id="prescribe_jumlah_perhari_'+category+'_'+serial+'"]').val())
    let amount_day = parseInt($('[id="prescribe_durasi_hari_'+category+'_'+serial+'"]').val())
    let frequency_day = parseInt($('[id="prescribe_hari_'+category+'_'+serial+'"]').val().split("x").pop())
    let dosage = parseFloat($('[id="prescribe_dosis_'+category+'_'+serial+'"]').val())
    let dosage_unit = $('[id="prescribe_satuan_dosis_'+category+'_'+serial+'"]').find(':selected').val()
    let dosage_base_unit = $('[id="prescribe_satuan_dasar_'+category+'_'+serial+'"]').val()
    let prep = $('[id="prescribe_sediaan_'+category+'_'+serial+'"]').val()
    // let stock = $('#prescribe_stock_'+category+'_'+serial).val()
    let amount_item = 0
    let basic_price = parseFloat($('[id="prescribe_harga_awal_'+category+'_'+serial+'"]').val())

    if (dosage_base_unit.toLowerCase().includes('botol')) {
        $dosage_per_day = dosage * amount_per_day
        $total_dosage = $dosage_per_day * amount_day
        amount_item = $total_dosage / dosage_base_unit.match(/\d+/)[0]
    } else {
        if (isNaN(amount_per_day) || isNaN(amount_day)) {
            // alert('Aturan pakai perhari dan durasi hari harus diisi')
            $('[id="prescribe_quantity_'+category+'_'+serial+'"]').val('')
        } else {
            if (dosage_unit.includes('mg')) {
                $dosage_per_day = amount_per_day * dosage
                $dosage_total = $dosage_per_day * amount_day
                amount_item = $dosage_total / prep
            } else {
                $amout_per_day = amount_per_day * dosage
                amount_item = $amout_per_day * amount_day

                console.log(amount_per_day)
                console.log(dosage)
                console.log($amout_per_day)
                console.log(amount_item)
            }

            amount_item = parseFloat(amount_item).toFixed(2)

            // if (category == 'racikan') {
            // }

            // if (amount_item > stock) {
            //     amount_item = ''
            //     alert('Jumlah obat tidak boleh melebihi stock yang tersedia : '+stock)
            // }

        }
    }

    $('[id="prescribe_quantity_'+category+'_'+serial+'"]').val(parseFloat(amount_item).toFixed(2))
    $('[id="prescribe_harga_jual_'+category+'_'+serial+'"]').val(parseFloat(amount_item).toFixed(2) * basic_price)
}

function accumulateFrequency(category, serial) {
    let amount_per_day = parseFloat($('#prescribe_jumlah_perhari_'+category+'_'+serial).val())
    let frequency = 24 / amount_per_day

    if (isNaN(frequency)) {
        $('#prescribe_ket_dosis_'+category+'_'+serial).val('')
    } else {
        $('#prescribe_ket_dosis_'+category+'_'+serial).val('setiap '+frequency+' jam sekali')
    }
}

$('body').on('click', '#add-row-prescribe', function(){
    let category = $(this).data('category')
    let serial = Math.random().toString(36).slice(2, 7) //generate random character
    let update = $(this).data('update')

    data = ''
    if (category == 'racikan') {
        data = {
            'temp_kode' : '',
            'temp_id' : '',
            'temp_order' : '',
            'temp_reg' : '',
            'temp_name' : '',
            'temp_quantity' : '',
            'temp_dosis' : '0',
            'temp_hari': $('[id*="prescribe_jumlah_perhari_racikan_"]').val(),
            'temp_durasi_hari': $('[id*="prescribe_durasi_hari_racikan_"]').val(),
            'temp_ket_dosis': $('[id*="prescribe_ket_dosis_racikan_"]').val(),
            'temp_harga_jual' : '',
            'temp_flag' : '',
            'temp_flag_racikan' : '',
            'temp_dokter' : '',
            'temp_poli' : '',
            'temp_deleted' : '',
            'temp_sent' : '',
            'temp_special_instruction': $('[id*="prescribe_special_instruction_racikan"]').val(),
            'created_at' : '',
            'updated_at' : '',
            'ItemName1' : '-- Pilih nama obat --',
            'ItemPrice' : '',
            'ItemStock' : '',
            'ItemUnit' : '0',
            'ItemDosageUnit' : '',
            'ItemBasicUnit' : '',
            'ItemNotes' : '',
        }
    }

    getPrescribeRowSelect(data, category, serial, update)
})

$('body').on('click', '#remove-row-prescribe', function(){
    let category = $(this).data('category')
    let serial = $(this).data('serial')
    let count = $('[class*="row_'+category+'_"]').length

    if (confirm('Hapus item obat ini ?')) {
        if (count < 2) {
            // remove value if there's only 1 row
            $('.row_'+category+'_'+serial+' input').val('')
            $('#prescribe_item_'+category+'_'+serial).val(null).trigger('change')
        } else {
            $('.row_'+category+'_'+serial).remove()
        }
    }
})

$('.prescribe-temp-loading').hide();
$('body').on('click', '#store-row-prescribe', function(){
    $category = $(this).data('category');

    $.ajax({
        url: $dom+'/api/orderobatnew',
        type: 'POST',
        dataType: 'json',
        data: $('#temp-form-obat-'+$category).serialize()+
                `&id_cppt=`+$('[id="soapdok_id"]').val()+
                `&dokter_order=`+$user_dokter_+
                `&service_unit=`+$service_unit
                ,
        success: function(resp){
            if (resp.success) {
                orderPrescribeTemp();
                getPrescribeFormSelect($category)
            } else if (!resp.success) {
                alert('Item/dosis/durasi hari/jumlah obat tidak boleh kosong');
            }
        },
        error: function(){
            alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });

});

function orderPrescribeTemp(){
    $('#t_harga_prescribe').val('')
    $('#sub_harga_prescribe').val('')

    var sum_temp = 0
    
    $.ajax({
        url: $dom+'/api/getorderobatnew',
        type: 'GET',
        dataType: 'json',
        data: {
            reg_no: $reg,
            dokter: $user_dokter_,
            type: 'temp',
        },
        success: function(resp){
            $('.row_prescribe_temp').remove()
            $('[id="table-row-prescribe"]').html('')

            if (resp.data.length > 0) {
                dataArrayTemp = []

                $.each(resp.data, function(i, data){
                    $bg = 'warning'
                    $flag_temp = ''
                    $flag = data.flag

                    if (data.flag == 1) {
                        $jenis_resep = 'racikan'
                    } else {
                        $jenis_resep = 'satuan'
                    }
                    
                    if ($jenis_resep == 'racikan') {
                        $bg = 'info';
                        $flag_temp = `(ke `+data.flag_racikan+`)`
                        $flag = data.flag_racikan   
                    }

                    $row_temp_flag =  `<tr class="tr_`+$jenis_resep+`_`+data.flag_racikan+`">
                                                <td class="text-center text-uppercase cat_`+$jenis_resep+`_`+data.flag_racikan+`">
                                                    <span class="btn btn-warning btn-sm ml-1" id="btn-edit-row-temp" title="Edit row obat" data-id="`+$flag+`" data-category="`+$jenis_resep+`">
                                                        <i class="fas fa-edit" style="font-size: 12px"></i> Edit
                                                    </span>
                                                </td>
                                                <td class="bg-`+$bg+` text-dark text-center text-uppercase cat_`+$jenis_resep+`_`+data.flag_racikan+`">
                                                    <b>OBAT<br>`+$jenis_resep+`</br>
                                                    `+$flag_temp+`<br>
                                                </td>
                                            </tr>`;
                    
                    $('[id="table-row-prescribe"]').append($row_temp_flag);

                    $.each(data.obat, function(i, item){
                        dataArrayTemp.push(item)

                        $row_prescribe_temp_obat = `<tr class="tr_`+$jenis_resep+`_`+data.flag_racikan+`">
                                                        <td>`+item.item_code+`</td>
                                                        <td>
                                                            `+item.item_name+`
                                                            <span type="button" class="float-right text-danger mr-1" title="Hapus Item Obat" id="btn-delete-row-temp" data-id="`+item.id+`"><i class="fas fa-trash"></i></span>
                                                        </td>
                                                        <td>`+item.qty+`</td>
                                                        <td class="text-right">Rp. `+formatNumber(parseFloat(parseFloat(item.harga_awal) * parseFloat(item.qty)).toFixed(2))+`</td>
                                                        <td>dosis `+item.dosis+`; `+item.jumlah_perhari+` `+item.hari+' '+item.ket_dosis+', selama '+item.durasi_hari+` hari</td>
                                                        <td></td>
                                                    </tr>`;
                                                    
                        $('[id="table-row-prescribe"]').append($row_prescribe_temp_obat);
                        
                        if (item.harga_awal != 0) {
                            sum_temp += parseFloat(item.harga_awal * item.qty)
                        }
                    });

                    $temp_price = formatNumber(parseFloat(sum_temp).toFixed(2))
                    $('#sub_harga_prescribe').text($temp_price)

                    var rowCountPrescribe = $('.table_detail_order .tr_'+$jenis_resep+'_'+data.flag_racikan).length;
                    
                    $('.cat_'+$jenis_resep+'_'+data.flag_racikan).attr('rowspan', rowCountPrescribe);
                });
            } else {
                $('[id="table-row-prescribe"]').html(`
                    <tr>
                        <td class="text-center" colspan="7">Tidak ada data</td>
                    </tr>    
                `)
            }
        }, error: function(){
            console.log(error);
        }
    });
    
}

$('body').on('click', '#btn-edit-row-temp', function(){
    $id = $(this).data('id')
    $category = $(this).data('category')

    $('[id*="prescribe-tab"]').removeClass('active')
    $('[id*="prescribe-tab"][data-category="'+$category+'"]').addClass('active')

    $('[name="prescribe_flag_racikan"]').val(0)
    $('[name="prescribe_flag"]').val(0)

    $('.row_header_satuan').html('')

    if ($category == 'racikan') {
        $('[name="prescribe_flag_racikan"]').val($id)
        $('[name="prescribe_flag"]').val(1)
    }

    $('a[id*="-tab"]').removeClass('active')
    $('div[aria-labelledby*="-tab"]').removeClass('active show')
    
    $('#'+$category+'-tab').addClass('active')
    $('div[aria-labelledby*="'+$category+'-tab"]').addClass('active show')

    $('body, html, #modalPrescribeNew').scrollTop(0);
    
    prescribe_ = []

    var sum_temp = 0

    $.ajax({
        url: $dom+'/api/getorderobatnew',
        type: 'GET',
        dataType: 'json',
        data: {
            dokter: $user_dokter_,
            type: 'temp',
            reg_no: $reg,
            params: [
                {key: $category == 'satuan' ? 'flag' : 'flag_racikan', value: $id}
            ]
        },
        success: function(resp){

            $('#row_select_prescribe').html('')

            if (resp.data.length > 0) {
                $.each(resp.data[0].obat, function(i, data){
                    if (i == 0 && data.temp_flag == 0) {
                        $no_ = 0
                    } else {
                        $no_ = data.temp_id
                    }

                    prescribe_.push({
                        'id' : 'prescribe_item_'+$category+'_'+$no_,
                        'kode' : data.temp_kode,
                        'item' : data.ItemName1,
                        'price' : parseFloat(data.ItemPrice).toFixed(2),
                        'price_sub' : parseFloat(data.temp_harga_jual).toFixed(2),
                        'qty' : parseFloat(data.temp_quantity),
                        'category' : $category,
                    });

                    sum_temp += parseFloat(data.temp_harga_jual)

                    // var objIndex = resp.findIndex(x => x.temp_id === data.temp_id)

                    // resp[objIndex].temp_harga_jual = data.ItemPrice

                    getPrescribeRowSelect(data, $category, data.temp_id)

                    $('[name="prescribe_catatan_dokter"]').text(data.temp_catatan_dokter)
                })

                if ($category == 'racikan') {
                    $row_header = `
                        <div class="col-lg-2 pr-0 mb-3">
                            <label class="text-capitalize">Bentuk sediaan obat `+$category+`</label>
                            <select class="form-control" name="prescribe_form" id="prescribe_item_form_`+$category+`">
                                <option val="">-- Pilih sediaan obat `+$category+` --</option>
                            </select>
                        </div>
                        <div class="col-lg-2 pr-0 mb-3">
                            <label class="text-capitalize">Rute obat `+$category+`</label>
                            <select class="form-control" name="prescribe_route" id="prescribe_item_route_`+$category+`">
                                <option val="">-- Pilih rute obat `+$category+` --</option>
                            </select>
                        </div>
                    `

                    $('.row_header_satuan').html($row_header)

                    getPrescribeHeader($category, resp)
                }

                $('#sub_harga_prescribe').text(parseFloat($('#sub_harga_prescribe').text()) - sum_temp)
            }
        }
    });
});

$('body').on('click', '[id="btn-delete-row-temp"]', function(){
    $id = $(this).data('id');

    if (confirm('Apakah anda yakin akan mengahapus item obat ini ?')) {
        $.ajax({
            url: $dom+'/api/deleteOrderobat',
            type: 'post',
            dataType: 'json',
            data: {
                _token: $('[name="_token"]').val(),
                data_id: $id,
                deleted_by: $user_,
            },
            success: function(resp){
                if (resp.code != 200) {
                    alert(resp.msg)
                } else {
                    orderPrescribeTemp()
                }
            },
            error: function(){
                alert('Gagal mengapus data, mohon hubungi tim IT');
            }
        });
    }

});

$('body').on('click', '#remove-row-racikan', function(){
    $id = $(this).data('id');
    $id_row = 'prescribe_item_'+$id

    $('.row_racikan_'+$id).remove();

    prescribe_ = $.grep(prescribe_, function(item) {
        return item.id !== $id_row;
    })

    $('#t_harga_prescribe').val(sumPrice(prescribe_, '#f_harga_prescribe'))
});

$('body').on('click', '#cancel-row-prescribe', function(){
    $category = $(this).data('category');

    prescribe_ = $.grep(prescribe_, function(item) {
        if ($category == 'satuan') {
            return item.category !== $category;
        } else {
            return item.category !== '';
        }
    })

    $('#t_harga_prescribe').val(sumPrice(prescribe_, '#f_harga_prescribe'))

    $('#f_harga_prescribe').html('')

    orderPrescribeTemp()
    
    getPrescribeFormSelect($category)
});

// CONFIG PANEL PRESCRIBE
var prescribe_ = []
function prescribeItem($id = ''){
    $('#'+$id).on('select2:select', function (e) {
        var selectedOption = e.params.data;
        
        var $kode = selectedOption.id_;
        var $item = selectedOption.item_;
        var $stock = selectedOption.stock_;
        var $price = selectedOption.price_;
        var $komposisi = selectedOption.komposisi_;
        var $sediaan = selectedOption.sediaan_;
        var $category = selectedOption.category_;
        var $satuan_dasar = selectedOption.satuan_dasar_;
        var $satuan_dosis = selectedOption.satuan_dosis_;
        var $list_dosis = selectedOption.list_dosis_;

        let serial = $('#'+$id).data('id');

        // if ($id == 'prescribe_item_'+$category) {
        //     var num = '';
        //     var $rows = '.row'
        // } else {
            //     var $rows = '.row[data-id="'+num+'"]'
            //     var num = $('#'+$id).data('id');
        // }
        // $idx_kode = prescribe_.findIndex(x => x.kode === $kode)<0
        // $idx_category = prescribe_.findIndex(x => x.category === $category)<0
        // $idx_id = prescribe_.findIndex(x => x.id === $id)<0

        $('#t_komposisi').html('')

        if ($stock < 1) {
            $('#empty_stock_prescribe_item_'+$category+'_'+serial).html('<span class="text-danger">Stok obat ini kosong, mohon konfirmasi ke bagian farmasi untuk pendistribusian obat tersebut</span>')
            
            $empty_field = $('.row_'+$category+'_'+serial+' input:not(#prescribe_hari_'+$category+'_'+serial+')').not(':last').not(':gt(-3)').attr('readonly', true)
            if ($category == 'satuan') {
                $empty_field.val('')
            }

            $('[class*="input-group-append"] span').hide()
            $('[id="store-row-prescribe"]').hide()
            
            return false
        } else {
            $('#empty_stock_prescribe_item_'+$category+'_'+serial).html('')

            $empty_field = $('.row_'+$category+'_'+serial+' input:not(#prescribe_hari_'+$category+'_'+serial+')').not(':last').not(':gt(-3)').attr('readonly', false)

            // $('[name="prescribe_dosis_satuan[]"]').attr('readonly', true)
            $('[id*="prescribe_satuan_dasar"]').attr('readonly', true)

            if ($category == 'satuan') {
                $empty_field.val('')
            }

            $('[class*="input-group-append"] span').show()
            $('[id="store-row-prescribe"]').show()

            $('[id="r_list_dosis_'+$category+'_'+serial+'"]').remove()
            $.each($list_dosis, function(i, data){
                $selected_ = ''
                if (i == 0) {
                    $selected_ = 'selected' 
                }
                
                $('#prescribe_satuan_dosis_'+$category+'_'+serial)
                        .append(`<option 
                                    id="r_list_dosis_`+$category+`_`+serial+`" 
                                    value="`+data.satuan_kode+`" 
                                    data-value="`+data.satuan_angka+`"
                                    `+$selected_+`>`+data.satuan_nama+`
                                </option>`)
            })

            $('#prescribe_satuan_dasar_'+$category+'_'+serial+'').val($satuan_dasar)
            $('#prescribe_sediaan_'+$category+'_'+serial+'').val($sediaan)

            if ($komposisi.length > 0) {
                $('#modalPrescribeKomposisi').modal('show')

                $.each($komposisi, function(i, komposisi) {
                    $tr_komposisi = `
                        <tr>
                            <td>`+komposisi.komposisi_nama+`</td>
                            <td>`+komposisi.nilai_komposisi+`</td>
                            <td>`+komposisi.komposisi_satuan_kode+`</td>
                            <td>`+komposisi.komposisi_satuan_nama+`</td>
                        </tr>
                    `
    
                    $('#t_komposisi').append($tr_komposisi)
                })
            }
            
            prescribe_ = $.grep(prescribe_, function(item) {
                return item.id !== $id;
            })

            prescribe_.push({
                'id' : $id,
                'kode' : $kode,
                'item' : $item,
                'price' : parseFloat($price),
                'qty' : 1,
                'category' : $category,
            });
            
            $('#t_harga_prescribe').val(sumPrice(prescribe_, '#f_harga_prescribe'))
    
            $('body #prescribe_harga_awal_'+$category+'_'+serial).val(parseFloat($price).toFixed(2));
            $('body #prescribe_stock_'+$category+'_'+serial).val($stock);
        }
    }); 
}

function sumPrice(array, element = '') {
    var sum = 0;//Initial value hast to be 0
    var prevPrice = parseFloat($('#sub_harga_prescribe').text())
    var totPrice = parseFloat($('#total_tarif_prescribe').text())

    $.each(array, function(key, value) {
        var number = parseFloat(value.price);//Convert to numbers with parseFloat
        sum += number * value.qty;//Sum the numbers
    });

    if (element) {
        if (sum + prevPrice + totPrice > 70000 && $cara_bayar != 'Personal') {
            $(element).html('<span class="badge badge-warning">Melebihi batas maksimal @Rp70.000</span>')
            // $('[id*="store-row-prescribe"]').hide()
        } else {
            $(element).html('')
            // $('[id*="store-row-prescribe"]').show()
        }
    }
    
    return parseFloat(sum + prevPrice + totPrice).toFixed(2)
}

function accumulatePricePerItem(elm, value, id) {
    $price = parseFloat($(elm).val())

    var objIndex = prescribe_.findIndex(x => x.id === $(id).attr('id'))

    prescribe_[objIndex].qty = parseFloat(value)

    $mainPrice = prescribe_[objIndex].price
    $qty = prescribe_[objIndex].qty

    if (value != '') {
        $total_price = $mainPrice * $qty;
    } else {
        $total_price = $mainPrice
    }

    $(elm).val($total_price)

    $('#t_harga_prescribe').val(sumPrice(prescribe_, '#f_harga_prescribe'))
}

// PROCESS PANEL PRESCRIBE
$('[class*="prescribe-loading"]').hide();
$('#send-row-prescribe').click(function(){
    if (confirm('Kirim ke farmasi sekarang ?')) {
        $('[class*="prescribe-loading"]').show();
        $(this).hide();

        $.ajax({
            url: $dom+'/api/storeFinalOrder',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: $('[name="_token"]').val(),
                medrec: $medrec,
                reg: $reg,
                id_cppt: $id_cppt,
                dokter: $user_dokter_,
                service_unit: $service_unit,
                catatan_dokter: $('[name="prescribe_catatan_dokter"]').val(),
                data: JSON.stringify(dataArrayTemp)
            },
            success: function(resp){
                $('[class*="prescribe-loading"]').hide();
                $('#send-row-prescribe').show();
                if (resp.code == 200) {
                    $('#modalPrescribeNew').modal('hide');
                    orderPrescribe();
                    orderPrescribeTemp();
                    // getResume();
                } else if (resp.code == 404) {
                    alert(resp.msg)
                } else {
                    alert(resp.msg ?? resp.pesan)
                    orderPrescribeTemp()
                }
            },
            error: function(){
                alert('Gagal menyimpan data, mohon hubungi tim Administrator');
            }
        });

		$('#sub_harga_prescribe').text(0)
    }
});

function orderPrescribe(){
    var sum_satuan = 0
    var sum_racikan = 0

    $.ajax({
        url: $dom+'/api/getorderobatnew',
        type: 'GET',
        dataType: 'json',
        data: {
            reg_no: $reg,
            type: 'final',
        },
        success: function(resp){
            if (Object.keys(resp).length>0) {
                $('#table-prescribe').html('')
                
                $.each(resp, function(i, data){
                    $bg = 'bg-warning';

                    $row_span = ''

                    $count_header = $('[id*="prescribe_header"][data-no="'+data.order_no+'"]').length

                    $status_proses = data.proses_by != '' ? 'Belum diproses' : ''
                    
                    if ($count_header < 1) {
                        $row_span = `<td class="`+$bg+` text-dark text-uppercase prescribe_header" colspan="8" data-no="`+data.orrder_no+`" width="50px">
                                        No. Order : <b>`+data.order_no+`</b> |
                                        Jam. Order : <b>`+data.waktu_order+`</b> |
                                        Status : <b>`+$status_proses+`</b>
                                    </td>`;
                    }
                                                    
                    $('#table-prescribe').append($row_span);

                    $.each(data.job_order_dt, function(i_sub, sub_data){
                        $flag = 'Racikan ke '+sub_data.temp_flag_racikan
                        $first_data = ''
                        $bg = '#87ff5e'

                        if (sub_data.temp_flag == 0) {
                            $flag = 'Satuan'
                            $bg = '#5eeaff'
                        }

                        $row_button = `<span type="button" class="badge badge-warning btn-sm" id="btn-edit-row-prescribe" data-id="`+sub_data.temp_flag_racikan+`" data-category="`+$flag+`" data-order="`+data.order_no+`"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</span>
                                        <span type="button" class="badge badge-warning prescribe-loading-2" disabled data-id="`+sub_data.temp_flag_racikan+`" data-category="`+$flag+`" data-order="`+data.order_no+`"><i class="fas fa-spinner fa-spin"></i> Mohon tunggu...</span>`;

                        $count_data = $('tr[data-no="'+data.order_no+'_'+sub_data.temp_flag+`_`+sub_data.temp_flag_racikan+'"]').length

                        if ($count_data < 1) {
                            $first_data = `<td style="background-color: `+$bg+`" data-no="`+data.order_no+'_'+sub_data.temp_flag+`_`+sub_data.temp_flag_racikan+`">
                                                <b>`+$flag+`</b><br>
                                                `+$row_button+`
                                            </td>`
                        }

                        $tr_data = `
                            <tr data-no="`+data.order_no+'_'+sub_data.temp_flag+`_`+sub_data.temp_flag_racikan+`">
                                `+$first_data+`
                                <td>`+sub_data.item_code+`</td>
                                <td>`+sub_data.item.item_name+`</td>
                                <td>`+sub_data.quantity+`</td>
                                <td>`+sub_data.dosis+`</td>
                                <td>`+sub_data.ket_dosis+`</td>
                                <td>`+sub_data.hari+` setiap `+sub_data.spesial_instruksi+` selama `+sub_data.durasi_hari+` hari</td>
                            </tr>
                        `

                        $('#table-prescribe').append($tr_data);

                        sum_satuan += parseFloat(sub_data.harga_jual) * sub_data.quantity
                    })


                    $('#total_tarif_prescribe').text('Rp. '+formatNumber(parseFloat(sum_satuan).toFixed(2)))

                    const result = data.job_order_dt.reduce((acc, order) => {
                        const { temp_flag, temp_flag_racikan } = order;
                        const key = `${temp_flag}_${temp_flag_racikan}`;
                        
                        if (!acc[key]) {
                          acc[key] = 0;
                        }
                        
                        acc[key]++;
                        
                        return acc;
                      }, {});
                    
                    const resultArray = Object.keys(result).map(key => ({
                        key,
                        value: result[key]
                      }));

                    $.each(resultArray, function(i_rws, data_rws){
                        $('td[data-no="'+data.order_no+'_'+data_rws.key+'"]').attr('rowspan', data_rws.value)
                    })
                });

                $('body #table-prescribe tr:first-child').css({
                    'background-color': '#ee5b5b',
                })
                $('body #table-prescribe tr:first-child td:not(:first-child)').css({
                    'background-color': 'white',
                })

                $('.prescribe-loading-2').hide()

                // $.ajax({
                //     url: $dom+'/auth/api/prescribe/data_order_racikan/'+r_space($reg),
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function(resp){
                //         if (Object.keys(resp).length>0) {
                //             $.each(resp, function(i, data){
                                
                //                 $bg = 'bg-info';
                                
                //                 if (i == 0) {
                //                     $row_span = '<td class="text-center text-uppercase prescribe_racikan"><b>OBAT<br>RACIKAN</br></td>';
                //                 } else {
                //                     $row_span = '';
                //                 }
            
                //                 $row_prescribe =   `<tr class="bg-info text-dark prescribe_racikan">
                //                                         `+$row_span+`
                //                                         <td colspan="6">
                //                                             <b>Racikan `+data.flag_racikan+ `</b>
                //                                         </td>
                //                                         <td class="text-center">
                //                                             <button type="button" data-category="racikan" class="btn btn-warning btn-sm" data-id="`+data.flag_racikan+`" data-order="`+data['obat'][0]['prescribe_order_code']+`" id="btn-edit-row-prescribe"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</button>
                //                                             <button class="btn btn-warning float-right prescribe-loading-2" disabled type="button" data-id="`+data.flag_racikan+`" data-category="racikan" data-order="`+data['obat'][0]['prescribe_order_code']+`"><i class="fas fa-spinner fa-spin"></i> Mohon tunggu...</button>
                //                                         </td>
                //                                     </tr>`
                                
                //                 $('#table-prescribe').append($row_prescribe);
            
                //                 $.each(data.obat, function(i, item){
                //                     $row_prescribe_obat = `<tr class="prescribe_racikan">
                //                                                     <td>`+item.prescribe_item+`</td>
                //                                                     <td>`+item.ItemName1+`</td>
                //                                                     <td>`+item.prescribe_qty+`</td>
                //                                                     <td>`+item.prescribe_dosage+`</td>
                //                                                     <td>`+item.prescribe_frequency+` selama `+item.prescribe_duration+` hari</td>
                //                                                     <td>`+condition(item.prescribe_instruction)+`</td>
                //                                                 </tr>`;
                                                                
                //                     $('#table-prescribe').append($row_prescribe_obat);
            
                //                     sum_racikan += parseFloat(item.prescribe_price)
                //                 });
            
                //             });
            
                //             $racikan_price = parseFloat($('#total_tarif_prescribe').text()) + parseFloat(sum_racikan)
                //             $('#total_tarif_prescribe').text($racikan_price.toFixed(2))
                            
                //             var rowCountrRacikan = $('#table-prescribe .prescribe_racikan').length;
                //             // alert(rowCountrRacikan)
                //             $('.prescribe_racikan').attr('rowspan', rowCountrRacikan);
                //             $('#first_row_prescribe').attr('rowspan', parseInt($('#first_row_prescribe').attr('rowspan')) + rowCountrRacikan);
            
                //             $('.prescribe-loading-2').hide()
            
                //         }
                //     }, error: function(){
                //         console.log(error);
                //     }
                // });

            }
        }, error: function(){
            console.log(error);
        }
    });
}

//PRESCRIBING FINAL
$('body').on('click', '#btn-edit-row-prescribe', function(){
    $flag = $(this).data('id')
    $category = $(this).data('category')
    $order_code = $(this).data('order')

    $('.prescribe-loading-2[data-order="'+$order_code+'"][data-category="'+$category+'"][data-id="'+$flag+'"]').show()
    $('#btn-edit-row-prescribe[data-order="'+$order_code+'"][data-category="'+$category+'"][data-id="'+$flag+'"]').hide();

    $('.row_header_satuan').html('')

    $.ajax({
        url: $dom+'/api/getFinalOrderDetail',
        type: 'GET',
        dataType: 'json',
        data: {
            reg_no: $reg,
            flag_racikan: $flag,
            order_code: $order_code,
        },
        success: function(resp){
            $('.prescribe-loading-2[data-order="'+$order_code+'"][data-category="'+$category+'"][data-id="'+$flag+'"]').hide()
            $('#btn-edit-row-prescribe[data-order="'+$order_code+'"][data-category="'+$category+'"][data-id="'+$flag+'"]').show()

            if (resp.status == 200) {
                $('#modalSOAP').modal('hide')
                $('#modalEditPrescribe').modal('show')

                let category = resp.data[0].prescribe_flag == 1 ? 'racikan' : 'satuan'

                $('[name="prescribe_flag"]').val(resp.data[0].prescribe_flag)
                $('[name="prescribe_flag_racikan"]').val(resp.data[0].prescribe_flag_racikan)
                $('[name="prescribe_order_code"]').val(resp.data[0].prescribe_order_code)

                $('#row_edit_prescribe').html('')


                $.each(resp.data, function(i, item){
                    let data_ = {
                        'temp_kode' : item.prescribe_item,
                        'temp_id' : item.prescribe_id,
                        'temp_order' : item.prescribe_order_code,
                        'temp_reg' : item.prescribe_reg,
                        'temp_quantity' : item.prescribe_qty,
                        'temp_dosis' : item.prescribe_dosage,
                        'temp_hari' : item.prescribe_frequency,
                        'temp_durasi_hari' : item.prescribe_duration,
                        'temp_ket_dosis' : item.prescribe_instruction,
                        'temp_harga_jual' : item.prescribe_price,
                        'temp_flag' : item.prescribe_flag,
                        'temp_flag_racikan' : item.prescribe_flag_racikan,
                        'temp_dokter' : item.prescribe_dokter,
                        'temp_poli' : item.prescribe_poli,
                        'temp_deleted' : item.prescribe_deleted,
                        'temp_sent' : item.prescribe_sent,
                        'temp_special_instruction' : item.prescribe_special_instruction,
                        'temp_form' : item.prescribe_form,
                        'temp_route' : item.prescribe_route,
                        'created_at' : item.created_at,
                        'updated_at' : item.updated_at,
                        'ItemName1' : item.ItemName1,
                        'ItemPrice' : item.ItemPrice,
                        'ItemStock' : item.ItemStock,
                        'ItemUnit' : item.prescribe_dosage_prep,
                        'ItemDosageUnit' : item.prescribe_dosage_unit,
                        'ItemBasicUnit' : item.prescribe_basic_unit,
                        'ItemNotes' : item.prescribe_notes,
                    }

                    getPrescribeRowSelect(data_, category, item.prescribe_id, 1)

                    $edit_flag = 'satuan'
                    if (item.prescribe_flag == 1) {
                        $edit_flag = 'racikan'
                    }

                    $('[id="r_list_dosis_'+$edit_flag+'_'+item.prescribe_id+'"]').remove()

                    $.each(item.ItemDosageList, function(sub_i, item_dosage){
                        $selected_ = ''
                        if (item_dosage.satuan_kode == item.prescribe_dosage_unit) {
                            $selected_ = 'selected' 
                        }

                        $('#prescribe_satuan_dosis_'+$edit_flag+'_'+item.prescribe_id).append('<option id="r_list_dosis_'+$category+'_'+item.prescribe_id+'" value="'+item_dosage.satuan_kode+'" '+$selected_+'>'+item_dosage.satuan_nama+'</option>')
                    })
                })

                if (category == 'racikan') {
                    $row_header = `
                        <div class="col-lg-2 pr-0 mb-3">
                            <label class="text-capitalize">Bentuk sediaan obat `+$category+`</label>
                            <select class="form-control" name="prescribe_form" id="prescribe_item_form_`+$category+`">
                                <option val="">-- Pilih sediaan obat `+$category+` --</option>
                            </select>
                        </div>
                        <div class="col-lg-2 pr-0 mb-3">
                            <label class="text-capitalize">Rute obat `+$category+`</label>
                            <select class="form-control" name="prescribe_route" id="prescribe_item_route_`+$category+`">
                                <option val="">-- Pilih rute obat `+$category+` --</option>
                            </select>
                        </div>
                    `
    
                    $('.row_header_satuan').html($row_header)
    
                    getPrescribeHeader($category, resp.data)
                }
            } else if (resp.status == 409){
                alert(resp.data)
            } else {
                alert(resp.data)
            }
        },
        error: function(){
            alert('Gagal mengambil data, mohon hubungi tim Administrator');
        }
    });
});

$('#edit-row-prescribe').click(function(){
    $.ajax({
        url: $dom+'/auth/api/prescribe/update',
        type: 'POST',
        dataType: 'json',
        data: $('#form-edit-prescribe').serialize(),
        success: function(resp){
            if (resp.status == 200) {
                $('#modalEditPrescribe').modal('hide');
                orderPrescribe();
                getResume();
                $('#row_edit_prescribe').html('')
            } else if (resp.status == 404) {
                alert(resp.data);
            }
        },
        error: function(){
            alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });
});

$('body').on('click','#btn-update-prescribe',function(){
    $id = $('#prescribe_id').val();
    $.ajax({
        url: $dom+'/auth/api/prescribe/update/'+$id,
        type: 'PATCH',
        dataType: 'json',
        data: $('#form-prescribe-update').serialize(),
        success: function(resp){
            if (resp == 200) {
                $('#modalEditPrescribe').modal('hide');
                orderPrescribe();
                getResume();
            }
        },
        error: function(){
            alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });
});

// COPY RESEP
$('[id*="copy-prescribe"]').hide()
$('[class*="prescribe-copy-loading"]').hide()

function closePrevPrescribe() {
    $('[class*="previous_prescribe_modal"]').removeClass('show').addClass('hide')
}

function lastPrescribe(execute = '', selected_reg = '') {
    $('[id*="copy-prescribe"]').hide()
    $('[class*="prescribe-copy-loading"]').show()

    $.ajax({
        url: $dom+'/auth/api/prescribe/data_last_order/',
        type: 'get',
        dataType: 'json',
        data: {
            medrec: $medrec,
            selected_reg: selected_reg,
            reg: $reg,
            execute: execute  
        },
        beforeSend: function(){
            $('#d_prev_prescribe').html('<p>Memuat data ...</p>')
        },
        success: function(resp){
            $('#d_prev_prescribe').html('')
            $('#detail_prev_prescribe').html('')

            $('[id*="copy-prescribe"]').show()
            $('[class*="prescribe-copy-loading"]').hide()

            if (resp.header.length > 0) {

                $.each(resp.data, function(i, data){

                    $row_header = `
                        <div class="detail_prev">
                            No. Register : <b>`+data.reg+`</b> <br>
                            Tanggal Order : <b>`+moment(data.tanggal_order).format('DD-MM-Y HH:mm:ss')+`</b>
                            <span type="button" class="badge badge-warning badge-md float-right" id="btn-copy-prescribe" data-reg="`+data.reg+`"><i class="fas fa-copy"></i> Salin</span>
                            <br><br>
                            <b>R/</b>
                            <span id="detail_prev_prescribe" data-order="`+data.reg+`" class="mt-2"></span>
                        </div>
                    `

                    $('#d_prev_prescribe').append($row_header);

                    $.each(data.detail, function(idx, item){
                        $flag = 'satuan'
                        $form = ''
    
                        if (item.temp_flag == 1) {
                            $flag = 'racikan ke '+item.temp_flag_racikan
                            $form = `
                                m.f.l.a .Dtd. `+condition(item.temp_form)+`
                                <br>
                            `
                        }

                        $row_detail = `
                            <span class="ml-4">
                                `+item.temp_nama+` `+parseFloat(item.temp_dosis)+` `+item.temp_satuan_dosis+` (`+$flag+`)
                                <br>
                            </span>
                        `

                        $('#detail_prev_prescribe[data-order="'+data.reg+'"]').append($row_detail);
                    })
                })

                orderPrescribeTemp()
            } else {
                $('#d_prev_prescribe').html('<p>Tidak ada resep sebelumnya</p>');
            }
        },
        error: function(){
            // alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });
}

$('body').on('click', '#copy-prescribe', function(){
    lastPrescribe()
    $('[class*="previous_prescribe_modal"]').removeClass('hide').addClass('show')
        .find('h4').html('<b>Data Resep Sebelumnya</b>')
})

$('body').on('click', '#btn-copy-prescribe', function(){
    if (confirm('Apakah anda yakin akan menyalin resep sebelumnya ?')) {
        $reg_ = $(this).data('reg')

        lastPrescribe(1, $reg_)
    }
})

$('body').on('keypress', '[name="prescribe_dosis[]"], [name="prescribe_quantity[]"]', function(e){
    if (e.which == 13 || e.which == 44) {
        alert('Gunakan tanda titik "." untuk bilangan pecahan');
        return false; //<-- prevent
    }
})