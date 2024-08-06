<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <table width="1020" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <td align="center"><img src="{{ asset('assets/logo_header.jpeg') }}" width="994" height="178" /><br />
                <table width="1000" border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>
                            <p><strong>SKRINING STATUS FUNGSIONAL</strong> (diisi oleh perawat)<br />
                                <input type="checkbox" name="checkbox" id="checkbox" />
                                Kategori I : Perawatan Minimal (selfcare), memerlukan waktu 1-2 jam / 24 jam<br />
                                <input type="checkbox" name="checkbox2" id="checkbox2" />
                                Kategori II : Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu 3-4 jam /
                                24 jam<br />
                                <input type="checkbox" name="checkbox3" id="checkbox3" />
                                Kategori III : Kriteria Perawatan Maksimal (Total Care / Intensif Care), memerlukan
                                waktu 5-6 jam / 24 jam
                            </p>
                            <p>&nbsp;</p>
                            <p><strong>PEMERIKSAAN MULTI ORGAN</strong> (diisi oleh Dokter) :</p>
                            <p>&nbsp; <span id="pemeriksaan_multi_organ"></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>KEPALA DAN LEHER : <br />
                                    TORAKS : </strong> <span id="toraks"></span><br />
                                Paru (inspeksi, palpasi, perkusi dan auskultasi)</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>Jantung (inspeksi, palpasi, perkusi, dan auskultasi)</p>
                            <p>&nbsp; <span id="jantung"></span></p>
                            <p>&nbsp;</p>
                            <p><strong>ABDOMEN :</strong></p>
                            <p>&nbsp; <span id="abdomen"></span></p>
                            <p>&nbsp;</p>
                            <p><strong>EKSTREMITAS ATAS DAN BAWAH :</strong></p>
                            <p>&nbsp; <span id="ekstremitas_atas_bawah"></span></p>
                            <p>&nbsp;</p>
                            <p><strong>GENITALIA DAN ANUS :</strong> (diperiksa bila ada indikasi)</p>
                            <p>&nbsp; <span id="genetalia_dan_anus"></span></p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                        <td align="right"><strong>RM RI 004/Hal 4-7/rev 01</strong></td>
                    </tr>
                </table> <br />
            </td>
        </tr>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajax({
            url: 'http://127.0.0.1:8000/perawat/patient/data_pengkajian_dewasa',
            type: 'post',
            dataType: 'json',
            data: {
                _token : "{{csrf_token()}}",
                reg: 'QREG/RI/202206040001',
            },
            success: function(resp) {
                console.log(resp)
                
                if (resp.created_at != '') {
                    var datetime = resp.created_at;
                    var myTime = datetime.substr(11, 8);
                    var myDate = datetime.substr(0, 10);
                } else {
                    var myTime = ''
                    var myDate = ''
                }

                $('#RoomName').text(resp.RoomName)
                $('#reg_medrec').text(resp.reg_medrec)
                $('#PatientName').text(resp.PatientName)
                $('#DateOfBirth').text(resp.DateOfBirth)
                $('#GCSex').text((resp.GCSex == '0001^F') ? 'Perempuan' : 'Laki-laki')
                $('#reg_tgl').text(resp.reg_tgl)
                $('#reg_jam').text(resp.reg_jam)
                $('#created_at').text(myDate)
                $('#created_at_time').text(myTime)

                $('#pemeriksaan_multi_organ').text(resp.pemeriksaan_multi_organ)
                $('#toraks').text(resp.toraks)
                $('#jantung').text(resp.jantung)
                $('#abdomen').text(resp.abdomen)
                $('#ekstremitas_atas_bawah').text(resp.ekstremitas_atas_bawah)
                $('#genetalia_dan_anus').text(resp.genetalia_dan_anus)
            }
        })
    </script>
</body>

</html>
