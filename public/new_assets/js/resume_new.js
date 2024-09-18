var formResume = '[id="form-add-resume"]'
var resumeDiagnosa = []
var resumeProsedur = []
var resumeTerapi = []

getData()
function getData(){
    $.ajax({
        url: $dom+'/api/resume/data',
        data: {
            reg_no: $reg,
            dokter_id: $user_dokter_,
            plain_data: true
        },
        success: function(resp){
            if (resp) {
                let instruksi_ranap = resp.instruksi_ranap = {}

                resp.diagnosa = JSON.parse(resp.diagnosa)
                resp.prosedur = JSON.parse(resp.prosedur)
                resp.terapi = JSON.parse(resp.terapi)
                resp.tindakan = JSON.parse(resp.tindakan)
                instruksi_ranap.ranap_diagnosa = resp.diagnosis_masuk
                instruksi_ranap.ranap_indikasi = resp.indikasi_rawat

                resp.exist = true

                resumeTerapi = resp.terapi

                baseTemplate(resp)
            } else {
                getResumeBaseData()
            }

            takeHomePrescribe()
        }
    })
}

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
            let terapi = resp.terapi
            let instruksi_ranap = resp.instruksi_ranap

            let data = {}

            data.keluhan_utama = assesment.keluhan_utama ?? ''
            data.riwayat_penyakit = assesment.riwayat_penyakit_sekarang ?? ''
            data.pemeriksaan_fisik = ( assesment.pemeriksaan_multi_organ ?? '')+`\ntoraks : `+(assesment.toraks ?? '-')+`\njantung : `+(assesment.jantung ?? '-')+`\nabdomen : `+(assesment.abdomen ?? '-')+`\nekstremitas atas bawah : `+(assesment.ekstremitas_atas_bawah ?? '-')+`\ngenetalia dan anus : `+(assesment.genetalia_dan_anus ?? '-')
            data.diagnosa = diagnosa
            data.prosedur = prosedur
            data.instruksi_ranap = instruksi_ranap

            resumeTerapi = []
            if (terapi) {
                $.each(terapi, function(i, item){
                    $.each(item.job_order_dt, function(sub_i, sub_item){
                        let _item = sub_item.item
                        
                        resumeTerapi.push({
                            nama: _item.item_name,
                            dosis: sub_item.dosis,
                            hari: sub_item.hari,
                            satuan: sub_item.dosis_unitcode,
                            spesial_instruksi: sub_item.spesial_instruksi,
                            durasi_hari: sub_item.durasi_hari,
                        })
                    })
                })
            }
            
            data.terapi = resumeTerapi

            baseTemplate(data)
        }
    })
}

function baseTemplate(data){
    $(formResume+' [name="keluhan_utama"]').val(data.keluhan_utama)
    $(formResume+' [name="riwayat_penyakit"]').val(data.riwayat_penyakit)
    $(formResume+' [name="pemeriksaan_fisik"]').val(data.pemeriksaan_fisik)
    $(formResume+' [name="diagnosis_masuk"]').val(data.instruksi_ranap ? data.instruksi_ranap.ranap_diagnosa : '-')
    $(formResume+' [name="indikasi_rawat"]').val(data.instruksi_ranap ? data.instruksi_ranap.ranap_indikasi : '-')

    resumeDiagnosa = []
    resumeProsedur = []

    let diagnosisUtama = data.diagnosa.filter(d => d.pdiag_kategori === 'utama');
    if (diagnosisUtama.length > 0) {
        let utama = diagnosisUtama[0];
        $('[id="diagnosis-utama"]').html(`
            <tr>
                <td colspan="2">DIAGNOSIS UTAMA (Hanya ada Satu Diagnosis Utama) : ${utama.NM_ICD10}</td>
                <td>KODE ICD-10: ${utama.ID_ICD10}</td>
            </tr>
        `);
    }

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
                    `+sub_item.ID_ICD10+` - `+sub_item.NM_ICD10+`<br><br>`
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
                <tr>
                    <td>
                        `+item.ID_TIND+` - `+item.NM_TINDAKAN+`
                    </td>
                </tr>`
        })

        $('[id="icd9-table-body"]').html(`
            `+$td_prosedur+`
        `)
    }

    let klausaDiagnosa = data.diagnosa.filter(d => d.pdiag_kategori === 'klausa');
