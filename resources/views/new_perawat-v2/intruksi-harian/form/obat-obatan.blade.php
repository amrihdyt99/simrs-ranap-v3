<div class="table-responsive">
    <table class="table table-sm">
        <tr>
            <th class="custom-border cb-non-right text-center" rowspan="2">OBAT - OBATAN</th>
            <th class="custom-border cb-non-right text-center" rowspan="2">DOSIS</th>
            <th class="custom-border text-center" colspan="24">JAM</th>
        </tr>
        <tr>
            <th class="custom-border text-center">07</th>
            <th class="custom-border text-center">08</th>
            <th class="custom-border text-center">09</th>
            <th class="custom-border text-center">10</th>
            <th class="custom-border text-center">11</th>
            <th class="custom-border text-center">12</th>
            <th class="custom-border text-center">13</th>
            <th class="custom-border text-center">14</th>
            <th class="custom-border text-center">15</th>
            <th class="custom-border text-center">16</th>
            <th class="custom-border text-center">17</th>
            <th class="custom-border text-center">18</th>
            <th class="custom-border text-center">19</th>
            <th class="custom-border text-center">20</th>
            <th class="custom-border text-center">21</th>
            <th class="custom-border text-center">22</th>
            <th class="custom-border text-center">23</th>
            <th class="custom-border text-center">00</th>
            <th class="custom-border text-center">01</th>
            <th class="custom-border text-center">02</th>
            <th class="custom-border text-center">03</th>
            <th class="custom-border text-center">04</th>
            <th class="custom-border text-center">05</th>
            <th class="custom-border text-center">06</th>
        </tr>
        <tr>
            <th class="custom-border" colspan="26" style="font-size: 14px;">Injeksi:</th>
        </tr>
        @for ($i = 0; $i < 11; $i++)
            <tr>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="obat_obatan_inject_{{ $i }}" id="obat_obatan_inject_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="obat_obatan_inject_dosis_{{ $i }}" id="obat_obatan_inject_dosis_{{ $i }}">
                </td>
                @for ($j = 0; $j < 24; $j++)
                    <td class="custom-border text-center">
                        <input type="text" style="width:80px" class="custom-border" name="obat_obatan_inject_{{ $i }}_{{ $j }}" id="obat_obatan_inject_{{ $i }}_{{ $j }}">
                    </td>
                @endfor
            </tr>
        @endfor
        <tr>
            <th class="custom-border" colspan="26" style="font-size: 14px;">Oral:</th>
        </tr>
        @for ($i = 0; $i < 11; $i++)
            <tr>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="obat_obatan_oral_{{ $i }}" id="obat_obatan_oral_{{ $i }}">
                </td>
                <td class="custom-border cb-non-right">
                    <input type="text" style="width:80px" class="custom-border" name="obat_obatan_oral_dosis_{{ $i }}" id="obat_obatan_oral_dosis_{{ $i }}">
                </td>
                @for ($j = 0; $j < 24; $j++)
                    <td class="custom-border text-center">
                        <input type="text" style="width:80px" class="custom-border" name="obat_obatan_oral_{{ $i }}_{{ $j }}" id="obat_obatan_oral_{{ $i }}_{{ $j }}">
                    </td>
                @endfor
            </tr>
        @endfor
    </table>
</div>
