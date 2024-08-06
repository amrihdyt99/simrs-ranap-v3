<div id="panel-bayi">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="bayi_anamnesa-tab" data-toggle="tab" href="#bayi_anamnesa" role="tab" aria-controls="bayi_anamnesa-tab" aria-selected="false">
                Anamnesa</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="bayi_pemeriksaan-tab" data-toggle="tab" href="#bayi_pemeriksaan" role="tab" aria-controls="bayi_pemeriksaan-tab" aria-selected="false">
                Pemeriksaan</a>
        </li>

    </ul>
    <div class="tab-content" id="tabbayi">
        <div id="bayi_anamnesa" class="tab-pane fade show active" role="tabpanel" aria-labelledby="bayi_anamnesa-tab">
            @include('new_perawat.bayi.assesment_bayi_anamnesa')
        </div>

        <div id="bayi_pemeriksaan" class="tab-pane fade " role="tabpanel" aria-labelledby="bayi_pemeriksaan-tab">
            @include('new_perawat.bayi.assesment_bayi_pemeriksaan')
        </div>
    </div>
</div>
