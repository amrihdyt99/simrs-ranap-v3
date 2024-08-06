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
        Schema::connection('mysql2')->create('m_item', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_kode', 500)->nullable();
            $table->string('item_nama', 500)->nullable();
            $table->string('item_unit', 500)->nullable();
            $table->string('item_jenis_tindakan', 500)->nullable();
            $table->string('item_jenis_layanan', 500)->nullable();
            $table->string('item_jenis_penunjang', 500)->nullable();
            $table->string('item_tipe', 500)->nullable();
            $table->char('deleted')->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->char('created_by')->nullable();
            $table->char('updated_by')->nullable();
            $table->char('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_item');
    }
};
