<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_pasien_intra_tindakan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150);
            $table->string('petugas_id', 150);
            $table->string('pasien_tiba', 50);
            $table->string('time_out', 50);
            $table->string('cek_fungsi_peralatan', 50);
            $table->string('preparasi_di', 50);
            $table->string('desinfektan_dengan', 50);
            $table->string('tipe_pembiusan', 50);
            $table->string('puncture_di', 50);
            $table->string('akses', 50);
            $table->string('catheter_diagnostik', 50);
            $table->string('value_diagnostik', 50);
            $table->string('kontras', 50);
            $table->string('guiding_chateter', 50);
            $table->string('guide_wire_intervensi', 50);
            $table->string('kateter_aspirasi', 50);
            $table->string('balon_ukuran', 50);
            $table->string('balon_jumlah', 50);
            $table->string('balon_jenis', 50);
            $table->string('stent_jumlah', 50);
            $table->string('stent_jenis', 50);
            $table->string('stent_lokasi', 50);
            $table->string('pacing', 50);
            $table->string('iabp', 50);
            $table->string('kondisi_pasien', 50);
            $table->string('pasien_pci', 50);
            $table->string('obat_obatan', 200);
            $table->date('tanggal_simpan');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_intra_tindakan');
    }
};
