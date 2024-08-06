function orderPrescribe(){
    $.ajax({
        url: '/auth/api/prescribe/data_order/'+$subs,
        type: 'GET',
        dataType: 'json',
        beforeSend: function(){
            $('.row_prescribe').remove();
        },
        success: function(resp){
            if (Object.keys(resp.obat).length>0) {
                $.each(resp.obat, function(i, data){
                    if (data.prescribe_price != 0 || data.prescribe_price != null) {
                        $harga = data.prescribe_price;
                    } else {
                        $harga = 0;
                    }
                    $row_prescribe = '<tr class="row_prescribe">'+
                                        '<td>'+moment(data.created_at).format('D/M/Y HH:mm:ss')+'</td>'+
                                        '<td>'+data.prescribe_item+'</td>'+
                                        '<td>'+data.ItemName1+'</td>'+
                                        '<td>'+data.prescribe_dosage+'</td>'+
                                        '<td>'+data.prescribe_unit+'</td>'+
                                        '<td>'+data.prescribe_frequency+', '+data.prescribe_duration+'</td>'+
                                        '<td>'+data.prescribe_qty+'</td>'+
                                        '<td>'+data.prescribe_route+'</td>'+
                                        '<td>'+formatNumber($harga)+'</td>'+
                                        '<td>'+data.name+'</td>'+
                                    '</tr>';
                    
                    $('#table-prescribe').append($row_prescribe);
                });
                $('#row_total_prescribe').show();
                $('#total_tarif_prescribe').text('Rp. '+formatNumber((Math.round(resp.tarif * 100)/100).toFixed(2)));
            } else {
                $('#row_total_prescribe').hide();
                $row_prescribe = '<tr class="row_prescribe">'+
                                        '<td colspan="11" class="text-center">Belum ada data order obat</td>'+
                                    '</tr>';
                    
                    $('#table-prescribe').append($row_prescribe);
            }
        }
    });
}
