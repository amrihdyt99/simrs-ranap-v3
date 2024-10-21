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
        Schema::connection('mysql2')->create('m_item_tarif', function (Blueprint $table) {
            $table->bigIncrements('tarif_id');
            $table->string('SiteCode', 50);
            $table->string('GCMember')->nullable();
            $table->string('DocumentNo')->nullable();
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->string('ClassCategoryCode')->nullable();
            $table->string('RevisionNo')->nullable();
            $table->dateTime('DocumentDate')->nullable();
            $table->dateTime('StartingDate')->nullable();
            $table->dateTime('EndingDate')->nullable();
            $table->string('StandardPrice')->nullable();
            $table->string('CustomerPrice')->nullable();
            $table->string('PersonalPrice')->nullable();
            $table->string('DiscountPrice')->nullable();
            $table->string('MinVariablePrice')->nullable();
            $table->string('MaxVariablePrice')->nullable();
            $table->string('StandardPriceBefore')->nullable();
            $table->string('CustomerPriceBefore')->nullable();
            $table->string('PersonalPriceBefore')->nullable();
            $table->string('DiscountPriceBefore')->nullable();
            $table->string('Remarks')->nullable();
            $table->double('BundlePrice', 8, 2)->nullable();
            $table->string('PatientType')->nullable();
            $table->string('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->dateTime('LastUpdatedDateTime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_item_tarif');
    }
};
