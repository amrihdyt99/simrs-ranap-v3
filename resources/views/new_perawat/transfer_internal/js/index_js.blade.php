<script>
  function loadAllTfInteralFunc() {
    loadDatatableHistoryTransferInternal();
    createTfInternal();
    createTfIntensif();
  }

  function loadCreateTfInternalFunc() {
    loadSelect2TfInternal();
    $('.btn_transfer_internal').on('click', function() {
      simpanTransferInternal();
    });
    $('#ModalBase').on('hidden.bs.modal', function() {
      $('.protecc').removeAttr('disabled');
      $('#ModalBase').html('');
      $('.nav-link.active').click();
    });
    confirmTransferInternal();
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
          data: "bed_code_asal",
          name: "bed_code_asal",
          orderable: true,
          searchable: true,
          render: function(data, type, row, meta) {
            return '[' + row.bed_code_asal + '] ' + row.bed_asal_name + ' - ' + row.bed_asal_unit + ' - ' + row.bed_asal_class;
          }
        }, {
          data: "bed_code_tujuan",
          name: "bed_code_tujuan",
          orderable: true,
          searchable: true,
          render: function(data, type, row, meta) {
            return '[' + row.bed_code_tujuan + '] ' + row.bed_tujuan_name + ' - ' + row.bed_tujuan_unit + ' - ' + row.bed_tujuan_class;
          }
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
        $(row).find('.btn-edit-transfer').click(function() {
          let kode_transfer = $(this).data('transfer_code');
          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
              "kode_transfer_internal": kode_transfer,
              'type': 'edit'
            },
            url: "{{route('nyaa_universal.view_injector.perawat.edit_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_edit_load_all();
              loadCreateTfInternalFunc();
            },
            error: function(data) {
              clear_show_error();
            },
          });
        });
        $(row).find('.btn-detail-transfer').click(function() {
          let kode_transfer = $(this).data('transfer_code');
          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
              "kode_transfer_internal": kode_transfer,
              'type': 'detail'
            },
            url: "{{route('nyaa_universal.view_injector.perawat.edit_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_load_all();
              loadCreateTfInternalFunc();

            },
            error: function(data) {
              clear_show_error();
            },
          });
        });
        $(row).find('.btn-print-transfer').click(function() {
          let kode_transfer = $(this).data('transfer_code');
          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
              "kode_transfer_internal": kode_transfer,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.print-transfer-internal')}}",
            success: function(data) {
              inject_view_data(data);
              printTransferInternal();

            },
            error: function(data) {
              clear_show_error();
            },
          });
        });
        $(row).find('.btn-edit-transfer-intensif').click(function() {
          let kode_transfer = $(this).data('transfer_code');
          clear_show_load();
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
              "kode_transfer_internal": kode_transfer,
              'type': 'intensif'
            },
            url: "{{route('nyaa_universal.view_injector.perawat.edit_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_load_all();
              confirmTransferInternal();
              loadCreateTfInternalFunc();
            },
            error: function(data) {
              clear_show_error();
            },
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
          data: "bed_code_asal",
          name: "bed_code_asal",
          orderable: true,
          searchable: true,
          render: function(data, type, row, meta) {
            return '[' + row.bed_code_asal + '] ' + row.bed_asal_name + ' - ' + row.bed_asal_unit + ' - ' + row.bed_asal_class;
          }
        }, {
          data: "bed_code_tujuan",
          name: "bed_code_tujuan",
          orderable: true,
          searchable: true,
          render: function(data, type, row, meta) {
            return '[' + row.bed_code_tujuan + '] ' + row.bed_tujuan_name + ' - ' + row.bed_tujuan_unit + ' - ' + row.bed_tujuan_class;
          }
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
          let kode_transfer = $(this).data('transfer_code');
          $.ajax({
            type: "POST",
            data: {
              "reg_no": regno,
              "medrec": medrec,
              "kode_transfer": kode_transfer,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.create-serah-terima-transfer-internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_load_all();
              confirmTransferInternal();
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
              'type': 'edit',
            },
            url: "{{route('nyaa_universal.view_injector.perawat.create_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_edit_load_all();
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

  function createTfIntensif() {
    $('#btnCreateTfIntensif').click(function(e) {
      Swal.fire({
        title: "Lakukan Transfer Rawat Intensif ?",
        icon: 'warning',
        text: "Transfer Rawat Intensif tidak dapat dibatalkan jika sudah dilakukan",
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
              'type': 'intensif',
            },
            url: "{{route('nyaa_universal.view_injector.perawat.create_transfer_internal')}}",
            success: function(data) {
              inject_view_data(data);
              nyaa_dttb_transferinternal_load_all();
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
    let bed_tujuan_id = $('#select-bed-tujuan').val();
    $(async function() {
      $.ajax({
        type: "get",
        url: "{{url('api/cekketersediaanruangan')}}",
        dataType: "json",
        success: function(r) {
          var opt = '<option value="" disabled>Pilih Tujuan Ruangan dan Bed</option>';
          $.each(r.data, function(index, row) {
            opt += '<option value="' + row.bed_id + '">' + row.bed_code + ' - ' + row.ruang + ' - ' + row.kelompok + ' - ' + row.kelas + '</option>';
          });
          $('#select-bed-tujuan').html(opt);

          // Initialize Select2 after populating options
          $('#select-bed-tujuan').select2({
            theme: 'bootstrap4',
            placeholder: "Pilih Asal Ruangan dan Bed"
          });

          // Set the default value if `bed_id` is not empty
          if (bed_tujuan_id) {
            $('#select-bed-tujuan').val(bed_tujuan_id).trigger('change');
          }
        }
      });

      let perawat_tujuan_id = $('#select-petugas-tujuan').val();
      $.ajax({
        type: "get",
        url: "{{ route('transfer-internal.getPerawat') }}",
        dataType: "json",
        success: function(r) {
          var opt = '<option value="" disabled>Pilih perawat tujuan</option>';
          $.each(r.data, function(index, row) {
            opt += '<option value="' + row.username + '">' + row.name + '</option>';
          });
          $('#select-petugas-tujuan').html(opt);

          // Initialize Select2 after populating options
          $('#select-petugas-tujuan').select2({
            theme: 'bootstrap4',
            placeholder: "Pilih perawat tujuan"
          });
          // Set the default value if `bed_id` is not empty
          if (perawat_tujuan_id) {
            $('#select-petugas-tujuan').val(perawat_tujuan_id).trigger('change');
          }
        }
      });

      let class_code = $('#temp_class_bed').val();
      $('#select-class-bed').select2({
        theme: 'bootstrap4',
        placeholder: "-",
      });
      if (class_code) {
        $('#select-class-bed').val(class_code).trigger('change');
      }

      let class_charge_code = $('#temp_charge_class_bed').val();
      $('#select-charge-class-bed').select2({
        theme: 'bootstrap4',
        placeholder: "-",
      });
      if (class_charge_code) {
        $('#select-charge-class-bed').val(class_charge_code).trigger('change');
      }
    })
  }

  function confirmTransferInternal() {
    $('#confirmTransfer').click(function(e) {
      Swal.fire({
        title: "Konfirmasi Serah Terima Transfer Internal ?",
        text: "Transfer yang telah dikonfirmasi tidak bisa dikembalikan !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Konfirmasi !",
        cancelButtonText: "Tidak, Batalkan",
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "{{route('perawat.confirm_serah_terima')}}",
            type: "POST",
            data: $('form#form_transfer_internal').serialize() + "&medrec=" + medrec + "&transfer_reg=" + regno,
            error: function(response) {
              neko_notify('Error', 'Data gagal disimpan !');
            },
            success: function(response) {
              if (response.status === "success") {
                neko_simpan_success();
                api.draw();
              } else {
                neko_notify('Error', response.message);
              }
            }
          });
        }
      });
    });
  }

  function printTransferInternal() {
    $(document).ready(function() {
      $('#btnPrintTransferInternal').click(function() {
        var printContent = $('#printTransferInternalContent').html(); // Get the div content
        var originalContent = $('body').html(); // Backup the entire page's content

        $('body').html(printContent); // Replace body content with the div content
        window.print(); // Trigger the print
        $('body').html(originalContent); // Restore original page content
      });
    });
  }
</script>