<h4><b>SKRINING GIZI DEWASA: (Berdasarkan Malnutrisi Screening Test)</b></h4>
<table class="table1 w-100" id="skrining_gizi_table_dewasa">
    <thead>
        <tr>
            <th>No</th>
            <th>Parameter</th>
            <th style="width: 10px;"></th>
            <th>Skor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="9">1</td>
            <td rowspan="9">Apakah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak diinginkan dalam 6 bulan terakhir?</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(0)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_tidak" name="gizi[penurunan_bb]" value="0" {{ $gizi->penurunan_bb == 0 ? 'checked' : '' }}>
                <label for="penurunan_bb_tidak">a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(2)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_tidak_yakin" name="gizi[penurunan_bb]" value="2" {{ $gizi->penurunan_bb == 2 ? 'checked' : '' }}>
                <label for="penurunan_bb_tidak_yakin">b. Tidak Yakin</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;"></td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_ya" name="gizi[penurunan_bb]" value="0" {{ $gizi->penurunan_bb == 0 && $gizi->penurunan_bb_jumlah != null ? 'checked' : '' }}>
                <label for="penurunan_bb_ya">c. Ya, penurunannya sebanyak:</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(1)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_1_6kg" name="gizi[penurunan_bb_jumlah]" value="1" {{ $gizi->penurunan_bb_jumlah == 1 ? 'checked' : '' }}>
                <label for="penurunan_bb_1_6kg">1 – 6 kg</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(2)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_6_10kg" name="gizi[penurunan_bb_jumlah]" value="2" {{ $gizi->penurunan_bb_jumlah == 2 ? 'checked' : '' }}>
                <label for="penurunan_bb_6_10kg">6 – 10 kg</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(3)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_11_15kg" name="gizi[penurunan_bb_jumlah]" value="3" {{ $gizi->penurunan_bb_jumlah == 3 ? 'checked' : '' }}>
                <label for="penurunan_bb_11_15kg">11 – 15 kg</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(4)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_15kg" name="gizi[penurunan_bb_jumlah]" value="4" {{ $gizi->penurunan_bb_jumlah == 4 ? 'checked' : '' }}>
                <label for="penurunan_bb_15kg">15 kg</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(2)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="penurunan_bb_tidak_tahu" name="gizi[penurunan_bb_jumlah]" value="2" {{ $gizi->penurunan_bb_jumlah == 2 && $gizi->penurunan_bb == 0 ? 'checked' : '' }}>
                <label for="penurunan_bb_tidak_tahu">Tidak tahu berapa kg penurunannya</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">2</td>
            <td rowspan="4">Apakah asupan makan pasien berkurang karena penurunan nafsu makan / kesulitan menerima makanan?</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(0)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="asupan_makan_tidak" name="gizi[asupan_makan]" value="0" {{ $gizi->asupan_makan == 0 ? 'checked' : '' }}>
                <label for="asupan_makan_tidak">a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(1)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="asupan_makan_ya" name="gizi[asupan_makan]" value="1" {{ $gizi->asupan_makan == 1 ? 'checked' : '' }}>
                <label for="asupan_makan_ya">b. Ya</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(2)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="asupan_makan_tidak_yakin" name="gizi[asupan_makan]" value="2" {{ $gizi->asupan_makan == 2 ? 'checked' : '' }}>
                <label for="asupan_makan_tidak_yakin">c. Tidak yakin</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">3</td>
            <td rowspan="3">Cek Apakah pasien memiliki diagnosis khusus seperti DM, Geriatri, pasien imunitas menurun dan lain lain</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(0)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="diagnosis_khusus_tidak" name="gizi[diagnosis_khusus]" value="0" {{ $gizi->diagnosis_khusus == 0 ? 'checked' : '' }}>
                <label for="diagnosis_khusus_tidak">a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">(1)</td>
            <td style="vertical-align: top;">
                <input type="radio" id="diagnosis_khusus_ya" name="gizi[diagnosis_khusus]" value="1" {{ $gizi->diagnosis_khusus == 1 ? 'checked' : '' }}>
                <label for="diagnosis_khusus_ya">b. Ya</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: right;">Total Skor</td>
            <td colspan="2"><input type="text" name="gizi[total_skor_gizi]" style="border: none; width: 20px;" id="total_skor_gizi" value="{{ $gizi->total_skor_gizi ?? 0 }}" readonly></td>
        </tr>
    </tbody>
</table>


<div class="form-group row mt-2">
    <div class="col-md-2">
        <label for="total_skor">Kategori</label>
    </div>
    <div class="col-md-4">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="a" name="gizi[kategori_gizi]" value="A : 0-1 = Status gizi baik" {{ $gizi->kategori_gizi == 'A : 0-1 = Status gizi baik' ? 'checked' : '' }}>
            <label class="custom-control-label" for="a">A : 0-1 = Status gizi baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="b" name="gizi[kategori_gizi]" value="B :  2-3 = beresiko malnutrisi" {{ $gizi->kategori_gizi == 'B :  2-3 = beresiko malnutrisi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="b">B :  2-3 = beresiko malnutrisi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="c" name="gizi[kategori_gizi]" value="C: 4-5 = Risiko malnutrisi Tinggi" {{ $gizi->kategori_gizi == 'C: 4-5 = Risiko malnutrisi Tinggi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="c">C: 4-5 = Risiko malnutrisi Tinggi</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
      <label for="">Sudah dibaca dan diketahui oleh Dietisien</label>
    </div>
    <div class="col-sm-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="ya_dietisien" name="gizi[diketahui_dietisien]" value="1" {{ $gizi->diketahui_dietisien == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="ya_dietisien">Ya, pukul</label>
        <input type="time" class="form-control ml-2" name="gizi[diketahui_pukul]" style="width: 150px;" value="{{ $gizi->diketahui_pukul ?? '' }}">
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="tidak_dietisien" name="gizi[diketahui_dietisien]" value="0" {{ $gizi->diketahui_dietisien == 0 ? 'checked' : '' }}>
        <label class="custom-control-label" for="tidak_dietisien">Tidak</label>
      </div>
    </div>
    <label class="ml-3" for="">Catatan: Pasien dengan <b>B dan C</b> dilakukan Asesmen Lanjut oleh dietisien</label>
  </div>

<div class="container mt-3">
    <button class="btn btn-primary" type="button" onclick="storeAssesmentDewasaGizi()">Simpan</button>
</div>
