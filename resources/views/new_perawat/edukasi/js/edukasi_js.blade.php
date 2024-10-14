<script>
    function storeEdukasiAnastesi(){
        neko_proses();
        Swal.fire({
            title: "Simpan Edukasi Anastesi?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('')}}/api/add-edukasi-anastesi",
                    type: "POST",
                    data: $('#formEdukasiAnastesi').serialize() + '&reg_no=' + encodeURIComponent("{{$reg}}") + '&medrec=' + encodeURIComponent("{{$dataPasien->reg_medrec}}"),
                    success: function(data) {
                        neko_simpan_success();
                    },
                    error: function(data) {
                        neko_simpan_error_noreq();
                    },
                });
            }
        });
    }

    function loadSignatureAnastesi(){
        SignaturePadAnastesi('signature-pad-dokter_anastesi', 'ttd_dokter_anastesi');
        SignaturePadAnastesi('signature-pad-pasien_anastesi', 'ttd_pasien_anastesi');
    }

    function SignaturePadAnastesi(canvasId, hiddenInputId) {
        const canvas = document.getElementById(canvasId);
        const hiddenInput = document.getElementById(hiddenInputId);
        const button = document.querySelector(`button[data-pad="${canvasId.split('-')[2]}"]`);

        if (!canvas || !hiddenInput || !button) {
            console.error('Elemen tidak ditemukan');
            return;
        }

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
            const image = new Image();
            image.onload = function() {
                canvas.getContext('2d').drawImage(image, 0, 0, canvas.width, canvas.height);
            }
            image.src = hiddenInput.value;
        }
    }
</script>