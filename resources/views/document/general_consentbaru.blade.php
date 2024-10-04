<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>General Consent</title>

    <script type="text/javascript" src="{{asset('new_assets/signature/signature.js')}}"></script>

    <style>
        body {
            padding: 15px;
            margin-left: 20px; /* Added margin from the left */
        }

        #note {
            position: absolute;
            left: 35%;
            top: 35px;
            padding: 0px;
            margin: 10px;
            cursor: default;
            transform: translateX(-45%);
        }
        .container {
            display: flex;
            justify-content: center; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div >
            <table width="793">
                <tr>
                    <td><img src="{{ asset('new_assets/images/kop.png') }}" width="100%" height="100%" /></td>
                </tr>
                <tr>
                    <td align="center"><strong><u>PE</u></strong><strong><u>RS</u></strong><strong><u>ETUJUAN UMUM ( <em>GENERAL CONSENT </em>)</u></strong></td>
                </tr>
                <tr>
                    <td>
                        <h5>A. TANGGUNG JAWAB PASIEN/KELUARGA (PATIENT&rsquo;S RESPONBILITIES)</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ol>
                            <li>Memberikan informasi yang akurat dan lengkap tentang keluhan sakit sekarang, riwayat medis {{$datapasien->PatientName ?? ''}} yang lalu, riwayat medikasi/pengobatan dan hal-hal lain yang berkaitan dengan kesehatan pasien.</li>
                            <li>Memperlakukan staf rumah sakit dan pasien lain dengan bermartabat dan hormat serta tidak melakukan tindakan yang mengganggu pekerjaan tenaga rumah sakit.</li>
                            <li>Menghormati privasi orang lain dan barang milik rumah sakit.</li>
                            <li>Tidak membawa alkohol, obat-obat yang tidak mendapat persetujuan rumah sakit, senjata/benda tajam ke dalam rumah sakit.</li>
                            <li>Tidak membawa barang berharga dan hanya membawa barang-barang yang dibutuhkan selama di rumah sakit.</li>
                            <li>Memastikan bahwa kewajiban finansial atas asuhan pasien dipenuhi sebagaimana ketentuan rumah sakit.</li>
                            <li>Bertanggung jawab atas tindakannya sendiri bila menolak pengobatan atau saran dokter.</li>
                            <li>Mengikuti rencana pengobatan yang disarankan / <em>adviskan</em> oleh dokter termasuk instruksi para perawat dan profesional kesehatan lain sesuai perintah dokter.</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>B. PELEPASAN INFORMASI (RELEASE OF INFORMATION)</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ol>
                            <li>Saya memahami informasi yang ada didalam diri saya termasuk diagnosis, hasil laboratorium dan hasil test diagnostik yang akan digunakan untuk perawatan medis, rumah sakit akan menjamin kerahasiaannya.</li>
                            <li>Saya memberi kuasa kepada setiap dan seluruh tenaga kesehatan yang merawat saya untuk memeriksa dan atau memberitahukan informasi kesehatan saya kepada pemberi kesehatan lain yang turut merawat saya selama di rumah sakit ini. </li>
                            <li>Saya memberi wewenang kepada Rumah Sakit untuk memberikan informasi tentang diagnosis hasil pelayanan dan pengobatan bila diperlukan untuk memproses klaim <strong>asuransi</strong><strong>, hukum </strong><strong>dan </strong><strong>pendidikan</strong></li>
                            <li>Saya memberi wewenang kepada rumah sakit untuk mengirimkan rekam medis ke Kementerian Kesehatan melalui <strong>platform SATU</strong><strong> </strong><strong>SEHAT.</strong><strong> </strong></li>
                            <li>Saya memberikan wewenang kepada Rumah Sakit untuk memberikan kewenangan untuk terlibat dalam pengambilan keputusan mengenai perawatan saya data dan informasi mengenai diri saya dan keadaan kesehatan saya termasuk dalam situasi tertentu misalnya keadaan kritis dll, kepada keluarga saya, bernama;</li>
                        </ol>
                    </td>
                </tr>
            </table>
            <table width="793">
                <tr>
                    <td height="5" colspan="6">&nbsp;</td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    @if (isset($pj_pasien) && (count($pj_pasien) > 0))
                    @php
                    $i = 1;
                    @endphp
        
                    @foreach ($pj_pasien as $pj)
                    <td style="text-align:center">
                        <p>
                            ({{ $i }}. {{$pj->reg_pjawab_nama}})
        
                        </p>
                    </td>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                    @else
                    <td colspan="3" style="text-align:center">
                        <p>1. .................................... 2. .................................... 3. ....................................</p>
                    </td>
                    @endif
        
                </tr>
            </table>
            <table width="793">
                <tr>
                    <td>
                        <h5>C. KEINGINAN PRIVASI (DESIRE PRIVACY) </h5>
                        <ol>
                            <li>Saya mengizinkan Rumah Sakit memberi akses bagi keluarga dan handai taulan serta orang – orang yang akan menengok / menemui saya.</li>
                            <li>Apabila ada tamu / pengunjung yang tidak saya inginkan, maka saya akan melaporkan kepada petugas jaga. </li>
                        </ol>
                        <h5>D. BARANG BERHARGA MILIK PRIBADI (WHORTY OF PERSONAL)</h5>
                        <ol>
                            <li>Saya telah memahami bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik saya dan saya secara pribadi bertanggung jawab atas barang-barang berharga yang saya miliki namun tidak terbatas pada uang, perhiasan, buku cek, kartu kredit, handphone atau barang lainnya kecuali untuk barang/harta yang saya laporkan. Dan apabila saya membutuhkan maka saya dapat menitipkan barang-barang saya kepada rumah sakit sesuai peraturan yang berlaku di rumah sakit. </li>
                            <li>Saya juga mengerti bahwa saya harus memberitahu / menitipkan pada rumah sakit jika saya memiliki gigi palsu, kacamata, lensa kontak, prosthetics atau barang lainnya yang saya butuhkan untuk diamankan.</li>
                        </ol>
                    
                        <h5>E. PERNYATAAN PASIEN (STATEMENT OF PATIENT) </h5>
                        <p>Saya mengerti dan memahami bahwa :</p>
                        <ol>
                            <li>Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan (termasuk identitas setiap orang yang memberikan atau mengamati pengobatan) setiap saat.</li>
                            <li>Saya mengerti dan memahami bahwa memiliki hak untuk menyetujui, atau menolak setiap prosedur/terapi. </li>
                            <li>Bila diperlukan untuk kelengkapan data dan informasi, saya bersedia untuk dokumentasi media visual. </li>
                            <li>Saya mengerti bahwa banyak mahasiswa yang diberikan izin untuk melaksanakan praktik kerja lapangan. </li>
                            <li>Jika ada komplain saya bersedia mengikuti alur penanganan komplain pasien di RSUD Siti Fatimah Provinsi Sumatera Selatan. </li>
                            <li>Saya telah mendapat informasi tentang "HAK DAN TANGGUNG JAWAB PASIEN" di RSUD Siti Fatimah Provinsi Sumatera Selatan melalui leaflet dan banner yang disediakan oleh petugas. </li>
                        </ol>
                        <h5>F. PERSETUJUAN UNTUK PENGOBATAN (CONSENT FOR TREATMENT)</h5>
                        <ol>
                            <li>Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka. Prosedur diagnostik dan perawatan medis termasuk tetapi tidak<u> terbatas</u> pada electrocardiograms, x-ray, tes darah, terapi fisik, dan pemberian obat.</li>
                            <li>Saya sadar bahwa praktik kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan terhadap saya. </li>
                            <li>Saya mengakui telah mendapatkan informasi bahwa pada prinsipnya setiap tindakan yang akan dilakukan terhadap diri saya yang meliputi tindakan transfusi darah, tindakan kedokteran, tindakan anastesi, hemodialisa, dan kemoterapi akan dimintakan informed consent (Pernyataan Persetujuan) kepada saya untuk saya tandatangani, dan saya sadar bahwa tindakan tersebut mengandung resiko medis. </li>
                            <li>Saya mengetahui RSUD Siti Fatimah Provinsi Sumatera Selatan merupakan Rumah Sakit Pendidikan yang menjadi tempat praktik klinik bagi mahasiswa kedokteran dan profesi kesehatan lainnya. Karena itu, mereka mungkin berpartisipasi dan atau terlibat langsung dalam perawatan saya. Terhadap itu, saya tidak keberatan dan dapat menyetujui sepanjang dilaksanakan dibawah supervisi dokter spesialis yang menjadi Dokter Penanggung Jawab Pelayanan (DPJP)</li>
                            <li>Apabila saya dilibatkan dalam penelitian klinis, maka hal tersebut hanya dapat dilakukan dengan sepengetahuan dan persetujuan saya. </li>
                            <li>Saya menyetujui apabila data rekam medis saya, spesimen (jaringan dan cairan tubuh) dipergunakan dalam pendidikan dan penelitian.</li>
                        </ol>
                
                        <h5>G. INFORMASI RAWAT INAP</h5>
                        <ol>
                            <li>Saya telah menerima informasi tentang peraturan yang diberlakukan oleh rumah sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan mematuhi jam berkunjung pasien sesuai dengan aturan di Rumah sakit.</li>
                            <li>Anggota keluarga saya yang menunggu saya, bersedia untuk selalu memakai tanda pengenal khusus yang diberikan oleh rumah sakit dan demi keamanan seluruh pasien setiap keluarga dan siapapun yang akan mengunjungi saya diluar jam berkunjung bersedia untuk diminta/diperiksa identitasnya.</li>
                        </ol>
                        <h5>H. PERMINTAAN SECOND OPINION</h5>
                        <ol>
                                <p>Pasien dapat meminta pendapat dari dokter yang lain bila menginginkan.</p>
                        </ol>
                            <h5>I. INFORMASI BIAYA</h5>
                        <ol>
                            <li> Pasien dan atau keluarganya wajib untuk membayar total biaya pembiayaan berdasarkan acuan biaya dan ketentuan dari RSUD Siti Fatimah Provinsi Sumatera Selatan. </li>
                            <li> Apabila asuransi kesehatan swasta atau program pemerintah menanggung biaya perawatan, maka tagihan dari semua pelayanan dan tindakan medis diberikan kepada pihak asuransi atau pihak penjamin. </li>
                            <li> Tanggungan asuransi pasien mungkin menyatakan bahwa sebagian pembayaran tetap menjadi tanggung jawab pribadi pasien atau tidak ditanggung oleh penjamin, maka pihak rumah sakit berwenang memberi tagihan untuk biaya yang tidak ditanggung oleh penjamin dan pasien atau keluarganya wajib untuk membayarnya.</li>
                            <li> Pasien dan atau keluarga menyadari dan memahami bahwa :</li>
                            <li>Apabila tidak memberikan persetujuan, atau dikemudian hari mencabut persetujuan yang diberikan untuk melepaskan rahasia kedokteran kepada perusahaan asuransi yang menjamin, maka pasien dan atau keluarga wajib untuk membayar semua pelayanan dan tindakan medis dari RSUD Siti Fatimah Provinsi Sumatera Selatan.</li>
                            <li>Apabila pihak rumah sakit membutuhkan proses hukum untuk menagih biaya pelayanan yang sudah diperoleh pasien, maka pasien dan atau keluarga wajib untuk membayar semua biaya yang disebabkan dari proses hukum tersebut.</li>
                        </ol>
                        <p>Demikian saya atas nama pasien {{$datapasien->PatientName ?? ''}} telah membaca serta memahami surat persetujuan umum ini dan saya bersedia memberi persetujuan kepada rumah sakit untuk memberikan informasi elektronik yg terkait, termasuk tanda tangan elektronik dan perawatan medis dan apabila saya melanggar ketentuan tersebut, maka siap menerima sanksi sesuai ketentuan yang berlaku di RSUD Siti Fatimah Provinsi Sumatera Selatan.<br>
                            <strong>PASIEN DAN ATAU KELUARGA TELAH MEMBACA DAN SEPENUHNYA SETUJU </strong>dengan setiap pernyataan yang terdapat pada formulir ini dan menandatangani tanpa paksaan dengan kesadaran penuh.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="773">
                            <tr>
                                <td colspan="6">&nbsp;</td>
                                <td width="181" rowspan="6">&nbsp;</td>
                                {{-- <td colspan="6">Palembang, {{Date('d-m-Y')}}
                    </td> --}}
                </tr>
                <tr>
                    <td colspan="6">Palembang, {{Date('d-m-Y')}}</td>
                    <td colspan="6">Pasien atau Penanggung Jawab</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:left">Petugas pemberi informasi</td>
                    <td colspan="6">(wali jika pasien &lt; 18 tahun)</td>
                </tr>
                <tr>
                    <td colspan="6">
                        @if($user_signature != null)
                            <img src="{{$user_signature}}" width="150" height="100" /><br>
                        @endif
                        ({{$user_name}})
                    </td>
                    <td colspan="6">
                        <form method="post" action="{{route('register.ranap.uploadGcdua')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="reg_no" id="reg_no" value="{{$datapasien->reg_no ?? '-'}}" />
                            <img id="anatomi" src="{{asset('new_assets/images/multi_organ/anatomi_tubuh.png')}}" width="100px" height="100px" hidden />
                            @if($datapasien->ttd_gc_hal_dua!=null)
                                <img src="{{$datapasien->ttd_gc_hal_dua}}" width="170px" height="100px"/>
                            @else
                                <div id="signature-pad">
                                    <div style="border:solid 1px teal; width:170px;height:100px;padding:3px;position:relative;">
                                        <canvas id="the_canvas" width="170px" height="100px">Your browser does not support the HTML canvas tag.</canvas>
                                        <div id="note" onmouseover="my_function();"> </div>
                                    </div>
                                    <div style="margin:10px;">
                                        <input type="hidden" id="signature" name="signature">
                                        <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                                        <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                        <div class="form-group">
                                        <label for="penanggung_jawab"></label>
                                        <select name="penanggung_jawab" id="penanggung_jawab" class="form-control d-print-none" onchange="document.getElementById('selected_penanggung_jawab').innerText = this.options[this.selectedIndex].text; this.style.display='none';">
                                            <option value="">Pilih Penanggung Jawab</option>
                                            @foreach($datapasien->penanggung_jawab_list as $penanggung_jawab)
                                                <option value="{{ $penanggung_jawab }}">( {{ $penanggung_jawab }} )</option>
                                            @endforeach
                                        </select>
                                        <span id="selected_penanggung_jawab" class="d-none d-print-block">
                                            @if(isset($datapasien->penanggung_jawab))
                                                {{ $datapasien->penanggung_jawab }}
                                            @endif
                                        </span>
                                        <span id="selected_penanggung_jawab" class="d-none d-print-block"></span>
                                    </div>
                    </td>
                </tr>
                <tr>
                    <td width="27">Tgl</td>
                    <td width="3">:</td>
                    <td width="102">{{date('d-m-Y')}}</td>
                    <td width="37">Pukul</td>
                    <td width="3">:</td>
                    <td width="85">{{date('H:i:s')}}</td>
                    {{-- <td width="19">Tgl</td>
                <td width="3">:</td>
                <td width="51">{{date('d-m-Y')}}</td>
                    <td width="42">Pukul</td>
                    <td width="3">:</td>
                    <td width="135">{{date('H:i:s')}}</td> --}}
                </tr>
            </table>
            </td>
            </tr>
            <tr>
                <td style="text-align:right"><b>RM RI 001.1/ Hal.1-1</b></td>
            </tr>
            </table>
            <div style="display: flex; align-items: center; justify-content: center; margin-top: 5px; margin-bottom: 5px;">
                {{ $qrcode }}
            </div>
            <div style="page-break-after: always"></div>
        </div>
    </div>
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

        signaturePad.drawImage(img);

        function my_function() {
            document.getElementById("note").innerHTML = "";
        }
    </script>
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        var penanggungJawabSelect = document.getElementById("penanggung_jawab");
        var selectedPenanggungJawab = document.getElementById("selected_penanggung_jawab");
        var regNo = "{{ $datapasien->reg_no }}"; // Assuming reg_no is available in $datapasien

        // Check if a patient has already been selected
        if (localStorage.getItem("penanggung_jawab_selected_" + regNo)) {
            var selectedValue = localStorage.getItem("penanggung_jawab_selected_" + regNo);
            selectedPenanggungJawab.innerText = selectedValue;
            penanggungJawabSelect.style.display = 'none';
            selectedPenanggungJawab.classList.remove('d-none');
        }

        penanggungJawabSelect.addEventListener("change", function() {
            var selectedText = this.options[this.selectedIndex].text;
            var confirmation = confirm("Apakah sudah benar?");
            if (confirmation) {
                localStorage.setItem("penanggung_jawab_selected_" + regNo, selectedText);
                selectedPenanggungJawab.innerText = selectedText;
                penanggungJawabSelect.style.display = 'none';
                selectedPenanggungJawab.classList.remove('d-none');
            }
        });
    });
</script>
</body>

</html>