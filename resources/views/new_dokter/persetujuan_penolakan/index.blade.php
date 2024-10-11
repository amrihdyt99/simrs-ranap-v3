@empty($informasi)
    @php
        $informasi = optional((object)[]);
    @endphp
@endempty

<h4><b>PERSETUJUAN / PENOLAKAN TINDAKAN MEDIS pp</b></h4>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pemberi_tab" data-toggle="tab" href="#pemberi" role="tab" aria-controls="pemberi" aria-selected="true">
            Pemberian Informasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="persetujuan_tab" data-toggle="tab" href="#persetujuan" role="tab" aria-controls="persetujuan" aria-selected="false">
            Persetujuan Tindakan Medis</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="penolakan_tab" data-toggle="tab" href="#penolakan" role="tab" aria-controls="penolakan" aria-selected="false">
            Penolakan Tindakan Medis</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tab-tindakan-medis">
        <div id="pemberi" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pemberi_tab">
            {{-- @include('new_perawat.persetujuan_penolakan.pemberian_informasi') --}}
        </div>
        <div id="persetujuan" class="tab-pane fade" role="tabpanel" aria-labelledby="persetujuan_tab">
            {{-- @include('new_perawat.persetujuan_penolakan.persetujuan') --}}
        </div>
        <div id="penolakan" class="tab-pane fade" role="tabpanel" aria-labelledby="penolakan_tab">
            {{-- @include('new_perawat.persetujuan_penolakan.penolakan') --}}
        </div>
    </div>
</div>
