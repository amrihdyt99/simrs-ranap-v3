$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//$('div[id*="panel-"]').hide();
$('#panel-status-pasien').show();

getReportTanggal();
getReportPoli();
getReportDokter();
getReportPerawat();
getReportKasir();

function getReportTanggal(start = '', end = ''){
    $('#table-report-tanggal').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        // stateSave: true,
        bDestroy: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ],
        ajax: {
            url: $dom+"/auth/api/report/data_tanggal/"+start+"/"+end,
            type: "GET",
            dataSrc:""
        },
        columns:[
            { data: 'tanggal', class: "text-center"},
            { data: "pasien", class: "text-center"},
            { data: "asdok", class: "text-center"},
            { data: "soapdok", class: "text-center"},
            { data: "asper", class: "text-center"},
            { data: "soaper", class: "text-center"},
        ],
        "order": [[0, 'desc']],
    });
}

$('#btn-report-tanggal').click(function(){
    $start = $('#report-tanggal-dari').val();
    $end = $('#report-tanggal-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('title').html('LAPORAN PASIEN RAWAT JALAN PER TANGGAL\n\n '+$start+' s/d '+$end);
        getReportTanggal($start, $end);
    }
});

function getReportPoli(start = '', end = ''){
    $('#table-report-poli').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        // stateSave: true,
        bDestroy: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ],
        ajax: {
            url: $dom+"/auth/api/report/data_poli/"+start+"/"+end,
            type: "GET",
            dataSrc:""
        },
        columns:[
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'poli_kode', class: "text-center"},
            { data: 'poli'},
            { data: "pasien", class: "text-center"},
            { data: "asdok", class: "text-center"},
            { data: "soapdok", class: "text-center"},
            { data: "asper", class: "text-center"},
            { data: "soaper", class: "text-center"},
        ],
        "order": [[0, 'asc']],
    });
}

$('#btn-report-poli').click(function(){
    $start = $('#report-poli-dari').val();
    $end = $('#report-poli-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('title').html('LAPORAN PASIEN RAWAT JALAN PER POLIKLINIK\n\n TANGGAL '+$start+' s/d '+$end);
        getReportPoli($start, $end);
    }
});

function getReportDokter(start = '', end = ''){
    $('#table-report-dokter').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        // stateSave: true,
        bDestroy: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ],
        ajax: {
            url: $dom+"/auth/api/report/data_dokter/"+start+"/"+end,
            type: "GET",
            dataSrc:""
        },
        columns:[
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'dokter_kode', class: "text-center"},
            { data: 'dokter'},
            { data: "pasien", class: "text-center"},
            { data: "asdok", class: "text-center"},
            { data: "soapdok", class: "text-center"},
        ],
        "order": [[0, 'asc']],
    });
}

$('#btn-report-dokter').click(function(){
    $start = $('#report-dokter-dari').val();
    $end = $('#report-dokter-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('title').html('LAPORAN PEMERIKSAAN DOKTER\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+$start+' s/d '+$end);
        getReportDokter($start, $end);
    }
});

function getReportPerawat(start = '', end = ''){
    $('#table-report-perawat').DataTable( {
        processing: false,
        serverSide: false,
        scrollX: false,
        autoWidth: true,
        pageLength: 10,
        // stateSave: true,
        bDestroy: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ],
        ajax: {
            url: $dom+"/auth/api/report/data_perawat/"+start+"/"+end,
            type: "GET",
            dataSrc:""
        },
        columns:[
            {
                data: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'perawat'},
            { data: "pasien", class: "text-center"},
            { data: "asper", class: "text-center"},
            { data: "soaper", class: "text-center"},
        ],
        "order": [[0, 'asc']],
    });
}

$('#btn-report-perawat').click(function(){
    $start = $('#report-perawat-dari').val();
    $end = $('#report-perawat-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('title').html('LAPORAN PEMERIKSAAN PERAWAT\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+$start+' s/d '+$end);
        getReportPerawat($start, $end);
    }
});

