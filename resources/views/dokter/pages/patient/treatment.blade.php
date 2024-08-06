@extends('dokter.layouts.app')
@push('addon-style')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                   {{-- <form action="{{route('diagnose.store')}}" method="POST">
                        @csrf--}}
                        <div class="row">
                            <input type="text" name="soapdok_reg" id="soapdok_reg" value="{{$patient->reg_no}}" hidden>
                            <input type="number" name="soapdok_dokter" id="soapdok_dokter" value="{{$patient->physician->ParamedicID}}"
                                   hidden>
                            <input type="text" name="soapdok_poli" id="soapdok_poli" value="{{$patient->ruangan}}" hidden>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Subjective</label>
                                    <textarea class="form-control text-sm" name="soapdok_subject" id="soapdok_subject"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Objective</label>
                                    <textarea class="form-control text-sm" name="soapdok_object" id="soapdok_object"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Assessment</label>
                                    <textarea class="form-control text-sm" name="soapdok_assesment" id="soapdok_assesment"
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-sm">Planning</label>
                                    <textarea class="form-control text-sm" name="soapdok_planning" id="soapdok_planning"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    <button onclick="simpancpoe()"
                            class="btn btn-sm btn-outline-primary float-right" type="submit"><i
                            class="fa fa-save mr-2"></i>Save
                    </button>
                        {{--
                    </form>--}}
                </div>
            </div>
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item text-sm"><a class="nav-link active" href="#refer-to-consult"
                                                        data-toggle="tab">Refer to Consult</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#cpoe"
                                                        data-toggle="tab">CPOE</a>
                        </li>
                        <li class="nav-item text-sm"><a class="nav-link" href="#e-prescription"
                                                        data-toggle="tab">e-Prescription</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="refer-to-consult">
                            <div class="mb-2">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active text-sm" id="home-tab" data-toggle="tab" href="#home"
                                           role="tab" aria-controls="home" aria-selected="true">Refer to Consult</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-sm" id="profile-tab" data-toggle="tab" href="#profile"
                                           role="tab" aria-controls="profile" aria-selected="false">Available
                                            Physician</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        @include('dokter.pages.refer-to-consult.index', ['patient' => $patient])
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                         aria-labelledby="profile-tab">
                                        <div class="mt-2">
                                            @include('dokter.pages.available-physician.index')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="cpoe">
                            @include('dokter.pages.cpoe.index', ['patient' => $patient])
                        </div>
                        <div class="tab-pane" id="e-prescription">
                            @include('dokter.pages.e-prescription.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @include('dokter.components.menu')
            @include('dokter.components.patient-resume')
        </div>
    </div>

@endsection

@push('addon-script')
    <script>
        $(function () {
            $('.treatment').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        let iteration = 1;
        const response = [];
        const btnTambahRacikan = document.getElementById("btn-tambah-obat-racikan");
        const btnTambahSatuan = document.getElementById("btn-tambah-obat-satuan");

        getObat();

        function btnClick() {
            const selectObat = document.getElementById(`select-obat-${iteration}`);
            const hargaJual = document.getElementById(`input-harga-jual-${iteration}`);
            console.log(selectObat);
            console.log(hargaJual);
            selectObat.onchange = setDetailObat(selectObat, hargaJual);
        }

        btnTambahRacikan.onclick = function (event) {
            event.preventDefault();
            createElement(iteration);
            iteration++;
        };

        btnTambahSatuan.onclick = function (event) {
            event.preventDefault();
            createObatSatuanElement(iteration);
            iteration++;
        };

        function createOption(element) {
            const disabledOption = document.createElement("option");
            disabledOption.selected = true;
            disabledOption.disabled = true;
            disabledOption.hidden = true;

            disabledOption.textContent = "Pilih Obat"

            element.appendChild(disabledOption);
            for (const val of response) {
                const option = document.createElement("option");
                option.className = ""

                option.value = val.item_name;
                option.innerText = val.item_name;

                element.appendChild(option);
            }

        }

        function getObat() {
            const ajax = new XMLHttpRequest();
            ajax.open("GET", "http://rsud.sumselprov.go.id/sim-farmasi/api/stok-depo?location=ranap");
            ajax.addEventListener("load", function () {
                const json = JSON.parse(ajax.responseText);
                const stok = json.data.stok;

                for (const stokElement of stok) {
                    response.push(stokElement);
                }

                const btnTambahRacikan = document.getElementById("btn-tambah-obat-racikan");
                btnTambahRacikan.disabled = false;
                btnTambahRacikan.textContent = "Tambah Obat Racikan";

                const btnTambahSatuan = document.getElementById("btn-tambah-obat-satuan");
                btnTambahSatuan.disabled = false;
                btnTambahSatuan.textContent = "Tambah Obat Satuan";

                createElement(iteration);
                createObatSatuanElement(iteration);

                iteration++;
            });
            ajax.send();
            console.log(response);
        }

        function createRacikanNamaObat(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const select = document.createElement("select");
            select.className = "form-control select2bs4";
            select.id = `select-obat-${iteration}`;
            select.name = 'item_code[]';
            div.appendChild(select);

            return td;
        }

        function createRacikanQty(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-qty-${iteration}`;
            input.name = 'qty[]';

            div.appendChild(input);

            return td;
        }

        function createRacikanDosis(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-dosis-${iteration}`;
            input.name = 'dosis[]';

            div.appendChild(input);

            return td;
        }

        function createRacikanHari(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-hari-${iteration}`;
            input.name = 'hari[]';

            div.appendChild(input);

            return td;
        }

        function createRacikanDurasiHari(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-duarasi-hari-${iteration}`;
            input.name = 'durasi_hari[]';

            div.appendChild(input);

            return td;
        }

        function createRacikanKetDosis(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-keterangan-dosis-${iteration}`;
            input.name = 'ket_dosis[]';

            div.appendChild(input);

            return td;
        }

        function createRacikanHargaJual(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.readOnly = true;
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-harga-jual-${iteration}`;
            input.name = 'harga_jual[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanNamaObat(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const select = document.createElement("select");
            select.className = "form-control select2bs4";
            select.id = `select-obat-satuan-${iteration}`;
            select.name = 'item_code[]';
            div.appendChild(select);

            return td;
        }

        function createSatuanQty(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-qty-satuan-${iteration}`;
            input.name = 'qty[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanDosis(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-dosis-satuan-${iteration}`;
            input.name = 'dosis[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanHari(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-hari-satuan-${iteration}`;
            input.name = 'hari[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanDurasiHari(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-duarasi-hari-satuan-${iteration}`;
            input.name = 'durasi_hari[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanKetDosis(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-keterangan-dosis-satuan-${iteration}`;
            input.name = 'ket_dosis[]';

            div.appendChild(input);

            return td;
        }

        function createSatuanHargaJual(iteration) {
            const td = document.createElement("td");
            td.className = "text-sm";

            const div = document.createElement("div");
            div.className = "form-group";
            td.appendChild(div);

            const input = document.createElement("input");
            input.readOnly = true;
            input.type = "text";
            input.className = "form-control form-control-sm text-sm"
            input.id = `input-harga-jual-satuan-${iteration}`;
            input.name = 'harga_jual[]';

            div.appendChild(input);

            return td;
        }

        function createElement(iteration) {
            console.log(iteration);
            const tr = document.createElement("tr");

            const namaObat = createRacikanNamaObat(iteration);
            const qty = createRacikanQty(iteration);
            const dosis = createRacikanDosis(iteration);
            const hari = createRacikanHari(iteration);
            const durasiHari = createRacikanDurasiHari(iteration);
            const ketDosis = createRacikanKetDosis(iteration);
            const hargaJual = createRacikanHargaJual(iteration);

            tr.appendChild(namaObat);
            tr.appendChild(qty);
            tr.appendChild(dosis);
            tr.appendChild(hari);
            tr.appendChild(durasiHari);
            tr.appendChild(ketDosis);
            tr.appendChild(hargaJual);

            console.log(namaObat);

            const tbody = document.querySelector(".racikanListBody");
            tbody.appendChild(tr);

            const select = document.getElementById(`select-obat-${iteration}`);
            const inputHarga = document.getElementById(`input-harga-jual-${iteration}`);
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            createOption(select);
            select.onchange = function () {
                const ajax = new XMLHttpRequest();
                let stok;
                ajax.open("GET", `http://rsud.sumselprov.go.id/sim-farmasi/api/stok-depo?location=ranap&keyword=${select.value}`);
                ajax.addEventListener("load", function () {
                    const json = JSON.parse(ajax.responseText);
                    stok = json.data.stok;

                    if (stok.harga_jual && stok.harga_jual !== "") {
                        inputHarga.value = stok.harga_jual;
                    } else {
                        inputHarga.value = 0;
                    }
                    console.log(inputHarga.value);
                });
                ajax.send();
                return stok;
            };
        }

        function createObatSatuanElement(iteration) {
            console.log(iteration);
            const tr = document.createElement("tr");

            const namaObat = createSatuanNamaObat(iteration);
            const qty = createSatuanQty(iteration);
            const dosis = createSatuanDosis(iteration);
            const hari = createSatuanHari(iteration);
            const durasiHari = createSatuanDurasiHari(iteration);
            const ketDosis = createSatuanKetDosis(iteration);
            const hargaJual = createSatuanHargaJual(iteration);

            tr.appendChild(namaObat);
            tr.appendChild(qty);
            tr.appendChild(dosis);
            tr.appendChild(hari);
            tr.appendChild(durasiHari);
            tr.appendChild(ketDosis);
            tr.appendChild(hargaJual);

            console.log(namaObat);

            const tbody = document.querySelector(".satuanListBody");
            tbody.appendChild(tr);

            const select = document.getElementById(`select-obat-satuan-${iteration}`);
            const inputHarga = document.getElementById(`input-harga-jual-satuan-${iteration}`);
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
            createOption(select);
            select.onchange = function () {
                const ajax = new XMLHttpRequest();
                let stok;
                ajax.open("GET", `http://rsud.sumselprov.go.id/sim-farmasi/api/stok-depo?location=ranap&keyword=${select.value}`);
                ajax.addEventListener("load", function () {
                    const json = JSON.parse(ajax.responseText);
                    stok = json.data.stok;

                    if (stok.harga_jual && stok.harga_jual !== "") {
                        inputHarga.value = stok.harga_jual;
                    } else {
                        inputHarga.value = 0;
                    }
                    console.log(inputHarga.value);
                });
                ajax.send();
                return stok;
            };
        }

    </script>
    <script>

        function simpancpoe(){
            var patientregno=document.getElementById('soapdok_reg')
            var paramedicid=document.getElementById('soapdok_dokter')
            var ruangan=document.getElementById('soapdok_poli')

            var subjective=document.getElementById('soapdok_subject')
            var objective=document.getElementById('soapdok_object')
            var assesment=document.getElementById('soapdok_assesment')
            var etPlaning=document.getElementById('soapdok_planning');

            console.log(patientregno.value)
            var sendParams="soapdok_reg="+patientregno.value+
                "&soapdok_dokter="+paramedicid.value+
                "&soapdok_poli="+ruangan.value+
                "&soapdok_subject="+subjective.value+
                "&soapdok_object="+objective.value+
                "&soapdok_assesment="+assesment.value+
                "&soapdok_planning="+etPlaning.value


            console.log(sendParams)

           /* const ajax = new XMLHttpRequest();
            ajax.open("POST", "",true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            // ajax.withCredentials = true;
            // ajax.setRequestHeader("x-csrf-token", "fetch");
            ajax.addEventListener("load",function () {


            })
            ajax.send(sendParams)*/

            $.ajax({
                type:'POST',
                url:"{{route('soap.api.store')}}",
                data:{
                    soapdok_reg:patientregno.value,
                    soapdok_dokter:paramedicid.value,
                    soapdok_poli:ruangan.value,
                    soapdok_subject:subjective.value,
                    soapdok_object:objective.value,
                    soapdok_assesment:assesment.value,
                    soapdok_planning:etPlaning.value,
                    arrayLabor:arrayLabor,
                    arrayImaging:arrayImaging
                },
                success:function(data){
                    if(data.status==true){
                        subjective.value=""
                        objective.value=""
                        assesment.value=""
                        etPlaning.value=""
                        arrayImaging=[]
                        arrayLabor=[]
                    }
                    //alert(data.success);
                }
            });
            /*console.log(arrayLabor)
            console.log(arrayImaging)*/
        }
    </script>

@endpush
