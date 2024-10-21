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
        Schema::create('rs_pasien_radiol', function (Blueprint $table) {
            $table->string('pradiol_kode', 20)->primary();
            $table->string('pradiol_reg', 20)->nullable();
            $table->string('pradiol_sequence', 50)->nullable();
            $table->string('pradiol_tindakan')->nullable();
            $table->string('pradiol_jenis', 100)->nullable();
            $table->integer('pradiol_jumlah')->default(1);
            $table->integer('pradiol_jumlah_diambil')->default(1);
            $table->double('pradiol_tarif', 20, 2)->default(1);
            $table->text('pradiol_hasil')->nullable();
            $table->text('pradiol_kesimpulan')->nullable();
            $table->text('pradiol_file')->nullable();
            $table->dateTime('pradiol_tgl_hasil')->nullable();
            $table->string('pradiol_accession')->nullable();
            $table->integer('pradiol_dokter')->nullable();
            $table->string('pradiol_poli')->nullable();
            $table->integer('pradiol_radiografer')->nullable();
            $table->integer('pradiol_deleted')->default(0);
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
        Schema::dropIfExists('rs_pasien_radiol');
    }
};