function getReportKasir(start = '', end = ''){

    if (start && end) {
        $.ajax({
            url: $dom+'/auth/api/kasir/data_report/'+start+'/'+end,
            dataType: 'json',
            type: 'GET',
            beforeSend: function(){
                $row_jk = '<tr>'+
                                '<td colspan="2" class="text-center">Memuat data...</td>'+
                            '</tr>';
    
                $('#table-report-kasir').html($row_jk);
            },
            success: function(resp){
                $('#table-report-kasir').html('');
                total = 0;
                cash = 0;
                debit = 0;
                kredit = 0;
                transfer = 0;
                discount = 0;
                $.each(resp, function(i, data){
                    
                    $row_kasir = `
                        <tr>
                            <td style="text-align: left">`+data.date+`</td>
                            <td style="text-align: left">`+data.reg+`</td>
                            <td style="text-align: left">`+data.code+`</td>
                            <td style="text-align: left">`+data.name+`</td>
                            <td style="text-align: right">Rp. `+data.total_format+`</td>
                            <td style="text-align: right">Rp. `+data.cash_format+`</td>
                            <td style="text-align: right">Rp. `+data.debit_format+`</td>
                            <td style="text-align: right">Rp. `+data.kredit_format+`</td>
                            <td style="text-align: right">Rp. `+data.transfer_format+`</td>
                            <td style="text-align: right">Rp. `+data.discount_format+`</td>
                        </tr>
                    `;
    
                    $('#table-report-kasir').append($row_kasir);

                    total += data.total;
                    cash += data.cash;
                    debit += data.debit;
                    kredit += data.kredit;
                    transfer += data.transfer;
                    discount += data.discount;

                });
                

                $row_footer = `
                    <tr>
                        <th colspan="4">Total</th>
                        <td style="text-align: right">Rp. `+formatNumber(total)+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(cash)+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(debit)+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(kredit)+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(transfer)+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(discount)+`</td>
                    </tr>
                `;

                $('#table-report-kasir-footer').html($row_footer);
            },
        });
    }
}

