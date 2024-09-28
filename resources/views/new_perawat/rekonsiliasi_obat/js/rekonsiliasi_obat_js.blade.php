<script>
  function loadAllFunctionRekonsiliasiObat() {
    loadDTRekonObat();
    verifFunction();
  }

  function loadDTRekonObat() {
    // let data_obat_rekon = JSON.parse($('#rekon_obat_data').val());

    let dt_history_tf = $('#dt_rekonsiliasi_obat').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      scrollX: true,
      ajax: {
        url: "{{route('perawat.rekon-obat-item.get')}}",
        data: function(d) {
          d.reg_no = regno;
          d.med_rec = medrec;
        }

      },
      columns: [{
          data: 'action',
          name: 'action',
          className: 'text-center',
          orderable: false,
          searchable: false
        }, {
          data: "nama_obat",
          name: "nama_obat",
          orderable: true,
          searchable: true,
        },
        {
          data: "dosis",
          name: "dosis",
          orderable: true,
          searchable: true,
        },
        {
          data: "frekuensi",
          name: "frekuensi",
          orderable: true,
          searchable: true,
        },
        {
          data: "cara_beri",
          name: "cara_beri",
          orderable: true,
          searchable: true,
        },
        {
          data: "waktu_beri_terakhir",
          name: "waktu_beri_terakhir",
          orderable: true,
          searchable: true,
        },
        {
          data: "tindak_lanjut",
          name: "tindak_lanjut",
          orderable: true,
          searchable: true,
        },
        {
          data: "aturan_ubah_pakai",
          name: "aturan_ubah_pakai",
          orderable: true,
          searchable: true,
        },
      ],
      rowCallback: function(row, data) {
        let api = this.api();
        $(row).find('.btn-delete-item-obat').click(function() {
          let pk = $(this).data('id'),
            url = `{{ route('perawat.rekon-obat-item.delete') }}`;
          Swal.fire({
            title: "Anda Yakin ?",
            text: "Data tidak dapat dikembalikan setelah di hapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan",
          }).then((result) => {
            if (result.value) {
              $.ajax({
                url: url,
                type: "POST",
                data: {
                  _token: '{{ csrf_token() }}',
                  _method: 'POST',
                  id: pk,
                  username: "{{ auth()->user()->username }}",
                },
                error: function(response) {
                  neko_notify('Error', 'Data gagal dihapus !');
                },
                success: function(response) {
                  neko_simpan_success();
                  neko_refresh_datatable('dt_rekonsiliasi_obat');
                }
              });
            }
          });
        });
      }
    });
  }

  function storeRekobObatItem() {
    neko_proses();
    Swal.fire({
      title: "Simpan Item Obat ?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.rekon-obat-item.store')}}",
          type: "POST",
          data: $('#formRekonObatItem').serialize() + "&obat[med_rec]=" + medrec + "&obat[reg_no]=" + regno + "&obat[created_by]=" + "{{ auth()->user()->username }}",
          success: function(data) {
            neko_simpan_success();
            neko_refresh_datatable('dt_rekonsiliasi_obat');
            $('#rekonModal').modal('hide');
          },
          error: function(data) {
            neko_simpan_error_noreq();
          },
        })
      }
    });
  }

  function verifFunction() {
    $('#verif_perawat_btn').click(function(e) {
      Swal.fire({
        title: "Verifikasi Rekonsiliasi Obat ?",
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Ya, verifikasi !",
        cancelButtonText: "Tidak, Batalkan",
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "{{route('perawat.get-rekon-ttd.get')}}",
            type: "POST",
            data: {
              _token: '{{ csrf_token() }}',
              _method: 'GET',
              username: "{{ auth()->user()->username }}",
            },
            success: function(data) {
              neko_notify('success', 'Data berhasil diverifikasi.');
              $("#perawat_signature_img").attr("src", `${data.signature}`);
              $('#signature_perawat').val(data.signature);
              $("#perawat_name").text(data.user_name);
              $("#ttd_perawat_image").removeClass("d-none");
              $('#verif_perawat_btn').addClass('d-none');
            },
            error: function(data) {
              neko_simpan_error();
            },
          })
        }
      });
    });
  }

  function storeRekonsiliasiObat() {
    neko_proses();
    Swal.fire({
      title: "Simpan Rekonsiliasi Obat ?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.rekonsiliasi-obat.store')}}",
          type: "POST",
          data: $('#formRekonsiliasiObat').serialize() + "&rekon_data[med_rec]=" + medrec + "&rekon_data[reg_no]=" + regno + "&rekon_data[perawat_username]=" + "{{ auth()->user()->username }}",
          success: function(data) {
            neko_simpan_success();
          },
          error: function(data) {
            neko_simpan_error();
          },
        })
      }
    });
  }
</script>