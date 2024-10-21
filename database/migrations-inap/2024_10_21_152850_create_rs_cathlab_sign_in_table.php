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
        Schema::create('rs_cathlab_sign_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('cath_signin_pukul')->nullable();
            $table->string('cath_signin_identifikasi')->nullable();
            $table->string('cath_signin_persetujuan')->nullable();
            $table->string('cath_signin_anastesi')->nullable();
            $table->string('cath_signin_prosedur')->nullable();
            $table->string('cath_signin_puasa')->nullable();
            $table->string('cath_signin_alergi')->nullable();
            $table->string('cath_signin_alergi_text')->nullable();
            $table->string('cath_signin_antibiotik')->nullable();
            $table->string('cath_signin_antibiotik_text')->nullable();
            $table->string('cath_signin_ureum')->nullable();
            $table->string('cath_signin_creatinin')->nullable();
            $table->string('cath_signin_pt')->nullable();
            $table->string('cath_signin_aptt')->nullable();
            $table->string('cath_signin_lainnya')->nullable();
            $table->string('cath_signin_laboratorium')->nullable();
            $table->string('cath_signin_ekg')->nullable();
            $table->string('cath_signin_infus')->nullable();
            $table->string('cath_signin_gigi')->nullable();
            $table->string('cath_signin_mesin')->nullable();
            $table->string('cath_signin_alat')->nullable();
            $table->string('cath_signin_perawat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_cathlab_sign_in');
    }
};
