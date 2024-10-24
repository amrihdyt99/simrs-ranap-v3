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
        Schema::create('rs_m_item_drug', function (Blueprint $table) {
            $table->string('ItemID')->primary();
            $table->string('BrandCode')->nullable();
            $table->string('DrugFormCode')->nullable();
            $table->string('Dosage')->nullable();
            $table->string('DosageUnitCode')->nullable();
            $table->string('GCRoute')->nullable();
            $table->string('GCNarkotika')->nullable();
            $table->string('GCDrugType')->nullable();
            $table->string('IsFormulariumItem')->nullable();
            $table->string('IsGenericDrug')->nullable();
            $table->string('HETAmount')->nullable();
            $table->string('IsNewItem')->nullable();
            $table->string('IsAllowRoundUp')->nullable();
            $table->string('IsAutopackItem')->nullable();
            $table->string('MimsReferenceID')->nullable();
            $table->string('DefaultConsumeUnit')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
            $table->string('IsOOT')->nullable();
            $table->string('IsNarkotikaPsikotropika')->nullable();
            $table->string('IsHighAlert')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_item_drug');
    }
};
