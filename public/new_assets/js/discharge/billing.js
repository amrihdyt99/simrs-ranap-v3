$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$dom = '';

$table_billing = $('#table-billing');

$('#detail_billing').hide();

$('#btn-add-billing').click(function(){
    $('#modalBilling').modal('show');
    $('#detail_billing').hide();
    resetForm('#form-billing-dokter');
    resetSelect2('#pbills_item');
});

$('#btn-reload-billing').click(function(){
    getBillingDischarge();
});