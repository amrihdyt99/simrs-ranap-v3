<script>
    
    function loadHistorySoapPerawat() {
        $('#modal_soap_perawat').on('show.bs.modal', function (e) {
            get_data_history_soap_perawat();
        });
    }

    function get_data_history_soap_perawat() {
        $.ajax({
            url: "{{ route('get.data.history.soap') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                reg_no: "{{ $dataPasien->reg_no }}"
            },
            beforeSend: function() {
                $('#table-history-soap-perawat').html(`
                    <tr>
                        <td colspan="8" class="text-center">Memuat data...</td>    
                    </tr>
                `);
            },
            success: function(data) {
                $('#table-history-soap-perawat').html(``);

                if (data.success) {
                    var dataSoap = data.data_soap;

                    if (dataSoap.length > 0) {
                    dataSoap.sort(function(a, b) {
                        if (a.status_review !== b.status_review) {
                            return a.status_review - b.status_review;
                        }
                        var dateA = new Date(a.soap_tanggal + ' ' + a.soap_waktu);
                        var dateB = new Date(b.soap_tanggal + ' ' + b.soap_waktu);
                        return dateB - dateA;
                    });

                    var table = ""
                    for (var i = 0; i < dataSoap.length; i++) {
                        var statusVerifikasi = dataSoap[i].status_review
                        var soapdok_dokter = dataSoap[i].soapdok_dokter
                        var reg_dokter = dataSoap[i].reg_dokter
                        var is_dokter = dataSoap[i].is_dokter
                        var utama = dataSoap[i].dpjp_utama

                        $row_lab = ''
                        $row_radiologi = ''
                        $row_obat = ''
                        $row_lainnya = ''
                        $row_diagnosa = ''

                        if (dataSoap[i].order_lab && dataSoap[i].order_lab.length > 0) {
                            $.each(dataSoap[i].order_lab, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Laboratorium</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_radiologi && dataSoap[i].order_radiologi.length > 0) {
                            $.each(dataSoap[i].order_radiologi, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Radiologi</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_obat && dataSoap[i].order_obat.length > 0) {
                            $.each(dataSoap[i].order_obat, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Obat</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_lainnya && dataSoap[i].order_lainnya.length > 0) {
                            $.each(dataSoap[i].order_lainnya, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Tindakan Lainnya</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].diagnosa && dataSoap[i].diagnosa.length > 0) {
                            $.each(dataSoap[i].diagnosa, function(i_diagnosa, item_diagnosa) {
                                $row_diagnosa += `
                                        ` + item_diagnosa.ID_ICD10 + ` - ` + item_diagnosa.NM_ICD10 + `<br> 
                                    `
                            })
                        }

                        let contentRoleSoap = ''

                        if (dataSoap[i].bertindak_sebagai) {
                            let roleSoap = JSON.parse(dataSoap[i].bertindak_sebagai)
                            if (roleSoap) {
                                $.each(roleSoap, function(sub_i, sub_item) {
                                    contentRoleSoap += sub_item + (roleSoap.length != sub_i + 1 ? ', ' : '')
                                })
                            }
                        }

                        table = table + "<tr>"
                        table = table + "<td>" + (dataSoap[i].updated_at ? moment(dataSoap[i].updated_at).format('YYYY-MM-DD HH:mm:ss') : dataSoap[i].soap_tanggal + '<br>' + dataSoap[i].soap_waktu) + "</td>"
                        table = table + "<td class='text-center'>" + (dataSoap[i].nama_ppa ? dataSoap[i].nama_ppa : dataSoap[i].name) + " " + (contentRoleSoap ? '<br><br>(' + contentRoleSoap + ')' : dataSoap[i].soapdok_posisi ? '<br><br><b>( ' + dataSoap[i].soapdok_posisi + ' )</b>' : '') + "</td>"
                        table = table + `<td>
                                <b>(S)</b> ` + (dataSoap[i].soapdok_subject ?? '') + `<br/><br/>
                                <b>(O)</b> ` + (dataSoap[i].soapdok_object ?? '') + `<br/><br/>
                                <b>(A)</b> ` + (dataSoap[i].soapdok_assesment ? dataSoap[i].soapdok_assesment : '') + `<br/><br/>
                                <b>(P)</b> ` +
                            (dataSoap[i].soapdok_planning ?? '') + `<br/><br><br>
                                    <b>Tindakan Penunjang & Obat :</b>
                                    <span class="pl-3">` + $row_lab + '<br>' + $row_radiologi + '<br>' + $row_obat + '<br>' + $row_lainnya + `</span>
                                </td>`
                        table = table + "<td>" + (dataSoap[i].soapdok_instruksi ?? '') + "</td>"
                        // if(is_dokter=="1"){
                        //     table = table + "<td class='text-center'></td>"
                        // }else{
                        if (statusVerifikasi == 0) {
                            if (reg_dokter != utama) {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-secondary''>Menunggu Verif DPJP Utama</button>" +
                                    "</td>"
                            } else {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-danger' onclick='updateverifikasi(" + dataSoap[i].soapdok_id + ")'>Verifikasi</button>" +
                                    "</td>"
                            }
                        } else {
                            table = table + "<td class='text-center'>" +
                                "<button class='btn btn-primary' >Sudah Diverifikasi</button>" +
                                "</td>"
                        }
                        // }

                            table = table + "</tr>"
                        }
                        $('#table-history-soap-perawat').html(table);
                    } else {
                        $('#table-history-soap-perawat').html(`
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>    
                            </tr>
                        `);
                    }
                } else {
                    Swal.fire('Gagal', 'Gagal mengambil data SOAP', 'error');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data SOAP', 'error');
            }
        });
    }
</script>