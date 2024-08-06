$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$dom = '';
var arrayObat=[];
$('#btn-add-prescribe').click(function(){
    $('#modalSOAP').modal('hide');
    $('#modalPrescribe').modal('show');
    //integrasiObat();
});

$('#field_prescribe').hide();
$('.load_prescribe').hide();
$('#detail_prescribe').hide();

//orderPrescribe();
//orderPrescribeTemp();

$('#btn-reload-prescribe').click(function(){
    orderPrescribe();
});

$("#modalPrescribe").on("hidden.bs.modal", function(){
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

function integrasiObat(){
    var nyaa_namaobat=$('#x_nama_obat_cari').val();
    // var nyaa_namaasal='ranap';
    var nyaa_namaasal='rajal';
    $.ajax({
        url: 'http://rsud.sumselprov.go.id/farmasi/web-apis/get-stokdepo?akseskunci=229470a5-fe98-479e-ba3f-5c5b8eec7c88&location='+nyaa_namaasal+'&limit=100&keyword='+encodeURIComponent(nyaa_namaobat),
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('body').find('.text-load').text('Memuat data obat ...');
        },
        success: function(resp){
            $('body').find('.text-load').text('');

            // RESET UWU
            $('#pilihObat').html('');
            arrayObat=[];

            if (resp.data.length > 0) {
                $.each(resp.data, function(i, data){
                    // console.log(data)
                    arrayObat.push(data)
                    // $opt_obat = '<option value="'+data.item_id+'" >'+data.item_id+' - '+data.item_name+'</option>';
                    $opt_obat = `<option value="${data.item_id}">${data.item_name} - [Stok: ${Number(data.total)-0} ${data.satuan_dasar}] - Rp${Math.ceil(Number(data.harga_jual))}@${data.satuan_dasar}</option>`;
                    $('#pilihObat').append($opt_obat);
                });
            } else {
                $('##pilihObat').append('<option>Tidak ada data</option>');
            }
            $('#total_prescribe').text(resp.length);
            //templateRowPrescribeTemp(null, 'row_racikan', );
            //templateRowPrescribeTemp(null, 'row_satuan', 'satuan');
        }
    });
}

function getObat($id = '', $category = ''){

    /*$.ajax({
        url: 'http://rsud.sumselprov.go.id/farmasi/web-apis/get-stokdepo?akseskunci=229470a5-fe98-479e-ba3f-5c5b8eec7c88&location=ranap&debug=true',
        type: 'GET',
        dataType: 'json',
        success: function(resp){
            //console.log(resp)
            $('#field_prescribe').show();
            if (resp.data.length > 0) {
                $.each(resp.data, function(i, data){
                    $opt_obat = '<option value="'+data.item_id+'" data-id="'+data.item_id+'" data-item="'+data.item_name+'" data-stock="'+data.total+'" data-price="'+data.harga_jual+'" data-category="'+$category+'">'+data.item_id+' - '+data.item_name+'</option>';
                    $('#'+$id).append($opt_obat);
                });
            } else {
                $('#'+$id).append('<option>Tidak ada data</option>');
            }
            $('#total_prescribe').text(resp.length);
        },
        error: function(){
            alert('Gagal menampilkan data obat, mohon refresh')
        }
    });*/
}

function orderPrescribe(){
    $.ajax({
        url: $dom+'/auth/api/prescribe/data_order_satuan/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('#table-prescribe').html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0) {
                $.each(resp, function(i, data){

                    $bg = 'bg-warning';

                    if (i == 0) {
                        $row_span = '<td class="text-center '+$bg+' text-dark text-uppercase prescribe_satuan_"><b>OBAT<br>SATUAN</b></td>';
                        $row_button = '<td class="prescribe_satuan_ text-center">'+
                                            '<button type="button" class="btn btn-warning btn-sm ml-1" id="btn-edit-row-prescribe" data-id="'+data.prescribe_flag_racikan+'" data-category="satuan" data-order="'+data.prescribe_order_code+'"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</button>'+
                                        '</td>';
                    } else {
                        $row_span = '';
                        $row_button = '';
                    }

                    $row_prescribe_satuan = '<tr class="prescribe_satuan">'+
                                                        $row_span+
                                                        '<td>'+data.prescribe_item+'</td>'+
                                                        '<td>'+data.ItemName1+'</td>'+
                                                        '<td>'+data.prescribe_qty+'</td>'+
                                                        '<td>'+data.prescribe_dosage+'</td>'+
                                                        '<td>'+data.prescribe_frequency+' selama '+data.prescribe_duration+' hari</td>'+
                                                        '<td>'+condition(data.prescribe_instruction)+'</td>'+
                                                        $row_button+
                                                    '</tr>';

                    $('#table-prescribe').append($row_prescribe_satuan);

                });

                var rowCountSatuan = $('.table_detail_prescribe .prescribe_satuan').length;
                $('.prescribe_satuan_').attr('rowspan', rowCountSatuan);

            }
        }, error: function(){
            console.log(error);
        }
    });

    $.ajax({
        url: $dom+'/auth/api/prescribe/data_order_racikan/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('#table-prescribe').html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0) {
                $.each(resp, function(i, data){

                    $bg = 'bg-info';

                    if (i == 0) {
                        $row_span = '<td class="text-center text-uppercase prescribe_racikan"><b>OBAT<br>RACIKAN</br></td>';
                    } else {
                        $row_span = '';
                    }

                    $row_prescribe =   '<tr class="bg-info text-dark prescribe_racikan">'+
                                            $row_span+
                                            '<td colspan="6">'+
                                                '<b>Racikan '+data.flag_racikan+ '</b> ( '+data.dosis+', '+data.hari+' selama '+data.durasi_hari+' hari )'+
                                            '</td>'+
                                            '<td class="text-center">'+
                                                '<button type="button" data-category="satuan" class="btn btn-warning btn-sm" data-id="'+data.flag_racikan+'" data-order="'+data['obat'][0]['prescribe_order_code']+'" id="btn-edit-row-prescribe"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</button>'+
                                            '</td>'+
                                        '</tr>';

                    $('#table-prescribe').append($row_prescribe);

                    $.each(data.obat, function(i, item){
                        $row_prescribe_obat = '<tr class="prescribe_racikan">'+
                                                        '<td>'+item.prescribe_item+'</td>'+
                                                        '<td>'+item.ItemName1+'</td>'+
                                                        '<td>'+item.prescribe_qty+'</td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td>'+condition(item.prescribe_instruction)+'</td>'+
                                                    '</tr>';

                        $('#table-prescribe').append($row_prescribe_obat);
                    });

                });

                var rowCountrRacikan = $('#table-prescribe .prescribe_racikan').length;
                // alert(rowCountrRacikan)
                $('.prescribe_racikan').attr('rowspan', rowCountrRacikan);

            }
        }, error: function(){
            console.log(error);
        }
    });
}

