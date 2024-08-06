$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#diagnosa_detail').hide();

$('#btn-add-diagnosa').click(function(){
    $('#modalDiagnosa').modal('show');
    $('#diagnosa_detail').hide();
    resetForm('#form-diagnosa-dokter');
    resetSelect2('#pdiag_diagnosa');
    resetForm('#form-prosedur-dokter');
    resetSelect2('#pdiag_diagnosa');
    resetSelect2('#pprosedur_prosedur');
});

$('#btn-reload-diagnosa').click(function(){
    getDiagnosaDischarge();
    getProsedurDischarge();
});

$table_diagnosa = $('#table-diagnosa');

// var table_icd10 = $('#table-icd10').DataTable( {
//     processing: false,
//     serverSide: false,
//     scrollX: false,
//     autoWidth: true,
//     pageLength: 10,
//     ajax: {
//         url: "/auth/api/dokter/discharge/diagnosa/data",
//         type: "GET",
//         dataSrc:""
//     },
//     columns:[
//         { data: "ID_ICD10",  class: 'text-center',render:function(data, type, row){
//             return '<input type="checkbox" name="pdiag_diagnosa[]" id="check_diagnosa" value="'+data+'">';
//         }},
//         { data: "ID_ICD10" },
//         { data: "NM_ICD10" },
//     ],
//     "order": [[2, 'asc']],
// });