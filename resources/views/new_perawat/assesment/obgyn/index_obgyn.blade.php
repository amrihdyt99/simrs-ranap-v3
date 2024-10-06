<form id="obgyn_form">
    <h2 class="text-black">Pengkajian Awal Pasien Obstetri Ginekologi</h2>
    <h6>Pengkajian terakhir : <span id="last-asses" class="font-weight-bold">-</span></h6>
    <hr>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="assesment_1_tab" data-toggle="tab" href="#obgyn_pemeriksaan_fisik"
                role="tab" aria-controls="assesment_1" aria-selected="true">
                Pemeriksaan Fisik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_2_tab" data-toggle="tab" href="#obgyn_skrining" role="tab"
                aria-controls="assesment_2" aria-selected="false">
                Skrining gizi,nyeri dan status fungsional</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="assesment_3_tab" data-toggle="tab" href="#obgyn_pengkajian_kulit_kebutuhan"
                role="tab" aria-controls="assesment_3" aria-selected="false">
                Pengkajian Kulit dan Kebutuhan</a>
        </li>
    </ul>

    <div class="text-black" style="font-size: 14px">
        <div class="tab-content" id="tab-assesment">
            <div id="obgyn_pemeriksaan_fisik" class="tab-pane fade show active" role="tabpanel"
                aria-labelledby="assesment_1_tab">
                @include('new_perawat.assesment.obgyn.obgyn_tab.obgyn_pemeriksaan_fisik')
            </div>
            <div id="obgyn_skrining" class="tab-pane fade" role="tabpanel" aria-labelledby="assesment_2_tab">
                @include('new_perawat.assesment.obgyn.obgyn_tab.obgyn_skrining')
            </div>
            <div id="obgyn_pengkajian_kulit_kebutuhan" class="tab-pane fade" role="tabpanel"
                aria-labelledby="assesment_3_tab">
                @include('new_perawat.assesment.obgyn.obgyn_tab.obgyn_pengkajian_kulit_kebutuhan')
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="riwayat-kehamilan-modal" tabindex="-1" role="dialog"
    aria-labelledby="riwayat-kehamilan-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formRiwayatKehamilan">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Riwayat Kehamilan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields -->
                    <div class="form-group">
                        <label>Tgl/Tahun Partus</label>
                        <input type="date" name="tgl_tahun_partus" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tempat Partus</label>
                        <input type="text" name="tempat_partus" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Umur Hamil</label>
                        <input type="text" name="umur_hamil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Persalinan</label>
                        <input type="text" name="jenis_persalinan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Penolong Persalinan</label>
                        <input type="text" name="penolong_persalinan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Penyulit</label>
                        <input type="text" name="penyulit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>BB Anak</label>
                        <input type="text" name="bb_anak" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keadaan Sekarang</label>
                        <input type="text" name="keadaan_sekarang" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="submitFormRiwayatKehamilan()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.next').click(function() {
            var activeTab = $('.nav-tabs .active');
            var nextTab = activeTab.closest('li').next('li').find('a');
            if (nextTab.length) {
                nextTab.trigger('click');
            }
        });

        $('.prev').click(function() {
            var activeTab = $('.nav-tabs .active');
            var prevTab = activeTab.closest('li').prev('li').find('a');
            if (prevTab.length) {
                prevTab.trigger('click');
            }
        });
    });

    $(document).ready(function() {
        function calculateSadPersonScoreObgyn() {
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

        $('#sad_person_table input[type=radio]').on('change', function() {
            calculateSadPersonScoreObgyn();
        });

        calculateSadPersonScoreObgyn();
    });

    $(document).ready(function() {
        function calculateScoreGiziObgyn() {
            let totalScore = 0;
            $('#skrining_gizi_obgyn tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#total_skor_skrining_gizi_obgyn').val(totalScore);

            $('input[name="kategori_gizi"]').prop('checked', false);

            if (totalScore >= 0 && totalScore <= 1) {
                $('#a').prop('checked', true); 
            } else if (totalScore >= 2 && totalScore <= 3) {
                $('#b').prop('checked', true); 
            } else if (totalScore === 4) {
                $('#c').prop('checked', true); 
            }
        }

        $('#skrining_gizi_obgyn input[type=radio]').on('change', function() {
            calculateScoreGiziObgyn();
        });

        calculateScoreGiziObgyn();
    });

    $(document).ready(function() {
        function calculateScoreBps() {
            let totalScore = 0;
            $('#bps_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#skor_total_bps').val(totalScore);

            $('input[name="skor_total_bps"]').prop('checked', false);

        }

        $('#bps_table input[type=radio]').on('change', function() {
            calculateScoreBps();
        });

        calculateScoreBps();
    });

    $(document).ready(function() {
        function calculateScoreAdl() {
            let totalScore = 0;
            $('#adl_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#total_adl').val(totalScore);

            $('input[name="nilai_aks"]').prop('checked', false);

            if (totalScore === 20) {
                $('#aks_20').prop('checked', true);
            } else if (totalScore >= 12 && totalScore <= 19) {
                $('#aks_12_19').prop('checked', true);
            } else if (totalScore >= 9 && totalScore <= 11) {
                $('#aks_9_11').prop('checked', true);
            } else if (totalScore >= 5 && totalScore <= 8) {
                $('#aks_5_8').prop('checked', true);
            }
        }

        $('#adl_table input[type=radio]').on('change', function() {
            calculateScoreAdl();
        });

        calculateScoreAdl();
    });

    $(document).ready(function() {
        function calculateScoreKulit() {
            let totalScore = 0;
            $('#pengkajian_kulit_table tbody input[type=radio]:checked').each(function() {
                totalScore += parseInt($(this).val());
            });

            $('#pengkajian_kulit_table #total_parameter').val(totalScore);

            $('input[name="resiko_braden"]').prop('checked', false);

            if (totalScore >= 20 && totalScore <= 23) {
                $('#resiko_rendah').prop('checked', true);
            } else if (totalScore >= 15 && totalScore <= 19) {
                $('#resiko_sedang').prop('checked', true);
            } else if (totalScore >= 10 && totalScore <= 14) {
                $('#resiko_tinggi').prop('checked', true);
            } else if (totalScore >= 6 && totalScore <= 9) {
                $('#resiko_sangat_tinggi').prop('checked', true);
            } else if (totalScore < 6) {
                $('#resiko_sangat_tinggi').prop('checked', false);
                $('#resiko_tinggi').prop('checked', false);
                $('#resiko_sedang').prop('checked', false);
                $('#resiko_rendah').prop('checked', false);

            }
        }

        $('#pengkajian_kulit_table input[type=radio]').on('change', function() {
            calculateScoreKulit();
        });

        calculateScoreKulit();
    });
</script>
