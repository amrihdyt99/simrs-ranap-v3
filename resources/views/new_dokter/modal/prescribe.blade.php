<?php
$req = '<span class="text-danger"> *<span>';
?>

<div class="modal fade" id="modalPrescribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Form Order Obat
            </div>
            <div class="modal-body" style="height: 80vh;overflow-y: auto">
                <ul class="nav nav-tabs my-2 mx-2" id="myTab" role="tablist">
                    <li class="nav-item font-weight-bold">
                        <a class="nav-link active" id="satuan-tab" data-toggle="tab" href="#satuan" role="tab"
                           aria-controls="satuan" aria-selected="true"><h3><strong>Obat Satuan</strong></h3></a>
                    </li>
                    <li class="nav-item font-weight-bold">
                        <a class="nav-link" id="racikan-tab" data-toggle="tab" href="#racikan" role="tab"
                           aria-controls="racikan" aria-selected="false"><h3><strong>Obat Racikan</strong></h3></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContents">
                    <div class="tab-pane fade show active" id="satuan" role="tabpanel" aria-labelledby="satuan-tab">
                       {{-- <div class="row">
                            <div class="row">
                                <label class="control-label">Obat Pulang</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"
                                               name="obat_pulang"
                                               value="Ya">Ya</label>
                                </div>
                                <div class="form-check"><label class="form-check-label"><input type="radio"
                                                                                               class="form-check-input"
                                                                                               name="obat_pulang"
                                                                                               value="Tidak">Tidak</label>
                                </div>
                            </div>


                        </div>--}}
                        <div class="form-group">
                            <label>Cari Nama Obat</label>
                            <input class="form-control" id="x_nama_obat_cari" name="nama_obat"/>
                            <button class="btn btn-primary" onclick="integrasiObat()">Cari</button>
                            <select id="pilihObat" name="pilihObat" class="form-control">
                                <option value="">----Pilih Obat-----</option>
                            </select>
                            <button class="btn btn-primary" id="btn-tambah" onclick="pilihObat()">Tambah</button>
                        </div>
                        <div id="row_satuan">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="racikan" role="tabpanel" aria-labelledby="racikan-tab">
                        <form id="form-obat-racikan">
                            @csrf
                            <input type="hidden" name="prescribe_reg" value="{{$reg}}">
                            <input type="hidden" name="prescribe_flag" value="1">
                            <div class="form-group"><label class="control-label">Obat Pulang</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input"
                                                                                               name="obat_pulang"
                                                                                               value="Ya">Ya</label>
                                </div>
                                <div class="form-check"><label class="form-check-label"><input type="radio"
                                                                                               class="form-check-input"
                                                                                               name="obat_pulang"
                                                                                               value="Tidak">Tidak</label>
                                </div>
                            </div>
                            <select id="pilihObat" name="pilihObat" class="form-control">
                                <option value="">----Pilih Obat-----</option>
                            </select>
                            <div id="row_racikan"></div>
                            {{-- <div class="text-center font-weight-bold load_prescribe mb-3">Memuat data...</div> --}}
                            <button class="btn btn-success float-right" id="store-row-prescribe" data-category="racikan"
                                    type="button"><i class="fas fa-arrow-down"></i> Simpan ke tabel
                            </button>
                            <button class="btn btn-secondary float-right mr-1" id="cancel-row-prescribe"
                                    data-category="racikan" type="button">batal
                            </button>
                        </form>
                    </div>
                </div>
                <p class="text-center text-load"></p>
                <div class="table-responsive mt-3">
                    <h5>DETAIL ORDER</h5>
                    <table rules="all" class="table table striped table_detail_order">
                        <thead>
                        <tr class="bg-dark text-white">
                            <th>Jenis</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Qty</th>
                            <th>Dosis</th>
                            <th>Hari</th>
                            <th>Durasi Hari</th>
                            <th>Harga Satuan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody id="table-row-prescribe">
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success float-right" id="send-row-prescribe" type="button" onclick="orderobat()">
                    <i class="fas fa-paper-plane"></i> Kirim ke Farmasi
                </button>
                <button type="button" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditPrescribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Form Edit Order Obat
            </div>
            <div class="modal-body">
                <div class="tab-pane fade show active" id="satuan" role="tabpanel" aria-labelledby="satuan-tab">
                    <form id="form-edit-prescribe">
                        @csrf
                        <input type="hidden" name="prescribe_reg" value="{{$reg}}">
                        <input type="hidden" name="prescribe_flag">
                        <input type="hidden" name="prescribe_flag_racikan">
                        <input type="hidden" name="prescribe_unit">
                        <input type="hidden" name="prescribe_order_code">
                        <div id="row_edit_prescribe"></div>
                        <p class="text-center text-load"></p>
                    </form>
                </div>
                <button class="btn btn-success float-right" id="edit-row-prescribe" type="button"><i
                        class="fas fa-paper-plane"></i> Kirim ke Farmasi
                </button>
                <button type="button" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@push('myscripts')
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

    {{--    <script>--}}
    {{--        $('#send-row-prescribe').click(function(){--}}

    {{--            if (window.confirm('Kirim ke farmasi sekarang ?')) {--}}
    {{--                var tableOrder=document.getElementById('table-row-prescribe')--}}
    {{--                var arrayKode=[]--}}
    {{--                var arrayNamaObat=[]--}}
    {{--                var arrayQty=[]--}}
    {{--                var arrayDosis=[]--}}
    {{--                var arrayHargaSatuan=[]--}}
    {{--                var arrayKeterangan=[]--}}
    {{--                var arrayJenisObat=[]--}}
    {{--                for(var i=0;i<tableOrder.rows.length;i++){--}}
    {{--                    var jenisObat=document.getElementById('jenis'+i)--}}
    {{--                    var kodeObat=document.getElementById('kode_obat'+i)--}}
    {{--                    var namaObat=document.getElementById('nama_obat'+i)--}}
    {{--                    var qtyObat=document.getElementById('qty'+i)--}}
    {{--                    var dosisObat=document.getElementById('dosis'+i)--}}
    {{--                    var hargaSatuanObat=document.getElementById('hargasatuan'+i)--}}
    {{--                    var keteranganObat=document.getElementById('keterangan'+i)--}}

    {{--                    arrayKode.push(kodeObat.value)--}}
    {{--                    arrayNamaObat.push(namaObat.innerText)--}}
    {{--                    arrayQty.push(qtyObat.value)--}}
    {{--                    arrayDosis.push(dosisObat.value)--}}
    {{--                    arrayJenisObat.push(jenisObat.innerText)--}}
    {{--                    if(hargaSatuanObat.value.empty()){--}}
    {{--                        arrayHargaSatuan.push("0")--}}
    {{--                    }else{--}}
    {{--                        arrayHargaSatuan.push(hargaSatuanObat.value)--}}
    {{--                    }--}}
    {{--                    arrayKeterangan.push(keteranganObat.value)--}}

    {{--                }--}}

    {{--                //console.log(arrayKode)--}}
    {{--                $.ajax({--}}
    {{--                    url: '{{route('dokter.order.obat')}}',--}}
    {{--                    type: 'POST',--}}
    {{--                    dataType: 'json',--}}
    {{--                    data: {--}}
    {{--                        'reg_no':regno,--}}
    {{--                        'kode_dokter':"{{auth()->user()->dokter_id}}",--}}
    {{--                        'service_unit':"{{$dataPasien->service_unit}}"--}}
    {{--                        'item_code[]':arrayKode,--}}
    {{--                        'qty[]':arrayQty--}}
    {{--                        'dosis[]':arrayDosis--}}
    {{--                        'ket_dosis[]':arrayKeterangan,--}}
    {{--                        'harga_jual[]':arrayHargaSatuan,--}}

    {{--                    },--}}
    {{--                    success: function(resp){--}}
    {{--                        if (resp == 200) {--}}
    {{--                            $('#modalPrescribe').modal('hide');--}}
    {{--                        } else if (resp == 404) {--}}
    {{--                            alert('Tidak ada order obat yang dikirim')--}}
    {{--                        }--}}
    {{--                    },--}}
    {{--                    error: function(){--}}
    {{--                        alert('Gagal menyimpan data, mohon hubungi tim Administrator');--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--      --}}
    {{--    </script>--}}
@endpush