$('body').on('click', '#btn-edit-row-prescribe', function(){
    $('#modalSOAP').modal('hide');
    $('#modalEditPrescribe').modal('show');
    $flag = $(this).data('id');
    $order_code = $(this).data('order');

    $.ajax({
        url: $dom+'/auth/api/prescribe/detail_order',
        type: 'GET',
        dataType: 'json',
        data: {
            reg_no: $reg,
            flag_racikan: $flag,
            order_code: $order_code,
        },
        success: function(resp){
            templateRowPrescribe(resp, 'row_edit_prescribe', '')
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
            if (resp == 200) {
                $('#modalEditPrescribe').modal('hide');
                orderPrescribe();
                getResume();
            } else if (resp == 409) {
                alert('Order obat tidak bisa diubah karena sudah diproses bagian farmasi');
            }
        },
        error: function(){
            alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });
});

// PRESCRIBING TEMPORARY
function orderPrescribeTemp(){
    $.ajax({
        url: $dom+'/auth/api/prescribe/data_satuan_temp/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('.row_prescribe_temp').remove();
            $('#table-row-prescribe').html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0) {
                $.each(resp, function(i, data){

                    $bg = 'bg-warning';

                    if (i == 0) {
                        $row_span = '<td class="text-center '+$bg+' text-dark text-uppercase cat_satuan"><b>OBAT<br>SATUAN</b></td>';
                        $row_button = '<td class="cat_satuan text-center">'+
                                            '<button type="button" class="btn btn-warning btn-sm ml-1" id="btn-edit-row-temp" title="Edit row obat" data-id="'+data.temp_flag+'" data-category="satuan"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</button>'+
                                        '</td>';
                    } else {
                        $row_span = '';
                        $row_button = '';
                    }

                    $row_prescribe_temp_obat = '<tr class="tr_satuan">'+
                                                        $row_span+
                                                        '<td>'+data.temp_kode+'</td>'+
                                                        '<td>'+
                                                            data.ItemName1+
                                                            '<span type="button" class="float-right text-danger mr-1" title="Hapus Item Obat" id="btn-delete-row-temp" data-id="'+data.temp_id+'"><i class="fas fa-trash"></i></span>'+
                                                        '</td>'+
                                                        '<td>'+data.temp_quantity+'</td>'+
                                                        '<td>'+data.temp_ket_dosis+'</td>'+
                                                        $row_button
                                                    '</tr>';

                    $('#table-row-prescribe').append($row_prescribe_temp_obat);

                });
                $('.th_satuan').attr('colspan', 2);
                var rowCountSatuan = $('.table_detail_order .tr_satuan').length;
                $('.cat_satuan').attr('rowspan', rowCountSatuan);

            }
        }, error: function(){
            console.log(error);
        }
    });

    $.ajax({
        url: $dom+'/auth/api/prescribe/data_temp/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('.row_prescribe_temp').remove();
            $('#table-row-prescribe').html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0) {
                $.each(resp, function(i, data){


                    $bg = 'bg-info';

                    if (i == 0) {
                        $row_span = '<td class="text-center text-uppercase cat_racikan"><b>OBAT<br>RACIKAN</br></td>';
                    } else {
                        $row_span = '';
                    }

                    $row_prescribe_temp =   '<tr class="bg-info text-dark tr_racikan">'+
                                                $row_span+
                                                '<td colspan="4">'+
                                                    '<b>Racikan '+data.flag_racikan+ '</b> ( '+data.dosis+' x '+data.hari+' selama '+data.durasi_hari+' hari )'+
                                                '</td>'+
                                                '<td class="text-center">'+
                                                    '<button type="button" data-id="'+data.flag_racikan+'" data-category="racikan" class="btn btn-warning btn-sm" id="btn-edit-row-temp" title="Edit row obat"><i class="fas fa-edit" style="font-size: 12px"></i> Edit</button>'+
                                                '</td>'+
                                            '</tr>';

                    $('#table-row-prescribe').append($row_prescribe_temp);

                    $.each(data.obat, function(i, item){
                        $row_prescribe_temp_obat = '<tr class="tr_racikan">'+
                                                        '<td>'+item.temp_kode+'</td>'+
                                                        '<td>'+
                                                            item.ItemName1+
                                                            '<span type="button" class="float-right text-danger mr-1" title="Hapus Item Obat" id="btn-delete-row-temp" data-id="'+item.temp_id+'"><i class="fas fa-trash"></i></span>'+
                                                        '</td>'+
                                                        '<td>'+item.temp_quantity+'</td>'+
                                                        '<td>'+item.temp_ket_dosis+'</td>'+
                                                        '<td></td>'+
                                                    '</tr>';

                        $('#table-row-prescribe').append($row_prescribe_temp_obat);
                    });

                });

                var rowCountrRacikan = $('.table_detail_order .tr_racikan').length;
                $('.cat_racikan').attr('rowspan', rowCountrRacikan);

            }
        }, error: function(){
            console.log(error);
        }
    });

}