if (klausaDiagnosa.length > 0) {
    let tableBody = $('#penyebab-luar-tbody');
    tableBody.empty(); 

    let penyebabLuarArr = [];
    let penyebabLuarICDArr = [];

    klausaDiagnosa.forEach(d => {
        penyebabLuarArr.push(d.NM_ICD10);
        penyebabLuarICDArr.push(d.ID_ICD10);

        let row = `<tr>
            <td>${d.NM_ICD10}</td>
            <td>${d.ID_ICD10}</td>
        </tr>`;
        tableBody.append(row);
    });
    $('input[name="penyebab_luar"]').val(JSON.stringify(penyebabLuarArr));
    $('input[name="penyebab_luar_icd"]').val(JSON.stringify(penyebabLuarICDArr));
}

    $('[id="terapi-container"]').html('')

    if (data.terapi.length > 0) {
        $.each(data.terapi, function(i, item){
            $row_terapi = `
                <tr>
                    <td>`+(i + 1)+`</td>
                    <td>
                        `+item.nama+`
                        `+item.dosis+` `+item.hari+`
                        `+item.satuan+`
                        `+item.spesial_instruksi+`
                        `+item.durasi_hari+`
                    </td>
                </tr>
            `

            $('[id="terapi-container"]').append($row_terapi)
        })
    }

    if (data.exist != undefined) {
        $(formResume+' [name="riwayat_alergi"][value="'+data.riwayat_alergi+'"]').attr('checked', true)
        $(formResume+' [name="riwayat_alergi"][value="'+data.riwayat_alergi+'"]').attr('checked', true)
        $(formResume+' [name="pemeriksaan_radiologi"][value="'+data.pemeriksaan_radiologi+'"]').attr('checked', true)
        $(formResume+' [name="pemeriksaan_pa"][value="'+data.pemeriksaan_pa+'"]').attr('checked', true)
        $(formResume+' [name="terpasang_implant"][value="'+data.terpasang_implant+'"]').attr('checked', true)
        $(formResume+' [name="pemeriksaan_penunjang_yang_tertunda"][value="'+data.pemeriksaan_penunjang_yang_tertunda+'"]').attr('checked', true)

        $.each(JSON.parse(data.alasan_pulang), function(idx, items){
            $(formResume+' [name="alasan_pulang[]"][value="'+items+'"]').attr('checked', true)
        })
    
        $.each(JSON.parse(data.kondisi_pulang), function(idx, items){
            $(formResume+' [name="kondisi_pulang[]"][value="'+items+'"]').attr('checked', true)
        })

        $(formResume+' input[type="text"], '+formResume+' input[type="date"], '+formResume+' textarea').each(function(idx, items){
            let input_name = $(items).attr('name')

            $(items).val(data[input_name])
        })

        $(formResume+' [id="tindakan-container"]').html('')

        if (data.tindakan.length > 0) {
            $.each(data.tindakan, function(i, item){
                addTindakanInput(item)
            })
        }

        $(formResume+' [name="pdiag_status"][value="'+data.pdiag_status+'"]').attr('checked', true)
        $(formResume+' [name="pdiag_tipe"][value="'+data.pdiag_tipe+'"]').attr('checked', true)
        $(formResume+' [name="pdiag_old_case"][value="'+data.pdiag_old_case+'"]').attr('checked', true)
        $(formResume+' [name="pdiag_chronicity"][value="'+data.pdiag_chronicity+'"]').attr('checked', true)
        $(formResume+' [name="pdiag_masalah"][value="'+data.pdiag_masalah+'"]').attr('checked', true)
        $(formResume+' [name="tipe_perawatan_lanjutan"][value="'+data.tipe+'"]').attr('checked', true).change()

        $(formResume+' [name="klinik"]').val(data.klinik)
        $(formResume+' [name="dokter"]').val(data.dokter)
        $(formResume+' [name="tanggal_kontrol_rsud"]').val(data.tanggal_kontrol_rsud)
        $(formResume+' [name="tanggal_rs_lain"]').val(data.tanggal_rs_lain)
        $(formResume+' [name="nama_rs_lain"]').val(data.nama_rs_lain)
        $(formResume+' [name="tanggal_rujuk_balik"]').val(data.tanggal_rujuk_balik)
        $(formResume+' [name="nama_rs_rujuk_balik"]').val(data.nama_rs_rujuk_balik)
        $(formResume+' [name="puskesmas"]').val(data.puskesmas)
        $(formResume+' [name="dokter_pribadi"]').val(data.dokter_pribadi)
        $(formResume+' [name="pergantian_catheter_detail"]').val(data.pergantian_catheter_detail)
        $(formResume+' [name="tanggal_pergantian_catheter"]').val(data.tanggal_pergantian_catheter)
        $(formResume+' [name="terapi_rehabilitan_detail"]').val(data.terapi_rehabilitan_detail)
        $(formResume+' [name="tanggal_terapi_rehabilitan"]').val(data.tanggal_terapi_rehabilitan)
        $(formResume+' [name="rawat_luka_detail"]').val(data.rawat_luka_detail)
        $(formResume+' [name="tanggal_rawat_luka"]').val(data.tanggal_rawat_luka)
        $(formResume+' [name="perawatan_lainnya_detail"]').val(data.perawatan_lainnya_detail)
        $(formResume+' [name="tanggal_perawatan_lainnya"]').val(data.tanggal_perawatan_lainnya)

        $(formResume+' [name="pergantian_catheter_detail"]').val(data.pergantian_catheter_detail)
        $(formResume+' [name="tanggal_pergantian_catheter"]').val(data.tanggal_pergantian_catheter)
        $(formResume+' [name="terapi_rehabilitan_detail"]').val(data.terapi_rehabilitan_detail)
        $(formResume+' [name="tanggal_terapi_rehabilitan"]').val(data.tanggal_terapi_rehabilitan)
        $(formResume+' [name="rawat_luka_detail"]').val(data.rawat_luka_detail)
        $(formResume+' [name="tanggal_rawat_luka"]').val(data.tanggal_rawat_luka)
        $(formResume+' [name="perawatan_lainnya_detail"]').val(data.perawatan_lainnya_detail)
        $(formResume+' [name="tanggal_perawatan_lainnya"]').val(data.tanggal_perawatan_lainnya)
    }
}

function simpanResume(){
    $.ajax({
        url: $dom+'/api/resume/store',
        type: 'post',
        data: $('#form-add-resume').serialize()+'&diagnosa='+JSON.stringify(resumeDiagnosa)+'&prosedur='+JSON.stringify(resumeProsedur)+'&terapi='+JSON.stringify(resumeTerapi)+'&reg_no='+$reg+'&dokter_id='+$user_dokter_,
        success: function(resp){
            if (resp.success) {
                alert(resp.msg)
                getData()
            } else {
                alert(resp.msg)
            }
        }
    })
}

function getResumeTindakan(_id, _kode){
    let value = $('[id="'+_id+'"]').val()
    let text = $('[id="'+_id+'"]').find('option:selected').text()

    $('[data-tindakan-kode="'+_kode+'"] [class*="kode_icd9"]').val(value)
    $('[data-tindakan-kode="'+_kode+'"] [class*="nama_tindakan_icd9"]').val(text)
}