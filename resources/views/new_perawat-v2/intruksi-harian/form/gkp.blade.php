<div class="table-responsive">
    <table class="table table-sm" width="100%">
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
            <th class="custom-border cb-non-right" colspan="5">GLASGOW COMA SCALE (EVM)</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    E <input type="number" style="width:80px" class="custom-border" name="gcs_e_{{ $i }}" id="gcs_e_{{ $i }}" oninput="gcsChange(this)">
                    V <input type="number" style="width:80px" class="custom-border" name="gcs_v_{{ $i }}" id="gcs_v_{{ $i }}" oninput="gcsChange(this)">
                    M <input type="number" style="width:80px" class="custom-border" name="gcs_m_{{ $i }}" id="gcs_m_{{ $i }}" oninput="gcsChange(this)">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="5">KESADARAN</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="kesadaran_{{ $i }}" id="kesadaran_{{ $i }}" oninput="kesadaranChange(this)">
                </th>
            @endfor
        </tr>
        <tr>
            <th class="custom-border cb-non-right" colspan="5">PUPIL KA / KI</th>
            @for ($i = 0; $i < 24; $i++)
                <th class="custom-border {{ $i < 23 ? 'cb-non-right' : '' }}">
                    <input type="text" style="width:80px" class="custom-border" name="pupil_ka_ki_{{ $i }}" id="pupil_ka_ki_{{ $i }}" oninput="pupilKaKiChange(this)">
                </th>
            @endfor
        </tr>
    </table>
</div>
