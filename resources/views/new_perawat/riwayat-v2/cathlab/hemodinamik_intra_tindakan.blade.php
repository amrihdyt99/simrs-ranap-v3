<table class="table1" width="100%" border="1">
    <tbody>
    <tr>
        <td colspan="12">PEMANTAUAN HEMODINAMIK INTRA OPERATIF</td>
    </tr>
    <tr>
        <td>Menit</td>
        <td>5</td>
        <td>10</td>
        <td>15</td>
        <td>20</td>
        <td>25</td>
        <td>30</td>
        <td>35</td>
        <td>40</td>
        <td>45</td>
        <td>50</td>
        <td>55</td>
        <td>60</td>
    </tr>
    <tr>
        <td>Tanda Vital</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Tekanan Darah</td>
       @for($i=0;$i<12;$i++)
        <td>
            <input type="text" name="tekanan_darah[]" class="form-control" value="" disabled>
        </td>
        @endfor
    </tr>
    <tr>
        <td>Nadi</td>
        @for($i=0;$i<12;$i++)
            <td>
                <input type="text" name="nadi[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>
    <tr>
        <td>Pernapasan</td>
        @for($i=0;$i<12;$i++)
            <td>
                <input type="text" name="pernapasan[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>
    <tr>
        <td>SPO2</td>
        @for($i=0;$i<12;$i++)
            <td>
                <input type="text" name="spo2[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Menit</td>
        <td>65</td>
        <td>70</td>
        <td>75</td>
        <td>80</td>
        <td>85</td>
        <td>90</td>
        <td>95</td>
        <td>100</td>
        <td>105</td>
        <td>110</td>
        <td>115</td>
        <td>120</td>
    </tr>
    <tr>
        <td>Tanda Vital</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Tekanan Darah</td>
        @for($i=12;$i<24;$i++)
            <td>
                <input type="text" name="tekanan_darah[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>
    <tr>
        <td>Nadi</td>
        @for($i=12;$i<24;$i++)
            <td>
                <input type="text" name="nadi[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>
    <tr>
        <td>Pernapasan</td>
        @for($i=12;$i<24;$i++)
            <td>
                <input type="text" name="pernapasan[]" class="form-control" value="" disabled>
            </td>
        @endfor

    </tr>
    <tr>
        <td>SPO2</td>
        @for($i=12;$i<24;$i++)
            <td>
                <input type="text" name="spo2[]" class="form-control" value="" disabled>
            </td>
        @endfor
    </tr>

    </tbody>
</table>
<div class="form-group">
    <label>Perubahan Kondisi Selama Prosedur</label>
    <textarea name="perubahan_kondisi" class="form-control" rows="3" disabled></textarea>
</div>
