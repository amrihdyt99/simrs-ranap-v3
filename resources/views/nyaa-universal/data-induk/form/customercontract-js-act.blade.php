neko_select2_init_class('{{ route('nyaa_universal.select2.businesspartner') }}','businesspartner');
neko_select2_init_class('{{ route('nyaa_universal.select2.corporate') }}','corporate');
neko_datepicker_class('dtx_cc');
if(mode==='edit'){
    neko_select_pre_v('businesspartner_id',$(komponen).attr('nyaa-BusinessPartnerName'),$(komponen).attr('nyaa-businesspartner_id'));
    neko_select_pre_v('billto_businesspartner_id',$(komponen).attr('nyaa-billto_BusinessPartnerName'),$(komponen).attr('nyaa-billto_businesspartner_id'));
    neko_select_pre_v('HospitalSigned_id',$(komponen).attr('nyaa-HospitalSigned_name'),$(komponen).attr('nyaa-HospitalSigned_id'));
    neko_select_pre_v('CorporateSigned_id',$(komponen).attr('nyaa-CorporateSigned_name'),$(komponen).attr('nyaa-CorporateSigned_id'));
}