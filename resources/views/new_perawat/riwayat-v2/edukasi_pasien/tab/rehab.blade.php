<table class="table1 w-100">
    <thead>
        <tr>
            <th>Edukator / Topik</th>
            <th>Edukasi</th>
            <th>Tanggal Edukasi</th>
            <th>Tingkat Pemahaman Awal</th>
            <th>Metode Edukasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Teknik Rehabilitasi</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_tehnik_rehabilitasi" id="edukasi_tehnik_rehabilitasi" disabled></textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_tehnik_rehabilitasi" id="tgl_tehnik_rehabilitasi" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_tehnik_rehabilitasi_mudah" disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_mudah">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_tehnik_rehabilitasi_ulang" disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_tehnik_rehabilitasi" value="Hal Baru" id="tingkat_paham_tehnik_rehabilitasi_baru" disabled>
                <label for="tingkat_paham_tehnik_rehabilitasi_baru">Hal Baru</label><br>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_tehnik_rehabilitasi" id="metode_edukasi_tehnik_rehabilitasi" disabled></textarea>
                </div>
            </td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="edukasi_lain_lain_rehabilitasi" id="edukasi_lain_lain_rehabilitasi" disabled></textarea>
                </div>
            </td>
            <td><input type="date" class="form-control" name="tgl_lain_lain_rehabilitasi" id="tgl_lain_lain_rehabilitasi" disabled></td>
            <td>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Mudah mengerti" id="tingkat_paham_lain_lain_rehabilitasi_mudah" disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_mudah">Mudah mengerti</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Edukasi Ulang" id="tingkat_paham_lain_lain_rehabilitasi_ulang" disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_ulang">Edukasi Ulang</label><br>
                <input class="" type="radio" name="tingkat_paham_lain_lain_rehabilitasi" value="Hal Baru" id="tingkat_paham_lain_lain_rehabilitasi_baru" disabled>
                <label for="tingkat_paham_lain_lain_rehabilitasi_baru">Hal Baru</label><br>
                <input type="text" class="form-control" placeholder="Lain-lain" name="tingkat_paham_lain_lain_text_rehabilitasi" id="tingkat_paham_lain_lain_text_rehabilitasi" disabled>
            </td>
            <td>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="metode_edukasi_lain_lain_rehabilitasi" id="metode_edukasi_lain_lain_rehabilitasi" disabled></textarea>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<table class="table1" style="width: 95%;" id="table-edukasi-ttd-rehab">
    <tr>
        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <div style="margin-bottom: 10px; font-weight: bold;">SASARAN</div>
                <div id="signature-pad-sasaran" style="display: inline-block;">
                    <div style="border: solid 1px teal; width: 450px; height: 210px; position: relative;">
                        <img src="" id="signature_sasaran_rehabilitasi" alt="">
                    </div>
                    <div style="margin: 10px; text-align: center;">
                        <input type="hidden" id="signature_sasaran" name="ttd_sasaran" value="">
                        
                        <input type="text" class="form-control mt-2" name="nama_sasaran" id="nama_sasaran_rehab" value="" placeholder="Nama Sasaran" readonly>
                    </div>
                </div>
            </div>
        </td>

        <td style="width: 500px; text-align: center; vertical-align: middle; padding: 10px;">
            <div style="margin-bottom: 10px; font-weight: bold;">EDUKATOR</div>
            <div id="signature-pad-edukator" style="display: inline-block; margin: 0 auto;">
                <div style="border: solid 1px teal; width: 450px; height: 210px; position: relative;">
                    <img src="" id="signature_edukator_rehabilitasi" alt="">
                </div>
                <div style="margin: 10px;">
                    <input type="hidden" id="signature_edukator" name="ttd_edukator" value="">
                    
                    <input type="text" class="form-control mt-2" name="nama_edukator" id="nama_edukator_rehab" value="" placeholder="Nama Edukator" readonly>
                </div>
            </div>
        </td>
    </tr>
</table>