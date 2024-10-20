<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMItemRehabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_item_rehab', function (Blueprint $table) {
            $table->string('item_id')->primary();
            $table->string('item_kode')->nullable();
            $table->string('item_nama')->nullable();
            $table->double('item_tarif', 16, 2)->nullable();
            $table->string('item_jenis')->nullable();
            $table->string('item_uraian')->nullable();
            $table->tinyInteger('item_active')->nullable();
            $table->tinyInteger('item_deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_item_rehab');
    }
}
