<script>
  function loadAllTfInteralFunc() {
    loadDatatableHistoryTransferInternal();
    createTfInternal();
  }

  function loadCreateTfInternalFunc() {
    nyaa_dttb_transferinternal_load_all();
    loadSelect2TfInternal();
    $('.btn_transfer_internal').on('click', function() {
      simpanTransferInternal();
    });
    $('#ModalBase').on('hidden.bs.modal', function() {
      $('.protecc').removeAttr('disabled');
      $('#ModalBase').html('');
      $('.nav-link.active').click();
    });
  }

  function loadDatatableHistoryTransferInternal() {
    // let data_obat_rekon = JSON.parse($('#rekon_obat_data').val());

    let dt_history_tf = $('#dt_riwayat_transfer').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      scrollX: true,
      ajax: {
        url: "{{ route('perawat.get_history_tf_internal') }}",
        data: function(d) {
          d.reg_no = "{{ $reg }}";
        }

      },
      columns: [{
          data: "transfer_reg",
          name: "transfer_reg",
          orderable: true,
          searchable: true,
        },
        {
          data: "PatientName",
          name: "PatientName",
          orderable: true,
          searchable: true,
        },
        {
          data: "MedicalNo",
          name: "MedicalNo",
          orderable: true,
          searchable: true,
        },
        {
          data: "UnitAsal",
          name: "UnitAsal",
          orderable: true,
          searchable: true,
        }, {
          data: "UnitTujuan",
          name: "UnitTujuan",
          orderable: true,
          searchable: true,
        }, {
          data: "transfer_waktu_hubungi",
          name: "transfer_waktu_hubungi",
          orderable: true,
          searchable: true,
        }, {
          data: "ditransfer_waktu",
          name: "ditransfer_waktu",
          orderable: true,
          searchable: true,
        }, {
          data: 'status_transfer',
          name: 'status_transfer',
          render: function(columnData, type, rowData, meta) {
            if (columnData) {
              return `<span class="badge badge-success text-white">Sudah Diterima</span>`;
            } else {
              return `<span class="badge badge-danger">Belum Diterima</span>`;
            }
          }
        }, {
          data: 'action',
          name: 'action',
          className: 'text-center',
          orderable: false,
          searchable: false
        },
      ],
      rowCallback: function(row, data) {
        let api = this.api();
        $(row).find('.btn-delete').click(function() {
          let pk = $(this).data('id'),
            url = `/ranap/vclaim-manual/delete/` + pk;
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
                  _method: 'POST'
                },
                error: function(response) {
                  neko_notify('Error', 'Data gagal dihapus !');
                },
                success: function(response) {
                  if (response.status === "success") {
                    neko_simpan_success();
                    api.draw();
                  } else {
                    neko_notify('Error', 'Data gagal dihapus !');
                  }
                }
              });
            }
          });
        });
      }
    });
  }

  function loadDTSerahTerima() {
    // let data_obat_rekon = JSON.parse($('#rekon_obat_data').val());

    let dt_history_tf = $('#dt_serah_terima').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      scrollX: true,
      ajax: {
        url: "{{ route('perawat.get_serah_terima_data') }}",
        data: function(d) {
          d.reg_no = "{{ $reg }}";
        }

      },
      columns: [{
          data: "transfer_reg",
          name: "transfer_reg",
          orderable: true,
          searchable: true,
        },
        {
          data: "PatientName",
          name: "PatientName",
          orderable: true,
          searchable: true,
        },
        {
          data: "MedicalNo",
          name: "MedicalNo",
          orderable: true,
          searchable: true,
        },
        {
          data: "UnitAsal",
          name: "UnitAsal",
          orderable: true,
          searchable: true,
        }, {
          data: "UnitTujuan",
          name: "UnitTujuan",
          orderable: true,
          searchable: true,
        }, {
          data: "transfer_waktu_hubungi",
          name: "transfer_waktu_hubungi",
          orderable: true,
          searchable: true,
        }, {
          data: "ditransfer_waktu",
          name: "ditransfer_waktu",
          orderable: true,
          searchable: true,
        }, {
          data: 'status_transfer',
          name: 'status_transfer',
          render: function(columnData, type, rowData, meta) {
            if (columnData) {
              return `<span class="badge badge-success text-white">Sudah Diterima</span>`;
            } else {
              return `<span class="badge badge-danger">Belum Diterima</span>`;
            }
          }
        }, {
          data: 'action',
          name: 'action',
          className: 'text-center',
          orderable: false,
          searchable: false
        },
      ],
      rowCallback: function(row, data) {
        let api = this.api();
        $(row).find('.btn-confirm-tf').click(function() {
          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.create-serah-terima-transfer-internal')}}",
            success: function(data) {
              inject_view_data(data);
              loadCreateTfInternalFunc();
            },
            error: function(data) {
              clear_show_error();
            },
          });
        });

        $(row).find('.btn-delete').click(function() {
          let pk = $(this).data('id'),
            url = `/ranap/vclaim-manual/delete/` + pk;
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
                  _method: 'POST'
                },
                error: function(response) {
                  neko_notify('Error', 'Data gagal dihapus !');
                },
                success: function(response) {
                  if (response.status === "success") {
                    neko_simpan_success();
                    api.draw();
                  } else {
                    neko_notify('Error', 'Data gagal dihapus !');
                  }
                }
              });
            }
          });
        });
      }
    });
  }

  function createTfInternal() {
    $('#btnCreateTfInternal').click(function(e) {
      Swal.fire({
        title: "Lakukan Transfer Internal Pasien ?",
        icon: 'warning',
        text: "Transfer Internal tidak dapat dibatalkan jika sudah dilakukan",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Ya, lakukan !",
        cancelButtonText: "Tidak, Batalkan",
      }).then((result) => {
        if (result.value) {

          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.create_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              loadCreateTfInternalFunc();
            },
            error: function(data) {
              clear_show_error();
            },
          });
        }
      });
    });
  }

  function viewSerahTerima() {
    $('#btnSerahTerimaTfInternal').click(function(e) {
      clear_show_load();
      $.ajax({
        type: "POST",
        data: {
          "reg_no": regno,
          "medrec": medrec,
        },
        url: "{{route('nyaa_universal.view_injector.perawat.serah-terima-transfer-internal')}}",
        success: function(data) {
          inject_view_data(data);
          loadDTSerahTerima();
        },
        error: function(data) {
          clear_show_error();
        },
      });
    });
  }

  function viewConfirmTFInternal() {
    $('#btnSerahTerimaTfInternal').click(function(e) {
      clear_show_load();
      $.ajax({
        type: "POST",
        data: {
          "reg_no": regno,
          "medrec": medrec,
        },
        url: "{{route('nyaa_universal.view_injector.perawat.serah-terima-transfer-internal')}}",
        success: function(data) {
          inject_view_data(data);
        },
        error: function(data) {
          clear_show_error();
        },
      });
    });
  }

  function loadSelect2TfInternal() {
    $('#select-bed-asal').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Asal Ruangan dan Bed',
      ajax: {
        url: "{{ route('transfer-internal.getRoom') }}",
        dataType: 'json',
        processResults: function(response) {
          let results = $.map(response.data, function(row, index) {
            row.id = row.bed_id;
            row.text = row.bed_code + ' - ' + row.ruang + ' - ' + row.kelompok + ' - ' + row.kelas;
            return row;
          });
          return {
            results: results,
            pagination: {
              more: (response.next_page_url != null)
            }
          };
        }
      }
    });

    $('#select-bed-tujuan').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Asal Ruangan dan Bed',
      ajax: {
        url: "{{ route('transfer-internal.getRoom') }}",
        dataType: 'json',
        processResults: function(response) {
          let results = $.map(response.data, function(row, index) {
            row.id = row.bed_id;
            row.text = row.bed_code + ' - ' + row.ruang + ' - ' + row.kelompok + ' - ' + row.kelas;
            return row;
          });
          return {
            results: results,
            pagination: {
              more: (response.next_page_url != null)
            }
          };
        }
      }
    });

    $('#select-petugas-tujuan').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih petugas unit tujuan',
      ajax: {
        url: "{{ route('transfer-internal.getPerawat') }}",
        dataType: 'json',
        processResults: function(response) {
          let results = $.map(response.data, function(row, index) {
            row.id = row.id;
            row.text = row.name;
            return row;
          });
          return {
            results: results,
            pagination: {
              more: (response.next_page_url != null)
            }
          };
        }
      }
    });
  }
</script>