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
        Schema::create('rs_pasien_rehab', function (Blueprint $table) {
            $table->string('prehab_kode', 20)->primary();
            $table->string('prehab_reg', 20)->nullable();
            $table->string('prehab_sequence', 50)->nullable();
            $table->string('prehab_tindakan')->nullable();
            $table->string('prehab_jenis')->nullable();
            $table->integer('prehab_jumlah')->default(1);
            $table->integer('prehab_jumlah_diambil')->default(1);
            $table->double('prehab_tarif', 20, 2)->default(0);
            $table->text('prehab_hasil')->nullable();
            $table->text('prehab_file')->nullable();
            $table->dateTime('prehab_tgl_hasil')->nullable();
            $table->integer('prehab_dokter')->nullable();
            $table->string('prehab_poli')->nullable();
            $table->integer('prehab_deleted')->default(0);
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
        Schema::dropIfExists('rs_pasien_rehab');
    }
};
