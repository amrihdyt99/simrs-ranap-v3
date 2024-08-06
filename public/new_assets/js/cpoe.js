$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body #btn-add-cpoe').click(function () {
    $('body #modalCPOE').show();
    $('body #grid_item').html('');
    resetForm('#form-cpoe-dokter');
    resetSelect2('#cpoe_jenis');
});

$('body #btn-reload-cpoe').click(function () {
    orderCPOE();
});

$('body #tindakan_combo').hide();
$('body #row_total_cpoe').hide();

$('body #cpoe_tindakan, body #select-tindakan').change(function () {
    // $id = $(this).select2('data')[0].id;
    $id = $(this).find(':selected').data('id');
    $harga = $(this).find(':selected').data('price');
    $type = $(this).find(':selected').data('type');
    $name = $(this).find(':selected').data('name');
    $kode = $(this).find(':selected').val();

    console.log($name);



    if ($kode != '') {
        $row = '<tr id="row_cpoe_' + $id + '">' +
            '<td><input name="cpoe_tindakan[]" value="' + $kode + '" style="border: none" readonly></td>' +
            '<td><input name="cpoe_nama[]" value="' + $name + '" style="border: none" readonly/></td>' +
            '<td><input name="cpoe_tarif[]" value="' + $harga + '" style="border: none" readonly></td>' +
            '<td><input name="cpoe_jenis[]' + $type + '" value="' + $type + '" style="border: none" readonly></td>' +
            '<td>' +
            '<button type="button" data-id="' + $id + '" class="btn btn-small text-center remove_cpoe"><i class="fas fa-trash text-danger"></i></button>' +
            '</td>' +
            '<tr>';

        $('body #table-item-cpoe').append($row);
        $('#cpoe_tindakan').val('').trigger('change');
    }
});

$('body').on('click', '.remove_cpoe', function () {
    $id = $(this).data('id');
    $('body #row_cpoe_' + $id).remove();
    $('body #grid_tindakan[data-id="' + $id + '"]').prop('checked', false);
});

$('body').on('click', '.remove_ordercpoe', function (event) {
    $id = $(this).data('id');
    $type = $(this).data('type');

    // if ($type != 'Lainnya') {
    //     $subs_id = $id.substr(5, 15);
    // } else {
    // }
    $subs_id = $id;

    if (confirm("Apakah anda yakin ingin menghapus order tindakan ?")) {
        $.ajax({
            url: $dom + '/auth/api/cpoe/delete_' + $type + '/' + $subs_id,
            type: 'DELETE',
            dataType: 'json',
            success: function (resp) {
                orderCPOE();
                getResume();
            }
        });
    }
});
