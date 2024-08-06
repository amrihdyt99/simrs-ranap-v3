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
            <td align="center"><img src="{{ asset('assets/logo_header.jpeg') }}" alt="" width="986"
                    height="192" /><br />
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
                                    <td colspan="4"><strong>SKRINING GIZI : (Diisi oleh Perawat, berdasarkan
                                            Malnutrisi Screening Test</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong><u>Parameter : </u></strong></td>
                                    <td width="33%" align="center"><strong>Skor :</strong></td>
                                </tr>
                                <tr>
                                    <td width="2%">1.</td>
                                    <td colspan="2">Apakah pasien menglami penurunan berat badan yang tidak
                                        direncanakan / tidak di inginkan dalam 6 bulan terakhir?</td>
                                    <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">a. Tidak</td>
                                    <td align="center">0</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">b. Tidak yakin ( ada tanda kelonggaran baju / celana )</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">c. Ya penurunannya sebanyak : </td>
                                    <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td width="5%" align="center">-</td>
                                    <td width="60%">1 - 6 kg</td>
                                    <td align="center">1</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center">-</td>
                                    <td>6 - 10 kg</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center">-</td>
                                    <td>11 - 15 kg</td>
                                    <td align="center">3</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center">-</td>
                                    <td>&gt; 15 kg</td>
                                    <td align="center">4</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center">-</td>
                                    <td>Tidak tahu berapa kg penurunannya</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td colspan="2">Apakah asupan makan pasien berkurang karena penurunan nafsu makan
                                        / kesulitan menerima Makanan?</td>
                                    <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">a. Tidak</td>
                                    <td align="center">0</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td colspan="2">b. Ya</td>
                                    <td align="center">1</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" valign="top">
                            <table width="100%" border="0" cellpadding="3" cellspacing="0">
                                <tr>
                                    <td width="8%">Kategori :</td>
                                    <td width="23%"> <strong>A :</strong> 0-1 = Status gizi baik</td>
                                    <td width="22%"><strong>B :</strong> 2-3 = beresiko malnutrisi</td>
                                    <td width="47%">
                                        <table width="138" height="46" border="1" align="center"
                                            cellpadding="5" cellspacing="0">
                                            <tr>
                                                <td width="94">Kategori : <span id="kategori"></span><br />
                                                    <br />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><strong>C : </strong>4-5 = Resiko Malnutrisi Tinggi</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Sudah dibaca dan diketahui oleh Dietisen</td>
                                    <td><input type="radio" name="radio" id="pengetahuan_dietisen"
                                            value="pengetahuan_dietisen" />
                                        Ya, Pukul.................
                                        <input type="radio" name="radio" id="pengetahuan_dietisen2"
                                            value="pengetahuan_dietisen" />
                                        Tidak
                                    </td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Catatan :</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Pasien dengan <strong>B</strong> dan <strong>C</strong>
                                        dilakuakan Assesment Lanjut oleh tim asuhan nutrisi</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>SKRINING NYERI (di isi oleh perawat)</strong></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Apakah pasien merasakan nyeri?</td>
                                    <td>: <span id="merasakan_nyeri"></span></td>
                                </tr>
                                <tr> Skala ....................</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Durasi </td>
                                    <td>: <span id="durasi"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Frekuensi</td>
                                    <td>: <span id="frekuensi"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Pencetus Nyeri</td>
                                    <td>: <span id="pencetus_nyeri"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Kapan terjadinya nyeri</td>
                                    <td>: <span id="kapan_terjadi_nyeri"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Tipe Nyeri</td>
                                    <td colspan="2">: <span id="tipe_nyeri"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Ekspersi Wajah</td>
                                    <td> : <span id="ekspresi_wajah"></span></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">*) Catatan : Bila pasien tidak sadar maka gunakan formulir
                                        penilaian nyeri dengan skala BPS (Behavior Pain Scale)</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center"><strong>Behavior Pain Scale</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table width="100%" border="1" cellpadding="4" cellspacing="0">
                                            <tr>
                                                <td width="19%" align="center"><strong>Parameter</strong></td>
                                                <td width="19%" align="center"><strong>Score 1</strong></td>
                                                <td width="22%" align="center"><strong>Score 2</strong></td>
                                                <td width="21%" align="center"><strong>Score 3</strong></td>
                                                <td width="19%" align="center"><strong>Score 4</strong></td>
                                            </tr>
                                            <tr>
                                                <td valign="top">Ekspresi wajah</td>
                                                <td valign="top">Normal</td>
                                                <td valign="top">Mengencang sebagian (alis mengerut)</td>
                                                <td valign="top">Mengencangkan total (kelopak mata mengatup rapat)
                                                </td>
                                                <td valign="top">Meringis</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">Ekstremitas atas</td>
                                                <td valign="top">Tidak ada pergerakan</td>
                                                <td valign="top">Tertekan sebagian</td>
                                                <td valign="top">Tertekuk total dengan fleksi jari</td>
                                                <td valign="top">Retraksi permanen</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">Compleance terhadap ventilator</td>
                                                <td valign="top">Toleransi terhadap ventilator</td>
                                                <td valign="top">Sesekali terbatuk, Namun masih toleransi Terhadap
                                                    ventilator</td>
                                                <td valign="top">Melawan ventilator</td>
                                                <td valign="top">Tidak dapat mengendalikan pola napas</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right"><strong>RM RI 004/Hal 3-7/rev 01</strong></td>
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

                $('#kategori').text(resp.ketegori)
                $('#merasakan_nyeri').text(resp.merasakan_nyeri)
                $('#durasi').text(resp.durasi)
                $('#frekuensi').text(resp.frekuensi)
                $('#pencetus_nyeri').text(resp.pencetus_nyeri)
                $('#kapan_terjadi_nyeri').text(resp.kapan_terjadi_nyeri)
                $('#tipe_nyeri').text(resp.tipe_nyeri)
                $('#ekspresi_wajah').text(resp.ekspresi_wajah)
            }
        })
    </script>
</body>

</html>
