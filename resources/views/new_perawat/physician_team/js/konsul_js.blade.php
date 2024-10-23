<script>
    function saveKonsul(type) {
        let data = {
            reg_no: regno,
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
            url: '{{ url("/api/saveKonsul") }}',
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
            url: '{{ url("/api/getKonsul") }}',
            type: 'POST',
            data: {
                reg_no: regno,
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
</script>