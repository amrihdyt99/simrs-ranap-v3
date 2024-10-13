<h2 class="mb-4">CASE MANAGER</h2>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cek_form_tab_pra" data-toggle="tab" href="#assesment" role="tab"
            aria-controls="assesment" aria-selected="true">
            Assesment</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_form_tab_intra" data-toggle="tab" href="#akumulasi" role="tab"
            aria-controls="akumulasi" aria-selected="false">
            Evaluasi</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabcthlab">
        <div id="assesment" class="tab-pane fade show active" role="tabpanel" aria-labelledby="cek_form_tab_pra">
            @include('new_perawat\case_manager\tab\assesment')
        </div>
        <div id="akumulasi" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_form_tab_intra">
            @include('new_perawat\case_manager\tab\evaluasi')
        </div>
    </div>
</div>
