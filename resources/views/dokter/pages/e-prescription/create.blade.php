@extends('dokter.layouts.app')
@section('content')
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-sm" id="custom-tabs-obat-satuan-tab"
                       data-toggle="pill"
                       href="#custom-tabs-obat-satuan" role="tab"
                       aria-controls="custom-tabs-obat-satuan"
                       aria-selected="true">Obat Satuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-sm" id="custom-tabs-obat-racikan-tab"
                       data-toggle="pill"
                       href="#custom-tabs-obat-racikan" role="tab"
                       aria-controls="custom-tabs-obat-racikan"
                       aria-selected="false">Obat Racikan</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active"
                     id="custom-tabs-obat-satuan" role="tabpanel"
                     aria-labelledby="custom-tabs-obat-satuan-tab">
                    <button class="btn btn-sm btn-outline-primary float-right mb-2" id="btn-tambah-obat-satuan"
                            disabled>Mohon
                        Tunggu...
                    </button>
                    <form action="{{route('dokter.obat.satuan.store')}}" method="post">
                        @csrf
                        <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
                        <input type="text" name="service_unit" value="{{$patient->service_unit}}" hidden>
                        <input type="text" name="kode_dokter" value="{{$patient->reg_dokter}}" hidden>
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                            <tr>
                                <th class="text-sm" style="width: 40%">Nama Obat</th>
                                <th class="text-sm" style="width: 10%">Quantity</th>
                                <th class="text-sm" style="width: 10%">Dosis</th>
                                <th class="text-sm" style="width: 10%">Hari</th>
                                <th class="text-sm" style="width: 10%">Durasi Hari</th>
                                <th class="text-sm" style="width: 10%">Keterangan Dosis</th>
                                <th class="text-sm" style="width: 10%">Harga Jual</th>
                            </tr>
                            </thead>
                            <tbody class="satuanListBody">

                            </tbody>
                        </table>
                        <button class="btn btn-sm btn-outline-primary float-right mb-2" id="">Kirim Obat
                        </button>
                    </form>

                </div>
                <div class="tab-pane fade" id="custom-tabs-obat-racikan"
                     role="tabpanel"
                     aria-labelledby="custom-tabs-obat-racikan-tab">
                    <button class="btn btn-sm btn-outline-primary float-right mb-2" id="btn-tambah-obat-racikan"
                            disabled>Mohon
                        Tunggu...
                    </button>
                    <form action="{{route('dokter.obat.racikan.store')}}" method="post">
                        @csrf
                        <input type="text" name="reg_no" value="{{$patient->reg_no}}" hidden>
                        <input type="text" name="service_unit" value="{{$patient->service_unit}}" hidden>
                        <input type="text" name="kode_dokter" value="{{$patient->dokter}}" hidden>
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                            <tr>
                                <th class="text-sm" style="width: 40%">Nama Obat</th>
                                <th class="text-sm" style="width: 10%">Quantity</th>
                                <th class="text-sm" style="width: 10%">Dosis</th>
                                <th class="text-sm" style="width: 10%">Hari</th>
                                <th class="text-sm" style="width: 10%">Durasi Hari</th>
                                <th class="text-sm" style="width: 10%">Keterangan Dosis</th>
                                <th class="text-sm" style="width: 10%">Harga Jual</th>
                            </tr>
                            </thead>
                            <tbody class="racikanListBody">

                            </tbody>
                        </table>
                        <button class="btn btn-sm btn-outline-primary float-right mb-2" id="">Kirim Obat
                        </button>
                    </form>

                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>

    {{--    <div class="card card-default">--}}
    {{--        <div class="card-header">--}}
    {{--            <strong class="text-sm">E-Prescription</strong>--}}
    {{--        </div>--}}
    {{--        <form action="{{route('e-prescription.store')}}" method="POST">--}}
    {{--            @csrf--}}
    {{--            <input type="text" name="prescribe_reg" value="{{$patient->reg_no}}" hidden>--}}
    {{--            <input type="text" name="prescribe_poli" value="{{$patient->service_unit}}" hidden>--}}
    {{--            <input type="text" name="prescribe_dokter" value="{{$patient->physician->ParamedicID}}" hidden>--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="form-group">--}}
    {{--                    <label class="text-sm">Nama Obat</label>--}}
    {{--                    <select id="obat" name="prescribe_item" class="form-control select2bs4">--}}
    {{--                        <option value="">-</option>--}}
    {{--                        @foreach ($obat as $row)--}}
    {{--                            <option value="{{ $row->ItemID }}">--}}
    {{--                                {{ $row->ItemName1 }}--}}
    {{--                            </option>--}}
    {{--                        @endforeach--}}
    {{--                    </select>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="" class="text-sm">Consume Method</label>--}}
    {{--                            <input type="text" class="form-control form-control-sm text-sm" name="prescribe_method">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col">--}}
    {{--                        <label for=""></label>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <div class="form-check form-check-inline">--}}
    {{--                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1"--}}
    {{--                                       name="prescribe_required">--}}
    {{--                                <label class="form-check-label text-sm" for="inlineCheckbox1">As Required</label>--}}
    {{--                            </div>--}}
    {{--                            --}}{{--                            <div class="form-check form-check-inline">--}}
    {{--                            --}}{{--                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">--}}
    {{--                            --}}{{--                                <label class="form-check-label text-sm" for="inlineCheckbox2">Sweetener</label>--}}
    {{--                            --}}{{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="form-group">--}}
    {{--                    <table class="table table-bordered table-hover treatment table-sm">--}}
    {{--                        <thead>--}}
    {{--                        <tr>--}}
    {{--                            <th class="text-sm">Dosage<code>*</code></th>--}}
    {{--                            <th class="text-sm">Dosage Unit<code>*</code></th>--}}
    {{--                            <th class="text-sm">Frequency<code>*</code></th>--}}
    {{--                            <th class="text-sm">Duration</th>--}}
    {{--                            <th class="text-sm">Disp Qty</th>--}}
    {{--                            <th class="text-sm">Embalance<code>*</code></th>--}}
    {{--                            <th class="text-sm">Route<code>*</code></th>--}}
    {{--                        </tr>--}}
    {{--                        </thead>--}}
    {{--                        <tbody>--}}
    {{--                        <tr>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm" name="prescribe_dosage">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm" name="prescribe_unit">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm"--}}
    {{--                                       name="prescribe_frequency">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm"--}}
    {{--                                       name="prescribe_duration">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm" name="prescribe_qty">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm"--}}
    {{--                                       name="prescribe_item_unit">--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <input type="text" class="text-sm form-control form-control-sm" name="prescribe_route">--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--                <div class="form-group">--}}
    {{--                    <table class="table table-bordered table-hover treatment table-sm">--}}
    {{--                        <tbody>--}}
    {{--                        <tr>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]"--}}
    {{--                                           value="0">--}}
    {{--                                    <label class="form-check-label">00</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="1">--}}
    {{--                                    <label class="form-check-label">01</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="2">--}}
    {{--                                    <label class="form-check-label">02</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="3"--}}
    {{--                                           value="3">--}}
    {{--                                    <label class="form-check-label">03</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="4"--}}
    {{--                                           value="4">--}}
    {{--                                    <label class="form-check-label">04</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="5"--}}
    {{--                                           value="5">--}}
    {{--                                    <label class="form-check-label">05</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="6"--}}
    {{--                                           value="6">--}}
    {{--                                    <label class="form-check-label">06</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="7"--}}
    {{--                                           value="7">--}}
    {{--                                    <label class="form-check-label">07</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="8"--}}
    {{--                                           value="8">--}}
    {{--                                    <label class="form-check-label">08</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="9"--}}
    {{--                                           value="9">--}}
    {{--                                    <label class="form-check-label">09</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="10"--}}
    {{--                                           value="10">--}}
    {{--                                    <label class="form-check-label">10</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="11"--}}
    {{--                                           value="11">--}}
    {{--                                    <label class="form-check-label">11</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="12"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">12</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="13"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">13</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="14"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">14</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="15"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">15</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="16"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">16</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="17"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">17</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="18"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">18</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="19"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">19</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="20"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">20</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="21"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">21</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="22"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">22</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="text-sm">--}}
    {{--                                <div class="form-check form-check-inline">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="prescribe_number[]" value="23"--}}
    {{--                                           value="option2">--}}
    {{--                                    <label class="form-check-label">23</label>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-md-2">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="" class="text-sm">Tanggal</label>--}}
    {{--                            <input type="date" class="form-control form-control-sm text-sm" name="prescribe_date">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-2">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="" class="text-sm">Waktu</label>--}}
    {{--                            <input type="time" class="form-control form-control-sm text-sm" name="prescribe_time">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-2">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="" class="text-sm">Instruction</label>--}}
    {{--                            <input type="text" class="form-control form-control-sm text-sm"--}}
    {{--                                   name="prescribe_instruction">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-2">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="" class="text-sm">Iteration</label>--}}
    {{--                            <input type="text" class="form-control form-control-sm text-sm" name="prescribe_iteration">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <label for="" class="text-sm">Order Type</label>--}}
    {{--                    <select class="custom-select custom-select-sm" name="prescribe_type">--}}
    {{--                        <option selected disabled>Open this select menu</option>--}}
    {{--                        <option value="Regular/Normal">Regular/Normal</option>--}}
    {{--                        <option value="Pasien Pulang">Pasien Pulang</option>--}}
    {{--                        <option value="CITO">CITO</option>--}}
    {{--                    </select>--}}
    {{--                </div>--}}

    {{--                <div class="form-group">--}}
    {{--                    <textarea name="prescribe_note" id="" cols="30" rows="4"--}}
    {{--                              class="form-control-sm form-control"></textarea>--}}
    {{--                </div>--}}

    {{--                --}}{{--                <div class="form-group">--}}
    {{--                --}}{{--                    <label for="" class="text-sm">Detail Item</label>--}}
    {{--                --}}{{--                    <div class="row">--}}
    {{--                --}}{{--                        <div class="col-md-2">--}}
    {{--                --}}{{--                            <label for="" class="text-sm">Gastinal Suspension</label>--}}
    {{--                --}}{{--                            <input type="text" class="form-control form-control-sm">--}}
    {{--                --}}{{--                        </div>--}}
    {{--                --}}{{--                        <div class="col-md-2">--}}
    {{--                --}}{{--                            <label for="" class="text-sm">Botol 120ml</label>--}}
    {{--                --}}{{--                            <input type="text" class="form-control form-control-sm" >--}}
    {{--                --}}{{--                        </div>--}}
    {{--                --}}{{--                    </div>--}}
    {{--                --}}{{--                </div>--}}


    {{--                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>--}}
    {{--            </div>--}}
    {{--        </form>--}}
    {{--    </div>--}}
@endsection

@push('addon-script')
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

@endpush
