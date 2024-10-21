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
        Schema::create('rs_m_item_drug_display', function (Blueprint $table) {
            $table->string('ItemID')->primary();
            $table->string('ItemCode')->nullable();
            $table->string('ItemName1')->nullable();
            $table->string('ItemGroupCode')->nullable();
            $table->string('BaseUnitCode')->nullable();
            $table->string('BaseUnitName')->nullable();
            $table->string('BrandCode')->nullable();
            $table->string('BrandName')->nullable();
            $table->string('DosageUnitCode')->nullable();
            $table->string('DosageUnitShortName')->nullable();
            $table->string('DosageUnitName')->nullable();
            $table->string('DrugFormName')->nullable();
            $table->string('Dosage')->nullable();
            $table->string('GCRoute')->nullable();
            $table->string('RouteName')->nullable();
            $table->string('GCDrugType')->nullable();
            $table->string('Generic')->nullable();
            $table->string('GenericName')->nullable();
            $table->string('DefaultConsumeUnit')->nullable();
            $table->string('MimsReferenceID')->nullable();
            $table->string('IsAllowRoundUp')->nullable();
            $table->string('IsAutopackItem')->nullable();
            $table->string('IsFormulariumItem')->nullable();
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
        Schema::dropIfExists('rs_m_item_drug_display');
    }
};
