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
        Schema::create('rs_pasien_resume', function (Blueprint $table) {
            $table->bigIncrements('resume_id');
            $table->string('resume_reg')->nullable();
            $table->text('resume_diagnosa')->nullable();
            $table->text('resume_icd')->nullable();
            $table->text('resume_tindakan')->nullable();
            $table->string('resume_prosedur1')->nullable();
            $table->string('resume_prosedur2')->nullable();
            $table->string('resume_prosedur3')->nullable();
            $table->text('resume_ranap')->nullable();
            $table->integer('resume_dokter')->nullable();
            $table->string('resume_poli', 20)->nullable();
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
        Schema::dropIfExists('rs_pasien_resume');
    }
};
