{{-- @php
        $informasi = optional((object)[]);
        $dataPasien = optional((object)[]);
        $registrasi_pj = optional((object)[]);
    @endphp --}}


<h4><b>PERSETUJUAN / PENOLAKAN TINDAKAN MEDIS</b></h4>
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
    <li class="nav-item">
        <a class="nav-link" id="edukasi_anastesi_tab" data-toggle="tab" href="#edukasi_anastesi" role="tab" aria-controls="edukasi_anastesi" aria-selected="false">
            Edukasi Anastesi</a>
    </li>
</ul>

<div class="text-black" style="font-size: 14px">
    <div class="tab-content" id="tab-tindakan-medis">
        <div id="pemberi" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pemberi_tab">
            @include('new_dokter.persetujuan_penolakan.pemberian_informasi')
        </div>
        <div id="persetujuan" class="tab-pane fade" role="tabpanel" aria-labelledby="persetujuan_tab">
            @include('new_dokter.persetujuan_penolakan.persetujuan')
        </div>
        <div id="penolakan" class="tab-pane fade" role="tabpanel" aria-labelledby="penolakan_tab">
            @include('new_dokter.persetujuan_penolakan.penolakan')
        </div>
        <div id="edukasi_anastesi" class="tab-pane fade" role="tabpanel" aria-labelledby="edukasi_anastesi_tab">
            @include('new_perawat.edukasi.components.edukasi_anastesi')
        </div>
    </div>
</div>

<script>
    let buttonEdukasiAnastesi = document.getElementById('edukasi_anastesi_tab');

    // Add an event listener for the 'click' event
    buttonEdukasiAnastesi.addEventListener('click', function() {
        // Change the text content of the paragraph when the button is clicked
        getEdukasiAnastesi();
        ttd_edukasi_perawat();
    });
</script>