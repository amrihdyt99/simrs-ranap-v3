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
                    let actionButtons = `<button type="button" class="btn btn-sm btn-danger" onclick="deletePhysicianTeamDokter(${value.id})">Hapus</button>`;
                    if (value.kategori === 'Konsul') {
                        actionButtons += `<button type="button" class="btn btn-sm btn-primary ml-2" onclick="showKonsulModal(${value.id})">Konsul</button>`;
                    }
                    if (value.catatan) {
                        actionButtons += `<button type="button" class="btn btn-sm btn-info ml-2" onclick="showCatatanModal('${value.catatan}', '${value.ParamedicName}')">Lihat Catatan</button>`;
                    }
                    $('#table-physician-team-dokter').append(
                        '<tr>' +
                        '<td>' + value.kode_dokter + '</td>' +
                        '<td>' + value.ParamedicName + '</td>' +
                        '<td>' + value.kategori + '</td>' +
                        '<td>' + actionButtons + '</td>' +
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
                        getPhysicianTeamDokter(); 
                    },
                    error: function(xhr, status, error) {
                        neko_notify('error', 'Terjadi kesalahan saat menghapus dokter dari tim');
                    }
                });
            }
        });
    }

    window.showKonsulModal = function(id) {
        $('#konsulModal').modal('show');
        $('#konsulDokterIdHidden').val(id);
        neko_select2_init_data(domUrl, 'konsul_kode_dokter', {
            placeholder: 'Pilih Dokter Konsul'
        });
    }

    $('#btn_simpan_konsul').on('click', function() {
        let konsulDokterIdHidden = $('#konsulDokterIdHidden').val();
        let konsulKodeDokter = $('#konsul_kode_dokter').val();
        let konsulCatatan = $('#konsul_catatan').val();

        $.ajax({
            url: $dom+'/api/addKonsulDokter', 
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), 
                parent_id: konsulDokterIdHidden,
                kode_dokter: konsulKodeDokter,
                catatan: konsulCatatan,
                regno: $reg  
            },
            success: function(response) {
                neko_simpan_success();
                $('#konsulModal').modal('hide');
                getPhysicianTeamDokter();
            },
            error: function(xhr, status, error) {
                neko_simpan_error_noreq();
            }
        });
    });

    function triggerGetPhysicianTeamDokter() {
        $('#tab-physician-team-dokter').on('click', function() {
            getPhysicianTeamDokter();
            getKonsulData();
            
        });
    }
    $('#btn_simpan_isi_konsul').on('click', function() {
        saveKonsul('isi');
    });
    $('#btn_simpan_jawaban_konsul').on('click', function() {
        saveKonsul('jawaban');
    });

    function saveKonsul(type) {
        let data = {
            reg_no: $reg,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        if (type === 'isi') {
            data.tanggal_konsul = $('#tanggal_konsul').val();
            data.isi_konsul = $('#isi_konsul').val();
        } else if (type === 'jawaban') {
            data.tanggal_jawaban_konsul = $('#tanggal_jawaban_konsul').val();
            data.jawaban_konsul = $('#jawaban_konsul').val();
        }

        $.ajax({
            url: $dom + '/api/saveKonsul',
            type: 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    neko_notify('success', response.message);
                } else {
                    neko_notify('error', response.message);
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = 'Terjadi kesalahan saat menyimpan data konsul';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                neko_notify('error', errorMessage);
            }
        });
    }

    function getKonsulData() {
        $.ajax({
            url: $dom + '/api/getKonsul',
            type: 'POST',
            data: {
                reg_no: $reg,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    if (response.data) {
                        $('#tanggal_konsul').val(response.data.tanggal_konsul);
                        $('#isi_konsul').val(response.data.isi_konsul);
                        $('#tanggal_jawaban_konsul').val(response.data.tanggal_jawaban_konsul);
                        $('#jawaban_konsul').val(response.data.jawaban_konsul);
                    } else {
                        $('#tanggal_konsul').val('');
                        $('#isi_konsul').val('');
                        $('#tanggal_jawaban_konsul').val('');
                        $('#jawaban_konsul').val('');
                    }

                    if (response.message) {
                        console.log(response.message);
                    }
                } else {
                    neko_notify('error', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengambil data konsul:', error);
                neko_notify('error', 'Terjadi kesalahan saat mengambil data konsul');
            }
        });
    }

    window.showCatatanModal = function(catatan, ParamedicName) {
        $('#catatanModal').modal('show');
        $('#catatanModalBody').text(catatan);
        $('#catatanModalTitle').text('Catatan untuk Dokter ' + ParamedicName);
    }
});