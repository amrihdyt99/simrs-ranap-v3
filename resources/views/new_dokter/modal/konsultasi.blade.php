<div class="modal fade" id="modalKonsultasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Form Konsultasi
        </div>
        <form id="form-konsultasi-dokter">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="pkonsultasi_reg" value="{{$reg}}">
                <input type="hidden" id="pkonsultasi-id-edit" name="pkonsultasi_id">
                {{-- <div class="form-group">
                    <label for="exampleFormControlTextarea1">Jenis Konsultasi</label>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input check_jenis_konsul" id="konsul_poli" value="1" name="pkonsul_jenis">
                                <label class="custom-control-label" for="konsul_poli">Antar Poliklinik</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input check_jenis_konsul" id="konsul_dokter" value="0" name="pkonsul_jenis">
                                <label class="custom-control-label" for="konsul_dokter">Antar Dokter</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="konsul-dokter">
                    <div class="form-group"> 
                        <label>Dokter Tujuan Konsultasi</label> 
                        <select class="form-control select2 select2-hidden-accessible" id="pkonsultasi_dokter" data-placeholder="Pilih Dokter Tujuan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="">-- Pilih dokter tujuan --</option>
                        </select> 
                    </div>
                </div> --}}
                <div id="konsul-poli">
                    <div class="row">
                        <div class="col-lg-5 pr-0">
                            <div class="form-group"> 
                                <label>Poli Tujuan Konsultasi</label> 
                                <select class="form-control select2" id="pkonsultasi_poli" data-placeholder="Pilih poli Tujuan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">-- Pilih poli tujuan --</option>
                                    {{-- @foreach (DB::table('rs_m_service_room')->where('IsActive', 1)->where('IsDeleted', 0)->where('IsUsed', 1)->select('RoomCode', 'RoomName')->orderBy('RoomName', 'asc')->get() as $item)
                                        <option value="{{$item->RoomCode}}">{{$item->RoomName}}</option>
                                    @endforeach --}}
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-6 px-0">
                            <div class="form-group"> 
                                <label>Dokter Tujuan Konsultasi</label> 
                                <select class="form-control" id="pkonsultasi_dokter_poli" style="width: 100%;">
                                    <option value="">-- Pilih dokter tujuan --</option>
                                </select> 
                                <small class="text-danger text-alert">Dokter sudah dipilih</small>
                            </div>
                        </div>
                        <div class="col-lg-1 px-0">
                            <div class="form-group"> 
                                <label class="text-white">tombol</label>
                                <button type="button" id="btn-row-konsul" class="btn btn-warning no-radius"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="row-konsul" class="mb-3"></div>
                <div class="form-group">
                    <label for="">Catatan Konsultasi (Resume)</label>
                    <textarea name="pkonsultasi_request" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-save-konsultasi">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalKonsultasiRes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            Form Response Konsultasi
        </div>
        <form id="form-konsultasi-dokter-res">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="pkonsultasi_id_res" id="pkonsultasi_id_res">
                <div class="form-group">
                    <label for="">Response Konsultasi</label>
                    <textarea name="pkonsultasi_response" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-save-konsultasi-res">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>