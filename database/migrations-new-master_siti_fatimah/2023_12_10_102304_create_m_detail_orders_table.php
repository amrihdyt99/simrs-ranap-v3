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
        Schema::connection('mysql2')->create('m_detail_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_order', 150)->nullable();
            $table->string('kode_tindakan', 50)->nullable();
            $table->string('nama_tindakan', 200)->nullable();
            $table->integer('harga_tindakan')->nullable();
            $table->integer('jumlah_diambil')->nullable();
            $table->string('hasil_order', 200)->nullable();
            $table->string('nama_petugas', 200)->nullable();
            $table->enum('is_delete', ['0', '1'])->nullable()->default('0');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_detail_orders');
    }
};