function prescribeItem($id = ''){
    $kode = $('#'+$id).find(':selected').data('id');
    $item = $('#'+$id).find(':selected').data('item');
    $stock = $('#'+$id).find(':selected').data('stock');
    $price = $('#'+$id).find(':selected').data('price');
    $category = $('#'+$id).find(':selected').data('category');


    if ($id == 'prescribe_item_'+$category) {
        var num = '';
    } else {
        var num = $('#'+$id).data('id');
    }

    // if ($stock < 1) {
    //     alert('Stok obat '+$item+' telah habis');
    // } else {

    // }
    $('body #prescribe_harga_jual_racikan_'+num+''+$category).val($price);
    $('body #prescribe_stock_racikan_'+num+''+$category).val($stock);
}

$('body').on('click', '#add-row-racikan', function(){
    var num = $('div#racikan_item').length + 1;
    $req = '<span class="text-danger"> *<span>';
    $elm_id = "prescribe_item_"+num;
    $category = $(this).data('category');

    if ($category == '') {
        $jenis = 'racikan';
        $jenis2 = '';
        $readonly = 'readonly';
    } else if ($category == 'satuan') {
        $jenis = 'satuan';
        $jenis2 = 'satuan';
        $readonly = '';
    } else if ($category == 'edit_prescribe') {
        $jenis = 'edit_prescribe';
        $jenis2 = 'edit_prescribe';
        $readonly = '';
    }

    $prescribe_dosis = $('#prescribe_dosis_').val();
    $prescribe_hari = $('#prescribe_hari_').val();
    $prescribe_durasi_hari = $('#prescribe_durasi_hari_').val();

    $row_racikan = '<div class="row row_racikan_'+num+'" data-id="'+num+'">'+
                        '<div class="col-lg-3 pr-0">'+
                            '<div class="form-group" id="racikan_item">'+
                                '<label class="text-capitalize">Nama Obat '+$category+'</label>'+
                                '<select class="form-control select_'+num+' select2-hidden-accessible" name="prescribe_item[]" id="'+$elm_id+'" data-id="'+num+'" onchange="prescribeItem(this.id)" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                                    '<option value="">-- Pilih nama obat --</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-1 px-0">'+
                            '<label for="" class="label-admisi">Jumlah Obat '+$req+'</label>'+
                            '<input type="number" name="prescribe_quantity[]" step="any" id="prescribe_quantity" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Jumlah obat">'+
                            '<small>'+$req+' <i>menggunakan titik</i></small>'+
                        '</div>'+
                        '<div class="col-lg-1 px-0">'+
                            '<label for="" class="label-admisi">Dosis '+$req+'</label>'+
                            '<input type="text" name="prescribe_dosis[]" id="prescribe_dosis_'+$jenis2+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 250 ml">'+
                        '</div>'+
                        '<div class="col-lg-1 px-0">'+
                            '<label for="" class="label-admisi">Frekuensi '+$req+'</label>'+
                            '<input type="text" name="prescribe_hari[]" id="prescribe_hari_'+$jenis2+'" value="'+$prescribe_hari+'" '+$readonly+' class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 3x1">'+
                        '</div>'+
                        '<div class="col-lg-1 px-0">'+
                            '<label for="" class="label-admisi">Durasi Hari '+$req+'</label>'+
                            '<input type="text" name="prescribe_durasi_hari[]" id="prescribe_durasi_hari_'+$jenis2+'" value="'+$prescribe_durasi_hari+'" '+$readonly+' class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh : 5">'+
                        '</div>'+
                        '<div class="col-lg-3 px-0">'+
                            '<label for="" class="label-admisi">Aturan Pakai</label>'+
                            '<input type="text" name="prescribe_ket_dosis[]" id="prescribe_ket_dosis" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Aturan pakai">'+
                        '</div>'+
                        '<div class="col-lg-2 px-0">'+
                            '<label for="" class="label-admisi">Stok</label>'+
                            '<div class="input-group">'+
                                '<input type="hidden" name="prescribe_harga_jual[]" id="prescribe_harga_jual_racikan_'+num+''+$jenis2+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<input type="text" id="prescribe_stock_racikan_'+$jenis+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<div class="input-group-append no-radius mt-1" id="remove-row-racikan" data-id="'+num+'">'+
                                    '<span class="input-group-text bg-danger text-white" style="height: 42px; cursor: pointer"><i class="fas fa-times"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

    $('#row_'+$jenis).append($row_racikan);

    $('.select_'+num).select2();

    getObat($elm_id, $jenis2);
});

