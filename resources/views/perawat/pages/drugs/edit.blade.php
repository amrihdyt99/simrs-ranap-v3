@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@section('nyaa_content_body')
    <div class="card card-default">
        <div class="card-header">
            <strong class="text-sm">Drugs</strong>
        </div>
        <form action="{{ route('perawat.drugs.ubah') }}" method="POST">
            @csrf
            <input type="text" name="reg_no" value="{{ $reg_no }}" hidden>
            <input type="text" name="id" value="{{ $data_id }}" hidden>
            <input type="text" name="verifikasi_nurse" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" hidden>
            <div class="card-body">

                {{-- <div class="form-group">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover treatment table-sm">
                        <tbody>
                        <tr>
                            @for ($i = 0; $i < 24; $i++)
                                @php
                                $nama_rentang_jam="rentang_jam_".$i;
                                $nama_tipe_jam="tipe_jam_".$i;
                                @endphp
                                <td class="text-sm">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="data_perjam[0]rentang_jam[]"
                                               value="{{$i}}" {{$drugs[0]->$nama_rentang_jam!=null? "checked":""}}>
                                        <label class="form-check-label">{{$i}}</label>
                                    </div>
                                    <select class="custom-select custom-select-sm" name="tipe_jam[]">
                                        <option value="" {{$drugs[0]->tipe_jam_0==null ? 'selected' : '' }}>-- Pilih --</option>
                                        <option value="O" {{$drugs[0]->$nama_tipe_jam=="O"? "selected":""}}>O</option>
                                        <option value="T" {{$drugs[0]->$nama_tipe_jam=="T"? "selected":""}}>T</option>
                                        <option value="K" {{$drugs[0]->$nama_tipe_jam=="K"? "selected":""}}>K</option>
                                        <option value="A" {{$drugs[0]->$nama_tipe_jam=="A"? "selected":""}}>A</option>
                                        <option value="ESO" {{$drugs[0]->$nama_tipe_jam=="ESO"? "selected":""}}>ESO</option>
                                        <option value="TAP" {{$drugs[0]->$nama_tipe_jam=="TAP"? "selected":""}}>TAP</option>
                                    </select>
                                </td>

                            @endfor


                        </tr>
                    </table>
                    </div>
                </div> --}}

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
                    <label class="text-sm">Nama Dokter BELUM</label>
                    {{-- <input class="form-control" id="kode_dokter" name="kode_dokter" value="{{$datamypatient[0]->reg_dokter}}" hidden/>
                    <input class="form-control" id="nama_dokter" name="nama_dokter" value="{{$datamypatient[0]->ParamedicName}}" readonly/> --}}
                </div>
                <div class="form-group">
                    <label for="" class="text-sm">Cara Pemberian</label>
                    <select class="custom-select custom-select-sm" name="cara_pemberian">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Regular/Normal" {{$data_detail_pemberian_obat->cara_pemberian=='Regular/Normal' ? 'selected' : ''}}>IV</option>
                        <option value="Pasien Pulang" {{$data_detail_pemberian_obat->cara_pemberian=='Pasien Pulang' ? 'selected' : ''}}>IM</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->cara_pemberian=='CITO' ? 'selected' : ''}}>IC</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->cara_pemberian=='CITO' ? 'selected' : ''}}>SC</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->cara_pemberian=='CITO' ? 'selected' : ''}}>PO</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->cara_pemberian=='CITO' ? 'selected' : ''}}>Topical</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->cara_pemberian=='CITO' ? 'selected' : ''}}>Suppos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="text-sm">Anti Biotik</label>
                    <select class="custom-select custom-select-sm" name="antibiotik">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Regular/Normal" {{$data_detail_pemberian_obat->antibiotik=='Regular/Normal' ? 'selected' : ''}}>P</option>
                        <option value="Pasien Pulang" {{$data_detail_pemberian_obat->antibiotik=='Pasien Pulang' ? 'selected' : ''}}>E</option>
                        <option value="CITO" {{$data_detail_pemberian_obat->antibiotik=='CITO' ? 'selected' : ''}}>D</option>
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
                                <input type="text" class="text-sm form-control form-control-sm" name="dosis" value="{{$data_detail_pemberian_obat->dosis}}">
                            </td>
                            <td class="text-sm">
                                <input type="text" class="text-sm form-control form-control-sm" name="frekuensi" value="{{$data_detail_pemberian_obat->frekuensi}}">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="form-group table-responsive">
                        <table class="table table-bordered table-hover treatment table-sm">
                            <tbody>
                                <tr>
                                    @php
                                        $form_pemberian_obat_display=[
                                            0 => '00',
                                            1 => '01',
                                            2 => '02',
                                            3 => '03',
                                            4 => '04',
                                            5 => '05',
                                            6 => '06',
                                            7 => '07',
                                            8 => '08',
                                            9 => '09',
                                            10 => '10',
                                            11 => '11',
                                            12 => '12',
                                            13 => '13',
                                            14 => '14',
                                            15 => '15',
                                            16 => '16',
                                            17 => '17',
                                            18 => '18',
                                            19 => '19',
                                            20 => '20',
                                            21 => '21',
                                            22 => '22',
                                            23 => '23',
                                    ];
                                    @endphp
                                    @foreach ( $form_pemberian_obat_display as $form_pemberian_obat_display_key=>$form_pemberian_obat_display_val )
                                        @php
                                            $var_nama_rentang_jam='rentang_jam_'.$form_pemberian_obat_display_key;
                                            $var_nama_tipe_jam='tipe_jam_'.$form_pemberian_obat_display_key;
                                        @endphp
                                        <td class="text-sm">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="data_perjam[{{$form_pemberian_obat_display_key}}][rentang_jam]" value="{{$form_pemberian_obat_display_key}}" {{$data_detail_pemberian_obat->$var_nama_rentang_jam!=null? 'checked' : '' }}>
                                                <label class="form-check-label">{{$form_pemberian_obat_display_val}}</label>
                                            </div>
                                            <select class="custom-select custom-select-sm" name="data_perjam[{{$form_pemberian_obat_display_key}}][tipe_jam]">
                                                <option value="" {{$data_detail_pemberian_obat->$var_nama_tipe_jam==null ? 'selected' : '' }}>-- Pilih --</option>
                                                <option value="O" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='O' ? 'selected' : '' }}>O</option>
                                                <option value="T" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='T' ? 'selected' : '' }}>T</option>
                                                <option value="K" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='K' ? 'selected' : '' }}>K</option>
                                                <option value="A" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='A' ? 'selected' : '' }}>A</option>
                                                <option value="ESO" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='ESO' ? 'selected' : '' }}>ESO</option>
                                                <option value="TAP" {{$data_detail_pemberian_obat->$var_nama_tipe_jam=='TAP' ? 'selected' : '' }}>TAP</option>
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                        </table>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="" class="text-sm">Tanggal Pemberian</label>
                            <input type="date" class="form-control form-control-sm text-sm" name="tgl_pemberian"
                                value="{{$data_detail_pemberian_obat->tgl_pemberian_0}}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>

            </div>
        </form>
    @endsection

    @push('addon-script')
        <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
        <!-- dropzonejs -->
        <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            })
        </script>
    @endpush
