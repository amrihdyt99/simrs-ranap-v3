<h3><b>SURAT RUJUKAN</b></h3>
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="persiapan-tab" data-toggle="tab" href="#persiapan" role="tab" aria-controls="persiapan-tab" aria-selected="false">
                    Persiapan Pasien Pindah</a>
            </li>
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_surat_rujukan4')" class="nav-link" id="prosedur_operasi-tab" data-toggle="tab" href="#prosedur_operasi" role="tab" aria-controls="prosedur_operasi-tab" aria-selected="false">
                    Prosedur/Operasi</a>
            </li>
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_surat_rujukan1')" class="nav-link" id="alat_terpasang-tab" data-toggle="tab" href="#alat_terpasang" role="tab" aria-controls="alat_terpasang-tab" aria-selected="false">
                    Alat Yang Terpasang</a>
            </li>
    
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_surat_rujukan3')" class="nav-link " id="obat_diterima-tab" data-toggle="tab" href="#obat_diterima" role="tab" aria-controls="obat_diterima-tab" aria-selected="false">
                    Obat Yang Diterima</a>
            </li>
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_surat_rujukan2')" class="nav-link" id="obat_dibawa-tab" data-toggle="tab" href="#obat_dibawa" role="tab" aria-controls="obat_dibawa-tab" aria-selected="false">
                    Obat Atau Cairan Yang Dibawa</a>
            </li>
    
            <li class="nav-item">
                <a onclick="neko_refresh_datatable('dttb_surat_rujukan5')" class="nav-link " id="status_pasien-tab" data-toggle="tab" href="#status_pasien" role="tab" aria-controls="status_pasien-tab" aria-selected="false">
                    Status Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="serah_terima-tab" data-toggle="tab" href="#serah_terima" role="tab" aria-controls="serah_terima-tab" aria-selected="false">
                    Serah Terima</a>
            </li>
    
        </ul>
        <div class="tab-content" id="tab_transfer">
            <div id="persiapan" class="tab-pane fade show active" role="tabpanel" aria-labelledby="persiapan-tab">
                @include('new_perawat.surat_rujukan.rujukan_persiapan_pasien')
            </div>
            <div id="prosedur_operasi" class="tab-pane fade show" role="tabpanel" aria-labelledby="prosedur_operasi-tab">
                @include('new_perawat.surat_rujukan.rujukan_prosedur_operasi')
            </div>
    
            <div id="alat_terpasang" class="tab-pane fade " role="tabpanel" aria-labelledby="alat_terpasang-tab">
                @include('new_perawat.surat_rujukan.rujukan_alat_terpasang')
            </div>
    
            <div id="obat_diterima" class="tab-pane fade " role="tabpanel" aria-labelledby="obat_diterima-tab">
                @include('new_perawat.surat_rujukan.rujukan_obat_diterima')
            </div>
    
            <div id="obat_dibawa" class="tab-pane fade " role="tabpanel" aria-labelledby="obat_dibawa-tab">
                @include('new_perawat.surat_rujukan.rujukan_obat_dibawa')
            </div>
            <div id="status_pasien" class="tab-pane fade " role="tabpanel" aria-labelledby="status_pasien-tab">
                @include('new_perawat.surat_rujukan.rujukan_status_pasien')
            </div>
            <div id="serah_terima" class="tab-pane fade " role="tabpanel" aria-labelledby="serah_terima-tab">
                @include('new_perawat.surat_rujukan.rujukan_serah_terima')
            </div>
    
        </div>
    </div>
    
    <div class="modal fade" id="ModalBase" role="dialog" aria-labelledby="ModalBase" aria-hidden="true"></div>
    
