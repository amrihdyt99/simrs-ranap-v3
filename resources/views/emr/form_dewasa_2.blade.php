<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <table width="1020" border="1" align="center" cellpadding="3" cellspacing="0">
        <tr>
            <td align="center"><img src="{{ asset('assets/logo_header.jpeg') }}" alt="" width="994"
                    height="178" /><br />
                <table width="1000" border="1" cellspacing="0" cellpadding="3">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                    <td colspan="4"><strong>DATA PSIKOLOGIS, SOSIAL, EKONOMI DAN SPIRITUAL</strong>
                                        (diisi oleh perawat)</td>
                                </tr>
                                <tr>
                                    <td width="15%">Status emosional</td>
                                    <td width="1%">:</td>
                                    <td colspan="2" id="status_emosional"></td>
                                </tr>
                                <tr>
                                    <td>Kebiasaan</td>
                                    <td>:</td>
                                    <td width="12%"><span id="kebiasaan"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="4">Riwayat pernah mengalami gangguan jiwa di masa lalu :
                                        <span id="riwayat_gangguan_jiwa"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Riwayat Keinginan dan Percobaan Bunuh Diri :</td>
                                </tr>
                                <tr>
                                    <td>: <span id="keinginan_bunuh_diri"></span></td>
                                    <td colspan="3"><input type="checkbox" name="checkbox12" id="checkbox12" />
                                        Skor Sad Person :
                                        <span id="skor_sad_person"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td colspan="2" id="kategori"></td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">
                                        <table width="100%" border="1" cellspacing="0" cellpadding="3">
                                            <tr>
                                                <td width="4%" align="center"><strong>No</strong></td>
                                                <td width="71%" align="center"><strong>Parameter</strong></td>
                                                <td width="25%" align="center"><strong>Skor : Ya (1) Tidak
                                                        (0)</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center">1</td>
                                                <td>Sex (laki-laki) : </td>
                                                <td>&nbsp; <span id="bunuhdiri_sex"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">2</td>
                                                <td>Age (&lt; 19 th atau &gt; 45 th )</td>
                                                <td>&nbsp; <span id="bunuhdiri_age"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">3</td>
                                                <td>Depresi ( pasien MRS dengan depresi atau penurunan konsentrasi,
                                                    gangguan tidur, gangguan pola makan, dan gangguan libido )</td>
                                                <td>&nbsp; <span id="bunuhdiri_sex"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">4</td>
                                                <td>Previous Suicide ( riwayat bunuh diri atau perawatan psikiatri )
                                                </td>
                                                <td>&nbsp; <span id="bunuhdiri_previous_suicide"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">5</td>
                                                <td>Excessive alcohol ( ketergantungan alkohol atau pemakai narkoba )
                                                </td>
                                                <td>&nbsp; <span id="bunuhdiri_alkohol"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">6</td>
                                                <td>Rational thingking loss ( kehilangan pikiran rasional, psikosis,
                                                    organic brainsyndrom)</td>
                                                <td>&nbsp; <span id="bunuhdiri_loss"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">7</td>
                                                <td>Separated (bercerai / janda)</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">8</td>
                                                <td>Organized plan (menunjukan rencana bunuh diri yang terorganisir /
                                                    niat serius)</td>
                                                <td>&nbsp; <span id="bunuh_diri_terorganisir"></span></td>
                                            </tr>
                                            <tr>
                                                <td align="center">9</td>
                                                <td>No Social Support (tidak ada pendukung)</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">10</td>
                                                <td>Sickness (menderita penyakit kronis)</td>
                                                <td>&nbsp; <span id="bunuh_diri_penyakit_kronis"></span></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Riwayat Trauma Psikis </td>
                                    <td>:</td>
                                    <td colspan="2"><span id="riwayat_trauma"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2"><input type="checkbox" name="checkbox19" id="checkbox19" />
                                        Tindakan Kriminal,
                                        .......................................................................................................
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Hambatan sosial, ekonomi :
                                        <span id="hambatan_sosial_ekonomi"></span>    
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Kebutuhan spiritual pasien dalam perawatan di rumah sakit :
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Pasien membutuhkan konseling spiritual / agama :
                                        <span id="kebutuhan_konseling_spiritual"></span>    
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Pasien yang membutuhkan bantuan dalam menjalankan ibadah dan
                                        menyetujuinya : <span id="bantuan_menjalankan_ibadah"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">SKRINING RISIKO CEDERA / JATUH (di isi oleh perawat)</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Skor total : .................................</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><input type="checkbox" name="checkbox26" id="checkbox26" />
                                        Resiko Rendah / RR (Morse 0-24, Geriatri 0-1)
                                        <input type="checkbox" name="checkbox27" id="checkbox27" />
                                        Resiko Sedang / RS (Morse 25-44, Geriatri 2-3)
                                        <input type="checkbox" name="checkbox28" id="checkbox28" />
                                        Resiko Tinggi / RT (Morse = 45, Geriatri = 4)
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"><input type="checkbox" name="checkbox29" id="checkbox29" />
                                        Dipasang klip tanda resiko jatuh ( warna kuning ) pada gelang dan stiker
                                        segitiga besar di tempat tidur, / pintu kamar bila dalam satu kamar beresiko
                                        jatuh Diberitahukan ke dokter
                                        <input type="checkbox" name="checkbox30" id="checkbox30" />
                                        Ya
                                    </td>
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
                        <td align="right">
                            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                    <td align="center">Penilaian Risiko Jatuh Pasien Dewasa Hall Morse Scale</td>
                                    <td align="center">Penilaian Risiko Jatuh Pasien Geriatri &gt; 60 Tahun </td>
                                </tr>
                                <tr>
                                    <td width="50%" valign="top">
                                        <table width="100%" border="1" align="center" cellpadding="5"
                                            cellspacing="0">
                                            <tr>
                                                <td width="7%" align="center"><strong>No</strong></td>
                                                <td width="70%" align="center"><strong>RISIKO</strong></td>
                                                <td width="23%" align="center"><strong>Skor</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>1</strong></td>
                                                <td>Riwayat jatuh, yang baru atau dalam 3 bulan terakhir<br />
                                                    Tidak = 0<br />
                                                    Ya = 25</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>2</strong></td>
                                                <td>Diagnosis Medis Sekunder &gt; 1<br />
                                                    Tidak = 0<br />
                                                    Ya = 15</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>3</strong></td>
                                                <td>Menggunakan Alat bantu jalan :<br />
                                                    - Bed rest / dibantu perawat = 0<br />
                                                    - Penopang / tongkat / walker = 15<br />
                                                    - Furnitur = 30</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>4</strong></td>
                                                <td>Menggunakan Infus<br />
                                                    Tidak = 0<br />
                                                    Ya = 25</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>5</strong></td>
                                                <td>Cara berjalan / berpindah<br />
                                                    - Normal / bed rest / imonilisasi = 0<br />
                                                    - Lemah = 15<br />
                                                    - Terganggu = 30</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>6</strong></td>
                                                <td>Status Mental<br />
                                                    - Orientasi sesuai kemampuan diri = 0<br />
                                                    - Lupa keterbatasan diri = 15</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center"><strong>TOTAL SKOR</strong></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="50%" valign="top">
                                        <table width="100%" border="1" align="center" cellpadding="5"
                                            cellspacing="0">
                                            <tr>
                                                <td width="7%" align="center"><strong>No</strong></td>
                                                <td width="59%" align="center"><strong>RISIKO</strong></td>
                                                <td width="17%" align="center"><strong>Skala</strong></td>
                                                <td width="17%" align="center"><strong>Skor</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>1</strong></td>
                                                <td>Gangguan gaya berjalan (diseret, menghentak, berayun)</td>
                                                <td align="center">4</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>2</strong></td>
                                                <td>Pusing / pingsan pada posisi tegak</td>
                                                <td align="center">3</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>3</strong></td>
                                                <td>Kebingungan setiap saat</td>
                                                <td align="center">3</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>4</strong></td>
                                                <td>Nokturia / Inkontinen</td>
                                                <td align="center">3</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>5</strong></td>
                                                <td>Kebingungan Intermiten</td>
                                                <td align="center">2</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>6</strong></td>
                                                <td>Kelemahan Umum</td>
                                                <td align="center">2</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>7</strong></td>
                                                <td>Obat-obat berisiko tinggi (diuretik, narkotik, sedatif, anti
                                                    psikotik, laksatif, vasodilator, antiaritmia, anti hypertensi, obat
                                                    hypoglikemik, entidepresan, neuroleptik, NSAID)</td>
                                                <td align="center">2</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>8</strong></td>
                                                <td>Riwayat jatuh dalam waktu 12 bulan sebelumnya</td>
                                                <td align="center">2</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>9</strong></td>
                                                <td>Osteoporosis</td>
                                                <td align="center">1</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>10</strong></td>
                                                <td>Gangguan pendengaran dan atau penglihatan </td>
                                                <td align="center">1</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>11</strong></td>
                                                <td>Usia 70 tahun keatas</td>
                                                <td align="center">1</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="center"><strong>TOTAL SKOR</strong></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <br />
                            <strong>RM RI 004/Hal 2-7/rev 01</strong>
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

                $('#status_emosional').text(JSON.parse(resp.status_emosional))
                $('#kebiasaan').text(resp.kebiasaan)

                $('#bunuhdiri_sex').text(resp.bunuh_diri_sex)
                $('#bunuhdiri_age').text(resp.bunuh_diri_age)
                $('#bunuhdiri_sex').text(resp.bunuh_diri_sex)
                $('#bunuhdiri_previous_suicide').text(resp.bunuh_diri_previous_suicide)
                $('#bunuhdiri_alkohol').text(resp.bunuh_diri_alkohol)
                $('#bunuhdiri_loss').text(resp.bunuh_diri_loss)
                $('#bunuh_diri_terorganisir').text(resp.bunuh_diri_terorganisir)
                $('#bunuh_diri_penyakit_kronis').text(resp.bunuh_diri_penyakit_kronis)

                $('#riwayat_gangguan_jiwa').text(resp.riwayat_gangguan_jiwa)
                $('#riwayat_trauma').text(resp.riwayat_trauma)
                $('#hambatan_sosial_ekonomi').text(resp.hambatan_sosial_ekonomi)
                $('#kebutuhan_konseling_spiritual').text(resp.kebutuhan_konseling_spiritual)
                $('#bantuan_menjalankan_ibadah').text(resp.bantuan_menjalankan_ibadah)
            }
        })
    </script>
</body>

</html>
