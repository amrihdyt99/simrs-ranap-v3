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
        Schema::create('rs_cathlab_sign_out', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('cath_signout_pukul')->nullable();
            $table->string('cath_signout_tindakan')->nullable();
            $table->string('cath_signout_implan')->nullable();
            $table->string('cath_signout_alat')->nullable();
            $table->string('cath_signout_prosedur')->nullable();
            $table->string('cath_signout_prosedur_text')->nullable();
            $table->string('cath_signout_dokter_operator')->nullable();
            $table->string('cath_signout_dokter_anastesi')->nullable();
            $table->string('cath_signout_perawat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_cathlab_sign_out');
    }
};
