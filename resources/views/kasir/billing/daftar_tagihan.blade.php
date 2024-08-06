@extends('kasir/layout/master')
@section('title', 'Daftar Tagihan')
@section('content')
    <div class="row">
        <div class="col-4 col-md-2 col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    No Rekam Medis
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->MedicalNo}}</th>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Masuk Rawat Inap
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->reg_tgl}}</th>
                            </tr>
                            <tr>
                                <td>
                                    Nama Pasien
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->PatientName}}</th>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Lahir
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->DateOfBirth}}</th>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                            </tr>
                            <tr>
                                <th>Perempuan</th>
                            </tr>
                            <tr>
                                <td>
                                    DPJP Utama
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->ParamedicName}}</th>
                            </tr>
                            <tr>
                                <td>
                                    Ruangan Rawat
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->nama_ruangan}}</th>
                            </tr>
                            <tr>
                                <td>
                                    PAYER
                                </td>
                            </tr>
                            <tr>
                                <th>{{$pasien->reg_cara_bayar}} <a href=""><span class="badge text bg-warning">Ubah</span></a></th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-3">
                            <h8>List Tagihan | No Registrasi: {{$reg_no}} | Status: <span
                                    class="badge text teal px-4">Belum
                                    dibayar</span> </h8>
                        </div>
                        <div class="d-flex justify-content-end mb-3 me-1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus-lg"></i> Tambah Item
                            </button>
                        </div>
                        <h2>Tagihan Rawat Jalan</h2>
                        <table class="table table-striped center" style="width:100%">
                            <thead>
                            <tr>
                                <th>AKSI</th>
                                <th>JENIS TINDAKAN/ITEM</th>
                                <th>KODE TINDAKAN</th>
                                <th>NAMA TINDAKAN</th>
                                <th>TANGGAL ORDER</th>
                                <th>USER ORDER</th>
                                <th>JUMLAH</th>
                                <th>HARGA</th>
                            </tr>
                            </thead>
                            <tbody id="table_tagihan_rawat_jalan">

                            </tbody>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Tagihan</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="total_tagihan_rajal">Rp.</td>
                            </tr>
                        </table>

                        <h2>Tagihan Rawat Inap</h2>
                        <table id="example" class="table table-striped center" style="width:100%">
                            <thead>
                            <tr>
                                <th>AKSI</th>
                                <th>JENIS TINDAKAN/ITEM</th>
                                <th>KODE TINDAKAN</th>
                                <th>NAMA TINDAKAN</th>
                                <th>TANGGAL ORDER</th>
                                <th>USER ORDER</th>
                                <th>CLASS COVER</th>
                                <th>HARGA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totaltagihanvisit=0;
                            @endphp
                            @foreach($visit as $rowvisit)
                                @php
                                    $totaltagihanvisit=$totaltagihanvisit+$pasien->FeeAmount;
                                @endphp
                                    <tr>
                                        <td>
                                           {{-- <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>--}}
                                        </td>
                                        <td>Visit Dokter</td>
                                        <td>{{$pasien->ParamedicCode}}</td>
                                        <td>Visit</td>
                                        <td>{{$rowvisit->soap_tanggal}}</td>
                                        <td>{{$pasien->ParamedicName}}</td>
                                        <td>{{$pasien->reg_cara_bayar}}</td>
                                        <td>Rp. {{number_format($pasien->FeeAmount,2)}}</td>
                                    </tr>
                            @endforeach


                            </tbody>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Tagihan</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp.{{number_format($totaltagihanvisit,2)}}</td>
                            </tr>
                        </table>
                        <table id="example" class="table table-striped center" style="width:100%">
                            <thead>
                            <tr>
                                <th>JENIS TINDAKAN/ITEM</th>
                                <th>KODE TINDAKAN</th>
                                <th>NAMA TINDAKAN</th>
                                <th>HARGA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totaltagihanpaket=0;
                            @endphp
                            @foreach($paket as $rowpaket)

                                @php
                                    $totaltagihanpaket=$totaltagihanpaket+$rowpaket->price;
                                @endphp
                                <tr>
                                    <td>Paket</td>
                                    <td>{{$rowpaket->item_code}}</td>
                                    <td>{{$rowpaket->item_name}}<br/>
                                       @php
                                       echo "<ul>".$rowpaket->rincian_paket."</ul>";
                                        @endphp
                                    </td>

                                    <td>Rp. {{number_format($rowpaket->price,2)}}</td>
                                </tr>

                            @endforeach


                            </tbody>
                            <tr>
                                <th colspan="1">Total Tagihan</th>
                                <td></td>
                                <td></td>
                                <td>Rp.{{number_format($totaltagihanpaket,2)}}</td>
                            </tr>
                        </table>
                        <table id="example" class="table table-striped center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>AKSI</th>
                                    <th>JENIS TINDAKAN/ITEM</th>
                                    <th>KODE TINDAKAN</th>
                                    <th>NAMA TINDAKAN</th>
                                    <th>TANGGAL ORDER</th>
                                    <th>USER ORDER</th>
                                    <th>CLASS COVER</th>
                                    <th>HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $totaltagihan=0;
                            @endphp
                            @foreach($tagihan as $row)


                                @if($row->jenis_order=="lainnya" || $row->jenis_order=="radiologi" || $row->jenis_order=="lab")
                                    @php
                                        $totaltagihan=$totaltagihan+$row->harga_jual;
                                    @endphp
                                    <tr>
                                        <td>
                                           {{-- <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>--}}
                                        </td>
                                        <td>{{$row->jenis_order}}</td>
                                        <td>{{$row->item_code}}</td>
                                        <td>{{$row->item_name}}</td>
                                        <td>{{$row->waktu_order}}</td>
                                        <td>{{$row->ParamedicName}}</td>
                                        <td>{{$pasien->reg_cara_bayar}}</td>
                                        <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                    </tr>
                                @endif
                            @endforeach


                            </tbody>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Tagihan</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp.{{number_format($totaltagihan,2)}}</td>
                            </tr>
                        </table>

