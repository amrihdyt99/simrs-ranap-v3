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
        Schema::create('register_inap', function (Blueprint $table) {
            $table->string('reg_no', 250)->primary();
            $table->string('medrec', 250)->nullable();
            $table->string('reg_tanggal', 250)->nullable();
            $table->string('reg_jam', 250)->nullable();
            $table->string('service_unit', 250)->nullable();
            $table->string('dokter', 250)->nullable();
            $table->string('ruangan', 250)->nullable();
            $table->string('metode_bayar', 250)->nullable();
            $table->string('no_dokumen', 250)->nullable();
            $table->string('diagnosis_utama', 250)->nullable();
            $table->string('kelas_kategori', 250)->nullable();
            $table->string('bed', 250)->nullable();
            $table->string('departemen_asal', 250)->nullable();
            $table->string('link_regis', 250)->nullable();
            $table->string('no_kartu', 250)->nullable();
            $table->string('penanggungjawab_pembayaran', 250)->nullable();
            $table->string('visit_note', 250)->nullable();
            $table->string('pasien_note', 250)->nullable();
            $table->string('ref_no', 250)->nullable();
            $table->string('control_letter', 250)->nullable();
            $table->string('community', 250)->nullable();
            $table->string('ref_corporate', 250)->nullable();
            $table->string('cover_class', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_inap');
    }
};
