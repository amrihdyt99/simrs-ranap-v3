<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Admisi</title>

    <script type="text/javascript" src="{{asset('new_assets/signature/signature.js')}}"></script>

    <style>
        body {
            padding: 15px;
        }

        #note {
            position: absolute;
            left: 50px;
            top: 35px;
            padding: 0px;
            margin: 0px;
            cursor: default;
        }
    </style>
</head>

<body>
    <table width="1002" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="998" align="center"><img src="{{asset('new_assets/images/kop.png')}}" alt="" width="1051" height="178" /><br />
                <table width="1060" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="10" align="center"><em><strong>SLIP ADMISSION</strong></em></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"><strong>Hari / tanggal / pukul</strong></td>
                        <td width="9">:</td>
                        <td colspan="4">{{$datapasien->reg_tgl ?? '-'}}&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"><strong>Dari poli / IGD</strong></td>
                        <td>:</td>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"><strong>No. Rekam Medis</strong></td>
                        <td>:</td>
                        <td colspan="4">&nbsp;{{$datapasien->reg_medrec ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="10" align="center" valign="middle">
                            <table width="83%" border="1" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td colspan="3"><strong>I. Identitas Pasien (ditulis oleh pasien atau keluarga)</strong></td>
                                </tr>
                                <tr>
                                    <td width="2%">&nbsp;</td>
                                    <td width="31%">Nama Lengkap</td>
                                    <td>: {{$datapasien->PatientName ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Taggal Lahir</td>
                                    <td>: {{$datapasien->DateOfBirth ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Alamat Pasien</td>
                                    <td>:{{$datapasien->PatientAddress ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Penanggung Jawab</td>
                                    <td>:{{$datapasien->reg_pjawab ?? '-'}}</td>
                                </tr>
                                {{-- <tr>
                                   <td>&nbsp;</td>
                                   <td>Pekerjaan Penanggung Jawab</td>
                                   <td>:</td>
                                 </tr>--}}
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="19">&nbsp;</td>
                        <td width="19">&nbsp;</td>
                        <td width="19">&nbsp;</td>
                        <td width="22"><strong>II.</strong></td>
                        <td width="166"><strong>Diagnosis masuk</strong></td>
                        <td>:</td>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Rencana Perawatan</td>
                        <td>:</td>
                        <td colspan="4">(MRS, operasi, kemoterapi, persalinan, ODC)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Dokter Yang Merawat</td>
                        <td>:</td>
                        <td colspan="4">&nbsp;{{$datapasien->ParamedicName ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Cara Bayar</td>
                        <td>:</td>
                        <td colspan="4">{{$datapasien->reg_cara_bayar ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Hak Perawatan di kelas</td>
                        <td>:</td>
                        <td colspan="4">&nbsp;{{$datapasien->nama_kelas ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="214">&nbsp;</td>
                        <td width="209">&nbsp;</td>
                        <td width="117">&nbsp;</td>
                        <td width="266">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>III,</strong></td>
                        <td colspan="6"><strong>Permintaan Kamar / TT Rawat Inap</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">
                            <ul>
                                <li>Kelas Perawatan</li>
                            </ul>
                        </td>
                        <td>:</td>
                        <td colspan="4">{{$datapasien->nama_kelas ?? '-'}}</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <ul>
                                <li>Ruangan</li>
                            </ul>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="checkbox" name="tempat" id="tempat" checked />
                            {{$datapasien->nama_ruangan ?? '-'}}
                        </td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Petugas Ruangan</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ketersediaan TT</td>
                        <td>:</td>
                        <td>
                            @empty($datapasien->reg_ketersidaan_kamar)
                            -
                            @else
                            @if($datapasien->reg_ketersidaan_kamar == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                            @endempty
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Situasi Kamar</td>
                        <td>:</td>
                        <td>

                            @empty($datapasien->reg_ketersidaan_kamar)
                            -
                            @else

                            @if($datapasien->reg_ketersidaan_kamar == 1)
                            Boleh Kirim
                            @else
                            Tidak
                            @endif
                            @endempty
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>IV.</strong></td>
                        <td><strong>Informasi Biaya</strong></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <ul>
                                <li>Ruang Perawatan</li>
                            </ul>
                        </td>
                        <td>:</td>
                        <td>Rp. {{$datapasien->tarif_kelas ?? '-'}}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <ul>
                                <li>Jenis Tindakan</li>
                            </ul>
                        </td>
                        <td>:</td>
                        <td>........................................</td>
                        <td>Rp. <u>+ ................................</u></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <ul>
                                <li>Visit Dokter</li>
                            </ul>
                        </td>
                        <td>:</td>
                        <td>Rp. {{$datapasien->FeeAmount ?? '-'}} /1x visite</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <ul>
                                <li>Lain - lain</li>
                            </ul>
                        </td>
                        <td>:</td>
                        <td>Rp. .................................</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>V.</strong></td>
                        <td><strong>Informasi &amp; Evaluasi</strong></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">
                            <ul>
                                <li>Informasi Ketersediaan &amp; Situasi Kamar</li>
                            </ul>
                        </td>
                        <td>:

                            @empty($datapasien->reg_ketersidaan_kamar)
                            -
                            @else
                            @if($datapasien->reg_ketersidaan_kamar == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                            @endif
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">
                            <ul>
                                <li>Informasi Hak &amp; Kewajiban</li>
                            </ul>
                        </td>
                        <td>:
                            @empty($datapasien->reg_info_kewajiban)
                            -
                            @else
                            @if($datapasien->reg_info_kewajiban == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                            @endempty
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">
                            <ul>
                                <li>Informasi General Concent</li>
                            </ul>
                        </td>
                        <td>:
                            @empty($datapasien->reg_info_general_consent)
                            -
                            @else
                            @if($datapasien->reg_info_general_consent == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                            @endempty
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">
                            <ul>
                                <li>Informasi Cara Bayar dan perlengkapan / persyaratan</li>
                            </ul>
                        </td>
                        <td>:
                            @empty($datapasien->reg_info_carabayar)
                            -
                            @else
                            @if($datapasien->reg_info_carabayar == 1)
                            Ya
                            @else
                            Tidak
                            @endif
                            @endempty
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">Rekam Medik Lama</td>
                        <td>:</td>
                        <td>
                            @empty($datapasien->reg_lama)
                            -
                            @else
                            @if($datapasien->reg_lama!=null)
                            <input type="radio" name="radio" id="rm_lama3" value="rm_lama" checked readonly />
                            Ada
                            @else
                            <input type="radio" name="radio" id="rm_lama4" value="rm_lama" checked readonly />
                            Tidak
                        </td>
                        @endempty
                        @endif
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">Check List Pasien oleh</td>
                        <td>:</td>
                        <td>{{--<input type="radio" name="radio" id="check_list3" value="check_list" />
IRD--}}
                            <input type="radio" name="radio" id="check_list4" value="check_list" checked readonly />
                            Admission
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left"><strong>Palembang,</strong> .............................</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">Pasien / Keluarga</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">Petugas Ruangan Rawat Inap</td>
                        <td>&nbsp;</td>
                        <td align="left">Petugas Admission / IGD</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">
                            @if($datapasien->ttd_admisi!=null)
                            <img src="{{$datapasien->ttd_admisi}}" width="100" height="50" />
                            @else
                            <form action="{{route('register.ranap.uploadTtdAdmisi')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="reg_no" value="{{$datapasien->reg_no}}">
                                <div id="signature-pad">
                                    <div style="border:solid 1px teal; width:150px;height:110px;padding:3px;position:relative;">
                                        <canvas id="the_canvas" width="140px" height="100px">Your browser does not support the HTML canvas tag.</canvas>
                                        <div id="note" onmouseover="my_function();">The signature should be inside box</div>

                                    </div>
                                    <div style="margin:10px;">
                                        <input type="hidden" id="signature" name="signature">
                                        <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                                        <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                                    </div>

                                </div>
                            </form>
                            @endif
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="right"><strong>RM RI 001/Rev.01</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="right">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <script>
        var wrapper = document.getElementById("signature-pad");
        var clearButton = wrapper.querySelector("[data-action=clear]");
        var savePNGButton = wrapper.querySelector("[data-action=save-png]");
        var canvas = wrapper.querySelector("canvas");
        var el_note = document.getElementById("note");
        var c = document.getElementById("the_canvas");
        var ctx = c.getContext("2d");
        var img = document.getElementById("anatomi");

        var signaturePad = new SignaturePad(canvas);

        clearButton.addEventListener("click", function(event) {
            document.getElementById("note").innerHTML = "The signature should be inside box";
            signaturePad.clear();
        });
        savePNGButton.addEventListener("click", function(event) {
            if (signaturePad.isEmpty()) {
                alert("Please provide signature first.");
                event.preventDefault();
            } else {
                var canvas = document.getElementById("the_canvas");
                var dataUrl = canvas.toDataURL();
                document.getElementById("signature").value = dataUrl;
            }
        });
        // var grd = ctx.createRadialGradient(75,50,5,90,60,100);
        // grd.addColorStop(0,"red");
        // grd.addColorStop(1,"white");
        //
        // // Fill with gradient
        // ctx.fillStyle = grd;
        // ctx.fillRect(10,10,150,80);
        signaturePad.drawImage(img);
        //ctx.drawImage(img,0,0,350,100);
        // Create gradient

        function my_function() {
            document.getElementById("note").innerHTML = "";
        }
    </script>
</body>

</html>