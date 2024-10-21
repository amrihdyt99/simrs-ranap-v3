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
        Schema::connection('mysql2')->create('m_keluarga_pasien', function (Blueprint $table) {
            $table->string('MedicalNo');
            $table->integer('SequenceNo');
            $table->string('FamilyMedicalNo')->nullable();
            $table->string('FamilyName');
            $table->date('DateOfBirth');
            $table->string('Sex')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_keluarga_pasien');
    }
};
