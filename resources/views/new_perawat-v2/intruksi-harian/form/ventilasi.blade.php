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
            <th class="custom-border" rowspan="9" style="font-size: 16px; text-align: center;">V<br>E<br>N<br>T<br>I<br>L<br>A<br>S<br>I</th>
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">MODUS</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="modus_{{ $i }}" id="modus_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">TIDAL VOLUME</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="tidal_volume_{{ $i }}" id="tidal_volume_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">MINUTE VOLUME</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="minute_volume_{{ $i }}" id="minute_volume_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">PEEP</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="peep_{{ $i }}" id="peep_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">RESP. RATE</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="resp_rate_{{ $i }}" id="resp_rate_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">I:E RATIO</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="ie_ratio_{{ $i }}" id="ie_ratio_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">Fi O2</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="fi_o2_{{ $i }}" id="fi_o2_{{ $i }}">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="text-center custom-border" colspan="4">FTT : DIAMETER/KEDALAMAN</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="text-center custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="ftt_diameter_kedalaman_{{ $i }}" id="ftt_diameter_kedalaman_{{ $i }}">
                </th>
            @endfor
        </tr>
    </table>
</div>
