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
        Schema::connection('mysql2')->create('rs_m_obat', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name')->nullable();
            $table->string('satuan_dasar')->nullable();
            $table->double('total', 16, 2)->nullable();
            $table->date('expired_date')->nullable();
            $table->double('harga_jual', 16, 2)->nullable();
            $table->text('komposisi')->nullable();
            $table->string('dosis')->nullable();
            $table->string('satuan_dosis')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_obat');
    }
};
