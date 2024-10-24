<script>
    $(document).ready(function() {

        function objectifyForm(formArray) {
            //serialize data function
            var returnArray = {};
            for (var i = 0; i < formArray.length; i++) {
                returnArray[formArray[i]['name']] = formArray[i]['value'];
            }
            return returnArray;
        }

        let data_pj = @json(isset($pjawab_pasien) ? $pjawab_pasien : []);

        $('#showModalPJ').click(function(e) {
            e.preventDefault();
            if (data_pj.length == 3) {
                neko_notify('Error', 'Data Penanggung Jawab tidak boleh melebihi 3');
            } else {
                $('#pjModal').modal('show');
            }
        });

        const dt_pj = $('#dt-pj').DataTable({
            ordering: false,
            info: false,
            paging: false,
            searching: false,
            serverSide: false,
            data: data_pj,
            columns: [{
                    data: 'reg_pjawab_nama',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_pjawab_nama]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'reg_hub_pasien',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_hub_pasien]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'reg_pjawab_nohp',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_pjawab_nohp]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'reg_pjawab_nik',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_pjawab_nik]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'tanggal_lahir',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][tanggal_lahir]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'jenis_kelamin',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][jenis_kelamin]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'pekerjaan_keluarga',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][pekerjaan_keluarga]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'reg_pjawab_bayar',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_pjawab_bayar]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'reg_pjawab_alamat',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" name="pj_pasien[` +
                            meta.row + `][reg_pjawab_alamat]" value="` + columnData + `" required readonly>`;
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
                    data_pj.splice(index, 1);
                });
            },
        });

        let genderMap = {
            '0001^X': 'Tidak Diketahui',
            '0001^M': 'Laki-laki',
            '0001^F': 'Perempuan',
            '0001^U': 'Tidak Dapat Ditentukan',
            '0001^N': 'Tidak Mengisi'
        };

        let autocomplete = $('#reg_pjawab_nama').easyAutocomplete({
            adjustWidth: false,
            url: `{{ route('api.get-pasien-keluarga') }}`,
            getValue: function(element) {
                return element.FamilyName ? element.FamilyName : element.PatientName;
            },
            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                }
            },
            preparePostData: function(data) {
                data.q = $('#reg_pjawab_nama').val();
                data.mrn = $('#reg_medrec').val();
                data._token = '{{ csrf_token() }}';
                return data;
            },
            list: {
                onClickEvent: function() {
                    var e = $.Event("keyup", {
                        keyCode: 13
                    });
                    autocomplete.trigger(e);
                }
            }
        }).on('keyup', function(e) {
            e.stopPropagation();
            if (e.keyCode == 13) {
                e.preventDefault();
                if ($(this).val() !== '') {
                    let selectedItem = autocomplete.getSelectedItemData();
                    let name = selectedItem.PatientName;
                    let hub = selectedItem.GCRelationShip;
                    let sex = genderMap[selectedItem.Sex] || selectedItem.Sex;
                    let date_of_birth = selectedItem.DateOfBirth;
                    let ssn = selectedItem.SSN;
                    let phone = selectedItem.PhoneNo;
                    let address = selectedItem.Address;
                    let job = selectedItem.Job;

                    $('#reg_hub_pasien').val(hub).trigger("change");
                    $('#pjModal').find('input[name="reg_pjawab_nohp"]').val(phone);
                    $('#pjModal').find('input[name="reg_pjawab_nik"]').val(ssn);
                    $('#pjModal').find('input[name="reg_pjawab_alamat"]').val(address);
                    $('#pjModal').find('input[name="tanggal_lahir"]').val(date_of_birth);
                    $('#pjModal').find('#jenis_kelamin').val(sex).trigger("change");
                    $('#pjModal').find('input[name="pekerjaan_keluarga"]').val(job);
                }
            }
        });


        $("#requestpjdata").submit(function(e) {
            e.preventDefault();

            var newPJ = $("#requestpjdata").serializeArray();
            data_pj.push(objectifyForm(newPJ));
            console.log(data_pj);
            $("#requestpjdata").trigger('reset');

            dt_pj.clear(); // Clear your data
            dt_pj.rows.add(data_pj); // Add rows with newly updated data
            dt_pj.draw(); //then draw it

            $('#pjModal').modal('hide');
        });
    });
</script>

