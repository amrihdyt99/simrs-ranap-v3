<style>
    .select2-container--default .select2-selection--single {
        background-color: rgb(229, 229, 229);
        border: 1px solid rgb(229, 229, 229);
        border-radius: 50px;
    }

    .select2-container .select2-selection--single {
        height: 48px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 45px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px;
        right: 10px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 16px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Cari Form / Data</label>
                <select id="search-r-form" class="form-control select2">
                    <option value="">-- Nama Form --</option>
                    <option value="AssesmentDokter">Assesment Dokter</option>
                    <option value="SOAPDokter">SOAP Dokter</option>
                    <option value="Obat">Obat</option>
                    <option value="SOAPPerawat">SOAP Perawat</option>
                    <option value="AssesmentPerawat">Assesment Perawat</option>
                    <option value="Odontogram">Odontogram</option>
                    <option value="TB">TB</option>
                    <option value="HD">HD</option>
                    <option value="Geriatri">Geriatri</option>
                    <option value="Kebidanan">Kebidanan</option>
                    <option value="Radiologi">Radiologi</option>
                    <option value="Lab">Lab</option>
                    <option value="Fisioterapis">Fisioterapis</option>
                    <option value="OkupasiTerapis">Okupasi Terapis</option>
                    <option value="TerapiWicara">Terapi Wicara</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div id="data-r">
    <h3 id="title-r"></h3>
    <div id="table-r-AssesmentDokter">
        @include('new_dokter.assesment.riwayat')
    </div>
    <div id="table-r-SOAPDokter">
        @include('new_dokter.soap.riwayat')
    </div>
    <div id="table-r-Obat">
        
    </div>
    <div id="table-r-SOAPPerawat">
        @include('new_perawat.soap.riwayat')
    </div>
    <div id="table-r-AssesmentPerawat">
        @include('new_perawat.assesment.riwayat')
    </div>
    <div id="table-r-Odontogram">
        
    </div>
    <div id="table-r-TB">
        
    </div>
    <div id="table-r-HD">
        
    </div>
    <div id="table-r-Geriatri">
        
    </div>
    <div id="table-r-Kebidanan">
        
    </div>
    <div id="table-r-Radiologi">
        
    </div>
    <div id="table-r-Lab">
        
    </div>
    <div id="table-r-Fisioterapis">
        
    </div>
    <div id="table-r-OkupasiTerapis">
        
    </div>
    <div id="table-r-TerapiWicara">
        
    </div>
</div>
