<script>
    function loadAllFunctionCaseManager() {
        initializeSignaturePad('signature-pad-perawat', 'ttd_perawat');
        initializeSignaturePad('signature-pad-pasien', 'ttd_pasien');
        initializeSignaturePad('signature-pad-saksi', 'ttd_saksi');
    }
    
    const signaturePads = {};

    function initializeSignaturePad(canvasId, hiddenInputId) {
        const canvas = document.getElementById(canvasId);
        const hiddenInput = document.getElementById(hiddenInputId);
        const button = document.querySelector(`button[data-pad="${canvasId.split('-')[2]}"]`);

        const signaturePad = new SignaturePad(canvas);
        signaturePads[canvasId] = signaturePad;

        signaturePad.onEnd = function() {
            const dataUrl = signaturePad.toDataURL();
            hiddenInput.value = dataUrl;
        };

        button.addEventListener('click', function() {
            signaturePad.clear();
            hiddenInput.value = '';
        });

        if (hiddenInput.value) {
            var image = new Image();
            image.onload = function() {
                canvas.getContext('2d').drawImage(image, 0, 0, canvas.width, canvas.height);
            }
            image.src = hiddenInput.value;
        }
    }

    function storeCaseManager() {
        neko_proses();
        Swal.fire({
            title: "Simpan Case Manager?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('perawat.case-manager.store') }}",
                    type: "POST",
                    data: $('#case_manager_form').serialize(),
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