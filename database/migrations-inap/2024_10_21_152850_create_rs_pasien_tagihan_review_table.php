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
        Schema::create('rs_pasien_tagihan_review', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no', 200)->nullable();
            $table->string('order_no', 200)->nullable();
            $table->string('item_code', 200)->nullable();
            $table->string('jenis_order', 150);
            $table->string('item_name', 200);
            $table->integer('qty')->nullable();
            $table->string('flag', 200)->nullable();
            $table->integer('dosis')->nullable();
            $table->string('hari', 200)->nullable();
            $table->string('durasi_hari', 200)->nullable();
            $table->integer('harga_jual')->nullable();
            $table->string('ket_dosis', 200)->nullable();
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
        Schema::dropIfExists('rs_pasien_tagihan_review');
    }
};