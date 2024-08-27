$('body').on('click', '#add-row-asuhan-dewasa', function() {
    $code = (Math.random() + 1).toString(36).substring(7);
    $tr_ = `
        <tr id="row-asuhan-dewasa-`+$code+`">
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td class="bg-danger text-center text-white" id="remove-row-asuhan-dewasa" value="`+$code+`" style="cursor: pointer"><i class="fas fa-times"></i></td>
        </tr>
    `;

    $('#t_asuhan_gizi_dewasa').append($tr_);
});

$('body').on('click', '#remove-row-asuhan-dewasa', function(){
    $code = $(this).attr('value');

    $('#row-asuhan-dewasa-'+$code).remove();
})

$('body').on('click', '#add-row-monitoring-asuhan-dewasa', function() {
    $code = (Math.random() + 1).toString(36).substring(7);
    $tr_ = `
        <tr id="row-monitoring-asuhan-dewasa-`+$code+`">
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td class="bg-danger text-center text-white" id="remove-row-monitoring-asuhan-dewasa" value="`+$code+`" style="cursor: pointer"><i class="fas fa-times"></i></td>
        </tr>
    `;

    $('#t_monitoring_asuhan_gizi_dewasa').append($tr_);
});

$('body').on('click', '#remove-row-monitoring-asuhan-dewasa', function(){
    $code = $(this).attr('value');

    $('#row-monitoring-asuhan-dewasa-'+$code).remove();
})

getAssementDewasa();
function getAssementDewasa(){
    $.ajax({
        url: $dom+'/perawat/patient/data_assesment_dewasa',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
        },
        success: function(resp) {
            setChecked('asdew_sensori', resp.asdew_sensori)
            setChecked('asdew_lembab', resp.asdew_lembab)
            setChecked('asdew_aktivitas', resp.asdew_aktivitas)
            setChecked('asdew_nutrisi', resp.asdew_nutrisi)
            setChecked('asdew_friksi', resp.asdew_friksi)
            $('[name="asdew_skor_braden"]').val(resp.asdew_skor_braden)
            $('[name="asdew_kategori"]').val(resp.asdew_kategori)
            setChecked('asdew_luka', resp.asdew_luka)
            setChecked('asdew_rom', resp.asdew_rom)
            setChecked('asdew_deformitas', resp.asdew_deformitas)
            $('[name="asdew_deformitas_lainnya"]').val(resp.asdew_deformitas_lainnya)
            setChecked('asdew_ggtidur', resp.asdew_ggtidur)
            $('[name="asdew_ggtidur_lainnya"]').val(resp.asdew_ggtidur_lainnya)
            setChecked('asdew_keluhan[]', resp.asdew_keluhan)
            $('[name="asdew_keluhan_lainnya"]').val(resp.asdew_keluhan_lainnya)
            setChecked('asdew_haus', resp.asdew_haus)
            setChecked('asdew_mukosa', resp.asdew_mukosa)
            setChecked('asdew_tugor', resp.asdew_tugor)
            setChecked('asdew_edema', resp.asdew_edema)
            $('[name="asdew_bab_kali"]').val(resp.asdew_bab_kali)
            setChecked('asdew_bab', resp.asdew_bab)
            setChecked('asdew_keluhan_bab[]', resp.asdew_keluhan_bab)
            $('[name="asdew_keluhan_bab_lainnya"]').val(resp.asdew_keluhan_bab_lainnya)
            $('[name="asdew_feces_lainnya"]').val(resp.asdew_feces_lainnya)
            $('[name="asdew_feces"]').val(resp.asdew_feces)
            $('[name="asdew_frekuensi_bak"]').val(resp.asdew_frekuensi_bak)
            $('[name="asdew_jumlah_bak"]').val(resp.asdew_jumlah_bak)
            $('[name="asdew_warna_urin"]').val(resp.asdew_warna_urin)
            setChecked('asdew_keluhan_bak', resp.asdew_keluhan_bak)
            $('[name="asdew_keluhan_bak_lainnya"]').val(resp.asdew_keluhan_bak_lainnya)
            setChecked('asdew_bahasa', resp.asdew_bahasa)
            $('[name="asdew_bahasa_lainnya"]').val(resp.asdew_bahasa_lainnya)
            setChecked('asdew_pendidikan', resp.asdew_pendidikan)
            $('[name="asdew_pendidikan_lainnya"]').val(resp.asdew_pendidikan_lainnya)
            setChecked('asdew_penterjemah', resp.asdew_penterjemah)
            setChecked('asdew_baca', resp.asdew_baca)
            setChecked('asdew_belajar', resp.asdew_belajar)
            $('[name="asdew_budaya"]').val(resp.asdew_budaya)
            setChecked('asdew_hambatan[]', resp.asdew_hambatan)
            $('[name="asdew_hambatan_lainnya"]').val(resp.asdew_hambatan_lainnya)
        }
    });
}

