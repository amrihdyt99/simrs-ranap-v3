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
        Schema::create('rs_m_item_group', function (Blueprint $table) {
            $table->string('ItemGroupCode');
            $table->string('GCItemType')->nullable();
            $table->string('ItemGroupName1')->nullable();
            $table->string('ItemGroupName2')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('FactGroup')->nullable();
            $table->string('OrderNo')->nullable();
            $table->string('IsActive')->nullable();
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
        Schema::dropIfExists('rs_m_item_group');
    }
};
