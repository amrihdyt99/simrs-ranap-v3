<div class="card card-default">
    <div class="card-header">
        <strong class="text-sm">Drugs</strong>
    </div>
    <form id="form_nursing_drugs">
        {{-- <form action="{{route('perawat.drugs.store')}}" method="POST"> --}}
        {{-- @csrf --}}
        <input type="text" name="reg_no" value="{{ $registrationInap->reg_no }}" hidden>
        <input type="text" name="verifikasi_nurse" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" hidden>
        <div class="card-body">
            <div class="form-group">
                <label class="text-sm">Nama Obat</label>
                <select id="obat" name="kode_obat" class="form-control select2bs4">
                    <option value="">-</option>
                    @foreach ($obatdaridokter as $row)
                        <option value="{{ $row->item_code }}">
                            {{ $row->item_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="text-sm">Nama Dokter</label>
                <input class="form-control" id="kode_dokter" name="kode_dokter"
                    value="{{ $datamypatient[0]->reg_dokter }}" hidden />
                <input class="form-control" id="nama_dokter" name="nama_dokter"
                    value="{{ $datamypatient[0]->ParamedicName }}" readonly />
            </div>
            <div class="form-group">
                <label for="" class="text-sm">Cara Pemberian</label>
                <select class="custom-select custom-select-sm" name="cara_pemberian">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Regular/Normal">IV</option>
                    <option value="Pasien Pulang">IM</option>
                    <option value="CITO">IC</option>
                    <option value="CITO">SC</option>
                    <option value="CITO">PO</option>
                    <option value="CITO">Topical</option>
                    <option value="CITO">Suppos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="text-sm">Anti Biotik</label>
                <select class="custom-select custom-select-sm" name="antibiotik">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Regular/Normal">P</option>
                    <option value="Pasien Pulang">E</option>
                    <option value="CITO">D</option>
                </select>
            </div>
            <div class="form-group">
                <table class="table table-bordered table-hover treatment table-sm">
                    <thead>
                        <tr>
                            <th class="text-sm">Dosis<code>*</code></th>
                            <th class="text-sm">Frekuensi<code>*</code></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-sm">
                                <input type="number" class="text-sm form-control form-control-sm" name="dosis">
                            </td>
                            <td class="text-sm">
                                <input type="number" class="text-sm form-control form-control-sm" name="frekuensi">
                            </td>
                        </tr>
                </table>
            </div>
            <div class="form-group">
                <table class="table table-bordered table-hover treatment table-sm">
                    <tbody>
                        <tr>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="data_perjam[0][rentang_jam]"
                                        value="0">
                                    <label class="form-check-label">00</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[0][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="data_perjam[1][rentang_jam]"
                                        value="1">
                                    <label class="form-check-label">01</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[1][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="data_perjam[2][rentang_jam]"
                                        value="2">
                                    <label class="form-check-label">02</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[2][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[3][rentang_jam]" value="3" value="3">
                                    <label class="form-check-label">03</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[3][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[4][rentang_jam]" value="4" value="4">
                                    <label class="form-check-label">04</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[4][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[5][rentang_jam]" value="5" value="5">
                                    <label class="form-check-label">05</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[5][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[6][rentang_jam]" value="6" value="6">
                                    <label class="form-check-label">06</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[6][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[7][rentang_jam]" value="7" value="7">
                                    <label class="form-check-label">07</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[7][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>

                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[8][rentang_jam]" value="8" value="8">
                                    <label class="form-check-label">08</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[8][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[9][rentang_jam]" value="9" value="9">
                                    <label class="form-check-label">09</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[9][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[10][rentang_jam]" value="10" value="10">
                                    <label class="form-check-label">10</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[10][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[11][rentang_jam]" value="11" value="11">
                                    <label class="form-check-label">11</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[11][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[12][rentang_jam]" value="12" value="option2">
                                    <label class="form-check-label">12</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[12][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[13][rentang_jam]" value="13" value="option2">
                                    <label class="form-check-label">13</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[13][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[14][rentang_jam]" value="14" value="option2">
                                    <label class="form-check-label">14</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[14][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[15][rentang_jam]" value="15" value="option2">
                                    <label class="form-check-label">15</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[15][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[16][rentang_jam]" value="16" value="option2">
                                    <label class="form-check-label">16</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[16][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[17][rentang_jam]" value="17" value="option2">
                                    <label class="form-check-label">17</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[17][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[18][rentang_jam]" value="18" value="option2">
                                    <label class="form-check-label">18</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[18][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[19][rentang_jam]" value="19" value="option2">
                                    <label class="form-check-label">19</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[19][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[20][rentang_jam]" value="20" value="option2">
                                    <label class="form-check-label">20</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[20][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[21][rentang_jam]" value="21" value="option2">
                                    <label class="form-check-label">21</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[21][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[22][rentang_jam]" value="22" value="option2">
                                    <label class="form-check-label">22</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[22][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                            <td class="text-sm">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                        name="data_perjam[23][rentang_jam]" value="23" value="option2">
                                    <label class="form-check-label">23</label>
                                </div>
                                <select class="custom-select custom-select-sm" name="data_perjam[23][tipe_jam]">
                                    <option value="" selected>-- Pilih --</option>
                                    <option value="O">O</option>
                                    <option value="T">T</option>
                                    <option value="K">K</option>
                                    <option value="A">A</option>
                                    <option value="ESO">ESO</option>
                                    <option value="TAP">TAP</option>
                                </select>
                            </td>
                        </tr>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="text-sm">Tanggal Pemberian</label>
                        <input type="datetime-local" class="datetime-auto form-control" name="tgl_pemberian"
                            value="">
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="text-sm">Catatan Nurse</label>
                        <textarea class="form-control form-control-sm text-sm"
                                  name="catatan"></textarea>
                    </div>
                </div>
            </div> --}}

            <button type="button" onclick="addNursingDrugs()"
                class="btn btn-sm btn-primary float-right">Submit</button>

        </div>
    </form>
</div>
