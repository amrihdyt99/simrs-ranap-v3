<script>
    function loadAllFunction(){
        drawImageLuka();
        loadDatatableRiwayatKehamilan();
    }

    function setSkala(element) {
        const value = element.value;
        const skalaText = document.getElementById('skala');
        const imgSkala = document.querySelectorAll('.img_skala');

        imgSkala.forEach(img => {
            img.style.display = img.getAttribute('data-value') == value ? 'block' : 'none';
        });

        let skalaDescription = '';
        if (value == 0) {
            skalaDescription = value + ' TIDAK NYERI';
        } else if (value >= 1 && value <= 3) {
            skalaDescription = value + ' NYERI RINGAN';
        } else if (value >= 4 && value <= 5) {
            skalaDescription = value + ' NYERI YANG MENGGANGGU';
        } else if (value == 6) {
            skalaDescription = value + ' NYERI YANG MENYUSAHKAN';
        } else if (value >= 7 && value <= 9) {
            skalaDescription = value + ' NYERI HEBAT';
        } else if (value == 10) {
            skalaDescription = value + ' NYERI SANGAT HEBAT';
        }

        skalaText.innerText = skalaDescription;
    }

    function drawImageLuka() {
      var canvas = document.getElementById('signature-image');
        var signaturePad = new SignaturePad(canvas);

        // Resize canvas to fit container
        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext('2d').scale(ratio, ratio);
            signaturePad.clear(); // otherwise isEmpty() might return incorrect value
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        document.getElementById('clear-signature').addEventListener('click', function () {
            signaturePad.clear();
        });
    }

    function objectifyForm(formArray) {
        //serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    function loadDatatableRiwayatKehamilan() {
        let data_riwayat_kehamilan = JSON.parse($('#riwayat_kehamilan_data').val());
        const dt_riwayat = $('#riwayat-kehamilan-table').DataTable({
            ordering: false,
            info: false,
            paging: false,
            searching: false,
            serverSide: false,
            data: data_riwayat_kehamilan,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'tgl_tahun_partus'
                },
                {
                    data: 'tempat_partus'
                },
                {
                    data: 'umur_hamil'
                },
                {
                    data: 'jenis_persalinan'
                },
                {
                    data: 'penolong_persalinan'
                },
                {
                    data: 'penyulit'
                },
                {
                    data: 'bb_anak'
                },
                {
                    data: 'keadaan_sekarang'
                }
            ],
            rowCallback: function(row, data, displayNum, displayIndex, index) {
                let api = this.api();
                $(row).find('#id_' + index).click(function() {
                    var v = $(this).data('v')
                    api.row($(this).closest("tr").get(0)).remove().draw();
                    data_riwayat_kehamilan.splice(index, 1);
                    $('#riwayat_kehamilan_data').val(JSON.stringify(data_riwayat_kehamilan));
                });
            },
        });
    }

    function submitFormRiwayatKehamilan() {
        let data_riwayat_kehamilan = JSON.parse($('#riwayat_kehamilan_data').val());

        var newRiwayat = $("#formRiwayatKehamilan").serializeArray();
        data_riwayat_kehamilan.push(objectifyForm(newRiwayat));
        $('#riwayat_kehamilan_data').val(JSON.stringify(data_riwayat_kehamilan));

        $('#riwayat-kehamilan-table').DataTable().clear(); // Clear your data
        $('#riwayat-kehamilan-table').DataTable().rows.add(data_riwayat_kehamilan); // Add rows with newly updated data
        $('#riwayat-kehamilan-table').DataTable().draw(); //then draw it

        $('#riwayat-kehamilan-modal').modal('hide');
    }
</script>
