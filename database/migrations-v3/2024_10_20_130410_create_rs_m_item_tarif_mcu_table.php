<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMItemTarifMcuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_item_tarif_mcu', function (Blueprint $table) {
            $table->id('TariffId');
            $table->string('SiteCode')->nullable();
            $table->string('ItemId')->nullable();
            $table->string('ParentItemId')->nullable();
            $table->string('McuPrice')->nullable();
            $table->string('ItemSpecialist')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
            $table->string('IsDeleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_item_tarif_mcu');
    }
}
