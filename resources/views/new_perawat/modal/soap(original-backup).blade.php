<div class="modal fade" id="modalSOAP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
      <div class="modal-content">
        <form id="form-entry-soap">
            <div class="modal-header">
                <h3>Tambah Data CPPT</h3>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="soaper_reg" value="{{$reg}}">
                @if (session()->get('poli_kode') == 'RJ')
					<input type="hidden" name="soaper_poli" value="">
				@else
					<input type="hidden" name="soaper_poli" value="{{session()->get('poli_kode')}}">
				@endif
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">SUBJECT</label>
                            <textarea class="form-control" id="subject" rows="10" name="soaper_subject"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="object" class="font-weight-bold">OBJECT</label>
                            <textarea class="form-control" id="object" rows="10" name="soaper_object"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="assesment" class="font-weight-bold">ASSESMENT</label>
                            <textarea class="form-control" id="assesment" rows="10" name="soaper_assesment"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="planning" class="font-weight-bold">PLANNING</label>
                            <textarea class="form-control" id="planning" rows="10" name="soaper_planning"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
{{--                <div class="col-lg-12">--}}
{{--                    <h3><b>TINDAKAN MEDIS KEPERAWATAN</b></h3>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 form-group">--}}
{{--                            <label for="">Tindakan Medis Keperawatan</label>--}}
{{--                            <select id="cpoe_tindakan" name="select_tindakan" class="form-control select2" tabindex="-1" style="width: 100%">--}}
{{--                                <option value="">Cari nama tindakan</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <input type="hidden" name="cpoe_reg" value="{{$reg}}">--}}
{{--                            <table class="table1 mb-2" width="100%">--}}
{{--                                <thead class="text-uppercase bg-warning ">--}}
{{--                                    <tr>--}}
{{--                                        <th class="first-row font-weight-bold" width="70">Kode Tindakan</th>--}}
{{--                                        <th class="font-weight-bold">Nama Tindakan</th>--}}
{{--                                        <th class="font-weight-bold">Harga</th>--}}
{{--                                        <th class="font-weight-bold">Jenis Tindakan</th>--}}
{{--                                        <th class="last-row font-weight-bold" width="50">Aksi</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody id="table-item-cpoe">--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btn-save-soap">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