<script>
    function checkWNI() {
        var kategori = $('#kategori').val()
        console.log(kategori)
        if (kategori == "WNI") {
            $('#labelkitas').hide()
            $('#kitas').hide()
            $('#colkitas').hide()

            $('#labelktp').show()
            $('#ssn').show()
            $('#colktp').show()
        } else {
            $('#labelktp').hide()
            $('#ssn').hide()
            $('#colktp').hide()
            $('#labelkitas').show()
            $('#kitas').show()
            $('#colkitas').hide()
        }
    }
</script>
<script>
    $(async function() {
        $('#labelkitas').hide()
        $('#kitas').hide()
        $.ajax({
            url: `{{route('get.bussinesspartner')}}`,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                data.data.forEach(function(item) {
                    $("#reg_cara_bayar")
                        .append($("<option></option>")
                            .attr("value", item.BusinessPartnerID)
                            .text(item.BusinessPartnerName));

                    $("#reg_cara_bayar").select2({
                        placeholder: "Pilih Cara Bayar",
                        // allowClear: true,
                    });
                })

            }
        });

        $.ajax({
            url: `{{route('get.provinsi')}}`,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                data.data.forEach(function(item) {
                    $("#provinsi")
                        .append($("<option></option>")
                            .attr("value", item.kode)
                            .text(item.nama));
                })
            }
        })

        $('#nama').prop('disabled', false);
        $('#tempat_lahir').prop('disabled', false);
        $('#tanggal_lahir').prop('disabled', false);
        $('#jenis_kelamin').prop('disabled', false);
        $('#kategori').prop('disabled', false);
        $('#gol_darah').prop('disabled', false);
        $('#ssn').prop('disabled', false);
        $('#agama').prop('disabled', false);
        $('#kebangsaan').prop('disabled', false);
        $('#suku').prop('disabled', false);
        $('#status_nikah').prop('disabled', false);
        $('#pekerjaan').prop('disabled', false);
        $('#pendidikan').prop('disabled', false);
        $('#telepon_1').prop('disabled', false);
        $('#provinsi').prop('disabled', false);
        $('#kota').prop('disabled', false);
        $('#alamat').prop('disabled', false);
        // $("#tanggal_lahir").datepicker()

        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: "bootstrap4",
        });



        $("#reg_diagnosis").select2({
            theme: "bootstrap4",
            placeholder: "Cari Diagnosis",
            ajax: {
                delay: 500,
                url: "{{ url('api/get-icd10') }}",
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.map((d) => {
                            d.id = d.ID_ICD10
                            d.text = d.NM_ICD10
                            return d
                        })
                    }
                }
            },
            templateResult: function(data) {
                if (data.loading) {
                    return data.text;
                }
                return `(${data.ID_ICD10}) ${data.NM_ICD10}`
            },
            templateSelection: function(data) {
                return data.text
            }
        });


        $("#reg_medrec").select2({
            theme: "bootstrap4",
            placeholder: "Cari MRN",
            ajax: {
                delay: 500,
                url: "{{ url('api/get-pasien') }}",
                data: function(params) {
                    return {
                        search: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.map((d) => {
                            d.id = d.MedicalNo
                            d.text = d.MedicalNo
                            return d
                        })
                    };
                }
            },
            templateResult: function(data) {
                if (data.loading) {
                    return data.text;
                }
                return `${data.MedicalNo} ${data.PatientName}`;
            },
            templateSelection: function(data) {
                setDetailPasien(data);
                return data.text;
            }
        });

        // Mengatur ulang Select2 berdasarkan kategori MRN
        $("#mrn_category").change(function() {
            const selectedCategory = $(this).val();

            if (selectedCategory === 'existing') {
                $("#reg_medrec").prop("disabled", false);
                $("#reg_medrec").select2('open');
            } else if (selectedCategory === 'newborn') {
                $("#reg_medrec").prop("disabled", true);
                $("#reg_medrec").val('');

                // Handle MRN bayi baru lahir logic here
                $.ajax({
                    url: "{{ url('api/generate-newborn-mrn') }}",
                    success: function(result) {
                        $("#reg_medrec").val(result).trigger('change');
                    },

                    error: function(response) {
                        $("#reg_medrec").val('').trigger('change');
                    }
                });
            }
        });

        @if(old('reg_medrec'))
        $.ajax({
            url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
            success: function(result) {
                setDetailPasien(result[0]);
            }
        });
        @endif


        // $("#reg_medrec").select2({
        //     theme: "bootstrap4",
        //     placeholder: "Cari MRN",
        //     ajax: {
        //         delay: 500,
        //         url: "{{ url('api/get-pasien') }}",
        //         //type:"POST",
        //         // url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/data",
        //         // headers: {
        //         //     "x-username" : "rsud_fatimah",
        //         //     "x-password" : "RsUdF4T!mah"
        //         // },
        //         data: function (params) {
        //             return {
        //                 search: params.term
        //             };
        //         },
        //         processResults: function (data) {
        //             return {
        //                 results: data.map((d) => {
        //                     d.id = d.MedicalNo
        //                     d.text = d.MedicalNo
        //                     return d
        //                 })
        //             }
        //         },
        //         // success:function(r){
        //         //     console.log("{{ old('medrec') }}")
        //         //     console.log(r)
        //         //     $("#medrec").val("{{ old('medrec') }}").trigger('change')
        //         // }
        //     },
        //     templateResult: function (data) {
        //         if (data.loading) {
        //             return data.text;
        //         }
        //         return `${data.MedicalNo} ${data.PatientName}`
        //     },
        //     templateSelection: function (data) {
        //         setDetailPasien(data)
        //         return data.text
        //     }
        // });

        // @if(old('reg_medrec'))
        // $.ajax({
        //     url: "{{ url('api/get-pasien') }}?search={{ old('reg_medrec') }}",
        //     success: function (result) {
        //         setDetailPasien(result[0])
        //     }
        // })
        // @endif


        function setDetailPasien(data) {
            $("#nama").val(data.PatientName)
            $("#catatan_khusus").val(data.Notes)
            $("#medrec_lama").val(data.OldMedicalNo)
            $("#tempat_lahir").val(data.CityOfBirth)
            $("#tanggal_lahir").val(data.DateOfBirth ? moment(data.DateOfBirth).format("YYYY-MM-DD") : "")
            $("#jenis_kelamin").val(data.GCSex)
            $("#gol_darah").val(data.GCBloodType)
            $("#rhesus").val(data.BloodRhesus)
            $("#kategori").val(data.Nationality)
            $("#ssn").val(data.SSN)
            $("#agama").val(data.GCReligion)
            $("#kebangsaan").val(data.GCNationality)
            $("#suku").val(data.GCRace)
            $("#status_nikah").val(data.GCMaritalStatus)
            $("#pekerjaan").val(data.GCOccupation)
            $("#pendidikan").val(data.GCEducation)
            $("#telepon_1").val(data.MobilePhoneNo1)
            $("#telepon_2").val(data.MobilePhoneNo2)
            $("#provinsi").val(data.MobilePhoneNo2)
            $("#kota").val(data.MobilePhoneNo2)
            $("#alamat").val(data.PatientAddress)
        }

        // $("#bed").on('change', function () {
        //     const bed = $(this).find("option:selected").data('bed')
        //     if (bed) {
        //         console.log(bed)
        //         $("#service_unit").val(bed.service_unit_id).trigger('change')
        //         $("#reg_ruangan").val(bed.room_id).trigger('change')
        //         $("#room_class").val(bed.class_code).trigger('change')
        //     } else {
        //         $("#service_unit").val("").trigger('change')
        //         $("#reg_ruangan").val("").trigger('change')
        //         $("#room_class").val("").trigger('change')
        //     }
        // })

        $("#room_class").on('change', function() {
            var tarif_ruangan = document.getElementById('tarif_ruangan')
            console.log(tarif_ruangan)
            $.ajax({
                url: "{{route('cek.tarif.ruangan.baru')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "idruangan": $(this).val()
                },
                success: function(r) {
                    console.log(r.data.kelas_baru[0]['tarif_kelas'])
                    tarif_ruangan.value = r.data.kelas_baru[0]['tarif_kelas']
                }
            })
            //tarif_ruangan.value=$(this).find("option:selected").data('room_class')
        })



        $('#ckBaru').click(function() {
            if (this.checked) {
                $('#nama').prop('disabled', false);
                $('#tempat_lahir').prop('disabled', false);
                $('#tanggal_lahir').prop('disabled', false);
                $('#jenis_kelamin').prop('disabled', false);
                $('#kategori').prop('disabled', false);
                $('#gol_darah').prop('disabled', false);
                $('#ssn').prop('disabled', false);
                $('#agama').prop('disabled', false);
                $('#kebangsaan').prop('disabled', false);
                $('#suku').prop('disabled', false);
                $('#status_nikah').prop('disabled', false);
                $('#pekerjaan').prop('disabled', false);
                $('#pendidikan').prop('disabled', false);
                $('#telepon_1').prop('disabled', false);
                $('#provinsi').prop('disabled', false);
                $('#kota').prop('disabled', false);
                $('#alamat').prop('disabled', false); // If checked enable item
            } else {
                $('#nama').prop('disabled', true);
                $('#tempat_lahir').prop('disabled', true);
                $('#tanggal_lahir').prop('disabled', true);
                $('#jenis_kelamin').prop('disabled', true);
                $('#kategori').prop('disabled', true);
                $('#gol_darah').prop('disabled', true);
                $('#ssn').prop('disabled', true);
                $('#agama').prop('disabled', true);
                $('#kebangsaan').prop('disabled', true);
                $('#suku').prop('disabled', true);
                $('#status_nikah').prop('disabled', true);
                $('#pekerjaan').prop('disabled', true);
                $('#pendidikan').prop('disabled', true);
                $('#telepon_1').prop('disabled', true);
                $('#provinsi').prop('disabled', true);
                $('#kota').prop('disabled', true);
                $('#alamat').prop('disabled', true); // If checked disable item
            }
        });
    })
