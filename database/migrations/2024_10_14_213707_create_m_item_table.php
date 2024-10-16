<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->dropIfExists('m_item');

        Schema::connection('mysql2')->create('m_item', function (Blueprint $table) {
            $table->id('ItemID');
            $table->string('ItemCode');
            $table->string('GCItemType')->nullable();
            $table->string('ItemGroupCode')->nullable();
            $table->unsignedBigInteger('ItemCategory')->nullable();
            $table->string('ProductLineID')->nullable();
            $table->string('ItemName1')->nullable();
            $table->string('ItemName2')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Remarks')->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->tinyInteger('IsDeleted')->nullable();
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
            $table->string('ItemBundle')->nullable();
            $table->string('ItemType')->nullable();
            $table->string('ItemServiceUnit')->nullable();
            $table->string('ActivePeriode')->nullable();


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
        Schema::dropIfExists('m_item');
    }
}
