$(document).ready(function() {
    let urlOrigin = window.location.origin
    let domUrl = '';
    // check if urlOrigin is from rsud.sumselprov.go.id
    if (urlOrigin == 'https://rsud.sumselprov.go.id') domUrl = urlOrigin + '/simrs_ranap/nyx-sistem/select2/m-paramedic';
    else domUrl = urlOrigin + '/nyx-sistem/select2/m-paramedic';
    
    // $dom+'/nyx-sistem/select2/m-paramedic';

    triggerGetPhysicianTeamDokter();

    $('#btn_tambah_team').on('click', function() {
        let kodeDokter = $('#physician_kode_dokter').val();
        let kodeLainnya = $('#physician_kode_lainnya').val();
        let kategori = $('#physician_kategori').val();

        let data = {
            regno: regno,
            kategori: kategori,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        if (kodeDokter) {
            data.kode_dokter = kodeDokter;
        } else if (kodeLainnya) {
            data.kode_dokter = kodeLainnya;
        } else {
            alert('Pilih PPA atau PPA Lainnya');
            return;
        }

        $.ajax({
            url: $dom + '/api/addphysicianteamDokter', 
            type: "POST",
            data: data,
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    getPhysicianTeamDokter();
                    $('#physician_team_dokter')[0].reset();
                } else {
                    alert('Gagal menambahkan tim dokter: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menambahkan tim dokter');
            }
        });
    });

    neko_select2_init_data(domUrl, 'physician_kode_dokter', {
        placeholder: 'Pilih Dokter'
    });

    neko_select2_init_data($dom + '/api/getPPALainnya', 'physician_kode_lainnya', {
        placeholder: 'Pilih PPA Lainnya'
    });;

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
                    $('#table-physician-team-dokter').append(
                        '<tr>' +
                        '<td>' + (value.kode_dokter || 'N/A') + '</td>' +
                        '<td>' + (value.ParamedicName || 'N/A') + '</td>' +
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
            getPPALainnya();
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
                    if (response.message.includes('Tidak ada Dokter Konsul yang terdaftar')) {
                        neko_notify('warning', 'Belum ada dokter physician team konsul yang terdaftar untuk registrasi ini.');
                    } else {
                        neko_notify('error', response.message);
                    }
                }
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.includes('Tidak ada Dokter Konsul yang terdaftar')) {
                    neko_notify('warning', 'Belum ada PPA Dokter Konsul yang terdaftar pada physician team ini.');
                } else {
                    neko_notify('error', 'Terjadi kesalahan saat menyimpan data konsul');
                }
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

    // Fungsi untuk mengambil dan mengisi data PPA Lainnya
    // function getPPALainnya() {
    //     $.ajax({
    //         url: $dom + '/api/getPPALainnya',
    //         type: 'GET',
    //         success: function(response) {
    //             if (response.success) {
    //                 let select = $('#physician_kode_lainnya');
    //                 select.empty();
    //                 select.append('<option value="">-----Pilih PPA Lainnya-----</option>');
    //                 $.each(response.data, function(key, value) {
    //                     let id = value.dokter_id || value.perawat_id;
    //                     select.append(`<option value="${id}">${value.name} (${value.level_user})</option>`);
    //                 });
    //             } else {
    //                 console.error('Gagal mengambil data PPA Lainnya');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Terjadi kesalahan saat mengambil data PPA Lainnya:', error);
    //         }
    //     });
    // }

});
