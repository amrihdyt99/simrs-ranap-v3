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
        Schema::create('rs_pasien_det_transaksi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_faktur', 150)->nullable();
            $table->string('order_no', 150)->nullable();
            $table->string('item_code', 150)->nullable();
            $table->string('jenis_order', 150)->nullable();
            $table->string('item_name', 200)->nullable();
            $table->string('qty', 10)->nullable();
            $table->string('harga_jual', 20)->nullable();
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
        Schema::dropIfExists('rs_pasien_det_transaksi');
    }
};
