<form id="dewasa_form">
    <h2 class="text-black">Pengkajian Awal Pasien Dewasa</h2>
    <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
    <hr>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#dewasa_pemeriksaan_fisik"
                role="tab" aria-controls="assesment_1" aria-selected="true">
                Pengkajian Awal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#dewasa_skrining" role="tab"
                aria-controls="assesment_2" aria-selected="false">
                Skrining Nyeri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#dewasa_pengkajian_kulit_kebutuhan"
                role="tab" aria-controls="assesment_3" aria-selected="false">
                Skrining Gizi</a>
        </li>
    </ul>

    <div class="text-black" style="font-size: 14px">
        <div class="tab-content" id="tab-assesment">
            <div id="dewasa_pemeriksaan_fisik" class="tab-pane fade show active" role="tabpanel"
                aria-labelledby="assesment_1_tab">
                @include('new_perawat.assesment.assesment_dewasa.dewasa_tab.pengkajian_awal')
            </div>
            <div id="dewasa_skrining" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
                @include('new_perawat.assesment.assesment_dewasa.dewasa_tab.skrining_nyeri')
            </div>
            <div id="dewasa_pengkajian_kulit_kebutuhan" class="tab-pane fade" role="tabpanel"
                aria-labelledby="assesment_3_tab">
                @include('new_perawat.assesment.assesment_dewasa.dewasa_tab.skrining_gizi')
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        function calculateSadPersonScoreDewasa() {
            let totalScore = 0;

            $('#sad_person_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#skor_sad_person').val(totalScore);

            $('input[name="kategori_sad_person"]').prop('checked', false);

            if (totalScore >= 1 && totalScore <= 2) {
                $('#kategori_rendah').prop('checked', true);
            } else if (totalScore >= 3 && totalScore <= 6) {
                $('#kategori_sedang').prop('checked', true);
            } else if (totalScore >= 7 && totalScore <= 10) {
                $('#kategori_tinggi').prop('checked', true);
            }
        }

        function calculateSkorAdl() {
            let totalScore = 0;

            $('#adl_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#total_adl').val(totalScore);
        }

        function calculateSkorBps() {
            let totalScore = 0;

            $('#bps_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#skor_total_bps').val(totalScore);
        }

        function calculateSkriningGiziDewasa() {
            let totalScore = 0;

            $('#skrining_gizi_table_dewasa tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#total_skor_gizi').val(totalScore);

            $('input[name="kategori_gizi"]').prop('checked', false);

            if (totalScore <= 1) {
                $('#a').prop('checked', true);
            } else if (totalScore >= 2 && totalScore <= 3) {
                $('#b').prop('checked', true);
            } else if (totalScore >= 4 && totalScore <= 5) {
                $('#c').prop('checked', true);
            }

            if($('#penurunan_bb_tidak').is(':checked') || $('#penurunan_bb_tidak_yakin').is(':checked')){
                $('#penurunan_bb_1_6kg').prop('checked', false);
                $('#penurunan_bb_6_10kg').prop('checked', false);
                $('#penurunan_bb_11_15kg').prop('checked', false);
                $('#penurunan_bb_15kg').prop('checked', false);
                $('#penurunan_bb_tidak_tahu').prop('checked', false);
            } else if($('#penurunan_bb_1_6kg').is(':checked') || $('#penurunan_bb_6_10kg').is(':checked') || $('#penurunan_bb_11_15kg').is(':checked') || $('#penurunan_bb_15kg').is(':checked') || $('#penurunan_bb_tidak_tahu').is(':checked')){
                $('#penurunan_bb_tidak').prop('checked', false);
                $('#penurunan_bb_tidak_yakin').prop('checked', false);
            }
                
        }

        $('#sad_person_table input[type=radio]').on('change', calculateSadPersonScoreDewasa);
        $('#adl_table input[type=radio]').on('change', calculateSkorAdl);
        $('#bps_table input[type=radio]').on('change', calculateSkorBps);
        $('#skrining_gizi_table_dewasa input[type=radio]').on('change', calculateSkriningGiziDewasa);

        calculateSadPersonScoreDewasa();
        calculateSkorAdl();
        calculateSkorBps();
        calculateSkriningGiziDewasa();
    });
</script>