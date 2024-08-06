<style>
    .checkbox {
        width: 20px;
        height: 20px;
        border: 1px solid black;
        vertical-align: middle
    }
    td{
        font-size: 10px;
    }
</style>
<body>

<h3 style="text-align:center">
    RSUD SITI FATIMAH PROVINSI SUMATERA SELATAN
</h3>
<h3 style="text-align:center">
    SURAT JAMINAN PELAYANAN (SJP)<br />
    {{--(PBI/NON PBI/JAMSOSKES)--}}
    {{$register[0]->reg_cara_bayar}}
</h3>

<table style="width: 58%;">
    <tr>
        <td style="width: 20px">1</td>
        <td style="width: 180px">NO. SEP</td>
        <td style="width:auto"></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Tanggal SJP</td>
        <td></td>
    </tr>
    <tr>
        <td>3</td>
        <td>Asal Rujukan</td>
        <td></td>
    </tr>
    <tr>
        <td>4</td>
        <td>Nama Dokter</td>
        <td></td>
    </tr>
    <tr>
        <td>5</td>
        <td>Kelas Rawat</td>
        <td>{{}}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Tanggal Masuk</td>
        <td></td>
    </tr>
    <tr>
        <td>7</td>
        <td>Tanggal Keluar</td>
        <td></td>
    </tr>
    <tr>
        <td>8</td>
        <td>Ruang Rawat ICU/ICCU</td>
        <td>
            Tanggal Masuk<br />
            Tanggal Keluar
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td>Lama Hari Rawat</td>
        <td></td>
    </tr>
    <tr>
        <td>10</td>
        <td>Rujukan Item</td>
        <td>
            <p>
                <span>1. Poli</span>
                <span style="float:right">2. IGD</span>
            </p>
        </td>
    </tr>
</table>

<table style="vertical-align:top">
    <tr>
        <td style="width: 140px">No. Medrec</td>
        <td>00-0</td>
    </tr>
    <tr>
        <td>Nama Pasien</td>
        <td></td>
    </tr>
    <tr>
        <td>No. Kartu</td>
        <td></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td></td>
    </tr>
    <tr>
        <td>Tgl Lahir/Umur</td>
        <td></td>
    </tr>
    <tr>
        <td>Operator</td>
        <td></td>
    </tr>
</table>

<table>
    <tr>
        <td></td>
        <td></td>
        <td style="text-align: center">Paraf Dokter</td>
        <td style="text-align: center">Kode ICD 10</td>
    </tr>
    <tr>
        <td style="width: 20px">11</td>
        <td style="width: 430px">Diagnosa Utama ______________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>Diagnosa Sekunder ____________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>1. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>2. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>3. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td>12</td>
        <td>Tindakan</td>
        <td style="text-align:center">Paraf Dokter</td>
        <td style="text-align:center">Kode ICD 9-CM</span></td>
    </tr>
    <tr>
        <td></td>
        <td>1. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>2. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>3. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>4. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>5. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>6. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
    <tr>
        <td></td>
        <td>7. __________________________________________</td>
        <td><span>(</span> <span style="float:right">)</span></td>
        <td><span>(</span> <span style="float:right">)</span></td>
    </tr>
</table>

<table style="margin-top:25px">
    <tr>
        <td style="width: 20px;vertical-align:top">13</td>
        <td style="width:100px;vertical-align:top">Penunjang</td>
        <td style="width: 170px;vertical-align:top">
            <span style="vertical-align: middle">1</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">LAN</span>
            <br>
            <span style="vertical-align: middle">2</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">ECHO</span>
            <br>
            <span style="vertical-align: middle">3</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">FISIOTERAPI</span>
        </td>
        <td style="width: 170px;vertical-align:top">
            <span style="vertical-align: middle">4</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">USG</span>
            <br>
            <span style="vertical-align: middle">5</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">TREADMIL</span>
            <br>
            <span style="vertical-align: middle">6</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">RADIOLOGI</span>
        </td>
        <td style="width: 170px;vertical-align:top">
            <span style="vertical-align: middle">7</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">EKG</span>
            <br>
            <span style="vertical-align: middle">8</span>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">____</span>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td style="width: 20px;vertical-align:top">14</td>
        <td style="width:150px;vertical-align:top">Keadaan Waktu Keluar</td>
    </tr>
</table>
<table>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 110px">
            <div class="checkbox"></div>
            <span style="vertical-align: middle">Sembuh</span>
        </td>
        <td style="width: 110px">
            <div class="checkbox"></div>
            <span style="vertical-align: middle">Pindah RS</span>
        </td>
        <td>
            <div class="checkbox"></div>
            <span style="vertical-align: middle">Pulang Atas Permintaan Sendiri</span>
        </td>
    </tr>
    <tr>
        <td style="width: 20px"></td>
        <td style="width: 110px">
            <div class="checkbox"></div>
            <span style="vertical-align: middle">Meninggal</span>
        </td>
        <td style="width: 110px">
            <div class="checkbox"></div>
            <span style="vertical-align: middle">Lain-Lain</span>
        </td>
    </tr>
</table>

<table style="width: 100%;margin-top:20px">
    <tr>
        <td style="text-align:center">
            Pasien / Keluarga
            <br /><br /><br />
            <br /><br /><br />
            _________________
        </td>
        <td style="text-align:center">
            Verifikator
            <br /><br /><br />
            <br /><br /><br />
            _________________
        </td>
        <td style="text-align:center">
            Palembang,<br />
            Dokter Penanggung Jawab
            <br /><br /><br />
            <br /><br />
            _________________
        </td>
    </tr>
</table>

</body>
