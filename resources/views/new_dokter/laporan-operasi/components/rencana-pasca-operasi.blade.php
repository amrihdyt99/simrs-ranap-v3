<div>
    <h3 class="font-weight-bold">Rencana Pasca Operasi/Tindakan</h3>
    <br/>
    <h4 class="font-weight-bold">Instruksi pasca operasi/tindakan</h4>
    <form action="{{ route('dokter.laporan-operasistore.laporan-rencana-pasca-operasi', $reg) }}" method="post" id="form-rencana-pasca-operasi">
        {{ csrf_field() }}

        <div class="form-group">
            @php
                $data_instruksi_rawat = ['IPD', 'ODC', 'ICCU/HCU', 'ICU', 'PICU', 'NICU'];
            @endphp
            <label for="">Rawat di</label>
            <select name="instruksi_rawat" id="instruksi_rawat" class="form-control">
                <option value="">Pilih</option>
                @foreach ($data_instruksi_rawat as $item)
                <option value="{{ $item }}" 
                    {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->instruksi_rawat == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="">Posisi</label>
            <div class="row gap-4">
                <div class="col-sm-12 col-lg-2">
                    @php
                        $posisi = ['Supine', 'Head Up', 'Lateral Kiri/Kanan', 'Posisi Lain'];
                    @endphp
                    <select name="instruksi_posisi" id="instruksi_posisi" class="form-control">
                        <option value="">Pilih</option>
                        @foreach ($posisi as $item)
                            <option value="{{ $item }}" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->instruksi_posisi == $item ? 'selected': '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <input type="text" name="catatan_instruksi_posisi" class="form-control" placeholder="Posisi Lainnya..." value="{{ $data['pasca_operasi']['data_pasca']->catatan_instruksi_posisi ?? '' }}">
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">Diet</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <input type="radio" name="diet" id="diet_total" value="1" {{ isset($data['pasca_operasi']['data_operasi']) && $data['pasca_operasi']['data_pasca']->diet==1 ? 'checked': '' }}>
                    <label for="diet_total">Puasa Total</label>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-group">
                        <label for="">Lama Hari</label>
                        <input type="number" name="lama_hari_diet_total" class="form-control" value="{{ $data['pasca_operasi']['data_pasca']->lama_hari_diet_total ?? ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <input type="radio" name="diet" id="tidak_puasa" value="0" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->diet==0 ? 'checked': '' }}>
                    <label for="tidak_puasa">Tidak Perlu Puasa</label>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-group">
                        <label for="">Ket. Boleh Diet</label>
                        <input type="text" name="keterangan_boleh_diet" class="form-control" value="{{ $data['pasca_operasi']['data_pasca']->ket_boleh_diet ?? '' }}">
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <div class="form-group">
                        <label for="">Ket. Setelah</label>
                        <input type="text" name="keterangan_setelah_diet" class="form-control" value="{{ $data['pasca_operasi']['data_pasca']->ket_setelah_diet ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">Infus</label>
            <div class="row ml-2">
                <div class="col-sm-12 col-lg-3">
                    <input type="checkbox" name="infus_sesuai_instruksi_dokter_anestesi" id="sesuai_instruksi_dokter_anestesi" value="1" class="form-check-input"
                        {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->infus_sesuai_instruksi == 1 ? 'checked': '' }}
                    >
                    <label for="sesuai_instruksi_dokter_anestesi">Sesuai Instruksi Dokter Anestesi</label>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <input type="checkbox" name="infus_cairan" id="instruksi_cairan_infus" value="1" class="form-check-input"
                        {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->infus_cairan == 1 ? 'checked': '' }}
                    >
                    <label for="instruksi_cairan_infus">Cairan</label>
                </div>
                <div class="col-sm-12 col-lg-3 row">
                    <input type="text" name="" id="catatan_instruksi_cairan_infus" class="form-control col-sm-12 col-lg-10" placeholder="Cairan..."/>
                    <div class="col-sm-12 col-lg-2">
                        <button type="button" class="btn btn-sm btn-primary" onclick="addCairanInfus()">Tambah</button>
                    </div>
                </div>
                <div class="col-12">
                    <h5 class="font-weight-bold">Daftar Cairan Infus</h5>
                    <div id="">
                       
                        <ul class="list-group" id="daftar-cairan-infus">
                            @empty ($data['pasca_operasi']['data_pasca']->infus_cairan_data)
                            @else
                                @foreach (json_decode($data['pasca_operasi']['data_pasca']->infus_cairan_data) as $item)
                                <li class="list-group-item" id="row_{{ $loop->iteration-1 }}">
                                    {{ $item }}
                                    <input type="hidden" value="{{ $item }}" name="cairan_infus[]">
                                    <button type="button" class="btn btn-sm btn-danger ml-4" onclick="removeCairanInfus('row_{{ $loop->iteration-1 }}')">Hapus</button>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">Pemberian Obat</label>
            <textarea name="instruksi_pemberian_obat" id="instruksi_pemberian_obat" rows="10" placeholder="(Sesuai dengan IMR)" class="form-control">{{ $data['pasca_operasi']['data_pasca']->pemberian_obat ?? '' }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="">Pemberian Transfusi</label>
            <div class="row">
                @php
                    $data_instruksi_pemberian_tranfusi = ['Tidak Perlu', 'Menunggu Hasil Laboratorium'];
                @endphp
                @foreach ($data_instruksi_pemberian_tranfusi as $item)
                    <div class="col-12">
                        <input type="radio" name="instruksi_pemberian_tranfusi" id="instruksi_pemberian_tranfusi_{{ $loop->iteration }}" value="{{ $item }}"
                            {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->instruksi_pemberian_tranfusi == $item ? 'checked': '' }}
                        >
                        <label for="instruksi_pemberian_tranfusi_{{ $loop->iteration }}">
                            <span>{{ $item }}</span>
                        </label>
                    </div>
                @endforeach
               
            </div>
            
        </div>
    
        <div class="form-group">
            <label for="">Drain</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <select name="instruksi_drain" id="instruksi_drain" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->instruksi_drain == '1' ? 'selected' : '' }}>Terpasang</option>
                        <option value="0" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->instruksi_drain == '0' ? 'selected' : '' }}>Tidak Terpasang</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    @php
                        $data_letak_drain = ['Subfacial', 'Subhepatal', 'Cavum Dauglas', 'T-Drain', 'Intracavitas', 'Lainnya'];
                        $data_jenis_drain = ['Aktif', 'Pasif'];
                    @endphp
                    <button type="button" class="btn btn-sm btn-primary" onclick="addRowDrain()">Tambah Drain</button>
                    <table class="table table-bordered mt-2">
                        <thead class="thead-light">
                            <tr>
                                <th>Terpasang</th>
                                <th>Jenis</th>
                                <th>Letak</th>
                                <th>Lama Pemasangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="drain-table">
                            @empty($data['pasca_operasi']['data_drain'])]
                            @else
                                @foreach ($data['pasca_operasi']['data_drain'] as $item)
                                    <tr id="row_{{ $loop->iteration-1 }}">
                                        <td>Drain</td>
                                        <td>
                                            <select name="drain[{{ $loop->iteration-1 }}][jenis]" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="Aktif" {{ $item->jenis_drain == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Pasif" {{ $item->jenis_drain == 'Pasif' ? 'selected' : '' }}>Pasif</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="drain[{{ $loop->iteration-1 }}][letak_pemasangan]" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data_letak_drain as $letak)
                                                    <option value="{{ $letak }}" {{ $item->letak_pemasangan == $letak ? 'selected' : '' }}>{{ $letak }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="drain[{{ $loop->iteration-1 }}][lama_pemasangan]" class="form-control" value="{{ $item->lama_pemasangan ??'' }}"/>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="removeRowDrain('row_{{ $loop->iteration-1 }}')">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">Tampon</label>
            <div class="row ml-2">
                <div class="col-sm-12 col-lg-2">
                    <input type="radio" name="instruksi_tampon" id="instruksi-tampon-1" class="form-check-input" value="0"
                        {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->tampon == 0 ? 'checked': '' }}
                    >
                    <label for="instruksi-tampon-1">Tidak Terpasang</label>
                </div>
                <div class="col-sm-12 col-lg-10">
                    <div class="row">
                        <div class="col-sm-12 col-lg-2">
                            <input type="radio" name="instruksi_tampon" id="instruksi-tampon-2" class="form-check-input" value="1"
                            {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->tampon == 1 ? 'checked': '' }}
                            >
                            <label for="instruksi-tampon-2">Terpasang</label>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <label for="">Letak</label>
                            <input type="text" name="instruksi_tampon_letak" id="instruksi_tampon_letak" class="form-control" placeholder="Letak Tampon..." value="{{ $data['pasca_operasi']['data_pasca']->tampon_letak ?? '' }}">
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <label for="">Selama</label>
                            <input type="number" name="durasi_hari_tampon" id="durasi-hari-tampon" class="form-control" placeholder="Hari" value="{{ $data['pasca_operasi']['data_pasca']->durasi_hari_tampon ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">NGT</label>
            <div class="row ml-2">
                <div class="col-sm-12 col-lg-1">
                    <input type="radio" name="ngt" id="ngt-y" class="form-check-input" value="0" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->ngt == 0 ? 'checked' : '' }}>
                    <label for="ngt-y">Tidak Ada</label>
                </div>
                <div class="col-sm-12 col-lg-1">
                    <input type="radio" name="ngt" id="ngt-t" class="form-check-input" value="1" {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->ngt == 1 ? 'checked' : '' }}>
                    <label for="ngt-t">Ada</label>
                </div>
                <div class="col-sm-12 col-lg-8 row">
                    <label for="" class="col-sm-12 col-lg-2">Selama (hari)</label>
                    <input type="text" name="catatan_ngt" id="catatan_ngt" class="form-control" placeholder="Isi jika memilih ada." value="{{ $data['pasca_operasi']['data_pasca']->catatan_ngt ?? '' }}">
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label for="">Kateter Urin</label>
            <div class="row ml-2">
                <div class="col-sm-12 col-lg-2">
                    <input type="radio" name="kateter_urin" id="kateter_urin-y" class="form-check-input" value="0"
                        {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->kateter_urin == 0 ? 'checked': '' }}
                    >
                    <label for="kateter_urin-y">Tidak Terpasang</label>
                </div>
                <div class="col-sm-12 col-lg-1">
                    <input type="radio" name="kateter_urin" id="kateter_urin-t" class="form-check-input" value="1"
                    {{ isset($data['pasca_operasi']['data_pasca']) && $data['pasca_operasi']['data_pasca']->kateter_urin == 1 ? 'checked': '' }}
                    >
                    <label for="kateter_urin-t">Terpasang</label>
                </div>
                <div class="col-sm-12 col-lg-8 row">
                    <label for="" class="col-sm-12 col-lg-4">Monitor Urin(jam)</label>
                    <input type="text" name="catatan_kateter_urin" id="catatan_kateter_urin" class="form-control" placeholder="Isi jika memilih terpasang" value="{{ $data['pasca_operasi']['data_pasca']->catatan_kateter_urin ?? '' }}">
                </div>
            </div>
        </div>
    
       <h5 class="font-weight-bold">Pemeriksaan Pasca</h5>
       <div class="form-group mt-2">
            <label for="">Laboratorium</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <select name="pemeriksaan_pasca_laboratorium" id="pemeriksaan_pasca_laboratorium" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->pemeriksaan_pasca_laboratorium == 1 ? 'selected' : '' }}>Perlu</option>
                        <option value="0" {{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->pemeriksaan_pasca_laboratorium == 0 ? 'selected' : '' }}>Tidak Perlu</option>
                    </select>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <input type="text" name="catatan_pemeriksaan_pasca_laboratorium" id="" class="form-control" placeholder="Isi jika memilih perlu."
                        value="{{ $data['pasca_operasi']['data_pasca']->catatan_pemeriksaan_pasca_laboratorium ?? '' }}"
                    >
                </div>
            </div>
       </div>
       <div class="form-group mt-2">
            <label for="">Radiologi</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <select name="pemeriksaan_pasca_radiologi" id="pemeriksaan_pasca_radiologi" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1"{{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->pemeriksaan_pasca_radiologi == 1 ? 'selected' : '' }}>Perlu</option>
                        <option value="0"{{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->pemeriksaan_pasca_radiologi == 0 ? 'selected' : '' }}>Tidak Perlu</option>
                    </select>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <input type="text" name="catatan_pemeriksaan_pasca_radiologi" id="" class="form-control" placeholder="Isi jika memilih perlu." value="{{ $data['pasca_operasi']['data_pasca']->catatan_pemeriksaan_pasca_radiologi ?? '' }}">
                </div>
            </div>
       </div>
       <div class="form-group mt-2">
            <label for="">Kebutuhan Terkait</label>
            <div class="row">
                <div class="col-sm-12 col-lg-2">
                    <select name="kebutuhan_terkait" id="kebutuhan_terkait" class="form-control">
                        <option value="">Pilih</option>
                        <option value="1" {{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->kebutuhan_terkait == 1 ? 'selected' : '' }}>Ada</option>
                        <option value="0" {{ $data['pasca_operasi']['data_pasca'] && $data['pasca_operasi']['data_pasca']->kebutuhan_terkait == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    </select>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <input type="text" name="catatan_kebutuhan_terkait" id="" class="form-control" placeholder="Isi jika memilih ada." value="{{ $data['pasca_operasi']['data_pasca']->catatan_kebutuhan_terkait ?? '' }}">
                </div>
            </div>
       </div>

       <div class="form-group">
        <label for="dokter_operator">Dokter Operator</label>
        <select id="kode_dokter_operator_pasca" name="kode_dokter_operator"
            class="form-control select2bs4 {{ $errors->has('reg_dokter') ? " is-invalid" : "" }}">
            <option value="">-</option>
            @foreach ($data['physician'] as $row)
            <option
                value="{{ $row->ParamedicCode }}" {{ isset($data['pasca_operasi']['data_pasca']) && $row->ParamedicCode == $data['pasca_operasi']['data_pasca']->kode_dokter_operator ? 'selected':'' }}>
                {{ $row->ParamedicName }}
            </option>
            @endforeach
        </select>
    </div>
    
        <div class="d-flex align-item-center justify-content-center mt-3 mb-3">
            <button class="btn btn-primary" onclick="saveRencanaPascaOperasi()">
                Simpan
            </button>
        </div>
    </form>
</div>

@push('myscripts')
<script>
    $(document).ready(function(){
        $("#kode_dokter_operator_pasca").select2({
            placeholder: "Pilih Dokter Operator",
            allowClear: true
        });
    })
    const addCairanInfus = () => {

        const cairan = document.getElementById('catatan_instruksi_cairan_infus').value;
        if(!cairan){
            alert('Mohon isi cairan terlebih dahulu');
            return;
        }
        const input = `<input type="hidden" name="cairan_infus[]" value="${cairan}"/> <button type="button" class="btn btn-sm btn-danger ml-4" onclick="removeCairanInfus(${document.getElementById('daftar-cairan-infus').childNodes.length})">Hapus</button>`;
        const list = document.getElementById('daftar-cairan-infus');
        const element = cairan + input
        const li = document.createElement('li');
        li.classList.add('list-group-item');
        li.innerHTML = element;
        list.appendChild(li);

        // clear input
        document.getElementById('catatan_instruksi_cairan_infus').value = '';
    }

    const removeCairanInfus = (element) => {
        const list = document.getElementById('daftar-cairan-infus');
        const item = document.getElementById(`${element}`);
        list.removeChild(item);
    }

    const addRowDrain = ()=>{
        const table = document.getElementById('drain-table');
        const rowCount = table.rows.length; // Get the current number of rows to use as the index

        const selectLetak = `
            <select name="drain[${rowCount}][letak_pemasangan]" class="form-control">
                <option value="">Pilih</option>
                <option value="Subfacial">Subfacial</option>
                <option value="Subhepatal">Subhepatal</option>
                <option value="Cavum Dauglas">Cavum Dauglas</option>
                <option value="T-Drain">T-Drain</option>
                <option value="Intracavitas">Intracavitas</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        `;
        const selectJenisDrain = `
            <select name="drain[${rowCount}][jenis]" class="form-control">
                <option value="">Pilih</option>
                <option value="Aktif">Aktif</option>
                <option value="Pasif">Pasif</option>
            </select>
        `;
        const inputLamaPemasangan = `
            <input type="text" name="drain[${rowCount}][lama_pemasangan]" class="form-control"/>
        `;
        const deleteButton = `
            <button type="button" class="btn btn-sm btn-danger" onclick="removeRowDrain('row_${rowCount}')">Hapus</button>
        `;

        const tr = document.createElement('tr');
        tr.id = `row_${rowCount}`;
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        const td5 = document.createElement('td');

        td1.innerHTML = 'Drain';
        td2.innerHTML = selectJenisDrain;
        td3.innerHTML = selectLetak;
        td4.innerHTML = inputLamaPemasangan;
        td5.innerHTML = deleteButton;

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        table.appendChild(tr);
    }

    const removeRowDrain = (tr_id)=>{
        const table = document.getElementById('drain-table');
        const tr = document.getElementById(tr_id);
        table.removeChild(tr);
    }



    const saveRencanaPascaOperasi = ()=>{
        event.preventDefault();
        const form = $('#form-rencana-pasca-operasi').serialize();
        const url = $('#form-rencana-pasca-operasi').attr('action');
        const method = 'POST';

        // show confirmation dialog
        Swal.fire({
            title: 'Simpan Data',
            text: 'Apakah anda yakin ingin menyimpan data ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    method: method,
                    data: form,
                    success: function(response){
                        console.log(response)
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data berhasil disimpan',
                            icon: 'success'
                        })
                    },
                    error: function(err){
                        console.log(err)
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Data gagal disimpan',
                            icon: 'error'
                        })
                    }
                })
            }
        })
    }
</script>
@endpush