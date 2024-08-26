<?php
    $req = '<span class="text-danger"> *<span>';
?>

<div class="modal fade" id="modalPrescribeNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>FORM ORDER OBAT</b></h3>
                <div class="d-flex justify-content-end">
                    <span type="button" class="btn btn-warning btn-sm" id="copy-prescribe"><i class="fas fa-arrow-left"></i> Salin resep sebelumnya</span>
                    <button class="btn btn-warning prescribe-copy-loading" disabled type="button"><i class="fas fa-spinner fa-spin"></i> Mohon tunggu...</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-1 pl-0">
                        <div class="modal-tab active" id="prescribe-tab" data-category="satuan"><h3><strong>Obat Satuan</strong></h3></div>
                    </div>
                    <div class="col-lg-1">
                        <div class="modal-tab last-tab" id="prescribe-tab" data-category="racikan"><h3><strong>Obat Racikan</strong></h3></div>
                    </div>
                </div>
                <div class="row mx-2 my-3">
                    <div class="col-lg-12">
                        <div id="form_select_prescribe"></div>
                    </div>
                </div>
                <p class="text-center text-load"></p>
                <div class="table-responsive mt-3">
                    <h5>
                        DETAIL ORDER | TOTAL HARGA : Rp. <input type="number" id="t_harga_prescribe" style="border: none" value="" readonly> ,-
                        <span id="f_harga_prescribe"></span>
                    </h5>
                    <table rules="all" class="table1 table_detail_order" width="100%" style="font-color: black">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>Aksi</th>
                                <th>Jenis</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="table-row-prescribe">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-right">Sub Total</th>
                                <th colspan="1" class="text-right">Rp. <span id="sub_harga_prescribe">0</span></th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row mb-3">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4 float-right">
                            <label for="" class="label-admisi">Catatan Dokter</label>
                            <textarea rows="3" name="prescribe_catatan_dokter"  class="form-control no-radius mt-1" placeholder="Catatan dokter untuk obat ini"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success float-right" id="send-row-prescribe" type="button"><i class="fas fa-paper-plane"></i> Kirim ke Farmasi</button>
                    <button class="btn btn-warning float-right prescribe-loading" disabled type="button"><i class="fas fa-spinner fa-spin"></i> Mohon tunggu...</button>
                    <button type="button" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Tutup</button>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditPrescribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="prescribe_order_code">
                        <div class="row row_header_satuan d-flex justify-content-end"></div>
                        <div id="row_edit_prescribe"></div>
                        <p class="text-center text-load"></p>
                    </form>
                </div>
                <button class="btn btn-success float-right" id="edit-row-prescribe" type="button"><i class="fas fa-paper-plane"></i> Kirim ke Farmasi</button>
                <button type="button" class="btn btn-secondary float-right mr-1" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>