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
        Schema::connection('mysql2')->create('m_medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id', 50)->unique('kode_UNIQUE');
            $table->string('item_name', 250);
            $table->integer('harga_jual');
            $table->integer('total');
            $table->timestamps();
            $table->string('satuan_dosis')->nullable();
            $table->string('satuan_dasar')->nullable();
            $table->string('dosis')->nullable();
            $table->string('expired_date', 50)->nullable();
            $table->text('komposisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_medicine');
    }
};
