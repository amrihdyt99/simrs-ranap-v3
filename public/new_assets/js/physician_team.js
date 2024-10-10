$(document).ready(function() {
    let urlOrigin = window.location.origin
    let domUrl = '';
    // check if urlOrigin is from rsud.sumselprov.go.id
    if (urlOrigin == 'https://rsud.sumselprov.go.id') domUrl = urlOrigin + '/simrs_ranap/nyx-sistem/select2/m-paramedic';
    else domUrl = urlOrigin + '/nyx-sistem/select2/m-paramedic';
    
    // $dom+'/nyx-sistem/select2/m-paramedic';

    triggerGetPhysicianTeamDokter();

    $('#btn_tambah_team').on('click', function() {
        let kode_dokter = $('#physician_kode_dokter').val();
        let kategori = $('#physician_kategori').val();

        $.ajax({
            url: $dom+'/api/addphysicianteamDokter', 
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), 
                kode_dokter: kode_dokter,
                kategori: kategori,
                regno: $reg  
            },
            success: function(response) {
                // console.log('Respon sukses:', response);
                neko_simpan_success();
                getPhysicianTeamDokter();
            },
            error: function(xhr, status, error) {
                // console.log('Respon error:', xhr.responseText);
                neko_simpan_error_noreq();
            }
        });
    });

    neko_select2_init_data(domUrl, 'physician_kode_dokter', {
        placeholder: 'Pilih Dokter'
    });

    function getPhysicianTeamDokter() {
        var tablePhysicianTeam = $('#table-physician-team-dokter');
        $.ajax({
            url: $dom+'/api/getphysicianteam',
            type: "post",
            data: {
                regno: regno,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log('Data tim dokter:', data);
                tablePhysicianTeam.empty();
                $.each(data.data, function(key, value) {
                    $('#table-physician-team-dokter').append(
                        '<tr>' +
                        '<td>' + value.ParamedicCode + '</td>' +
                        '<td>' + value.ParamedicName + '</td>' +
                        '<td>' + value.kategori + '</td>' +
                        `<td><button type="button" class="btn btn-sm btn-danger" onclick="deletePhysicianTeamDokter(${value.id})">Hapus</button></td>` +
                        '</tr>'
                    );
                });
            },
            error: function(xhr, status, error) {
                neko_danger_r();
            },
        });
    }

    window.deletePhysicianTeamDokter = function(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus dokter ini dari tim",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $dom + '/api/deletePhysicianTeamDokter/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        neko_notify('success', 'Dokter berhasil dihapus dari tim');
                        getPhysicianTeamDokter(); // Refresh daftar tim dokter
                    },
                    error: function(xhr, status, error) {
                        neko_notify('error', 'Terjadi kesalahan saat menghapus dokter dari tim');
                    }
                });
            }
        });
    }

    function triggerGetPhysicianTeamDokter() {
        $('#tab-physician-team-dokter').on('click', function() {
            getPhysicianTeamDokter();
        });
    }
});
