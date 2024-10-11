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
                        <td colspan="10" align="center"><em><h4><strong>SLIP ADMISSION</strong></h4></em></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"><strong>Hari / tanggal / pukul</strong></td>
                        <td width="9">:</td>
                        <td colspan="4">{{ isset($datapasien->reg_tgl) ? \Carbon\Carbon::parse($datapasien->reg_tgl)->format('d F Y') : '-' }}&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"><strong>Dari poli / IGD</strong></td>
                        <td>:</td>
                        <td colspan="4">&nbsp;{{ $datamypatient->poli_asal ?? 'IGD'}} </td>                    
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
                                    <td>: {{$datapasien->PatientAddress ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Penanggung Jawab</td>
                                    <td>: <span id="selected_penanggung_jawab">{{ $datapasien->penanggung_jawab ?? '' }}</span></td>
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
                        <td colspan="4">&nbsp;{{$datamypatient->ranap_diagnosa ?? '-'}}</td>
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
                        <td colspan="4">{{ $datapasien->reg_cara_bayar_name }}</td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Hak Perawatan di kelas</td>
                        <td>:</td>
                        <td colspan="4">&nbsp;{{$datamypatient->reg_class_name ?? '-'}}</td>
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
                        <td><strong>III.</strong></td>
                        <td colspan="6"><strong>Permintaan Kamar / TT Rawat Inap</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      
                        <td>Kelas Perawatan</td>
                        <td>:</td>
                        <td colspan="4">{{$datamypatient->reg_class_name ?? '-'}}</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ruangan</td>
                        <td>:</td>
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
                        <td>Ruang Perawatan</td>
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
                        <td>Jenis Tindakan</td>
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
                        <td>Jenis Tindakan</td>
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
                        <td>Visit Dokter </td>
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
                        <td colspan="3" align="left">Informasi Ketersediaan &amp; Situasi Kamar</td>
                        <td>:
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
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Informasi Hak &amp; Kewajiban</td>                            
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
                        <td colspan="3" align="left">Informasi General Concent</td>
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
                        <td colspan="3" align="left">Informasi Cara Bayar dan perlengkapan / persyaratan</td>   
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
                        <td align="left"><strong>Palembang,</strong> {{ \Carbon\Carbon::now()->format('d F Y') }}</td>
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
                            <div class="form-group">
                                <label for="penanggung_jawab"></label>
                                <select name="penanggung_jawab" id="penanggung_jawab" class="form-control d-print-none">
                                    <option value="">Pilih Penanggung Jawab</option>
                                    @foreach($datapasien->penanggung_jawab_list as $penanggung_jawab)
                                        <option value="{{ $penanggung_jawab }}">( {{ $penanggung_jawab }} )</option>
                                    @endforeach
                                </select>
                                <span id="selected_penanggung_jawab_display" class="d-none d-print-block">
                                    @if(isset($datapasien->penanggung_jawab))
                                        {{ $datapasien->penanggung_jawab }}
                                    @endif
                                </span>
                            </div>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                        <td>&nbsp;</td>
                        <td align="left">
                            @if($user_signature != null)
                                <img src="{{$user_signature}}" width="150" height="100" /><br>
                            @endif
                            ({{$user_name}})
                        </td>
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
                    <tr>
                        <td colspan="10">
                            <div style="display: flex; align-items: center; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
                                {{ $qrcode }}
                            </div>
                        </td>
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
                alert("Signature saved successfully.");
                location.reload(); // Refresh the page after saving the signature
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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var penanggungJawabSelect = document.getElementById("penanggung_jawab");
        var selectedPenanggungJawab = document.getElementById("selected_penanggung_jawab");
        var selectedPenanggungJawabDisplay = document.getElementById("selected_penanggung_jawab_display");
        var regNo = "{{ $datapasien->reg_no }}"; // Assuming reg_no is available in $datapasien

        // Check if a patient has already been selected
        if (localStorage.getItem("penanggung_jawab_selected_" + regNo)) {
            var selectedValue = localStorage.getItem("penanggung_jawab_selected_" + regNo);
            selectedPenanggungJawab.innerText = selectedValue;
            selectedPenanggungJawabDisplay.innerText = selectedValue;
            penanggungJawabSelect.style.display = 'none';
            selectedPenanggungJawab.classList.remove('d-none');
            selectedPenanggungJawabDisplay.classList.remove('d-none');
        }

        penanggungJawabSelect.addEventListener("change", function() {
            var selectedText = this.options[this.selectedIndex].text;
            var confirmation = confirm("Apakah sudah benar?");
            if (confirmation) {
                localStorage.setItem("penanggung_jawab_selected_" + regNo, selectedText);
                selectedPenanggungJawab.innerText = selectedText;
                selectedPenanggungJawabDisplay.innerText = selectedText;
                penanggungJawabSelect.style.display = 'none';
                selectedPenanggungJawab.classList.remove('d-none');
                selectedPenanggungJawabDisplay.classList.remove('d-none');
            }
        });
    });
</script>
</body>

</html>