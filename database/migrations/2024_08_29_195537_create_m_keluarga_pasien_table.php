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
            $table->string('FamilyMedicalNo')->nullable();
            $table->string('FamilyName');
            $table->date('DateOfBirth');
            $table->string('Job')->nullable();
            $table->text('Address')->nullable();
            $table->string('PhoneNo')->nullable();
            $table->string('MobilePhoneNo')->nullable();
            $table->string('GCRelationShip')->nullable();
            $table->string('SSN')->nullable();
            $table->string('Picture')->nullable();
            $table->boolean('IsEmergencyContact')->default(false);
            $table->timestamps(); // created_at and updated_at
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