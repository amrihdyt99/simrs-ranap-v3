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
        Schema::create('rs_m_item_tarif', function (Blueprint $table) {
            $table->bigIncrements('tarif_id');
            $table->string('SiteCode')->nullable();
            $table->string('GCMember')->nullable();
            $table->string('DocumentNo')->nullable();
            $table->string('ItemID')->nullable();
            $table->string('ClassCategoryCode')->nullable();
            $table->string('RevisionNo')->nullable();
            $table->string('DocumentDate')->nullable();
            $table->string('StartingDate')->nullable();
            $table->string('EndingDate')->nullable();
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
        Schema::dropIfExists('rs_m_item_tarif');
    }
};
