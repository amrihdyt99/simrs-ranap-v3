<h2 class="text-black mb-4">Patient Safety Checklist Cath Lab</h2>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="cek_form_tab_pra" data-toggle="tab" href="#form_pra" role="tab"
            aria-controls="form_pra" aria-selected="true">
            Catatan Keperawatan - Pra Tindakan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_form_tab_intra" data-toggle="tab" href="#form_intra" role="tab"
            aria-controls="form_intra" aria-selected="false">
            Catatan Keperawatan - Intra Tindakan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_form_tab_signin" data-toggle="tab" href="#form_signin" role="tab"
            aria-controls="form_signin" aria-selected="false">
           CATH LAB  SIGN IN</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_hasil_tab_timeout" data-toggle="tab" href="#form_timeout" role="tab"
            aria-controls="form_timeout" aria-selected="false">
            CATH LAB TIME OUT</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cek_hasil_tab_signout" data-toggle="tab" href="#form_signout" role="tab"
            aria-controls="form_signout" aria-selected="false">
            CATH LAB SIGN OUT</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pemantauan_paska" data-toggle="tab" href="#form_pemantauan_paska" role="tab"
            aria-controls="form_signout" aria-selected="false">
            Pemantauan Paska Tindakan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="observasi_paska" data-toggle="tab" href="#form_observasi_paska" role="tab"
            aria-controls="form_signout" aria-selected="false">
            Observasi Paska Tindakan
</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tabcthlab">
        <div id="form_pra" class="tab-pane fade show active" role="tabpanel" aria-labelledby="cek_form_tab_pra">
            @include('new_perawat.cath_lab_v2.form_pra_tindakan')
        </div>
        <div id="form_intra" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_form_tab_intra">
            @include('new_perawat.cath_lab_v2.form_intra_tindakan')
        </div>
        <div id="form_signin" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_form_tab_signin">
            @include('new_perawat.cath_lab_v2.entry_sign_in')
        </div>
        <div id="form_timeout" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab_timeout">
            @include('new_perawat.cath_lab_v2.entry_time_out')
        </div>
        <div id="form_signout" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab_signout">
            @include('new_perawat.cath_lab_v2.entry_sign_out')
        </div>
        <div id="form_pemantauan_paska" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab_signout">
            @include('new_perawat.cath_lab_v2.form_pemantauan_paska')
        </div>
        <div id="form_observasi_paska" class="tab-pane fade" role="tabpanel" aria-labelledby="cek_hasil_tab_signout">
            @include('new_perawat.cath_lab_v2.form_observasi_paska')
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
