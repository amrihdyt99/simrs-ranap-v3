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
            <th class="custom-border" rowspan="21" style="font-size: 16px; text-align: center;">I<br>N<br><br>T<br>A<br>K<br>E</th>
            <th class="custom-border cb-non-right" rowspan="6">T<br>R<br>A<br>N<br>F<br>U<br>S<br>I</th>
            <th class="custom-border cb-non-right" colspan="3"></th>
            {{-- @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom" id="romawi-0-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_0_a_{{ $i }}" id="romawi_0_a_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom" id="romawi-0-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_0_b_{{ $i }}" id="romawi_0_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor --}}
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">I</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_1_a_{{ $i }}" id="romawi_1_a_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_1_b_{{ $i }}" id="romawi_1_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">II</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_2_a_{{ $i }}" id="romawi_2_a_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_2_b_{{ $i }}" id="romawi_2_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">III</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_3_a_{{ $i }}" id="romawi_3_a_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_3_b_{{ $i }}" id="romawi_3_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">IV</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_4_a_{{ $i }}" id="romawi_4_a_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_4_b_{{ $i }}" id="romawi_4_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">JUMLAH 1 JAM / KUMULATIF</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="romawi-5-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_5_a_{{ $i }}" id="romawi_5_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="romawi-5-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="romawi_5_b_{{ $i }}" id="romawi_5_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" rowspan="4">M<br>A<br>K<br>A<br>N</th>
            <th class="custom-border cb-non-right" colspan="3">ORAL</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="oral_{{ $i }}" id="oral_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="oral_{{ $i }}" id="oral_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">ENTERAL</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="enteral_{{ $i }}" id="enteral_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top cb-non-bottom">
                                <input type="text" style="width:80px" class="custom-border" name="enteral_{{ $i }}" id="enteral_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3"></th>
            {{-- @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center custom-border cb-non-top" id="oe-empty-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="oe_empty_{{ $i }}" id="oe_empty_{{ $i }}">
                            </th>
                            <th class="text-center custom-border cb-non-top" id="oe-empty-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="oe_empty_{{ $i }}" id="oe_empty_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor --}}
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="3">JUMLAH 1 JAM / KUMULATIF</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="oe-jam-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="oe_jam_{{ $i }}" id="oe_jam_{{ $i }}">
                            </th>
                            <th class="text-center" id="oe-jam-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="oe_jam_{{ $i }}" id="oe_jam_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" rowspan="11">P<br>A<br>R<br>E<br>N<br>T<br>E<br>R<br>A<br>L</th>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_0" id="parenteral_0">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-0-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_0_a_{{ $i }}" id="parenteral_0_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-0-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_0_b_{{ $i }}" id="parenteral_0_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_1" id="parenteral_1">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-1-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_1_a_{{ $i }}" id="parenteral_1_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-1-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_1_b_{{ $i }}" id="parenteral_1_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_2" id="parenteral_2">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-2-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_2_a_{{ $i }}" id="parenteral_2_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-2-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_2_b_{{ $i }}" id="parenteral_2_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_3" id="parenteral_3">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-3-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_3_a_{{ $i }}" id="parenteral_3_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-3-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_3_b_{{ $i }}" id="parenteral_3_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_4" id="parenteral_4">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-4-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_4_a_{{ $i }}" id="parenteral_4_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-4-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_4_b_{{ $i }}" id="parenteral_4_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_5" id="parenteral_5">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-5-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_5_a_{{ $i }}" id="parenteral_5_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-5-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_5_b_{{ $i }}" id="parenteral_5_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_6" id="parenteral_6">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-6-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_6_a_{{ $i }}" id="parenteral_6_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-6-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_6_b_{{ $i }}" id="parenteral_6_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_7" id="parenteral_7">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-7-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_7_a_{{ $i }}" id="parenteral_7_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-7-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_7_b_{{ $i }}" id="parenteral_7_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_8" id="parenteral_8">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-8-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_8_a_{{ $i }}" id="parenteral_8_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-8-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_8_b_{{ $i }}" id="parenteral_8_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">
                <input type="text" style="width:80px" class="custom-border" name="parenteral_9" id="parenteral_9">
            </th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-9-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_9_a_{{ $i }}" id="parenteral_9_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-9-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_9_b_{{ $i }}" id="parenteral_9_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border" colspan="3">JUMLAH 1 JAM / KUMULATIF</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center cb-bottom cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center" id="parenteral-10-a-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_10_a_{{ $i }}" id="parenteral_10_a_{{ $i }}">
                            </th>
                            <th class="text-center" id="parenteral-10-b-{{ $i }}">
                                <input type="text" style="width:80px" class="custom-border" name="parenteral_10_b_{{ $i }}" id="parenteral_10_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="5">KUMULATIF</th>
            @for($i = 0; $i < 24; $i++)
                <th class="text-center custom-border cb-color-orange" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="kumulatif_all_a_{{ $i }}" id="kumulatif_all_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="kumulatif_all_a_{{ $i }}" id="kumulatif_all_a_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
    </table>
</div>
