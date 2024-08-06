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
        Schema::create('rs_m_paramedic', function (Blueprint $table) {
            $table->bigIncrements('ParamedicID');
            $table->string('ParamedicCode')->nullable();
            $table->string('SiteCode')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('ParamedicName')->nullable();
            $table->string('ParamedicInitial')->nullable();
            $table->string('DateOfBirth')->nullable();
            $table->string('GCSex')->nullable();
            $table->string('GCParamedicType')->nullable();
            $table->string('GCEmploymentStatus')->nullable();
            $table->string('GCReligion')->nullable();
            $table->string('GCNationality')->nullable();
            $table->string('Title')->nullable();
            $table->string('Suffix')->nullable();
            $table->string('SpecialtyCode')->nullable();
            $table->string('HiredDate')->nullable();
            $table->string('TerminatedDate')->nullable();
            $table->string('StartExperienceDate')->nullable();
            $table->string('IsTaxRegistrant')->nullable();
            $table->string('TaxRegistrantNo')->nullable();
            $table->string('LicenseNo')->nullable();
            $table->string('LicenseExpiredDate')->nullable();
            $table->string('PictureFileName')->nullable();
            $table->string('IsAvailable')->nullable();
            $table->string('NotAvailableUntil')->nullable();
            $table->string('IsAnesthetist')->nullable();
            $table->string('IsAudiologist')->nullable();
            $table->string('IsHasPhysicianRole')->nullable();
            $table->string('UserName')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('IsActive')->nullable();
            $table->string('IsFeeUsingPercentage')->nullable();
            $table->string('FeeAmount')->nullable();
            $table->string('FeePercentage')->nullable();
            $table->string('BankName')->nullable();
            $table->string('BankAccountNo')->nullable();
            $table->string('BankAccountName')->nullable();
            $table->string('SSN')->nullable();
            $table->string('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_paramedic');
    }
};
