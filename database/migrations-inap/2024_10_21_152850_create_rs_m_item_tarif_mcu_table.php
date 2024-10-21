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
        Schema::create('rs_m_item_tarif_mcu', function (Blueprint $table) {
            $table->string('TariffId')->nullable();
            $table->string('SiteCode')->nullable();
            $table->string('ItemId')->nullable();
            $table->string('ParentItemId')->nullable();
            $table->string('McuPrice')->nullable();
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
        Schema::dropIfExists('rs_m_item_tarif_mcu');
    }
};