$('#btn-report-kasir').click(function(){
    $start = $('#report-kasir-dari').val();
    $end = $('#report-kasir-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('.btn_print_report_kasir').attr('value', 'LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+$start+' s/d '+$end);
        $('#report-title').html('LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+$start+' s/d '+$end);
        $('title').html('LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+$start+' s/d '+$end);
        getReportKasir($start, $end);
        $('.btn_print_report_kasir').attr('href', $dom+'/auth/billing/cetak_report/'+$start+'/'+$end);
    }
});

// function getReportKonsultasi(start = '', end = ''){
//     var table_konsultasi = $('#table-report-konsultasi').DataTable( {
//             processing: false,
//             serverSide: false,
//             scrollX: false,
//             autoWidth: true,
//             pageLength: 10,
//             // stateSave: true,
//             bDestroy: true,
//             dom: 'Bfrtip',
//             buttons: [
//                 'copy', 'csv', 'excel', 'pdf'
//             ],
//             ajax: {
//                 url: $dom+"/auth/api/report/data_konsultasi/"+start+"/"+end,
//                 type: "GET",
//                 dataSrc:""
//             },
//             columns:[
//                 {
//                     data: "id",
//                     render: function (data, type, row, meta) {
//                         return meta.row + meta.settings._iDisplayStart + 1;
//                     }
//                 },
//                 { data: 'konsul_reg'},
//                 { data: "konsul_nama", class: "text-uppercase"},
//                 { data: "konsul_dokter_kirim"},
//                 { data: "konsul_poli_kirim"},
//                 { data: "konsul_dokter_tujuan"},
//                 { data: "konsul_poli_tujuan"},
//                 { data: "konsul_tanggal"},
//             ],
//             "order": [[7, 'asc']],
//             "initComplete": function (settings, json) {//here is the tricky part 
//                 var count = table_konsultasi.data().length;
//                 $("#jumlah-konsultasi").html(count);
//                 //alert(count);
//             },
//         });
// }

function getReportStatus(start = '', end = ''){
    $.ajax({
        url: $dom+'/auth/api/report/data_general/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $row_status = '<tr>'+
                                '<td colspan="2" class="text-center">Memuat data...</td>'+
                            '</tr>';

                $('#table-report-status').html($row_status);
        },
        success: function(resp){
            
            $total = resp['status_pasien']['discharge'] + resp['status_pasien']['undischarge'];
            
            $row_status = '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Discharge</td>'+
                                '<td colspan="3" class="text-right">'+resp['status_pasien']['discharge']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Not Discharge</td>'+
                                '<td colspan="3" class="text-right">'+resp['status_pasien']['undischarge']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Total</td>'+
                                '<td colspan="3" class="text-right">'+$total+'</td>'+
                            '</tr>';

                $('#table-report-status').html($row_status);
            
            $row_registrasi = '<tr style="border: 1px solid black">'+
                                '<td colspan="4">BARU</td>'+
                                '<td colspan="3" class="text-right">'+resp['status_kunj']['baru']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">LAMA</td>'+
                                '<td colspan="3" class="text-right">'+resp['status_kunj']['lama']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Total</td>'+
                                '<td colspan="3" class="text-right">'+$total+'</td>'+
                            '</tr>';

                $('#table-report-registrasi').html($row_registrasi);

        },
    });
    
    $.ajax({
        url: $dom+'/auth/api/report/data_pasien_jk/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $row_jk = '<tr>'+
                                '<td colspan="2" class="text-center">Memuat data...</td>'+
                            '</tr>';

                $('#table-report-jk').html($row_jk);
        },
        success: function(resp){
            
            $total = resp['male'] + resp['female'];
            
            $row_jk = '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Laki-laki</td>'+
                                '<td colspan="3" class="text-right">'+resp['male']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Perempuan</td>'+
                                '<td colspan="3" class="text-right">'+resp['female']+'</td>'+
                            '</tr>'+
                            '<tr style="border: 1px solid black">'+
                                '<td colspan="4">Total</td>'+
                                '<td colspan="3" class="text-right">'+$total+'</td>'+
                            '</tr>';

                $('#table-report-jk').html($row_jk);

        },
    });
    
    $.ajax({
        url: $dom+'/auth/api/report/data_pasien_dokter/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $('#table-report-dokters').html('');
        },
        success: function(resp){
            sum = 0;
            $.each(resp, function(i, data){
                $row_dokters = '<tr style="border: 1px solid black">'+
                                    '<td colspan="4">'+data.dokter+'</td>'+
                                    '<td colspan="3" class="text-right">'+data.jumlah+'</td>'+
                                '</tr>';

                $('#table-report-dokters').append($row_dokters);

                sum += data.jumlah;
            });
            // 
            $('.total_dokters').text(sum);

        },
    });
    
    $.ajax({
        url: $dom+'/auth/api/report/data_pasien_dokter_detail/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $('#data-detail-dokter').html('');
        },
        success: function(resp){
            sum = 0;
            $.each(resp, function(i, data){
                
                $row_dokter_detail = '<h5><b>Nama Dokter : '+data.dokter+'</b></h5>'+
                                    '<table rules="all" class="table-report-all mt-3 mb-3" style="width:100%">'+
                                    '<thead>'+
                                        '<tr class="text-center bg-secondary" style="border: 1px solid black; background-color: rgb(215, 215, 215)">'+
                                            '<th style="width: 50px">No</th>'+
                                            '<th style="width: 20px">No. Registrasi</th>'+
                                            '<th style="width: 150px">Nama Pasien</th>'+
                                            '<th style="width: 50px">Tanggal Registrasi</th>'+
                                            '<th style="width: 50px">Tanggal Discharge</th>'+
                                            '<th style="width: 50px">Class</th>'+
                                            '<th style="width: 50px">Departement</th>'+
                                            '<th style="width: 50px">Poliklinik</th>'+
                                            '<th style="width: 50px">Payer</th>'+
                                            '<th style="width: 50px">Status</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody id="table-report-dokter-detail-'+data.dokter_id+'">'+
                                    '</tbody>'+
                                    // '<tfoot>'+
                                    //     '<tr class="font-weight-bold">'+
                                    //         '<td colspan="12" class="total_dokter_detail_'+data.dokter_id+'></td>'+
                                    //     '</tr>'+
                                    // '</tfoot>'+
                                '</table>';

                $('#data-detail-dokter').append($row_dokter_detail);
                
                $.each(data['pasien'], function(id, item){
                    $no = id + 1;
                    $row_dokter_detail_table = '<tr class="row_data_pasien_'+data.dokter_id+'">'+
                                                    '<td>'+$no+'</td>'+
                                                    '<td>'+item.reg_no+'</td>'+
                                                    '<td>'+condition(item.reg_nama)+' | '+condition(item.reg_medrec)+'</td>'+
                                                    '<td>'+item.reg_tgl+'</td>'+
                                                    '<td>'+condition(item.reg_discharge_tanggal)+'</td>'+
                                                    '<td></td>'+
                                                    '<td>INSTALASI RAWAT JALAN</td>'+
                                                    '<td>'+condition(item.reg_poli)+'</td>'+
                                                    '<td>'+item.reg_payer+'</td>'+
                                                    '<td>'+item.reg_status+'</td>'+
                                                '</tr>';

                    $('#table-report-dokter-detail-'+data.dokter_id).append($row_dokter_detail_table);

                
                });
                $('.total_dokter_detail_'+data.dokter_id).text('Total : '+$('.row_data_pasien_'+data.dokter_id).length);
            });

        },
    });

    $.ajax({
        url: $dom+'/auth/api/report/data_pasien_poli_detail/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $('#data-detail-klinik').html('');
        },
        success: function(resp){
            sum = 0;
            $.each(resp, function(i, data){
                
                $row_klinik_detail = '<h5><b>Nama Poliklinik : '+data.poli+' <span class="text-uppercase float-right">'+data.total+' Pasien</span></b></h5>'+
                                    '<table rules="all" class="table-report-all mt-3 mb-3" style="width:100%">'+
                                    '<thead>'+
                                        '<tr class="text-center bg-secondary" style="border: 1px solid black; background-color: rgb(215, 215, 215)">'+
                                            '<th style="width: 50px">No</th>'+
                                            '<th style="width: 20px">No. Registrasi</th>'+
                                            '<th style="width: 150px">Nama Pasien</th>'+
                                            '<th style="width: 50px">Jenis Kelamin</th>'+
                                            '<th style="width: 50px">Tanggal Registrasi</th>'+
                                            '<th style="width: 50px">Tanggal Discharge</th>'+
                                            '<th style="width: 50px">Class</th>'+
                                            '<th style="width: 50px">Dokter</th>'+
                                            '<th style="width: 50px">Payer</th>'+
                                            '<th style="width: 50px">Status</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody id="table-report-klinik-detail-'+data.poli_id+'">'+
                                    '</tbody>'+
                                    // '<tfoot>'+
                                    //     '<tr class="font-weight-bold">'+
                                    //         '<td colspan="12" class="total_klinik_detail_'+data.poli_id+'></td>'+
                                    //     '</tr>'+
                                    // '</tfoot>'+
                                '</table>';

                $('#data-detail-klinik').append($row_klinik_detail);
                
                $.each(data['pasien'], function(id, item){
                    $no = id + 1;
                    $row_klinik_detail_table = '<tr class="row_data_pasien_'+data.poli_id+'">'+
                                                    '<td>'+$no+'</td>'+
                                                    '<td>'+item.reg_no+'</td>'+
                                                    '<td>'+condition(item.reg_nama)+' | '+condition(item.reg_medrec)+'</td>'+
                                                    '<td>'+condition(item.reg_jk)+'</td>'+
                                                    '<td>'+item.reg_tgl+'</td>'+
                                                    '<td>'+condition(item.reg_discharge_tanggal)+'</td>'+
                                                    '<td></td>'+
                                                    '<td>'+condition(item.reg_dokter)+'</td>'+
                                                    '<td>'+item.reg_payer+'</td>'+
                                                    '<td>'+item.reg_status+'</td>'+
                                                '</tr>';

                    $('#table-report-klinik-detail-'+data.poli_id).append($row_klinik_detail_table);

                
                });
                $('.total_klinik_detail_'+data.poli_id).text('Total : '+$('.row_data_pasien_'+data.poli_id).length);
            });

        },
    });

    $.ajax({
        url: $dom+'/auth/api/report/data_klinik_dokter/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $('#data-klinik-dokter').html('');
        },
        success: function(resp){
            sum = 0;
            total_all = 0;
            total_konsultasi = 0;
            total_daftar = 0;
            $.each(resp, function(i, data){

                $total_klinik_dokter = data.poli_jumlah + data.poli_jumlah_konsul;

                $row_klinik_dokter = '<table rules="all" class="table-report-all mt-3 mb-3" style="width:100%">'+
                                        '<thead>'+
                                            '<tr class="bg-secondary" style="border: 1px solid black; background-color: rgb(215, 215, 215)">'+
                                                '<th colspan="5" style="text-align: left; width: 50%">KLINIK</th>'+
                                                '<th colspan="1" style="text-align: center; width: 25%">TERDAFTAR</th>'+
                                                '<th colspan="1" style="text-align: center; width: 25%">RUJUK INTERNAL</th>'+
                                            '</tr>'+
                                            '<tr class="bg-secondary" style="border: 1px solid black; background-color: rgb(215, 215, 215)">'+
                                                '<td colspan="5" style="text-align: left; width: 60%">'+data.poli+'</td>'+
                                                '<td colspan="1" style="text-align: center; width: 20%">'+data.poli_jumlah+'</td>'+
                                                '<td colspan="1" style="text-align: center; width: 20%">'+data.poli_jumlah_konsul+'</td>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody id="table-report-klinik-dokter-'+data.poli_id+'">'+
                                        '</tbody>'+
                                        '<tfoot>'+
                                            '<tr class="font-weight-bold" style="border-top: 1px solid black">'+
                                                '<td colspan="6">Total</td>'+
                                                '<td colspan="1" style="text-align: center">'+$total_klinik_dokter+'</td>'+
                                            '</tr>'+
                                        '</tfoot>'+
                                    '</table><br><br>';

                $('#data-klinik-dokter').append($row_klinik_dokter);
                
                total_all += $total_klinik_dokter;
                total_konsultasi += data.poli_jumlah_konsul;
                total_daftar += data.poli_jumlah;

                
                $.each(data['dokter'], function(id, item){
                    $row_klinik_dokter_table = '<tr>'+
                                                    '<td colspan="5" style="width: 60%">'+item.dokter_nama+'</td>'+
                                                    '<td colspan="1" class="font-weight-bold" style="text-align: center; width: 20%">'+item.dokter_jumlah+'</td>'+
                                                    '<td colspan="1" class="font-weight-bold bg-info" style="text-align: center; width: 20%" id="tdata_klinik_dokter_'+item.dokter_kode+'_'+item.dokter_poli+'"></td>'+
                                                '</tr>';

                    $('#table-report-klinik-dokter-'+item.dokter_poli).append($row_klinik_dokter_table);

                
                });

                $.each(data['jumlah_konsultasi'], function(id, dummy){

                    $('#tdata_klinik_dokter_'+dummy.dokter_konsultasi_kode+'_'+dummy.poli_konsultasi).text(dummy.jumlah_konsultasi);
               
                });
            });

            $('#total_all_klinik_dokter').text(total_all);
            $('#total_konsultasi_klinik_dokter').text(total_konsultasi);
            $('#total_daftar_klinik_dokter').text(total_daftar);

        },
    });

    $.ajax({
        url: $dom+'/auth/api/report/data_konsultasi/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        beforeSend: function(){
            $('#table-report-rujuk-internal').html('');
        },
        success: function(resp){
            sum = 0;
            $.each(resp, function(i, data){
                $no = i + 1;
                $row_dokters = '<tr style="border: 1px solid black">'+
                                    '<td>'+$no+'</td>'+
                                    '<td>'+condition(data.konsul_reg)+'</td>'+
                                    '<td>'+condition(data.konsul_medrec)+'</td>'+
                                    '<td>'+condition(data.konsul_nama)+'</td>'+
                                    '<td>'+condition(data.konsul_dokter_kirim)+'</td>'+
                                    '<td>'+condition(data.konsul_poli_kirim)+'</td>'+
                                    '<td>'+condition(data.konsul_dokter_tujuan)+'</td>'+
                                    '<td>'+condition(data.konsul_poli_tujuan)+'</td>'+
                                    '<td>'+condition(data.konsul_tanggal)+'</td>'+
                                '</tr>';

                $('#table-report-rujuk-internal').append($row_dokters);

                sum += data.jumlah;
            });
            $('.total_dokters').text(sum);

        },
    });
    
    $.ajax({
        url: $dom+'/auth/api/report/data_pasien_payer/'+start+'/'+end,
        dataType: 'json',
        type: 'GET',
        success: function(resp){
            if (resp) {
                $('#table-report-payer').html('');
                sum = 0;
                $.each(resp, function(i, data){
                    $row_payer = '<tr style="border: 1px solid black">'+
                                        '<td>'+condition(data.payer)+'</td>'+
                                        '<td>'+condition(data.jumlah)+'</td>'+
                                    '</tr>';

                    $('#table-report-payer').append($row_payer);

                    sum += data.jumlah;
                });
                $('.total_payer').text(sum);
            }
        },
    });
}