getAssementGizi();
function getAssementGizi(){
    $.ajax({
        url: $dom+'/perawat/patient/data_assesment_gizi',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
        },
        success: function(resp) {
            $('[name="dewasa_bb"]').val(resp.assesment.dewasa_bb);
            $('[name="dewasa_tl"]').val(resp.assesment.dewasa_tl);
            $('[name="dewasa_lla"]').val(resp.assesment.dewasa_lla);
            $('[name="dewasa_tb"]').val(resp.assesment.dewasa_tb);
            $('[name="dewasa_imt"]').val(resp.assesment.dewasa_imt);
            $('[name="dewasa_lla_lainnya"]').val(resp.assesment.dewasa_lla_lainnya);
            setChecked('dewasa_biokimia', resp.assesment.dewasa_biokimia);
            setChecked('dewasa_fisik', resp.assesment.dewasa_fisik);
            setChecked('dewasa_riwayat_dahulu[]', resp.assesment.dewasa_riwayat_dahulu);
            setChecked('dewasa_riwayat_sekarang[]', resp.assesment.dewasa_riwayat_sekarang);
            setChecked('dewasa_panenteral', resp.assesment.dewasa_panenteral);
            $('[name="dewasa_panenteral_lainnya"]').val(resp.assesment.dewasa_panenteral_lainnya);
            setChecked('dewasa_sekarang_lainnya[]', resp.assesment.dewasa_sekarang_lainnya);
            $('[name="dewasa_lain_lain"]').val(resp.assesment.dewasa_lain_lain);
            setChecked('dewasa_penyakit_dahulu[]', resp.assesment.dewasa_penyakit_dahulu);
            $('[name="dewasa_penyakit_dahulu_lainnya"]').val(resp.assesment.dewasa_penyakit_dahulu_lainnya);
            $('[name="dewasa_penyakit_sekarang"]').val(resp.assesment.dewasa_penyakit_sekarang);
            $('[name="dewasa_diet"]').val(resp.assesment.dewasa_diet);
            $('[name="dewasa_diet_preskripsi"]').val(resp.assesment.dewasa_diet_preskripsi);
            setChecked('dewasa_tindak_lanjut[]', resp.assesment.dewasa_tindak_lanjut);

            $('[name="asdewasa_assesment"]').val(resp.asuhan.asdewasa_assesment);
            $('[name="asdewasa_tujuan"]').val(resp.asuhan.asdewasa_tujuan);
            $('[name="asdewasa_energi"]').val(resp.asuhan.asdewasa_energi);
            $('[name="asdewasa_protein"]').val(resp.asuhan.asdewasa_protein);
            $('[name="asdewasa_kh"]').val(resp.asuhan.asdewasa_kh);
            $('[name="asdewasa_rute"]').val(resp.asuhan.asdewasa_rute);
            $('[name="asdewasa_jenis_makanan"]').val(resp.asuhan.asdewasa_jenis_makanan);
            $('[name="asdewasa_frekuensi"]').val(resp.asuhan.asdewasa_frekuensi);
            $('[name="asdewasa_jadwal_makanan"]').val(resp.asuhan.asdewasa_jadwal_makanan);

            if (resp.asuhan.asdewasa_diagnosa) {
                $('#t_asuhan_gizi_dewasa').html('');
                $('#t_asuhan_gizi_dewasa').html(resp.asuhan.asdewasa_diagnosa);
            }
            if (resp.asuhan.asdewasa_monitoring_evaluasi) {
                $('#t_monitoring_asuhan_gizi_dewasa').html('');
                $('#t_monitoring_asuhan_gizi_dewasa').html(resp.asuhan.asdewasa_monitoring_evaluasi);
            }
        }
    });
}

getTransferInternal()
function getTransferInternal() {
    $.ajax({
        url: $dom+'/perawat/patient/data_transfer_internal',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
        },
        success: function(resp) {
            if (resp.transfer_data) {
                $('#form_transfer_internal').html('')
                $('#form_transfer_internal').html(resp.transfer_data)
            }
        }
    });
}

