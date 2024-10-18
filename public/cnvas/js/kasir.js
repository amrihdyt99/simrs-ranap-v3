function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('[id="findData"]').click(function(){
    $start = $('[id="start"]').val();
    $end = $('[id="end"]').val();
    $unit = $('#report-unit').find(':selected').val();

    if ($start == '' || $end == '') {
        alert('Mohon pilih tanggal mulai dan tanggal akhir');
    } else {
        $('[class*="btn_print_report_kasir"]').attr('value', 'LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+moment($start).format('DD-MM-YYYY HH:mm')+' s/d '+moment($end).format('DD-MM-YYYY HH:mm'));
        $('#report-title').html('LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+moment($start).format('DD-MM-YYYY HH:mm')+' s/d '+moment($end).format('DD-MM-YYYY HH:mm'));
        $('title').html('LAPORAN TRANSAKSI\n\n PASIEN RAWAT JALAN\n\n TANGGAL '+moment($start).format('DD-MM-YYYY HH:mm')+' s/d '+moment($end).format('DD-MM-YYYY HH:mm'));
        
        getReportTransaction($start, $end)

        $('[class*="btn_print_report_kasir"]').attr('href', baseUrl+'/kasir/report/print?start='+$start+'&end='+$end);
    }
});

function getReportTransaction(start = '', end = '', print = 0){
    if (start && end) {
        $.ajax({
            url: baseUrl+'/kasir/report/data?start='+start+'&end='+end,
            dataType: 'json',
            type: 'GET',
            beforeSend: function(){
                $row_jk = `<tr>
                                <td colspan="2" class="text-center">Memuat data...</td>
                            </tr>`;
    
                $('#table-report-kasir').html($row_jk);
            },
            success: function(resp){
                $('#table-report-kasir').html('');
                total = 0;
                cash = 0;
                debit = 0;
                kredit = 0;
                transfer = 0;
                discount_global = 0;
                qris = 0;
                multipayer = 0;

                $.each(resp, function(i, data){

                    $kode = data.code.replace(/\//g, '_')
                    
                    $row_kasir = `
                        <tr id="r_`+$kode+`">
                            <td style="text-align: left">`+data.date+`</td>
                            <td style="text-align: left">`+data.reg+`</td>
                            <td style="text-align: left">`+data.code+`</td>
                            <td style="text-align: left">`+data.name+`</td>
                            <td style="text-align: left">
                                `+data.currentLocation.ServiceUnitName+` - 
                                `+data.currentLocation.RoomName+`
                            </td>
                            <td style="text-align: right">`+formatNumber(parseFloat(data.total).toFixed(2))+`</td>
                        </tr>
                    `;
    
                    $('#table-report-kasir').append($row_kasir);
                    
                    $.each(data.detail, function(idx, item){
                        $td_detail = `
                            <td style="text-align: right" id="nominal_`+item.method.replace(/\s+/, '_').toLowerCase() +`" value="`+parseFloat(item.nominal).toFixed(2)+`">`+formatNumber(parseFloat(item.nominal).toFixed(2))+`</td>
                        `
                        
                        $('#r_'+$kode).append($td_detail)
                    })

                    total += data.total;
                });

                $('[id*="nominal_cash"]').each(function() {
                    cash += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_transfer"]').each(function() {
                    transfer += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_discount_global"]').each(function() {
                    discount_global += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_debit"]').each(function() {
                    debit += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_kredit"]').each(function() {
                    kredit += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_qris"]').each(function() {
                    qris += parseFloat($(this).attr('value'))
                })
                $('[id*="nominal_multipayer"]').each(function() {
                    multipayer += parseFloat($(this).attr('value'))
                })
                

                $row_footer = `
                    <tr>
                        <th colspan="5">Total</th>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(total).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(cash).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(transfer).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(discount_global).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(debit).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(kredit).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(qris).toFixed(2))+`</td>
                        <td style="text-align: right">Rp. `+formatNumber(parseFloat(multipayer).toFixed(2))+`</td>
                    </tr>
                `;

                $('#table-report-kasir-footer').html($row_footer);

                if (print == 1) {
                    window.print()
                }
            },
        });
    }
}

function filterData(){
    let params = {}

    params.statusPayment = $('[name="statusPayment"]:checked').val() ?? ''
    params.start = $('[name="start"]').val() ?? ''
    params.end = $('[name="end"]').val() ?? ''

    location.href = baseUrl+'/kasir?statusPayment='+params.statusPayment+'&start='+params.start+'&end='+params.end
}