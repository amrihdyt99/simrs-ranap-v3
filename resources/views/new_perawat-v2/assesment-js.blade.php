@include('new_perawat-v2.intruksi-harian-js')
<script>
    var $level_ = "{{auth()->user()->level_user}}";
    var $user_dokter_ = "{{auth()->user()->dokter_id}}";
    var $user_ = "{{auth()->user()->id}}";
    var $user_perawat_ = "{{auth()->user()->perawat_id}}";
    var df_loading_anim = `<svg width="50" height="50" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
            <stop stop-color="#7688a7" stop-opacity="0" offset="0%"/>
            <stop stop-color="#7688a7" stop-opacity=".631" offset="63.146%"/>
            <stop stop-color="#7688a7" offset="100%"/>
            </linearGradient>
        </defs>
        <g fill="none" fill-rule="evenodd">
            <g transform="translate(1 1)">
            <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 18 18"
                    to="360 18 18"
                    dur="0.9s"
                    repeatCount="indefinite" />
            </path>
            <circle fill="#7688a7" cx="36" cy="18" r="1">
                <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 18 18"
                    to="360 18 18"
                    dur="0.9s"
                    repeatCount="indefinite" />
            </circle>
            </g>
        </g>
    </svg>`;
    var df_loading = `<div class="text-center py-5"><p class="m-0">Sedang memproses data. Mohon tunggu... </p>${df_loading_anim}</div>`;
    var df_error = `<div class="text-center py-5"><p class="m-0 mb-3">Terjadi kesalahan sistem! Mohon untuk me-refresh halaman ini.</p>
        <a href="{{ url()->current() }}" class="btn btn-sm btn-danger"><i class="mr-2 fa fa-refresh"></i> Refresh</a>
    </div>`;
    var $poli_ = "{{session()->get('poli_kode')}}";
    var regno = "{{$reg}}";
    var medrec = "{{$dataPasien->MedicalNo}}";
    var kategori_pasien = "{{$dataPasien->kategori_pasien}}";
    var tgl_lahir_pasien = "{{$dataPasien->DateOfBirth}}";
    var classcode = "{{$dataPasien->reg_class}}";
    var ddxutama = '#ddx-utama'
    var ddxutamalen = $(ddxutama).length

    // =================================================================================================================================
    // init

    function clear_show_load() {
        if (ddxutamalen > 0) {
            $('#ddx-utama').html('').append(df_loading);
        }
    }

    function clear_show_error() {
        if (ddxutamalen > 0) {
            $('#ddx-utama').html('').append(df_error);
        }
    }

    function inject_view_data(html) {
        if (ddxutamalen > 0) {
            $('#ddx-utama').html('').append(html);
        }
    }
    async function inject_view_data_v2(html) {
        if (ddxutamalen > 0) {
            $('#ddx-utama').html('').append(html);
        }
    }

    // function original dari footer
    // komponen
    function nextPage(page, contains) {
        $('div[id*="' + contains + '"]').hide();
        $(page).show();
    }

    function nextTab(target, contains) {
        if (ddxutamalen > 0) {
            document.querySelector("#ddx-utama").scrollIntoView({
                behavior: "smooth"
            });
        }
        $('[href="' + target + '"]').tab('show');
        // unused: contains
    }

    function prevPage(page, contains) {
        $('div[id*="' + contains + '"]').hide();
        $(page).show();
    }

    function setChecked($name, $value, $prefix = "") {
        if ($value != null) {
            if ($value.indexOf('[') > -1) {
                $data = JSON.parse($value);
                if (typeof $data == "object") {
                    $.each($data, function(i, item) {
                        $($prefix + ' input[name="' + $name + '"][value="' + item + '"]').prop('checked', true);
                    })
                }
            } else {
                $($prefix + ' input[name="' + $name + '"][value="' + $value + '"]').prop('checked', true);
            }
        }
    }

    function deleteRow(id) {
        $("#row_" + id).remove();
    }

    // =================================================================================================================================
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.select2').select2();

        // init pertama
        $('.left-tab.active').click();
    });

    function nyaa_delete_joborderdt(job_order_dt_id) {
        var url_post = "{{ route('nyaa_universal.view_injector_support.perawat.hapus_joborderdt') }}";
        nyaa_delete_popup(url_post, {
            id: job_order_dt_id,
        });
    }

    function nyaa_delete_transfusidarah(monitoring_transfusi_darah_id) {
        var url_post = "{{ route('nyaa_universal.view_injector_support.perawat.hapus_monitoringtransfusidarah') }}";
        nyaa_delete_popup(url_post, {
            id: monitoring_transfusi_darah_id,
        });
    }

    function nyaa_delete_physicianteam(m_physician_team_id) {
        var url_post = "{{ route('nyaa_universal.view_injector_support.perawat.hapus_mphysicianteam') }}";
        nyaa_delete_popup(url_post, {
            id: m_physician_team_id,
        });
    }

    function nyaa_delete_popup(url_post, cdata) {
        var a_msgd = {
            title: 'Yakin?',
            text: 'Yakin ingin hapus? Data akan dihapus dan tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonText: "Ya.",
            cancelButtonText: "Tidak, batalkan!",
            reverseButtons: false,
        };
        var xds = function() {
            return {
                fireConfigFail: {
                    title: "Batalkan!",
                    text: "Aksi dibatalkan.",
                    icon: "error",
                },
                fireFunctionFail: function(uwu) {
                    uwu.fire(xds.fireConfigFail);
                    $('.left-tab.active').click();
                }
            }
        }();
        var c = Swal.mixin({
            buttonsStyling: !0
        });
        c.fire(a_msgd).then(function(f) {
            if (f.isConfirmed) {
                neko_delete_ajax(url_post, cdata);
            } else {
                f.dismiss === Swal.DismissReason.cancel && xds.fireFunctionFail(c);
            }
        })
    }

    function neko_delete_ajax(url_post, cdata) {
        neko_d_custom_warning(' Sedang menghapus Data, harap tunggu... ');
        $('.protecc').attr('disabled', 'disabled');
        $.ajax({
            url: url_post,
            method: "POST",
            data: cdata,
            success: function(res_s) {
                if (res_s.sukses) {
                    neko_d_custom_success(res_s.sukses);
                    $('.protecc').removeAttr('disabled');
                    $('.left-tab.active').click();
                    return null;
                };
                if (res_s.responseJSON) {
                    if (res_s.responseJSON.sukses) {
                        neko_d_custom_success(res_s.responseJSON.sukses);
                        $('.protecc').removeAttr('disabled');
                        $('.left-tab.active').click();
                        return null;
                    };
                };
                neko_d_custom_success('Data berhasil dihapus.');
                $('.protecc').removeAttr('disabled');
                $('.left-tab.active').click();
                return null;
            },
            error: function(res_e) {
                neko_danger_r();
                $('.left-tab.active').click();
            }
        })
    }

    function neko_post_ajax(urlsimpan) {
        neko_d_custom_warning('Sedang memproses data, harap tunggu...');
        $('.protecc').attr('disabled', 'disabled');
        $.ajax({
            url: urlsimpan,
            method: "POST",
            processData: false,
            contentType: false,
            data: new FormData(document.getElementById("dtf_i")),
            success: function(res_s) {
                if (res_s.sukses_pesan) {
                    neko_d_custom_success(res_s.sukses_pesan);
                    $('#ModalBase').modal('hide');
                    return null;
                };
                if (res_s.responseJSON) {
                    if (res_s.responseJSON.sukses_pesan) {
                        neko_d_custom_success(res_s.responseJSON.sukses_pesan);
                        $('#ModalBase').modal('hide');
                        return null;
                    };
                };
                neko_d_custom_success('Berhasil.');
                $('.protecc').removeAttr('disabled');
                $('#ModalBase').modal('hide');
                return null;
            },
            error: function(res_e) {
                if (res_e.error_pesan) {
                    neko_d_custom_error(res_e.error_pesan);
                    $('.protecc').removeAttr('disabled');
                    return null;
                };
                if (res_e.responseJSON) {
                    if (res_e.responseJSON.error_pesan) {
                        neko_d_custom_error(res_e.responseJSON.error_pesan);
                        $('.protecc').removeAttr('disabled');
                        return null;
                    };
                };
                neko_d_custom_error('Gagal diproses. Mohon untuk me-refresh halaman ini.');
                $('.protecc').removeAttr('disabled');
                return null;
            }
        })
    }

    function nyaa_act(komponen, html_c_id = 'ModalBase_orig', html_inj = 'dtf_i') {
        var neko_ed_HTML = $('#' + html_c_id).html()
            .replace(/nyaatempname/g, 'name')
            .replace(/nyaatempid/g, 'id')
            .replace(/nyaatempform/g, 'form'),
            mode = $(komponen).attr('nyaa-mode'),
            dtid = $(komponen).attr('nyaa-dtid');
        $('#' + html_inj).html('').append(neko_ed_HTML);
        $('[name="dt_mode"]').val(mode);
        $('[name="dtid"]').val(dtid);
        $('#ModalBase').modal('show');
        $('[type="number"]').each(function() {
            var targetValue = parseFloat($(this).val());
            $(this).val(+targetValue);
        });
    }

    function nyaa_dlt(komponen) {
        var mode = $(komponen).attr('nyaa-mode'),
            urlhapus = $(komponen).attr('nyaa-urlhapus'),
            dtid = $(komponen).attr('nyaa-dtid');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: urlhapus,
                    data: {
                        dt_mode: mode,
                        dtid: dtid
                    },
                    success: function(data) {
                        if (data.sukses_pesan) {
                            Swal.fire(
                                'Berhasil.',
                                data.sukses_pesan,
                                'success'
                            )
                            neko_refresh_datatable('datatable1');
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus. Mohon coba kembali beberapa saat lagi.',
                                'error'
                            )
                        }
                        $('.nav-link.active').click();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire(
                            'Gagal!',
                            'Data gagal dihapus. Mohon coba kembali beberapa saat lagi.',
                            'error'
                        )
                    }
                });
            }
        });
    }

    function getAlertAlergi(_reg) {
        $.ajax({
            url: '{{url("")}}/api/getAlertAlergi',
            data: {
                reg_no: _reg,
                kategori_pasien: kategori_pasien,
            },
            success: function(resp) {
                $('#alert_indikator').html('')

                if (resp.alergi == 'ya') {
                    $('[id="alert_blink"]').show()
                    $('#alert_indikator').append(`
                        <div class="d-inline-block mr-2">
                            <div class="bubble-alergi" onclick="alert($(this).attr('title'))" title="Alergi: ` + resp.alergi_obat + `, ` + resp.alergi_makanan + `, ` + resp.alergi_lainnya + `">Allergy</div>
                        </div>
                    `)
                }
                if (resp.alergi == 1) {
                    $('[id="alert_blink"]').show()
                    $('#alert_indikator').append(`
                        <div class="d-inline-block mr-2">
                            <div class="bubble-alergi" onclick="alert($(this).attr('title'))" title="Alergi: ` + resp.alergi_obat + `, ` + resp.alergi_makanan + `, ` + resp.alergi_lainnya + `">Allergy</div>
                        </div>
                    `)
                }
            }
        })
    }

    function getAlertJatuh(_reg) {
        $.ajax({
            url: '{{url("")}}/api/getAlertJatuh',
            data: {
                reg_no: _reg,
                kategori_pasien: kategori_pasien,
                tgl_lahir_pasien: tgl_lahir_pasien,
            },
            success: function(resp) {
                // console.log(resp);

                if (resp.geriatri && resp.geriatri.kategori_geriatri) {
                    $('[id="alert_blink"]').show();
                    $('#alert_indikator').append(`
                        <div class="d-inline-block">
                            <div class="bubble-resiko" onclick="alert($(this).attr('title'))" title="Fall Risk Geriatri: ${resp.geriatri.kategori_geriatri}">Fall Risk</div>
                        </div>
                    `);
                }

                if (resp.morse && resp.morse.resiko_jatuh_morse_kategori) {
                    $('[id="alert_blink"]').show();
                    $('#alert_indikator').append(`
                        <div class="d-inline-block">
                            <div class="bubble-resiko" onclick="alert($(this).attr('title'))" title="Fall Risk Skala Morse: ${resp.morse.resiko_jatuh_morse_kategori}">Fall Risk</div>
                        </div>
                    `);
                }

                if (resp.dumpty && resp.dumpty.kategori_humpty_dumpty) {
                    $('[id="alert_blink"]').show();
                    $('#alert_indikator').append(`
                        <div class="d-inline-block">
                            <div class="bubble-resiko" onclick="alert($(this).attr('title'))" title="Fall Risk Humpty Dumpty: ${resp.dumpty && resp.dumpty.kategori_humpty_dumpty}">Fall Risk</div>
                        </div>
                    `);
                }

                if (resp.bayi === true) {
                    $('[id="alert_blink"]').show();
                    $('#alert_indikator').append(`
                        <div class="d-inline-block">
                            <div class="bubble-resiko" onclick="alert($(this).attr('title'))" title="Fall Risk: ${resp.keterangan}">Fall Risk</div>
                        </div>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching fall risk alert:", error);
            }
        });
    }

    function getAlertEWS(_reg) {
        $.ajax({
            url: '{{url("")}}/api/get-ews-info',
            data: {
                reg_no: _reg,
            },
            success: function(resp) {
                console.log(resp);
                $('#ews_info').empty();

                if (resp.news_total >= 7) {
                    $('#ews_info').append(`
                        <span class="badge badge-danger blink text-white">Zona Merah</span>
                    `)
                }

                if (resp.news_total == 5 || resp.news_total == 6) {
                    $('#ews_info').append(`
                        <span class="badge blink text-white" style="background-color: #f5710c;">Zona Orange</span>

                    `)
                }

                if (resp.news_total >= 1 && resp.news_total <= 4) {
                    $('#ews_info').append(`
                        <span class="badge badge-warning  blink text-white" >Zona Kuning</span>

                    `)
                }

                if (resp.news_total == 0) {
                    $('#ews_info').append(`
                        <span class="badge badge-success blink text-white" >Zona Hijau</span>

                    `)
                }

                if (!resp) {
                    $('#ews_info').append(`
                        <span class="badge badge-secondary blink text-black" >EWS masih kosong</span>

                    `)
                }
            }
        })
    }


    // =================================================================================================================================
    // do not remove this !
    var clickTabCount = 0;

    if (typeof clickTab === "function") {
        clickTabCount++;
    }

    if (clickTabCount < 1) {
        nyaa_call_view = function(_type = '') {
            return {

                'checklist': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.checklist_pasien')}}",
                        success: function(data) {
                            inject_view_data(data);
                            ttd_checklist();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'assesment': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_perawat')}}",
                        success: function(data) {
                            inject_view_data(data);
                            $('div[id*="assesment_"]').hide();
                            $('#assesment_1').show();

                            getAlertAlergi(regno)
                            getAlertJatuh(regno)
                            getAlertEWS(regno);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },
                // 'edukasi': function() {
                //     $.ajax({
                //         type: "POST",
                //         data: {
                //             "reg_no": regno,
                //             "medrec": medrec,
                //         },
                //         url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_edukasi_pasien')}}",
                //         success: function(data) {
                //             inject_view_data(data);
                //         },
                //         error: function(data) {
                //             clear_show_error();
                //         },
                //     });
                // },

                'edukasi': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_edukasi_pasien')}}",
                        success: function(data) {
                            inject_view_data(data);
                            ttd_edukasi_perawat();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'nyeri': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_skrinning_nyeri')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                // 'edukasi': function() {
                //     $.ajax({
                //         type: "POST",
                //         data: {
                //             "reg_no": regno,
                //             "medrec": medrec,
                //         },
                //         url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_edukasi_pasien')}}",
                //         success: function(data) {
                //             inject_view_data(data);
                //         },
                //         error: function(data) {
                //             clear_show_error();
                //         },
                //     });
                // },

                'edukasi': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                            "type": _type,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_edukasi_pasien')}}",
                        success: function(data) {
                            inject_view_data(data);
                            ttd_edukasi_perawat();
                            loadAllSignatures('gizi');
                            loadAllSignatures('farmasi');
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'resiko-jatuh-geriatri': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                            "user_id": $user_,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_resiko_jatuh_geriatri')}}",
                        success: function(data) {
                            inject_view_data(data);
                            modal_resiko_jatuh_geriatri();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'resiko-jatuh-humpty-dumpty': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                            "user_id": $user_,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_resiko_jatuh_humpty_dumpty')}}",
                        success: function(data) {
                            inject_view_data(data);
                            modal_resiko_jatuh_humpty_dumpty();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'resiko-jatuh-neonatus': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                            "user_id": $user_,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_resiko_jatuh_neonatus')}}",
                        success: function(data) {
                            inject_view_data(data);
                            ttd_resiko_jatuh_neonatus();
                            modal_resiko_jatuh_neonatus();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'resiko-jatuh-skala-morse': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                            "user_id": $user_,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_resiko_jatuh_skala_morse')}}",
                        success: function(data) {
                            inject_view_data(data);
                            modal_resiko_jatuh_skala_morse();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'soap': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_cppt_soap_perawat')}}",
                        success: function(data) {
                            inject_view_data(data);
                            getSoapPerawat();
                            loadHistorySoapPerawat();
                            $('#btn-save-soap').click(function() {
                                addbtnSaveSoap();
                            });
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'assesment-dewasa': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_awal_dewasa')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllFunctionDewasa();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'assesment-anak': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_awal_anak')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'assesment-neonatus': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_awal_neonatus')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadDatatableRekonObat();
                            loadSignature();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'rekonsiliasi-obat': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.rekonsiliasi_obat')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllFunctionRekonsiliasiObat();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'gizi-dewasa': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_gizi_dewasa')}}",
                        success: function(data) {
                            inject_view_data(data);
                            asuhanGiziDewasa_init();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'nursing-note': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_nurrse_note')}}",
                        success: function(data) {
                            inject_view_data(data);
                            getNursingNote();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'transfer-internal': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_transfer_internal')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllTfInteralFunc();
                            viewSerahTerima();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'admin-nurse': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_admin_nurse')}}",
                        success: function(data) {
                            inject_view_data(data);
                            neko_select2_init_data("{{ route('nyaa_universal.select2.data_tindakan_baru') }}", 'order_tindakan', {
                                "type": "X0001^01",
                                "class": classcode,
                            });
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'transfusi': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_transfusi_darah')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'obgyn': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_obgyn')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllFunctionObgyn();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'nyaa_dokumen_kelengkapan_pasien': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nyaa_dokumen_kelengkapan_pasien')}}",
                        success: function(data) {
                            inject_view_data(data);
                            nyaa_dokumennurse_load_all();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'nyaa_dokumen_tindakan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nyaa_dokumen_tindakan')}}",
                        success: function(data) {
                            inject_view_data(data);
                            nyaa_dokumennurse_load_all();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'nursing': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nursing_full')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadDatatableNews();
                            loadAllFunctionNursing();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'intra-tindakan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_intra_tindakan_kateterisasi')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'intra-hemodinamik': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_pemantauan_hemodinamik_intra')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'physician-team': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_physician_team')}}",
                        success: function(data) {
                            inject_view_data(data);
                            neko_select2_init(`{{ route("nyaa_universal.select2.m_paramedic") }}`, 'physician_kode_dokter ');
                            getPhysicianTeam();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'bedah': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_obgyn_bedah')}}",
                        success: function(data) {
                            inject_view_data(data);
                            getPhysicianTeam();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'pra-tindakan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.nurse_pra_tindakan')}}",
                        success: function(data) {
                            inject_view_data(data);
                            init_PraTindakan();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'riwayat': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.riwayat')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllFunctionRiwayat();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'cathlab': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.cathlab')}}",
                        success: function(data) {
                            inject_view_data(data);
                            init_cathlab();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'paska-tindakan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.paska_tindakan')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'observasi-paska': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.observasi_paska_tindakan')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'bayi': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.assesment_bayi')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'cathlab-V2': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.cathlab_v2')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'pemulangan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.pemulangan_pasien')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'monitoring_news': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.monitoring_news')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'checklist_kepulangan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.checklist_kepulangan')}}",
                        success: function(data) {
                            inject_view_data(data);
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'persetujuan_penolakan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.persetujuan_penolakan')}}",
                        success: function(data) {
                            inject_view_data(data);
                            ttd_pemberian_informasi_tindakan_medis();
                            ttd_penolakan_tindakan_medis();
                            ttd_persetujuan_tindakan_medis();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'surat_rujukan': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.surat_rujukan')}}",
                        success: function(data) {
                            inject_view_data(data);
                            init_SuratRujukan();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

                'intruksi-harian-icupanel': async () => {
                    try {
                        const res = await fetch("{{route('nyaa_universal.view_injector.perawat.intruksi_harian')}}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            body: JSON.stringify({
                                "reg_no": regno,
                                "medrec": medrec,
                            }),
                        })
                        const data = await res.text()
                        await inject_view_data(data)
                        initTvStorage()
                        initGkpStorage()
                    } catch (error) {
                        clear_show_error()
                    }
                },

                'case_manager': function() {
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('[name="_token"]').val(),
                            "reg_no": regno,
                            "medrec": medrec,
                        },
                        url: "{{route('nyaa_universal.view_injector.perawat.case_manager')}}",
                        success: function(data) {
                            inject_view_data(data);
                            loadAllFunctionCaseManager();
                        },
                        error: function(data) {
                            clear_show_error();
                        },
                    });
                },

            }
        }();
    }


    function icuPanel(id) {
        nyaa_call_view[id]()
    }

    // =================================================================================================================================


    if (clickTabCount < 1) {
        function clickTab(idx, title = '') {
            clear_show_load();
            id = neko_e_html_i(idx);

            $('div[id*="panel-"]').hide();
            $('div[id*="tab-"]').removeClass('active');

            $('#panel-' + id).show();
            $('#tab-' + id).addClass('active');

            if (title) {
                $('#title_cppt').text(title);
                $('#title-cpoe').text(title);
                $('.btn-cpoe').attr('id', '');
                $('.btn-cpoe').attr('onclick', '');
                $('.btn-cpoe').attr('id', 'tab-' + id);
                $('.btn-cpoe').attr('onclick', 'clickTab("' + id + '")');
                $('#btn-save-cpoe').attr('value', id);
            }
            if (ddxutamalen > 0) {
                document.querySelector("#ddx-utama").scrollIntoView({
                    behavior: "smooth"
                });
            }
            if (id.includes('icupanel')) {
                icuPanel(id)
                return
            }
            setTimeout(nyaa_call_view[id](), 280);
        }
    }

    // =================================================================================================================================
    // function original dari footer
    // RAW

    function getQrCode(id) {
        $.ajax({
            type: "POST",
            data: {
                "soap_id": id,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.show_qrcode')}}",
            success: function(data) {
                inject_view_data(data);
                getPhysicianTeam();
            },
            error: function(data) {
                clear_show_error();
            },
        });
    }

    function getSoapPerawat() {
        var table = $('#table-cppt-perawat');
        table.html(df_loading_anim);
        $.ajax({
            url: "{{route('get.soap.new.perawat')}}",
            type: "POST",
            dataType: "JSON",
            data: {
                "regno": regno,
                "reg_no": regno,
                "medrec": medrec,
            },
            success: function(data) {
                var datasoap = data.data;
                table.empty();
                for (var i = 0; i < datasoap.length; i++) {
                    var date = new Date(datasoap[i].created_at);
                    var statusVerifikasi = datasoap[i].status_review;
                    var tanggal = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                    var row = $('<tr>');
                    row.append($('<td>').text(datasoap[i].soap_tanggal));
                    row.append($('<td>').text(datasoap[i].nama_ppa));
                    var trS = document.createElement('tr');
                    var trO = document.createElement('tr');
                    var trA = document.createElement('tr');
                    var trP = document.createElement('tr');

                    var boldSubject = document.createElement('b');
                    boldSubject.appendChild(document.createTextNode('SUBJECT'));
                    trS.appendChild(boldSubject);
                    trS.appendChild(document.createElement('br'));
                    trS.appendChild(document.createTextNode(datasoap[i].soapdok_subject ?? '-'));

                    var boldObject = document.createElement('b');
                    boldObject.appendChild(document.createTextNode('OBJECT'));
                    trO.appendChild(boldObject);
                    trO.appendChild(document.createElement('br'));
                    trO.appendChild(document.createTextNode(datasoap[i].soapdok_object ?? '-'));

                    var boldAssesment = document.createElement('b');
                    boldAssesment.appendChild(document.createTextNode('ASSESMENT'));
                    trA.appendChild(boldAssesment);
                    trA.appendChild(document.createElement('br'));
                    trA.appendChild(document.createTextNode(datasoap[i].soapdok_assesment ?? '-'));

                    var boldPlanning = document.createElement('b');
                    boldPlanning.appendChild(document.createTextNode('PLANNING'));
                    trP.appendChild(boldPlanning);
                    trP.appendChild(document.createElement('br'));
                    trP.appendChild(document.createTextNode(datasoap[i].soapdok_planning ?? '-'));

                    var trTindakan = document.createElement('tr');
                    var boldTindakan = document.createElement('b');
                    boldTindakan.appendChild(document.createTextNode('TINDAKAN PENUNJANG & OBAT :'));
                    trTindakan.appendChild(boldTindakan);
                    trTindakan.appendChild(document.createElement('br'));

                    if (datasoap[i].order_lab && datasoap[i].order_lab.length > 0) {
                        $.each(datasoap[i].order_lab, function(i_lab, item_lab) {
                            trTindakan.appendChild(document.createTextNode((i_lab == 0 ? 'Laboratorium: ' : '') + item_lab.item_name + (i_lab < datasoap[i].order_lab.length - 1 ? ', ' : '')));
                        });
                    }

                    if (datasoap[i].order_radiologi && datasoap[i].order_radiologi.length > 0) {
                        $.each(datasoap[i].order_radiologi, function(i_rad, item_rad) {
                            trTindakan.appendChild(document.createTextNode((i_rad == 0 ? 'Radiologi: ' : '') + item_rad.item_name + (i_rad < datasoap[i].order_radiologi.length - 1 ? ', ' : '')));
                        });
                    }

                    if (datasoap[i].order_obat && datasoap[i].order_obat.length > 0) {
                        $.each(datasoap[i].order_obat, function(i_obat, item_obat) {
                            trTindakan.appendChild(document.createTextNode((i_obat == 0 ? 'Obat: ' : '') + item_obat.item_name + (i_obat < datasoap[i].order_obat.length - 1 ? ', ' : '')));
                        });
                    }

                    if (datasoap[i].order_lainnya && datasoap[i].order_lainnya.length > 0) {
                        $.each(datasoap[i].order_lainnya, function(i_lainnya, item_lainnya) {
                            trTindakan.appendChild(document.createTextNode((i_lainnya == 0 ? 'Tindakan Lainnya: ' : '') + item_lainnya.item_name + (i_lainnya < datasoap[i].order_lainnya.length - 1 ? ', ' : '')));
                        });
                    }

                    var trInstruksi = document.createElement('tr');
                    trInstruksi.appendChild(document.createTextNode(datasoap[i].soapdok_instruksi ?? '-'));

                    row.append($('<td>').append(trS, trO, trA, trP, trTindakan));
                    row.append($('<td>').append(trInstruksi));
                    if (statusVerifikasi == 1) {
                        var btnShowQR = document.createElement('button')
                        btnShowQR.type = 'button'
                        btnShowQR.className = 'btn btn-success'
                        btnShowQR.innerText = 'Lihat QRCode '
                        btnShowQR.id = 'btnShowQR' + datasoap[i].soapdok_reg
                        btnShowQR.value = datasoap[i].id
                        let soap_id = datasoap[i].soapdok_id;
                        btnShowQR.onclick = function() {
                            clear_show_load();
                            if (ddxutamalen > 0) {
                                document.querySelector("#ddx-utama").scrollIntoView({
                                    behavior: "smooth"
                                });
                            }
                            setTimeout(getQrCode(soap_id), 280);
                        }
                        var trNamaVerifikasi = document.createElement('tr')
                        var trTglVerifikasi = document.createElement('tr')
                        trNamaVerifikasi.appendChild(document.createTextNode(datasoap[i].nama_verifikasi))
                        trTglVerifikasi.appendChild(document.createTextNode(datasoap[i].tanggal_verifikasi))
                        row.append($('<td>').append(trNamaVerifikasi, trTglVerifikasi, btnShowQR));
                    } else {
                        row.append($('<td>').text("Belum diverifikasi"));
                        row.css("background-color", "#d5b3b3");
                    }
                    table.append(row);
                }
            },
            error: function(data) {
                neko_refresh();
            },
        });
    }


    function getSoapPerawat_modal() {
        $('#modalSOAP').modal('show');
    }
    // Pengkajian Awal Dewasa
    function assementDewasa_init() {
        $('.kajian_kulit_dewasa').on('click', function() {
            var sum = 0;
            $('.kajian_kulit_dewasa:checked').each(function() {
                sum += 1 * ($(this).data('id'));
            });
            $('[name="asdew_skor_braden"]').val(sum);

            if (sum >= 20 && sum <= 23) {
                $('[name="asdew_kategori"]').val('Resiko rendah');
            } else if (sum >= 15 && sum <= 19) {
                $('[name="asdew_kategori"]').val('Resiko sedang');
            } else if (sum >= 11 && sum <= 14) {
                $('[name="asdew_kategori"]').val('Resiko tinggi');
            } else if (sum >= 6 && sum <= 10) {
                $('[name="asdew_kategori"]').val('Resiko sangat tinggi');
            }
        });
    }

    function getAssementDewasa() {
        $.ajax({
            url: "{{ route('perawat.get_data_assesment_dewasa') }}",
            type: 'post',
            dataType: 'json',
            data: {
                "reg": regno,
                "reg_no": regno,
                "medrec": medrec,
            },
            success: function(resp) {
                setChecked('asdew_sensori', resp.asdew_sensori)
                setChecked('asdew_lembab', resp.asdew_lembab)
                setChecked('asdew_aktivitas', resp.asdew_aktivitas)
                setChecked('asdew_mobilitas', resp.asdew_mobilitas)
                setChecked('asdew_nutrisi', resp.asdew_nutrisi)
                setChecked('asdew_friksi', resp.asdew_friksi)
                $('[name="asdew_skor_braden"]').val(resp.asdew_skor_braden)
                $('[name="asdew_kategori"]').val(resp.asdew_kategori)
                setChecked('asdew_luka', resp.asdew_luka)
                setChecked('asdew_rom', resp.asdew_rom)
                setChecked('asdew_deformitas', resp.asdew_deformitas)
                $('[name="asdew_deformitas_lainnya"]').val(resp.asdew_deformitas_lainnya)
                setChecked('asdew_ggtidur', resp.asdew_ggtidur)
                $('[name="asdew_ggtidur_lainnya"]').val(resp.asdew_ggtidur_lainnya)
                setChecked('asdew_keluhan[]', resp.asdew_keluhan)
                $('[name="asdew_keluhan_lainnya"]').val(resp.asdew_keluhan_lainnya)
                setChecked('asdew_haus', resp.asdew_haus)
                setChecked('asdew_mukosa', resp.asdew_mukosa)
                setChecked('asdew_tugor', resp.asdew_tugor)
                setChecked('asdew_edema', resp.asdew_edema)
                $('[name="asdew_bab_kali"]').val(resp.asdew_bab_kali)
                setChecked('asdew_bab', resp.asdew_bab)
                setChecked('asdew_keluhan_bab[]', resp.asdew_keluhan_bab)
                $('[name="asdew_keluhan_bab_lainnya"]').val(resp.asdew_keluhan_bab_lainnya)
                $('[name="asdew_feces_lainnya"]').val(resp.asdew_feces_lainnya)
                $('[name="asdew_feces"]').val(resp.asdew_feces)
                $('[name="asdew_frekuensi_bak"]').val(resp.asdew_frekuensi_bak)
                $('[name="asdew_jumlah_bak"]').val(resp.asdew_jumlah_bak)
                $('[name="asdew_warna_urin"]').val(resp.asdew_warna_urin)
                setChecked('asdew_keluhan_bak', resp.asdew_keluhan_bak)
                $('[name="asdew_keluhan_bak_lainnya"]').val(resp.asdew_keluhan_bak_lainnya)
                setChecked('asdew_bahasa', resp.asdew_bahasa)
                $('[name="asdew_bahasa_lainnya"]').val(resp.asdew_bahasa_lainnya)
                setChecked('asdew_pendidikan', resp.asdew_pendidikan)
                $('[name="asdew_pendidikan_lainnya"]').val(resp.asdew_pendidikan_lainnya)
                setChecked('asdew_penterjemah', resp.asdew_penterjemah)
                setChecked('asdew_baca', resp.asdew_baca)
                setChecked('asdew_belajar', resp.asdew_belajar)
                $('[name="asdew_budaya"]').val(resp.asdew_budaya)
                setChecked('asdew_hambatan[]', resp.asdew_hambatan)
                $('[name="asdew_hambatan_lainnya"]').val(resp.asdew_hambatan_lainnya)
            },
            error: function(data) {
                neko_refresh();
            },
        });
    }

    // assesment gizi dewasa
    //

    // Asuhan Gizi Dewasa
    function asuhanGiziDewasa_init() {
        $('#add-row-asuhan-dewasa').on('click', function() {
            $code = (Math.random() + 1).toString(36).substring(7);
            $tr_ = `
            <tr id="row-asuhan-dewasa-` + $code + `">
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="bg-danger text-center text-white" id="remove-row-asuhan-dewasa" value="` + $code + `" onclick="$('#row-asuhan-dewasa-'+$(this).attr('value')).remove()" style="cursor: pointer"><i class="fas fa-times"></i></td>
            </tr>
        `;
            $('#t_asuhan_gizi_dewasa').append($tr_);
        });
        $('#add-row-monitoring-asuhan-dewasa').on('click', function() {
            $code = (Math.random() + 1).toString(36).substring(7);
            $tr_ = `
            <tr id="row-monitoring-asuhan-dewasa-` + $code + `">
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="bg-danger text-center text-white" id="remove-row-monitoring-asuhan-dewasa" value="` + $code + `" onclick="$('#row-monitoring-asuhan-dewasa-'+$(this).attr('value')).remove()" style="cursor: pointer"><i class="fas fa-times"></i></td>
            </tr>
        `;
            $('#t_monitoring_asuhan_gizi_dewasa').append($tr_);
        });
        $('#save_asesmen_gizi').click(function() {
            simpanAsuhanGiziDewasa();
        });
    }

    // Nursing Note
    function getNursingNote() {
        $.ajax({
            type: "POST",
            data: {
                "reg_no": regno,
                "medrec_no": medrec,
            },
            url: "{{route('get.nursing.note')}}",
            success: function(data) {
                console.log("Data received:", data);
                var dataJSON = data.data;
                var bodyTable = document.getElementById('body-tindakan-perawat')
                bodyTable.innerHTML = '';
                for (var i = 0; i < dataJSON.length; i++) {

                    var tr = document.createElement('tr')
                    var col1 = document.createElement('td')
                    var col2 = document.createElement('td')
                    var col3 = document.createElement('td')
                    var col4 = document.createElement('td')

                    col1.innerHTML = dataJSON[i]['tgl_note']
                    col2.innerHTML = dataJSON[i]['jam_note']
                    col3.innerHTML = dataJSON[i]['catatan']
                    col4.innerHTML = dataJSON[i]['id_nurse']
                    if (dataJSON[i]['signature']) {
                        console.log("Signature Base64:", dataJSON[i]['signature']);
                        col4.innerHTML = `
                        <div style="text-align: center;">
                            <img src="${dataJSON[i]['signature']}" alt="Signature" style="width: 400px; height: 200px;"/>
                            <p>${dataJSON[i]['id_nurse']}</p>
                        </div>
                    `;
                    } else {
                        col4.innerHTML = `
                        <div style="text-align: center;">
                            <p>${dataJSON[i]['id_nurse']}</p>
                        </div>
                    `;
                    }
                    tr.appendChild(col1)
                    tr.appendChild(col2)
                    tr.appendChild(col3)
                    tr.appendChild(col4)

                    bodyTable.appendChild(tr)
                }
            },
            error: function(data) {
                console.error("Error fetching nursing notes:", data);
                neko_refresh();
            },
        });
    }

    // Admin Nurse
    function keranjangOrder() {
        var identifier = neko_random(15);

        // cek data
        var id = $("#order_tindakan").val();
        if (
            !id ||
            id == '-' ||
            id == '' ||
            id == '0'
        ) {
            neko_simpan_error_noreq();
            return;
        }
        var qty = Number($("#qty").val());
        if (isNaN(qty)) {
            neko_notify('error', 'Data gagal disimpan! Harap isi jumlah hanya dengan angka.')
            return;
        }
        if (qty <= 0) {
            neko_notify('error', 'Data gagal disimpan! Jumlah tidak bisa diisi nol/minus.')
            return;
        }

        var selected = $("#order_tindakan").select2('data')[0];
        var name = selected.data_name;
        var price = Number(selected.data_price);
        var type = selected.data_type;
        var total = price * qty;

        var html = '<tr id="row_' + identifier + '">' +
            '<td>' + id + '</td>' +
            '<td>' + name + '</td>' +
            '<td>' + qty + '</td>' +
            '<td>' + price + '</td>' +
            '<td>' + total + '</td>' +
            '<td>' +
            '<button class="btn btn-danger" onclick="deleteRow(\'' + identifier + '\')">Hapus</button>' +
            '</td>' +
            '</tr>';
        $("#body-table-order-nurse").append(html);
    }

    // dokumen - all
    function nyaa_dokumennurse_load_all() {
        $('#ModalBase').on('hidden.bs.modal', function() {
            $('.protecc').removeAttr('disabled');
            $('#dtf_i').html('');
            neko_refresh_datatable('datatable1');
        });
        nyaa_dokumennurse_load_datatable();
    }

    function nyaa_dokumennurse_load_datatable() {
        var url = $('#datatable1').attr('nyaa-urldatatable');
        $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            ajax: {
                url: url,
                type: "POST",
                headers: {
                    "X-HTTP-Method-Override": "GET"
                },
                data: {
                    "reg_no": regno,
                    "medrec": medrec,
                },
            },
            columns: [{
                    data: "id",
                    name: "id",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "aksi_data",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "nama_dokumen",
                    name: "nama_dokumen",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "file_path",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "catatan",
                    name: "catatan",
                    orderable: true,
                    searchable: true
                },
            ],
            "order": [
                [0, 'asc'],
            ],
            "columnDefs": [{
                "targets": [0],
                "visible": false,
            }, ],
        });
    }

    // physician team
    function getPhysicianTeam() {
        var tablePhysicianTeam = $('#table-physician-team');
        $.ajax({
            url: "{{ route('get.physicianteam') }}",
            type: "post",
            data: {
                regno: regno
            },
            success: function(data) {
                tablePhysicianTeam.empty();
                $.each(data.data, function(key, value) {
                    $('#table-physician-team').append(
                        '<tr>' +
                        '<td>' + value.ParamedicCode + '</td>' +
                        '<td>' + value.ParamedicName + '</td>' +
                        '<td>' + value.kategori + '</td>' +
                        `<td><button type="button" class="btn btn-sm btn-danger" onclick="nyaa_delete_physicianteam('${neko_e_html_i(value.m_physician_team_id)}')">Hapus</button></td>` +
                        '</tr>'
                    );
                });
            },
            error: function(data) {
                neko_refresh();
            },
        });
    }

    // transfer internal
    function init_TransferInternal() {
        nyaa_dttb_transferinternal_load_all();
        $('.btn_transfer_internal').on('click', function() {
            simpanTransferInternal();
        });
        $('#ModalBase').on('hidden.bs.modal', function() {
            $('.protecc').removeAttr('disabled');
            $('#ModalBase').html('');
            $('.nav-link.active').click();
        });
    }

    function nyaa_dttb_transferinternal_load_all() {
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal1');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal2');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal3');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal4');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal5');
    }

    function nyaa_dttb_transferinternal_edit_load_all() {
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal1');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal2');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal3');
        nyaa_transferinternal_load_datatable('#dttb_transfer_internal4');
    }

    function nyaa_transferinternal_load_datatable(id_dttb) {
        // console.log(JSON.parse($(id_dttb).attr('nyaa-columns')));
        var url = $(id_dttb).attr('nyaa-urldatatable');
        $(id_dttb).DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            ajax: {
                url: url,
                type: "POST",
                headers: {
                    "X-HTTP-Method-Override": "GET"
                },
                data: {
                    "reg_no": regno,
                    "medrec": medrec,
                    "kode_transfer_internal": $(id_dttb).attr('nyaa-kode_transfer_internal'),
                },
            },
            columns: JSON.parse($(id_dttb).attr('nyaa-columns')),
            "order": [
                [0, 'asc'],
            ],
            "columnDefs": [{
                "targets": [0],
                "visible": false,
            }, ],
        });
    }

    // surat_rujukan
    function init_SuratRujukan() {
        nyaa_dttb_suratrujukan_load_all();
        $('.btn_surat_rujukan').on('click', function() {
            simpanSuratRujukan();
        });
        $('#ModalBase').on('hidden.bs.modal', function() {
            $('.protecc').removeAttr('disabled');
            $('#ModalBase').html('');
            $('.nav-link.active').click();
        });
    }

    function nyaa_dttb_suratrujukan_load_all() {
        nyaa_suratrujukan_load_datatable('#dttb_surat_rujukan1');
        nyaa_suratrujukan_load_datatable('#dttb_surat_rujukan2');
        nyaa_suratrujukan_load_datatable('#dttb_surat_rujukan3');
        nyaa_suratrujukan_load_datatable('#dttb_surat_rujukan4');
        nyaa_suratrujukan_load_datatable('#dttb_surat_rujukan5');
    }

    function nyaa_suratrujukan_load_datatable(id_dttb) {
        var url = $(id_dttb).attr('nyaa-urldatatable');
        console.log(url);
        $(id_dttb).DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            ajax: {
                url: url,
                type: "POST",
                headers: {
                    "X-HTTP-Method-Override": "GET"
                },
                data: {
                    "reg_no": regno,
                    "medrec": medrec,
                    "kode_surat_rujukan": $(id_dttb).attr('nyaa-kode_surat_rujukan'),
                },
            },
            columns: JSON.parse($(id_dttb).attr('nyaa-columns')),
            "order": [
                [0, 'asc'],
            ],
            "columnDefs": [{
                "targets": [0],
                "visible": false,
            }, ],
        });
    }

    // pra tindakan
    function init_PraTindakan() {
        $('#btn_pra_tindakan').on('click', function() {
            simpanPraTindakan();
        });
    }

    // cathlab
    function init_cathlab() {
        $.ajax({
            url: "{{ route('perawat.get_cathlab') }}",
            type: 'post',
            dataType: 'json',
            data: {
                reg: regno,
            },
            success: function(resp) {
                if (resp.cathlab_data) {
                    $('#form_cathlab').html('')
                    $('#form_cathlab').html(resp.cathlab_data)
                }
                $('#btn_cathlab').on('click', function() {
                    simpanCathlab();
                });
            },
            error: function(res_e) {
                neko_danger_r();
            },
        });
    }

    function checkAllCheckListv2(element) {
        if ($(element).prop('checked') == true) {
            $('.checkbox-kepulangan').prop('checked', true);
        } else {
            $('.checkbox-kepulangan').prop('checked', false);
        }
    }

    function checkAllCheckListv1(element) {
        if ($(element).prop('checked') == true) {
            $('.checkbox-checklist').prop('checked', true);
        } else {
            $('.checkbox-checklist').prop('checked', false);
        }
    }

    // EDUKASI
    function getEdukasi(_elm = '', _type = '') {
        $.ajax({
            type: "POST",
            data: {
                "_token": $('[name="_token"]').val(),
                "reg_no": regno,
                "medrec": medrec,
                "type": _type,
            },
            url: "{{route('nyaa_universal.view_injector.perawat.assesment_entry_edukasi_pasien')}}",
            success: function(data) {
                $('[id="panel-edukasi"] div').html(data)
                resetEdukasi(_elm, _type)

            },
            error: function(data) {
                clear_show_error();
            },
        });
    }

    function resetEdukasi(_elm = '', _type = '') {
        $('[id="panel-edukasi"] ' + _elm + ' [class*="table1"]')
            .find('[class*="form-control"], input[type="radio"]')
            .removeAttr('disabled')

        ttd_edukasi_perawat()
    }

    var signaturePadSasaran = null
    var signaturePadEdukator = null

    function ttd_edukasi_perawat() {
        // SASARAN
        let $wrapperSasaran = $('[id*="signature-pad-sasaran"]');
        let $clearButtonSasaran = $wrapperSasaran.find("#clear_btn_sasaran");
        let $canvasSasaran = $wrapperSasaran.find("canvas")[0];

        if ($canvasSasaran != undefined) {
            signaturePadSasaran = new SignaturePad($canvasSasaran);

            // Load signature if available
            let signatureSasaranDataURL = $("#signature_sasaran").val();
            if (signatureSasaranDataURL) {
                signaturePadSasaran.fromDataURL(signatureSasaranDataURL);
            }

            $clearButtonSasaran.on("click", function(event) {
                signaturePadSasaran.clear();
            });
        }

        // EDUKATOR
        let $wrapperEdukator = $('[id*="signature-pad-edukator"]');
        let $clearButtonEdukator = $wrapperEdukator.find("#clear_btn_edukator");
        let $canvasEdukator = $wrapperEdukator.find("canvas")[0];

        if ($canvasEdukator != undefined) {
            signaturePadEdukator = new SignaturePad($canvasEdukator);

            // Load signature if available
            let signatureEdukatorDataURL = $("#signature_edukator").val();
            if (signatureEdukatorDataURL) {
                signaturePadEdukator.fromDataURL(signatureEdukatorDataURL);
            }

            $clearButtonEdukator.on("click", function(event) {
                signaturePadEdukator.clear();
                let userSignature = "{{ auth()->user()->signature }}";
                signaturePadEdukator.fromDataURL(userSignature);
            });
        }

        $('#simpan-edukasi-pasien-perawat').on('click', function() {
            addedukasipasienperawat();
        });
    }


    function ttd_checklist() {
        // checklist Perawat
        let $wrapperPerawat = $("#signature-pad-perawat");
        let $clearButtonPerawat = $wrapperPerawat.find("#clear_btn_perawat");
        let $canvasPerawat = $wrapperPerawat.find("canvas")[0];

        signaturePadPerawat = new SignaturePad($canvasPerawat);

        // Load signature if available
        let signaturePerawatDataURL = $("#signature_perawat").val();
        if (signaturePerawatDataURL) {
            signaturePadPerawat.fromDataURL(signaturePerawatDataURL);
        }

        $clearButtonPerawat.on("click", function(event) {
            signaturePadPerawat.clear();
            let userSignature = "{{ auth()->user()->signature }}";
            signaturePadPerawat.fromDataURL(userSignature);
        });

        // checklist Pasien
        let $wrapperPasien = $("#signature-pad-pasien");
        let $clearButtonPasien = $wrapperPasien.find("#clear_btn_pasien");
        let $canvasPasien = $wrapperPasien.find("canvas")[0];

        signaturePadPasien = new SignaturePad($canvasPasien);

        // Load signature if available
        let signaturePasienDataURL = $("#signature_pasien").val();
        if (signaturePasienDataURL) {
            signaturePadPasien.fromDataURL(signaturePasienDataURL);
        }

        $clearButtonPasien.on("click", function(event) {
            signaturePadPasien.clear();
        });

        $('#save-checklist-orientasi').click(function() {
            simpanchecklist();
        });
    }

    function ttd_pemberian_informasi_tindakan_medis() {
        // ttd Pemberian Informasi Dokter
        let $wrapperDokterInformasi = $("#signature-pad-dokter");
        let $clearButtonDokterInformasi = $wrapperDokterInformasi.find("#clear_btn_dokter");
        let $canvasDokterInformasi = $wrapperDokterInformasi.find("canvas")[0];

        signatureIPadDokterInformasi = new SignaturePad($canvasDokterInformasi);

        // Load signature if available
        let signatureDokterInformasiDataURL = $("#signature_dokter").val();
        if (signatureDokterInformasiDataURL) {
            signatureIPadDokterInformasi.fromDataURL(signatureDokterInformasiDataURL);
        }

        $clearButtonDokterInformasi.on("click", function(event) {
            signatureIPadDokterInformasi.clear();
            var userSignature = "{{ auth()->user()->signature }}";
            signatureIPadDokterInformasi.fromDataURL(userSignature);
        });

        // ttd Penerima Pemberian Informasi
        let $wrapperPenerimaInformasi = $("#signature-pad-penerima");
        let $clearButtonPenerimaInformasi = $wrapperPenerimaInformasi.find("#clear_btn_penerima");
        let $canvasPenerimaInformasi = $wrapperPenerimaInformasi.find("canvas")[0];

        signaturePadPenerimaInformasi = new SignaturePad($canvasPenerimaInformasi);

        // Load signature if available
        let signaturePenerimaInformasiDataURL = $("#signature_penerima").val();
        if (signaturePenerimaInformasiDataURL) {
            signaturePadPenerimaInformasi.fromDataURL(signaturePenerimaInformasiDataURL);
        }

        $clearButtonPenerimaInformasi.on("click", function(event) {
            signaturePadPenerimaInformasi.clear();
        });

        $('#save-pemberian-infromasi-tindakan-medis').click(function() {
            simpanInformasiTindakanMedis();
        });
    }

    function ttd_penolakan_tindakan_medis() {
        // Penolakan Penerima
        let $wrapperPenerimaPenolakan = $("#signature-pad-penolakan-penerima");
        let $clearButtonPenerimaPenolakan = $wrapperPenerimaPenolakan.find("#clear_btn_penolakan_penerima");
        let $canvasPenerimaPenolakan = $wrapperPenerimaPenolakan.find("canvas")[0];

        signaturePadPenerimaPenolakan = new SignaturePad($canvasPenerimaPenolakan);

        // Load signature if available
        let signaturePenerimaPenolakanDataURL = $("#signature_penolakan_penerima").val();
        if (signaturePenerimaPenolakanDataURL) {
            signaturePadPenerimaPenolakan.fromDataURL(signaturePenerimaPenolakanDataURL);
        }

        $clearButtonPenerimaPenolakan.on("click", function(event) {
            signaturePadPenerimaPenolakan.clear();
        });

        // Penolakan Dokter
        let $wrapperDokterPenolakan = $("#signature-pad-penolakan-dokter");
        let $clearButtonDokterPenolakan = $wrapperDokterPenolakan.find("#clear_btn_penolakan_dokter");
        let $canvasDokterPenolakan = $wrapperDokterPenolakan.find("canvas")[0];

        signaturePadDokterPenolakan = new SignaturePad($canvasDokterPenolakan);

        // Load signature if available
        let signatureDokterPenolakanDataURL = $("#signature_penolakan_dokter").val();
        if (signatureDokterPenolakanDataURL) {
            signaturePadDokterPenolakan.fromDataURL(signatureDokterPenolakanDataURL);
        }

        $clearButtonDokterPenolakan.on("click", function(event) {
            signaturePadDokterPenolakan.clear();
            var userSignature = "{{ auth()->user()->signature }}";
            signaturePadDokterPenolakan.fromDataURL(userSignature);
        });

        // Penolakan Keluarga
        let $wrapperKeluargaPenolakan = $("#signature-pad-penolakan-keluarga");
        let $clearButtonKeluargaPenolakan = $wrapperKeluargaPenolakan.find("#clear_btn_penolakan_keluarga");
        let $canvasKeluargaPenolakan = $wrapperKeluargaPenolakan.find("canvas")[0];

        signaturePadKeluargaPenolakan = new SignaturePad($canvasKeluargaPenolakan);

        // Load signature if available
        let signatureKeluargaPenolakanDataURL = $("#signature_penolakan_keluarga").val();
        if (signatureKeluargaPenolakanDataURL) {
            signaturePadKeluargaPenolakan.fromDataURL(signatureKeluargaPenolakanDataURL);
        }

        $clearButtonKeluargaPenolakan.on("click", function(event) {
            signaturePadKeluargaPenolakan.clear();
        });

        // Penolakan Perawat
        let $wrapperPerawatPenolakan = $("#signature-pad-penolakan-perawat");
        let $clearButtonPerawatPenolakan = $wrapperPerawatPenolakan.find("#clear_btn_penolakan_perawat");
        let $canvasPerawatPenolakan = $wrapperPerawatPenolakan.find("canvas")[0];

        signaturePadPerawatPenolakan = new SignaturePad($canvasPerawatPenolakan);

        // Load signature if available
        let signaturePerawatPenolakanDataURL = $("#signature_penolakan_perawat").val();
        if (signaturePerawatPenolakanDataURL) {
            signaturePadPerawatPenolakan.fromDataURL(signaturePerawatPenolakanDataURL);
        }

        $clearButtonPerawatPenolakan.on("click", function(event) {
            signaturePadPerawatPenolakan.clear();
            var userSignature = "{{ auth()->user()->signature }}";
            signaturePadPerawatPenolakan.fromDataURL(userSignature);
        });

        $('#save-penolakan-tindakan-medis').click(function() {
            simpanPenolakanTindakanMedis();
        });
    }

    function ttd_persetujuan_tindakan_medis() {
        // Persetujuan Penerima
        let $wrapperPenerimaSetuju = $("#signature-pad-persetujuan-penerima");
        let $clearButtonPenerimaSetuju = $wrapperPenerimaSetuju.find("#clear_btn_persetujuan_penerima");
        let $canvasPenerimaSetuju = $wrapperPenerimaSetuju.find("canvas")[0];

        signaturePadPenerimaSetuju = new SignaturePad($canvasPenerimaSetuju);

        // Load signature if available
        let signaturePenerimaDataURLSetuju = $("#signature_persetujuan_penerima").val();
        if (signaturePenerimaDataURLSetuju) {
            signaturePadPenerimaSetuju.fromDataURL(signaturePenerimaDataURLSetuju);
        }

        $clearButtonPenerimaSetuju.on("click", function(event) {
            signaturePadPenerimaSetuju.clear();
        });

        // Persetujuan Dokter
        let $wrapperDokterSetuju = $("#signature-pad-persetujuan-dokter");
        let $clearButtonDokterSetuju = $wrapperDokterSetuju.find("#clear_btn_persetujuan_dokter");
        let $canvasDokterSetuju = $wrapperDokterSetuju.find("canvas")[0];

        signaturePadDokterSetuju = new SignaturePad($canvasDokterSetuju);

        // Load signature if available
        let signatureDokterDataURLSetuju = $("#signature_persetujuan_dokter").val();
        if (signatureDokterDataURLSetuju) {
            signaturePadDokterSetuju.fromDataURL(signatureDokterDataURLSetuju);
        }

        $clearButtonDokterSetuju.on("click", function(event) {
            signaturePadDokterSetuju.clear();
            var userSignature = "{{ auth()->user()->signature }}";
            signaturePadDokterSetuju.fromDataURL(userSignature);
        });

        // Persetujuan Keluarga
        let $wrapperKeluargaSetuju = $("#signature-pad-persetujuan-keluarga");
        let $clearButtonKeluargaSetuju = $wrapperKeluargaSetuju.find("#clear_btn_persetujuan_keluarga");
        let $canvasKeluargaSetuju = $wrapperKeluargaSetuju.find("canvas")[0];

        signaturePadKeluargaSetuju = new SignaturePad($canvasKeluargaSetuju);

        // Load signature if available
        let signatureKeluargaDataURLSetuju = $("#signature_persetujuan_keluarga").val();
        if (signatureKeluargaDataURLSetuju) {
            signaturePadKeluargaSetuju.fromDataURL(signatureKeluargaDataURLSetuju);
        }

        $clearButtonKeluargaSetuju.on("click", function(event) {
            signaturePadKeluargaSetuju.clear();
        });

        // Persetujuan Perawat
        let $wrapperPerawatSetuju = $("#signature-pad-persetujuan-perawat");
        let $clearButtonPerawatSetuju = $wrapperPerawatSetuju.find("#clear_btn_persetujuan_perawat");
        let $canvasPerawatSetuju = $wrapperPerawatSetuju.find("canvas")[0];

        signaturePadPerawatSetuju = new SignaturePad($canvasPerawatSetuju);

        // Load signature if available
        let signaturePerawatDataURLSetuju = $("#signature_persetujuan_perawat").val();
        if (signaturePerawatDataURLSetuju) {
            signaturePadPerawatSetuju.fromDataURL(signaturePerawatDataURLSetuju);
        }

        $clearButtonPerawatSetuju.on("click", function(event) {
            signaturePadPerawatSetuju.clear();
            var userSignature = "{{ auth()->user()->signature }}";
            signaturePadPerawatSetuju.fromDataURL(userSignature);
        });

        $('#save-persetujuan-tindakan-medis').click(function() {
            simpanPersetujuanTindakanMedis();
        });
    }

    function loadAllSignatures(type) {
        UniversalSignaturePad(`signature-${type}-sasaran`, `ttd_sasaran_${type}`);
        UniversalSignaturePad(`signature-${type}-edukator`, `ttd_edukator_${type}`);
    }

    const UniversalSignaturePads = {};

    function UniversalSignaturePad(canvasId, hiddenInputId) {
        const canvas = document.getElementById(canvasId);
        const hiddenInput = document.getElementById(hiddenInputId);
        if (!canvas || !hiddenInput) {

            return;
        }

        const button = document.querySelector(`button[data-pad="${canvasId.split('-')[2]}"]`);
        const signaturePad = new SignaturePad(canvas);
        UniversalSignaturePads[canvasId] = signaturePad;

        signaturePad.onEnd = function() {
            hiddenInput.value = signaturePad.toDataURL();
        };

        if (button) {
            button.addEventListener('click', function() {
                signaturePad.clear();
                hiddenInput.value = '';
            });
        }

        if (hiddenInput.value) {
            const image = new Image();
            image.onload = function() {
                canvas.getContext('2d').drawImage(image, 0, 0, canvas.width, canvas.height);
            }
            image.src = hiddenInput.value;
        }
    }
</script>

@include('new_perawat.assesment.assesment_dewasa.js.assesment_dewasa_js')
@include('new_perawat.assesment.assesment_anak.js.assesment_anak_js')
@include('new_perawat.assesment.neonatus_tab.js.rekonsiliasi_obat_js')
@include('new_perawat.resiko_jatuh.humpty_dumpty.js.resiko_jatuh_humpty_dumpty_js')
@include('new_perawat.resiko_jatuh.geriatri.js.resiko_jatuh_geriatri_js')
@include('new_perawat.resiko_jatuh.neonatus.js.resiko_jatuh_neonatus_js')
@include('new_perawat.resiko_jatuh.skala_morse.js.resiko_jatuh_skala_morse_js')
@include('new_perawat.transfer_internal.js.index_js')
@include('new_perawat.monitoring_news.js.entry_news_js')
@include('new_perawat.assesment.obgyn.js.obgyn_js')
@include('new_perawat.rekonsiliasi_obat.js.rekonsiliasi_obat_js')
@include('new_perawat.case_manager.js.case_manager_js')
@include('new_perawat.nursing.v2.js.nursing_js')
@include('new_perawat.soap.js.soap_perawat_js')
@include('new_perawat.riwayat-v2.js.riwayat_js')