{{--                        data order obat--}}

                        <table id="example" class="table table-striped center" style="width:100%">
                            <thead>
                            <tr>
                                <th>AKSI</th>
                                <th>JENIS TINDAKAN/ITEM</th>
                                {{--
                                <th>KODE TINDAKAN</th>
                                --}}
                                <th>NAMA TINDAKAN</th>
                                <th>TANGGAL ORDER</th>
                                <th>USER ORDER</th>
                                <th>CLASS COVER</th>
                                <th>KUANTITAS</th>
                                <th>HARGA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totaltagihanobat=0;
                            @endphp
                            @foreach($tagihan as $rowobat)

                                @if($rowobat->jenis_order=="obat")
                                    @php
                                        $totaltagihanobat=$totaltagihanobat+($rowobat->harga_jual*$rowobat->qty);
                                    @endphp
                                    <tr>
                                        <td>
                                           {{-- <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>--}}
                                        </td>
                                        <td>{{$rowobat->jenis_order}}</td>
                                        {{--
                                        <td>{{$rowobat->item_code}}</td>
                                        --}}
                                        <td>{{$rowobat->item_name}}</td>
                                        <td>{{$rowobat->waktu_order}}</td>
                                        <td>{{$rowobat->ParamedicName}}</td>
                                        <td>{{$pasien->reg_cara_bayar}}</td>
                                        <td>{{$rowobat->qty+0}}</td>
                                        <td>Rp. {{number_format(($rowobat->harga_jual*$rowobat->qty),2)}}</td>
                                    </tr>
                                @endif

                            @endforeach


                            </tbody>
                            <tr>
                                <td></td>
                                <th colspan="2">Total Tagihan</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp.{{number_format($totaltagihanobat,2)}}</td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-end mt-3 mb-1">

                            {{--<button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal3">
                                CETAK KWITANSI
                            </button>--}}
                            @if($pasien->reg_discharge=="3")
                                <a href="{{route('kasir.cetak.invoice',['regno'=>$pasien->reg_no])}}" target="_blank" class="btn btn-info mx-2">CETAK INVOICE</a>
                            @else
                                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                    REVIEW
                                </button>
                                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal4">
                                    Pembayaran
                                </button>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Item Tindakan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="" class="form-label">Jenis Item</label>
                                <select class="form-select" aria-label="Default select example" id="jenisTindakan" name="jenisTindakan" onchange="pilihJenisItem()">
                                    <option selected>--Pilih jenis item--</option>
                                    <option value="X0001^05">Radiologi</option>
                                    <option value="X0001^04">Laboratorium</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Item</label>
                                <select class="form-select" aria-label="Default select example" id="itemTindakan" name="itemTindakan" onchange="getPriceTindakan()" disabled>
                                    <option selected>--Pilih nama item--</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tarif Item</label>
                                <input type="text" class="form-control" id="tarifitem" name="tarifitem" placeholder="">
                            </div>
                          {{--  <div class="mb-3">
                                <label for="" class="form-label">Tipe Item</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>--Pilih tipe item--</option>
                                    <option value="1">Radiologi</option>
                                </select>
                            </div>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" onclick="addTindakan()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Review Data Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Item</th>
                                            <th>Jumlah</th>
                                            <th>Tarif</th>
                                        </tr>
                                        <tr>
                                            <th>Jenis Layanan: Laboratium</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totaltagihanlab=0;
                                            $totaltagihanrad=0;
                                            $totaltagihanfisio=0;
                                            $totaltagihanobat=0;
                                            $totaltagihanvisit=0;
                                            $totaltagihanlain=0;
                                            $totaltagihanpaket=0;
                                        @endphp
                                        @foreach($tagihan as $row)
                                            @if($row->jenis_order=="lab")
                                                @php
                                                    $totaltagihanlab+=$row->harga_jual;
                                                @endphp
                                                <tr>
                                                    <td>{{$row->waktu_order}}</td>
                                                    <td>{{$row->item_name}}</td>
                                                    <td>{{$row->qty}}</td>
                                                    <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Subtotal</td>
                                            <td>Rp. {{number_format($totaltagihanlab,2)}}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Jenis layanan : Radiologi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tagihan as $row)
                                        @if($row->jenis_order=="radiologi")
                                            @php
                                                $totaltagihanrad+=$row->harga_jual;
                                            @endphp
                                            <tr>
                                                <td>{{$row->waktu_order}}</td>
                                                <td>{{$row->item_name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanrad,2)}}</td>
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Jenis layanan : Fisiologi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tagihan as $row)
                                        @if($row->jenis_order=="fisio")
                                            @php
                                                $totaltagihanfisio+=$row->harga_jual;
                                            @endphp
                                            <tr>
                                                <td>{{$row->waktu_order}}</td>
                                                <td>{{$row->item_name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanfisio,2)}}</td>
                                    </tr>
                                    </tbody>


                                    <thead>
                                    <tr>
                                        <th>Jenis layanan : Obat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tagihan as $row)
                                        @if($row->jenis_order=="obat")
                                            @php
                                                $totaltagihanobat+=($row->harga_jual*$row->qty);
                                            @endphp
                                            <tr>
                                                <td>{{$row->waktu_order}}</td>
                                                <td>{{$row->item_name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>Rp. {{number_format(($row->harga_jual*$row->qty),2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanobat,2)}}</td>
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Jenis layanan : Paket</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tagihan as $row)
                                        @if($row->jenis_order=="paket")
                                            @php
                                                $totaltagihanpaket+=$row->harga_jual;
                                            @endphp
                                            <tr>
                                                <td>{{$row->waktu_order}}</td>
                                                <td>{{$row->item_name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanpaket,2)}}</td>
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <thead>
                                    <tr>
                                        <th>Jenis layanan : Lainnya</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tagihan as $row)
                                        @if($row->jenis_order=="lainnya")
                                            @php
                                                $totaltagihanlain+=$row->harga_jual;
                                            @endphp
                                            <tr>
                                                <td>{{$row->waktu_order}}</td>
                                                <td>{{$row->item_name}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td>Rp. {{number_format($row->harga_jual,2)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanlain,2)}}</td>
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Jenis layanan : Visit Dokter</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($visit as $row)
                                        @php
                                            $totaltagihanvisit+=$pasien->FeeAmount;
                                        @endphp
                                        <tr>
                                            <td>{{$row->soap_tanggal}}</td>
                                            <td>Visit Dokter</td>
                                            <td>1</td>
                                            <td>Rp. {{number_format($pasien->FeeAmount,2)}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>Rp. {{number_format($totaltagihanobat,2)}}</td>
                                    </tr>
                                    </tbody>



                                    <tr>
                                        <th colspan="2">TOTAL</th>
                                        <td></td>
                                        <td>Rp.{{number_format(($totaltagihanrad+$totaltagihanfisio+$totaltagihanobat+$totaltagihanlab+$totaltagihanvisit+$totaltagihanlain+$totaltagihanpaket),2)}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="addreview()">Simpan Review</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Data Kwitansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">PIC Pengesahan</label>
                                <select class="form-select" aria-label="Default select example" >
                                    <option selected>--Pilih--</option>
                                    <option value="1">Bendahara Penerima RSUD Siti Fatimah Provinsi Sumsel </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nama PIC Pengesahan</label>
                                <input type="text" class="form-control" id="" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Keperluan Pembayaran</label>
                                <textarea class="form-control" id="" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Cetak Kwitansi</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            @php
                            $totaltagihan = 
                            // START
                                $totaltagihanrad
                                + $totaltagihanfisio
                                + $totaltagihanobat
                                + $totaltagihanlab
                                + $totaltagihanvisit
                                + $totaltagihanlain
                                + $totaltagihanpaket
                            // END
                            ;
                            @endphp
                            <div class="mb-3">
                                <label for="" class="form-label">Total Tagihan</label>
                                <input type="text" class="form-control" id="" placeholder="" value="Rp. {{number_format($totaltagihan,2)}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Jumlah Tanggungan Asuransi</label>
                                <input type="number" class="form-control" id="tanggungan_asuransi" name="tanggungan_asuransi" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Jumlah Selisih Bayar</label>
                                <input type="number" class="form-control" id="selisih_bayar" name="selisih_bayar" placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Cara Bayar</label>
                                <select class="form-select" aria-label="Default select example" id="cara_bayar" name="cara_bayar">
                                    <option selected>--Pilih Cara Pembayaran--</option>
                                    <option value="cash">Cash</option>
                                    <option value="debit">Debit</option>
                                    <option value="credit">Kredit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nomor Kartu</label>
                                <input type="number" class="form-control" id="nomor_kartu" name="nomor_kartu" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status Bayar</label>
                                <select class="form-select" aria-label="Default select example" id="status_bayar" name="status_bayar">
                                    <option selected>--Pilih Status Pembayaran--</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="belum_lunas">Belum Lunas</option>
                                </select>
                            </div>


                            {{--  <div class="mb-3">
                                  <label for="" class="form-label">Tipe Item</label>
                                  <select class="form-select" aria-label="Default select example">
                                      <option selected>--Pilih tipe item--</option>
                                      <option value="1">Radiologi</option>
                                  </select>
                              </div>--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" onclick="invoice()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
           getTagihanRajal();
        });
        function getTagihanRajal(){
            //var id = $('#id_pasien').val();
           /* var table_tagihan_rajal=$('#table_tagihan_rawat_jalan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/tagihan/00-00-00-01",
                    type: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_tindakan', name: 'nama_tindakan'},
                    {data: 'harga', name: 'harga'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'total', name: 'total'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],


            });*/
            var table=document.getElementById('table_tagihan_rawat_jalan');
            var totalRajal=document.getElementById('total_tagihan_rajal');
            $.ajax({
                url: "http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/tagihan/00-00-00-01",
                type: "GET",
                dataType: "json",
                success:function(data) {
                   console.log(data.bill)
                    //add data.bill to table table_tagihan_rajal
                    var html = '';
                    var i;
                    var totalTagihanRajal=0;
                    for(i=0; i<data.bill.length; i++){
                        var itemTarif=data.bill[i].ItemTarif;
                        totalTagihanRajal=parseInt(itemTarif)+totalTagihanRajal;
                        var tr=document.createElement('tr');
                        var td1=document.createElement('td');
                        var td2=document.createElement('td');
                        var td3=document.createElement('td');
                        var td4=document.createElement('td');
                        var td5=document.createElement('td');
                        var td6=document.createElement('td');
                        var td7=document.createElement('td');
                        var td8=document.createElement('td');

                        td1.innerHTML="";
                        td2.innerHTML=data.bill[i].ItemTindakan;
                        td3.innerHTML=data.bill[i].ItemCode;
                        td4.innerHTML=data.bill[i].ItemName1;
                        td5.innerHTML=data.bill[i].ItemTanggal;
                        td6.innerHTML=data.bill[i].ItemDokter;
                        td7.innerHTML=data.bill[i].ItemJumlah;
                        td8.innerHTML=data.bill[i].ItemTarif;

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);
                        tr.appendChild(td6);
                        tr.appendChild(td7);
                        tr.appendChild(td8);

                        table.appendChild(tr);
                    }
                    totalRajal.innerHTML="Rp. "+totalTagihanRajal;
                }

            });
        }
        function addTindakan(){

            var optJenisTindakan=document.getElementById('jenisTindakan')
            var optItemTindakan=document.getElementById('itemTindakan')
            var tarifitem=document.getElementById('tarifitem')
            var jenisTindakan=optJenisTindakan.options[optJenisTindakan.options.selectedIndex].text
            var kodeTindakan=optItemTindakan.value
            var namaitem=optItemTindakan.options[optItemTindakan.options.selectedIndex].text
            var medrec="{{(isset($reg_no))?$reg_no:""}}"

            console.log(jenisTindakan)
            console.log(kodeTindakan)
            console.log(namaitem)
            console.log(medrec)
            var token="{{csrf_token()}}"
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('kasir.addtindakan')}}",
                data:{
                    _token:token,
                    itemTindakan:namaitem,
                    jenisTindakan:jenisTindakan,
                    tarifItem:tarifitem.value,
                    reg_no:medrec,
                    kodetindakan:kodeTindakan,
                    kode_dokter:'{{$pasien->ParamedicCode}}',

                },
                success:function(data){
                    if(data.status==true){
                        if(medrec!=""){
                            window.location.replace("{{route('kasir.tagihan',['reg_no'=>$reg_no])}}");
                        }
                    }else{
                        alert("gagal menambah tindakan")
                    }
                    //alert(data.success);
                }
            });
        }
    </script>

    <script>
        function addreview(){
           if(confirm('Pastikan data yang telah direview benar karena data yang telah direview tidak dapat dihapus')){
               $.ajax({
                   url:"{{route('add.billing.review')}}",
                   type:"post",
                   data:{
                       'reg_no':'{{$pasien->reg_no}}',
                       'kode_dokter':'{{$pasien->ParamedicCode}}',
                       'feeamount':'{{$pasien->FeeAmount}}'
                   },
                   success:function (data) {
                       if(data.status==true){
                           alert('berhasil menyimpan review data')
                           window.location.replace("{{route('kasir.tagihan',['reg_no'=>$reg_no])}}");
                       }else{
                           alert(data.message)
                       }
                   }
               })
           }
        }
    </script>

    <script>
        function invoice(){
            if(confirm('Apakah Anda yakin transaksi telah dilakukan?')){
                $.ajax({
                    url:"{{route('invoice')}}",
                    type:"post",
                    data:{
                       'regno':'{{$pasien->reg_no}}',
                        'tanggungan_asuransi':$('#tanggungan_asuransi').val(),
                        'selisih_bayar':$('#selisih_bayar').val(),
                        'cara_bayar':$('#cara_bayar').val(),
                        'nomor_kartu':$('#nomor_kartu').val(),
                        'status_bayar':$('#status_bayar').val(),
                        'kasir_id':'{{auth()->user()->id}}',
                        'nama_kasir':'{{auth()->user()->user_name}}',

                    },
                    success:function (data) {
                        if(data.status==true){
                            alert('berhasil menyimpan invoice data')
                            window.location.replace("{{route('kasir.tagihan',['reg_no'=>$reg_no])}}");
                        }else{
                            alert(data.message)
                        }
                    }
                })
            }
        }

    </script>