$('body').on('click', '#remove-row-racikan', function(){
    $id = $(this).data('id');

    $('.row_racikan_'+$id).remove();
});

$('body').on('click', '#cancel-row-prescribe', function(){
    $category = $(this).data('category');

    if ($category == 'satuan') {
        $category_ = 'satuan';
    } else {
        $category_ = '';
    }

    templateRowPrescribeTemp(null, 'row_'+$category, $category_);
});

$('body').on('click', '#store-row-prescribe', function(){
    $category = $(this).data('category');

    if ($category == 'satuan') {
        $category_ = 'satuan';
    } else {
        $category_ = '';
    }

    $.ajax({
        url: $dom+'/auth/api/prescribe/store_temp',
        type: 'POST',
        dataType: 'json',
        data: $('#form-obat-'+$category).serialize(),
        success: function(resp){
            if (resp == 200) {
                templateRowPrescribeTemp(null, 'row_'+$category, $category_);
                orderPrescribeTemp();
                $('div[class*="row_racikan_"]').remove();
            } else if (resp == 404) {
                alert('Item obat tidak boleh kosong');
            }
        },
        error: function(){
            alert('Gagal menyimpan data, mohon hubungi tim Administrator');
        }
    });

});


$('body').on('click', '#btn-edit-row-temp', function(){
    $id = $(this).data('id');
    $category = $(this).data('category');

    $('a[id*="-tab"]').removeClass('active');
    $('div[aria-labelledby*="-tab"]').removeClass('active show');

    $('#'+$category+'-tab').addClass('active');
    $('div[aria-labelledby*="'+$category+'-tab"]').addClass('active show');

    if ($category == 'satuan') {
        $category_ = 'satuan';
    } else {
        $category_ = '';
    }

    $.ajax({
        url: $dom+'/auth/api/prescribe/detail_temp/'+$id+'/'+$category+'/'+$subs,
        type: 'GET',
        dataType: 'json',
        success: function(resp){
            templateRowPrescribeTemp(resp, 'row_'+$category, $category_);
        }
    });
});

$('body').on('click', '#btn-delete-row-temp', function(){
    $id = $(this).data('id');

    if (confirm('Apakah anda yakin akan mengahapus item obat ini ?')) {
        $.ajax({
            url: $dom+'/auth/api/prescribe/delete_temp/'+$id,
            type: 'GET',
            dataType: 'json',
            success: function(resp){
                orderPrescribeTemp();
            },
            error: function(){
                alert('Gagal mengapus data, mohon hubungi tim IT');
            }
        });
    }

});




