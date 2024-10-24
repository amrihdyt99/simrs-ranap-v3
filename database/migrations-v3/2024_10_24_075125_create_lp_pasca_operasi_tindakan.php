<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpPascaOperasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_pasca_operasi_tindakan', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('reg_no')->nullable();
            $table->string('instruksi_rawat')->nullable();
            $table->string('instruksi_posisi')->nullable();
            $table->boolean('diet')->nullable();
            $table->string('lama_hari_diet_total')->nullable();
            $table->string('ket_boleh_diet')->nullable();
            $table->string('ket_setelah_diet')->nullable();
            $table->boolean('infus_sesuai_instruksi')->nullable();
            $table->boolean('infus_cairan')->nullable();
            $table->json('infus_cairan_data')->nullable();
            $table->text('pemberian_obat')->nullable();
            $table->string('instruksi_pemberian_tranfusi')->nullable();
            $table->boolean('instruksi_drain')->nullable();

            $table->boolean('tampon')->nullable();
            $table->string('tampon_letak')->nullable();
            $table->boolean('ngt')->nullable();
            $table->string('catatan_ngt')->nullable();
            $table->boolean('kateter_urin')->nullable();
            $table->string('catatan_kateter_urin')->nullable();
            $table->boolean('pemeriksaan_pasca_laboratorium')->nullable();
            $table->string('catatan_pemeriksaan_pasca_laboratorium')->nullable();
            $table->boolean('pemeriksaan_pasca_radiologi')->nullable();
            $table->string('catatan_pemeriksaan_pasca_radiologi')->nullable();
            $table->boolean('kebutuhan_terkait')->nullable();
            $table->string('catatan_kebutuhan_terkait')->nullable();
            $table->string('kode_dokter_operator')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lp_pasca_operasi_tindakan');
    }
}
