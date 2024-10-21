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
        Schema::create('rs_m_pasien', function (Blueprint $table) {
            $table->string('MedicalNo')->primary();
            $table->string('SiteCode', 1)->nullable();
            $table->string('SSN', 20)->nullable();
            $table->string('Since', 50)->nullable();
            $table->string('FirstName')->nullable();
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('PatientName')->nullable();
            $table->string('PreferredName')->nullable();
            $table->string('PatientNameOnCard')->nullable();
            $table->string('CityOfBirth')->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->string('IsApproximateDOB', 1)->nullable();
            $table->string('GCSex')->nullable();
            $table->string('GCBloodType')->nullable();
            $table->string('BloodRhesus')->nullable();
            $table->string('GCEducation')->nullable();
            $table->string('GCMaritalStatus')->nullable();
            $table->string('GCNationality')->nullable();
            $table->string('GCRace')->nullable();
            $table->string('SpokenLanguage')->nullable();
            $table->string('WrittenLanguage')->nullable();
            $table->string('GCOccupation')->nullable();
            $table->string('Title')->nullable();
            $table->string('Suffix')->nullable();
            $table->string('GCPatientCategory')->nullable();
            $table->string('GCDependentType')->nullable();
            $table->string('GCReligion')->nullable();
            $table->string('Company')->nullable();
            $table->string('MobilePhoneNo1')->nullable();
            $table->string('MobilePhoneNo2')->nullable();
            $table->string('OldMedicalNo')->nullable();
            $table->string('Picture')->nullable();
            $table->string('PictureFileName')->nullable();
            $table->string('IsBlackList', 1)->nullable();
            $table->string('BlackListBy')->nullable();
            $table->string('BlackListDateTime')->nullable();
            $table->string('BlackListNotes')->nullable();
            $table->string('IsAlive', 1)->nullable();
            $table->string('DateOfDeath')->nullable();
            $table->string('LastVisitDate')->nullable();
            $table->string('NumberOfVisit', 5)->nullable();
            $table->string('Notes')->nullable();
            $table->string('RegistrationNoOfDeath')->nullable();
            $table->string('BpjsCardNo')->nullable();
            $table->string('IsPatientConfidential', 1)->nullable();
            $table->string('IsActive', 1)->nullable();
            $table->string('IsDeleted', 1)->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
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
        Schema::dropIfExists('rs_m_pasien');
    }
};