//PRESCRIBING FINAL
$('body').on('click', '.edit_orderprescribe', function(){
    $id = $(this).data('id');
    resetForm('#form-prescribe-update');
    $('#modalEditPrescribe').modal('show');
    $('#prescribe_id').val($id);

    $.ajax({
        url: $dom+'/auth/api/prescribe/data_order/'+$subs+'/'+$id,
        type: 'GET',
        dataType: 'json',
        success: function(resp){
            res = resp.obat[0];
                $('input#prescribe_update_item').val(res.ItemName1);
                $('input[name="prescribe_update_method"]').val(res.prescribe_method);
                $('input[name="prescribe_update_required"][value="'+res.prescribe_required+'"]').prop('checked', true);
                $('input[name="prescribe_update_dosage"]').val(res.prescribe_dosage);
                $('input[name="prescribe_update_unit"]').val(res.prescribe_unit);
                $('input[name="prescribe_update_frequency"]').val(res.prescribe_frequency);
                $('input[name="prescribe_update_duration"]').val(res.prescribe_duration);
                $('input[name="prescribe_update_qty"]').val(res.prescribe_qty);
                $('input[name="prescribe_update_item_unit"]').val(res.prescribe_item_unit);
                $('input[name="prescribe_update_route"]').val(res.prescribe_route);
                checkbox('prescribe_update_number[]', res.prescribe_number);
                $('input[name="prescribe_update_date"]').val(res.prescribe_date);
                $('input[name="prescribe_update_time"]').val(res.prescribe_time);
                $('select[name="prescribe_update_instruction"]').val(res.prescribe_instruction);
                $('input[name="prescribe_update_type"][value="'+res.prescribe_type+'"]').prop('checked', true);
                $('input[name="prescribe_update_iteration"]').val(res.prescribe_iteration);
                $('textarea[name="prescribe_update_note"]').text(res.prescribe_note);
                $('input[name="prescribe_update_price"]').val(res.prescribe_price);
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

$('body').on('click', '.remove_orderprescribe', function(event){
    $id = $(this).data('id');

    if (confirm("Apakah anda yakin ingin menghapus order tindakan ?")) {
        $.ajax({
            url: $dom+'/auth/api/prescribe/delete_order/'+$id,
            type: 'DELETE',
            dataType: 'json',
            success: function(resp){
                orderPrescribe();
            }
        });
    }
});

function templateRowPrescribe(items = null, id = '', category = ''){
    $('#'+id).html('');

    $req = '<span class="text-danger"> *<span>';

    $('#form-edit-prescribe [name="prescribe_flag"]').val(items[0]['prescribe_flag']);
    $('#form-edit-prescribe [name="prescribe_flag_racikan"]').val(items[0]['prescribe_flag_racikan']);
    $('#form-edit-prescribe [name="prescribe_unit"]').val(items[0]['prescribe_unit']);
    $('#form-edit-prescribe [name="prescribe_order_code"]').val(items[0]['prescribe_order_code']);

    if (items != null) {
        $.each(items, function(i, data){

            $elm_id = "prescribe_item_"+data.prescribe_id;

            if (i == 0) {

                $row_button =   '<input type="hidden" name="prescribe_harga_jual[]" value="'+data.prescribe_price+'" id="prescribe_harga_jual_racikan_'+data.prescribe_id+''+category+'" class="form-control no-radius mt-1" style="height: 40px;">'+
                                '<input type="text" id="prescribe_stock_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;">'+
                                '<div class="input-group-append no-radius mt-1" id="add-row-racikan" data-category="edit_prescribe">'+
                                    '<span class="input-group-text bg-primary text-white" style="height: 42px; cursor: pointer"><i class="fas fa-plus"></i></span>'+
                                '</div>';
            } else {
                $row_button = '<input type="hidden" name="prescribe_harga_jual[]" value="'+data.prescribe_price+'" id="prescribe_harga_jual_racikan_'+data.prescribe_id+''+category+'" class="form-control no-radius mt-1" style="height: 40px;">'+
                                '<input type="text" id="prescribe_stock_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;">'+
                                '<div class="input-group-append no-radius mt-1" id="remove-row-racikan" data-id="'+data.prescribe_id+'">'+
                                    '<span class="input-group-text bg-danger text-white" style="height: 42px; cursor: pointer"><i class="fas fa-times"></i></span>'+
                                '</div>';
            }

            $row_racikan = '<div class="row row_racikan_'+data.prescribe_id+'" data-id="'+data.prescribe_id+'">'+
                                '<input type="hidden" value="'+data.prescribe_flag_racikan+'" name="prescribe_flag_racikan">'+
                                '<input type="hidden" value="'+data.prescribe_flag+'" name="prescribe_flag">'+
                                '<input type="hidden" value="update" name="prescribe_status">'+
                                '<div class="col-lg-3 pr-0">'+
                                    '<div class="form-group" id="racikan_item">'+
                                        '<label class="text-capitalize">Nama Obat '+category+'</label>'+
                                        '<select class="form-control select_'+data.prescribe_id+' select2-hidden-accessible" name="prescribe_item[]" id="'+$elm_id+'" data-id="'+data.prescribe_id+'" onchange="prescribeItem(this.id)" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                                            '<option value="'+data.prescribe_item+'"> '+data.ItemName1+' </option>'+
                                        '</select>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Jumlah Obat '+$req+'</label>'+
                                    '<input type="number" name="prescribe_quantity[]" step="any" id="prescribe_quantity" value="'+data.prescribe_qty+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Jumlah obat">'+
                                    '<small>'+$req+' <i>menggunakan titik</i></small>'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Dosis '+$req+'</label>'+
                                    '<input type="text" name="prescribe_dosis[]" id="prescribe_dosis_'+category+'" value="'+data.prescribe_dosage+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 250 ml">'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Frekuensi '+$req+'</label>'+
                                    '<input type="text" name="prescribe_hari[]" id="prescribe_hari_'+category+'" value="'+data.prescribe_frequency+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 3x1">'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Durasi Hari '+$req+'</label>'+
                                    '<input type="text" name="prescribe_durasi_hari[]" id="prescribe_durasi_hari_'+category+'" value="'+data.prescribe_duration+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh : 5">'+
                                '</div>'+
                                '<div class="col-lg-3 px-0">'+
                                    '<label for="" class="label-admisi">Aturan Pakai</label>'+
                                    '<input type="text" name="prescribe_ket_dosis[]" id="prescribe_ket_dosis" value="'+data.prescribe_instruction+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Aturan pakai">'+
                                '</div>'+
                                '<div class="col-lg-2 px-0">'+
                                    '<label for="" class="label-admisi">Stok</label>'+
                                    '<div class="input-group">'+
                                        $row_button+
                                    '</div>'+
                                '</div>'+
                            '</div>';

            $('#'+id).append($row_racikan);

            $('.select_'+data.prescribe_id).select2();

            getObat($elm_id, category);
        });
    }
}

function templateRowPrescribeTemp(items = null, id = '', category = '', update = ''){
    $('#'+id).html('');

    $req = '<span class="text-danger"> *<span>';

    if (items != null) {
        $.each(items, function(i, data){

            $elm_id = "prescribe_item_"+data.temp_id;

            if (i == 0) {
                $elm_id = "prescribe_item_";

                $row_button =   '<input type="hidden" name="prescribe_harga_jual[]" value="'+data.temp_harga_jual+'" id="prescribe_harga_jual_racikan_'+data.temp_id+''+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<input type="text" id="prescribe_stock_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<div class="input-group-append no-radius mt-1" id="add-row-racikan" data-category="'+category+'">'+
                                    '<span class="input-group-text bg-primary text-white" style="height: 42px; cursor: pointer"><i class="fas fa-plus"></i></span>'+
                                '</div>';
            } else {
                $row_button = '<input type="hidden" name="prescribe_harga_jual[]" value="'+data.temp_harga_jual+'" id="prescribe_harga_jual_racikan_'+data.temp_id+''+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<input type="text" id="prescribe_stock_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                '<div class="input-group-append no-radius mt-1" id="remove-row-racikan" data-id="'+data.temp_id+'">'+
                                    '<span class="input-group-text bg-danger text-white" style="height: 42px; cursor: pointer"><i class="fas fa-times"></i></span>'+
                                '</div>';
            }

            $row_racikan = '<div class="row row_racikan_'+data.temp_id+'" data-id="'+data.temp_id+'">'+
                                '<input type="hidden" value="'+data.temp_flag_racikan+'" name="prescribe_flag_racikan">'+
                                '<input type="hidden" value="'+data.temp_flag+'" name="prescribe_flag">'+
                                '<input type="hidden" value="update" name="prescribe_status">'+
                                '<div class="col-lg-3 pr-0">'+
                                    '<div class="form-group" id="racikan_item">'+
                                        '<label class="text-capitalize">Nama Obat '+category+'</label>'+
                                        '<select class="form-control select_'+data.temp_id+' select2-hidden-accessible" name="prescribe_item[]" id="'+$elm_id+'" data-id="'+data.temp_id+'" onchange="prescribeItem(this.id)" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                                            '<option value="'+data.temp_kode+'"> '+data.ItemName1+' </option>'+
                                        '</select>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Jumlah Obat '+$req+'</label>'+
                                    '<input type="number" name="prescribe_quantity[]" step="any" id="prescribe_quantity" value="'+data.temp_quantity+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Jumlah obat">'+
                                    '<small>'+$req+' <i>menggunakan titik</i></small>'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Dosis '+$req+'</label>'+
                                    '<input type="text" name="prescribe_dosis[]" id="prescribe_dosis_'+category+'" value="'+data.temp_dosis+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 250 ml">'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Frekuensi '+$req+'</label>'+
                                    '<input type="text" name="prescribe_hari[]" id="prescribe_hari_'+category+'" value="'+data.temp_hari+'" readonly class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 3x1">'+
                                '</div>'+
                                '<div class="col-lg-1 px-0">'+
                                    '<label for="" class="label-admisi">Durasi Hari '+$req+'</label>'+
                                    '<input type="text" name="prescribe_durasi_hari[]" id="prescribe_durasi_hari_'+category+'" value="'+data.temp_durasi_hari+'" readonly class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh : 5">'+
                                '</div>'+
                                '<div class="col-lg-3 px-0">'+
                                    '<label for="" class="label-admisi">Aturan Pakai</label>'+
                                    '<input type="text" name="prescribe_ket_dosis[]" id="prescribe_ket_dosis" value="'+data.temp_ket_dosis+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Aturan pakai">'+
                                '</div>'+
                                '<div class="col-lg-2 px-0">'+
                                    '<label for="" class="label-admisi">Stok</label>'+
                                    '<div class="input-group">'+
                                        $row_button+
                                    '</div>'+
                                '</div>'+
                            '</div>';

            $('#'+id).append($row_racikan);

            $('.select_'+data.temp_id).select2();

            getObat($elm_id, category);
        });
    } else {
        $row_racikan = '<div class="row">'+
                            '<div class="col-lg-3 pr-0">'+
                                '<div class="form-group" id="racikan_item">'+
                                    '<label class="text-capitalize">Nama Obat '+category+'</label>'+
                                    '<select class="form-control select2 select2-hidden-accessible" name="prescribe_item[]" id="prescribe_item_'+category+'" category="'+category+'" onchange="prescribeItem(this.id)" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                                        '<option value="">-- Pilih nama obat --</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-1 px-0">'+
                                '<label for="" class="label-admisi">Jumlah Obat '+$req+'</label>'+
                                '<input type="number" name="prescribe_quantity[]" step="any" id="prescribe_quantity" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Jumlah obat">'+
                                '<small>'+$req+' <i>menggunakan titik</i></small>'+
                            '</div>'+
                            '<div class="col-lg-1 px-0">'+
                                '<label for="" class="label-admisi">Dosis '+$req+'</label>'+
                                '<input type="text" name="prescribe_dosis[]" id="prescribe_dosis_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 250 ml">'+
                            '</div>'+
                            '<div class="col-lg-1 px-0">'+
                                '<label for="" class="label-admisi">Frekuensi '+$req+'</label>'+
                                '<input type="text" name="prescribe_hari[]" id="prescribe_hari_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh 3x1">'+
                            '</div>'+
                            '<div class="col-lg-1 px-0">'+
                                '<label for="" class="label-admisi">Durasi Hari '+$req+'</label>'+
                                '<input type="text" name="prescribe_durasi_hari[]" id="prescribe_durasi_hari_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Contoh : 5">'+
                            '</div>'+
                            '<div class="col-lg-3 px-0">'+
                                '<label for="" class="label-admisi">Aturan Pakai</label>'+
                                '<input type="text" name="prescribe_ket_dosis[]" id="prescribe_ket_dosis" class="form-control no-radius mt-1" style="height: 40px;" placeholder="Aturan pakai">'+
                            '</div>'+
                            '<div class="col-lg-2 px-0">'+
                                '<label for="" class="label-admisi">Stok</label>'+
                                '<div class="input-group">'+
                                    '<input type="hidden" name="prescribe_harga_jual[]" id="prescribe_harga_jual_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                    '<input type="text" id="prescribe_stock_racikan_'+category+'" class="form-control no-radius mt-1" style="height: 40px;" readonly>'+
                                    '<div class="input-group-append no-radius mt-1" id="add-row-racikan" data-category="'+category+'">'+
                                        '<span class="input-group-text bg-primary text-white" style="height: 42px; cursor: pointer"><i class="fas fa-plus"></i></span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

            $('#'+id).append($row_racikan);

            $('.select2').select2();

            getObat('prescribe_item_'+category, category);
    }
}

$('body').on('keypress', '[name="prescribe_dosis[]"]', function(e){
    if (e.which == 13 || e.which == 44) {
        alert('Gunakan tanda titik "." untuk bilangan pecahan');
        return false; //<-- prevent
    }
})

//koding baru

/*$('body').on('change','#pilihObat',function(){
    var cmbPilihObat=document.getElementById('pilihObat')
    var index=cmbPilihObat.options.selectedIndex-1;
    console.log(arrayObat[index]);

})*/
function pilihObat(){
    var cmbPilihObat=document.getElementById('pilihObat')
    var index=cmbPilihObat.options.selectedIndex-1;
    //console.log(arrayObat[index]);
    setRowOrder(index)
}

function setRowOrder(index){
    var itemData=arrayObat[Number(index)+1]
    console.log(itemData)
    var bodyTable=document.getElementById('table-row-prescribe')
    var posisi=bodyTable.rows.length

    const tr=document.createElement("tr")
    const col1=document.createElement("td")
    const col2=document.createElement("td")
    const col3=document.createElement("td")
    const col4=document.createElement("td")
    const col5=document.createElement("td")
    const col6=document.createElement("td")
    const col7=document.createElement("td")
    const col8=document.createElement("td")
    const col9=document.createElement("td")
    const col10=document.createElement("td")

    const rowJenis=document.createElement("label")
    rowJenis.id='jenis'+posisi
    rowJenis.name='jenis'+posisi
    rowJenis.innerText='satuan'
    const rowKodeObat=document.createElement('input')
    rowKodeObat.id='kode_obat'+posisi
    rowKodeObat.name='kode_obat'+posisi
    rowKodeObat.value=itemData.item_id
    rowKodeObat.readOnly=true
    const rowNamaObat=document.createElement('label')
    rowNamaObat.id='nama_obat'+posisi
    rowNamaObat.name='nama_obat'+posisi
    rowNamaObat.innerText=itemData.item_name
    const rowQty=document.createElement('input')
    rowQty.id='qty'+posisi
    rowQty.name='qty'+posisi
    const rowDosis=document.createElement('input')
    rowDosis.id='dosis'+posisi
    rowDosis.name='dosis'+posisi
    const rowHari=document.createElement('input')
    rowHari.id='hari'+posisi
    rowHari.name='hari'+posisi
    const rowDurasi=document.createElement('input')
    rowDurasi.id='durasi'+posisi
    rowDurasi.name='durasi'+posisi

    // HARGA OBAT
    const rowHargaSatuan=document.createElement('div')
    const rowHargaSatuaninput=document.createElement('input')
    rowHargaSatuaninput.id='hargasatuan'+posisi
    rowHargaSatuaninput.name='hargasatuan'+posisi
    rowHargaSatuaninput.value=itemData.harga_jual
    rowHargaSatuaninput.readOnly = true
    rowHargaSatuaninput.type = 'hidden'

    // SEMENTARA - INJECT INDEX FIELD
    const posisidatainput=document.createElement('input')
    posisidatainput.id='posisi_data'+posisi
    posisidatainput.name='posisi_data'+posisi
    posisidatainput.className='posisi_data'
    posisidatainput.value=posisi
    posisidatainput.readOnly = true
    posisidatainput.type = 'hidden'

    rowHargaSatuan.innerHTML = `<span>Rp${(Math.ceil(itemData.harga_jual)+0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</span>`+rowHargaSatuaninput.outerHTML+posisidatainput.outerHTML;

    const rowKeterangan=document.createElement('input')
    rowKeterangan.id='keterangan'+posisi
    rowKeterangan.name='keterangan'+posisi

    const rowAksi=document.createElement('button')
    rowAksi.id='delete'+posisi
    rowAksi.name='delete'+posisi
    rowAksi.className='btn btn-danger'
    rowAksi.innerText='hapus'

    col1.appendChild(rowJenis)
    col2.appendChild(rowKodeObat)
    col3.appendChild(rowNamaObat)
    col4.appendChild(rowQty)
    col5.appendChild(rowDosis)
    col6.appendChild(rowHari)
    col7.appendChild(rowDurasi)
    col8.appendChild(rowHargaSatuan)
    col9.appendChild(rowKeterangan)
    col10.appendChild(rowAksi)

    tr.appendChild(col1)
    tr.appendChild(col2)
    tr.appendChild(col3)
    tr.appendChild(col4)
    tr.appendChild(col5)
    tr.appendChild(col6)
    tr.appendChild(col7)
    tr.appendChild(col8)
    tr.appendChild(col9)
    tr.appendChild(col10)
    bodyTable.appendChild(tr)

}

