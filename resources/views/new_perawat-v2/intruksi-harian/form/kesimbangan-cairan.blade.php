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
            <th class="custom-border" colspan="5">KESEIMBANGAN CAIRAN</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="custom-border cb-non-right" style="padding: 0 !important">
                    <table class="table table-sm">
                        <tr>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="keseimbangan_cairan_a_{{ $i }}" id="keseimbangan_cairan_a_{{ $i }}">
                            </th>
                            <th class="text-center">
                                <input type="text" style="width:80px" class="custom-border" name="keseimbangan_cairan_b_{{ $i }}" id="keseimbangan_cairan_b_{{ $i }}">
                            </th>
                        </tr>
                    </table>
                </th>
            @endfor
        </tr>
    </table>
</div>
