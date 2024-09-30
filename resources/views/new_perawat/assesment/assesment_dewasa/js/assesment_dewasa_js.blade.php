<script>
    function loadAllFunctionDewasa(){

        const nyeriSkala = document.getElementById('nyeri_skala');
        setSkala(nyeriSkala);
    }

    function storeAssesmentDewasa() {

        neko_proses();
        Swal.fire({
            title: "Simpan pengkajian awal Dewasa?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('perawat.assesment-dewasa-awal.store') }}",
                    type: "POST",
                    data: $('#dewasa_form').serialize(),
                    success: function(data) {
                        neko_simpan_success();
                        $('.left-tab.active').click();
                    },
                    error: function(data) {
                        neko_simpan_error_noreq();
                    },
                })
            }
        });
    }

    function storeAssesmentDewasaNyeri() {

        neko_proses();
        Swal.fire({
            title: "Simpan pengkajian awal Dewasa?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('perawat.skrining-nyeri-dewasa.store') }}",
                    type: "POST",
                    data: $('#dewasa_form').serialize(),
                    success: function(data) {
                        neko_simpan_success();
                        $('.left-tab.active').click();
                    },
                    error: function(data) {
                        neko_simpan_error_noreq();
                    },
                })
            }
        });
    }

    function storeAssesmentDewasaGizi() {

        neko_proses();
        Swal.fire({
            title: "Simpan pengkajian awal Dewasa?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('perawat.skrining-gizi-dewasa.store') }}",
                    type: "POST",
                    data: $('#dewasa_form').serialize(),
                    success: function(data) {
                        neko_simpan_success();
                        $('.left-tab.active').click();
                    },
                    error: function(data) {
                        neko_simpan_error_noreq();
                    },
                })
            }
        });
    }
</script>