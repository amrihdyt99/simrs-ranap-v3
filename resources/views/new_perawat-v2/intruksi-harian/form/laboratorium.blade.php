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
            <th class="custom-border" rowspan="8" style="font-size: 16px; text-align: center;">L<br>A<br>B<br>O<br>R<br>A<br>T<br>O<br>R<br>I<br>U<br>M</th>
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_1" id="lab_1">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_1_a_{{ $i }}" id="lab_1_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_1_b_{{ $i }}" id="lab_1_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_2" id="lab_2">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_2_a_{{ $i }}" id="lab_2_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_2_b_{{ $i }}" id="lab_2_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_3" id="lab_3">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_3_a_{{ $i }}" id="lab_3_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_3_b_{{ $i }}" id="lab_3_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_4" id="lab_4">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_4_a_{{ $i }}" id="lab_4_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_4_b_{{ $i }}" id="lab_4_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_5" id="lab_5">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_5_a_{{ $i }}" id="lab_5_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_5_b_{{ $i }}" id="lab_5_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_6" id="lab_6">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_6_a_{{ $i }}" id="lab_6_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_6_b_{{ $i }}" id="lab_6_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="4">
                <input type="text" style="width:80px" class="custom-border" name="lab_7" id="lab_7">
            </th>
            @for ($i = 0; $i < 24; $i++)
                <td class="custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_7_a_{{ $i }}" id="lab_7_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="lab_7_b_{{ $i }}" id="lab_7_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </td>
            @endfor
        </tr>
    </table>
</div>
