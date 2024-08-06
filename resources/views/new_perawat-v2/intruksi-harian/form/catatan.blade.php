<div class="table-responsive">
    <table class="table table-sm">
        <tr>
            <th class="custom-border cb-non-right text-center" colspan="2">CATATAN KEPERAWATAN</th>
            <th class="custom-border text-center" colspan="10">CATATAN PERKEMBANGAN PASIEN TERINTEGRASI</th>
        </tr>
        <tr>
            <th class="custom-border cb-non-right text-center">Catatan Pelaksanaan Perawatan</th>
            <th class="custom-border cb-non-right text-center">NAMA/PARAF</th>
            <th class="custom-border cb-non-right text-center">TGL/JAM</th>
            <th class="custom-border cb-non-right text-center">DOKTER</th>
            <th class="custom-border cb-non-right text-center">PROFESI LAIN</th>
            <th class="custom-border cb-non-right text-center">CATATAN PERKEMBANGAN TERINTEGRASI</th>
            <th class="custom-border cb-non-right text-center">NAMA/PARAF</th>
            <th class="custom-border cb-non-right text-center">TGL/JAM</th>
            <th class="custom-border cb-non-right text-center">DOKTER</th>
            <th class="custom-border cb-non-right text-center">PROFESI LAIN</th>
            <th class="custom-border cb-non-right text-center">CATATAN PERKEMBANGAN TERINTEGRASI</th>
            <th class="custom-border text-center">NAMA/PARAF</th>
        </tr>
        @for ($i = 0; $i < 30; $i++)
            <tr>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:100%" class="custom-border" name="catatan_keperawatan_{{ $i }}" id="catatan_keperawatan_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_keperawatan_nama_{{ $i }}" id="catatan_keperawatan_nama_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_1_tgl_jam_{{ $i }}" id="catatan_perkembangan_1_tgl_jam_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_1_dokter_{{ $i }}" id="catatan_perkembangan_1_dokter_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right" colspan="2">
                    <input type="text" style="width: 100%" class="custom-border" name="catatan_perkembangan_1_profesi_{{ $i }}" id="catatan_perkembangan_1_profesi_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_1_nama_{{ $i }}" id="catatan_perkembangan_1_nama_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_2_tgl_jam_{{ $i }}" id="catatan_perkembangan_2_tgl_jam_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_2_dokter_{{ $i }}" id="catatan_perkembangan_2_dokter_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right" colspan="2">
                    <input type="text" style="width: 100%" class="custom-border" name="catatan_perkembangan_2_profesi_{{ $i }}" id="catatan_perkembangan_2_profesi_{{ $i }}">
                </td>
                <td class="custom-border">
                    <input type="text" style="width:80px" class="custom-border" name="catatan_perkembangan_2_nama_{{ $i }}" id="catatan_perkembangan_2_nama_{{ $i }}">
                </td>
            </tr>
        @endfor
    </table>
</div>
