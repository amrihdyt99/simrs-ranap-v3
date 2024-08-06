$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$dom = '';

$('.btn-add-resume').click(function(){
    $('#modalResume').modal('show');
});

$('.reload-resume').click(function(){
    getResume();
});

$('.reload-riwayat-resume').click(function(){
    geRiwayatResume();
});

$table_resume = $('#table-resume');
$table_riwayat_resume = $('#table-riwayat-resume');

getResume();
function getResume(){
    $.ajax({
        url: $dom+'/auth/api/dokter/resume/data_latest/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $table_resume.html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0){
                $.each(resp, function(i, data){

                    if ($level_ == 'dokter') {
                        $name = data.name;
                        $id_diagnosis = '<ul id="res-idicd"></ul>';
                    } else {

                        if (data.resume_icd) {
                            $id_diagnosis = data.resume_icd;
                        } else {
                            $id_diagnosis = '<textarea placeholder="isi icd 10 ..."></textarea>';
                        }

                        if (data.resume_perawat) {
                            $perawat = data.resume_perawat;
                        } else {
                            $perawat = '';
                        }

                        if (data.name) {
                            $name = '( <span id="presume_kode">'+data.resume_dokter+'</span> ) <span id="presume_dokter">'+data.name+'</span>'+
                                    '<hr style="border: 1px solid black">'+
                                    '<textarea id="resume_perawat" placeholder="perawat/dietisien/terapis ...">'+$perawat+'</textarea>';
                        } else {
                            $name = '( <span id="presume_kode"></span> ) <span id="presume_dokter"></span>'+
                            '<hr style="border: 1px solid black">'+
                            '<textarea id="resume_perawat" placeholder="perawat/dietisien/terapis ..."></textarea>';
                        }
                    }

                    if (data.resume_diagnosa) {
                        $diagnosis = data.resume_diagnosa;
                    } else {
                        $diagnosis = '<textarea placeholder="isi diagnosa pasien ..."></textarea>';
                    }

                    $opt_resume = '<tr style="border: 0.5px solid black;" id="tr-resume">'+
                                    '<td style="border: 0.5px solid black;">'+data.reg_tgl+'</td>'+
                                    '<td style="border: 0.5px solid black;" id="td_icd" width="200">'+$diagnosis+'</td>'+
                                    '<td width="160px" style="border: 0.5px solid black;" id="td_idicd">'+$id_diagnosis+'</td>'+
                                    '<td style="border: 0.5px solid black;" id="td_tindakan" width="350"><ul id="res-tindakan"></ul></td>'+
                                    '<td style="border: 0.5px solid black;" id="td_inap"><textarea id="td_ranap" cols="35" rows="12">'+condition(data.resume_ranap)+'</textarea></td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    '<td width="300px" style="border: 0.5px solid black;">'+$name+'</td>'+
                                    '<td style="border: 0.5px solid black;">'+data.roomname+'</td>'+
                                '</tr>';
                    
                    $table_resume.append($opt_resume);

                    $.each(data.icd, function(i, item){
                        $li_icd = '<li style="font-size: 14.5px;">'+item.NM_ICD10+'</li>';
                        $li_idicd = '<li style="font-size: 14.5px;">'+item.ID_ICD10+' - '+item.NM_ICD10+'</li>';

                        $('#res-icd').append($li_icd);
                        $('#res-idicd').append($li_idicd);
                    })

                    
                    $('#form-entry-soap #planning_').html('');
                    $.each(data.tindakan, function(i, item){
                        $li_tindakan = '<li style="font-size: 14.5px;">'+item.ItemName1+' (<b>'+item.ItemTindakan+'</b>)</li>';

                        $('#res-tindakan').append($li_tindakan);
                        $('#form-entry-soap #planning_').append($li_tindakan);
                    })
                    $.each(data.obat, function(i, item){

                        if (item.ItemFlag == 1) {
                            if (item.ItemFlagRacikan == 1) {
                                $bg_color = 'red';
                            } else if (item.ItemFlagRacikan == 2) {
                                $bg_color = 'green';
                            } else if (item.ItemFlagRacikan == 3) {
                                $bg_color = 'yellow';
                            } else if (item.ItemFlagRacikan == 4) {
                                $bg_color = 'blue';
                            } else if (item.ItemFlagRacikan == 5) {
                                $bg_color = 'purple';
                            } else if (item.ItemFlagRacikan == 6) {
                                $bg_color = 'orange';
                            } else {
                                $bg_color = 'black';
                            }
                            $racikan = '<span class="badge text-white badge-sm" style="background-color: '+$bg_color+'">Racikan '+item.ItemFlagRacikan+'</span>';
                        } else {
                            $racikan = '';
                        }

                        $li_obat = '<li style="font-size: 14.5px;">'+item.ItemName1+' (<b>'+item.ItemTindakan+' '+$racikan+'</b>)</li>';

                        $('#res-tindakan').append($li_obat);
                        $('#form-entry-soap #planning_').append($li_obat);
                    })
                });

            }
        },
    });
}

