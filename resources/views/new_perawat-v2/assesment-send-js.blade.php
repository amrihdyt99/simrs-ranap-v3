<script>
    // assesment
    function simpanAssementSatu() {
        neko_proses();
        $.ajax({
            url: "{{route('add.assesmentawal')}}",
            type: "POST",
            data: $('#entry_asesmen').serialize() + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();

                getAlertAlergi(regno)
                getAlertJatuh(regno)
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addMasalah() {
        neko_proses();
        $.ajax({
            url: "{{route('add.Masalah')}}",
            type: "POST",
            data: $('#entry_asesmen').serialize() + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addskrinninggizi() {
        neko_proses();

        var skorDewasa = calculateGiziDewasaScore();
        var skorAnak = calculateGiziAnakScore();

        $.ajax({
            url: "{{route('add.skrinninggizi')}}",
            type: "POST",
            data: $('#entry_asesmen').serialize() + "&medrec=" + medrec + "&total_skor_dewasa=" + skorDewasa,
            success: function(data) {
                // neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
        $.ajax({
            url: "{{route('add.skrinninggizianak')}}",
            type: "POST",
            data: $('#entry_asesmen').serialize() + "&medrec=" + medrec + "&total_skor_anak=" + skorAnak,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // nyeri
    function addskrinningnyeri() {
        neko_proses();
        $.ajax({
            url: "{{route('add.skrinningnyeri')}}",
            type: "POST",
            data: $('#entry-nyeri').serialize() + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // edukasi
    function addedukasipasien() {
        neko_proses();
        $.ajax({
            url: "{{route('add.edukasipasien')}}",
            type: "POST",
            data: $('#entry-edukasi').serialize() + "&medrec=" + medrec + "&user_id=" + "{{auth()->user()->id}}",
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })

    }

    // edukasi pasien perawat
    function addedukasipasienperawat(_elm = '#entry-edukasi-pasien-perawat', _type = '') {
        var ttdSasaran = signaturePadSasaran ? signaturePadSasaran.toDataURL() : $('[name="ttd_sasaran"]').val();
        var ttdEdukator = signaturePadEdukator ? signaturePadEdukator.toDataURL() : $('[name="ttd_edukator"]').val();

        neko_proses();

        var formData = new FormData($(_elm)[0]);
        formData.append('reg_no', regno);
        formData.append('medrec', medrec);
        formData.append('ttd_sasaran', ttdSasaran);
        formData.append('ttd_edukator', ttdEdukator);
        formData.append('user_id', "{{auth()->user()->id}}");

        let url = "{{route('add.edukasi_pasien_perawat')}}"

        if (_type == 'dokter') {
            url = '{{url("")}}/api/edukasi_dokter'
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();

                if (_type == 'dokter') {
                    getEdukasi('', _type)
                } else {
                    $('.left-tab.active').click();
                }
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    // resiko-jatuh-geriatri
    function addresikojatuhGeriatri() {
        var userId = "{{ auth()->user()->id }}";
        var userShift = "{{ session('user_shift') }}";
        neko_proses();
        $.ajax({
            url: "{{route('add.resiko.jatuh.geriatri')}}",
            type: "POST",
            data: $('#entry-resiko-jatuh-geriatri').serialize() +
                "&medrec=" + medrec +
                "&regno=" + regno +
                "&user_id=" + userId +
                "&shift=" + userShift,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // resiko-jatuh-humpty-dumpty
    function addresikojatuhHumptyDumpty() {
        var userId = "{{ auth()->user()->id }}";
        var userShift = "{{ session('user_shift') }}";

        neko_proses();
        $.ajax({
            url: "{{route('add.resiko.jatuh.humptydumpty')}}",
            type: "POST",
            data: $('#entry-resiko-jatuh-humpty_dumpty').serialize() +
                "&medrec=" + medrec +
                "&regno=" + regno +
                "&user_id=" + userId +
                "&shift=" + userShift,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // resiko-jatuh-neonatus
    function addresikojatuhNeonatus() {
        var userId = "{{ auth()->user()->id }}";
        var user_name = "{{ auth()->user()->name }}";
        var userShift = "{{ session('user_shift') }}";

        var formData = new FormData($('#entry-resiko-jatuh-neonatus')[0]);

        formData.append('medrec', medrec);
        formData.append('regno', regno);
        formData.append('user_id', userId);
        formData.append('user_name', user_name);
        formData.append('shift', userShift);
        formData.append('ttd_keluarga', signaturePadKeluargaNeonatus.toDataURL());
        formData.append('ttd_petugas', signaturePadPetugasNeonatus.toDataURL());

        neko_proses();

        $.ajax({
            url: "{{ route('add.resiko.jatuh.neonatus') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            }
        });
    }

    // resiko-jatuh-skala-morse
    function addresikojatuhSkalaMorse() {
        var userId = "{{ auth()->user()->id }}";
        var userShift = "{{ session('user_shift') }}";

        neko_proses();
        $.ajax({
            url: "{{route('add.resiko.jatuh.skalamorse')}}",
            type: "POST",
            data: $('#entry-resiko-jatuh-skala-morse').serialize() +
                "&medrec=" + medrec +
                "&regno=" + regno +
                "&user_id=" + userId +
                "&shift=" + userShift,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // SOAP
    function addbtnSaveSoap() {
        $.ajax({
            url: `{{route('add.soap.new.perawat')}}`,
            type: 'POST',
            dataType: 'json',
            data: $('#form-entry-soap').serialize() + "&soaper_perawat=" + "{{auth()->user()->perawat_id}}" + '&nama_ppa=' + "{{auth()->user()->name}}&med_rec_no=" + medrec,
            success: function(data) {
                if (data == 404) {
                    alert('Anda tidak punya akses untuk menyimpan asesmen');
                } else {
                    $('#modalSOAP').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    neko_simpan_success();
                    $('.left-tab.active').click();
                }
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    // asesmen Dewasa
    function asesmenDewasaSubmit() {
        neko_proses();
        $.ajax({
            url: "{{route('perawat.store_assesment_dewasa')}}",
            type: "POST",
            data: $('#form_assesment_dewasa').serialize() + "&medrec=" + medrec + "&regno=" + regno,
            success: function(data) {
                neko_simpan_success();
                getAssementDewasa();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // asesmen anak
    function simpanAssementAnak() {
        neko_proses();
        $.ajax({
            url: "{{route('add.assesmentawalanak')}}",
            type: "POST",
            data: $('#form_assesment_anak').serialize() + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // asuhan gizi dewasa
    function simpanAsuhanGiziDewasa() {
        neko_proses();
        $.ajax({
            url: "{{route('perawat.store_assesment_gizi_dewasa')}}",
            type: "POST",
            data: $('#form_assesment_gizi_dewasa').serialize() + '&diagnosa=' + $('#t_asuhan_gizi_dewasa').html() + '&monitoring=' + $('#t_monitoring_asuhan_gizi_dewasa').html() + "&medrec=" + medrec + "&regno=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    // Nursing Note
    function addNursingNote() {
        if (confirm("Apakah anda yakin akan menyimpan data ini?")) {
            neko_proses();
            $.ajax({
                url: "{{route('add.nursing.note')}}",
                type: "POST",
                data: $('#form-nursing-note').serialize() + "&medrec=" + medrec + "&reg_no=" + regno,
                success: function(data) {
                    neko_simpan_success();
                    getNursingNote();
                },
                error: function(data) {
                    neko_simpan_error_noreq();
                },
            })
        }
    }

    // Admin Nurse
    function ordertindakan() {
        neko_proses();
        var table = document.getElementById("body-table-order-nurse");
        var data = [];
        for (var i = 0, row; row = table.rows[i]; i++) {
            var item = {
                "item_code": row.cells[0].innerHTML,
                "item_name": row.cells[1].innerHTML,
                "qty": row.cells[2].innerHTML,
                "price": row.cells[3].innerHTML,
                "total": row.cells[4].innerHTML,
            };
            data.push(item);
        }
        var perawat_id = "{{auth()->user()->perawat_id}}";
        $.ajax({
            type: "POST",
            url: "{{ route('add.ordertindakanperawat') }}",
            data: {
                "datajson": data,
                "regno": regno,
                "userid": perawat_id
            },
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    // transfusi datah
    function simpanMonitoringDarah() {
        neko_proses();
        $.ajax({
            url: "{{route('add.monitoringtransfusidarah')}}",
            type: "POST",
            data: $('#form-transfusi').serialize() + "&medrec=" + medrec + "&reg_no=" + regno,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // obgyn
    function addAssesmentObgyn() {
        neko_proses();
        $.ajax({
            url: "{{route('add.assesmentobgyn')}}",
            type: "POST",
            data: $('#form_assesment_obgyn').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addSkorSadPerson() {
        neko_proses();
        $.ajax({
            url: "{{route('add.skorsadperson')}}",
            type: "POST",
            data: $('#form_skor_sad_person').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addRiwayatMenstruasi() {
        neko_proses();
        $.ajax({
            url: "{{route('add.riwayatmenstruasi')}}",
            type: "POST",
            data: $('#form_riwayat_menstruasi').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addstatusperkawinan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.statusperkawinan')}}",
            type: "POST",
            data: $("#form-riwayat-perkawinan").serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addriwayatkehamilan() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.riwayatkehamilan') }}",
            type: "POST",
            data: $('#form-riwayat-kehamilan').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addskrininggiziobgyn() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.skrininggiziobgyn') }}",
            type: "POST",
            data: $('#form-skrining-gizi-obgyn').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addskalawongbaker() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.skalawongbeker') }}",
            type: "POST",
            data: $('#form-skala-wong-baker').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addbehaviorscaleobgyn() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.behaviorscaleobgyn') }}",
            type: "POST",
            data: $('#form-behavior-pain-scale').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addadl() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.adlobgyn') }}",
            type: "POST",
            data: $('#form-adl').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addresikojatuhobgyn() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.skriningresikojatuhobgyn') }}",
            type: "POST",
            data: $('#form-resiko-jatuh-obgyn').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addpengkajiankulit() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.pengkajiankulit') }}",
            type: "POST",
            data: $('#form-pengkajian-kulit').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addpengkajiankebutuhanaktifitas() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.pengkajiankebutuhanaktifitas') }}",
            type: "POST",
            data: $('#form-kebutuhan-aktifitas').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addpengkajiankebutuhannutrisi() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.pengkajiankebutuhannutrisi') }}",
            type: "POST",
            data: $('#form-kebutuhan-nutrisi-cairan').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addkebutuhaneliminasi() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.pengkajiankebutuhaneliminasi') }}",
            type: "POST",
            data: $('#form-kebutuhan-eliminasi').serialize() + "&med_rec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&no_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function addlaporanpersalinan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.laporanpersalinanobgyn')}}",
            type: "POST",
            data: $("#form_laporan_persalinan").serialize() + "&reg_medrec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&reg_no=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // Nursing
    function addFluidBalance() {
        neko_proses();
        $.ajax({
            url: "{{route('add.fluidbalance.new.perawat')}}",
            type: "POST",
            data: {
                reg_no: regno,
                med_rec: medrec,

                cairan_transfusi: $('#cairan_transfusi').val(),
                jumlah_transfusi: $('#jumlah_transfusi').val(),
                minum: $('#minum').val(),
                sonde: $('#sonde').val(),
                urine: $('#urine').val(),
                drain: $('#drain').val(),
                iwl_muntah: $('#iwl_muntah').val(),
                jumlah: $('#jumlah').val(),
                tanggal_pemberian: $('#tanggal_waktu_pemberian').val(),
                user_shift: "{{ session('user_shift') }}",
            },
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function addVital(kategori, formid) {
        neko_proses();
        var dataString = "";

        if (kategori === 'blood pressure') {
            var input = document.getElementsByName('datablood[]');
            dataString = input[0].value + "/" + input[1].value;
        } else {
            var input = document.getElementsByName('data[]');
            for (var i = 0; i < input.length; i++) {
                dataString += input[i].value;
            }
        }

        $.ajax({
            type: "POST",
            url: "{{ route('newperawat.addvitalsign') }}",
            data: {
                "reg_no": regno,
                "kategori": kategori,
                "med_rec": medrec,
                "data": dataString,
                "user_shift": "{{ session('user_shift') }}",
            },
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }


    function addNursingSpecialtyAll(kategori, data) {
        neko_proses();
        var dataString = "";

        $.ajax({
            type: "POST",
            url: "{{ route('newperawat.addNursingSpecialtyAll') }}",
            data: {
                "reg_no": regno,
                "med_rec": medrec,
                "kategori": kategori,
                "data": data,
                user_shift: "{{ session('user_shift') }}",

            },
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function addNursingDrugs() {
        neko_proses();

        var serializedData = $('#form_nursing_drugs').serialize();
        var medRec = medrec;
        var userId = "{{auth()->user()->id}}";
        var userShift = "{{ session('user_shift') }}";

        $.ajax({
            url: "{{route('perawat.nursing_drugs_store')}}",
            type: "POST",
            data: serializedData + "&medrec=" + medRec + "&user_id=" + userId + "&user_shift=" + userShift,
            success: function(data) {
                neko_simpan_success();
                // $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error();
            },
        });
    }


    // Catatan Keperawatan - Intra Tindakan
    function addTindakanPerawatIntra() {
        neko_proses();
        $.ajax({
            url: "{{route('add.tindakan.intra')}}",
            type: "POST",
            data: $('#form_intra_tindakan').serialize() + "&medrec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&regno=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // Pemantauan Hemodinamik - Intra Tindakan
    function addPemantauanIntra() {
        neko_proses();
        $.ajax({
            url: "{{route('add.pemantauan.intra')}}",
            type: "POST",
            data: $('#form_intra_hemodinamik').serialize() + "&medrec=" + medrec + "&user_id=" + "{{auth()->user()->id}}" + "&regno=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // physician team
    function addPhysicianTeam() {
        neko_proses();
        $.ajax({
            url: "{{ route('add.physicianteam') }}",
            type: "POST",
            data: {
                kode_dokter: $('#physician_kode_dokter').val(),
                kategori: $('#physician_kategori').val(),
                regno: regno,
            },
            success: function(data) {
                neko_simpan_success();
                getPhysicianTeam();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    // transfer internal
    function simpanTransferInternal() {
        neko_proses();
        /*
        $("#form_transfer_internal input").each(function () {
            var $this = $(this);

            $this.attr("value", $this.val());
        });
        var selected = [];
        $('form#form_transfer_internal input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('checked', true));
            }
        });
        $('form#form_transfer_internal input[type=radio]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('checked', true));
            }
        });
        */
        $.ajax({
            url: "{{ route('perawat.store_transfer_internal') }}",
            type: "POST",
            data: $('form#form_transfer_internal').serialize() + "&medrec=" + medrec + "&transfer_reg=" + regno,
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function simpanchecklist() {
        var ttdPerawat = signaturePadPerawat.toDataURL();
        var ttdPasien = signaturePadPasien.toDataURL();

        neko_proses();

        var formData = new FormData($('#entry-checklist')[0]);
        formData.append('reg_no', regno);
        formData.append('medrec', medrec);
        formData.append('ttd_perawat', ttdPerawat);
        formData.append('ttd_pasien', ttdPasien);

        $.ajax({
            url: "{{ route('add.checklist') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(xhr, status, error) {
                console.log();

                console.error("Error occurred:", status, error);
                neko_simpan_error_noreq();
            },
        });
    }

    // Pra Tindakan
    function simpanPraTindakan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.perawat_pra_tindakan')}}",
            type: "POST",
            data: $('#form_pra_tindakan').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanPaskaTindakan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.perawat_paska_tindakan')}}",
            type: "POST",
            data: $('#paska_tindakan').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanObservasiPaskaTindakan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.perawat_observasi_paska_tindakan')}}",
            type: "POST",
            data: $('#observasi_paska_tindakan').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanPemeriksaanBayi() {
        neko_proses();
        $.ajax({
            url: "{{route('add.pemeriksaan_bayi')}}",
            type: "POST",
            data: $('#pemeriksaan_bayi').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanAsesmentBayi() {
        neko_proses();
        $.ajax({
            url: "{{route('add.assesment_bayi')}}",
            type: "POST",
            data: $('#assesment_bayi').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    //simpan cathlab v2
    function simpanCathlabSignIn() {
        neko_proses();
        $.ajax({
            url: "{{route('add.cathlab_sign_in')}}",
            type: "POST",
            data: $('#cathlab_sign_in').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanCathlabTimeOut() {
        neko_proses();
        $.ajax({
            url: "{{route('add.cathlab_time_out')}}",
            type: "POST",
            data: $('#cathlab_time_out').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanCathlabSignOut() {
        neko_proses();
        $.ajax({
            url: "{{route('add.cathlab_sign_out')}}",
            type: "POST",
            data: $('#cathlab_sign_out').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanChecklistKepulangan() {
        neko_proses();
        $.ajax({
            url: "{{route('add.checklist_kepulangan')}}",
            type: "POST",
            data: $('#checklist-kepulangan').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    // Cathlab
    function simpanCathlab() {
        neko_proses();
        $("#form_cathlab input").each(function() {
            var $this = $(this);

            $this.attr("value", $this.val());
        });
        var selected = [];
        $('form#form_cathlab input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('checked', true));
            }
        });
        $('form#form_cathlab input[type=radio]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('checked', true));
            }
        });
        $.ajax({
            url: "{{ route('perawat.store_cathlab') }}",
            type: 'post',
            dataType: 'json',
            data: {
                reg: regno,
                data: $('#form_cathlab').html(),
            },
            success: function(data) {
                neko_simpan_success();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function addpemulanganpasienperawat() {
        if (confirm('apakah anda ingin menyimpan data ini?')) {
            neko_proses();
            $.ajax({
                url: "{{route('add.perawat.pemulangan.pasien')}}",
                type: "POST",
                data: $('#entry-pemulangan').serialize() + "&medrec=" + medrec + "&regno=" + regno + "&user_id=" + "{{auth()->user()->id}}",
                success: function(data) {
                    neko_simpan_success();
                },
                error: function(data) {
                    neko_simpan_error_noreq();
                },
            });
        }
    }

    function simpanMonitoringNews() {
        neko_proses();
        $.ajax({
            url: "{{route('add.monitoringnews')}}",
            type: "POST",
            data: $('#entry-news').serialize() + "&reg_no=" + regno + "&medrec=" + medrec + "&user_id=" + "{{auth()->user()->id}}",
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanInformasiTindakanMedis() {
        neko_proses();
        var formData = new FormData($('#InformasiTindakanMedis')[0]);

        formData.append('reg_no', regno);
        formData.append('medrec', medrec);
        formData.append('ttdDokter', signatureIPadDokterInformasi.toDataURL());
        formData.append('ttdPenerima', signaturePadPenerimaInformasi.toDataURL());


        $.ajax({
            url: "{{route('add.addInformasiTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }


    function simpanPersetujuanTindakanMedis() {
        neko_proses();
        var formData = new FormData($('#PersetujuanTindakanMedis')[0]);

        formData.append('reg_no', regno);
        formData.append('medrec', medrec);
        formData.append('ttd_penerima_setuju', signaturePadPenerimaSetuju.toDataURL());
        formData.append('ttd_dokter_setuju', signaturePadDokterSetuju.toDataURL());
        formData.append('ttd_keluarga_setuju', signaturePadKeluargaSetuju.toDataURL());
        formData.append('ttd_perawat_setuju', signaturePadPerawatSetuju.toDataURL());

        $.ajax({
            url: "{{route('add.PersetujuanTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        });
    }


    function simpanPenolakanTindakanMedis() {
        neko_proses();
        var formData = new FormData($('#PenolakanTindakanMedis')[0]);

        formData.append('reg_no', regno);
        formData.append('medrec', medrec);
        formData.append('ttd_penerima_penolakan', signaturePadPenerimaPenolakan.toDataURL());
        formData.append('ttd_dokter_penolakan', signaturePadDokterPenolakan.toDataURL());
        formData.append('ttd_keluarga_penolakan', signaturePadKeluargaPenolakan.toDataURL());
        formData.append('ttd_perawat_penolakan', signaturePadPerawatPenolakan.toDataURL());

        $.ajax({
            url: "{{route('add.PenolakanTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanRujukanPersiapanPasien() {
        neko_proses();
        $.ajax({
            url: "{{route('add.RujukanPersiapanPasien')}}",
            type: "POST",
            data: $('#rujukan_persiapan_pasien').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }

    function simpanRujukanSerahTerima() {
        neko_proses();
        $.ajax({
            url: "{{route('add.RujukanSerahTerima')}}",
            type: "POST",
            data: $('#RujukanSerahTerima').serialize() + "&reg_no=" + regno + "&medrec=" + medrec,
            success: function(data) {
                neko_simpan_success();
                // $('.left-tab.active').click();
            },
            error: function(data) {
                neko_simpan_error_noreq();
            },
        })
    }
</script>