<script>
  function loadAllFunctionNursing() {
    let nursingDrugItems = [];
    loadDatatableDrugs();
    loadModalNursingDrug();
    loadDatatableDrugItems();
    loadDatatableDetailDrugItems();
    $('#dt_history_ns_drug').DataTable({
      ordering: false,
      info: false,
      paging: false,
      searching: false,
      serverSide: false,
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
          d.username = "{{ auth()->user()->username }}";
        }

      },
      columns: [{
          data: "tgl_pemberian",
          name: "tgl_pemberian",
          orderable: true,
          searchable: true,
        },
        {
          data: "item_obat",
          name: "item_obat",
          orderable: false,
          searchable: false,
          render: function(columnData, type, rowData, meta) {
            let html = ``;

            let list_obat = JSON.parse(columnData);
            html += `<ol>`;
            list_obat.forEach(function(currentValue, index, array) {
              return html += `<li>${currentValue.nama_obat}</li>
                                  <ul>
                                    <li>Cara Pemberian : ${currentValue.cara_pemberian}</li>
                                    <li>Antibiotik : ${currentValue.antibiotik}</li>
                                    <li>Dosis : ${currentValue.dosis}</li>
                                    <li>Frekuensi : ${currentValue.frekuensi}</li>
                                  </ul>
                              `;
            });
            html += `</ol>`;

            return html;
          }
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


  function loadDatatableDrugItems() {
    let nursingDrugItems = JSON.parse($('#nursing_drug_items').val());
    let dt_nursing_drugs = $('#dt_nursing_drugs_item').DataTable({
      ordering: false,
      info: false,
      paging: false,
      searching: false,
      serverSide: false,
      data: nursingDrugItems,
      columns: [{
          data: "kode_obat",
          name: "kode_obat",
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
          data: null,
          className: 'text-center',
          width: '50px',
          render: function(columnData, type, rowData, meta) {
            return ` <button type="button" id="id_delete_` + meta.row + `" class="btn btn-danger btn-delete-row" ><i class="fa fa-minus"></i></button>`;
          }
        }
      ],
      rowCallback: function(row, data, displayNum, displayIndex, index) {
        let api = this.api();
        $(row).find('#id_delete_' + index).click(function() {
          var v = $(this).data('v')
          api.row($(this).closest("tr").get(0)).remove().draw();
          nursingDrugItems.splice(index, 1);
          $('#nursing_drug_items').val(JSON.stringify(nursingDrugItems));
        });
      },
    });
  }

  function loadDatatableDetailDrugItems() {
    let nursingDetailDrugItems = JSON.parse($('#detail_nursing_drug_items').val());
    let dt_nursing_drugs = $('#dt_detail_nursing_drugs_item').DataTable({
      ordering: false,
      info: false,
      paging: false,
      searching: false,
      serverSide: false,
      data: nursingDetailDrugItems,
      columns: [{
          data: "kode_obat",
          name: "kode_obat",
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
      ],
      rowCallback: function(row, data, displayNum, displayIndex, index) {
        let api = this.api();
        $(row).find('#id_delete_' + index).click(function() {
          var v = $(this).data('v')
          api.row($(this).closest("tr").get(0)).remove().draw();
          nursingDrugItems.splice(index, 1);
          $('#nursing_drug_items').val(JSON.stringify(nursingDrugItems));
        });
      },
    });
  }

  function loadModalNursingDrug() {
    $('#btnTambahNursingDrugs').click(function(e) {
      $('#addNursingDrugModal').modal('show');
    });


    $('#btnTambahNursingItemDrugs').click(function(e) {
      $('#addNursingDrugModal').modal('hide');
      $('#addNursingDrugItemModal').modal('show');
    })

    $('#addNursingDrugItemModal').on('hidden.bs.modal', function(e) {
      // Code to execute when the modal is closed      
      $('#addNursingDrugModal').modal('show');
    });
  }

  function submitFormNursingDrugItems() {
    let nursingDrugItems = JSON.parse($('#nursing_drug_items').val());

    var newPJ = $("#formNursingDrugItemObat").serializeArray();
    let obatVal = newPJ[0].value;
    let kode_obat = obatVal.split(', ');
    newPJ[0].name = 'kode_obat';
    newPJ[0].value = kode_obat[0];
    newPJ.push({
      name: 'nama_obat',
      value: kode_obat[1],
    });
    nursingDrugItems.push(objectifyForm(newPJ));
    $('#nursing_drug_items').val(JSON.stringify(nursingDrugItems));


    $('#dt_nursing_drugs_item').DataTable().clear(); // Clear your data
    $('#dt_nursing_drugs_item').DataTable().rows.add(nursingDrugItems); // Add rows with newly updated data
    $('#dt_nursing_drugs_item').DataTable().draw(); //then draw it

    $('#addNursingDrugItemModal').modal('hide');
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
          $('#editNursingDrugModal').find('#detail_nursing_drug_items').val(data.item_obat);

          let = items = JSON.parse($('#editNursingDrugModal').find('#detail_nursing_drug_items').val());

          console.log(items);

          $('#dt_detail_nursing_drugs_item').DataTable().clear(); // Clear your data
          $('#dt_detail_nursing_drugs_item').DataTable().rows.add(items); // Add rows with newly updated data
          $('#dt_detail_nursing_drugs_item').DataTable().draw(); //then draw it

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