geRiwayatResume();
function geRiwayatResume(){
    $.ajax({
        url: $dom+'/auth/api/dokter/resume/data/'+$medrec,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $table_riwayat_resume.html('');
        },
        success: function(resp){
            if (Object.keys(resp).length>0){
                $.each(resp, function(i, data){

                    $opt_resume = '<tr id="tr-resume">'+
                                    '<td style="border: 0.5px solid black;">'+data.reg_tgl+'</td>'+
                                    '<td style="border: 0.5px solid black;">'+data.reg_no+'</td>'+
                                    '<td style="border: 0.5px solid black;" id="td_icd" width="200">'+data.resume_diagnosa+'</td>'+
                                    '<td width="160px" style="border: 0.5px solid black;" id="td_idicd">'+data.resume_icd+'</td>'+
                                    '<td style="border: 0.5px solid black;" id="td_tindakan" width="350">'+data.resume_tindakan+'</td>'+
                                    '<td style="font-size: 14.5px; border: 0.5px solid black;">'+condition(data.resume_ranap)+'</td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    // '<td style="border: 0.5px solid black;"></td>'+
                                    '<td style="font-size: 14.5px; border: 0.5px solid black;">'+data.name+'</td>'+
                                    '<td style="font-size: 14.5px; border: 0.5px solid black;"></td>'+
                                '</tr>';
                    
                    $table_riwayat_resume.append($opt_resume);
                });
            } else {
                $opt_resume = '<tr>'+
                                    '<td class="text-center" colspan="8">Belum ada riwayat resume pasien</td>'+
                                '</tr>';
                    
                    $table_riwayat_resume.append($opt_resume);
            }
        },
    });
}

$('#btn-save-resume').click(function(){

    $("#tr-resume td textarea").each(function () {
        var $this = $(this);

        $this.html($this.val());
    }); 

    $data = [];
    $data['diagnosa'] = $('#td_icd textarea').val();
    $data['icd'] = $('#td_idicd').html();
    $data['tindakan'] = $('#td_tindakan').html();
    $data['ranap'] = $('#td_ranap').val();
    $data['kode'] = $('#presume_kode').text();
    $data['perawat'] = $('#resume_perawat').val();
    console.log($data)
    if ($level_ != 'dokter') {
        if ($data['kode'] == '') {
            // alert('Dokter resume harus diisi');
            $('body').find('.alert-dokter-resume').text('Dokter resume harus diisi');
        } else {
            $('body').find('.alert-dokter-resume').text('');
            storeResume($data);
        }
    } else {
        storeResume($data);
    }
});

function storeResume($data) {
    $.ajax({
        url: $dom+'/auth/api/dokter/resume/store',
        type: 'POST',
        dataType: 'json',
        data: {
            reg: $reg,
            diagnosa: $data['diagnosa'],
            icd: $data['icd'],
            tindakan: $data['tindakan'],
            prosedur1:'',
            prosedur2:'',
            prosedur3:'',
            ranap: $data['ranap'],
            kode: $data['kode'],
            perawat: $data['perawat'],
        },
        success: function(resp){
            if (resp == 200) {
                alert('Data resume berhasil disimpan');
            } else {
                alert('Data Gagal Disimpan');
            }
        }
    });   
}

function looping(data, field, elm){
    $.each(data, function(i, item){
        $(elm).append('<ul><li>'+item[i][field]+'</li></ul>');
    })
}