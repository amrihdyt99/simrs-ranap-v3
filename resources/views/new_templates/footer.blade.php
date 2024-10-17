@php
function tgl_indo($tanggal){
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);
$pecahkan = explode('-', $tanggal);

// variabel pecahkan 0 = tahun
// variabel pecahkan 1 = bulan
// variabel pecahkan 2 = tanggal

return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
@endphp
<script src="{{asset('')}}new_assets/vendors/base/vendor.bundle.base.js"></script>
<script src="{{asset('')}}new_assets/js/jquery-ui.js"></script>
<script src="{{asset('')}}new_assets/js/template.js"></script>
<script src="{{asset('')}}new_assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('')}}new_assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="{{asset('')}}new_assets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
<script src="{{asset('')}}new_assets/vendors/justgage/raphael-2.1.4.min.js"></script>
<script src="{{asset('')}}new_assets/vendors/justgage/justgage.js"></script>
<script src="{{asset('')}}new_assets/js/dashboard.js"></script>
<script src="{{asset('')}}new_assets/js/select2.min.js"></script>
<script src="{{asset('')}}new_assets/js/moment.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    // =================================================================================================================================

    $level_ = "{{auth()->user()->level_user}}";
    $user_dokter_ = "{{auth()->user()->dokter_id}}";
    $user_ = "{{auth()->user()->id}}";
    $user_perawat_ = "{{auth()->user()->perawat_id}}";
    $poli_ = "{{session()->get('poli_kode')}}";
    var regno = "{{$reg}}"
    var medrec = "{{$dataPasien->MedicalNo}}"
    var classcode = "{{$dataPasien->currentLocation['ChargeClassCode']}}"

    $host = location.hostname

    if ($host == '127.0.0.1' || $host == 'rj.id') {
        $dom = ''
    } else {
        $dom = '/simrs_ranap'
    }

    function r_space(data) {
        return data.replace(/\//g, '_')
    }

    function randomString(len, charSet) {
        charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var randomString = '';
        for (var i = 0; i < len; i++) {
            var randomPoz = Math.floor(Math.random() * charSet.length);
            randomString += charSet.substring(randomPoz, randomPoz + 1);
        }
        return randomString;
    }

    function needsJsonParse(variable) {
        if (typeof variable !== 'string') {
            return false;
        }

        try {
            JSON.parse(variable);
            return true;
        } catch (e) {
            return false;
        }
    }

    function addOption(elm, value, text) {
        var newOption = new Option(text, value, false, false);
        $(elm).append(newOption).trigger('change');
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

    $('#partial-panel').hide();

    function outputUpdateWithDesc(vol) {
        $text = " Tidak Nyeri";

        if (vol == 1) {
            $text = " Tidak Nyeri"
        } else if (vol == 2) {
            $text = " Nyeri Ringan"
        } else if (vol == 3) {
            $text = " Sedikit Nyeri"
        } else if (vol == 4) {
            $text = " Nyeri Sedang"
        } else if (vol == 5) {
            $text = " Nyeri Berat"
        } else if (vol == 6) {
            $text = " Nyeri Sangat Berat"
        } else {
            $text = "";
        }
        if ($poli_ == 'HD001') {
            document.querySelector('#hd_skala').value = vol + $text;
        } else {
            document.querySelector('#skala').value = vol + $text;
        }
    }

    // console.log(getAge('02/08/1999'));

    function getAge(dateString) {
        var now = new Date();
        var today = new Date(now.getYear(), now.getMonth(), now.getDate());

        var yearNow = now.getYear();
        var monthNow = now.getMonth();
        var dateNow = now.getDate();

        var dob = new Date(dateString.substring(6, 10),
            dateString.substring(0, 2) - 1,
            dateString.substring(3, 5)
        );

        var yearDob = dob.getYear();
        var monthDob = dob.getMonth();
        var dateDob = dob.getDate();

        var age = {};
        var ageString = "";
        var yearString = "";
        var monthString = "";
        var dayString = "";


        yearAge = yearNow - yearDob;

        if (monthNow >= monthDob)
            var monthAge = monthNow - monthDob;
        else {
            yearAge--;
            var monthAge = 12 + monthNow - monthDob;
        }

        if (dateNow >= dateDob)
            var dateAge = dateNow - dateDob;
        else {
            monthAge--;
            var dateAge = 31 + dateNow - dateDob;

            if (monthAge < 0) {
                monthAge = 11;
                yearAge--;
            }
        }

        age = {
            years: yearAge,
            months: monthAge,
            days: dateAge
        };

        if (age.years > 1) yearString = " thn";
        else yearString = " thn";
        if (age.months > 1) monthString = " bln";
        else monthString = " bln";
        if (age.days > 1) dayString = " hari";
        else dayString = " hari";


        if ((age.years > 0) && (age.months > 0) && (age.days > 0))
            ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString;
        else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
            ageString = age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
            ageString = age.years + yearString + " old. Happy Birthday!!";
        else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
            ageString = age.years + yearString + " and " + age.months + monthString;
        else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
            ageString = age.months + monthString + " and " + age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
            ageString = age.years + yearString + " and " + age.days + dayString;
        else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
            ageString = age.months + monthString;
        else ageString = "Oops! Could not calculate age!";

        return ageString;
    }

    function getYear(dateString) {
        var now = new Date();
        var today = new Date(now.getYear());

        var yearNow = now.getYear();

        var dob = new Date(dateString);

        var yearDob = dob.getYear();
        var age = {};
        var ageString = "";
        var yearString = "";


        yearAge = yearNow - yearDob;

        return yearAge;
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

    function checkbox($name, $value) {
        if ($value != null) {
            $.each($value, function(i, data) {
                $('input[name="' + $name + '"][value="' + data + '"]').prop('checked', true);
            });
        }
    }

    function clickTab(id, title = null) {
        var id_cppt = $('#soapdok_id').val()

        $('div[id*="panel-"]').hide();
        $('div[id*="tab-"]').removeClass('active');

        $('#panel-' + id).show();
        $('#tab-' + id).addClass('active');

        $('[id="table-item-cpoe"]').html('')

        if (title) {
            $('#title_cppt').text(title);
            $('#title-cpoe').text(title);

            $('.btn-cpoe').attr('id', '');
            $('.btn-cpoe').attr('onclick', '');

            $('.btn-cpoe').attr('id', 'tab-' + id);
            $('.btn-cpoe').attr('onclick', 'clickTab("' + id + '")');

            $('#btn-save-cpoe').attr('value', id);
        }

        if (id == 'lab' || id == 'radiologi' || id == 'fisio' || id == 'lainnya') {
            $('[id="panel-' + id + '"] [class="row"]').hide()
            $('[id="panel-' + id + '"]').append(`
                            <div id="row_loader">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="new_loader"></div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="mt-2">Memuat data tindakan ` + title + `</h6>     
                                        </div>    
                                    </div>   
                                </div>    
                            </div>
                        `)
        }

        // alert(id)
        if (id == 'lab') {
            //disini yang SOAP
            $('#row_tindakan').remove();
            $("#select-tindakan").empty();
            $.ajax({
                type: "POST",
                url: "{{ route('tarif.tindakanbaru') }}",
                data: {
                    "type": "X0001^04",
                    "class": classcode,
                    "reg": regno
                },
                success: function(data) {
                    $('[id="panel-' + id + '"] [class="row"]').show()
                    $('[id="panel-' + id + '"] #row_loader').remove()

                    var dataJSON = data.data;
                    if (dataJSON) {
                        for (var i = 0; i < dataJSON.length; i++) {
                            $("#select-tindakan")
                                .append($("<option></option>")
                                    .attr("value", dataJSON[i]['ItemCode'])
                                    .attr("class", 'row_tindakan')
                                    .attr("data-id", dataJSON[i]['ItemCode'])
                                    .attr("data-type", 'Laboratorium')
                                    .attr("data-name", dataJSON[i]['ItemName1'])
                                    .attr("data-price", dataJSON[i]['PersonalPrice'])
                                    .text(dataJSON[i]['ItemCode'] + " - " + dataJSON[i]['ItemName1'] + " - " + dataJSON[i]['PersonalPrice']));
                            //console.log(dataJSON[i]['ItemName1'])
                        }
                    }
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
            $.ajax({
                type: "POST",
                url: "{{route('get.order.tindakan')}}",
                data: {
                    "id_cppt": id_cppt,
                    "jenisorder": "lab",

                },
                success: function(data) {
                    var dataJSON = data.data;
                    createDataTableCPOE(dataJSON, "table-cpoe");
                    loadCPOE2()
                }

            })


        } else if (id == 'radiologi') {
            $('#row_tindakan').remove();
            $("#select-tindakan").empty();
            $.ajax({
                type: "POST",
                url: "{{ route('tarif.tindakanbaru') }}",
                data: {
                    "type": "X0001^05",
                    "class": classcode,
                    "reg": regno
                },

                success: function(data) {
                    $('[id="panel-' + id + '"] [class="row"]').show()
                    $('[id="panel-' + id + '"] #row_loader').remove()

                    //console.log(data.data);
                    var dataJSON = data.data;
                    for (var i = 0; i < dataJSON.length; i++) {

                        $("#select-tindakan")
                            .append($("<option></option>")
                                .attr("value", dataJSON[i]['ItemCode'])
                                .attr("class", 'row_tindakan')
                                .attr("data-id", dataJSON[i]['ItemCode'])
                                .attr("data-type", 'Radiologi')
                                .attr("data-name", dataJSON[i]['ItemName1'])
                                .attr("data-price", dataJSON[i]['PersonalPrice'])
                                .text(dataJSON[i]['ItemCode'] + " - " + dataJSON[i]['ItemName1'] + " - " + dataJSON[i]['PersonalPrice']));
                        //console.log(dataJSON[i]['ItemName1'])
                    }
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });

            $.ajax({
                type: "POST",
                url: "{{route('get.order.tindakan')}}",
                data: {
                    "id_cppt": id_cppt,
                    "jenisorder": "radiologi",
                    "reg": regno
                },
                success: function(data) {
                    var dataJSON = data.data;
                    createDataTableCPOE(dataJSON, "table-cpoe-radiologi");
                    loadCPOE2()
                }

            })

        } else if (id == 'fisio') {
            $('#row_tindakan').remove();
            $("#select-tindakan").empty();
            $.ajax({
                type: "POST",
                url: "{{ route('tarif.tindakanbaru') }}",
                data: {
                    "type": "X0001^08",
                    "class": classcode,
                    "reg": regno
                },

                success: function(data) {
                    $('[id="panel-' + id + '"] [class="row"]').show()
                    $('[id="panel-' + id + '"] #row_loader').remove()
                    //console.log(data.data);
                    var dataJSON = data.data;
                    for (var i = 0; i < dataJSON.length; i++) {
                        $("#select-tindakan")
                            .append($("<option></option>")
                                .attr("value", dataJSON[i]['ItemCode'])
                                .attr("class", 'row_tindakan')
                                .attr("data-id", dataJSON[i]['ItemCode'])
                                .attr("data-type", 'Fisioterapi')
                                .attr("data-name", dataJSON[i]['ItemName1'])
                                .attr("data-price", dataJSON[i]['PersonalPrice'])
                                .text(dataJSON[i]['ItemCode'] + " - " + dataJSON[i]['ItemName1'] + " - " + dataJSON[i]['PersonalPrice']));
                        //console.log(dataJSON[i]['ItemName1'])
                    }
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
            $.ajax({
                type: "POST",
                url: "{{route('get.order.tindakan')}}",
                data: {
                    "id_cppt": id_cppt,
                    "jenisorder": "fisio",

                },
                success: function(data) {
                    var dataJSON = data.data;
                    createDataTableCPOE(dataJSON, "table-cpoe-fisio");
                    loadCPOE2()
                }

            })

        } else if (id == 'lainnya') {
            $('#row_tindakan').remove();
            $("#select-tindakan").empty();
            $.ajax({
                type: "POST",
                url: "{{ route('tarif.tindakanbaru') }}",
                data: {
                    "type": "X0001^01",
                    "class": classcode,
                    "reg": regno
                },

                success: function(data) {
                    $('[id="panel-' + id + '"] [class="row"]').show()
                    $('[id="panel-' + id + '"] #row_loader').remove()

                    //console.log(data.data);
                    var dataJSON = data.data;
                    for (var i = 0; i < dataJSON.length; i++) {
                        $("#select-tindakan")
                            .append($("<option></option>")
                                .attr("value", dataJSON[i]['ItemCode'])
                                .attr("class", 'row_tindakan')
                                .attr("data-id", dataJSON[i]['ItemCode'])
                                .attr("data-type", 'Lainnya')
                                .attr("data-name", dataJSON[i]['ItemName1'])
                                .attr("data-price", dataJSON[i]['PersonalPrice'])
                                .text(dataJSON[i]['ItemCode'] + " - " + dataJSON[i]['ItemName1']));
                        //console.log(dataJSON[i]['ItemName1'])
                    }
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
            $.ajax({
                type: "POST",
                url: "{{route('get.order.tindakan')}}",
                data: {
                    "id_cppt": id_cppt,
                    "jenisorder": "lainnya",

                },
                success: function(data) {
                    var dataJSON = data.data;
                    createDataTableCPOE(dataJSON, "table-cpoe-lainnya");
                    loadCPOE2()
                }

            })
        } else if (id == 'pemeriksaan-penunjang') {
            console.log("pemeriksaan penunjang")
            getPemeriksaanDokter()
        } else if (id == 'nursing') {
            $.ajax({
                type: "GET",
                url: "{{ route('newperawat.patient.nursing',['reg_no'=>$reg]) }}",
                /* data: {
                     "reg_no": regno,
                 },*/

                success: function(data) {
                    //console.log(data);
                    let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });


        } else if (id == "prescribe") {
            getOrderObat()
        } else if (id == "nyeri") {

        } else if (id == "checklist") {
            $.ajax({
                type: "POST",
                data: {
                    "reg_no": regno,
                    "medrec": medrec,
                },

                url: "{{route('checklist.pasien')}}",
                /* data: {
                     "reg_no": regno,
                 },*/

                success: function(data) {
                    //console.log(data);
                    let html = document.getElementById("panel-checklist").innerHTML = data;
                },
            });
        } else if (id == "nursing-note") {
            $.ajax({
                type: "POST",
                data: {
                    "reg_no": regno,
                    "medrec_no": medrec,
                },

                url: "{{route('get.nursing.note')}}",
                /* data: {
                     "reg_no": regno,
                 },*/

                success: function(data) {
                    //console.log(data);
                    var dataJSON = data.data;
                    var bodyTable = document.getElementById('body-tindakan-perawat')
                    bodyTable.innerHTML = "";
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
                        tr.appendChild(col1)
                        tr.appendChild(col2)
                        tr.appendChild(col3)
                        tr.appendChild(col4)
                        bodyTable.appendChild(tr)
                    }


                },
            });
        } else if (id == "physician-team") {
            var pilihDokter = $('#kode_dokter');
            $.ajax({
                url: "{{ route('get.dokter') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $.each(data.data, function(key, value) {
                        pilihDokter.append('<option value="' + value.ParamedicCode + '">' + value.ParamedicName + '</option>');
                    });
                }
            });

            getPhysicianTeam()
        } else if (id == 'rehab') {
            getOtherInstructions(id, null)
        }


    }

    function getPhysicianTeam() {
        var tablePhysicianTeam = $('#table-physician-team');
        tablePhysicianTeam.empty();
        $.ajax({
            url: "{{ route('get.physicianteam') }}",
            type: "post",
            data: {
                regno: regno
            },
            success: function(data) {
                console.log(data);
                $.each(data.data, function(key, value) {
                    $('#table-physician-team').append('<tr><td>' + value.ParamedicCode + '</td><td>' + value.ParamedicName + '</td><td>' + value.kategori + '</td></tr>');
                });
            }
        });
    }

    function addPhysicianTeam() {
        var kode_dokter = $('#kode_dokter').val();
        var kategori = $('#kategori').val();
        // var table = $('#table-physician-team');
        // var row = '<tr>';
        // row += '<td>' + kode_dokter + '</td>';
        // row += '<td>' + kategori + '</td>';
        // row += '<td><button class="btn btn-danger" onclick="deletePhysicianTeam(this)">Hapus</button></td>';
        // row += '</tr>';
        // table.append(row);
        $.ajax({
            url: "{{ route('add.physicianteam') }}",
            type: "POST",
            data: {
                kode_dokter: kode_dokter,
                kategori: kategori,
                regno: regno,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                getPhysicianTeam();
            }
        });
    }

    function deletePhysicianTeam(e) {
        $(e).parent().parent().remove();
    }

    function createDataTableCPOE(dataJSON, namatable) {
        var bodyTable = document.getElementById(namatable)
        bodyTable.innerHTML = "";
        if (dataJSON) {
            let total_tind = dataJSON.length;
            if (namatable == 'table-cpoe-radiologi' && total_tind == 1) {
                $('.tmbh_rad').hide()
            }
            for (var i = 0; i < dataJSON.length; i++) {
                var tr = document.createElement('tr');
                var col1 = document.createElement('td');
                var col2 = document.createElement('td');
                var col3 = document.createElement('td');
                var col4 = document.createElement('td');
                var col5 = document.createElement('td');
                var col6 = document.createElement('td');
                var col7 = document.createElement('td');
                var buttonDelete = document.createElement('button');
                buttonDelete.setAttribute('class', 'btn btn-danger btn-sm');
                buttonDelete.setAttribute('onclick', 'hapus_item(' + dataJSON[i]['id'] + ')')
                col1.innerHTML = dataJSON[i]['waktu_order']
                col2.innerHTML = dataJSON[i]['jenis_order']
                col3.innerHTML = dataJSON[i]['order_no']
                col4.innerHTML = dataJSON[i]['item_name']
                col5.innerHTML = dataJSON[i]['harga_jual']
                col6.innerHTML = dataJSON[i]['ParamedicName']
                col7.appendChild(buttonDelete);
                tr.appendChild(col1)
                tr.appendChild(col2)
                tr.appendChild(col3)
                tr.appendChild(col4)
                tr.appendChild(col5)
                tr.appendChild(col6)
                tr.appendChild(col7)

                bodyTable.appendChild(tr)
                // var rowtindakan="<tr>" +
                //     "<td>"++"</td>" +
                //     "<td>"+dataJSON[i]['jenis_order']+"</td>" +
                //     "<td>"+dataJSON[i]['order_no']+"</td>" +
                //     "<td>"+dataJSON[i]['item_name']+"</td>" +
                //     "<td>"+dataJSON[i]['harga_jual']+"</td>" +
                //     "<td>"+dataJSON[i]['ParamedicName']+"</td>" +
                //     "<td><button class='btn btn-danger'>Hapus</button></td>" +
                //
                // bodyTable.appendChild(rowtindakan)
            }
        } else {
            $('.tmbh_rad').show()
        }

    }

    function clickTabSmall(id) {
        $('body').on('click', '#sm-tab-' + id, function() {
            $('div[id*="sm-panel-"]').hide();
            $('div[id*="sm-tab-"]').removeClass('active');

            $('#sm-panel-' + id).show();
            $('#sm-tab-' + id).addClass('active');
        });
    }

    function nextPage(page, contains) {
        $('div[id*="' + contains + '"]').hide();

        $(page).show();
    }

    function nextTab(target, contains) {
        $('[href="' + target + '"]').tab('show');
        // unused: contains
    }

    function prevPage(page, contains) {
        $('div[id*="' + contains + '"]').hide();

        $(page).show();
    }

    function condition(data) {
        $data = (data) ? data : '-';

        return $data;
    }

    function resetSelect2(id) {
        $(id).val(null).trigger("change");
    }

    function resetForm(id) {
        // $(id+' input').val('');
        // $(id+' input[type=radio]').prop('checked', false);
        // $(id+' input[type=checkbox]').prop('checked', false);
        // $(id+' textarea').text('');
        $(id)[0].reset();
    }
</script>

<script>
    function addVital(kategori, formid) {
        var dataString = "";

        if (kategori == 'blood pressure') {
            var input = document.getElementsByName('datablood[]');
            console.log(input.length)
            /* for (var i = 0; i < input.length; i++) {
                 var a = input[i].value;
                 console.log(a)
             }*/
            dataString = input[0].value + "/" + input[1].value
            $.ajax({
                type: "POST",
                url: "{{ route('newperawat.addvitalsign') }}",
                data: {
                    "reg_no": regno,
                    "kategori": kategori,
                    "med_rec": medrec,
                    "data": dataString
                },

                success: function(data) {
                    console.log(data);
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
        } else {
            var input = document.getElementsByName('data[]');
            for (var i = 0; i < input.length; i++) {
                var a = input[i].value;
                dataString = dataString + a
            }
            $.ajax({
                type: "POST",
                url: "{{ route('newperawat.addvitalsign') }}",
                data: {
                    "reg_no": regno,
                    "kategori": kategori,
                    "med_rec": medrec,
                    "data": dataString
                },

                success: function(data) {
                    console.log(data);
                    //let html = document.getElementById("panel-nursing").innerHTML = data;
                },
            });
        }
        /* console.log(formid)
         const form=document.getElementById(formid)
         const formElements = Array.from(form.elements);

         formElements.forEach(element => {
             console.log(element);
         });*/
    }

    function orderobat() {
        if (window.confirm('Kirim ke farmasi sekarang ?')) {
            var tableOrder = document.getElementById('table-row-prescribe')
            var arrayKode = []
            var arrayNamaObat = []
            var arrayQty = []
            var arrayDosis = []
            var arrayHargaSatuan = []
            var arrayKeterangan = []
            var arrayJenisObat = []
            var arrayHari = []
            var arrayDurasi = []
            for (var i = 0; i < tableOrder.rows.length; i++) {
                var jenisObat = document.getElementById('jenis' + i)
                var kodeObat = document.getElementById('kode_obat' + i)
                var namaObat = document.getElementById('nama_obat' + i)
                var qtyObat = document.getElementById('qty' + i)
                var dosisObat = document.getElementById('dosis' + i)
                var hargaSatuanObat = document.getElementById('hargasatuan' + i)
                var keteranganObat = document.getElementById('keterangan' + i)
                var hariObat = document.getElementById('hari' + i)
                var durasiObat = document.getElementById('durasi' + i)
                arrayKode.push(kodeObat.value)
                arrayNamaObat.push(namaObat.innerText)
                arrayQty.push(qtyObat.value)
                arrayDosis.push(dosisObat.value)
                arrayJenisObat.push(jenisObat.innerText)

                if (hargaSatuanObat.value == "" || hargaSatuanObat.value == null) {
                    arrayHargaSatuan.push("0")
                    hargaSatuanObat.innerText = "0"
                } else {
                    arrayHargaSatuan.push(hargaSatuanObat.value)
                }
                arrayKeterangan.push(keteranganObat.value)
                arrayHari.push(hariObat.value)
                arrayDurasi.push(durasiObat.value)


            }

            //console.log(arrayKode)
            $.ajax({
                url: `{{route('dokter.order.obat')}}`,
                type: 'POST',
                dataType: 'json',
                data: {
                    'reg_no': regno,
                    'kode_dokter': "{{auth()->user()->dokter_id}}",
                    'service_unit': "{{$dataPasien->service_unit}}",
                    'item_code[]': arrayKode,
                    'qty[]': arrayQty,
                    'dosis[]': arrayDosis,
                    'ket_dosis[]': arrayKeterangan,
                    'harga_jual[]': arrayHargaSatuan,
                    'item_name[]': arrayNamaObat,
                    'hari[]': arrayHari,
                    'durasi[]': arrayDurasi,

                },
                success: function(resp) {
                    if (resp.success == true) {
                        //console.log(resp.data)
                        // $('#modalPrescribe').modal('hide');
                        // getOrderObat()
                        orderfarmasi(resp.data)
                    } else if (resp == 404) {
                        alert('Tidak ada order obat yang dikirim')
                    }
                },
                error: function() {
                    alert('Gagal menyimpan data, mohon hubungi tim Administrator');
                }
            });
        }
    }


    function orderfarmasi(datafarmasi) {
        const obj = {
            "akseskunci": "229470a5-fe98-479e-ba3f-5c5b8eec7c88",
            "data": JSON.stringify(datafarmasi)
        }
        $.ajax({
            url: 'http://rsud.sumselprov.go.id/farmasi/web-apis/job-order/order',
            type: 'POST',
            dataType: 'json',
            contentType: 'apllication/json',
            data: JSON.stringify(obj),
            success: function(resp) {
                console.log(resp)

                if (resp.status_kode == 200) {
                    simpanorder(datafarmasi)
                } else if (resp == 404) {
                    alert('Tidak ada order obat yang dikirim')
                }
            },
            error: function() {
                alert('Gagal menyimpan data, mohon hubungi tim Administrator');
            }
        });
    }

    function simpanorder(datafarmasi) {
        const obj = datafarmasi
        var tableOrder = document.getElementById('table-row-prescribe')
        var arrayKode = []
        var arrayNamaObat = []
        var arrayQty = []
        var arrayDosis = []
        var arrayHargaSatuan = []
        var arrayKeterangan = []
        var arrayJenisObat = []
        var arrayHari = []
        var arrayDurasi = []
        for (var i = 0; i < tableOrder.rows.length; i++) {
            var jenisObat = document.getElementById('jenis' + i)
            var kodeObat = document.getElementById('kode_obat' + i)
            var namaObat = document.getElementById('nama_obat' + i)
            var qtyObat = document.getElementById('qty' + i)
            var dosisObat = document.getElementById('dosis' + i)
            var hargaSatuanObat = document.getElementById('hargasatuan' + i)
            var keteranganObat = document.getElementById('keterangan' + i)
            var hariObat = document.getElementById('hari' + i)
            var durasiObat = document.getElementById('durasi' + i)
            arrayKode.push(kodeObat.value)
            arrayNamaObat.push(namaObat.innerText)
            arrayQty.push(qtyObat.value)
            arrayDosis.push(dosisObat.value)
            arrayJenisObat.push(jenisObat.innerText)

            if (hargaSatuanObat.value == "" || hargaSatuanObat.value == null) {
                arrayHargaSatuan.push("0")
                hargaSatuanObat.innerText = "0"
            } else {
                arrayHargaSatuan.push(hargaSatuanObat.value)
            }
            arrayKeterangan.push(keteranganObat.value)
            arrayHari.push(hariObat.value)
            arrayDurasi.push(durasiObat.value)


        }

        $.ajax({
            url: `{{route('simpan.order.obat')}}`,
            type: 'POST',
            dataType: 'json',
            data: {
                'reg_no': regno,
                'ordernumber': obj.order_no,
                'kode_dokter': "{{auth()->user()->dokter_id}}",
                'service_unit': "{{$dataPasien->service_unit}}",
                'item_code[]': arrayKode,
                'qty[]': arrayQty,
                'dosis[]': arrayDosis,
                'ket_dosis[]': arrayKeterangan,
                'harga_jual[]': arrayHargaSatuan,
                'item_name[]': arrayNamaObat,
                'hari[]': arrayHari,
                'durasi[]': arrayDurasi,

            },
            success: function(resp) {
                if (resp.success == true) {
                    console.log("masuk untuk hide modal")

                    $('#modalPrescribe').modal('hide');
                    getOrderObat()
                    tableOrder.children().remove()

                } else if (resp == 404) {
                    alert('Tidak ada order obat yang dikirim')
                }
            },
            error: function() {
                alert('Gagal menyimpan data, mohon hubungi tim Administrator');
            }
        });
    }
</script>

<script>
    function getOrderObat() {
        $.ajax({
            type: "POST",
            url: "{{ route('dokter.getobat') }}",
            data: {
                "id_cppt": id_cppt

            },

            success: function(data) {
                var success = data.success;
                if (success == true) {
                    var tablebodyobat = document.getElementById('table-prescribe')
                    tablebodyobat.innerHTML = ""
                    for (var i = 0; i < data.data.length; i++) {
                        var tr = document.createElement('tr')
                        var col1 = document.createElement('td')
                        var col2 = document.createElement('td')
                        var col3 = document.createElement('td')
                        var col4 = document.createElement('td')
                        var col5 = document.createElement('td')
                        var col6 = document.createElement('td')
                        var col7 = document.createElement('td')
                        var col8 = document.createElement('td')

                        var labelJenis = document.createElement('label')
                        labelJenis.id = 'jenis_order_obat' + i
                        labelJenis.innerText = "satuan"
                        var labelKode = document.createElement('label')
                        labelKode.id = 'kode_order_obat' + i
                        labelKode.innerText = data.data[i].item_code
                        var labelNama = document.createElement('label')
                        labelNama.id = 'nama_order_obat' + i
                        labelNama.innerText = data.data[i].item_name
                        var labelQty = document.createElement('label')
                        labelQty.id = 'qty_order_obat' + i
                        labelQty.innerText = data.data[i].qty
                        var labelDosis = document.createElement('label')
                        labelDosis.id = 'dosis_order_obat' + i
                        labelDosis.innerText = data.data[i].dosis
                        var labelFrekuensi = document.createElement('label')
                        labelFrekuensi.id = 'frekuensi_order_obat' + i
                        labelFrekuensi.innerText = data.data[i].ket_dosis
                        var labelKeterangan = document.createElement('label')
                        labelKeterangan.id = 'keterangan_order_obat' + i
                        labelKeterangan.innerText = data.data[i].ket_dosis
                        var btnAksi = document.createElement('button')
                        btnAksi.id = 'delete_order_obat' + i
                        btnAksi.className = 'btn btn-danger'
                        btnAksi.value = "delete"

                        col1.append(labelJenis)
                        col2.appendChild(labelKode)
                        col3.appendChild(labelNama)
                        col4.appendChild(labelQty)
                        col5.appendChild(labelDosis)
                        col6.appendChild(labelFrekuensi)
                        col7.appendChild(labelKeterangan)
                        col8.appendChild(btnAksi)
                        tr.appendChild(col1)
                        tr.appendChild(col2)
                        tr.appendChild(col3)
                        tr.appendChild(col4)
                        tr.appendChild(col5)
                        tr.appendChild(col6)
                        tr.appendChild(col7)
                        tr.appendChild(col8)

                        tablebodyobat.appendChild(tr)


                        //add to planning

                    }

                    loadCPOE2()
                }
            },
        });


    }
</script>

<script>
    function addorder() {
        if (window.confirm('apakah anda ingin mengirim tindakan?')) {
            var kategori = $('#btn-save-cpoe').attr('value')

            $.ajax({
                url: `{{route('order.tindakan')}}`,
                type: 'POST',
                dataType: 'json',
                data: $('#form-cpoe-dokter').serialize() + "&jenisorder=" + kategori,
                success: function(resp) {
                    if (resp.success == true) {
                        alert(resp.message)
                        $('body #modalCPOE').hide();

                        getSoapDokter()
                        loadCPOE2()
                        if (kategori == "lab") {
                            //console.log("ini lab")
                            //console.log(resp.data)
                            // orderToLab(resp.data)
                            clickTab('lab', 'Laboratorium')
                        } else if (kategori == "radiologi") {
                            alert('Tindakan radiologi berhasil ditambah, segera dikirim apabila cppt sudah di simpan')
                            clickTab('radiologi', 'Radiologi')
                            //kirim saat save cppt
                            // orderToRadiologi(resp.data)
                        }

                        $('#table-item-cpoe').html('')
                    } else {
                        alert(resp.message)
                    }
                    // if (resp == 404) {
                    //     alert('Anda tidak punya akses untuk menyimpan asesmen');
                    // } else {
                    //     //alert('Data SOAP berhasil disimpan');
                    //     //$('#modalSOAP').modal('hide');
                    //     //latestSoapdok($subs, '#table-cppt-perawat');
                    //     //orderCPOE();
                    // }
                }
            });
        }
    }
</script>

<script>
    //order ke api lab

    function orderToLab(datajson) {
        var settings = {
            "url": "http://rsud.sumselprov.go.id/labor/api/last-order",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            console.log(response)
            var form = new FormData();
            form.append("job_order_no", response.data.NextNoOrder);
            form.append("registration_no", datajson.registration_no);
            form.append("transaction_no", "JOR-LAB");
            form.append("paramedic_id", datajson.paramedic_id);
            form.append("service_unit_id", "TESTCODE^TESTNAME");
            form.append("location_id", "601");
            form.append("job_order_datetime", datajson.job_order_datetime);
            form.append("remarks", "-");
            form.append("is_cito", "0");
            form.append("user_id", "1");
            form.append("gc_order_type", "X0151^001");
            form.append("is_testing", "0");
            form.append("room_no", "110");
            form.append("sender_contact_name", "");
            form.append("sender_relationship", "0063^ASC");
            form.append("sender_mobile_phone_no", "");
            form.append("sender_address", "");
            form.append("sender_notes", "");
            form.append("referal_no", "");
            form.append("referal_tanggal", "");
            form.append("referal_type", "");
            form.append("referal_healthcare", "");
            form.append("referal_name", "");
            form.append("referal_specialty", "");
            form.append("referal_address", "");
            form.append("referal_reason", "");
            form.append("referal_diagnostic_notes", "");
            form.append("referal_examination_notes", "");
            form.append("payer_type", "BPJS");
            form.append("items", JSON.stringify(datajson.items));
            form.append("order_type", "Laboratory");
            form.append("medical_no", medrec);
            form.append("families", "[{\"medical_no\":\"00-00-00-01\",\"family_mrn\":\"00-00-00-02\",\"family_name\":\"Nama A\",\"relationship\":\"0063^FND\",\"phone_no\":null,\"mobile_no\":\"0822324444\",\"ssn\":\"1617222233432\",\"tgl_lahir\":\"1987-09-23\",\"job\":\"Job A\",\"address\":\"Tes\",\"is_emergency_contact\":0},{\"medical_no\":\"00-00-00-01\",\"family_mrn\":\"00-00-00-03\",\"family_name\":\"Nama B\",\"relationship\":\"0063^FND\",\"phone_no\":null,\"mobile_no\":\"0822324445\",\"ssn\":\"1617222233431\",\"tgl_lahir\":\"1987-02-16\",\"job\":\"Job B\",\"address\":\"Tes\",\"is_emergency_contact\":0}]");
            form.append("address", "{\"home_address\":\"Jl. Testing, No. 12A, ...\",\"home_country\":\"0399^IDN\",\"home_province\":\"0347^SUMSEL \",\"home_district\":\"Ilir Barat I\",\"home_city\":\"Palembang\",\"home_zip_code\":\"30123\",\"home_phone_no\":\"08234545222\",\"home_email\":\"user1@email.com\",\"office_address\":\"Jl. Testing, No. 12A, ...\",\"office_country\":\"0399^IDN\",\"office_province\":\"0347^SUMSEL \",\"office_district\":\"Ilir Barat I\",\"office_city\":\"Palembang\",\"office_zip_code\":\"30123\",\"office_phone_no\":\"08234545222\",\"office_email\":\"user1@email.com\"}");

            var setting2 = {
                "url": "http://rsud.sumselprov.go.id/labor/api/order-lab",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(setting2).done(function(resp) {
                console.log(resp);
            });
        });



    }
</script>

<script>
    //order ke api radiologi
    function orderToRadiologi(datajson) {

        var settings = {
            "url": "http://rsud.sumselprov.go.id/labor/api/last-order",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            var form = new FormData();
            form.append("job_order_no", response.data.NextNoOrder);
            form.append("registration_no", "QREG/RI/202201280011");
            form.append("transaction_no", "JOR-RAD");
            form.append("paramedic_id", "A0010");
            form.append("service_unit_id", "TESTCODE^TESTNAME");
            form.append("location_id", "G20");
            form.append("job_order_datetime", "2023-04-11 14:08:00");
            form.append("remarks", "-");
            form.append("is_cito", "0");
            form.append("user_id", "1");
            form.append("gc_order_type", "X0151^001");
            form.append("is_testing", "0");
            form.append("room_no", "110");
            form.append("sender_contact_name", "");
            form.append("sender_relationship", "0063^ASC");
            form.append("sender_mobile_phone_no", "");
            form.append("sender_address", "");
            form.append("sender_notes", "");
            form.append("referal_no", "");
            form.append("referal_tanggal", "");
            form.append("referal_type", "");
            form.append("referal_healthcare", "");
            form.append("referal_name", "");
            form.append("referal_specialty", "");
            form.append("referal_address", "");
            form.append("referal_reason", "");
            form.append("referal_diagnostic_notes", "");
            form.append("referal_examination_notes", "");
            form.append("payer_type", "PERSONAL");
            form.append("items", "[{\"item_id\":\"RADNew40\",\"qty\":1,\"item_unit\":\"X\",\"personal_price\":117000,\"corporate_price\":0}]");
            form.append("order_type", "Imaging");
            form.append("medical_no", "00-00-00-01");
            form.append("families", "[{\"medical_no\":\"00-00-00-01\",\"family_mrn\":\"00-00-00-02\",\"family_name\":\"Nama A\",\"relationship\":\"0063^FND\",\"phone_no\":null,\"mobile_no\":\"0822324444\",\"ssn\":\"1617222233432\",\"tgl_lahir\":\"1987-09-23\",\"job\":\"Job A\",\"address\":\"Tes\",\"is_emergency_contact\":0},{\"medical_no\":\"00-00-00-01\",\"family_mrn\":\"00-00-00-03\",\"family_name\":\"Nama B\",\"relationship\":\"0063^FND\",\"phone_no\":null,\"mobile_no\":\"0822324445\",\"ssn\":\"1617222233431\",\"tgl_lahir\":\"1987-02-16\",\"job\":\"Job B\",\"address\":\"Tes\",\"is_emergency_contact\":0}]");
            form.append("address", "{\"home_address\":\"Jl. Testing, No. 12A, ...\",\"home_country\":\"0399^IDN\",\"home_province\":\"0347^SUMSEL \",\"home_district\":\"Ilir Barat I\",\"home_city\":\"Palembang\",\"home_zip_code\":\"30123\",\"home_phone_no\":\"08234545222\",\"home_email\":\"user1@email.com\",\"office_address\":\"Jl. Testing, No. 12A, ...\",\"office_country\":\"0399^IDN\",\"office_province\":\"0347^SUMSEL \",\"office_district\":\"Ilir Barat I\",\"office_city\":\"Palembang\",\"office_zip_code\":\"30123\",\"office_phone_no\":\"08234545222\",\"office_email\":\"user1@email.com\"}");

            var settingsorder = {
                "url": "http://rsud.sumselprov.go.id/labor/api/order-radiologi",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settingsorder).done(function(responseorder) {
                console.log(responseorder);
            });
        })

    }
</script>

<script>
    function getSoapPerawat() {
        console.log("tester")
        $.ajax({
            url: "{{route('get.soap.new.perawat')}}",
            type: "POST",
            dataType: "JSON",
            data: {
                //"_token": "{{ csrf_token() }}",
                "regno": regno
            },
            success: function(data) {
                var datasoap = data.data;
                var table = $('#table-cppt-perawat');
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
                    trS.appendChild(document.createTextNode(datasoap[i].soapdok_subject));
                    trO.appendChild(document.createTextNode(datasoap[i].soapdok_object));
                    trA.appendChild(document.createTextNode(datasoap[i].soapdok_assesment));
                    trP.appendChild(document.createTextNode(datasoap[i].soapdok_planning));
                    row.append($('<td>').append(trS, trO, trA, trP));
                    row.append($('<td>').text(""));
                    if (statusVerifikasi == 1) {
                        var btnShowQR = document.createElement('button')
                        btnShowQR.type = 'button'
                        btnShowQR.className = 'btn btn-success'
                        btnShowQR.innerText = 'Lihat QRCode'
                        btnShowQR.id = 'btnShowQR' + i
                        btnShowQR.value = datasoap[i].id
                        var trNamaVerifikasi = document.createElement('tr')
                        var trTglVerifikasi = document.createElement('tr')
                        trNamaVerifikasi.appendChild(document.createTextNode(datasoap[i].nama_verifikasi))
                        trTglVerifikasi.appendChild(document.createTextNode(datasoap[i].tanggal_verifikasi))
                        //btnShowQR.setAttribute('onclick','showQR(this)')
                        row.append($('<td>').append(trNamaVerifikasi, trTglVerifikasi, btnShowQR));
                        //row.append($('<td>').text("Sudah diverifikasi\nOleh Dr Khalif"));

                        // //change color
                        // row.css("background-color", "#00ff00");
                    } else {
                        row.append($('<td>').text("Belum diverifikasi"));
                        row.css("background-color", "#d5b3b3");
                    }
                    table.append(row);
                }
            }
        });
    }
</script>
<script>
    function loadCPOE2() {
        var levelUser = "{{Auth::user()->level_user}}";
        var id_cppt = $('#soapdok_id').val()
        if (levelUser == "dokter") {
            $.ajax({
                url: "{{ route('get.cpoe.dokter') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id_cppt": id_cppt,
                },
                success: function(data) {
                    //console.log(data)
                    var dataLab = data.dataLab
                    var dataradiologi = data.dataradiologi
                    var datafisio = data.datafisio
                    var dataobat = data.dataobat
                    var planning = ""
                    for (var i = 0; i < dataLab.length; i++) {
                        planning = planning + "(Lab)" + dataLab[i].item_name + "\n"
                    }

                    for (var i = 0; i < dataradiologi.length; i++) {
                        planning = planning + "(Rad)" + dataradiologi[i].item_name + "\n"
                    }

                    for (var i = 0; i < datafisio.length; i++) {
                        planning = planning + "(Fisio)" + datafisio[i].item_name + "\n"
                    }

                    for (var i = 0; i < dataobat.length; i++) {
                        planning = planning + "(Obat)" + dataobat[i].item_name + "\n"
                    }

                    $('#planning').val(planning)
                }
            })
        }
    }
</script>


<script>
    function getSoapDokter() {
        $.ajax({
            url: "{{ route('get.soap.dokter') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                "reg_no": regno,
            },
            beforeSend: function() {
                $('#table-cppt-dokter').html(`
                        <tr>
                            <td colspan="5" class="text-center">Memuat data...</td>    
                        </tr>
                    `)
            },
            success: function(data) {
                $('#table-cppt-dokter').html(``)

                var dataSoap = data.data_soap

                if (dataSoap.length > 0) {
                    dataSoap.sort(function(a, b) {
                        if (a.status_review !== b.status_review) {
                            return a.status_review - b.status_review;
                        }
                        var dateA = new Date(a.soap_tanggal + ' ' + a.soap_waktu);
                        var dateB = new Date(b.soap_tanggal + ' ' + b.soap_waktu);
                        return dateB - dateA;
                    });

                    var table = ""
                    for (var i = 0; i < dataSoap.length; i++) {
                        var statusVerifikasi = dataSoap[i].status_review
                        var soapdok_dokter = dataSoap[i].soapdok_dokter
                        var reg_dokter = dataSoap[i].reg_dokter
                        var is_dokter = dataSoap[i].is_dokter
                        var utama = dataSoap[i].dpjp_utama

                        $row_lab = ''
                        $row_radiologi = ''
                        $row_obat = ''
                        $row_lainnya = ''
                        $row_diagnosa = ''

                        if (dataSoap[i].order_lab && dataSoap[i].order_lab.length > 0) {
                            $.each(dataSoap[i].order_lab, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Laboratorium</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_radiologi && dataSoap[i].order_radiologi.length > 0) {
                            $.each(dataSoap[i].order_radiologi, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Radiologi</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_obat && dataSoap[i].order_obat.length > 0) {
                            $.each(dataSoap[i].order_obat, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Obat</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_lainnya && dataSoap[i].order_lainnya.length > 0) {
                            $.each(dataSoap[i].order_lainnya, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Tindakan Lainnya</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].diagnosa && dataSoap[i].diagnosa.length > 0) {
                            $.each(dataSoap[i].diagnosa, function(i_diagnosa, item_diagnosa) {
                                $row_diagnosa += `
                                        ` + item_diagnosa.ID_ICD10 + ` - ` + item_diagnosa.NM_ICD10 + `<br> 
                                    `
                            })
                        }

                        let contentRoleSoap = ''

                        if (dataSoap[i].bertindak_sebagai) {
                            let roleSoap = JSON.parse(dataSoap[i].bertindak_sebagai)
                            if (roleSoap) {
                                $.each(roleSoap, function(sub_i, sub_item) {
                                    contentRoleSoap += sub_item + (roleSoap.length != sub_i + 1 ? ', ' : '')
                                })
                            }
                        }

                        table = table + "<tr>"
                        table = table + "<td>" + (dataSoap[i].updated_at ? moment(dataSoap[i].updated_at).format('YYYY-MM-DD HH:mm:ss') : dataSoap[i].soap_tanggal + '<br>' + dataSoap[i].soap_waktu) + "</td>"
                        table = table + "<td class='text-center'>" + (dataSoap[i].nama_ppa ? dataSoap[i].nama_ppa : dataSoap[i].name) + " " + (contentRoleSoap ? '<br><br>(' + contentRoleSoap + ')' : dataSoap[i].soapdok_posisi ? '<br><br><b>( ' + dataSoap[i].soapdok_posisi + ' )</b>' : '') + "</td>"
                        table = table + `<td>
                                <b>(S)</b> ` + (dataSoap[i].soapdok_subject ?? '') + `<br/><br/>
                                <b>(O)</b> ` + (dataSoap[i].soapdok_object ?? '') + `<br/><br/>
                                <b>(A)</b> ` + (dataSoap[i].soapdok_assesment ? dataSoap[i].soapdok_assesment : '') + `<br/><br/>
                                <b>(P)</b> ` +
                            (dataSoap[i].soapdok_planning ?? '') + `<br/><br><br>
                                    <b>Tindakan Penunjang & Obat :</b>
                                    <span class="pl-3">` + $row_lab + '<br>' + $row_radiologi + '<br>' + $row_obat + '<br>' + $row_lainnya + `</span>
                                </td>`
                        table = table + "<td>" + (dataSoap[i].soapdok_instruksi ?? '') + "</td>"
                        // if(is_dokter=="1"){
                        //     table = table + "<td class='text-center'></td>"
                        // }else{
                        if (statusVerifikasi == 0) {
                            if (reg_dokter != utama) {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-secondary''>Menunggu Verif DPJP Utama</button>" +
                                    "</td>"
                            } else {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-danger' onclick='updateverifikasi(" + dataSoap[i].soapdok_id + ")'>Verifikasi</button>" +
                                    "</td>"
                            }
                        } else {
                            table = table + "<td class='text-center'>" +
                                "<button class='btn btn-primary' >Sudah Diverifikasi</button>" +
                                "</td>"
                        }
                        // }

                        table = table + "</tr>"
                    }
                    $('#table-cppt-dokter').html(table)
                } else {
                    $('#table-cppt-dokter').html(`
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>    
                            </tr>
                        `)
                }
            }
        })
    }
</script>

<script>
    $(document).ready(function() {
    $('#modalViewHistorySoap').on('show.bs.modal', function (e) {
        get_data_history_soap();
        });
    });
        function get_data_history_soap() {
        $.ajax({
            url: "{{ route('get.data.history.soap') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                reg_no: "{{ $dataPasien->reg_no }}"
            },
            beforeSend: function() {
                $('#table-history-soap').html(`
                    <tr>
                        <td colspan="8" class="text-center">Memuat data...</td>    
                    </tr>
                `);
            },
            success: function(data) {
                $('#table-history-soap').html(``);

                if (data.success) {
                    var dataSoap = data.data_soap;

                    if (dataSoap.length > 0) {
                    dataSoap.sort(function(a, b) {
                        if (a.status_review !== b.status_review) {
                            return a.status_review - b.status_review;
                        }
                        var dateA = new Date(a.soap_tanggal + ' ' + a.soap_waktu);
                        var dateB = new Date(b.soap_tanggal + ' ' + b.soap_waktu);
                        return dateB - dateA;
                    });

                    var table = ""
                    for (var i = 0; i < dataSoap.length; i++) {
                        var statusVerifikasi = dataSoap[i].status_review
                        var soapdok_dokter = dataSoap[i].soapdok_dokter
                        var reg_dokter = dataSoap[i].reg_dokter
                        var is_dokter = dataSoap[i].is_dokter
                        var utama = dataSoap[i].dpjp_utama

                        $row_lab = ''
                        $row_radiologi = ''
                        $row_obat = ''
                        $row_lainnya = ''
                        $row_diagnosa = ''

                        if (dataSoap[i].order_lab && dataSoap[i].order_lab.length > 0) {
                            $.each(dataSoap[i].order_lab, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Laboratorium</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_radiologi && dataSoap[i].order_radiologi.length > 0) {
                            $.each(dataSoap[i].order_radiologi, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Radiologi</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_obat && dataSoap[i].order_obat.length > 0) {
                            $.each(dataSoap[i].order_obat, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Obat</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].order_lainnya && dataSoap[i].order_lainnya.length > 0) {
                            $.each(dataSoap[i].order_lainnya, function(i_lab, item_lab) {
                                $row_lab += `
                                        ` + (i_lab == 0 ? '<br><b>Tindakan Lainnya</b><br>' : '') + `
                                        - ` + item_lab.item_name + `<br>    
                                    `
                            })
                        }
                        if (dataSoap[i].diagnosa && dataSoap[i].diagnosa.length > 0) {
                            $.each(dataSoap[i].diagnosa, function(i_diagnosa, item_diagnosa) {
                                $row_diagnosa += `
                                        ` + item_diagnosa.ID_ICD10 + ` - ` + item_diagnosa.NM_ICD10 + `<br> 
                                    `
                            })
                        }

                        let contentRoleSoap = ''

                        if (dataSoap[i].bertindak_sebagai) {
                            let roleSoap = JSON.parse(dataSoap[i].bertindak_sebagai)
                            if (roleSoap) {
                                $.each(roleSoap, function(sub_i, sub_item) {
                                    contentRoleSoap += sub_item + (roleSoap.length != sub_i + 1 ? ', ' : '')
                                })
                            }
                        }

                        table = table + "<tr>"
                        table = table + "<td>" + (dataSoap[i].updated_at ? moment(dataSoap[i].updated_at).format('YYYY-MM-DD HH:mm:ss') : (dataSoap[i].NotesDateTime ? moment(dataSoap[i].NotesDateTime).format('YYYY-MM-DD HH:mm:ss') : dataSoap[i].soap_tanggal + '<br>' + dataSoap[i].soap_waktu)) + "</td>"
                        table = table + "<td class='text-center'>" + (dataSoap[i].nama_ppa ? dataSoap[i].nama_ppa : (dataSoap[i].name ? dataSoap[i].name : (dataSoap[i].ParamedicName  ? dataSoap[i].ParamedicName  : ''))) + " " + (contentRoleSoap ? '<br><br>(' + contentRoleSoap + ')' : dataSoap[i].soapdok_posisi ? '<br><br><b>( ' + dataSoap[i].soapdok_posisi + ' )</b>' : '') + "</td>"
                        table += `<td>
                                    <b>(S)</b> ${dataSoap[i].soapdok_subject ?? 
                                    (dataSoap[i].Notes && dataSoap[i].Notes.includes('S/') 
                                        ? dataSoap[i].Notes.split('S/')[1]?.split('O/')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                        : (dataSoap[i].Notes && dataSoap[i].Notes.includes('SUBJECTIVE :') 
                                            ? dataSoap[i].Notes.split('SUBJECTIVE :')[1]?.split('OBJECTIVE :')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                            : ''))}<br/><br/>

                                    <b>(O)</b> ${dataSoap[i].soapdok_object ?? 
                                    (dataSoap[i].Notes && dataSoap[i].Notes.includes('O/') 
                                        ? dataSoap[i].Notes.split('O/')[1]?.split('A/')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                        : (dataSoap[i].Notes && dataSoap[i].Notes.includes('OBJECTIVE :') 
                                            ? dataSoap[i].Notes.split('OBJECTIVE :')[1]?.split('ASSESSMENT :')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                            : ''))}<br/><br/>

                                    <b>(A)</b> ${dataSoap[i].soapdok_assesment 
                                    ? dataSoap[i].soapdok_assesment.replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                    : (dataSoap[i].Notes && dataSoap[i].Notes.includes('A/') 
                                        ? dataSoap[i].Notes.split('A/')[1]?.split('P/')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                        : (dataSoap[i].Notes && dataSoap[i].Notes.includes('ASSESSMENT :') 
                                            ? dataSoap[i].Notes.split('ASSESSMENT :')[1]?.split('PLANNING :')[0]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                            : ''))}<br/><br/>

                                    <b>(P)</b> ${dataSoap[i].soapdok_planning ?? 
                                    (dataSoap[i].Notes && dataSoap[i].Notes.includes('P/') 
                                        ? dataSoap[i].Notes.split('P/')[1]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                        : (dataSoap[i].Notes && dataSoap[i].Notes.includes('PLANNING :') 
                                            ? dataSoap[i].Notes.split('PLANNING :')[1]?.trim().replace(/\[ OUTDATED \]/g, '').replace(/-+/g, '') 
                                            : ''))}<br/><br/>

                                    ${(!dataSoap[i].Notes || 
                                    (!dataSoap[i].Notes.includes('S/') && 
                                        !dataSoap[i].Notes.includes('O/') && 
                                        !dataSoap[i].Notes.includes('A/') && 
                                        !dataSoap[i].Notes.includes('P/') && 
                                        !dataSoap[i].Notes.includes('SUBJECTIVE :') && 
                                        !dataSoap[i].Notes.includes('OBJECTIVE :') && 
                                        !dataSoap[i].Notes.includes('ASSESSMENT :') && 
                                        !dataSoap[i].Notes.includes('PLANNING :'))) 
                                    ? `<b>Notes:</b> ${dataSoap[i].Notes ? dataSoap[i].Notes.split('[ OUTDATED ]')[0].trim().replace(/(\d{2}:\d{2})/g, '<br>$1').replace(/-+/g, '<br>') : ''}<br/><br/>` 
                                    : ''}`;

                                        if (dataSoap[i].Notes && dataSoap[i].Notes.includes('[ OUTDATED ]')) {
                                            let outdatedSections = dataSoap[i].Notes.split('[ OUTDATED ]');

                                            for (let j = 1; j < outdatedSections.length; j++) {
                                                let outdatedS = outdatedSections[j]?.split('O/')[0]?.trim().replace(/-+/g, '');
                                                let outdatedO = outdatedSections[j]?.split('O/')[1]?.split('A/')[0]?.trim().replace(/-+/g, '');
                                                let outdatedA = outdatedSections[j]?.split('A/')[1]?.split('P/')[0]?.trim().replace(/-+/g, '');
                                                let outdatedP = outdatedSections[j]?.split('P/')[1]?.trim().replace(/-+/g, '');

                                                table += `
                                                    <div class='soap-section'>
                                                        <b>(S - OUTDATED)</b> ${outdatedS}<br/><br/>
                                                        <b>(O - OUTDATED)</b> ${outdatedO}<br/><br/>
                                                        <b>(A - OUTDATED)</b> ${outdatedA}<br/><br/>
                                                        <b>(P - OUTDATED)</b> ${outdatedP}<br/><br/>
                                                    </div>`;
                                            }
                                        }

                        table += `<b>Tindakan Penunjang & Obat :</b>
                            <span class="pl-3">${$row_lab}<br>${$row_radiologi}<br>${$row_obat}<br>${$row_lainnya}</span>
                        </td>`;
                        table = table + "<td>" + (dataSoap[i].soapdok_instruksi ?? '') + "</td>"
                        // if(is_dokter=="1"){
                        //     table = table + "<td class='text-center'></td>"
                        // }else{
                        if (statusVerifikasi == 0) {
                            if (reg_dokter != utama) {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-secondary''>Menunggu Verif DPJP Utama</button>" +
                                    "</td>"
                            } else {
                                table = table + "<td class='text-center'>" +
                                    "<button class='btn btn-danger' onclick='updateverifikasi(" + dataSoap[i].soapdok_id + ")'>Verifikasi</button>" +
                                    "</td>"
                            }
                        } else {
                            table = table + "<td class='text-center'>" +
                                "<button class='btn btn-primary' >Sudah Diverifikasi</button>" +
                                "</td>"
                        }
                        // }

                            table = table + "</tr>"
                        }
                        $('#table-history-soap').html(table);
                    } else {
                        $('#table-history-soap').html(`
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>    
                            </tr>
                        `);
                    }
                } else {
                    Swal.fire('Gagal', 'Gagal mengambil data SOAP', 'error');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data SOAP', 'error');
            }
        });
    }
</script>

<script>
    function getRekomendasiRajal() {
        $.ajax({
            url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/" + medrec,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                var table = "";
                var tanggal = data.created_at
                var dpjp = data.ranap_dpjp
                var rekomendasi_paket = data.rekomendasi_tindakan
                var listTindakan = ""
                var item_id = data.ranap_rekomendasi_tindakan

                var ranap_diagnosa = data.ranap_diagnosa
                var ranap_indikasi = data.ranap_indikasi
                for (var i = 0; i < rekomendasi_paket.length; i++) {
                    listTindakan = listTindakan + "<li>" + rekomendasi_paket[i].ItemName1 + "</li>"
                }

                table = table + "<tr>"
                table = table + "<td class='text-center'>" + tanggal + "</td>"
                table = table + "<td class='text-center'>" + dpjp + "</td>"
                table = table + "<td><ul>" + listTindakan + "</ul></td>"
                table = table + "<td><button class='btn btn-primary' onclick='getDetailPaket(\"" + ranap_diagnosa + "\", \"" + ranap_indikasi + "\" , \"" + item_id + "\")'>Terima</button></td>";
                table = table + "</tr>"

                $('#table-rekomendasi').html(table)
            }
        })
    }
</script>
<script>
    function getDetailPaket(ranap_diagnosa, ranap_indikasi, item_id) {
        //http://rsud.sumselprov.go.id/simrs-rajal/api/emr/cpoe/data_detail_paket/11347
        $.ajax({
            url: "http://rsud.sumselprov.go.id/simrs-rajal/api/emr/cpoe/data_detail_paket/11347",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                console.log(ranap_diagnosa)
                console.log(ranap_indikasi)
                searchPaket(data, ranap_diagnosa, ranap_indikasi, item_id)
            }

        })
    }
    //cari harga paket
    function searchPaket(data, ranap_diagnosa, ranap_indikasi, item_id) {
        console.log("search paket")
        $.ajax({
            url: "http://rsud.sumselprov.go.id/simrs-rajal/api/emr/cpoe/data_all_item/X0001%5E01/002",
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                console.log(item_id)
                for (var i = 0; i < response.length; i++) {
                    if (response[i].ItemID == item_id) {
                        console.log(response[i])
                        storePaket(data, ranap_diagnosa, ranap_indikasi, response[i].ItemID, response[i].ItemName1, response[i].PersonalPrice)
                    }
                }


            }
        })
    }
    //store paket ke CPPT dan Order
    function storePaket(data, ranap_diagnosa, ranap_indikasi, item_code, nama_paket, harga_paket) {
        $.ajax({
            url: "{{ route('order.paket') }}",
            type: "POST",
            dataType: "JSON",
            data: {
                "reg_no": regno,
                "data": JSON.stringify(data),
                "ranap_diagnosa": ranap_diagnosa,
                "ranap_indikasi": ranap_indikasi,
                "med_rec": medrec,
                "soapdok_dokter": "{{ auth()->user()->dokter_id}}",
                "nama_ppa": "{{ auth()->user()->name}}",
                "nama_paket": nama_paket,
                "harga_paket": harga_paket,
                "item_code": item_code,
            },
            success: function(data) {
                //console.log(data)
                if (data.success == true) {
                    alert("Data Berhasil Disimpan")
                    window.location.reload()
                } else {
                    alert("Data Gagal Disimpan")
                }
            }
        })
    }
</script>

@yield('scripts')
@stack('myscripts')