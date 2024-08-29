<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKeluargaPasienTable extends Migration
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
            $table->json('FamilyMedicalNo')->nullable();
            $table->string('FamilyName');
            $table->date('DateOfBirth');
            $table->json('Job')->nullable();
            $table->json('Address')->nullable();
            $table->json('PhoneNo')->nullable();
            $table->json('MobilePhoneNo')->nullable();
            $table->json('GCRelationShip')->nullable();
            $table->json('SSN')->nullable();
            $table->json('Picture')->nullable();
            $table->boolean('IsEmergencyContact')->default(false);
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
}