</script>

<script>
    function asal_pasien() {
        //get value departemen asal
        var departemen_asal = document.getElementById('departemen_asal')
        var departemen_asal_value = departemen_asal.value
        const nomed = $('#reg_medrec').val()

        if (departemen_asal_value == 'From Outpatient') {
            $.ajax({
                url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/" + nomed,
                type: "GET",
                success: function(r) {
                    if (r == 'Tidak ada instruksi ke rawat inap') {} else {
                        //check r is empty or not
                        var link_regis = document.getElementById('link_regis')
                        link_regis.innerHTML = ''
                        var option = document.createElement('option')
                        option.value = r.ranap_reg;
                        option.innerHTML = r.ranap_reg;
                        link_regis.appendChild(option)
                    }
                }
            })
        }
    }

    function cariRMMaster() {
        sinkronData("tester")
        //ajax with header to get data from http://rsud.sumselprov.go.id/master-simrs/api/pasien/detail,
        // for(i=4;i<=59;i++){
        //     var loading = document.getElementById('loading')
        //     loading.innerHTML = '<div class="spinner-border text-primary" role="status">\n' +
        //         '  <span class="sr-only">Loading...</span>\n' +
        //         '</div>'
        //     $.ajax({
        //         url:"http://rsud.sumselprov.go.id/master-simrs/api/pasien/data?page="+i,
        //         type:"POST",
        //         headers: { 'x-username': 'rsud_fatimah' , 'x-password': 'RsUdF4T!mah'},
        //         data:{
        //             "no_rm":$('#reg_medrec').val()
        //         },
        //         success:function(r){
        //             var data=r.metadata.data.data
        //
        //         }
        //     })
        //
        // }
    }

    function sinkronData(data) {
        //create loading
        //console.log(data)


        $.ajax({
            url: "{{route('pasien.spaira')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "data": JSON.stringify(data)
            },
            success: function(r) {
                console.log(r)
                if (r.status == "success") {
                    alert('Data Berhasil Disinkronisasi')
                } else {
                    alert('Data Gagal Disinkronisasi')
                }
                loading.innerHTML = ''
            }
        })
    }
