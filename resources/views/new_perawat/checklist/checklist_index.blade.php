<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cek_form_tab" data-toggle="tab" href="#cek_form" role="tab"
            aria-controls="obgyn_1-tab" aria-selected="false">
            Checklist Form</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" id="cek_hasil_tab" data-toggle="tab" href="#cek_hasil" role="tab"
            aria-controls="obgyn_1-tab" aria-selected="false">
            Checklist Hasil</a>
    </li> --}}
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabobgyn">
        <div id="cek_form" class="tab-pane fade show active" role="tabpanel" aria-labelledby="cek_hasil_tab">
            @include('new_perawat.checklist.checklist_form')
        </div>
        {{-- <div id="cek_hasil" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab">
            @include('new_perawat.checklist.checklist_hasil')
        </div> --}}
    </div>
</div>
