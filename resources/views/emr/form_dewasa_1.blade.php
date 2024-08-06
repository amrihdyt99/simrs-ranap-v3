<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <table width="1010" border="1" align="center" cellpadding="7" cellspacing="0">
        <tr>
            <td align="center"><img src="{{ asset('assets/logo_header.jpeg') }}" width="986" height="192" /><br />
                <table width="1000" border="1" cellspacing="0">
                    <tr>
                        <td width="490" rowspan="2" align="center" valign="middle"> <strong>PENGKAJIAN AWAL PASIEN
                                DEWASA</strong><br />
                            <br />
                            ( Harus dilengkapi dalam waktu 24 jam pertama pasien masuk ruang rawat inap )<br />
                        </td>
                        <td width="500" valign="top">
                            <table width="100%" border="0" cellpadding="3" cellspacing="0">
                                <tr>
                                    <td width="33%">No Med.Rec</td>
                                    <td width="3%">:</td>
                                    <td width="64%" id="reg_medrec">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td id="PatientName">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td id="DateOfBirth">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td id="GCSex">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center"><em>( Mohon diisi atau tempelkan stikerjika ada
                                            )</em></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="3" cellspacing="0">
                                <tr>
                                    <td width="32%">Ruang Rawat Inap</td>
                                    <td width="3%">:</td>
                                    <td width="50%" id="RoomName">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tgl masuk rawat inap</td>
                                    <td>:</td>
                                    <td id="reg_tgl">&nbsp;</td>
                                    <td>Pukul</td>
                                    <td>:</td>
                                    <td id="reg_jam">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tgl asesment</td>
                                    <td>:</td>
                                    <td id="created_at">&nbsp;</td>
                                    <td>Pukul</td>
                                    <td>:</td>
                                    <td id="created_at_time">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" valign="top">
                            <table width="100%" border="0" cellpadding="3" cellspacing="0">
                                <tr>
                                    <td colspan="4"><strong>ALERGI (diisi oleh perawat/bidan) :</strong></td>
                                </tr>
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td colspan="3"><input type="radio" name="alergi" id="Tidak"
                                            value="alergi" />
                                        Tidak
                                        <input type="radio" name="alergi" id="alergi2" value="Tidak Tahu" />
                                        Tidak Tahu
                                        <input type="radio" name="alergi" id="alergi3" value="Ya" />
                                        Ya
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Bila ya :</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3"><input type="checkbox" name="checkbox" id="checkbox" />
                                        Alergi obat,
                                        ............................................................................
                                        bentuk reaksi
                                        ...............................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3"><input type="checkbox" name="checkbox2" id="checkbox2" />
                                        Alergi makanan,
                                        ...................................................................... bentuk
                                        reaksi
                                        ...............................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3"><input type="checkbox" name="checkbox3" id="checkbox3" />
                                        Alergi lainnya,
                                        ...................................................................... bentuk
                                        reaksi
                                        ...............................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3" align="left"><input type="checkbox" name="checkbox4"
                                            id="checkbox4" />
                                        Dipasang Klip tanda alergi ( warna merah )</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3" align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Diberitahukan ke dokter /farmasis (apoteker) / dietisien (coret
                                        salah satu)
                                        <input type="checkbox" name="checkbox5" id="checkbox5" />
                                        Ya, pukul...............................
                                        <input type="checkbox" name="checkbox6" id="checkbox6" />
                                        Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="3" align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><strong>KEADAAN UMUM</strong> (disi oleh perawat / bidan)</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Keasadaran</td>
                                    <td colspan="2">: <span id="kesadaran"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Kondisi Umum</td>
                                    <td colspan="2">: <span id="kondisi_umum"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="4">Tekanan Darah : <span id="tekanan_darah"></span> mmHg; Nadi : <span id="nadi"></span> x
                                        / menit; Suhu : <span id="suhu"></span> C; Pernapasan : <span id="pernafasan"></span> x/menit</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tinggi Badan : <span id="tinggi_badan"></span> cm</td>
                                    <td width="66%" align="left">Berat Badan : <span id="berat_badan"></span> kg
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Kebutuhan Khusus</td>
                                    <td colspan="2">: <span id="kebutuhan_khusus"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><strong>ANAMNESIS</strong> (diisi oleh dokter)<br />
                                            Diperoleh data dari pasien / orang lain hubungan dengan pasien
                                            <span id="anamnesis"></span></p>
                                        <p><strong>KELUHAN UTAMA</strong></p>
                                        <p>&nbsp; <span id="keluhan_utama"></span></p>
                                        <p><strong>RIWAYAT PENYAKIT SEKARANG</strong></p>
                                        <p>&nbsp; <span id="riwayat_penyakit_sekarang"></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">
                                        <table width="100%" border="1" cellspacing="0" cellpadding="3">
                                            <tr>
                                                <td width="48%"><strong>RIWAYAT PENYAKIT DAHULU</strong><br />
                                                    (termasuk riwayat rawat inap/ riwayat operasi)<br />
                                                    (bulan / tahun)</td>
                                                <td width="52%" align="center"><strong>RIWAYAT PENGOBATAN</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2"><span id="riwayat_penyakit_dahulu"></span></td>
                                                <td><span id="riwayat_pengobatan"></span></td>
                                            </tr>
                                            <tr>
                                                <td valign="top">
                                                    <p>Alat Implant : Tidak / Ya :
                                                        ............................................................</p>
                                                    <p>&nbsp;</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><strong>RIWAYAT PENYAKIT DALAM KELUARGA</strong> : (termasuk penyakit
                                            keturunan dan menular)</p>
                                        <p>&nbsp; <span id="riwayat_penyakit_keluarga"></span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td width="12%" align="left">&nbsp;</td>
                                    <td width="20%">&nbsp;</td>
                                    <td align="right"><strong>RM RI 004/Hal 1-7/rev 01</strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
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

                $('#anamnesis').text(resp.anamnesis)
                $('#keluhan_utama').text(resp.keluhan_utama)
                $('#riwayat_penyakit_sekarang').text(resp.riwayat_penyakit_sekarang)
                $('#riwayat_penyakit_dahulu').text(resp.riwayat_penyakit_dahulu)
                $('#riwayat_pengobatan').text(resp.riwayat_pengobatan)
                $('#riwayat_penyakit_keluarga').text(resp.riwayat_penyakit_keluarga)

                $('[name="alergi"][value="'+resp.alergi+'"]').attr('checked', true)

                $('#kesadaran').text(resp.kesadaran)
                $('#kondisi_umum').text(resp.kondisi_umum)
                $('#tekanan_darah').text(resp.tekanan_darah)
                $('#nadi').text(resp.nadi)
                $('#suhu').text(resp.suhu)
                $('#pernafasan').text(resp.pernafasan)
                $('#tinggi_badan').text(resp.tinggi_badan)
                $('#berat_badan').text(resp.berat_badan)
                $('#kebutuhan_khusus').text(JSON.parse(resp.kebutuhan_khusus))
            }
        })
    </script>
</body>

</html>
