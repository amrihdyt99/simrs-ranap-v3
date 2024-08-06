@extends('register.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="reg_medrec"
                                           class="col-sm-2 col-form-label">MRN<code>*</code></label>
                                    <div class="col-sm-10">
                                        <select id="reg_medrec" name="reg_medrec"
                                                class="form-control {{ $errors->has('reg_medrec') ? " is-invalid" : "" }}">
                                            <option>{{ old('reg_medrec') }}</option>
                                        </select>
                                        <small class="text-danger">{{ $errors->first('reg_medrec') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="table_content">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="patient_table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>MRN</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row" id="pasien-content">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pasien</h5>

                            </div>
                            <div class="card-body">
                            {{--    <div class="form-group row">
                                    <button type="button" class="btn btn-primary" onclick="cariRMMaster()">Sinkron Data Pasien</button>
                                </div>--}}
                                {{-- <div class="form-group row">
                                     <label class="col-sm-4 col-form-label">Cari Nama Atau RM Pasien</label>
                                     <div class="col-sm-6">
                                         <input class="form-control" name="cari_rm" id="cari_rm"/>
                                     </div>
                                     <div class="col-sm-2">
                                         <button class="btn btn-primary" onclick="cariRMMaster()">Cari</button>
                                     </div>
                                 </div>--}}


                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama" name="nama" disabled/>
                                    </div>
                                    <label for="catatan_khusus" class="col-sm-2 col-form-label">Cat. Khusus</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="catatan_khusus"
                                               name="catatan_khusus" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6"></div>
                                    <label for="medrec_lama" class="col-sm-2 col-form-label">Medrec Lama</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="medrec_lama" name="medrec_lama"
                                               disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="tempat_lahir"
                                               name="tempat_lahir" disabled/>
                                    </div>
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input autocomplete="off" type="text" class="form-control"
                                               name="tanggal_lahir" id="tanggal_lahir" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                                                disabled>
                                            <option value=""></option>
                                            <option value="0001^M">Laki-laki</option>
                                            <option value="0001^F">Perempuan</option>
                                        </select>
                                    </div>
                                    <label for="gol_darah" class="col-sm-2 col-form-label">Gol. Darah</label>
                                    <div class="col-sm-2">
                                        <select id="gol_darah" name="gol_darah" class="form-control" disabled>
                                            {{--  <option value="X0009^N/A"></option>
                                              <option value="X0009^A">A</option>
                                              <option value="X0009^B">B</option>
                                              <option value="X0009^O">O</option>
                                              <option value="X0009^AB">AB</option>--}}
                                            <option value=""></option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                            <option value="AB">AB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select id="rhesus" name="rhesus" class="form-control">
                                            <option value=""></option>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-4">
                                        <select id="kategori" name="kategori" class="form-control" disabled>
                                            <option value=""></option>
                                            <option>WNI</option>
                                            <option>WNA</option>
                                        </select>
                                    </div>
                                    <label for="ssn" class="col-sm-2 col-form-label" id="labelktp">KTP</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="ssn" name="ssn" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-4">
                                        <select id="agama" name="agama" class="form-control">
                                            <option value=""></option>
                                            <option value="0006^BUD">Buddhist</option>
                                            <option value="0006^CHR">Christian</option>
                                            <option value="0006^CNF">Confucian (Kong Fu Cu)</option>
                                            <option value="0006^CTH">Catholic</option>
                                            <option value="0006^HIN">Hindu</option>
                                            <option value="0006^MOS">Muslim</option>
                                            <option value="0006^OTH">Other</option>
                                        </select>
                                    </div>
                                    <label for="kebangsaan" class="col-sm-2 col-form-label">Kebangsaan</label>
                                    <div class="col-sm-4">
                                        <select id="kebangsaan" name="kebangsaan" class="form-control">
                                            <option value=""></option>
                                            <option>Indonesia</option>
                                            <option>Amerika</option>
                                            <option value="X0014^001">Indonesian</option>
                                            <option value="X0014^002">China</option>
                                            <option value="X0014^003">England</option>
                                            <option value="X0014^004">French</option>
                                            <option value="X0014^005">Japan</option>
                                            <option value="X0014^006">Korea</option>
                                            <option value="X0014^007">Malaysia</option>
                                            <option value="X0014^008">New Zealand</option>
                                            <option value="X0014^009">Philippine</option>
                                            <option value="X0014^010">Singapore</option>
                                            <option value="X0014^011">Taiwan</option>
                                            <option value="X0014^012">Thailand</option>
                                            <option value="X0014^013">America</option>
                                            <option value="X0014^014">Other</option>
                                            <option value="X0014^015">India</option>
                                            <option value="X0014^016">Australia</option>
                                            <option value="X0014^018">HONG KONG</option>
                                            <option value="X0014^999">Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="suku" class="col-sm-2 col-form-label">Suku</label>
                                    <div class="col-sm-4">
                                        <select id="suku" name="suku" class="form-control">
                                            <option value=""></option>
                                            <option>Palembang</option>
                                            <option>Batak</option>
                                            <option value="0005^001">Aceh</option>
                                            <option value="0005^002">Batak</option>
                                            <option value="0005^003">Minang</option>
                                            <option value="0005^004">Sunda</option>
                                            <option value="0005^005">Jawa</option>
                                            <option value="0005^006">Madura</option>
                                            <option value="0005^007">Bali</option>
                                            <option value="0005^008">Sasak</option>
                                            <option value="0005^009">Timor</option>
                                            <option value="0005^010">Dayak</option>
                                            <option value="0005^011">Minahasa</option>
                                            <option value="0005^012">Toraja</option>
                                            <option value="0005^013">Makassar</option>
                                            <option value="0005^014">Bugis</option>
                                            <option value="0005^015">Chinese</option>
                                            <option value="0005^016">Ambon</option>
                                            <option value="0005^017">Palembang</option>
                                            <option value="0005^018">Bangka</option>
                                        </select>
                                    </div>
                                    <label for="status_nikah" class="col-sm-2 col-form-label">Status Nikah</label>
                                    <div class="col-sm-4">
                                        <select id="status_nikah" name="status_nikah" class="form-control" disabled>
                                            <option value=""></option>
                                            <option>Menikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-4">
                                        <select id="pekerjaan" name="pekerjaan" class="form-control">

                                            <option value="X0012^01">Karyawan Swasta</option>
                                            <option value="X0012^02">Pegawai Negeri</option>
                                            <option value="X0012^03">Other</option>
                                        </select>
                                    </div>
                                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-4">
                                        <select id="pendidikan" name="pendidikan" class="form-control">
                                            <option value=""></option>

                                            <option value="X0013^01">TK</option>
                                            <option value="X0013^02">SD</option>
                                            <option value="X0013^03">SMP</option>
                                            <option value="X0013^04">SMA</option>
                                            <option value="X0013^05">D-1</option>
                                            <option value="X0013^06">D-3</option>
                                            <option value="X0013^07">S-1</option>
                                            <option value="X0013^08">S-2</option>
                                            <option value="X0013^09">S-3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telepon_1" class="col-sm-2 col-form-label">No. Telepon 1</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="telepon_1" name="telepon_1"
                                               disabled/>
                                    </div>
                                    <label for="telepon_2" class="col-sm-2 col-form-label">No. Telepon 2</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="telepon_2" name="telepon_2"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-2 col-form-label ">Provinsi</label>
                                    <div class="col-sm-4">
                                        <select id="provinsi" name="provinsi" class="form-control select2bs4"
                                                disabled>
                                            <option value=""></option>

                                            <option value="1">ACEH</option>
                                            <option value="2">SUMATERA UTARA</option>
                                            <option value="3" >SUMATERA BARAT</option>
                                            <option value="4">RIAU</option>
                                            <option value="5">JAMBI</option>
                                            <option value="6" >SUMATERA SELATAN</option>
                                            <option value="7">BENGKULU</option>
                                            <option value="8">LAMPUNG</option>
                                            <option value="9">KEPULAUAN BANGKA BELITUNG
                                            </option>
                                            <option value="10">KEPULAUAN RIAU</option>
                                            <option value="11">DKI JAKARTA</option>
                                            <option value="12">JAWA BARAT</option>
                                            <option value="13">JAWA TENGAH</option>
                                            <option value="14">DI YOGYAKARTA</option>
                                            <option value="15">JAWA TIMUR</option>
                                            <option value="16">BANTEN</option>
                                            <option value="17">BALI</option>
                                            <option value="18">NUSA TENGGARA BARAT</option>
                                            <option value="19">NUSA TENGGARA TIMUR</option>
                                            <option value="20">KALIMANTAN BARAT</option>
                                            <option value="21" >KALIMANTAN TENGAH</option>
                                            <option value="22">KALIMANTAN SELATAN</option>
                                            <option value="23">KALIMANTAN TIMUR</option>
                                            <option value="24">KALIMANTAN UTARA</option>
                                            <option value="25">SULAWESI UTARA</option>
                                            <option value="26">SULAWESI TENGAH</option>
                                            <option value="27">SULAWESI SELATAN</option>
                                            <option value="28">SULAWESI TENGGARA</option>
                                            <option value="29">GORONTALO</option>
                                            <option value="30">SULAWESI BARAT</option>
                                            <option value="31" >MALUKU</option>
                                            <option value="32" >MALUKU UTARA</option>
                                            <option value="33" >PAPUA BARAT</option>
                                            <option value="34">PAPUA</option>
                                        </select>
                                    </div>
                                    <label for="kota" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                    <div class="col-sm-4">
                                        <select id="kota" name="kota" class="form-control select2bs4" disabled>
                                            <option value="" ></option>
                                            <option value="1">KABUPATEN SIMEULUE</option>
                                            <option value="2">KABUPATEN ACEH SINGKIL</option>
                                            <option value="3">KABUPATEN ACEH SELATAN</option>
                                            <option value="4">KABUPATEN ACEH TENGGARA</option>
                                            <option value="5">KABUPATEN ACEH TIMUR</option>
                                            <option value="6">KABUPATEN ACEH TENGAH</option>
                                            <option value="7">KABUPATEN ACEH BARAT</option>
                                            <option value="8">KABUPATEN ACEH BESAR</option>
                                            <option value="9">KABUPATEN PIDIE</option>
                                            <option value="10">KABUPATEN BIREUEN</option>
                                            <option value="11">KABUPATEN ACEH UTARA</option>
                                            <option value="12">KABUPATEN ACEH BARAT DAYA</option>
                                            <option value="13">KABUPATEN GAYO LUES</option>
                                            <option value="14">KABUPATEN ACEH TAMIANG</option>
                                            <option value="15">KABUPATEN NAGAN RAYA</option>
                                            <option value="16">KABUPATEN ACEH JAYA</option>
                                            <option value="17">KABUPATEN BENER MERIAH</option>
                                            <option value="18">KABUPATEN PIDIE JAYA</option>
                                            <option value="19">KOTA BANDA ACEH</option>
                                            <option value="20">KOTA SABANG</option>
                                            <option value="21">KOTA LANGSA</option>
                                            <option value="22">KOTA LHOKSEUMAWE</option>
                                            <option value="23">KOTA SUBULUSSALAM</option>
                                            <option value="24">KABUPATEN NIAS</option>
                                            <option value="25">KABUPATEN MANDAILING NATAL</option>
                                            <option value="26">KABUPATEN TAPANULI SELATAN</option>
                                            <option value="27">KABUPATEN TAPANULI TENGAH</option>
                                            <option value="28">KABUPATEN TAPANULI UTARA</option>
                                            <option value="29">KABUPATEN TOBA SAMOSIR</option>
                                            <option value="30">KABUPATEN LABUHAN BATU</option>
                                            <option value="31">KABUPATEN ASAHAN</option>
                                            <option value="32">KABUPATEN SIMALUNGUN</option>
                                            <option value="33">KABUPATEN DAIRI</option>
                                            <option value="34">KABUPATEN KARO</option>
                                            <option value="35">KABUPATEN DELI SERDANG</option>
                                            <option value="36">KABUPATEN LANGKAT</option>
                                            <option value="37">KABUPATEN NIAS SELATAN</option>
                                            <option value="38">KABUPATEN HUMBANG HASUNDUTAN</option>
                                            <option value="39">KABUPATEN PAKPAK BHARAT</option>
                                            <option value="40">KABUPATEN SAMOSIR</option>
                                            <option value="41">KABUPATEN SERDANG BEDAGAI</option>
                                            <option value="42">KABUPATEN BATU BARA</option>
                                            <option value="43">KABUPATEN PADANG LAWAS UTARA</option>
                                            <option value="44">KABUPATEN PADANG LAWAS</option>
                                            <option value="45">KABUPATEN LABUHAN BATU SELATAN</option>
                                            <option value="46">KABUPATEN LABUHAN BATU UTARA</option>
                                            <option value="47">KABUPATEN NIAS UTARA</option>
                                            <option value="48">KABUPATEN NIAS BARAT</option>
                                            <option value="49">KOTA SIBOLGA</option>
                                            <option value="50">KOTA TANJUNG BALAI</option>
                                            <option value="51">KOTA PEMATANG SIANTAR</option>
                                            <option value="52">KOTA TEBING TINGGI</option>
                                            <option value="53">KOTA MEDAN</option>
                                            <option value="54">KOTA BINJAI</option>
                                            <option value="55">KOTA PADANGSIDIMPUAN</option>
                                            <option value="56">KOTA GUNUNGSITOLI</option>
                                            <option value="57">KABUPATEN KEPULAUAN MENTAWAI</option>
                                            <option value="58">KABUPATEN PESISIR SELATAN</option>
                                            <option value="59">KABUPATEN SOLOK</option>
                                            <option value="60">KABUPATEN SIJUNJUNG</option>
                                            <option value="61">KABUPATEN TANAH DATAR</option>
                                            <option value="62">KABUPATEN PADANG PARIAMAN</option>
                                            <option value="63">KABUPATEN AGAM</option>
                                            <option value="64">KABUPATEN LIMA PULUH KOTA</option>
                                            <option value="65">KABUPATEN PASAMAN</option>
                                            <option value="66">KABUPATEN SOLOK SELATAN</option>
                                            <option value="67">KABUPATEN DHARMASRAYA</option>
                                            <option value="68">KABUPATEN PASAMAN BARAT</option>
                                            <option value="69">KOTA PADANG</option>
                                            <option value="70">KOTA SOLOK</option>
                                            <option value="71">KOTA SAWAH LUNTO</option>
                                            <option value="72">KOTA PADANG PANJANG</option>
                                            <option value="73">KOTA BUKITTINGGI</option>
                                            <option value="74">KOTA PAYAKUMBUH</option>
                                            <option value="75">KOTA PARIAMAN</option>
                                            <option value="76">KABUPATEN KUANTAN SINGINGI</option>
                                            <option value="77">KABUPATEN INDRAGIRI HULU</option>
                                            <option value="78">KABUPATEN INDRAGIRI HILIR</option>
                                            <option value="79">KABUPATEN PELALAWAN</option>
                                            <option value="80">KABUPATEN S I A K</option>
                                            <option value="81">KABUPATEN KAMPAR</option>
                                            <option value="82">KABUPATEN ROKAN HULU</option>
                                            <option value="83">KABUPATEN BENGKALIS</option>
                                            <option value="84">KABUPATEN ROKAN HILIR</option>
                                            <option value="85">KABUPATEN KEPULAUAN MERANTI</option>
                                            <option value="86">KOTA PEKANBARU</option>
                                            <option value="87">KOTA D U M A I</option>
                                            <option value="88">KABUPATEN KERINCI</option>
                                            <option value="89">KABUPATEN MERANGIN</option>
                                            <option value="90">KABUPATEN SAROLANGUN</option>
                                            <option value="91">KABUPATEN BATANG HARI</option>
                                            <option value="92">KABUPATEN MUARO JAMBI</option>
                                            <option value="93">KABUPATEN TANJUNG JABUNG TIMUR</option>
                                            <option value="94">KABUPATEN TANJUNG JABUNG BARAT</option>
                                            <option value="95">KABUPATEN TEBO</option>
                                            <option value="96">KABUPATEN BUNGO</option>
                                            <option value="97">KOTA JAMBI</option>
                                            <option value="98">KOTA SUNGAI PENUH</option>
                                            <option value="99">KABUPATEN OGAN KOMERING ULU</option>
                                            <option value="100">KABUPATEN OGAN KOMERING ILIR</option>
                                            <option value="101">KABUPATEN MUARA ENIM</option>
                                            <option value="102">KABUPATEN LAHAT</option>
                                            <option value="103">KABUPATEN MUSI RAWAS</option>
                                            <option value="104">KABUPATEN MUSI BANYUASIN</option>
                                            <option value="105">KABUPATEN BANYU ASIN</option>
                                            <option value="106">KABUPATEN OGAN KOMERING ULU SELATAN</option>
                                            <option value="107">KABUPATEN OGAN KOMERING ULU TIMUR</option>
                                            <option value="108">KABUPATEN OGAN ILIR</option>
                                            <option value="109">KABUPATEN EMPAT LAWANG</option>
                                            <option value="110">KABUPATEN PENUKAL ABAB LEMATANG ILIR</option>
                                            <option value="111">KABUPATEN MUSI RAWAS UTARA</option>
                                            <option value="112">KOTA PALEMBANG</option>
                                            <option value="113">KOTA PRABUMULIH</option>
                                            <option value="114">KOTA PAGAR ALAM</option>
                                            <option value="115">KOTA LUBUKLINGGAU</option>
                                            <option value="116">KABUPATEN BENGKULU SELATAN</option>
                                            <option value="117">KABUPATEN REJANG LEBONG</option>
                                            <option value="118">KABUPATEN BENGKULU UTARA</option>
                                            <option value="119">KABUPATEN KAUR</option>
                                            <option value="120">KABUPATEN SELUMA</option>
                                            <option value="121">KABUPATEN MUKOMUKO</option>
                                            <option value="122">KABUPATEN LEBONG</option>
                                            <option value="123">KABUPATEN KEPAHIANG</option>
                                            <option value="124">KABUPATEN BENGKULU TENGAH</option>
                                            <option value="125">KOTA BENGKULU</option>
                                            <option value="126">KABUPATEN LAMPUNG BARAT</option>
                                            <option value="127">KABUPATEN TANGGAMUS</option>
                                            <option value="128">KABUPATEN LAMPUNG SELATAN</option>
                                            <option value="129">KABUPATEN LAMPUNG TIMUR</option>
                                            <option value="130">KABUPATEN LAMPUNG TENGAH</option>
                                            <option value="131">KABUPATEN LAMPUNG UTARA</option>
                                            <option value="132">KABUPATEN WAY KANAN</option>
                                            <option value="133">KABUPATEN TULANGBAWANG</option>
                                            <option value="134">KABUPATEN PESAWARAN</option>
                                            <option value="135">KABUPATEN PRINGSEWU</option>
                                            <option value="136">KABUPATEN MESUJI</option>
                                            <option value="137">KABUPATEN TULANG BAWANG BARAT</option>
                                            <option value="138">KABUPATEN PESISIR BARAT</option>
                                            <option value="139">KOTA BANDAR LAMPUNG</option>
                                            <option value="140">KOTA METRO</option>
                                            <option value="141">KABUPATEN BANGKA</option>
                                            <option value="142">KABUPATEN BELITUNG</option>
                                            <option value="143">KABUPATEN BANGKA BARAT</option>
                                            <option value="144">KABUPATEN BANGKA TENGAH</option>
                                            <option value="145">KABUPATEN BANGKA SELATAN</option>
                                            <option value="146">KABUPATEN BELITUNG TIMUR</option>
                                            <option value="147">KOTA PANGKAL PINANG</option>
                                            <option value="148">KABUPATEN KARIMUN</option>
                                            <option value="149">KABUPATEN BINTAN</option>
                                            <option value="150">KABUPATEN NATUNA</option>
                                            <option value="151">KABUPATEN LINGGA</option>
                                            <option value="152">KABUPATEN KEPULAUAN ANAMBAS</option>
                                            <option value="153">KOTA B A T A M</option>
                                            <option value="154">KOTA TANJUNG PINANG</option>
                                            <option value="155">KABUPATEN KEPULAUAN SERIBU</option>
                                            <option value="156">KOTA JAKARTA SELATAN</option>
                                            <option value="157">KOTA JAKARTA TIMUR</option>
                                            <option value="158">KOTA JAKARTA PUSAT</option>
                                            <option value="159">KOTA JAKARTA BARAT</option>
                                            <option value="160">KOTA JAKARTA UTARA</option>
                                            <option value="161">KABUPATEN BOGOR</option>
                                            <option value="162">KABUPATEN SUKABUMI</option>
                                            <option value="163">KABUPATEN CIANJUR</option>
                                            <option value="164">KABUPATEN BANDUNG</option>
                                            <option value="165">KABUPATEN GARUT</option>
                                            <option value="166">KABUPATEN TASIKMALAYA</option>
                                            <option value="167">KABUPATEN CIAMIS</option>
                                            <option value="168">KABUPATEN KUNINGAN</option>
                                            <option value="169">KABUPATEN CIREBON</option>
                                            <option value="170">KABUPATEN MAJALENGKA</option>
                                            <option value="171">KABUPATEN SUMEDANG</option>
                                            <option value="172">KABUPATEN INDRAMAYU</option>
                                            <option value="173">KABUPATEN SUBANG</option>
                                            <option value="174">KABUPATEN PURWAKARTA</option>
                                            <option value="175">KABUPATEN KARAWANG</option>
                                            <option value="176">KABUPATEN BEKASI</option>
                                            <option value="177">KABUPATEN BANDUNG BARAT</option>
                                            <option value="178">KABUPATEN PANGANDARAN</option>
                                            <option value="179">KOTA BOGOR</option>
                                            <option value="180">KOTA SUKABUMI</option>
                                            <option value="181">KOTA BANDUNG</option>
                                            <option value="182">KOTA CIREBON</option>
                                            <option value="183">KOTA BEKASI</option>
                                            <option value="184">KOTA DEPOK</option>
                                            <option value="185">KOTA CIMAHI</option>
                                            <option value="186">KOTA TASIKMALAYA</option>
                                            <option value="187">KOTA BANJAR</option>
                                            <option value="188">KABUPATEN CILACAP</option>
                                            <option value="189">KABUPATEN BANYUMAS</option>
                                            <option value="190">KABUPATEN PURBALINGGA</option>
                                            <option value="191">KABUPATEN BANJARNEGARA</option>
                                            <option value="192">KABUPATEN KEBUMEN</option>
                                            <option value="193">KABUPATEN PURWOREJO</option>
                                            <option value="194">KABUPATEN WONOSOBO</option>
                                            <option value="195">KABUPATEN MAGELANG</option>
                                            <option value="196">KABUPATEN BOYOLALI</option>
                                            <option value="197">KABUPATEN KLATEN</option>
                                            <option value="198">KABUPATEN SUKOHARJO</option>
                                            <option value="199">KABUPATEN WONOGIRI</option>
                                            <option value="200">KABUPATEN KARANGANYAR</option>
                                            <option value="201">KABUPATEN SRAGEN</option>
                                            <option value="202">KABUPATEN GROBOGAN</option>
                                            <option value="203">KABUPATEN BLORA</option>
                                            <option value="204">KABUPATEN REMBANG</option>
                                            <option value="205">KABUPATEN PATI</option>
                                            <option value="206">KABUPATEN KUDUS</option>
                                            <option value="207">KABUPATEN JEPARA</option>
                                            <option value="208">KABUPATEN DEMAK</option>
                                            <option value="209">KABUPATEN SEMARANG</option>
                                            <option value="210">KABUPATEN TEMANGGUNG</option>
                                            <option value="211">KABUPATEN KENDAL</option>
                                            <option value="212">KABUPATEN BATANG</option>
                                            <option value="213">KABUPATEN PEKALONGAN</option>
                                            <option value="214">KABUPATEN PEMALANG</option>
                                            <option value="215">KABUPATEN TEGAL</option>
                                            <option value="216">KABUPATEN BREBES</option>
                                            <option value="217">KOTA MAGELANG</option>
                                            <option value="218">KOTA SURAKARTA</option>
                                            <option value="219">KOTA SALATIGA</option>
                                            <option value="220">KOTA SEMARANG</option>
                                            <option value="221">KOTA PEKALONGAN</option>
                                            <option value="222">KOTA TEGAL</option>
                                            <option value="223">KABUPATEN KULON PROGO</option>
                                            <option value="224">KABUPATEN BANTUL</option>
                                            <option value="225">KABUPATEN GUNUNG KIDUL</option>
                                            <option value="226">KABUPATEN SLEMAN</option>
                                            <option value="227">KOTA YOGYAKARTA</option>
                                            <option value="228">KABUPATEN PACITAN</option>
                                            <option value="229">KABUPATEN PONOROGO</option>
                                            <option value="230">KABUPATEN TRENGGALEK</option>
                                            <option value="231">KABUPATEN TULUNGAGUNG</option>
                                            <option value="232">KABUPATEN BLITAR</option>
                                            <option value="233">KABUPATEN KEDIRI</option>
                                            <option value="234">KABUPATEN MALANG</option>
                                            <option value="235">KABUPATEN LUMAJANG</option>
                                            <option value="236">KABUPATEN JEMBER</option>
                                            <option value="237">KABUPATEN BANYUWANGI</option>
                                            <option value="238">KABUPATEN BONDOWOSO</option>
                                            <option value="239">KABUPATEN SITUBONDO</option>
                                            <option value="240">KABUPATEN PROBOLINGGO</option>
                                            <option value="241">KABUPATEN PASURUAN</option>
                                            <option value="242">KABUPATEN SIDOARJO</option>
                                            <option value="243">KABUPATEN MOJOKERTO</option>
                                            <option value="244">KABUPATEN JOMBANG</option>
                                            <option value="245">KABUPATEN NGANJUK</option>
                                            <option value="246">KABUPATEN MADIUN</option>
                                            <option value="247">KABUPATEN MAGETAN</option>
                                            <option value="248">KABUPATEN NGAWI</option>
                                            <option value="249">KABUPATEN BOJONEGORO</option>
                                            <option value="250">KABUPATEN TUBAN</option>
                                            <option value="251">KABUPATEN LAMONGAN</option>
                                            <option value="252">KABUPATEN GRESIK</option>
                                            <option value="253">KABUPATEN BANGKALAN</option>
                                            <option value="254">KABUPATEN SAMPANG</option>
                                            <option value="255">KABUPATEN PAMEKASAN</option>
                                            <option value="256">KABUPATEN SUMENEP</option>
                                            <option value="257">KOTA KEDIRI</option>
                                            <option value="258">KOTA BLITAR</option>
                                            <option value="259">KOTA MALANG</option>
                                            <option value="260">KOTA PROBOLINGGO</option>
                                            <option value="261">KOTA PASURUAN</option>
                                            <option value="262">KOTA MOJOKERTO</option>
                                            <option value="263">KOTA MADIUN</option>
                                            <option value="264">KOTA SURABAYA</option>
                                            <option value="265">KOTA BATU</option>
                                            <option value="266">KABUPATEN PANDEGLANG</option>
                                            <option value="267">KABUPATEN LEBAK</option>
                                            <option value="268">KABUPATEN TANGERANG</option>
                                            <option value="269">KABUPATEN SERANG</option>
                                            <option value="270">KOTA TANGERANG</option>
                                            <option value="271">KOTA CILEGON</option>
                                            <option value="272">KOTA SERANG</option>
                                            <option value="273">KOTA TANGERANG SELATAN</option>
                                            <option value="274">KABUPATEN JEMBRANA</option>
                                            <option value="275">KABUPATEN TABANAN</option>
                                            <option value="276">KABUPATEN BADUNG</option>
                                            <option value="277">KABUPATEN GIANYAR</option>
                                            <option value="278">KABUPATEN KLUNGKUNG</option>
                                            <option value="279">KABUPATEN BANGLI</option>
                                            <option value="280">KABUPATEN KARANG ASEM</option>
                                            <option value="281">KABUPATEN BULELENG</option>
                                            <option value="282">KOTA DENPASAR</option>
                                            <option value="283">KABUPATEN LOMBOK BARAT</option>
                                            <option value="284">KABUPATEN LOMBOK TENGAH</option>
                                            <option value="285">KABUPATEN LOMBOK TIMUR</option>
                                            <option value="286">KABUPATEN SUMBAWA</option>
                                            <option value="287">KABUPATEN DOMPU</option>
                                            <option value="288">KABUPATEN BIMA</option>
                                            <option value="289">KABUPATEN SUMBAWA BARAT</option>
                                            <option value="290">KABUPATEN LOMBOK UTARA</option>
                                            <option value="291">KOTA MATARAM</option>
                                            <option value="292">KOTA BIMA</option>
                                            <option value="293">KABUPATEN SUMBA BARAT</option>
                                            <option value="294">KABUPATEN SUMBA TIMUR</option>
                                            <option value="295">KABUPATEN KUPANG</option>
                                            <option value="296">KABUPATEN TIMOR TENGAH SELATAN</option>
                                            <option value="297">KABUPATEN TIMOR TENGAH UTARA</option>
                                            <option value="298">KABUPATEN BELU</option>
                                            <option value="299">KABUPATEN ALOR</option>
                                            <option value="300">KABUPATEN LEMBATA</option>
                                            <option value="301">KABUPATEN FLORES TIMUR</option>
                                            <option value="302">KABUPATEN SIKKA</option>
                                            <option value="303">KABUPATEN ENDE</option>
                                            <option value="304">KABUPATEN NGADA</option>
                                            <option value="305">KABUPATEN MANGGARAI</option>
                                            <option value="306">KABUPATEN ROTE NDAO</option>
                                            <option value="307">KABUPATEN MANGGARAI BARAT</option>
                                            <option value="308">KABUPATEN SUMBA TENGAH</option>
                                            <option value="309">KABUPATEN SUMBA BARAT DAYA</option>
                                            <option value="310">KABUPATEN NAGEKEO</option>
                                            <option value="311">KABUPATEN MANGGARAI TIMUR</option>
                                            <option value="312">KABUPATEN SABU RAIJUA</option>
                                            <option value="313">KABUPATEN MALAKA</option>
                                            <option value="314">KOTA KUPANG</option>
                                            <option value="315">KABUPATEN SAMBAS</option>
                                            <option value="316">KABUPATEN BENGKAYANG</option>
                                            <option value="317">KABUPATEN LANDAK</option>
                                            <option value="318">KABUPATEN MEMPAWAH</option>
                                            <option value="319">KABUPATEN SANGGAU</option>
                                            <option value="320">KABUPATEN KETAPANG</option>
                                            <option value="321">KABUPATEN SINTANG</option>
                                            <option value="322">KABUPATEN KAPUAS HULU</option>
                                            <option value="323">KABUPATEN SEKADAU</option>
                                            <option value="324">KABUPATEN MELAWI</option>
                                            <option value="325">KABUPATEN KAYONG UTARA</option>
                                            <option value="326">KABUPATEN KUBU RAYA</option>
                                            <option value="327">KOTA PONTIANAK</option>
                                            <option value="328">KOTA SINGKAWANG</option>
                                            <option value="329">KABUPATEN KOTAWARINGIN BARAT</option>
                                            <option value="330">KABUPATEN KOTAWARINGIN TIMUR</option>
                                            <option value="331">KABUPATEN KAPUAS</option>
                                            <option value="332">KABUPATEN BARITO SELATAN</option>
                                            <option value="333">KABUPATEN BARITO UTARA</option>
                                            <option value="334">KABUPATEN SUKAMARA</option>
                                            <option value="335">KABUPATEN LAMANDAU</option>
                                            <option value="336">KABUPATEN SERUYAN</option>
                                            <option value="337">KABUPATEN KATINGAN</option>
                                            <option value="338">KABUPATEN PULANG PISAU</option>
                                            <option value="339">KABUPATEN GUNUNG MAS</option>
                                            <option value="340">KABUPATEN BARITO TIMUR</option>
                                            <option value="341">KABUPATEN MURUNG RAYA</option>
                                            <option value="342">KOTA PALANGKA RAYA</option>
                                            <option value="343">KABUPATEN TANAH LAUT</option>
                                            <option value="344">KABUPATEN KOTA BARU</option>
                                            <option value="345">KABUPATEN BANJAR</option>
                                            <option value="346">KABUPATEN BARITO KUALA</option>
                                            <option value="347">KABUPATEN TAPIN</option>
                                            <option value="348">KABUPATEN HULU SUNGAI SELATAN</option>
                                            <option value="349">KABUPATEN HULU SUNGAI TENGAH</option>
                                            <option value="350">KABUPATEN HULU SUNGAI UTARA</option>
                                            <option value="351">KABUPATEN TABALONG</option>
                                            <option value="352">KABUPATEN TANAH BUMBU</option>
                                            <option value="353">KABUPATEN BALANGAN</option>
                                            <option value="354">KOTA BANJARMASIN</option>
                                            <option value="355">KOTA BANJAR BARU</option>
                                            <option value="356">KABUPATEN PASER</option>
                                            <option value="357">KABUPATEN KUTAI BARAT</option>
                                            <option value="358">KABUPATEN KUTAI KARTANEGARA</option>
                                            <option value="359">KABUPATEN KUTAI TIMUR</option>
                                            <option value="360">KABUPATEN BERAU</option>
                                            <option value="361">KABUPATEN PENAJAM PASER UTARA</option>
                                            <option value="362">KABUPATEN MAHAKAM HULU</option>
                                            <option value="363">KOTA BALIKPAPAN</option>
                                            <option value="364">KOTA SAMARINDA</option>
                                            <option value="365">KOTA BONTANG</option>
                                            <option value="366">KABUPATEN MALINAU</option>
                                            <option value="367">KABUPATEN BULUNGAN</option>
                                            <option value="368">KABUPATEN TANA TIDUNG</option>
                                            <option value="369">KABUPATEN NUNUKAN</option>
                                            <option value="370">KOTA TARAKAN</option>
                                            <option value="371">KABUPATEN BOLAANG MONGONDOW</option>
                                            <option value="372">KABUPATEN MINAHASA</option>
                                            <option value="373">KABUPATEN KEPULAUAN SANGIHE</option>
                                            <option value="374">KABUPATEN KEPULAUAN TALAUD</option>
                                            <option value="375">KABUPATEN MINAHASA SELATAN</option>
                                            <option value="376">KABUPATEN MINAHASA UTARA</option>
                                            <option value="377">KABUPATEN BOLAANG MONGONDOW UTARA</option>
                                            <option value="378">KABUPATEN SIAU TAGULANDANG BIARO</option>
                                            <option value="379">KABUPATEN MINAHASA TENGGARA</option>
                                            <option value="380">KABUPATEN BOLAANG MONGONDOW SELATAN</option>
                                            <option value="381">KABUPATEN BOLAANG MONGONDOW TIMUR</option>
                                            <option value="382">KOTA MANADO</option>
                                            <option value="383">KOTA BITUNG</option>
                                            <option value="384">KOTA TOMOHON</option>
                                            <option value="385">KOTA KOTAMOBAGU</option>
                                            <option value="386">KABUPATEN BANGGAI KEPULAUAN</option>
                                            <option value="387">KABUPATEN BANGGAI</option>
                                            <option value="388">KABUPATEN MOROWALI</option>
                                            <option value="389">KABUPATEN POSO</option>
                                            <option value="390">KABUPATEN DONGGALA</option>
                                            <option value="391">KABUPATEN TOLI-TOLI</option>
                                            <option value="392">KABUPATEN BUOL</option>
                                            <option value="393">KABUPATEN PARIGI MOUTONG</option>
                                            <option value="394">KABUPATEN TOJO UNA-UNA</option>
                                            <option value="395">KABUPATEN SIGI</option>
                                            <option value="396">KABUPATEN BANGGAI LAUT</option>
                                            <option value="397">KABUPATEN MOROWALI UTARA</option>
                                            <option value="398">KOTA PALU</option>
                                            <option value="399">KABUPATEN KEPULAUAN SELAYAR</option>
                                            <option value="400">KABUPATEN BULUKUMBA</option>
                                            <option value="401">KABUPATEN BANTAENG</option>
                                            <option value="402">KABUPATEN JENEPONTO</option>
                                            <option value="403">KABUPATEN TAKALAR</option>
                                            <option value="404">KABUPATEN GOWA</option>
                                            <option value="405">KABUPATEN SINJAI</option>
                                            <option value="406">KABUPATEN MAROS</option>
                                            <option value="407">KABUPATEN PANGKAJENE DAN KEPULAUAN</option>
                                            <option value="408">KABUPATEN BARRU</option>
                                            <option value="409">KABUPATEN BONE</option>
                                            <option value="410">KABUPATEN SOPPENG</option>
                                            <option value="411">KABUPATEN WAJO</option>
                                            <option value="412">KABUPATEN SIDENRENG RAPPANG</option>
                                            <option value="413">KABUPATEN PINRANG</option>
                                            <option value="414">KABUPATEN ENREKANG</option>
                                            <option value="415">KABUPATEN LUWU</option>
                                            <option value="416">KABUPATEN TANA TORAJA</option>
                                            <option value="417">KABUPATEN LUWU UTARA</option>
                                            <option value="418">KABUPATEN LUWU TIMUR</option>
                                            <option value="419">KABUPATEN TORAJA UTARA</option>
                                            <option value="420">KOTA MAKASSAR</option>
                                            <option value="421">KOTA PAREPARE</option>
                                            <option value="422">KOTA PALOPO</option>
                                            <option value="423">KABUPATEN BUTON</option>
                                            <option value="424">KABUPATEN MUNA</option>
                                            <option value="425">KABUPATEN KONAWE</option>
                                            <option value="426">KABUPATEN KOLAKA</option>
                                            <option value="427">KABUPATEN KONAWE SELATAN</option>
                                            <option value="428">KABUPATEN BOMBANA</option>
                                            <option value="429">KABUPATEN WAKATOBI</option>
                                            <option value="430">KABUPATEN KOLAKA UTARA</option>
                                            <option value="431">KABUPATEN BUTON UTARA</option>
                                            <option value="432">KABUPATEN KONAWE UTARA</option>
                                            <option value="433">KABUPATEN KOLAKA TIMUR</option>
                                            <option value="434">KABUPATEN KONAWE KEPULAUAN</option>
                                            <option value="435">KABUPATEN MUNA BARAT</option>
                                            <option value="436">KABUPATEN BUTON TENGAH</option>
                                            <option value="437">KABUPATEN BUTON SELATAN</option>
                                            <option value="438">KOTA KENDARI</option>
                                            <option value="439">KOTA BAUBAU</option>
                                            <option value="440">KABUPATEN BOALEMO</option>
                                            <option value="441">KABUPATEN GORONTALO</option>
                                            <option value="442">KABUPATEN POHUWATO</option>
                                            <option value="443">KABUPATEN BONE BOLANGO</option>
                                            <option value="444">KABUPATEN GORONTALO UTARA</option>
                                            <option value="445">KOTA GORONTALO</option>
                                            <option value="446">KABUPATEN MAJENE</option>
                                            <option value="447">KABUPATEN POLEWALI MANDAR</option>
                                            <option value="448">KABUPATEN MAMASA</option>
                                            <option value="449">KABUPATEN MAMUJU</option>
                                            <option value="450">KABUPATEN MAMUJU UTARA</option>
                                            <option value="451">KABUPATEN MAMUJU TENGAH</option>
                                            <option value="452">KABUPATEN MALUKU TENGGARA BARAT</option>
                                            <option value="453">KABUPATEN MALUKU TENGGARA</option>
                                            <option value="454">KABUPATEN MALUKU TENGAH</option>
                                            <option value="455">KABUPATEN BURU</option>
                                            <option value="456">KABUPATEN KEPULAUAN ARU</option>
                                            <option value="457">KABUPATEN SERAM BAGIAN BARAT</option>
                                            <option value="458">KABUPATEN SERAM BAGIAN TIMUR</option>
                                            <option value="459">KABUPATEN MALUKU BARAT DAYA</option>
                                            <option value="460">KABUPATEN BURU SELATAN</option>
                                            <option value="461">KOTA AMBON</option>
                                            <option value="462">KOTA TUAL</option>
                                            <option value="463">KABUPATEN HALMAHERA BARAT</option>
                                            <option value="464">KABUPATEN HALMAHERA TENGAH</option>
                                            <option value="465">KABUPATEN KEPULAUAN SULA</option>
                                            <option value="466">KABUPATEN HALMAHERA SELATAN</option>
                                            <option value="467">KABUPATEN HALMAHERA UTARA</option>
                                            <option value="468">KABUPATEN HALMAHERA TIMUR</option>
                                            <option value="469">KABUPATEN PULAU MOROTAI</option>
                                            <option value="470">KABUPATEN PULAU TALIABU</option>
                                            <option value="471">KOTA TERNATE</option>
                                            <option value="472">KOTA TIDORE KEPULAUAN</option>
                                            <option value="473">KABUPATEN FAKFAK</option>
                                            <option value="474">KABUPATEN KAIMANA</option>
                                            <option value="475">KABUPATEN TELUK WONDAMA</option>
                                            <option value="476">KABUPATEN TELUK BINTUNI</option>
                                            <option value="477">KABUPATEN MANOKWARI</option>
                                            <option value="478">KABUPATEN SORONG SELATAN</option>
                                            <option value="479">KABUPATEN SORONG</option>
                                            <option value="480">KABUPATEN RAJA AMPAT</option>
                                            <option value="481">KABUPATEN TAMBRAUW</option>
                                            <option value="482">KABUPATEN MAYBRAT</option>
                                            <option value="483">KABUPATEN MANOKWARI SELATAN</option>
                                            <option value="484">KABUPATEN PEGUNUNGAN ARFAK</option>
                                            <option value="485">KOTA SORONG</option>
                                            <option value="486">KABUPATEN MERAUKE</option>
                                            <option value="487">KABUPATEN JAYAWIJAYA</option>
                                            <option value="488">KABUPATEN JAYAPURA</option>
                                            <option value="489">KABUPATEN NABIRE</option>
                                            <option value="490">KABUPATEN KEPULAUAN YAPEN</option>
                                            <option value="491">KABUPATEN BIAK NUMFOR</option>
                                            <option value="492">KABUPATEN PANIAI</option>
                                            <option value="493">KABUPATEN PUNCAK JAYA</option>
                                            <option value="494">KABUPATEN MIMIKA</option>
                                            <option value="495">KABUPATEN BOVEN DIGOEL</option>
                                            <option value="496">KABUPATEN MAPPI</option>
                                            <option value="497">KABUPATEN ASMAT</option>
                                            <option value="498">KABUPATEN YAHUKIMO</option>
                                            <option value="499">KABUPATEN PEGUNUNGAN BINTANG</option>
                                            <option value="500">KABUPATEN TOLIKARA</option>
                                            <option value="501">KABUPATEN SARMI</option>
                                            <option value="502">KABUPATEN KEEROM</option>
                                            <option value="503">KABUPATEN WAROPEN</option>
                                            <option value="504">KABUPATEN SUPIORI</option>
                                            <option value="505">KABUPATEN MAMBERAMO RAYA</option>
                                            <option value="506">KABUPATEN NDUGA</option>
                                            <option value="507">KABUPATEN LANNY JAYA</option>
                                            <option value="508">KABUPATEN MAMBERAMO TENGAH</option>
                                            <option value="509">KABUPATEN YALIMO</option>
                                            <option value="510">KABUPATEN PUNCAK</option>
                                            <option value="511">KABUPATEN DOGIYAI</option>
                                            <option value="512">KABUPATEN INTAN JAYA</option>
                                            <option value="513">KABUPATEN DEIYAI</option>
                                            <option value="514">KOTA JAYAPURA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="alamat" id="alamat"
                                                      disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button class="btn btn-primary" onclick="simpanPasien()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" id="register-content">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="card-title">Rawat Inap</h5>
                                <button type="submit" class="btn btn-success btn-sm ml-auto">Submit</button>
                            </div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="reg_ruangan"
                                           class="col-sm-2 col-form-label">Ruangan<code>*</code></label>
                                    <div class="col-sm-4">
                                        <select id="reg_ruangan" name="reg_ruangan"
                                                class="form-control {{ $errors->has('reg_ruangan') ? " is-invalid" : "" }}">
                                            <option value="">-</option>
                                            @foreach ($ruangan_baru as $row)
                                                <option
                                                    value={{ $row->id }} {{ $row->id == old("id") ? "selected" : ""}}>{{ $row->nama_ruangan }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('reg_ruangan') }}</small>
                                    </div>

                                    <label for="room_class"
                                           class="col-sm-2 col-form-label">Class Room<code>*</code></label>
                                    <div class="col-sm-4">
                                        <select id="room_class" name="room_class"
                                                class="form-control select2bs4 {{ $errors->has('room_class') ? " is-invalid" : "" }}">
                                            <option value="">-</option>
                                            @foreach ($kelas_baru as $row)
                                                <option
                                                    value={{ $row->id }} {{ $row->id == old("room_class") ? "selected" : ""}}>
                                                    {{ $row->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('room_class') }}</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reg_tarif_kamar"
                                           class="col-sm-2 col-form-label">Tarif
                                        Ruangan<code>(Perhari)</code></label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" id="tarif_ruangan"
                                               name="tarif_ruangan" readonly/>
                                    </div>

                                    <div class="col-sm-4">
                                        <a onclick="cekruangan()">
                                            <label for="room_class"
                                                   class="col-sm-2 col-form-label">
                                                Bed<code>*</code></label></a>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="reg_dokter"
                                           class="col-sm-2 col-form-label">Dokter<code>*</code></label>
                                    <div class="col-sm-4">
                                        <select id="reg_dokter" name="reg_dokter"
                                                class="form-control select2bs4 {{ $errors->has('reg_dokter') ? " is-invalid" : "" }}">
                                            <option value="">-</option>
                                            @foreach ($physician as $row)
                                                <option
                                                    value="{{ $row->ParamedicCode }}" {{ $row->ParamedicCode == old("reg_dokter") ? "selected" : ""}}>
                                                    {{ $row->ParamedicName }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('reg_dokter') }}</small>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="departemen_asal" class="col-sm-2 col-form-label">Asal Pasien<code>*</code></label>
                                    <div class="col-sm-4">
                                        <select id="departemen_asal" name="departemen_asal"
                                                class="form-control select2bs4 {{ $errors->has('departemen_asal') ? " is-invalid" : "" }}">
                                            <option
                                                value="Directly To The Inpatient" {{ "Directly To The Inpatient"==old("departemen_asal") ? "selected" : "" }}>
                                                Directly To The Inpatient
                                            </option>
                                            <option
                                                value="From Emergency" {{ "From Emergency"==old("departemen_asal") ? "selected" : "" }}>
                                                IGD
                                            </option>
                                            <option
                                                value="From Outpatient" {{ "From Outpatient"==old("departemen_asal") ? "selected" : "" }}>
                                                Rawat Jalan
                                            </option>
                                        </select>
                                        <small class="text-danger">{{ $errors->first('departemen_asal') }}</small>
                                    </div>
                                    <label for="link_regis" class="col-sm-2 col-form-label">Link
                                        Registration</label>
                                    <div class="col-sm-4">
                                        <select id="link_regis" name="link_regis" class="form-control select2bs4">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <label for="reg_cara_bayar" class="col-sm-2 col-form-label">Cara
                                        Bayar<code>*</code></label>
                                    <div class="col-sm-4">
                                        <select id="reg_cara_bayar" name="reg_cara_bayar"
                                                class="form-control {{ $errors->has('reg_cara_bayar') ? " is-invalid" : "" }}">
                                            {{--<option
                                                value="Personal" {{ "Personal"==old("reg_cara_bayar") ? "selected" : "" }}>
                                                Personal
                                            </option>
                                            <option
                                                value="BPJS" {{ "BPJS"==old("reg_cara_bayar") ? "selected" : "" }}>
                                                BPJS
                                            </option>
                                            <option
                                                value="Admedika" {{ "Admedika"==old("reg_cara_bayar") ? "selected" : "" }}>
                                                Admedika
                                            </option>--}}
                                        </select>
                                        <small class="text-danger">{{ $errors->first('reg_cara_bayar') }}</small>
                                    </div>
                                    <label for="reg_referal" class="col-sm-2 col-form-label">No. Referal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_referal"
                                               name="reg_referal"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_no_dokumen" class="col-sm-2 col-form-label">No. Dokumen</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_no_dokumen"
                                               name="reg_no_dokumen"/>
                                    </div>
                                    <label for="reg_diagnosis" class="col-sm-2 col-form-label">Dianogsis
                                        Utama</label>
                                    <div class="col-sm-4">
                                        <select id="reg_diagnosis" name="reg_diagnosis"
                                                class="form-control select2bs4">
                                            <option value="">-</option>
                                            @foreach ($icd10 as $item)
                                                <option value="{{ $item->ID_ICD10 }}">{{ $item->NM_ICD10 }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_class" class="col-sm-2 col-form-label">Cover Class</label>
                                    <div class="col-sm-4">
                                        <select id="reg_class" name="reg_class" class="form-control select2bs4">
                                            <option value="">-</option>
                                            @foreach ($cover_class as $row)
                                                <option value={{ $row->ClassCategoryCode }}>
                                                    {{ $row->ClassCategoryName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="reg_corp" class="col-sm-2 col-form-label">Reference
                                        Corporate</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="reg_corp" name="reg_corp" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_no_kartu" class="col-sm-2 col-form-label">No. Kartu</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_no_kartu"
                                               name="reg_no_kartu"/>
                                    </div>
                                    <label for="reg_pjawab" class="col-sm-2 col-form-label">Penanggungjawab
                                        Pembayaran</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_pjawab" name="reg_pjawab"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_pjawab_hub" class="col-sm-2 col-form-label">Hubungan Dengan
                                        Pasien</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_hub_pasien"
                                               name="reg_hub_pasien"/>
                                    </div>
                                    <label for="reg_pjawab_alamat" class="col-sm-2 col-form-label">Alamat Lengkap
                                        Penanggung Jawab</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_pjawab_alamat"
                                               name="reg_pjawab_alamat"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_pjawab_nohp" class="col-sm-2 col-form-label">Nomor
                                        Telepon/Hp</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_pjawab_nohp"
                                               name="reg_pjawab_nohp"/>
                                    </div>

                                    <label for="reg_nik_penanggung_jawab" class="col-sm-2 col-form-label">NIK Penanggung Jawab</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="reg_pjawab_nik"
                                               name="reg_pjawab_nik"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_ketersidaan_kamar" class="col-sm-2 col-form-label">Informasi
                                        Ketersiadaan Kamar</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="reg_ketersidaan_kamar"
                                                name="reg_ketersidaan_kamar">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <label for="reg_info_hak_kewajiban" class="col-sm-2 col-form-label">Informasi
                                        Hak Dan Kewajiban</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="reg_info_hak_kewajiban"
                                                name="reg_info_hak_kewajiban">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_info_general_consent" class="col-sm-2 col-form-label">Informasi
                                        General Consent</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="reg_info_general_consent"
                                                name="reg_info_general_consent">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <label for="reg_info_carabayar" class="col-sm-2 col-form-label">Informasi Cara
                                        Bayar dan perlengkapan / persyaratan</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="reg_info_carabayar"
                                                name="reg_info_carabayar">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reg_cttn_kunj" class="col-sm-2 col-form-label">Catatan
                                        Kunjungan</label>
                                    <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn_kunj"
                                                      id="reg_cttn_kunj"></textarea>
                                    </div>
                                    <label for="reg_cttn" class="col-sm-2 col-form-label">Catatan Pasien</label>
                                    <div class="col-sm-4">
                                            <textarea class="form-control" rows="3" name="reg_cttn"
                                                      id="reg_cttn"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="ruangan-modal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Header Modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Data Ruangan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Body Modal -->
                        <div class="modal-body">
                            <!-- Tabel -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Bed</th>
                                    <th>Nama Paviliun</th>
                                    <th>Ruangan</th>
                                    <th>Class</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody id="body-ketersediaan">

                                </tbody>
                            </table>
                        </div>

                        <!-- Footer Modal -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')

    <script>
        $(function() {
            $('#patient_table').DataTable({
                serverSide: true,
                searching:true,
                ajax: {
                    "url": "http://rsud.sumselprov.go.id/master-simrs/api/pasien/data",
                    "type": "POST",
                    "headers": {
                        "x-username" : "rsud_fatimah",
                        "x-password" : "RsUdF4T!mah"
                    },
                    "dataSrc": function(data) {
                       // console.log(data.metadata.data.data);
                        return data.metadata.data.data;
                    },



                },
                columns: [
                    { "data": "id" },
                    { "data": "MedicalNo" },
                    { "data": "PatientName" },
                    { "data": "CityOfBirth" },
                    { "data": "DateOfBirth" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Create the Edit button with a data-id attribute for the row ID
                            return '<button class="edit-button" data-id="' + row.id + '">Edit</button>';
                        }
                    }
                ],
                "columnDefs": [
                    { "orderable": false, "targets": [0,5] }
                ],
                pagingType: 'full_numbers',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                pageLength: 10,
                dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    titleAttr: 'Export to Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    titleAttr: 'Export to PDF',
                    className: 'btn btn-danger',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Print',
                    titleAttr: 'Print Table',
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'colvis',
                    text: '<i class="fas fa-eye"></i> Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'btn btn-primary',
                    exportOptions: {
                        columns: ':visible'
                    }
                }],
                responsive: true,

                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                },

            });
        });
    </script>

    <script>
        //first load document
        $(document).ready(function(){
            $('#table_content').hide()
            $('#register-content').hide()
        })
    </script>
    <script>
        $(async function () {
            const dataPayer=[{"payer_name": "Personal"},{"payer_name": "Corporate"},{"payer_name": "Employee"},{"payer_name": "Insurance"},{"payer_name": "Asuransi Pemerintah"},{"payer_name": "Asuransi Swasta"}];

            //get master data
            // $.ajax({
            //     url: "http://rsud.sumselprov.go.id/simrs-rajal/api/master",
            //     success: function (result) {
            //         //console.log(result['master_data']['education'])
            //         var dataEducation = result['master_data']['education']
            //         var dataNationality = result['master_data']['nationality']
            //         var dataReligion = result['master_data']['religion']
            //         var dataRace = result['master_data']['race']
            //         var dataMarital = result['master_data']['marital']
            //         var dataOcupation = result['master_data']['occupation']
            //         var dataPayer = result['master_data']['payer']
            //         var dataCorPorate = result['master_data']['payer_corporate']
            //         var dataProvince = result['master_data']['province']
            //         var dataCity = result['master_data']['city']
            //         var dataDistrict = result['master_data']['district']
            //
            //         for (var i = 0; i < dataEducation.length; i++) {
            //             $("#pendidikan")
            //                 .append($("<option></option>")
            //                     .attr("value", dataEducation[i].EducationCode)
            //                     .text(dataEducation[i].EducationName));
            //         }
            //
            //         for (var i = 0; i < dataNationality.length; i++) {
            //             $("#kebangsaan")
            //                 .append($("<option></option>")
            //                     .attr("value", dataNationality[i].NationalityCode)
            //                     .text(dataNationality[i].NationalityName));
            //         }
            //         dataReligion.forEach(function (item) {
            //             $("#agama")
            //                 .append($("<option></option>")
            //                     .attr("value", item.ReligionCode)
            //                     .text(item.ReligionName));
            //         })
            //
            //         dataRace.forEach(function (item) {
            //             $("#suku")
            //                 .append($("<option></option>")
            //                     .attr("value", item.RaceCode)
            //                     .text(item.RaceName));
            //         })
            //         dataMarital.forEach(function (item) {
            //             $("#status_nikah")
            //                 .append($("<option></option>")
            //                     .attr("value", item.MaritalStatusCode)
            //                     .text(item.MaritalStatusName));
            //         })
            //
            //         dataOcupation.forEach(function (item) {
            //             $("#pekerjaan")
            //                 .append($("<option></option>")
            //                     .attr("value", item.OccupationCode)
            //                     .text(item.OccupationName));
            //         })
            //

            dataPayer.forEach(function (item) {
                $("#reg_cara_bayar")
                    .append($("<option></option>")
                        .attr("value", item.payer_name)
                        .text(item.payer_name));
            })
            //
            //         dataProvince.forEach(function (item) {
            //             $("#provinsi")
            //                 .append($("<option></option>")
            //                     .attr("value", item.id)
            //                     .text(item.provinsi));
            //
            //         })
            //
            //         dataCity.forEach(function (item) {
            //             $("#kota")
            //                 .append($("<option></option>")
            //                     .attr("value", item.id)
            //                     .text(item.kota));
            //
            //         })
            //     }
            // })

            $('#nama').prop('disabled', false);
            $('#tempat_lahir').prop('disabled', false);
            $('#tanggal_lahir').prop('disabled', false);
            $('#jenis_kelamin').prop('disabled', false);
            $('#kategori').prop('disabled', false);
            $('#gol_darah').prop('disabled', false);
            $('#ssn').prop('disabled', false);
            $('#agama').prop('disabled', false);
            $('#kebangsaan').prop('disabled', false);
            $('#suku').prop('disabled', false);
            $('#status_nikah').prop('disabled', false);
            $('#pekerjaan').prop('disabled', false);
            $('#pendidikan').prop('disabled', false);
            $('#telepon_1').prop('disabled', false);
            $('#provinsi').prop('disabled', false);
            $('#kota').prop('disabled', false);
            $('#alamat').prop('disabled', false);
            // $("#tanggal_lahir").datepicker()

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4",
            });

            $("#reg_diagnosis").select2({
                theme: "bootstrap4",
                placeholder: "Cari Diagnosis",
                ajax: {
                    delay: 500,
                    url: "{{ url('api/get-icd10') }}",
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map((d) => {
                                d.id = d.ID_ICD10
                                d.text = d.NM_ICD10
                                return d
                            })
                        }
                    }
                },
                templateResult: function (data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `(${data.ID_ICD10}) ${data.NM_ICD10}`
                },
                templateSelection: function (data) {
                    return data.text
                }
            });

            $("#reg_medrec").select2({
                theme: "bootstrap4",
                placeholder: "Cari MRN",
                ajax: {
                    delay: 500,
                    //url: "{{ url('api/get-pasien') }}",
                    type:"POST",
                    url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/detail",
                    headers: {
                        "x-username" : "rsud_fatimah",
                        "x-password" : "RsUdF4T!mah"
                    },

                    data: function (params) {

                        return {
                            filter: params.term
                        };
                    },
                    processResults: function (data) {
                        console.log(data)
                        return {
                            results: data.metadata.data.map((d) => {
                                d.id = d.MedicalNo
                                d.text = d.MedicalNo
                                return d
                            })
                        }
                    },
                    // success:function(r){
                    //     console.log("{{ old('medrec') }}")
                    //     console.log(r)
                    //     $("#medrec").val("{{ old('medrec') }}").trigger('change')
                    // }
                },
                templateResult: function (data) {
                    if (data.loading) {
                        return data.text;
                    }
                    return `${data.MedicalNo} ${data.PatientName}`
                },
                templateSelection: function (data) {
                    setDetailPasien(data)
                    return data.text
                }
            });

            @if(old('reg_medrec'))
            $.ajax({
                url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
                success: function (result) {
                    setDetailPasien(result[0])
                }
            })
            @endif


            function setDetailPasien(data) {
                $("#nama").val(data.PatientName)
                $("#catatan_khusus").val(data.Notes)
                $("#medrec_lama").val(data.OldMedicalNo)
                $("#tempat_lahir").val(data.CityOfBirth)
                $("#tanggal_lahir").val(data.DateOfBirth ? moment(data.DateOfBirth).format("YYYY-MM-DD") : "")
                $("#jenis_kelamin").val(data.GCSex)
                $("#gol_darah").val(data.GCBloodType)
                $("#rhesus").val(data.BloodRhesus)
                $("#kategori").val(data.Nationality)
                $("#ssn").val(data.SSN)
                $("#agama").val(data.GCReligion)
                $("#kebangsaan").val(data.GCReligion)
                $("#suku").val(data.GCReligion)
                $("#status_nikah").val(data.GCReligion)
                $("#pekerjaan").val(data.GCReligion)
                $("#pendidikan").val(data.GCReligion)
                $("#telepon_1").val(data.MobilePhoneNo1)
                $("#telepon_2").val(data.MobilePhoneNo2)
                $("#provinsi").val(data.MobilePhoneNo2)
                $("#kota").val(data.MobilePhoneNo2)
                $("#alamat").val(data.MobilePhoneNo2)
            }

            // $("#bed").on('change', function () {
            //     const bed = $(this).find("option:selected").data('bed')
            //     if (bed) {
            //         console.log(bed)
            //         $("#service_unit").val(bed.service_unit_id).trigger('change')
            //         $("#reg_ruangan").val(bed.room_id).trigger('change')
            //         $("#room_class").val(bed.class_code).trigger('change')
            //     } else {
            //         $("#service_unit").val("").trigger('change')
            //         $("#reg_ruangan").val("").trigger('change')
            //         $("#room_class").val("").trigger('change')
            //     }
            // })

            $("#room_class").on('change', function () {
                var tarif_ruangan = document.getElementById('tarif_ruangan')
                console.log(tarif_ruangan)
                $.ajax({
                    url: "{{route('cek.tarif.ruangan.baru')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "idruangan": $(this).val()
                    },
                    success: function (r) {
                        console.log(r.data.kelas_baru[0]['tarif_kelas'])
                        tarif_ruangan.value = r.data.kelas_baru[0]['tarif_kelas']
                    }
                })
                //tarif_ruangan.value=$(this).find("option:selected").data('room_class')
            })

            $("#departemen_asal").on('change',function () {
                //get value departemen asal
                var departemen_asal = document.getElementById('departemen_asal')
                var departemen_asal_value = departemen_asal.value
                var reg_medrec = document.getElementById('reg_medrec')
                var reg_medrec_value = reg_medrec.value

                if(departemen_asal_value=='From Outpatient'){
                    $.ajax({
                        url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/"+reg_medrec_value,
                        type: "GET",
                        success: function (r) {
                            console.log(r)
                            //check r is empty or not
                            var link_regis = document.getElementById('link_regis')
                            link_regis.innerHTML = ''
                            var option = document.createElement('option')
                            option.value = r.ranap_reg;
                            option.innerHTML = r.ranap_reg;
                            link_regis.appendChild(option)

                        }
                    })
                }
            })

        })

        $('#ckBaru').click(function () {
            if (this.checked) {
                $('#nama').prop('disabled', false);
                $('#tempat_lahir').prop('disabled', false);
                $('#tanggal_lahir').prop('disabled', false);
                $('#jenis_kelamin').prop('disabled', false);
                $('#kategori').prop('disabled', false);
                $('#gol_darah').prop('disabled', false);
                $('#ssn').prop('disabled', false);
                $('#agama').prop('disabled', false);
                $('#kebangsaan').prop('disabled', false);
                $('#suku').prop('disabled', false);
                $('#status_nikah').prop('disabled', false);
                $('#pekerjaan').prop('disabled', false);
                $('#pendidikan').prop('disabled', false);
                $('#telepon_1').prop('disabled', false);
                $('#provinsi').prop('disabled', false);
                $('#kota').prop('disabled', false);
                $('#alamat').prop('disabled', false);// If checked enable item
            } else {
                $('#nama').prop('disabled', true);
                $('#tempat_lahir').prop('disabled', true);
                $('#tanggal_lahir').prop('disabled', true);
                $('#jenis_kelamin').prop('disabled', true);
                $('#kategori').prop('disabled', true);
                $('#gol_darah').prop('disabled', true);
                $('#ssn').prop('disabled', true);
                $('#agama').prop('disabled', true);
                $('#kebangsaan').prop('disabled', true);
                $('#suku').prop('disabled', true);
                $('#status_nikah').prop('disabled', true);
                $('#pekerjaan').prop('disabled', true);
                $('#pendidikan').prop('disabled', true);
                $('#telepon_1').prop('disabled', true);
                $('#provinsi').prop('disabled', true);
                $('#kota').prop('disabled', true);
                $('#alamat').prop('disabled', true);// If checked disable item
            }
        });
    </script>

    <script>
        function simpanPasien(){
            $.ajax({
                url: "{{route('store.pasien')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "reg_medrec": $('#reg_medrec').val(),
                    "nama": $('#nama').val(),
                    "tempat_lahir": $('#tempat_lahir').val(),
                    "tanggal_lahir": $('#tanggal_lahir').val(),
                    "jenis_kelamin": $('#jenis_kelamin').val(),
                    "kategori": $('#kategori').val(),
                    "gol_darah": $('#gol_darah').val(),
                    "ssn": $('#ssn').val(),
                    "agama": $('#agama').val(),
                    "kebangsaan": $('#kebangsaan').val(),
                    "suku": $('#suku').val(),
                    "status_nikah": $('#status_nikah').val(),
                    "pekerjaan": $('#pekerjaan').val(),
                    "pendidikan": $('#pendidikan').val(),
                    "telepon_1": $('#telepon_1').val(),
                    "provinsi": $('#provinsi').val(),
                    "kota": $('#kota').val(),
                    "alamat": $('#alamat').val(),
                },
                success: function (r) {
                    console.log(r)
                    if(r.success==true){
                        $('#register-content').show()
                        $('#pasien-content').hide()
                    }else{
                        alert('Terjadi kesalahan harap coba lagi')
                    }
                }
            })
        }
    </script>

    <script>
        function cekruangan(){
            //load ruangan from api
            $.ajax( {
                url: "{{route('ketersediaan.ruangan')}}",
                type: "GET",
                success: function (r) {
                    console.log(r)
                    //append to row table in modal ketersediaan ruangan
                    var tbody = document.getElementById('body-ketersediaan')
                    tbody.innerHTML = ''
                    for(var i=0;i<r.data.length;i++) {
                        var tr = document.createElement('tr')
                        var td1 = document.createElement('td')
                        td1.innerHTML = r.data[i].nomor_bed
                        tr.appendChild(td1)
                        var td2 = document.createElement('td')
                        td2.innerHTML = r.data[i].nama_pavilun
                        tr.appendChild(td2)
                        var td3 = document.createElement('td')
                        td3.innerHTML = r.data[i].nama_ruangan
                        tr.appendChild(td3)
                        var td5=document.createElement('td')
                        td5.innerHTML=r.data[i].nama_kelas
                        tr.appendChild(td5)
                        var td6=document.createElement('td')
                        if(r.data[i].status_ketersediaan==1){
                            td6.innerHTML="ready"
                        }else if(r.data[i].status_ketersediaan==2){
                            td6.innerHTML="Dipakai"
                        }else if(r.data[i].status_ketersediaan==3){
                            td6.innerHTML="Cleaning"
                        }
                        tr.appendChild(td6)

                        /* var td7=document.createElement('td')
                         if(r.data[i].is_temporary==0){
                             td7.innerHTML="Bukan Temporary"
                         }else{
                             td7.innerHTML="Temporary"
                         }

                         tr.appendChild(td7)*/
                        var td4 = document.createElement('td')
                        var buttonpilih= document.createElement('button')
                        buttonpilih.setAttribute('class','btn btn-primary')
                        buttonpilih.setAttribute('onclick','pilihRuangan('+r.data[i].id_paviliun+','+r.data[i].id+')')
                        buttonpilih.innerHTML = 'Pilih'
                        td4.appendChild(buttonpilih)
                        tr.appendChild(td4)
                        tbody.appendChild(tr)
                    }

                    //show modal ruangan-modal
                    $('#ruangan-modal').modal('show')
                }
            })


        }

        function pilihRuangan(id_paviliun,id_ruangan){
            // set select option ruangan
            $('#reg_ruangan').val(id_paviliun)
            var fieldIdKetersediaan=document.getElementById('id_ketersediaan')
            fieldIdKetersediaan.value = id_ruangan
            $('#ruangan-modal').modal('hide')

        }
    </script>
@endpush