$('#btn-report-konsultasi').click(function(){
    $start = $('#report-konsultasi-dari').val();
    $end = $('#report-konsultasi-sampai').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $s = moment($start).format('DD-MM-Y');
        $e = moment($end).format('DD-MM-Y');
        $('title').html('LAPORAN PASIEN \n\n RAWAT JALAN\n\n TANGGAL '+$s+' s/d '+$e);
        $('.periode_tanggal').text($s+' s/d '+$e);
        $('#status-pasien').attr('value', 'Status-Pasien-'+$s+'-s/d-'+$e);
        $('#status-registrasi').attr('value', 'Status-Registrasi-'+$s+'-s/d-'+$e);
        $('#jk').attr('value', 'Jenis-Kelamin-'+$s+'-s/d-'+$e);
        $('#dokters').attr('value', 'Pasien-Dokter-'+$s+'-s/d-'+$e);
        $('#dokter-detail').attr('value', 'Detail-Pasien-Dokter-'+$s+'-s/d-'+$e);
        $('#klinik-detail').attr('value', 'Detail-Pasien-Poliklinik-'+$s+'-s/d-'+$e);
        $('#rujuk-internal').attr('value', 'Rujuk-Internal-'+$s+'-s/d-'+$e);
        $('#klinik-dokter').attr('value', 'Klinik-&-Dokter-'+$s+'-s/d-'+$e);
        // getReportKonsultasi($start, $end);
        getReportStatus($start, $end);
    }
});