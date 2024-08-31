var formResume = '[action="form-add-resume"]'
var resumeDiagnosa = []
var resumeProsedur = []

getResumeBaseData()
function getResumeBaseData(){
    $.ajax({
        url: $dom+'/api/resume/baseData',
        data: {
            reg_no: $reg,
            dokter_id: $user_dokter_,
            plain_data: true
        },
        success: function(resp){
            let assesment = resp.assesment
            let diagnosa = resp.diagnosa
            let prosedur = resp.prosedur
            let obat = resp.obat

            let data = {}

            data.keluhan_utama = assesment.keluhan_utama
            data.riwayat_penyakit = assesment.riwayat_penyakit_sekarang
            data.pemeriksaan_fisik = assesment.pemeriksaan_multi_organ+`\ntoraks : `+(assesment.toraks ?? '-')+`\njantung : `+(assesment.jantung ?? '-')+`\nabdomen : `+(assesment.abdomen ?? '-')+`\nekstremitas atas bawah : `+(assesment.ekstremitas_atas_bawah ?? '-')+`\ngenetalia dan anus : `+(assesment.genetalia_dan_anus ?? '-')
            data.diagnosa = diagnosa
            data.prosedur = prosedur

            baseTemplate(data)
        }
    })
}

function baseTemplate(data){
    $(formResume+' [name="keluhan_utama"]').val(data.keluhan_utama)
    $(formResume+' [name="riwayat_penyakit"]').val(data.riwayat_penyakit)
    $(formResume+' [name="pemeriksaan_fisik"]').val(data.pemeriksaan_fisik)

    resumeDiagnosa = []
    resumeProsedur = []

    if (data.diagnosa.length > 0) {
        let diagnosa_category = ['utama', 'sekunder', 'klausa']
        let new_diagnosa = [];

        $.each(diagnosa_category, function(i, item){
            $sub_data_diagnosa = data.diagnosa.filter((obj) => obj.pdiag_kategori === item)

            if ($sub_data_diagnosa == undefined) {
                $sub_data_diagnosa = {
                    'NM_ICD10': '-',
                    'pdiag_id': '-',
                    'ID_ICD10': '-',
                    'pdiag_kategori': item,
                }
            }



            new_diagnosa.push({
                category: item,
                detail: $sub_data_diagnosa
            })
        })

        $td_diagnosa = ''

        $.each(new_diagnosa, function(i, item){
            let $content_diagnosa = ''
            $('[id="subRowDiagnosa"] [catergory="'+item.category+'"]').html('')

            $.each(item.detail, function(sub_i, sub_item){
                resumeDiagnosa.push(sub_item)

                $content_diagnosa += `
                    <input type="hidden" name="diagnosa[`+sub_i+`][ID_ICD10]" value="`+sub_item.ID_ICD10+`">
                    <input type="hidden" name="diagnosa[`+sub_i+`][NM_ICD10]" value="`+sub_item.NM_ICD10+`">
                    `+sub_item.ID_ICD10+` - `+sub_item.NM_ICD10+`<br>`
            })
            
            $td_diagnosa += `
                <td>
                    <span id="subRowDiagnosa" category="`+item.category+`">
                        `+$content_diagnosa+`
                    </span>
                </td>`
        })

        $('[id="icd10-table-body"]').html(`
            <tr>`+$td_diagnosa+`</tr>    
        `)
    }
    
    if (data.prosedur) {
        $td_prosedur = ''

        resumeProsedur = data.prosedur

        $.each(data.prosedur, function(i, item){
            $td_prosedur += `
                <td>
                    <input type="hidden" name="prosedur[`+i+`][ID_TIND]" value="`+item.ID_TIND+`">
                    <input type="hidden" name="prosedur[`+i+`][NM_TINDAKAN]" value="`+item.NM_TINDAKAN+`">
                    `+item.ID_TIND+` - `+item.NM_TINDAKAN+`
                </td>`
        })

        $('[id="icd9-table-body"]').html(`
            <tr>`+$td_prosedur+`</tr>    
        `)
    }
}