@endpush
{{--@push('addon-script')

    <script>
        function pilihJenisItem(){
            var optJenisTindakan=document.getElementById('jenisTindakan')
            var optItemTindakan=document.getElementById('itemTindakan')
            var idjenisTindakan=optJenisTindakan.value
            const ajax = new XMLHttpRequest();
            ajax.open("POST", "{{route('tarif.tindakan')}}",true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.addEventListener("load",function () {
                var jsonArrayLabor=JSON.parse(ajax.responseText)
                for(var i=0;i<jsonArrayLabor.length;i++){

                    var itemgrupname=jsonArrayLabor[i]['ItemGroupName1']
                    var arrayTindakanLabor=jsonArrayLabor[i]['item_tindakan'];
                    var itemGroupCode=jsonArrayLabor[i]['ItemGroupCode']
                    var harga=0;

                    if(arrayTindakanLabor.length>0){

                        for(var j=0;j<arrayTindakanLabor.length;j++){
                            var namatindakan=arrayTindakanLabor[j]['ItemName1']
                            var standarprice=arrayTindakanLabor[j]['StandardPrice']
                            var ItemCode=arrayTindakanLabor[j]['ItemCode']
                            var option = document.createElement("option");
                            option.value = ItemCode;
                            option.text = namatindakan;
                            optItemTindakan.appendChild(option)
                            console.log(namatindakan)
                        }
                    }else{
                        var option = document.createElement("option");
                        option.value = itemGroupCode;
                        option.text = itemgrupname;
                        optItemTindakan.appendChild(option)
                    }


                    //console.log(jsonArrayLabor[i]);

                }

            })
            ajax.send("type="+idjenisTindakan+"&class=5");
        }
    </script>
@endpush--}}
