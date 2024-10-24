<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_item_group', function (Blueprint $table) {
            $table->string('ItemGroupCode')->primary();
            $table->string('GCItemType')->nullable();
            $table->string('ItemGroupName1')->nullable();
            $table->string('ItemGroupName2')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('FactGroup')->nullable();
            $table->string('OrderNo')->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->tinyInteger('IsDeleted')->default(0);
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
        Schema::dropIfExists('m_item_group');
    }
}
