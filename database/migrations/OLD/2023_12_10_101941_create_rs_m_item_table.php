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
        Schema::create('rs_m_item', function (Blueprint $table) {
            $table->bigIncrements('ItemID');
            $table->string('ItemCode')->nullable();
            $table->string('GCItemType')->nullable();
            $table->string('ItemGroupCode')->nullable();
            $table->string('ProductLineID')->nullable();
            $table->string('ItemName1')->nullable();
            $table->string('ItemName2')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('IsActive')->nullable();
            $table->string('IsDeleted')->nullable();
            $table->string('IsAllowCito')->nullable();
            $table->string('IsAllowComplication')->nullable();
            $table->string('IsAllowVariable')->nullable();
            $table->string('IsAllowOrder')->nullable();
            $table->string('IsAdministrationCalculation')->nullable();
            $table->string('IsPrintWithDoctorName')->nullable();
            $table->string('IsPrintWithClass')->nullable();
            $table->string('IsPrintWithServiceUnit')->nullable();
            $table->string('IsAssetsUtilization')->nullable();
            $table->string('IsPhysicianFeeItem')->nullable();
            $table->string('IsConsignment')->nullable();
            $table->string('GCPhysicianFeeItemType')->nullable();
            $table->string('AssetsGroupID')->nullable();
            $table->string('AssetClassCode')->nullable();
            $table->string('BaseUnitCode')->nullable();
            $table->string('PurchaseUnitCode')->nullable();
            $table->string('IsPurchaseItem')->nullable();
            $table->string('IsNonStock')->nullable();
            $table->string('IsControlExpired')->nullable();
            $table->string('ABCClass')->nullable();
            $table->string('SerialNo')->nullable();
            $table->string('CycleCountInterval')->nullable();
            $table->string('ShelfLife')->nullable();
            $table->string('SubGroup')->nullable();
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
        Schema::dropIfExists('rs_m_item');
    }
};
