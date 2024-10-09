<script>
  function loadAllFunctionNursing() {
    loadDatatableDrugs();
    loadModalNursingDrug();
  }

  function loadDatatableDrugs() {
    let dt_nursing_drugs = $('#dt_nursing_drugs').DataTable({
      processing: true,
      serverSide: true,
      lengthMenu: [10, 25, 50, 100, 200, 500],
      scrollX: true,
      ajax: {
        url: "{{ route('perawat.nursing-drugs.get') }}",
        data: function(d) {
          d.reg_no = "{{ $reg }}";
        }

      },
      columns: [{
          data: "tgl_pemberian",
          name: "tgl_pemberian",
          orderable: true,
          searchable: true,
        },
        {
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
          data: "cara_pemberian",
          name: "cara_pemberian",
          orderable: true,
          searchable: true,
        },
        {
          data: "antibiotik",
          name: "antibiotik",
          orderable: true,
          searchable: true,
        },
        {
          data: "created_by_name",
          name: "created_by_name",
          orderable: true,
          searchable: true,
        },
        {
          data: 'action',
          name: 'action',
          className: 'text-center',
          orderable: false,
          searchable: false
        },
      ]
    });
  }

  function loadModalNursingDrug() {
    $('#btnTambahNursingDrugs').click(function(e) {
      $('#addNursingDrugModal').modal('show');
    })
  }

  function storeNursingDrug() {
    neko_proses();
    let userShift = "{{ session('user_shift') }}";
    Swal.fire({
      title: "Simpan Pemberian Obat ?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.nursing_drugs_store')}}",
          type: "POST",
          data: $('#formNursingDrugNew').serialize() + "&reg_no=" + regno + "&created_by=" + "{{ auth()->user()->username }}" + "&user_shift=" + userShift,
          success: function(data) {
            neko_simpan_success();
            neko_refresh_datatable('dt_nursing_drugs');
            $('#addNursingDrugModal').modal('hide');
            $('#formNursingDrugNew').reset();
          },
          error: function(data) {
            neko_simpan_error();
          },
        })
      }
    });
  }

  function updateNursingDrug() {
    neko_proses();
    let userShift = "{{ session('user_shift') }}";
    Swal.fire({
      title: "Perbarui Pemberian Obat ?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.nursing_drugs_update')}}",
          type: "POST",
          data: $('#formEditNursingDrugNew').serialize() + "&reg_no=" + regno + "&created_by=" + "{{ auth()->user()->username }}" + "&user_shift=" + userShift,
          success: function(data) {
            neko_simpan_success();
            neko_refresh_datatable('dt_nursing_drugs');
            $('#editNursingDrugModal').modal('hide');
            $('#formEditNursingDrugNew').reset();
          },
          error: function(data) {
            neko_simpan_error();
          },
        })
      }
    });
  }

  function deleteNursingDrug(id) {
    neko_proses();
    let userShift = "{{ session('user_shift') }}";
    Swal.fire({
      title: "Hapus Pemberian Obat ?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.nursing_drugs_delete')}}",
          type: "POST",
          data: "id=" + id + "&reg_no=" + regno + "&username=" + "{{ auth()->user()->username }}",
          success: function(data) {
            neko_simpan_success();
            neko_refresh_datatable('dt_nursing_drugs');
            $('#editNursingDrugModal').modal('hide');
            $('#formEditNursingDrugNew').reset();
          },
          error: function(data) {
            neko_simpan_error();
          },
        })
      }
    });
  }

  function editModalNursingDrug(id) {

    $.ajax({
      url: `{{ route('perawat.nursing_drugs_get') }}`,
      method: 'GET',
      data: {
        id: id,
      },
      success: function(response) {
        if (response.status === 'success') {
          let data = response.data;
          let detailWaktu = JSON.parse(data.waktu_pemberian);
          $('#editNursingDrugModal').find('#id_nursing_drug').val(data.id);
          $('#editNursingDrugModal').find('#obat').val(data.kode_obat + ', ' + data.nama_obat);
          $('#editNursingDrugModal').find('#antibiotik').val(data.antibiotik);
          $('#editNursingDrugModal').find('#cara_pemberian').val(data.cara_pemberian);
          $('#editNursingDrugModal').find('#dosis').val(data.dosis);
          $('#editNursingDrugModal').find('#frekuensi').val(data.frekuensi);
          $('#editNursingDrugModal').find('#tgl_pemberian').val(data.tgl_pemberian);
          detailWaktu.forEach((item, index) => {
            if (item.rentang_jam) {
              $('#editNursingDrugModal').find(`#rentang_jam_${index}`).prop('checked', true);
              $('#editNursingDrugModal').find(`#tipe_jam_${index}`).val(item.tipe_jam);
              $('#editNursingDrugModal').find(`#aktual_jam_${index}`).val(item.aktual_jam);
            }
          });

          $('#editNursingDrugModal').modal('show');

        }
      },
      error: function(xhr, status, error) {
        $('#modalDetailContent').html('<p>Failed to fetch details.</p>');
        console.error(`Error: ${error}`);
      }
    });
  }
</script>