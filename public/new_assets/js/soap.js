$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});   

    $("#modalSOAP").on("hidden.bs.modal", function(){
        $('div[id*="panel-"]').hide();
        $('#panel-soap').show();
        $('#tab-soap').addClass('active');
    });

    $('#close-penunjang').hide();
    $('.hasil_penunjang').hide();

    $('[id*="p_s_"]').hide();
    $('[id*="p_s_asper"]').show();


    var table_soaper = $('#table-riwayat-soaper').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        ajax: {
            url: $dom+"/auth/api/perawat/soap/data/"+$subs,
            type: "GET",
            dataSrc:""
        },
        columns:[
            { data: "reg_no",  class: 'text-center',render:function(data, type, row){
                $reg_subs = data.split('/').join('');

                return '<a id="btn-riwayat-soaper" data-id="'+data+'" class="btn btn-info text-dark btn-small"> View</a>'+
                '<a id="btn-print-riwayat-soaper" target="_blank" href="'+$dom+'/auth/perawat/export_soap/'+$reg_subs+'" class="btn btn-primary btn-small ml-2"> Print</a>';
            }},
            { data: 'reg_tgl'},
            { data: "reg_no" },
            { data: "RoomName" },
            { data: "name" },
        ],
        "order": [[3, 'asc']],
    });
    var table_asper = $('#table-riwayat-asper').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        ajax: {
            url: $dom+"/auth/api/perawat/assesment/data/"+$subs,
            type: "GET",
            dataSrc:""
        },
        columns:[
            { data: "reg_no",  class: 'text-center',render:function(data, type, row){
                
                $reg_subs = data.split('/').join('');

                return '<a id="btn-riwayat-asper" data-id="'+data+'" class="btn btn-info text-dark btn-small"> View</a>'+
                        '<a id="btn-print-riwayat-asper" target="_blank" href="'+$dom+'/auth/perawat/export_assesment/'+$reg_subs+'" class="btn btn-primary btn-small ml-2"> Print</a>';
            }},
            { data: 'reg_tgl'},
            { data: "reg_no" },
            { data: "RoomName" },
            { data: "name" },
        ],
        "order": [[3, 'asc']],
    });
    
    var table_penunjang = $('#table-riwayat-penunjang').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        ajax: {
            url: $dom+"/auth/api/cpoe/data_history/"+$subs,
            type: "GET",
            dataSrc:""
        },
        columns:[
            { data: "reg_no",  class: 'text-center',render:function(data, type, row){
                return '<a id="btn-riwayat-penunjang" data-id="'+data+'" data-type="'+row['order_type']+'" class="btn btn-info text-dark btn-small"> View</a>';
            }},
            { data: "reg_no" },
            { data: 'order_date', render:function(data, type, row){
                return moment(data).format('D/M/Y HH:mm:ss');
            }},
            { data: "order_type" },
            { data: "name" },
            { data: "RoomName" },
        ],
        "order": [[2, 'desc']],
    });
    
    $('#close-penunjang').click(function(){
        $('#close-penunjang').hide();
        $('form#form-riwayat-penunjang').hide();
        $('#myTabContent').show();
    });
    
    $('body').on('click', '#btn-riwayat-soaper', function(){
        $id = $(this).data('id');
        $reg_ = $id.substring(8, 20);
        
        $('#modalShowSOAP').modal('show')

        $table_cppt = '#table-riwayat-cppt-perawat';

        latestSoapdok($reg_, $table_cppt, 'show')
        
    });

    $('body').on('click', '#btn-riwayat-asper', function(){
        $id = $(this).data('id');
        $reg_ = $id.substring(8, 20);

        $('#modalShowAssesment').modal('show');

        $('[id*="p_s_"]').show();

        navigateToNext('asper');
        
        getLatestAsper($reg_, '#modalShowAssesment');
    
    });

    $('body').on('click', '#btn-print-riwayat-asper', function(){
        $id = $(this).data('id');
        $reg_ = $id.substring(8, 20);
    });

    function navigateToNext(elm) {
        $('#p_s_d_assesment').html('<div id="p_s_d_'+elm+'">'+$('#p_s_'+elm).html()+'</div>');

        $('#p_s_d_assesment').find('button').attr('onclick', "navigateToPrevious('asdok')")
    }

    function navigateToPrevious(elm) {
        $('#p_s_d_assesment').html('<div id="p_s_d_'+elm+'">'+$('#p_s_'+elm).html()+'</div>');

        $('#p_s_d_assesment').find('button').attr('onclick', "navigateToNext('asper')")
    }
    
    $('body').on('click', '#btn-riwayat-penunjang', function(){
        $id = $(this).data('id');
        $type = $(this).data('type');
        $reg = $id.substring(8, 20);
        $('#close-penunjang').show();
        $('.hasil_penunjang').show();

        $.ajax({
            url: $dom+'/auth/api/cpoe/show_history',
            type: 'POST',
            dataType: 'json',
            data: {
                id: $id,
                type: $type,
            },
            beforeSend: function(){
                $('#data-riwayat-penunjang').html('');
            },
            success: function(resp){
                $.each(resp[0], function(i, data){
                    var res = data;
                    var type = resp[1];
                    if (type == 'Laboraturium') {
                        $code = res.plab_tindakan;
                        $item = res.ItemName1;
                        $date = res.created_at;
                        $doctor = res.name;
                        $pic = res.pic_name;
                        $res_date = res.plab_tgl_hasil;
                        $result = res.plab_hasil;
                        $conc = '-';
                        $('.hasil_penunjang').attr('href', $dom+'/'+resp[0][0].plab_file);
                    } else if (type == 'Radiologi') {
                        $code = res.pradiol_tindakan;
                        $item = res.ItemName1;
                        $date = res.created_at;
                        $doctor = res.name;
                        $pic = res.pic_name;
                        $res_date = res.pradiol_tgl_hasil;
                        $result = res.pradiol_hasil;
                        $conc = res.pradiol_kesimpulan;
                        $('.hasil_penunjang').attr('href', $dom+'/'+resp[0][0].pradiol_file);
                    }

                    $row_penunjang = '<div class="row" style="border-bottom: 1px black solid; margin-bottom:30px; padding-bottom: 10px;">'+
                                        '<div class="col">'+
                                            '<table class="table table-striped">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th width="250">Kode Tindakan</th>'+
                                                        '<th id="order_code">'+$code+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Nama Tindakan</th>'+
                                                        '<th id="order_item">'+$item+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Tanggal Order</th>'+
                                                        '<th id="order_date">'+$date+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Dokter Order</th>'+
                                                        '<th id="order_doctor">'+$doctor+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Petugas Input Hasil</th>'+
                                                        '<th id="order_input">'+$pic+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Tanggal Keluar Hasil</th>'+
                                                        '<th id="order_result_date">'+$res_date+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Hasil Tindakan</th>'+
                                                        '<th id="order_result">'+$result+'</th>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th width="250">Kesimpulan</th>'+
                                                        '<th id="order_conclusion">'+$conc+'</th>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>';

                    $('#data-riwayat-penunjang').append($row_penunjang);
                });
            
            }
        });
        $('#myTabContent').hide();
        $('form#form-riwayat-penunjang').show();
    });

    //LOAD LATEST DATE OF THE DAY

    function latestSoapdok($reg_, $table = '', $show = ''){
        $.ajax({
            url: $dom+'/auth/api/dokter/soap/latest/'+$reg_,
            type: 'GET',
            dataType: 'json',
            beforeSend: function(){
                $($table).html('');
            },
            success: function(resp){
                if (resp[0] && resp[0].length > 0){
                    var res = resp[0];
                    
                    $.each(res, function(i, data){
                        if (data['updated_at']) {
                            $tgl_soap = moment(data['updated_at']).format('DD-MM-Y H:mm:ss');
                        } else {
                            $tgl_soap = '';
                        }

                        if ($show) {
                            $verif = '';    
                        } else {
                            if (data.soapdok_verifikasi) {
                                $verif = data.soapdok_verifikasi;
                            } else {
                                $verif = '<textarea name="soapdok_verifikasi_'+data.soapdok_posisi+'_'+data.soapdok_id+'" rows="1" cols="14"></textarea>'+
                                        '<span class="btn btn-success btn-sm float-right px-1 py-1" id="btn-save-verif" data-posisi="'+data.soapdok_posisi+'" data-id="'+data.soapdok_id+'" style="font-size: 12px"><i style="font-size: 12px" class="fas fa-check mr-1"></i>verif</span>';
                            }
                        }

                        $row_cppt_dokter = '<tr>'+
                                                '<td>'+$tgl_soap+'</td>'+
                                                '<td>'+data.name+'<br><b>('+data.soapdok_posisi+')</b></td>'+
                                                '<td>'+
                                                    '<p style="font-size: 14px"><b>S</b> '+condition(data.soapdok_subject)+'</p> <br>'+
                                                    '<p style="font-size: 14px"><b>O</b> '+condition(data.soapdok_object)+'</p><br>'+
                                                    '<p style="font-size: 14px"><b>A</b> '+condition(data.soapdok_assesment)+'</p><br>'+
                                                    '<p style="font-size: 14px"><b>P</b> '+condition(data.soapdok_planning)+'</p>'+
                                                '</td>'+
                                                // '<td>'+condition(data.soapdok_instruksi)+' <div id="cppt_tindakan" name="'+data.name.replace(" ", "")+'_'+moment(data.updated_at).format('Y-M-D')+'"></div></td>'+
                                                '<td>'+condition(data.soapdok_instruksi)+' <div id="cppt_tindakan" name="'+data.name.replace(" ", "")+'"></div></td>'+
                                                '<td class="verifikasi">'+$verif+'</td>'+
                                            '</tr>';

                        $($table).append($row_cppt_dokter);

                        if (data.tindakan.length > 0 && data.level_user == 'perawat') {
                            $.each(data.tindakan, function(i, item){
                                $no = i + 1;
                                
                                $title = '<b>Tindakan Medis Keperawatan</b>';

                                    if (i == 0) {
                                        $tindakan_title = $title;
                                    } else {
                                        $tindakan_title = '';
                                    }
                                    $row_cppt_tindakan = $tindakan_title+'<br><span class="ml-3">- '+item.ItemName1+'</span>';


                                    // $('#cppt_tindakan[name="'+item.name.replace(" ", "")+'_'+moment(item.created_at).format('Y-M-D')+'"]').append($row_cppt_tindakan);
                                    $('#cppt_tindakan[name="'+item.name.replace(" ", "")).append($row_cppt_tindakan);
                                
                            });
                        }

                    });

                    if (resp[1]) {

                        if ($level_ == 'dokter') {
                            $prefix = 'soapdok';
                        } else {
                            $prefix = 'soaper';
                        }

                        $('textarea[name="'+$prefix+'_subject"]').text(resp[1].soapdok_subject);
                        $('textarea[name="'+$prefix+'_object"]').text(resp[1].soapdok_object);
                        $('textarea[name="'+$prefix+'_assesment"]').text(resp[1].soapdok_assesment);
                        $('textarea[name="'+$prefix+'_planning"]').text(resp[1].soapdok_planning);
                        $('textarea[name="'+$prefix+'_instruksi"]').text(resp[1].soapdok_instruksi);
                    }

                } else {
                    $row_cppt_dokter_empty = '<tr>'+
                                                '<td colspan="4" class="text-center">Belum ada data CPPT untuk hari ini</td>'+
                                            '</tr>';

                    $($table).append($row_cppt_dokter_empty);
                }
            }
        });
    }

    //LOAD DETAIL DATA

    getlatestAsdok($subs);
    function getlatestAsdok($reg_){
        $.ajax({
            url: $dom+'/auth/api/dokter/assesment/latest/'+$reg_,
            type: 'GET',
            dataType: 'json',
            success: function(resp){
                console.log(resp)
                if (resp[0]){

                    var res = resp[0];
                    var res1 = resp[1];

                    $tgl_assesment = moment(res.created_at).format('D-MM-Y H:mm:ss');

                    $('[id*="tgl-baru-asdok"]').text($tgl_assesment+' Oleh '+res.name);

                    $table_baru_asdok = '#t-baru-asdok';

                    $anamnesis = (res.asdok_amnesis == 'orang lain hubungan dengan pasien') ? ', '+res.asdok_amnesis_lain : '';
                    
                    $($table_baru_asdok).find("tr.tr-title:eq(0) td.data").html(condition(res.asdok_amnesis)+$anamnesis);
                    $($table_baru_asdok).find("tr.tr-title:eq(1) td.data").html(condition(res.asdok_keluhan_utama));
                    $($table_baru_asdok).find("tr.tr-title:eq(2) td.data").html(condition(res.asdok_penyakit_sekarang));
                    $($table_baru_asdok).find("tr.tr-title:eq(3) td.data").html(condition(res.asdok_penyakit_dahulu)+'<br>Keterangan : '+condition(res.asdok_penyakit_dahulu_ket));
                    $($table_baru_asdok).find("tr.tr-title:eq(4) td.data").html(condition(res.asdok_pengobatan)+'<br>Keterangan : '+condition(res.asdok_pengobatan_ket));
                    $($table_baru_asdok).find("tr.tr-title:eq(5) td.data").html(condition(res.asdok_implant)+'<br>Lainnya : '+condition(res.asdok_implant_lain));
                    $($table_baru_asdok).find("tr.tr-title:eq(6) td.data").html(condition(res.asdok_penyakit_dlm_klrg)+'<br>Lainnya : '+condition(res.asdok_penyakit_dlm_klrg_ket));
                    $($table_baru_asdok).find("tr.tr-title:eq(7) td.data").html(condition(res.asdok_riwayat_pribadi));
                    $($table_baru_asdok).find("tr.tr-title:eq(8) td.data").html('<div id="d-asdok-multiorgan"></div>');
                    $($table_baru_asdok).find("tr.tr-title:eq(9) td.data").html(condition(res.asdok_diagnosis_medik));
                    $($table_baru_asdok).find("tr.tr-title:eq(10) td.data").html(condition(res.asdok_instruksi_awal));
                    $($table_baru_asdok).find("tr.tr-title:eq(11) td.data").html(condition(res.asdok_kontrol_ulang)+'<br>Lainnya : '+condition(res.asdok_kontrol_ulang_tgl));
                    $($table_baru_asdok).find("tr.tr-title:eq(12) td.data").html(condition(res.asdok_rawat_inap)+'<br>Lainnya : '+condition(res.asdok_rawat_inap_ket));

                    $('[id*="d-asdok-multiorgan"]').html('');
                    $.each(res1, function(i, data){
                        $opt = `
                            - `+data.multi_name+` : `+data.multi_desc+`<br>
                        `;

                        $('[id*="d-asdok-multiorgan"]').append($opt);
                    });

                }
            }
        });
    }

    getLatestAsper($subs);
    function getLatestAsper($reg_, $prefix = ''){
        $.ajax({
            url: $dom+'/auth/api/perawat/assesment/latest/'+$reg_,
            type: 'GET',
            dataType: 'json',
            success: function(resp){
                if (resp[1] == 200) {
                    
                    res = resp[0];

                    $tgl_assesment = moment(res.created_at).format('D-MM-Y H:mm:ss');

                    $('[id*="tgl-baru-asper"]').text($tgl_assesment+' Oleh '+res.name);

                    if (res.nyeri_status == 'Ya') {
                        $('#skrining-nyeri').slideDown();
                    }else {
                        $('#skrining-nyeri').slideUp(); 
                    }

                    $table_baru_asper = '#t-baru-asper';
                    $table_baru_skrinning_dewasa = '#t-baru-skrinning-dewasa';
                    $table_baru_skrinning_anak = '#t-baru-skrinning-anak';

                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(0) td.data").html(condition(res.asper_kesadaran));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(1) td.data").html(condition(res.asper_kondisi_umum)+'<br> Lainnya :'+condition(res.asper_kondisi_umum_lain));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(2) td.data").html(condition(res.asper_tekanan_darah));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(3) td.data").html(condition(res.asper_nadi));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(4) td.data").html(condition(res.asper_suhu));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(5) td.data").html(condition(res.asper_pernapasan));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(6) td.data").html(condition(res.asper_tinggi_bdn));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(7) td.data").html(condition(res.asper_berat_bdn));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(8) td.data").html(condition(JSON.parse(res.asper_kbthn_khusus))+'<br> Lainnya :'+condition(res.asper_kbthn_khusus_lain));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(9) td.data").html(condition(res.asper_riwayat_alergi+'<br> Lainnya :'+condition(res.asper_riwayat_alergi_lain)));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(10) td.data").html(condition(res.nyeri_status));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(11) td.data").html(condition(res.nyeri_durasi_waktu));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(12) td.data").html(condition(res.nyeri_penyebab));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(13) td.data").html(condition(JSON.parse(res.nyeri_deskripsi))+'<br> Lainnya :'+condition(res.nyeri_deskripsi_lain));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(14) td.data").html(condition(res.nyeri_penyebab_b));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(14) td.data").html(condition(res.nyeri_skala_ukur));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(15) td.data").html(condition(res.nyeri_skala));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(16) td.data").html(condition(res.nyeri_waktu));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(17) td.data").html(condition(res.nyeri_frekuensi));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(18) td.data").html(condition(res.asper_brjln_seimbang));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(19) td.data").html(condition(res.asper_altban_duduk));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(20) td.data").html(condition(res.asper_hasil));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(21) td.data").html(condition(JSON.parse(res.asper_keluhan_nutrisi))+'<br> Lainnya :'+condition(res.asper_keluhan_nutrisi_lain));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(22) td.data").html(condition(res.asper_haus_berlebih));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(23) td.data").html(condition(res.asper_mukosa_mulut));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(24) td.data").html(condition(res.asper_turgor_kulit));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(25) td.data").html(condition(res.asper_edema));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(26) td.data").html(condition(JSON.parse(res.asper_status_emosi))+'<br> Lainnya :'+condition(res.asper_status_emosi_lain));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(27) td.data").html(condition(res.asper_kondisi_umum_b));
                    $($prefix+' '+$table_baru_asper).find("tr.tr-title:eq(28) td.data").html(condition(res.asper_hambatan_ekonomi)+'<br> Lainnya :'+condition(res.asper_hambatan_ekonomi_lain));
                    
                    $('[id*="t-baru-diagnosa"]').html('');
                    $.each(res.masalah, function(i, data){
                        if (i == 0) {
                            $tr_i = `
                                <tr>
                                    <td colspan="2"><h4 class="pt-2 font-weight-bold">DAFTAR MASALAH / DIAGNOSA KEPERAWATAN</h4></td>
                                </tr>
                            `;
                        } else {
                            $tr_i = '';
                        }
                        $tr_ = $tr_i+`
                            <tr>
                                <td>`+data.pmasalah_masalah+`</td>
                                <td>`+data.masalah_nama+`</td>
                            </tr>
                        `;

                        $('[id*="t-baru-diagnosa"]').append($tr_);
                    });

                    $('[id*="t-f-baru-diagnosa"]').html('');
                    $.each(JSON.parse(res.asper_masalah), function(i, data){
                        $tr_ = `
                            <tr>
                                <td colspan="2"><b>Lainnya</b> : `+data+`</td>
                            </tr>
                        `;

                        if (data != null) {
                            $('[id*="t-f-baru-diagnosa"]').append($tr_);
                        }
                    });

                    $('[id*="t-baru-intervensi"]').html('');
                    $.each(res.intervensi, function(i, data){
                        if (i == 0) {
                            $tr_i = `
                                <tr>
                                    <td colspan="2"><h4 class="pt-2 font-weight-bold">INTERVENSI KEPERAWATAN RAWAT JALAN</h4></td>
                                </tr>
                            `;
                        } else {
                            $tr_i = '';
                        }
                        $tr_ = $tr_i+`
                            <tr>
                                <td>`+data.item_nama+`</td>
                                <td>`+data.intervensi_nama+`</td>
                            </tr>
                        `;

                        $('[id*="t-baru-intervensi"]').append($tr_);
                    });

                    if (res.asper_penurunan_bb_dewasa != 'Tidak' || res.asper_penurunan_bb_dewasa != 'Tidak Yakin') {
                        $penurunan_bb = 'Ya, penurunan sebanyak ';
                    } else {
                        $penurunan_bb = '';
                    }

                    $($prefix+' '+$table_baru_skrinning_dewasa).find("tr.tr-title:eq(0) td.data").html($penurunan_bb+condition(res.asper_penurunan_bb_dewasa));
                    $($prefix+' '+$table_baru_skrinning_dewasa).find("tr.tr-title:eq(1) td.data").html(condition(res.asper_penurunan_nafsu_dewasa));
                    $($prefix+' '+$table_baru_skrinning_dewasa).find("tr.tr-title:eq(2) td.data").html(condition(res.asper_skor_dewasa));
                    $($prefix+' '+$table_baru_skrinning_dewasa).find("tr.tr-title:eq(3) td.data").html(condition(res.asper_kategori_dewasa));
                    
                    $($prefix+' '+$table_baru_skrinning_anak).find("tr.tr-title:eq(0) td.data").html(condition(res.asper_kurus_anak));
                    $($prefix+' '+$table_baru_skrinning_anak).find("tr.tr-title:eq(1) td.data").html(condition(res.asper_penurunan_bb_anak));
                    $($prefix+' '+$table_baru_skrinning_anak).find("tr.tr-title:eq(2) td.data").html(condition(res.asper_kondisi_anak));
                    $($prefix+' '+$table_baru_skrinning_anak).find("tr.tr-title:eq(3) td.data").html(condition(res.asper_penyakit_anak));
                 
                }
            }
        });
    }