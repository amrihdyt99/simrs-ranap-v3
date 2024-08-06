<ul class="nav nav-tabs" id="myTab" role="tablist">
    @if (auth()->user()->level_user == 'dokter')
        <li class="nav-item font-weight-bold">
            <a class="nav-link active" id="diagnosa-tab" data-toggle="tab" href="#diagnosa" role="tab" aria-controls="diagnosa" aria-selected="true">DIAGNOSA DAN PROSEDUR</a>
        </li>
        <li class="nav-item font-weight-bold">
            <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">TAGIHAN</a>
        </li>
    @endif
    <li class="nav-item font-weight-bold">
        <a class="nav-link {{(auth()->user()->level_user != 'dokter') ? 'active' : ''}}" id="discharge-tab" data-toggle="tab" href="#discharge" role="tab" aria-controls="discharge" aria-selected="false">DISCHARGE</a>
    </li>
</ul>
<div class="tab-content" id="myTabContents">
    @if (auth()->user()->level_user == 'dokter')
        <div class="tab-pane fade show active" id="diagnosa" role="tabpanel" aria-labelledby="diagnosa-tab">
            @include('new_dokter.discharge.diagnosa')
        </div>
        <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
            <h3 class="text-uppercase">PENAGIHAN</h3>
            @include('new_dokter.discharge.billing')
        </div>
    @endif
    <div class="tab-pane fade {{(auth()->user()->level_user != 'dokter') ? 'show active' : ''}}" id="discharge" role="tabpanel" aria-labelledby="discharge-tab">
        @include('new_dokter.discharge.discharge')
    </div>
</div>