<script>
  function objectifyForm(formArray) {
    //serialize data function
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++) {
      returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
  }

  function loadDatatableRekonObat() {
    let data_obat_rekon = JSON.parse($('#rekon_obat_data').val());
    const dt_rekon = $('#dt-rekon-obat').DataTable({
      ordering: false,
      info: false,
      paging: false,
      searching: false,
      serverSide: false,
      data: data_obat_rekon,
      columns: [{
          data: 'nama_obat',
          render: function(columnData, type, rowData, meta) {
            return `  
                    <input class="form-control" name="rekon_obat[` +
              meta.row + `][nama_obat]" value="` + columnData + `" required readonly>`;
          }
        }, {
          data: 'dosis',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][dosis]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: 'frekuensi',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][frekuensi]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: 'cara_beri',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][cara_beri]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: 'waktu_beri_terakhir',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][waktu_beri_terakhir]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: 'tindak_lanjut',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][tindak_lanjut]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: 'aturan_ubah_pakai',
          render: function(columnData, type, rowData, meta) {
            return `<input class="form-control" name="rekon_obat[` +
              meta.row + `][aturan_ubah_pakai]" value="` + columnData + `" required readonly>`;
          }
        },
        {
          data: null,
          className: 'text-center',
          width: '50px',
          render: function(columnData, type, rowData, meta) {
            return ` <button type="button" id="id_` + meta.row + `" class="btn btn-danger btn-delete-row" ><i class="fa fa-minus"></i></button>`;
          }
        }
      ],
      rowCallback: function(row, data, displayNum, displayIndex, index) {
        let api = this.api();
        $(row).find('#id_' + index).click(function() {
          var v = $(this).data('v')
          api.row($(this).closest("tr").get(0)).remove().draw();
          data_obat_rekon.splice(index, 1);
          $('#rekon_obat_data').val(JSON.stringify(data_obat_rekon));
        });
      },
    });
  }

  function submitFormRekonObat() {
    let data_obat_rekon = JSON.parse($('#rekon_obat_data').val());

    var newPJ = $("#formRekonData").serializeArray();
    data_obat_rekon.push(objectifyForm(newPJ));
    $('#rekon_obat_data').val(JSON.stringify(data_obat_rekon));

    $('#dt-rekon-obat').DataTable().clear(); // Clear your data
    $('#dt-rekon-obat').DataTable().rows.add(data_obat_rekon); // Add rows with newly updated data
    $('#dt-rekon-obat').DataTable().draw(); //then draw it

    $('#rekonModal').modal('hide');
  }

  function loadSignature() {
    // Signature DPJP
    var wrapper = document.getElementById("signature_rekon_obat_dpjp");
    var clearButton = wrapper.querySelector("#clear_btn_dpjp");
    var savePNGDpjsp = wrapper.querySelector("#save_ttd_dpjp");
    var canvas = wrapper.querySelector("canvas");
    var c = document.getElementById("the_canvas");

    var signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function(event) {
      document.getElementById("signature_dpjp").value = '';
      signaturePad.clear();
    });

    savePNGDpjsp.addEventListener("click", function(event) {
      if (signaturePad.isEmpty()) {
        alert("Please provide signature first.");
        event.preventDefault();
      } else {
        var canvas = document.getElementById("the_canvas");
        var dataUrl = canvas.toDataURL();
        document.getElementById("signature_dpjp").value = dataUrl;
      }
    });


    // Signature PPDS
    var wrapper = document.getElementById("signature_rekon_obat_ppds");
    var clearButtonPPDS = wrapper.querySelector("#clear_btn_ppds");
    var savePNGPpds = wrapper.querySelector("#save_ttd_ppds");
    var canvasPpds = wrapper.querySelector("canvas");
    var c = document.getElementById("the_canvas_ppds");

    var signaturePadPPDS = new SignaturePad(canvasPpds);

    clearButtonPPDS.addEventListener("click", function(event) {
      document.getElementById("signature_ppds").value = '';
      signaturePadPPDS.clear();
    });

    savePNGPpds.addEventListener("click", function(event) {
      if (signaturePadPPDS.isEmpty()) {
        alert("Please provide signature first.");
        event.preventDefault();
      } else {
        var canvas = document.getElementById("the_canvas_ppds");
        var dataUrl = canvas.toDataURL();
        document.getElementById("signature_ppds").value = dataUrl;
      }
    });

    // Signature PPDS
    var wrapper = document.getElementById("signature_rekon_obat_perawat");
    var clearButtonPerawat = wrapper.querySelector("#clear_btn_perawat");
    var savePNGPerawat = wrapper.querySelector("#save_ttd_perawat");
    var canvasPerawat = wrapper.querySelector("canvas");
    var c = document.getElementById("the_canvas_perawat");

    var signaturePadPerawat = new SignaturePad(canvasPerawat);

    clearButtonPerawat.addEventListener("click", function(event) {
      document.getElementById("signature_perawat").value = '';
      signaturePadPerawat.clear();
    });

    savePNGPerawat.addEventListener("click", function(event) {
      if (signaturePadPerawat.isEmpty()) {
        alert("Please provide signature first.");
        event.preventDefault();
      } else {
        var canvas = document.getElementById("the_canvas_perawat");
        var dataUrl = canvas.toDataURL();
        document.getElementById("signature_perawat").value = dataUrl;
      }
    });



  }

  function storeNeonatus() {
    neko_proses();
    Swal.fire({
      title: "Simpan pengkajian awal Neonatus?",
      icon: 'warning',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: "Ya, simpan !",
      cancelButtonText: "Tidak, Batalkan",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "{{route('perawat.neonatus.store')}}",
          type: "POST",
          data: $('#neonatus_form').serialize(),
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