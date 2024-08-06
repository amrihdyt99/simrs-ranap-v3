neko_select2_init('{{ route('nyaa_universal.select2.businesspartner') }}','businesspartner_id');
if(mode==='edit'){
    neko_select_pre_v('businesspartner_id',$(komponen).attr('nyaa-BusinessPartnerName'),$(komponen).attr('nyaa-businesspartner_id'));
}