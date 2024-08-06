<h2 class="text-black mb-4">Patient Safety Checklist Cath Lab</h2>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cek_form_tab" data-toggle="tab" href="#form_signin" role="tab" aria-controls="obgyn_1-tab" aria-selected="false">
            SIGN IN</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_hasil_tab" data-toggle="tab" href="#form_timeout" role="tab" aria-controls="obgyn_1-tab" aria-selected="false">
            TIME OUT</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_hasil_tab" data-toggle="tab" href="#form_signout" role="tab" aria-controls="obgyn_1-tab" aria-selected="false">
            SIGN OUT</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabcthlab">
        <div id="form_signin" class="tab-pane fade show active" role="tabpanel" aria-labelledby="cek_hasil_tab">
            @include('new_perawat.cath_lab_v2.entry_sign_in')
        </div>
        <div id="form_timeout" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab">
            @include('new_perawat.cath_lab_v2.entry_time_out')
        </div>
        <div id="form_signout" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab">
            @include('new_perawat.cath_lab_v2.entry_sign_out')
        </div>
    </div>
</div>




{{-- <h2 class="text-black">Patient Safety Checklist Cath Lab</h2>
<hr>
<form id="form_cathlab">
    @csrf
    <div class="text-black" style="font-size: 14px">
        @include('new_perawat.cath_lab_v2.entry')
    </div>
</form> --}}
