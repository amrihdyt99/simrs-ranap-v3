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
        Schema::create('skrining_nyeri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_medrec');
            $table->string('reg_no');
            $table->string('merasakan_nyeri')->nullable();
            $table->string('durasi')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('pencetus_nyeri')->nullable();
            $table->string('kapan_terjadi_nyeri')->nullable();
            $table->string('tipe_nyeri')->nullable();
            $table->string('ekspresi_wajah')->nullable();
            $table->string('bps_wajah')->nullable();
            $table->string('bps_ekstremitas_atas')->nullable();
            $table->string('bps_compleance_atas')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('skrining_nyeri');
    }
};
