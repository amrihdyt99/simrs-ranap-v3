<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
<table width="793" height="1122">
    <tr>
        <td width="783" height="152"><img src="{{ asset('new_assets/images/kop.png') }}" width="776"
                                          height="138" /></td>
    </tr>
    <tr>
        <td height="131">
            <table width="769" border="1">
                <tr>
                    <td width="375" rowspan="5" style="text-align:center">PESETUJUAN UMUM <br> <i>(GENERAL
                            CONSENT)</i> </td>
                    <td width="103">No Medrec</td>
                    <td width="8">:</td>
                    <td width="255">{{ $datapasien->reg_medrec }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>{{ $datapasien->PatientName }}</td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td>:</td>
                    <td>{{ $datapasien->DateOfBirth }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>&nbsp; @if(str_replace('0001^','',$datapasien->GCSex)=="F")
                            Perempuan
                        @else
                            Laki-laki
                        @endif</td>
                </tr>
                <tr>
                    <td colspan="3"> <i> (Mohon diisi atau tempelkan stiker jika ada)</i> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="480">
            <table width="770">
                <tr>
                    <td width="48">I.</td>
                    <td colspan="2">PERSETUJUAN UNTUK PERAWAT DAN PENGOBATAN</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td width="25">1.</td>
                    <td width="675">Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis,
                        saya mengizinkan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk
                        memberikan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka. Prosedur
                        diagnostik dan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>perawatan medis termasuk tetapi tidak terbatas pada electrocardiograms, x-ray, tes darah,
                        terapi fisik,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>dan pemberian obat.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>2.</td>
                    <td>Saya sadar bahwa praktik kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa
                        tidak</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>ada jaminan atas hasil apapun, terhadap perawat prosedur atau pemeriksaan apapun yang
                        dilakukan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>terhadap saya.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>3.</td>
                    <td>Saya mengakui telah mendapatkan informasi bahwa pada prinsipnya setiap tindakan yang akan
                        dilakukan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>terhadap diri saya yang meliputi tindakan transfusi darah, tindakan kedokteran, tindakan
                        anastesi,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>hemodialisa, dan kemoterapi akan dimintakan informed consent (Pernyataan Persetujuan) kepada
                        saya</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>untuk saya tandatangani, dan saya sadar bahwa tindakan tersebut mengandung resiko medis.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>4.</td>
                    <td>Saya mengetahui RSUD Siti Fatimah Provinsi Sumatera Selatan merupakan Rumah Sakit Pendidikan
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>yang menjadi tempat praktik klinik bagi mahasiswa kedokteran dan profesi kesehatan lainnya.
                        Karena itu,</td>
                </tr>
                <tr>
                    <td height="23">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>mereka mungkin berpartisipasi dan atau terlibat langsung dalam perawatan saya. Terhadap itu,
                        saya tidak</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>keberatan dan dapat menyetujui sepanjang dilaksanakan dibawah supervisi dokter spesialis
                        yang menjadi</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Dokter Penanggung Jawab Pelayanan (DPJP).</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>5.</td>
                    <td>Apabila saya dilibatkan dalam penelitian klinis, maka hal tersebut hanya dapat dilakukan
                        dengan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>sepengetahuan dan persetujuan saya.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>6.</td>
                    <td>Saya menyetujui apabila data rekam medis saya, spesimen (jaringan dan cairan tubuh)
                        dipergunakan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>dalam pendidikan dan penelitian</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="768">
                <tr>
                    <td width="46">II.</td>
                    <td colspan="2">BARANG-BARANG MILIK PASIEN</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td width="23">1.</td>
                    <td width="677">Saya telah memahami bahwa rumah sakit tidak bertanggung jawab atas semua
                        kehilangan barang-barang</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>milik saya dan saya secara pribadi bertanggung jawab atas barang-barang berharga yang saya
                        miliki</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>namun tidak terbatas pada uang, perhiasan, buku cek, kartu kredit, handphone atau barang
                        lainnya</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>kecuali untuk barang/harta yang saya laporkan. Dan apabila saya membutuhkan maka saya dapat
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>menitipkan barang-barang saya kepada rumah sakit sesuai peraturan yang berlaku di rumah
                        sakit.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>2.</td>
                    <td>Saya juga mengerti bahwa saya harus memberitahu/menitipkan pada RS jika saya memiliki gigi
                        palsu,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>kacamata, lensa kontak, prosthetics atau barang lainnya yang saya butuhkan untuk diamankan.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="766">
                <tr>
                    <td width="43">III.</td>
                    <td colspan="2">HAK DAN TANGGUNG JAWAB PASIEN</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td width="22">1.</td>
                    <td width="679">Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit
                        saya dan dalam hal</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>perawatan medis dan rencana pengobatan.</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>2.</td>
                    <td>Saya telah mendapat informasi tentang &quot;HAK DAN TANGGUNG JAWAB PASIEN&quot; di RSUD Siti
                        Fatimah</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Provinsi Sumatera Selatan melalui <b>leaflet dan banner</b> yang disediakan oleh petugas.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>3.</td>
                    <td>Saya memberikan wewenang kepada Rumah Sakit untuk memberikan kewenangan untuk terlibat dalam
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>pengambilan keputusan mengenai perawatan saya data dan informasi mengenai diri saya dan
                        keadaan</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>kesehatan saya termasuk dalam situasi tertentu misalnya keadaan kristis dll, kepada keluarga
                        saya,</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>bernama;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="767">
                <tr>
                    <td width="47">&nbsp;</td>
                    <td width="15">&nbsp;</td>
                    <td width="12">1.</td>
                    <td width="167">.........................................</td>
                    <td width="180">&nbsp;</td>
                    <td width="12">3.</td>
                    <td width="288">.........................................</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>2.</td>
                    <td>.........................................</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align:right"><b>RM RI 001.1/ Hal.1-2</b></td>
    </tr>
</table>
</body>

</html>