</script>
<script>
    function cekruangan() {
        //load ruangan from api
        $.ajax({
            url: "{{route('ketersediaan.ruangan')}}",
            type: "GET",
            success: function(r) {
                console.log(r)
                //append to row table in modal ketersediaan ruangan
                var tbody = document.getElementById('body-ketersediaan')
                tbody.innerHTML = ''
                for (var i = 0; i < r.data.length; i++) {
                    var tr = document.createElement('tr')
                    var td1 = document.createElement('td')
                    td1.innerHTML = r.data[i].nomor_bed
                    tr.appendChild(td1)
                    var td2 = document.createElement('td')
                    td2.innerHTML = r.data[i].nama_pavilun
                    tr.appendChild(td2)
                    var td3 = document.createElement('td')
                    td3.innerHTML = r.data[i].nama_ruangan
                    tr.appendChild(td3)
                    var td5 = document.createElement('td')
                    td5.innerHTML = r.data[i].nama_kelas
                    tr.appendChild(td5)
                    var td6 = document.createElement('td')
                    if (r.data[i].status_ketersediaan == 1) {
                        td6.innerHTML = "ready"
                    } else if (r.data[i].status_ketersediaan == 2) {
                        td6.innerHTML = "Dipakai"
                    } else if (r.data[i].status_ketersediaan == 3) {
                        td6.innerHTML = "Cleaning"
                    }
                    tr.appendChild(td6)

                    /* var td7=document.createElement('td')
                     if(r.data[i].is_temporary==0){
                         td7.innerHTML="Bukan Temporary"
                     }else{
                         td7.innerHTML="Temporary"
                     }

                     tr.appendChild(td7)*/
                    if (r.data[i].status_ketersediaan == 1) {
                        var td4 = document.createElement('td')
                        var buttonpilih = document.createElement('button')
                        buttonpilih.setAttribute('class', 'btn btn-primary')
                        buttonpilih.setAttribute('onclick', 'pilihRuangan(' + r.data[i].id_paviliun + ',' + r.data[i].id + ')')
                        buttonpilih.innerHTML = 'Pilih'
                        td4.appendChild(buttonpilih)
                        tr.appendChild(td4)
                    }

                    tbody.appendChild(tr)
                }


                //show modal ruangan-modal
                $('#ruangan-modal').modal('show')
            }
        })


    }

    function pilihRuangan(id_paviliun, id_ruangan) {
        // set select option ruangan
        $('#reg_ruangan').val(id_paviliun)
        var fieldIdKetersediaan = document.getElementById('id_ketersediaan')
        fieldIdKetersediaan.value = id_ruangan
        $('#ruangan-modal').modal('hide')

    }
