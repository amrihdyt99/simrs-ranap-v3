<div class="table-responsive">
    <table class="table table-sm">
        <tr>
            <th class="custom-border cb-non-right" colspan="5">JAM</th>
            <th class="custom-border cb-non-right text-right">07</th>
            <th class="custom-border cb-non-right text-right">08</th>
            <th class="custom-border text-right">09</th>
            <th class="custom-border text-right">10</th>
            <th class="custom-border text-right">11</th>
            <th class="custom-border text-right">12</th>
            <th class="custom-border text-right">13</th>
            <th class="custom-border text-right">14</th>
            <th class="custom-border text-right">15</th>
            <th class="custom-border text-right">16</th>
            <th class="custom-border text-right">17</th>
            <th class="custom-border text-right">18</th>
            <th class="custom-border text-right">19</th>
            <th class="custom-border text-right">20</th>
            <th class="custom-border text-right">21</th>
            <th class="custom-border text-right">22</th>
            <th class="custom-border text-right">23</th>
            <th class="custom-border text-right">00</th>
            <th class="custom-border text-right">01</th>
            <th class="custom-border text-right">02</th>
            <th class="custom-border text-right">03</th>
            <th class="custom-border text-right">04</th>
            <th class="custom-border text-right">05</th>
            <th class="custom-border text-right">06</th>
        </tr>
        <tr>
            <th class="custom-border" rowspan="9" style="font-size: 16px; text-align: center;">O<br>U<br>T<br><br>P<br>U<br>T</th>
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                URINE
                <input type="text" style="width:80px" class="custom-border" name="urine" id="urine">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="urine_{{ $i }}" id="urine_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                NGT
                <input type="text" style="width:80px" class="custom-border" name="ngt" id="ngt">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="ngt_{{ $i }}" id="ngt_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                BAB
                <input type="text" style="width:80px" class="custom-border" name="bab" id="bab">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="bab_{{ $i }}" id="bab_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                DRAIN:I
                <input type="text" style="width:80px" class="custom-border" name="drain_i" id="drain_i">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="drain_i_{{ $i }}" id="drain_i_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                DRAIN:II
                <input type="text" style="width:80px" class="custom-border" name="drain_ii" id="drain_ii">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="drain_ii_{{ $i }}" id="drain_ii_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                DRAIN:III
                <input type="text" style="width:80px" class="custom-border" name="drain_iii" id="drain_iii">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="drain_iii_{{ $i }}" id="drain_iii_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                IVVL
                <input type="text" style="width:80px" class="custom-border" name="ivvl" id="ivvl">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="ivvl_{{ $i }}" id="ivvl_{{ $i }}">
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                JUMLAH 1 JAM / KUMULATIF
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border text-right">
                    <input type="text" style="width:80px" class="custom-border" name="output_jml_kumulatif_a_{{ $i }}" id="output_jml_kumulatif_a_{{ $i }}">
                    <input type="text" style="width:80px" class="custom-border" name="output_jml_kumulatif_b_{{ $i }}" id="output_jml_kumulatif_b_{{ $i }}">
                </td>
            @endfor
        </tr>
    </table>
</div>