getCathLab()
function getCathLab() {
    $.ajax({
        url: $dom+'/perawat/patient/data_cathlab',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
        },
        success: function(resp) {
            if (resp.cathlab_data) {
                $('#form_cathlab').html('')
                $('#form_cathlab').html(resp.cathlab_data)
            }
        }
    });
}

getPraTindakanKeperawatan()
function getPraTindakanKeperawatan() {
    $.ajax({
        url: $dom+'/perawat/patient/data_pra_tindakan',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
        },
        success: function(resp) {
            if (resp.pra_data) {
                $('#form_pra_tindakan').html('')
                $('#form_pra_tindakan').html(resp.pra_data)
            }
        }
    });
}

$('#save_asesmen_gizi').click(function(){

    $.ajax({
        url: $dom+'/perawat/patient/store_assesment_gizi',
        type: 'post',
        dataType: 'json',
        data : $('#form_assesment_gizi_dewasa').serialize() + '&diagnosa='+$('#t_asuhan_gizi_dewasa').html()+'&monitoring='+$('#t_monitoring_asuhan_gizi_dewasa').html(),
        success: function(resp) {
            if (resp == 200) {
                alert('Data berhasil disimpan');
                getAssementGizi();
            }
        }
    });
})

$('body').on('click','.kajian_kulit_dewasa',function(){


    var sum = 0;
    $('.kajian_kulit_dewasa:checked').each(function() {
        sum += 1*($(this).data('id'));
    });
    $('[name="asdew_skor_braden"]').val(sum);

    if (sum >= 20 && sum <= 23) {
        $('[name="asdew_kategori"]').val('Resiko rendah'); 
    } else if (sum >= 15 && sum <= 19) {
        $('[name="asdew_kategori"]').val('Resiko sedang'); 
    } else if (sum >= 11 && sum <= 14) {
        $('[name="asdew_kategori"]').val('Resiko tinggi'); 
    } else if (sum >= 6 && sum <= 10) {
        $('[name="asdew_kategori"]').val('Resiko sangat tinggi'); 
    }

});


$('#save_asesmen_dewasa').click(function(){
    $.ajax({
        url: $dom+'/perawat/patient/store_assesment_dewasa',
        type: 'post',
        dataType: 'json',
        data : $('#form_assesment_dewasa').serialize(),
        success: function(resp) {
            if (resp == 200) {
                alert('Data berhasil disimpan');
                getAssementDewasa()
            }
        }
    });
})

$('body').on('click','#btn_transfer_internal',function(){
    $("#form_transfer_internal input").each(function () {
        var $this = $(this);

        $this.attr("value", $this.val());
    }); 
    var selected = [];
    $('form#form_transfer_internal input[type=checkbox]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $('form#form_transfer_internal input[type=radio]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $.ajax({
        url: $dom+'/perawat/patient/store_transfer_internal',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
            data: $('#form_transfer_internal').html(),
        },
        success: function(resp) {
            if (resp == 200) {
                alert('Data berhasil disimpan');
                getTransferInternal()
            }
        }
    });
})

$('body').on('click','#btn_cathlab',function(){
    $("#form_cathlab input").each(function () {
        var $this = $(this);

        $this.attr("value", $this.val());
    }); 
    var selected = [];
    $('form#form_cathlab input[type=checkbox]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $('form#form_cathlab input[type=radio]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $.ajax({
        url: $dom+'/perawat/patient/store_cathlab',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
            data: $('#form_cathlab').html(),
        },
        success: function(resp) {
            if (resp == 200) {
                alert('Data berhasil disimpan');
                getCathLab()
            }
        }
    });
})

$('body').on('click','#btn_pra_tindakan',function(){
    $("#form_pra_tindakan input").each(function () {
        var $this = $(this);

        $this.attr("value", $this.val());
    }); 
    var selected = [];
    $('form#form_pra_tindakan input[type=checkbox]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $('form#form_pra_tindakan input[type=radio]').each(function() {
        if ($(this).is(":checked")) {
            selected.push($(this).attr('checked', true));
        }
    });
    $.ajax({
        url: $dom+'/perawat/patient/store_pra_tindakan',
        type: 'post',
        dataType: 'json',
        data : {
            _token: $('[name="_token"]').val(),
            reg: $reg,
            data: $('#form_pra_tindakan').html(),
        },
        success: function(resp) {
            if (resp == 200) {
                alert('Data berhasil disimpan');
                getPraTindakanKeperawatan()
            }
        }
    });
})