</script>

<script>
    function cariDokumen() {
        const idbussiness = $('#reg_cara_bayar').val()
        $.ajax({
            url: "{{route('get.document')}}",
            type: "POST",
            data: {
                "id_bussines": idbussiness
            },
            beforeSend: function() {
                $('#reg_no_dokumen').val('Loading')
            },
            error: function() {
                $('#reg_no_dokumen').val('')
            },
            success: function(r) {
                if (r.data[0]) {
                    $('#reg_no_dokumen').val(r.data[0].DocumentNo)
                } else {
                    $('#reg_no_dokumen').val('')
                }
            }
        })
    }

    function getKotaKabupaten() {
        var id_provinsi = $('#provinsi').val()
        $.ajax({
            url: "{{route('get.regency')}}",
            type: "POST",
            data: {
                "id_provinsi": id_provinsi
            },
            success: function(r) {
                var kota = document.getElementById('kota')
                kota.innerHTML = ''
                for (var i = 0; i < r.data.length; i++) {
                    var option = document.createElement('option')
                    option.setAttribute('value', r.data[i].kode)
                    option.innerHTML = r.data[i].nama
                    kota.appendChild(option)
                }
            }
        })
    }

    function getDistricts() {
        var id_kota = $('#kota').val()
        $.ajax({
            url: "{{route('get.district')}}",
            type: "POST",
            data: {
                "id_kota": id_kota
            },
            success: function(r) {
                var kecamatan = document.getElementById('kecamatan')
                kecamatan.innerHTML = ''
                for (var i = 0; i < r.data.length; i++) {
                    var option = document.createElement('option')
                    option.setAttribute('value', r.data[i].kode)
                    option.innerHTML = r.data[i].nama
                    kecamatan.appendChild(option)
                }
            }
        })
    }

    function getVillage() {
        var id_kecamatan = $('#kecamatan').val()
        $.ajax({
            url: "{{route('get.village')}}",
            type: "POST",
            data: {
                "id_kecamatan": id_kecamatan
            },
            success: function(r) {
                var kelurahan = document.getElementById('desa')
                kelurahan.innerHTML = ''
                for (var i = 0; i < r.data.length; i++) {
                    var option = document.createElement('option')
                    option.setAttribute('value', r.data[i].kode)
                    option.innerHTML = r.data[i].nama
                    kelurahan.appendChild(option)
                }
            }
        })
    }
</script>