
<div class="d-flex justify-content-center">
    <ul class="nav nav-tabs" id="giziDewasaTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="assesment-tab" data-toggle="tab" href="#assesment" role="tab" aria-controls="assesment" aria-selected="true">Assesment Gizi Dewasa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="asuhan-tab" data-toggle="tab" href="#asuhan" role="tab" aria-controls="asuhan" aria-selected="false">Asuhan Gizi Dewasa</a>
        </li>
    </ul>
</div>

<div class="tab-content" id="giziDewasaTabContent">
    <div class="tab-pane fade show active" id="assesment" role="tabpanel" aria-labelledby="assesment-tab">
        <h2 class="text-black">Assesment Gizi Dewasa</h2>
        <hr>
        <form id="form_assesment_gizi_dewasa">
            @csrf
            <div class="text-black" style="font-size: 14px">
                @include('new_perawat.gizi.dewasa.entry_dewasa')
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="asuhan" role="tabpanel" aria-labelledby="asuhan-tab">
        <h2 class="text-black">Asuhan Gizi Dewasa</h2>
        <hr>
        <form id="form_asuhan_gizi_dewasa">
            @csrf
            <div class="text-black" style="font-size: 14px">
                @include('new_perawat.gizi.dewasa.entry_asuhan_dewasa')
            </div>
        </form>
    </div>
</div>

@include('new_perawat.gizi.modal.diagnosa_gizi')
@include('new_perawat.gizi.modal.monitoring_evluasi')
