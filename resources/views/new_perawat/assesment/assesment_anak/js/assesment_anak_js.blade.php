<script>
  function objectifyForm(formArray) {
    //serialize data function
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
      returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
  }

  function storeAssesmentAwalAnak() {
    neko_proses();
    Swal.fire({
      title: "Simpan pengkajian awal Anak?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.assesment-anak-awal.store')}}",
          type: "POST",
          data: $('#assesment_awal_anak_form').serialize(),
          success: function(data) {
            neko_simpan_success();
          },
          error: function(data) {
            neko_simpan_error_noreq();
          },
        })
      }
    });

  }

  function storeSkriningGiziAnak() {
    neko_proses();
    Swal.fire({
      title: "Simpan Skrining Gizi Anak?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.skrining-gizi-anak.store')}}",
          type: "POST",
          data: $('#skrining_gizi_anak_form').serialize(),
          success: function(data) {
            neko_simpan_success();
          },
          error: function(data) {
            neko_simpan_error_noreq();
          },
        })
      }
    });

  }
</script>